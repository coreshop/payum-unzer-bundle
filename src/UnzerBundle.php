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

use CoreShop\Bundle\EnterpriseSubscriptionBundle\CoreShopEnterpriseSubscriptionBundle;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Pimcore\HttpKernel\Bundle\DependentBundleInterface;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;

class UnzerBundle extends AbstractPimcoreBundle implements DependentBundleInterface, PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
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

    public static function registerDependentBundles(BundleCollection $collection): void
    {
        $collection->addBundle(new CoreShopEnterpriseSubscriptionBundle());
    }

    /**
     * The classic admin gateway form; Pimcore Studio renders the form type schema instead.
     */
    public function getJsPaths(): array
    {
        return [
            '/bundles/unzer/pimcore/js/unzer.js',
        ];
    }
}
