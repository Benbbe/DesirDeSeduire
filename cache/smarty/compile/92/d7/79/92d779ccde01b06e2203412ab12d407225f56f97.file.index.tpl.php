<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:41:30
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\megamenu\views\templates\admin\menus\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:788758978dfad5bba9-54255385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92d779ccde01b06e2203412ab12d407225f56f97' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\megamenu\\views\\templates\\admin\\menus\\index.tpl',
      1 => 1486326789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '788758978dfad5bba9-54255385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menus' => 0,
    'menu' => 0,
    'baseURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978dfae30a57_76123590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978dfae30a57_76123590')) {function content_58978dfae30a57_76123590($_smarty_tpl) {?>
<div>
	<?php if (!empty($_smarty_tpl->tpl_vars['menus']->value)) {?>
	<table class="table table-border table-hover">
		<thead>
			<tr>
				<th><?php echo smartyTranslate(array('s'=>'ID','mod'=>'megamenu'),$_smarty_tpl);?>
</th>
				<th><?php echo smartyTranslate(array('s'=>'Label','mod'=>'megamenu'),$_smarty_tpl);?>
</th>
				<th><?php echo smartyTranslate(array('s'=>'Position','mod'=>'megamenu'),$_smarty_tpl);?>
</th>
				<th><?php echo smartyTranslate(array('s'=>'Status','mod'=>'megamenu'),$_smarty_tpl);?>
</th>
				<th><?php echo smartyTranslate(array('s'=>'Action','mod'=>'megamenu'),$_smarty_tpl);?>
</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
?>
				<tr>
				    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
				    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
				    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->iteration, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
				    <td>
				    	<?php if ($_smarty_tpl->tpl_vars['menu']->value['status']) {?>
				    		<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=edit&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="list-action-enable action-enabled"><i class="icon-check"></i></a>
						<?php } else { ?>
				    		<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=edit&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="list-action-enable action-disabled"><i class="icon-remove"></i></a>
				    	<?php }?>
				    </td>
				    <td>
				    	<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=edit&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Edit','mod'=>'megamenu'),$_smarty_tpl);?>
 <i class="icon-pencil"></i></a>
				    	<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=delete&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-default confirm-delete"><?php echo smartyTranslate(array('s'=>'Delete','mod'=>'megamenu'),$_smarty_tpl);?>
 <i class="icon-trash"></i></a>
				    	<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=changePosition&mm-position=up&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Up','mod'=>'megamenu'),$_smarty_tpl);?>
 <i class="icon-arrow-up"></i></a>
				    	<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=changePosition&mm-position=down&id_megamenu_menu=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['id_megamenu_menu'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Down','mod'=>'megamenu'),$_smarty_tpl);?>
 <i class="icon-arrow-down"></i></a>
				    </td>
			    <tr/>
			<?php } ?>
		</tbody>
	</table>
	<?php } else { ?>
		<div class="alert alert-warning">
			<?php echo smartyTranslate(array('s'=>'There is no more menu','mod'=>'megamenu'),$_smarty_tpl);?>
 <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=edit"><?php echo smartyTranslate(array('s'=>'click here','mod'=>'megamenu'),$_smarty_tpl);?>
</a> <?php echo smartyTranslate(array('s'=>'to add menu','mod'=>'megamenu'),$_smarty_tpl);?>

		</div>
	<?php }?>

</div><?php }} ?>
