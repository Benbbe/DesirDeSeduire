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
{if count($categoryProducts) > 0 && $categoryProducts !== false}
    <section>
         <div class="container best-product">
            <div class="col-xs-12">
                <h6 class="upcs">{$categoryProducts|@count} {l s='other products in the same category:' mod='productscategory'}</h6>
            </div>
            <div class="gap-70"></div>
            <div class="products-list pl-carousel">
               <ul class="pl-pages">
                   
                  <li class="active">
                     <div class="row">
                        {foreach from=$categoryProducts item='categoryProduct' name=categoryProduct}
                        <div class="col-md-3 col-sm-6 pl-item">
                           <figure>
                              <a class="product_img_link" href="{$categoryProduct.link|escape:'html':'UTF-8'}" title="{$categoryProduct.name|escape:'html':'UTF-8'}" itemprop="url">
                                    {if isset($categoryProductimg[$categoryProduct.id_product]) && !empty($categoryProductimg[$categoryProduct.id_product])}
                                        <img src="{$link->getImageLink($categoryProduct.link_rewrite,$categoryProduct.id_product|cat:"-"|cat:$categoryProductimg[$categoryProduct.id_product].0.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}" itemprop="image" />
                                        {if isset($categoryProductimg[$categoryProduct.id_product].1) && !empty($categoryProductimg[$categoryProduct.id_product].1)}
                                            <span class="pl-backside">
                                                <img src="{$link->getImageLink($categoryProduct.link_rewrite,$categoryProduct.id_product|cat:"-"|cat:$categoryProductimg[$categoryProduct.id_product].1.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}" />
                                            </span>
                                        {/if}
                                    {else}
                                        <img src="{$link->getImageLink($categoryProduct.link_rewrite, $categoryProduct.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($categoryProduct.legend)}{$categoryProduct.legend|escape:'html':'UTF-8'}{else}{$categoryProduct.name|escape:'html':'UTF-8'}{/if}"  itemprop="image" />
                                    {/if}
                                </a>
                              <figcaption>
                                    {if ($categoryProduct.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $categoryProduct.available_for_order && !isset($restricted_country_mode) && $categoryProduct.minimal_quantity <= 1 && $categoryProduct.customizable != 2 && !$PS_CATALOG_MODE}
                                        {if ($categoryProduct.allow_oosp || $categoryProduct.quantity > 0)}
                                            {if isset($static_token)}
                                                <a href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$categoryProduct.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$categoryProduct.id_product|intval}" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i></a>
                                            {else}
                                                <a href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$categoryProduct.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" data-id-product="{$categoryProduct.id_product|intval}" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i></a>
                                            {/if}
                                        {else}
                                            <a href="javascript: void(0)" style="pointer-events:none;" class="pl-button pl-addcart" data-toggle="tooltip" data-placement="top" title="{l s='Add to cart'}"><i class="icon-bag"></i></a>
                                        {/if}
                                    {/if}
                                    {if isset($quick_view) && $quick_view}
                                        {if (isset($milan_settings) && $milan_settings.quick_view_popup) || !isset($milan_settings)}
                                            <a class="pl-button pl-qview quick-view" href="{$categoryProduct.link|escape:'html':'UTF-8'}" rel="{$categoryProduct.link|escape:'html':'UTF-8'}" data-toggle="tooltip" data-placement="top" title="{l s='Quick view'}"><i class="icon-eye"></i></a>
                                        {/if}
                                    {/if}
                                    {if isset($comparator_max_item) && $comparator_max_item}
                                        <a href="{$categoryProduct.link|escape:'html':'UTF-8'}" data-id-product="{$categoryProduct.id_product}" class="pl-button pl-compare add_to_compare" data-toggle="tooltip" data-placement="top" title="{l s='Add to Compare'}"><i class="arrow_left-right_alt"></i></a>
                                    {/if}
                                    {hook h='displayProductListFunctionalButtons' product=$categoryProduct}
                                </figcaption>
                           </figure>
                           <div class="pl-caption">
                                {if $ProdDisplayPrice AND $categoryProduct.show_price == 1 AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE} 
                                    <p class="pl-price-block">
                                        {if isset($categoryProduct.specific_prices) && $categoryProduct.specific_prices}
                                            <span class="pl-price-old">{displayWtPrice p=$categoryProduct.price_without_reduction}</span>
                                        {/if}
                                        <span class="pl-price{if isset($categoryProduct.specific_prices) && $categoryProduct.specific_prices} special-price{/if}">
                                            {convertPrice price=$categoryProduct.displayed_price}
                                        </span>
                                    </p>
                                {else}
                                    <hr />
                                {/if}
                              <p class="pl-name">{$categoryProduct.name|truncate:40:'...'|escape:'html':'UTF-8'}</p>
                              {*hook h='displayProductListReviews' product=$categoryProduct*}
                           </div>
                        </div>
                           {if ($smarty.foreach.categoryProduct.index + 1) is div by 4}
                               {if !$smarty.foreach.categoryProduct.last}
                                    </div>
                                    </li>
                                    <li class="">
                                    <div class="row">
                                {/if}
                            {/if}
                            {if $smarty.foreach.categoryProduct.last}
                                    </div>
                                </li>
                            {/if}
                        {/foreach}
                     
                  
               </ul>
                {if $categoryProducts|@count > 4}
                <div class="pl-controls">
                   <a href="#" class="pl-ctl-left"></a>
                   <a href="#" class="pl-ctl-right"></a>
                </div>
               {/if}
            </div>
         </div>
      </section>
{/if}