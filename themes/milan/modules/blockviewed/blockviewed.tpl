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

<!-- Block Viewed products -->
<div class="widget wg-viwed-products box-with-pager mobile-collapse">
    <h3 class="wg-title mobile-collapse-header">{l s='Viewed products' mod='blockviewed'}</h3>
    <div class="wg-body mobile-collapse-body">
       <ul class="wgvp-list">
            {foreach from=$productsViewedObj item=viewedProduct name=myLoop}
                <li class="wgvp-item">
                    <a href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
                       title="{l s='More about %s' mod='blockviewed' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}" >
                        <figure>
                           <img src="{if isset($viewedProduct->id_image) && $viewedProduct->id_image}{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'small_default')}{else}{$img_prod_dir}{$lang_iso}-default-medium_default.jpg{/if}" 
                                 alt="{$viewedProduct->legend|escape:'html':'UTF-8'}" />
                        </figure>
                    </a>
                    <div class="wgvp-item-body">
                        <p class="wgvp-item-title">
                            <a href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
                                title="{l s='More about %s' mod='blockviewed' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}">
                                        {$viewedProduct->name|escape:'html':'UTF-8'}
                            </a>
                        </p>
                    </div>
                </li>
            {/foreach}
       </ul>
    </div>
 </div> <!-- widget -->
 <!-- Block Viewed products -->