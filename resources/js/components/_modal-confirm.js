/*
|--------------------------------------------------------------------------
| SP - Backend - Modal - Script
|--------------------------------------------------------------------------
*/

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
Array.prototype.forEach.call(confirmModals, function(modal) {
  $(modal).on('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    modal.querySelector('form').action = action
  });
});
