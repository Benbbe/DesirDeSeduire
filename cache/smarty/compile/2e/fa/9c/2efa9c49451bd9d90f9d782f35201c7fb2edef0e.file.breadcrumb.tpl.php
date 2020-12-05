<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:43
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73255897918b740c74-88478346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2efa9c49451bd9d90f9d782f35201c7fb2edef0e' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\breadcrumb.tpl',
      1 => 1486326779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73255897918b740c74-88478346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'base_dir' => 0,
    'path' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5897918b769cc9_59198182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897918b769cc9_59198182')) {function content_5897918b769cc9_59198182($_smarty_tpl) {?>
<!-- /Breadcrumb -->
<?php if (isset(Smarty::$_smarty_vars['capture']['path'])) {?><?php $_smarty_tpl->tpl_vars['path'] = new Smarty_variable(Smarty::$_smarty_vars['capture']['path'], null, 0);?><?php }?>
<?php if (isset(Smarty::$_smarty_vars['capture']['pageTitle'])) {?><?php $_smarty_tpl->tpl_vars['pageTitle'] = new Smarty_variable(Smarty::$_smarty_vars['capture']['pageTitle'], null, 0);?><?php }?>
<div class="pg-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 title">
                <?php if (isset($_smarty_tpl->tpl_vars['pageTitle']->value)) {?>
                    <h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
                <?php } else { ?>
                    &nbsp;
                <?php }?>
            </div>
            
            <div class="col-md-6 col-sm-12 b-crumbs-block">
                <div class="b-crumbs pull-right">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Return to Home'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a>
                    <?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value) {?>
                        <i class="arrow_carrot-right" <?php if (isset($_smarty_tpl->tpl_vars['category']->value)&&isset($_smarty_tpl->tpl_vars['category']->value->id_category)&&$_smarty_tpl->tpl_vars['category']->value->id_category==1) {?>style="display:none;"<?php }?>></i><?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['path']->value, 'UTF-8', 'HTML-ENTITIES');?>

                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb --><?php }} ?>
