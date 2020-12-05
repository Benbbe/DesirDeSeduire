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
<li class="btn-group dropdown">

    {if $logged}
        <a  href="#" class="pm_item" data-toggle="dropdown" title="{l s='View my customer account' mod='blockuserazl'}">
            <i class="icon-user"></i>
            <span class="hidden-sm hidden-xs">{$cookie->customer_firstname|escape:'htmlall':'UTF-8'} {$cookie->customer_lastname|escape:'htmlall':'UTF-8'}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <span class="dropdown-triangle-up"></span>
            <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>
            <div class="dropdown-head">
                <h4 class="pull-left">{l s='My Account' mod='blockuserazl'}</h4>
            </div>
            <div class="dd-wrapper">
                <div id="dd_login">
                    <div class="">
                        <div class="">
                            <ul class="">
                                {if $has_customer_an_address}
                                    <li><a href="{$link->getPageLink('address', true)|escape:'html':'UTF-8'}" title="{l s='Add my first address' mod='blockuserazl'}"><i class="icon-building"></i><span>{l s='Add my first address' mod='blockuserazl'}</span></a></li>
                                {/if}
                                <li><a href="{$link->getPageLink('history', true)|escape:'html':'UTF-8'}" title="{l s='Orders' mod='blockuserazl'}"><i class="icon-list-ol"></i><span>{l s='Order history and details' mod='blockuserazl'}</span></a></li>
                                {if $returnAllowed}
                                    <li><a href="{$link->getPageLink('order-follow', true)|escape:'html':'UTF-8'}" title="{l s='Merchandise returns' mod='blockuserazl'}"><i class="icon-refresh"></i><span>{l s='My merchandise returns' mod='blockuserazl'}</span></a></li>
                                {/if}
                                <li><a href="{$link->getPageLink('order-slip', true)|escape:'html':'UTF-8'}" title="{l s='Credit slips' mod='blockuserazl'}"><i class="icon-ban-circle"></i><span>{l s='My credit slips' mod='blockuserazl'}</span></a></li>
                                <li><a href="{$link->getPageLink('addresses', true)|escape:'html':'UTF-8'}" title="{l s='Addresses' mod='blockuserazl'}"><i class="icon-building"></i><span>{l s='My addresses' mod='blockuserazl'}</span></a></li>
                                <li><a href="{$link->getPageLink('identity', true)|escape:'html':'UTF-8'}" title="{l s='Information' mod='blockuserazl'}"><i class="icon-user"></i><span>{l s='My personal information' mod='blockuserazl'}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <a href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" class="btn btn-sm btn-sec-col">{l s='Log out' mod='blockuserazl'}</a>
                    </div>
                </div>
            </div>
        </div>
    {else}
        <a  href="#" class="pm_item" data-toggle="dropdown" title="login">
            <i class="icon-login"></i>
            <span class="hidden-sm hidden-xs">{l s='Login' mod='blockuserazl'}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <span class="dropdown-triangle-up"></span>
            <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>
            <div class="dropdown-head">
                <h4 class="pull-left">{l s='Sign in' mod='blockuserazl'}</h4>
            </div>
            <div class="dd-wrapper">
                <div id="dd_login">
                    <form action="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" method="post" id="login_form">
                        <div class="required form-group">
                            <input type="text" id="email" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email|stripslashes|escape:'htmlall':'UTF-8'}{/if}" placeholder="{l s='Email / Login' mod='blockuserazl'}" class="placeholder-fix">
                            <i class="icon_mail field-icon"></i>
                        </div>
                        <div class="required form-group">
                            <input type="password" id="passwd" name="passwd" value="{if isset($smarty.post.passwd)}{$smarty.post.passwd|stripslashes|escape:'htmlall':'UTF-8'}{/if}" placeholder="{l s='Password' mod='blockuserazl'}" class="placeholder-fix">
                            <i class="icon_lock field-icon"></i>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" id="SubmitLogin" name="SubmitLogin" class="btn btn-sm btn-third-col">{l s='Sign in'  mod='blockuserazl'}</button>
                        </div>
                        <div class="text-center">
                            <a href="{$link->getPageLink('password')|escape:'html':'UTF-8'}" title="{l s='Recover your forgotten password'  mod='blockuserazl'}" class="active">{l s='Forget your password?' mod='blockuserazl'}</a>
                        </div>
                        <div class="dd-delimiter"></div>
                        <div class="form-group text-center">
                            <a href="{$link->getPageLink('my-account', true)|escape:'htmlall':'UTF-8'}" class="btn btn-sm btn-sec-col">{l s='Register' mod='blockuserazl'}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {/if}
</li>