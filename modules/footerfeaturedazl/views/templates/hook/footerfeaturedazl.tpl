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
<!-- MODULE Footer Featured Products -->
<div class="col-md-4">
	<div class="most-popular-box box-with-pager mobile-collapse">
		<div class="title-type-1 mobile-collapse-header">
			{l s='Most Popular' mod='footerfeaturedazl'}
		</div>
		{if isset($products) AND $products}
		<div class="mobile-collapse-body">
			{assign var='nbItemsPerCol' value=3}
			<ul class="vertical-bx-1">
				{foreach from=$products item=product name=homeFooterProducts}
                {math equation="(total%perLine)" total=$smarty.foreach.homeFooterProducts.total perLine=$nbItemsPerCol assign=totModulo}
				{if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerCol}{/if}
                    {if $smarty.foreach.homeFooterProducts.first}
                        <li>
                    {/if}
						<a href="{$product.link|escape:'html':'UTF-8'}">
							<figure>
								<span class="img-cover">
									<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" height="{$smallSize.height|escape:'html':'UTF-8'}" width="{$smallSize.width|escape:'html':'UTF-8'}" class="pic" />
								</span>
								<figcaption>
									{$product.name|truncate:35:'...'|escape:'html':'UTF-8'}
									{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}<span class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{else}<div style="height:21px;"></div>{/if}
								</figcaption>
							</figure>
						</a>
                    {if $smarty.foreach.homeFooterProducts.last}
                        </li>
                    {elseif $smarty.foreach.homeFooterProducts.iteration%$nbItemsPerCol == 0}
                        </li><li>
                    {/if}
                    {/foreach}
			</ul>
		</div>
		{else}
			<p>{l s='No popular products' mod='footerfeaturedazl'}</p>
		{/if}
	</div>
</div>
<!-- /MODULE Footer Featured Products -->
