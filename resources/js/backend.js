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

// Packages
require('../../../bs-component/resources/js/dynamic');
require('../../../bs-component/resources/js/checkbox-all');
require('../../../bs-component/resources/js/datepicker');
require('../../../sortable/resources/js/sortable');

// Components
require('./components/editor');
require('./components/media');
require('./components/modal');
require('./components/sidebar');
require('./components/sortable');

// Load Toast Notification
$('#toastNotification .toast:not(.toast-custom)').toast('show');
