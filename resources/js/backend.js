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

// Libraries
require('../../../access-control/resources/js/permission-checkboxes');
require('../../../bs-component/resources/js/dynamic');
require('../../../sortable/resources/js/sortable');

// Components
require('./components/editor');
require('./components/sidebar');
require('./components/sortable');

// Load Toast Notification
$('#toastNotification .toast:not(.toast-custom)').toast('show');

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
Array.prototype.forEach.call(confirmModals, function(modal) {
  $(modal).on('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    modal.querySelector('form').action = action
  });
});
