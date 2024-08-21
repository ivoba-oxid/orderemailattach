<?php

$sMetadataVersion = '2.0';
$aModule          = [
    'id'          => \IvobaOxid\OrderEmailAttach\Module::MODULE_ID,
    'title'       => '<strong>Ivo Bathke</strong>:  <i>Order email attachments</i>',
    'description' => [
        'de' => 'Email Anhänge für die Bestell-Email',
        'en' => 'Add attachments to the order email',
    ],
    'thumbnail'   => 'ivoba-oxid.png',
    'version'     => '2.0',
    'author'      => 'Ivo Bathke',
    'email'       => 'ivo.bathke@gmail.com',
    'url'         => 'https://oxid.ivo-bathke.name#orderemailattach',
    'extend'      => [\OxidEsales\Eshop\Application\Model\Order::class => \IvobaOxid\OrderEmailAttach\Model\Order::class],
    'blocks'      => [],
    'settings'    => [
        // todo make languages dynamic
        [
            'group' => 'ivoba_orderemailattach_main',
            'name'  => 'ivoba_orderemailattach_attachments_de',
            'type'  => 'str',
            'value' => 'agb.pdf, widerrufsbelehrung.pdf',
        ],
        [
            'group' => 'ivoba_orderemailattach_main',
            'name'  => 'ivoba_orderemailattach_attachments_en',
            'type'  => 'str',
            'value' => 'agb.pdf, widerrufsbelehrung.pdf',
        ],
        [
            'group' => 'ivoba_orderemailattach_main',
            'name'  => 'ivoba_orderemailattach_add_to_ownermail',
            'type'  => 'bool',
            'value' => true,
        ],
    ],
];
