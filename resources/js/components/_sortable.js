/*
|--------------------------------------------------------------------------
| SP - Backend - Sortable - Script
|--------------------------------------------------------------------------
|
| Plugin: https://sortablejs.github.io/Sortable/
|
*/

import { Toast } from 'bootstrap'

// Init the Sortable to each .sortable
var sortable = document.querySelectorAll('.sortable, .media-sortable');

if(sortable)
{
  sortable.forEach((el, i) => {

    new Sortable(el, {
      successCallback: function(response){
        if(response)
        {
          var toastSuccess = document.querySelector('.toast-custom.toast-success');
          toastSuccess.querySelector('.toast-body span').innerHTML = response.data.message;
          var toast = new Toast(toastSuccess);
          toast.show();
        }
      },
      errorCallback: function(response){
          if(response)
          {
            var toastError = document.querySelector('.toast-custom.toast-danger');
            toastError.querySelector('.toast-body span').innerHTML = response.data.message;
            var toast = new Toast(toastError);
            toast.show();
          }
      }
    });

  }); 
}
