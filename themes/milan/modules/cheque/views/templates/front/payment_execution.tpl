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

{capture name=path}{l s='Check payment' mod='cheque'}{/capture}
{capture name=pageTitle}
    {l s='Order summary' mod='cheque'}
{/capture}

{assign var='current_step' value='payment'}
<div class="container">
    <div class="row">
        {include file="$tpl_dir./order-steps.tpl"}
    </div>
        <div class="row">
            <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
{if isset($nbProducts) && $nbProducts <= 0}
	<p class="alert alert-warning">{l s='Your shopping cart is empty.' mod='cheque'}</p>
{else}
   
	<form action="{$link->getModuleLink('cheque', 'validation', [], true)|escape:'html':'UTF-8'}" method="post">
		<div class="box cheque-box">
			<h3 class="page-subheading">{l s='Check payment' mod='cheque'}</h3>
			<p class="cheque-indent">
				<strong class="dark">
					{l s='You have chosen to pay by check.' mod='cheque'} {l s='Here is a short summary of your order:' mod='cheque'}
				</strong>
			</p>
			<p>
				- {l s='The total amount of your order comes to:' mod='cheque'}
				<span id="amount" class="price">{displayPrice price=$total}</span>
				{if $use_taxes == 1}
					{l s='(tax incl.)' mod='cheque'}
				{/if}
			</p>
			<p>
				-
				{if isset($currencies) && $currencies|@count > 1}
					{l s='We accept several currencies to receive payments by check.' mod='cheque'}
					<br />
					<div class="form-group">
                                                <label class="type-text">{l s='Choose one of the following:' mod='cheque'}
                                                    <select id="currency_payement" class="s-styled form-control" name="currency_payement">
                                                    {foreach from=$currencies item=currency}
                                                            <option value="{$currency.id_currency}" {if isset($currencies) && $currency.id_currency == $cust_currency}selected="selected"{/if}>{$currency.name}</option>
                                                    {/foreach}
                                                    </select>
                                                </label>
					</div>
				{else}
					{l s='We allow the following currencies to be sent by check:' mod='cheque'}&nbsp;<b>{$currencies.0.name}</b>
					<input type="hidden" name="currency_payement" value="{$currencies.0.id_currency}" />
				{/if}
			</p>
			<p>
				- {l s='Check owner and address information will be displayed on the next page.' mod='cheque'}
				<br />
				- {l s='Please confirm your order by clicking \'I confirm my order\'' mod='cheque'}.
			</p>
		</div>
		<div class="row clearfix" id="cart_navigation">
                    <div class="col-sm-6">
                        <div class="gap-10"></div>
                        <a 
                        class="button-exclusive btn-md btn btn-default" 
                        href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'html':'UTF-8'}">
                            <i class="arrow_triangle-left"></i>{l s='Other payment methods' mod='cheque'}
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <div class="gap-10"></div>
                        <button 
                        class="btn btn-md btn-sec-col pull-right" 
                        type="submit">
                            <span>{l s='I confirm my order' mod='cheque'}<i class="arrow_triangle-right right"></i></span>
                        </button>
                    </div>    
                </div>
                <div class="gap-15"></div>
	</form>
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
