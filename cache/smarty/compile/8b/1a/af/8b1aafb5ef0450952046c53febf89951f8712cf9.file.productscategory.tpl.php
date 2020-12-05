<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:39
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\productscategory\productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1861858979187291609-21705673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b1aafb5ef0450952046c53febf89951f8712cf9' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\productscategory\\productscategory.tpl',
      1 => 1486326784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1861858979187291609-21705673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryProducts' => 0,
    'categoryProduct' => 0,
    'categoryProductimg' => 0,
    'link' => 0,
    'add_prod_display' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'static_token' => 0,
    'quick_view' => 0,
    'milan_settings' => 0,
    'comparator_max_item' => 0,
    'ProdDisplayPrice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58979187379d46_14622137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58979187379d46_14622137')) {function content_58979187379d46_14622137($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false) {?>
    <section>
         <div class="container best-product">
            <div class="col-xs-12">
                <h6 class="upcs"><?php echo count($_smarty_tpl->tpl_vars['categoryProducts']->value);?>
 <?php echo smartyTranslate(array('s'=>'other products in the same category:','mod'=>'productscategory'),$_smarty_tpl);?>
</h6>
            </div>
            <div class="gap-70"></div>
            <div class="products-list pl-carousel">
               <ul class="pl-pages">
                   
                  <li class="active">
                     <div class="row">
                        <?php  $_smarty_tpl->tpl_vars['categoryProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['categoryProduct']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['categoryProduct']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryProduct']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['categoryProduct']->key => $_smarty_tpl->tpl_vars['categoryProduct']->value) {
$_smarty_tpl->tpl_vars['categoryProduct']->_loop = true;
 $_smarty_tpl->tpl_vars['categoryProduct']->iteration++;
 $_smarty_tpl->tpl_vars['categoryProduct']->last = $_smarty_tpl->tpl_vars['categoryProduct']->iteration === $_smarty_tpl->tpl_vars['categoryProduct']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryProduct']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryProduct']['last'] = $_smarty_tpl->tpl_vars['categoryProduct']->last;
?>
                        <div class="col-md-3 col-sm-6 pl-item">
                           <figure>
                              <a class="product_img_link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url">
                                    <?php if (isset($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']])&&!empty($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']])) {?>
                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],(($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']).("-")).($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']][0]['id_image']),'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" itemprop="image" />
                                        <?php if (isset($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']][1])&&!empty($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']][1])) {?>
                                            <span class="pl-backside">
                                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],(($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']).("-")).($_smarty_tpl->tpl_vars['categoryProductimg']->value[$_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']][1]['id_image']),'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
                                            </span>
                                        <?php }?>
                                    <?php } else { ?>
                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['id_image'],'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"  itemprop="image" />
                                    <?php }?>
                                </a>
                              <figcaption>
                                    <?php if (($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['categoryProduct']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['categoryProduct']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['categoryProduct']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                                        <?php if (($_smarty_tpl->tpl_vars['categoryProduct']->value['allow_oosp']||$_smarty_tpl->tpl_vars['categoryProduct']->value['quantity']>0)) {?>
                                            <?php if (isset($_smarty_tpl->tpl_vars['static_token']->value)) {?>
                                                <a href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']);?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,"add=1&amp;id_product=".$_tmp1."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']);?>
" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
"><i class="icon-bag"></i></a>
                                            <?php } else { ?>
                                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,'add=1&amp;id_product={$categoryProduct.id_product|intval}',false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']);?>
" class="pl-button pl-addcart ajax_add_to_cart_button" data-toggle="tooltip" data-placement="top" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
"><i class="icon-bag"></i></a>
                                            <?php }?>
                                        <?php } else { ?>
                                            <a href="javascript: void(0)" style="pointer-events:none;" class="pl-button pl-addcart" data-toggle="tooltip" data-placement="top" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
"><i class="icon-bag"></i></a>
                                        <?php }?>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
                                        <?php if ((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['quick_view_popup'])||!isset($_smarty_tpl->tpl_vars['milan_settings']->value)) {?>
                                            <a class="pl-button pl-qview quick-view" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tooltip" data-placement="top" title="<?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
"><i class="icon-eye"></i></a>
                                        <?php }?>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'];?>
" class="pl-button pl-compare add_to_compare" data-toggle="tooltip" data-placement="top" title="<?php echo smartyTranslate(array('s'=>'Add to Compare'),$_smarty_tpl);?>
"><i class="arrow_left-right_alt"></i></a>
                                    <?php }?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['categoryProduct']->value),$_smarty_tpl);?>

                                </figcaption>
                           </figure>
                           <div class="pl-caption">
                                <?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['categoryProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> 
                                    <p class="pl-price-block">
                                        <?php if (isset($_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices']) {?>
                                            <span class="pl-price-old"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
                                        <?php }?>
                                        <span class="pl-price<?php if (isset($_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices']) {?> special-price<?php }?>">
                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>

                                        </span>
                                    </p>
                                <?php } else { ?>
                                    <hr />
                                <?php }?>
                              <p class="pl-name"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['categoryProduct']->value['name'],40,'...'), ENT_QUOTES, 'UTF-8', true);?>
</p>
                              
                           </div>
                        </div>
                           <?php if (!(($_smarty_tpl->getVariable('smarty')->value['foreach']['categoryProduct']['index']+1) % 4)) {?>
                               <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['categoryProduct']['last']) {?>
                                    </div>
                                    </li>
                                    <li class="">
                                    <div class="row">
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categoryProduct']['last']) {?>
                                    </div>
                                </li>
                            <?php }?>
                        <?php } ?>
                     
                  
               </ul>
                <?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>4) {?>
                <div class="pl-controls">
                   <a href="#" class="pl-ctl-left"></a>
                   <a href="#" class="pl-ctl-right"></a>
                </div>
               <?php }?>
            </div>
         </div>
      </section>
<?php }?><?php }} ?>
