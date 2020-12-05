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
class SupplierController extends SupplierControllerCore
{
    /*
    * module: initsystem
    * date: 2017-02-05 21:35:12
    * version: 1.0.0
    */
    protected function assignOne()
    {
        if (Configuration::get('PS_DISPLAY_SUPPLIERS')) {
            $this->supplier->description = Tools::nl2br(trim($this->supplier->description));
            $nbProducts = $this->supplier->getProducts(
                $this->supplier->id,
                null,
                null,
                null,
                $this->orderBy,
                $this->orderWay,
                true
            );
            $this->pagination((int)$nbProducts);
            $products = $this->supplier->getProducts(
                $this->supplier->id,
                $this->context->cookie->id_lang,
                (int)$this->p,
                (int)$this->n,
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
                        $image_array[$products[$i]['id_product']] = Product::getSecondImage(
                            $products[$i]['id_product']
                        );
                    }
                }
                $this->context->smarty->assign(
                    'productimg',
                    (isset($image_array) and $image_array) ? $image_array : null
                );
            }
            
            $this->context->smarty->assign(
                array(
                    'nb_products' => $nbProducts,
                    'products' => $products,
                    'path' => ($this->supplier->active ? Tools::safeOutput($this->supplier->name) : ''),
                    'supplier' => $this->supplier,
                    'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM'),
                    'body_classes' => array(
                        $this->php_self.'-'.$this->supplier->id,
                        $this->php_self.'-'.$this->supplier->link_rewrite
                    )
                )
            );
        } else {
            Tools::redirect('index.php?controller=404');
        }
    }
}
