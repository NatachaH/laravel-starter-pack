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
  toastNotifications.forEach(toastNotification => {
    var toast = new Toast(toastNotification);
    toast.show();
  });
}