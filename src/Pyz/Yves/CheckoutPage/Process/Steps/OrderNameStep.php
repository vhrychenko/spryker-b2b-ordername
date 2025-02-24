<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\AbstractBaseStep;
use Symfony\Component\HttpFoundation\Request;

class OrderNameStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
{
    public function requireInput(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer): AbstractTransfer
    {
        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer): bool
    {
        return !is_null($quoteTransfer->getOrderName());
    }

    public function getBreadcrumbItemTitle(): string
    {
        return 'checkout.step.order-name.title';
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return true
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $quoteTransfer): bool
    {
        return !is_null($quoteTransfer->getOrderName());
    }

    public function isBreadcrumbItemHidden(AbstractTransfer $quoteTransfer): bool
    {
        return false;
    }
}
