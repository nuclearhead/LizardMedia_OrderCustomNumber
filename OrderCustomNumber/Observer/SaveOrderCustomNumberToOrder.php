<?php
namespace LizardMedia\OrderCustomNumber\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\Quote;
use Magento\Quote\Model\QuoteRepository;

/**
 * Class SaveOrderCustomNumberToOrder
 * @package LizardMedia\OrderCustomNumber\Observer
 */
class SaveOrderCustomNumberToOrder implements ObserverInterface
{
    /**
     * @var QuoteRepository
     */
    protected QuoteRepository $quoteRepository;

    /**
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param EventObserver $observer
     * @return $this|ObserverInterface
     */
    public function execute(EventObserver $observer) : ObserverInterface
    {
        $order = $observer->getOrder();
        /** @var Quote $quote */
        $quote = $this->quoteRepository->get($order->getQuoteId());
        $order->setOrderCustomNumber($quote->getOrderCustomNumber());

        return $this;
    }
}
