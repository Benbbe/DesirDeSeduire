<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:35:18
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\leobootstrapmenu\views\widgets\widget_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2655058978c86b300a0-90049304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98921ea975ef27e01a278ebaebaed0150a49a40a' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\leobootstrapmenu\\views\\widgets\\widget_video.tpl',
      1 => 1485018291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2655058978c86b300a0-90049304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'video_code' => 0,
    'widget_heading' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978c86b3db68_74676723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978c86b3db68_74676723')) {function content_58978c86b3db68_74676723($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['video_code']->value)) {?>
<div class="widget-video">
	<?php if (isset($_smarty_tpl->tpl_vars['widget_heading']->value)&&!empty($_smarty_tpl->tpl_vars['widget_heading']->value)) {?>
	<div class="menu-title">
		<?php echo $_smarty_tpl->tpl_vars['widget_heading']->value;?>

	</div>
	<?php }?>
	<div class="widget-inner">
		<?php echo $_smarty_tpl->tpl_vars['video_code']->value;?>

	</div>
</div>
<?php }?><?php }} ?>
