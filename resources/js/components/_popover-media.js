/*
|--------------------------------------------------------------------------
| SP - Backend - Popover Media - Script
|--------------------------------------------------------------------------
*/

import { Popover } from 'bootstrap'

var mediaPopovers = document.querySelectorAll('.popover-media')

if(mediaPopovers)
{
  mediaPopovers.forEach(media => new Popover(media,{
    trigger: 'click',
    placement: 'left',
    html: true,
  }));
}