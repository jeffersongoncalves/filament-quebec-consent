<?php

return [
    'resource' => [
        'label' => 'Consent',
        'plural_label' => 'Consents',
    ],

    'fields' => [
        'subject' => 'Data subject',
        'purpose' => 'Purpose',
        'action' => 'Decision',
        'version' => 'Terms version',
        'created_at' => 'Recorded at',
        'expires_at' => 'Expires at',
        'source' => 'Source',
        'ip_address' => 'IP address',
        'user_agent' => 'User agent',
        'metadata' => 'Metadata',
    ],

    'action' => [
        'granted' => 'Granted',
        'revoked' => 'Revoked',
    ],

    'filters' => [
        'visitors' => 'Visitors without an account',
    ],

    'visitor' => 'Visitor',
    'outdated' => 'Given for older terms: no longer counts as consent.',
];
