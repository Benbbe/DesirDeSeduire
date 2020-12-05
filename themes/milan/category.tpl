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

{if isset($category)}
    <div class="container">
        <div class="gap-70 hidden-xs"></div>
        <div class="row">
            <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if} cat-content">
                
	{if $category->id AND $category->active}
    	{if $scenes || $category->description || $category->id_image}
            	 {*if $scenes}
                 	<div class="content_scene">
                        <!-- Scenes -->
                        {include file="$tpl_dir./scenes.tpl" scenes=$scenes}
                        {if $category->description}
                            <div class="cat_desc rte">
                            {if Tools::strlen($category->description) > 350}
                                <div id="category_description_short">{$description_short}</div>
                                <div id="category_description_full" class="unvisible">{$category->description}</div>
                                <a href="{$link->getCategoryLink($category->id_category, $category.link_rewrite)|escape:'html':'UTF-8'}" class="lnk_more">{l s='More'}</a>
                            {else}
                                <div>{$category->description}</div>
                            {/if}
                            </div>
                        {/if}
                    </div>
                {else*}
                    <!-- Category image -->
                    {if $category->id_image}
                        <img class="img-responsive" src="{$link->getCatImageLink($category->link_rewrite, $category->id_image, 'category_default')|escape:'html':'UTF-8'}" alt="">
                    {/if}
                    {if $category->description}
                        {if isset($milan_settings) && $milan_settings.category_show_description == 0}
                            
                        {else}
                            <div class="cat-description">{$category->description}</div>
                        {/if}
                    {/if}
                  {/if}
		
		{capture name=pageTitle}
                        <span class="cat-name">{$category->name|escape:'html':'UTF-8'}{if isset($categoryNameComplement)}&nbsp;{$categoryNameComplement|escape:'html':'UTF-8'}{/if}</span>{include file="$tpl_dir./category-count.tpl"}
                {/capture}
		{if $products}
                    
                    <div class="content_sortPagiBar clearfix">
                        {include file="./product-sort.tpl"}
                        <div class="cat-pagination category-product-count">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-count">
                                        {if ($n*$p) < $nb_products }
                                                {assign var='productShowing' value=$n*$p}
                                        {else}
                                                {assign var='productShowing' value=($n*$p-$nb_products-$n*$p)*-1}
                                        {/if}
                                        {if $p==1}
                                                {assign var='productShowingStart' value=1}
                                        {else}
                                                {assign var='productShowingStart' value=$n*$p-$n+1}
                                        {/if}
                                        {if $nb_products > 1}
                                                {l s='Showing %1$d - %2$d of %3$d items' sprintf=[$productShowingStart, $productShowing, $nb_products]}
                                                {else}
                                                {l s='Showing %1$d - %2$d of 1 item' sprintf=[$productShowingStart, $productShowing]}
                                        {/if}
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    {if isset($milan_settings) && $milan_settings.category_display_top_pagination == 0}
                                    {else}
                                        {include file="$tpl_dir./pagination.tpl"}
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-content tab-no-style">
                        <div class="tab-pane in active" id="pl-grid">
                            <div class="products-list">
                                <div class="row">
                                    {include file="./product-list.tpl" products=$products}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_sortPagiBar clearfix">
                        {include file="./product-sort.tpl"}
                        <div class="cat-pagination category-product-count">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-count">
                                        {if ($n*$p) < $nb_products }
                                                {assign var='productShowing' value=$n*$p}
                                        {else}
                                                {assign var='productShowing' value=($n*$p-$nb_products-$n*$p)*-1}
                                        {/if}
                                        {if $p==1}
                                                {assign var='productShowingStart' value=1}
                                        {else}
                                                {assign var='productShowingStart' value=$n*$p-$n+1}
                                        {/if}
                                        {if $nb_products > 1}
                                                {l s='Showing %1$d - %2$d of %3$d items' sprintf=[$productShowingStart, $productShowing, $nb_products]}
                                                {else}
                                                {l s='Showing %1$d - %2$d of 1 item' sprintf=[$productShowingStart, $productShowing]}
                                        {/if}
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    {include file="$tpl_dir./pagination.tpl" paginationId='bottom'}
                                </div>
                            </div>
                        </div>
                    </div>
		{/if}
	{elseif $category->id}
		<p class="alert alert-warning">{l s='This category is currently unavailable.'}</p>
	{/if}
{/if}
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
</div>