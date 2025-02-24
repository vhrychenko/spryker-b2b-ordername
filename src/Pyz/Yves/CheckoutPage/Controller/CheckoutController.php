<?php

namespace Pyz\Yves\CheckoutPage\Controller;

use Pyz\Yves\CheckoutPage\CheckoutPageFactory;
use Spryker\Yves\Kernel\View\View;
use SprykerShop\Yves\CheckoutPage\Controller\CheckoutController as SprykerCheckoutController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CheckoutPageFactory getFactory()
 */
class CheckoutController extends SprykerCheckoutController
{
    public function orderNameAction(Request $request): RedirectResponse | View
    {
        $quoteValidationResponseTransfer = $this->canProceedCheckout();

        if (!$quoteValidationResponseTransfer->getIsSuccessful()) {
            $this->processErrorMessages($quoteValidationResponseTransfer->getMessages());

            return $this->redirectResponseInternal(static::ROUTE_CART);
        }

        $response = $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createCheckoutFormFactory()
                ->createOrderNameFormCollection(),
        );

        if (!is_array($response)) {
            return $response;
        }

        return $this->view(
            $response,
            [],
            '@CheckoutPage/views/order-name/order-name.twig',
        );
    }
}
