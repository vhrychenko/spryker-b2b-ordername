<?php

namespace Pyz\Zed\Sales\Communication;

use Pyz\Zed\Sales\Communication\Table\OrdersTable;
use Spryker\Zed\Sales\Communication\SalesCommunicationFactory as SprykerSalesCommunicationFactory;
use Spryker\Zed\Sales\SalesDependencyProvider;

class SalesCommunicationFactory extends SprykerSalesCommunicationFactory
{
    public function createOrdersTable()
    {
        return new OrdersTable(
            $this->createOrdersTableQueryBuilder(),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_MONEY),
            $this->getProvidedDependency(SalesDependencyProvider::SERVICE_UTIL_SANITIZE),
            $this->getProvidedDependency(SalesDependencyProvider::SERVICE_DATE_FORMATTER),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_CUSTOMER),
            $this->getSalesTablePlugins(),
        );
    }
}
