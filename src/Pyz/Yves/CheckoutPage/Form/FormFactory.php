<?php

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\OrderNameForm;
use Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerFormFactory;

class FormFactory extends SprykerFormFactory
{
    public function createOrderNameFormCollection(): FormCollectionHandlerInterface
    {
        return $this->createFormCollection([
            OrderNameForm::class,
        ]);
    }
}
