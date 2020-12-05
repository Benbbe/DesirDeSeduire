<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:38
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\paypal\views\templates\hook\express_checkout_shortcut_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:560558979186208250-91034492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76264b7ea65b1e929107aec73b92be74b1287792' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\paypal\\views\\templates\\hook\\express_checkout_shortcut_form.tpl',
      1 => 1484992478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '560558979186208250-91034492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir_ssl' => 0,
    'product_minimal_quantity' => 0,
    'id_product_attribute_ecs' => 0,
    'PayPal_payment_type' => 0,
    'PayPal_current_page' => 0,
    'PayPal_tracking_code' => 0,
    'use_paypal_in_context' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5897918623aee9_70218913',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897918623aee9_70218913')) {function content_5897918623aee9_70218913($_smarty_tpl) {?>

<form id="paypal_payment_form_cart" class="paypal_payment_form" action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['base_dir_ssl']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
modules/paypal/express_checkout/payment.php" title="<?php echo smartyTranslate(array('s'=>'Pay with PayPal','mod'=>'paypal'),$_smarty_tpl);?>
" method="post" data-ajax="false">
	<?php if (isset($_GET['id_product'])) {?><input type="hidden" name="id_product" value="<?php echo intval($_GET['id_product']);?>
" /><?php }?>
	<!-- Change dynamicaly when the form is submitted -->
	<?php if (isset($_smarty_tpl->tpl_vars['product_minimal_quantity']->value)) {?>
	<input type="hidden" name="quantity" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product_minimal_quantity']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<?php } else { ?>
	<input type="hidden" name="quantity" value="1" />
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['id_product_attribute_ecs']->value)) {?>
	<input type="hidden" name="id_p_attr" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id_product_attribute_ecs']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<?php } else { ?>
	<input type="hidden" name="id_p_attr" value="" />
	<?php }?>
	<input type="hidden" name="express_checkout" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['PayPal_payment_type']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
	<input type="hidden" name="current_shop_url" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['PayPal_current_page']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="bn" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['PayPal_tracking_code']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
</form>

<?php if ($_smarty_tpl->tpl_vars['use_paypal_in_context']->value) {?>
	<input type="hidden" id="in_context_checkout_enabled" value="1">
<?php } else { ?>
	<input type="hidden" id="in_context_checkout_enabled" value="0">
<?php }?>


<?php }} ?>
