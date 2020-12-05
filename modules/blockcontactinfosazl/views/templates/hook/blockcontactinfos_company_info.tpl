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

<div class="detail">
    <h6 class="upcs">{l s='Contact details' mod='blockcontactinfosazl'}</h6>
    
    {if $blockcontactinfosazl_phone != ''}
        <div class="phone"><i class="icon-call-end"></i><span>{$blockcontactinfosazl_phone|escape:'html':'UTF-8'}</span></div>
    {/if}
    {if $blockcontactinfosazl_mobile != ''}
        <div class="smart-phone"><i class="icon-screen-smartphone"></i><span>{$blockcontactinfosazl_mobile|escape:'html':'UTF-8'}</span></div>
    {/if}
    {if $blockcontactinfosazl_email != ''}
        <div class="email"><i class="icon-envelope-open"></i>{mailto address=$blockcontactinfosazl_email|escape:'html':'UTF-8' encode="hex"}</div>
    {/if}
    {if $blockcontactinfosazl_skype != ''}
    <div class="skype"><i class="social_skype"></i><span>{$blockcontactinfosazl_skype|escape:'html':'UTF-8'}</span></div>
    {/if}
 </div>