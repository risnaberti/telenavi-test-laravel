<?php

$nav = [
    "General" => [
        [
            "title" => "Master Data",
            "icon" => '<i class="menu-icon tf-icons bx bx-briefcase"></i>',
            "submenus" => [
                [
                    'title' => 'Pendaftaran Tryout',
                    'route' => 'pendaftaran-tryout.index',
                    'permissions' => ['pendaftaran-tryout view']
                ],
            ],
        ],
        [
            "title" => "Laporan Contoh",
            "icon" => '<i class="menu-icon tf-icons bx bx-briefcase"></i>',
            'route' => null,
            'permissions' => null
        ],
    ],
    "Misc" => [
        [
            "title" => "Manajemen Users",
            "icon" => '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>',
            "submenus" => [
                [
                    'title' => 'Users',
                    'route' => 'users.index',
                    'permissions' => ['user view']
                ],
                [
                    'title' => 'Roles',
                    'route' => 'roles.index',
                    'permissions' => ['role & permission view']
                ],
            ],
        ],
        [
            "title" => "Rekap User",
            "icon" => '<i class="menu-icon tf-icons bx bx-list-check"></i>',
            "route" => null,
            "permissions" => null,
        ],
    ]
];

return $nav;
