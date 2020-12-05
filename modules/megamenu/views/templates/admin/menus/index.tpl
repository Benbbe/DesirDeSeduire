{**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*}
<div>
	{if !empty($menus)}
	<table class="table table-border table-hover">
		<thead>
			<tr>
				<th>{l s='ID' mod='megamenu'}</th>
				<th>{l s='Label' mod='megamenu'}</th>
				<th>{l s='Position' mod='megamenu'}</th>
				<th>{l s='Status' mod='megamenu'}</th>
				<th>{l s='Action' mod='megamenu'}</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$menus item=menu}
				<tr>
				    <td>{$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}</td>
				    <td>{$menu.label|escape:'htmlall':'UTF-8'}</td>
				    <td>{$menu@iteration|escape:'htmlall':'UTF-8'}</td>
				    <td>
				    	{if $menu.status}
				    		<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=edit&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="list-action-enable action-enabled"><i class="icon-check"></i></a>
						{else}
				    		<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=edit&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="list-action-enable action-disabled"><i class="icon-remove"></i></a>
				    	{/if}
				    </td>
				    <td>
				    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=edit&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Edit' mod='megamenu'} <i class="icon-pencil"></i></a>
				    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=delete&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="btn btn-default confirm-delete">{l s='Delete' mod='megamenu'} <i class="icon-trash"></i></a>
				    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=changePosition&mm-position=up&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Up' mod='megamenu'} <i class="icon-arrow-up"></i></a>
				    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=changePosition&mm-position=down&id_megamenu_menu={$menu.id_megamenu_menu|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Down' mod='megamenu'} <i class="icon-arrow-down"></i></a>
				    </td>
			    <tr/>
			{/foreach}
		</tbody>
	</table>
	{else}
		<div class="alert alert-warning">
			{l s='There is no more menu' mod='megamenu'} <a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=edit">{l s='click here' mod='megamenu'}</a> {l s='to add menu' mod='megamenu'}
		</div>
	{/if}

</div>