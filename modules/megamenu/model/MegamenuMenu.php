<?php
/**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*/

class MegamenuMenu extends ObjectModel
{

    public $id_megamenu_menu;

    public $is_customlink;

    public $custom_link;

    public $link_object_id;

    public $is_megamenu;

    public $position;

    public $status;

    public $is_fullwidth;

    public $date_add;

    public $date_upd;

    public $label;

    public $langId;

    public $icon_type;

    public $icon;

    public function __construct($id_megamenu_menu = null, $id_lang = null)
    {
        $context = Context::getContext();
        if ($id_megamenu_menu) {
            $this->id_megamenu_menu = $id_megamenu_menu;
        }
        $this->langId = $context->language->id;
        parent::__construct($id_megamenu_menu, $id_lang);
    }

    public static $definition = array(
        'table' => 'megamenu_menu',
        'primary' => 'id_megamenu_menu',
        'multilang' => true,
        'fields' => array(
            'is_customlink'        =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
            'custom_link'        =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'icon_type'            =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'icon'                =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'link_object_id'    =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'is_megamenu'        =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
            'is_fullwidth'        =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
            'position'            =>    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'status'             =>    array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'label'                =>    array('type' => self::TYPE_STRING,'lang'=>true, 'validate' => 'isString'),
            'date_add'           =>  array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd'          =>    array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public function findByMenuId($id_megamenu_menu)
    {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'megamenu_menu WHERE id_megamenu_menu = ' . $id_megamenu_menu;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
    }

    public function getMenuDetailsbyId($id_megamenu_menu)
    {
        $definition = MegamenuMenu::$definition;
        $menuObject = new MegamenuMenu($id_megamenu_menu);
        $menu = array();
        foreach ($definition['fields'] as $key => $field) {
            $field = $field;
            $menu[$key] = $menuObject->$key;
        }
        $megamenuContentObject = new MegamenuContent();
        $menu['content'] = $megamenuContentObject->getMenuContentByMenuId($id_megamenu_menu);
        return $menu;
    }

    public function doAdd($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return parent::add();
    }

    public function doUpdate($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return parent::update();
    }

    public function doDelete()
    {
        return parent::delete();
    }

    public function getNextPosition()
    {
        $postion = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue(
            'SELECT MAX(position) FROM ' . _DB_PREFIX_ . 'megamenu_menu'
        );
        return $postion + 1;
    }

    public function getMenusByPosition($id_lang = false, $status = false)
    {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'megamenu_menu m';
        if ($id_lang) {
            $sql .= ' LEFT JOIN ' . _DB_PREFIX_ .
               'megamenu_menu_lang ml ON(ml.id_megamenu_menu = m.id_megamenu_menu AND ml.id_lang=' . $id_lang . ')';
        }
        if ($status) {
            $sql .= ' WHERE status = 1';
        }
        $sql .= ' ORDER BY m.position ASC';
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    public function getDefaultLinks()
    {
        $categories = MegamenuMenu::getCategoriesList();
        if (isset($categories[0])) {
            unset($categories[0]);
        }

        $manufacturer = new Manufacturer();
        $manufacturers = $manufacturer->getManufacturers();

        $supplier = new Supplier();
        $suppliers = $supplier->getSuppliers();

        $cms = new CMS();
        $cmsPages = $cms->getCMSPages($this->langId);

        $customLinks = new MegamenuLink();
        $customLinksDetails = $customLinks->getLinks($this->langId);

        $links = array();
        
        $links = array(
            'Categories'     => MegamenuMenu::buildLinkArray($categories, 'id_category', 'name', 'CAT', 'level_depth'),
            'Manufacturers' => MegamenuMenu::buildLinkArray($manufacturers, 'id_manufacturer', 'name', 'MAN'),
            'Suppliers'     => MegamenuMenu::buildLinkArray($suppliers, 'id_supplier', 'name', 'SUP'),
            'CMS'            => MegamenuMenu::buildLinkArray($cmsPages, 'id_cms', 'meta_title', 'CMS'),
            'CustomLinks'    => MegamenuMenu::buildLinkArray($customLinksDetails, 'id_megamenu_link', 'label', 'CSL'),
        );
        return $links;
    }

    private function buildLinkArray($links, $idKey, $nameKey, $prefix, $spaceKey = '')
    {
        $bulidedValues = array();
        foreach ($links as $link) {
            if (isset($link[$idKey]) && isset($link[$nameKey])) {
                $preSpace = '';
                if ($spaceKey && isset($link[$spaceKey])) {
                    $preSpace = str_repeat("&nbsp;&nbsp;", $link[$spaceKey]);
                }
                $bulidedValues[$prefix.$link[$idKey]] = $preSpace.$link[$nameKey];
            }
        }
        return $bulidedValues;
    }

    public function getCategoriesOptions()
    {
        $categories = MegamenuMenu::getCategoriesList();
        if (isset($categories[0])) {
            unset($categories[0]);
        }
        return MegamenuMenu::buildLinkArray($categories, 'id_category', 'name', '', 'level_depth');
    }

    private function getCategoriesList()
    {
        return Db::getInstance()->ExecuteS(
            'SELECT * FROM `' . _DB_PREFIX_ . 'category` AS c LEFT JOIN ' . _DB_PREFIX_ .
            'category_lang AS cl ON ( cl.id_lang = ' . $this->langId .
            ' AND cl.id_category = c.id_category ) ORDER BY c.`nleft`;'
        );
    }

    public function changePosition($id_megamenu_menu, $position)
    {
        if ($position) {
            $menuObject = new MegamenuMenu($id_megamenu_menu);
            $existPosition = $menuObject->position;
            $alternamePosition = MegamenuMenu::getAlternatePosition($existPosition, $position);
            if ($alternamePosition) {
                $alternameObject = new MegamenuMenu($alternamePosition['id_megamenu_menu']);
                $menuObject->position = $alternameObject->position;
                $alternameObject->position = $existPosition;
                if ($menuObject->doUpdate() && $alternameObject->update()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getAlternatePosition($currentPosition, $position)
    {
        $sql = '';
        if ($currentPosition) {
            if ($position == 'up') {
                $sql = 'SELECT id_megamenu_menu FROM `' . _DB_PREFIX_ .
                    'megamenu_menu` where position < ' . $currentPosition . ' ORDER BY `position` DESC';
            } elseif ($position == 'down') {
                $sql = 'SELECT id_megamenu_menu FROM `' . _DB_PREFIX_ .
                    'megamenu_menu` where position > ' . $currentPosition . ' ORDER BY `position` ASC';
            }

            if ($sql) {
                return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
                
            }
        }
        return false;
    }


    public function getTopMenuToDisplay($mobile = false)
    {
        $menus = $this->getMenusByPosition($this->langId, true);
        $menuContentObject = new MegamenuContent();
        //$men
        if (!empty($menus)) {
            foreach ($menus as $key => $menu) {
                $menusCount = count(
                    $menuContentObject->getContentByid($menu['id_megamenu_menu'])
                );
                $menus[$key]['content'] = $menuContentObject->getMenuContentByMenuId(
                    $menu['id_megamenu_menu'],
                    $this->langId
                );
                $menus[$key]['is_dropdown'] = 0;

                if ($menusCount == 1 && isset($menus[$key]['content'][1][1]['type']) &&
                    $menus[$key]['content'][1][1]['type'] == 'LNK') {
                    $menus[$key]['is_dropdown'] = 1;
                }
                
            }
        }
        return  $mobile? MegamenuMenu::buildModileMenuHtml($menus) : MegamenuMenu::buildMenuHtml($menus);
    }

    public function buildModileMenuHtml($menus)
    {
        $html = '';
        $settings = Tools::jsonDecode(Configuration::get('PS_MEGAMENU_SETTINGS'), 1);
        foreach ($menus as $menu) {
            $dropDownClass = '';
            $is_dropdown = false;
            $menuLinkAdds = '';
            $menuLink = $this->getMenuLink($menu);
            $menuMobileTrigger = '';
            if ($menu['is_megamenu'] || !empty($menu['content'])) {
                $is_dropdown = true;
                $menuLinkAdds = '';
                
                if ($settings['is_hover']) {
                    $menuMobileTrigger = '<a href="#" class="submenu-toggler"><i class="arrow_carrot-down"></i></a>';
                } else {
                }
                $dropDownClass = 'dropdown';
            }
            if ($menu['is_fullwidth']) {
                $dropDownClass .= ' yamm-fw';
            }
            $icon = '';
            if ($menu['icon_type']) {
                if ($menu['icon_type'] == 'icon') {
                    $icon = '<i class="'.$menu['icon'].'"></i>';
                } elseif ($menu['icon_type'] == 'image') {
                    $mm = new Megamenu();
                    $icon = '<img src="' . $mm->oPath . '/views/img/' . $menu['id_megamenu_menu'] . '.png">';
                }
            }
            $html .= '<li class="">';

            $html .= '<a href="'.$menuLink.'" '.$menuLinkAdds.'>'.$icon.' '.$menu['label'].'</a>' . $menuMobileTrigger;

            if ($is_dropdown) {

                if ($menu['is_dropdown'] && isset($menu['content'][1][1]['type']) &&
                     $menu['content'][1][1]['type'] == 'LNK' && !empty($menu['content'][1][1]['LNK'])) {
                    $html .= '<ul class="dropdown-menu animated" role="menu">' .
                        $this->buildLinkHtml($menu['content'][1][1]['LNK'], true) . '</ul>';
                } else {
                    $html .= $this->buildMenuContentHtml($menu, true);
                }
            }
            
            $html .= '</li>';
        }
        return $html;
    }

    public function buildMenuHtml($menus)
    {
        $html = '';
        $settings = Tools::jsonDecode(Configuration::get('PS_MEGAMENU_SETTINGS'), 1);
        foreach ($menus as $menu) {
            $dropDownClass = '';
            $is_dropdown = false;
            $menuLinkAdds = '';
            $menuLink = $this->getMenuLink($menu);
            $menuMobileTrigger = '';
            if ($menu['is_megamenu'] || !empty($menu['content'])) {
                $is_dropdown = true;
                $menuLinkAdds = '';
                
                if ($settings['is_hover']) {
                    $menuMobileTrigger = '<span class="megamenu-toggle"><i class="arrow_carrot-down"></i></span>';
                    //$menuLinkAdds .= 'data-hover="dropdown"';
                } else {
                    $menuLinkAdds .= 'class="dropdown-toggle" data-toggle="dropdown"';
                }
                $dropDownClass = 'nav-item';
            }
            if ($menu['is_fullwidth']) {
                $dropDownClass .= ' yamm-fw';
            }
            $icon = '';
            if ($menu['icon_type']) {
                if ($menu['icon_type'] == 'icon') {
                    $icon = '<i class="'.$menu['icon'].'"></i>';
                } elseif ($menu['icon_type'] == 'image') {
                    $mm = new Megamenu();
                    $icon = '<img src="'.$mm->oPath . '/views/img/' . $menu['id_megamenu_menu'] . '.png">';
                }
            }
            $html .= '<li class="'. $dropDownClass . '">';

            $html .= $menuMobileTrigger.'<a href="' . $menuLink .
                '" ' . $menuLinkAdds . '>' . $icon . ' ' . $menu['label'] . '</a>';

            if ($is_dropdown) {
                if ($menu['is_dropdown'] && isset($menu['content'][1][1]['type']) &&
                     $menu['content'][1][1]['type'] == 'LNK' && !empty($menu['content'][1][1]['LNK'])) {
                    $html .= '<div class="sub-nav full padding" role="menu">' .
                        $this->buildLinkHtml($menu['content'][1][1]['LNK'], true) . '</div>';
                } else {
                    $html .= $this->buildMenuContentHtml($menu);
                }
            }
            
            $html .= '</li>';
        }
        return $html;
    }

    public function buildMenuContentHtml($menu, $mobile = false)
    {
        $html = '';
        if (!empty($menu['content'])) {
            if ($mobile) {
                $html .= '<ul>';
                foreach ($menu['content'] as $row) {
                    if (!empty($row)) {
                        //$html .='<div class="yamm-content"><div class="row">';

                        foreach ($row as $column) {
                            $html .= '<li class="' . $column['custom_class'] . '" >';
                            $html .= $this->buildMenuColumnHtml($column, true);
                            $html .= '</li>';
                        }
                        //$html .='</div></div>';
                    }

                }
                $html .= '</ul>';
            } else {
                $html .= '<div class="sub-nav full padding" role="menu">';
                $html .= '<div class="row">';
                foreach ($menu['content'] as $row) {
                    if (!empty($row)) {
                        //$html .='<div class="yamm-content"><div class="row">';
                        foreach ($row as $column) {
                            $html .= '<div class="col-md-' . $column['grid'] . ' ' . $column['custom_class'] . '" >';
                            $html .= $this->buildMenuColumnHtml($column);
                            $html .= '</div>';
                        }
                        //$html .='</div></div>';
                    }
                }
                $html .= '</div>';
                $html .= '</div>';
            }
        }
        return $html;
    }

    public function buildMenuColumnHtml($column, $mobile = false)
    {
        $html = '';
        $type = $column['type'];
        //echo '<pre>'.print_r($column,1); exit;
        if ($type) {
            if (!$mobile) {
                $html .= '<div class="section ' . $column['custom_class'] . '">';
            }
            if ($column['title']) {
                $html .='<h3 class="sub-nav-title">' . $column['title'] . '</h3>';
            }
            switch ($type) {
                case 'LNK':
                    if ($mobile) {
                        $html .= $this->buildLinkHtml($column['LNK'], false, true);
                    } else {
                        $html .= '<ul class="sub-nav-group sub-nav-grey">' .
                            $this->buildLinkHtml($column['LNK']) . '</ul>';
                    }
                    break;
                case 'PRO':
                    $html .= $this->buildProductHtml($column['id_product']);
                    break;
                case 'CUS':
                    $html .= $column['custom_html'];
                    break;
                case 'SLI':
                    $html .= $this->buildSliderHtml($column);
                    break;
            }
            if (!$mobile) {
                $html .= '</div>';
            }
        }
        return $html;
    }

    public function buildSliderHtml($column)
    {
        $html = '';
        $linkObj = Context::getContext()->link;
        $displayItem = 1;
        if ($column['grid'] <= 4) {
            $displayItem = 1;
        } elseif ($column['grid'] == 6) {
            $displayItem = 2;
        } elseif ($column['grid'] == 12) {
            $displayItem = 4;
        }
        $aditionalClass = 'owl-arrow-down';
        if ($column['title']) {
            $aditionalClass = 'owl-arrow-up';
        }
        $productObj = new Product();
        if (isset($column['SLI']['id_category'])) {
            $categoryObj = new Category($column['SLI']['id_category'], $this->langId);
            $products = $categoryObj->getProducts($this->langId, 1, (
                !empty($column['SLI']['count']) ? $column['SLI']['count'] : 6
                ), 'date_add');
            if (!empty($products)) {

                $html .= '<div class="megamenu-owl ' . $aditionalClass . ' owl-show-' . $displayItem .
                    '" data-items="' . $displayItem . '">';
                foreach ($products as $product) {
                    
                    $link = $linkObj->getProductLink($product);
                    $html .= '<div class="product-details">';
                    //$img = new Image($product['id_image']);
                    $html .= '<div class="text-center product-img"><a href="' . $link .
                        '"><img alt="" class="img-responsive1" draggable="false" src="' .
                        $linkObj->getImageLink(
                            $product['link_rewrite'],
                            $product['id_image'],
                            ImageType::getFormatedName('home')
                        ) .
                            '" ></a></div>';
                    $html .= '<a href="' . $link . '"><h4 class="name">' . $product['name'] . '</h4></a>';
                    if ($product['price_without_reduction'] == $product['price_tax_exc']) {
                        $html .= '<span class="price" >' .
                            $productObj->convertPrice(
                                array(
                                    'price' => $product['price_tax_exc']
                                ),
                                $this->context->smarty
                            ) . '</span>';
                    } else {
                        $html .= '<span class="price" >' .
                            $productObj->convertPrice(
                                array(
                                    'price' => $product['price_tax_exc']
                                ),
                                $this->context->smarty
                            ) . '</span>';
                        $html .= '<span class="price old-price" >' .
                            $productObj->convertPrice(
                                array(
                                'price' => $product['price_without_reduction']),
                                $this->context->smarty
                            ) . '</span>';
                    }
                    $html .= '</div>';
                }
                $html .= '</div>';
            }
        }
        return $html;
    }

    public function buildProductHtml($id_product)
    {
        $html = '';
        if ($id_product) {
            $product = new Product($id_product, false, $this->langId);
            $linkObj = new Link();
            $link = $linkObj->getProductLink($product);
            $html .= '<div class="product-details">';
            $img = new Image($product->getCoverWs());
            $price = $product->getPrice();
            $actualPrice = $product->getPriceWithoutReduct();
            $html .= '<img alt="" class="img-responsive" draggable="false" src="' .
                _PS_BASE_URL_ . _THEME_PROD_DIR_ . $img->getExistingImgPath() .
                '-'.ImageType::getFormatedName('home').'.jpg" >';
            $html .= '<a href="'.$link.'"><h4 class="name">' . $product->name . '</h4></a>';
            if ($price == $actualPrice) {
                $html .= '<span class="price" >' .
                    $product->convertPrice(array('price' => $price), $this->context->smarty) . '</span>';
            } else {
                $html .= '<span class="price" >' .
                    $product->convertPrice(array('price' => $actualPrice), $this->context->smarty) . '</span>';
                $html .= '<span class="price old-price" >' .
                    $product->convertPrice(array('price' => $price), $this->context->smarty) . '</span>';
            }
            $html .= '</div>';
        }
        return $html;
    }

    public function buildLinkHtml($links, $child = false, $mobile = false)
    {
        $html = '';
        if (!empty($links)) {
            foreach ($links as $link) {
                $linkDetails = $this->getLinkDetailsbyId($link);
                $childItem = '';
                if ($child) {
                    $childItem = $this->getChildCategoryHtml($link);
                }
                /*$extraClass = '';
                if ($childItem) {
                    $extraClass = 'right-arrow';
                }*/
                if ($linkDetails['label'] && $linkDetails['url']) {
                    if ($mobile) {
                        $html .= '<a href="' . $linkDetails['url'] .
                            '">' . $linkDetails['label'] . '</a>';
                    } else {
                        $html .= '<li><a href="' . $linkDetails['url'] .
                            '">' . $linkDetails['label'] . '</a>' . $childItem . '</li>';
                    }
                }
            }
        }
        return $html;
    }


    private function getMenuLink($menu)
    {
        //$link = '';
        if ($menu['is_customlink']) {
            return $menu['custom_link'];
        } elseif ($menu['link_object_id']) {
            $linkDetails = $this->getLinkDetailsbyId($menu['link_object_id']);
            return $linkDetails['url'];
        }
    }

    public function getChildCategoryHtml($id)
    {
        $html = '';
        $type = Tools::substr($id, 0, 3);
        $objectId = Tools::substr($id, 3);
        $link = new Link();
        if ($type == 'CAT') {
            $categoryObj = new Category($objectId);
            $childrens = $categoryObj->getChildren($objectId, $this->langId);
            if ($childrens) {
                foreach ($childrens as $child) {
                    $html .= '<li><a href="' . $link->getCategoryLink($child['id_category'], null, $this->langId) .
                        '">' . $child['name'] . '</a></li>';
                }
            }
            
        }
        if ($html) {
            $html = '<ul class="dropdown-menu dropdown-submenu">' . $html . '</ul>';
        }
        return $html;
    }

    public function getLinkDetailsbyId($id)
    {
        $type = Tools::substr($id, 0, 3);
        $objectId = Tools::substr($id, 3);
        $link = array();

        switch ($type) {
            case 'CAT':
                $link = $this->getObjectLinkById($objectId, 'Category');
                break;
            case 'MAN':
                $link = $this->getObjectLinkById($objectId, 'Manufacturer');
                break;
            case 'SUP':
                $link = $this->getObjectLinkById($objectId, 'Supplier');
                break;
            case 'CMS':
                $link = $this->getObjectLinkById($objectId, 'CMS', 'meta_title');
                break;
            case 'CSL':
                $link = $this->getCustomLinksById($objectId, '');
                break;
        }

        return $link;
    }

    protected function getObjectLinkById($objectId, $type, $nameKey = 'name')
    {
        $link = new Link();
        $linkfunction = 'get' . $type . 'Link';
        $object = new $type($objectId, $this->langId);
        $linkUrl = $link->$linkfunction($object);
        $label = $object->$nameKey;
        return array('label'=>$label, 'url'=>$linkUrl);
    }
    
    protected function getCustomLinksById($id)
    {
        $link = new MegamenuLink($id, $this->langId);
        return array('label'=>$link->label, 'url'=>$link->url);
    }
}
