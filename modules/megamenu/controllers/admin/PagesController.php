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

class PagesController extends AppController
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
        return 'pages/' . $action;
    }

    public function settings()
    {
        $this->Megamenu->oContext->smarty->assign(
            array(
                'mmsettings' => Tools::jsonDecode(Configuration::get('PS_MEGAMENU_SETTINGS'), 1),
            )
        );
        if (Tools::isSubmit('save-mmsettings')) {
            $this->saveSettins();
            $this->__redirect(array('mm-controller'=>'Pages', 'mm-action'=>'settings'));
        }
    }

    public function saveSettins()
    {
        if (Tools::getIsset('mmsettings')) {
            $data = Tools::jsonEncode(Tools::getValue('mmsettings'));
            Configuration::updateValue('PS_MEGAMENU_SETTINGS', $data);
            $this->saveCSS();
            $this->setFlash($this->l('Settings saved successfully'), 'success');
        }
    }

    public function saveCSS()
    {
        $css = '';
        $settings = Tools::getValue('mmsettings');
        if (!empty($settings['menu_bg'])) {
            $css .= '#megamenu .navbar-header,#navbar-megamenu{background-color:' . $settings['menu_bg'] . '}';
        }
        if (!empty($settings['menu_active_bg'])) {
            $css .= '#megamenu .navbar-default .navbar-nav > .open > a, 
            #megamenu .navbar-default .navbar-nav > .open > a:hover, 
            #megamenu .navbar-default .navbar-nav > .open > a:focus,
            #navbar-megamenu > ul > li .dropdown-menu > li > a:hover
            {background-color:'.$settings['menu_active_bg'].'}';
        }
        if (!empty($settings['menu_active_font'])) {
            $css .= '#megamenu .navbar-default .navbar-nav > .open > a, 
            #megamenu .navbar-default .navbar-nav > .open > a:hover, 
            #megamenu .navbar-default .navbar-nav > .open > a:focus,
            #navbar-megamenu > ul > li .dropdown-menu > li > a:hover
            {color:'.$settings['menu_active_font'] . '}';
        }
        if (!empty($settings['menu_font'])) {
            $css .= '#navbar-megamenu > ul > li > a{color:'.$settings['menu_font'] . '}';
        }
        if (!empty($settings['drop_bg'])) {
            $css .= '#navbar-megamenu li.dropdown .dropdown-menu{background-color:' . $settings['drop_bg'] . '}';
        }
        if (!empty($settings['drop_font'])) {
            $css .= '#navbar-megamenu li.dropdown .dropdown-menu *{color:' . $settings['drop_font'] . '}';
        }
        $css .= $settings['custom_css'];
        file_put_contents(_MEGAMENU_MODULE_DIR_ . 'views/css/custom.css', $css);
        return true;
    }
}
