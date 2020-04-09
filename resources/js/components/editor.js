/*
|--------------------------------------------------------------------------
| Backend - Editor Script
|--------------------------------------------------------------------------
|
| Plugin: https://quilljs.com/
|
*/

import Quill from 'Quill';

// Imports
let ColorClass = Quill.import('attributors/class/color');
import SmartBreak from './editor/smart-break';

// Add class for colors
ColorClass.keyName = 'text'
Quill.register(ColorClass, true);

// Add class for smart break
Quill.register(SmartBreak, true);

// Select all .edito
var editors = document.querySelectorAll('.editor');
Array.prototype.forEach.call(editors, function(el, i) {
    var parent = el.parentElement;
    var toolbar = parent.querySelector('.ql-toolbar');
    var editor = parent.querySelector('.ql-container');

    var headerDropdown = parent.querySelector('.ql-dropdown-header');
    var colorDropdown = parent.querySelector('.ql-dropdown-color');

    var ql = new Quill(editor, {
      modules: {
          toolbar: {
              container: toolbar,
              handlers: {
                // handlers object will be merged with default handlers object
                'link': function(value) {
                  if (value) {
                    var href = prompt('URL');

                    var patternUrl = new RegExp('^(https?:\\/\\/)?'+ // protocol
                       '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                       '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                       '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                       '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                       '(\\#[-a-z\\d_]*)?$','i'); // fragment locator

                    var patternEmail = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

                    if(!!patternUrl.test(href))
                    {
                      this.quill.format('link', href);
                    } else if (!!patternEmail.test(href)) {
                      this.quill.format('link', 'mailto:'+href);
                    }

                  } else {
                    this.quill.format('link', false);
                  }
                }
              }
          },
          keyboard: {
            bindings: {

              shiftEnter: {
            			key: 13,
            			shiftKey: true,
            			handler: function(range, context) {
                    let currentLeaf = this.quill.getLeaf(range.index)[0]
                    let nextLeaf = this.quill.getLeaf(range.index + 1)[0]
                    this.quill.insertEmbed(range.index, 'smartbreak', true, 'user');
                    if (nextLeaf === null || (currentLeaf.parent !== nextLeaf.parent)) {
                      this.quill.insertEmbed(range.index, 'smartbreak', true, 'user');
                    }
                    this.quill.setSelection(range.index + 2, 'silent');
                  }
          		}

            }
          }
      }
    });

    // When selection change
    ql.on('selection-change', function() {

      // Color dropdown state
      if(ql.getFormat().color) {
        colorDropdown.classList.add('ql-active');
      } else {
        colorDropdown.classList.remove('ql-active');
      }

      // Header dropdown state
      var headerValue = '';
      if(ql.getFormat().header) {
        headerDropdown.classList.add('ql-active');
        headerValue = ql.getFormat().header;
      } else {
        headerDropdown.classList.remove('ql-active');
      };
      var headerText = document.querySelector('.ql-header[value="'+headerValue+'"]').innerHTML;
      headerDropdown.querySelector('small').textContent = headerText;

    });
});

// If a form is submit =>
var form = document.querySelector('form');
form.onsubmit = function() {
  // Populate hidden form on submit
  Array.prototype.forEach.call(editors, function(el, i) {
    var parent = el.parentElement;
    var textarea = parent.querySelector('.ql-textarea');
    var html = parent.querySelector('.ql-editor').innerHTML;

    // Clean the <p><br/></p> to <br/>
    html = html.replace(new RegExp('<p><br></p>', 'g'), '<br>');
    html = html.replace(new RegExp('/^(\s*<br\s*\/?\s*>\s*)*|(\s*<br\s*\/?\s*>\s*)*\s*$','g'), '')

    // Populate the textarea if not empty
    if(html != '<br>') {
        textarea.value = html;
    }
  });
};
