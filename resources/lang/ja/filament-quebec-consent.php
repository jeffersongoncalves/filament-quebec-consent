<?php

return [
    'resource' => [
        'label' => '同意',
        'plural_label' => '同意',
    ],

    'fields' => [
        'subject' => 'データ主体',
        'purpose' => '目的',
        'action' => '判断',
        'version' => '規約のバージョン',
        'created_at' => '記録日時',
        'expires_at' => '有効期限',
        'source' => '取得元',
        'ip_address' => 'IPアドレス',
        'user_agent' => 'ユーザーエージェント',
        'metadata' => 'メタデータ',
    ],

    'action' => [
        'granted' => '同意済み',
        'revoked' => '撤回済み',
    ],

    'filters' => [
        'visitors' => 'アカウントのない訪問者',
    ],

    'visitor' => '訪問者',
    'outdated' => '古い規約に対する同意のため、同意として扱われません。',
];
