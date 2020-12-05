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

class BlockhtmlAzl extends Module
{
    protected $config_form = false;
    protected $hooks_tpl_path;

    public function __construct()
    {
        $this->name = 'blockhtmlazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Block Html');
        $this->description = $this->l('Module to insert html content to home page.');

        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {

        if (parent::install() && $this->registerHook('displayHome')) {
            $res = true;
            $languages = Language::getLanguages(false);
            foreach ($languages as $lang) {
                $res &= Configuration::updateValue(
                    'BLOCKHTML_HTML_'.(int)$lang['id_lang'],
                    '<div class="col-sm-4">
<div class="services-item">
<p class="si-icon"> </p>
<h3 class="si-title"><a href="#">Free Shipping</a></h3>
<hr class="si-line" />
<p class="si-content">Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor enim ad minim nostrud
exercitation ullamco consequat irure dolor in reprehenderit omnis voluptatem accusantium.</p>
</div>
</div>
<div class="col-sm-4">
<div class="services-item">
<p class="si-icon"> </p>
<h3 class="si-title"><a href="#">Back Guarantee</a></h3>
<hr class="si-line" />
<p class="si-content">Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor enim ad minim nostrud
exercitation ullamco consequat irure dolor in reprehenderit omnis voluptatem accusantium.</p>
</div>
</div>
<div class="col-sm-4">
<div class="services-item">
<p class="si-icon"> </p>
<h3 class="si-title"><a href="#">Fastest Dilivery</a></h3>
<hr class="si-line" />
<p class="si-content">Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor enim ad minim nostrud
exercitation ullamco consequat irure dolor in reprehenderit omnis voluptatem accusantium.</p>
</div>
</div>',
                    true
                );
            }

            return (bool)$res;
        }
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        $this->postProcess();

        $this->context->smarty->assign(
            'module_dir',
            $this->_path
        );

        return $this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG',
            0
        );

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitBlockhtmlAzlModule';
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(),
            /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'textarea',
                        'name' => 'BLOCKHTML_HTML',
                        'label' => $this->l('Html'),
                        'required' => true,
                        'autoload_rte' => true,
                        'lang' => true,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $languages = Language::getLanguages(false);
        $fields = array();
        foreach ($languages as $lang) {
            $fields['BLOCKHTML_HTML'][$lang['id_lang']] = Tools::getValue(
                'BLOCKHTML_HTML_'.(int)$lang['id_lang'],
                Configuration::get('BLOCKHTML_HTML_'.(int)$lang['id_lang'])
            );
        }

        return $fields;
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        $languages = Language::getLanguages(false);
        foreach (array_keys($form_values) as $key) {

            foreach ($languages as $lang) {
                Configuration::updateValue(
                    $key.'_'.(int)$lang['id_lang'],
                    Tools::getValue(
                        $key.'_'.(int)$lang['id_lang'],
                        Configuration::get($key.'_'.(int)$lang['id_lang'])
                    ),
                    true
                );
            }
        }
    }

    public function hookDisplayHome($params)
    {
        $language = $this->context->language->id;
        $this->context->smarty->assign(
            'BLOCKHTML_HTML',
            Tools::getValue(
                'BLOCKHTML_HTML_'.(int)$language,
                Configuration::get('BLOCKHTML_HTML_'.(int)$language)
            )
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/footer.tpl'
        );
    }
}
