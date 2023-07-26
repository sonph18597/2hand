<?php
return [
    [
        'name' => 'Tài khoản',
        'list-check' => ['user','rating','comment','contact'],
        'icon' => 'fa fa-user',
        'sub'  => [
            [
                'name'  => 'Người dùng',
                'route' => 'admin.user.index',
                'namespace' => 'user',
                'icon'  => 'fa fa-user'
            ],
            [
                'name'  => 'Đánh giá',
                'namespace' => 'rating',
                'route' => 'admin.rating.index',
                'icon'  => 'fa fa-star'
            ],
            [
                'name'  => 'Bình luận',
                'namespace' => 'comment',
                'route' => 'admin.comment.index',
                'icon'  => 'fa fa-star'
            ],
            [
                'name'  => 'Liên hệ',
                'namespace' => 'contact',
                'route' => 'admin.contact',
                'icon'  => 'fa fa-star'
            ],
        ]
    ],
    [
        'name'  => 'System',
        'label' => 'true'
    ]
];
