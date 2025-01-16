<?php

$nav = [
    "navbar" => [
        [
            "title" => "Master Data",
            "icon" => '<i class="menu-icon tf-icons bx bx-briefcase"></i>',
            "group" => "",
            "submenus" => [
                [
                    'title' => 'Pendaftaran Tryout',
                    'route' => 'pendaftaran-tryout.index',
                    'permissions' => ['pendaftaran-tryout view']
                ],
            ],
        ],
        [
            "title" => "Manajemen Users",
            "icon" => '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>',
            "group" => "Misc",
            "submenus" => [
                [
                    'title' => 'Users',
                    'route' => 'users.index',
                    // 'route' => null,
                    'permissions' => ['user view']
                ],
                [
                    'title' => 'Roles',
                    'route' => 'roles.index',
                    // 'route' => null,
                    'permissions' => ['role & permission view']
                ],
                // [
                //     'title' => 'Permissions',
                //     // 'route' => 'permissions.index',
                //     'route' => null,
                //     'permissions' => ['role & permission view']
                // ]
            ],
        ]
    ],
];

return $nav;
