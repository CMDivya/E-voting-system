<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'voters'=>'c,r,u,d',
            'candidates'=>'c,r,u,d',
            'parties'=>'c,r,u,d',
            'Vote'=>'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'voters'=>'c,r,u,d',
            'candidates'=>'c,r,u,d',
            'parties'=>'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
        'voter' => [
            'voters'=>'c,r,u,d',
            'candidates'=>'r',
            'parties'=>'r',
            'profile' => 'r,u'
        ],
        'candidate' => [
            'users' => 'c,r,u,d',
            'candidates'=>'c,r,u,d',
            'parties'=>'r',
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
