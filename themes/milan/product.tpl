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
{include file="$tpl_dir./errors.tpl"}
{capture name=pageTitle}
    {$product->name|escape:'html':'UTF-8'}
{/capture}

{if $errors|@count == 0}
	{if !isset($priceDisplayPrecision)}
		{assign var='priceDisplayPrecision' value=2}
	{/if}
	{if !$priceDisplay || $priceDisplay == 2}
		{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, $priceDisplayPrecision)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}
	{elseif $priceDisplay == 1}
		{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, $priceDisplayPrecision)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL)}
	{/if}
<div class="container clearfix">
    {if !$content_only}
    <div class="row">
        <div class="container">
            {if ((isset($milan_settings) && $milan_settings.product_page_product_navigation) || !isset($milan_settings))}
            <div class="col-xs-12 product-top-line">
               <a class="btn btn-yet-col col-xs-2 back-catalog pull-left upcs" href="{$link->getCategoryLink($category)}">{l s='Back in catalog'}</a>
               <div class="pull-right">
                   {if isset($prevProduct)}
                     <div class="previous-product">
                      <a href="{$link->getProductLink($prevProduct)}">
                          <img alt="{$prevProduct.name}" title="{$prevProduct.name}" src="{$link->getImageLink($prevProduct.link_rewrite, $prevProduct.id_image, 'prev_next')|escape:'html':'UTF-8'}">
                          <span class="arrow_carrot-left"></span>
                      </a>
                     </div>
                  {/if}

                  {if isset($nextProduct)}
                  <div class="next-product">
                      <a href="{$link->getProductLink($nextProduct)}">
                          <img alt="{$nextProduct.name}" title="{$nextProduct.name}" src="{$link->getImageLink($nextProduct.link_rewrite, $nextProduct.id_image, 'prev_next')|escape:'html':'UTF-8'}">
                          <span class="arrow_carrot-right"></span>
                      </a>
                  </div>
                  {/if}
               </div>
            </div>
            {else}
                <div class="gap-15"></div>
            {/if}
        </div>
    </div>
    {else}
        <div class="gap-20"></div>
    {/if}
<div itemscope itemtype="http://schema.org/Product">
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
    <div class="row">
        <div class="col-md-6 col-lg-7 col-xs-12 product-images">
            <div class="clearfix zoom-content">
                <a href="#" class="btn btn-yet-col" id="product-pupGallery-button" data-target="#product-pupGallery-box" data-toggle="modal">
                    <span class="icon-magnifier-add"></span>
                </a>
                <div aria-hidden="true" aria-labelledby="product-added" role="dialog" tabindex="-1" id="product-pupGallery-box" class="modal fade" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                           <a href="#" class="modal-close" data-dismiss="modal" aria-hidden="true"><i class="icon_close"></i></a>
                           <h4 class="modal-title">{l s='Information'}</h4>
                        </div>
                        <div class="modal-body modal-body-info">
                           <div class="clearfix zoom-content-2">
                              <div class="clearfix big-image">
                                    {if $have_image}    
                                        <img id="zoom_04" data-zoom-image="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'thickbox_default')|escape:'html':'UTF-8'}" itemprop="image" src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" width="{$largeSize.width}" height="{$largeSize.height}"/>
                                    {else}
                                        <img id="zoom_04" itemprop="image" data-zoom-image="{$img_prod_dir}{$lang_iso}-default-thickbox_default.jpg" src="{$img_prod_dir}{$lang_iso}-default-large_default.jpg" id="bigpic" alt="" title="{$product->name|escape:'html':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}"/>          
                                    {/if}
                              </div>
                                {if isset($images) && count($images) > 0}
				<!-- thumbnails -->
                                <div class="clearfix thumbnails {if isset($images) && count($images) < 2}hidden{/if}">
                                    <ul id="thumblist2" class="clearfix">
                                    {if isset($images)}
                                            {foreach from=$images item=image name=thumbnails}
                                                    {assign var=imageIds value="`$product->id`-`$image.id_image`"}
                                                    {if !empty($image.legend)}
                                                            {assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
                                                    {else}
                                                            {assign var=imageTitle value=$product->name|escape:'html':'UTF-8'}
                                                    {/if}
                                                    <li id="thumbnail2_{$image.id_image}"{if $smarty.foreach.thumbnails.last} class="last"{/if}>
                                                        <a href="#" class="elevatezoom-gallery" data-update="" title="{$imageTitle}"
                                                            data-image="{$link->getImageLink($product->link_rewrite, $image.id_image, 'large_default')|escape:'html':'UTF-8'}" 
                                                            data-zoom-image="{$link->getImageLink($product->link_rewrite, $image.id_image, 'thickbox_default')|escape:'html':'UTF-8'}">
                                                                <img class="img-responsive" id="thumb_{$image.id_image}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'cart_default')|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}" height="{$cartSize.height}" width="{$cartSize.width}" itemprop="image" />
                                                        </a>
                                                    </li>
                                            {/foreach}
                                    {/if}
                                    </ul>
				</div> <!-- end views-block -->
				<!-- end thumbnails -->
                                {/if}
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                {hook h="displayProductImagesExtra"}        
                    
                    
                    <!-- main slider -->
                <div class="clearfix big-image product-page">
                    {if $have_image}    
                        <img id="zoom_03" data-zoom-image="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'thickbox_default')|escape:'html':'UTF-8'}" itemprop="image" src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" width="{$largeSize.width}" height="{$largeSize.height}"/>
                    {else}
                        <img itemprop="image" data-zoom-image="{$img_prod_dir}{$lang_iso}-default-thickbox_default.jpg" src="{$img_prod_dir}{$lang_iso}-default-large_default.jpg" id="bigpic" alt="" title="{$product->name|escape:'html':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}"/>          
                    {/if}
                </div>
                  <br/>
                  {if isset($images) && count($images) > 0}
                    <!-- thumbnails -->
                    <div id="thumbs_list" class="clearfix thumbnails {if isset($images) && count($images) < 2}hidden{/if}">
                        <ul id="thumblist" class="clearfix">
                        {if isset($images)}
                                {foreach from=$images item=image name=thumbnails}
                                        {assign var=imageIds value="`$product->id`-`$image.id_image`"}
                                        {if !empty($image.legend)}
                                                {assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
                                        {else}
                                                {assign var=imageTitle value=$product->name|escape:'html':'UTF-8'}
                                        {/if}
                                        <li id="thumbnail_{$image.id_image}"{if $smarty.foreach.thumbnails.last} class="last"{/if}>
                                            <a href="#" class="elevatezoom-gallery shown" data-update="" title="{$imageTitle}"
                                                data-image="{$link->getImageLink($product->link_rewrite, $image.id_image, 'large_default')|escape:'html':'UTF-8'}" 
                                                data-zoom-image="{$link->getImageLink($product->link_rewrite, $image.id_image, 'thickbox_default')|escape:'html':'UTF-8'}">
                                                    <img id="thumb_{$image.id_image}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'cart_default')|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}" height="{$cartSize.height}" width="{$cartSize.width}" itemprop="image" />
                                            </a>
                                        </li>
                                {/foreach}
                        {/if}
                        </ul>
                    </div> <!-- end views-block -->
                    <!-- end thumbnails -->
                    {/if}
                  <!-- !main slider -->
            </div><!-- !zoom-content -->
            <div class="article-info col-xs-12">
                {if isset($HOOK_EXTRA_RIGHT) && $HOOK_EXTRA_RIGHT}{$HOOK_EXTRA_RIGHT}{/if}
                <div class="for-border-top print-wrapp">
                    <span class="print">
                        <a href="javascript:print();">
                            <span class="icon_printer-alt"></span>{l s='Print'}
                        </a>
                    </span>
                </div>
             </div> 
        </div>
                  <div class="col-md-6 col-lg-5 col-xs-12 product-info">
                {if $jqZoomEnabled && $have_image && !$content_only}
               <div id="zoom-window-container" style="position: relative;"></div>
               {/if}
               <div class="product-reviews">
                  <h3>{$product->name|escape:'html':'UTF-8'}</h3>
                    {if ((isset($milan_settings) && $milan_settings.product_page_product_reference) || !isset($milan_settings))}
                        {if !empty($product->reference) || $product->reference}
                         <p id="product_reference" class="data-info"{if empty($product->reference) || !$product->reference} style="display: none;"{/if}>{l s='Reference'}: <span class="editable">{$product->reference}</span></p>
                        {/if}
                   {/if}
                  {hook h="displayProductListReviews" product=['id_product' => $product->id]}
               </div>
                  {if $product_manufacturer->id}
                  <a href="{$link->getmanufacturerLink($product_manufacturer->id, $product_manufacturer->link_rewrite)|escape:'html':'UTF-8'}">
                    <img src="{$img_manu_dir}{$product_manufacturer->id|escape:'html':'UTF-8'}-medium_default.jpg" alt="#" class="brand">
                  </a>
                  {/if}
               <div class="hr"></div>
               <div class="price">
                  
                        <span class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                {if $product->quantity > 0}<link itemprop="availability" href="http://schema.org/InStock"/>{/if}
                                {if $priceDisplay >= 0 && $priceDisplay <= 2}
                                        <span id="our_price_display" itemprop="price">{convertPrice price=$productPrice}</span>
                                        <!--{if $tax_enabled  && ((isset($display_tax_label) && $display_tax_label == 1) || !isset($display_tax_label))}
                                                {if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}
                                        {/if}-->
                                        <meta itemprop="priceCurrency" content="{$currency->iso_code}" />
                                        {hook h="displayProductPriceBlock" product=$product type="price"}
                                {/if}
                        </span>
                        <span class="old-price" id="old_price"{if (!$product->specificPrice || !$product->specificPrice.reduction) && $group_reduction == 0} class="hidden"{/if}>
                                {if $priceDisplay >= 0 && $priceDisplay <= 2}
                                        {hook h="displayProductPriceBlock" product=$product type="old_price"}
                                        <span id="old_price">{if $productPriceWithoutReduction > $productPrice}{convertPrice price=$productPriceWithoutReduction}{/if}</span>
                                        {if $tax_enabled && $display_tax_label == 1}{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}{/if}
                                {/if}
                        </span>
                   {if $product->specificPrice.reduction_type == 'percentage'}<span class="pl-discount-percent">-{$product->specificPrice.reduction * 100}%</span>
                   {/if}
                        {if $priceDisplay == 2}
                                <br />
                                <span id="pretaxe_price">
                                        <span id="pretaxe_price_display">{convertPrice price=$product->getPrice(false, $smarty.const.NULL)}</span>
                                        {l s='tax excl.'}
                                </span>
                        {/if}
               </div>
                {if $PS_STOCK_MANAGEMENT}
                        {hook h="displayProductDeliveryTime" product=$product}
                        <p class="warning_inline" id="last_quantities"{if ($product->quantity > $last_qties || $product->quantity <= 0) || $allow_oosp || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none"{/if} >{l s='Warning: Last items in stock!'}</p>
                {/if}
{*
               <div class="hr"></div>
        {if ((isset($milan_settings) && $milan_settings.product_page_product_reference) || !isset($milan_settings))}
                    {if !empty($product->reference) || $product->reference}
                     <p class="data-info"{if empty($product->reference) || !$product->reference} style="display: none;"{/if}>{l s='Model'}: <span>{$product->reference}</span></p>
                    {/if}
               {/if}
               {if ((isset($milan_settings) && $milan_settings.product_page_show_product_condition) || !isset($milan_settings))}
                {if $product->condition}
                 <p id="product_condition" class="data-info">
                         {l s='Condition'}:
                         {if $product->condition == 'new'}
                                 <link itemprop="itemCondition" href="http://schema.org/NewCondition"/>
                                 <span class="editable">{l s='New'}</span>
                         {elseif $product->condition == 'used'}
                                 <link itemprop="itemCondition" href="http://schema.org/UsedCondition"/>
                                 <span class="editable">{l s='Used'}</span>
                         {elseif $product->condition == 'refurbished'}
                                 <link itemprop="itemCondition" href="http://schema.org/RefurbishedCondition"/>
                                 <span class="editable">{l s='Refurbished'}</span>
                         {/if}
                 </p>
                 {/if}
                {/if}
               {if $product->tags}
                    <p class="data-info">{l s='Tags'}: <span>
                        {foreach from=$product->tags.1 item=tag name=tags}
                            {$tag}{if !$smarty.foreach.tags.last}, {/if}
                       {/foreach}
                    </span></p>
               {/if}
               <p class="data-info">{l s='Category'}: <span>{$category->name}</span></p>
    *}
               {if $product->description_short}
                    <div class="hr"></div>
                    <p>{$product->description_short}</p>
               {/if}
{*          {if $features}
 *              <div class="col-xs-12 tech-info">
 *               {foreach from=$features item=feature}
 *                   <div class="col-sm-4 col-xs-12">
 *                           {if isset($feature.value)}
 *                           <span>{$feature.value|escape:'html':'UTF-8'}</span>
 *                           {/if}
 *                   </div>
 *                   {/foreach}
 *              </div>
 *              {/if}
*}
               <div class="hr"></div>
               <span id="color-lbl">
               <span class="data-info secondary-font-family">{l s='COLOR'}: <span id="color-label"></span></span>
               </span>
               {if $PS_STOCK_MANAGEMENT}
                        <!-- availability -->
                        <p class="availability" {if ($product->quantity <= 0 && !$product->available_later && $allow_oosp) || ($product->quantity > 0 && !$product->available_now) || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>&emsp;|&emsp;{l s='Availability:'} 
                                
                                <span class="availability_value {if $product->quantity <= 0}out-stock-lbl{else}in-stock-lbl{/if} {if $product->quantity <= 0 && !$allow_oosp}warning_inline{/if}">
                                    {if $product->quantity <= 0}
                                        {if $allow_oosp}
                                            <span class="out-stock"></span>{$product->available_later}
                                        {else}
                                            <span class="out-stock"></span>{l s='This product is no longer in stock'}
                                        {/if}
                                    {else}
                                        <span class="in-stock"></span>{$product->available_now}
                                    {/if}
                                </span>
                        </p>
                        {hook h="displayProductDeliveryTime" product=$product}
                        <p class="warning_inline" id="last_quantities"{if ($product->quantity > $last_qties || $product->quantity <= 0) || $allow_oosp || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none"{/if} >{l s='Warning: Last items in stock!'}</p>
                {/if}
                {if ($product->show_price && !isset($restricted_country_mode)) || isset($groups) || $product->reference || (isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS)}
                    <!-- add to cart form-->
                    <form id="buy_block"{if $PS_CATALOG_MODE && !isset($groups) && $product->quantity > 0} class="hidden"{/if} action="{$link->getPageLink('cart')|escape:'html':'UTF-8'}" method="post">
                            <!-- hidden datas -->
                            <p class="hidden">
                                    <input type="hidden" name="token" value="{$static_token}" />
                                    <input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="id_product_attribute" id="idCombination" value="" />
                            </p>
                            <div class="box-info-product">
                                    <div class="product_attributes clearfix">
                                            
                                            {if isset($groups)}
                                                    <!-- attributes -->
                                                    <div id="attributes">
                                                            <div class="clearfix"></div>
                                                            {foreach from=$groups key=id_attribute_group item=group}
                                                                    {if $group.attributes|@count}
                                                                            
                                                                                    
                                                                                    {assign var="groupName" value="group_$id_attribute_group"}
                                                                                    <div class="attribute_list">
                                                                                            {if ($group.group_type == 'select')}
                                                                                                    <span class="data-info upcs secondary-font-family">{$group.name|escape:'html':'UTF-8'} :&nbsp;</span>
                                                                                                    <select name="{$groupName}" id="group_{$id_attribute_group|intval}" class="form-control attribute_select no-print">
                                                                                                            {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                                                                                    <option value="{$id_attribute|intval}"{if (isset($smarty.get.$groupName) && $smarty.get.$groupName|intval == $id_attribute) || $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'html':'UTF-8'}">{$group_attribute|escape:'html':'UTF-8'}</option>
                                                                                                            {/foreach}
                                                                                                    </select>
                                                                                            {elseif ($group.group_type == 'color')}
                                                                                                <div class="color-blocks" id="color_to_pick_list">
                                                                                                    <ul id="color_to_pick_list" class="clearfix color-blocks">
                                                                                                            {assign var="default_colorpicker" value=""}
                                                                                                            {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                                                                                    {assign var='img_color_exists' value=file_exists($col_img_dir|cat:$id_attribute|cat:'.jpg')}
                                                                                                                    <li class="color {if $group.default == $id_attribute}selected{/if}">
                                                                                                                            <a data-value="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" href="{$link->getProductLink($product)|escape:'html':'UTF-8'}" id="color_{$id_attribute|intval}" name="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" class="color_pick{if ($group.default == $id_attribute)} selected{/if}"{if !$img_color_exists && isset($colors.$id_attribute.value) && $colors.$id_attribute.value} style="background-color:{$colors.$id_attribute.value|escape:'html':'UTF-8'};"{/if} title="{$colors.$id_attribute.name|escape:'html':'UTF-8'}">
                                                                                                                                    {if $img_color_exists}
                                                                                                                                            <img src="{$img_col_dir}{$id_attribute|intval}.jpg" alt="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" title="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" width="20" height="20" />
                                                                                                                                    {/if}
                                                                                                                            </a>
                                                                                                                    </li>
                                                                                                                    {if ($group.default == $id_attribute)}
                                                                                                                            {$default_colorpicker = $id_attribute}
                                                                                                                    {/if}
                                                                                                            {/foreach}
                                                                                                    </ul>
                                                                                                    <input type="hidden" class="color_pick_hidden" name="{$groupName|escape:'html':'UTF-8'}" value="{$default_colorpicker|intval}" />
                                                                                                </div>
                                                                                                    
                                                                                            {elseif ($group.group_type == 'radio')}
                                                                                                    <span class="data-info upcs secondary-font-family">{$group.name|escape:'html':'UTF-8'} :&nbsp;</span>
                                                                                                    <div class="size-blocks">
                                                                                                            {foreach from=$group.attributes key=id_attribute item=group_attribute}
                                                                                                                <div class="radio-inline size">
                                                                                                                    <input class="attribute_radio" type="radio" name="{$groupName|escape:'html':'UTF-8'}" value="{$id_attribute}" id="radio-size-{$id_attribute}" {if ($group.default == $id_attribute)} checked="checked"{/if}>
                                                                                                                    <label for="radio-size-{$id_attribute}">{$group_attribute|escape:'html':'UTF-8'}</label>
                                                                                                                </div>
                                                                                                            {/foreach}
                                                                                                    </div>
                                                                                            {/if}
                                                                                    </div> <!-- end attribute_list -->
                                                                                    <div class="hr"></div>
                                                                    {/if}
                                                            {/foreach}
                                                    </div> <!-- end attributes -->
                                            {/if}
                                            <!-- quantity wanted -->
                                            {if !$PS_CATALOG_MODE}
                                            <div class="cart_quantity_button clrfix product-count pull-left"{if (!$allow_oosp && $product->quantity <= 0) || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>
                                                <a rel="nofollow" class="btn btn-default btn-minus" href="#" title="Subtract">&ndash;</a>
                                                <input id="quantity_wanted" type="text" disabled="" size="2" autocomplete="off" class="cart_quantity_input form-control grey count" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" name="qty">
                                                <a rel="nofollow" class="btn btn-default btn-plus" href="#" title="Add">+</a>
                                            </div>
                                            {/if}
                                            <div id="add_to_cart" class="pull-left">
                                                <button  class="{if (!$allow_oosp && $product->quantity <= 0) || !$product->available_for_order || (isset($restricted_country_mode) && $restricted_country_mode) || $PS_CATALOG_MODE}unvisible{/if} btn btn-sec-col pull-left add-cart" type="submit" name="Submit"><i class="icon-bag"></i>&nbsp;&nbsp;{l s='Add to cart'}</button>
                                            </div>
                                            {if ((isset($milan_settings) && $milan_settings.product_page_functional_buttons) || !isset($milan_settings))}
                                                {if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}
                                                {if ((isset($milan_settings) && $milan_settings.product_page_show_compare_button) || !isset($milan_settings))}
                                                    {if isset($comparator_max_item) && $comparator_max_item}
                                                        <a class="btn btn-gray add_to_compare" href="" data-id-product="{$product->id}"><span class="arrow_left-right_alt"></span></a>
                                                    {/if}
                                                {/if}
                                            {/if}
                                            <!-- minimal quantity wanted -->
                                            <p id="minimal_quantity_wanted_p"{if $product->minimal_quantity <= 1 || !$product->available_for_order || $PS_CATALOG_MODE} style="display: none;"{/if}>
                                                    {l s='This product is not sold individually. You must select at least'} <b id="minimal_quantity_label">{$product->minimal_quantity}</b> {l s='quantity for this product.'}
                                            </p>
                                    </div> <!-- end product_attributes -->
                            </div> <!-- end box-info-product -->
                    </form>
                    {/if}
               <div class="hr"></div>
               <div class="product-tabs">
                  <!-- Nav tabs -->
                  <ul role="tablist" class="nav nav-tabs">
                    {if $product->description}
                        <li class="active upcs"><a data-toggle="tab" role="tab" href="#tab-description">{l s='More info'}</a></li>
                    {/if}
                    {if isset($features) && $features}
                        <li class="upcs"><a data-toggle="tab" role="tab" href="#tab-additional-info">{l s='Data sheet'}</a></li>
                    {/if}
                    {$HOOK_PRODUCT_TAB}
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                      {if $product->description}
                        <div id="tab-description" class="tab-pane active">
                           <p>{$product->description}</p>
                        </div>
                      {/if}
                     {if isset($features) && $features}
                     <div id="tab-additional-info" class="tab-pane">
                        
                                <!-- Data sheet -->
                                <section class="page-product-box table-container">
                                        <table class="table-data-sheet table table-bordered">
                                                {foreach from=$features item=feature}
                                                <tr class="{cycle values="odd,even"}">
                                                        {if isset($feature.value)}
                                                        <th>{$feature.name|escape:'html':'UTF-8'}</th>
                                                        <td>{$feature.value|escape:'html':'UTF-8'}</td>
                                                        {/if}
                                                </tr>
                                                {/foreach}
                                        </table>
                                </section>
                                <!--end Data sheet -->
                        
                     </div>  
                    {/if}
                    {if isset($HOOK_PRODUCT_TAB_CONTENT) && $HOOK_PRODUCT_TAB_CONTENT}{$HOOK_PRODUCT_TAB_CONTENT}{/if}
                  </div>
               </div>
            </div>
    </div>
</div>
{if !$hide_left_column}
<div class="col-md-3 {if !$hide_left_column && !$hide_right_column}col-md-pull-6{else}col-md-pull-9{/if} cat-sidebar">
    <aside>
        {hook h="displayLeftColumn"}
    </aside>
</div>
{/if}
{if !$hide_right_column}
<div class="col-md-3 cat-sidebar">
    <aside>
        {hook h="displayRightColumn"}
    </aside>
</div>
{/if}
</div>
</div> <!-- itemscope product wrapper -->
</div>
{if !$content_only}
{if isset($HOOK_PRODUCT_FOOTER) && $HOOK_PRODUCT_FOOTER}{$HOOK_PRODUCT_FOOTER}{/if}
{/if}
{if $content_only}
    {literal}
        <script type="text/javascript">
            $(function(){
                $('body').css('background', '#FFFFFF');
            })
        </script>
    {/literal}
{/if}
{strip}
{if isset($smarty.get.ad) && $smarty.get.ad}
	{addJsDefL name=ad}{$base_dir|cat:$smarty.get.ad|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{if isset($smarty.get.adtoken) && $smarty.get.adtoken}
	{addJsDefL name=adtoken}{$smarty.get.adtoken|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{addJsDef allowBuyWhenOutOfStock=$allow_oosp|boolval}
{addJsDef availableNowValue=$product->available_now|escape:'quotes':'UTF-8'}
{addJsDef availableLaterValue=$product->available_later|escape:'quotes':'UTF-8'}
{addJsDef attribute_anchor_separator=$attribute_anchor_separator|addslashes}
{addJsDef attributesCombinations=$attributesCombinations}
{addJsDef currencySign=$currencySign|html_entity_decode:2:"UTF-8"}
{addJsDef currencyRate=$currencyRate|floatval}
{addJsDef currencyFormat=$currencyFormat|intval}
{addJsDef currencyBlank=$currencyBlank|intval}
{addJsDef currentDate=$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}
{if isset($combinations) && $combinations}
	{addJsDef combinations=$combinations}
	{addJsDef combinationsFromController=$combinations}
	{addJsDef displayDiscountPrice=$display_discount_price}
	{addJsDefL name='upToTxt'}{l s='Up to' js=1}{/addJsDefL}
{/if}
{if isset($combinationImages) && $combinationImages}
	{addJsDef combinationImages=$combinationImages}
{/if}
{addJsDef customizationFields=$customizationFields}
{addJsDef default_eco_tax=$product->ecotax|floatval}
{addJsDef displayPrice=$priceDisplay|intval}
{addJsDef ecotaxTax_rate=$ecotaxTax_rate|floatval}
{addJsDef group_reduction=$group_reduction}
{if isset($cover.id_image_only)}
	{addJsDef idDefaultImage=$cover.id_image_only|intval}
{else}
	{addJsDef idDefaultImage=0}
{/if}
{addJsDef img_ps_dir=$img_ps_dir}
{addJsDef img_prod_dir=$img_prod_dir}
{addJsDef id_product=$product->id|intval}
{addJsDef jqZoomEnabled=$jqZoomEnabled|boolval}
{addJsDef maxQuantityToAllowDisplayOfLastQuantityMessage=$last_qties|intval}
{addJsDef minimalQuantity=$product->minimal_quantity|intval}
{addJsDef noTaxForThisProduct=$no_tax|boolval}
{addJsDef customerGroupWithoutTax=$customer_group_without_tax|boolval}
{addJsDef oosHookJsCodeFunctions=Array()}
{addJsDef productHasAttributes=isset($groups)|boolval}
{addJsDef productPriceTaxExcluded=($product->getPriceWithoutReduct(true)|default:'null' - $product->ecotax)|floatval}
{addJsDef productBasePriceTaxExcluded=($product->base_price - $product->ecotax)|floatval}
{addJsDef productBasePriceTaxExcl=($product->base_price|floatval)}
{addJsDef productReference=$product->reference|escape:'html':'UTF-8'}
{addJsDef productAvailableForOrder=$product->available_for_order|boolval}
{addJsDef productPriceWithoutReduction=$productPriceWithoutReduction|floatval}
{addJsDef productPrice=$productPrice|floatval}
{addJsDef productUnitPriceRatio=$product->unit_price_ratio|floatval}
{addJsDef productShowPrice=(!$PS_CATALOG_MODE && $product->show_price)|boolval}
{addJsDef PS_CATALOG_MODE=$PS_CATALOG_MODE}
{if $product->specificPrice && $product->specificPrice|@count}
	{addJsDef product_specific_price=$product->specificPrice}
{else}
	{addJsDef product_specific_price=array()}
{/if}
{if $display_qties == 1 && $product->quantity}
	{addJsDef quantityAvailable=$product->quantity}
{else}
	{addJsDef quantityAvailable=0}
{/if}
{addJsDef quantitiesDisplayAllowed=$display_qties|boolval}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'percentage'}
	{addJsDef reduction_percent=$product->specificPrice.reduction*100|floatval}
{else}
	{addJsDef reduction_percent=0}
{/if}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'amount'}
	{addJsDef reduction_price=$product->specificPrice.reduction|floatval}
{else}
	{addJsDef reduction_price=0}
{/if}
{if $product->specificPrice && $product->specificPrice.price}
	{addJsDef specific_price=$product->specificPrice.price|floatval}
{else}
	{addJsDef specific_price=0}
{/if}
{addJsDef specific_currency=($product->specificPrice && $product->specificPrice.id_currency)|boolval} {* TODO: remove if always false *}
{addJsDef stock_management=$stock_management|intval}
{addJsDef taxRate=$tax_rate|floatval}
{addJsDefL name=doesntExist}{l s='This combination does not exist for this product. Please select another combination.' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMore}{l s='This product is no longer in stock' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMoreBut}{l s='with those attributes but is available with others.' js=1}{/addJsDefL}
{addJsDefL name=fieldRequired}{l s='Please fill in all the required fields before saving your customization.' js=1}{/addJsDefL}
{addJsDefL name=uploading_in_progress}{l s='Uploading in progress, please be patient.' js=1}{/addJsDefL}
{addJsDefL name='product_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='product_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}
{addJsDef comparator_max_item=$comparator_max_item}
{addJsDef comparedProductsIds=$compared_products}
{/strip}
{/if}
