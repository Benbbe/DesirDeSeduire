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

class ManufacturerController extends ManufacturerControllerCore
{
    protected function assignOne()
    {

        $this->manufacturer->description = Tools::nl2br(trim($this->manufacturer->description));
        $nbProducts = $this->manufacturer->getProducts(
            $this->manufacturer->id,
            null,
            null,
            null,
            $this->orderBy,
            $this->orderWay,
            true
        );
        $this->pagination((int)$nbProducts);

        $products = $this->manufacturer->getProducts(
            $this->manufacturer->id,
            $this->context->language->id,
            (int)$this->p,
            (int)$this->n,
            $this->orderBy,
            $this->orderWay
        );
        $this->addColorsToProductList($products);

        /************************* /Images Array ******************************/
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
        /************************* /Images Array ******************************/

        $this->context->smarty->assign(
            array(
                'nb_products' => $nbProducts,
                'products' => $products,
                'path' => ($this->manufacturer->active ? Tools::safeOutput($this->manufacturer->name) : ''),
                'manufacturer' => $this->manufacturer,
                'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM'),
                'body_classes' => array(
                    $this->php_self.'-'.$this->manufacturer->id,
                    $this->php_self.'-'.$this->manufacturer->link_rewrite
                )
            )
        );
    }
}
