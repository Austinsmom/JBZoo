<?php
/**
 * JBZoo App is universal Joomla CCK, application for YooTheme Zoo component
 * @package     jbzoo
 * @version     2.x Pro
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com,  All rights reserved.
 * @license     http://jbzoo.com/license-pro.php JBZoo Licence
 * @coder       Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Class JBCartElementModifierOrderPriceDiscountCode
 */
class JBCartElementModifierOrderPriceDiscountCode extends JBCartElementModifierOrderPrice
{

    public function __construct($app, $type, $group)
    {
        parent::__construct($app, $type, $group);
        $this->registerCallback('ajaxSetCode');
    }

    /**
     * @return JBCartValue
     */
    public function getRate()
    {
        $list = $this->config->get('codelist');
        $list = $this->app->jbstring->parseLines($list);

        if (in_array($this->get('code'), $list)) {
            return $this->_order->val($this->config->get('rate'));
        }

        return $this->_order->val(0);
    }

    /**
     * @param array $params
     * @return string|void
     */
    public function renderSubmission($params = array())
    {
        if ($layout = $this->getLayout('submission.php')) {
            return self::renderLayout($layout, array(
                'params' => $params,
            ));
        }

        return null;
    }

    /**
     * @param $code
     */
    public function ajaxSetCode($code = null)
    {
        $this->bindData(array('code' => $code));

        $result = array('cart' => JBCart::getInstance()->recount());
        $this->app->jbajax->send($result);
    }
}