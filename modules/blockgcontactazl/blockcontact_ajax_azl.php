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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../classes/Mail.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/blockgcontactazl.php');

$context = Context::getContext();
// Instance of module class for translations
$module = new BlockgcontactAzl();

if (Configuration::get('PS_TOKEN_ENABLE') == 1 and strcmp(
    Tools::getToken(false),
    Tools::getValue('token')
)
) {
    exit($module->l(
        'invalid token',
        'blockgcontactazl'
    ));
}
$json = null;
$json['response'] = 1;
$from_email = Tools::getValue(
    'from_mail',
    ''
);
$from_name = Tools::getValue(
    'from_name',
    ''
);
$from_text = Tools::getValue(
    'from_text',
    ''
);
if (!Validate::isEmail($from_email) || empty($from_name) || empty($from_text)) {
    $json['response'] = 0;
    $json['message_error'] = '<div class="alert alert-danger alert-data-icon" data-icon="r"><div>'.$module->l(
        'Please type valid information'
    ).'</div></div>';
}

if ($json['response'] == 1) {
    $text = 'Name: '.$from_name."\n\r";
    $text .= 'E-mail: '.$from_email."\n\r";
    $text .= 'Message: '.$from_text;

    if (Mail::Send(
        $context->language->id,
        'contact_mail',
        $from_name,
        array('{text}' => $text),
        Configuration::get('EMAIL_TO_AZL'),
        null,
        null,
        null,
        null,
        null,
        dirname(__FILE__).'/mails/',
        false,
        $context->shop->id
    )
    ) {
        $json['message_success']
            = '<div class="alert alert-success alert-data-icon" data-icon="R"><div>Your message
        has been successfully sent.</div></div>';
    }
}

echo Tools::jsonEncode($json);

exit();
