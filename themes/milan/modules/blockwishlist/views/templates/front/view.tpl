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
{capture name=path}
    <a href="{$link->getPageLink('my-account', true)|escape:'html'}">{l s='My account' mod='blockwishlist'}</a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    <a href="{$link->getModuleLink('blockwishlist', 'mywishlist')|escape:'html'}">{l s='My wishlists' mod='blockwishlist'}</a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    {$current_wishlist.name}
{/capture}
{capture name=pageTitle}
    {l s='Wishlist' mod='blockwishlist'}
{/capture}
<div id="view_wishlist">
    <div class="container" id="order-detail-content">
    {if $wishlists}
        <p>
            <h6 class="account-table-head">
                {l s='Other wishlists of %1s %2s:' sprintf=[$current_wishlist.firstname, $current_wishlist.lastname] mod='blockwishlist'}
            {foreach from=$wishlists item=wishlist name=i}
                {if $wishlist.id_wishlist != $current_wishlist.id_wishlist}
                    <a href="{$link->getModuleLink('blockwishlist', 'view', ['token' => $wishlist.token])|escape:'html':'UTF-8'}" rel="nofollow" title="{$wishlist.name}">
                        {$wishlist.name}
                    </a>
                    {if !$smarty.foreach.i.last}
                        /
                    {/if}
                {/if}
            {/foreach}
            </h6>
        </p>
    {/if}
    {if $products}
    <table class="table table-bordered" id="cart_summary">
        {assign var='nbItemsPerLine' value=3}
        {assign var='nbItemsPerLineTablet' value=2}
        {assign var='nbLi' value=$products|@count}
        {math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
        {math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}
        <thead>
           <tr>
              <th colspan="2" class="cart_product first_item">{l s='Product name' mod='blockwishlist'}</th>
              <th class="cart_quantity item">{l s='Quantity' mod='blockwishlist'}</th>
              <th class="cart_quantity item">{l s='Priority' mod='blockwishlist'}</th>
              <th class="cart_delete last_item">{l s='Action' mod='blockwishlist'}</th>
           </tr>
        </thead>
        <tbody>
            {foreach from=$products item=product name=i}
                {math equation="(total%perLine)" total=$smarty.foreach.i.total perLine=$nbItemsPerLine assign=totModulo}
                {math equation="(total%perLineT)" total=$smarty.foreach.i.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet}
                {if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if}
                {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if}
                <tr id="wlp_{$product.id_product}_{$product.id_product_attribute}" class="cart_item first_item address_0 odd dd-product-group">
                    <td class="cart_product">
                        <a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}">
                           <img src="{$link->getImageLink($product.link_rewrite, $product.cover, 'cart_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}"/>
                        </a>
                    </td>
                    <td class="cart_description">
                       <p class="product-name">
                          <a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}">
                            {$product.name|escape:'html':'UTF-8'}
                          </a>
                       </p>
                       {if isset($product.attributes_small)}
                            <small>
                                <a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}" title="{l s='Product detail' mod='blockwishlist'}">
                                    {$product.attributes_small|escape:'html':'UTF-8'}
                                </a>
                            </small>
                        {/if}
                    </td>
                    <td class="cart_quantity text-center">
                       <div class="cart_quantity_button clrfix">
                          <a title="Subtract" href="#" class="cart_quantity_down btn btn-default btn-minus" rel="nofollow">-</a>
                          <input type="text" class="cart_quantity_input form-control grey count" autocomplete="off" disabled id="quantity_{$product.id_product}_{$product.id_product_attribute}" value="{$product.quantity|intval}" size="2"/>
                          <a title="Add" href="#" class="cart_quantity_up btn btn-default btn-plus" rel="nofollow">+</a>
                       </div>
                    </td>
                    <td>
                        <span><strong>{l s='Priority' mod='blockwishlist'}:</strong> {$product.priority_name}</span>
                    </td>
                    <td class="cart_delete text-center">
                       <div>
                            <div class="btn_action">
                                {if isset($product.attribute_quantity) AND $product.attribute_quantity >= 1 OR !isset($product.attribute_quantity) AND $product.product_quantity >= 1}
                                    {if !$ajax}
                                        <form id="addtocart_{$product.id_product|intval}_{$product.id_product_attribute|intval}"
                                              action="{$link->getPageLink('cart')|escape:'html':'UTF-8'}"
                                              method="post">
                                            <p class="hidden">
                                                <input type="hidden" name="id_product"
                                                       value="{$product.id_product|intval}"
                                                       id="product_page_product_id"/>
                                                <input type="hidden" name="add" value="1"/>
                                                <input type="hidden" name="token" value="{$token}"/>
                                                <input type="hidden" name="id_product_attribute"
                                                       id="idCombination"
                                                       value="{$product.id_product_attribute|intval}"/>
                                            </p>
                                        </form>
                                    {/if}
                                    <a
                                            href="javascript:void(0);"
                                            class="btn btn-sec-col"
                                            onclick="WishlistBuyProduct('{$token|escape:'html':'UTF-8'}', '{$product.id_product}', '{$product.id_product_attribute}', '{$product.id_product}_{$product.id_product_attribute}', this, {$ajax});"
                                            title="{l s='Add to cart' mod='blockwishlist'}"
                                            rel="nofollow">
                                        <span>{l s='Add to cart' mod='blockwishlist'}</span>
                                    </a>
                                {else}
                                    <span class="button ajax_add_to_cart_button btn btn-default disabled">
                                                                                        <span>{l s='Add to cart' mod='blockwishlist'}</span>
                                                                                </span>
                                {/if}
                                <a
                                        class="btn btn-prim-col"
                                        href="{$link->getProductLink($product.id_product,  $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}"
                                        title="{l s='View' mod='blockwishlist'}"
                                        rel="nofollow">
                                    <span>{l s='View' mod='blockwishlist'}</span>
                                </a>
                            </div>
                       </div>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    {else}
        <div class="alert alert-danger">
            {l s='No products' mod='blockwishlist'}
        </div>
    {/if}
    </div>
</div> <!-- #view_wishlist -->