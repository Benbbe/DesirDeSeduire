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
<!-- Block manufacturersazl module -->
{assign var='nbManufacturersPerLine' value=9}
<div class="col-md-6 col-lg-5 col-lg-offset-2">
    <div class="most-popular-box box-with-pager mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            {l s='Manufacturers' mod='blockmanufacturerazl'}
        </div>
        <div class="mobile-collapse-body">
            {if $manufacturers}
                <ul class="vertical-bx-1">
                    {foreach from=$manufacturers item=manufacturer name=manufacturer_list}
                        {if $smarty.foreach.manufacturer_list.first}
                            <li>
                                <div class="brands-list">
                        {/if}
                                    <div class="bl-item">
                                        <a  class="bl-item-inner" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html':'UTF-8'}" title="{l s='More about %s' mod='blockmanufacturerazl' sprintf=[$manufacturer.name]}">
                                            <img src="{$img_manu_dir|escape:'htmlall':'UTF-8'}{$manufacturer.image|escape:'html':'UTF-8'}-small_default.jpg" alt="{$manufacturer.name|escape:'html':'UTF-8'}" />
                                        </a>
                                    </div>
                        {if $smarty.foreach.manufacturer_list.last}
                                </div>
                            </li>
                        {elseif $smarty.foreach.manufacturer_list.iteration%$nbManufacturersPerLine == 0}
                                </div>
                            </li>
                            <li>
                                <div class="brands-list">
                        {/if}
                    {/foreach}
                </ul>
            {else}
                <p>{l s='No manufacturer' mod='blockmanufacturerazl'}</p>
            {/if}
        </div>
    </div>
</div>
<!-- /Block manufacturersazl module -->
