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
<!-- block seach mobile -->
{if isset($hook_mobile)}
<div class="input_search" data-role="fieldcontain">
	<form method="get" action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" id="searchbox">
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search' mod='blocksearchazl'}" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
	</form>
</div>
{else}
<!-- Block search module TOP -->
<div class="col-md-3 top-search-box hidden-sm hidden-xs">
    <form method="get" action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" id="searchboxx">
        <div class="required form-group">
            {*<label for="search_query_top"><!-- image on background --></label>*}
            <input type="hidden" name="controller" value="search" />
            <input type="hidden" name="orderby" value="position" />
            <input type="hidden" name="orderway" value="desc" />
            <input class="placeholder-fix top-search" placeholder="{l s='Search' mod='blocksearchazl'}"  autocomplete="off" type="text" id="search_query_top" name="search_query" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
            {*<input type="submit" name="submit_search" value="{l s='Search' mod='blocksearch'}" class="button" />*}

            {*<input type="text" name="search_query" placeholder="Search" class="placeholder-fix top-search" autocomplete="off">*}
            <button><i class="icon_search field-icon"></i></button>
        </div>
    </form>
</div>
{if ((isset($milan_settings) && $milan_settings.header_layout == 0))}
    <div id="header-logo" class="col-md-6 col-sm-12 text-center">
            <a href="{$base_dir|escape:'html':'UTF-8'}" title="{$shop_name|escape:'html':'UTF-8'}">
                    <img class="logo hidden-xs" src="{$logo_url|escape:'html':'UTF-8'}" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width|escape:'html':'UTF-8'}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height|escape:'html':'UTF-8'}"{/if}/>
                    <img class="logo visible-xs-inline" src="{$logo_url|escape:'html':'UTF-8'}" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width|escape:'html':'UTF-8'}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height|escape:'html':'UTF-8'}"{/if}>
            </a>
    </div>
{/if}
{include file="$self/views/templates/hook/blocksearch-instantsearch_azl.tpl"}
{/if}
<!-- /Block search module TOP -->
