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
	{if !empty($links)}
		<table class="table table-border table-hover">
			<thead>
				<tr>
					<th>{l s='ID' mod='megamenu'}</th>
					<th>{l s='Label' mod='megamenu'}</th>
					<th>{l s='URL' mod='megamenu'}</th>
					<th>{l s='Action' mod='megamenu'}</th>
				</tr>
			</thead>
			<tbody>

				{foreach from=$links item=link}
				 	<tr>
					    <td>{$link.id_megamenu_link|escape:'htmlall':'UTF-8'}</td>
					    <td>{$link.label|escape:'htmlall':'UTF-8'}</td>
					    <td>{$link.url|escape:'htmlall':'UTF-8'}</td>
					    <td>
					    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Links&mm-action=edit&id_megamenu_link={$link.id_megamenu_link|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Edit' mod='megamenu'} <i class="icon-pencil"></i></a>
					    	<a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Links&mm-action=delete&id_megamenu_link={$link.id_megamenu_link|escape:'htmlall':'UTF-8'}" class="btn btn-default confirm-delete">{l s='Delete' mod='megamenu'} <i class="icon-trash"></i></a>
					    <tr/>
				{/foreach}
				
			</tbody>
		</table>
	{else}
		<div class="alert alert-warning">
			{l s='There is no more link' mod='megamenu'} <a href="#">{l s='click here' mod='megamenu'}</a> {l s='to add link' mod='megamenu'}
		</div>		
	{/if}

</div>