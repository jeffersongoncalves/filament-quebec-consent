<?php

return [
    'resource' => [
        'label' => 'Zgoda',
        'plural_label' => 'Zgody',
    ],

    'fields' => [
        'subject' => 'Osoba, której dane dotyczą',
        'purpose' => 'Cel',
        'action' => 'Decyzja',
        'version' => 'Wersja warunków',
        'created_at' => 'Zarejestrowano',
        'expires_at' => 'Wygasa',
        'source' => 'Źródło',
        'ip_address' => 'Adres IP',
        'user_agent' => 'User agent',
        'metadata' => 'Metadane',
    ],

    'action' => [
        'granted' => 'Udzielona',
        'revoked' => 'Wycofana',
    ],

    'filters' => [
        'visitors' => 'Odwiedzający bez konta',
    ],

    'visitor' => 'Odwiedzający',
    'outdated' => 'Udzielona dla starszych warunków: nie jest już ważną zgodą.',
];
