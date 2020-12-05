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

<!-- MODULE Block contact infos -->
<div class="col-md-4">
    <div class="contact-info-box mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            {l s='Contact info' mod='blockcontactinfosazl'}
        </div>
        <ul class="list-unstyled mobile-collapse-body">
            {if $blockcontactinfosazl_company != ''}<li><span><i class="icon-globe"></i></span><span>{$blockcontactinfosazl_company|escape:'html':'UTF-8'}</span></li>{/if}
            {if $blockcontactinfosazl_address != ''}<li><span><i class="icon-pointer"></i></span><span>{$blockcontactinfosazl_address|escape:'html':'UTF-8'|nl2br}</span></li>{/if}
            {if $blockcontactinfosazl_phone != ''}<li><span><i class="icon-screen-smartphone"></i></span><span>{l s='Tel' mod='blockcontactinfosazl'} {$blockcontactinfosazl_phone|escape:'html':'UTF-8'}</span></li>{/if}
            {if $blockcontactinfosazl_email != ''}<li><span><i class="icon-envelope "></i></span><span>{l s='Email:' mod='blockcontactinfosazl'} {mailto address=$blockcontactinfosazl_email|escape:'html':'UTF-8' encode="hex"}</span></li>{/if}
        </ul>
    </div>
</div>
<!-- /MODULE Block contact infos -->
