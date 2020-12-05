<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3072058978d341fca43-29984060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc74f5891704d53a990bd348fe9936d24a38d2b5' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\index.tpl',
      1 => 1486326780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3072058978d341fca43-29984060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME_TAB_CONTENT' => 0,
    'HOOK_HOME_TAB' => 0,
    'HOOK_HOME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d34216095_66631791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d34216095_66631791')) {function content_58978d34216095_66631791($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value;?>

	<?php }?>
	<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value;?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

    <section class="bottom-line">
        <div class="container">
            <div class="row">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterColumn"),$_smarty_tpl);?>

            </div>
            <div class="gap-30"></div>
        </div>
    </section>
<?php }?><?php }} ?>
