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

class AppController
{

    public $Megamenu; //instance of Module

    public function __construct()
    {
        require_once(_MEGAMENU_MODULE_DIR_.'megamenu.php');

        $this->Megamenu = new Megamenu();

        $this->Megamenu->oContext->smarty->assign(
            array(
                'baseURL' => $this->Megamenu->getModuleLink(),
            )
        );
        //$this->oContext = $this->context;
    }

    protected function l($string)
    {
        return $this->Megamenu->l($string);
    }

    protected function pr($data, $return = true)
    {
        echo '<pre>'.print_r($data, $return).'</pre>';
    }

    protected function setFlash($message, $type = 'info')
    {
        $context = Context::getContext();
        $context->cookie->__set('megamenu_flash_message', $message);
        $context->cookie->__set('megamenu_flash_message_type', $type);
    }

    protected function getFlash()
    {
        $context = Context::getContext();
        //echo '<pre>'.print_r($context->cookie,1);
        $flashMessage = $context->cookie->megamenu_flash_message;
        
        $flashMessageType = $context->cookie->megamenu_flash_message_type;
        $context->cookie->megamenu_flash_message = '';
        $this->Megamenu->oContext->smarty->assign(
            array('flashMessage' => $flashMessage, 'flashMessageType' => $flashMessageType)
        );
        return $flashMessage;
    }

    protected function __redirect($urlParams)
    {
        $absoluteURL = $this->Megamenu->getModuleLink().'&'.http_build_query($urlParams);
        Tools::redirectAdmin($absoluteURL);
        exit();
    }
}
