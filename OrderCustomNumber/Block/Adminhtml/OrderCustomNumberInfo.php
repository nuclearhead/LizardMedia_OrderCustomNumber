<?php

namespace LizardMedia\OrderCustomNumber\Block\Adminhtml;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class OrderCustomNumberInfo
 * @package LizardMedia\OrderCustomNumber\Block\Order
 */
class OrderCustomNumberInfo extends \Magento\Framework\View\Element\Template
{
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * OrderCustomNumberInfo constructor.
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }


    /**
     * Gets Order Custom Number
     *
     * @return string
     */
    public function getOrderCustomNumber() : string
    {
        $order = $this->_coreRegistry->registry('current_order');
        return $order->getOrderCustomNumber();
    }
}
