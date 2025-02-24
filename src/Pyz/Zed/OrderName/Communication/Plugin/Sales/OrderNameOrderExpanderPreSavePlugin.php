<?php

namespace Pyz\Zed\OrderName\Communication\Plugin\Sales;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Sales\Dependency\Plugin\OrderExpanderPreSavePluginInterface;

class OrderNameOrderExpanderPreSavePlugin extends AbstractPlugin implements OrderExpanderPreSavePluginInterface
{
    public function expand(SpySalesOrderEntityTransfer $salesOrderEntityTransfer, QuoteTransfer $quoteTransfer): SpySalesOrderEntityTransfer
    {
        /**
         * The logic is simple here. I see no sense to create facade method.
         */
        $salesOrderEntityTransfer->setOrderName($quoteTransfer->getOrderName());

        return $salesOrderEntityTransfer;
    }
}
