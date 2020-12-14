<?php

namespace LizardMedia\OrderCustomNumber\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * Class Uninstall
 * @package LizardMedia\OrderCustomNumber\Setup
 */
class Uninstall implements UninstallInterface
{
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // @todo implement

        $setup->endSetup();
    }
}
