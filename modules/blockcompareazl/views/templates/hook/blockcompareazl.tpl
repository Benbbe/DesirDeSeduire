{*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
    {if !$ajax}
        <!-- Block compare module -->
        <li id="blcok_compare_azl" class="btn-group hidden-xs dropdown">
    {/if}
    <a href="#" class="pm_item" data-toggle="dropdown">
        <i class="icon-shuffle"></i>
        <span class="hidden-sm">{l s='Compare' mod='blockcompareazl'}</span> (<span
                class="dd-products-count">{{$products|@count}|escape:'html':'UTF-8'}</span>)
    </a>
    <div class="dropdown-menu dropdown-menu-right larger" role="menu">
        <span class="dropdown-triangle-up"></span>
        <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>

        <div class="dropdown-head">
            <h4 class="pull-left">{l s='Compare List' mod='blockcompareazl'}</h4>
        </div>
        <div class="dd-wrapper">
            {*<div class="dd-list-empty">{l s='There are no products selected for comparison.' mod='blockcompareazl'}</div>*}
            {if $products}
                <div id="compare-product-group" class="dropdown-product-list">
                    {foreach from=$products item=product name=i}
                    <div class="dd-product-group" id="pr{$product.id_product|escape:'html':'UTF-8'}">
                        <div class="dd-product-box pull-left">
                            <a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">
                                <img src="{$product.image|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}">
                            </a>
                        </div>
                        <div class="dd-product-desc pull-left">
                            <a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}"
                               class="title">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>

                            <a title="{l s='remove this product from compare list' mod='blockcompareazl'}"
                               class="close-btn ddr" href="javascript: removeProductComparison({$product.id_product|escape:'html':'UTF-8'});" "><i class="icon_close"></i></a>
                        </div>
                    </div>
                    {/foreach}
{*                    <div class="text-center clear-all-btn">
                        <a id="clear-compare-products" class="close-btn">
                            <i class="icon_close"></i>
                            <span>{l s='Clear all' mod='blockcompareazl'}</span>
                        </a>
                    </div>*}

                </div>
            {else}
                <div class="dd-list-empty" style="display: block">{l s='There are no products selected for comparison.' mod='blockcompareazl'}</div>
            {/if}
            <a href="{$link->getPageLink('products-comparison', true)|escape:'html':'UTF-8'}" class="btn btn-md btn-third-col btn-w100">{l s='Go to Comparision List' mod='blockcompareazl'}</a>
        </div>
    </div>
    {if !$ajax}
        </li>
        <!-- /Block compare module -->
    {/if}
{*{/if}*}