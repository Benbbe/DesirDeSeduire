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
<!-- begin twitter widget -->
<div class="col-md-4">
    <div class="twitter-box box-with-top-button mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            {l s='Latest Tweets' mod='blocktwitterazl'}
        </div>
        <a class="top-box-btn-1 mobile-collapse-additional" href="https://twitter.com/{$username}">{l s='Follow'
            mod='blocktwitterazl'}</a>
        <span class="tweet mobile-collapse-body"></span>
    </div>
</div>
<script>
$('.tweet').tweet({
    join_text: "auto",
      username: '{if isset($username) && $username != ""}{$username|escape:'htmlall':'UTF-8'}{else}azelabcom{/if}',
      avatar_size: 0,
      count: {if isset($count) && $count != ""}{$count|escape:'htmlall':'UTF-8'}{else}2{/if},
      auto_join_text_default: "",
      auto_join_text_ed: "",
      auto_join_text_ing: "",
      auto_join_text_reply: "",
      auto_join_text_url: "",
      loading_text: "loading tweets...",
      modpath: '{if isset($tw_this_path) && $tw_this_path != ""}{$tw_this_path|escape:'htmlall':'UTF-8'}{else}/modules/blocktwitterazl/ajax.php{/if}'

});
</script>
<!-- end twitter widget -->