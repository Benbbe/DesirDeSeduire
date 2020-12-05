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
<!DOCTYPE HTML>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"><![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"><![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8" lang="{$lang_iso}"><![endif]-->
<!--[if gt IE 8]>
<html class="no-js ie9" lang="{$lang_iso}"><![endif]-->
<html lang="{$lang_iso}">
<head>

	<meta charset="utf-8"/>
	<title>{$meta_title|escape:'html':'UTF-8'}</title>

	{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}"/>
	{/if}

	{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}"/>
	{/if}

	<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow"/>
        {if isset($milan_settings)}
            {if $milan_settings.responsive_mode == 1}
                <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            {else}
                <meta name="viewport" content="width=1200">
            {/if}
        {else}
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        {/if}
	
	<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}"/>
	<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}"/>

	

	{if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
		{$js_def}
		{foreach from=$js_files item=js_uri}
			<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
		{/foreach}
	{/if}

	{$HOOK_HEADER}
	<script>
		$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
			options.async = true;
		});
	</script>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Open+Sans:300,400,700" type="text/css" media="all"/>
	<link rel="stylesheet" href='{$css_dir}fonts/helvetica.css' type='text/css'>
        
        {if isset($milan_settings)}
            {if $milan_settings.responsive_mode == 1}
                <link rel="stylesheet" href="{$css_dir}bootstrap.css" type="text/css">
            {else}
                <link rel="stylesheet" href="{$css_dir}nonresponsive-bootstrap.min.css" type="text/css">
            {/if}
        {else}
            <link rel="stylesheet" href="{$css_dir}bootstrap.css" type="text/css">
        {/if}
        
	
	<!-- <link rel="stylesheet" href="{$css_dir}plugins/accessiblemegamenu/megamenu.css"> -->

        {if isset($css_files)}
		{foreach from=$css_files key=css_uri item=media}
                    {if $css_uri == '/modules/themeeditorazl/views/css/themeeditor_s_1.css'}
                        {assign var="themeeditor_css" value=$css_uri}
                    {else}
                        {if strpos($css_uri, 'jquery.bxslider.css') == false}
                            <link rel="stylesheet" href="{$css_uri|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}"/>
                        {/if}
                    {/if}
		{/foreach}
	{/if}
        
	<link rel="stylesheet" href="{$js_dir}plugins/responsiveslides/responsiveslides.css" type="text/css">
        <link rel="stylesheet" href="{$css_dir}jquery-ui.theme.css" type="text/css">
	<link rel="stylesheet" href="{$css_dir}style.css" type="text/css">
	<link rel="stylesheet" href="{$css_dir}fonts/simple-line-icons.css" type="text/css">
	<link rel="stylesheet" href="{$css_dir}fonts/elegant-icons.css" type="text/css">
	<script type="application/javascript" src="{$js_dir}modernizr-2.6.2.min.js"></script>
        {if isset($themeeditor_css)}
            <link rel="stylesheet" href="{$themeeditor_css|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}"/>
        {/if}
        <script type="text/javascript">
            var ajaxPopupAfterAddToCart = {if isset($milan_settings)&& $milan_settings.ajax_popup == 0}false{else}true{/if};
        </script>

</head>
<body style="{if !isset($milan_settings)}background-color: #eeeeee;{/if}" {if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if isset($content_only) && $content_only} content_only{/if} lang_{$lang_iso}">
{if ((isset($milan_settings) && $milan_settings.page_preloader))}
    <div class="loading" id="main-preloader"></div>
    <div id="main-preloaded-contnent" style="display: none;">
{/if}
{if !isset($content_only) || !$content_only}
{if isset($restricted_country_mode) && $restricted_country_mode}
	{*@TODO Bu hisseni dizaynini duzeltdir*}
	<div id="restricted-country">
		<p>{l s='You cannot place a new order from your country.'}
			<span class="bold">{$geolocation_country|escape:'html':'UTF-8'}</span></p>
	</div>
{/if}
{*@TODO settings boxed or full version*}
<div class="{if (isset($milan_settings) && $milan_settings.page_width != 'full') || !isset($milan_settings)}boxed-layout{/if}">
<header>
<!-- top bar begin -->
<div id="top-bar">
	<div class="container">
		<div class="pull-left left-top-bar">
			{hook h="displayNavLeft"}
		</div>
		<div class="pull-right">
			<div id="user-top-bar">
				<ul class="list-inline">
					{hook h="displayNavRight"}
					{*basket in mobile*}
					<li class="btn-group">
						<a href="#" class="pm_item visible-xs">
							<i class="icon-bag"></i> (2)
						</a>
					</li>
					{*basket in mobile END *}
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- top bar end -->
<!-- header bar begin -->
<div id="header-bar">
	<div class="container">
		<div class="row">
			{*@TODO add 'text-center' class in non boxed version *}
                        {if ((isset($milan_settings) && $milan_settings.header_layout == 1) || !isset($milan_settings))}
                            <div id="header-logo" class="col-md-6 col-sm-12 {*text-center*}">
                                    <a href="{$base_dir}" title="{$shop_name|escape:'html':'UTF-8'}">
                                            <img class="logo hidden-xs" src="{$logo_url}" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height}"{/if}/>
                                            <img class="logo visible-xs-inline" src="{$logo_url}" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height}"{/if}>
                                    </a>
                            </div>
                        {/if}
			{if isset($HOOK_TOP)}{$HOOK_TOP}{/if}
		</div>
	</div>
</div>
<!-- header bar end -->


    {if $page_name !='index'}
        {include file="$tpl_dir./breadcrumb.tpl"}
    {/if}

</header>
<!-- page body content begin -->
<div class="pg-body">
	{hook h="displayTopColumn"}
{/if}