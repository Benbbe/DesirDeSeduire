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
require_once(dirname(__FILE__).'/../../init.php');

class EzTweet
{
    /*************************************** config ***************************************/

    // Your Twitter App Consumer Key
    private $consumer_key = '';

    // Your Twitter App Consumer Secret
    private $consumer_secret = '';

    // Your Twitter App Access Token
    private $user_token = '';

    // Your Twitter App Access Token Secret
    private $user_secret = '';

    // Path to tmhOAuth libraries
    private $lib = './lib/';

    // Enable caching
    private $cache_enabled = true;

    // Cache interval (minutes)
    private $cache_interval = 15;

    // Path to writable cache directory
    private $cache_dir = './';

    // Enable debugging
    private $debug = true;

    /**************************************************************************************/

    public function __construct()
    {
        // Initialize paths and etc.
        $this->pathify($this->cache_dir);
        $this->pathify($this->lib);
        $this->message = '';

        // Set server-side debug params
        if ($this->debug === true) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
    }

    private function pathify(&$path)
    {
        // Ensures our user-specified paths are up to snuff
        $path = realpath($path).'/';
    }

    public function fetch()
    {
        echo Tools::jsonEncode(
            array(
                'response' => Tools::jsonDecode(
                    $this->getJSON(),
                    true
                ),
                'message' => ($this->debug) ? $this->message : false
            )
        );
    }

    private function getJSON()
    {
        if ($this->cache_enabled === true) {
            $CFID = $this->generateCFID();
            $cache_file = $this->cache_dir.$CFID;

            if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * (int)$this->cache_interval))) {
                return Tools::file_get_contents(
                    $cache_file,
                    FILE_USE_INCLUDE_PATH
                );
            } else {

                $JSONraw = $this->getTwitterJSON();
                $JSON = $JSONraw['response'];

                // Don't write a bad cache file if there was a CURL error
                if ($JSONraw['errno'] != 0) {
                    $this->consoleDebug($JSONraw['error']);

                    return $JSON;
                }

                if ($this->debug === true) {
                    // Check for twitter-side errors
                    $pj = Tools::jsonDecode(
                        $JSON,
                        true
                    );
                    if (isset($pj['errors'])) {
                        foreach ($pj['errors'] as $error) {
                            $message = 'Twitter Error: "'.$error['message'].'", Error Code #'.$error['code'];
                            $this->consoleDebug($message);
                        }

                        return false;
                    }
                }

                if (is_writable($this->cache_dir) && $JSONraw) {
                    if (file_put_contents(
                        $cache_file,
                        $JSON,
                        LOCK_EX
                    ) === false
                    ) {
                        $this->consoleDebug("Error writing cache file");
                    }
                } else {
                    $this->consoleDebug("Cache directory is not writable");
                }

                return $JSON;
            }
        } else {
            $JSONraw = $this->getTwitterJSON();

            if ($this->debug === true) {
                // Check for CURL errors
                if ($JSONraw['errno'] != 0) {
                    $this->consoleDebug($JSONraw['error']);
                }

                // Check for twitter-side errors
                $pj = Tools::jsonDecode(
                    $JSONraw['response'],
                    true
                );
                if (isset($pj['errors'])) {
                    foreach ($pj['errors'] as $error) {
                        $message = 'Twitter Error: "'.$error['message'].'", Error Code #'.$error['code'];
                        $this->consoleDebug($message);
                    }

                    return false;
                }
            }

            return $JSONraw['response'];
        }
    }

    private function generateCFID()
    {
        // The unique cached filename ID
        return md5(serialize(Tools::getAllValues())).'.json';
    }

    private function getTwitterJSON()
    {
        require $this->lib.'tmhOAuth.php';
        require $this->lib.'tmhUtilities.php';
        $k = $this->getK();
        $request = Tools::getValue('request');

        $tmhOAuth = new tmhOAuth(
            array(
                'host' => $request['host'],
                'consumer_key' => $k["consumer_key"],
                //$this->consumer_key,
                'consumer_secret' => $k["consumer_secret"],
                'user_token' => $k["access_token"],
                'user_secret' => $k["access_token_secret"],
                'curl_ssl_verifypeer' => false
            )
        );

        $url = $request['url'];
        $params = $request['parameters'];

        $tmhOAuth->request(
            'GET',
            $tmhOAuth->url($url),
            $params
        );

        return $tmhOAuth->response;
    }

    public function getK()
    {

        require_once(dirname(__FILE__).'/../../config/config.inc.php');
        require_once(dirname(__FILE__).'/../../init.php');
        include(dirname(__FILE__).'/blocktwitterazl.php');
        $keys = new BlockTwitterAzl();

        return $keys->getKeys();
    }

    private function consoleDebug($message)
    {
        if ($this->debug === true) {
            $this->message .= 'tweet.js: '.$message."\n";
        }
    }
}

$ezTweet = new EzTweet;
$ezTweet->fetch();
