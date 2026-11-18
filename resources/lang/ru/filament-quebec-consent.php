<?php

return [
    'resource' => [
        'label' => 'Согласие',
        'plural_label' => 'Согласия',
    ],

    'fields' => [
        'subject' => 'Субъект данных',
        'purpose' => 'Цель',
        'action' => 'Решение',
        'version' => 'Версия условий',
        'created_at' => 'Записано',
        'expires_at' => 'Истекает',
        'source' => 'Источник',
        'ip_address' => 'IP-адрес',
        'user_agent' => 'User agent',
        'metadata' => 'Метаданные',
    ],

    'action' => [
        'granted' => 'Дано',
        'revoked' => 'Отозвано',
    ],

    'filters' => [
        'visitors' => 'Посетители без учётной записи',
    ],

    'visitor' => 'Посетитель',
    'outdated' => 'Дано для старых условий: больше не считается согласием.',
];
