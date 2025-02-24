<?php

namespace Pyz\Yves\CheckoutPage\Plugin\Router;

use Spryker\Yves\Router\Route\RouteCollection;
use SprykerShop\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin as SprykerCheckoutPageRouteProviderPlugin;

class CheckoutPageRouteProviderPlugin extends SprykerCheckoutPageRouteProviderPlugin
{
    public const ROUTE_NAME_CHECKOUT_ORDER_NAME = 'checkout-order-name';

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = parent::addRoutes($routeCollection);

        $routeCollection = $this->addCheckoutOrderNameStepRoute($routeCollection);

        return $routeCollection;
    }

    protected function addCheckoutOrderNameStepRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/checkout/order-name', 'CheckoutPage', 'Checkout', 'orderNameAction');
        $route = $route->setMethods(['GET', 'POST']);

        $routeCollection->add(static::ROUTE_NAME_CHECKOUT_ORDER_NAME, $route);

        return $routeCollection;
    }
}
