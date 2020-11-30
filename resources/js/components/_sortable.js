/*
|--------------------------------------------------------------------------
| SP - Backend - Sortable - Script
|--------------------------------------------------------------------------
|
| Plugin: https://sortablejs.github.io/Sortable/
|
*/

// Init the Sortable to each .sortable
var sortable = document.querySelectorAll('.sortable, .media-sortable');
sortable.forEach((el, i) => {
    new Sortable(el, {
      successCallback: function(response){
          var toastSuccess = document.querySelector('.toast-custom.toast-success');
          toastSuccess.querySelector('.toast-body span').innerHTML = response.data.message;
          var toast = Bootstrap.Toast(toastSuccess);
          toast.show();
      },
      errorCallback: function(response){
          var toastError = document.querySelector('.toast-custom.toast-danger');
          toastError.querySelector('.toast-body span').innerHTML = response.data.message;
          var toast = Bootstrap.Toast(toastError);
          toast.show();
      }
    });
});
