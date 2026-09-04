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

namespace CoreShop\Payum\UnzerBundle\Extension;

use CoreShop\Component\Core\Model\OrderInterface;
use CoreShop\Component\Core\Model\PaymentInterface;
use Payum\Core\Extension\Context;
use Payum\Core\Extension\ExtensionInterface;
use Payum\Core\Request\Capture;
use Payum\Core\Request\RenderTemplate;
use Pimcore\Model\Document\Service;

/**
 * Renders the Unzer token page inside the shop layout and hands the order and the
 * nearest document of the order locale to the template.
 */
final class ObtainTokenExtension implements ExtensionInterface
{
    public function onPreExecute(Context $context): void
    {
        $request = $context->getRequest();

        if (!$request instanceof RenderTemplate) {
            return;
        }

        $request->setParameter('layout', '@CoreShopFrontend/layout.html.twig');

        $previousContexts = $context->getPrevious();

        if (count($previousContexts) === 0) {
            return;
        }

        $previous = reset($previousContexts);

        if (!$previous->getRequest() instanceof Capture) {
            return;
        }

        $payment = $previous->getRequest()->getFirstModel();

        if (!$payment instanceof PaymentInterface) {
            return;
        }

        $order = $payment->getOrder();

        if (!$order instanceof OrderInterface) {
            return;
        }

        $request->addParameter('order', $order);
        /** @psalm-suppress InternalMethod */
        $request->addParameter('document', (new Service())->getNearestDocumentByPath('/' . $order->getLocaleCode()));
    }

    public function onExecute(Context $context): void
    {
    }

    public function onPostExecute(Context $context): void
    {
    }
}
