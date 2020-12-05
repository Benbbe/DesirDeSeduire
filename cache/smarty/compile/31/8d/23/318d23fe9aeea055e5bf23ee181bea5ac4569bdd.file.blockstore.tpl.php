<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:56:54
         compiled from "E:\dev\servers\xampp\htdocs\underwears\themes\milan\modules\blockstore\blockstore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1200058979196517929-71601226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '318d23fe9aeea055e5bf23ee181bea5ac4569bdd' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\themes\\milan\\modules\\blockstore\\blockstore.tpl',
      1 => 1486326782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200058979196517929-71601226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'module_dir' => 0,
    'store_img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5897919652f038_86560386',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5897919652f038_86560386')) {function content_5897919652f038_86560386($_smarty_tpl) {?>

<!-- Block stores module -->
<div class="widget wg-our-stores box-with-pager mobile-collapse">
    <h3 class="wg-title mobile-collapse-header">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('stores'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Our stores','mod'=>'blockstore'),$_smarty_tpl);?>
">
                <?php echo smartyTranslate(array('s'=>'Our stores','mod'=>'blockstore'),$_smarty_tpl);?>

        </a>
    </h3>
    <div class="wg-body mobile-collapse-body">
       <div id="carousel-our-stores" class="carousel slide no-bullets" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
             <div class="item active">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('stores'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Our stores','mod'=>'blockstore'),$_smarty_tpl);?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)$_smarty_tpl->tpl_vars['module_dir']->value).((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['store_img']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
" alt="<?php echo smartyTranslate(array('s'=>'Our stores','mod'=>'blockstore'),$_smarty_tpl);?>
" />
                </a>
             </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-our-stores" role="button" data-slide="prev">
             <i class="arrow_carrot-left"></i>
          </a>
          <a class="right carousel-control" href="#carousel-our-stores" role="button" data-slide="next">
             <i class="arrow_carrot-right"></i>
          </a>
       </div>

       <div class="wgos-discover">
            <a class="btn btn-sm btn-third-col arrow-button" 
                href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('stores'), ENT_QUOTES, 'UTF-8', true);?>
" 
                title="<?php echo smartyTranslate(array('s'=>'Our stores','mod'=>'blockstore'),$_smarty_tpl);?>
">
                    <span><?php echo smartyTranslate(array('s'=>'Discover our stores','mod'=>'blockstore'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span>
            </a>
       </div>
    </div>
</div> <!-- widget -->
<!-- /Block stores module -->
<?php }} ?>
