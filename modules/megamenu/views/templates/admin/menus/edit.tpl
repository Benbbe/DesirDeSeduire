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
	<form class="form-horizontal" method="POST" id="megamenu-update" enctype="multipart/form-data">
		<input type="submit" class="btn btn-success pull-right" value="Save" id="submit-megamenu" name="submit-megamenu">
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='Label' mod='megamenu'}
			</label>
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang|escape:'htmlall':'UTF-8'}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
					<div class="col-lg-3">
						<input value="{if isset($menu['label'][$language.id_lang])}{$menu['label'][$language.id_lang]|escape:'htmlall':'UTF-8'}{/if}" type="text" name="menu[label][{$language.id_lang|escape:'htmlall':'UTF-8'}]" id="label_{$language.id_lang|escape:'htmlall':'UTF-8'}-name">
					</div>
				{if $languages|count > 1}
					<div class="col-lg-2">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							{$language.iso_code|escape:'htmlall':'UTF-8'}
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang|escape:'htmlall':'UTF-8'});" tabindex="-1">{$lang.name|escape:'htmlall':'UTF-8'}</a></li>
							{/foreach}
						</ul>
					</div>
				{/if}
				{if $languages|count > 1}
					</div>
				{/if}
			{/foreach}
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='Icon Type' mod='megamenu'}
			</label>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-icon" value="icon" {if isset($menu['icon_type']) && $menu['icon_type'] == 'icon'}checked="checked"{/if}>
				<label for="icon-type-icon">Icon</label>
			</div>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-image" value="image" {if isset($menu['icon_type']) && $menu['icon_type'] == 'image'}checked="checked"{/if}>
				<label for="icon-type-image">Image</label>
			</div>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-none" value="" {if ((isset($menu['icon_type']) && $menu['icon_type'] == '') || !isset($menu['icon_type']))}checked="checked"{/if}>
				<label for="icon-type-none">None</label>
			</div>
		</div>
		<div class="form-group icon_type_icon icon_type_group">
			<label class="control-label col-lg-3" for="icon-name">
				{l s='Icon' mod='megamenu'}
			</label>
			<div class="col-lg-3">
				<input value="{if isset($menu['icon'])}{$menu['icon']|escape:'htmlall':'UTF-8'}{/if}" type="text" name="menu[icon]" id="icon-name">
			</div>
			<div class="col-lg-3">
				<a class="btn btn-primary" data-toggle="modal" data-target="#iconModal">Select Icons</a>
			</div>
		</div>
		<div class="form-group icon_type_image icon_type_group">
			<label class="control-label col-lg-3" for="icon-image">
				{l s='Icon Image' mod='megamenu'}
			</label>
			<div class="col-lg-9">
				<input type="file" name="icon_image" id="icon-image" class="form-controll">
				{if isset($menu['icon_type']) && $menu['icon_type'] == 'image'}
					<div><img src="{$imagePath|escape:'htmlall':'UTF-8'}/{$id_megamenu_menu|escape:'htmlall':'UTF-8'}.png"></div>
				{/if}
			</div>
			
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='Status' mod='megamenu'}
			</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" value="1" id="active_on" name="menu[status]" {if isset($menu['status']) && $menu['status'] == 1}checked="checked"{/if}>
					<label class="radioCheck" for="active_on">
						{l s='Yes' mod='megamenu'}
					</label>
					<input type="radio" value="0" id="active_off" name="menu[status]" {if isset($menu['status']) && $menu['status'] == 0}checked="checked"{/if}>
					<label class="radioCheck" for="active_off">
						{l s='No' mod='megamenu'}
					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='Link' mod='megamenu'}
			</label>
			<div class="col-lg-3">
				<select class="form-controller customlink-options" name="menu[is_customlink]">
					<option value="1" {if isset($menu['is_customlink']) && $menu['is_customlink'] == 1}selected="selected"{/if}>{l s='URL' mod='megamenu'}</option>
					<option value="0" {if isset($menu['is_customlink']) && $menu['is_customlink'] == 0}selected="selected"{/if}>{l s='Exist Links' mod='megamenu'}</option>
				</select>
				<input type="text" value="{if isset($menu['custom_link'])}{$menu['custom_link']|escape:'htmlall':'UTF-8'}{/if}" class="form-controller menulink-custom" name="menu[custom_link]" placeholder="Custom Url">
				<select name="menu[link_object_id]" class="form-controller menulink-exist">
					{$existLinksOptions|escape:'quotes':'UTF-8'}
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='Make Megamenu' mod='megamenu'}
			</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" value="1" id="is_megamenu_on" name="menu[is_megamenu]" class="is_megamenu" {if isset($menu['is_megamenu']) && $menu['is_megamenu'] == 1}checked="checked"{/if}>
					<label class="radioCheck" for="is_megamenu_on">
						{l s='Yes' mod='megamenu'}
					</label>
					<input type="radio" value="0" id="is_megamenu_off" name="menu[is_megamenu]" class="is_megamenu" {if (isset($menu['is_megamenu']) && $menu['is_megamenu'] == 0) || !isset($menu['is_megamenu'])}checked="checked"{/if}>
					<label class="radioCheck" for="is_megamenu_off">
						{l s='No' mod='megamenu'}
					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<input type="hidden" name="rowcount" id="rowcount" value="{if isset($menu['content']) && $menu['content']|count}{$menu['content']|count}{else}1{/if}">
		<div class="megamenu-panelcontroll">
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Full width' mod='megamenu'}
				</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" value="1" id="is_fullwidth_on" name="menu[is_fullwidth]" {if isset($menu['is_fullwidth']) && $menu['is_fullwidth'] == 1}checked="checked"{/if}>
						<label class="radioCheck" for="is_fullwidth_on">
							{l s='Yes' mod='megamenu'}
						</label>
						<input type="radio" value="0" id="is_fullwidth_off" name="menu[is_fullwidth]" {if isset($menu['is_fullwidth']) && $menu['is_fullwidth'] == 0}checked="checked"{/if}>
						<label class="radioCheck" for="is_fullwidth_off">
							{l s='No' mod='megamenu'}
						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
			<a href="#" class="btn btn-default row-addbtn pull-right">{l s='Add Row' mod='megamenu'}</a>
			<div class="megamenu-panel">
				{for $row=1 to $allowedRowSize}
					<div class="megamenu-row" id="megamenu-row-{$row|intval}">
						<input type="hidden" name="content[{$row|intval}][is_active]" value="1" id="active-row-{$row|intval}" class="row_isactive">
						<div class="megamenu-rowcontroll">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label col-lg-4">
											{l s='Row Size' mod='megamenu'}
										</label>
										<div class="col-lg-6">
											<select class="form-controller grid_size" name="content[{$row|intval}][grid_size]" data-row="{$row|intval}">
												<option value="1" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 1}selected="selected"{/if}>1</option>
												<option value="2" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 2}selected="selected"{/if}>2</option>
												<option value="3" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 3}selected="selected"{/if}>3</option>
												<option value="4" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 4}selected="selected"{/if}>4</option>
												<option value="6" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 6}selected="selected"{/if}>6</option>
												<option value="12" {if isset($menu['content'][$row]) && $menu['content'][$row]|count == 12}selected="selected"{/if}>12</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-8">
									<a href="#" class="btn btn-danger row-removebtn pull-right" data-row="{$row|intval}">{l s='Remove Row' mod='megamenu'}</a>
								</div>
							</div>
						</div>
						<div class="row megamenu-item-row">
							{for $column=1 to 12}
								<div class="megamenu-item-column col-md-1">
									<input type="hidden" name="content[{$row|intval}][item][{$column|intval}][is_active]" value="1" id="active-column-{$row|intval}-{$column|intval}" class="column_isactive">
									<div class="megamenu-column">
										<div class="form-group">
											<label class="control-label col-lg-4">
												{l s='Title' mod='megamenu'}
											</label>
											{foreach from=$languages item=language}
												{if $languages|count > 1}
													<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
												{/if}
													<div class="col-lg-6">
														<input type="text" name="content[{$row|intval}][item][{$column|intval}][title][{$language.id_lang|intval}]" value="{if isset($menu['content'][$row][$column]['title'][$language.id_lang])}{$menu['content'][$row][$column]['title'][$language.id_lang]|escape:'htmlall':'UTF-8'}{/if}">
													</div>
												{if $languages|count > 1}
													<div class="col-lg-2">
														<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
															{$language.iso_code|escape:'htmlall':'UTF-8'}
															<span class="caret"></span>
														</button>
														<ul class="dropdown-menu">
															{foreach from=$languages item=lang}
																<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'htmlall':'UTF-8'}</a></li>
															{/foreach}
														</ul>
													</div>
												{/if}
												{if $languages|count > 1}
													</div>
												{/if}
											{/foreach}
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">
												{l s='Custom Class' mod='megamenu'}
											</label>
											<div class="col-lg-8">
												<input type="text" value="{if isset($menu['content'][$row][$column]['custom_class'])}{$menu['content'][$row][$column]['custom_class']|escape:'htmlall':'UTF-8'}{/if}" name="content[{$row|intval}][item][{$column|intval}][custom_class]" class="form-controller">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">
												{l s='Grid Size' mod='megamenu'}
											</label>
											<div class="col-lg-8">
												<select class="form-controller column_grid_size" name="content[{$row|intval}][item][{$column|intval}][grid]">
													{for $grid=1 to 12}
														<option value="{$grid|escape:'htmlall':'UTF-8'}" {if isset($menu['content'][$row][$column]['grid']) && $menu['content'][$row][$column]['grid'] == $grid}selected="selected"{/if}>{$grid|escape:'htmlall':'UTF-8'}</option>
													{/for}
												</select>
											</div>
										
										</div>
										<div>
											<div class="form-group">
												<label class="control-label col-lg-4">
													{l s='Type' mod='megamenu'}
												</label>
												<div class="col-lg-8">

													<select class="form-controller megamenu-optiontype" name="content[{$row|intval}][item][{$column|intval}][type]">
														<option value="">{l s='Hide This' mod='megamenu'}</option>
														<option value="LNK" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'LNK'}selected="selected"{/if}>{l s='Link' mod='megamenu'}</option>
														<option value="CUS" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'CUS'}selected="selected"{/if}>{l s='Custom HTML' mod='megamenu'}</option>
														<option value="PRO" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'PRO'}selected="selected"{/if}>{l s='Product' mod='megamenu'}</option>
														<option value="SLI" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'SLI'}selected="selected"{/if}>{l s='Slider' mod='megamenu'}</option>
													</select>
												</div>
											</div>
											<div class="megamenu-iteminput">
												<div class="megamenu-itemoption LNK" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'LNK'}style="display:block;"{/if}>
													<select class="form-controller" multiple="multiple" name="content[{$row|intval}][item][{$column|intval}][LNK][]">
														{foreach from=$linkGroups key=linkGroupName item=linkGroup}
															<optgroup label="{$linkGroupName|escape:'htmlall':'UTF-8'}">
																{foreach from=$linkGroup key=linkId item=link}
																	<option value="{$linkId|escape:'quotes':'UTF-8'}" {if isset($menu['content'][$row][$column]['LNK'][$linkId])}selected="selected"{/if}>{$link|escape:'quotes':'UTF-8'}</option>
																{/foreach}
															</optgroup>
														{/foreach}
													</select>
												</div>
												<div class="megamenu-itemoption text-center CUS" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'CUS'}style="display:block;"{/if}>
													<a class="btn btn-default edit_customhtml" href="#" data-row="{$row|intval}" data-column="{$column|intval}">
													 	<i class="icon-pencil"></i> {l s='View/Edit Html' mod='megamenu'} 
													</a>
													{foreach from=$languages item=language}
														<textarea class="customhtml_hidden hidden" data-lang="{$language.id_lang|intval}" name="content[{$row|intval}][item][{$column|intval}][CUS][{$language.id_lang|intval}]" id="customhtml-{$row|intval}-{$column|intval}-CUS_{$language.id_lang|intval}">{if isset($menu['content'][$row][$column]['custom_html'][$language.id_lang])}{$menu['content'][$row][$column]['custom_html'][$language.id_lang]|escape:'htmlall':'UTF-8'}{/if}</textarea>
														
													{/foreach}
												</div>
												<div class="megamenu-itemoption PRO" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'PRO'}style="display:block;"{/if}>
													<input value="{if isset($menu['content'][$row][$column]['id_product'])}{$menu['content'][$row][$column]['id_product']|escape:'htmlall':'UTF-8'}{/if}" type="text" name="content[{$row|intval}][item][{$column|intval}][PRO]" placeholder="{l s='Product ID' mod='megamenu'}">
												</div>
												<div class="megamenu-itemoption SLI" {if isset($menu['content'][$row][$column]['type']) && $menu['content'][$row][$column]['type'] == 'SLI'}style="display:block;"{/if}>
													<label class="control-label">
														{l s='Category To slide' mod='megamenu'}
													</label>
													
													<select class="form-controller slider" name="content[{$row|intval}][item][{$column|intval}][SLI][id_category]">
														{foreach from=$categories key=id_category item=category}
															<option value="{$id_category|escape:'quotes':'UTF-8'}" {if isset($menu['content'][$row][$column]['SLI']['id_category']) && $menu['content'][$row][$column]['SLI']['id_category'] == $id_category}selected="selected"{/if}>{$category|escape:'quotes':'UTF-8'}</option>
														{/foreach}
													</select>
													<label class="control-label">
														{l s='Number of products' mod='megamenu'}
													</label>
													<input class="form-control" value="{if isset($menu['content'][$row][$column]['SLI']['count'])}{$menu['content'][$row][$column]['SLI']['count']|escape:'htmlall':'UTF-8'}{/if}" type="number" name="content[{$row|intval}][item][{$column|intval}][SLI][count]" placeholder="{l s='Count' mod='megamenu'}">
												</div>
											</div>
										</div>
									</div>
								</div>
							{/for}
						</div>
					</div>
				{/for}
			</div>
		</div>
	</form>
</div>

<!-- Modal -->
<div class="modal fade" id="customHTMLText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">{l s='Custom Html' mod='megamenu'}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{foreach from=$languages item=language}
						{if $languages|count > 1}
							<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
						{/if}
							<div class="col-lg-11">
								<textarea data-actual="" rows="7" id="customhtml-{$language.id_lang|intval}" name="customhtml-{$language.id_lang|intval}" class="form-control rte customhtml_input"></textarea>
							</div>
						{if $languages|count > 1}
							<div class="col-lg-1">
								<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
									{$language.iso_code|escape:'htmlall':'UTF-8'}
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									{foreach from=$languages item=lang}
										<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'htmlall':'UTF-8'}</a></li>
									{/foreach}
								</ul>
							</div>
						{/if}
						{if $languages|count > 1}
							</div>
						{/if}
					{/foreach}
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" type="button" class="btn btn-primary close-customhtml">{l s='Save changes' mod='megamenu'}</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="iconModal">Icon List</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{foreach from=$icons item=icon}
						<div class="col-md-3">

							<div class="icons-item" data-icon-name="{$icon|escape:'htmlall':'UTF-8'}">
								<span class="{$icon|escape:'htmlall':'UTF-8'}" aria-hidden="true"></span>&nbsp;{$icon|escape:'htmlall':'UTF-8'}
							</div>
						</div>
					{/foreach}

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">	
	var iso = "{$lang_iso|escape:'htmlall':'UTF-8'}";
	var pathCSS = "{$theme_css|escape:'htmlall':'UTF-8'}";
	var ad = "{$admin_folder|escape:'htmlall':'UTF-8'}";
	//tinySetup();
	$("#megamenu-admin").on("change", ".megamenu-optiontype", function(event){
	 	changeOptionType($(this));
	});

	$('#iconModal .icons-item').click(function(){
		var icon = $(this).data('icon-name');
		$('#icon-name').val(icon);
		$('#iconModal').modal('hide');
	});

	$('.edit_customhtml').click(function(){
		$(this).parent().find('.customhtml_hidden').each(function(){
			var langId = $(this).attr('data-lang');
			$('#customhtml-'+langId).val($(this).val());
			$('#customhtml-'+langId).attr('data-actual',$(this).attr('id'));
		});
		tinySetup();
		$('#customHTMLText').modal('show');
		return false;
	});

	$('.close-customhtml').click(function(){
		$('#customHTMLText').modal('hide');
		tinyMCE.remove();

		$('.customhtml_input').each(function(){
			var inputvalue = $(this).attr('data-actual');
			$('#'+inputvalue).val($(this).val());
		});
		$('#customHTMLText').modal('hide');
		return false;
	});

	
	$(document).ready(function(){
		$('.grid_size').each(function(){
			changeColumnSize($(this));
			//$('#megamenu-row'+rowCount).
		});
		switchMegamenu();
		hideAndDisplayRow();
		changeMenuURL();
		checkAddNewRow();
		switchIconOption();
	});
	$('.is_megamenu').click(function(){
		switchMegamenu();
	});

$('.icon_type').click(function(){
		switchIconOption();
	});

	$('.column_grid_size').change(function(){
		var gridSize = $(this).val();
		$(this).parent().parent().parent().parent().attr('class','megamenu-item-column col-md-'+gridSize);
	});
	

	$('.row-removebtn').click(function(){
		var rowCount = $(this).attr('data-row');
		var didconfirm = confirm("{l s='Are you sure? Do you want to delete this row?' mod='megamenu'}");
		if(didconfirm){
			$('#megamenu-row-'+rowCount).hide();
		}
		checkAddNewRow();
		return false;
	});

	$("#megamenu-admin").on("change", ".grid_size", function(event){
	 	changeColumnSize($(this));
	});	

	$('#megamenu-update').submit(function(){
		var ISfilled = $('input[required=required]').val();
		changeRowSize();
		if(ISfilled == ''){
			//alert("{l s='Please give lable for menu' mod='megamenu'}"");
			//return false;
		}
		
		return true;
	});
	$('.customlink-options').change(function(){
		changeMenuURL();
	});

	$('.row-addbtn').click(function(){
		$('.megamenu-row:visible').next().show();
		checkAddNewRow();
		return false;
	});

	function changeMenuURL(){
		var isCustomHtml = $('.customlink-options').val();
		if(isCustomHtml == 1){
			$('.menulink-exist').hide();
			$('.menulink-custom').show();
		} else {
			$('.menulink-exist').show();
			$('.menulink-custom').hide();
		}
	}

	function checkAddNewRow(){
		var rowCount = $('.megamenu-row:visible').length;
		if(rowCount >= '{$allowedRowSize}'){
			$('.row-addbtn').hide();
		} else {
			$('.row-addbtn').show();
		}
	}

	function hideAndDisplayRow(){
		var rowCount = $('#rowcount').val();
		var currentCount = 1;
		$('.megamenu-row').each(function(){
			$(this).hide();
			if(currentCount <= rowCount){
				$(this).show();
			}
			currentCount++;
		});


	}

	function switchMegamenu(){
		var isMegamenu = $('.is_megamenu:checked').val();
			
		$('.megamenu-panelcontroll').hide();
		if(isMegamenu == 1){
			$('.megamenu-panelcontroll').show();
		}
	}

	function changeColumnSize(currentOption){
		
		var gridSize = currentOption.val();
		var rowCount = currentOption.attr('data-row');
		var eachColumnSize = 12/gridSize;
		var currentColumn = 1;
		$('#megamenu-row-'+rowCount).find('.megamenu-item-row .megamenu-item-column').each(function(){
			var $column = $(this);
			
			$column.hide();
			$column.find('.column_isactive').val('0');
			var gridExistVal = $column.find('.column_grid_size option[selected]').attr('value');
			//alert(gridExistVal);
			if(!gridExistVal){

				$column.find('.column_grid_size').val(eachColumnSize);
			}
			gridExistVal = $column.find('.column_grid_size').val()
			$column.attr('class','megamenu-item-column col-md-'+gridExistVal);
			if(currentColumn <= gridSize){
				$column.show();
				$column.find('.column_isactive').val('1');
			}
			currentColumn++;
		});
	}

	function changeOptionType($this){
		var selectedValue = $this.val();
		var optionElements = $this.parent().parent().parent().find('.megamenu-itemoption');
		optionElements.each(function(){
			$(this).hide();
		});
		$this.parent().parent().parent().find('.megamenu-itemoption.'+selectedValue).show();
	}

	function changeRowSize(){
		$('.megamenu-panel .megamenu-row').each(function(){
			var $this = $(this);
			if($this.is(":visible")){
				$(this).find('.row_isactive').val('1');
			} else {
				$(this).find('.row_isactive').val('0');
			}
		});
	}
	$(document).on('focusin', function(e) {
		if ($(e.target).closest(".mce-window").length) {
			e.stopImmediatePropagation();
		}
	});
	function switchIconOption(){
		var icontype = $('.icon_type:checked').val();
		$('.icon_type_group').each(function(){
			$(this).hide();
		});
		$('.icon_type_'+icontype).show();
	}
</script>