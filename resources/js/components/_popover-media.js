/*
|--------------------------------------------------------------------------
| SP - Backend - Popover Media - Script
|--------------------------------------------------------------------------
*/

import { Popover } from 'bootstrap'

var mediaPopovers = document.querySelectorAll('.popover-media')

if(mediaPopovers)
{
  Array.prototype.forEach.call(mediaPopovers, function(el, i) {
    var tooltip = new Popover(el,{
      trigger: 'click',
      placement: 'left',
      html: true,
    })
  });
}