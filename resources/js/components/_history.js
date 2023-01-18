/*
|--------------------------------------------------------------------------
| SP - Backend - History - Script
|--------------------------------------------------------------------------
*/

import { Tooltip } from 'bootstrap'

var historyTooltips = document.querySelectorAll('.history-tooltip')

if(historyTooltips)
{
  historyTooltips.forEach(history => new Tooltip(history, { trigger: 'click'}));
}

