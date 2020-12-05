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
<!-- Pagination -->

{math assign="start_post" equation='x * y - x + 1' x=$products_per_page y=$p}
{math assign="end_post" equation='x * y' x=$products_per_page y=$p}
{if $end_post > $nb_posts }{$end_post = $nb_posts}{/if}

<div class="nav blog-nav col-xs-12">
	<span class="pull-left">{l s='Items' mod='ph_simpleblog'} {$start_post}  {l s='to' mod='ph_simpleblog'} {$end_post} {l s='of' mod='ph_simpleblog'} {$nb_posts} total</span>

	<div id="pagination" class="simpleblog-pagination wp-pagenavi pull-right">
		{if $start!=$stop}

			{if $p != 1}
				{assign var='p_previous' value=$p-1}
				<a class="prevpostlink btn btn-prim-col arrow_carrot-left" href="{SimpleBlogPost::getPageLink($p_previous, $type, $rewrite)|escape:'html':'UTF-8'}" rel="prev"></a>
			{else}
				<span class="prevpostlink btn arrow_carrot-left"></span>
			{/if}
			{if $start>3}
				<a class="page btn btn-prim-col" href="{SimpleBlogPost::getPageLink(1, $type, $rewrite)|escape:'html':'UTF-8'}">1</a>
				<span class="truncate">...</span>
			{/if}
			{section name=pagination start=$start loop=$stop+1 step=1}
				{if $p == $smarty.section.pagination.index}
					<span class="current btn btn-sec-col">{$p|escape:'htmlall':'UTF-8'}</span>
				{else}
					<a class="page btn btn-prim-col" href="{SimpleBlogPost::getPageLink($smarty.section.pagination.index, $type, $rewrite)|escape:'html':'UTF-8'}">{$smarty.section.pagination.index|escape:'htmlall':'UTF-8'}</a>
				{/if}
			{/section}
			{if $pages_nb>$stop+2}
				<span class="truncate">...</span>
				<a class="page btn btn-prim-col" href="{SimpleBlogPost::getPageLink($pages_nb, $type, $rewrite)|escape:'html':'UTF-8'}">{$pages_nb|intval}</a>
			{/if}
			{if $pages_nb > 1 AND $p != $pages_nb}
				{assign var='p_next' value=$p+1}
				<a class="nextpostlink btn btn-prim-col arrow_carrot-right" href="{SimpleBlogPost::getPageLink($p_next, $type, $rewrite)|escape:'html':'UTF-8'}" rel="next"></a>
			{else}
				<span class="nextpostlink btn arrow_carrot-right"></span>
			{/if}

		{/if}
	</div>
	<!-- /Pagination -->
</div>