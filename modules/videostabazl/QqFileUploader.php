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

class QqFileUploader
{
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

    public function __construct(
        array $allowedExtensions = array(),
        $sizeLimit = 10485760
    ) {
        $allowedExtensions = array_map(
            "strtolower",
            $allowedExtensions
        );

        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;

        $this->checkServerSettings();

        if (Tools::getIsset('qqfile')) {
            $this->file = new QqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new QqUploadedFileForm();
        } else {
            $this->file = false;
        }
    }

    public function getName()
    {
        if ($this->file) {
            return $this->file->getName();
        }
    }

    private function checkServerSettings()
    {
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit) {
            $size = max(
                1,
                $this->sizeLimit / 1024 / 1024
            ).'M';
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");
        }
    }

    private function toBytes($str)
    {
        $val = trim($str);
        $last = Tools::strtolower($str[Tools::strlen($str) - 1]);
        switch ($last) {
            case 'g':
                $val *= 1024;
            // no break
            case 'm':
                $val *= 1024;
            // no break
            case 'k':
                $val *= 1024;
        }

        return $val;
    }

    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    public function handleUpload(
        $uploadDirectory,
        $replaceOldFile = false
    ) {
        if (!is_writable($uploadDirectory)) {
            return array('error' => "Server error. Upload directory isn't writable.");
        }

        if (!$this->file) {
            return array('error' => 'No files were uploaded.');
        }

        $size = $this->file->getSize();

        if ($size == 0) {
            return array('error' => 'File is empty');
        }

        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }

        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        //$filename = md5(uniqid());
        $ext = @$pathinfo['extension'];        // hide notices if extension is empty

        if ($this->allowedExtensions
            && !in_array(
                Tools::strtolower($ext),
                $this->allowedExtensions
            )
        ) {
            $these = implode(
                ', ',
                $this->allowedExtensions
            );

            return array('error' => 'File has an invalid extension, it should be one of '.$these.'.');
        }

        if (!$replaceOldFile) {
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory.$filename.'.'.$ext)) {
                $filename .= rand(
                    10,
                    99
                );
            }
        }

        if ($this->file->save($uploadDirectory.$filename.'.'.$ext)) {
            return array(
                'success' => true,
                'filename' => $filename.'.'.$ext
            );
        } else {
            return array(
                'error' => 'Could not save uploaded file.'.'The upload was cancelled, or server error encountered'
            );
        }
    }
}
