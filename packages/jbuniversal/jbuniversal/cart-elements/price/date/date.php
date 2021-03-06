<?php
/**
 * JBZoo App is universal Joomla CCK, application for YooTheme Zoo component
 * @package     jbzoo
 * @version     2.x Pro
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com,  All rights reserved.
 * @license     http://jbzoo.com/license-pro.php JBZoo Licence
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

App::getInstance('zoo')->loader->register('JBCartElementPriceOption', 'cart-elements:price/option/option.php');

/**
 * Class JBCartElementPriceDate
 */
class JBCartElementPriceDate extends JBCartElementPriceOption
{
    const EDIT_DATE_FORMAT = '%Y-%m-%d %H:%M';

    /**
     * Check if element has options.
     * @return bool
     */
    public function hasOptions()
    {
        return false;
    }

    /**
     * @param  array $params
     * @return bool
     */
    public function hasFilterValue($params = array())
    {
        return false;
    }

}
