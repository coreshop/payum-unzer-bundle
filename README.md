# CoreShop Unzer Payment Bundle

Unzer (formerly heidelpay) as a CoreShop payment provider, built on `coreshop/payum-unzer` and the official Unzer PHP SDK 4.

| Branch | CoreShop | Pimcore | PHP | Admin UI |
|---|---|---|---|---|
| `3.x` | 5.1 | 12 | 8.3, 8.4 | classic admin (ExtJS) and Pimcore Studio |
| `2026.x` | 2026.x | 2026 | 8.4, 8.5 | Pimcore Studio |

Requires a CoreShop enterprise subscription: `coreshop/enterprise-subscription-bundle` is installed automatically and `CORESHOP_ENTERPRISE_TOKEN` must be configured (see [enterprise-subscription-bundle](https://github.com/coreshop/enterprise-subscription-bundle)).

## Installation

```bash
composer require coreshop/payum-unzer-bundle:"^3.0"
bin/console pimcore:bundle:enable UnzerBundle
```

The package is delivered through the CoreShop Private Packagist repository; add it to your `composer.json` and your token to `auth.json`:

```json
{
    "repositories": [
        { "type": "composer", "url": "https://cors.repo.packagist.com/<your-customer-name>/" }
    ]
}
```

## Configuration

Create a payment provider in CoreShop → Payment Providers, choose the factory `unzer` and fill in:

| Field | Description |
|---|---|
| Payment type | `card`, `paypal` or `sofort` (deprecated by Unzer) |
| Private key | Unzer private key |
| Public key | Unzer public key, used by the Unzer UI components on the checkout page |
| Sandbox mode | enabled by default |

The payment page is rendered inside the CoreShop frontend layout (`@CoreShopFrontend/layout.html.twig`).

## License

CoreShop Commercial License (CCL), see `LICENSE.md`.
