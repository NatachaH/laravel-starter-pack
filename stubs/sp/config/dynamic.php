<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Customize the buttons
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
        'sortable' => [
          'class' => 'ps-0',
          'label' => 'sp::action.move',
          'value' => '<i class="icon-move"></i>'
        ]
    ]

];
