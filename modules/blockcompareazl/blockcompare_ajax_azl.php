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
require_once(dirname(__FILE__).'/CompareAzl.php');
require_once(dirname(__FILE__).'/blockcompareazl.php');

$context = Context::getContext();
// Instance of module class for translations
$module = new BlockCompareAzl();
/*
if (Configuration::get('PS_TOKEN_ENABLE') == 1 &&
    strcmp(Tools::getToken(false), Tools::getValue('token')) &&
    $context->customer->isLogged() === true
)
    echo $module->l('Invalid token');*/
$productsEmbed = array();
$products = array();

if (Configuration::get('PS_COMPARATOR_MAX_ITEM') && isset($context->cookie->id_compare)) {
    $products = CompareProduct::getCompareProducts($context->cookie->id_compare);
}

if (count($products) > 0) {
    foreach ($products as $key => $val) {
        $product = new Product(
            (int)$val,
            true,
            $context->language->id
        );
        $category = new CategoryCore(
            $product->id_category_default,
            $context->language->id
        );
        $image = Image::getCover((int)$val);

        $productsEmbed[$key]['id_product'] = (int)$val;
        $productsEmbed[$key]['name'] = $product->name;
        $productsEmbed[$key]['category_rewrite'] = $category->link_rewrite;
        $productsEmbed[$key]['link_rewrite'] = $product->link_rewrite;
        $productsEmbed[$key]['image'] = $context->link->getImageLink(
            $product->link_rewrite,
            $image['id_image'],
            ImageType::getFormatedName('small')
        );
    }
}

$context->smarty->assign(
    array(
        'products' => $productsEmbed,
        'ajax' => true,
    )
);

if (Tools::file_exists_cache(_PS_THEME_DIR_.'modules/blockcompareazl/views/templates/hook/blockcompareazl.tpl')) {
    $context->smarty->display(_PS_THEME_DIR_.'modules/blockcompareazl/views/templates/hook/blockcompareazl.tpl');
} elseif (Tools::file_exists_cache(dirname(__FILE__).'/views/templates/hook/blockcompareazl.tpl')) {
    $context->smarty->display(dirname(__FILE__).'/views/templates/hook/blockcompareazl.tpl');
} else {
    echo $module->l(
        'No templates found',
        'blockcompareazl'
    );
}
