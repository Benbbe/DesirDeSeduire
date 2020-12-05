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
{capture name=path}{l s='Contact'}{/capture}
{capture name=pageTitle}
    {l s='Customer service'} - {if isset($customerThread) && $customerThread}{l s='Your reply'}{else}{l s='Contact us'}{/if}
{/capture}
{if isset($confirmation)}
	<p class="alert alert-success">{l s='Your message has been successfully sent to our team.'}</p>
{elseif isset($alreadySent)}
	<p class="alert alert-warning">{l s='Your message has already been sent.'}</p>
{else}
	{include file="$tpl_dir./errors.tpl"}
        <div class="container contact">
            <div class="row">
                <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
            {hook h='displayContactUsTop'}
         <div class="row">
            <div class="col-md-9 col-sm-12">
                <form action="{$request_uri|escape:'html':'UTF-8'}" method="POST" enctype="multipart/form-data" class="validation-engine">
                    <h6 class="upcs">{l s='send a message'}</h6>
                  <div class="row">
                     <div class="col-sm-6 col-xs-12">
                        <div class="required form-group">
                            {if isset($customerThread.email)}
                                <input class="form-control" type="text" id="email" name="from" placeholder="{l s='Email address'} *" value="{$customerThread.email|escape:'html':'UTF-8'}" readonly="readonly" />
                            {else}
                                <input class="form-control validate" type="text" id="email" placeholder="{l s='Email address'} *" name="from" data-validate="isEmail" value="{$email|escape:'html':'UTF-8'}" />
                            {/if}
                        </div>
                        <div class="required form-group">
                            {if isset($customerThread.id_contact)}
                                    {foreach from=$contacts item=contact}
                                        {if $contact.id_contact == $customerThread.id_contact}
                                            <input type="text" class="form-control" id="contact_name" name="contact_name" value="{$contact.name|escape:'html':'UTF-8'}" readonly="readonly" />
                                            <input type="hidden" name="id_contact" value="{$contact.id_contact}" />
                                        {/if}
                                    {/foreach}
                            {else}
                                <select id="id_contact" class="s-styled hasCustomSelect form-control" name="id_contact">
                                    <option value="0">--{l s='Subject Heading'}--</option>
                                    {foreach from=$contacts item=contact}
                                        <option value="{$contact.id_contact|intval}" {if isset($smarty.request.id_contact) && $smarty.request.id_contact == $contact.id_contact}selected="selected"{/if}>{$contact.name|escape:'html':'UTF-8'}</option>
                                    {/foreach}
                                </select>
                                <div id="desc_contact0" class="desc_contact"></div>
                                {foreach from=$contacts item=contact}
                                    <div id="desc_contact{$contact.id_contact|intval}" class="desc_contact contact-title" style="display:none;">
                                        <i class="icon-comment-alt"></i>{$contact.description|escape:'html':'UTF-8'}
                                    </div>
                                {/foreach}
                            {/if}
                        </div>
                        {if !$PS_CATALOG_MODE}
                            {if (!isset($customerThread.id_order) || $customerThread.id_order > 0)}
                                <div class="form-group selector1">
                                    {if !isset($customerThread.id_order) && isset($is_logged) && $is_logged}
                                        <select name="id_order" class="s-styled hasCustomSelect form-control">
                                            <option value="0">--{l s='Order reference'}--</option>
                                            {foreach from=$orderList item=order}
                                                <option value="{$order.value|intval}"{if $order.selected|intval} selected="selected"{/if}>{$order.label|escape:'html':'UTF-8'}</option>
                                            {/foreach}
                                        </select>
                                    {elseif !isset($customerThread.id_order) && empty($is_logged)}
                                        <input class="form-control grey" type="text" name="id_order" id="id_order" placeholder="{l s='Order reference'}" value="{if isset($customerThread.id_order) && $customerThread.id_order|intval > 0}{$customerThread.id_order|intval}{else}{if isset($smarty.post.id_order) && !empty($smarty.post.id_order)}{$smarty.post.id_order|intval}{/if}{/if}" />
                                    {elseif $customerThread.id_order|intval > 0}
                                        <input class="form-control grey" type="text" name="id_order" id="id_order" placeholder="{l s='Order reference'}" value="{$customerThread.id_order|intval}" readonly="readonly" />
                                    {/if}
                                </div>
                            {/if}
                            {if isset($is_logged) && $is_logged}
                                <div class="form-group selector1">
                                    <label class="unvisible">{l s='Product'}</label>
                                    {if !isset($customerThread.id_product)}
                                        {foreach from=$orderedProductList key=id_order item=products name=products}
                                            <select name="id_product" id="{$id_order}_order_products" class="unvisible product_select form-control"{if !$smarty.foreach.products.first} style="display:none;"{/if}{if !$smarty.foreach.products.first} disabled="disabled"{/if}>
                                                <option value="0">{l s='-- Choose --'}</option>
                                                {foreach from=$products item=product}
                                                    <option value="{$product.value|intval}">{$product.label|escape:'html':'UTF-8'}</option>
                                                {/foreach}
                                            </select>
                                        {/foreach}
                                    {elseif $customerThread.id_product > 0}
                                        <input class="form-control grey" type="text" name="id_product" id="id_product" value="{$customerThread.id_product|intval}" readonly="readonly" />
                                    {/if}
                                </div>
                            {/if}
                        {/if}
                        {if $fileupload == 1}
                            <div class="form-group">
                                <div class="dummyfile input-group">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                    <input type="file" placeholder="{l s='Attach File'}" name="fileUpload" id="fileUpload" class="form-control" />
                                        <span class="input-group-addon"><i class="icon_paperclip"></i></span>
                                        <input autocomplete="off" type="text" placeholder="{l s='Attach File'}" readonly="" name="filename" id="file-name">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-yet-col" name="submitAddAttachments" type="button" id="file-selectbutton">
                                                <i class="icon-folder-open"></i> {l s='Attach File'}
                                            </button>
                                        </span>
                                </div>
                            </div>
                        {/if}
                     </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="required form-group">
                           <textarea class="form-control" id="message" placeholder="{l s='Message'}" name="message" rows="6">{if isset($message)}{$message|escape:'html':'UTF-8'|stripslashes}{/if}</textarea>
                        </div>
                        <div class="required form-group">
                           <button name="submitMessage" id="submitMessage" class="btn btn-sm btn-third-col col-xs-12" type="submit">{l s='Send'}</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-sm-12 col-md-3">
               {hook h='displayContactUsSide'}
            </div>
         </div>
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
{/if}
{addJsDefL name='contact_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='contact_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}
{strip}
<script type="text/javascript">
    $('#file-name, #file-selectbutton').click(function(){
        $('#fileUpload').click();
    });
    $('#fileUpload').change(function(){
        $('#file-name').val($('#fileUpload').val());
    });
</script>
{/strip}