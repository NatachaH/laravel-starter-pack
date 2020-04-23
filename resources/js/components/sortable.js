/*
|--------------------------------------------------------------------------
| Backend - Sortable - Script
|--------------------------------------------------------------------------
|
| Plugin: https://sortablejs.github.io/Sortable/
|
*/

// Init the Sortable to each .sortable
var sortable = document.querySelectorAll('.sortable, .media-sortable');
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
