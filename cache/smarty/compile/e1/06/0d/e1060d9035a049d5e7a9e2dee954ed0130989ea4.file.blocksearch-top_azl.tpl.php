<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:35:20
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blocksearchazl\views\templates\hook\blocksearch-top_azl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1875458978c88ab7ec6-97145407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1060d9035a049d5e7a9e2dee954ed0130989ea4' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blocksearchazl\\views\\templates\\hook\\blocksearch-top_azl.tpl',
      1 => 1486326787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1875458978c88ab7ec6-97145407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hook_mobile' => 0,
    'link' => 0,
    'search_query' => 0,
    'milan_settings' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978c88b1f734_04921151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978c88b1f734_04921151')) {function content_58978c88b1f734_04921151($_smarty_tpl) {?>
<!-- block seach mobile -->
<?php if (isset($_smarty_tpl->tpl_vars['hook_mobile']->value)) {?>
<div class="input_search" data-role="fieldcontain">
	<form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" id="searchbox">
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearchazl'),$_smarty_tpl);?>
" value="<?php echo stripslashes(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true));?>
" />
	</form>
</div>
<?php } else { ?>
<!-- Block search module TOP -->
<div class="col-md-3 top-search-box hidden-sm hidden-xs">
    <form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" id="searchboxx">
        <div class="required form-group">
            
            <input type="hidden" name="controller" value="search" />
            <input type="hidden" name="orderby" value="position" />
            <input type="hidden" name="orderway" value="desc" />
            <input class="placeholder-fix top-search" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearchazl'),$_smarty_tpl);?>
"  autocomplete="off" type="text" id="search_query_top" name="search_query" value="<?php echo stripslashes(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true));?>
" />
            

            
            <button><i class="icon_search field-icon"></i></button>
        </div>
    </form>
</div>
<?php if (((isset($_smarty_tpl->tpl_vars['milan_settings']->value)&&$_smarty_tpl->tpl_vars['milan_settings']->value['header_layout']==0))) {?>
    <div id="header-logo" class="col-md-6 col-sm-12 text-center">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                    <img class="logo hidden-xs" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_image_width']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_image_height']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>/>
                    <img class="logo visible-xs-inline" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_image_width']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_image_height']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>>
            </a>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/views/templates/hook/blocksearch-instantsearch_azl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<!-- /Block search module TOP -->
<?php }} ?>
