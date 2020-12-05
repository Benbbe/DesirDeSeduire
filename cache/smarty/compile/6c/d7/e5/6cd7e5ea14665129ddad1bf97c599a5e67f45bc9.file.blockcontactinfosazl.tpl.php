<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockcontactinfosazl\\views\templates\hook\blockcontactinfosazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:369958978d3590fea8-82207519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cd7e5ea14665129ddad1bf97c599a5e67f45bc9' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockcontactinfosazl\\\\views\\templates\\hook\\blockcontactinfosazl.tpl',
      1 => 1486326786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '369958978d3590fea8-82207519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockcontactinfosazl_company' => 0,
    'blockcontactinfosazl_address' => 0,
    'blockcontactinfosazl_phone' => 0,
    'blockcontactinfosazl_email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d3594a844_49160174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d3594a844_49160174')) {function content_58978d3594a844_49160174($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mailto')) include 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\tools\\smarty\\plugins\\function.mailto.php';
?>

<!-- MODULE Block contact infos -->
<div class="col-md-4">
    <div class="contact-info-box mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            <?php echo smartyTranslate(array('s'=>'Contact info','mod'=>'blockcontactinfosazl'),$_smarty_tpl);?>

        </div>
        <ul class="list-unstyled mobile-collapse-body">
            <?php if ($_smarty_tpl->tpl_vars['blockcontactinfosazl_company']->value!='') {?><li><span><i class="icon-globe"></i></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blockcontactinfosazl_company']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></li><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['blockcontactinfosazl_address']->value!='') {?><li><span><i class="icon-pointer"></i></span><span><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['blockcontactinfosazl_address']->value, ENT_QUOTES, 'UTF-8', true));?>
</span></li><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['blockcontactinfosazl_phone']->value!='') {?><li><span><i class="icon-screen-smartphone"></i></span><span><?php echo smartyTranslate(array('s'=>'Tel','mod'=>'blockcontactinfosazl'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blockcontactinfosazl_phone']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></li><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['blockcontactinfosazl_email']->value!='') {?><li><span><i class="icon-envelope "></i></span><span><?php echo smartyTranslate(array('s'=>'Email:','mod'=>'blockcontactinfosazl'),$_smarty_tpl);?>
 <?php echo smarty_function_mailto(array('address'=>htmlspecialchars($_smarty_tpl->tpl_vars['blockcontactinfosazl_email']->value, ENT_QUOTES, 'UTF-8', true),'encode'=>"hex"),$_smarty_tpl);?>
</span></li><?php }?>
        </ul>
    </div>
</div>
<!-- /MODULE Block contact infos -->
<?php }} ?>
