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

class BlockuserAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blockuserazl';
        $this->author = 'Azelab';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Block user');
        $this->description = $this->l(
            'Adds a block that displays information about the customer. Login/Logout/Acccount links'
        );
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        return parent::install()
        && $this->registerHook('displayNavRight');
    }

    public function hookDisplayNavRight($params)
    {
        $tpl = 'blockuserazl';

        if (isset($params['blockuserazl_tpl']) && $params['blockuserazl_tpl']) {
            $tpl = $params['blockuserazl_tpl'];
        }

        $has_address = $this->context->customer->getAddresses($this->context->language->id);
        $this->context->smarty->assign(
            array(
                'has_customer_an_address' => empty($has_address),
                'voucherAllowed' => (int)CartRule::isFeatureActive(),
                'returnAllowed' => (int)Configuration::get('PS_ORDER_RETURN')
            )
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/'.$tpl.'.tpl',
            $this->getCacheId()
        );
    }
}
