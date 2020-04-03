<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backend Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for the backend views
    |
    */

    // Sidebar sections
    'sidebar' => [
      'dashboard' => 'Dashboard',
      'settings'  => 'Settings',
      'users'     => 'Users',
      'contents'  => 'Contents',
    ],

    // Models
    'model' => [
      'user' => 'User|Users',
      'account' => 'Account'
    ],

    // Account menu
    'account' => [
      'preview' => 'My account',
      'edit'    => 'Edit my profile',
    ],

    // Actions for buttons
    'action' => [
        'search'        => 'Search',
        'reset'         => 'Reset',
        'export'        => 'Export',
        'add'           => 'Add',
        'preview'       => 'Preview',
        'create'        => 'Create',
        'edit'          => 'Edit',
        'delete'        => 'Delete',
        'restore'       => 'Restore',
        'force-delete'  => 'Force delete',
        'cancel'        => 'Cancel',
        'confirm'       => 'Confirm',
        'show'          => 'Detail'
    ],

    // Default fields name
    'field' => [
      'name'          => 'Name',
      'email'         => 'Email',
      'title'         => 'Title',
      'subtitle'      => 'Subtitle',
      'description'   => 'Description',
      'created-at'    => 'Created at',
      'updated-at'    => 'Updated at',
      'deleted-at'    => 'Deleted at',
      'actions'       => 'Actions',
      'informations'  => 'Informations',
    ],

    // Listing
    'listing' => [
      'no-result' => 'There is no result',
      'total'     => 'Total',
    ],

    // Modal Confirmation
    'modal-confirm' => [
      'delete' => [
        'title' => 'Confirm delete',
        'message' => 'Are you sure you want to delete this ?'
      ],
      'restore' => [
        'title' => 'Confirm restore',
        'message' => 'Are you sure you want to delete this ?'
      ],
      'force-delete' => [
        'title' => 'Confirm force delete',
        'message' => 'Are you sure you want to delete this ?<br/><b>Warning: </b>This cannot be undone.'
      ]
    ],

    // Help message
    'help' => [
      'leave-empty' => 'Leave empty if you don\'t want to edit it.'
    ]



];
