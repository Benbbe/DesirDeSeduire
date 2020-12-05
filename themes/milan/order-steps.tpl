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

{* Assign a value to 'current_step' to display current style *}
{capture name="url_back"}
{if isset($back) && $back}back={$back}{/if}
{/capture}

{if !isset($multi_shipping)}
	{assign var='multi_shipping' value='0'}
{/if}

{if !$opc}
<!-- Steps -->
<div class="container checkout-menu" id="order_step">
    <span class="{if $current_step=='payment'}step_current btn-third-col{else}step_todo btn-yet-col{/if} btn col-sm-3 col-xs-12">{l s='Payment'}</span>
    {if $current_step=='payment'}
        <a class="{if $current_step=='shipping'}step_current btn-third-col{else}{if $current_step=='payment'}step_done btn-yet-col step_done_last{else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12" href="">{l s='Shipping'}</a>
    {else}
        <span class="{if $current_step=='shipping'}step_current btn-third-col{else}{if $current_step=='payment'}step_done btn-yet-col step_done_last{else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12">{l s='Shipping'}</span>
    {/if}
    {if $current_step=='payment' || $current_step=='shipping'}
        <a class="{if $current_step=='address'}step_current btn-third-col{elseif $current_step=='shipping'}step_done step_done_last btn-yet-col {else}{if $current_step=='payment' || $current_step=='shipping'}step_done btn-yet-col {else}step_todo btn-yet-col{/if}{/if} btn col-sm-3 col-xs-12" href="{$link->getPageLink('order', true, NULL, "{$smarty.capture.url_back}&step=1&multi-shipping={$multi_shipping}")|escape:'html':'UTF-8'}">{l s='Address'}</a>
    {else}
        <span class="{if $current_step=='address'}step_current btn-third-col{elseif $current_step=='shipping'}step_done step_done_last btn-yet-col {else}{if $current_step=='payment' || $current_step=='shipping'}step_done btn-yet-col {else}step_todo btn-yet-col{/if}{/if} btn col-sm-3 col-xs-12">{l s='Address'}</span>
    {/if}
    {if $current_step=='payment' || $current_step=='shipping' || $current_step=='address'}
        <a class="{if $current_step=='login'}step_current btn-third-col {elseif $current_step=='address'}step_done step_done_last btn-yet-col {else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address'}step_done btn-yet-col {else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12" href="{$link->getPageLink('order', true, NULL, "{$smarty.capture.url_back}&step=1&multi-shipping={$multi_shipping}")|escape:'html':'UTF-8'}">{l s='Sign in'}</a>
    {else}
        <span class="{if $current_step=='login'}step_current btn-third-col {elseif $current_step=='address'}step_done step_done_last btn-yet-col {else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address'}step_done btn-yet-col {else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12">{l s='Sign in'}</span>
    {/if}
    {if $current_step=='payment' || $current_step=='shipping' || $current_step=='address' || $current_step=='login'}
        <a class="{if $current_step=='summary'}step_current btn-third-col {elseif $current_step=='login'}step_done_last step_done btn-yet-col{else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address' || $current_step=='login'}step_done btn-yet-col {else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12" href="{$link->getPageLink('order', true)}">{l s='Summary'}</a>
    {else}
        <span class="{if $current_step=='summary'}step_current btn-third-col {elseif $current_step=='login'}step_done_last step_done btn-yet-col{else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address' || $current_step=='login'}step_done btn-yet-col {else}step_todo btn-yet-col {/if}{/if} btn col-sm-3 col-xs-12">{l s='Summary'}</span>
    {/if}
</div>
<!-- /Steps -->
{/if}
