<?php
/**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*/

class MegamenuContent extends ObjectModel
{

    public $id_megamenu_content;

    public $id_megamenu_menu;

    public $type;

    public $row_count;

    public $json_data;

    public $id_product;

    public $custom_class;

    public $grid;

    public $title;

    public $custom_html;

    public $date_add;

    public $date_upd;




    public function __construct($id_megamenu_content = null, $id_lang = null)
    {
        if ($id_megamenu_content) {
            $this->id_megamenu_content = $id_megamenu_content;
        }
        $this->langId = Configuration::get('PS_LANG_DEFAULT');
        parent::__construct($id_megamenu_content, $id_lang);
    }

    public static $definition = array(
        'table' => 'megamenu_content',
        'primary' => 'id_megamenu_content',
        'multilang' => true,
        'fields' => array(
            'id_megamenu_menu'     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'type'                => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'row_count'            => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'json_data'            => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'id_product'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'custom_class'        => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'grid'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'title'                => array('type' => self::TYPE_STRING,'lang'=>true, 'validate' => 'isString'),
            'custom_html'        => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'date_add'      =>  array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd'      =>    array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public function getContentByid($id_megamenu_menu)
    {
        $sql = 'SELECT * FROM '._DB_PREFIX_.'megamenu_content where id_megamenu_menu = '.$id_megamenu_menu;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    public function doAdd($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return parent::add();
    }

    public function doUpdate($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return parent::update();
    }

    public function doDelete()
    {
        return parent::delete();
    }

    public function getMenuContentByMenuId($id_megamenu_menu, $id_land = false)
    {
        $contents = MegamenuContent::getContentByid($id_megamenu_menu);
        //$contentsCount = count($contents);
        foreach ($contents as $key => $content) {
            $contentObject = new MegamenuContent($content['id_megamenu_content'], $id_land);
            $contents[$key]['custom_html'] = $contentObject->custom_html;
            $contents[$key]['title'] = $contentObject->title;
            $jsonArray = Tools::jsonDecode($content['json_data'], 1);
            $newJsonArray = array();
            $contents[$key]['LNK'] = array();
            $contents[$key]['SLI'] = array();
            if ($contents[$key]['type'] == 'LNK') {
                if (($jsonArray)) {
                    foreach ($jsonArray as $jsonValue) {
                        $newJsonArray[$jsonValue] = $jsonValue;
                    }
                }
                $contents[$key]['LNK'] = $newJsonArray;
            } elseif ($contents[$key]['type'] == 'SLI') {
                $contents[$key]['SLI'] = $jsonArray;
            }
        }
        $rows = array();
        $column = 1;
        foreach ($contents as $content) {
            if (empty($rows[$content['row_count']])) {
                $column = 1;
            }
            $rows[$content['row_count']][$column] = $content;
            $column++;

        }
        //echo '<pre>'.print_r($rows,1);
        return $rows;
    }

    public function deleteMenuContentByMenuId($id_megamenu_menu)
    {
        $menus = MegamenuContent::getContentByid($id_megamenu_menu);
        if (!empty($menus)) {
            foreach ($menus as $menu) {
                $menuContent = new MegamenuContent($menu['id_megamenu_content']);
                $menuContent->doDelete();
            }
        }
    }
}
