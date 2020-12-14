<?php
namespace LizardMedia\OrderCustomNumber\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Quote\Model\Quote;

/**
 * Class SaveOrderCustomNumberToOrder
 * @package LizardMedia\OrderCustomNumber\Observer
 */
class SaveOrderCustomNumberToOrder implements ObserverInterface
{
    /**
     * @var ObjectManagerInterface
     */
    protected ObjectManagerInterface $_objectManager;

    /**
     * @param ObjectManagerInterface $objectmanager
     */
    public function __construct(ObjectManagerInterface $objectmanager)
    {
        $this->_objectManager = $objectmanager;
    }

    /**
     * @param EventObserver $observer
     * @return $this|ObserverInterface
     */
    public function execute(EventObserver $observer) : ObserverInterface
    {
        $order = $observer->getOrder();
        $quoteRepository = $this->_objectManager->create('Magento\Quote\Model\QuoteRepository');
        /** @var Quote $quote */
        $quote = $quoteRepository->get($order->getQuoteId());
        $order->setOrderCustomNumber( $quote->getOrderCustomNumber() );

        return $this;
    }

}
