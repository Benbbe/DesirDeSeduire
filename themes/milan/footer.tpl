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


</div> <!-- pg-body -->
{if !isset($content_only) || !$content_only}
<footer>
<!-- page body content end -->
    {hook h="displayFooterMain"}
{if ((isset($milan_settings) && $milan_settings.footer_first_enable) || !isset($milan_settings))}
<!-- footer-1 begin -->
<div id="footer-1">
    <section>
        <div class="container">
            <div class="row">
                {hook h="displayFooterOne"}
            </div>
        </div>
    </section>
</div>
<!-- footer-1 end -->
{/if}
{if ((isset($milan_settings) && $milan_settings.footer_second_enable) || !isset($milan_settings))}
<!-- footer-2 begin -->
<div id="footer-2">
    <section>
        <div class="container">
            <div class="row">
                {hook h="displayFooterTwo"}
            </div>
        </div>
    </section>
</div>
{/if}
<!-- footer-2 end -->
<!-- footer-3 begin -->
<div id="footer-3">
    <section>
        <div class="container">
            <div class="row">
                {$HOOK_FOOTER}
            </div>
        </div>
    </section>
</div>
<!-- footer-3 end -->
<!-- footer-4 begin -->
<div id="footer-4">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center-md">
                    {if ((isset($milan_settings) && $milan_settings.footer_image))}
                        <img src="{$milan_settings.footer_image}" alt="accepted credit cards">
                    {else}
                        <img src="/img/credit-cards.png" alt="accepted credit cards">
                    {/if}
                </div>
                {hook h="displayFooterFour"}
            </div>
        </div>
    </section>
</div>
<!-- footer-4 end -->
<!-- footer-5 begin -->
<div id="footer-5">
    <section>
        <div class="container">
            {hook h="displayFooterFive"}
            <p class="copyright">
                {if ((isset($milan_settings) && $milan_settings.footer_copyright_text))}
                    {$milan_settings.footer_copyright_text}
                {else}
			        © 2015 <a class="_blank" href="http://www.prestashop.com" target="_blank">Ecommerce software by
			        PrestaShop™</a>
                {/if}
            </p>
        </div>
    </section>
</div>
<!-- footer-5 end -->

</footer>
</div> <!-- boxed-layout -->
{/if}

<!-- JS Libs -->
<script src="{$js_dir}plugins/jquery-ui-1.10.4.custom.min.js"></script>
<script src="{$js_dir}plugins/jquery.bxslider.min.js"></script>
<script src="{$js_dir}plugins/jquery-accessibleMegaMenu.js"></script>
<script src="{$js_dir}plugins/responsiveslides/responsiveslides.min.js"></script>
<script src="{$js_dir}plugins/fastclick.js"></script> <!-- Eliminating the 300ms click delay on mobile browsers -->
<script src="{$js_dir}plugins.js"></script>
<script src="{$js_dir}scripts.js"></script>

{include file="$tpl_dir./global.tpl"}
{if ((isset($milan_settings) && $milan_settings.page_preloader))}
    </div>
    {literal}
        <script type="text/javascript">
            $(window).load(function(){
                $('#main-preloaded-contnent').fadeIn(1000);
                $('#main-preloader').fadeOut();
            });
        </script>
    {/literal}
{/if}
</body>
</html>

