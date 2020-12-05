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
{if $page_name =='index'}
    <!-- Module OurClientSayAzl -->
    {if isset($ourclientsayazl_clients)}
    {assign var='nbOurClientSayPerLine' value=3}
        <div class="col-md-6 col-lg-5">
            <div class="most-popular-box box-with-pager mobile-collapse">
                <div class="title-type-1 mobile-collapse-header">
                    {l s='WHAT OUR CLIENTS SAY' mod='ourclientsayazl'}
                </div>
                <div class="mobile-collapse-body">
                    <ul class="vertical-bx-1">
                    {foreach from=$ourclientsayazl_clients item=client name=client_list}
                    {if $client.active}
                    {if $smarty.foreach.client_list.first}
                        <li>
                    {/if}
                            <div class="client-item">
                            <figure>
                                    <img src="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`ourclientsayazl/views/img/`$client.image|escape:'htmlall':'UTF-8'`")}" alt="{$client.title|escape:'htmlall':'UTF-8'}" />
                                </figure>
                                <div class="ci-body">
                                {if isset($client.description) && trim($client.description) != ''}
                                    {$client.description}{*HTML CONTENT*}
                                {/if}
                                    <p><span class="ci-name">{$client.title|escape:'htmlall':'UTF-8'}</span></p>
                                </div>
                            </div>

                    {if $smarty.foreach.client_list.last}
                        </li>
                    {elseif $smarty.foreach.client_list.iteration%$nbOurClientSayPerLine == 0}
                        </li>
                        <li>
                    {/if}
                    {/if}
                    {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    {/if}
    <!-- /Module OurClientSayAzl -->
{/if}