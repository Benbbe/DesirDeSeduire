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
<!-- MODULE Block specials -->
<div class="widget wg-specials box-with-pager mobile-collapse">
    <h3 class="wg-title mobile-collapse-header">
        <a href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}" title="{l s='Specials' mod='blockspecials'}">
            {l s='Specials' mod='blockspecials'}
        </a>
    </h3>
    <div class="wg-body mobile-collapse-body">
        {if $special}
            <ul class="vertical-bx-1">
               <li class="wgsp-item">
                  <a class="products-block-image" href="{$special.link|escape:'html':'UTF-8'}">
                     <figure>
                        <img 
                            src="{$link->getImageLink($special.link_rewrite, $special.id_image, 'specials_block_default')|escape:'html':'UTF-8'}" 
                            alt="{$special.legend|escape:'html':'UTF-8'}" 
                            title="{$special.name|escape:'html':'UTF-8'}" />
                     </figure>
                  </a>
                     <p class="wgsp-title">
                        <a class="product-name" href="{$special.link|escape:'html':'UTF-8'}" title="{$special.name|escape:'html':'UTF-8'}">
                            {$special.name|escape:'html':'UTF-8'}
                        </a>
                     </p>
                    {if !$PS_CATALOG_MODE}
                        <p class="wgsp-price">
                            {if !$priceDisplay}
                                {displayWtPrice p=$special.price}{else}{displayWtPrice p=$special.price_tax_exc}
                            {/if}
                            <span class="old-price">
                                {if !$priceDisplay}
                                    {displayWtPrice p=$special.price_without_reduction}{else}{displayWtPrice p=$priceWithoutReduction_tax_excl}
                                {/if}
                            </span>
                            {if $special.specific_prices}
                                {assign var='specific_prices' value=$special.specific_prices}
                                {if $specific_prices.reduction_type == 'percentage' && ($specific_prices.from == $specific_prices.to OR ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' <= $specific_prices.to && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $specific_prices.from))}
                                    <span class="price-percent-reduction">-{$specific_prices.reduction*100|floatval}%</span>
                                {/if}
                            {/if}
                            
                        </p>
                    {/if}
                  <div class="row no-gutter">
                     <div class="col-xs-6">
                        {if ($special.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $special.available_for_order && !isset($restricted_country_mode) && $special.minimal_quantity <= 1 && $special.customizable != 2 && !$PS_CATALOG_MODE}
                            {if ($special.allow_oosp || $special.quantity > 0)}
                                {if isset($static_token)}
                                    <a href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$special.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$special.id_product|intval}" class="btn btn-third-col btn-w100 ajax_add_to_cart_button" title="{l s='Add to cart'}">{l s='Add to cart' mod='blockspecials'}</a>
                                {else}
                                    <a href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$special.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$special.id_product|intval}" class="btn btn-third-col btn-w100 ajax_add_to_cart_button" title="{l s='Add to cart'}">{l s='Add to cart' mod='blockspecials'}</a>
                                {/if}
                            {else}
                                <a href="javascript: void(0)" style="pointer-events:none;" class="btn btn-third-col btn-w100 pl-addcart" title="{l s='Add to cart' mod='blockspecials'}">{l s='Add to cart' mod='blockspecials'}</a>
                            {/if}
                        {/if}
                     </div>
                     <div class="col-xs-6">
                         <a class="btn btn-grey btn-w100" 
                            href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}" 
                            title="{l s='All specials' mod='blockspecials'}">
                                <span>{l s='All specials' mod='blockspecials'}</span>
                            </a>
                     </div>
                  </div>
               </li>
            </ul>
       {/if}
    </div>
</div> <!-- widget -->
<!-- /MODULE Block specials -->