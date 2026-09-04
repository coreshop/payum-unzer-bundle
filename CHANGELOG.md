## 2026.1.0 (unreleased)

### CoreShop 2026.x / Pimcore 2026 (PHP 8.4, 8.5)

- Requires `coreshop/payum-unzer` 3.x (Unzer SDK 4, PHP 8.3+) and `coreshop/enterprise-subscription-bundle`; the bundle is licensed under the CoreShop Commercial License.
- Gateway configuration is a Symfony form type tagged for Pimcore Studio (`coreshop.studio_form`), so the payment provider form renders in Studio without custom JavaScript.
- Classic admin (ExtJS) assets removed; Pimcore 2026 ships Studio only.
- New `sandboxMode` option in the gateway configuration.
- `PopulateUnzerExtension` removed (it was disabled since 2.0 and never populated anything).
