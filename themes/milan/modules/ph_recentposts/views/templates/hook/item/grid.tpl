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

{assign var='post_type' value=$post.post_type}

<div class="news-item simpleblog-post-item simpleblog-post-type-{$post.post_type|escape:'html':'UTF-8'}
				{if $blogLayout eq 'grid' AND $columns eq '3'}
					col-md-4 col-sm-6 {cycle values="first-in-line,second-in-line,last-in-line"}
				{elseif $blogLayout eq 'grid' AND $columns eq '4'}
					col-md-3 col-sm-6 {cycle values="first-in-line,second-in-line,third-in-line,last-in-line"}
				{elseif $blogLayout eq 'grid' AND $columns eq '2'}
					col-md-6 col-sm-12 {cycle values="first-in-line,last-in-line"}
				{else}
				col-md-12
				{/if}" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<div class="ni-thumbnail">
		{if $post_type != 'post' && file_exists("$tpl_path./types/$post_type/thumbnail.tpl")}
			{include file="./../types/$post_type/thumbnail.tpl"}
		{else}
			{if isset($post.banner) && Configuration::get('PH_BLOG_DISPLAY_THUMBNAIL')}
				<div class="post-thumbnail" itemscope itemtype="http://schema.org/ImageObject">
					<a class="img-zoom-link" href="{$post.url|escape:'html':'UTF-8'}" title="{l s='Permalink to' mod='ph_recentposts'} {$post.title|escape:'html':'UTF-8'}" itemprop="contentUrl">
						<i class="icon-plus"></i>
						{if $blogLayout eq 'full'}
							<img src="{$post.banner_wide|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl" />
						{else}
							<img src="{$post.banner_thumb|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl"/>
						{/if}
					</a>
				</div><!-- .post-thumbnail -->
			{/if}
		{/if}
	</div>

	<div class="ni-body">
		<h3 class="ni-title">
			<a href="{$post.url|escape:'html':'UTF-8'}" title="{l s='Permalink to' mod='ph_recentposts'} {$post.title|escape:'html':'UTF-8'}">
				{$post.title|escape:'html':'UTF-8'}
			</a>
		</h3>
		<hr class="ni-title-line"/>
		<p>{$post.short_content|strip_tags:'UTF-8'}</p>
			<span class="ni-info">
				{if Configuration::get('PH_BLOG_DISPLAY_DATE')}
					<span class="ni-date"><i class="icon_calendar"></i>{$post.date_add|date_format:Configuration::get('PH_BLOG_DATEFORMAT')}</span>
				{/if}
				{*<span class="ni-commments"><i class="icon_comment_alt"></i>15 comments</span>*}
			</span>
	</div>
</div>

