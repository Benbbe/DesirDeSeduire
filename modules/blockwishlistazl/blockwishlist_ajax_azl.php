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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/WishListAzl.php');
require_once(dirname(__FILE__).'/blockwishlistazl.php');

$context = Context::getContext();
// Instance of module class for translations
$module = new BlockWishlistAzl();

if ($context->customer->isLogged()) {
    $products = WishListAzl::getProductByIdCustomer(
        $context->customer->id,
        $context->language->id
    );

    foreach ($products as $key => $val) {
        $image = Image::getCover($val['id_product']);
        $products[$key]['image'] = $context->link->getImageLink(
            $val['link_rewrite'],
            $image['id_image'],
            ImageType::getFormatedName('small')
        );
    }

    $context->smarty->assign(
        array(
            'wishlist_products' => $products,
            'ajax' => true,
        )
    );

    if (Tools::file_exists_cache(_PS_THEME_DIR_.'modules/blockwishlistazl/views/templates/hook/blockwishlistazl.tpl')) {
        $context->smarty->display(_PS_THEME_DIR_.'modules/blockwishlistazl/views/templates/hook/blockwishlistazl.tpl');
    } elseif (Tools::file_exists_cache(dirname(__FILE__).'/views/templates/hook/blockwishlistazl.tpl')) {
        $context->smarty->display(dirname(__FILE__).'/views/templates/hook/blockwishlistazl.tpl');
    } else {
        echo $module->l(
            'No templates found',
            'blockwishlistazl'
        );
    }
} else {
    echo $module->l(
        'You must be logged in to manage your wishlist.',
        'blockwishlistazl'
    );
}
