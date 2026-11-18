<?php

return [
    'resource' => [
        'label' => 'सहमति',
        'plural_label' => 'सहमतियाँ',
    ],

    'fields' => [
        'subject' => 'डेटा विषय',
        'purpose' => 'उद्देश्य',
        'action' => 'निर्णय',
        'version' => 'शर्तों का संस्करण',
        'created_at' => 'दर्ज किया गया',
        'expires_at' => 'समाप्ति',
        'source' => 'स्रोत',
        'ip_address' => 'IP पता',
        'user_agent' => 'यूज़र एजेंट',
        'metadata' => 'मेटाडेटा',
    ],

    'action' => [
        'granted' => 'दी गई',
        'revoked' => 'वापस ली गई',
    ],

    'filters' => [
        'visitors' => 'बिना खाते वाले आगंतुक',
    ],

    'visitor' => 'आगंतुक',
    'outdated' => 'पुरानी शर्तों के लिए दी गई: अब सहमति नहीं मानी जाती।',
];
