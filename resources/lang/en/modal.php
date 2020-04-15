<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modal Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for the modal component
    |
    */

    // Confirm delete (No able to get data back)
    'delete' => [
      'title' => 'Confirm delete',
      'message' => 'Are you sure you want to delete this ?<br/><span class="text-danger"><b>Warning:</b> This cannot be undone.</span>'
    ],

    // Confirm delete (Soft delete)
    'soft-delete' => [
      'title' => 'Confirm delete',
      'message' => 'Are you sure you want to delete this ?<br/><span class="text-secondary"><b>Info:</b> The item will be sent to the trash.</span>'
    ],

    // Confirm restore
    'restore' => [
      'title' => 'Confirm restore',
      'message' => 'Are you sure you want to restore this ?'
    ],



];
