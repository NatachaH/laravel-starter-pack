/*
|--------------------------------------------------------------------------
| SP - Backend - Media - Script
|--------------------------------------------------------------------------
*/

// Init the Dynamic to each .dynamic-media
var dynamicMedia = document.querySelectorAll('.dynamic-media');
dynamicMedia.forEach((el, i) => {

    // Init the dynamic
    new Dynamic(el, {
      addCallback: function(){}
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
