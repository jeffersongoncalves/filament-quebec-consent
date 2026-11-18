<?php

return [
    'resource' => [
        'label' => 'Consenso',
        'plural_label' => 'Consensi',
    ],

    'fields' => [
        'subject' => 'Interessato',
        'purpose' => 'Finalità',
        'action' => 'Decisione',
        'version' => 'Versione dei termini',
        'created_at' => 'Registrato il',
        'expires_at' => 'Scade il',
        'source' => 'Origine',
        'ip_address' => 'Indirizzo IP',
        'user_agent' => 'User agent',
        'metadata' => 'Metadati',
    ],

    'action' => [
        'granted' => 'Concesso',
        'revoked' => 'Revocato',
    ],

    'filters' => [
        'visitors' => 'Visitatori senza account',
    ],

    'visitor' => 'Visitatore',
    'outdated' => 'Dato per termini precedenti: non vale più come consenso.',
];
