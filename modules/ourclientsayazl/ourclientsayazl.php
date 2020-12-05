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

include_once(_PS_MODULE_DIR_.'ourclientsayazl/OurClientsSayAzl.php');

class OurClientSayAzl extends Module
{
    private $html = '';

    public function __construct()
    {
        $this->name = 'ourclientsayazl';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Azelab';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Testimonials');
        $this->description = $this->l('Block clients testimonials');
        $this->ps_versions_compliancy = array(
            'min' => '1.6.0.4',
            'max' => _PS_VERSION_
        );
    }

    /**
     * @see Module::install()
     */
    public function install()
    {
        /* Adds Module */
        if (parent::install() && $this->registerHook('displayFooterColumn')) {
            /* Sets up configuration */
            $res = Configuration::updateValue(
                'OURCLIENT_WIDTH',
                '779'
            );
            $res &= Configuration::updateValue(
                'OURCLIENT_SPEED',
                '500'
            );
            $res &= Configuration::updateValue(
                'OURCLIENT_PAUSE',
                '3000'
            );
            $res &= Configuration::updateValue(
                'OURCLIENT_LOOP',
                '1'
            );
            /* Creates tables */
            $res &= $this->createTables();

            /* Adds samples */
            if ($res) {
                $this->installSamples();
            }

            // Disable on mobiles and tablets
            $this->disableDevice(Context::DEVICE_MOBILE);

            return (bool)$res;
        }

        return false;
    }

    /**
     * Adds samples
     */
    private function installSamples()
    {
        $sample = array(
            1 => array(
                'title' => 'John Doe'
            ),
            2 => array(
                'title' => 'Nina Mila'
            ),
            3 => array(
                'title' => 'Thomas Doe'
            ),
            4 => array(
                'title' => 'Edgar Ibrahimov'
            ),
        );

        $languages = Language::getLanguages(false);
        for ($i = 1; $i <= 4; ++$i) {
            $client = new OurClientsSayAzl();
            $client->position = $i;
            $client->active = 1;
            foreach ($languages as $language) {
                $client->title[$language['id_lang']] = $sample[$i]['title'];
                $client->description[$language['id_lang']]
                    = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et 
dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p>';
                $client->image[$language['id_lang']] = 'sample-'.$i.'.jpg';
            }
            $client->add();
        }
    }

    /**
     * @see Module::uninstall()
     */
    public function uninstall()
    {
        /* Deletes Module */
        if (parent::uninstall()) {
            /* Deletes tables */
            $res = $this->deleteTables();
            /* Unsets configuration */
            $res &= Configuration::deleteByName('OURCLIENT_WIDTH');
            $res &= Configuration::deleteByName('OURCLIENT_SPEED');
            $res &= Configuration::deleteByName('OURCLIENT_PAUSE');
            $res &= Configuration::deleteByName('OURCLIENT_LOOP');

            return (bool)$res;
        }

        return false;
    }

    /**
     * Creates tables
     */
    protected function createTables()
    {
        /* Clients */
        $res = (bool)Db::getInstance()->execute(
            '
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ourclientsayazl` (
                `id_ourclientsayazl_clients` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_ourclientsayazl_clients`, `id_shop`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        '
        );

        /* Clients configuration */
        $res &= Db::getInstance()->execute(
            '
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ourclientsayazl_clients` (
              `id_ourclientsayazl_clients` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `position` int(10) unsigned NOT NULL DEFAULT \'0\',
              `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
              PRIMARY KEY (`id_ourclientsayazl_clients`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        '
        );

        /* Clients lang configuration */
        $res &= Db::getInstance()->execute(
            '
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ourclientsayazl_clients_lang` (
              `id_ourclientsayazl_clients` int(10) unsigned NOT NULL,
              `id_lang` int(10) unsigned NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,


              `image` varchar(255) NOT NULL,
              PRIMARY KEY (`id_ourclientsayazl_clients`,`id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        '
        );

        return $res;
    }

    /**
     * deletes tables
     */
    protected function deleteTables()
    {
        $clients = $this->getClients();
        foreach ($clients as $client) {
            $to_del = new OurClientsSayAzl($client['id_client']);
            $to_del->delete();
        }

        return Db::getInstance()->execute(
            '
            DROP TABLE IF EXISTS `'._DB_PREFIX_.'ourclientsayazl`, `'._DB_PREFIX_.'ourclientsayazl_clients`, `'
            ._DB_PREFIX_.'ourclientsayazl_clients_lang`;
        '
        );
    }

    public function getContent()
    {
        $this->html .= $this->headerHTML();

        /* Validate & process */
        if (Tools::isSubmit('submitClient') || Tools::isSubmit('delete_id_client') || Tools::isSubmit('changeStatus')) {
            if ($this->postValidation()) {
                $this->postProcess();
                $this->html .= $this->renderList();
            } else {
                $this->html .= $this->renderAddForm();
            }

            $this->clearCache();
        } elseif (Tools::isSubmit('addClient')
            || (Tools::isSubmit('id_client')
                && $this->clientExists(
                    (int)Tools::getValue('id_client')
                ))
        ) {
            $this->html .= $this->renderAddForm();
        } else {
            //            $this->html .= $this->renderForm();
            $this->html .= $this->renderList();
        }

        return $this->html;
    }

    private function postValidation()
    {
        $errors = array();

        /* Validation for Client configuration */
        if (Tools::isSubmit('changeStatus')) {
            if (!Validate::isInt(Tools::getValue('id_client'))) {
                $errors[] = $this->l('Invalid client');
            }
        } /* Validation for Client */ elseif (Tools::isSubmit('submitClient')) {
            /* Checks state (active) */
            if (!Validate::isInt(Tools::getValue('active_client'))
                || (Tools::getValue('active_client') != 0
                    && Tools::getValue('active_client') != 1)
            ) {
                $errors[] = $this->l('Invalid client state.');
            }
            /* Checks position */
            if (!Validate::isInt(Tools::getValue('position')) || (Tools::getValue('position') < 0)) {
                $errors[] = $this->l('Invalid client position.');
            }
            /* If edit : checks id_client */
            if (Tools::isSubmit('id_client')) {

                //d(var_dump(Tools::getValue('id_client')));
                if (!Validate::isInt(Tools::getValue('id_client'))
                    && !$this->clientExists(
                        Tools::getValue('id_client')
                    )
                ) {
                    $errors[] = $this->l('Invalid client ID');
                }
            }
            /* Checks title/url/legend/description/image */
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                if (Tools::strlen(Tools::getValue('title_'.$language['id_lang'])) > 255) {
                    $errors[] = $this->l('The title is too long.');
                }

                if (Tools::strlen(Tools::getValue('description_'.$language['id_lang'])) > 4000) {
                    $errors[] = $this->l('The description is too long.');
                }

                if (Tools::getValue('image_'.$language['id_lang']) != null
                    && !Validate::isFileName(
                        Tools::getValue('image_'.$language['id_lang'])
                    )
                ) {
                    $errors[] = $this->l('Invalid filename.');
                }
                if (Tools::getValue('image_old_'.$language['id_lang']) != null
                    && !Validate::isFileName(
                        Tools::getValue('image_old_'.$language['id_lang'])
                    )
                ) {
                    $errors[] = $this->l('Invalid filename.');
                }
            }

            /* Checks title/url/legend/description for default lang */
            $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
            if (Tools::strlen(Tools::getValue('title_'.$id_lang_default)) == 0) {
                $errors[] = $this->l('The title is not set.');
            }

            if (!Tools::isSubmit('has_picture')
                && (!isset($_FILES['image_'.$id_lang_default])
                    || empty($_FILES['image_'.$id_lang_default]['tmp_name']))
            ) {
                $errors[] = $this->l('The image is not set.');
            }
            if (Tools::getValue('image_old_'.$id_lang_default)
                && !Validate::isFileName(
                    Tools::getValue('image_old_'.$id_lang_default)
                )
            ) {
                $errors[] = $this->l('The image is not set.');
            }
        } /* Validation for deletion */ elseif (Tools::isSubmit('delete_id_client')
            && (
                !Validate::isInt(
                    Tools::getValue('delete_id_client')
                )
                || !$this->clientExists((int)Tools::getValue('delete_id_client')))
        ) {
            $errors[] = $this->l('Invalid client ID');
        }

        /* Display errors if needed */
        if (count($errors)) {
            $this->html .= $this->displayError(
                implode(
                    '<br />',
                    $errors
                )
            );

            return false;
        }

        /* Returns if validation is ok */

        return true;
    }

    private function postProcess()
    {
        $errors = array();

        /* Processes Client */
        if (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_client')) {
            $client = new OurClientsSayAzl((int)Tools::getValue('id_client'));

            if ($client->active == 0) {
                $client->active = 1;
            } else {
                $client->active = 0;
            }

            $res = $client->update();
            $this->clearCache();

            $this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) :
                $this->displayError($this->l('The configuration could not be updated.')));
        } /* Processes Client */ elseif (Tools::isSubmit('submitClient')) {
            /* Sets ID if needed */
            if (Tools::getValue('id_client')) {
                $client = new OurClientsSayAzl((int)Tools::getValue('id_client'));
                if (!Validate::isLoadedObject($client)) {
                    $this->html .= $this->displayError($this->l('Invalid client ID'));

                    return false;
                }
            } else {
                $client = new OurClientsSayAzl();
            }
            /* Sets position */
            $client->position = (int)Tools::getValue('position');
            /* Sets active */
            $client->active = (int)Tools::getValue('active_client');

            /* Sets each langue fields */
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                $client->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
                $client->description[$language['id_lang']] = Tools::getValue('description_'.$language['id_lang']);

                /* Uploads image and sets client */
                $type = Tools::strtolower(
                    Tools::substr(
                        strrchr(
                            $_FILES['image_'.$language['id_lang']]['name'],
                            '.'
                        ),
                        1
                    )
                );
                $imagesize = @getimagesize($_FILES['image_'.$language['id_lang']]['tmp_name']);
                if (isset($_FILES['image_'.$language['id_lang']])
                    && isset($_FILES['image_'.$language['id_lang']]['tmp_name'])
                    && !empty($_FILES['image_'.$language['id_lang']]['tmp_name'])
                    && !empty($imagesize)
                    && in_array(
                        Tools::strtolower(
                            Tools::substr(
                                strrchr(
                                    $imagesize['mime'],
                                    '/'
                                ),
                                1
                            )
                        ),
                        array(
                            'jpg',
                            'gif',
                            'jpeg',
                            'png'
                        )
                    )
                    && in_array(
                        $type,
                        array(
                            'jpg',
                            'gif',
                            'jpeg',
                            'png'
                        )
                    )
                ) {
                    $temp_name = tempnam(
                        _PS_TMP_IMG_DIR_,
                        'PS'
                    );
                    $salt = sha1(microtime());
                    if ($error = ImageManager::validateUpload($_FILES['image_'.$language['id_lang']])) {
                        $errors[] = $error;
                    } elseif (!$temp_name
                        || !move_uploaded_file(
                            $_FILES['image_'.$language['id_lang']]['tmp_name'],
                            $temp_name
                        )
                    ) {
                        return false;
                    } elseif (!ImageManager::resize(
                        $temp_name,
                        dirname(__FILE__).'/views/img/'.$salt.'_'.$_FILES['image_'.$language['id_lang']]['name'],
                        null,
                        null,
                        $type
                    )
                    ) {
                        $errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
                    }
                    if (isset($temp_name)) {
                        @unlink($temp_name);
                    }
                    $client->image[$language['id_lang']] = $salt.'_'.$_FILES['image_'.$language['id_lang']]['name'];
                } elseif (Tools::getValue('image_old_'.$language['id_lang']) != '') {
                    $client->image[$language['id_lang']] = Tools::getValue('image_old_'.$language['id_lang']);
                }
            }

            /* Processes if no errors  */
            if (!$errors) {
                /* Adds */
                if (!Tools::getValue('id_client')) {
                    if (!$client->add()) {
                        $errors[] = $this->displayError($this->l('The client could not be added.'));
                    }
                } /* Update */ elseif (!$client->update()) {
                    $errors[] = $this->displayError($this->l('The client could not be updated.'));
                }
                $this->clearCache();
            }
        } /* Deletes */ elseif (Tools::isSubmit('delete_id_client')) {
            $client = new OurClientsSayAzl((int)Tools::getValue('delete_id_client'));
            $res = $client->delete();
            $this->clearCache();
            if (!$res) {
                $this->html .= $this->displayError('Could not delete.');
            } else {
                Tools::redirectAdmin(
                    $this->context->link->getAdminLink(
                        'AdminModules',
                        true
                    ).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name
                );
            }
        }

        /* Display errors if needed */
        if (count($errors)) {
            $this->html .= $this->displayError(
                implode(
                    '<br />',
                    $errors
                )
            );
        } elseif (Tools::isSubmit('submitClient') && Tools::getValue('id_client')) {
            Tools::redirectAdmin(
                $this->context->link->getAdminLink(
                    'AdminModules',
                    true
                ).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name
            );
        } elseif (Tools::isSubmit('submitClient')) {
            Tools::redirectAdmin(
                $this->context->link->getAdminLink(
                    'AdminModules',
                    true
                ).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name
            );
        }
    }

    private function prepareHook()
    {
        if (!$this->isCached(
            'ourclientsayazl.tpl',
            $this->getCacheId()
        )
        ) {
            $clients = $this->getClients(true);
            if (is_array($clients)) {
                foreach ($clients as &$client) {
                    $client['sizes'] = @getimagesize(
                        (dirname(__FILE__).DIRECTORY_SEPARATOR.'views/img'.DIRECTORY_SEPARATOR.$client['image'])
                    );
                    if (isset($client['sizes'][3]) && $client['sizes'][3]) {
                        $client['size'] = $client['sizes'][3];
                    }
                }
            }

            if (!$clients) {
                return false;
            }

            $this->smarty->assign(array('ourclientsayazl_clients' => $clients));
        }

        return true;
    }

    public function hookdisplayFooterColumn($params)
    {
        if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index') {
            return;
        }

        if (!$this->prepareHook()) {
            return false;
        }

        return $this->display(
            __FILE__,
            'views/templates/hook/ourclientsayazl.tpl',
            $this->getCacheId()
        );
    }

    public function clearCache()
    {
        $this->_clearCache('ourclientsayazl.tpl');
    }

    public function hookActionShopDataDuplication($params)
    {
        Db::getInstance()->execute(
            '
            INSERT IGNORE INTO '._DB_PREFIX_.'ourclientsayazl (id_ourclientsayazl_clients, id_shop)
            SELECT id_ourclientsayazl_clients, '.(int)$params['new_id_shop'].'
            FROM '._DB_PREFIX_.'ourclientsayazl
            WHERE id_shop = '.(int)$params['old_id_shop']
        );
        $this->clearCache();
    }

    public function headerHTML()
    {
        if (Tools::getValue('controller') != 'AdminModules' && Tools::getValue('configure') != $this->name) {
            return;
        }

        $this->context->controller->addJqueryUI('ui.sortable');
        /* Style & js for fieldset 'clients configuration' */
        $html
            = '<script type="text/javascript">
            $(function() {
                var $myClients = $("#clients");
                $myClients.sortable({
                    opacity: 0.6,
                    cursor: "move",
                    update: function() {
                        var order = $(this).sortable("serialize") + "&action=updateClientsPosition";
                        $.post("'.$this->context->shop->physical_uri.$this->context->shop->virtual_uri.'modules/'
            .$this->name.'/ajax_'.$this->name.'.php?secure_key='.$this->secure_key.'", order);
                        }
                    });
                $myClients.hover(function() {
                    $(this).css("cursor","move");
                    },
                    function() {
                    $(this).css("cursor","auto");
                });
            });
        </script>';

        return $html;
    }

    public function getNextPosition()
    {
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            '
            SELECT MAX(hss.`position`) AS `next_position`
            FROM `'._DB_PREFIX_.'ourclientsayazl_clients` hss, `'._DB_PREFIX_.'ourclientsayazl` hs
            WHERE hss.`id_ourclientsayazl_clients` = hs.`id_ourclientsayazl_clients` AND hs.`id_shop` = '
            .(int)$this->context->shop->id
        );

        return (++$row['next_position']);
    }

    public function getClients($active = null)
    {
        $this->context = Context::getContext();
        $id_shop = $this->context->shop->id;
        $id_lang = $this->context->language->id;

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
            SELECT hs.`id_ourclientsayazl_clients` as id_client, hssl.`image`, hss.`position`, hss.`active`,
            hssl.`description`, hssl.`title`, hssl.`image` FROM '._DB_PREFIX_.'ourclientsayazl hs
            LEFT JOIN '._DB_PREFIX_.'ourclientsayazl_clients hss
            ON (hs.id_ourclientsayazl_clients = hss.id_ourclientsayazl_clients)
            LEFT JOIN '._DB_PREFIX_.'ourclientsayazl_clients_lang hssl
            ON (hss.id_ourclientsayazl_clients = hssl.id_ourclientsayazl_clients)
            WHERE id_shop = '.(int)$id_shop.'
            AND hssl.id_lang = '.(int)$id_lang.($active ? ' AND hss.`active` = 1' : ' ').'
            ORDER BY hss.position'
        );
    }

    public function getAllImagesByClientsId(
        $id_clients,
        $active = null,
        $id_shop = null
    ) {
        $this->context = Context::getContext();
        $images = array();

        if (!isset($id_shop)) {
            $id_shop = $this->context->shop->id;
        }

        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
            SELECT hssl.`image`, hssl.`id_lang`
            FROM '._DB_PREFIX_.'ourclientsayazl hs
            LEFT JOIN '._DB_PREFIX_.'ourclientsayazl_clients hss
            ON (hs.id_ourclientsayazl_clients = hss.id_ourclientsayazl_clients)
            LEFT JOIN '._DB_PREFIX_.'ourclientsayazl_clients_lang hssl
            ON (hss.id_ourclientsayazl_clients = hssl.id_ourclientsayazl_clients)
            WHERE hs.`id_ourclientsayazl_clients` = '.(int)$id_clients.' AND hs.`id_shop` = '.(int)$id_shop.($active ?
                ' AND hss.`active` = 1' : ' ')
        );

        foreach ($results as $result) {
            $images[$result['id_lang']] = $result['image'];
        }

        return $images;
    }

    public function displayStatus(
        $id_client,
        $active
    ) {
        $title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
        $icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
        $class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
        $html = '<a class="btn '.$class.'" href="'.AdminController::$currentIndex.'&configure='
            .$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')
            .'&changeStatus&id_client='.(int)$id_client.'" title="'.$title.'"><i class="'.$icon.'"></i> '.$title
            .'</a>';

        return $html;
    }

    public function clientExists($id_client)
    {
        $req
            = 'SELECT hs.`id_ourclientsayazl_clients` as id_client
                FROM `'._DB_PREFIX_.'ourclientsayazl` hs
                WHERE hs.`id_ourclientsayazl_clients` = '.(int)$id_client;
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

        return ($row);
    }

    public function renderList()
    {
        $clients = $this->getClients();
        foreach ($clients as $key => $client) {
            $clients[$key]['status'] = $this->displayStatus(
                $client['id_client'],
                $client['active']
            );
        }

        $this->context->smarty->assign(
            array(
                'link' => $this->context->link,
                'clients' => $clients,
                'image_baseurl' => $this->_path.'views/img/'
            )
        );

        return $this->display(
            __FILE__,
            'views/templates/hook/list.tpl'
        );
    }

    public function renderAddForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Client information'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'file_lang',
                        'label' => $this->l('Select a file'),
                        'name' => 'image',
                        'lang' => true,
                        'desc' => $this->l(
                            sprintf(
                                'Maximum image size: %s.',
                                ini_get('upload_max_filesize')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Client title'),
                        'name' => 'title',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Description'),
                        'name' => 'description',
                        'autoload_rte' => true,
                        'lang' => true,
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enabled'),
                        'name' => 'active_client',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        if (Tools::isSubmit('id_client') && $this->clientExists((int)Tools::getValue('id_client'))) {
            $client = new OurClientsSayAzl((int)Tools::getValue('id_client'));
            $fields_form['form']['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_client'
            );
            $fields_form['form']['images'] = $client->image;

            $has_picture = true;

            foreach (Language::getLanguages(false) as $lang) {
                if (!isset($client->image[$lang['id_lang']])) {
                    $has_picture &= false;
                }
            }

            if ($has_picture) {
                $fields_form['form']['input'][] = array(
                    'type' => 'hidden',
                    'name' => 'has_picture'
                );
            }
        }

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitClient';
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
            'language' => array(
                'id_lang' => $language->id,
                'iso_code' => $language->iso_code
            ),
            'fields_value' => $this->getAddFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'image_baseurl' => $this->_path.'views/img/'
        );

        $helper->override_folder = '/';

        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'OURCLIENT_WIDTH' => Tools::getValue(
                'OURCLIENT_WIDTH',
                Configuration::get('OURCLIENT_WIDTH')
            ),
            'OURCLIENT_SPEED' => Tools::getValue(
                'OURCLIENT_SPEED',
                Configuration::get('OURCLIENT_SPEED')
            ),
            'OURCLIENT_PAUSE' => Tools::getValue(
                'OURCLIENT_PAUSE',
                Configuration::get('OURCLIENT_PAUSE')
            ),
            'OURCLIENT_LOOP' => Tools::getValue(
                'OURCLIENT_LOOP',
                Configuration::get('OURCLIENT_LOOP')
            ),
        );
    }

    public function getAddFieldsValues()
    {
        $fields = array();

        if (Tools::isSubmit('id_client') && $this->clientExists((int)Tools::getValue('id_client'))) {
            $client = new OurClientsSayAzl((int)Tools::getValue('id_client'));
            $fields['id_client'] = (int)Tools::getValue(
                'id_client',
                $client->id
            );
        } else {
            $client = new OurClientsSayAzl();
        }

        $fields['active_client'] = Tools::getValue(
            'active_client',
            $client->active
        );
        $fields['has_picture'] = true;

        $languages = Language::getLanguages(false);

        foreach ($languages as $lang) {
            $fields['image'][$lang['id_lang']] = Tools::getValue('image_'.(int)$lang['id_lang']);
            $fields['title'][$lang['id_lang']] = Tools::getValue(
                'title_'.(int)$lang['id_lang'],
                $client->title[$lang['id_lang']]
            );

            $fields['description'][$lang['id_lang']] = Tools::getValue(
                'description_'.(int)$lang['id_lang'],
                $client->description[$lang['id_lang']]
            );
        }

        return $fields;
    }
}
