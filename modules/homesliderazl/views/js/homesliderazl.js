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

$(document).ready(function(){

	if (typeof(homesliderazl_speed) == 'undefined')
		homesliderazl_speed = 500;
	if (typeof(homesliderazl_pause) == 'undefined')
		homesliderazl_pause = 3000;
	if (typeof(homesliderazl_loop) == 'undefined')
		homesliderazl_loop = true;
    if (typeof(homesliderazl_width) == 'undefined')
        homesliderazl_width = 779;


	if (!!$.prototype.bxSlider)
		$('#homesliderazl').bxSlider({
			useCSS: false,
			maxSlides: 1,
			slideWidth: homesliderazl_width,
			infiniteLoop: homesliderazl_loop,
			hideControlOnEnd: true,
			pager: false,
			autoHover: true,
			auto: homesliderazl_loop,
			speed: parseInt(homesliderazl_speed),
			pause: homesliderazl_pause,
			controls: true
		});

    $('.homesliderazl-description').click(function () {
        window.location.href = $(this).prev('a').prop('href');
    });

	if ($('#htmlcontent_top').length > 0)
		$('#homepage-slider').addClass('col-xs-8');
	else
		$('#homepage-slider').addClass('col-xs-12');
});