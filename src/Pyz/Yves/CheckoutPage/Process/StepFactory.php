<?php

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerStepFactory;

class StepFactory extends SprykerStepFactory
{
    public function getSteps(): array
    {
        return [
            $this->createEntryStep(),
            $this->createCustomerStep(),
            $this->createAddressStep(),
            $this->createOrderNameStep(),
            $this->createShipmentStep(),
            $this->createPaymentStep(),
            $this->createSummaryStep(),
            $this->createPlaceOrderStep(),
            $this->createSuccessStep(),
            $this->createErrorStep(),
        ];
    }

    public function createOrderNameStep(): OrderNameStep
    {
        return new OrderNameStep(
            CheckoutPageRouteProviderPlugin::ROUTE_NAME_CHECKOUT_ORDER_NAME,
            $this->getConfig()->getEscapeRoute(),
        );
    }
}
