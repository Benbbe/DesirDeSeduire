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

class OurClientsSayAzl extends ObjectModel
{
    public $title;
    public $description;
    public $image;
    public $active;
    public $position;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition
        = array(
            'table' => 'ourclientsayazl_clients',
            'primary' => 'id_ourclientsayazl_clients',
            'multilang' => true,
            'fields' => array(
                'active' => array(
                    'type' => self::TYPE_BOOL,
                    'validate' => 'isBool',
                    'required' => true
                ),
                'position' => array(
                    'type' => self::TYPE_INT,
                    'validate' => 'isunsignedInt',
                    'required' => true
                ),

                // Lang fields
                'description' => array(
                    'type' => self::TYPE_HTML,
                    'lang' => true,
                    'validate' => 'isCleanHtml',
                    'size' => 4000
                ),
                'title' => array(
                    'type' => self::TYPE_STRING,
                    'lang' => true,
                    'validate' => 'isCleanHtml',
                    'required' => true,
                    'size' => 255
                ),
                'image' => array(
                    'type' => self::TYPE_STRING,
                    'lang' => true,
                    'validate' => 'isCleanHtml',
                    'size' => 255
                ),
            )
        );

    public function __construct(
        $id_client = null,
        $id_lang = null,
        $id_shop = null
    ) {
        parent::__construct(
            $id_client,
            $id_lang,
            $id_shop
        );
    }

    public function add(
        $autodate = true,
        $null_values = false
    ) {
        $context = Context::getContext();
        $id_shop = $context->shop->id;

        $res = parent::add(
            $autodate,
            $null_values
        );
        $res &= Db::getInstance()->execute(
            '
            INSERT INTO `'._DB_PREFIX_.'ourclientsayazl` (`id_shop`, `id_ourclientsayazl_clients`)
            VALUES('.(int)$id_shop.', '.(int)$this->id.')'
        );

        return $res;
    }

    public function delete()
    {
        $res = true;

        $images = $this->image;
        foreach ($images as $image) {
            if (
                preg_match(
                    '/sample/',
                    $image
                ) === 0
            ) {
                if ($image && file_exists(dirname(__FILE__).'/views/img/'.$image)) {
                    $res &= @unlink(dirname(__FILE__).'/views/img/'.$image);
                }
            }
        }

        $res &= $this->reOrderPositions();

        $res &= Db::getInstance()->execute(
            '
            DELETE FROM `'._DB_PREFIX_.'ourclientsayazl`
            WHERE `id_ourclientsayazl_clients` = '.(int)$this->id
        );

        $res &= parent::delete();

        return $res;
    }

    public function reOrderPositions()
    {
        $id_client = $this->id;
        $context = Context::getContext();
        $id_shop = $context->shop->id;

        $max = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
            SELECT MAX(hss.`position`) as position
            FROM `'._DB_PREFIX_.'ourclientsayazl_clients` hss, `'._DB_PREFIX_.'ourclientsayazl` hs
            WHERE hss.`id_ourclientsayazl_clients` = hs.`id_ourclientsayazl_clients` AND hs.`id_shop` = '.(int)$id_shop
        );

        if ((int)$max == (int)$id_client) {
            return true;
        }

        $rows = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
            SELECT hss.`position` as position, hss.`id_ourclientsayazl_clients` as id_client
            FROM `'._DB_PREFIX_.'ourclientsayazl_clients` hss
            LEFT JOIN `'._DB_PREFIX_.'ourclientsayazl` hs
            ON (hss.`id_ourclientsayazl_clients` = hs.`id_ourclientsayazl_clients`)
            WHERE hs.`id_shop` = '.(int)$id_shop.' AND hss.`position` > '.(int)$this->position
        );

        foreach ($rows as $row) {
            $current_client = new OurClientsSayAzl($row['id_client']);
            --$current_client->position;
            $current_client->update();
            unset($current_client);
        }

        return true;
    }
}
