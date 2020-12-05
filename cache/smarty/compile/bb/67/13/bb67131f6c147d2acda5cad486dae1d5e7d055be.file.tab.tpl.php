<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:41
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\videostabazl\tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2016858979189340388-83874662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb67131f6c147d2acda5cad486dae1d5e7d055be' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\videostabazl\\tab.tpl',
      1 => 1486326784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2016858979189340388-83874662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'videosNb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58979189344209_02664004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58979189344209_02664004')) {function content_58979189344209_02664004($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['videosNb']->value>0) {?>
    <li><a href="#videosTab" class="upcs" data-toggle="tab"><?php echo smartyTranslate(array('s'=>'Videos','mod'=>'videostab'),$_smarty_tpl);?>
</a></li>
<?php }?><?php }} ?>
