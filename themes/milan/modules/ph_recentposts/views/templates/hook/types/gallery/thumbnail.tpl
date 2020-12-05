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
{if isset($post.banner) && Configuration::get('PH_BLOG_DISPLAY_THUMBNAIL')}
	<div class="post-thumbnail" itemscope itemtype="http://schema.org/ImageObject">
		<a {if isset($post.gallery) && sizeof($post.gallery)}href="{$gallery_dir|escape:'html':'UTF-8'}{$post.gallery.0.image|escape:'html':'UTF-8'}.jpg" data-fancybox-group="post-gallery-slideshow-{$post.id_simpleblog_post|intval}" class="post-gallery-link"{else}href="{$post.url|escape:'html':'UTF-8'}"{/if} title="{l s='Permalink link to' mod='ph_simpleblog'} {$post.title|escape:'html':'UTF-8'}" itemprop="contentUrl">
			{if $blogLayout eq 'full'}
				<img src="{$post.banner_wide|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl" />
			{else}
				<img src="{$post.banner_thumb|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" class="img-responsive" itemprop="thumbnailUrl" />
			{/if}
		</a>
		{foreach $post.gallery as $image name=gallery_loop}
			{if !$smarty.foreach.gallery_loop.first}
				<a class="post-gallery-link" data-fancybox-group="post-gallery-slideshow-{$post.id_simpleblog_post|intval}" href="{$gallery_dir|escape:'html':'UTF-8'}{$image.image|escape:'html':'UTF-8'}.jpg" itemprop="contentUrl" style="display: none;"><img src="{$gallery_dir|escape:'html':'UTF-8'}{$image.image|escape:'html':'UTF-8'}-{if $blogLayout eq 'full'}wide{else}thumb{/if}.jpg" itemprop="thumbnailUrl" /></a>
			{/if}
		{/foreach}
	</div>
{else}
	{if isset($post.gallery) && sizeof($post.gallery)}

		{assign var=random value=1|rand:999}

		<div id="carousel-post-{$random}" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				{foreach from=$post.gallery key=idx item=image}
					<div class="item {if $idx == 1}active{/if}">
						<img src="{$gallery_dir|escape:'html':'UTF-8'}{$image.image|escape:'html':'UTF-8'}-wide.jpg" />
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

	{/if}
{/if}