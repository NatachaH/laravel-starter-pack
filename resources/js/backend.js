/*
|--------------------------------------------------------------------------
| SP - Backend - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
| Libraries: Jquery & Bootstrap 4.0
|
*/

// Packages
import '../../../bs-component/resources/js/bs-component';
import '../../../sortable/resources/js/sortable';

// Load Toast Notification
var toastNotifications = document.querySelectorAll('#toastNotification .toast:not(.toast-custom)');
Array.prototype.forEach.call(toastNotifications, function(el, i) {
    var toast = new Bootstrap.Toast(el);
    toast.show();
});

// Layout
import './layout/layout';

// Components
import './components/components';
