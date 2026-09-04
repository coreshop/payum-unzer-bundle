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

namespace CoreShop\Payum\UnzerBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class UnzerBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    public function getNiceName(): string
    {
        return 'CoreShop - Unzer';
    }

    public function getDescription(): string
    {
        return 'Unzer payment gateway for CoreShop';
    }

    protected function getComposerPackageName(): string
    {
        return 'coreshop/payum-unzer-bundle';
    }
}
