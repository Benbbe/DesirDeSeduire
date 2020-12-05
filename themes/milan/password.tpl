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

{capture name=path}<a href="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" title="{l s='Authentication'}" rel="nofollow">{l s='Authentication'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Forgot your password'}{/capture}
{capture name=pageTitle}
{l s='Forgot your password?'}
{/capture}
<div class="container">
    <div class="row">
        {include file="$tpl_dir./errors.tpl"}
        <div class="container">

           <div class="col-xs-12 product-top-line">
              <a class="btn btn-yet-col col-xs-2 back-catalog pull-left" href="{$link->getPageLink('authentication')|escape:'html':'UTF-8'}" title="{l s='Back to Login'}" rel="nofollow">
                    <span><i class="arrow_carrot-left"></i> {l s='Back to Login'}</span>
                </a>
           </div>
        </div>
    </div>
</div>
<div class="container login-password-recover">
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">



        {if isset($confirmation) && $confirmation == 1}
            <div class="alert alert-success alert-data-icon" data-icon="R">
                <div>
                    {l s='Your password has been successfully reset and a confirmation has been sent to your email address:'} 
                    {if isset($customer_email)}{$customer_email|escape:'html':'UTF-8'|stripslashes}{/if} 
                </div>
            </div>
        {elseif isset($confirmation) && $confirmation == 2}
            <div class="alert alert-success alert-data-icon" data-icon="R">
                <div>
                    {l s='A confirmation email has been sent to your address:'} {if isset($customer_email)}{$customer_email|escape:'html':'UTF-8'|stripslashes}{/if}
                </div>
            </div>
        {else}
            <div class="row">
                <form action="{$request_uri|escape:'html':'UTF-8'}" method="post" class="std" id="form_forgotpassword">
                    <div class="col-sm-12 col-xs-12">
                        <h6 class="account-table-head">{l s='Please enter the email address you used to register. We will then send you a new password. '}</h6>
                        <p>{l s='Email address'} *</p>
                    </div>
                    <div class="form-group {if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-sm-8{else}col-sm-9{/if}{else}col-sm-9{/if} col-xs-12">
                        <i class="field-icon icon_mail"></i>
                        <input class="form-control" type="text" id="email" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email|escape:'html':'UTF-8'|stripslashes}{/if}" />
                    </div>
                    <div class="form-group {if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-sm-4{else}col-sm-3{/if}{else}col-sm-3{/if} col-xs-12">
                        <button type="submit" class="btn btn-third-col btn-sm"><span>{l s='Retrieve Password'}</span></button>
                    </div>
                </form>
            </div>
        {/if}
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