<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:37:58
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\homesliderazl\views\templates\hook\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1330858978d26b60296-28724878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a63c6b0f1bbd70d391d15a8b0ec0c31e3067367' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\homesliderazl\\views\\templates\\hook\\header.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1330858978d26b60296-28724878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homesliderazl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d26bd55c3_24613234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d26bd55c3_24613234')) {function content_58978d26bd55c3_24613234($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['homesliderazl']->value)) {?>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homesliderazl_loop'=>intval($_smarty_tpl->tpl_vars['homesliderazl']->value['loop'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homesliderazl_width'=>intval($_smarty_tpl->tpl_vars['homesliderazl']->value['width'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homesliderazl_speed'=>intval($_smarty_tpl->tpl_vars['homesliderazl']->value['speed'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homesliderazl_pause'=>intval($_smarty_tpl->tpl_vars['homesliderazl']->value['pause'])),$_smarty_tpl);?>

<?php }?><?php }} ?>
