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
<div id="simpleblog-post-comments" class="post-block review">
	<h6>{l s='Comments' mod='ph_simpleblog'} <span class="comment-count"> {$post->comments|escape:'html':'UTF-8'} </span></h6>

	<div class="post-comments-list">
		{if $post->comments}
			{foreach $comments as $comment}
				<div class="row comment post-comment post-comment-{$comment.id|intval}">
					<!--<div class="img-cover"><img src="images/review/avatar-1.jpg" alt="avatar"></div>-->
					<div class="data">
						<div class="comment-info">
							<span class="name">{$comment.name|escape:'html':'UTF-8'}</span>
							<time datetime="{$comment.date_add|date_format:"%Y-%m-%d"}">{$comment.date_add|escape:'html':'UTF-8'}</time>
						</div>
                  <!--<span class="like-wrapper col-xs-12 col-sm-3">
                     <a href="#" class="reply"><span class="icon-action-redo"></span> Reply</a>
                  </span>-->

						<p class="comment-text">
							{$comment.comment|escape:'html':'UTF-8'}
						</p>
					</div>
				</div><!-- .post-comment -->
			{/foreach}
		{else}
			<div class="warning alert alert-warning">
				{l s='No comments at this moment' mod='ph_simpleblog'}
			</div><!-- .warning -->
		{/if}
	</div><!-- .post-comments-list -->

	{* Comment form *}
	{include file="./form.tpl"}
</div><!-- #post-comments -->
