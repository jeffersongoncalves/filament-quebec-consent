<?php

return [
    'resource' => [
        'label' => 'موافقة',
        'plural_label' => 'الموافقات',
    ],

    'fields' => [
        'subject' => 'صاحب البيانات',
        'purpose' => 'الغرض',
        'action' => 'القرار',
        'version' => 'إصدار الشروط',
        'created_at' => 'سُجّل في',
        'expires_at' => 'ينتهي في',
        'source' => 'المصدر',
        'ip_address' => 'عنوان IP',
        'user_agent' => 'وكيل المستخدم',
        'metadata' => 'بيانات وصفية',
    ],

    'action' => [
        'granted' => 'ممنوحة',
        'revoked' => 'مسحوبة',
    ],

    'filters' => [
        'visitors' => 'زوار بدون حساب',
    ],

    'visitor' => 'زائر',
    'outdated' => 'مُنحت لشروط أقدم: لم تعد تُعتبر موافقة.',
];
