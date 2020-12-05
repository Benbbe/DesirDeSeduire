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

<!-- Block stores module -->
<div class="widget wg-our-stores box-with-pager mobile-collapse">
    <h3 class="wg-title mobile-collapse-header">
        <a href="{$link->getPageLink('stores')|escape:'html':'UTF-8'}" title="{l s='Our stores' mod='blockstore'}">
                {l s='Our stores' mod='blockstore'}
        </a>
    </h3>
    <div class="wg-body mobile-collapse-body">
       <div id="carousel-our-stores" class="carousel slide no-bullets" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
             <div class="item active">
                <a href="{$link->getPageLink('stores')|escape:'html':'UTF-8'}" title="{l s='Our stores' mod='blockstore'}">
                    <img src="{$link->getMediaLink("`$module_dir``$store_img|escape:'htmlall':'UTF-8'`")}" alt="{l s='Our stores' mod='blockstore'}" />
                </a>
             </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-our-stores" role="button" data-slide="prev">
             <i class="arrow_carrot-left"></i>
          </a>
          <a class="right carousel-control" href="#carousel-our-stores" role="button" data-slide="next">
             <i class="arrow_carrot-right"></i>
          </a>
       </div>

       <div class="wgos-discover">
            <a class="btn btn-sm btn-third-col arrow-button" 
                href="{$link->getPageLink('stores')|escape:'html':'UTF-8'}" 
                title="{l s='Our stores' mod='blockstore'}">
                    <span>{l s='Discover our stores' mod='blockstore'}<i class="icon-chevron-right right"></i></span>
            </a>
       </div>
    </div>
</div> <!-- widget -->
<!-- /Block stores module -->
