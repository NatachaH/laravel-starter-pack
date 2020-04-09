/*
|--------------------------------------------------------------------------
| Backend - Editor - Smat break - Script
|--------------------------------------------------------------------------
|
| Plugin: https://quilljs.com/
|
*/

import Quill from 'Quill';

const Break = Quill.import('blots/break');
const Embed = Quill.import('blots/embed');

class SmartBreak extends Break
{

  insertInto(parent, ref) {
    Embed.prototype.insertInto.call(this, parent, ref)
  }

  length() {
    return 1;
  }

  value() {
    return '\n';
  }

}

SmartBreak.blotName = 'smartbreak';
SmartBreak.tagName = 'BR';


export default SmartBreak;
