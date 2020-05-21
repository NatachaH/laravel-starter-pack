/*
|--------------------------------------------------------------------------
| SP - Backend - Media - Script
|--------------------------------------------------------------------------
|
| Require: require('vendor/nh/bs-component/resources/js/dynamic');
| Require: require('vendor/nh/sortable/resources/js/sortable');
|
*/

// Init the Bootstrap File Input
bsCustomFileInput.init();

// Init the Dynamic to each .dynamic-media
var dynamicMedia = document.querySelectorAll('.dynamic-media');
Array.prototype.forEach.call(dynamicMedia, function(el, i) {

    // Init the dynamic
    new Dynamic(el, {
      addCallback: function(){
        bsCustomFileInput.init();
      }
    });

    // Init the sortable on multiple list
    var sortableDynamic = el.querySelector('.dynamic-list');
    if(sortableDynamic)
    {
      SortableJs.create(sortableDynamic, {
         animation: 150,
         handle: '.drag',
         onEnd: function (evt) {
           Array.prototype.forEach.call(sortableDynamic.children, function(el, i) {
             var input = el.querySelector('.dynamic-position');
             input.value = i+1;
           });
         }
      });
    }

});
