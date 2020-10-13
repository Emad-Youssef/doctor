<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'admins'    => 'c,r,u,d',
            'settings'  => 'r,u',
            'employees' => 'c,r,u,d',
            'works'     => 'c,r,u,d',
            'doctors'   => 'c,r,u,d',
            'salarys'   => 'r,u',
            'pockets'   => 'c,r,u,d',
            'patients'  => 'r,d',
            'roshetas'  => 'c,r,u,d',
            'drugs'     => 'c,r,u,d',
            'news'      => 'c,r,u,d',
            'services'  => 'c,r,u,d',
            'facts'     => 'c,r,u,d',
            'media'     => 'c,r,u,d',
        ],
        'admin' => [],
    ],
   
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
