## 3.0.0 (unreleased)

### CoreShop 5.1 / Pimcore 12 (PHP 8.3, 8.4)

- Requires `coreshop/payum-unzer` 3.x (Unzer SDK 4, PHP 8.3+) and `coreshop/enterprise-subscription-bundle`; the bundle is licensed under the CoreShop Commercial License.
- Gateway configuration is a Symfony form type tagged for Pimcore Studio (`coreshop.studio_form`), so the payment provider form renders in Studio without custom JavaScript.
- Classic admin (ExtJS) gateway form kept for Pimcore 12.
- New `sandboxMode` option in the gateway configuration.
- `PopulateUnzerExtension` removed (it was disabled since 2.0 and never populated anything).
