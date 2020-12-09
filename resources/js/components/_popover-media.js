/*
|--------------------------------------------------------------------------
| SP - Backend - Popover Media - Script
|--------------------------------------------------------------------------
*/

var mediaPopovers = document.querySelectorAll('.popover-media')

Array.prototype.forEach.call(mediaPopovers, function(el, i) {
    var tooltip = new Bootstrap.Popover(el,{
      trigger: 'click',
      placement: 'left',
      html: true,
    })
});
