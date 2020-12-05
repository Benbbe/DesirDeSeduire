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
* Do not edit or add to this file if you wish to upgrade PrestaShop to newersend_friend_form_content
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="tab-review" class="tab-pane">
	<div class="review">
		{if $comments}
			{foreach from=$comments item=comment}
				{if $comment.content}
                                    <div class="comment" itemscope itemtype="http://schema.org/Review">
                                        <meta itemprop="worstRating" content = "0" />
							<meta itemprop="ratingValue" content = "{$comment.grade|escape:'html':'UTF-8'}" />
            				<meta itemprop="bestRating" content = "5" />
                                        <div class="">
                                           <div class="data">
                                             <div class="comment-info">
                                                 <span class="name">{$comment.customer_name|escape:'html':'UTF-8'}</span>
                                                 <meta itemprop="datePublished" content="{$comment.date_add|escape:'html':'UTF-8'|substr:0:10}" />
                                                 <time datetime="{$comment.date_add|escape:'html':'UTF-8'|substr:0:10}">{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}</time>
                                                 <span class="stars-rating stars-{$comment.grade}"><span class="stars"></span></span>
                                              </div>
                                              <span class="like-wrapper col-xs-12 col-sm-4">
                                                 <span class="like">
                                                    <a class="usefulness_btn" data-is-usefull="1" data-id-product-comment="{$comment.id_product_comment}">
                                                        <span class="icon-like"></span>
                                                    </a>
                                                    <span class="count">{$comment.total_useful}</span>
                                                 </span>
                                                 <span class="dislike">
                                                    <a class="usefulness_btn" data-is-usefull="0" data-id-product-comment="{$comment.id_product_comment}">
                                                            <span class="icon-dislike"></span>
                                                    </a>
                                                    <span class="count">{$comment.total_advice - $comment.total_useful}</span>
                                                 </span>
                                              </span>
                                              <p class="comment-text">
                                                  {$comment.content|escape:'html':'UTF-8'|nl2br}
                                              </p>
                                           </div>
                                        </div>
                                    </div>
				{/if}
			{/foreach}
		{else}
                    
		{/if}
	</div> <!-- #product_comments_block_tab -->
        {if (!$too_early AND ($is_logged OR $allow_guests))}
        <form id="id_new_comment_form" action="#">
            <input type="hidden" name="id_product" value="{$product->id}" />
            <div id="new_comment_form_error" class="error" style="display: none;">
                
            </div>
            <div class="row">
                <div class="{if $allow_guests == true && !$is_logged}col-md-6{else}col-md-12{/if} col-xs-12">
                    <div class="form-group required">
                        <label class="type-text">{l s='Title' mod='productcomments'}: <sup class="required">*</sup>
                            <input id="comment_title" name="title" class="form-control placeholder-fix" type="text" value=""/>
                        </label>
                    </div>
                </div>
                {if $allow_guests == true && !$is_logged}
                <div class="col-md-6 col-xs-12">
                       <div class="form-group required">
                            <label class="type-text">
                                {l s='Your name' mod='productcomments'}: <sup class="required">*</sup>
                                <input id="commentCustomerName" class="form-control placeholder-fix" name="customer_name" type="text" value=""/>
                            </label>
                            
                       </div>
                </div>
                {/if}
                <div class="col-xs-12">
                    {if $criterions|@count > 0}
                       <div class="you-rating">    
                           {foreach from=$criterions item='criterion'}
                               <div class="data-info secondary-font-family">{$criterion.name|escape:'html':'UTF-8'}</div>
                               <input type="hidden" name="criterion[{$criterion.id_product_comment_criterion|round}]" id="criterion-{$criterion.id_product_comment_criterion|round}" value="" />
                               <a data-rating="1" data-target="criterion-{$criterion.id_product_comment_criterion|round}" href="#"><span class="stars-rating stars-1"><span class="stars"></span></span></a>
                               <a data-rating="2" data-target="criterion-{$criterion.id_product_comment_criterion|round}" href="#"><span class="stars-rating stars-2"><span class="stars"></span></span></a>
                               <a data-rating="3" data-target="criterion-{$criterion.id_product_comment_criterion|round}" href="#"><span class="stars-rating stars-3"><span class="stars"></span></span></a>
                               <a data-rating="4" data-target="criterion-{$criterion.id_product_comment_criterion|round}" href="#"><span class="stars-rating stars-4"><span class="stars"></span></span></a>
                               <a data-rating="5" data-target="criterion-{$criterion.id_product_comment_criterion|round}" href="#"><span class="stars-rating stars-5"><span class="stars"></span></span></a>
                           {/foreach}
                       </div>    
                   {/if}
                    <div class="data-info secondary-font-family">{l s='Comment' mod='productcomments'}: <sup class="required">*</sup></div>
                    <div class="required form-group">
                        <textarea id="content" name="content"  class="form-control placeholder-fix"></textarea>
                    </div>
                    <button id="submitNewMessage" name="submitMessage" type="submit" class="btn btn-lg btn-sec-col col-xs-12">
                        <span>{l s='Send' mod='productcomments'}</span>
                    </button>
                </div>
            </div>
        </form>
        {elseif !$is_logged AND !$allow_guests}
            <span>{l s='Only registerd users can review the product' mod='productcomments'}</span>
        {/if}
</div>
<div aria-hidden="false" aria-labelledby="productcomments-add-message" role="dialog" tabindex="-1" id="productcomments-add-message" class="modal fade">
 <div class="modal-dialog modal-md">
   <div class="modal-content">
     <div class="modal-header">
        <a aria-hidden="true" data-dismiss="modal" class="modal-close" href="#"><i class="icon_close"></i></a>
        <h4 class="modal-title"></h4>
     </div>
     <div class="modal-body modal-body-info">
        <p></p>
     </div>
       <div class="modal-footer">
            <div class="row no-gutter">
               <div class="col-xs-6">
                  <button data-dismiss="modal" class="continue btn btn-md btn-third-col btn-w100" type="button">{l s='Close'}</button>
               </div>
               <div class="col-xs-6">
                   <button data-dismiss="modal" onclick="productcommentRefreshPage();" class="btn-reload continue btn btn-md btn-third-col btn-w100" type="button"></button>
               </div>
            </div>
         </div>
   </div>
 </div>
</div>
{strip}
{addJsDef productcomments_controller_url=$productcomments_controller_url|@addcslashes:'\''}
{addJsDef moderation_active=$moderation_active|boolval}
{addJsDef productcomments_url_rewrite=$productcomments_url_rewriting_activated|boolval}
{addJsDef secure_key=$secure_key}

{addJsDefL name=confirm_report_message}{l s='Are you sure that you want to report this comment?' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_added}{l s='Your comment has been added!' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_added_moderation}{l s='Your comment has been added and will be available once approved by a moderator' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_title}{l s='New comment' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_ok}{l s='OK' mod='productcomments' js=1}{/addJsDefL}
{/strip}
