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

class BlockMyAccountUserInfoAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blockmyaccountuserinfoazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('MyAccount User Info Block');
        $this->description = $this->l('Displays a block top of the my account page.');
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        return (parent::install() && $this->registerHook('displayMyAccountTop'));
    }

    public function hookDisplayMyAccountTop($params)
    {
        $qty = 0;
        if ($products = $this->context->cart->getProducts()) {
            $lastProduct = $this->context->cart->getLastProduct();
            foreach ($products as $product) {
                $qty += $product['cart_quantity'];
            }
        }
        $lastLoginTime = null;
        if ($connections = $this->context->customer->getLastConnections()) {
            $lastLoginTime = $connections[0]['date_add'];
        }
        $has_address = $this->context->customer->getAddresses($this->context->language->id);
        $this->context->smarty->assign(
            array(
                'lastProduct' => isset($lastProduct) ? $lastProduct : null,
                'customer' => $this->context->customer,
                'cartQty' => $qty,
                'lastLoginTime' => $lastLoginTime,
                'has_customer_an_address' => empty($has_address),
                'voucherAllowed' => (int)CartRule::isFeatureActive(),
                'returnAllowed' => (int)Configuration::get('PS_ORDER_RETURN'),
                'HOOK_CUSTOMER_ACCOUNT' => Hook::exec('displayCustomerAccount')
            )
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/blockmyaccountuserinfoazl.tpl',
            $this->getCacheId()
        );
    }
}
