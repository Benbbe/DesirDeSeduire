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

class BlockcontactinfosAzl extends Module
{
    protected static $contact_fields
        = array(
            'BLOCKCONTACTINFOSAZL_COMPANY',
            'BLOCKCONTACTINFOSAZL_ADDRESS',
            'BLOCKCONTACTINFOSAZL_PHONE',
            'BLOCKCONTACTINFOSAZL_EMAIL',
            'BLOCKCONTACTINFOSAZL_SKYPE',
            'BLOCKCONTACTINFOSAZL_MOBILE',
        );
    public $imageType;

    public function __construct()
    {
        $this->name = 'blockcontactinfosazl';
        $this->author = 'Azelab';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Contact information block Azelab');
        $this->description = $this->l(
            'This module will allow you to display your e-store\'s contact information in a customizable block.'
        );
        $this->ps_versions_compliancy = array(
            'min' => '1.6',
            'max' => _PS_VERSION_
        );
    }

    public function install()
    {
        Configuration::updateValue(
            'BLOCKCONTACTINFOSAZL_COMPANY',
            'Milan Premium Theme'
        );
        Configuration::updateValue(
            'BLOCKCONTACTINFOSAZL_ADDRESS',
            'Milan, Allensteinerstr.26'
        );
        Configuration::updateValue(
            'BLOCKCONTACTINFOSAZL_PHONE',
            '+1 (123) 1234567'
        );
        Configuration::updateValue(
            'BLOCKCONTACTINFOSAZL_EMAIL',
            ''
        );
        $this->_clearCache('blockcontactinfosazl.tpl');

        return (parent::install() && $this->registerHook('header') && $this->registerHook('displayFooterTwo')
            && $this->registerHook('displayContactUsTop')
            && $this->registerHook('displayContactUsSide')
            && $this->installDB()
            && $this->copyEmployees());
    }

    public function installDB()
    {
        return Db::getInstance()->execute(
            '
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blockcontactinfosazl` (
`id_employee` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_source_imployee` INT(10) UNSIGNED NOT NULL DEFAULT "0",
`image` VARCHAR(255) NULL DEFAULT NULL,
`name` VARCHAR(255) NULL DEFAULT NULL,
`email` VARCHAR(100) NULL DEFAULT NULL,
`phone` VARCHAR(100) NULL DEFAULT NULL,
`mobile` VARCHAR(100) NULL DEFAULT NULL,
`skype` VARCHAR(100) NULL DEFAULT NULL,
`role` VARCHAR(100) NULL DEFAULT NULL,
`position` INT(11) NULL DEFAULT NULL,
PRIMARY KEY (`id_employee`)
)
ENGINE='._MYSQL_ENGINE_.';'
        );
    }

    public function copyEmployees()
    {
        if ($employees = EmployeeCore::getEmployees()) {
            foreach ($employees as $emp) {
                $sql
                    = "SELECT * FROM `"._DB_PREFIX_."blockcontactinfosazl` WHERE `id_source_imployee`='"
                    .$emp['id_employee']."'";
                if (!Db::getInstance()->executeS($sql)
                ) {
                    if ($model = new EmployeeCore(
                        $emp['id_employee'],
                        Context::getContext()->language->id
                    )
                    ) {
                        $sql = "INSERT INTO `"._DB_PREFIX_."blockcontactinfosazl`
                        (`name`,`email`,`id_source_imployee`) VALUES ('{$model->firstname} {$model->lastname}',
                         '{$model->email}', '{$model->id}');";
                        Db::getInstance()->execute($sql);
                    }
                }
            }
        }

        return true;
    }

    public function uninstall()
    {
        foreach (BlockcontactinfosAzl::$contact_fields as $field) {
            Configuration::deleteByName($field);
        }

        return (parent::uninstall() && $this->uninstallDB());
    }

    public function uninstallDB($drop_table = true)
    {
        $ret = true;
        if ($drop_table) {
            $ret &= Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'blockcontactinfosazl`');
        }

        return $ret;
    }

    public function getContent()
    {
        $html = '';
        if (Tools::isSubmit('submitModule')) {
            foreach (BlockcontactinfosAzl::$contact_fields as $field) {
                Configuration::updateValue(
                    $field,
                    Tools::getValue($field)
                );
            }
            $this->_clearCache('blockcontactinfosazl.tpl');
            $html = $this->displayConfirmation($this->l('Configuration updated'));
        }

        return $html.$this->renderForm().$this->renderEmployeeForm();
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
                        'label' => $this->l('Company name'),
                        'name' => 'BLOCKCONTACTINFOSAZL_COMPANY',
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Address'),
                        'name' => 'BLOCKCONTACTINFOSAZL_ADDRESS',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Phone number'),
                        'name' => 'BLOCKCONTACTINFOSAZL_PHONE',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Mobile number'),
                        'name' => 'BLOCKCONTACTINFOSAZL_MOBILE',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Email'),
                        'name' => 'BLOCKCONTACTINFOSAZL_EMAIL',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Skype'),
                        'name' => 'BLOCKCONTACTINFOSAZL_SKYPE',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save')
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
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => array(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        foreach (BlockcontactinfosAzl::$contact_fields as $field) {
            $helper->tpl_vars['fields_value'][$field] = Tools::getValue(
                $field,
                Configuration::get($field)
            );
        }

        return $helper->generateForm(array($fields_form));
    }

    public function renderEmployeeForm()
    {
        $this->postProcess();
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => (Tools::getValue('id_employee') && !Tools::isSubmit('submitEployee')) ?
                        $this->l('Update Employee') : $this->l('New Employee'),
                    'icon' => 'icon-user'
                ),
                'input' => array(
                    array(
                        'type' => 'hidden',
                        'name' => 'id_employee',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Name'),
                        'name' => 'name',
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Email'),
                        'name' => 'email',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Phone'),
                        'name' => 'phone',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Mobile'),
                        'name' => 'mobile',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Skype'),
                        'name' => 'skype',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Role'),
                        'name' => 'role',
                    ),
                    array(
                        'type' => 'file',
                        'label' => $this->l('Image'),
                        'name' => 'image',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
                'buttons' => array(
                    array(
                        'href' => AdminController::$currentIndex.'&configure='.$this->name.'&importFromEmployes&token='
                            .Tools::getAdminTokenLite('AdminModules'),
                        'title' => $this->l('Import from employees'),
                        'icon' => 'process-icon-import'
                    )
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
        $helper->submit_action = 'submitEployee';
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => array(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        if (Tools::getValue('id_employee') && !Tools::isSubmit('submitEployee')) {
            $sql = 'SELECT * FROM `'._DB_PREFIX_.'blockcontactinfosazl` WHERE `id_employee`="'.Tools::getValue(
                'id_employee'
            ).'" LIMIT 1';
            $model = Db::getInstance()->executeS($sql);
            if (isset($model[0])) {
                foreach ($model[0] as $key => $value) {
                    $helper->tpl_vars['fields_value'][$key] = $value;
                }
            } else {
                $helper->tpl_vars['fields_value']['id_employee'] = null;
                $helper->tpl_vars['fields_value']['name'] = null;
                $helper->tpl_vars['fields_value']['email'] = null;
                $helper->tpl_vars['fields_value']['phone'] = null;
                $helper->tpl_vars['fields_value']['mobile'] = null;
                $helper->tpl_vars['fields_value']['skype'] = null;
                $helper->tpl_vars['fields_value']['role'] = null;
            }
        } else {
            $helper->tpl_vars['fields_value']['id_employee'] = null;
            $helper->tpl_vars['fields_value']['name'] = null;
            $helper->tpl_vars['fields_value']['email'] = null;
            $helper->tpl_vars['fields_value']['phone'] = null;
            $helper->tpl_vars['fields_value']['mobile'] = null;
            $helper->tpl_vars['fields_value']['skype'] = null;
            $helper->tpl_vars['fields_value']['role'] = null;
        }
        foreach (BlockcontactinfosAzl::$contact_fields as $field) {
            $helper->tpl_vars['fields_value'][$field] = Tools::getValue(
                $field,
                Configuration::get($field)
            );
        }

        $sql = 'SELECT * FROM `'._DB_PREFIX_.'blockcontactinfosazl`';
        $rows = Db::getInstance()->executeS($sql);
        $table = new HelperListCore();
        $table->shopLinkType = '';
        $table->simple_header = true;
        $table->identifier = 'id_employee';
        $table->actions = array(
            'edit',
            'delete'
        );
        $table->show_toolbar = true;
        $table->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        $table->token = Tools::getAdminTokenLite('AdminModules');
        $table->toolbar_btn = array(
            'import' => array(
                'href' => $table->currentIndex.'&amp;importFromEmployees&amp;token='.$table->token,
                'desc' => $this->l('Import from employees'),
            )
        );
        $table->title = $this->l('Emplyees');
        $table->table = $this->name;

        $fields_list = array(
            'id_employee' => array(
                'title' => $this->l('ID'),
                'type' => 'text',
            ),
            'image' => array(
                'title' => $this->l('Image'),
                'type' => 'image',
                'callback' => 'renderImage',
                'callback_object' => $this
            ),
            'name' => array(
                'title' => $this->l('Name'),
                'type' => 'text',
            ),
            'email' => array(
                'title' => $this->l('Email'),
                'type' => 'text',
            ),
            'phone' => array(
                'title' => $this->l('Phone'),
                'type' => 'text',
            ),
            'mobile' => array(
                'title' => $this->l('Mobile'),
                'type' => 'text',
            ),
            'skype' => array(
                'title' => $this->l('Skype'),
                'type' => 'text',
            ),
            'role' => array(
                'title' => $this->l('Role'),
                'type' => 'text',
            ),
        );
        $table->actions = array(
            'edit',
            'delete'
        );
        $html = $table->generateList(
            $rows,
            $fields_list
        );

        $html .= $helper->generateForm(array($fields_form));

        return $html;
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitEployee')) {
            $id = Tools::getValue('id_employee');
            $name = Tools::getValue('name');
            $email = Tools::getValue('email');
            $phone = Tools::getValue('phone');
            $mobile = Tools::getValue('mobile');
            $skype = Tools::getValue('skype');
            $role = Tools::getValue('role');
            $file_name = null;

            if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                if ($error = ImageManager::validateUpload(
                    $_FILES['image'],
                    4000000
                )
                ) {
                    $this->context->controller->warnings[] = $error;
                } else {
                    if (!is_dir(dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img')) {
                        if (!mkdir(
                            dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img',
                            0777,
                            true
                        )
                        ) {
                            $this->context->controller->warnings[] = $this->l(
                                'An error occurred while creating img folder.'
                            );
                        }
                    } elseif (!is_writable(dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img')) {
                        if (!chmod(
                            dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img',
                            0777
                        )
                        ) {
                            $this->context->controller->warnings[] = $this->l(
                                'An error occurred while chmod on img folder.'
                            );
                        }
                    }
                    $ext = Tools::substr(
                        $_FILES['image']['name'],
                        strrpos(
                            $_FILES['image']['name'],
                            '.'
                        ) + 1
                    );
                    $file_name = md5($_FILES['image']['name']).'.'.$ext;
                    if (!move_uploaded_file(
                        $_FILES['image']['tmp_name'],
                        dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img'.DIRECTORY_SEPARATOR.$file_name
                    )
                    ) {
                        $file_name = null;
                        $this->context->controller->warnings[] = $this->l(
                            'An error occurred while attempting to upload the file.'
                        );
                    }
                }
            }
            $update = false;
            if (!empty($id)) {
                $update = true;
                if (!empty($file_name)) {
                    $sql = "UPDATE `"._DB_PREFIX_."blockcontactinfosazl` SET `image`='{$file_name}',
                    `name`='{$name}', `email`='{$email}', `phone`='{$phone}', `mobile`='{$mobile}',
                    `skype`='{$skype}', `role`='{$role}' WHERE
                        `id_employee`={$id};";
                } else {
                    $sql = "UPDATE `"._DB_PREFIX_."blockcontactinfosazl` SET `name`='{$name}', `email`='{$email}',
                    `phone`='{$phone}', `mobile`='{$mobile}', `skype`='{$skype}', `role`='{$role}' WHERE
                    `id_employee`={$id};";
                }
            } else {
                $update = false;
                $sql = "INSERT INTO `"._DB_PREFIX_
                    ."blockcontactinfosazl` (`name`, `email`, `phone`, `mobile`, `skype`, `role`, `image`) "
                    ."VALUES ('{$name}', '{$email}', '{$phone}', '{$mobile}', '$skype', '{$role}', '{$file_name}');";
            }
            if ($res = Db::getInstance()->execute($sql)
            ) {
                if ($update) {
                    $this->context->controller->informations[] = $this->l('Update success');
                } else {
                    $this->context->controller->informations[] = $this->l('New employee added');
                }
            } else {
                if ($update) {
                    $this->context->controller->warnings[] = $this->l('Update failed');
                } else {
                    $this->context->controller->warnings[] = $this->l('Failed to add employee');
                }
            }

            return $res;
        }
        if (Tools::getIsset('deleteblockcontactinfosazl')) {
            $id = Tools::getValue('id_employee');
            $sql = "DELETE FROM `"._DB_PREFIX_."blockcontactinfosazl` WHERE `id_employee`=".(int)$id;
            if ($res = Db::getInstance()->execute($sql)
            ) {
                $this->context->controller->informations[] = $this->l('Employee deleted');
            } else {
                $this->context->controller->warnings[] = $this->l('Failed to delete employee');
            }

            return $res;
        }
        if (Tools::getIsset('importFromEmployes')) {
            $this->copyEmployees();
            Tools::redirectAdmin(
                AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite(
                    'AdminModules'
                )
            );
        }
    }

    public function hookDisplayFooterTwo($params)
    {
        if (!$this->isCached(
            'blockcontactinfosazl.tpl',
            $this->getCacheId()
        )
        ) {
            foreach (BlockcontactinfosAzl::$contact_fields as $field) {
                $this->smarty->assign(
                    Tools::strtolower($field),
                    Configuration::get($field)
                );
            }
        }

        return $this->display(
            __FILE__,
            '/views/templates/hook/blockcontactinfosazl.tpl',
            $this->getCacheId()
        );
    }

    public function hookDisplayContactUsTop($params)
    {
        if (!$this->isCached(
            'blockcontactinfos_contact_page.tpl',
            $this->getCacheId()
        )
        ) {
            foreach (BlockcontactinfosAzl::$contact_fields as $field) {
                $this->smarty->assign(
                    Tools::strtolower($field),
                    Configuration::get($field)
                );
            }
            $employees = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'blockcontactinfosazl`');
            foreach ($employees as $k => $v) {
                $employees[$k]['image'] = $this->renderImage(
                    $v['image'],
                    array(),
                    80,
                    ''
                );
            }
            $this->smarty->assign(
                array(
                    'employees' => $employees,
                    'nbEmployees' => count($employees)
                )
            );
        }

        return $this->display(
            __FILE__,
            '/views/templates/hook/blockcontactinfos_contact_page.tpl',
            $this->getCacheId()
        );
    }

    public function renderImage(
        $params,
        $array = null,
        $size = 45,
        $class = 'imgm img-thumbnail'
    ) {
        if (!is_null($array)) {
            if ($params) {
                $path_to_image = dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img'.DIRECTORY_SEPARATOR.$params;

                return self::thumbnail(
                    $path_to_image,
                    $this->name.'_mini_'.md5($path_to_image).'_'.$this->context->shop->id.'.'.$this->imageType,
                    $size,
                    $this->imageType,
                    true,
                    true,
                    $class
                );
            }
        }
    }

    /**
     * Generate a cached thumbnail for object lists (eg. carrier, order statuses...etc)
     *
     * @param string $image         Real image filename
     * @param string $cache_image   Cached filename
     * @param int    $size          Desired size
     * @param string $image_type    Image type
     * @param bool   $disable_cache When turned on a timestamp will be added to the image URI to disable the HTTP cache
     * @param bool   $regenerate    When turned on and the file already exist, the file will be regenerated
     *
     * @return string
     */
    public static function thumbnail(
        $image,
        $cache_image,
        $size,
        $image_type = 'jpg',
        $disable_cache = true,
        $regenerate = false,
        $class = ''
    ) {
        if (!file_exists($image)) {
            return '';
        }

        if (file_exists(_PS_TMP_IMG_DIR_.$cache_image) && $regenerate) {
            @unlink(_PS_TMP_IMG_DIR_.$cache_image);
        }

        if ($regenerate || !file_exists(_PS_TMP_IMG_DIR_.$cache_image)) {
            $infos = getimagesize($image);

            // Evaluate the memory required to resize the image: if it's too much, you can't resize it.
            if (!ImageManager::checkImageMemoryLimit($image)) {
                return false;
            }

            $x = $infos[0];
            $y = $infos[1];
            $max_x = $size * 3;
            $max_y = $size * 3;

            // Size is already ok
            if ($y < $size && $x <= $max_x) {
                copy(
                    $image,
                    _PS_TMP_IMG_DIR_.$cache_image
                );
            } else {
                $ratio_x = $x / ($y / $size);
                if ($ratio_x > $max_x) {
                    $ratio_x = $max_x;
                    $size = $y / ($x / $max_x);
                }

                $ratio_y = $y / ($x / $size);
                if ($ratio_y > $max_y) {
                    $ratio_y = $max_y;
                    $size = $x / ($y / $max_x);
                }
                ImageManager::resize(
                    $image,
                    _PS_TMP_IMG_DIR_.$cache_image,
                    $size,
                    $ratio_y,
                    $image_type
                );
            }
        }
        // Relative link will always work, whatever the base uri set in the admin
        if (Context::getContext()->controller->controller_type == 'admin') {
            return
                '<img src="../img/tmp/'.$cache_image.($disable_cache ? '?time='.time() : '').'" alt="" class="'.$class
                .'" />';
        } else {
            return
                '<img src="'._PS_TMP_IMG_.$cache_image.($disable_cache ? '?time='.time() : '').'" alt="" class="'.$class
                .'" />';
        }
    }

    public function hookDisplayContactUsSide($params)
    {
        if (!$this->isCached(
            'blockcontactinfos_company_info.tpl',
            $this->getCacheId()
        )
        ) {
            foreach (BlockcontactinfosAzl::$contact_fields as $field) {
                $this->smarty->assign(
                    Tools::strtolower($field),
                    Configuration::get($field)
                );
            }
        }

        return $this->display(
            __FILE__,
            '/views/templates/hook/blockcontactinfos_company_info.tpl',
            $this->getCacheId()
        );
    }
}
