<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockfacebookazl\views\templates\hook\blockfacebookazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2736258978d357f2b92-38630076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba00c3f1d61109c4e91ef89f37e5ee724be9df6a' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockfacebookazl\\views\\templates\\hook\\blockfacebookazl.tpl',
      1 => 1486326786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2736258978d357f2b92-38630076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d35800658_36179099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d35800658_36179099')) {function content_58978d35800658_36179099($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['facebookurl']->value!='') {?>
<div id="fb-root"></div>
    <div class="col-md-4">
        <div class="facebox-fan-box box-with-top-button mobile-collapse">
            <div class="title-type-1 mobile-collapse-header">
                <?php echo smartyTranslate(array('s'=>'Follow us on Facebook','mod'=>'blockfacebookazl'),$_smarty_tpl);?>

            </div>
            <div id="fb-fans" class="mobile-collapse-body">
                <div class="fb-like-box" data-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebookurl']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-width="360" data-height="258" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
            </div>
        </div>
    </div>
<?php }?>
<?php }} ?>
