<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\footerfeaturedazl\views\templates\hook\footerfeaturedazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:303158978d35493550-48166735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd8e7ac1381af1c72ad8280171d5f6e4501d5e38' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\footerfeaturedazl\\views\\templates\\hook\\footerfeaturedazl.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303158978d35493550-48166735',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'nbItemsPerCol' => 0,
    'totModulo' => 0,
    'product' => 0,
    'link' => 0,
    'smallSize' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'priceDisplay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d35508890_85230409',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d35508890_85230409')) {function content_58978d35508890_85230409($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\tools\\smarty\\plugins\\function.math.php';
?>
<!-- MODULE Footer Featured Products -->
<div class="col-md-4">
	<div class="most-popular-box box-with-pager mobile-collapse">
		<div class="title-type-1 mobile-collapse-header">
			<?php echo smartyTranslate(array('s'=>'Most Popular','mod'=>'footerfeaturedazl'),$_smarty_tpl);?>

		</div>
		<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
		<div class="mobile-collapse-body">
			<?php $_smarty_tpl->tpl_vars['nbItemsPerCol'] = new Smarty_variable(3, null, 0);?>
			<ul class="vertical-bx-1">
				<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['homeFooterProducts']['total'] = $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['homeFooterProducts']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['homeFooterProducts']['first'] = $_smarty_tpl->tpl_vars['product']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['homeFooterProducts']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['homeFooterProducts']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
                <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['homeFooterProducts']['total'],'perLine'=>$_smarty_tpl->tpl_vars['nbItemsPerCol']->value,'assign'=>'totModulo'),$_smarty_tpl);?>

				<?php if ($_smarty_tpl->tpl_vars['totModulo']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModulo'] = new Smarty_variable($_smarty_tpl->tpl_vars['nbItemsPerCol']->value, null, 0);?><?php }?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['homeFooterProducts']['first']) {?>
                        <li>
                    <?php }?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
							<figure>
								<span class="img-cover">
									<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['smallSize']->value['height'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['smallSize']->value['width'], ENT_QUOTES, 'UTF-8', true);?>
" class="pic" />
								</span>
								<figcaption>
									<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],35,'...'), ENT_QUOTES, 'UTF-8', true);?>

									<?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="price"><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?></span><?php } else { ?><div style="height:21px;"></div><?php }?>
								</figcaption>
							</figure>
						</a>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['homeFooterProducts']['last']) {?>
                        </li>
                    <?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['homeFooterProducts']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerCol']->value==0) {?>
                        </li><li>
                    <?php }?>
                    <?php } ?>
			</ul>
		</div>
		<?php } else { ?>
			<p><?php echo smartyTranslate(array('s'=>'No popular products','mod'=>'footerfeaturedazl'),$_smarty_tpl);?>
</p>
		<?php }?>
	</div>
</div>
<!-- /MODULE Footer Featured Products -->
<?php }} ?>
