<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.com)
 * @license    https://www.coreshop.com/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Payum\UnzerBundle\Form\Payment;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Gateway configuration of the Unzer factory. The block prefix `unzer` is what the
 * Studio payment provider UI requests from the form schema endpoint.
 */
final class UnzerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paymentType', ChoiceType::class, [
                'label' => 'unzer_payment_type',
                'choices' => [
                    'unzer_payment_type_card' => 'card',
                    'unzer_payment_type_paypal' => 'paypal',
                    'unzer_payment_type_sofort' => 'sofort',
                ],
                'constraints' => [
                    new NotBlank(['groups' => 'coreshop']),
                ],
            ])
            ->add('privateKey', TextType::class, [
                'label' => 'unzer_private_key',
                'constraints' => [
                    new NotBlank(['groups' => 'coreshop']),
                ],
            ])
            ->add('publicKey', TextType::class, [
                'label' => 'unzer_public_key',
                'constraints' => [
                    new NotBlank(['groups' => 'coreshop']),
                ],
            ])
            ->add('sandboxMode', CheckboxType::class, [
                'label' => 'unzer_sandbox_mode',
                'required' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'unzer';
    }
}
