<?php

return [
    'resource' => [
        'label' => 'Згода',
        'plural_label' => 'Згоди',
    ],

    'fields' => [
        'subject' => 'Суб\'єкт даних',
        'purpose' => 'Мета',
        'action' => 'Рішення',
        'version' => 'Версія умов',
        'created_at' => 'Записано',
        'expires_at' => 'Спливає',
        'source' => 'Джерело',
        'ip_address' => 'IP-адреса',
        'user_agent' => 'User agent',
        'metadata' => 'Метадані',
    ],

    'action' => [
        'granted' => 'Надано',
        'revoked' => 'Відкликано',
    ],

    'filters' => [
        'visitors' => 'Відвідувачі без облікового запису',
    ],

    'visitor' => 'Відвідувач',
    'outdated' => 'Надано для старих умов: більше не вважається згодою.',
];
