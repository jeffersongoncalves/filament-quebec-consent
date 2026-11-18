<?php

return [
    'resource' => [
        'label' => 'Razılıq',
        'plural_label' => 'Razılıqlar',
    ],

    'fields' => [
        'subject' => 'Məlumat subyekti',
        'purpose' => 'Məqsəd',
        'action' => 'Qərar',
        'version' => 'Şərtlərin versiyası',
        'created_at' => 'Qeydə alınıb',
        'expires_at' => 'Bitmə tarixi',
        'source' => 'Mənbə',
        'ip_address' => 'IP ünvanı',
        'user_agent' => 'İstifadəçi agenti',
        'metadata' => 'Metaməlumat',
    ],

    'action' => [
        'granted' => 'Verilib',
        'revoked' => 'Geri götürülüb',
    ],

    'filters' => [
        'visitors' => 'Hesabı olmayan ziyarətçilər',
    ],

    'visitor' => 'Ziyarətçi',
    'outdated' => 'Köhnə şərtlər üçün verilib: artıq razılıq sayılmır.',
];
