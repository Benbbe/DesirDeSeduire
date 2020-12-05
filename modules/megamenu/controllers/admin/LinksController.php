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

class LinksController extends AppController
{

    public $moduleObject;

    public function __construct()
    {
        parent::__construct();
    }

    public function getcontent()
    {
        $action = Tools::getValue('mm-action');
        $action = !empty($action) ? $action : 'index';
        $this->$action();
        $this->getFlash();
        return 'links/'.$action;
    }

    public function edit()
    {
        $id_megamenu_link = Tools::getValue('id_megamenu_link');
        //$issubmit = Tools::getValue('submit-megamenu');
        $menuLink = new MegamenuLink($id_megamenu_link);
        if (Tools::isSubmit('submit-link')) {

            if ($id_megamenu_link) {
                if ($menuLink->doUpdate(Tools::getValue('menuLink'))) {
                    $this->setFlash($this->l('Link Updated successfully'), 'success');
                    
                } else {
                    $this->setFlash($this->l('There is some error occurs while updating the link'), 'danger');
                }
            } else {
                if ($menuLink->doAdd(Tools::getValue('menuLink'))) {
                    $this->setFlash($this->l('Link added successfully'), 'success');
                } else {
                    $this->setFlash($this->l('There is some error occurs while adding the link'), 'danger');
                }
            }
            $this->__redirect(array('mm-controller'=>'Links', 'mm-action'=>'index'));
        }
        $langId = Configuration::get('PS_LANG_DEFAULT');

        $this->Megamenu->oContext->smarty->assign(
            array(
                'languages'             => Language::getLanguages(false),
                'defaultFormLanguage'     => $langId,
                'id_megamenu_link'        => $id_megamenu_link,
                'menuLink'                => $menuLink,
            )
        );
    }

    public function index()
    {
        $linkObject = new MegamenuLink();
        $this->Megamenu->oContext->smarty->assign(
            array(
                'links' => $linkObject->getLinks($this->Megamenu->oContext->language->id),
            )
        );
    }

    public function delete()
    {
        $id_megamenu_link = Tools::getValue('id_megamenu_link');

        if ($id_megamenu_link) {
            $link = new MegamenuLink($id_megamenu_link);
            if ($link->doDelete()) {
                $this->setFlash($this->l('Link deleted successfully'), 'success');
            } else {
                $this->setFlash($this->l('Some error occurs while deleting the link'), 'danger');
            }
        } else {
            $this->setFlash($this->l('Link not exist'), 'danger');
        }
        $this->__redirect(array('mm-controller'=>'Links', 'mm-action'=>'index'));
    }
}
