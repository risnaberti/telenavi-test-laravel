<?php

$nav = [
    "navbar" => [
        [
            "menus" => [
                [
                    "title" => "Master Data",
                    "icon" => '<i class="menu-icon tf-icons bx bx-briefcase"></i>',
                    "group" => "",
                    "submenus" => [
                        [
                            'title' => 'Daftar By Admin',
                            'route' => 'pendaftaran-tryout.daftar-by-admin',
                            'permissions' => ['pendaftaran-tryout daftar-by-admin']
                        ],
                        [
                            'title' => 'Pendaftaran Tryout',
                            'route' => 'pendaftaran-tryout.index',
                            'permissions' => ['pendaftaran-tryout view']
                        ],
                    ],
                ],
                [
                    "title" => "Rekap Pendaftar",
                    "icon" => '<i class="menu-icon tf-icons bx bx-list-check"></i>',
                    "group" => "",
                    "route" => 'pendaftaran-tryout.rekap-pendaftar',
                    "permissions" => ["pendaftaran-tryout rekap-pendaftar"],
                ],
                [
                    "title" => "Laporan Pembayaran",
                    "icon" => '<i class="menu-icon tf-icons bx bx-receipt"></i>',
                    "group" => "",
                    "route" => 'pendaftaran-tryout.laporan-pembayaran',
                    "permissions" => ["pendaftaran-tryout laporan-pembayaran"],
                ],
                [
                    "title" => "Manajemen Users",
                    "icon" => '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>',
                    "group" => "Misc",
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
                        [
                            'title' => 'Permissions',
                            'route' => 'permissions.index',
                            'permissions' => ['role & permission view']
                        ]
                    ],
                ]
            ],
        ],
    ],
];

return $nav;
