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

{if $opc}
	{assign var="back_order_page" value="order-opc.php"}
	{else}
	{assign var="back_order_page" value="order.php"}
{/if}
<div class="container">
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
            <div class="row">
        {if $PS_CATALOG_MODE}
            <div class="you-order mobile-collapse col-md-5 col-xs-12 pull-right clearfix">
                {capture name=path}{l s='Your shopping cart'}{/capture}
                <h2 id="cart_title">{l s='Your shopping cart'}</h2>
                <p class="alert alert-warning">{l s='Your new order was not accepted.'}</p>
            </div>
        {else}
            {if $productNumber}
                <div class="you-order mobile-collapse col-md-5 col-xs-12 pull-right clearfix">
                    <!-- Shopping Cart -->
                    {include file="$tpl_dir./shopping-cart.tpl"}
                    <!-- End Shopping Cart -->
                </div>
                <div class="col-md-7 col-xs-12 pull-left">
                    <div class="gap-30"></div>
                    <div id="accordion-order">
                        {if $is_logged AND !$is_guest}
                            <div class="accordion-group panel">
                                
                                {if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}
                                    <div class="accordion-header upcs">
                                        {l s='Addresses'}
                                    </div>
                                {else}
                                    <a data-toggle="collapse"
                                    href="#collapse-1"
                                    data-parent="#accordion-order" 
                                    class="accordion-header upcs">
                                        {l s='Addresses'}
                                    </a>
                                {/if}
                                <div id="collapse-1" class="{if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}in{else}in{/if}">
                                    <div class="accordion-body">
                                        {include file="$tpl_dir./order-address.tpl"}
                                    </div>
                                </div>
                            </div>
                                
                        {else}
                            <div class="accordion-group panel">
                                {if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}
                                    <div class="accordion-header upcs">
                                        {l s='Account'}
                                    </div>
                                {else}
                                    <a href="#collapse-2" data-parent="#accordion-order" data-toggle="collapse" class="accordion-header upcs collapsed">
                                        {l s='Account'}
                                    </a>
                                {/if}
                                
                                <div id="collapse-2" class="{if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}in{else}collapse{/if}">
                                    <div class="accordion-body">
                                        <!-- Create account / Guest account / Login block -->
                                        {include file="$tpl_dir./order-opc-new-account.tpl"}
                                        <!-- END Create account / Guest account / Login block -->
                                    </div>
                                </div>
                            </div>
                        {/if}
                        <div class="accordion-group panel">
                                {if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}
                                    <div class="accordion-header upcs">
                                        {l s='Shipping'}
                                    </div>
                                {else}
                                    <a href="#collapse-3" data-parent="#accordion-order" data-toggle="collapse" class="accordion-header upcs collapsed">
                                        {l s='Shipping'}
                                    </a>
                                {/if}
                                
                                <div id="collapse-3" class="{if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}in{else}collapse{/if}">
                                    <div class="accordion-body">
                                        <!-- Carrier -->
                                        {include file="$tpl_dir./order-carrier.tpl"}
                                        <!-- END Carrier -->
                                    </div>
                                </div>
                        </div>
                        <div class="accordion-group panel">
                            {if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}
                                <div class="accordion-header upcs">
                                    {l s='Payment'}
                                </div>
                            {else}
                                <a class="accordion-header upcs collapsed" data-toggle="collapse" data-parent="#accordion-order" href="#collapse-5">
                                    {l s='Payment'}
                                </a>
                            {/if}
                            
                            <div class="{if ((isset($milan_settings) && $milan_settings.checkout_accordion == 0) || !isset($milan_settings))}in{else}collapse{/if}" id="collapse-5">
                                <div class="accordion-body">
                                    <!-- Payment -->
                                    {include file="$tpl_dir./order-payment.tpl"}
                                    <!-- END Payment -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {else}
                    {capture name=path}{l s='Your shopping cart'}{/capture}
                    {capture name=pageTitle}{l s='Your shopping cart'}{/capture}
                    {include file="$tpl_dir./errors.tpl"}
                    <p class="alert alert-warning">{l s='Your shopping cart is empty.'}</p>
            {/if}
        {strip}
        {addJsDef imgDir=$img_dir}
        {addJsDef authenticationUrl=$link->getPageLink("authentication", true)|addslashes}
        {addJsDef orderOpcUrl=$link->getPageLink("order-opc", true)|addslashes}
        {addJsDef historyUrl=$link->getPageLink("history", true)|addslashes}
        {addJsDef guestTrackingUrl=$link->getPageLink("guest-tracking", true)|addslashes}
        {addJsDef addressUrl=$link->getPageLink("address", true, NULL, "back={$back_order_page}")|addslashes}
        {addJsDef orderProcess='order-opc'}
        {addJsDef guestCheckoutEnabled=$PS_GUEST_CHECKOUT_ENABLED|intval}
        {addJsDef currencySign=$currencySign|html_entity_decode:2:"UTF-8"}
        {addJsDef currencyRate=$currencyRate|floatval}
        {addJsDef currencyFormat=$currencyFormat|intval}
        {addJsDef currencyBlank=$currencyBlank|intval}
        {addJsDef displayPrice=$priceDisplay}
        {addJsDef taxEnabled=$use_taxes}
        {addJsDef conditionEnabled=$conditions|intval}
        {addJsDef vat_management=$vat_management|intval}
        {addJsDef errorCarrier=$errorCarrier|@addcslashes:'\''}
        {addJsDef errorTOS=$errorTOS|@addcslashes:'\''}
        {addJsDef checkedCarrier=$checked|intval}
        {addJsDef addresses=array()}
        {addJsDef isVirtualCart=$isVirtualCart|intval}
        {addJsDef isPaymentStep=$isPaymentStep|intval}
        {addJsDefL name=txtWithTax}{l s='(tax incl.)' js=1}{/addJsDefL}
        {addJsDefL name=txtWithoutTax}{l s='(tax excl.)' js=1}{/addJsDefL}
        {addJsDefL name=txtHasBeenSelected}{l s='has been selected' js=1}{/addJsDefL}
        {addJsDefL name=txtNoCarrierIsSelected}{l s='No carrier has been selected' js=1}{/addJsDefL}
        {addJsDefL name=txtNoCarrierIsNeeded}{l s='No carrier is needed for this order' js=1}{/addJsDefL}
        {addJsDefL name=txtConditionsIsNotNeeded}{l s='You do not need to accept the Terms of Service for this order.' js=1}{/addJsDefL}
        {addJsDefL name=txtTOSIsAccepted}{l s='The service terms have been accepted' js=1}{/addJsDefL}
        {addJsDefL name=txtTOSIsNotAccepted}{l s='The service terms have not been accepted' js=1}{/addJsDefL}
        {addJsDefL name=txtThereis}{l s='There is' js=1}{/addJsDefL}
        {addJsDefL name=txtErrors}{l s='Error(s)' js=1}{/addJsDefL}
        {addJsDefL name=txtDeliveryAddress}{l s='Delivery address' js=1}{/addJsDefL}
        {addJsDefL name=txtInvoiceAddress}{l s='Invoice address' js=1}{/addJsDefL}
        {addJsDefL name=txtModifyMyAddress}{l s='Modify my address' js=1}{/addJsDefL}
        {addJsDefL name=txtInstantCheckout}{l s='Instant checkout' js=1}{/addJsDefL}
        {addJsDefL name=txtSelectAnAddressFirst}{l s='Please start by selecting an address.' js=1}{/addJsDefL}
        {addJsDefL name=txtFree}{l s='Free' js=1}{/addJsDefL}

        {capture}{if $back}&mod={$back|urlencode}{/if}{/capture}
        {capture name=addressUrl}{$link->getPageLink('address', true, NULL, 'back='|cat:$back_order_page|cat:'?step=1'|cat:$smarty.capture.default)|addslashes}{/capture}
        {addJsDef addressUrl=$smarty.capture.addressUrl}
        {capture}{'&multi-shipping=1'|urlencode}{/capture}
        {addJsDef addressMultishippingUrl=$smarty.capture.addressUrl|cat:$smarty.capture.default}
        {capture name=addressUrlAdd}{$smarty.capture.addressUrl|cat:'&id_address='}{/capture}
        {addJsDef addressUrlAdd=$smarty.capture.addressUrlAdd}
        {addJsDef opc=$opc|boolval}
        {capture}<h3 class="page-subheading">{l s='Your billing address' js=1}</h3>{/capture}
        {addJsDefL name=titleInvoice}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
        {capture}<h3 class="page-subheading">{l s='Your delivery address' js=1}</h3>{/capture}
        {addJsDefL name=titleDelivery}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
        {capture}<a class="btn btn-sm btn-yet-col" href="{$smarty.capture.addressUrlAdd}" title="{l s='Update' js=1}"><span>{l s='Update' js=1}<i class="icon-chevron-right right"></i></span></a>{/capture}
        {addJsDefL name=liUpdate}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
        {/strip}
    {/if}
    </div>
</div>
    
    {if !$hide_left_column}
    <div class="col-md-3 {if !$hide_left_column && !$hide_right_column}col-md-pull-6{else}col-md-pull-9{/if} cat-sidebar">
        <div class="gap-25"></div>
        <aside>
            {hook h="displayLeftColumn"}
        </aside>
    </div>
    {/if}
    {if !$hide_right_column}
    <div class="col-md-3 cat-sidebar">
        <div class="gap-25"></div>
        <aside>
            {hook h="displayRightColumn"}
        </aside>
    </div>
    {/if}
</div>
</div>