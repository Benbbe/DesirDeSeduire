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
<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Clients list' mod='ourclientsayazl'}
	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=ourclientsayazl&addClient=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="clientsContent">
		<div id="clients">
			{foreach from=$clients item=client}
				<div id="clients_{$client.id_client|escape:'htmlall':'UTF-8'}" class="panel">
					<div class="row">
						<div class="col-lg-1">
							<span><i class="icon-arrows "></i></span>
						</div>
						<div class="col-md-3">
							<img src="{$image_baseurl|escape:'htmlall':'UTF-8'}{$client.image|escape:'htmlall':'UTF-8'}" alt="{$client.title|escape:'htmlall':'UTF-8'}" class="img-thumbnail" />
						</div>
						<div class="col-md-8">
							<h4 class="pull-left">#{$client.id_client|escape:'htmlall':'UTF-8'} - {$client.title|escape:'htmlall':'UTF-8'}</h4>
							<div class="btn-group-action pull-right">
								{$client.status}{*HTML CONTENT*}
								
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'htmlall':'UTF-8'}&configure=ourclientsayazl&id_client={$client.id_client|escape:'htmlall':'UTF-8'}">
									<i class="icon-edit"></i>
									{l s='Edit' mod='ourclientsayazl'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'htmlall':'UTF-8'}&configure=ourclientsayazl&delete_id_client={$client.id_client|escape:'htmlall':'UTF-8'}">
									<i class="icon-trash"></i>
									{l s='Delete' mod='ourclientsayazl'}
								</a>
							</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
	</div>
</div>