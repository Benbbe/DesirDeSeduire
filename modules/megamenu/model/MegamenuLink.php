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

class MegamenuLink extends ObjectModel
{

    public $id_megamenu_link;

    public $url;

    public $label;

    public $date_add;

    public $date_upd;


    public function __construct($id_megamenu_link = null, $id_lang = null)
    {
        $context = Context::getContext();
        if ($id_megamenu_link) {
            $this->id_megamenu_link = $id_megamenu_link;
        }
        $this->langId = $context->language->id;
        parent::__construct($id_megamenu_link, $id_lang);
    }

    public static $definition = array(
        'table' => 'megamenu_link',
        'primary' => 'id_megamenu_link',
        'multilang' => true,
        'fields' => array(
            'url'            => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'label'            => array('type' => self::TYPE_STRING, 'lang'=>true, 'validate' => 'isString'),
            'date_add'      => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd'        => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

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

    public function getLinks($id_lang)
    {
        $sql = 'SELECT * FROM '._DB_PREFIX_.'megamenu_link as ml LEFT JOIN '._DB_PREFIX_.
            'megamenu_link_lang mll ON(ml.id_megamenu_link = mll.id_megamenu_link AND mll.id_lang = '.$id_lang.')';
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }
}
