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
{assign var='post_type' value=$post->post_type}
{capture name=pageTitle}
	{$post->title|escape:'html':'UTF-8'}
{/capture}

{capture name=path}
	<a href="{$link->getModuleLink('ph_simpleblog', 'list')|escape:'html':'UTF-8'}" title="{l s='Back to blog homepage' mod='ph_simpleblog'}">
		{l s='Blog' mod='ph_simpleblog'}
	</a>
	<i class="arrow_carrot-right"></i>
	<a href="{$post->category_url|escape:'html':'UTF-8'}" title="{l s='Visit category' mod='ph_simpleblog'}">{$post->category|escape:'html':'UTF-8'}</a>
{/capture}

{include file="$tpl_dir./errors.tpl"}

{if isset($smarty.get.confirmation)}
	<div class="success alert alert-success">
	{if $smarty.get.confirmation == 1}
		{l s='Your comment was sucessfully added.' mod='ph_simpleblog'}	
	{else}
		{l s='Your comment was sucessfully added but it will be visible after moderator approval.' mod='ph_simpleblog'}	
	{/if}
	</div><!-- .success alert alert-success -->
{/if}

<div class="container container-sm-fullwidth">
	<div class="row">
		<div class="gap-60"></div>
		<div class="col-md-8 blog container-collapse clearfix">
			<div itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage">
				<div class="ph_simpleblog simpleblog-single {if !empty($post->featured_image)}with-cover{else}without-cover{/if} simpleblog-single-{$post->id_simpleblog_post|intval}" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<div class="short-post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
						<div class="row">

							<div class="col-sm-1 col-xs-12 left-info hidden-xs">

								<div class="icon"><span class="icon-pencil"></span></div>

								{if Configuration::get('PH_BLOG_DISPLAY_DATE')}
									<div class="date">{$post->date_add|date_format:Configuration::get('PH_BLOG_DATEFORMAT')}</div>
								{/if}

								{if Configuration::get('PH_BLOG_DISPLAY_LIKES')}
									<div class="after-date">
										<a href="#" data-guest="{$cookie->id_guest|intval}" data-post="{$post->id_simpleblog_post|intval}" class="simpleblog-like-button">
											<span class="icon-heart"></span><data>{$post->likes|intval}</data>
										</a>
									</div>
								{/if}

								{if $allow_comments eq true && Configuration::get('PH_BLOG_NATIVE_COMMENTS')}
									<div class="after-date"><span class="icon-bubbles"></span>{$post->comments|escape:'html':'UTF-8'}</div>
								{/if}

							</div>
							<div class="col-sm-11 col-xs-12 blog-body">
								<div class="cover">


									{if $post->featured_image}
										<div class="post-featured-image" itemscope itemtype="http://schema.org/ImageObject">
											<a href="{$post->featured_image|escape:'html':'UTF-8'}" title="{$post->title|escape:'html':'UTF-8'}" class="fancybox" itemprop="contentUrl">
												<img src="{$post->featured_image|escape:'html':'UTF-8'}" alt="{$post->title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl" />
											</a>
										</div><!-- .post-featured-image -->
									{/if}

									{if $post_type == 'gallery' && sizeof($post->gallery)}

										{assign var=random value=1|rand:999}

										<div id="carousel-post-{$random}" class="carousel slide" data-ride="carousel">

											<!-- Wrapper for slides -->
											<div class="carousel-inner">

												{foreach from=$post->gallery key=idx item=image}
													<div class="item {if $idx == 1}active{/if}">
														<img src="{$gallery_dir|escape:'html':'UTF-8'}{$image.image|escape:'html':'UTF-8'}.jpg" />
													</div>
												{/foreach}
											</div>

											<!-- Controls -->
											<a class="left carousel-control" href="#carousel-post-{$random}" role="button" data-slide="prev">
												<span class="arrow_carrot-left"></span>
											</a>
											<a class="right carousel-control" href="#carousel-post-{$random}" role="button" data-slide="next">
												<span class="arrow_carrot-right"></span>
											</a>
										</div>

									{elseif $post_type == 'video'}
										<div class="post-video" itemprop="video">
											<div class="embed-responsive">
												{$post->video_code}
											</div>
										</div><!-- .post-video -->
									{/if}

								</div>
								<div class="article-info">
									<div class="for-border-bottom">

										{if Configuration::get('PH_BLOG_DISPLAY_CATEGORY')}
											<a href="{$post->category_url}" title="{$post->category|escape:'html':'UTF-8'}" rel="category">
												<span class="tag"><span class="icon-tag"></span>{$post->category|escape:'html':'UTF-8'}</span>
											</a>
										{/if}

										{if isset($post->author) && !empty($post->author) && Configuration::get('PH_BLOG_DISPLAY_AUTHOR')}
											<span class="author">
												<i class="icon-user"></i> <span itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">{$post->author|escape:'html':'UTF-8'}</span>
											</span>
										{/if}

										{if Configuration::get('PH_BLOG_DISPLAY_VIEWS')}
											<span class="views"><span class="icon-eye"></span>{$post->views|escape:'html':'UTF-8'} {l s='VIEWS' mod='ph_simpleblog'}</span>
										{/if}

									</div>
								</div>

								<div class="post-content" itemprop="text">
									<h4>{$post->title|escape:'html':'UTF-8'}</h4>

									{$post->content}
								</div><!-- .post-content -->

								<div class="row">
									<div class="article-info col-xs-12">
										<div class="for-border-top">
											{if $post->tags && Configuration::get('PH_BLOG_DISPLAY_TAGS') && isset($post->tags_list)}
												<span class="tag">
													<span class="icon-tag"></span>
													{foreach from=$post->tags_list item=tag name='tagsLoop'}
														{$tag|escape:'html':'UTF-8'}{if !$smarty.foreach.tagsLoop.last}, {/if}
													{/foreach}
												</span>
											{/if}

											{hook h='displayPrestaHomeBlogAfterPostContent'}
										</div>
									</div>
								</div>

								{* Native comments *}
								{if $allow_comments eq true && Configuration::get('PH_BLOG_NATIVE_COMMENTS')}
									{include file="./comments/layout.tpl"}
								{/if}

								{* Facebook comments *}
								{if $allow_comments eq true && !Configuration::get('PH_BLOG_NATIVE_COMMENTS')}
									{include file="./comments/facebook.tpl"}
								{/if}

							</div>
						</div>
					</div> <!-- short-post -->

				</div> <!-- ph_simpleblog -->
			</div> <!-- schema -->
		</div> <!-- blog -->

		<div class="col-md-4 clearfix sidebar">
			<div class="col-xs-12 container-collapse">
				<div class="col-xs-12">
					<div class="gap-30"></div>
					{hook h="displayLeftColumn"}
				</div>
			</div>
		</div>

	</div>
</div> <!-- container -->


{if Configuration::get('PH_BLOG_FB_INIT')}
<script>
var lang_iso = '{$lang_iso}_{$lang_iso|@strtoupper}';
{literal}(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/"+lang_iso+"/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
{/literal}
</script>
{/if}
<script>
$(function() {
	$('body').addClass('simpleblog simpleblog-single');
});
</script>