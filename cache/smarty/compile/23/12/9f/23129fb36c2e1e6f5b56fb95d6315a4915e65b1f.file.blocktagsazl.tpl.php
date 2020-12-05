<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:43:08
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blocktagsazl\views\templates\hook\blocktagsazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2255658978e5cd92346-12446992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23129fb36c2e1e6f5b56fb95d6315a4915e65b1f' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blocktagsazl\\views\\templates\\hook\\blocktagsazl.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2255658978e5cd92346-12446992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tag' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978e5ce49d24_03175444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978e5ce49d24_03175444')) {function content_58978e5ce49d24_03175444($_smarty_tpl) {?>
<!-- Block tags module -->                
<div class="col-md-3 col-sm-12">
    <div class="product-tags-box mobile-collapse">
        <div class="title-type-2 mobile-collapse-header">
            <?php echo smartyTranslate(array('s'=>'Tags','mod'=>'blocktagsazl'),$_smarty_tpl);?>

        </div>
        <div class="tags mobile-collapse-body">
            <?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
                    <a href="<?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value['name']);?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,"tag=".$_tmp1), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'More about','mod'=>'blocktagsazl'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                    </a>
                <?php } ?>
            <?php } else { ?>
                <?php echo smartyTranslate(array('s'=>'No tags specified yet','mod'=>'blocktagsazl'),$_smarty_tpl);?>

            <?php }?>
        </div>
    </div>
</div>
<!-- /Block tags module -->
<?php }} ?>
