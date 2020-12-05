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
<div class="container">
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
{if isset($cms) && !isset($cms_category)}
	{if !$cms->active}
		<br />
		<div id="admin-action-cms">
			<p>
				<span>{l s='This CMS page is not visible to your customers.'}</span>
				<input type="hidden" id="admin-action-cms-id" value="{$cms->id}" />
				<input type="submit" value="{l s='Publish'}" name="publish_button" class="button btn btn-default"/>
				<input type="submit" value="{l s='Back'}" name="lnk_view" class="button btn btn-default"/>
			</p>
			<div class="clear" ></div>
			<p id="admin-action-result"></p>
			</p>
		</div>
	{/if}
        <div class="gap-30"></div>
	<div class="rte{if $content_only} content_only{/if}">
            {$cms->content}
	</div>
{elseif isset($cms_category)}
    
	<div class="block-cms">
            {capture name=pageTitle}
                {$cms_category->name|escape:'html':'UTF-8'}
            {/capture}
		
		{if $cms_category->description}
                    <div class="gap-30"></div>
                    <p>{$cms_category->description|escape:'html':'UTF-8'}</p>
		{/if}
		{if isset($sub_category) && !empty($sub_category)}	
			<h6 class="title-type-1">{l s='List of sub categories in %s:' sprintf=$cms_category->name}</h6>
			<ul class="bullet list-group list-unstyled">
				{foreach from=$sub_category item=subcategory}
					<li>
						<a class="list-group-item" href="{$link->getCMSCategoryLink($subcategory.id_cms_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|escape:'html':'UTF-8'}</a>
					</li>
				{/foreach}
			</ul>
		{/if}
		{if isset($cms_pages) && !empty($cms_pages)}
                    <div class="gap-30"></div>
                    <h6 class="title-type-1">{l s='List of pages in %s:' sprintf=$cms_category->name}</h6>
			<ul class="bullet list-group list-unstyled">
				{foreach from=$cms_pages item=cmspages}
					<li>
						<a class="list-group-item" href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'html':'UTF-8'}">{$cmspages.meta_title|escape:'html':'UTF-8'}</a>
					</li>
				{/foreach}
			</ul>
		{/if}
	</div>
{else}
	<div class="alert alert-danger">
            {l s='This page does not exist.'}
	</div>
{/if}
<br />
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
</div>

{strip}
{if isset($smarty.get.ad) && $smarty.get.ad}
{addJsDefL name=ad}{$base_dir|cat:$smarty.get.ad|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{if isset($smarty.get.adtoken) && $smarty.get.adtoken}
{addJsDefL name=adtoken}{$smarty.get.adtoken|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{/strip}