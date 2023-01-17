/*
|--------------------------------------------------------------------------
| SP - Backend - Notification - Script
|--------------------------------------------------------------------------
*/

import { Toast } from 'bootstrap'

// Load Toast Notification
var toastNotifications = document.querySelectorAll('#toastNotification .toast:not(.toast-custom)');
if(toastNotifications)
{
  Array.prototype.forEach.call(toastNotifications, function(el, i) {
    var toast = new Toast(el);
    toast.show();
  });
}