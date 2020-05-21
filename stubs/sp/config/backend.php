<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact of the webmaster
    |--------------------------------------------------------------------------
    */

    'webmaster' => [
      'name' => 'Natacha Herth',
      'email' => 'info@natachaherth.ch'
    ],

    /*
    |--------------------------------------------------------------------------
    | Customize the sidebar
    |--------------------------------------------------------------------------
    |
    | Here you may specify the links in the sidebar.
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
                'user' => [
                  'model' => 'App\User',
                  'route' => 'backend.users'
                ],
                'role' => [
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

      ],

      /*
      |--------------------------------------------------------------------------
      | Customize the mainbar
      |--------------------------------------------------------------------------
      |
      | Here you may specify the links in the mainbar.
      |
      */

      'mainbar' => [

          // Account
          'account' => [
              'edit' => 'backend.account.edit'
          ],

      ]


];
