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
<!-- Module Block Google map & contact -->
<div class="col-md-4">
    <div class="get-in-touch-box mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            {l s='Get IN TOUCH WITH US' mod='blockgcontactazl'}
        </div>
        <div class="tweets-group mobile-collapse-body">
            <form id="footer_form" action="#" class="validation-engine">
                {if $GMAP_EMBED_AZL}
                <div class="google-maps">
                    {$GMAP_EMBED_AZL}{*HTML CONTENT*}
                </div>
                {/if}
                <div id="footer_form_response">
                <input type="hidden" name="token" value="{if isset($token)}{$token|escape:'htmlall':'UTF-8'}{/if}"/>
                <div class="required form-group">
                    <input name="from_name" type="text" class="form-control validate[required]" data-prompt-position="topLeft" placeholder="{l s='Enter your name' mod='blockgcontactazl'}">
                </div>
                <div class="required form-group">
                    <input name="from_mail" type="text" class="form-control validate[required,custom[email]]" data-prompt-position="topLeft" placeholder="{l s='Enter your email' mod='blockgcontactazl'}">
                </div>
                <div class="required form-group">
                    <textarea name="from_text" class="form-control validate[required]" data-prompt-position="topLeft" rows="3" placeholder="{l s='Enter your message' mod='blockgcontactazl'}"></textarea>
                </div>
                <div class="required form-group">
                    <button class="btn btn-sm btn-yet-col arrow-btn" type="submit">{l s='Send message' mod='blockgcontactazl'}</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#footer_form').submit(function(e)
        {
            var form_qstr = $(this).serialize();
            e.preventDefault();
            $.ajax({
                url: baseDir + 'modules/blockgcontactazl/blockcontact_ajax_azl.php?rand=' + new Date().getTime(),
                headers: { "cache-control": "no-cache" },
                type: "POST",
                dataType: "json",
                async: true,
                cache: false,
                data: form_qstr,
                success: function(data)
                {
                    if (data.response == 1)
                    {
                        $('#footer_form_response').html(data.message_success);
                    }
                    else
                    {
                        $('#footer_form_response').append(data.message_error);
                    }
                }
            });
        });
    });
</script>
<!-- Module Block Google map & contact -->