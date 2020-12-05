<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockcompareazl\views\templates\hook\blockcompareazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1820058978d34eb1027-69121618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30b4304bf58aba6b9596a163e343cbd9a623b815' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockcompareazl\\views\\templates\\hook\\blockcompareazl.tpl',
      1 => 1486326786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1820058978d34eb1027-69121618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ajax' => 0,
    'products' => 0,
    'product' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d34ee7b47_73897596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d34ee7b47_73897596')) {function content_58978d34ee7b47_73897596($_smarty_tpl) {?>
    <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
        <!-- Block compare module -->
        <li id="blcok_compare_azl" class="btn-group hidden-xs dropdown">
    <?php }?>
    <a href="#" class="pm_item" data-toggle="dropdown">
        <i class="icon-shuffle"></i>
        <span class="hidden-sm"><?php echo smartyTranslate(array('s'=>'Compare','mod'=>'blockcompareazl'),$_smarty_tpl);?>
</span> (<span
                class="dd-products-count"><?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
<?php $_tmp4=ob_get_clean();?><?php echo htmlspecialchars($_tmp4, ENT_QUOTES, 'UTF-8', true);?>
</span>)
    </a>
    <div class="dropdown-menu dropdown-menu-right larger" role="menu">
        <span class="dropdown-triangle-up"></span>
        <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>

        <div class="dropdown-head">
            <h4 class="pull-left"><?php echo smartyTranslate(array('s'=>'Compare List','mod'=>'blockcompareazl'),$_smarty_tpl);?>
</h4>
        </div>
        <div class="dd-wrapper">
            
            <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
                <div id="compare-product-group" class="dropdown-product-list">
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                    <div class="dd-product-group" id="pr<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8', true);?>
">
                        <div class="dd-product-box pull-left">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['image'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                            </a>
                        </div>
                        <div class="dd-product-desc pull-left">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
"
                               class="title"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a>

                            <a title="<?php echo smartyTranslate(array('s'=>'remove this product from compare list','mod'=>'blockcompareazl'),$_smarty_tpl);?>
"
                               class="close-btn ddr" href="javascript: removeProductComparison(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8', true);?>
);" "><i class="icon_close"></i></a>
                        </div>
                    </div>
                    <?php } ?>


                </div>
            <?php } else { ?>
                <div class="dd-list-empty" style="display: block"><?php echo smartyTranslate(array('s'=>'There are no products selected for comparison.','mod'=>'blockcompareazl'),$_smarty_tpl);?>
</div>
            <?php }?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison',true), ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-md btn-third-col btn-w100"><?php echo smartyTranslate(array('s'=>'Go to Comparision List','mod'=>'blockcompareazl'),$_smarty_tpl);?>
</a>
        </div>
    </div>
    <?php if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
        </li>
        <!-- /Block compare module -->
    <?php }?>
<?php }} ?>
