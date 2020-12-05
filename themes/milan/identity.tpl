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

{capture name=path}
    <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">
        {l s='My account'}
    </a>
    <span class="navigation-pipe">
        {$navigationPipe}
    </span>
    <span class="navigation_page">
        {l s='Your personal information'}
    </span>
{/capture}
{capture name=pageTitle}
    {l s='Your personal information'}
{/capture}
{include file="$tpl_dir./errors.tpl"}
<div class="container">
    <div class="row">
            <div class="container">
               {hook h="displayMyAccountTop" active='identity'}
            </div>
         </div>
        <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
         <div class="row">
            <div class="col-xs-12 col-md-2 left-menu">
                {hook h="displayMyAccountLeft" active='identity'}
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <h6 class="account-table-head">{l s='Your personal information'}</h6>
                {if isset($confirmation) && $confirmation}
                    
                    <div class="alert alert-success alert-data-icon" data-icon="R">
                        <div>
                            {l s='Your personal information has been successfully updated.'}
                            {if isset($pwd_changed)}<br />{l s='Your password has been sent to your email:'} {$email}{/if}
                        </div>
                    </div>
                        
                    
                {else}
                    
                    <div class="alert alert-info alert-data-icon info-title" data-icon="z">
                        <div>
                            {l s='Please be sure to update your personal information if it has changed.'}
                        </div>
                    </div>
                    <p class="required">
                        <sup>*</sup>{l s='Required field'}
                    </p>
                        
                    <form action="{$link->getPageLink('identity', true)|escape:'html':'UTF-8'}" method="post" class="std">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                            <div class="clearfix form-group">
                                <label class="type-text">{l s='Social title'}</label>
                                <br />
                                {foreach from=$genders key=k item=gender}
                                    <input class="stl" type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />
                                    <label for="id_gender{$gender->id}" class="top"><span><span></span></span>{$gender->name}</label>
                                {/foreach}
                            </div>
                            <div class="required form-group">
                                <label for="firstname" class="required type-text">
                                    {l s='First name'} 
                                    <input class="is_required validate form-control" data-validate="isName" type="text" id="firstname" name="firstname" value="{$smarty.post.firstname}" />
                                </label>
                            </div>
                            <div class="required form-group">
                                <label for="lastname" class="type-text required">
                                    {l s='Last name'} 
                                    <input class="is_required validate form-control" data-validate="isName" type="text" name="lastname" id="lastname" value="{$smarty.post.lastname}" />
                                </label>
                            </div>
                            <div class="required form-group">
                                <label for="email" class="required type-text">
                                    {l s='E-mail address'} 
                                    <input class="is_required validate form-control" data-validate="isEmail" type="email" name="email" id="email" value="{$smarty.post.email}" />
                                </label>
                            </div>
                            <div class="row ovh">
                                <div class="required form-group col-xs-12 col-sm-4">
                                    <select name="days" id="days" class="s-styled form-control">
                                        <option value="">-</option>
                                        {foreach from=$days item=v}
                                            <option value="{$v}" {if ($sl_day == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="required form-group col-xs-12 col-sm-4">
                                    <select id="months" name="months" class="s-styled form-control">
                                        <option value="">-</option>
                                        {foreach from=$months key=k item=v}
                                            <option value="{$k}" {if ($sl_month == $k)}selected="selected"{/if}>{l s=$v}&nbsp;</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="required form-group col-xs-12 col-sm-4">
                                    <select id="years" name="years" class="s-styled form-control">
                                        <option value="">-</option>
                                        {foreach from=$years item=v}
                                            <option value="{$v}" {if ($sl_year == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="required form-group">
                                <label for="old_passwd" class="required type-text">
                                    {l s='Current Password'} 
                                
                                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="old_passwd" id="old_passwd" />
                                </label>
                            </div>
                            <div class="password form-group">
                                <label for="passwd" class="type-text">
                                    {l s='New Password'}
                                
                                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="passwd" id="passwd" />
                                </label>
                            </div>
                            <div class="password form-group">
                                <label for="confirmation" class="type-text">
                                    {l s='Confirmation'}
                                
                                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="confirmation" id="confirmation" />
                                </label>
                            </div>
                            {if $newsletter}
                                <div class="form-group">
                                    <div>
                                        <input class="stl" type="checkbox" id="newsletter" name="newsletter" value="1" {if isset($smarty.post.newsletter) && $smarty.post.newsletter == 1} checked="checked"{/if}/>
                                        <label for="newsletter" class="stl">
                                            <span></span>
                                            {l s='Sign up for our newsletter!'}
                                        </label>
                                    </div>
                                    <div>
                                        <input class="stl" type="checkbox" name="optin" id="optin" value="1" {if isset($smarty.post.optin) && $smarty.post.optin == 1} checked="checked"{/if}/>
                                        <label class="stl" for="optin">
                                            <span></span>
                                            {l s='Receive special offers from our partners!'}
                                        </label>
                                    </div>
                                </div>
                                
                            {/if}
                            {if $b2b_enable}
                                    <h6 class="account-table-head">
                                            {l s='Your company information'}
                                    </h6>
                                    <div class="form-group">
                                        <label class="type-text" for="">{l s='Company'}
                                            <input type="text" class="form-control" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                            <label class="type-text" for="siret">{l s='SIRET'}
                                                <input type="text" class="form-control" id="siret" name="siret" value="{if isset($smarty.post.siret)}{$smarty.post.siret}{/if}" />
                                            </label>
                                    </div>
                                    <div class="form-group">
                                            <label class="type-text" for="ape">{l s='APE'}
                                                    <input type="text" class="form-control" id="ape" name="ape" value="{if isset($smarty.post.ape)}{$smarty.post.ape}{/if}" />
                                            </label>
                                    </div>
                                    <div class="form-group">
                                            <label class="type-text" for="website">{l s='Website'}
                                            <input type="text" class="form-control" id="website" name="website" value="{if isset($smarty.post.website)}{$smarty.post.website}{/if}" />
                                            </label>
                                    </div>
                            {/if}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button type="submit" name="submitIdentity" class="btn btn-lg btn-sec-col">
                                        <span>{l s='Save'}</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <p id="security_informations" class="text-right">
                                    <i>{l s='[Insert customer data privacy clause here, if applicable]'}</i>
                                </p>
                            </div>
                            
                        </div>
                    </form> <!-- .std -->
                {/if}
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