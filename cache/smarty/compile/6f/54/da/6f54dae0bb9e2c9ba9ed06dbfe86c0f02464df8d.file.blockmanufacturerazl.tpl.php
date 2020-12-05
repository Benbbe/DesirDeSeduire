<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockmanufacturerazl\views\templates\hook\blockmanufacturerazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2009458978d3472ee33-90898502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f54dae0bb9e2c9ba9ed06dbfe86c0f02464df8d' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockmanufacturerazl\\views\\templates\\hook\\blockmanufacturerazl.tpl',
      1 => 1486326787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2009458978d3472ee33-90898502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manufacturers' => 0,
    'manufacturer' => 0,
    'link' => 0,
    'img_manu_dir' => 0,
    'nbManufacturersPerLine' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d347714e0_82997442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d347714e0_82997442')) {function content_58978d347714e0_82997442($_smarty_tpl) {?>
<!-- Block manufacturersazl module -->
<?php $_smarty_tpl->tpl_vars['nbManufacturersPerLine'] = new Smarty_variable(9, null, 0);?>
<div class="col-md-6 col-lg-5 col-lg-offset-2">
    <div class="most-popular-box box-with-pager mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            <?php echo smartyTranslate(array('s'=>'Manufacturers','mod'=>'blockmanufacturerazl'),$_smarty_tpl);?>

        </div>
        <div class="mobile-collapse-body">
            <?php if ($_smarty_tpl->tpl_vars['manufacturers']->value) {?>
                <ul class="vertical-bx-1">
                    <?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacturer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['manufacturer']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['manufacturer']->iteration=0;
 $_smarty_tpl->tpl_vars['manufacturer']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturer_list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->_loop = true;
 $_smarty_tpl->tpl_vars['manufacturer']->iteration++;
 $_smarty_tpl->tpl_vars['manufacturer']->index++;
 $_smarty_tpl->tpl_vars['manufacturer']->first = $_smarty_tpl->tpl_vars['manufacturer']->index === 0;
 $_smarty_tpl->tpl_vars['manufacturer']->last = $_smarty_tpl->tpl_vars['manufacturer']->iteration === $_smarty_tpl->tpl_vars['manufacturer']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturer_list']['first'] = $_smarty_tpl->tpl_vars['manufacturer']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturer_list']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['manufacturer_list']['last'] = $_smarty_tpl->tpl_vars['manufacturer']->last;
?>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['manufacturer_list']['first']) {?>
                            <li>
                                <div class="brands-list">
                        <?php }?>
                                    <div class="bl-item">
                                        <a  class="bl-item-inner" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'More about %s','mod'=>'blockmanufacturerazl','sprintf'=>array($_smarty_tpl->tpl_vars['manufacturer']->value['name'])),$_smarty_tpl);?>
">
                                            <img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['img_manu_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['manufacturer']->value['image'], ENT_QUOTES, 'UTF-8', true);?>
-small_default.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['manufacturer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
                                        </a>
                                    </div>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['manufacturer_list']['last']) {?>
                                </div>
                            </li>
                        <?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['manufacturer_list']['iteration']%$_smarty_tpl->tpl_vars['nbManufacturersPerLine']->value==0) {?>
                                </div>
                            </li>
                            <li>
                                <div class="brands-list">
                        <?php }?>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p><?php echo smartyTranslate(array('s'=>'No manufacturer','mod'=>'blockmanufacturerazl'),$_smarty_tpl);?>
</p>
            <?php }?>
        </div>
    </div>
</div>
<!-- /Block manufacturersazl module -->
<?php }} ?>
