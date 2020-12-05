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

class ProductController extends ProductControllerCore
{
    protected function assignCategory()
    {
        parent::assignCategory();
        $this->assignNextProduct();
        $this->assignPrevProduct();
    }

    protected function assignNextProduct()
    {
        $id_lang = $this->context->language->id;
        $sql
            = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
            MAX(product_attribute_shop.id_product_attribute) id_product_attribute,
            product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, pl.`description`,
            pl.`description_short`, pl.`available_now`,
            pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`,
            pl.`name`, MAX(image_shop.`id_image`) id_image,
            il.`legend`, m.`name` AS manufacturer_name, cl.`name` AS category_default,
            DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
            INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ?
                Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).'
                                    DAY)) > 0 AS new, product_shop.price AS orderprice
                    FROM `'._DB_PREFIX_.'category_product` cp
                    LEFT JOIN `'._DB_PREFIX_.'product` p
                            ON p.`id_product` = cp.`id_product`
                    '
            .Shop::addSqlAssociation(
                'product',
                'p'
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                    ON (p.`id_product` = pa.`id_product`)
                    '
            .Shop::addSqlAssociation(
                'product_attribute',
                'pa',
                false,
                'product_attribute_shop.`default_on` = 1'
            ).'
                    '
            .Product::sqlStock(
                'p',
                'product_attribute_shop',
                false,
                $this->context->shop
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
                            ON (product_shop.`id_category_default` = cl.`id_category`
                            AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                            ON (p.`id_product` = pl.`id_product`
                            AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                            ON (i.`id_product` = p.`id_product`)'
            .Shop::addSqlAssociation(
                'image',
                'i',
                false,
                'image_shop.cover=1'
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'image_lang` il
                            ON (image_shop.`id_image` = il.`id_image`
                            AND il.`id_lang` = '.(int)$id_lang.')
                    LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
                            ON m.`id_manufacturer` = p.`id_manufacturer`
                    WHERE product_shop.`id_shop` = '.(int)$this->context->shop->id.'
                            AND cp.`id_category` = '.(int)$this->category->id.' AND product_shop.`active` = 1'
            .' AND p.id_product > '.$this->product->id.' AND product_shop.`visibility` IN ("both", "catalog")'
            .' GROUP BY product_shop.id_product LIMIT 1';

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if (isset($result[0])) {
            $this->context->smarty->assign(
                array(
                    'nextProduct' => $result[0],
                )
            );
        }
    }

    protected function assignPrevProduct()
    {
        $id_lang = $this->context->language->id;
        $sql
            = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
            MAX(product_attribute_shop.id_product_attribute) id_product_attribute,
            product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, pl.`description`,
            pl.`description_short`, pl.`available_now`,
            pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`,
            pl.`name`, MAX(image_shop.`id_image`) id_image,
            il.`legend`, m.`name` AS manufacturer_name, cl.`name` AS category_default,
            DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
            INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ?
                Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).'
                                    DAY)) > 0 AS new, product_shop.price AS orderprice
                    FROM `'._DB_PREFIX_.'category_product` cp
                    LEFT JOIN `'._DB_PREFIX_.'product` p
                            ON p.`id_product` = cp.`id_product`
                    '
            .Shop::addSqlAssociation(
                'product',
                'p'
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                    ON (p.`id_product` = pa.`id_product`)
                    '
            .Shop::addSqlAssociation(
                'product_attribute',
                'pa',
                false,
                'product_attribute_shop.`default_on` = 1'
            ).'
                    '
            .Product::sqlStock(
                'p',
                'product_attribute_shop',
                false,
                $this->context->shop
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
                            ON (product_shop.`id_category_default` = cl.`id_category`
                            AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                            ON (p.`id_product` = pl.`id_product`
                            AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                            ON (i.`id_product` = p.`id_product`)'
            .Shop::addSqlAssociation(
                'image',
                'i',
                false,
                'image_shop.cover=1'
            ).'
                    LEFT JOIN `'._DB_PREFIX_.'image_lang` il
                            ON (image_shop.`id_image` = il.`id_image`
                            AND il.`id_lang` = '.(int)$id_lang.')
                    LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
                            ON m.`id_manufacturer` = p.`id_manufacturer`
                    WHERE product_shop.`id_shop` = '.(int)$this->context->shop->id.'
                            AND cp.`id_category` = '.(int)$this->category->id.' AND product_shop.`active` = 1'
            .' AND p.id_product < '.$this->product->id.' AND product_shop.`visibility` IN ("both", "catalog")'
            .' GROUP BY product_shop.id_product LIMIT 1';

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if (isset($result[0])) {
            $this->context->smarty->assign(
                array(
                    'prevProduct' => $result[0],
                )
            );
        }
    }
}
