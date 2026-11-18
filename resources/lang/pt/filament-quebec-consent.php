<?php

return [
    'resource' => [
        'label' => 'Consentimento',
        'plural_label' => 'Consentimentos',
    ],

    'fields' => [
        'subject' => 'Titular',
        'purpose' => 'Finalidade',
        'action' => 'Decisão',
        'version' => 'Versão dos termos',
        'created_at' => 'Registado em',
        'expires_at' => 'Expira em',
        'source' => 'Origem',
        'ip_address' => 'Endereço IP',
        'user_agent' => 'User agent',
        'metadata' => 'Metadados',
    ],

    'action' => [
        'granted' => 'Concedido',
        'revoked' => 'Revogado',
    ],

    'filters' => [
        'visitors' => 'Visitantes sem conta',
    ],

    'visitor' => 'Visitante',
    'outdated' => 'Dado para termos anteriores: já não vale como consentimento.',
];
