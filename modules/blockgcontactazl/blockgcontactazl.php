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

class BlockgcontactAzl extends Module
{
    protected $config_form = false;
    protected $hooks_tpl_path;

    public function __construct()
    {
        $this->name = 'blockgcontactazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Block Google map and mail form');
        $this->description = $this->l('Location your store and direct contact form.');

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
        if (parent::install() && $this->registerHook('displayFooterOne') && $this->registerHook('header')) {

            $res = Configuration::updateValue(
                'EMAIL_TO_AZL',
                'your@email.com'
            );
            $res &= Configuration::updateValue(
                'GMAP_EMBED_AZL',
                '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89553.25418528763!2d9.19406272678945!3d45.458941223623455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c1493f1275e7%3A0x3cffcd13c6740e8d!2sMilan!5e0!3m2!1sen!2s!4v1403031740860" width="370" height="150"></iframe>',
                true
            );

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
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue(
                $key,
                Tools::getValue(
                    $key,
                    Configuration::get($key)
                ),
                true
            );
        }
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $fields = array();
        $fields['EMAIL_TO_AZL'] = Tools::getValue(
            'EMAIL_TO_AZL',
            Configuration::get('EMAIL_TO_AZL')
        );
        $fields['GMAP_EMBED_AZL'] = Tools::getValue(
            'GMAP_EMBED_AZL',
            Configuration::get('GMAP_EMBED_AZL')
        );

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
        $helper->submit_action = 'submitBlockgcontactAzlModule';
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
                        'col' => 3,
                        'type' => 'text',
                        'name' => 'EMAIL_TO_AZL',
                        'label' => $this->l('Email address to send form information.'),
                        'required' => true,
                    ),
                    array(
                        'type' => 'textarea',
                        'name' => 'GMAP_EMBED_AZL',
                        'hint' => $this->l('Must be iframe width="370" and height="150"'),
                        'label' => $this->l('Google map iframe code'),
                        'required' => true,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    public function hookDisplayFooterOne($params)
    {
        $this->context->smarty->assign(
            'EMAIL_TO_AZL',
            Tools::getValue(
                'EMAIL_TO_AZL',
                Configuration::get('EMAIL_TO_AZL')
            )
        );
        $this->context->smarty->assign(
            'GMAP_EMBED_AZL',
            Tools::getValue(
                'GMAP_EMBED_AZL',
                Configuration::get('GMAP_EMBED_AZL')
            )
        );
        $this->context->smarty->assign(
            'token',
            Tools::getToken(false)
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/footer.tpl'
        );
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $language_iso_code = $this->context->language->iso_code;
        $this->context->controller->addJS($this->_path.'views/js/jquery.validationEngine.js');
        $this->context->controller->addJS($this->_path.'views/js/jquery.validationEngine-'.$language_iso_code.'.js');
        $this->context->controller->addCSS($this->_path.'views/css/validation-engine.css');
    }
}
