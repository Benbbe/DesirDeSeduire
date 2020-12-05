<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:37:59
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\blockcart\blockcart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21858978d27129173-93769566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '225f74eddaa05c6a21db6efcdeebc8e66b6c8c4d' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\blockcart\\blockcart.tpl',
      1 => 1486326782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21858978d27129173-93769566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockcart_top' => 0,
    'PS_CATALOG_MODE' => 0,
    'order_process' => 0,
    'link' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'blockcart_cart_flag' => 0,
    'cart' => 0,
    'ajax_allowed' => 0,
    'colapseExpandStatus' => 0,
    'products' => 0,
    'product' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'static_token' => 0,
    'id_customization' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'customization' => 0,
    'discounts' => 0,
    'discount' => 0,
    'shipping_cost_float' => 0,
    'shipping_cost' => 0,
    'show_wrapping' => 0,
    'cart_flag' => 0,
    'show_tax' => 0,
    'tax_cost' => 0,
    'total' => 0,
    'use_taxes' => 0,
    'display_tax_label' => 0,
    'active_overlay' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d272cf040_40414863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d272cf040_40414863')) {function content_58978d272cf040_40414863($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\tools\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_function_counter')) include 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\tools\\smarty\\plugins\\function.counter.php';
?>
<!-- MODULE Block cart -->
<?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
<div class="col-md-3 hidden-sm hidden-xs<?php if ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> header_user_catalog<?php }?>">
<?php }?>

<div id="shopping-cart-wrapper" class="dropdown shopping_cart">
	
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['order_process']->value,true), ENT_QUOTES, 'UTF-8', true);?>
"
       title="<?php echo smartyTranslate(array('s'=>'View my shopping cart','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow" class="shp-ca" data-toggle="dropdown">
        <div class="s-bag-1">
            <i class="icon-bag"></i>
        </div>
        <div class="s-cart-pan">
            <div class="s-bag-2">
                <span class="dd-products-count ajax_cart_quantity<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> unvisible<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
                    <span class="ajax_cart_product_txt<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=1) {?> unvisible<?php }?>"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'blockcart'),$_smarty_tpl);?>

                        / </span>
                    <span class="ajax_cart_product_txt_s<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2) {?> unvisible<?php }?>"><?php echo smartyTranslate(array('s'=>'Products','mod'=>'blockcart'),$_smarty_tpl);?>

                        / </span>
                    <span class="active dd-products-price ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> unvisible<?php }?>">
                        <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?>
                            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
                                <?php $_smarty_tpl->tpl_vars['blockcart_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockcart_cart_flag']->value)),$_smarty_tpl);?>

                            <?php } else { ?>
                                <?php $_smarty_tpl->tpl_vars['blockcart_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockcart_cart_flag']->value)),$_smarty_tpl);?>

                            <?php }?>
                        <?php }?>
                    </span>
                <span class="ajax_cart_no_product<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?> unvisible<?php }?>"><?php echo smartyTranslate(array('s'=>'(empty)','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['ajax_allowed']->value&&isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&!$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
                    <span class="block_cart_expand<?php if (!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)||(isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded')) {?> unvisible<?php }?>">&nbsp;</span>
                    <span class="block_cart_collapse<?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='collapsed') {?> unvisible<?php }?>">&nbsp;</span>
                <?php }?>
            </div>
        </div>
    </a>

		<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>

    <div class="dropdown-menu dropdown-menu-right larger text-left" role="menu">

        <span class="dropdown-triangle-up"></span>
        <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>

        <div class="dropdown-head">
            <h4 class="pull-left"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart'),$_smarty_tpl);?>
</h4>
        </div>

        <div class="dd-wrapper">        <div class="cart_block block exclusive">
                <div class="block_content">
                    <!-- block list of products -->
                    <div class="cart_block_list<?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&!$_smarty_tpl->tpl_vars['blockcart_top']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded'||!$_smarty_tpl->tpl_vars['ajax_allowed']->value||!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)) {?> expanded<?php } else { ?> collapsed unvisible<?php }?><?php }?>">
                        <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
                            <dl class="products">
                                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['product']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
                                    <?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
                                    <dt data-id="cart_block_product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php } else { ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php } else { ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
                                    <div class="dd-product-box pull-left">
                                        <a class="cart-images" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'cart_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" /></a>
                                    </div>
                                    <div class="cart-info dd-product-desc pull-left">
                                        <a class="title" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                        <div class="qty"><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity'];?>
&nbsp;x&nbsp;<span class="active"> <?php if (!isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])||!$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==@constant('PS_TAX_EXC')) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total_wt'])),$_smarty_tpl);?>
<?php }?>
                                                <?php } else { ?>
                                                    <?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart'),$_smarty_tpl);?>

                                                <?php }?></span></div>
                                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
                                            <div class="product-atributes">
                                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockcart'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes_small'];?>
</a>
                                            </div>
                                        <?php }?>


                                        <span class="remove_link">
                                        <?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&(!isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])||!$_smarty_tpl->tpl_vars['product']->value['is_gift'])) {?>
                                            <a class="ajax_cart_block_remove_link close-btn ddr" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete=1&amp;id_product=".((string)$_smarty_tpl->tpl_vars['product']->value['id_product'])."&amp;ipa=".((string)$_smarty_tpl->tpl_vars['product']->value['id_product_attribute'])."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart'),$_smarty_tpl);?>
"><i class="icon_close"></i></a>
                                            
                                        <?php }?>
                                        </span>

                                    </div>
                                    </dt>
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
                                        <dd data-id="cart_block_combination_of_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?>_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
                                    <?php }?>
                                    <!-- Customizable datas -->
                                    <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']])) {?>
                                        <?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
                                            <dd data-id="cart_block_combination_of_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php } else { ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php } else { ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
                                        <?php }?>
                                        <ul class="cart_block_customizations" data-id="customization_<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['productAttributeId']->value;?>
">
                                            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
                                                <li name="customization">
                                                    <div data-id="deleteCustomizableProduct_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="deleteCustomizableProduct">
                                                        <a class="ajax_cart_block_remove_link" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("cart",true,null,"delete=1&amp;id_product=".$_tmp1."&amp;ipa=".$_tmp2."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow">&nbsp;</a>
                                                    </div>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0])) {?>
                                                        <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(smarty_modifier_replace($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0]['value'],"<br />"," "),28,'...'), ENT_QUOTES, 'UTF-8', true);?>

                                                    <?php } else { ?>
                                                        <?php echo smartyTranslate(array('s'=>'Customization #%d:','sprintf'=>intval($_smarty_tpl->tpl_vars['id_customization']->value),'mod'=>'blockcart'),$_smarty_tpl);?>

                                                    <?php }?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?></dd><?php }?>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?></dd><?php }?>
                                <?php } ?>
                            </dl>
                        <?php }?>
                        
                        <p class="dd-list-empty cart_block_no_products<?php if ($_smarty_tpl->tpl_vars['products']->value) {?> unvisible<?php }?>">
                            <?php echo smartyTranslate(array('s'=>'No products','mod'=>'blockcart'),$_smarty_tpl);?>

                        </p>
                        <?php if (count($_smarty_tpl->tpl_vars['discounts']->value)>0) {?>
                            <table class="vouchers"<?php if (count($_smarty_tpl->tpl_vars['discounts']->value)==0) {?> style="display:none;"<?php }?>>
                                <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['discount']->value['value_real']>0) {?>
                                        <tr class="bloc_cart_voucher" data-id="bloc_cart_voucher_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
                                            <td class="quantity">1x</td>
                                            <td class="name" title="<?php echo $_smarty_tpl->tpl_vars['discount']->value['description'];?>
">
                                                <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['discount']->value['name'],18,'...'), ENT_QUOTES, 'UTF-8', true);?>

                                            </td>
                                            <td class="price">
                                                -<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']),$_smarty_tpl);?>
<?php }?>
                                            </td>
                                            <td class="delete">
                                                <?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?>
                                                    <a class="delete_voucher" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true);?>
?deleteDiscount=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow">
                                                        <i class="icon-remove-sign"></i>
                                                    </a>
                                                <?php }?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                <?php } ?>
                            </table>
                        <?php }?>
                        <div class="cart-prices text-center clear-all-btn cart-block-subtotal ">
                            <div class="cart-prices-line first-line">
                                <span>
                                        <?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'blockcart'),$_smarty_tpl);?>

                                    </span>
                                    <span class="price cart_block_shipping_cost ajax_cart_shipping_cost">
                                        <?php if ($_smarty_tpl->tpl_vars['shipping_cost_float']->value==0) {?>
                                            <?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart'),$_smarty_tpl);?>

                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['shipping_cost']->value;?>

                                        <?php }?>
                                    </span>

                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['show_wrapping']->value) {?>
                                <div class="cart-prices-line">
                                    <?php $_smarty_tpl->tpl_vars['cart_flag'] = new Smarty_variable(constant('Cart::ONLY_WRAPPING'), null, 0);?>

                                    <span>
                                            <?php echo smartyTranslate(array('s'=>'Wrapping','mod'=>'blockcart'),$_smarty_tpl);?>

                                        </span>
                                    <span class="price cart_block_wrapping_cost">
                                            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
                                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>

                                            <?php }?>
                                        </span>
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['show_tax']->value&&isset($_smarty_tpl->tpl_vars['tax_cost']->value)) {?>
                                <div class="cart-prices-line">
                                    <span><?php echo smartyTranslate(array('s'=>'Tax','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
                                    <span class="price cart_block_tax_cost ajax_cart_tax_cost"><?php echo $_smarty_tpl->tpl_vars['tax_cost']->value;?>
</span>
                                </div>
                            <?php }?>
                            <div class="cart-prices-line last-line">
                                <span><?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
                                <span class="price cart_block_total ajax_block_cart_total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1&&$_smarty_tpl->tpl_vars['show_tax']->value) {?>
                                <p>
                                    <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
                                        <?php echo smartyTranslate(array('s'=>'Prices are tax included','mod'=>'blockcart'),$_smarty_tpl);?>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
                                        <?php echo smartyTranslate(array('s'=>'Prices are tax excluded','mod'=>'blockcart'),$_smarty_tpl);?>

                                    <?php }?>
                                </p>
                            <?php }?>
                        </div>

                        <div class="row no-gutter">
                            <div class="col-xs-6">
                                <a id="button_order_carts" class="btn btn-md btn-third-col btn-w100"
                                   href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true), ENT_QUOTES, 'UTF-8', true);?>
"
                                   title="<?php echo smartyTranslate(array('s'=>'View cart','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow">
                            <span>
                                <?php echo smartyTranslate(array('s'=>'View cart','mod'=>'blockcart'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i>
                            </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a id="button_order_cart" class="btn btn-md btn-third-col btn-w100"
                                   href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true), ENT_QUOTES, 'UTF-8', true);?>
?step=1"
                                   title="<?php echo smartyTranslate(array('s'=>'Proceed to checkout','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow">
                            <span>
                                <?php echo smartyTranslate(array('s'=>'Proceed to checkout','mod'=>'blockcart'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i>
                            </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .cart_block --></div>

    </div>
        <?php }?>
</div>

    <?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
</div>
<?php }?>

<?php echo smarty_function_counter(array('name'=>'active_overlay','assign'=>'active_overlay'),$_smarty_tpl);?>

<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['active_overlay']->value==1) {?>
	<div id="layer_cart">
            <div class="modal fade" id="product-added" tabindex="-1" role="dialog" aria-labelledby="product-added" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                       <a class="modal-close" data-dismiss="modal"><i class="icon_close"></i></a>
                       <h4 class="modal-title"><?php echo smartyTranslate(array('s'=>'Product successfully added to your shopping cart','mod'=>'blockcart'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                       <div id="wishlist-product-group-modal" class="dropdown-product-list">
                          <div class="dd-product-group" id="pr11">
                             <div class="dd-product-box pull-left">
                                <a href="#" title="product name">
                                    <span class="product-image-container layer_cart_img">
                                        
                                    </span>
                                </a>
                             </div>
                             <div class="dd-product-desc pull-left">
                                 <a class="title"><span id="layer_cart_product_title" class="product-name"></span></a>
                                <div class="qty"><span id="layer_cart_product_quantity">1</span> x <span class="active"><span id="layer_cart_product_price"></span></span></div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                       <div class="row no-gutter">
                          <div class="col-xs-6">
                             <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true), ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-md btn-third-col btn-w100"><?php echo smartyTranslate(array('s'=>'Proceed to checkout','mod'=>'blockcart'),$_smarty_tpl);?>
</a>
                          </div>
                          <div class="col-xs-6">
                             <button type="button" class="continue btn btn-md btn-third-col btn-w100" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Continue shopping','mod'=>'blockcart'),$_smarty_tpl);?>
</button>
                          </div>
                       </div>
                    </div>
                  </div>
                </div>
            </div>
	</div>
<?php }?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('CUSTOMIZE_TEXTFIELD'=>$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_dir'=>addslashes($_smarty_tpl->tpl_vars['img_dir']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('generated_date'=>intval(time())),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('ajax_allowed'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['ajax_allowed']->value)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'customizationIdMessage')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'customizationIdMessage'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Customization #','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'customizationIdMessage'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'removingLinkText')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'removingLinkText'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'removingLinkText'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'freeShippingTranslation')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeShippingTranslation'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeShippingTranslation'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'freeProductTranslation')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeProductTranslation'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeProductTranslation'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'delete_txt')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'delete_txt'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'delete_txt'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- /MODULE Block cart --><?php }} ?>
