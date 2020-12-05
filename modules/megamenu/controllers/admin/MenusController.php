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

class MenusController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getcontent()
    {
        $action = Tools::getValue('mm-action');
        $action = !empty($action) ? $action : 'index';
        $this->$action();
        $this->getFlash();
        return 'menus/' . $action;
    }

    public function edit()
    {
        $this->Megamenu->oContext->controller->getLanguages();
        $langId = Configuration::get('PS_LANG_DEFAULT');

        $iso = Language::getIsoById((int)($langId));
        $isoTinyMCE = (file_exists(_PS_ROOT_DIR_ . '/js/tiny_mce/langs/' . $iso . '.js') ? $iso : 'en');
        $adminfolder = $this->Megamenu->getFolderAdmin();

        $id_megamenu_menu = Tools::getValue('id_megamenu_menu');
        $menuDetails = array();
        if ($id_megamenu_menu) {
            $menuObject = new MegamenuMenu($id_megamenu_menu);
            $menuDetails = $menuObject->getMenuDetailsbyId($id_megamenu_menu);
            if (!$menuObject->id) {
                $this->setFlash($this->l('The menu item not found', 'danger'));
                $this->__redirect(array('mm-controller'=>'Menus', 'mm-action'=>'index'));
            }
        } else {
            $menuObject = new MegamenuMenu();
        }
        if (Tools::isSubmit('submit-megamenu')) {
            $this->saveMenu($menuObject);
            $this->__redirect(array('mm-controller'=>'Menus', 'mm-action'=>'index'));
        }
        $link_object_id = '';
        if (!empty($menuDetails['link_object_id'])) {
            $link_object_id = $menuDetails['link_object_id'];
        }
        $existLinksOptions = $this->getDefaultLinksOptions($link_object_id);
        $linkGroups = $menuObject->getDefaultLinks();
        $this->Megamenu->oContext->smarty->assign(
            array(
                'languages'             => Language::getLanguages(false),
                'defaultFormLanguage'     => $langId,
                'existLinksOptions'     => $existLinksOptions,
                'admin_folder'             => __PS_BASE_URI__ . $adminfolder,
                'lang_iso'                 => $isoTinyMCE,
                'theme_css'             => _THEME_CSS_DIR_,
                'allowedRowSize'         => $this->Megamenu->allowedRowSize,
                'menu'                    => $menuDetails,
                'links'                    => $menuObject->getDefaultLinks(),
                'categories'            => $menuObject->getCategoriesOptions(),
                'id_megamenu_menu'        => $id_megamenu_menu,
                'linkGroups'            => $linkGroups,
                'icons'                    => $this->Megamenu->getIcons(),
                'imagePath'             => $this->Megamenu->oPath . 'views/img/',
            )
        );
    }

    public function saveMenu($menuObject)
    {
        if (Tools::getIsset('menu')) {
            $menu = Tools::getValue('menu');
            if ($menu['is_customlink']) {
                $menu['link_object_id'] = '';
            } else {
                $menu['custom_link'] = '';
            }

            if ($menu['icon_type'] != 'icon') {
                $menu['icon'] = '';
            }

            $result = false;

            if (!empty($menuObject->id_megamenu_menu)) {
                $menu['id_megamenu_menu'] = $menuObject->id_megamenu_menu;
                $result = $menuObject->doUpdate($menu);
            } else {
                $menu['position'] = $menuObject->getNextPosition();
                $result = $menuObject->doAdd($menu);
            }
            //echo '<pre>'.print_r($menuObject,1); exit;
            if ($result) {
                if (!empty($menuObject->id_megamenu_menu)) {
                    $this->setFlash($this->l('Menu updated Successfully'), 'success');
                    if ($menu['icon_type'] == 'image') {
                        $this->saveIconImage($menuObject->id_megamenu_menu);
                    }
                    $menuContent = new MegamenuContent();
                    $menuContent->deleteMenuContentByMenuId($menuObject->id_megamenu_menu);
                } else {
                    $this->setFlash($this->l('Menu Added Successfully'), 'success');
                }
                if ($menu['is_megamenu']) {
                    $this->saveMenuContent($menuObject->id, Tools::getValue('content'));
                }
            } else {
                $this->setFlash($this->l('There is some problem while added menu', 'danger'));
            }
        }
        
    }

    public function saveMenuContent($id_megamenu_menu, $megamenuContents)
    {
        if ($megamenuContents) {
            $rowCount = 1;
            foreach ($megamenuContents as $content) {
                if ($content['is_active']) {
                    foreach ($content['item'] as $column) {
                        $column['row_count'] = $rowCount;
                        $this->saveMenuColumn($id_megamenu_menu, $column);
                    }
                    $rowCount++;
                }
            }
        }
    }

    public function saveMenuColumn($id_megamenu_menu, $content)
    {
        $type = $content['type'];
        //echo '<pre>'.print_r($content,1); exit;
        if ($content['is_active'] && $type) {
            //$json_data = '';
            $column = array();
            $column['id_megamenu_menu'] = $id_megamenu_menu;
            $column['type'] = $type;
            $column['title'] = $content['title'];
            $column['row_count'] = $content['row_count'];
            $column['grid'] = $content['grid'];
            $column['custom_class'] = $content['custom_class'];
            switch ($type) {
                case 'LNK':
                    if (!empty($content['LNK'])) {
                        $column['json_data'] = Tools::jsonEncode($content['LNK']);
                    }
                    break;
                case 'CUS':
                    if (!empty($content['CUS'])) {
                        $column['custom_html'] = $content['CUS'];
                        //echo '<pre>'.print_r($column,1); exit;
                    }
                    break;
                case 'PRO':
                    if (!empty($content['PRO'])) {
                        $column['id_product'] = $content['PRO'];
                    }
                    break;
                case 'SLI':
                    if (!empty($content['SLI'])) {
                        $column['json_data'] = Tools::jsonEncode($content['SLI']);
                        //echo '<pre>'.print_r($content); exit;
                    }
                    break;
            }
            //echo '<pre>'. print_r($column,1); exit;
            $contentObject = new megamenuContent();
            $contentObject->doAdd($column);
        }
    }

    public function index()
    {
        $menu = new MegamenuMenu();
        $menusList = $menu->getMenusByPosition($this->Megamenu->oContext->language->id);
        //echo '<pre>' . print_r($menusList,1); exit;
        $this->Megamenu->oContext->smarty->assign(
            array(
                'menus' => $menusList,
            )
        );
    }

    public function getDefaultLinksOptions($value = '')
    {
        $menu = new MegamenuMenu();
        $linkGroups = $menu->getDefaultLinks();
        $out = '';
        foreach ($linkGroups as $linkGroupName => $linkGroup) {
            $out .= '<optgroup label="' . $linkGroupName . '">';
            if (!empty($linkGroup)) {
                foreach ($linkGroup as $linkId => $link) {
                    $selected = '';
                    if ($value == $linkId) {
                        $selected = 'selected="selected"';
                    }
                    $out .='<option value="'.$linkId . '" ' . $selected . '>' . $link . '</option>';
                }
            }
            $out .= '</optgroup>';
        }
        return $out;
    }

    public function changePosition()
    {

        $position = Tools::getValue('mm-position');
        $id_megamenu_menu = Tools::getValue('id_megamenu_menu');
        
        if ($position) {
            $menu = new MegamenuMenu();
            if ($menu->changePosition($id_megamenu_menu, $position)) {
                $this->setFlash($this->l('Position updated successfully'), 'success');
            } else {
                $this->setFlash($this->l('There is some error while updating position'), 'danger');
            }
        }
        $this->__redirect(array('mm-controller'=>'Menus', 'mm-action'=>'index'));
    }

    public function delete()
    {
        $id_megamenu_menu = Tools::getValue('id_megamenu_menu');

        if ($id_megamenu_menu) {
            $menu = new MegamenuMenu($id_megamenu_menu);
            if ($menu->doDelete()) {
                $menuContent = new MegamenuContent();
                $menuContent->deleteMenuContentByMenuId($id_megamenu_menu);
                $this->setFlash($this->l('Menu deleted successfully'), 'success');
            } else {
                $this->setFlash($this->l('Some error occurs while deleting the menu'), 'danger');
            }
        } else {
            $this->setFlash($this->l('Menu not exist'), 'danger');
        }
        $this->__redirect(array('mm-controller'=>'Menus', 'mm-action'=>'index'));
    }

    private function saveIconImage($id_megamenu_menu)
    {
        if (isset($_FILES['icon_image']) && isset($_FILES['icon_image']['tmp_name']) &&
             !empty($_FILES['icon_image']['tmp_name'])) {
            if (move_uploaded_file(
                $_FILES['icon_image']['tmp_name'],
                _PS_MODULE_DIR_ . 'megamenu/views/img/' . $id_megamenu_menu . '.png'
            )
            ) {
                return true;
            }
        }
    }
}
