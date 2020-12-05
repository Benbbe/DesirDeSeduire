<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blocksocialazl\views\templates\hook\blocksocialazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1271358978d35babf81-94486019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65a0edc386eddb7345111cbfb88e5bb3ca5e635c' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blocksocialazl\\views\\templates\\hook\\blocksocialazl.tpl',
      1 => 1486326787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1271358978d35babf81-94486019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebook_url' => 0,
    'twitter_url' => 0,
    'youtube_url' => 0,
    'google_plus_url' => 0,
    'pinterest_url' => 0,
    'vimeo_url' => 0,
    'instagram_url' => 0,
    'skype_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d35bf0563_34975247',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d35bf0563_34975247')) {function content_58978d35bf0563_34975247($_smarty_tpl) {?>

<div class="col-md-6 text-right text-center-md">
    <ul id="social-buttons" class="list-inline">
		<?php if ($_smarty_tpl->tpl_vars['facebook_url']->value!='') {?><li class="facebook"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebook_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="icon-social-facebook"></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['twitter_url']->value!='') {?><li class="tweeter"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['twitter_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="icon-social-twitter "></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['youtube_url']->value!='') {?><li class="youtube"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['youtube_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="social_youtube"></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['google_plus_url']->value!='') {?><li class="gplus"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['google_plus_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="social_googleplus "></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['pinterest_url']->value!='') {?><li class="pinterest"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pinterest_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="social_pinterest"></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['vimeo_url']->value!='') {?><li class="vimeo"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vimeo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="social_vimeo"></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['instagram_url']->value!='') {?><li class="instantgram"><a class="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['instagram_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="social_instagram"></i></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['skype_url']->value!='') {?><li class="skype"><a class="_blank" href="skype:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['skype_url']->value, ENT_QUOTES, 'UTF-8', true);?>
?add"><i class="social_skype"></i></a></li><?php }?>
	</ul>
</div><?php }} ?>
