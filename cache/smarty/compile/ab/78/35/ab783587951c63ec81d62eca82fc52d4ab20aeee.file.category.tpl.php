<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:57:00
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41905897919c4bcc96-00486345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab783587951c63ec81d62eca82fc52d4ab20aeee' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\category.tpl',
      1 => 1486326779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41905897919c4bcc96-00486345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'scenes' => 0,
    'link' => 0,
    'milan_settings' => 0,
    'categoryNameComplement' => 0,
    'products' => 0,
    'n' => 0,
    'p' => 0,
    'nb_products' => 0,
    'productShowingStart' => 0,
    'productShowing' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5897919c574678_82015840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897919c574678_82015840')) {function content_5897919c574678_82015840($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['category']->value)) {?>
    <div class="container">
        <div class="gap-70 hidden-xs"></div>
        <div class="row">
            <div class="<?php if (!$_smarty_tpl->tpl_vars['hide_left_column']->value||!$_smarty_tpl->tpl_vars['hide_right_column']->value) {?><?php if (!$_smarty_tpl->tpl_vars['hide_left_column']->value&&!$_smarty_tpl->tpl_vars['hide_right_column']->value) {?>col-md-6<?php } else { ?>col-md-9<?php }?><?php } else { ?>col-md-12<?php }?> <?php if (!$_smarty_tpl->tpl_vars['hide_left_column']->value) {?>col-md-push-3<?php }?> cat-content">
                
	<?php if ($_smarty_tpl->tpl_vars['category']->value->id&&$_smarty_tpl->tpl_vars['category']->value->active) {?>
    	<?php if ($_smarty_tpl->tpl_vars['scenes']->value||$_smarty_tpl->tpl_vars['category']->value->description||$_smarty_tpl->tpl_vars['category']->value->id_image) {?>
            	 
                    <!-- Category image -->
                    <?php if ($_smarty_tpl->tpl_vars['category']->value->id_image) {?>
                        <img class="img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value->link_rewrite,$_smarty_tpl->tpl_vars['category']->value->id_image,'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="">
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['category']->value->description) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['category_show_description']==0) {?>
                            
                        <?php } else { ?>
                            <div class="cat-description"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                        <?php }?>
                    <?php }?>
                  <?php }?>
		
		<?php $_smarty_tpl->_capture_stack[0][] = array('pageTitle', null, null); ob_start(); ?>
                        <span class="cat-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)) {?>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryNameComplement']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></span><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./category-count.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
                    
                    <div class="content_sortPagiBar clearfix">
                        <?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        <div class="cat-pagination category-product-count">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-count">
                                        <?php if (($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)<$_smarty_tpl->tpl_vars['nb_products']->value) {?>
                                                <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value, null, 0);?>
                                        <?php } else { ?>
                                                <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable(($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['nb_products']->value-$_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)*-1, null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['p']->value==1) {?>
                                                <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable(1, null, 0);?>
                                        <?php } else { ?>
                                                <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['nb_products']->value>1) {?>
                                                <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of %3$d items','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value,$_smarty_tpl->tpl_vars['nb_products']->value)),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of 1 item','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value)),$_smarty_tpl);?>

                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <?php if (isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['category_display_top_pagination']==0) {?>
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-content tab-no-style">
                        <div class="tab-pane in active" id="pl-grid">
                            <div class="products-list">
                                <div class="row">
                                    <?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_sortPagiBar clearfix">
                        <?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        <div class="cat-pagination category-product-count">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-count">
                                        <?php if (($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)<$_smarty_tpl->tpl_vars['nb_products']->value) {?>
                                                <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value, null, 0);?>
                                        <?php } else { ?>
                                                <?php $_smarty_tpl->tpl_vars['productShowing'] = new Smarty_variable(($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['nb_products']->value-$_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value)*-1, null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['p']->value==1) {?>
                                                <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable(1, null, 0);?>
                                        <?php } else { ?>
                                                <?php $_smarty_tpl->tpl_vars['productShowingStart'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value*$_smarty_tpl->tpl_vars['p']->value-$_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['nb_products']->value>1) {?>
                                                <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of %3$d items','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value,$_smarty_tpl->tpl_vars['nb_products']->value)),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'Showing %1$d - %2$d of 1 item','sprintf'=>array($_smarty_tpl->tpl_vars['productShowingStart']->value,$_smarty_tpl->tpl_vars['productShowing']->value)),$_smarty_tpl);?>

                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('paginationId'=>'bottom'), 0);?>

                                </div>
                            </div>
                        </div>
                    </div>
		<?php }?>
	<?php } elseif ($_smarty_tpl->tpl_vars['category']->value->id) {?>
		<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'This category is currently unavailable.'),$_smarty_tpl);?>
</p>
	<?php }?>
<?php }?>
        </div>
        <?php if (!$_smarty_tpl->tpl_vars['hide_left_column']->value) {?>
        <div class="col-md-3 <?php if (!$_smarty_tpl->tpl_vars['hide_left_column']->value&&!$_smarty_tpl->tpl_vars['hide_right_column']->value) {?>col-md-pull-6<?php } else { ?>col-md-pull-9<?php }?> cat-sidebar">
            <aside>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayLeftColumn"),$_smarty_tpl);?>

            </aside>
        </div>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['hide_right_column']->value) {?>
        <div class="col-md-3 cat-sidebar">
            <aside>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayRightColumn"),$_smarty_tpl);?>

            </aside>
        </div>
        <?php }?>
    </div>
</div><?php }} ?>
