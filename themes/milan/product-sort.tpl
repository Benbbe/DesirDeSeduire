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
{if isset($orderby) AND isset($orderway)}
{* On 1.5 the var request is setted on the front controller. The next lines assure the retrocompatibility with some modules *}
{if !isset($request)}
	<!-- Sort products -->
	{if isset($smarty.get.id_category) && $smarty.get.id_category}
		{assign var='request' value=$link->getPaginationLink('category', $category, false, true)}
	{elseif isset($smarty.get.id_manufacturer) && $smarty.get.id_manufacturer}
		{assign var='request' value=$link->getPaginationLink('manufacturer', $manufacturer, false, true)}
	{elseif isset($smarty.get.id_supplier) && $smarty.get.id_supplier}
		{assign var='request' value=$link->getPaginationLink('supplier', $supplier, false, true)}
	{else}
		{assign var='request' value=$link->getPaginationLink(false, false, false, true)}
	{/if}
{/if}
<!-- cat-view-options -->
<div class="cat-view-options">
    <div class="row">
        <form id="productsSortForm{if isset($paginationId)}_{$paginationId}{/if}" action="{$request|escape:'html':'UTF-8'}" class="productsSortForm">
       <div class="col-md-4">
          <div class="row no-gutter form-group">
             <div class="col-md-4">
                <label class="cvo-label">{l s='Sort By'}</label>
             </div>
             <div class="col-md-8">
                 
                    <select id="selectProductSort{if isset($paginationId)}_{$paginationId}{/if}" class="selectProductSort form-control cvo-control s-styled hasCustomSelect">
                            <option value="{$orderbydefault|escape:'html':'UTF-8'}:{$orderwaydefault|escape:'html':'UTF-8'}" {if $orderby eq $orderbydefault}selected="selected"{/if}>--</option>
                            {if !$PS_CATALOG_MODE}
                                    <option value="price:asc" {if $orderby eq 'price' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Price: Lowest first'}</option>
                                    <option value="price:desc" {if $orderby eq 'price' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Price: Highest first'}</option>
                            {/if}
                            <option value="name:asc" {if $orderby eq 'name' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Product Name: A to Z'}</option>
                            <option value="name:desc" {if $orderby eq 'name' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Product Name: Z to A'}</option>
                            {if $PS_STOCK_MANAGEMENT && !$PS_CATALOG_MODE}
                                    <option value="quantity:desc" {if $orderby eq 'quantity' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='In stock'}</option>
                            {/if}
                            <option value="reference:asc" {if $orderby eq 'reference' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Reference: Lowest first'}</option>
                            <option value="reference:desc" {if $orderby eq 'reference' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Reference: Highest first'}</option>
                    </select>
                
             </div>
          </div>
       </div>
       <div class="col-md-3 col-lg-2">
           {include file="./nbr-product-page.tpl"}
       </div>
       <div class="col-md-3 col-lg-4 col-lg-offset-2 text-right">
          <label class="cvo-label">View</label>
          <div class="cvo-view-type" role="tablist">
             <ul class="display list-inline">
                <li class="active" id="grid">
                    <a href="#pl-grid" role="tab" data-toggle="tab"  class="cvo-grid">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="14px" height="14px" viewBox="0 0 50 50" xml:space="preserve">
                         <rect x="0" y="0" width="20" height="20"/>
                         <rect x="30" y="0" width="20" height="20"/>
                         <rect x="0" y="30" width="20" height="20"/>
                         <rect x="30" y="30" width="20" height="20"/>
                      </svg>
                   </a>
                </li>
                <li id="list">
                   <a href="#pl-list" role="tab" data-toggle="tab" class="cvo-list">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="14px" height="14px" viewBox="0 0 30.263 25.6" xml:space="preserve"
                         >
                         <rect width="7.732" height="6.398"/>
                         <rect y="9.6" width="7.732" height="6.4"/>
                         <rect y="19.199" width="7.732" height="6.398"/>
                         <rect x="10.933" y="9.602" width="19.33" height="6.4"/>
                         <rect x="10.933" y="19.199" width="19.33" height="6.4"/>
                         <rect x="10.933" width="19.33" height="6.4"/>
                      </svg>
                   </a>
                </li>
             </ul>
          </div>
       </div>
        </form>
    </div>
 </div>
    <!-- /Sort products -->
    {if !isset($paginationId) || $paginationId == ''}
            {addJsDef request=$request}
    {/if}
{/if}
