<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:41
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\videostabazl\videostabazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11105589791893c7005-17457439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '952103751d9c626ebfd2524ae6b04bcebf44d6cb' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\videostabazl\\videostabazl.tpl',
      1 => 1486326784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11105589791893c7005-17457439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'videos' => 0,
    'video' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_589791893d6a14_93821729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589791893d6a14_93821729')) {function content_589791893d6a14_93821729($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['videos']->value) {?>
<section class="page-product-box tab-pane fade" id="videosTab">
    <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
        <div class="embed-responsive embed-responsive-16by9">
        <?php if ($_smarty_tpl->tpl_vars['video']->value['type']==0) {?>
            <div class="videoWrapper videotab_video"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['video']->value['video']);?>
</div>
        <?php } else { ?>
            <div class="mp4content videotab_video">
            <video style="width:100%;height:100%;" src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
uploads/<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['video']->value['video']);?>
" type="video/mp4" 
                id="player1" 
                controls="controls" preload="none"></video>
            </div>
        <?php }?>
        </div>
    <?php } ?>
</section>
<?php }?><?php }} ?>
