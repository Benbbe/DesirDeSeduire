<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\ourclientsayazl\views\templates\hook\ourclientsayazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1848958978d34483355-08626530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd62c8a8dc08f279ef64adb59c9a19a632a76a81c' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\ourclientsayazl\\views\\templates\\hook\\ourclientsayazl.tpl',
      1 => 1486326790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1848958978d34483355-08626530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'ourclientsayazl_clients' => 0,
    'client' => 0,
    'link' => 0,
    'nbOurClientSayPerLine' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d344c59f3_08314658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d344c59f3_08314658')) {function content_58978d344c59f3_08314658($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index') {?>
    <!-- Module OurClientSayAzl -->
    <?php if (isset($_smarty_tpl->tpl_vars['ourclientsayazl_clients']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['nbOurClientSayPerLine'] = new Smarty_variable(3, null, 0);?>
        <div class="col-md-6 col-lg-5">
            <div class="most-popular-box box-with-pager mobile-collapse">
                <div class="title-type-1 mobile-collapse-header">
                    <?php echo smartyTranslate(array('s'=>'WHAT OUR CLIENTS SAY','mod'=>'ourclientsayazl'),$_smarty_tpl);?>

                </div>
                <div class="mobile-collapse-body">
                    <ul class="vertical-bx-1">
                    <?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['client']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ourclientsayazl_clients']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['client']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['client']->iteration=0;
 $_smarty_tpl->tpl_vars['client']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['client_list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->_loop = true;
 $_smarty_tpl->tpl_vars['client']->iteration++;
 $_smarty_tpl->tpl_vars['client']->index++;
 $_smarty_tpl->tpl_vars['client']->first = $_smarty_tpl->tpl_vars['client']->index === 0;
 $_smarty_tpl->tpl_vars['client']->last = $_smarty_tpl->tpl_vars['client']->iteration === $_smarty_tpl->tpl_vars['client']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['client_list']['first'] = $_smarty_tpl->tpl_vars['client']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['client_list']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['client_list']['last'] = $_smarty_tpl->tpl_vars['client']->last;
?>
                    <?php if ($_smarty_tpl->tpl_vars['client']->value['active']) {?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['client_list']['first']) {?>
                        <li>
                    <?php }?>
                            <div class="client-item">
                            <figure>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."ourclientsayazl/views/img/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['client']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['client']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                </figure>
                                <div class="ci-body">
                                <?php if (isset($_smarty_tpl->tpl_vars['client']->value['description'])&&trim($_smarty_tpl->tpl_vars['client']->value['description'])!='') {?>
                                    <?php echo $_smarty_tpl->tpl_vars['client']->value['description'];?>

                                <?php }?>
                                    <p><span class="ci-name"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['client']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></p>
                                </div>
                            </div>

                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['client_list']['last']) {?>
                        </li>
                    <?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['client_list']['iteration']%$_smarty_tpl->tpl_vars['nbOurClientSayPerLine']->value==0) {?>
                        </li>
                        <li>
                    <?php }?>
                    <?php }?>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php }?>
    <!-- /Module OurClientSayAzl -->
<?php }?><?php }} ?>
