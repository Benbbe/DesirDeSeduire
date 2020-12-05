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

<div class="simpleblog-post-item short-post col-xs-12" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="row">

		<div class="col-sm-1 col-xs-12 left-info">

			<div class="icon hidden-xs"><span class="icon-pencil"></span></div>

			{if Configuration::get('PH_BLOG_DISPLAY_DATE')}
				<div class="date">{$post.date_add|date_format:Configuration::get('PH_BLOG_DATEFORMAT')}</div>
			{/if}

			{if Configuration::get('PH_BLOG_DISPLAY_LIKES')}
				<div class="after-date"><span class="icon-heart"></span>{$post.likes|escape:'html':'UTF-8'}</div>
			{/if}

			{* TODO: works only in single post *}
			{*{if Configuration::get('PH_BLOG_NATIVE_COMMENTS')}*}
			{*<div class="after-date"><span class="icon-bubbles"></span>{$post->comments|escape:'html':'UTF-8'}</div>*}
			{*{/if}*}

		</div>
		<div class="col-sm-11 col-xs-12 blog-body">
			<div class="cover">

				{* How it works? *}
				{* We slice post at few parts, thumbnail, title, description etc. we check if override for specific parts exists for current post type and if so we include this tpl file *}

				{if $post_type != 'post' && file_exists("$tpl_path./types/$post_type/thumbnail.tpl")}
					{include file="./../types/$post_type/thumbnail.tpl"}
				{else}
					{if isset($post.banner) && Configuration::get('PH_BLOG_DISPLAY_THUMBNAIL')}
						<div class="post-thumbnail" itemscope itemtype="http://schema.org/ImageObject">
							<a href="{$post.url|escape:'html':'UTF-8'}" title="{l s='Permalink to' mod='ph_simpleblog'} {$post.title|escape:'html':'UTF-8'}" itemprop="contentUrl">
								<img src="{$post.banner_wide|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl" />
							</a>
						</div><!-- .post-thumbnail -->
					{/if}
				{/if}

			</div>
			<div class="article-info">
				<div class="for-border-bottom">
					{if $is_category eq false && Configuration::get('PH_BLOG_DISPLAY_CATEGORY')}
						<a href="{$post.category_url}" title="{$post.category|escape:'html':'UTF-8'}" rel="category">
							<span class="tag"><span class="icon-tag"></span>{$post.category|escape:'html':'UTF-8'}</span>
						</a>
					{/if}

					{if isset($post.author) && !empty($post.author) && Configuration::get('PH_BLOG_DISPLAY_AUTHOR')}
						<span class="author">
						<i class="icon-user"></i> <span itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">{$post.author|escape:'html':'UTF-8'}</span>
					</span>
					{/if}

					{if Configuration::get('PH_BLOG_DISPLAY_VIEWS')}
						<span class="views"><span class="icon-eye"></span>{$post.views|escape:'html':'UTF-8'} {l s='VIEWS' mod='ph_simpleblog'}</span>
					{/if}

				</div>
			</div>

			{if $post_type != 'post' && file_exists("$tpl_path./types/$post_type/title.tpl")}
				{include file="./../types/$post_type/title.tpl"}
			{else}
				<div class="post-title">
					<h4 itemprop="headline">
						<a href="{$post.url|escape:'html':'UTF-8'}" title="{l s='Permalink to' mod='ph_simpleblog'} {$post.title|escape:'html':'UTF-8'}">
							{$post.title|escape:'html':'UTF-8'}
						</a>
					</h4>
				</div><!-- .post-title -->
			{/if}

			{if $post_type != 'post' && file_exists("$tpl_path./types/$post_type/description.tpl")}
				{include file="./../types/$post_type/description.tpl"}
			{else}
				{if Configuration::get('PH_BLOG_DISPLAY_DESCRIPTION')}
					<div class="post-content" itemprop="text">
						<p>{$post.short_content|strip_tags:'UTF-8'}</p>

						{if Configuration::get('PH_BLOG_DISPLAY_MORE')}
							<div class="post-read-more">
								<a href="{$post.url|escape:'html':'UTF-8'}" class="btn btn-sm btn-third-col" title="{l s='Read more' mod='ph_simpleblog'}">
									{l s='Read more' mod='ph_simpleblog'}
								</a>
							</div><!-- .post-read-more -->
						{/if}
					</div><!-- .post-content -->
				{/if}
			{/if}


		</div>
	</div>
</div> <!-- short-post -->


