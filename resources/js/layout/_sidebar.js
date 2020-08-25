/*
|--------------------------------------------------------------------------
| SP - Backend - Layout - Sidebar - Script
|--------------------------------------------------------------------------
*/

var backend = document.getElementById('backend');
var toggles = document.querySelectorAll('.toggle-sidebar');

toggles.forEach((el, i) => {
  el.addEventListener('click',function(e){
    var isOpen = backend.classList.contains('sidebar-open');
    sessionStorage.setItem('sidebar', !isOpen);
    backend.classList.toggle('sidebar-open');
  },false);
});


// First init
var state = sessionStorage.getItem('sidebar');
var isMobile = document.body.clientWidth <= 992;

console.log(isMobile);

if(isMobile || state == 'false')
{
  backend.classList.remove('sidebar-open');
} else {
  backend.classList.add('sidebar-open');
}
