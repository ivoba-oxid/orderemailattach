<?php

$sMetadataVersion = '2.0';
$aModule          = [
    'id'          => 'ivoba_orderemailattach',
    'title'       => '<strong>Ivo Bathke</strong>:  <i>Order email attachments</i>',
    'description' => [
        'de' => 'Email Anhänge für die Bestell-Email',
        'en' => 'Add attachments to the order email',
    ],
    'thumbnail'   => 'ivoba-oxid.png',
    'version'     => '1.0',
    'author'      => 'Ivo Bathke',
    'email'       => 'ivo.bathke@gmail.com',
    'url'         => 'https://oxid.ivo-bathke.name#orderemailattach',
    'extend'      => [\OxidEsales\Eshop\Core\Email::class => \IvobaOxid\OrderEmailAttach\Core\Email::class],
    'blocks'      => [],
    'settings'    => [
        // todo make languages dynamic
        [
            'group' => 'ivoba_orderemailattach_main',
            'name'  => 'ivoba_orderemailattach_attachments_de',
            'type'  => 'str',
            'value' => 'adb.pdf, widerrufsbelehrung.pdf',
        ],
        [
            'group' => 'ivoba_orderemailattach_main',
            'name'  => 'ivoba_orderemailattach_attachments_en',
            'type'  => 'str',
            'value' => 'adb.pdf, widerrufsbelehrung.pdf',
        ],
    ],
];
