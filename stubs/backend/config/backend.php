<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sidebar Menu
    |--------------------------------------------------------------------------
    |
    | This is for construct the sidebar menu automatically.
    | The items can be a string (=> the route base name) or an array with 'link' and 'active' keys
    | The sidebar translation are in the file lang/en/backend.php
    |
    */

    'sidebar' => [

        // Dashboard
        'dashboard' => [
            'icon'  => 'icon-dashboard',
            'link'  => 'backend.dashboard',
            'items' => null
        ],

        // Settings
        'settings' =>  [
            'icon'  => 'icon-gear',
            'link'  => null,
            'items' => [
                'users' => 'backend.users',
                'roles' => 'backend.roles',
                'permissions' => 'backend.permissions',
            ]
        ],

        // Contents
        'contents' =>  [
            'icon'  => 'icon-content',
            'link' => null,
            'items' => null
        ]

      ]


];
