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
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($nbComments)}
    {if $nbComments > 0}
        <span class="stars-rating stars-{$averageTotal}" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span class="stars"></span>
            <meta itemprop="worstRating" content="0"/>
            <meta itemprop="ratingValue" content="{if isset($ratings.avg)}{$ratings.avg|round:1|escape:'html':'UTF-8'}{else}{$averageTotal|round:1|escape:'html':'UTF-8'}{/if}"/>
            <meta itemprop="bestRating" content="5"/>
        </span>
        <a class="stars-action reviews-count review-btn-tab-content" href="#tab-review">{$nbComments} {l s='Reviewer(s)' mod='productcomments'}</a>
    {/if}
    <a class="stars-action review-add review-btn-tab" href="#id_new_comment_form">{l s='Add Review' mod='productcomments'}</a>
   
{/if}
