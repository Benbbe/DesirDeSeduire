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
	<form class="form-horizontal" method="POST">
		<div class="form-group">
			<label class="control-label col-lg-3">
				{l s='label' mod='megamenu'}
			</label>
			{foreach from=$languages item=language}
    			{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang|escape:'htmlall':'UTF-8'}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
					<div class="col-lg-3">
						<input value="{if isset($menuLink->label[$language.id_lang])}{$menuLink->label[$language.id_lang]|escape:'htmlall':'UTF-8'}{/if}" type="text" name="menuLink[label][{$language.id_lang|escape:'htmlall':'UTF-8'}]" id="label_{$language.id_lang|escape:'htmlall':'UTF-8'}-name">
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
				{l s='Url' mod='megamenu'}
			</label>
			<div class="col-md-3"> 
				<input type="text" value="{if isset($menuLink->url)}{$menuLink->url|escape:'htmlall':'UTF-8'}{/if}" name="menuLink[url]">
			</div>
			
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
			</label>
			{if $id_megamenu_link}
				<input type="hidden" name="menuLink[id_megamenu_link]" vale="{$id_megamenu_link|escape:'htmlall':'UTF-8'}">
			{/if}
			<input type="submit" class="btn btn-success" value="save" name="submit-link">
		</div>
	</form>
</div>