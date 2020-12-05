{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- MODULE Block cart -->
{if isset($blockcart_top) && $blockcart_top}
<div class="col-md-3 hidden-sm hidden-xs{if $PS_CATALOG_MODE} header_user_catalog{/if}">
{/if}

<div id="shopping-cart-wrapper" class="dropdown shopping_cart">
	{*<div class="shopping_cart">*}
    <a href="{$link->getPageLink($order_process, true)|escape:'html':'UTF-8'}"
       title="{l s='View my shopping cart' mod='blockcart'}" rel="nofollow" class="shp-ca" data-toggle="dropdown">
        <div class="s-bag-1">
            <i class="icon-bag"></i>
        </div>
        <div class="s-cart-pan">
            <div class="s-bag-2">
                <span class="dd-products-count ajax_cart_quantity{if $cart_qties == 0} unvisible{/if}">{$cart_qties}</span>
                    <span class="ajax_cart_product_txt{if $cart_qties != 1} unvisible{/if}">{l s='Product' mod='blockcart'}
                        / </span>
                    <span class="ajax_cart_product_txt_s{if $cart_qties < 2} unvisible{/if}">{l s='Products' mod='blockcart'}
                        / </span>
                    <span class="active dd-products-price ajax_cart_total{if $cart_qties == 0} unvisible{/if}">
                        {if $cart_qties > 0}
                            {if $priceDisplay == 1}
                                {assign var='blockcart_cart_flag' value='Cart::BOTH_WITHOUT_SHIPPING'|constant}
                                {convertPrice price=$cart->getOrderTotal(false, $blockcart_cart_flag)}
                            {else}
                                {assign var='blockcart_cart_flag' value='Cart::BOTH_WITHOUT_SHIPPING'|constant}
                                {convertPrice price=$cart->getOrderTotal(true, $blockcart_cart_flag)}
                            {/if}
                        {/if}
                    </span>
                <span class="ajax_cart_no_product{if $cart_qties > 0} unvisible{/if}">{l s='(empty)' mod='blockcart'}</span>
                {if $ajax_allowed && isset($blockcart_top) && !$blockcart_top}
                    <span class="block_cart_expand{if !isset($colapseExpandStatus) || (isset($colapseExpandStatus) && $colapseExpandStatus eq 'expanded')} unvisible{/if}">&nbsp;</span>
                    <span class="block_cart_collapse{if isset($colapseExpandStatus) && $colapseExpandStatus eq 'collapsed'} unvisible{/if}">&nbsp;</span>
                {/if}
            </div>
        </div>
    </a>

		{if !$PS_CATALOG_MODE}

    <div class="dropdown-menu dropdown-menu-right larger text-left" role="menu">

        <span class="dropdown-triangle-up"></span>
        <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>

        <div class="dropdown-head">
            <h4 class="pull-left">{l s='Cart' mod='blockcart'}</h4>
        </div>

        <div class="dd-wrapper">        <div class="cart_block block exclusive">
                <div class="block_content">
                    <!-- block list of products -->
                    <div class="cart_block_list{if isset($blockcart_top) && !$blockcart_top}{if isset($colapseExpandStatus) && $colapseExpandStatus eq 'expanded' || !$ajax_allowed || !isset($colapseExpandStatus)} expanded{else} collapsed unvisible{/if}{/if}">
                        {if $products}
                            <dl class="products">
                                {foreach from=$products item='product' name='myLoop'}
                                    {assign var='productId' value=$product.id_product}
                                    {assign var='productAttributeId' value=$product.id_product_attribute}
                                    <dt data-id="cart_block_product_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
                                    <div class="dd-product-box pull-left">
                                        <a class="cart-images" href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'cart_default')}" alt="{$product.name|escape:'html':'UTF-8'}" /></a>
                                    </div>
                                    <div class="cart-info dd-product-desc pull-left">
                                        <a class="title" href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">{$product.name|escape:'html':'UTF-8'}</a>
                                        <div class="qty">{$product.cart_quantity}&nbsp;x&nbsp;<span class="active"> {if !isset($product.is_gift) || !$product.is_gift}
                                                    {if $priceDisplay == $smarty.const.PS_TAX_EXC}{displayWtPrice p="`$product.total`"}{else}{displayWtPrice p="`$product.total_wt`"}{/if}
                                                {else}
                                                    {l s='Free!' mod='blockcart'}
                                                {/if}</span></div>
                                        {if isset($product.attributes_small)}
                                            <div class="product-atributes">
                                                <a href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}" title="{l s='Product detail' mod='blockcart'}">{$product.attributes_small}</a>
                                            </div>
                                        {/if}


                                        <span class="remove_link">
                                        {if !isset($customizedDatas.$productId.$productAttributeId) && (!isset($product.is_gift) || !$product.is_gift)}
                                            <a class="ajax_cart_block_remove_link close-btn ddr" href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product}&amp;ipa={$product.id_product_attribute}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='remove this product from my cart' mod='blockcart'}"><i class="icon_close"></i></a>
                                            {*<a class="ajax_cart_block_remove_link" href="{$link->getPageLink('cart', true, NULL, 'delete=1&amp;id_product={$product.id_product}&amp;ipa={$product.id_product_attribute}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$static_token}', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='remove this product from my cart' mod='blockcart'}">&nbsp;aa</a>*}
                                        {/if}
                                        </span>

                                    </div>
                                    </dt>
                                    {if isset($product.attributes_small)}
                                        <dd data-id="cart_block_combination_of_{$product.id_product}{if $product.id_product_attribute}_{$product.id_product_attribute}{/if}_{$product.id_address_delivery|intval}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
                                    {/if}
                                    <!-- Customizable datas -->
                                    {if isset($customizedDatas.$productId.$productAttributeId[$product.id_address_delivery])}
                                        {if !isset($product.attributes_small)}
                                            <dd data-id="cart_block_combination_of_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
                                        {/if}
                                        <ul class="cart_block_customizations" data-id="customization_{$productId}_{$productAttributeId}">
                                            {foreach from=$customizedDatas.$productId.$productAttributeId[$product.id_address_delivery] key='id_customization' item='customization' name='customizations'}
                                                <li name="customization">
                                                    <div data-id="deleteCustomizableProduct_{$id_customization|intval}_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$product.id_address_delivery|intval}" class="deleteCustomizableProduct">
                                                        <a class="ajax_cart_block_remove_link" href="{$link->getPageLink("cart", true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization}&amp;token={$static_token}", false)|escape:"html":"UTF-8"}" rel="nofollow">&nbsp;</a>
                                                    </div>
                                                    {if isset($customization.datas.$CUSTOMIZE_TEXTFIELD.0)}
                                                        {$customization.datas.$CUSTOMIZE_TEXTFIELD.0.value|replace:"<br />":" "|truncate:28:'...'|escape:'html':'UTF-8'}
                                                    {else}
                                                        {l s='Customization #%d:' sprintf=$id_customization|intval mod='blockcart'}
                                                    {/if}
                                                </li>
                                            {/foreach}
                                        </ul>
                                        {if !isset($product.attributes_small)}</dd>{/if}
                                    {/if}
                                    {if isset($product.attributes_small)}</dd>{/if}
                                {/foreach}
                            </dl>
                        {/if}
                        {*<div class="dd-list-empty{if $products} unvisible{/if}">{l s='No products' mod='blockcart'}</div>*}
                        <p class="dd-list-empty cart_block_no_products{if $products} unvisible{/if}">
                            {l s='No products' mod='blockcart'}
                        </p>
                        {if $discounts|@count > 0}
                            <table class="vouchers"{if $discounts|@count == 0} style="display:none;"{/if}>
                                {foreach from=$discounts item=discount}
                                    {if $discount.value_real > 0}
                                        <tr class="bloc_cart_voucher" data-id="bloc_cart_voucher_{$discount.id_discount}">
                                            <td class="quantity">1x</td>
                                            <td class="name" title="{$discount.description}">
                                                {$discount.name|truncate:18:'...'|escape:'html':'UTF-8'}
                                            </td>
                                            <td class="price">
                                                -{if $priceDisplay == 1}{convertPrice price=$discount.value_tax_exc}{else}{convertPrice price=$discount.value_real}{/if}
                                            </td>
                                            <td class="delete">
                                                {if strlen($discount.code)}
                                                    <a class="delete_voucher" href="{$link->getPageLink("$order_process", true)}?deleteDiscount={$discount.id_discount}" title="{l s='Delete' mod='blockcart'}" rel="nofollow">
                                                        <i class="icon-remove-sign"></i>
                                                    </a>
                                                {/if}
                                            </td>
                                        </tr>
                                    {/if}
                                {/foreach}
                            </table>
                        {/if}
                        <div class="cart-prices text-center clear-all-btn cart-block-subtotal ">
                            <div class="cart-prices-line first-line">
                                <span>
                                        {l s='Shipping' mod='blockcart'}
                                    </span>
                                    <span class="price cart_block_shipping_cost ajax_cart_shipping_cost">
                                        {if $shipping_cost_float == 0}
                                            {l s='Free shipping!' mod='blockcart'}
                                        {else}
                                            {$shipping_cost}
                                        {/if}
                                    </span>

                            </div>
                            {if $show_wrapping}
                                <div class="cart-prices-line">
                                    {assign var='cart_flag' value='Cart::ONLY_WRAPPING'|constant}

                                    <span>
                                            {l s='Wrapping' mod='blockcart'}
                                        </span>
                                    <span class="price cart_block_wrapping_cost">
                                            {if $priceDisplay == 1}
                                                {convertPrice price=$cart->getOrderTotal(false, $cart_flag)}{else}{convertPrice price=$cart->getOrderTotal(true, $cart_flag)}
                                            {/if}
                                        </span>
                                </div>
                            {/if}
                            {if $show_tax && isset($tax_cost)}
                                <div class="cart-prices-line">
                                    <span>{l s='Tax' mod='blockcart'}</span>
                                    <span class="price cart_block_tax_cost ajax_cart_tax_cost">{$tax_cost}</span>
                                </div>
                            {/if}
                            <div class="cart-prices-line last-line">
                                <span>{l s='Total' mod='blockcart'}</span>
                                <span class="price cart_block_total ajax_block_cart_total">{$total}</span>
                            </div>
                            {if $use_taxes && $display_tax_label == 1 && $show_tax}
                                <p>
                                    {if $priceDisplay == 0}
                                        {l s='Prices are tax included' mod='blockcart'}
                                    {elseif $priceDisplay == 1}
                                        {l s='Prices are tax excluded' mod='blockcart'}
                                    {/if}
                                </p>
                            {/if}
                        </div>

                        <div class="row no-gutter">
                            <div class="col-xs-6">
                                <a id="button_order_carts" class="btn btn-md btn-third-col btn-w100"
                                   href="{$link->getPageLink("$order_process", true)|escape:"html":"UTF-8"}"
                                   title="{l s='View cart' mod='blockcart'}" rel="nofollow">
                            <span>
                                {l s='View cart' mod='blockcart'}<i class="icon-chevron-right right"></i>
                            </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a id="button_order_cart" class="btn btn-md btn-third-col btn-w100"
                                   href="{$link->getPageLink("$order_process", true)|escape:"html":"UTF-8"}?step=1"
                                   title="{l s='Proceed to checkout' mod='blockcart'}" rel="nofollow">
                            <span>
                                {l s='Proceed to checkout' mod='blockcart'}<i class="icon-chevron-right right"></i>
                            </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .cart_block --></div>

    </div>
        {/if}
</div>

    {if isset($blockcart_top) && $blockcart_top}
</div>
{/if}

{counter name=active_overlay assign=active_overlay}
{if !$PS_CATALOG_MODE && $active_overlay == 1}
	<div id="layer_cart">
            <div class="modal fade" id="product-added" tabindex="-1" role="dialog" aria-labelledby="product-added" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                       <a class="modal-close" data-dismiss="modal"><i class="icon_close"></i></a>
                       <h4 class="modal-title">{l s='Product successfully added to your shopping cart' mod='blockcart'}</h4>
                    </div>
                    <div class="modal-body">
                       <div id="wishlist-product-group-modal" class="dropdown-product-list">
                          <div class="dd-product-group" id="pr11">
                             <div class="dd-product-box pull-left">
                                <a href="#" title="product name">
                                    <span class="product-image-container layer_cart_img">
                                        
                                    </span>
                                </a>
                             </div>
                             <div class="dd-product-desc pull-left">
                                 <a class="title"><span id="layer_cart_product_title" class="product-name"></span></a>
                                <div class="qty"><span id="layer_cart_product_quantity">1</span> x <span class="active"><span id="layer_cart_product_price"></span></span></div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                       <div class="row no-gutter">
                          <div class="col-xs-6">
                             <a href="{$link->getPageLink("$order_process", true)|escape:"html":"UTF-8"}" class="btn btn-md btn-third-col btn-w100">{l s='Proceed to checkout' mod='blockcart'}</a>
                          </div>
                          <div class="col-xs-6">
                             <button type="button" class="continue btn btn-md btn-third-col btn-w100" data-dismiss="modal">{l s='Continue shopping' mod='blockcart'}</button>
                          </div>
                       </div>
                    </div>
                  </div>
                </div>
            </div>
	</div>
{/if}
{strip}
{addJsDef CUSTOMIZE_TEXTFIELD=$CUSTOMIZE_TEXTFIELD}
{addJsDef img_dir=$img_dir|addslashes}
{addJsDef generated_date=$smarty.now|intval}
{addJsDef ajax_allowed=$ajax_allowed|boolval}

{addJsDefL name=customizationIdMessage}{l s='Customization #' mod='blockcart' js=1}{/addJsDefL}
{addJsDefL name=removingLinkText}{l s='remove this product from my cart' mod='blockcart' js=1}{/addJsDefL}
{addJsDefL name=freeShippingTranslation}{l s='Free shipping!' mod='blockcart' js=1}{/addJsDefL}
{addJsDefL name=freeProductTranslation}{l s='Free!' mod='blockcart' js=1}{/addJsDefL}
{addJsDefL name=delete_txt}{l s='Delete' mod='blockcart' js=1}{/addJsDefL}
{/strip}
<!-- /MODULE Block cart -->