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
require('../../../sortable/resources/js/sortable');
require('../../../mediable/resources/js/mediable');

// Components
require('./components/editor');
require('./components/media');
require('./components/modal');
require('./components/sidebar');
require('./components/sortable');

// Load Toast Notification
$('#toastNotification .toast:not(.toast-custom)').toast('show');
