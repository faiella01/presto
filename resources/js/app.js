require('bootstrap');
require('./main.js');
window.$=window.jQuery=require('jquery');
require('./announcementImages.js');

document.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;