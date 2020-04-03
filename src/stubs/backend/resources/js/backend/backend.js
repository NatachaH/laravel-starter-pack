/*
|--------------------------------------------------------------------------
| Backend - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

// Bootstrap
require('../bootstrap');

// Components
require('./components/sidebar');

// Load Toast Notification
$('#toastNotification .toast').toast('show');

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
confirmModals.forEach(function(modal){
  $(modal).on('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    confirmDeleteModal.querySelector('form').action = action
  });
});
