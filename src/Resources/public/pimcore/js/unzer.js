/*
 * CoreShop
 *
 * This source file is available under the terms of the
 * CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.com)
 * @license    CoreShop Commercial License (CCL)
 *
 */

pimcore.registerNS('coreshop.provider.gateways.unzer');
coreshop.provider.gateways.unzer = Class.create(coreshop.provider.gateways.abstract, {
    getLayout: function (config) {
        var paymentTypes = new Ext.data.ArrayStore({
            fields: ['name'],
            data: [
                ['paypal'],
                ['sofort'],
                ['card']
            ]
        });

        return [
            {
                xtype: 'combobox',
                fieldLabel: t('unzer_payment_type'),
                name: 'gatewayConfig.config.paymentType',
                value: config.paymentType ? config.paymentType : '',
                store: paymentTypes,
                triggerAction: 'all',
                valueField: 'name',
                displayField: 'name',
                mode: 'local',
                forceSelection: true,
                selectOnFocus: true
            },
            {
                xtype: 'textfield',
                fieldLabel: t('unzer_private_key'),
                name: 'gatewayConfig.config.privateKey',
                length: 255,
                value: config.privateKey ? config.privateKey : ""
            },
            {
                xtype: 'textfield',
                fieldLabel: t('unzer_public_key'),
                name: 'gatewayConfig.config.publicKey',
                length: 255,
                value: config.publicKey ? config.publicKey : ""
            },
            {
                xtype: 'checkbox',
                fieldLabel: t('unzer_sandbox_mode'),
                name: 'gatewayConfig.config.sandboxMode',
                checked: config.sandboxMode !== undefined ? !!config.sandboxMode : true
            }
        ];
    }
});
