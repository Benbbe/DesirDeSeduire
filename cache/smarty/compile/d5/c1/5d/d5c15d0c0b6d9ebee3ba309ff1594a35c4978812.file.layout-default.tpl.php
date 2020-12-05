<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:41:30
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\megamenu\views\templates\admin\layouts\layout-default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2466858978dfaea1f03-01944678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c15d0c0b6d9ebee3ba309ff1594a35c4978812' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\megamenu\\views\\templates\\admin\\layouts\\layout-default.tpl',
      1 => 1486326789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2466858978dfaea1f03-01944678',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'flashMessage' => 0,
    'flashMessageType' => 0,
    'baseURL' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978dfaec70d1_05582025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978dfaec70d1_05582025')) {function content_58978dfaec70d1_05582025($_smarty_tpl) {?>
<div id="megamenu-admin">
	<div class="container1">
		<?php if (!empty($_smarty_tpl->tpl_vars['flashMessage']->value)&&!empty($_smarty_tpl->tpl_vars['flashMessageType']->value)) {?>
			<div class="alert alert-<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['flashMessageType']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
				<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['flashMessage']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			</div>
		<?php }?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Megamenu','mod'=>'megamenu'),$_smarty_tpl);?>
</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a data-toggle="dropdown" href="#">
								<?php echo smartyTranslate(array('s'=>'Menus','mod'=>'megamenu'),$_smarty_tpl);?>

								<span class="caret"></span>
							</a>
							
							<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
								<li><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=edit"><?php echo smartyTranslate(array('s'=>'Add Menu','mod'=>'megamenu'),$_smarty_tpl);?>
</a></li>
								<li><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Menus&mm-action=index"><?php echo smartyTranslate(array('s'=>'List Menus','mod'=>'megamenu'),$_smarty_tpl);?>
</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" href="#">
								<?php echo smartyTranslate(array('s'=>'Custom Links','mod'=>'megamenu'),$_smarty_tpl);?>

								<span class="caret"></span>
							</a>
							<ul role="menu" class="dropdown-menu">
								<li><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Links&mm-action=edit"><?php echo smartyTranslate(array('s'=>'Add Link','mod'=>'megamenu'),$_smarty_tpl);?>
</a></li>
								<li><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Links&mm-action=index"><?php echo smartyTranslate(array('s'=>'List Links','mod'=>'megamenu'),$_smarty_tpl);?>
</a></li>
							</ul>
						</li>
						<li><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['baseURL']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&mm-controller=Pages&mm-action=settings" ><?php echo smartyTranslate(array('s'=>'Settings','mod'=>'megamenu'),$_smarty_tpl);?>
</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="content">
			<?php echo $_smarty_tpl->tpl_vars['template']->value;?>

		</div>
	</div>
</div>
<script type="text/javascript">
	$('.confirm-delete').click(function(){
		var didConfirm = confirm("Are you sure you want to delete this?");
		return didConfirm;
	});
</script><?php }} ?>
