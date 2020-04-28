<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backend Configurations
    |--------------------------------------------------------------------------
    */

    /*
    | This is for construct the sidebar menu automatically.
    | The sidebar translation are in the file lang/en/backend.php
    |
    |    Exemple for customize the link in the sidebar:
    |    'posts' => [
    |        'model' => 'App\Post',
    |        'route' => 'backend.posts',
    |        'link'  => 'backend.posts.create',
    |        'action' => 'create'
    |      ]
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
            'items' => [
                'users' => [
                  'model' => 'App\User',
                  'route' => 'backend.users'
                ],
                'roles' => [
                  'model' => 'Nh\AccessControl\Role',
                  'route' => 'backend.roles'
                ]
            ]
        ],

        // Contents
        'contents' =>  [
            'icon'  => 'icon-content',
            'items' => [
              //{{ COPY CONFIG }}
            ]
        ]

      ]


];
