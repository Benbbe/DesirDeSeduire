

{if isset($recent_posts) && count($recent_posts)}
{assign var=is_category value=false} {* we want to show category on recent post but have the same code as on category post listing ;) *}

	<section class="bottom-line">
		<div class="container">
			<div class="gap-60"></div>
			<div class="news-list mobile-collapse">
				<h2 class="news-title mobile-collapse-header">{l s='Recent posts' mod='ph_recentposts'}</h2>
				<div class="blog row news-container mobile-collapse-body" itemscope="itemscope" itemtype="http://schema.org/Blog">

					{foreach from=$recent_posts item=post}

						{if $blogLayout eq 'grid'}
							{include file="./item/grid.tpl"}
						{elseif $blogLayout eq 'full'}
							{include file="./item/fullwidth.tpl"}
						{/if}

					{/foreach}

				</div> <!-- news-container -->
				<div class="text-center">
					{*<button class="btn news-loadmore"><i class="icon-reload"></i>Load More</button>*}
				</div>
			</div> <!-- news-list -->
			<div class="gap-70"></div>
		</div>
	</section>

{/if}


