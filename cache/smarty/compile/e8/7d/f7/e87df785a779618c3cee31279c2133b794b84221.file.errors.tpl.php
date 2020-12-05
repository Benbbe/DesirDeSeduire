<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:42
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151755897918ac41b28-09630924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87df785a779618c3cee31279c2133b794b84221' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\errors.tpl',
      1 => 1486326779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151755897918ac41b28-09630924',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5897918ac59230_09055756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897918ac59230_09055756')) {function content_5897918ac59230_09055756($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)&&$_smarty_tpl->tpl_vars['errors']->value) {?>
	<div class="alert alert-danger alert-dismissable alert-data-icon" data-icon="r">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <div>
                <?php if (count($_smarty_tpl->tpl_vars['errors']->value)>1) {?><?php echo smartyTranslate(array('s'=>'There are %d errors','sprintf'=>count($_smarty_tpl->tpl_vars['errors']->value)),$_smarty_tpl);?>
<?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['errors']->value)==1) {?>
                    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
                        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                    <?php } ?>
                <?php } else { ?>
                    <ul class="list-unstyled">
                    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
                        <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
                    <?php } ?>
                    </ul>
                <?php }?>
                
            </div>
	</div>
<?php }?><?php }} ?>
