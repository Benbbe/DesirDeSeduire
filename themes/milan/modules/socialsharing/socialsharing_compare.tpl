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
{if $PS_SC_TWITTER || $PS_SC_FACEBOOK || $PS_SC_GOOGLE || $PS_SC_PINTEREST}
	<div id="social-share-compare">
		<p>{l s="Share this comparison with your friends:" mod='socialsharing'}</p>
		<ul class="social-buttons list-unstyled">
                    {if $PS_SC_FACEBOOK}
                        <li class="facebook"><a data-type="facebook" class="btn-facebook btn-block social-sharing" href="#"><i class="icon-social-facebook"></i> {l s="Share" mod='socialsharing'}</a></li>
                    {/if}
                    {if $PS_SC_TWITTER}
                        <li class="tweeter"><a data-type="twitter" class="btn-twitter btn-block social-sharing" href="#"><i class="icon-social-twitter "></i> {l s="Tweet" mod='socialsharing'}</a> </li>
                    {/if}
                    {if $PS_SC_GOOGLE}
                        <li class="gplus"><a data-type="google-plus" class="btn-google-plus btn-block social-sharing" href="#"><i class="social_googleplus "></i> {l s="Google+" mod='socialsharing'}</a></li>
                    {/if}
                    {if $PS_SC_PINTEREST}
                        <li class="pinterest"><a data-type="pinterest" class="btn-pinterest btn-block social-sharing"  href="#"><i class="social_pinterest"></i> {l s="Pinterest" mod='socialsharing'}</a></li>
                    {/if}
                </ul>
	</div>
{/if}