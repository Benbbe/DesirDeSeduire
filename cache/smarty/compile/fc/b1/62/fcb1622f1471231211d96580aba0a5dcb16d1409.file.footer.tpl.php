<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\aboutusazl\views\templates\hook\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2488058978d35a67b56-67559416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcb1622f1471231211d96580aba0a5dcb16d1409' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\aboutusazl\\views\\templates\\hook\\footer.tpl',
      1 => 1486326785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2488058978d35a67b56-67559416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ABOUTUS_TITLE' => 0,
    'ABOUTUS_HTML' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d35a717a0_51167004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d35a717a0_51167004')) {function content_58978d35a717a0_51167004($_smarty_tpl) {?>
<!-- Module Block About us -->
<div class="col-md-4">
    <div class="about-us-box mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['ABOUTUS_TITLE']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
        <div class="mobile-collapse-body">
            <?php echo $_smarty_tpl->tpl_vars['ABOUTUS_HTML']->value;?>

        </div>
    </div>
</div>
<!-- Module Block About us --><?php }} ?>
