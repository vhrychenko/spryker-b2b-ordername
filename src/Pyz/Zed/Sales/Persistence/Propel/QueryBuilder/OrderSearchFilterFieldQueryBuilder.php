<?php

namespace Pyz\Zed\Sales\Persistence\Propel\QueryBuilder;

use Orm\Zed\Sales\Persistence\Map\SpySalesOrderItemTableMap;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderTableMap;
use Pyz\Shared\OrderName\OrderNameConfig;
use Spryker\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilder as SprykerOrderSearchFilterFieldQueryBuilder;

class OrderSearchFilterFieldQueryBuilder extends SprykerOrderSearchFilterFieldQueryBuilder
{
    protected const ORDER_SEARCH_TYPE_MAPPING = [
        self::SEARCH_TYPE_ORDER_REFERENCE => SpySalesOrderTableMap::COL_ORDER_REFERENCE,
        self::SEARCH_TYPE_ITEM_NAME => SpySalesOrderItemTableMap::COL_NAME,
        self::SEARCH_TYPE_ITEM_SKU => SpySalesOrderItemTableMap::COL_SKU,
        OrderNameConfig::FILTER_FIELD_TYPE_ORDER_NAME => SpySalesOrderTableMap::COL_ORDER_NAME,
    ];

    protected const ORDER_BY_COLUMN_MAPPING = [
        self::SEARCH_TYPE_ORDER_REFERENCE => SpySalesOrderTableMap::COL_ID_SALES_ORDER,
        'date' => SpySalesOrderTableMap::COL_CREATED_AT,
        OrderNameConfig::FILTER_FIELD_TYPE_ORDER_NAME => SpySalesOrderTableMap::COL_ORDER_NAME,
    ];
}
