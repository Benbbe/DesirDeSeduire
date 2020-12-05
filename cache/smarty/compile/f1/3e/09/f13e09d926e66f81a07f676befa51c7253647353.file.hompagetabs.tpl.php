<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:35:51
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\hompagetabs\views\templates\hook\hompagetabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1602658978ca76eecd0-15950981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f13e09d926e66f81a07f676befa51c7253647353' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\hompagetabs\\views\\templates\\hook\\hompagetabs.tpl',
      1 => 1486326789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1602658978ca76eecd0-15950981',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fproducts' => 0,
    'active' => 0,
    'nproducts' => 0,
    'special' => 0,
    'categories' => 0,
    'category' => 0,
    'activeTab' => 0,
    'fproducts_productimg' => 0,
    'nproducts_productimg' => 0,
    'sproducts_productimg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978ca777b710_18399389',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978ca777b710_18399389')) {function content_58978ca777b710_18399389($_smarty_tpl) {?>
<!-- /Module HomepageTabsProducts -->
<section>
    <div class="container">
        <div class="gap-50"></div>
        <div class="text-center">
            <ul class="product-categories moving-hover-line" role="tablist">
                <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable("active", null, 0);?>
                <?php if (isset($_smarty_tpl->tpl_vars['fproducts']->value)&&$_smarty_tpl->tpl_vars['fproducts']->value) {?>
                    <li class="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['active']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                        <a href="#featured_products_tab" title="<?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'hompagetabs'),$_smarty_tpl);?>
"
                           data-toggle="tab"
                           role="tab"><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'hompagetabs'),$_smarty_tpl);?>
</a>
                    </li>
                    <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable(false, null, 0);?>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['nproducts']->value)&&$_smarty_tpl->tpl_vars['nproducts']->value) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['active']->value) {?>class="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['active']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"<?php }?>>
                        <a href="#new_products_tab" title="<?php echo smartyTranslate(array('s'=>'New products','mod'=>'hompagetabs'),$_smarty_tpl);?>
" data-toggle="tab"
                           role="tab"><?php echo smartyTranslate(array('s'=>'New products','mod'=>'hompagetabs'),$_smarty_tpl);?>
</a>
                    </li>
                    <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable(false, null, 0);?>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['special']->value)&&$_smarty_tpl->tpl_vars['special']->value) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['active']->value) {?>class="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['active']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"<?php }?>>
                        <a href="#special_products_tab" title="<?php echo smartyTranslate(array('s'=>'Price drops','mod'=>'hompagetabs'),$_smarty_tpl);?>
"
                           data-toggle="tab" role="tab"><?php echo smartyTranslate(array('s'=>'Price drops','mod'=>'hompagetabs'),$_smarty_tpl);?>
</a>
                    </li>
                    <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable(false, null, 0);?>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['categories']->value)&&$_smarty_tpl->tpl_vars['categories']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                        <?php if (isset($_smarty_tpl->tpl_vars['category']->value['products'])&&$_smarty_tpl->tpl_vars['category']->value['products']) {?>
                            <li <?php if ($_smarty_tpl->tpl_vars['active']->value) {?>class="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['active']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"<?php }?>>
                                <a href="#category_products_tab_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-toggle="tab"
                                   role="tab"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
                            </li>
                            <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable(false, null, 0);?>
                        <?php }?>
                    <?php } ?>
                <?php }?>
                <li class="hover-line"></li>
            </ul>
        </div>

        <div class="tab-content tab-no-style">
            <?php $_smarty_tpl->tpl_vars['activeTab'] = new Smarty_variable(" in active", null, 0);?>
            <?php if (isset($_smarty_tpl->tpl_vars['fproducts']->value)&&$_smarty_tpl->tpl_vars['fproducts']->value) {?>
            <div class="tab-pane fade<?php if ($_smarty_tpl->tpl_vars['activeTab']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['activeTab']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="featured_products_tab">
            <div class="products-list pl-carousel">
                <div class="pl-pages">

                    <?php if (isset($_smarty_tpl->tpl_vars['fproducts_productimg']->value)) {?>
                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productimg'=>$_smarty_tpl->tpl_vars['fproducts_productimg']->value,'products'=>$_smarty_tpl->tpl_vars['fproducts']->value), 0);?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['fproducts']->value), 0);?>

                    <?php }?>
                </div>
            </div>
        </div>
        <?php $_smarty_tpl->tpl_vars['activeTab'] = new Smarty_variable(false, null, 0);?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['nproducts']->value)&&$_smarty_tpl->tpl_vars['nproducts']->value) {?>
        <div class="tab-pane fade<?php if ($_smarty_tpl->tpl_vars['activeTab']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['activeTab']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="new_products_tab">
        <div class="products-list pl-carousel">
            <div class="pl-pages">
                <?php if (isset($_smarty_tpl->tpl_vars['nproducts_productimg']->value)) {?>
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productimg'=>$_smarty_tpl->tpl_vars['nproducts_productimg']->value,'products'=>$_smarty_tpl->tpl_vars['nproducts']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['nproducts']->value), 0);?>

                <?php }?>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars['activeTab'] = new Smarty_variable(false, null, 0);?>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['special']->value)&&$_smarty_tpl->tpl_vars['special']->value) {?>
        <div class="tab-pane fade<?php if ($_smarty_tpl->tpl_vars['activeTab']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['activeTab']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="special_products_tab">
        <div class="products-list pl-carousel">
            <div class="pl-pages">
                <?php if (isset($_smarty_tpl->tpl_vars['sproducts_productimg']->value)) {?>
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productimg'=>$_smarty_tpl->tpl_vars['sproducts_productimg']->value,'products'=>$_smarty_tpl->tpl_vars['special']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['special']->value), 0);?>

                <?php }?>
            </div>
        </div>
        </div>
        <?php $_smarty_tpl->tpl_vars['activeTab'] = new Smarty_variable(false, null, 0);?>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['categories']->value)&&$_smarty_tpl->tpl_vars['categories']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            <?php if (isset($_smarty_tpl->tpl_vars['category']->value['products'])&&$_smarty_tpl->tpl_vars['category']->value['products']) {?>
                <div class="tab-pane fade<?php if ($_smarty_tpl->tpl_vars['activeTab']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['activeTab']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="category_products_tab_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                <div class="products-list pl-carousel">
                    <div class="pl-pages">
                        <?php if (isset($_smarty_tpl->tpl_vars['category']->value['productimg'])) {?>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['category']->value['products'],'productimg'=>$_smarty_tpl->tpl_vars['category']->value['productimg']), 0);?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['category']->value['products']), 0);?>

                        <?php }?>
                    </div>
                </div>
                </div>
                <?php $_smarty_tpl->tpl_vars['activeTab'] = new Smarty_variable(false, null, 0);?>
            <?php }?>

        <?php } ?>
    <?php }?>
    </div>
    </div>
</section>
<!-- /Module HomepageTabsProducts --><?php }} ?>
