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
class HistoryController extends HistoryControllerCore
{
    /*
    * module: initsystem
    * date: 2017-02-05 21:35:06
    * version: 1.0.0
    */
    public function initContent()
    {
        parent::initContent();
        $has_address = $this->context->customer->getAddresses($this->context->language->id);
        $this->context->smarty->assign(
            array(
                'has_customer_an_address' => empty($has_address),
                'voucherAllowed' => (int)CartRule::isFeatureActive(),
                'returnAllowed' => (int)Configuration::get('PS_ORDER_RETURN'),
                'HOOK_CUSTOMER_ACCOUNT' => Hook::exec('displayCustomerAccount')
            )
        );
    }
}
