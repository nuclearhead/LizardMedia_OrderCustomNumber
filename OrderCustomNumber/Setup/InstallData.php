<?php

namespace LizardMedia\OrderCustomNumber\Setup;

use Magento\Framework\DB\Ddl\Table as DdlTable;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Setup\SalesSetupFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var SalesSetupFactory
     */
    protected $salesSetupFactory;

    /**
     * @param SalesSetupFactory $salesSetupFactory
     */
    public function __construct(SalesSetupFactory $salesSetupFactory)
    {
        $this->salesSetupFactory = $salesSetupFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $salesSetup = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $installer]);

        $attrCode = 'order_custom_number';
        $salesSetup->addAttribute(Order::ENTITY, $attrCode, [
            'type' => DdlTable::TYPE_TEXT,
            'length' => 40,
            'visible' => true,
            'nullable' => false,
            'visible_on_front' => true,
            'is_searchable' => true,
            'is_filterable' => true,
            'is_visible_in_advanced_search' => true,
            'is_filterable_in_search' => true,
            'used_for_sort_by' => true,
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => true
        ]);

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            $attrCode,
            [
                'type' => DdlTable::TYPE_TEXT,
                'length' => 40,
                'comment' => 'Order Custom Number'
            ]
        );

        $installer->endSetup();
    }
}
