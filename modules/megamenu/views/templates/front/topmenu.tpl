{**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*}
{if $menus}
<div id="megamenu" class="top-menu">
    <div class="container">
        <nav class="main-menu">
            <ul class="nav-menu">
                    {$menus}{*HTML CONTENT*}
            </ul>
        </nav>
    </div>
</div>
</div>
</div>
<div class="mobile-menu">
    <div class="navbar-header mobile-menu-button">
        {l s='MENU' mod='megamenu'}
        <a class="mobile-menu-toggler collapsed" href="#" data-target="#navbar-megamenu" data-toggle="collapse" ><span></span><span></span><span></span></a>
    </div>
    <div class="mobile-menu-body">
        <div class="mobile-menu-search clearfix">
                <form method="get" action="{$link->getPageLink('search', true)|escape:'htmlall':'UTF-8'}" id="searchbox">
                        <div class="form-group">
                        <input type="text" placeholder="{l s='Search' mod='megamenu'}" name="search_query" class="form-control">
                </div>
                        <button class="btn btn-default" type="submit"><i class="icon-magnifier"></i></button>
                </form>
        </div>
        <ul>
            {$mobileMenus}{*HTML CONTENT*}
        </ul>
    </div>
</div>
            <div class="container">
                <div class="row">
{/if}

<script>
	$('.megamenu-toggle').click(function(){
		$(this).parent().toggleClass('open');
	});

	{if !empty($settings['effect'])}
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
	{/if}
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

