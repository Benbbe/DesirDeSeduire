/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
//global variables
var responsiveflag = false;

$(document).ready(function(){
	highdpiInit();
	responsiveResize();
	$(window).resize(responsiveResize);
	if (navigator.userAgent.match(/Android/i))
	{
		var viewport = document.querySelector('meta[name="viewport"]');
		viewport.setAttribute('content', 'initial-scale=1.0,maximum-scale=1.0,user-scalable=0,width=device-width,height=device-height');
		window.scrollTo(0, 1);
	}
	blockHover();
	if (typeof quickView !== 'undefined' && quickView)
		quick_view();
	dropDown();

	if (typeof page_name != 'undefined' && !in_array(page_name, ['index', 'product']))
	{
		bindGrid();

 		$(document).on('change', '.selectProductSort', function(e){
			if (typeof request != 'undefined' && request)
				var requestSortProducts = request;
 			var splitData = $(this).val().split(':');
			if (typeof requestSortProducts != 'undefined' && requestSortProducts)
				document.location.href = requestSortProducts + ((requestSortProducts.indexOf('?') < 0) ? '?' : '&') + 'orderby=' + splitData[0] + '&orderway=' + splitData[1];
    	});

		$(document).on('change', 'select[name="n"]', function(){
			$(this.form).submit();
		});

		$(document).on('change', 'select[name="manufacturer_list"], select[name="supplier_list"]', function() {
			if (this.value != '')
				location.href = this.value;
		});

		$(document).on('change', 'select[name="currency_payement"]', function(){
			setCurrency($(this).val());
		});
	}

	$(document).on('click', '.back', function(e){
		e.preventDefault();
		history.back();
	});
	
	jQuery.curCSS = jQuery.css;
	if (!!$.prototype.cluetip)
		$('a.cluetip').cluetip({
			local:true,
			cursor: 'pointer',
			dropShadow: false,
			dropShadowSteps: 0,
			showTitle: false,
			tracking: true,
			sticky: false,
			mouseOutClose: true,
			fx: {             
		    	open:       'fadeIn',
		    	openSpeed:  'fast'
			}
		}).css('opacity', 0.8);

	if (!!$.prototype.fancybox)
		$.extend($.fancybox.defaults.tpl, {
			closeBtn : '<a title="' + FancyboxI18nClose + '" class="fancybox-item fancybox-close" href="javascript:;"></a>',
			next     : '<a title="' + FancyboxI18nNext + '" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
			prev     : '<a title="' + FancyboxI18nPrev + '" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
		});
});

function highdpiInit()
{
	if($('.replace-2x').css('font-size') == "1px")
	{		
		var els = $("img.replace-2x").get();
		for(var i = 0; i < els.length; i++)
		{
			src = els[i].src;
			extension = src.substr( (src.lastIndexOf('.') +1) );
			src = src.replace("." + extension, "2x." + extension);
			
			var img = new Image();
			img.src = src;
			img.height != 0 ? els[i].src = src : els[i].src = els[i].src;
		}
	}
}

function responsiveResize()
{
	if ($(document).width() <= 767 && responsiveflag == false)
	{
		accordion('enable');
	    accordionFooter('enable');
		responsiveflag = true;	
	}
	else if ($(document).width() >= 768)
	{
		accordion('disable');
		accordionFooter('disable');
	    responsiveflag = false;
	}
	if (typeof page_name != 'undefined' && in_array(page_name, ['category']))
		resizeCatimg();
}

function blockHover(status)
{
	$(document).off('mouseenter').on('mouseenter', '.product_list.grid li.ajax_block_product .product-container', function(e){

		if ($('body').find('.container').width() == 1170)
		{
			var pcHeight = $(this).parent().outerHeight();
			var pcPHeight = $(this).parent().find('.button-container').outerHeight() + $(this).parent().find('.comments_note').outerHeight() + $(this).parent().find('.functional-buttons').outerHeight();
			$(this).parent().addClass('hovered').css({'height':pcHeight + pcPHeight, 'margin-bottom':pcPHeight * (-1)});
		}
	});

	$(document).off('mouseleave').on('mouseleave', '.product_list.grid li.ajax_block_product .product-container', function(e){
		if ($('body').find('.container').width() == 1170)
			$(this).parent().removeClass('hovered').css({'height':'auto', 'margin-bottom':'0'});
	});
}

function quick_view()
{
	$(document).on('click', '.quick-view:visible, .quick-view-mobile:visible', function(e) 
	{
		e.preventDefault();
		var url = this.rel;
		if (url.indexOf('?') != -1)
			url += '&';
		else
			url += '?';

		if (!!$.prototype.fancybox)
			$.fancybox({
				'padding':  0,
				'width':    1087,
				'height':   610,
				'type':     'iframe',
				'href':     url + 'content_only=1',
                                afterShow: function() {
                                    console.log('asdasd');
                                    $('.fancybox-iframe body').css('background-color', '#FFFFFF');
                                }
			});
	});
}

function bindGrid()
{
	var view = $.totalStorage('display');
	
	if (!view && (typeof displayList != 'undefined') && displayList)
		view = 'list';

	if (view && view != 'grid')
		display(view);
	else
		$('.display').find('li#grid').addClass('active');
	
	$(document).on('click', '#grid', function(e){
		e.preventDefault();
		display('grid');
	});

	$(document).on('click', '#list', function(e){
		e.preventDefault();
		display('list');
	});
}

function display(view)
{
	if (view == 'list')
	{
            if ($('#pl-grid .products-list>.row').hasClass('no-gutter')){
                return;
            }
            $('#pl-grid .products-list>.row').addClass('no-gutter');
            $('#pl-grid .products-list .ajax_block_product').each(function(index, element){
                $(element).removeClass('col-md-4').removeClass('col-sm-6').removeClass('pl-item').removeClass('col-md-3').addClass('plv-item');
                var $figure = $(element).find('figure');
                $figure.find('.pl-backside').removeClass('pl-backside').addClass('plv-backside');
                var $productContainer = $(element).children('.product-container');
                var $plCaption = $productContainer.children('.pl-caption');
                $productContainer.addClass('row no-gutter');
                $plCaption.removeClass('pl-caption').addClass('col-sm-8').removeAttr('style');
                $plCaption.append('<div class="plv-body"></div>');
                var $plvBody = $plCaption.children('.plv-body');

                $plvBody.append('<div class="plv-header"><div class="row"><div class="col-xs-12 plv-title"></div></div></div>');
                $plvBody.append('<div class="plv-price-block"><div class="row"><div class="col-xs-6"></div></div></div>');
                $(element).find('.plv-exerpt').appendTo($plvBody);
                var $plvPriceBlock = $plvBody.find('.plv-price-block>.row');
                var $plvTitle = $plvBody.find('.plv-title');
                var $plvAvail = $(element).find('.plv-availability');
                $(element).find('.product-name').appendTo($plvTitle);
                $(element).find('.pl-price-block').appendTo($plvPriceBlock.find('.col-xs-6')).removeClass('pl-price-block').addClass('plv-price');
                $(element).find('.stars-rating, .stars-action').appendTo($plvPriceBlock.find('.col-xs-6'));
                $plvPriceBlock.find('.reviews-count').wrap('<div class="plv-reviews-count" style="display: none;"></div>');
                $plvPriceBlock.find('.review-add').wrap('<div class="plv-add-review" style="display: none;"></div>');
                $plvAvail.appendTo($plvPriceBlock);

                $plvBody.append('<div class="plv-buttons"></div>');
                var $plvButtons = $plvBody.children('.plv-buttons');
                $plvButtons.append($figure.children('figcaption').html());
                $plvButtons.children('a.pl-qview').hide();
                $plvButtons.children('a.pl-compare, a.pl-wishlist').removeClass('pl-button').addClass('btn').addClass('btn-prim-col').removeAttr('data-toggle');
                $plvButtons.children('a.pl-addcart').removeClass('pl-button').addClass('btn').addClass('btn-sec-col').removeAttr('data-toggle');

                $figure.wrap('<div class="col-sm-4 plv-image"></div>').children('a').addClass('plv-w-backside');
            });
            $('.display').find('li#list').addClass('active');
            $('.display').find('li#grid').removeAttr('class');
            $.totalStorage('display', 'list');
	}
	else 
	{   
            if (!$('#pl-grid .products-list>.row').hasClass('no-gutter')){
                return;
            }
		$('#pl-grid .products-list>.row').removeClass('no-gutter');
                $('#pl-grid .products-list .ajax_block_product').each(function(index, element){
                    $(element).addClass('col-md-4').addClass('col-sm-6').addClass('pl-item').addClass('col-md-3').removeClass('plv-item');
                    
                    var $figure = $(element).find('figure');
                    $figure.find('.pl-backside').removeClass('plv-backside').addClass('pl-backside');
                    var $productContainer = $(element).children('.product-container');
                    var $plCaption = $productContainer.children('.col-sm-8');
                    $productContainer.removeClass('row no-gutter');
                    $plCaption.addClass('pl-caption').removeClass('col-sm-8').attr('style', 'min-height: 120px');
                    var $plvBody = $plCaption.children('.plv-body');
                    $figure.find('.plv-backside').removeClass('plv-backside').addClass('pl-backside');
                    $figure.unwrap();
                    $plvBody.children('.plv-buttons').remove();
                    $(element).find('.product-name').appendTo($plCaption);
                    $(element).find('.plv-availability').appendTo($plCaption);
                    $(element).find('.plv-header').remove();
                    $(element).find('.plv-exerpt').appendTo($productContainer);
                    $(element).find('.plv-price-block').removeClass('plv-price-block').addClass('pl-price-block').unwrap();
                    $(element).find('.plv-price').unwrap().unwrap();
                    
                    $(element).find('.stars-rating').appendTo($plCaption);
                    
                    //$(element).find('.pl-price-block').html($(element).find('.plv-price').html());
                    $(element).find('.pl-price-block').replaceWith('<p class="pl-price-block">' + $(element).find('.plv-price').html() + '</p>');
                    $(element).find('.plv-price').remove();
                    $(element).find('.plv-reviews-count').appendTo($plCaption).children().unwrap();
                    $(element).find('.plv-add-review').appendTo($plCaption).children().unwrap();
                });
                $('[data-toggle="tooltip"]').tooltip();
		$('.display').find('li#grid').addClass('active');
		$('.display').find('li#list').removeAttr('class');
		$.totalStorage('display', 'grid');
	}	
}

function dropDown() 
{
	elementClick = '#header .current';
	elementSlide =  'ul.toogle_content';       
	activeClass = 'active';			 

	$(elementClick).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide);
		if(subUl.is(':hidden'))
		{
			subUl.slideDown();
			$(this).addClass(activeClass);	
		}
		else
		{
			subUl.slideUp();
			$(this).removeClass(activeClass);
		}
		$(elementClick).not(this).next(elementSlide).slideUp();
		$(elementClick).not(this).removeClass(activeClass);
		e.preventDefault();
	});

	$(elementSlide).on('click', function(e){
		e.stopPropagation();
	});

	$(document).on('click', function(e){
		e.stopPropagation();
		var elementHide = $(elementClick).next(elementSlide);
		$(elementHide).slideUp();
		$(elementClick).removeClass('active');
	});
}

function accordionFooter(status)
{
	if(status == 'enable')
	{
		$('#footer .footer-block h4').on('click', function(){
			$(this).toggleClass('active').parent().find('.toggle-footer').stop().slideToggle('medium');
		})
		$('#footer').addClass('accordion').find('.toggle-footer').slideUp('fast');
	}
	else
	{
		$('.footer-block h4').removeClass('active').off().parent().find('.toggle-footer').removeAttr('style').slideDown('fast');
		$('#footer').removeClass('accordion');
	}
}

function accordion(status)
{
	leftColumnBlocks = $('#left_column');
	if(status == 'enable')
	{
		$('#right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4').on('click', function(){
			$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
		})
		$('#right_column, #left_column').addClass('accordion').find('.block .block_content').slideUp('fast');
	}
	else
	{
		$('#right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
		$('#left_column, #right_column').removeClass('accordion');
	}
}

function resizeCatimg()
{
	var div = $('.cat_desc').parent('div');
	var image = new Image;
	$(image).load(function(){
	    var width  = image.width;
	    var height = image.height;
		var ratio = parseFloat(height / width);
		var calc = Math.round(ratio * parseInt(div.outerWidth(false)));
		div.css('min-height', calc);
	});
	if (div.length)
		image.src = div.css('background-image').replace(/url\("?|"?\)$/ig, '');
}

var instantSearchQueries = [];
$(document).ready(function()
{
	if (typeof instantsearch != 'undefined' && instantsearch)		
		$("#search_404_page").keyup(function(){
			if($(this).val().length > 4){
				stopInstantSearchQueries404();
				instantSearchQuery = $.ajax({
					url: search_url + '?rand=' + new Date().getTime(),
					data: {
						instantSearch: 1,
						id_lang: id_lang,
						q: $(this).val()
					},
					dataType: 'html',
					type: 'POST',
					headers: { "cache-control": "no-cache" },
					async: true,
					cache: false,
					success: function(data){
						if($("#search_404_page").val().length > 0)
						{
							tryToCloseInstantSearch404();
							$('#center_column').attr('id', 'old_center_column');
							$('#old_center_column').after('<div id="center_column" class="' + $('#old_center_column').attr('class') + '">'+data+'</div>');
							$('#old_center_column').hide();
							// Button override
							ajaxCart.overrideButtonsInThePage();
							$("#instant_search_results a.close").click(function() {
								$("#search_404_page").val('');
								return tryToCloseInstantSearch404();
							});
							return false;
						}
						else
							tryToCloseInstantSearch404();
					}
				});
				instantSearchQueries.push(instantSearchQuery);
			}
			else
				tryToCloseInstantSearch404();
		});

	/* TODO Ids aa blocksearch_type need to be removed*/
	var width_ac_results = 	$("#search_404_page").parent('form').width();
	if (typeof ajaxsearch != 'undefined' && ajaxsearch && typeof blocksearch_type !== 'undefined' && blocksearch_type)
		$("#search_404_page").autocomplete(
			search_url,
			{
				minChars: 3,
				max: 10,
				width: (width_ac_results > 0 ? width_ac_results : 500),
				selectFirst: false,
				scroll: false,
				dataType: "json",
				formatItem: function(data, i, max, value, term) {
					return value;
				},
				parse: function(data) {
					var mytab = new Array();
					for (var i = 0; i < data.length; i++)
						mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
					return mytab;
				},
				extraParams: {
					ajaxSearch: 1,
					id_lang: id_lang
				}
			}
		)
		.result(function(event, data, formatted) {
			$('#search_404_page').val(data.pname);
			document.location.href = data.product_link;
		});
});

function tryToCloseInstantSearch404()
{
	if ($('#old_center_column').length > 0)
	{
		$('#center_column').remove();
		$('#old_center_column').attr('id', 'center_column');
		$('#center_column').show();
		return false;
	}
}

function stopInstantSearchQueries404()
{
	for(i=0;i<instantSearchQueries.length;i++)
		instantSearchQueries[i].abort();
	instantSearchQueries = new Array();
}