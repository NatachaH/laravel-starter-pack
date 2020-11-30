/*
|--------------------------------------------------------------------------
| SP - Backend - History - Script
|--------------------------------------------------------------------------
*/

var historyTooltips = document.querySelectorAll('.history-tooltip')

Array.prototype.forEach.call(historyTooltips, function(el, i) {
    var tooltip = new Bootstrap.Tooltip(el)
});
