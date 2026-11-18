<?php

return [
    'resource' => [
        'label' => 'رضایت',
        'plural_label' => 'رضایت‌ها',
    ],

    'fields' => [
        'subject' => 'صاحب داده',
        'purpose' => 'هدف',
        'action' => 'تصمیم',
        'version' => 'نسخه شرایط',
        'created_at' => 'ثبت‌شده در',
        'expires_at' => 'انقضا در',
        'source' => 'منبع',
        'ip_address' => 'نشانی IP',
        'user_agent' => 'عامل کاربر',
        'metadata' => 'فراداده',
    ],

    'action' => [
        'granted' => 'داده‌شده',
        'revoked' => 'لغوشده',
    ],

    'filters' => [
        'visitors' => 'بازدیدکنندگان بدون حساب',
    ],

    'visitor' => 'بازدیدکننده',
    'outdated' => 'برای شرایط قدیمی‌تر داده شده: دیگر رضایت محسوب نمی‌شود.',
];
