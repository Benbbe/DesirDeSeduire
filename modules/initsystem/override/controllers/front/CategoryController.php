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

class CategoryController extends CategoryControllerCore
{

    public function init()
    {
        $url = array();
        if (Tools::getValue('action') == 'loadImages') {
            if (method_exists(
                'Product',
                'getSecondImage'
            )) {
                $ids = Tools::getValue('ids');
                $image_array = array();
                foreach ($ids as $id) {
                    $image_array[$id] = Product::getSecondImage($id);
                    if (count($image_array[$id]) > 1) {
                        $product = new Product(
                            $id,
                            false,
                            Context::getContext()->language->id
                        );
                        $url[$id] = Context::getContext()->link->getImageLink(
                            $product->link_rewrite,
                            $image_array[$id][1]['id_image']
                            /*'home_default'*/
                        );
                    }
                }
                echo Tools::jsonEncode($url);
            }
            exit(200);
        }

        return parent::init();
    }
    /* @TODO Optimize image size by name. Add configuration to theme settings to select type of image and get here by
    configuration tools. */
    public function initContent()
    {
        parent::initContent();
        /************************* Images Array ******************************/
        if (method_exists(
            'Product',
            'getSecondImage'
        )) {
            $image_array = array();
            for ($i = 0; $i < count($this->cat_products); $i++) {
                if (isset($this->cat_products[$i]['id_product'])) {
                    $image_array[$this->cat_products[$i]['id_product']] = Product::getSecondImage(
                        $this->cat_products[$i]['id_product']
                    );
                }
            }
            $this->context->smarty->assign(
                'productimg',
                (isset($image_array) and $image_array) ? $image_array : null
            );
        }
        /************************* /Images Array ******************************/
    }
}
