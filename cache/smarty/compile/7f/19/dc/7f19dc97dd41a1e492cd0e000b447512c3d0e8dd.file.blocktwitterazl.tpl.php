<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blocktwitterazl\views\templates\hook\blocktwitterazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1555658978d355a6c28-41307945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f19dc97dd41a1e492cd0e000b447512c3d0e8dd' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blocktwitterazl\\views\\templates\\hook\\blocktwitterazl.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1555658978d355a6c28-41307945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'count' => 0,
    'tw_this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d355d5a35_09825204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d355d5a35_09825204')) {function content_58978d355d5a35_09825204($_smarty_tpl) {?>
<!-- begin twitter widget -->
<div class="col-md-4">
    <div class="twitter-box box-with-top-button mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            <?php echo smartyTranslate(array('s'=>'Latest Tweets','mod'=>'blocktwitterazl'),$_smarty_tpl);?>

        </div>
        <a class="top-box-btn-1 mobile-collapse-additional" href="https://twitter.com/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"><?php echo smartyTranslate(array('s'=>'Follow','mod'=>'blocktwitterazl'),$_smarty_tpl);?>
</a>
        <span class="tweet mobile-collapse-body"></span>
    </div>
</div>
<script>
$('.tweet').tweet({
    join_text: "auto",
      username: '<?php if (isset($_smarty_tpl->tpl_vars['username']->value)&&$_smarty_tpl->tpl_vars['username']->value!='') {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>azelabcom<?php }?>',
      avatar_size: 0,
      count: <?php if (isset($_smarty_tpl->tpl_vars['count']->value)&&$_smarty_tpl->tpl_vars['count']->value!='') {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['count']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>2<?php }?>,
      auto_join_text_default: "",
      auto_join_text_ed: "",
      auto_join_text_ing: "",
      auto_join_text_reply: "",
      auto_join_text_url: "",
      loading_text: "loading tweets...",
      modpath: '<?php if (isset($_smarty_tpl->tpl_vars['tw_this_path']->value)&&$_smarty_tpl->tpl_vars['tw_this_path']->value!='') {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tw_this_path']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>/modules/blocktwitterazl/ajax.php<?php }?>'

});
</script>
<!-- end twitter widget --><?php }} ?>
