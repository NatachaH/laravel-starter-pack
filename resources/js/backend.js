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
require('../../../bs-component/resources/js/bs-component');
require('../../../sortable/resources/js/sortable');

// Load Toast Notification
$('#toastNotification .toast:not(.toast-custom)').toast('show');

// Layout
require('./layout/layout');

// Components
require('./components/components');
