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
require('../../../sortable/resources/js/sortable');

// Init the Dynamic to each .dynamic-media and init the bsCustomFileInput for file input
var dynamicMedia = document.querySelectorAll('.dynamic-media');
Array.prototype.forEach.call(dynamicMedia, function(el, i) {
    new Dynamic(el, {
      addCallback: function(){
        bsCustomFileInput.init();
      }
    });
});

// Init the Sortable to each .sortable
var sortable = document.querySelectorAll('.sortable');
Array.prototype.forEach.call(sortable, function(el, i) {
    new Sortable(el, {
      successCallback: function(response){
          var toastSuccess = document.querySelector('.toast-custom.toast-success');
          toastSuccess.querySelector('.toast-body span').innerHTML = response.data.message;
          $(toastSuccess).toast('show');
      },
      errorCallback: function(response){
        var toastError = document.querySelector('.toast-custom.toast-danger');
        toastError.querySelector('.toast-body span').innerHTML = response.data.message;
        $(toastError).toast('show');
      }
    });
});
