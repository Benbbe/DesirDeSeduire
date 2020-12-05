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
<table class="user-info">
    <tr>
       <td>
          <div class="col-xs-12 wellcome">
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h4>{l s='Welcome' mod='blockmyaccountuserinfoazl'} <span>{$customerName|escape:'htmlall':'UTF-8'}</span></h4>
                <p>{l s='Welcome to your account. Here you can manage all of your personal information.' mod='blockmyaccountuserinfoazl'}</p>
             </div>
             <div class="col-lg-5 col-xs-12 col-sm-6 pull-right">
                {if $cartQty}
                <div class="row">
                   <div class="col-xs-12 col-sm-6">
                      <p class="my-orders">{l s='My Orders' mod='blockmyaccountuserinfoazl'}:</p>
                      <p>{l s='You have' mod='blockmyaccountuserinfoazl'} {$cartQty|escape:'htmlall':'UTF-8'} {if $cartQty == 1} {l s='item' mod='blockmyaccountuserinfoazl'} {else} {l s='items' mod='blockmyaccountuserinfoazl'} {/if} {l s='in your cart' mod='blockmyaccountuserinfoazl'}</p>
                   </div>
                   <div class="col-xs-12 col-sm-6 view-cart">
                      <a href="{$link->getPageLink("order", true)|escape:'html':'UTF-8'}" class="btn btn-sec-col"><i class="icon-bag"></i>&nbsp;&nbsp;{l s='View cart' mod='blockmyaccountuserinfoazl'}</a>
                   </div>
                </div>
                {/if}
             </div>
          </div>
          <div class="col-xs-12 last">
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 {if $lastLoginTime}
                <p>{l s='Last loged on' mod='blockmyaccountuserinfoazl'}:<span>   {$lastLoginTime|escape:'htmlall':'UTF-8'}</span></p>
                {/if}
             </div>
              {if $lastProduct}
              <div class="col-lg-5 col-xs-12 col-sm-6 pull-right">
                <div class="row">
                   <p class="col-xs-12">{l s='Last item ordered' mod='blockmyaccountuserinfoazl'}:<span> {$lastProduct.name|escape:'htmlall':'UTF-8'|strip_tags:'UTF-8'|truncate:36:'...'}</span>  <span class="price">{convertPrice price=$lastProduct.price}</span></p>
                </div>
              </div>
              {/if}
       </td>
    </tr>
 </table>