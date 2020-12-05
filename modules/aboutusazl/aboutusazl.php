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

class AboutusAzl extends Module
{
    protected $config_form = false;
    protected $hooks_tpl_path;

    public function __construct()
    {
        $this->name = 'aboutusazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Block About us');
        $this->description = $this->l('Information about your store. ');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        if (parent::install() && $this->registerHook('displayFooterTwo')) {
            $res = true;
            $languages = Language::getLanguages(false);
            foreach ($languages as $lang) {
                $res &= Configuration::updateValue(
                    'ABOUTUS_TITLE_'.(int)$lang['id_lang'],
                    'About Us'
                );
                $res &= Configuration::updateValue(
                    'ABOUTUS_HTML_'.(int)$lang['id_lang'],
                    '<p>Lorem ipsum dolor sit amet, consectetur
 adipisicing elit, voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
  error sit voluptatem voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
   non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste
   natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>',
                    true
                );
            }

            return (bool)$res;
        }
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

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $languages = Language::getLanguages(false);
        $fields = array();
        foreach ($languages as $lang) {
            $fields['ABOUTUS_TITLE'][$lang['id_lang']] = Tools::getValue(
                'ABOUTUS_TITLE_'.(int)$lang['id_lang'],
                Configuration::get('ABOUTUS_TITLE_'.(int)$lang['id_lang'])
            );
            $fields['ABOUTUS_HTML'][$lang['id_lang']] = Tools::getValue(
                'ABOUTUS_HTML_'.(int)$lang['id_lang'],
                Configuration::get('ABOUTUS_HTML_'.(int)$lang['id_lang'])
            );
        }

        return $fields;
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
        $helper->submit_action = 'submitAboutusAzlModule';
        $helper->currentIndex
            = $this->context->link->getAdminLink(
                'AdminModules',
                false
            ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(), 'id_language' => $this->context->language->id,);

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
                    'title' => $this->l('Settings'), 'icon' => 'icon-cogs',), 'input' => array(
                    array(
                        'col' => 3, 'type' => 'text', 'name' => 'ABOUTUS_TITLE', 'label' => $this->l('Title'),
                        'required' => true, 'lang' => true,), array(
                        'type' => 'textarea', 'name' => 'ABOUTUS_HTML', 'label' => $this->l('Html'), 'required' => true,
                        'autoload_rte' => true, 'lang' => true,),), 'submit' => array(
                    'title' => $this->l('Save'),),),);
    }

    public function hookDisplayFooterTwo($params)
    {
        $language = $this->context->language->id;
        $this->context->smarty->assign(
            'ABOUTUS_TITLE',
            Tools::getValue(
                'ABOUTUS_TITLE_'.(int)$language,
                Configuration::get('ABOUTUS_TITLE_'.(int)$language)
            )
        );
        $this->context->smarty->assign(
            'ABOUTUS_HTML',
            Tools::getValue(
                'ABOUTUS_HTML_'.(int)$language,
                Configuration::get('ABOUTUS_HTML_'.(int)$language)
            )
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/footer.tpl'
        );
    }
}
