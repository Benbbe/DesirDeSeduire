<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1211858978d35239b17-49151536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecb478b880b74891142a74405c3a8de6747cd6f9' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\footer.tpl',
      1 => 1486326779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1211858978d35239b17-49151536',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'milan_settings' => 0,
    'HOOK_FOOTER' => 0,
    'js_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d3529b5c2_45989168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d3529b5c2_45989168')) {function content_58978d3529b5c2_45989168($_smarty_tpl) {?>


</div> <!-- pg-body -->
<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value) {?>
<footer>
<!-- page body content end -->
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterMain"),$_smarty_tpl);?>

<?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['footer_first_enable'])||!isset($_smarty_tpl->tpl_vars['milan_settings']->value))) {?>
<!-- footer-1 begin -->
<div id="footer-1">
    <section>
        <div class="container">
            <div class="row">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterOne"),$_smarty_tpl);?>

            </div>
        </div>
    </section>
</div>
<!-- footer-1 end -->
<?php }?>
<?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['footer_second_enable'])||!isset($_smarty_tpl->tpl_vars['milan_settings']->value))) {?>
<!-- footer-2 begin -->
<div id="footer-2">
    <section>
        <div class="container">
            <div class="row">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterTwo"),$_smarty_tpl);?>

            </div>
        </div>
    </section>
</div>
<?php }?>
<!-- footer-2 end -->
<!-- footer-3 begin -->
<div id="footer-3">
    <section>
        <div class="container">
            <div class="row">
                <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

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
                    <?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['footer_image']))) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['milan_settings']->value['footer_image'];?>
" alt="accepted credit cards">
                    <?php } else { ?>
                        <img src="/img/credit-cards.png" alt="accepted credit cards">
                    <?php }?>
                </div>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterFour"),$_smarty_tpl);?>

            </div>
        </div>
    </section>
</div>
<!-- footer-4 end -->
<!-- footer-5 begin -->
<div id="footer-5">
    <section>
        <div class="container">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterFive"),$_smarty_tpl);?>

            <p class="copyright">
                <?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['footer_copyright_text']))) {?>
                    <?php echo $_smarty_tpl->tpl_vars['milan_settings']->value['footer_copyright_text'];?>

                <?php } else { ?>
			        © 2015 <a class="_blank" href="http://www.prestashop.com" target="_blank">Ecommerce software by
			        PrestaShop™</a>
                <?php }?>
            </p>
        </div>
    </section>
</div>
<!-- footer-5 end -->

</footer>
</div> <!-- boxed-layout -->
<?php }?>

<!-- JS Libs -->
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins/jquery.bxslider.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins/jquery-accessibleMegaMenu.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins/responsiveslides/responsiveslides.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins/fastclick.js"></script> <!-- Eliminating the 300ms click delay on mobile browsers -->
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
plugins.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
scripts.js"></script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['page_preloader']))) {?>
    </div>
    
        <script type="text/javascript">
            $(window).load(function(){
                $('#main-preloaded-contnent').fadeIn(1000);
                $('#main-preloader').fadeOut();
            });
        </script>
    
<?php }?>
</body>
</html>

<?php }} ?>
