/*
|--------------------------------------------------------------------------
| SP - Backend - History - Script
|--------------------------------------------------------------------------
*/

import { Tooltip } from 'bootstrap'

var historyTooltips = document.querySelectorAll('.history-tooltip')

if(historyTooltips)
{
  Array.prototype.forEach.call(historyTooltips, function(el, i) {
    var tooltip = new Tooltip(el, {
      trigger: 'click'
    })
});
}

