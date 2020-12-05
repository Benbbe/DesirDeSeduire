<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\homesliderazl\views\templates\hook\homesliderazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1777758978d3519f600-30208465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f53fe5b2f99add20d4101997df5c3accf90529' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\homesliderazl\\views\\templates\\hook\\homesliderazl.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1777758978d3519f600-30208465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'homesliderazl_slides' => 0,
    'slide' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d351d0362_66148235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d351d0362_66148235')) {function content_58978d351d0362_66148235($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index') {?>
    <!-- Module HomeSliderAzl -->
    <?php if (isset($_smarty_tpl->tpl_vars['homesliderazl_slides']->value)) {?>
        <section id="home1-slider">
            <div class="home1-slider rslides-container">
                <ul class="rslides">
                    <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homesliderazl_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']) {?>
                            <li>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."homesliderazl/views/img/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
"
                                     alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />

                                <?php if (isset($_smarty_tpl->tpl_vars['slide']->value['description'])&&trim($_smarty_tpl->tpl_vars['slide']->value['description'])!='') {?>
                                    <div class="slider-container">
                                        <?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>

                                    </div>
                                <?php }?>
                            </li>
                        <?php }?>
                    <?php } ?>
                </ul>
                <div class="rslides_nav_block">
                    <div class="rslides-number">1/3</div>
                </div>
            </div>
        </section>
    <?php }?>
    <!-- /Module HomeSliderAzl -->
<?php }?><?php }} ?>
