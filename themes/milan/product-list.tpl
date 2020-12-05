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
{if isset($products) && $products}
	{*define numbers of product per line in other page for desktop*}
    {if $page_name !='index' && $page_name !='product'}
		{assign var='nbItemsPerLine' value=3}
		{assign var='nbItemsPerLineTablet' value=2}
		{assign var='nbItemsPerLineMobile' value=3}
	{else}
		{assign var='nbItemsPerLine' value=4}
		{assign var='nbItemsPerLineTablet' value=3}
		{assign var='nbItemsPerLineMobile' value=2}
	{/if}
	{*define numbers of product per line in other page for tablet*}
	{assign var='nbLi' value=$products|@count}
	{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
	{math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}
	<!-- Products list -->
        
	
	{foreach from=$products item=product name=products}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$nbItemsPerLine assign=totModulo}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet}
		{math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile}
		{if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if}
		{if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if}
		{if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}
		<div data-product-id="{$product.id_product}" class="col-sm-6 pl-item ajax_block_product{if $page_name == 'index' || $page_name == 'product'} col-md-3 pl-item{else} col-md-4 pl-item{/if}">
			<div class="product-container" itemscope itemtype="http://schema.org/Product">
				<figure>
                    <a class="product_img_link"	href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
                        {if isset($productimg[$product.id_product]) && !empty($productimg[$product.id_product])}
                            <img src="{$link->getImageLink($product.link_rewrite,$product.id_product|cat:"-"|cat:$productimg[$product.id_product].0.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" itemprop="image" />
                            {if isset($productimg[$product.id_product].1) && !empty($productimg[$product.id_product].1)}
                                <span class="pl-backside">
                                    <img src="{$link->getImageLink($product.link_rewrite,$product.id_product|cat:"-"|cat:$productimg[$product.id_product].1.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" />
                                </span>
                            {/if}
                        {else}
                            <img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}"  itemprop="image" />
                        {/if}
                    </a>
                    {if isset($product.new) && $product.new == 1}
                        <label class="pl-badge-new">{l s='New'}</label>
                    {/if}
                    {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                        <label class="pl-badge-sale">{l s='Sale!'}</label>
                    {elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                        <span class="pl-badge-sale">{l s='Reduced price!'}</span>
                    {/if}
                    <figcaption>
                        {if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
                            {if ($product.allow_oosp || $product.quantity > 0)}
                                {if isset($static_token)}
                                    <a href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$product.id_product|intval}" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i> <span>{l s='Add to cart'}</span></a>
                                {else}
                                    <a href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$product.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$product.id_product|intval}" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i> <span>{l s='Add to cart'}</span></a>
                                {/if}
                            {else}
                                <a href="javascript: void(0)" style="pointer-events:none;" class="pl-button pl-addcart" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i> <span>{l s='Add to cart'}</span></a>
                            {/if}
                        {/if}
                        {if isset($quick_view) && $quick_view}
                            {if (isset($milan_settings) && $milan_settings.quick_view_popup && $milan_settings.product_list_show_quick_view_button) || !isset($milan_settings)}
                                <a class="pl-button pl-qview quick-view" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}" data-toggle="tooltip" data-placement="top" title="{l s='Quick view'}"><i class="icon-eye"></i></a>
                            {/if}
                        {/if}
                        {if ((isset($milan_settings) && $milan_settings.product_list_show_compare_button) || !isset($milan_settings))}
                            {if (isset($comparator_max_item) && $comparator_max_item)}
                            <a href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}" class="pl-button pl-compare add_to_compare" data-toggle="tooltip" data-placement="top" title="{l s='Add to Compare'}"><i class="arrow_left-right_alt"></i> <span>{l s='Add to Compare'}</span></a>
                            {/if}
                        {/if}
                        {hook h='displayProductListFunctionalButtons' product=$product}
                    </figcaption>
                </figure>
                <div class="plv-exerpt">
                    {$product.description_short|truncate:200:'...'|strip_tags:'UTF-8'}
                </div>
                <div class="pl-caption" style="height: 120px">
                    <div class="col-xs-6 plv-availability"><span class="plva-label">Availability:</span>
                        {if (!$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                           {if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
                               <span itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="stock-status {if $product.quantity <= 0}out-stock-lbl{else}in-stock-lbl{/if}">
                                   {if ($product.allow_oosp || $product.quantity > 0)}
                                       <link itemprop="availability" href="http://schema.org/InStock" />
                                           {if $product.quantity <= 0}
                                               {if $product.allow_oosp}
                                                   {if isset($product.available_later) && $product.available_later}
                                                       {$product.available_later}
                                                   {else}
                                                       <i class="dot-green"></i> {l s='In Stock'}
                                                   {/if}
                                               {else}
                                                   <i class="dot-grey"></i> {l s='Out of stock'}
                                               {/if}
                                           {else}
                                               {if isset($product.available_now) && $product.available_now}
                                                   <i class="dot-green"></i> {$product.available_now}
                                               {else}
                                                   <i class="dot-green"></i> {l s='In Stock'}
                                               {/if}
                                           {/if}
                                   {elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
                                       <link itemprop="availability" href="http://schema.org/LimitedAvailability" /> {l s='Product available with different options'}
                                   {else}
                                       <link itemprop="availability" href="http://schema.org/OutOfStock" /><i class="dot-grey"></i> {l s='Out of stock'}
                                   {/if}
                                   {*{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                                       {if isset($product.online_only) && $product.online_only}
                                           <span class="online_only">{l s='Online only'}</span>
                                       {/if}
                                   {/if}*}
                               </span>
                           {/if}
                       {/if}
                    </div>
                    {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                        <p class="pl-price-block" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                <span itemprop="price" class="pl-price product-price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
                                <meta itemprop="priceCurrency" content="{$currency->iso_code}" />
                                {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                                    {hook h="displayProductPriceBlock" product=$product type="old_price"}
                                    <span class="pl-price-old product-price">{displayWtPrice p=$product.price_without_reduction}</span>
                                    {if $product.specific_prices.reduction_type == 'percentage'}<span class="pl-discount-percent">-{$product.specific_prices.reduction * 100}%</span>
                                    {/if}
                                {/if}
                                {hook h="displayProductPriceBlock" product=$product type="price"}
                                {hook h="displayProductPriceBlock" product=$product type="unit_price"}
                            {/if}
                        </p>
                    {/if}
                    {hook h="displayProductDeliveryTime" product=$product}
                    {hook h="displayProductPriceBlock" product=$product type="weight"}

                    {if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
                    <a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
                        <p class="pl-name">{$product.name|escape:'html':'UTF-8'}</p>
                    </a>
					{hook h='displayProductListReviews' product=$product}
				</div>
			</div><!-- .product-container> -->
		</div>
	{/foreach}
{addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
{addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
{addJsDef comparator_max_item=$comparator_max_item}
{addJsDef comparedProductsIds=$compared_products}
{/if}
