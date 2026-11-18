<?php

return [
    'resource' => [
        'label' => '同意',
        'plural_label' => '同意记录',
    ],

    'fields' => [
        'subject' => '数据主体',
        'purpose' => '目的',
        'action' => '决定',
        'version' => '条款版本',
        'created_at' => '记录时间',
        'expires_at' => '到期时间',
        'source' => '来源',
        'ip_address' => 'IP 地址',
        'user_agent' => '用户代理',
        'metadata' => '元数据',
    ],

    'action' => [
        'granted' => '已同意',
        'revoked' => '已撤回',
    ],

    'filters' => [
        'visitors' => '无账户的访客',
    ],

    'visitor' => '访客',
    'outdated' => '针对旧版条款作出：不再视为同意。',
];
