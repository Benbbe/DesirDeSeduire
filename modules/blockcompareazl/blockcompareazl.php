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
require_once(dirname(__FILE__).'/CompareAzl.php');

class BlockCompareAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blockcompareazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Compare block');
        $this->description = $this->l('Popup compare products block module');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayNavRight') && $this->registerHook('displayHeader');
    }

    public function hookDisplayNavRight($params)
    {
        return $this->hookDisplayTop($params);
    }

    /**
     * Returns module content for header
     *
     * @param array $params Parameters
     *
     * @return string Content
     */
    public function hookDisplayTop($params)
    {
        //        $context = Context::getContext();
        $hasProduct = false;
        $products_arr = array();
        $products = array();

        if (Configuration::get('PS_COMPARATOR_MAX_ITEM') && isset($this->context->cookie->id_compare)) {
            $products = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
        }

        if (count($products) > 0) {
            $hasProduct = true;

            foreach ($products as $key => $val) {
                $products[$key] = new Product(
                    (int)$val,
                    true
                );
            }

            foreach ($products as $key => $val) {
                $category = new Category($val->id_category_default);

                $image = Image::getCover($val->id);
                $products_arr[$key]['image'] = $this->context->link->getImageLink(
                    $val->link_rewrite[1],
                    $image['id_image'],
                    ImageType::getFormatedName('small')
                );
                $products_arr[$key]['id_product'] = $val->id;
                $products_arr[$key]['link_rewrite'] = $val->link_rewrite[1];
                $products_arr[$key]['name'] = $val->name[1];
                $products_arr[$key]['category_rewrite'] = $category->link_rewrite[1];
            }
        }

        $this->context->smarty->assign(
            array(
                'hasProduct' => $hasProduct, 'products' => $products_arr, 'ajax' => false,)
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/blockcompareazl.tpl'
        );
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS(($this->_path).'views/js/blockcompareazl.js');
    }
}
