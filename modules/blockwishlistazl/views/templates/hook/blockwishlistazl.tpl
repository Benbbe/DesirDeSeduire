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
{if $logged}
    {if !$ajax}
        <!-- Block wishlist module -->
        <li id="blcok_wishlist_azl" class="btn-group hidden-xs dropdown">
    {/if}
    <a href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" class="pm_item"
       data-toggle="dropdown" title="{l s='My wishlists' mod='blockwishlistazl'}">
        <i class="icon-heart"></i>
        <span class="hidden-sm">{l s='My wishlists' mod='blockwishlistazl'}</span> (<span
                class="dd-products-count">{{$wishlist_products|@count}|escape:'htmlall':'UTF-8'}</span>)
    </a>
    <div class="dropdown-menu dropdown-menu-right larger" role="menu" title="Compare Products">
        <span class="dropdown-triangle-up"></span>
        <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>

        <div class="dropdown-head">
            <h4 class="pull-left">{l s='My wishlists' mod='blockwishlistazl'}</h4>
        </div>
        <div class="dd-wrapper">
            {if $wishlist_products}
                <div id="wishlist-product-group" class="dropdown-product-list">
                    {foreach from=$wishlist_products item=product name=i}
                        <div class="dd-product-group" id="pr{$product.id_product|escape:'htmlall':'UTF-8'}">
                            <div class="dd-product-box pull-left">
                                <a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}"
                                   title="{$product.name|escape:'html':'UTF-8'}">
                                    <img src="{$product.image|escape:'htmlall':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}">
                                </a>
                            </div>
                            <div class="dd-product-desc pull-left">
                                <a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}"
                                   class="title">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>

                                <div class="qty">{l s='Qty:'  mod='blockwishlistazl'} {$product.quantity|escape:'htmlall':'UTF-8'|intval}</div>
                                <div class="qty">{l s='Wishlist:'  mod='blockwishlistazl'} {$product.wishname|escape:'htmlall':'UTF-8'}</div>

                                <a href="javascript:;"
                                   onclick="javascript:WishlistCart('wishlist_block_list', 'delete', '{$product.id_product|escape:'htmlall':'UTF-8'}', {$product.id_product_attribute|escape:'htmlall':'UTF-8'}, '0', '{if isset($token)}{$token|escape:'htmlall':'UTF-8'}{/if}');WishlistBlockUpdate();"
                                   title="{l s='remove this product from my wishlist' mod='blockwishlistazl'}"
                                   class="close-btn ddr"><i class="icon_close"></i></a>
                            </div>
                        </div>
                    {/foreach}
                </div>
            {else}
                <div class="dd-list-empty" style="display: block">{l s='No products' mod='blockwishlistazl'}</div>
            {/if}
            <a href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|addslashes|escape:'htmlall':'UTF-8'}"
               title="{l s='My wishlists' mod='blockwishlistazl'}"
               class="btn btn-md btn-third-col btn-w100">{l s='Go to Wishlist' mod='blockwishlistazl'}</a>
        </div>
    </div>
    {if !$ajax}
        </li>
        <!-- /Block wishlist module -->
    {/if}
{/if}
