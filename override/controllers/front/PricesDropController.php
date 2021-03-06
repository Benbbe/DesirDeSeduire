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
class PricesDropController extends PricesDropControllerCore
{
    /*
    * module: initsystem
    * date: 2017-02-05 21:35:09
    * version: 1.0.0
    */
    public function initContent()
    {
        parent::initContent();
        $this->productSort();
        $nbProducts = Product::getPricesDrop(
            $this->context->language->id,
            null,
            null,
            true
        );
        $this->pagination($nbProducts);
        $products = Product::getPricesDrop(
            $this->context->language->id,
            (int)$this->p - 1,
            (int)$this->n,
            false,
            $this->orderBy,
            $this->orderWay
        );
        $this->addColorsToProductList($products);
        
        if (method_exists(
            'Product',
            'getSecondImage'
        )) {
            $image_array = array();
            for ($i = 0; $i < $nbProducts; $i++) {
                if (isset($products[$i]['id_product'])) {
                    $image_array[$products[$i]['id_product']] = Product::getSecondImage($products[$i]['id_product']);
                }
            }
            $this->context->smarty->assign(
                'productimg',
                (isset($image_array) and $image_array) ? $image_array : null
            );
        }
        
        $this->context->smarty->assign(
            array(
                'products' => $products,
                'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
                'nbProducts' => $nbProducts,
                'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
                'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM')
            )
        );
        $this->setTemplate(_PS_THEME_DIR_.'prices-drop.tpl');
    }
}
