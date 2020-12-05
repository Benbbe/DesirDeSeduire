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

include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('videostabazl.php');
include_once('QqUploadedFileXhr.php');
include_once('QqUploadedFileForm.php');
include_once('QqFileUploader.php');

if (Tools::getValue('action') == 'deleteVideo' && Tools::getValue('id')) {

    if (Tools::getValue('videoType') == 1) {
        $row = Db::getInstance()->getRow(
            '
                SELECT video FROM `'._DB_PREFIX_.'videos_tab_mod`
                WHERE `id` = '. (int)(Tools::getValue('id')).''
        );

        if (file_exists('./uploads/'.$row['video'])) {
            unlink('./uploads/'.$row['video']);
        }
    }

    $query = Db::getInstance()->Execute(
        'DELETE FROM '._DB_PREFIX_.'videos_tab_mod WHERE `id`='.(int)(Tools::getValue('id'))
    );
    if ($query) {
        echo Tools::getValue('id');
    }
}

if (Tools::getValue('action') == 'submitEmbedVideo' && Tools::getValue('id_product') && Tools::getValue('embedCode')) {

    $query = Db::getInstance()->Execute(
        '
            INSERT INTO `'._DB_PREFIX_.'videos_tab_mod`
        (`id_product`, `type`, `video`) VALUES(
        '. (int)(Tools::getValue('id_product')).', 0,
        \''.urldecode(Tools::getValue('embedCode')).'\')'
    );

    $last_id = Db::getInstance()->Insert_ID();
    $data = array();
    $data['id'] = $last_id;
    $data['video'] = Tools::getValue('embedCode');
    if ($query) {
        print Tools::jsonEncode($data);
    }
}

if (Tools::getValue('action') == 'submitUploadVideo' && Tools::getValue('id_product')) {
    $allowedExtensions = array("mp4");
    $sizeLimit = 1024 * 1024;
    $uploader = new QqFileUploader(
        $allowedExtensions,
        $sizeLimit
    );
    $result = $uploader->handleUpload('uploads/');
    $filename = $uploader->getName();
    if (isset($result['success'])) {

        $query = Db::getInstance()->Execute(
            '
            INSERT INTO `'._DB_PREFIX_.'videos_tab_mod`
        (`id_product`, `type`, `video`) VALUES(
        '. (int)(Tools::getValue('id_product')).', 1,
        \''.$result['filename'].'\')'
        );

        $last_id = Db::getInstance()->Insert_ID();
        $result['id_video'] = $last_id;

        print Tools::jsonEncode($result);
    } else {
        print Tools::jsonEncode($result);
    }
}
