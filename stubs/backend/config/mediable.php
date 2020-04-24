<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | More information in the config filesystems.php
    |
    */

    'disk' => 'public',

    /*
    |--------------------------------------------------------------------------
    | Resize for images
    |--------------------------------------------------------------------------
    |
    | Here you may specify the sizes to use when an image is uploaded
    |
    */

    'sizes' => [

        'thumbnails' => 160,

        /*
        'posts' => [
          'fit'    => null,
          'height' => [100,200],
          'width'  => [400,800]
        ]
        */

    ],

    /*
    |--------------------------------------------------------------------------
    | Customize the buttons
    |--------------------------------------------------------------------------
    |
    | Here you may specify the class and the value of each button in the component view
    |
    */

    'buttons' => [
        'sortable' => [
          'class' => 'pl-0',
          'label' => 'sp::action.move',
          'value' => '<i class="icon-move"></i>'
        ],
        'download' => [
          'class' => 'btn-gray rounded-circle',
          'label' => 'sp::action.download',
          'value' => '<i class="icon-download"></i>'
        ],
        'download-input-group' => [
          'class' => 'btn-info',
          'label' => 'sp::action.download',
          'value' => '<i class="icon-download"></i>'
        ]
    ]

];
