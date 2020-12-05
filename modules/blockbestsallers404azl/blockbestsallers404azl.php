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

class BlockBestSallers404Azl extends Module
{
    public function __construct()
    {
        $this->name = 'blockbestsallers404azl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Best Sallers On 404 Page');
        $this->description = $this->l('Adds a block displaying best saller products on 404 page.');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {

        return (parent::install()
            && $this->registerHook('display404Bottom'));
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplay404Bottom($params)
    {
        if (Configuration::get('PS_CATALOG_MODE')) {
            return;
        }

        $products = ProductSale::getBestSales(
            $this->context->language->id,
            0,
            8
        );
        if (!$products) {
            return;
        }
        $this->smarty->assign(
            array(
                'specials' => $products)
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/blockbestsallers404azl.tpl'
        );
    }
}
