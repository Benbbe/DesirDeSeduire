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

class BlockTwitterAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blocktwitterazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Twitter Feed');
        $this->description = $this->l('Twitter Feed in footer');

        $config = Configuration::getMultiple(
            array(
                'PS_TWITTER_USERNAME',
                'PS_TWITTER_COUNT'
            )
        );

        if (empty($config['PS_TWITTER_USERNAME'])) {
            $this->warning = $this->l('Please insert your Twitter username');
        }

        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
        $this->full_url = _MODULE_DIR_.$this->name.'/';
    }

    public function install()
    {
        if (!parent::install() or !$this->registerHook('displayFooterOne') or !$this->registerHook('header')
            or !Configuration::updateValue(
                'PS_TWITTER_USERNAME',
                'prestashop'
            ) or !Configuration::updateValue(
                'PS_TWITTER_COUNT',
                '3'
            ) or !Configuration::updateValue(
                'PS_TW_CONSUMER_KEY',
                'DMdBD2zlHdlpftHtAEfjX6Kmd'
            ) or !Configuration::updateValue(
                'PS_TW_CONSUMER_SECRET',
                'mRiB7KQXAGY1mmq0xF7jGMnuyEFdwVaTZULQYGCBMGFFpHxtsy'
            ) or !Configuration::updateValue(
                'PS_TW_AT',
                '2821235920-HMEJz6ra7ufdNhCuL1tFh79sMEWYn7Wu3pNGVkB'
            ) or !Configuration::updateValue(
                'PS_TW_AT_SECRET',
                'k3drvvEabFKqSErbPIvQF4uz2k3XQBh7CDIjCs879BIUr'
            )
        ) {
            return false;
        }

        return true;
    }

    public function getKeys()
    {

        $keys = array();
        $keys["consumer_key"] = Configuration::get('PS_TW_CONSUMER_KEY');
        $keys["consumer_secret"] = Configuration::get('PS_TW_CONSUMER_SECRET');
        $keys["access_token"] = Configuration::get('PS_TW_AT');
        $keys["access_token_secret"] = Configuration::get('PS_TW_AT_SECRET');

        return $keys;
    }

    public function uninstall()
    {
        if (!Configuration::deleteByName('PS_TWITTER_USERNAME') or !Configuration::deleteByName('PS_TWITTER_COUNT')
            or !parent::uninstall()
        ) {
            return false;
        }

        return true;
    }

    public function hookHeader()
    {
        $this->context->controller->addJS(($this->_path).'views/js/jquery.tweet.js');
    }

    public function hookDisplayFooterOne()
    {
        $this->smarty->assign(
            'username',
            Configuration::get('PS_TWITTER_USERNAME')
        );
        $this->smarty->assign(
            'count',
            Configuration::get('PS_TWITTER_COUNT')
        );
        $this->smarty->assign(
            'tw_this_path',
            $this->full_url."ajax.php"
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/blocktwitterazl.tpl'
        );
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
                )
            );
        }
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $fields = array();
        $fields['PS_TWITTER_USERNAME'] = Tools::getValue(
            'PS_TWITTER_USERNAME',
            Configuration::get('PS_TWITTER_USERNAME')
        );
        $fields['PS_TWITTER_COUNT'] = Tools::getValue(
            'PS_TWITTER_COUNT',
            Configuration::get('PS_TWITTER_COUNT')
        );
        $fields['PS_TW_CONSUMER_KEY'] = Tools::getValue(
            'PS_TW_CONSUMER_KEY',
            Configuration::get('PS_TW_CONSUMER_KEY')
        );
        $fields['PS_TW_CONSUMER_SECRET'] = Tools::getValue(
            'PS_TW_CONSUMER_SECRET',
            Configuration::get('PS_TW_CONSUMER_SECRET')
        );
        $fields['PS_TW_AT'] = Tools::getValue(
            'PS_TW_AT',
            Configuration::get('PS_TW_AT')
        );
        $fields['PS_TW_AT_SECRET'] = Tools::getValue(
            'PS_TW_AT_SECRET',
            Configuration::get('PS_TW_AT_SECRET')
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
        $helper->submit_action = 'submitBlockTwitterAzlModule';
        $helper->currentIndex
            = $this->context->link->getAdminLink(
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
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TWITTER_USERNAME',
                        'label' => $this->l('Twitter username'),
                        'required' => true,
                    ),
                    array(
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TWITTER_COUNT',
                        'label' => $this->l('Tweet\'s number'),
                        'required' => true,
                    ),
                    array(
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TW_CONSUMER_KEY',
                        'label' => $this->l('Consumer key'),
                        'required' => true,
                    ),
                    array(
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TW_CONSUMER_SECRET',
                        'label' => $this->l('Consumer secret'),
                        'required' => true,
                    ),
                    array(
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TW_AT',
                        'label' => $this->l('Access token'),
                        'required' => true,
                    ),
                    array(
                        'col' => 6,
                        'type' => 'text',
                        'name' => 'PS_TW_AT_SECRET',
                        'label' => $this->l('Access token secret'),
                        'required' => true,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }
}
