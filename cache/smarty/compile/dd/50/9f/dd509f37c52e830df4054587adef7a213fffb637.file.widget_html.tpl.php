<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:36:04
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\ap_underwear\modules\leomanagewidgets\views\widgets\displaytopcolumn\widget_html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:425858978cb4372b22-06401175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd509f37c52e830df4054587adef7a213fffb637' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\ap_underwear\\modules\\leomanagewidgets\\views\\widgets\\displaytopcolumn\\widget_html.tpl',
      1 => 1485018284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '425858978cb4372b22-06401175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html' => 0,
    'widget_heading' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978cb43805f7_42979376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978cb43805f7_42979376')) {function content_58978cb43805f7_42979376($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['html']->value)) {?>
<div class="widget-html">
	<?php if (isset($_smarty_tpl->tpl_vars['widget_heading']->value)&&!empty($_smarty_tpl->tpl_vars['widget_heading']->value)) {?>
	<h4 class="title_block">
		<?php echo $_smarty_tpl->tpl_vars['widget_heading']->value;?>

	</h4>
	<?php }?>
	<div class="block_content">
		<?php echo $_smarty_tpl->tpl_vars['html']->value;?>

	</div>
</div>
<?php }?><?php }} ?>
