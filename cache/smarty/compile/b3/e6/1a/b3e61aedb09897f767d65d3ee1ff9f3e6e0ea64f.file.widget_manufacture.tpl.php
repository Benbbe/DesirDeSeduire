<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:35:16
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\leobootstrapmenu\views\widgets\widget_manufacture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815458978c84576046-44550313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3e61aedb09897f767d65d3ee1ff9f3e6e0ea64f' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\leobootstrapmenu\\views\\widgets\\widget_manufacture.tpl',
      1 => 1485018291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815458978c84576046-44550313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'widget_heading' => 0,
    'manufacturers' => 0,
    'manufacturer' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978c845ed2c7_74450022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978c845ed2c7_74450022')) {function content_58978c845ed2c7_74450022($_smarty_tpl) {?>

 <div class="widget-manufacture">
	<?php if (isset($_smarty_tpl->tpl_vars['widget_heading']->value)&&!empty($_smarty_tpl->tpl_vars['widget_heading']->value)) {?>
	<div class="menu-title">
		<?php echo $_smarty_tpl->tpl_vars['widget_heading']->value;?>

	</div>
	<?php }?>
	<div class="widget-inner">
		<?php if ('manufacturers') {?>
			<div class="manu-logo">
				<?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacturer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->_loop = true;
?>
				<a  href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'view products','mod'=>'leobootstrapmenu'),$_smarty_tpl);?>
">
				<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['manufacturer']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt=""> </a>
				<?php } ?>
			</div>
			<?php } else { ?>
   			<p class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No image logo at this time.','mod'=>'leobootstrapmenu'),$_smarty_tpl);?>
</p>
		<?php }?>
	</div>
</div>
 <?php }} ?>
