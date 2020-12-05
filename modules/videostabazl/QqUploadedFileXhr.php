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
class QqUploadedFileXhr
{
    /**
     * Save the file to the specified path
     *
     * @return boolean TRUE on success
     */
    public function save($path)
    {
        $input = fopen(
            "php://input",
            "r"
        );
        $temp = tmpfile();
        $realSize = stream_copy_to_stream(
            $input,
            $temp
        );
        fclose($input);

        if ($realSize != $this->getSize()) {
            return false;
        }

        $target = fopen(
            $path,
            "w"
        );
        fseek(
            $temp,
            0,
            SEEK_SET
        );
        stream_copy_to_stream(
            $temp,
            $target
        );
        fclose($target);

        return true;
    }

    public function getName()
    {
        return Tools::getValue('qqfile');
    }

    public function getSize()
    {
        if (isset($_SERVER["CONTENT_LENGTH"])) {
            return (int)$_SERVER["CONTENT_LENGTH"];
        } else {
            throw new Exception('Getting content length is not supported.');
        }
    }
}
