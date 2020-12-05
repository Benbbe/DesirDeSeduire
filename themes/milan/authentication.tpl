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
{capture name=path}
	{if !isset($email_create)}{l s='Authentication'}{else}
		<a href="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Authentication'}">{l s='Authentication'}</a>
		<span class="navigation-pipe">{$navigationPipe}</span>{l s='Create your account'}
	{/if}
{/capture}
{capture name=pageTitle}
	{if !isset($email_create)}{l s='Authentication'}{else}{l s='Create an account'}{/if}
{/capture}
<div id="center_column">

{if isset($back) && preg_match("/^http/", $back)}{assign var='current_step' value='login'}{include file="$tpl_dir./order-steps.tpl"}{/if}

{assign var='stateExist' value=false}
{assign var="postCodeExist" value=false}
{assign var="dniExist" value=false}
{if !isset($email_create)}
	<!--{if isset($authentification_error)}
	<div class="alert alert-danger">
		{if {$authentification_error|@count} == 1}
			<p>{l s='There\'s at least one error'} :</p>
			{else}
			<p>{l s='There are %s errors' sprintf=[$account_error|@count]} :</p>
		{/if}
		<ol>
			{foreach from=$authentification_error item=v}
				<li>{$v}</li>
			{/foreach}
		</ol>
	</div>
	{/if}-->
        {include file="$tpl_dir./errors.tpl"}
        <div class="alert alert-danger alert-dismissable alert-data-icon" data-icon="r" id="create_account_error" style="display:none">
            <button type="button" class="close" aria-hidden="true" onclick="$(this).parent().hide();">×</button>
        </div>
        <div class="container login-register">
        
            <div class="row">
                <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if}">
                    <div class="row">

                <div class="col-xs-12 col-sm-6 login">
                    <form action="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" method="post" id="login_form" class="validation-engine">
                            <h6 class="upcs">{l s='Already registered?'}</h6>
                            <div class="required form-group">
                                    <p>{l s='Email address'} *</p>
                                    <i class="icon_mail field-icon"></i>
                                    <input class="account_input form-control" data-prompt-position="topLeft" data-validate="isEmail" type="text" id="email" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email|stripslashes}{/if}" />
                            </div>
                            <div class="required form-group">
                                    <p>{l s='Password'} *</p>
                                    <i class="field-icon icon_lock"></i>
                                    <input class="account_input form-control" data-prompt-position="topLeft" type="password" data-validate="isPasswd" id="passwd" name="passwd" value="{if isset($smarty.post.passwd)}{$smarty.post.passwd|stripslashes}{/if}" />
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <p class="submit">
                                {if isset($back)}<input type="hidden" class="hidden" name="back" value="{$back|escape:'html':'UTF-8'}" />{/if}
                                <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button  btn btn-third-col btn-sm">
                                        <span>
                                                {l s='Sign in'}
                                        </span>
                                </button>
                                <a class="btn btn-link btn-sm" href="{$link->getPageLink('password')|escape:'html':'UTF-8'}" title="{l s='Recover your forgotten password'}" rel="nofollow">{l s='Forgot your password?'}</a>
                            </p>

                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 register">
                    <form action="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" method="post" id="create-account_form" class="validation-engine">
                            <h6 class="upcs">{l s='Create an account'}</h6>	
                            <div>
                                
                            </div>
                            
                            <div class="required form-group">
                                    <p>{l s='Please enter your email address to create an account.'} *</p>
                                    <i class="icon_mail field-icon"></i>
                                    <input type="text" class="account_input form-control" data-validate="isEmail" 
                                           id="email_create" name="email_create" 
                                           data-prompt-position="topLeft"
                                           value="{if isset($smarty.post.email_create)}{$smarty.post.email_create|stripslashes}{/if}" />
                            </div>
                            
                            <div class="submit">
                                    {if isset($back)}<input type="hidden" class="hidden" name="back" value="{$back|escape:'html':'UTF-8'}" />{/if}
                                    <button class="btn btn-third-col button btn-sm exclusive" type="submit" id="SubmitCreate" name="SubmitCreate">
                                            <span>
                                                    {l s='Create an account'}
                                            </span>
                                    </button>
                                    <input type="hidden" class="hidden" name="SubmitCreate" value="{l s='Create an account'}" />
                            </div>
                    </form>
                </div>
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
	{if isset($inOrderProcess) && $inOrderProcess && $PS_GUEST_CHECKOUT_ENABLED}
            <div class="container login-register">
		<form action="{$link->getPageLink('authentication', true, NULL, "back=$back")|escape:'html':'UTF-8'}" method="post" id="new_account_form" class="std clearfix">
			<div class="box">
				<div id="opc_account_form" style="display: block; ">
					<h6 class="page-heading bottom-indent">{l s='Instant checkout'}</h6>
					<!-- Account -->
					<div class="required form-group">
                                                <label for="guest_email" class="type-text">{l s='Email address'} <sup>*</sup>
                                                    <input type="text" class="is_required validate form-control" data-validate="isEmail" id="guest_email" name="guest_email" value="{if isset($smarty.post.guest_email)}{$smarty.post.guest_email}{/if}" />
                                                </label>
					</div>
					<div class="cleafix gender-line form-group">
						<label class="type-text">{l s='Title'}</label><br/>
						{foreach from=$genders key=k item=gender}
                                                    <input class="stl" type="radio" name="id_gender" id="id_gender_{$gender->id}" value="{$gender->id}"{if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id} checked="checked"{/if} />
                                                    <label for="id_gender_{$gender->id}" class="top"><span><span></span></span>{$gender->name}</label>	
						{/foreach}
					</div>
					<div class="required form-group">
						<label for="firstname" class="type-text">{l s='First name'} <sup>*</sup>
						<input type="text" class="is_required validate form-control" data-validate="isName" id="firstname" name="firstname" onblur="$('#customer_firstname').val($(this).val());" value="{if isset($smarty.post.firstname)}{$smarty.post.firstname}{/if}" />
						<input type="hidden" id="customer_firstname" name="customer_firstname" value="{if isset($smarty.post.firstname)}{$smarty.post.firstname}{/if}" />
                                                </label>
					</div>
					<div class="required form-group">
						<label for="lastname" class="type-text">{l s='Last name'} <sup>*</sup>
						<input type="text" class="form-control" data-validate="isName" id="lastname" name="lastname" onblur="$('#customer_lastname').val($(this).val());" value="{if isset($smarty.post.lastname)}{$smarty.post.lastname}{/if}" />
						<input type="hidden" id="customer_lastname" name="customer_lastname" value="{if isset($smarty.post.lastname)}{$smarty.post.lastname}{/if}" />
                                                </label>
					</div>
					<div class="form-group date-select">
						<label class="type-text">{l s='Date of Birth'}</label>
						<div class="row ovh">
							<div class="form-group col-xs-12 col-sm-4">
								<select id="days" name="days" class="s-styled form-control">
									<option value="">-</option>
									{foreach from=$days item=day}
										<option value="{$day}" {if ($sl_day == $day)} selected="selected"{/if}>{$day}&nbsp;&nbsp;</option>
									{/foreach}
								</select>
								{*
									{l s='January'}
									{l s='February'}
									{l s='March'}
									{l s='April'}
									{l s='May'}
									{l s='June'}
									{l s='July'}
									{l s='August'}
									{l s='September'}
									{l s='October'}
									{l s='November'}
									{l s='December'}
								*}
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<select id="months" name="months" class="s-styled form-control">
									<option value="">-</option>
									{foreach from=$months key=k item=month}
										<option value="{$k}" {if ($sl_month == $k)} selected="selected"{/if}>{l s=$month}&nbsp;</option>
									{/foreach}
								</select>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<select id="years" name="years" class="s-styled form-control">
									<option value="">-</option>
									{foreach from=$years item=year}
										<option value="{$year}" {if ($sl_year == $year)} selected="selected"{/if}>{$year}&nbsp;&nbsp;</option>
									{/foreach}
								</select>
							</div>
						</div>
					</div>
					{if isset($newsletter) && $newsletter}
						<div class="">
                                                    <input class="stl" type="checkbox" name="newsletter" id="newsletter" value="1" {if isset($smarty.post.newsletter) && $smarty.post.newsletter == '1'}checked="checked"{/if} />
                                                    <label for="newsletter" class="stl"><span></span>{l s='Sign up for our newsletter!'}</label>
						</div>
						<div class="">
                                                    <input class="stl" type="checkbox" name="optin" id="optin" value="1" {if isset($smarty.post.optin) && $smarty.post.optin == '1'}checked="checked"{/if} />
                                                    <label for="optin" class="stl"><span></span>{l s='Receive special offers from our partners!'}</label>
						</div>
					{/if}
					<h3 class="page-heading bottom-indent top-indent">{l s='Delivery address'}</h3>
					{foreach from=$dlv_all_fields item=field_name}
						{if $field_name eq "company" && $b2b_enable}
							<div class="form-group">
                                                            <label for="company" class="type-text">{l s='Company'}
                                                            <input type="text" class="form-control" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
                                                            </label>
                                                        </div>
						{elseif $field_name eq "vat_number"}
							<div id="vat_number" style="display:none;">
								<div class="form-group">
									<label for="vat-number" class="type-text">{l s='VAT number'}
									<input id="vat-number" type="text" class="form-control" name="vat_number" value="{if isset($smarty.post.vat_number)}{$smarty.post.vat_number}{/if}" />
                                                                        </label>
                                                                </div>
							</div>
							{elseif $field_name eq "dni"}
							{assign var='dniExist' value=true}
							<div class="required dni form-group">
                                                                <label for="dni" class="type-text">{l s='Identification number'} <sup>*</sup>
								<input type="text" name="dni" id="dni" value="{if isset($smarty.post.dni)}{$smarty.post.dni}{/if}" />
								<span class="form_info">{l s='DNI / NIF / NIE'}</span>
                                                                </label>
							</div>
						{elseif $field_name eq "address1"}
							<div class="required form-group">
								<label for="address1" class="type-text">{l s='Address'} <sup>*</sup>
								<input type="text" class="form-control" name="address1" id="address1" value="{if isset($smarty.post.address1)}{$smarty.post.address1}{/if}" />
                                                                </label>
                                                        </div>
						{elseif $field_name eq "address2"}
							<div class="form-group is_customer_param">
								<label for="address2" class="type-text">{l s='Address (Line 2)'} <sup>*</sup>
								<input type="text" class="form-control" name="address2" id="address2" value="{if isset($smarty.post.address2)}{$smarty.post.address2}{/if}" />
                                                                </label>
                                                        </div>
						{elseif $field_name eq "postcode"}
							{assign var='postCodeExist' value=true}
							<div class="required postcode form-group">
								<label for="postcode" class="type-text">{l s='Zip/Postal Code'} <sup>*</sup>
								<input type="text" class="form-control" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{/if}" onblur="$('#postcode').val($('#postcode').val().toUpperCase());" />
                                                                </label>
                                                        </div>
						{elseif $field_name eq "city"}
							<div class="required form-group">
								<label for="city" class="type-text">{l s='City'} <sup>*</sup>
								<input type="text" class="form-control" name="city" id="city" value="{if isset($smarty.post.city)}{$smarty.post.city}{/if}" />
                                                                </label>
                                                        </div>
							<!-- if customer hasn't update his layout address, country has to be verified but it's deprecated -->
						{elseif $field_name eq "Country:name" || $field_name eq "country"}
							<div class="required select form-group">
								<label for="id_country" class="type-text">{l s='Country'} <sup>*</sup>
								<select name="id_country" id="id_country" class="s-styled form-control">
									{foreach from=$countries item=v}
										<option value="{$v.id_country}"{if (isset($smarty.post.id_country) AND  $smarty.post.id_country == $v.id_country) OR (!isset($smarty.post.id_country) && $sl_country == $v.id_country)} selected="selected"{/if}>{$v.name}</option>
									{/foreach}
								</select>
                                                                </label>
                                                        </div>
						{elseif $field_name eq "State:name"}
							{assign var='stateExist' value=true}
							<div class="required id_state select form-group">
								<label for="id_state" class="type-text">{l s='State'} <sup>*</sup>
								<select name="id_state" id="id_state" class="s-styled form-control">
									<option value="">-</option>
								</select>
                                                                </label>
							</div>
						{/if}
					{/foreach}
					{if $stateExist eq false}
						<div class="required id_state select unvisible form-group">
							<label for="id_state" class="type-text">{l s='State'} <sup>*</sup>
							<select name="id_state" id="id_state" class="form-control">
								<option value="">-</option>
							</select>
                                                        </label>
						</div>
					{/if}
					{if $postCodeExist eq false}
						<div class="required postcode unvisible form-group">
							<label for="postcode" class="type-text">{l s='Zip/Postal Code'} <sup>*</sup>
							<input type="text" class="form-control" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{/if}" onblur="$('#postcode').val($('#postcode').val().toUpperCase());" />
                                                        </label>
                                                </div>
					{/if}
					{if $dniExist eq false}
						<div class="required form-group dni_invoice">
							<label for="dni" class="type-text">{l s='Identification number'} <sup>*</sup>
							<input type="text" class="text form-control" name="dni_invoice" id="dni_invoice" value="{if isset($guestInformations) && $guestInformations.dni_invoice}{$guestInformations.dni_invoice}{/if}" />
							<span class="form_info">{l s='DNI / NIF / NIE'}</span>
                                                        </label>
						</div>
					{/if}
					<div class="{if isset($one_phone_at_least) && $one_phone_at_least}required {/if}form-group">
						<label for="phone_mobile" class="type-text">{l s='Mobile phone'}{if isset($one_phone_at_least) && $one_phone_at_least} <sup>*</sup>{/if}
						<input type="text" class="form-control" name="phone_mobile" id="phone_mobile" value="{if isset($smarty.post.phone_mobile)}{$smarty.post.phone_mobile}{/if}" />
                                                </label>
					</div>
					<input type="hidden" name="alias" id="alias" value="{l s='My address'}" />
					<input type="hidden" name="is_new_customer" id="is_new_customer" value="0" />
					<div class="">
                                            <input type="checkbox" name="invoice_address" class="stl" id="invoice_address"{if (isset($smarty.post.invoice_address) && $smarty.post.invoice_address) || (isset($guestInformations) && $guestInformations.invoice_address)} checked="checked"{/if} autocomplete="off"/>
                                            <label class="stl" id="uniform-invoice_address" for="invoice_address"><span></span>{l s='Please use another address for invoice'}</label>
					</div>
					<div id="opc_invoice_address"  class="unvisible">
						{assign var=stateExist value=false}
						{assign var=postCodeExist value=false}
						<h3 class="page-subheading top-indent">{l s='Invoice address'}</h3>
						{foreach from=$inv_all_fields item=field_name}
						{if $field_name eq "company" && $b2b_enable}
						<div class="form-group">
                                                        <label for="company_invoice" class="type-text">{l s='Company'}
							<input type="text" class="text form-control" id="company_invoice" name="company_invoice" value="" />
                                                        </label>
						</div>
						{elseif $field_name eq "vat_number"}
						<div id="vat_number_block_invoice" class="is_customer_param" style="display:none;">
							<div class="form-group">
								<label for="vat_number_invoice" class="type-text">{l s='VAT number'}
								<input type="text" class="form-control" id="vat_number_invoice" name="vat_number_invoice" value="" />
                                                                </label>
							</div>
						</div>
						{elseif $field_name eq "dni"}
						{assign var=dniExist value=true}
						<div class="required form-group dni_invoice">
							<label for="dni" class="type-text">{l s='Identification number'} <sup>*</sup>
							<input type="text" class="text form-control" name="dni_invoice" id="dni_invoice" value="{if isset($guestInformations) && $guestInformations.dni_invoice}{$guestInformations.dni_invoice}{/if}" />
							<span class="form_info">{l s='DNI / NIF / NIE'}</span>
                                                        </label>
						</div>
						{elseif $field_name eq "firstname"}
						<div class="required form-group">
							<label for="firstname_invoice" class="type-text">{l s='First name'} <sup>*</sup>
							<input type="text" class="form-control" id="firstname_invoice" name="firstname_invoice" value="{if isset($guestInformations) && $guestInformations.firstname_invoice}{$guestInformations.firstname_invoice}{/if}" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "lastname"}
						<div class="required form-group">
							<label for="lastname_invoice" class="type-text">{l s='Last name'} <sup>*</sup>
							<input type="text" class="form-control" id="lastname_invoice" name="lastname_invoice" value="{if isset($guestInformations) && $guestInformations.lastname_invoice}{$guestInformations.lastname_invoice}{/if}" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "address1"}
						<div class="required form-group">
							<label for="address1_invoice" class="type-text">{l s='Address'} <sup>*</sup>
							<input type="text" class="form-control" name="address1_invoice" id="address1_invoice" value="{if isset($guestInformations) && $guestInformations.address1_invoice}{$guestInformations.address1_invoice}{/if}" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "address2"}
						<div class="form-group is_customer_param">
							<label for="address2_invoice" class="type-text">{l s='Address (Line 2)'}
							<input type="text" class="form-control" name="address2_invoice" id="address2_invoice" value="{if isset($guestInformations) && $guestInformations.address2_invoice}{$guestInformations.address2_invoice}{/if}" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "postcode"}
						{$postCodeExist = true}
						<div class="required postcode_invoice form-group">
							<label for="postcode_invoice" class="type-text">{l s='Zip/Postal Code'} <sup>*</sup>
							<input type="text" class="form-control" name="postcode_invoice" id="postcode_invoice" value="{if isset($guestInformations) && $guestInformations.postcode_invoice}{$guestInformations.postcode_invoice}{/if}" onkeyup="$('#postcode_invoice').val($('#postcode_invoice').val().toUpperCase());" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "city"}
						<div class="required form-group">
							<label for="city_invoice" class="type-text">{l s='City'} <sup>*</sup>
							<input type="text" class="form-control" name="city_invoice" id="city_invoice" value="{if isset($guestInformations) && $guestInformations.city_invoice}{$guestInformations.city_invoice}{/if}" />
                                                        </label>
                                                </div>
						{elseif $field_name eq "country" || $field_name eq "Country:name"}
						<div class="required form-group">
							<label for="id_country_invoice" class="type-text">{l s='Country'} <sup>*</sup>
							<select name="id_country_invoice" id="id_country_invoice" class="form-control">
								<option value="">-</option>
								{foreach from=$countries item=v}
								<option value="{$v.id_country}"{if (isset($guestInformations) AND $guestInformations.id_country_invoice == $v.id_country) OR (!isset($guestInformations) && $sl_country == $v.id_country)} selected="selected"{/if}>{$v.name|escape:'html':'UTF-8'}</option>
								{/foreach}
							</select>
                                                        </label>
						</div>
						{elseif $field_name eq "state" || $field_name eq 'State:name'}
						{$stateExist = true}
						<div class="required id_state_invoice form-group" style="display:none;">
							<label for="id_state_invoice" class="type-text">{l s='State'} <sup>*</sup>
							<select name="id_state_invoice" id="id_state_invoice" class="form-control">
								<option value="">-</option>
							</select>
                                                        </label>
						</div>
						{/if}
						{/foreach}
						{if !$postCodeExist}
						<div class="required postcode_invoice form-group unvisible">
							<label for="postcode_invoice" class="type-text">{l s='Zip/Postal Code'} <sup>*</sup>
							<input type="text" class="form-control" name="postcode_invoice" id="postcode_invoice" value="" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" />
                                                        </label>
                                                </div>
						{/if}					
						{if !$stateExist}
						<div class="required id_state_invoice form-group unvisible">
							<label for="id_state_invoice" class="type-text">{l s='State'} <sup>*</sup>
							<select name="id_state_invoice" id="id_state_invoice" class="form-control">
								<option value="">-</option>
							</select>
                                                        </label>
						</div>
						{/if}
						<div class="form-group is_customer_param">
							<label for="other_invoice" class="type-text">{l s='Additional information'}
							<textarea class="form-control" name="other_invoice" id="other_invoice" cols="26" rows="3"></textarea>
                                                        </label>
						</div>
						{if isset($one_phone_at_least) && $one_phone_at_least}
							<p class="inline-infos required is_customer_param">{l s='You must register at least one phone number.'}</p>
						{/if}					
						<div class="form-group is_customer_param">
							<label for="phone_invoice" class="type-text">{l s='Home phone'}
							<input type="text" class="form-control" name="phone_invoice" id="phone_invoice" value="{if isset($guestInformations) && $guestInformations.phone_invoice}{$guestInformations.phone_invoice}{/if}" />
                                                        </label>
                                                </div>
						<div class="{if isset($one_phone_at_least) && $one_phone_at_least}required {/if}form-group">
							<label for="phone_mobile_invoice" class="type-text">{l s='Mobile phone'}{if isset($one_phone_at_least) && $one_phone_at_least} <sup>*</sup>{/if}
							<input type="text" class="form-control" name="phone_mobile_invoice" id="phone_mobile_invoice" value="{if isset($guestInformations) && $guestInformations.phone_mobile_invoice}{$guestInformations.phone_mobile_invoice}{/if}" />
                                                        </label>
                                                </div>
						<input type="hidden" name="alias_invoice" id="alias_invoice" value="{l s='My Invoice address'}" />
					</div>
					<!-- END Account -->
				</div>
				{$HOOK_CREATE_ACCOUNT_FORM}
			</div>
                        <p>
                            <span><sup>*</sup>{l s='Required field'}</span>
                        </p>
			<div class="row required submit clearfix">
                            <div class="gap-10"></div>
                            <div class="col-sm-12">
				<input type="hidden" name="display_guest_checkout" value="1" />
				<button type="submit" class="pull-right btn btn-md btn-sec-col button-medium" name="submitGuestAccount" id="submitGuestAccount">
					<span>
						{l s='Proceed to checkout'}
					</span>
				</button>
                            </div>
			</div>
                                                <div class="gap-15"></div>
		</form>
            </div>
	{/if}
{else}
	<!--{if isset($account_error)}
	<div class="error">
		{if {$account_error|@count} == 1}
			<p>{l s='There\'s at least one error'} :</p>
			{else}
			<p>{l s='There are %s errors' sprintf=[$account_error|@count]} :</p>
		{/if}
		<ol>
			{foreach from=$account_error item=v}
				<li>{$v}</li>
			{/foreach}
		</ol>
	</div>
	{/if}-->
        <div class="container">
            
            <div class="row">
                {include file="$tpl_dir./errors.tpl"}
            <div class="col-xs-12 col-sm-12">
                
	<form action="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" method="post" id="account-creation_form" class="std box">
		{$HOOK_CREATE_ACCOUNT_TOP}
		<div class="account_creation">
                        <h6 class="account-table-head">{l s='Your personal information'}</h6>
			<div class="clearfix form-group">
                                <label class="type-text">{l s='Title'}</label>
				<br />
				{foreach from=$genders key=k item=gender}
                                    <input class="stl" type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />
                                    <label for="id_gender{$gender->id}" class="top"><span><span></span></span>{$gender->name}</label>
                                {/foreach}
			</div>
			<div class="required form-group">
                                <label for="customer_firstname" class="type-text">{l s='First name'} <sup>*</sup>
                                    <input onkeyup="$('#firstname').val(this.value);" type="text" class="is_required validate form-control" data-validate="isName" id="customer_firstname" name="customer_firstname" value="{if isset($smarty.post.customer_firstname)}{$smarty.post.customer_firstname}{/if}" />
                                </label>
                        </div>
			<div class="required form-group">
				<label for="customer_lastname" class="type-text">{l s='Last name'} <sup>*</sup>
                                    <input onkeyup="$('#lastname').val(this.value);" type="text" class="is_required validate form-control" data-validate="isName" id="customer_lastname" name="customer_lastname" value="{if isset($smarty.post.customer_lastname)}{$smarty.post.customer_lastname}{/if}" />
                                </label>
                        </div>
			<div class="required form-group">
				<label for="email" class="type-text">{l s='Email'} <sup>*</sup>
                                    <input type="text" class="is_required validate form-control" data-validate="isEmail" id="email" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" />
                                </label>
                        </div>
			<div class="required password form-group">
				<label for="passwd" class="type-text">{l s='Password'} <sup>*</sup>
                                    <input type="password" class="is_required validate form-control" data-validate="isPasswd" name="passwd" id="passwd" />
                                    <span class="form_info">{l s='(Five characters minimum)'}</span>
                                </label>
                        </div> 
			<div class="form-group">
				<label class="type-text">{l s='Date of Birth'}</label>
				<div class="row ovh">
					<div class="form-group col-xs-12 col-sm-4">
						<select id="days" name="days" class="s-styled form-control">
							<option value="">-</option>
							{foreach from=$days item=day}
								<option value="{$day}" {if ($sl_day == $day)} selected="selected"{/if}>{$day}&nbsp;&nbsp;</option>
							{/foreach}
						</select>
						{*
							{l s='January'}
							{l s='February'}
							{l s='March'}
							{l s='April'}
							{l s='May'}
							{l s='June'}
							{l s='July'}
							{l s='August'}
							{l s='September'}
							{l s='October'}
							{l s='November'}
							{l s='December'}
						*}
					</div>
					<div class="form-group col-xs-12 col-sm-4">
						<select id="months" name="months" class="s-styled form-control">
							<option value="">-</option>
							{foreach from=$months key=k item=month}
								<option value="{$k}" {if ($sl_month == $k)} selected="selected"{/if}>{l s=$month}&nbsp;</option>
							{/foreach}
						</select>
					</div>
					<div class="form-group col-xs-12 col-sm-4">
						<select id="years" name="years" class="s-styled form-control">
							<option value="">-</option>
							{foreach from=$years item=year}
								<option value="{$year}" {if ($sl_year == $year)} selected="selected"{/if}>{$year}&nbsp;&nbsp;</option>
							{/foreach}
						</select>
					</div>
				</div>
			</div>
			{if $newsletter}
                            <div class="form-group">
				<div>
                                    <input class="stl" type="checkbox" name="newsletter" id="newsletter" value="1" {if isset($smarty.post.newsletter) AND $smarty.post.newsletter == 1} checked="checked"{/if} />
                                    <label class="stl" for="newsletter">
                                        <span></span>
                                        {l s='Sign up for our newsletter!'}
                                    </label>
				</div>
				<div>
                                    <input class="stl" type="checkbox"name="optin" id="optin" value="1" {if isset($smarty.post.optin) AND $smarty.post.optin == 1} checked="checked"{/if} />
                                    <label class="stl" for="optin">
                                        <span></span>
                                        {l s='Receive special offers from our partners!'}
                                    </label>
				</div>
                            </div>
			{/if}
		</div>
		{if $b2b_enable}
			<div class="account_creation">
                            <h6 class="account-table-head">
                                    {l s='Your company information'}
                            </h6>
                            <div class="form-group">
                                <label class="type-text" for="">{l s='Company'}
                                    <input type="text" class="form-control" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
                                </label>
                            </div>
                            <div class="form-group">
                                    <label class="type-text" for="siret">{l s='SIRET'}
                                        <input type="text" class="form-control" id="siret" name="siret" value="{if isset($smarty.post.siret)}{$smarty.post.siret}{/if}" />
                                    </label>
                            </div>
                            <div class="form-group">
                                    <label class="type-text" for="ape">{l s='APE'}
                                            <input type="text" class="form-control" id="ape" name="ape" value="{if isset($smarty.post.ape)}{$smarty.post.ape}{/if}" />
                                    </label>
                            </div>
                            <div class="form-group">
                                    <label class="type-text" for="website">{l s='Website'}
                                    <input type="text" class="form-control" id="website" name="website" value="{if isset($smarty.post.website)}{$smarty.post.website}{/if}" />
                                    </label>
                            </div>
			</div>
		{/if}
		{if isset($PS_REGISTRATION_PROCESS_TYPE) && $PS_REGISTRATION_PROCESS_TYPE}
			<div class="account_creation">
                                <h6 class="account-table-head">{l s='Your address'}</h6>
				{foreach from=$dlv_all_fields item=field_name}
					{if $field_name eq "company"}
						{if !$b2b_enable}
							<div class="form-group">
                                                                <label for="company" class="type-text">{l s='Company'}
                                                                    <input type="text" class="form-control" id="company" name="company" value="{if isset($smarty.post.company)}{$smarty.post.company}{/if}" />
                                                                </label>
                                                        </div>
						{/if}
					{elseif $field_name eq "vat_number"}
						<div id="vat_number" style="display:none;">
							<div class="form-group">
                                                            <label for="vat_number" class="type-text">{l s='VAT number'}
								<input type="text" class="form-control" name="vat_number" value="{if isset($smarty.post.vat_number)}{$smarty.post.vat_number}{/if}" />
                                                                </label>
                                                        </div>
						</div>
					{elseif $field_name eq "firstname"}
						<div class="required form-group">
                                                        <label for="firstname" class="type-text">{l s='First name'} <sup>*</sup>
                                                            <input type="text" class="form-control" id="firstname" name="firstname" value="{if isset($smarty.post.firstname)}{$smarty.post.firstname}{/if}" />
                                                        </label>
                                                </div>
					{elseif $field_name eq "lastname"}
						<div class="required form-group">
                                                        <label for="lastname" class="type-text">{l s='Last name'} <sup>*</sup>
                                                            <input type="text" class="form-control" id="lastname" name="lastname" value="{if isset($smarty.post.lastname)}{$smarty.post.lastname}{/if}" />
                                                        </label>
                                                </div>
					{elseif $field_name eq "address1"}
						<div class="required form-group">
							<label for="address1" class="type-text">{l s='Address'} <sup>*</sup>
                                                            <input type="text" class="form-control" name="address1" id="address1" value="{if isset($smarty.post.address1)}{$smarty.post.address1}{/if}" />
                                                            <span class="inline-infos">{l s='Street address, P.O. Box, Company name, etc.'}</span>
                                                        </label>
                                                </div>
					{elseif $field_name eq "address2"}
						<div class="form-group is_customer_param">
							<label for="address2" class="type-text">{l s='Address (Line 2)'}
							<input type="text" class="form-control" name="address2" id="address2" value="{if isset($smarty.post.address2)}{$smarty.post.address2}{/if}" />
							<span class="inline-infos">{l s='Apartment, suite, unit, building, floor, etc...'}</span>
                                                        </label>
                                                </div>
					{elseif $field_name eq "postcode"}
						{assign var='postCodeExist' value=true}
						<div class="required postcode form-group">
							<label for="postcode" class="type-text">{l s='Zip/Postal Code'} <sup>*</sup>
							<input type="text" class="form-control" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{/if}" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" />
                                                        </label>
                                                </div>
					{elseif $field_name eq "city"}
						<div class="required form-group">
							<label for="city" class="type-text">{l s='City'} <sup>*</sup>
							<input type="text" class="form-control" name="city" id="city" value="{if isset($smarty.post.city)}{$smarty.post.city}{/if}" />
                                                        </label>
                                                </div>
						<!-- if customer hasn't update his layout address, country has to be verified but it's deprecated -->
					{elseif $field_name eq "Country:name" || $field_name eq "country"}
						<div class="required select form-group">
							<label for="id_country" class="type-text">{l s='Country'} <sup>*</sup>
							<select name="id_country" id="id_country" class="s-styled form-control">
								<option value="">-</option>
								{foreach from=$countries item=v}
								<option value="{$v.id_country}"{if (isset($smarty.post.id_country) AND $smarty.post.id_country == $v.id_country) OR (!isset($smarty.post.id_country) && $sl_country == $v.id_country)} selected="selected"{/if}>{$v.name}</option>
								{/foreach}
							</select>
                                                        </label>
						</div>
					{elseif $field_name eq "State:name" || $field_name eq 'state'}
						{assign var='stateExist' value=true}
						<div class="required id_state select form-group">
                                                        <label for="id_state" class="type-text">{l s='State'} <sup>*</sup>
							<select name="id_state" id="id_state" class="s-styled form-control">
								<option value="">-</option>
							</select>
                                                        </label>
						</div>
					{/if}
				{/foreach}
				{if $postCodeExist eq false}
					<div class="required postcode form-group unvisible">
						<label for="postcode">{l s='Zip/Postal Code'} <sup>*</sup>
						<input type="text" class="form-control" name="postcode" id="postcode" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{/if}" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" />
                                                </label>
                                        </div>
				{/if}		
				{if $stateExist eq false}
					<div class="required id_state select unvisible form-group">
                                                <label for="id_state" class="type-text">{l s='State'} <sup>*</sup>
						<select name="id_state" id="id_state" class="s-styled form-control">
							<option value="">-</option>
						</select>
                                                </label>
					</div>
				{/if}
				<div class="textarea form-group">
                                        <label for="other" class="type-text">{l s='Additional information'}
                                            <textarea class="form-control" name="other" id="other" cols="26" rows="3">{if isset($smarty.post.other)}{$smarty.post.other}{/if}</textarea>
                                        </label>
                                </div>
				{if isset($one_phone_at_least) && $one_phone_at_least}
					<p class="inline-infos">{l s='You must register at least one phone number.'}</p>
				{/if}
				<div class="form-group">
					<label for="phone" class="type-text">{l s='Home phone'}
					<input type="text" class="form-control" name="phone" id="phone" value="{if isset($smarty.post.phone)}{$smarty.post.phone}{/if}" />
                                        </label>
                                </div>
				<div class="{if isset($one_phone_at_least) && $one_phone_at_least}required {/if}form-group">
					<label for="phone_mobile" class="type-text">{l s='Mobile phone'}{if isset($one_phone_at_least) && $one_phone_at_least} <sup>*</sup>{/if}
					<input type="text" class="form-control" name="phone_mobile" id="phone_mobile" value="{if isset($smarty.post.phone_mobile)}{$smarty.post.phone_mobile}{/if}" />
                                        </label>
                                </div>
				<div class="required form-group" id="address_alias">
					<label for="alias" class="type-text">{l s='Assign an address alias for future reference.'} <sup>*</sup>
					<input type="text" class="form-control" name="alias" id="alias" value="{if isset($smarty.post.alias)}{$smarty.post.alias}{else}{l s='My address'}{/if}" />
                                        </label>
                                </div>
			</div>
			<div class="account_creation dni">
				<h3 class="page-subheading">{l s='Tax identification'}</h3>
				<div class="required form-group">
                                        <label for="dni" class="type-text">{l s='Identification number'} <sup>*</sup>
                                            <input type="text" class="form-control" name="dni" id="dni" value="{if isset($smarty.post.dni)}{$smarty.post.dni}{/if}" />
                                            <span class="form_info">{l s='DNI / NIF / NIE'}</span>
                                        </label>
				</div>
			</div>
		{/if}
		{$HOOK_CREATE_ACCOUNT_FORM}
		<div class="submit clearfix">
			<input type="hidden" name="email_create" value="1" />
			<input type="hidden" name="is_new_customer" value="1" />
			{if isset($back)}<input type="hidden" class="hidden" name="back" value="{$back|escape:'html':'UTF-8'}" />{/if}
			<button type="submit" name="submitAccount" id="submitAccount" class="btn btn-lg btn-sec-col">
				<span>{l s='Register'}<i class="icon-chevron-right right"></i></span>
			</button>
			<p class="pull-right required"><span><sup>*</sup>{l s='Required field'}</span></p>
		</div>
	</form>
            </div>
{/if}
</div>
{strip}
{if isset($smarty.post.id_state) && $smarty.post.id_state}
	{addJsDef idSelectedState=$smarty.post.id_state|intval}
{else if isset($address->id_state) && $address->id_state}
	{addJsDef idSelectedState=$address->id_state|intval}
{else}
	{addJsDef idSelectedState=false}
{/if}
{if isset($smarty.post.id_country) && $smarty.post.id_country}
	{addJsDef idSelectedCountry=$smarty.post.id_country|intval}
{else if isset($address->id_country) && $address->id_country}
	{addJsDef idSelectedCountry=$address->id_country|intval}
{else}
	{addJsDef idSelectedCountry=false}
{/if}
{if isset($countries)}
	{addJsDef countries=$countries}
{/if}
{if isset($vatnumber_ajax_call) && $vatnumber_ajax_call}
	{addJsDef vatnumber_ajax_call=$vatnumber_ajax_call}
{/if}
{if isset($email_create) && $email_create}
	{addJsDef email_create=$email_create|boolval}
{else}
	{addJsDef email_create=false}
{/if}
{/strip}