<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2015 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class BlockSearchAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blocksearchazl';
        $this->tab = 'search_filter';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Quick search block');
        $this->description = $this->l('Adds a quick search field to your website.');
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        if (!parent::install() || !$this->registerHook('top') || !$this->registerHook('header')
            || !$this->registerHook(
                'displayMobileTopSiteMap'
            )
        ) {
            return false;
        }

        return true;
    }

    public function hookdisplayMobileTopSiteMap($params)
    {
        $this->smarty->assign(
            array(
                'hook_mobile' => true,
                'instantsearch' => false
            )
        );
        $params['hook_mobile'] = true;

        return $this->hookTop($params);
    }

    /*
public function hookDisplayMobileHeader($params)
    {
        if (Configuration::get('PS_SEARCH_AJAX'))
            $this->context->controller->addJqueryPlugin('autocomplete');
        $this->context->controller->addCSS(_THEME_CSS_DIR_.'product_list.css');
    }
*/

    public function hookTop($params)
    {
        $key = $this->getCacheId(
            'blocksearch-top_azl'.((!isset($params['hook_mobile']) || !$params['hook_mobile']) ? '' : '-hook_mobile')
        );
        if (Tools::getValue('search_query')
            || !$this->isCached(
                'blocksearch-top_azl.tpl',
                $key
            )
        ) {
            $this->calculHookCommon($params);
            $this->smarty->assign(
                array(
                    'blocksearch_type' => 'top',
                    'search_query' => (string)Tools::getValue('search_query')
                )
            );
        }
        Media::addJsDef(array('blocksearch_type' => 'top'));

        return $this->display(
            __FILE__,
            'views/templates/hook/blocksearch-top_azl.tpl',
            Tools::getValue('search_query') ? null : $key
        );
    }

    private function calculHookCommon()
    {
        $this->smarty->assign(
            array(
                'ENT_QUOTES' => ENT_QUOTES,
                'search_ssl' => Tools::usingSecureMode(),
                'ajaxsearch' => Configuration::get('PS_SEARCH_AJAX'),
                'instantsearch' => Configuration::get('PS_INSTANT_SEARCH'),
                'self' => dirname(__FILE__),
            )
        );

        return true;
    }

    public function hookHeader($params)
    {
        if (Configuration::get('PS_SEARCH_AJAX')) {
            $this->context->controller->addJqueryPlugin('autocomplete');
        }
        $this->context->controller->addCSS(_THEME_CSS_DIR_.'product_list.css');
        $this->context->controller->addCSS(
            ($this->_path).'views/css/blocksearchazl.css',
            'all'
        );
        if (Configuration::get('PS_SEARCH_AJAX')) {
            Media::addJsDef(
                array(
                    'search_url' => $this->context->link->getPageLink(
                        'search',
                        Tools::usingSecureMode()
                    )
                )
            );
            $this->context->controller->addJS(($this->_path).'views/js/blocksearchazl.js');
        }
    }

    public function hookLeftColumn($params)
    {
        return $this->hookRightColumn($params);
    }

    public function hookRightColumn($params)
    {
        if (Tools::getValue('search_query')
            || !$this->isCached(
                'blocksearchazl.tpl',
                $this->getCacheId()
            )
        ) {
            $this->calculHookCommon($params);
            $this->smarty->assign(
                array(
                    'blocksearch_type' => 'block',
                    'search_query' => (string)Tools::getValue('search_query')
                )
            );
        }
        Media::addJsDef(array('blocksearch_type' => 'block'));

        return $this->display(
            __FILE__,
            'views/templates/hook/blocksearchazl.tpl',
            Tools::getValue('search_query') ? null : $this->getCacheId()
        );
    }

    public function hookDisplayNav($params)
    {
        return $this->hookTop($params);
    }
}
