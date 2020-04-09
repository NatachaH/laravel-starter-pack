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
import HelperLink from './editor/helper-link';

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
    var linkBtn = parent.querySelector('.ql-link');

    var ql = new Quill(editor, {
      modules: {
          toolbar: {
              container: toolbar,
              handlers: {
                // handlers object will be merged with default handlers object
                'link': function(value) {
                  if (value) {

                    // Get the current selection and check is not null
                    let range = this.quill.getSelection();
                    if (range == null || range.length == 0) return;

                    // Select the preview text and check if is a link
                    let preview =  HelperLink.preview(this.quill.getText(range));

                    // Prompt with default preview
                    let href = prompt('URL', preview);

                    // Check if href is valid
                    if (!HelperLink.isUrl(href) && !HelperLink.isEmail(href)) return;

                    // Set the link and init the tooltip
                    if(HelperLink.isEmail(href)) href = 'mailto:'+href ;
                    this.quill.format('link', href);
                    HelperLink.initTooltip();

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

// Init the first time the tooltip
HelperLink.initTooltip();

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
