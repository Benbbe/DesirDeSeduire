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
	{l s='Page not found'}
{/capture}
{capture name=pageTitle}
    {l s='Page not found'}
{/capture}
<div class="container">
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
            <div class="page-404">
               <h1>{l s='404'}</h1>
               <h5 class="upcs">{l s='This page is not available'}</h5>
               <h6 class="title-type-1">{l s='We\'re sorry, but the Web address you\'ve entered is no longer available.'}</h6>
               <p>{l s='To find a product, please type its name in the field below.'}</p>
               <form action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" method="post">
                  <div class="required form-group search col-sm-12 col-xs-12">
                     <input type="text" name="search_query" class="placeholder-fix" id="search_404_page" placeholder="{l s='Search our product catalog:'}">
                     <button type="submit"><i class="icon_search field-icon"></i></button>
                  </div>
               </form>
            </div>
             <div class="col-sm-12 col-xs-12 text-center">
                <a href="{$base_dir}" class="btn btn-third-col btn-lg"><span>{l s='Home page'}</span></a>
             </div>
             <div class="clearfix"></div>
             <div class="gap-25"></div>
        </div>
        {if !$hide_left_column}
        <div class="col-md-3 {if !$hide_left_column && !$hide_right_column}col-md-pull-6{else}col-md-pull-9{/if} cat-sidebar">
            <div class="gap-25"></div>
            <aside>
                {hook h="displayLeftColumn"}
            </aside>
        </div>
        {/if}
        {if !$hide_right_column}
        <div class="col-md-3 cat-sidebar">
            <div class="gap-25"></div>
            <aside>
                {hook h="displayRightColumn"}
            </aside>
        </div>
        {/if}
    </div>
    {hook h='display404Bottom'}
</div>