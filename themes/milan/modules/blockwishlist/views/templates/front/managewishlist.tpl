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

{if $products}
    {assign var='boughtsProducts' value=0}
    {foreach from=$productsBoughts item=product name=i}
        {foreach from=$product.bought item=bought name=j}
            {if $bought.quantity > 0}
                {assign var='boughtsProducts' value=1}
            {/if}
        {/foreach}
    {/foreach}
    {if !$refresh}
        <div class="wishlistLinkTop">
        
        <ul class="clearfix display_list">
            <li>
                <a  id="hideBoughtProducts" class="btn btn-sm btn-sec-col" href="#" onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;" title="{l s='Hide products' mod='blockwishlist'}">
                    {l s='Hide products' mod='blockwishlist'}
                </a>
                <a id="showBoughtProducts" class="btn btn-sm btn-prim-col" href="#" onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;" title="{l s='Show products' mod='blockwishlist'}">
                    {l s='Show products' mod='blockwishlist'}
                </a>
            </li>
            {if count($productsBoughts) && $boughtsProducts == 1}
                <li>
                    <a id="hideBoughtProductsInfos" class="btn btn-sm btn-sec-col" href="#" onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;" title="{l s='Hide products' mod='blockwishlist'}">
                        {l s="Hide bought product's info" mod='blockwishlist'}
                    </a>
                    <a id="showBoughtProductsInfos" class="btn btn-sm btn-prim-col" href="#" onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;" title="{l s='Show products' mod='blockwishlist'}">
                        {l s="Show bought product's info" mod='blockwishlist'}
                    </a>
                </li>
            {/if}
            <li class="pull-right">
                <a id="hideSendWishlist" class="btn remove ddr"  href="#" onclick="WishlistVisibility('wishlistLinkTop', 'SendWishlist'); return false;" rel="nofollow" title="{l s='Close this wishlist' mod='blockwishlist'}">
                    <i class="icon_close"></i> {l s='Close this wishlist' mod='blockwishlist'}
                </a>
            </li>
        </ul>
        <div class="row">
            <div class="required form-group search col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="{$link->getModuleLink('blockwishlist', 'view', ['token' => $token_wish])|escape:'html':'UTF-8'}" readonly="readonly"/>
            </div>
            <div class="col-sm-3 col-xs-12">
                <a id="showSendWishlist" class="btn btn-sec-col" href="#" onclick="WishlistWsSendToggle(); return false;" title="{l s='Send this wishlist' mod='blockwishlist'}">
                    {l s='Send this wishlist' mod='blockwishlist'}
                </a>
            </div>
        </div>
    {/if}
    <div class="wlp_bought gap-30">
        <table class="table table-bordered" id="cart_summary">
            {assign var='nbItemsPerLine' value=4}
            {assign var='nbItemsPerLineTablet' value=3}
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
                            <select id="priority_{$product.id_product}_{$product.id_product_attribute}" class="s-styled form-control grey">
                                <option value="0"{if $product.priority eq 0} selected="selected"{/if}>
                                    {l s='High' mod='blockwishlist'}
                                </option>
                                <option value="1"{if $product.priority eq 1} selected="selected"{/if}>
                                    {l s='Medium' mod='blockwishlist'}
                                </option>
                                <option value="2"{if $product.priority eq 2} selected="selected"{/if}>
                                    {l s='Low' mod='blockwishlist'}
                                </option>
                            </select>
                        </td>
                        <td class="cart_delete text-center">
                           <div>
                                <a class="btn btn-sec-col"  href="javascript:;" onclick="WishlistProductManage('wlp_bought_{$product.id_product_attribute}', 'update', '{$id_wishlist}', '{$product.id_product}', '{$product.id_product_attribute}', $('#quantity_{$product.id_product}_{$product.id_product_attribute}').val(), $('#priority_{$product.id_product}_{$product.id_product_attribute}').val());WishlistBlockUpdate();" title="{l s='Save' mod='blockwishlist'}">
                                    <span>{l s='Save' mod='blockwishlist'}</span>
                                </a>
                                <br/>
                                <a class="lnkdel btn remove ddr" href="javascript:;" onclick="WishlistProductManage('wlp_bought', 'delete', '{$id_wishlist}', '{$product.id_product}', '{$product.id_product_attribute}', $('#quantity_{$product.id_product}_{$product.id_product_attribute}').val(), $('#priority_{$product.id_product}_{$product.id_product_attribute}').val());WishlistBlockUpdate();" title="{l s='Delete' mod='blockwishlist'}">
                                    <i class="icon_close"></i> {l s='Delete' mod='blockwishlist'}
                                </a>
                           </div>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    {if !$refresh}
        <form method="post" class="form-horizontal wl_send box unvisible" onsubmit="return (false);">
            <h6>{l s='Send this wishlist' mod='blockwishlist'}</h6>
            <fieldset>
                <div class="required form-group">
                    <label class="col-sm-2 control-label"  for="email1">{l s='Email' mod='blockwishlist'}1 <sup>*</sup></label>
                    <div class="col-sm-10">
                        <input type="text" name="email1" id="email1" class="form-control"/>
                    </div>
                </div>
                {section name=i loop=11 start=2}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email{$smarty.section.i.index}">{l s='Email' mod='blockwishlist'}{$smarty.section.i.index}</label>
                        <div class="col-sm-10">
                            <input type="text" name="email{$smarty.section.i.index}" id="email{$smarty.section.i.index}"
                               class="form-control"/>
                        </div>
                    </div>
                {/section}
                <div class="form-group">
                    <div class="required col-sm-10 col-md-offset-2">
                        <sup>*</sup> {l s='Required field' mod='blockwishlist'}
                    </div>
                </div>
                <div class="submit text-right">
                    <button class="btn btn-third-col" type="submit" name="submitWishlist"
                            onclick="WishlistSend('wl_send', '{$id_wishlist}', 'email');">
                        <span>{l s='Send' mod='blockwishlist'}</span>
                    </button>
                    <button onclick="WishlistWsSendToggle();return false;" class="btn btn-prim-col">
                        {l s='Cancel' mod='blockwishlist'}
                    </button>
                </div>
                
            </fieldset>
        </form>
        {if count($productsBoughts) && $boughtsProducts == 1}
            <table class="wlp_bought_infos unvisible table table-bordered resp-tbl" id="cart_summary">
                <thead>
                <tr>
                    <th colspan="2" class="first_item">{l s='Product' mod='blockwishlist'}</th>
                    <th class="item">{l s='Quantity' mod='blockwishlist'}</th>
                    <th class="item">{l s='Offered by' mod='blockwishlist'}</th>
                    <th class="last_item">{l s='Date' mod='blockwishlist'}</th>
                </tr>
                </thead>
                <tbody>
                {foreach from=$productsBoughts item=product name=i}
                    {foreach from=$product.bought item=bought name=j}
                        {if $bought.quantity > 0}
                            <tr>
                                <td class="cart_product">
                                    <div class="resp-tbl-head">{l s='Product' mod='blockwishlist'}</div>
                                    <div class="resp-tbl-cnt">
                                        <a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}">
                                            <img src="{$link->getImageLink($product.link_rewrite, $product.cover, 'cart_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}"/>
                                        </a>
                                    </div>
                                    
                                </td>
                                <td class="cart_description hidden-xs">
                                    <div class="resp-tbl-head">{l s='Quantity' mod='blockwishlist'}</div>
                                    <div class="resp-tbl-cnt">
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
                                    </div>
                                </td>
                                <td class="item align_center">
                                    <div class="resp-tbl-head">{l s='Quantity' mod='blockwishlist'}</div>
                                    <div class="resp-tbl-cnt">
                                        {$bought.quantity|intval}
                                    </div>
                                </td>
                                <td class="item align_center">
                                    <div class="resp-tbl-head">{l s='Offered by' mod='blockwishlist'}</div>
                                    <div class="resp-tbl-cnt">
                                        {$bought.firstname} {$bought.lastname}
                                    </div>
                                </td>
                                <td class="last_item align_center">
                                    <div class="resp-tbl-head">{l s='Date' mod='blockwishlist'}</div>
                                    <div class="resp-tbl-cnt">
                                        {$bought.date_add|date_format:"%Y-%m-%d"}
                                    </div>
                                </td>
                            </tr>
                        {/if}
                    {/foreach}
                {/foreach}
                </tbody>
            </table>
        {/if}
    {/if}
{else}
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {l s='No products' mod='blockwishlist'}
    </div>
{/if}
