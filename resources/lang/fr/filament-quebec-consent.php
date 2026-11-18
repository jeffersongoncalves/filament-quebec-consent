<?php

return [
    'resource' => [
        'label' => 'Consentement',
        'plural_label' => 'Consentements',
    ],

    'fields' => [
        'subject' => 'Personne concernée',
        'purpose' => 'Finalité',
        'action' => 'Décision',
        'version' => 'Version des conditions',
        'created_at' => 'Enregistré le',
        'expires_at' => 'Expire le',
        'source' => 'Source',
        'ip_address' => 'Adresse IP',
        'user_agent' => 'User agent',
        'metadata' => 'Métadonnées',
    ],

    'action' => [
        'granted' => 'Accordé',
        'revoked' => 'Retiré',
    ],

    'filters' => [
        'visitors' => 'Visiteurs sans compte',
    ],

    'visitor' => 'Visiteur',
    'outdated' => 'Donné pour d\'anciennes conditions : ne vaut plus consentement.',
];
