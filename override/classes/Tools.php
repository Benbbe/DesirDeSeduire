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
class Tools extends ToolsCore
{
    /*
    * module: initsystem
    * date: 2017-02-05 21:35:04
    * version: 1.0.0
    */
    public static function getPath(
        $id_category,
        $path = '',
        $link_on_the_item = false,
        $category_type = 'products',
        Context $context = null
    ) {
        if (!$context) {
            $context = Context::getContext();
        }
        $id_category = (int)$id_category;
        if ($id_category == 1) {
            return '<span class="navigation_end">'.$path.'</span>';
        }
        $pipe = Configuration::get('PS_NAVIGATION_PIPE');
        if (empty($pipe)) {
            $pipe = '>';
        }
        $full_path = '';
        if ($category_type === 'products') {
            $interval = Category::getInterval($id_category);
            $id_root_category = $context->shop->getCategory();
            $interval_root = Category::getInterval($id_root_category);
            if ($interval) {
                $sql
                    = 'SELECT c.id_category, cl.name, cl.link_rewrite
						FROM '._DB_PREFIX_.'category c
						LEFT JOIN '._DB_PREFIX_.'category_lang cl ON (cl.id_category = c.id_category'
                    .Shop::addSqlRestrictionOnLang('cl').')
						WHERE c.nleft <= '.$interval['nleft'].'
							AND c.nright >= '.$interval['nright'].'
							AND c.nleft >= '.$interval_root['nleft'].'
							AND c.nright <= '.$interval_root['nright'].'
							AND cl.id_lang = '.(int)$context->language->id.'
							AND c.active = 1
							AND c.level_depth > '.(int)$interval_root['level_depth'].'
						ORDER BY c.level_depth ASC';
                $categories = Db::getInstance()->executeS($sql);
                $n = 1;
                $n_categories = count($categories);
                foreach ($categories as $category) {
                    $full_path .= (($n < $n_categories || $link_on_the_item) ?
                        '<div rel="1" style="display:inline" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<span itemprop="title"><a itemprop="url" href="'
                            .Tools::safeOutput(
                                $context->link->getCategoryLink(
                                    (int)$category['id_category'],
                                    $category['link_rewrite']
                                )
                            ).'" title="'.htmlentities(
                                $category['name'],
                                ENT_NOQUOTES,
                                'UTF-8'
                            ).'">' : '')
                        .htmlentities(
                            $category['name'],
                            ENT_NOQUOTES,
                            'UTF-8'
                        ).(($n < $n_categories
                            || $link_on_the_item) ? '</span></a></div>' : '').(($n++ != $n_categories
                            || !empty($path)) ? $pipe : '');
                }
                return $full_path;
            }
        } elseif ($category_type === 'CMS') {
            $category = new CMSCategory(
                $id_category,
                $context->language->id
            );
            if (!Validate::isLoadedObject($category)) {
                die(Tools::displayError());
            }
            $category_link = $context->link->getCMSCategoryLink($category);
            if ($path != $category->name) {
                $full_path
                    .= '<div rel="2" style="display:inline" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<span itemprop="title"><a itemprop="url" href="'
                    .Tools::safeOutput($category_link).'">'.htmlentities(
                        $category->name,
                        ENT_NOQUOTES,
                        'UTF-8'
                    ).($link_on_the_item ? '</span></a></div>' : '');
            } else {
                $full_path = ($link_on_the_item ?
                        '<div rel="2" style="display:inline" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<span itemprop="title"><a itemprop="url" href="'
                        .Tools::safeOutput($category_link).'">' : '')
                    .htmlentities(
                        $path,
                        ENT_NOQUOTES,
                        'UTF-8'
                    ).($link_on_the_item ? '</span></a></div>' : '');
            }
            return Tools::getPath(
                $category->id_parent,
                $full_path,
                $link_on_the_item,
                $category_type
            );
        }
    }
}
