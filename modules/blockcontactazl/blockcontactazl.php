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

class BlockcontactAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blockcontactazl';
        $this->author = 'Azelab';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Contact block');
        $this->description = $this->l('Allows you to add additional information about your store\'s customer service.');
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        return parent::install()
        && Configuration::updateValue(
            'BLOCKCONTACTAZL_TELNUMBER',
            ''
        )
        && Configuration::updateValue(
            'BLOCKCONTACTAZL_EMAIL',
            ''
        )
        && $this->registerHook('displayNavLeft');
    }

    public function uninstall()
    {
        // Delete configuration
        return Configuration::deleteByName('BLOCKCONTACTAZL_TELNUMBER')
        && Configuration::deleteByName('BLOCKCONTACTAZL_EMAIL')
        && parent::uninstall();
    }

    public function getContent()
    {
        $html = '';
        // If we try to update the settings
        if (Tools::isSubmit('submitModule')) {
            Configuration::updateValue(
                'BLOCKCONTACTAZL_TELNUMBER',
                Tools::getValue('blockcontactazl_telnumber')
            );
            Configuration::updateValue(
                'BLOCKCONTACTAZL_EMAIL',
                Tools::getValue('blockcontactazl_email')
            );
            $this->_clearCache('blockcontactazl.tpl');
            $html .= $this->displayConfirmation($this->l('Configuration updated'));
        }

        $html .= $this->renderForm();

        return $html;
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Telephone number'),
                        'name' => 'blockcontactazl_telnumber',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Email'),
                        'name' => 'blockcontactazl_email',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitModule';
        $helper->currentIndex
            = $this->context->link->getAdminLink(
                'AdminModules',
                false
            ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
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
            'blockcontactazl_telnumber' => Tools::getValue(
                'blockcontactazl_telnumber',
                Configuration::get('BLOCKCONTACTAZL_TELNUMBER')
            ),
            'blockcontactazl_email' => Tools::getValue(
                'blockcontactazl_email',
                Configuration::get('BLOCKCONTACTAZL_EMAIL')
            ),
        );
    }

    public function hookDisplayNavLeft($params)
    {
        $tpl = 'views/templates/hook/blockcontactazl';
        if (isset($params['blockcontactazl_tpl']) && $params['blockcontactazl_tpl']) {
            $tpl = $params['blockcontactazl_tpl'];
        }
        if (!$this->isCached(
            $tpl.'.tpl',
            $this->getCacheId()
        )
        ) {
            $this->context->smarty->assign(
                array(
                    'telnumber' => Configuration::get('BLOCKCONTACTAZL_TELNUMBER'),
                    'email' => Configuration::get('BLOCKCONTACTAZL_EMAIL')
                )
            );
        }

        return $this->display(
            __FILE__,
            $tpl.'.tpl',
            $this->getCacheId()
        );
    }
}
