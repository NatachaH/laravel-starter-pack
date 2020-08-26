/*
|--------------------------------------------------------------------------
| SP - Backend - Layout - Sidebar - Script
|--------------------------------------------------------------------------
*/

var backend = document.getElementById('backend');
var toggles = document.querySelectorAll('.toggle-sidebar');

toggles.forEach((el, i) => {
  el.addEventListener('click',function(e){
    var isOpen = backend.classList.contains('sidebar-on');
    var state = isOpen ? 'sidebar-close' : 'sidebar-open';

    backend.classList.add(state);

    setTimeout(function() {
        backend.classList.toggle('sidebar-on');
        backend.classList.remove(state);
        sessionStorage.setItem('sidebar', !isOpen);
    }, 1000);

  },false);
});


// First init
var state = sessionStorage.getItem('sidebar');
var isMobile = document.body.clientWidth <= 992;

if(isMobile || state == 'false')
{
  backend.classList.remove('sidebar-on');
} else {
  backend.classList.add('sidebar-on');
}
