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
<!-- Block search module TOP -->
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
<!-- block seach mobile -->
{if isset($hook_mobile)}
    <div class="input_search" data-role="fieldcontain">
        <form method="get" action="{$link->getPageLink('search')|escape:'html'}" id="searchbox">
            <input type="hidden" name="controller" value="search" />
            <input type="hidden" name="orderby" value="position" />
            <input type="hidden" name="orderway" value="desc" />
            <input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search' mod='blocksearch'}" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
        </form>
    </div>
{else}
    <!-- Block search module TOP -->
    <div id="search_block_top">
        <form method="get" action="{$link->getPageLink('search')|escape:'html'}" id="searchbox">
            <p>
                <label for="search_query_top"><!-- image on background --></label>
                <input type="hidden" name="controller" value="search" />
                <input type="hidden" name="orderby" value="position" />
                <input type="hidden" name="orderway" value="desc" />
                <input class="search_query" type="text" id="search_query_top" name="search_query" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
                <input type="submit" name="submit_search" value="{l s='Search' mod='blocksearch'}" class="button" />
            </p>
        </form>
    </div>
    {include file="$self/blocksearch-instantsearch.tpl"}
{/if}
<!-- /Block search module TOP -->

<div class="col-md-3 hidden-sm hidden-xs">
    <div id="shopping-cart-wrapper" class="dropdown">
        <a href="#" class="shp-ca" data-toggle="dropdown">
            <div class="s-bag-1">
                <i class="icon-bag"></i>
            </div>
            <div class="s-cart-pan">
                <div class="s-bag-2">
                    <span class="dd-products-count">2</span> item(s) / <span class="active dd-products-price">$230.00</span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right larger text-left" role="menu">
            <span class="dropdown-triangle-up"></span>
            <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>
            <div class="dropdown-head">
                <h4 class="pull-left">2 items in the shopping bag</h4>
            </div>
            <div class="dd-wrapper">
                <div class="dd-list-empty">There is no product in shopping cart!</div>
                <div id="cart-product-group" class="dropdown-product-list">
                    <div class="dd-product-group" id="pr5">
                        <div class="dd-product-box pull-left">
                            <a href="#" title="product name">
                                <img src="/img/pr_2-small.jpg" alt="product name">
                            </a>
                        </div>
                        <div class="dd-product-desc pull-left">
                            <a class="title">Beautiful Fit Velvet Sweater For Him test for longer header test for longer header</a>
                            <div class="qty">1 x <span class="active">$700.00</span></div>
                            <a href="#" class="close-btn ddr"><i class="icon_close"></i></a>
                        </div>
                    </div>
                    <div class="dd-product-group" id="pr6">
                        <div class="dd-product-box pull-left">
                            <a href="#" title="product name">
                                <img src="/img/pr_3-small.jpg" alt="product name">
                            </a>
                        </div>
                        <div class="dd-product-desc pull-left">
                            <a class="title">Beautiful Fit Velvet Sweater For Here</a>
                            <div class="qty">1 x <span class="active">$800.00</span></div>
                            <a href="#" class="close-btn ddr"><i class="icon_close"></i></a>
                        </div>
                    </div>
                    <div class="text-center clear-all-btn">
                                 <span class="cart-block-subtotal">
                                    Cart Subtotal: $1500.00
                                 </span>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-md btn-third-col btn-w100">View Cart</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-md btn-third-col btn-w100">Procced to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Block search module TOP -->