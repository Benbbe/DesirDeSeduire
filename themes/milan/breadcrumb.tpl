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
<!-- /Breadcrumb -->
{if isset($smarty.capture.path)}{assign var='path' value=$smarty.capture.path}{/if}
{if isset($smarty.capture.pageTitle)}{assign var='pageTitle' value=$smarty.capture.pageTitle}{/if}
<div class="pg-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 title">
                {if isset($pageTitle)}
                    <h1>{$pageTitle}</h1>
                {else}
                    &nbsp;
                {/if}
            </div>
            
            <div class="col-md-6 col-sm-12 b-crumbs-block">
                <div class="b-crumbs pull-right">
                    <a href="{$base_dir}" title="{l s='Return to Home'}">{l s='Home'}</a>
                    {if isset($path) AND $path}
                        <i class="arrow_carrot-right" {if isset($category) && isset($category->id_category) && $category->id_category == 1}style="display:none;"{/if}></i>{$path|unescape:"htmlall"}
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->