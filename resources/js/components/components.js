/*
|--------------------------------------------------------------------------
| SP - Backend - Components
|--------------------------------------------------------------------------
*/

import './_dynamic-media';
import './_history';
import './_popover-media';
import './_sortable';
import TableTree from './_table-tree';

// Init the TableTreeView
var tree = document.querySelectorAll('.table-tree');
if(tree)
{
    tree.forEach(el => new TableTree(el));
}