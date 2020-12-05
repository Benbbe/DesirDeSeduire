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

if (!defined('_PS_VERSION_')) {
    exit;
}

define('_MEGAMENU_MODULE_DIR_', _PS_MODULE_DIR_.'megamenu/');

define('_MEGAMENU_ADMIN_CONTROLLER_DIR', _MEGAMENU_MODULE_DIR_.'controllers/admin/');
define('_MEGAMENU_FRONT_CONTROLLER_DIR', _MEGAMENU_MODULE_DIR_.'controllers/front/');

define('_MEGAMENU_ADMIN_MODEL_DIR', _MEGAMENU_MODULE_DIR_.'model/');

define('_MEGAMENU_ADMIN_VIEWS_DIR', 'views/templates/admin/');
define('_MEGAMENU_HOOK_VIEWS_DIR', 'views/templates/hook/');

define('_MEGAMENU_CLASSES_DIR_', _MEGAMENU_MODULE_DIR_.'classes/');

require_once(_MEGAMENU_CLASSES_DIR_ . 'AppController.php');
require_once(_MEGAMENU_ADMIN_MODEL_DIR . 'MegamenuMenu.php');
require_once(_MEGAMENU_ADMIN_MODEL_DIR . 'MegamenuLink.php');
require_once(_MEGAMENU_ADMIN_MODEL_DIR . 'MegamenuContent.php');

class MegaMenu extends Module
{
    public function __construct()
    {
        
        $context = Context::getContext();
        $this->name = 'megamenu';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;
        $this->langId = $context->language->id;
        $this->bootstrap = true;
        parent::__construct();
        $this->link = new Link();
        $this->allowedRowSize = 3;
        $this->oPath = $this->_path;
        $this->oSmarty = $this->smarty;
        $this->oContext = $this->context;
        $this->displayName = $this->l('Mega Menu');
        $this->description = $this->l('A Top Horizontal menu which has complex menu items');

        $this->hookHeader();
    }

    public function install()
    {
        if (
            parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayTop') &&
            $this->installSQL()) {
            return true;
        }
        return false;
    }

    public function uninstall()
    {
        return ($this->uninstallSQL() && parent::uninstall());
    }

    public function installSQL()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_content` (
            `id_megamenu_content` int(11) NOT null AUTO_INCREMENT,
            `id_megamenu_menu` int(11) NOT null,
            `type` varchar(10) NOT null,
            `row_count` smallint(6) NOT null,
            `json_data` text,
            `id_product` int(11) DEFAULT null,
            `custom_class` varchar(50) DEFAULT null,
            `grid` smallint(6) NOT null,
            `date_add` datetime NOT null,
            `date_upd` datetime NOT null,
            PRIMARY KEY (`id_megamenu_content`)
            ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_content_lang` (
            `id_megamenu_content` int(11) NOT null,
            `id_lang` int(11) NOT null,
            `title` varchar(100) CHARACTER SET utf8 NOT null,
            `custom_html` text,
            PRIMARY KEY (`id_megamenu_content`,`id_lang`)
            ) DEFAULT CHARSET=utf8;
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_link` (
            `id_megamenu_link` int(11) NOT null AUTO_INCREMENT,
            `url` varchar(255) DEFAULT null,
            `date_add` datetime DEFAULT null,
            `date_upd` datetime DEFAULT null,
            PRIMARY KEY (`id_megamenu_link`)
            ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_link_lang` (
            `id_megamenu_link` int(11) NOT null,
            `id_lang` int(11) NOT null,
            `label` varchar(255) DEFAULT null,
            PRIMARY KEY (`id_megamenu_link`,`id_lang`)
            ) DEFAULT CHARSET=utf8;
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_menu` (
            `id_megamenu_menu` int(11) NOT null AUTO_INCREMENT,
            `is_customlink` tinyint(1) NOT null DEFAULT "0",
            `icon_type` enum(\'icon\',\'image\') DEFAULT null,
            `icon` varchar(100) DEFAULT null,
            `custom_link` varchar(255) DEFAULT null,
            `is_megamenu` tinyint(1) DEFAULT "0",
            `link_object_id` varchar(10) DEFAULT null,
            `is_fullwidth` tinyint(1) NOT null DEFAULT "0",
            `position` int(11) NOT null,
            `status` tinyint(1) NOT null DEFAULT "0",
            `date_add` datetime NOT null,
            `date_upd` datetime NOT null,
            PRIMARY KEY (`id_megamenu_menu`)
            ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'megamenu_menu_lang` (
            `id_megamenu_menu` int(11) NOT null,
            `id_lang` int(11) NOT null,
            `label` varchar(100) DEFAULT null 
            ) DEFAULT CHARSET=utf8;
            INSERT INTO `'._DB_PREFIX_.'megamenu_menu` (
            `id_megamenu_menu`,
            `is_customlink`,
            `icon_type`,
            `icon`,
            `custom_link`,
            `is_megamenu`,
            `link_object_id`,
            `is_fullwidth`,
            `position`,
            `status`,
            `date_add`,
            `date_upd`)
            VALUES
            (1, 1, \'icon\', \'icon-home\', \'/\', 0, \'\', 0, 1, 1, \'2015-09-30 12:57:42\', \'2015-10-01 05:21:32\');
            INSERT INTO `'._DB_PREFIX_.'megamenu_menu_lang` (`id_megamenu_menu`, `id_lang`, `label`) VALUES
            (1, '.$this->langId.', \'Home\');';
        $configure = '{
            "is_hover":"1",
            "effect":"",
            "menu_bg":"",
            "menu_active_bg":"",
            "menu_active_font":"",
            "menu_font":"",
            "drop_bg":"",
            "drop_font":"",
            "custom_css":""
            }';
        Configuration::updateValue('PS_MEGAMENU_SETTINGS', $configure);
        return Db::getInstance()->execute($sql);
    }

    public function uninstallSQL()
    {
        $sql = 'DROP TABLE  `'._DB_PREFIX_.'megamenu_menu`;DROP TABLE  `'._DB_PREFIX_.'megamenu_menu_lang`;'.
                'DROP TABLE  `'._DB_PREFIX_.'megamenu_content`;'.
                'DROP TABLE  `'._DB_PREFIX_.'megamenu_content_lang`;'.
                'DROP TABLE  `'._DB_PREFIX_.'megamenu_link`;'.
                'DROP TABLE  `'._DB_PREFIX_.'megamenu_link_lang`;';
        Configuration::deleteByName('PS_MEGAMENU_SETTINGS');
        return Db::getInstance()->execute($sql);
    }

    public function hookHeader()
    {
        $this->context->controller->addCSS(($this->_path).'views/css/megamenu.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/animate.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/custom.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/simple-line-icons.css', 'all');

        $this->context->controller->addCSS(($this->_path).'views/css/owl.carousel.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/owl.theme.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/owl.transitions.css', 'all');
        $settings = Tools::jsonDecode(Configuration::get('PS_MEGAMENU_SETTINGS'), 1);
        if (isset($settings['is_bootstrap']) && !$settings['is_bootstrap']) {
            $this->context->controller->addCSS(($this->_path).'views/css/bootstrap.css', 'all');
            $this->context->controller->addJs(($this->_path).'views/js/bootstrap.js');
        }

        $this->context->controller->addJs(($this->_path).'views/js/bootstrap-hover-dropdown.min.js');
        $this->context->controller->addJs(($this->_path).'views/js/owl.carousel.min.js');
    }

    public function hookTop($params)
    {
        $settings = Tools::jsonDecode(Configuration::get('PS_MEGAMENU_SETTINGS'), 1);
        $menuObject = new MegamenuMenu();

        $menus = $menuObject->getTopMenuToDisplay();
        $this->context->smarty->assign(
            array(
                'menus'        => $menus,
                                'mobileMenus'   => $menuObject->getTopMenuToDisplay(true),
                'settings'     => $settings,
                'imagePath' => $this->_path.'icons',
            )
        );
        return $this->display(__FILE__, 'views/templates/front/topmenu.tpl');
    }

    public function getContent()
    {
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/animate.css', 'all');
        $this->context->controller->addCSS(($this->_path).'views/css/simple-line-icons.css', 'all');
        $this->context->controller->addJs(_PS_JS_DIR_.'tiny_mce/tiny_mce.js');
        $this->context->controller->addJs(_PS_JS_DIR_.'/admin/tinymce.inc.js');
        $this->context->smarty->assign(
            array(
                'baseURL'        => $this->getModuleLink(),
                'template'         => $this->getTemplateContent(),
                'languages'     => Language::getLanguages(false),
                'module_path'     => $this->_path,
                
            )
        );
        return $this->display(__FILE__, _MEGAMENU_ADMIN_VIEWS_DIR.'layouts/layout-default.tpl');
    }

    public function getTemplateContent()
    {
        $controller = Tools::getValue('mm-controller');
        $controller = !empty($controller) ? $controller : 'Menus';
        require_once(_MEGAMENU_ADMIN_CONTROLLER_DIR.$controller.'Controller.php');
        $classname = $controller.'Controller';
        $contollerObject = new $classname($this);
        $filename = $contollerObject->getcontent();
        return $this->display(__FILE__, _MEGAMENU_ADMIN_VIEWS_DIR.$filename.'.tpl');
    }

    public function getFolderAdmin()
    {
        $folders = array('cache', 'classes', 'config', 'controllers', 'css', 'docs',
            'download', 'img', 'js', 'localization', 'log', 'mails',
            'modules', 'override', 'themes', 'tools', 'translations', 'upload', 'webservice', '.', '..');
        $handle = opendir(_PS_ROOT_DIR_);
        if (!$handle) {
            return false;
        }
        while (false !== ($folder = readdir($handle))) {
            if (is_dir(_PS_ROOT_DIR_ . '/' . $folder)) {
                if (!in_array($folder, $folders)) {
                    $folderadmin = opendir(_PS_ROOT_DIR_ . '/' . $folder);
                    if (!$folderadmin) {
                        return $folder;
                    }
                    while (false !== ($file = readdir($folderadmin))) {
                        if (is_file(_PS_ROOT_DIR_ . '/' . $folder . '/' . $file) && ($file == 'header.inc.php')) {
                            return $folder;
                        }
                    }
                }
            }
        }
        return false;
    }

    public function getModuleLink()
    {
        $linkAdminModules = $this->context->link->getAdminLink('AdminModules', true);
        return $linkAdminModules.'&configure='.urlencode($this->name).'&tab_module='.$this->tab.
             '&module_name='.urlencode($this->name);
    }

    public function getIcons()
    {
        return array(
            'icon-user',
            'icon-user-female',
            'icon-users',
            'icon-user-follow',
            'icon-user-following',
            'icon-user-unfollow',
            'icon-trophy',
            'icon-speedometer',
            'icon-social-youtube',
            'icon-social-twitter',
            'icon-social-tumblr',
            'icon-social-facebook',
            'icon-social-dropbox',
            'icon-social-dribbble',
            'icon-shield',
            'icon-screen-tablet',
            'icon-screen-smartphone',
            'icon-screen-desktop',
            'icon-plane',
            'icon-notebook',
            'icon-moustache',
            'icon-mouse',
            'icon-magnet',
            'icon-magic-wand',
            'icon-hourglass',
            'icon-graduation',
            'icon-ghost',
            'icon-game-controller',
            'icon-fire',
            'icon-eyeglasses',
            'icon-envelope-open',
            'icon-envelope-letter',
            'icon-energy',
            'icon-emoticon-smile',
            'icon-disc',
            'icon-cursor-move',
            'icon-crop',
            'icon-credit-card',
            'icon-chemistry',
            'icon-bell',
            'icon-badge',
            'icon-anchor',
            'icon-action-redo',
            'icon-action-undo',
            'icon-bag',
            'icon-basket',
            'icon-basket-loaded',
            'icon-book-open',
            'icon-briefcase',
            'icon-bubbles',
            'icon-calculator',
            'icon-call-end',
            'icon-call-in',
            'icon-call-out',
            'icon-compass',
            'icon-cup',
            'icon-diamond',
            'icon-direction',
            'icon-directions',
            'icon-docs',
            'icon-drawer',
            'icon-drop',
            'icon-earphones',
            'icon-earphones-alt',
            'icon-feed',
            'icon-film',
            'icon-folder-alt',
            'icon-frame',
            'icon-globe',
            'icon-globe-alt',
            'icon-handbag',
            'icon-layers',
            'icon-map',
            'icon-picture',
            'icon-pin',
            'icon-playlist',
            'icon-present',
            'icon-printer',
            'icon-puzzle',
            'icon-speech',
            'icon-vector',
            'icon-wallet',
            'icon-arrow-down',
            'icon-arrow-left',
            'icon-arrow-right',
            'icon-arrow-up',
            'icon-bar-chart',
            'icon-bulb',
            'icon-calendar',
            'icon-control-end',
            'icon-control-forward',
            'icon-control-pause',
            'icon-control-play',
            'icon-control-rewind',
            'icon-control-start',
            'icon-cursor',
            'icon-dislike',
            'icon-equalizer',
            'icon-graph',
            'icon-grid',
            'icon-home',
            'icon-like',
            'icon-list',
            'icon-login',
            'icon-logout',
            'icon-loop',
            'icon-microphone',
            'icon-music-tone',
            'icon-music-tone-alt',
            'icon-note',
            'icon-pencil',
            'icon-pie-chart',
            'icon-question',
            'icon-rocket',
            'icon-share',
            'icon-share-alt',
            'icon-shuffle',
            'icon-size-actual',
            'icon-size-fullscreen',
            'icon-support',
            'icon-tag',
            'icon-trash',
            'icon-umbrella',
            'icon-wrench',
            'icon-ban',
            'icon-bubble',
            'icon-camcorder',
            'icon-camera',
            'icon-check',
            'icon-clock',
            'icon-close',
            'icon-cloud-download',
            'icon-cloud-upload',
            'icon-doc',
            'icon-envelope',
            'icon-eye',
            'icon-flag',
            'icon-folder',
            'icon-heart',
            'icon-info',
            'icon-key',
            'icon-link',
            'icon-lock',
            'icon-lock-open',
            'icon-magnifier',
            'icon-magnifier-add',
            'icon-magnifier-remove',
            'icon-paper-clip',
            'icon-paper-plane',
            'icon-plus',
            'icon-pointer',
            'icon-power',
            'icon-refresh',
            'icon-reload',
            'icon-settings',
            'icon-star',
            'icon-symbol-female',
            'icon-symbol-male',
            'icon-target',
            'icon-volume-1',
            'icon-volume-2',
            'icon-volume-off',
        );
    }
}
