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
<!-- /Module HomepageTabsProducts -->
<section>
    <div class="container">
        <div class="gap-50"></div>
        <div class="text-center">
            <ul class="product-categories moving-hover-line" role="tablist">
                {$active="active"}
                {if isset($fproducts) AND $fproducts}
                    <li class="{$active|escape:'htmlall':'UTF-8'}">
                        <a href="#featured_products_tab" title="{l s='Featured products' mod='hompagetabs'}"
                           data-toggle="tab"
                           role="tab">{l s='Featured products' mod='hompagetabs'}</a>
                    </li>
                    {$active=false}
                {/if}
                {if isset($nproducts) AND $nproducts}
                    <li {if $active}class="{$active|escape:'htmlall':'UTF-8'}"{/if}>
                        <a href="#new_products_tab" title="{l s='New products' mod='hompagetabs'}" data-toggle="tab"
                           role="tab">{l s='New products' mod='hompagetabs'}</a>
                    </li>
                    {$active=false}
                {/if}
                {if isset($special) AND $special}
                    <li {if $active}class="{$active|escape:'htmlall':'UTF-8'}"{/if}>
                        <a href="#special_products_tab" title="{l s='Price drops' mod='hompagetabs'}"
                           data-toggle="tab" role="tab">{l s='Price drops' mod='hompagetabs'}</a>
                    </li>
                    {$active=false}
                {/if}
                {if isset($categories) AND $categories}
                    {foreach from=$categories item=category}
                        {if isset($category.products) AND $category.products}
                            <li {if $active}class="{$active|escape:'htmlall':'UTF-8'}"{/if}>
                                <a href="#category_products_tab_{$category.id|escape:'htmlall':'UTF-8'}" data-toggle="tab"
                                   role="tab">{$category.name|escape:'htmlall':'UTF-8'}</a>
                            </li>
                            {$active=false}
                        {/if}
                    {/foreach}
                {/if}
                <li class="hover-line"></li>
            </ul>
        </div>

        <div class="tab-content tab-no-style">
            {$activeTab=" in active"}
            {if isset($fproducts) AND $fproducts}
            <div class="tab-pane fade{if $activeTab}{$activeTab|escape:'htmlall':'UTF-8'}{/if}" id="featured_products_tab">
            <div class="products-list pl-carousel">
                <div class="pl-pages">

                    {if isset($fproducts_productimg)}
                        {include file="$tpl_dir./product-list.tpl" productimg=$fproducts_productimg products=$fproducts}
                    {else}
                        {include file="$tpl_dir./product-list.tpl" products=$fproducts}
                    {/if}
                </div>
            </div>
        </div>
        {$activeTab=false}
        {/if}

        {if isset($nproducts) AND $nproducts}
        <div class="tab-pane fade{if $activeTab}{$activeTab|escape:'htmlall':'UTF-8'}{/if}" id="new_products_tab">
        <div class="products-list pl-carousel">
            <div class="pl-pages">
                {if isset($nproducts_productimg)}
                    {include file="$tpl_dir./product-list.tpl" productimg=$nproducts_productimg products=$nproducts}
                {else}
                    {include file="$tpl_dir./product-list.tpl" products=$nproducts}
                {/if}
            </div>
        </div>
    </div>
    {$activeTab=false}
    {/if}

    {if isset($special) AND $special}
        <div class="tab-pane fade{if $activeTab}{$activeTab|escape:'htmlall':'UTF-8'}{/if}" id="special_products_tab">
        <div class="products-list pl-carousel">
            <div class="pl-pages">
                {if isset($sproducts_productimg)}
                    {include file="$tpl_dir./product-list.tpl" productimg=$sproducts_productimg products=$special}
                {else}
                    {include file="$tpl_dir./product-list.tpl" products=$special}
                {/if}
            </div>
        </div>
        </div>
        {$activeTab=false}
    {/if}

    {if isset($categories) AND $categories}
        {foreach from=$categories item=category}
            {if isset($category.products) AND $category.products}
                <div class="tab-pane fade{if $activeTab}{$activeTab|escape:'htmlall':'UTF-8'}{/if}" id="category_products_tab_{$category.id|escape:'htmlall':'UTF-8'}">
                <div class="products-list pl-carousel">
                    <div class="pl-pages">
                        {if isset($category.productimg)}
                            {include file="$tpl_dir./product-list.tpl" products=$category.products productimg=$category.productimg}
                        {else}
                            {include file="$tpl_dir./product-list.tpl" products=$category.products}
                        {/if}
                    </div>
                </div>
                </div>
                {$activeTab=false}
            {/if}

        {/foreach}
    {/if}
    </div>
    </div>
</section>
<!-- /Module HomepageTabsProducts -->