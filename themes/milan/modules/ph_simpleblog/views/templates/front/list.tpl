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


{capture name=pageTitle}
	{if $is_category eq true}
		<h1>{$blogCategory->name|escape:'html':'UTF-8'}</h1>
	{else}
		<h1>{$blogMainTitle|escape:'html':'UTF-8'}</h1>
	{/if}
{/capture}

{capture name=path}
	<a href="{$link->getModuleLink('ph_simpleblog', 'list')|escape:'html':'UTF-8'}">
		{l s='Blog' mod='ph_simpleblog'}
	</a>
	{if $is_category eq true}
		<span class="navigation-pipe">
			{$navigationPipe|escape:'html':'UTF-8'}
		</span>
		{$blogCategory->name|escape:'html':'UTF-8'}
	{/if}
{/capture}

<div class="container container-sm-fullwidth">
	<div class="row">
		<div class="gap-60"></div>
		<div class="{if !$hide_left_column || !$hide_right_column}col-md-8{else}col-md-12{/if}
			{if !$hide_left_column && $hide_right_column}col-md-push-4{/if}
		   blog container-collapse clearfix simpleblog-{if $is_category}category{else}home{/if}">


			{if Configuration::get('PH_BLOG_DISPLAY_CATEGORY_IMAGE') && isset($blogCategory->image)}
				<div class="simpleblog-category-image">
					<img src="{$blogCategory->image|escape:'html':'UTF-8'}" alt="{$blogCategory->name|escape:'html':'UTF-8'}" class="img-responsive" />
				</div>
			{/if}

			{if !empty($blogCategory->description) && Configuration::get('PH_BLOG_DISPLAY_CAT_DESC')}
				<div class="ph_cat_description">
					{$blogCategory->description}
				</div>
			{/if}

			{if isset($posts) && count($posts)}
				<div class="simpleblog-posts row" itemscope="itemscope" itemtype="http://schema.org/Blog">

					{foreach from=$posts item=post}

						{if $blogLayout eq 'grid'}
							{include file="./item/grid.tpl"}
						{elseif $blogLayout eq 'full'}
							{include file="./item/fullwidth.tpl"}
						{/if}

					{/foreach}

				</div><!-- .row -->

				{if $is_category}
					{include file="./pagination.tpl" rewrite=$blogCategory->link_rewrite type='category'}
				{else}
					{include file="./pagination.tpl" rewrite=false type=false}
				{/if}
			{else}
				<p class="warning alert alert-warning">{l s='There are no posts' mod='ph_simpleblog'}</p>
			{/if}


		</div> <!-- simpleblog -->

		{if !$hide_right_column}
			<div class="col-md-4 sidebar">
				<div class="col-xs-12 container-collapse">
					<div class="col-xs-12">
						<div class="gap-30"></div>
						{hook h="displayLeftColumn"}
					</div>
				</div>
			</div>
		{elseif !$hide_left_column}
			<div class="col-md-4 col-md-pull-8 sidebar">
				<div class="col-xs-12 container-collapse">
					<div class="col-xs-12">
						<div class="gap-30"></div>
						{hook h="displayLeftColumn"}
					</div>
				</div>
			</div>
		{/if}


	</div> <!-- row -->
</div> <!-- container -->
