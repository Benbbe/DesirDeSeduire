<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:38:12
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockuserazl\views\templates\hook\blockuserazl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1509958978d34dca822-67266841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7373abdfd850686b9f9fb9a9584d9d7638cc5ab3' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockuserazl\\views\\templates\\hook\\blockuserazl.tpl',
      1 => 1486326788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1509958978d34dca822-67266841',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'cookie' => 0,
    'has_customer_an_address' => 0,
    'link' => 0,
    'returnAllowed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d34e439e8_43654026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d34e439e8_43654026')) {function content_58978d34e439e8_43654026($_smarty_tpl) {?>
<li class="btn-group dropdown">

    <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
        <a  href="#" class="pm_item" data-toggle="dropdown" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserazl'),$_smarty_tpl);?>
">
            <i class="icon-user"></i>
            <span class="hidden-sm hidden-xs"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cookie']->value->customer_firstname, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cookie']->value->customer_lastname, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <span class="dropdown-triangle-up"></span>
            <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>
            <div class="dropdown-head">
                <h4 class="pull-left"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserazl'),$_smarty_tpl);?>
</h4>
            </div>
            <div class="dd-wrapper">
                <div id="dd_login">
                    <div class="">
                        <div class="">
                            <ul class="">
                                <?php if ($_smarty_tpl->tpl_vars['has_customer_an_address']->value) {?>
                                    <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Add my first address','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-building"></i><span><?php echo smartyTranslate(array('s'=>'Add my first address','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                                <?php }?>
                                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Orders','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-list-ol"></i><span><?php echo smartyTranslate(array('s'=>'Order history and details','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                                <?php if ($_smarty_tpl->tpl_vars['returnAllowed']->value) {?>
                                    <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Merchandise returns','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-refresh"></i><span><?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                                <?php }?>
                                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-slip',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Credit slips','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-ban-circle"></i><span><?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Addresses','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-building"></i><span><?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Information','mod'=>'blockuserazl'),$_smarty_tpl);?>
"><i class="icon-user"></i><span><?php echo smartyTranslate(array('s'=>'My personal information','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-sm btn-sec-col"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserazl'),$_smarty_tpl);?>
</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <a  href="#" class="pm_item" data-toggle="dropdown" title="login">
            <i class="icon-login"></i>
            <span class="hidden-sm hidden-xs"><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserazl'),$_smarty_tpl);?>
</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <span class="dropdown-triangle-up"></span>
            <a href="#" class="dd-close-btn"><i class="icon_close"></i></a>
            <div class="dropdown-head">
                <h4 class="pull-left"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'blockuserazl'),$_smarty_tpl);?>
</h4>
            </div>
            <div class="dd-wrapper">
                <div id="dd_login">
                    <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true), ENT_QUOTES, 'UTF-8', true);?>
" method="post" id="login_form">
                        <div class="required form-group">
                            <input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) {?><?php echo mb_convert_encoding(htmlspecialchars(stripslashes($_POST['email']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" placeholder="<?php echo smartyTranslate(array('s'=>'Email / Login','mod'=>'blockuserazl'),$_smarty_tpl);?>
" class="placeholder-fix">
                            <i class="icon_mail field-icon"></i>
                        </div>
                        <div class="required form-group">
                            <input type="password" id="passwd" name="passwd" value="<?php if (isset($_POST['passwd'])) {?><?php echo mb_convert_encoding(htmlspecialchars(stripslashes($_POST['passwd']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" placeholder="<?php echo smartyTranslate(array('s'=>'Password','mod'=>'blockuserazl'),$_smarty_tpl);?>
" class="placeholder-fix">
                            <i class="icon_lock field-icon"></i>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" id="SubmitLogin" name="SubmitLogin" class="btn btn-sm btn-third-col"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'blockuserazl'),$_smarty_tpl);?>
</button>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('password'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Recover your forgotten password','mod'=>'blockuserazl'),$_smarty_tpl);?>
" class="active"><?php echo smartyTranslate(array('s'=>'Forget your password?','mod'=>'blockuserazl'),$_smarty_tpl);?>
</a>
                        </div>
                        <div class="dd-delimiter"></div>
                        <div class="form-group text-center">
                            <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-sm btn-sec-col"><?php echo smartyTranslate(array('s'=>'Register','mod'=>'blockuserazl'),$_smarty_tpl);?>
</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
</li><?php }} ?>
