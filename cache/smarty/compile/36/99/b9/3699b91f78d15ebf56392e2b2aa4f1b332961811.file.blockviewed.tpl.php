<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:54
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\blockviewed\blockviewed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2600958979196686ce5-71856607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3699b91f78d15ebf56392e2b2aa4f1b332961811' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\blockviewed\\blockviewed.tpl',
      1 => 1486326782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2600958979196686ce5-71856607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productsViewedObj' => 0,
    'viewedProduct' => 0,
    'link' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_589791966b1c74_29625549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589791966b1c74_29625549')) {function content_589791966b1c74_29625549($_smarty_tpl) {?>

<!-- Block Viewed products -->
<div class="widget wg-viwed-products box-with-pager mobile-collapse">
    <h3 class="wg-title mobile-collapse-header"><?php echo smartyTranslate(array('s'=>'Viewed products','mod'=>'blockviewed'),$_smarty_tpl);?>
</h3>
    <div class="wg-body mobile-collapse-body">
       <ul class="wgvp-list">
            <?php  $_smarty_tpl->tpl_vars['viewedProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['viewedProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productsViewedObj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['viewedProduct']->key => $_smarty_tpl->tpl_vars['viewedProduct']->value) {
$_smarty_tpl->tpl_vars['viewedProduct']->_loop = true;
?>
                <li class="wgvp-item">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->product_link, ENT_QUOTES, 'UTF-8', true);?>
" 
                       title="<?php echo smartyTranslate(array('s'=>'More about %s','mod'=>'blockviewed','sprintf'=>array(htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->name, ENT_QUOTES, 'UTF-8', true))),$_smarty_tpl);?>
" >
                        <figure>
                           <img src="<?php if (isset($_smarty_tpl->tpl_vars['viewedProduct']->value->id_image)&&$_smarty_tpl->tpl_vars['viewedProduct']->value->id_image) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['viewedProduct']->value->link_rewrite,$_smarty_tpl->tpl_vars['viewedProduct']->value->cover,'small_default');?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-medium_default.jpg<?php }?>" 
                                 alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->legend, ENT_QUOTES, 'UTF-8', true);?>
" />
                        </figure>
                    </a>
                    <div class="wgvp-item-body">
                        <p class="wgvp-item-title">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->product_link, ENT_QUOTES, 'UTF-8', true);?>
" 
                                title="<?php echo smartyTranslate(array('s'=>'More about %s','mod'=>'blockviewed','sprintf'=>array(htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->name, ENT_QUOTES, 'UTF-8', true))),$_smarty_tpl);?>
">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['viewedProduct']->value->name, ENT_QUOTES, 'UTF-8', true);?>

                            </a>
                        </p>
                    </div>
                </li>
            <?php } ?>
       </ul>
    </div>
 </div> <!-- widget -->
 <!-- Block Viewed products --><?php }} ?>
