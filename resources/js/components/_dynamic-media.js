/*
|--------------------------------------------------------------------------
| SP - Backend - Media - Script
|--------------------------------------------------------------------------
*/

import SortableJs from 'sortablejs';
import Dynamic from  './vendor/nh/bs-component/resources/js/_dynamic';

// Init the Dynamic to each .dynamic-media
var dynamicMedia = document.querySelectorAll('.dynamic-media');
if(dynamicMedia)
{
  dynamicMedia.forEach(el => {

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
          sortableDynamic.children.forEach((el,i) => {
            var input = el.querySelector('.dynamic-position');
            input.value = i+1;
          });
         }
      });
    }

  });
}
