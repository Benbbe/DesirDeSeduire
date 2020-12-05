<?php /* Smarty version Smarty-3.1.19, created on 2017-01-25 01:20:18
         compiled from "E:\dev\servers\xampp\htdocs\underwears\admin5856mdwhg\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:246035887ef42cf95f5-08040465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73f161a4e642b46b0775836daff003b80723105d' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\admin5856mdwhg\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1480087984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '246035887ef42cf95f5-08040465',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5887ef42cfb535_71277498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5887ef42cfb535_71277498')) {function content_5887ef42cfb535_71277498($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
