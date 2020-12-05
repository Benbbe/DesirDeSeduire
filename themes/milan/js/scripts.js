(function($) {
"use strict";



/* disallow click in dropdown content */
/*$('.dd-wrapper, .dropdown-head').click(function(e) {
   e.stopPropagation();
});*/

/* custom select */
$(document).ready(function(){
    $('.s-styled').customSelect();
});


/* bx slider for vertical 1 */
$('.vertical-bx-1').each(function(){
   $(this).data('bxslider', $(this).bxSlider({
      minSlides: 3,
      slideMargin:0,
      nextText: '<i class="arrow_carrot-right"></i>',
      prevText: '<i class="arrow_carrot-left"></i>',
      pager: false,
   }));
});



// Init mobile menu
$(document).ready(function(){
   $('.mobile-menu').mobile_menu();
});

// Init Validation Engine
$(document).ready(function(){
   if($.fn.validationEngine){
      $(".validation-engine").validationEngine({
         autoPositionUpdate: true
      });
   }
});

// // Init Revolution slider for home-1
// $(document).ready(function(){
//    if($.fn.revolution){
//       $('.revolution-slider').revolution({
//           delay:9000,
//           startheight: 800,
//           //startwidth:890,

//           hideThumbs:200,

//           thumbWidth:100,
//           thumbHeight:50,
//           thumbAmount:5,

//           navigationType:"bullet",
//           navigationArrows:"nexttobullets",
//           navigationStyle:"round",
//           // navigationHAlign:"right",
//           navigationHOffset:400,

//           touchenabled:"on",
//           onHoverStop:"on",

//           navOffsetHorizontal:0,
//           navOffsetVertical:20,

//           stopAtSlide:-1,
//           stopAfterLoops:-1,

//           //shadow:1,
//           fullWidth:"on"

//       });
//    }
// });


// Init ResponsiveSlides Slider for home-1
$(document).ready(function() {

   function set_slides_count(current){
      var total = $(".home1-slider .rslides > li").length;
      $('.home1-slider .rslides-number').text(current+'/'+total);
   }

   if($.fn.responsiveSlides){
      $(".home1-slider .rslides").responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 2000,            // Integer: Speed of the transition, in milliseconds
        timeout: 1000000,          // Integer: Time between slide transitions, in milliseconds
        pager: false,           // Boolean: Show pager, true or false
        nav: true,             // Boolean: Show navigation, true or false
        random: false,          // Boolean: Randomize the order of the slides, true or false
        pause: false,           // Boolean: Pause on hover, true or false
        pauseControls: true,    // Boolean: Pause when hovering controls, true or false
        prevText: '<i class="arrow_carrot-left"></i>',   // String: Text for the "previous" button
        nextText: '<i class="arrow_carrot-right"></i>',       // String: Text for the "next" button
        maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
        navContainer: ".rslides_nav_block",       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: "",     // Selector: Declare custom pager navigation
        namespace: "rslides",   // String: Change the default namespace used
        before: function(i){
           //set_slides_count(i);
        },   // Function: Before callback
        after: function(i){
           //var $currentSlide = $("." + this.namespace + "1_on");
           set_slides_count(i+1);
        }     // Function: After callback
      });


      set_slides_count(1);
   }
}); // ready



// Bootstrap Tooltip
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip({ container: 'body' });
});

// Bootstrap Modal Close fix
$(document).ready(function() {
  $(document).on('click', '[data-dismiss="modal"]', function(e){
      e.preventDefault();
      $(this).parents('.modal').modal('hide');
  });
});





// ============================================================================
// Startup animations
// ============================================================================

$(document).ready(function() {

   // Add animate class where data-animate attribute is set
   var startTopOfWindow = $(window).scrollTop();

   $('[data-animate]').each(function(){
      if($(this).offset().top + $(this).height() > startTopOfWindow)
         $(this).addClass('animated');
   });

   // Remove style for progress bars on start
   $('.progress-bar.animate').each(function(){
      var $this = $(this);
      // Remove progress-bar class and return it on timeout fo cancel transition animation
      $this.removeClass('progress-bar').css('width','');
      setTimeout(function(){$this.addClass('progress-bar')},10);
   });

   // Animate on page start
   setTimeout(function(){animate_on_scroll()}, 50);

   // Anitame elements on scroll
   $(window).bind('scroll.vmanimate', function() {
      animate_on_scroll();
   });

   // Remove classes after animate is complete
   $('.animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(this).removeClass('animated').removeClass($(this).data('animate'));
   });

   function animate_on_scroll()
   {
      var topOfWindow = $(window).scrollTop();
      var bottomOfWindow = topOfWindow + $(window).height();
      var $elms = $('.animated, .animate').each(function(){
         var $this = $(this);
         if ($this.offset().top + 100 < bottomOfWindow)
         {
            if($this.hasClass('knob'))
               animate_knob($this);
            else if($this.hasClass('progress-bar'))
               animate_progress($this);
            else if($this.hasClass('animate-number'))
               animate_number($this);
            else
               $this.addClass($this.data('animate'));
         }
      });
      if($elms.length == 0) $(window).unbind('scroll.vmanimate');
   }

   function animate_knob($knob)
   {
      // Animate once
      $knob.removeClass('animate');
      //console.log($knob)
      var myVal = parseInt($knob.val());

      $({value: 0}).animate({value: myVal}, {
         duration: 1500,
         easing:'swing',
         step: function() {
            $knob.val(Math.ceil(this.value)).trigger('change');
         }
      });
   }

   function animate_progress($progress)
   {
      // Animate once
      $progress.removeClass('animate');

      //console.log($progress)
      var valStart = parseInt($progress.attr('aria-valuemin'));
      var myVal = parseInt($progress.attr('aria-valuenow'));
      var $value = $progress.parent().siblings('.value');

      // Transitions animation
      $progress.css({width: myVal+'%'});

      $({value: valStart}).animate({value: myVal}, {
         duration: 1500,
         easing:'swing',
         step: function() {
            $value.text(this.value.toFixed()+'%');
         }
      })
   }

   function animate_number($block)
   {
      // Animate once
      $block.removeClass('animate');

      //console.log($block)
      var valStart = 0;
      var myVal = parseInt($block.text().replace(' ',''));

      $({value: valStart}).animate({value: myVal}, {
         duration: 1500,
         easing:'swing',
         step: function() {
            $block.text(this.value.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
         }
      })
   }

}); // Startup Animations


// ============================================================================
// Moving on hover line
// ============================================================================

$(document).ready(function(){
   if($('.moving-hover-line').length == 0) return;
   $('.moving-hover-line >li:not(.hover-line)').hover(function(){
      go_to_item($(this));
   },function(){
      go_to_item($(this).siblings('.active'));
   });
   go_to_item($('.moving-hover-line .active')); // Init line for active item

   function go_to_item($item)
   {
       if($item.length == 0) return;
      var offset = $item.offset().left - $item.parent().offset().left;
      $item.siblings('.hover-line').css({left: offset, width: $item.width()});
   }
});




// ============================================================================
// Megamenu
// ============================================================================

$(document).ready(function(){
   $(".main-menu").accessibleMegaMenu({
   
            uuidPrefix: "accessible-megamenu", // unique ID's are required to indicate aria-owns, aria-controls and aria-labelledby
            menuClass: "accessible-megamenu", // default css class used to define the megamenu styling
            topNavItemClass: "accessible-megamenu-top-nav-item", // default css class for a top-level navigation item in the megamenu
            panelClass: "accessible-megamenu-panel", // default css class for a megamenu panel
            panelGroupClass: "accessible-megamenu-panel-group", // default css class for a group of items within a megamenu panel
            hoverClass: "hover", // default css class for the hover state
            focusClass: "focus", // default css class for the focus state
            openClass: "open" // default css class for the open state
           /* prefix for generated unique id attributes, which are required
              to indicate aria-owns, aria-controls and aria-labelledby */
           //uuidPrefix: "accessible-megamenu",
           /* css class used to define the megamenu styling */
           //menuClass: "nav-menu",
           /* css class for a top-level navigation item in the megamenu */
           //topNavItemClass: "nav-item",
           /* css class for a megamenu panel */
           //panelClass: "sub-nav",
           /* css class for a group of items within a megamenu panel */
           //panelGroupClass: "sub-nav-group",
           /* css class for the hover state */
           //hoverClass: "hover",
           /* css class for the focus state */
           //focusClass: "focus",
           /* css class for the open state */
           //openClass: "open"
       });
});



// ============================================================================
// Bootsptap Dropdown Effect
// ============================================================================


$(document).ready(function(){
   // Add slideup & fadein animation to dropdown
   $('.dropdown').on('show.bs.dropdown', function(e){
      var $dropdown = $(this).find('.dropdown-menu');
      var orig_margin_top = parseInt($dropdown.css('margin-top'));
      $dropdown.css({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}).animate({'margin-top': orig_margin_top + 'px', opacity: 1}, 300, function(){
         $(this).css({'margin-top':''});
      });
   });
   // Add slidedown & fadeout animation to dropdown
   $('.dropdown').on('hide.bs.dropdown', function(e){
      var $dropdown = $(this).find('.dropdown-menu');
      var orig_margin_top = parseInt($dropdown.css('margin-top'));
      $dropdown.css({'margin-top': orig_margin_top + 'px', opacity: 1, display: 'block'}).animate({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}, 300, function(){
         $(this).css({'margin-top':'', display:''});
      });
   });
});




// ============================================================================
// Dropdown products list handling
// ============================================================================
/*
$(document).ready(function(){

   // Remove all button
   $('.clear-all-btn a').click(function(e){
      e.preventDefault();
      var $products_list = $(this).closest('.dropdown-product-list');
      remove_all($products_list);
   });

   // Remove one product
   $('.ddr').click(function(e){
      e.preventDefault();
      var $product = $(this).closest('.dd-product-group');
      remove_product($product);
   });


   function remove_product($product)
   {
      var $products_list = $product.closest('.dropdown-product-list');
      var products_count = $products_list.find('.dd-product-group').length-1; // Todo Ajax answer

*//*      // If last product remove all
      if(products_count == 0){
         remove_all($products_list);
         return;
      }*//*
       removeProductComparison($product.attr('id').replace('pr', ''));
//      console.log($products_list.attr('id')); // List ID
      // TODO Ajax remove one product

      update_products_count_amount($product, products_count, products_count ? '$700.00' : '$0.00');

      $product.fadeOut(300, function(){
         $(this).remove();
      });
   }

   function remove_all($products_list)
   {
      console.log($products_list.attr('id')); // List ID
      // TODO Ajax remove all products

      $products_list.fadeOut(300, function() { $(this).empty(); }).siblings('.dd-list-empty').fadeIn(300);
      update_products_count_amount($products_list, 0, '$0.00');
   }

   function update_products_count_amount($product, count, amount)
   {
      var $dropdown = $product.closest('.dropdown');
      $dropdown.find('.dd-products-count').text(count);
      $dropdown.find('.dd-products-price').text(amount );
   }


});*/


// ============================================================================
// Mobile Collapse
// ============================================================================

$(document).ready(function(){
   var mobile_theshold = 992;

   $('.mobile-collapse-header').click(function(e){
      if(window.innerWidth < mobile_theshold){
         e.preventDefault();
         var $mobile_collapse = $(this).closest('.mobile-collapse');
         $mobile_collapse.toggleClass('opened');
         $mobile_collapse.find('.mobile-collapse-body').slideToggle(function(){
            var bxslider = $(this).find('.vertical-bx-1').data('bxslider');
            if(bxslider) bxslider.reloadSlider();
         });
      }
   });
});

// ============================================================================
// Product list carousel
// ============================================================================

$(document).ready(function(){

   $('.pl-ctl-left').click(function(e){
      e.preventDefault();
      change_page.call(this, -1);
   });
   $('.pl-ctl-right').click(function(e){
      e.preventDefault();
      change_page.call(this, 1);
   });

   function change_page(dir)
   {
      var $carousel = $(this).closest('.pl-carousel');
      var $pages_container = $carousel.find('.pl-pages');
      var $pages = $pages_container.find('>li');
      var $cur_page = $pages_container.find('>li.active');
      var next_index = $cur_page.index()+dir;
      // In loop
      if(next_index > $pages.length-1) next_index = 0;
      if(next_index < 0) next_index = $pages.length-1;
      var $next_page = $pages_container.find('>li').eq(next_index);

      //console.log('next_index:'+next_index)

      $cur_page.removeClass('active').addClass('animation')
         .one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function() {
            $(this).removeClass('animation');

            $next_page.addClass('animation');

            setTimeout(function() {
               $next_page.addClass('active')
                  .one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function() {
                     $(this).removeClass('animation');
               });
            }, 10);

      });
   }
});



// ============================================================================
// News list load more
// ============================================================================

$(document).ready(function(){
   $('.news-loadmore').click(function(e){
      e.preventDefault();
      var $this = $(this);
      $this.find('i').addClass('spin-cc');
      setTimeout(function() {
         var $news_container = $this.closest('.news-list').find('.news-container');
         var $new_items = $news_container.find('.news-item').clone().slice(0,3).appendTo($news_container);
         $new_items.addClass('animate');
         setTimeout(function() {
            $new_items.addClass('scale');
         }, 10);
         $this.find('i').removeClass('spin-cc');
      }, 500);
   })

});


// ============================================================================
// btn-plus and btn-minus in "#order-detail-content" table
// ============================================================================

  $('.btn-plus').click(function () {
    var $count = $(this).parent().find('.count');
    var val = parseInt($count.val());
    $count.val(val+1);
    return false;
  });

  $('.btn-minus').click(function () {
    var $count = $(this).parent().find('.count');
    var val = parseInt($count.val());
    if(val > 1) $count.val(val-1);
    return false;
  });


// ============================================================================
// Price range filters init
// ============================================================================

$(function() {
   if(!$.fn.slider) return;

   $( ".price-range-selector" ).each(function(){
      var $price_label = $(this).siblings('.wgpf-label').find('.price-range-label');
      var cur_sign = $price_label.data('currency-sign');
      var cursign_before = $price_label.data('cursign-before');
      $(this).slider({
         range: true,
         min: $(this).data('min'),
         max: $(this).data('max'),
         values: [ 0, $(this).data('max') ],
         slide: function( event, ui ) {
            set_range_label(ui.values[ 0 ], ui.values[ 1 ]);
         }
      });

      function set_range_label(value1, value2){
         if(cursign_before)
            $price_label.text( cur_sign + value1 + " - " + cur_sign + value2 );
         else
            $price_label.text( value1 + cur_sign + " - " + value2 + cur_sign);
      }

      set_range_label($(this).data('min'), $(this).data('max'));
   });
});


// ============================================================================
// customized audio player
// ============================================================================

$(function() {
   if($.fn.mediaelementplayer == undefined) return;
   $('audio.custom-audio-player').mediaelementplayer();
});

// ============================================================================
// Zoom
// ============================================================================

$(document).ready(function() {
    var zoomEnabled = $('#zoom-window-container').length;
  $('#thumblist').bxSlider({
    minSlides: 1,
    maxSlides: 4,
    slideWidth: 120,
    infiniteLoop: false,
    hideControlOnEnd: true,
    slideMargin: 10,
    pager: false,
    nextText: "",
    prevText: "",
    moveSlides: 1
  });

  if($.fn.elevateZoom == undefined) return;

  //initiate the plugin and pass the id of the div containing gallery images
  var elevate_zoom_big,zoom_03,zoom_04;
  $('#product-pupGallery-button').click(function(){
    var target_id = $(this).data('target');
    window.inetrvalID2 = window.setInterval(function(){
    var bolean = !!$(target_id).has('.zoomWrapper').length;
      if(!bolean && $(target_id+" #zoom_04").is(":visible")){
          zoom_04 = $(target_id+" #zoom_04").elevateZoom({
            zoomType: "lens", 
            inWrapper: true,
            imageCrossfade: true,
            responsive: true,
            gallery: 'thumblist2',
            cursor: 'pointer', 
            galleryActiveClass: "zoomThumbActive"
          });
      }
      else if (bolean)
      {
          clearInterval(window.inetrvalID2);
          return false;
      }
    },200);
 });
  if($(window).width() >= 1200){
    elevate_zoom_big = true;
    zoom_03 = $("#zoom_03").elevateZoom({
      zoomType: zoomEnabled? "window" : "none",
      zoomWindowHeight: 673,
      zoomWindowWidth: 530,
      zoomWindowPosition: "zoom-window-container",
      zoomWindowOffetx: -30,
      zoomWindowOffety: 0,
      borderSize: 6,
      lensBorder: 0,
      lensColour: "black",
      lensOpacity: 0.6,
      borderColour: "#e1e3e6",
      containLensZoom: true,
      imageCrossfade: true,
      responsive: true,
      gallery:'thumblist',
      cursor: 'pointer',
      galleryActiveClass: "zoomThumbActive"
    });

    zoom_04 = $("#zoom_04").mouseenter(function () {
      if(!$(this).parent().hasClass('zoomWrapper')){
        $(this).elevateZoom({
          zoomType: "lens",
          inWrapper: true,
          imageCrossfade: true,
          responsive: true,
          gallery:'thumblist2',
          cursor: 'pointer',
          galleryActiveClass: "zoomThumbActive"
        });
      }
    });
  }else
  {
    elevate_zoom_big = false;
    zoom_03 = $("#zoom_03").elevateZoom({
      zoomType: zoomEnabled? "lens" : "none",
      //containLensZoom: true,
      inWrapper: true,
      responsive: true,
      imageCrossfade: true,
      gallery:'thumblist',
      cursor: 'pointer',
      galleryActiveClass: "zoomThumbActive"
    });

    $("#zoom_04").mouseenter(function () {
      if(!$(this).parent().hasClass('zoomWrapper')){
          zoom_04 = $(this).elevateZoom({
          zoomType: "lens",
          inWrapper: true,
          imageCrossfade: true,
          responsive: true,
          gallery:'thumblist2',
          cursor: 'pointer',
          galleryActiveClass: "zoomThumbActive"
        });
      }
    });
  }

  $(window).resize(function(){
    if($(window).width() < 1200 && elevate_zoom_big)
    {
      var zoom_04_clone = zoom_04.clone();
      var temp = zoom_04.data("elevateZoom");
    }
  });


   // ============================================================================
   // Клик по ссылке "Add review" : плавная прокуртка и открытие вкладки
   // ============================================================================

  $('a[href=#review-btn]').click(function(){
      var target = $(this).attr('href');
      $('html, body').animate({scrollTop: $(target).offset().top - 85}, 500);
      $('#review-btn').click();
      return false;
  });

});



// ============================================================================
// FastClick init
// ============================================================================

$(function() {
   if(FastClick == undefined) return;
    FastClick.attach(document.body);
});







})(jQuery);