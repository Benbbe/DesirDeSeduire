<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockcontactazl\views\templates\hook\blockcontactazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2164258978d34b325d2-88587277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '111bf9cf81abad354c07e2aed4d9cd7c3a4ec30f' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockcontactazl\\views\\templates\\hook\\blockcontactazl.tpl',
      1 => 1486326786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2164258978d34b325d2-88587277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'telnumber' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d34b43f15_45823785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d34b43f15_45823785')) {function content_58978d34b43f15_45823785($_smarty_tpl) {?>

<div id="top-contacts">
    <ul class="list-inline">
        <?php if ($_smarty_tpl->tpl_vars['telnumber']->value!='') {?>
        <li class="hidden-xs">
            <i class="icon-call-in"></i>
            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['telnumber']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['email']->value!='') {?>
        <li class="hidden-xs">
            <a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Contact our expert support team!','mod'=>'blockcontactazl'),$_smarty_tpl);?>
">
                <i class="icon-envelope"></i>
                <span class="hidden-xs"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
            </a>
        </li>
        <?php }?>
    </ul>
</div><?php }} ?>
