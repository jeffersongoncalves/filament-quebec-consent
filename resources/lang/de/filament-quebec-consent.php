<?php

return [
    'resource' => [
        'label' => 'Einwilligung',
        'plural_label' => 'Einwilligungen',
    ],

    'fields' => [
        'subject' => 'Betroffene Person',
        'purpose' => 'Zweck',
        'action' => 'Entscheidung',
        'version' => 'Version der Bedingungen',
        'created_at' => 'Erfasst am',
        'expires_at' => 'Läuft ab am',
        'source' => 'Quelle',
        'ip_address' => 'IP-Adresse',
        'user_agent' => 'User Agent',
        'metadata' => 'Metadaten',
    ],

    'action' => [
        'granted' => 'Erteilt',
        'revoked' => 'Widerrufen',
    ],

    'filters' => [
        'visitors' => 'Besucher ohne Konto',
    ],

    'visitor' => 'Besucher',
    'outdated' => 'Für ältere Bedingungen erteilt: zählt nicht mehr als Einwilligung.',
];
