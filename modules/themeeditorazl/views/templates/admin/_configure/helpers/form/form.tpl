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
{extends file="helpers/form/form.tpl"}

{block name="defaultForm"}
    <div class="row">
        <div class="col-lg-2">
            <div id="options_tab" class="">
                <ul class="list-group">
                    {foreach $fields as $tab}
                        {if $tab.form.tab_name != 'save_tab'}
                            <li {if $tab.form.tab_name == 'main_tab'}class="active"{/if}>
                            <a class="list-group-item" href="#{$tab.form.tab_name}">{$tab.form.legend.title}</a></li>{/if}
                    {/foreach}
                    <ul>
            </div>
        </div>
        <div class="col-lg-10 tab-content">
            {$smarty.block.parent}
        </div>
    </div>
{/block}

{block name="fieldset"}
    {if $fieldset.form.tab_name != 'save_tab'}<div class="tab-pane {if $fieldset.form.tab_name == 'main_tab'}active{/if}" id="{$fieldset.form.tab_name|escape:'htmlall':'UTF-8'}">{/if}
    {$smarty.block.parent}
    {if $fieldset.form.tab_name != 'save_tab'}</div>{/if}
{/block}


{block name="input_row"}
    {if isset($input.preffix_wrapper)}<div id="{$input.preffix_wrapper|escape:'htmlall':'UTF-8'}" {if isset($input.wrapper_hidden) && $input.wrapper_hidden} class="hidden"{/if}>{/if}
    {if isset($input.upper_separator) && $input.upper_separator}
        <hr>
    {/if}
    {if isset($input.row_title)}
        <div class="col-lg-9 col-lg-offset-3 row-title">{$input.row_title|escape:'htmlall':'UTF-8'}</div>
    {/if}
    {$smarty.block.parent}
    {if isset($input.separator) && $input.separator}
        <hr>
    {/if}
    {if isset($input.suffix_wrapper) && $input.suffix_wrapper}</div>{/if}
{/block}

{block name="input"}
    {if $input.type == 'link_url'}
        <a href="{$input.url|escape:'htmlall':'UTF-8'}" data-fancybox-type="iframe" class="btn btn-default fancybox">{$input.label|escape:'htmlall':'UTF-8'}
            <i class="icon-angle-right"></i></a>
    {elseif $input.type == 'image'}
        <p>
            <input id="{$input.name|escape:'htmlall':'UTF-8'}" type="text" name="{$input.name|escape:'htmlall':'UTF-8'}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}">
        </p>
        <a href="filemanager/dialog.php?type=1&field_id={$input.name|escape:'htmlall':'UTF-8'}" class="btn btn-default iframe-upload" data-input-name="{$input.name|escape:'htmlall':'UTF-8'}" type="button">{l s='Select image' mod='themeeditorazl'}
            <i class="icon-angle-right"></i></a>
    {elseif $input.type == 'radio_image'}
        <div class="azl-radio-image">
            {foreach $input.values as $value}
                <div class="ari-radio {if isset($input.class)}{$input.class|escape:'htmlall':'UTF-8'}{/if}">
                    {strip}
                        <label>
                            <input type="radio"    name="{$input.name|escape:'htmlall':'UTF-8'}" value="{$value.value|escape:'html':'UTF-8'}"{if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}/>
                            <img src="{$value.url|escape:'htmlall':'UTF-8'}" alt=""/>
                            {if isset($value.label)}<p>{$value.label|escape:'htmlall':'UTF-8'}</p>{/if}
                        </label>
                    {/strip}
                </div>
            {/foreach}
            <div class="clear"></div>
            {if isset($value.p) && $value.p}<p class="help-block">{$value.p|escape:'htmlall':'UTF-8'}</p>{/if}
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}



