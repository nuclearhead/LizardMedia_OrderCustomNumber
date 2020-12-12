<?php

namespace LizardMedia\OrderCustomNumber\Observer;

use Magento\Framework\Event\Observer;
use Magento\Sales\Model\Order;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class SetOrderCustomNumber
 * @package LizardMedia\OrderCustomNumber\Observer
 */
class SetOrderCustomNumber implements ObserverInterface
{
    protected $_request;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_request = $request;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $params = $this->_request->getParams();
        /** @var Order $order */
        $order = $observer->getEvent()->getOrder();
        $order->setOrderCustomNumber("123_NUM");
        return $this;
    }
}
