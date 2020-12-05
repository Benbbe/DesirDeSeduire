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

define('BLOCKTAGSAZL_MAX_LEVEL', 3);

class BlockTagsAzl extends Module
{
    public function __construct()
    {
        $this->name = 'blocktagsazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Tags block Azelab');
        $this->description = $this->l('Adds a block containing your product tags.');
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        $success = (parent::install()
            && Configuration::updateValue(
                'BLOCKTAGSAZL_NBR',
                10
            ));

        if ($success) {
            // Hook the module either on the left or right column
            $theme = new Theme(Context::getContext()->shop->id_theme);
            if ((!$theme->default_left_column || !$this->registerHook('leftColumn'))
                && (!$theme->default_right_column
                    || !$this->registerHook('rightColumn'))
                && !$this->registerHook('footer')
            ) {
                // If there are no colums implemented by the templates, throw an error and uninstall the module
                $this->_errors[] = $this->l(
                    'This module need to be hooked in a column and your theme does not implement one'
                );
                parent::uninstall();

                return false;
            }
        }

        return $success;
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit('submitBlockTags')) {
            if (!($tagsNbr = Tools::getValue('BLOCKTAGSAZL_NBR')) || empty($tagsNbr)) {
                $output .= $this->displayError($this->l('Please complete the "Displayed tags" field.'));
            } elseif ((int)($tagsNbr) == 0) {
                $output .= $this->displayError($this->l('Invalid number.'));
            } else {
                Configuration::updateValue(
                    'BLOCKTAGSAZL_NBR',
                    (int)$tagsNbr
                );
                $output .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }

        return $output.$this->renderForm();
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
                        'label' => $this->l('Displayed tags'),
                        'name' => 'BLOCKTAGSAZL_NBR',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of tags you would like to see displayed in this block.')
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
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG'
        ) : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitBlockTags';
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
            'BLOCKTAGSAZL_NBR' => Tools::getValue(
                'BLOCKTAGSAZL_NBR',
                Configuration::get('BLOCKTAGSAZL_NBR')
            ),
        );
    }

    public function hookRightColumn($params)
    {
        return $this->hookLeftColumn($params);
    }

    /**
     * Returns module content for left column
     *
     * @param array $params Parameters
     *
     * @return string Content
     *
     */
    public function hookLeftColumn($params)
    {
        $tags = Tag::getMainTags(
            (int)($params['cookie']->id_lang),
            (int)(Configuration::get('BLOCKTAGSAZL_NBR'))
        );
        $max = -1;
        $min = -1;
        foreach ($tags as $tag) {
            if ($tag['times'] > $max) {
                $max = $tag['times'];
            }
            if ($tag['times'] < $min || $min == -1) {
                $min = $tag['times'];
            }
        }

        if ($min == $max) {
            $coef = $max;
        } else {
            $coef = (BLOCKTAGSAZL_MAX_LEVEL - 1) / ($max - $min);
        }

        if (!sizeof($tags)) {
            return false;
        }
        foreach ($tags as &$tag) {
            $tag['class'] = 'tag_level'.(int)(($tag['times'] - $min) * $coef + 1);
        }
        $this->smarty->assign(
            'tags',
            $tags
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/blocktagsazl.tpl'
        );
    }

    public function hookFooter($params)
    {
        return $this->hookLeftColumn($params);
    }
}
