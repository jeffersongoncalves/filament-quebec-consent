<?php

return [
    'resource' => [
        'label' => 'Onay',
        'plural_label' => 'Onaylar',
    ],

    'fields' => [
        'subject' => 'İlgili kişi',
        'purpose' => 'Amaç',
        'action' => 'Karar',
        'version' => 'Koşul sürümü',
        'created_at' => 'Kaydedilme',
        'expires_at' => 'Bitiş',
        'source' => 'Kaynak',
        'ip_address' => 'IP adresi',
        'user_agent' => 'Kullanıcı aracısı',
        'metadata' => 'Meta veriler',
    ],

    'action' => [
        'granted' => 'Verildi',
        'revoked' => 'Geri alındı',
    ],

    'filters' => [
        'visitors' => 'Hesabı olmayan ziyaretçiler',
    ],

    'visitor' => 'Ziyaretçi',
    'outdated' => 'Eski koşullar için verildi: artık onay sayılmaz.',
];
