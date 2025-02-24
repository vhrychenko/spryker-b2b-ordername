<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class OrderNameForm extends AbstractType
{
    public function getBlockPrefix(): string
    {
        return 'orderNameForm';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this
            ->addOrderNameField($builder, $options);
    }

    protected function addOrderNameField(FormBuilderInterface $builder, array $options): self
    {
        $builder->add(QuoteTransfer::ORDER_NAME, TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Order name cannot be blank.',
                ]),
                new Regex([
                    'pattern' => '/^[a-z0-9 ]+$/',
                    'message' => 'Order name can only contain lowercase letters (a-z) and numbers (0-9).',
                ]),
                new Length([
                    'max' => 30,
                    'maxMessage' => 'Order name cannot be longer than 30 characters.',
                ]),
            ],
        ]);

        return $this;
    }
}
