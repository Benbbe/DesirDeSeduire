<?php
/**
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2015 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class ThemeEditorAzl extends Module
{
    private $html = '';
    private $settings;
    private $defaults;

    public function __construct()
    {
        $this->name = 'themeeditorazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'azelab';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Theme Editor module');
        $this->description = $this->l('Allows to change theme design');

        $this->configName = 'themeeditorazl';

        $this->initSettings();
    }

    /**
     * Module settings items configuration
     */
    protected function initSettings()
    {
        /*$systemFonts = array(
            array(
                'id_option' => 0,
                'name' => 'Arial'
            ),
            array(
                'id_option' => 1,
                'name' => 'Georgia'
            ),
            array(
                'id_option' => 2,
                'name' => 'Tahoma'
            ),
            array(
                'id_option' => 3,
                'name' => 'Times New Roman'
            ),
            array(
                'id_option' => 4,
                'name' => 'Verdana'
            )
        );*/

        // ============================================================================
        //    General Settings
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'main_tab',
                'legend' => array(
                    'title' => $this->l('General Settings'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(
                    /*array(
                        'type'    => 'switch',
                        'label'   => $this->l('Authorization via social networks'),
                        'name'    => 'social_authorization',
                        'is_bool' => true,
                        'values'  => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),*/
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Page preloader'),
                        'name' => 'page_preloader',
                        'desc' => $this->l('Show preloader until page is fully loaded'),
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),
                )
            )
        );

        // ============================================================================
        //    Loyout options
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'layout_tab',
                'legend' => array(
                    'title' => $this->l('Layout options'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(
                    array(
                        'type' => 'radio_image',
                        'label' => $this->l('Responsive Mode'),
                        'name' => 'responsive_mode',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'value' => 1,
                                'label' => '',
                                'url' => $this->_path.'views/img/responsive-on.png'
                            ),
                            array(
                                'value' => 0,
                                'label' => '',
                                'url' => $this->_path.'views/img/responsive-off.png'
                            ),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'radio_image',
                        'label' => $this->l('Page width'),
                        'name' => 'page_width',
                        'desc' => $this->l('Boxed or full width'),
                        'values' => array(
                            array(
                                'value' => 'full',
                                'label' => '',
                                'url' => $this->_path.'views/img/boxed-off.png'
                            ),
                            array(
                                'value' => 'boxed',
                                'label' => '',
                                'url' => $this->_path.'views/img/boxed-on.png'
                            ),
                        ),
                        'default' => 'boxed',
                    ),
                    array(
                        'type' => 'radio_image',
                        'label' => $this->l('Page layout'),
                        'name' => 'page_layout',
                        'desc' => $this->l('If column exists on the page'),
                        'values' => array(
                            array(
                                'value' => 'left',
                                'label' => '',
                                'url' => $this->_path.'views/img/layout-left.png'
                            ),
                            array(
                                'value' => 'right',
                                'label' => '',
                                'url' => $this->_path.'views/img/layout-right.png'
                            ),
                            array(
                                'value' => 'none',
                                'label' => '',
                                'url' => $this->_path.'views/img/layout-none.png'
                            ),
                        ),
                        'default' => 'none',
                    ),
                    array(
                        'type' => 'link_url',
                        'label' => $this->l('Columns configuration'),
                        'desc' => $this->l('Configure columns for each shop page'),
                        'name' => 'column_url',
                        'url' => $this->context->employee ?
                            'index.php?tab=AdminThemes&id_theme='.$this->context->shop->id_theme.'&updatetheme&token='
                            .Tools::getAdminTokenLite('AdminThemes') : '',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Ajax pop-up'),
                        'desc' => $this->l('Ajax pop up after add to cart'),
                        'name' => 'ajax_popup',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Quick view'),
                        'desc' => $this->l('Quick view pop-up'),
                        'name' => 'quick_view_popup',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Main background color'),
                        'name' => 'main_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'image',
                        'label' => $this->l('Main background image'),
                        'name' => 'main_background_image',
                    ),

                )
            )
        );

        // ============================================================================
        //    Colors & Skins
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'colors_skins_tab',
                'legend' => array(
                    'title' => $this->l('Colors & Skins'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(

                    array(
                        'type' => 'color',
                        'label' => $this->l('Brand primary color'),
                        'name' => 'brand_primary',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Primary background color'),
                        'name' => 'primary_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Primary text color'),
                        'name' => 'primary_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Body text color'),
                        'name' => 'body_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Primary link color'),
                        'name' => 'primary_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Primary link hover color'),
                        'name' => 'primary_link_hover_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Primary border color'),
                        'name' => 'primary_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Secondary border color'),
                        'name' => 'secondary_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Top navigation link and text color'),
                        'name' => 'top_navigation_link_and_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer 1 top part background color'),
                        'name' => 'footer1_top_part_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer 2 bottom part background color'),
                        'name' => 'footer2_bottom_part_background_color',
                        'size' => 30,
                    ),

                )
            )
        );

        // ============================================================================
        //    Typography
        // ============================================================================

        /*$this->addTab(array(
            'tab_name' => 'typography_tab',
            'legend'   => array(
                'title' => $this->l('Typography'),
                'icon'  => 'icon-edit'
            ),
            'input'    => array(

                array(
                    'type' => 'text',
                    'label' => $this->l('Body font size'),
                    'name' => 'body_font_size',
                    'row_title' => $this->l('Font sizes'),
                    'suffix'=> 'px',
                    'size' => 30,
                ),

                array(
                    'type' => 'text',
                    'label' => $this->l('Menu main link font size'),
                    'name' => 'mainmenu_font_size',
                    'suffix'=> 'px',
                    'size' => 30,
                ),

            )
        ));*/

        // ============================================================================
        //    Menu
        // ============================================================================

        /*$this->addTab(array(
            'tab_name' => 'menu_tab',
            'legend'   => array(
                'title' => $this->l('Menu'),
                'icon'  => 'icon-edit'
            ),
            'input'    => array(

                array(
                    'type'    => 'switch',
                    'label'   => $this->l('Link to menu module'),
                    //'desc' => $this->l('Quick view pop-up'),
                    'name'    => 'link_to_mobile_menu',
                    'is_bool' => true,
                    'values'  => array(
                        array('value' => 1),
                        array('value' => 0),
                    ),
                    'default' => 0,
                ),
                array(
                    'type'    => 'switch',
                    'label'   => $this->l('Sticky Menu'),
                    //'desc' => $this->l('Quick view pop-up'),
                    'name'    => 'sticky_menu',
                    'is_bool' => true,
                    'values'  => array(
                        array('value' => 1),
                        array('value' => 0),
                    ),
                    'default' => 0,
                ),

            )
        ));*/

        // ============================================================================
        //    Header
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'header_tab',
                'legend' => array(
                    'title' => $this->l('Header'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(

                    array(
                        'type' => 'radio_image',
                        'label' => $this->l('Header layout'),
                        'name' => 'header_layout',
                        'desc' => $this->l('Select layout of the header'),
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'value' => 0,
                                'label' => '',
                                'url' => $this->_path.'views/img/logo_center.jpg'
                            ),
                            array(
                                'value' => 1,
                                'label' => '',
                                'url' => $this->_path.'views/img/logo_left.jpg'
                            ),
                        ),
                        'default' => 0,
                    ),

                )
            )
        );

        // ============================================================================
        //    Content
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'content_tab',
                'legend' => array(
                    'title' => $this->l('Content'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(

                    /*array(
                        'type' => 'color',
                        'label' => $this->l('Background color'),
                        'name' => 'content_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type'    => 'select',
                        'label'   => $this->l('Background image type'),
                        'name'    => 'content_background_image_type',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'type1', 'name' => $this->l('Type 1')),
                                array('id_option' => 'type2', 'name' => $this->l('Type 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'type1',
                    ),*/
                    /*array(
                        'type' => 'color',
                        'label' => $this->l('Inner border color'),
                        'name' => 'inner_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Text color'),
                        'name' => 'text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link color'),
                        'name' => 'link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link hover color'),
                        'name' => 'link_hover_color',
                        'size' => 30,
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input text color'),
                        'name' => 'input_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input background color'),
                        'name' => 'input_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Select box and radio buttons color'),
                        'name' => 'select_radio_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type' => 'color',
                        'label' => $this->l('Headings color'),
                        'name' => 'headings_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Headings and block title background status'),
                        'name' => 'headings_block_title_status',
                        'size' => 50,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Headings and block titlebackground color'),
                        'name' => 'headings_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Columns block border size'),
                        'name' => 'columns_block_border_size',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Columns block border color'),
                        'name' => 'columns_block_border_color',
                        'size' => 30,
                    ),*/
                    /*array(
                        'type' => 'color',
                        'label' => $this->l('Table heading background'),
                        'name' => 'table_heading_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Table heading text color'),
                        'name' => 'table_heading_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Box background color'),
                        'name' => 'box_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Box text color'),
                        'name' => 'box_text_color',
                        'size' => 30,
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Dropdown background color'),
                        'name' => 'dropdown_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Dropdown text color'),
                        'name' => 'dropdown_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert success background color'),
                        'name' => 'alert_success_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert success text color'),
                        'name' => 'alert_success_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Alert success icon'),
                        'name' => 'alert_success_icon',
                        'size' => 50,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert info background color'),
                        'name' => 'alert_info_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert info text color'),
                        'name' => 'alert_info_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Alert info icon'),
                        'name' => 'alert_info_icon',
                        'size' => 50,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert warning background color'),
                        'name' => 'alert_warning_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert warning text color'),
                        'name' => 'alert_warning_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Alert warning icon'),
                        'name' => 'alert_warning_icon',
                        'size' => 50,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert danger background color'),
                        'name' => 'alert_danger_background_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Alert danger text color'),
                        'name' => 'alert_danger_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Alert danger icon'),
                        'name' => 'alert_danger_icon',
                        'size' => 50,
                    ),

                )
            )
        );

        // ============================================================================
        //    Pages
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'pages_tab',
                'legend' => array(
                    'title' => $this->l('Pages'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(

                    // Category page

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show category description'),
                        'row_title' => $this->l('Category page'),
                        'name' => 'category_show_description',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    /*array(
                        'type'    => 'switch',
                        'label'   => $this->l('Show subcategories thumbs'),
                        'name'    => 'show_subcategories_thumbs',
                        'is_bool' => true,
                        'values'  => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),*/
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Default product list view'),
                        'name' => 'default_product_list_view',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Display top pagination'),
                        'name' => 'category_display_top_pagination',
                        'separator' => true,
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),

                    // Product list
                    /*
                    array(
                        'type'    => 'text',
                        'label'   => $this->l('Product name length'),
                        'row_title' => $this->l('Product list'),
                        'name'    => 'product_list_product_name_length',
                    ),
                    array(
                        'type'    => 'switch',
                        'label'   => $this->l('Product reference'),
                        'name'    => 'product_list_product_reference',
                                            'is_bool' => true,
                        'values'  => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),*/
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show quick view button'),
                        'name' => 'product_list_show_quick_view_button',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show compare button'),
                        'name' => 'product_list_show_compare_button',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show wishlist button'),
                        'name' => 'product_list_show_wishlist_button',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show review'),
                        'name' => 'product_list_show_review',
                        'separator' => true,
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),

                    // Product page

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product navigation'),
                        'row_title' => $this->l('Product page'),
                        'name' => 'product_page_product_navigation',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Functional buttons'),
                        'name' => 'product_page_functional_buttons',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    /*array(
                        'type'    => 'switch',
                        'label'   => $this->l('Show quick view button'),
                        'name'    => 'product_page_show_quick_view_button',
                        'is_bool' => true,
                        'values'  => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),*/
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show compare button'),
                        'name' => 'product_page_show_compare_button',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show wishlist button'),
                        'name' => 'product_page_show_wishlist_button',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Review'),
                        'name' => 'product_page_show_review',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product reference'),
                        'name' => 'product_page_product_reference',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show product condition'),
                        'name' => 'product_page_show_product_condition',
                        'separator' => true,
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),

                    // Labels, prices, ratings

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Labels letter uppercase'),
                        'row_title' => $this->l('Labels, prices, ratings'),
                        'name' => 'label_letter_uppercase',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Label types'),
                        'name'    => 'label_types',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'type1', 'name' => $this->l('Type 1')),
                                array('id_option' => 'type2', 'name' => $this->l('Type 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'type1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('New product label background'),
                        'name' => 'label_new_product_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('New product label text color'),
                        'name' => 'label_new_product_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('New product label border color'),
                        'name' => 'label_new_product_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Sale product label background'),
                        'name' => 'label_sale_product_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Sale product label text color'),
                        'name' => 'label_sale_product_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Sale product label border color'),
                        'name' => 'label_sale_product_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('In stock product label background'),
                        'name' => 'label_instock_product_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('In stock product label text color'),
                        'name' => 'label_instock_product_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Out of stock product label background'),
                        'name' => 'label_outofstock_product_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Out of stock product label text color'),
                        'name' => 'label_outofstock_product_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Product price color'),
                        'name' => 'product_price_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'color',
                        'label'   => $this->l('Product rating stars color'),
                        'name'    => 'product_rating_stars_color',
                        'size' => 30,
                        'separator' => true,
                    ),*/

                    // Checkout

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Accordion'),
                        'desc' => $this->l('yes = accordion, no = all accordion is opened'),
                        'row_title' => $this->l('Checkout'),
                        'name' => 'checkout_accordion',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 0,
                    ),

                )
            )
        );

        // ============================================================================
        //    Footer
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'footer_tab',
                'legend' => array(
                    'title' => $this->l('Footer'),
                    'icon' => 'icon-edit'
                ),
                'input' => array(

                    // First (additional) footer

                    array(
                        'row_title' => $this->l('First (additional) footer'),

                        'type' => 'switch',
                        'label' => $this->l('Enable additional footer'),
                        'name' => 'footer_first_enable',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Background color'),
                        'name' => 'footer_first_background',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Background image type'),
                        'name'    => 'footer_first_background_image_type',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'type1', 'name' => $this->l('Type 1')),
                                array('id_option' => 'type2', 'name' => $this->l('Type 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'type1',
                    ),*/
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Border status'),
                        'name'    => 'footer_first_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Border color'),
                        'name' => 'footer_first_border_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Inner border status'),
                        'name'    => 'footer_first_inner_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Inner border color'),
                        'name' => 'footer_first_inner_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title color'),
                        'name' => 'footer_first_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title background color'),
                        'name' => 'footer_first_block_title_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Text color'),
                        'name' => 'footer_first_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link color'),
                        'name' => 'footer_first_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link hover color'),
                        'name' => 'footer_first_link_hover_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input text color'),
                        'name' => 'footer_first_input_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input background color'),
                        'name' => 'footer_first_input_background',
                        'size' => 30,
                        'separator' => true,
                    ),

                    // Second (additional) footer

                    array(
                        'row_title' => $this->l('Second (additional) footer'),

                        'type' => 'switch',
                        'label' => $this->l('Enable additional footer'),
                        'name' => 'footer_second_enable',
                        'is_bool' => true,
                        'values' => array(
                            array('value' => 1),
                            array('value' => 0),
                        ),
                        'default' => 1,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Background color'),
                        'name' => 'footer_second_background',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Background image type'),
                        'name'    => 'footer_second_background_image_type',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'type1', 'name' => $this->l('Type 1')),
                                array('id_option' => 'type2', 'name' => $this->l('Type 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'type1',
                    ),*/
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Border status'),
                        'name'    => 'footer_second_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Border color'),
                        'name' => 'footer_second_border_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Inner border status'),
                        'name'    => 'footer_second_inner_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Inner border color'),
                        'name' => 'footer_second_inner_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title color'),
                        'name' => 'footer_second_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title background color'),
                        'name' => 'footer_second_block_title_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Text color'),
                        'name' => 'footer_second_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link color'),
                        'name' => 'footer_second_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link hover color'),
                        'name' => 'footer_second_link_hover_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input text color'),
                        'name' => 'footer_second_input_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input background color'),
                        'name' => 'footer_second_input_background',
                        'size' => 30,
                        'separator' => true,
                    ),

                    // Main footer

                    array(
                        'row_title' => $this->l('Third (additional) footer'),

                        'type' => 'color',
                        'label' => $this->l('Background color'),
                        'name' => 'footer_main_background',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Background image type'),
                        'name'    => 'footer_main_background_image_type',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'type1', 'name' => $this->l('Type 1')),
                                array('id_option' => 'type2', 'name' => $this->l('Type 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'type1',
                    ),
                    array(
                        'type'    => 'select',
                        'label'   => $this->l('Border status'),
                        'name'    => 'footer_main_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Border color'),
                        'name' => 'footer_main_border_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Inner border status'),
                        'name'    => 'footer_main_inner_border_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Inner border color'),
                        'name' => 'footer_main_inner_border_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title color'),
                        'name' => 'footer_main_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title background color'),
                        'name' => 'footer_main_block_title_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Text color'),
                        'name' => 'footer_main_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link color'),
                        'name' => 'footer_main_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Link hover color'),
                        'name' => 'footer_main_link_hover_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input text color'),
                        'name' => 'footer_main_input_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Input background color'),
                        'name' => 'footer_main_input_background',
                        'size' => 30,
                        'separator' => true,
                    ),

                    // Footer block titles

                    array(
                        'row_title' => $this->l('Footer block titles'),

                        'type' => 'color',
                        'label' => $this->l('Footer block title color'),
                        'name' => 'footer_block_title_color',
                        'size' => 30,
                    ),
                    /*array(
                        'type'    => 'select',
                        'label'   => $this->l('Footer block title background status'),
                        'name'    => 'footer_block_title_background_status',
                        'options' => array(
                            'query' => array(
                                array('id_option' => 'status1', 'name' => $this->l('Status 1')),
                                array('id_option' => 'status2', 'name' => $this->l('Status 2'))
                            ),
                            'id'    => 'id_option',
                            'name'  => 'name'
                        ),
                        'default' => 'status1',
                    ),*/
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer block title background color'),
                        'name' => 'footer_block_title_background',
                        'size' => 30,
                        'separator' => true,
                    ),

                    // Social icons

                    array(
                        'row_title' => $this->l('Social icons'),

                        'type' => 'select',
                        'label' => $this->l('Round or squre social icons'),
                        'name' => 'footer_social_icons_shape',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'round',
                                    'name' => $this->l('Round')
                                ),
                                array(
                                    'id_option' => 'square',
                                    'name' => $this->l('Square')
                                )
                            ),
                            'id' => 'id_option',
                            'name' => 'name'
                        ),
                        'default' => 'round',
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer social icon text color'),
                        'name' => 'footer_social_icon_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Footer social icon background color'),
                        'name' => 'footer_social_icon_background',
                        'size' => 30,
                        'separator' => true,
                    ),

                    // Show copyrights and payments logos

                    array(
                        'row_title' => $this->l('Show copyrights and payments logos'),

                        'type' => 'text',
                        'label' => $this->l('Copyright text'),
                        'name' => 'footer_copyright_text',
                    ),
                    array(
                        'type' => 'image',
                        'label' => $this->l('Footer image'),
                        'name' => 'footer_image',
                        'separator' => true,
                        'default' => '/modules/'.$this->name.'/views/img/credit-cards.png',
                    ),

                )
            )
        );

        // ============================================================================
        //    Custom CSS & JS
        // ============================================================================

        $this->addTab(
            array(
                'tab_name' => 'custom_tab',
                'legend' => array(
                    'title' => $this->l('Custom CSS and JS code'),
                    'icon' => 'icon-edit'
                ),

                'input' => array(
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Custom CSS code'),
                        'name' => 'custom_css',
                        'rows' => 15,
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Custom JS code'),
                        'name' => 'custom_js',
                        'rows' => 15,
                    ),
                )
            )
        );
    }

    protected function addTab($form)
    {
        // Add defaults
        foreach ($form['input'] as &$input) {
            $this->defaults[$input['name']] = isset($input['default']) ? $input['default'] : '';
        }

        // Add settings
        $this->settings[] = array(
            'form' => $form,
        );
    }

    public function install()
    {
        if (parent::install() && $this->registerHook('displayHeader') && $this->registerHook('calculateGrid')
            && $this->registerHook('displayAdminHomeQuickLinks')
        ) {
            $this->setDefaults();

            //$this->addMenuItem();
            return true;
        } else {
            return false;
        }
    }

    public function uninstall()
    {
        if (parent::uninstall()) {
            foreach ($this->defaults as $default => $value) {
                Configuration::deleteByName($this->configName.'_'.$default);
            }

            return true;
        }

        return false;
    }

    private function addMenuItem()
    {
        $tab = new Tab();

        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Theme Editor');
        }

        $tab->class_name = 'AdminModules';
        $tab->id_parent = 0;
        $tab->module = $this->name;
        $tab->add();
    }

    public function setDefaults()
    {
        foreach ($this->defaults as $default => $value) {
            Configuration::updateValue(
                $this->configName.'_'.$default,
                $value
            );
        }

        Configuration::updateValue(
            'PS_QUICK_VIEW',
            1
        );
    }

    public function getContent()
    {
        $this->context->controller->addJqueryPlugin('colorpicker');
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');

        if (Tools::isSubmit('save_editor')) {
            $this->registerHook('calculateGrid');

            foreach ($this->defaults as $default => $value) {
                Configuration::updateValue(
                    $this->configName.'_'.$default,
                    Tools::getValue($default)
                );
            }

            $this->generateCss();
        } elseif (Tools::isSubmit('reset_editor')) {
            $this->setDefaults();
            $this->generateCss();
            $this->html .= $this->displayConfirmation($this->l('Settings reset'));
        } elseif (Tools::isSubmit('exportConfiguration')) {
            $this->exportSettings();
        } elseif (Tools::isSubmit('importConfiguration')) {
            $this->importSettings();
        }

        $this->html
            .= '
        <div class="panel clearfix">
            <form class="pull-left" id="importForm" method="post" enctype="multipart/form-data" action="'
            .$this->context->link->getAdminLink(
                'AdminModules',
                false
            ).'&importConfiguration&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">
                <div style="display:inline-block;"><input type="file" id="uploadConfig" name="uploadConfig" /></div>
                <button type="submit" class="btn btn-default btn-lg"><span class="icon icon-upload"></span> '
            .$this->l(
                'Import configuration'
            ).'</button>
            </form>
            <a href="'
            .$this->context->link->getAdminLink(
                'AdminModules',
                false
            ).'&exportConfiguration&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">
                <button class="btn btn-default btn-lg pull-right"><span class="icon icon-share"></span> '
            .$this->l(
                'Export configuration(Export only saved settigns, save before export)'
            ).'</button>
            </a>
        </div>';
        $this->html .= $this->renderForm();

        return $this->html;
    }

    protected function importSettings()
    {
        if (isset($_FILES['uploadConfig']) && isset($_FILES['uploadConfig']['tmp_name'])) {
            $str = Tools::file_get_contents($_FILES['uploadConfig']['tmp_name']);
            $arr = unserialize($str);

            foreach ($arr as $default => $value) {
                if ($default == 'copyright_text') {
                    $message_trads = array();
                    foreach (Tools::getAllValues() as $key => $value) {
                        Configuration::updateValue(
                            $this->configName.'_'.$default,
                            $message_trads,
                            true
                        );
                    }
                } elseif ($default == 'PS_QUICK_VIEW') {
                    Configuration::updateValue(
                        'PS_QUICK_VIEW',
                        $value
                    );
                } else {
                    Configuration::updateValue(
                        $this->configName.'_'.$default,
                        $value
                    );
                }
            }

            $this->generateCss();

            $this->html .= $this->displayConfirmation($this->l('Configuration imported'));
        } else {
            $this->html .= $this->displayError($this->l('No config file'));
        }
    }

    protected function exportSettings()
    {
        $var = array();

        foreach ($this->defaults as $default => $value) {

            if ($default == 'copyright_text') {
                foreach (Language::getLanguages(false) as $lang) {
                    $var[$default][(int)$lang['id_lang']] = Tools::getValue(
                        $default.'_'.(int)$lang['id_lang'],
                        Configuration::get(
                            $default,
                            (int)$lang['id_lang']
                        )
                    );
                }
            } else {
                $var[$default] = Configuration::get($this->configName.'_'.$default);
            }
        }

        $var['PS_QUICK_VIEW'] = (int)Tools::getValue(
            'PS_QUICK_VIEW',
            Configuration::get('PS_QUICK_VIEW')
        );

        $file_name = time().'.csv';
        file_put_contents(
            $this->getLocalPath().'export/'.$file_name,
            print_r(
                serialize($var),
                true
            )
        );
        Tools::redirect(_PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/export/'.$file_name);
    }

    public function renderForm()
    {
        $fields_form_save = array(
            'form' => array(
                'tab_name' => 'save_tab',
                'legend' => array(
                    'title' => $this->l('Save configuration'),
                    'icon' => 'icon-save'
                ),
                'submit' => array(
                    'name' => 'save_editor',
                    'class' => 'btn btn-default pull-right',
                    'title' => $this->l('Save')
                ),
                'buttons' => array(
                    'button' => array(
                        'name' => 'reset_editor',
                        'type' => 'submit',
                        'icon' => 'process-icon-refresh',
                        'class' => 'btn btn-default pull-left',
                        'title' => $this->l('Reset to default')
                    ),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = true;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        $form_settings = array_merge(
            $this->settings,
            array($fields_form_save)
        );

        return $helper->generateForm($form_settings);
    }

    public function getConfigFieldsValues()
    {
        $var = array();

        foreach ($this->defaults as $default => $value) {
            $var[$default] = Configuration::get($this->configName.'_'.$default);
        }

        $var['PS_QUICK_VIEW'] = (int)Tools::getValue(
            'PS_QUICK_VIEW',
            Configuration::get('PS_QUICK_VIEW')
        );

        return $var;
    }

    public function generateCss()
    {
        // CSS

        $css = "/*\n * Azelab Theme Editor Styles \n */\n\n";
        $template = $this->context->smarty->createTemplate(
            $this->local_path.'views/templates/hook/css.tpl',
            $this->context->smarty
        );
        $template->assign(
            'settings',
            $this->getConfigFieldsValues()
        );
        $css .= $template->fetch();
        $css .= "\n\n/*\n * Custom CSS Styles \n */\n\n".Configuration::get($this->configName.'_custom_css');

        if (Shop::getContext() == Shop::CONTEXT_GROUP) {
            $css_file
                = $this->local_path.'views/css/themeeditor_g_'.(int)$this->context->shop->getContextShopGroupID()
                .'.css';
        } elseif (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $css_file
                = $this->local_path.'views/css/themeeditor_s_'.(int)$this->context->shop->getContextShopID().'.css';
        }

        $fh = fopen(
            $css_file,
            'w'
        ) or die("can't open file");
        fwrite(
            $fh,
            $css
        );
        fclose($fh);

        // JS

        $js = "/*\n * Custom JS \n */\n\n".Configuration::get($this->configName.'_custom_js');

        if (Shop::getContext() == Shop::CONTEXT_GROUP) {
            $my_file
                = $this->local_path.'views/js/themeeditor_g_'.(int)$this->context->shop->getContextShopGroupID().'.js';
        } elseif (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $my_file = $this->local_path.'views/js/themeeditor_s_'.(int)$this->context->shop->getContextShopID().'.js';
        }

        $fh = fopen(
            $my_file,
            'w'
        ) or die("can't open file");
        fwrite(
            $fh,
            $js
        );
        fclose($fh);
    }

    public function hookdisplayAdminHomeQuickLinks()
    {
        return $this->display(
            __FILE__,
            'views/templates/hook/quick-links.tpl'
        );
    }

    public function hookCalculateGrid($params)
    {
        $inc = 0;
        if ((Context::getContext()->theme->hasLeftColumn($this->context->controller->php_self))) {
            $inc++;
        }
        if ((Context::getContext()->theme->hasRightColumn($this->context->controller->php_self))) {
            $inc++;
        }

        switch ($params['size']) {
            case 'large':
                $grid = Configuration::get($this->configName.'_grid_size_lg') - $inc;
                break;
            case 'medium':
                $grid = Configuration::get($this->configName.'_grid_size_md') - $inc;
                break;
            case 'small':
                $grid = Configuration::get($this->configName.'_grid_size_sm');
                break;
            case 'mediumsmall':
                $grid = Configuration::get($this->configName.'_grid_size_ms');
                break;
        }

        if ($grid == 5) {
            $grid = 15;
        } else {
            $grid = (12 / $grid);
        }

        return $grid;
    }

    public function hookHeader($params)
    {
        if (isset($_SERVER['HTTP_USER_AGENT'])
            && (
                strpos(
                    $_SERVER['HTTP_USER_AGENT'],
                    'MSIE'
                ) !== false)
        ) {
            header('X-UA-Compatible: IE=edge,chrome=1');
        }

        $theme_settings = $this->getConfigFieldsValues();

        $this->context->smarty->assign(
            'milan_settings',
            $theme_settings
        );
        if ($theme_settings['page_layout'] == 'right') {
            $this->context->smarty->assign(
                'hide_left_column',
                true
            );
            $this->context->smarty->assign(
                'hide_right_column',
                false
            );
        } elseif ($theme_settings['page_layout'] == 'left') {
            $this->context->smarty->assign(
                'hide_left_column',
                false
            );
            $this->context->smarty->assign(
                'hide_right_column',
                true
            );
        }

        if (Shop::getContext() == Shop::CONTEXT_GROUP) {
            $this->context->controller->addCSS(
                ($this->_path).'views/css/themeeditor_g_'.(int)$this->context->shop->getContextShopGroupID().'.css',
                'all'
            );
        } elseif (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $this->context->controller->addCSS(
                ($this->_path).'views/css/themeeditor_s_'.(int)$this->context->shop->getContextShopID().'.css',
                'all'
            );
        }

        if (Shop::getContext() == Shop::CONTEXT_GROUP) {
            $this->context->controller->addJS(
                ($this->_path).'views/js/themeeditor_g_'.(int)$this->context->shop->getContextShopGroupID().'.js'
            );
        } elseif (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $this->context->controller->addJS(
                ($this->_path).'views/js/themeeditor_s_'.(int)$this->context->shop->getContextShopID().'.js'
            );
        }
    }
}
