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
<!-- Block Newsletter module-->
<div class="container subscribe_container">
    <div class="row subscribe">
        <div class="col-md-6 col-sm-12">
            <h3><span class="icon-envelope"></span>{l s='Newsletter' mod='blocknewsletter'}</h3>
        </div>
        <div class="col-md-6 col-sm-12">
            <form action="{$link->getPageLink('index', true)|escape:'html'}" method="post">
                <div class="required form-group search col-sm-8 col-xs-12">
                    <input type="text" id="newsletter-input" placeholder="{l s='Enter your e-mail adress' mod='blockcnewsletter'}" class="placeholder-fix{if isset($nw_error) && $nw_error } required-alert{elseif isset($msg) && $msg} success-alert{/if}" name="email" value="{if isset($msg) && $msg}{$msg}{elseif isset($value) && $value}{$value}{else}{l s='Enter your e-mail' mod='blocknewsletter'}{/if}">
                </div>
                <div class="col-sm-4 col-xs-12">
                    <input type="submit" class="btn btn-sec-col" value="{l s='Ok' mod='blocknewsletter'}" name="submitNewsletter">
                    <input type="hidden" name="action" value="0" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Block Newsletter module-->
{strip}
    {if isset($msg) && $msg}
        {addJsDef msg_newsl=$msg|@addcslashes:'\''}
    {/if}
    {if isset($nw_error)}
        {addJsDef nw_error=$nw_error}
    {/if}
    {addJsDefL name=placeholder_blocknewsletter}{l s='Enter your e-mail' mod='blocknewsletter' js=1}{/addJsDefL}
    {if isset($msg) && $msg}
        {addJsDefL name=alert_blocknewsletter}{l s='Newsletter : %1$s' sprintf=$msg js=1 mod="blocknewsletter"}{/addJsDefL}
    {/if}
{/strip}