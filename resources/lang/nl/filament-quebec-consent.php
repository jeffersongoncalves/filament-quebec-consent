<?php

return [
    'resource' => [
        'label' => 'Toestemming',
        'plural_label' => 'Toestemmingen',
    ],

    'fields' => [
        'subject' => 'Betrokkene',
        'purpose' => 'Doel',
        'action' => 'Beslissing',
        'version' => 'Versie van de voorwaarden',
        'created_at' => 'Vastgelegd op',
        'expires_at' => 'Verloopt op',
        'source' => 'Bron',
        'ip_address' => 'IP-adres',
        'user_agent' => 'User agent',
        'metadata' => 'Metadata',
    ],

    'action' => [
        'granted' => 'Gegeven',
        'revoked' => 'Ingetrokken',
    ],

    'filters' => [
        'visitors' => 'Bezoekers zonder account',
    ],

    'visitor' => 'Bezoeker',
    'outdated' => 'Gegeven voor oudere voorwaarden: telt niet meer als toestemming.',
];
