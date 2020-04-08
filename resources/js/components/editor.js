/*
|--------------------------------------------------------------------------
| Backend - Editor Script
|--------------------------------------------------------------------------
|
| Plugin: https://quilljs.com/
|
*/

window.Quill = require('Quill');

// Add class for colors
var ColorClass = Quill.import('attributors/class/color');
ColorClass.keyName = 'text'
Quill.register(ColorClass, true);

// Select all .edito
var editors = document.querySelectorAll('.editor');
Array.prototype.forEach.call(editors, function(el, i) {
    var parent = el.parentElement;
    var toolbar = parent.querySelector('.toolbar');
    var editor = new Quill(el, {
      modules: {
      toolbar: {
        container: toolbar
      }
    }
    });
});

// If a form is submit =>
var form = document.querySelector('form');
form.onsubmit = function() {

  // Populate hidden form on submit
  Array.prototype.forEach.call(editors, function(el, i) {
    var parent = el.parentElement;
    var textarea = parent.querySelector('textarea');
    var html = el.firstChild.innerHTML;

    // Clean the <p><br/></p> to <br/>
    html = html.replace(new RegExp('<p><br></p>', 'g'), '<br>');
    html = html.replace(new RegExp('/^(\s*<br\s*\/?\s*>\s*)*|(\s*<br\s*\/?\s*>\s*)*\s*$','g'), '')

    // Populate the textarea if not empty
    if(html != '<br>') {
        textarea.value = html;
    }
  });
};
