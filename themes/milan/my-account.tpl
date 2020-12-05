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

{capture name=path}{l s='My account'}{/capture}
{capture name=pageTitle}
    {l s='My account'}
{/capture}
<div class="container">
    <div class="row">
        <div class="container">
            {hook h="displayMyAccountTop"}
        </div>
    </div>
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
            <div class="row">
                <div class="col-xs-12 col-md-2 left-menu">
                    {hook h="displayMyAccountLeft"}
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    {if isset($account_created)}
                            <p class="alert alert-success">
                                    {l s='Your account has been created.'}
                            </p>
                    {/if}
                    <p class="info-account">{l s='Welcome to your account. Here you can manage all of your personal information and orders.'}</p>
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