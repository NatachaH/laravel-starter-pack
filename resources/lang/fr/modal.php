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
      'title' => 'Confirmation de la suppression',
      'message' => 'Voulez-vous vraiment supprimer cet élément ?<br><span class="text-danger"><b>Attention:</b> cette action ne peut pas être annulée.</span>'
    ],

    // Confirm delete (Soft delete)
    'soft-delete' => [
      'title' => 'Confirmation de la suppression',
      'message' => 'Voulez-vous vraiment supprimer cet élément ?<br><span class="text-secondary"><b>Info:</b> l\'article sera envoyé à la poubelle.</span>'
    ],

    // Confirm restore
    'restore' => [
      'title' => 'Confirmation de la restauration',
      'message' => 'Voulez-vous vraiment restaurer cet élément ?'
    ],

];
