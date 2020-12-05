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
<a href="{$link->getPageLink('identity', true)|escape:'html':'UTF-8'}"><div {if
                                                                            $active=='identity'}class="active"{/if}><i class="icon-user"></i><br><span class="upcs">{l s='Your profile' mod='blockmyaccountleftnavigatorazl'}</span></div></a>

<a href="{$link->getPageLink('history', true)|escape:'html':'UTF-8'}">
    <div {if $active=='history'}class="active"{/if}>
        <i class="icon-clock"></i><br>
        <span class="upcs">{l s='History' mod='blockmyaccountleftnavigatorazl'}</span>
    </div>
</a>
{if $has_customer_an_address}
    <a href="{$link->getPageLink('address', true)|escape:'html':'UTF-8'}">
        <div {if $active=='address'}class="active"{/if}>
            <i class="icon-list"></i><br>
            <span class="upcs">{l s='Add my first address' mod='blockmyaccountleftnavigatorazl'}</span>
        </div>
    </a>
{/if}
<a href="{$link->getPageLink('addresses', true)|escape:'html':'UTF-8'}">
    <div {if $active=='addresses'}class="active"{/if}>
        <i class="icon-map"></i><br>
        <span class="upcs">{l s='My addresses' mod='blockmyaccountleftnavigatorazl'}</span>
    </div>
</a>
{if $returnAllowed}
<a href="{$link->getPageLink('order-follow', true)|escape:'html':'UTF-8'}">
    <div {if $active=='order-follow'}class="active"{/if}>
        <i class="icon-action-undo"></i><br>
        <span class="upcs">{l s='My merchandise returns' mod='blockmyaccountleftnavigatorazl'}</span>
    </div>
</a>
{/if}
<a href="{$link->getPageLink('order-slip', true)|escape:'html':'UTF-8'}">
    <div {if $active=='order-slip'}class="active"{/if}>
        <i class="icon-ban"></i><br>
        <span class="upcs">{l s='My credit slips' mod='blockmyaccountleftnavigatorazl'}</span>
    </div>
</a>
{if $voucherAllowed || isset($HOOK_CUSTOMER_ACCOUNT) && $HOOK_CUSTOMER_ACCOUNT !=''}
    {if $voucherAllowed}
    <a href="{$link->getPageLink('discount', true)|escape:'html':'UTF-8'}">
        <div {if $active=='discount'}class="active"{/if}>
            <i class="icon-list"></i><br>
            <span class="upcs">{l s='My vouchers' mod='blockmyaccountleftnavigatorazl'}</span>
        </div>
    </a>
    {/if}
    {$HOOK_CUSTOMER_ACCOUNT}{*HTML CONTENT*}
{/if}