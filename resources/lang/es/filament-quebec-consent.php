<?php

return [
    'resource' => [
        'label' => 'Consentimiento',
        'plural_label' => 'Consentimientos',
    ],

    'fields' => [
        'subject' => 'Titular',
        'purpose' => 'Finalidad',
        'action' => 'Decisión',
        'version' => 'Versión de los términos',
        'created_at' => 'Registrado el',
        'expires_at' => 'Vence el',
        'source' => 'Origen',
        'ip_address' => 'Dirección IP',
        'user_agent' => 'Agente de usuario',
        'metadata' => 'Metadatos',
    ],

    'action' => [
        'granted' => 'Otorgado',
        'revoked' => 'Revocado',
    ],

    'filters' => [
        'visitors' => 'Visitantes sin cuenta',
    ],

    'visitor' => 'Visitante',
    'outdated' => 'Otorgado para términos anteriores: ya no cuenta como consentimiento.',
];
