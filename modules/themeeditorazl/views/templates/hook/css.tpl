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

/* ========================================================================= *\
Layout options
\* ========================================================================= */
{if $settings.responsive_mode == 0}
    .container{
    max-width: none !important;
    width: 1200px !important;
    }
    .boxed-layout{
    width: 1200px !important;
    }

    .mobile-collapse-body{
    display: block;
    }
    .mobile-collapse-header::after{
    content: none;
    }
    .box-with-pager .bx-controls{
    top: 15px;
    }
    #social-buttons, .social-buttons{
    margin-top: 0;
    }
    .product-categories li{
    float: left;
    }
    .text-center-md{
    text-align: none;
    }
    #footer-1 {
    padding-bottom: 40px;
    }
    #footer-2{
    border-top: 1px solid #d9dbde;
    padding-top: 40px;
    }
    .top-box-btn-1{
    position: absolute;
    margin-top: 0;
    }
    .mobile-collapse-additional{
    display: block;
    }
    .title-type-1, .title-type-2{
    margin-bottom: 40px;
    }
    .mobile-collapse .bx-wrapper{
    margin-top: 0 !important;
    }
    .brands-list .bl-item{
    float: left;
    width: 33.3333%;
    }
    .rslide-caption-1 span, .rslide-caption-1 .sc1-year, .rslide-caption-2 span, .rslide-caption-2 .sc1-year, .rslide-caption-3 span, .rslide-caption-3 .sc1-year, .rslide-caption-4 span, .rslide-caption-4 .sc1-year, .rslide-caption-5 span, .rslide-caption-5 .sc1-year, .rslide-caption-6 span, .rslide-caption-6 .sc1-year {
    display: block;
    float: none;
    font-size: 83px;
    }
    .slider-container{
    margin-left: -485px;
    width: 970px;
    left: 50%;
    }
    .rslide-caption-1 {
    margin-top: 5%;
    width: 500px;
    }
    .rslide-caption-2{
    width: 500px;
    margin-top: 30px;
    }
    .rslide-caption-1 .sc1-year{
    display: inline-block;
    font-size: 50px;
    float: right;
    }
    .col-lg-7{
    width: 58.3333%;
    }
    .zoom-content #product-pupGallery-button{
    left: auto;
    top: -1px;
    }
    .big-image{
    margin-top: 0;
    }
    .product-info{
    margin-left: -15px;
    padding: 0;
    }
    .article-info .social-buttons{
    float: right;
    margin: 0;
    }
    .pl-item figure figcaption{
    margin-bottom: -55px;
    }
    .thumbnails .bx-controls-direction{
    height: 0;
    margin: 0;
    }
    .thumbnails .bx-controls-direction a{
    margin: 0;
    position: absolute;
    transform: translateY(-50%);
    }

    .modal-dialog {
    margin: 30px auto;
    width: 600px;
    }
    .modal-lg {
    width: 900px;
    }
    .zoom-content-2 .big-image{
    float: left;
    margin: 0;
    }
    .zoom-content-2 .thumbnails{
    float: right;
    }
    .zoom-content-2 .thumbnails {
    float: right;
    height: 611px;
    margin: 30px 0;
    padding-left: 0;
    width: 205px;
    }
    .mobile-collapse-body{
    margin-top: 0;
    }
    .wg-our-stores {
    border-bottom: 1px solid #e1e3e6;
    padding-bottom: 35px;
    }
    .wg-specials.box-with-pager .bx-controls{
    top: 0;
    }
    .pg-header h1 {
    font-size: 28px;
    }
    .b-crumbs-block {
    border-top: 0 none;
    background-color: transparent;
    }
    .pg-header {
    border-bottom: 1px solid #e1e3e6;
    }
    .left-menu div.active:after{
    display: block;
    }
    .left-menu div {
    display: block;
    height: 125px;
    padding: 40px 0 0 0;
    width: 145px;
    }
    /* resp-table off */
    .resp-tbl > tbody > tr > td, .resp-tbl > tfoot > tr > td{
    display: table-cell;
    padding-top: 20px !important;
    border: 1px solid #ddd;
    }
    .resp-tbl > tbody > tr, .resp-tbl > tfoot > tr{
    display: table-row;

    }
    .resp-tbl tr td .resp-tbl-head{
    display: none;
    }
    .resp-tbl > tbody > tr > td .resp-tbl-head, .resp-tbl > tfoot > tr > td .resp-tbl-head{
    display: none;
    }
    thead.hidden-xs{
    display: table-row-group;
    }
    .resp-tbl > tbody > tr > td .resp-tbl-cnt, .resp-tbl > tfoot > tr > td .resp-tbl-cnt{
    float: none;
    text-align: inherit;
    width: auto;
    }
    #order-detail-content .table tbody > tr > td, .table-container .table tbody > tr > td{

    }
    .resp-tbl thead{
    display: table-row-group;
    }
    #order-detail-content #cart_summary thead, #order-detail-content #cart_summary tbody, .table-container #cart_summary thead, .table-container #cart_summary tbody{
    display: table-row-group;
    }
    #order-detail-content #cart_summary table, .table-container #cart_summary table{
    display: table;
    }
    #order-detail-content #cart_summary tr, .table-container #cart_summary tr{
    display: table-row;
    }
    #order-detail-content #cart_summary th, #order-detail-content #cart_summary td, .table-container #cart_summary th, .table-container #cart_summary td{
    display: table-cell;
    float: none;
    width: inherit;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
    border: 1px solid #ddd;
    }
    #order-detail-content #cart_summary td, .table-container #cart_summary td{
    border: 1px solid #ddd;
    }
    #order-detail-content #cart_summary tbody td.cart_product, .table-container #cart_summary tbody td.cart_product{
    width: inherit;
    }
    #order-detail-content #cart_summary td.cart_delete, .table-container #cart_summary td.cart_delete{
    float: none;
    width: inherit;
    }
    #order-detail-content #cart_summary td::before, .table-container #cart_summary td::before{
    display: none;
    }
    #order-detail-content #cart_summary td.cart_delete::before, .table-container #cart_summary td.cart_delete::before{
    display: none;
    }
    #order-detail-content #cart_summary thead tr, .table-container #cart_summary thead tr{
    position: static;
    }
    #module-blockwishlist-mywishlist .wishlistLinkTop li.pull-right{
    float: right !important;
    }
    .checkout-menu .btn{
    width: 20%;
    }
    #order-detail-content .table tbody > tr > td.cart_quantity, .table-container .table tbody > tr > td.cart_quantity{
    width: 140px !important;
    }
    #order-detail-content #cart_summary tbody td.cart_unit, .table-container #cart_summary tbody td.cart_unit{
    width: 120px;
    max-width: none;
    }
    #order-detail-content .subtotal, .table-container .subtotal {
    padding-left: 20px;
    padding-right: 60px;
    text-align: left;
    }
    #order-detail-content .table tbody > tr a.close-btn.ddr, .table-container .table tbody > tr a.close-btn.ddr{
    top: 15px;
    bottom: auto;
    }
    #order-detail-content #cart_summary tfoot tr .text-right, #order-detail-content #cart_summary tfoot tr .price, .table-container #cart_summary tfoot tr .text-right, .table-container #cart_summary tfoot tr .price{
    display: table-cell;
    float: none;
    width: inherit;
    }
    #order-detail-content #cart_summary td, .table-container #cart_summary td{
    text-align: right;
    }
    #order-detail-content #cart_summary tfoot td#total_price_container, .table-container #cart_summary tfoot td#total_price_container{
    background: transparent;
    }
    .text-center-md{
    text-align: inherit;
    }
    .text-right{
    text-align: right;
    }
    .rslide-caption-4 {
    color: white;
    font-size: 60px;
    font-weight: 300;
    line-height: 1.6;
    margin: 0 auto;
    padding: 14px 0;
    position: relative;
    text-align: center;
    width: 843px;
    }
    .rslide-caption-3 {
    color: white;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.6;
    margin: 10% auto 0;
    padding: 14px 0;
    position: relative;
    text-align: center;
    width: 843px;
    }
    .rslide-caption-5 {
    color: white;
    font-size: 32px;
    margin-bottom: 20px;
    margin-top: 10%;
    }
    .rslide-caption-6 {
    color: white;
    font-size: 18px;
    }
    .rslide-caption-1, .rslide-caption-2, .rslide-caption-3, .rslide-caption-4, .rslide-caption-5, .rslide-caption-6{
    margin-top: 0;
    }
    .nav-item > a{
    width:143px;
    }
    .mobile-menu {
        display: none;
    }
    .top-menu{
    display: block;
    }
{/if}

{if $settings.page_width == 'full'}
    #header-bar{
    position: relative;
    padding-bottom: 0;
    }
    @media (min-width: 992px){
    #header-bar{
    padding-bottom: 50px;
    }
    #header-bar .top-menu{
    bottom: 0;
    clear: both;
    left: 0;
    position: absolute;
    right: 0;
    }
    }

{/if}
{*.boxed-layout{*}
{*{if $settings.box_background_color}*}
    {*background-color: {$settings.box_background_color};*}
{*{/if}*}
{*{if $settings.box_text_color}*}
    {*color: {$settings.box_text_color};*}
{*{/if}*}
{*}*}

/* ========================================================================= *\
Colors & Skins
\* ========================================================================= */
{*$brand-primary: #dccc99;*}
{if $settings.brand_primary}
    .arrow-btn:hover,.arrow-btn:hover:after,.btn-lg,.btn-md,.btn-sec-col:hover ,.btn-third-col,.btn-third-col:focus,.tooltip-inner,#top-bar .active ,.dropdown-top-list > a ,
    .dd-product-desc .qty span,.shp-ca:hover .s-bag-2:after ,.s-bag-2 .active,.b-crumbs ,.vertical-bx-1 figure,.box-with-pager .bx-prev:focus:hover, .box-with-pager .bx-next:focus:hover,
    .nav-item > a ,.megamenu-popular .vertical-bx-1 .price,.mobile-menu-body ul li a,input.stl[type=checkbox]:not(old):checked + label > span:before,.customSelect.customSelectFocus:after,.rslide-caption-1 .sc1-year,
    .product-categories li.active a, .product-categories li a:hover,.pl-discount-percent,.pl-ctl-left:hover, .pl-ctl-right:hover,.news-loadmore i ,#top-bar a:hover,
    .wg-specials .wgsp-price .price-percent-reduction,.quote-author,.pg-body .contact .skype a,.user-info .wellcome h4 span,.user-info .last p span,.btn-default:focus,
    .product-tabs .nav.nav-tabs li.active a,.thumbnails .bx-controls-direction a:hover,.title-type-2,p.copyright,#footer-5 a,.product-tabs .nav.nav-tabs li:hover a, .left-menu div.active:hover , .left-menu div.active{
        color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .moving-hover-line .hover-line,.nav-tabs > li > a:hover, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus,.accordion-header:hover.active,
    .pagination > li.active > span, .pagination > li > span:hover, .pagination > li.active > span:hover ,
    .sub-nav-group li a:hover,.mobile-menu-button,.mobile-menu-toggler:active span,.mobile-menu-body ul li a:active,.mobile-menu-body ul li.open > a,
    .mobile-menu-search .btn:active,.rslides-container .rslides_nav:hover,.rslide-button-1,.pl-item figure .pl-badge-sale,.pl-button:hover ,.pagination > li > a:hover, .pagination > li > a:focus,
    .pagination > li > span:hover,.pagination > li > span:focus ,.pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus,.pagination > .active > span,.pagination > .active > span:hover,
    .pagination > .active > span:focus,#accordion-order .accordion-header:hover, #accordion-order .accordion-header:not(.collapsed),h6.gold-header,.sidebar .sidebar-accordion .panel .accordion-header:hover,
    #product_comparison .product-image-block .pl-badge-sale,.btn-default:hover,.btn-prim-col:hover,
    .modal-close:hover, .plv-buttons .pl-wishlist:hover,.btn-sec-col,.btn-third-col:hover,.dd-close-btn:hover,.close-btn:hover .icon_close,.s-bag-1 ,
    .product-tags-box .tags a:hover,input.stl[type=radio]:not(old):checked + label > span > span,.q-w-bg,.nav-item > a:focus, .nav-item > a:hover, .nav-item > a.open{
        background-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .rslide-button-1 {
        -webkit-box-shadow: 0px 0px 0px 3px {$settings.brand_primary|escape:'htmlall':'UTF-8'};
        -moz-box-shadow: 0px 0px 0px 3px {$settings.brand_primary|escape:'htmlall':'UTF-8'};
        box-shadow: 0px 0px 0px 3px {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    blockquote {
        border-left : {$settings.brand_primary|escape:'htmlall':'UTF-8'}
    }
	
	#top-bar ul > li:hover > a{
    border-bottom-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .nav-item > a:focus:after, .nav-item > a.open:after,.pl-item figure .pl-badge-sale:after, .news-item .ni-title-line,#product_comparison .product-image-block .pl-badge-sale:after {
        border-top-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .btn-prim-col,.btn-prim-col:hover, .plv-buttons .pl-wishlist:hover,.btn-sec-col,.form-control:focus,.btn-third-col:hover,input[type=text]:focus, input[type=search]:focus, textarea:focus,
    .nav-tabs > li > a:hover, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus ,.accordion-header:hover,.accordion-header:hover:after ,.accordion-header.expand-icon-2:hover:after ,
    .pagination > li.active > span, .pagination > li > span:hover, .pagination > li.active > span:hover,.close-btn:hover .icon_close,.customSelect.customSelectFocus,.pl-item figure .pl-badge-sale,.plv-buttons .pl-wishlist,
    .pagination > li > a:hover, .pagination > li > a:focus,.pagination > li > span:hover,.pagination > li > span:focus,.pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus,
    #accordion-order .accordion-header:hover:after, #accordion-order .accordion-header:not(.collapsed):after ,#accordion-order .accordion-header:not(.collapsed),
    .pagination > .active > span,.pagination > .active > span:hover,.pagination > .active > span:focus,
    #product_comparison .product-image-block .pl-badge-sale, #accordion-order .accordion-header:hover {
        border-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'}
    }
    .ui-widget-header{
        background: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .text-primary{
        color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .pagination > li > a:hover, .pagination > li > a:focus,.pagination > li > span:hover,.pagination > li > span:focus,.bg-primary
    .pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus,.pagination > .active > span,.pagination > .active > span:hover,.pagination > .active > span:focus{
        background-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    .pagination > li > a:hover, .pagination > li > a:focus,.pagination > li > span:hover,.pagination > li > span:focus ,.pagination > .active > a, .pagination > .active > a:hover,
    .pagination > .active > a:focus,.pagination > .active > span,.pagination > .active > span:hover,.pagination > .active > span:focus{
        border-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    #megamenu .product-details .price:not(.old-price),#navbar-megamenu > ul > li > a{
        color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    #megamenu .navbar-default .navbar-nav > .open > a, #megamenu .navbar-default .navbar-nav > .open > a:hover, #megamenu .navbar-default .navbar-nav > .open > a:focus,#navbar-megamenu > ul > li .dropdown-menu > li > a:hover,
    #megamenu #navbar-megamenu > .nav > li > .dropdown-menu .section .links a:hover,#megamenu .navbar-header{
        background-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

    #megamenu #navbar-megamenu > .nav > li.open > a:after{
        border-top-color: {$settings.brand_primary|escape:'htmlall':'UTF-8'};
    }

{/if}

{*$primary-link-hover-color: #dccc90;*}
{if $settings.primary_link_hover_color}

    .btn-sec-col,.tweet_list .text-indent a, .accordion-group.panel:first-child .accordion-header, #accordion-order .accordion-header:hover,.sub-nav-group li a:hover{
        color:{$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }

    .left-menu div.active:after,.checkout-menu .btn.btn-third-col:hover:after, .checkout-menu .btn.btn-third-col:hover:before {
        border-left : {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }

    .product-top-line .back-catalog.btn-third-col:hover:after, .product-top-line .back-catalog.btn-third-col:hover:before, .my-account-top-line .back-catalog.btn-third-col:hover:after, .my-account-top-line .back-catalog.btn-third-col:hover:before{
        border-right: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }
	#top-bar ul > li > a {
        border-bottom: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }

    .carousel-indicators li ,.pagination > li > a, .pagination > li > span,.pagination > li.active > a, .pagination > li > a:hover, .pagination > li.active > a:hover
    .pagination > li.active > span, .pagination > li > span:hover, .pagination > li.active > span:hover,.wg-specials .btn-grey:hover,.sidebar .sidebar-tags .btn:hover,.qview .thumbnails .bx-controls-direction a:hover,.qview .thumbnails ul li a.zoomThumbActive,
	ul#thumblist li a.zoomThumbActive,.zoom-content-2 .thumbnails ul li a.zoomThumbActive{
        border-color: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }

    .carousel-indicators li.active,.pagination > li.active > a, .pagination > li > a:hover, .pagination > li.active > a:hover
    .pagination > li.active > span, .pagination > li > span:hover, .pagination > li.active > span:hover,.wg-specials .btn-grey:hover,.left-menu div.active,.blog .left-info .icon,
	.custom-audio-player .mejs-button.mejs-playpause-button.mejs-play:hover, .custom-audio-player .mejs-button.mejs-playpause-button.mejs-pause:hover,.qview .thumbnails .bx-controls-direction a:hover{
        background: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }

    a:hover,.plv-item .plv-body .plv-title a:hover ,.comment .count ,.by a,.wg-filterslist a:hover, .wg-filterslist label:hover,.wg-size-tabs li.active a,.wg-size-tabs li a:hover,.wg-specials .wgsp-title a:hover,
	.wg-viwed-products .wgvp-item-title a:hover,.wg-viwed-products .wgvp-item-price,.login-register .login a,.page-404 p a ,.page-404 p a:hover,.pg-body .contact .email a,.pg-body .contact .skype a,.user-info .picture .change-picture a,
	.left-menu div:hover,#order-detail-content .info.total span + span, .table-container .info.total span + span,#order-detail-content .product-name a:hover, .table-container .product-name a:hover,
	.you-order #order-detail-content .table tbody > tr > td.cart_description .qty span,.info.total span + span,.left-arrow-btn:before,.sidebar-categories ul li:hover:after,blockquote.blog-quote span,
	.wg-tweets .tweets-group li .reply:hover,.services-item a:hover,.btn-third-col:hover, #blcok_compare_azl .btn-third-col:hover, #blcok_wishlist_azl  .btn-third-col:hover{
        color: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
    }
	
    .cat-view-options .cvo-view-type a:hover svg, .cat-view-options .cvo-view-type li.active a svg {
      fill: {$settings.primary_link_hover_color|escape:'htmlall':'UTF-8'};
	}
{/if}

{*$primary-background-color: #060606;*}
{if $settings.primary_background_color}
    .zoom-content #product-video-button:hover, .zoom-content #product-pupGallery-button:hover,.product-tabs .nav.nav-tabs li.active a,.btn-sec-col:hover ,.btn-third-col,.top-menu, .product-tags-box .tags a,.btn-default:active
	{
        background-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    #footer-1,.loading,.product-tabs .nav.nav-tabs li.active a:after,.dropdown-menu {
        border-top-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    .btn-sec-col:hover,.btn-third-col,.btn-sec-col:hover,.btn-third-col {
        border-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    #top-bar {
        border-bottom: 2px solid {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    .loading,.product-top-line .back-catalog.btn-third-col:after, .product-top-line .back-catalog.btn-third-col:before, .my-account-top-line
    .back-catalog.btn-third-col:after, .my-account-top-line .back-catalog.btn-third-col:before {
        border-right: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    .checkout-menu .btn.btn-third-col:after, .checkout-menu .btn.btn-third-col:before {
        border-left: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    .ui-state-default,.ui-widget-content .ui-state-default,.ui-widget-header .ui-state-default{
        background: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    #megamenu #navbar-megamenu{
        background-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }

    {*.dropdown-menu {
    border-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .btn-sec-col:hover {
    background: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    border-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .btn-third-col {
    background: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    border-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    #top-bar {
    border-bottom-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .dropdown-triangle-up {
    border-color: transparent transparent {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    #footer-1 {
    border-top-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .top-menu {
    background: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .loading {
    border-right-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    border-top-color:  {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .checkout-menu .btn.btn-third-col:after, .checkout-menu .btn.btn-third-col:before {
    border-left-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .product-top-line .back-catalog.btn-third-col:after, .product-top-line .back-catalog.btn-third-col:before, .my-account-top-line .back-catalog.btn-third-col:after, .my-account-top-line .back-catalog.btn-third-col:before {
    border-right-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .product-tabs .nav.nav-tabs li.active a, .product-tabs .nav.nav-tabs li:hover a {
    background-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .product-tabs .nav.nav-tabs li.active a:after {
    border-top-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }
    .zoom-content #product-video-button:hover, .zoom-content #product-pupGallery-button:hover {
    background-color: {$settings.primary_background_color|escape:'htmlall':'UTF-8'};
    }*}
{/if}

{*$primary-text-color: #212224;*}
{if $settings.primary_text_color}
    h1, h2, h3, h4, h5,.modal-header h4,.arrow-btn,.arrow-btn:after,.btn-yet-col,.pagination > li > a, .pagination > li > span,.dropdown-head h4,a.close-btn,.dd-product-desc .title,.title-type-1,
    .vertical-bx-1 figcaption,.get-in-touch-box input, .get-in-touch-box textarea,.mobile-collapse-header:after,.pl-name,.plv-item .plv-body .plv-title ,.plv-item .plv-body .plv-title a ,
    .plv-item .plv-body .plv-availability,.comment .name,.wg-specials .wgsp-title,.wg-specials .wgsp-title a,.wg-specials .btn-grey,.wg-viwed-products .wgvp-item-title,
    .wg-viwed-products .wgvp-item-title a,.best-product,.pg-body .contact .person .name,.user-info .last p span.price,.left-menu,left-menu div.active:hover,
    #order-detail-content .table tbody > tr > td.cart_quantity .cart_quantity_button a:hover, .table-container .table tbody > tr > td.cart_quantity .cart_quantity_button a:hover,
    #order-detail-content .cart_quantity .cart_quantity_input, .table-container .cart_quantity .cart_quantity_input,#order-detail-content .table tbody > tr > td.cart_delete .remove:hover, .table-container .table tbody > tr > td.cart_delete .remove:hover,
    #order-detail-content .info.total span, .table-container .info.total span,#order-detail-content .table > thead > tr > th, .table-container .table > thead > tr > th,
    #order-detail-content .product-name, .table-container .product-name,#order-detail-content .product-name a, .table-container .product-name a,label.type-text,
    #order-detail-content span.count,.contact-info p span,.compare-div .compare-table tr td.row-title,.compare-div .compare-table tr.compare-brand td p,
    .sidebar .sidebar-popular-posts .vertical-bx-1 figcaption p,.sidebar .sidebar-comments .vertical-bx-1 figure figcaption .post-info,#accordion-order .accordion-header:not(.collapsed),
    .product-top-line .back-catalog:not(.btn-third-col), .my-account-top-line .back-catalog:not(.btn-third-col),.availability,.data-info,.tech-info,.product-count input.form-control:disabled,
    .product-count .btn:hover,.h7,.cat-view-options .cvo-label,p.payment_module a,.btn-prim-col{
        color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    {*.arrow-btn {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .arrow-btn:after {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .btn-yet-col {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .pagination > li > a, .pagination > li > span {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .dropdown-head h4 {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    a.close-btn {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .dd-product-desc .title {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .title-type-1 {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .vertical-bx-1 figcaption {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .get-in-touch-box input, .get-in-touch-box textarea {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    @media (max-width: 991px) {
    .mobile-collapse-header:after {

    }
    }
    .pl-name {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .plv-item .plv-body .plv-title {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .plv-item .plv-body .plv-title a {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .plv-item .plv-body .plv-availability {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .comment .name {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .wg-specials .wgsp-title {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .wg-specials .wgsp-title a {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .wg-specials .btn-grey {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .wg-viwed-products .wgvp-item-title {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .wg-viwed-products .wgvp-item-title a {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .best-product {
    border-top-color: #212224;
    }
    .pg-body .contact .person .name {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .user-info .last p span.price {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .left-menu div {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .left-menu div.active:hover {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .table tbody > tr > td.cart_quantity .cart_quantity_button a:hover, .table-container .table tbody > tr > td.cart_quantity .cart_quantity_button a:hover {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .cart_quantity .cart_quantity_input, .table-container .cart_quantity .cart_quantity_input {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .table tbody > tr > td.cart_delete .remove:hover, .table-container .table tbody > tr > td.cart_delete .remove:hover {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .info.total span, .table-container .info.total span {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .table > thead > tr > th, .table-container .table > thead > tr > th {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .product-name, .table-container .product-name {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content .product-name a, .table-container .product-name a {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    label.type-text {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    #order-detail-content span.count {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .contact-info p {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .compare-div .compare-table tr td.row-title {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .compare-div .compare-table tr.compare-brand td p {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .sidebar .sidebar-popular-posts .vertical-bx-1 figcaption p {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .sidebar .sidebar-comments .vertical-bx-1 figure figcaption .post-info {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .product-top-line .back-catalog:not(.btn-third-col), .my-account-top-line .back-catalog:not(.btn-third-col) {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .availability {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .data-info {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .tech-info {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .product-count input.form-control:disabled {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .product-count .btn:hover {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    .cat-view-options .cvo-label {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }
    p.payment_module a {
    color: {$settings.primary_text_color|escape:'htmlall':'UTF-8'};
    }*}
{/if}

{*$body-text-color: #9198a1;*}
{if $settings.body_text_color}
    #footer-3 li a:hover,.list-checked li,.list-arrow-right li,.list-plus li,.list-circle li,.list-arrow_right_alt li,.list-carrot-right li ,.list-carrot-right_alt2 li ,
    .list-star li,.comment .comment-text,#order-detail-content #cart_summary tbody td.cart_description small span, .table-container #cart_summary tbody td.cart_description small span,
    .you-order .table-bordered .info .gray,.info .gray,.contact-info h6 span ,.sidebar .sidebar-comments .vertical-bx-1 figure figcaption p,.sidebar .sidebar-tags .btn,.btn-prim-col:hover,
    .availability span,.data-info span,body,h6{
        color: {$settings.body_text_color|escape:'htmlall':'UTF-8'};
    }
{/if}

{*$primary-link-color: #737888;*}
{if $settings.primary_link_color}
	a,.by,.login-register .whith-f-t p,.login-register .login a:hover,.page-404 p a:hover,.pg-body .contact .email a:hover,.pg-body .contact .skype a:hover,.user-info .picture .change-picture a:hover
{
       color: {$settings.primary_link_color|escape:'htmlall':'UTF-8'};
}
{/if}

{*$primary-border-color: #d7d9db;*}
{if $settings.primary_border_color}
    .dropdown-head ,.modal-header,.dd-product-group,.products > dt ,.comment,.login-register h6,.pg-body .contact h6,.user-info .wellcome ,.left-menu div:not(:last-child),.left-menu div:not(:last-child),
    h6.account-table-head,#accordion-order .form-group.radio,.info,.sidebar-categories ul li ,.blog .left-info .date,.article-info .for-border-bottom,.ph_cat_description ,.product-top-line, .my-account-top-line,.product-info .hr {
        border-bottom: {$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }

    .dummyfile .btn ,.form-control,input[type="password"], input[type="search"], input[type="text"],.close-btn .icon_close,#dd-social-login,.s-bag-2,.top-box-btn-1,
    input.stl[type=checkbox]:not(old) + label > span, input.stl[type=radio]:not(old) + label > span,.pl-item figure .pl-badge-new ,.pl-ctl-left, .pl-ctl-right,.login-register .whith-f-t,
    .user-info,.user-info > thead > tr > td, .user-info > thead > tr th, .user-info > tbody > tr > td, .user-info > tbody > tr th,#order-detail-content .table tbody > tr > td.cart_quantity .cart_quantity_button a, .table-container .table tbody > tr > td.cart_quantity .cart_quantity_button a,
    #order-detail-content .info, .table-container .info,.you-order .mobile-collapse-header ,.you-order .mobile-collapse-body .dd-list-empty ,.calc-shipping,.article-info .social-buttons li a:not(:hover),blockquote.blog-quote
    .blog .comment.bordered ,.previous-product, .next-product ,.big-image,.qview .thumbnails ul li a,.thumbnails .bx-controls-direction a,.zoom-content-2 .thumbnails ul li a,#product_comparison .product-image-block .pl-badge-new,
    #product_comparison #social-buttons a, #product_comparison .social-buttons a {
        border-color:{$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }

    .dd-product-box ,.you-order #order-detail-content .table tbody > tr > td.cart_product ,.you-order .table-bordered #cart_summary,.you-order .table-bordered .info,.info,.compare-div .compare-table tr td,
    #order-detail-content #cart_summary.compare-table td:not(:last-child),.product-tabs .tab-content .tab-pane#tab-review .you-rating .stars-rating {
        border-right:{$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }

    .dd-delimiter,.pl-item figure .pl-badge-new:after, .pl-item figure .pl-badge-new:before ,.pl-item figure .pl-badge-sale:after, .pl-item figure .pl-badge-sale:before,#accordion-order .form-group.radio:first-child ,
    .article-info .for-border-top,.blog-nav,.product-top-line, .my-account-top-line,#product_comparison .product-image-block .pl-badge-new:after, #product_comparison .product-image-block .pl-badge-new:before,
    #product_comparison .product-image-block .pl-badge-sale:after, #product_comparison .product-image-block .pl-badge-sale:before {
        border-top:{$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }

    .you-order .table-bordered #cart_summary ,.you-order .table-bordered .info,.info {
        border-left:{$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }

    .field-icon,.top-search-box button, .page-404 .search button,.top-search-box .icon_search {
        color:{$settings.primary_border_color|escape:'htmlall':'UTF-8'};
    }
{/if}

{*$secondary-border-color: #ebebeb;*}
{if $settings.secondary_border_color}
    .compare-div .compare-table tr td.row-title,.wg-viwed-products.box-with-pager.store-alt .wgvp-item figure {
        background-color:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .plv-item,.wg-active-fiters,.wg-specials .wgsp-item figure,.wg-viwed-products .wgvp-item figure,#order-detail-content .table.table-bordered, .table-container .table.table-bordered,
    #order-detail-content .table > thead > tr > th, .table-container .table > thead > tr > th {
        border:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .plv-item .plv-image figure {
        border-right:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .plv-item .plv-body,.plv-item .plv-body .plv-add-review:before {
        border-left:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .plv-item .plv-body .plv-header ,.plv-item .plv-body .plv-price-block {
        border-bottom:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .popover-title{
        border-bottom:{$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .btn-default.active ,.open .btn-default.dropdown-toggle{
        background-color: {$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

    .bootstrap .filter_panel{
        background-color: {$settings.secondary_border_color|escape:'htmlall':'UTF-8'};
    }

{/if}

{*$top-navigation-link-and-text-color: #737880;*}
{if $settings.top_navigation_link_and_text_color}
    #top-bar,#top-bar > a,#dd-social-login span,.plv-buttons .pl-wishlist,.wg-filterslist .wgfl-list,.wg-filterslist a, .wg-filterslist label{
        color: {$settings.top_navigation_link_and_text_color|escape:'htmlall':'UTF-8'};
    }
{/if}

{*$footer1-top-part-background-color: #f5f5f5;*}
{if $settings.footer1_top_part_background_color}
    .dropdown-top-menu-list li a:hover,.left-menu div,.dropdown-head ,.modal-header{
        background-color: {$settings.footer1_top_part_background_color|escape:'htmlall':'UTF-8'};
    }

    pre,.table-hover > tbody > tr:hover > td,.table-hover > tbody > tr:hover > th ,.table > thead > tr > td.active,.table > thead > tr > th.active, .table > thead > tr.active > td, .table > thead > tr.active > th,
    .table > tbody > tr > td.active,.table > tbody > tr > th.active,.table > tbody > tr.active > td,.table > tbody > tr.active > th,.table > tfoot > tr > td.active,.table > tfoot > tr > th.active,
    .table > tfoot > tr.active > td,.table > tfoot > tr.active > th ,.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus,.breadcrumb,.progress,a.list-group-item:hover, a.list-group-item:focus,
    .panel-footer ,.panel-default > .panel-heading ,.panel-default > .panel-heading .badge,.well {
        background-color: {$settings.footer1_top_part_background_color|escape:'htmlall':'UTF-8'};
    }

    body {
        scrollbar-track-color: {$settings.footer1_top_part_background_color|escape:'htmlall':'UTF-8'};
    }
{/if}

{*$footer2-bottom-part-background-color: #111111;*}
{if $settings.footer2_bottom_part_background_color}
    #footer-3, #footer-4, #footer-5 {
        background: {$settings.footer2_bottom_part_background_color|escape:'htmlall':'UTF-8'};
    }
{/if}


{assign var='productListButtonCount' value=1}
{if $settings.product_list_show_quick_view_button && $settings.quick_view_popup}
    {$productListButtonCount = $productListButtonCount + 1}
{/if}
{if $settings.product_list_show_compare_button}
    {$productListButtonCount = $productListButtonCount + 1}
{/if}
{if $settings.product_list_show_wishlist_button}
    {$productListButtonCount = $productListButtonCount + 1}
{/if}

body{
    {if $settings.main_background_image}
        background-image: url('{$settings.main_background_image|escape:'htmlall':'UTF-8'}');
        background-repeat: repeat;
    {/if}
    {if $settings.page_width == 'full'}
        background-color: {if $settings.main_background_color} {$settings.main_background_color|escape:'htmlall':'UTF-8'} {else} #FFFFFF {/if};
    {else}
        background-color: {if $settings.main_background_color} {$settings.main_background_color|escape:'htmlall':'UTF-8'} {else} #EEEEEE {/if};
    {/if}
    {*{if $settings.text_color}
        color: {$settings.text_color|escape:'htmlall':'UTF-8'};
    {/if}*}
    {*{if $settings.body_font_size}
        font-size: {$settings.body_font_size}px;
    {/if}*}
}
{*{if $settings.mainmenu_font_size}
    #megamenu #navbar-megamenu > .nav > li > a{
        font-size: {$settings.mainmenu_font_size}px;
    }
{/if}*}
{*{if $settings.link_color}
    a{
        color: {$settings.link_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.link_hover_color}
    a:hover{
        color: {$settings.link_hover_color|escape:'htmlall':'UTF-8'};
    }
{/if}*}
{if $settings.header_layout == 0}
    .top-search-box{
        padding-left: 15px;
        padding-right: 15px;
    }
{/if}

input[type="password"].form-control, input[type="search"].form-control, input[type="text"].form-control, input[type="tel"].form-control, textarea.form-control{
    {if $settings.input_text_color}
        color: {$settings.input_text_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.input_background_color}
        background: {$settings.input_background_color|escape:'htmlall':'UTF-8'};
    {/if}
}
select.form-control{
    {if $settings.select_radio_color}
        background: {$settings.select_radio_color|escape:'htmlall':'UTF-8'};
    {/if}
}
.customSelect{
    {if $settings.select_radio_color}
        background: {$settings.select_radio_color|escape:'htmlall':'UTF-8'};
    {/if}
}

.pl-item .pl-button{
    width: {100 / $productListButtonCount|escape:'htmlall':'UTF-8'}%;
}



{*{if $settings.headings_color}
    h1, h2, h3, h4, h5, h6, .h7, .modal-header h4, .title-type-1, .title-type-2 {
        color: {$settings.headings_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.headings_block_title_color}
    h1, h2, h3, h4, h5, h6, .h7, .modal-header h4, .title-type-1, .title-type-2 {
        background-color: {$settings.headings_block_title_color|escape:'htmlall':'UTF-8'};
    }
{/if}*}
.alert-info{
    {if $settings.alert_info_background_color}
        background-color: {$settings.alert_info_background_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.alert_info_text_color}
        color: {$settings.alert_info_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.alert_info_icon}
    .alert-info:before{
        content: "{$settings.alert_info_icon|escape:'htmlall':'UTF-8'}";
    }
{/if}
.alert-success{
    {if $settings.alert_success_background_color}
        background-color: {$settings.alert_success_background_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.alert_success_text_color}
        color: {$settings.alert_success_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.alert_success_icon}
    .alert-success:before{
        content: "{$settings.alert_success_icon|escape:'htmlall':'UTF-8'}";
    }
{/if}
.alert-danger{
    {if $settings.alert_danger_background_color}
        background-color: {$settings.alert_danger_background_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.alert_danger_text_color}
        color: {$settings.alert_danger_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.alert_danger_icon}
    .alert-danger:before{
        content: "{$settings.alert_danger_icon|escape:'htmlall':'UTF-8'}";
    }
{/if}
.alert-warning{
    {if $settings.alert_warning_background_color}
        background-color: {$settings.alert_warning_background_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.alert_warning_text_color}
        color: {$settings.alert_warning_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.alert_warning_icon}
    .alert-warning:before{
        content: "{$settings.alert_warning_icon|escape:'htmlall':'UTF-8'}";
    }
{/if}

{*#order-detail-content .table > thead > tr > th, .table-container .table > thead > tr > th{
    {if $settings.table_heading_background_color}
        background-color: {$settings.table_heading_background_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.table_heading_text_color}
        color: {$settings.table_heading_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}*}
{if $settings.product_page_show_review == 0}
    .product-reviews .stars-rating, .product-reviews > a{
        display: none !important;
    }
{/if}
{if $settings.product_list_show_review == 0}
    .plv-price-block .stars-rating, .pl-caption .stars-rating{
        display: none !important;
    }
{/if}
{if $settings.label_letter_uppercase}
    .pl-item figure .pl-badge-new, .pl-item figure .pl-badge-sale, .pl-item figure .pl-badge-sale{
        text-transform: uppercase;
    }
{/if}
.pl-item figure .pl-badge-new{
    {if $settings.label_new_product_background}
        background-color: {$settings.label_new_product_background|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.label_new_product_color}
        color: {$settings.label_new_product_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.label_new_product_border_color}
        border-color: {$settings.label_new_product_border_color|escape:'htmlall':'UTF-8'};
    {/if}
}
.pl-item figure .pl-badge-new::before{
    {if $settings.label_new_product_border_color}
        border-color: {$settings.label_new_product_border_color|escape:'htmlall':'UTF-8'} transparent transparent;
    {/if}
}
.pl-item figure .pl-badge-new::after{
    {if $settings.label_new_product_background}
        border-color: {$settings.label_new_product_background|escape:'htmlall':'UTF-8'} transparent transparent;;
    {/if}
}

.pl-item figure .pl-badge-sale{
    {if $settings.label_sale_product_background}
        background-color: {$settings.label_sale_product_background|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.label_sale_product_color}
        color: {$settings.label_sale_product_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.label_sale_product_border_color}
        border-color: {$settings.label_sale_product_border_color|escape:'htmlall':'UTF-8'};
    {/if}
}
.pl-item figure .pl-badge-sale::before{
    {if $settings.label_sale_product_border_color}
        border-color: {$settings.label_sale_product_border_color|escape:'htmlall':'UTF-8'} transparent transparent;
    {/if}
}
.pl-item figure .pl-badge-sale::after{
    {if $settings.label_sale_product_background}
        border-color: {$settings.label_sale_product_background|escape:'htmlall':'UTF-8'} transparent transparent;
        bottom: -17px;
        left: 14px;
    {/if}
}
{if $settings.checkout_accordion == 0}
    .accordion-header::after{
        content: none;
    }
{/if}
{if $settings.label_instock_product_color}
    .availability .in-stock-lbl, .plv-item .plv-body .plv-availability .in-stock-lbl{
        color: {$settings.label_instock_product_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.label_instock_product_background}
    .dot-green, .availability span span.in-stock{
        background-color: {$settings.label_instock_product_background|escape:'htmlall':'UTF-8'};
    }
{/if}

{if $settings.label_outofstock_product_color}
    .availability .out-stock-lbl, .plv-item .plv-body .plv-availability .out-stock-lbl{
        color: {$settings.label_outofstock_product_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.label_outofstock_product_background}
    .dot-grey, .availability span span.out-stock{
        background-color: {$settings.label_outofstock_product_background|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.product_price_color}
    .product-info .price, .plv-item .plv-body .plv-price, .pl-price-block .pl-price{
        color: {$settings.product_price_color|escape:'htmlall':'UTF-8'};
    }
{/if}

#footer-1{
    {if $settings.footer_first_background}
        background-color: {$settings.footer_first_background|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_first_border_color}
        border-color: {$settings.footer_first_border_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_first_text_color}
        color: {$settings.footer_first_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
#footer-1 .title-type-1, .title-type-2 {
    {if $settings.footer_first_block_title_color}
        color: {$settings.footer_first_block_title_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_first_block_title_background}
        background-color: {$settings.footer_first_block_title_background|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.footer_first_link_color}
    #footer-1 a{
        color: {$settings.footer_first_link_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.footer_first_link_hover_color}
    #footer-1 a:hover{
        color: {$settings.footer_first_link_hover_color|escape:'htmlall':'UTF-8'};
    }
{/if}
#footer-1 .form-control{
    {if $settings.footer_first_input_text_color}
        color: {$settings.footer_first_input_text_color|escape:'htmlall':'UTF-8'} !important;
    {/if}
    {if $settings.footer_first_input_background}
        background-color: {$settings.footer_first_input_background|escape:'htmlall':'UTF-8'};
    {/if}
}


#footer-2{
    {if $settings.footer_second_background}
        background-color: {$settings.footer_second_background|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_second_border_color}
        border-color: {$settings.footer_second_border_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_second_text_color}
        color: {$settings.footer_second_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
#footer-2 .title-type-1, .title-type-2 {
    {if $settings.footer_second_block_title_color}
        color: {$settings.footer_second_block_title_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_second_block_title_background}
        background-color: {$settings.footer_second_block_title_background|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.footer_second_link_color}
    #footer-2 a{
        color: {$settings.footer_second_link_color|escape:'htmlall':'UTF-8'};
    }
{/if}
{if $settings.footer_second_link_hover_color}
    #footer-2 a:hover{
        color: {$settings.footer_second_link_hover_color|escape:'htmlall':'UTF-8'};
    }
{/if}
#footer-2 .form-control{
    {if $settings.footer_second_input_text_color}
        color: {$settings.footer_second_input_text_color|escape:'htmlall':'UTF-8'} !important;
    {/if}
    {if $settings.footer_second_input_background}
        background-color: {$settings.footer_second_input_background|escape:'htmlall':'UTF-8'};
    {/if}
}

#social-buttons li a, .social-buttons li a{
    {if $settings.footer_social_icons_shape == 'round'}
        border-radius: 50%;
    {/if}
    {if $settings.footer_social_icon_color}
        color: {$settings.footer_social_icon_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_social_icon_background}
        background-color: {$settings.footer_social_icon_background|escape:'htmlall':'UTF-8'};
    {/if}
}

#footer-3 .title-type-1, #footer-3 .title-type-2{
    {if $settings.footer_block_title_color}
        color: {$settings.footer_block_title_color|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_block_title_background}
        background-color: {$settings.footer_block_title_background|escape:'htmlall':'UTF-8'};
    {/if}
}

#footer-3, #footer-4, #footer-5{
    {if $settings.footer_main_background}
        background-color: {$settings.footer_main_background|escape:'htmlall':'UTF-8'};
    {/if}
    {if $settings.footer_main_text_color}
        color: {$settings.footer_main_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}
#footer-3 a, #footer-4 a, #footer-5 a, #footer-3 li a{
    {if $settings.footer_main_link_color}
        color: {$settings.footer_main_link_color|escape:'htmlall':'UTF-8'};
    {/if}
}
#footer-3 a:hover, #footer-4 a:hover, #footer-5 a:hover, #footer-3 li a:hover{
    {if $settings.footer_main_link_hover_color}
        color: {$settings.footer_main_link_hover_color|escape:'htmlall':'UTF-8'};
    {/if}
}
{if $settings.footer_main_border_color}
    #footer-3, #footer-4, #footer-5{
        border-color: {$settings.footer_main_border_color|escape:'htmlall':'UTF-8'};
    }
{/if}

#footer-3 .form-control, #footer-4 .form-control, #footer-5 .form-control{
    {if $settings.footer_main_input_text_color}
        color: {$settings.footer_main_input_text_color|escape:'htmlall':'UTF-8'} !important;
    {/if}
    {if $settings.footer_main_input_text_color}
        background-color: {$settings.footer_main_input_text_color|escape:'htmlall':'UTF-8'};
    {/if}
}


#footer-3 .title-type-1, #footer-4 .title-type-1, #footer-5 .title-type-1, #footer-3 .title-type-2, #footer-4 .title-type-2, #footer-5 .title-type-2{
    {if $settings.footer_main_block_title_color}
        color: {$settings.footer_main_block_title_color|escape:'htmlall':'UTF-8'};
    {/if} 
    {if $settings.footer_main_block_title_background}
        background-color: {$settings.footer_main_block_title_background|escape:'htmlall':'UTF-8'};
    {/if}
}
