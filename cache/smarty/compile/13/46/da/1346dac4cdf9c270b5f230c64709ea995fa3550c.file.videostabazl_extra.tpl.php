<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:42
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\videostabazl\videostabazl_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39565897918acb2fd1-09302839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1346dac4cdf9c270b5f230c64709ea995fa3550c' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\videostabazl\\videostabazl_extra.tpl',
      1 => 1486326784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39565897918acb2fd1-09302839',
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
  'unifunc' => 'content_5897918acc4927_86107072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897918acc4927_86107072')) {function content_5897918acc4927_86107072($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['videos']->value) {?>
<a href="#" class="btn btn-yet-col" id="product-video-button" data-target="#product-video-box" data-toggle="modal"><span class="social_youtube"></span></a>
<div aria-hidden="true" aria-labelledby="product-added" role="dialog" tabindex="-1" id="product-video-box" class="modal fade" style="display: none;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
         <a aria-hidden="true" data-dismiss="modal" class="modal-close" href="#"><i class="icon_close"></i></a>
         <h4 class="modal-title"><?php echo smartyTranslate(array('s'=>'Product video'),$_smarty_tpl);?>
</h4>
      </div>
      <div class="modal-body modal-body-info">
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
         </div>
      </div>
    </div>
</div>
<?php }?><?php }} ?>
