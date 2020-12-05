<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:37:59
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\megamenu\views\templates\front\topmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3098758978d2748e579-40198841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a8405fbcdfedb1d213e7823fcc37fe5499706f5' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\megamenu\\views\\templates\\front\\topmenu.tpl',
      1 => 1486326790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3098758978d2748e579-40198841',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menus' => 0,
    'link' => 0,
    'mobileMenus' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978d274aba44_20333252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978d274aba44_20333252')) {function content_58978d274aba44_20333252($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['menus']->value) {?>
<div id="megamenu" class="top-menu">
    <div class="container">
        <nav class="main-menu">
            <ul class="nav-menu">
                    <?php echo $_smarty_tpl->tpl_vars['menus']->value;?>

            </ul>
        </nav>
    </div>
</div>
</div>
</div>
<div class="mobile-menu">
    <div class="navbar-header mobile-menu-button">
        <?php echo smartyTranslate(array('s'=>'MENU','mod'=>'megamenu'),$_smarty_tpl);?>

        <a class="mobile-menu-toggler collapsed" href="#" data-target="#navbar-megamenu" data-toggle="collapse" ><span></span><span></span><span></span></a>
    </div>
    <div class="mobile-menu-body">
        <div class="mobile-menu-search clearfix">
                <form method="get" action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" id="searchbox">
                        <div class="form-group">
                        <input type="text" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'megamenu'),$_smarty_tpl);?>
" name="search_query" class="form-control">
                </div>
                        <button class="btn btn-default" type="submit"><i class="icon-magnifier"></i></button>
                </form>
        </div>
        <ul>
            <?php echo $_smarty_tpl->tpl_vars['mobileMenus']->value;?>

        </ul>
    </div>
</div>
            <div class="container">
                <div class="row">
<?php }?>

<script>
	$('.megamenu-toggle').click(function(){
		$(this).parent().toggleClass('open');
	});

	<?php if (!empty($_smarty_tpl->tpl_vars['settings']->value['effect'])) {?>
		$('.dropdown1').on('show.bs.dropdown', function () {
			$(this).find('.dropdown-menu:first').css({ 'margin-top': '10px' }).animate({ 'margin-top': '0px' }, 300, function(){
				$(this).css({ 'margin-top':'' });

			});
		});
		$('.dropdown1').on('hide.bs.dropdown', function () {
			$(this).find('.dropdown-menu:first').css({ 'margin-top': '0px'}).animate({ 'margin-top': '10px' }, 300, function(){
         		$(this).css({ 'margin-top':''});
			});
		});
		$("#megamenu1 .nav > .dropdown").hover(
			function() {
				$('#megamenu .nav > .dropdown.open').removeClass('open');
				$t = $(this);
				$t.addClass('open');
				$(this).find('.dropdown-menu:first').css({ 'margin-top': '10px','display':'block' }).animate({ 'margin-top': '0px' }, 200, function(){
					$(this).css({ 'margin-top':'' });

				});
			}, function() {
				$('#megamenu .nav > .dropdown.open').removeClass('open');
				$t = $(this);
				$t.removeClass('open');
				$(this).find('.dropdown-menu:first').css({ 'margin-top': '0px'}).animate({ 'margin-top': '10px' }, 200, function(){
	         		$(this).css({ 'margin-top':'','display':'none'});

				});
			}
		);
		// Add slideup & fadein animation to dropdown
		$('.dropdown').on('show.bs.dropdown', function(e){
		  var $dropdown = $(this).find('.dropdown-menu:first');
		  var orig_margin_top = parseInt($dropdown.css('margin-top'));
		  $dropdown.css({ 'margin-top': (orig_margin_top + 10) + 'px', opacity: 0 }).animate({ 'margin-top': orig_margin_top + 'px', opacity: 1}, 300, function(){
		     $(this).css({ 'margin-top':'' });
		  });
		});
		// Add slidedown & fadeout animation to dropdown
		$('.dropdown').on('hide.bs.dropdown', function(e){
		  var $dropdown = $(this).find('.dropdown-menu:first');
		  var orig_margin_top = parseInt($dropdown.css('margin-top'));
		  $dropdown.css({ 'margin-top': orig_margin_top + 'px', opacity: 1, display: 'block' }).animate({ 'margin-top': (orig_margin_top + 10) + 'px', opacity: 0 }, 300, function(){
		     $(this).css({ 'margin-top':'', display:'' });
		  });
		});
	<?php }?>
	$( "#megamenu .right-arrow" ).hover(
		function() {
			$(this).find('.dropdown-submenu').css({ 'margin-top': '10px','margin-left': '10px', opacity: 0 }).animate({ 'margin-top': '0px','margin-left': '0px', opacity: 1 }, 300, function(){
				$(this).css({ 'margin-top':'','z-index':'10' });
			});
		}, function() {
			$(this).find('.dropdown-submenu').css({ 'margin-top': '0px','margin-left': '0px', opacity: 1, display: 'block'}).animate({ 'margin-top': '10px','margin-left': '10px', opacity: 0 }, 300, function(){
         		$(this).css({ 'margin-top':'', display:'','z-index':0 });
			});
		}
	);

	$(document).on('click', '.yamm .dropdown-menu', function(e) {
	  e.stopPropagation();
	});

	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { 
		e.stopPropagation(); 
	});

	$('.megamenu-owl').each(function(){
		$t = $(this);
		$t.owlCarousel({
			items:$t.data('items'),
			pagination : false,
			navigation : true,
			navigationText : ['<i class="arrow_carrot-left"></i>','<i class="arrow_carrot-right"></i>'],
		});
	});
	
</script>

<?php }} ?>
