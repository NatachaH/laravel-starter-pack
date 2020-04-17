/*
|--------------------------------------------------------------------------
| Backend - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
| Libraries: Jquery & Bootstrap 4.0
|
*/

// Components
require('./components/editor');
require('./components/sidebar');


// Load Toast Notification
$('#toastNotification .toast').toast('show');

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
Array.prototype.forEach.call(confirmModals, function(modal) {
  $(modal).on('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    modal.querySelector('form').action = action
  });
});

// Libraries
require('../../../access-control/resources/js/permission-checkboxes');
require('../../../bs-component/resources/js/dynamic');
