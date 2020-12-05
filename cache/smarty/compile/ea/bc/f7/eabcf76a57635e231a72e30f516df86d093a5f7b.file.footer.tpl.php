<?php /* Smarty version Smarty-3.1.19, created on 2017-04-30 22:52:13
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blockgcontactazl\views\templates\hook\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1834958978d356c5e78-17343526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eabcf76a57635e231a72e30f516df86d093a5f7b' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blockgcontactazl\\views\\templates\\hook\\footer.tpl',
      1 => 1493585527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1834958978d356c5e78-17343526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d356e71c2_21100233',
  'variables' => 
  array (
    'GMAP_EMBED_AZL' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d356e71c2_21100233')) {function content_58978d356e71c2_21100233($_smarty_tpl) {?>
<!-- Module Block Google map & contact -->
<div class="col-md-4">
    <div class="get-in-touch-box mobile-collapse">
        <div class="title-type-1 mobile-collapse-header">
            <?php echo smartyTranslate(array('s'=>'Get IN TOUCH WITH US','mod'=>'blockgcontactazl'),$_smarty_tpl);?>

        </div>
        <div class="tweets-group mobile-collapse-body">
            <form id="footer_form" action="#" class="validation-engine">
                <?php if ($_smarty_tpl->tpl_vars['GMAP_EMBED_AZL']->value) {?>
                <div class="google-maps">
                    <?php echo $_smarty_tpl->tpl_vars['GMAP_EMBED_AZL']->value;?>

                </div>
                <?php }?>
                <div id="footer_form_response">
                <input type="hidden" name="token" value="<?php if (isset($_smarty_tpl->tpl_vars['token']->value)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>"/>
                <div class="required form-group">
                    <input name="from_name" type="text" class="form-control validate[required]" data-prompt-position="topLeft" placeholder="<?php echo smartyTranslate(array('s'=>'Enter your name','mod'=>'blockgcontactazl'),$_smarty_tpl);?>
">
                </div>
                <div class="required form-group">
                    <input name="from_mail" type="text" class="form-control validate[required,custom[email]]" data-prompt-position="topLeft" placeholder="<?php echo smartyTranslate(array('s'=>'Enter your email','mod'=>'blockgcontactazl'),$_smarty_tpl);?>
">
                </div>
                <div class="required form-group">
                    <textarea name="from_text" class="form-control validate[required]" data-prompt-position="topLeft" rows="3" placeholder="<?php echo smartyTranslate(array('s'=>'Enter your message','mod'=>'blockgcontactazl'),$_smarty_tpl);?>
"></textarea>
                </div>
                <div class="required form-group">
                    <button class="btn btn-sm btn-yet-col arrow-btn" type="submit"><?php echo smartyTranslate(array('s'=>'Send message','mod'=>'blockgcontactazl'),$_smarty_tpl);?>
</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#footer_form').submit(function(e)
        {
            var form_qstr = $(this).serialize();
            e.preventDefault();
            $.ajax({
                url: baseDir + 'modules/blockgcontactazl/blockcontact_ajax_azl.php?rand=' + new Date().getTime(),
                headers: { "cache-control": "no-cache" },
                type: "POST",
                dataType: "json",
                async: true,
                cache: false,
                data: form_qstr,
                success: function(data)
                {
                    if (data.response == 1)
                    {
                        $('#footer_form_response').html(data.message_success);
                    }
                    else
                    {
                        $('#footer_form_response').append(data.message_error);
                    }
                }
            });
        });
    });
</script>
<!-- Module Block Google map & contact --><?php }} ?>
