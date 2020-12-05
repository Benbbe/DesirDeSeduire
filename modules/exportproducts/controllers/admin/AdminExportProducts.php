<?php

/**
 * Export Products
 * @category export
 *
 * @author Oavea - Oavea.com
 * @copyright Oavea / PrestaShop
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @version 2.5.3
 */
class AdminExportProductsController extends ModuleAdminController
{

    public $available_fields;

    public function __construct()
    {
        $this->bootstrap = true;

        $this->meta_title = $this->l('Export Products');
        parent::__construct();
        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }

        $this->available_fields = array(
            'id' => array('label' => 'retailer_id'),
            'availability' => array('label' => 'availability'),
            'brand' => array('label' => 'brand'),
            'category' => array('label' => 'category'),
            'currency' => array('label' => 'currency'),
            'description' => array('label' => 'description'),
            'image_url' => array('label' => 'image_url'),
            'name' => array('label' => 'name'),
            'price' => array('label' => 'price'),
            'url' => array('label' => 'url'),
          );
    }

    public function renderView()
    {

        return $this->renderConfigurationForm();

    }

    public function renderConfigurationForm()
    {
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $langs = Language::getLanguages();
        $id_shop = (int)$this->context->shop->id;

        foreach ($langs as $key => $language) {
            $options[] = array('id_option' => $language['id_lang'], 'name' => $language['name']);
        }

        $cats = $this->getCategories(
            $lang->id,
            true,
            $id_shop
        );

        $pricetax = array(
            array('id_option' => 'price_tin', 'name' => 'Price Tax Included'),
            array('id_option' => 'price_tex', 'name' => 'Price Tax Excluded')
        );

        $categories[] = array('id_option' => 99999, 'name' => 'All');

        foreach ($cats as $key => $cat) {
            $categories[] = array('id_option' => $cat['id_category'], 'name' => $cat['name']);
        }

        $inputs = array(
            array(
                'type' => 'select',
                'label' => $this->l('Language'),
                'desc' => $this->l('Choose a language you wish to export'),
                'name' => 'export_language',
                'class' => 't',
                'options' => array(
                    'query' => $options,
                    'id' => 'id_option',
                    'name' => 'name'
                ),
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Delimiter'),
                'name' => 'export_delimiter',
                'value' => ',',
                'desc' => $this->l('The character to separate the fields')
            ),
            array(
                'type' => 'radio',
                'label' => $this->l('Export active products?'),
                'name' => 'export_active',
                'values' => array(
                    array('id' => 'active_off', 'value' => 0, 'label' => 'no, export all products.'),
                    array('id' => 'active_on', 'value' => 1, 'label' => 'yes, export only active products'),
                ),
                'is_bool' => true,
            ),
            array(
                'type' => 'select',
                'label' => $this->l('Product Category'),
                'desc' => $this->l('Choose a product category you wish to export'),
                'name' => 'export_category',
                'class' => 't',
                'options' => array(
                    'query' => $categories,
                    'id' => 'id_option',
                    'name' => 'name'
                ),
            ),
        );


        $pricetintex = array(
            array(
                'type' => 'select',
                'label' => $this->l('Price tax included or excluded'),
                'desc' => $this->l('Choose if you want to export the price with or without tax.'),
                'name' => 'export_tax',
                'class' => 't export_tax',
                'options' => array(
                    'query' => $pricetax,
                    'id' => 'id_option',
                    'name' => 'name'
                )
            )
        );
        $inputs = array_merge(
            $inputs,
            $pricetintex
        );


        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Export Options'),
                    'icon' => 'icon-cogs'
                ),
                'input' => $inputs,
                'submit' => array(
                    'title' => $this->l('Export'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;

        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG'
        ) : 0;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitExport';
        $helper->currentIndex = self::$currentIndex;
        $helper->token = Tools::getAdminTokenLite('AdminExportProducts');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form));
    }


    public function getConfigFieldsValues()
    {
        return array(
            'export_active' => false,
            'export_category' => 'all',
            'export_delimiter' => ',',
            'export_language' => (int)Configuration::get('PS_LANG_DEFAULT'),
            'export_tax' => 'price_tin'
        );
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitExport')) {
            $delimiter = Tools::getValue('export_delimiter');
            $id_lang = Tools::getValue('export_language');
            $id_shop = (int)$this->context->shop->id;

            set_time_limit(0);
            $fileName = 'products_' . date("Y_m_d_H_i_s") . '.csv';
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename={$fileName}");
            header("Expires: 0");
            header("Pragma: public");
            echo "\xEF\xBB\xBF";

            $f = fopen(
                _PS_UPLOAD_DIR_.'fb_products.csv',
				//'php://output',
                'w'
            );

            $export_tax = Tools::getValue('export_tax');
            if ($export_tax == 'price_tin') {
                unset($this->available_fields['price_tex']);
            } elseif ($export_tax == 'price_tex') {
                unset($this->available_fields['price_tin']);
            }


            foreach ($this->available_fields as $field => $array) {
                $titles[] = $array['label'];
            }

            fputcsv(
                $f,
                $titles,
                $delimiter,
                '"'
            );

            $export_active = (Tools::getValue('export_active') == 0 ? false : true);
            $export_category = (Tools::getValue('export_category') == 99999 ? false : Tools::getValue(
                'export_category'
            ));

            $products = Product::getProducts(
                $id_lang,
                0,
                0,
                'id_product',
                'ASC',
                $export_category,
                $export_active
            );

            foreach ($products as $product) {
                $line = array();
                $p = new Product(
                    $product['id_product'],
                    true,
                    $id_lang,
                    $id_shop
                );
                $p->loadStockData();
				
				$line["id"] = $p->id.'-'.$p->reference;

				if ($p->quantity>0){
					$line["availability"] = 'in stock';
				}else{
						$line["availability"] = 'out of stock';
				}
				$line["brand"] = $p->manufacturer_name;
				$cats = $p->getProductCategoriesFull($p->id, $id_lang);
				$cat_array = array();
				foreach ($cats as $cat) {
					$cat_array[] = $cat['name'];
				}
				$line['categories'] = implode(",", $cat_array);
				$line["currency"] = "EUR";
				$line["description"] = $p->description;
				$link = new Link();
				$imagelinks = array();
				$images = $p->getImages($id_lang);
				foreach ($images as $image) {
					$imagelinks[] = Tools::getShopProtocol() . $link->getImageLink(
							$p->link_rewrite,
							$p->id_product . '-' . $image['id_image']
						);
				}
				$line['image'] = implode(",", $imagelinks);
				$line["name"] = $p->name;
				
				$line['price'] = $p->getPrice(true,null,2,null,false,false,1);
				$line["url"] = Tools::getHttpHost(true).__PS_BASE_URI__.'index.php?controller=product&id_product=' . $p->id;
				
				if (!array_key_exists($field,$line)) {
                    $line[$field] = '';
                }
                fputcsv(
                    $f,
                    $line,
                    $delimiter,
                    '"'
                );
            }
            fclose($f);
            die();
        }
    }

    public function initContent()
    {
        $this->content = $this->renderView();
        parent::initContent();
    }

    public function getWarehouses($id_warehouses)
    {
        return $id_warehouses['id_warehouse'];
    }

    public function getCategories(
        $id_lang,
        $active,
        $id_shop
    ) {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
			SELECT *
			FROM `' . _DB_PREFIX_ . 'category` c
			LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON c.`id_category` = cl.`id_category`
			WHERE ' . ($id_shop ? 'cl.`id_shop` = ' . (int)$id_shop : '') . ' ' . ($id_lang ? 'AND `id_lang` = ' . (int)$id_lang : '') . '
			' . ($active ? 'AND `active` = 1' : '') . '
			' . (!$id_lang ? 'GROUP BY c.id_category' : '') . '
			ORDER BY c.`level_depth` ASC, c.`position` ASC'
        );

        return $result;
    }
}
