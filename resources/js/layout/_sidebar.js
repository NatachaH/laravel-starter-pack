/*
|--------------------------------------------------------------------------
| SP - Backend - Layout - Sidebar - Script
|--------------------------------------------------------------------------
*/

var openBtn = document.getElementById('openSidebarBtn');
var closeBtn = document.getElementById('closeSidebarBtn');
var sidebar = document.getElementById('sidebar');

// Open the sidebar
openBtn.addEventListener('click',function(e){
  toggleSidebar()
},false);

// Close the sidebar
closeBtn.addEventListener('click',function(e){
  toggleSidebar()
},false);

// Toggle function
function toggleSidebar()
{
    var isOpen = sidebar.classList.contains('sidebar-open');

    if(isOpen)
    {
      // Close the sidebar
      sidebar.classList.remove('sidebar-open');
    } else {
      // Open the sidebar
      sidebar.className += ' sidebar-open';
    }
}
