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
<!-- Block languages module -->
{if count($languages) > 1}
    <div id="lang">
        <ul class="list-inline hidden-xs">
            {foreach from=$languages key=k item=language name="languages"}
                <li>
                    {assign var=indice_lang value=$language.id_lang}
                    {if isset($lang_rewrite_urls.$indice_lang)}
                        <a href="{$lang_rewrite_urls.$indice_lang|escape:'htmlall':'UTF-8'}" title="{$language.name|escape:'htmlall':'UTF-8'}"
                           {if $language.iso_code == $lang_iso}class="active"{/if}>{$language.name|escape:'htmlall':'UTF-8'}</a>
                    {else}
                        <a href="{$link->getLanguageLink($language.id_lang)|escape:'htmlall':'UTF-8'}" title="{$language.name|escape:'htmlall':'UTF-8'}"
                           {if $language.iso_code == $lang_iso}class="active"{/if}>{$language.name|escape:'htmlall':'UTF-8'}</a>
                    {/if}
                </li>
            {/foreach}
            <li>
                <span></span>
            </li>
        </ul>

        <div class="dropdown dropdown-top-list visible-xs">

            {foreach from=$languages key=k item=language name="languages"}
                {if $language.iso_code == $lang_iso}
                    {assign var=indice_lang value=$language.id_lang}
                    {if isset($lang_rewrite_urls.$indice_lang)}
                        <a href="{$lang_rewrite_urls.$indice_lang|escape:'htmlall':'UTF-8'}" title="{$language.name|escape:'htmlall':'UTF-8'}"
                           data-toggle="dropdown">{$language.name|escape:'htmlall':'UTF-8'}<span class="caret"></span></a>
                    {else}
                        <a href="{$link->getLanguageLink($language.id_lang|escape:'htmlall':'UTF-8')}" title="{$language.name|escape:'htmlall':'UTF-8'}"
                           data-toggle="dropdown">{$language.name|escape:'htmlall':'UTF-8'}<span class="caret"></span></a>
                    {/if}
                {/if}
            {/foreach}


            <div class="dropdown-menu dropdown-top-menu">
                <span class="dropdown-triangle-up"></span>
                <ul class="dropdown-top-menu-list">
                    {foreach from=$languages key=k item=language name="languages"}

                        {assign var=indice_lang value=$language.id_lang}
                        {if isset($lang_rewrite_urls.$indice_lang)}
                            <li><a href="{$lang_rewrite_urls.$indice_lang|escape:'htmlall':'UTF-8'}"
                                   title="{$language.name|escape:'htmlall':'UTF-8'}">{$language.name|escape:'htmlall':'UTF-8'}</a></li>
                        {else}
                            <li><a href="{$link->getLanguageLink($language.id_lang)|escape:'htmlall':'UTF-8'}"
                                   title="{$language.name|escape:'htmlall':'UTF-8'}">{$language.name|escape:'htmlall':'UTF-8'}</a></li>
                        {/if}

                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
{/if}
<!-- /Block languages module -->
