<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Version of Starter-pack package
    |--------------------------------------------------------------------------
    */

    'version' => '2.7.1',


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

        // Activity Log
        'activity-log' => [
            'icon'  => 'icon-rocket',
            'link'  => 'backend.activity-log.index',
            'items' => null,
            'model' => 'App\Models\Track'
        ],

        // Settings
        'settings' =>  [
            'icon'  => 'icon-gear',
            'items' => [
                'user' => [
                  'model' => 'App\Models\User',
                  'route' => 'backend.users'
                ],
                'role' => [
                  'model' => 'App\Models\Role',
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

      ],


      /*
      |--------------------------------------------------------------------------
      | Customize the dynamic buttons
      |--------------------------------------------------------------------------
      |
      | Here you may specify the class and the value of each button in the component view
      |
      */

      'buttons' => [
          'add' => [
            'class' => 'btn-gray rounded-circle',
            'label' => 'sp::action.add',
            'value' => '<i class="icon-plus"></i>'
          ],
          'remove' => [
            'class' => 'btn-gray rounded-circle',
            'label' => 'sp::action.remove',
            'value' => '<i class="icon-minus"></i>'
          ],
          'delete' => [
            'class' => 'btn-gray rounded-circle',
            'label' => 'sp::action.delete',
            'value' => '<i class="icon-trash"></i>'
          ],
          'move' => [
            'class' => 'ps-0',
            'label' => 'sp::action.move',
            'value' => '<i class="icon-move"></i>'
          ]
      ]



];
