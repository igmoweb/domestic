!function(e){function o(n){if(t[n])return t[n].exports;var c=t[n]={i:n,l:!1,exports:{}};return e[n].call(c.exports,c,c.exports,o),c.l=!0,c.exports}var t={};return o.m=e,o.c=t,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:n})},o.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,o){return Object.prototype.hasOwnProperty.call(e,o)},o.p="",o(o.s=15)}({15:function(e,o,t){e.exports=t(16)},16:function(e,o,t){"use strict";!function(e){wp.customize("domestic_menu_schema",function(o){o.bind(function(o){var t=e("body");switch(o){case"dark":t.removeClass("domestic-menu-schema-light"),t.addClass("domestic-menu-schema-dark");break;case"light":t.removeClass("domestic-menu-schema-dark"),t.addClass("domestic-menu-schema-light")}})}),console.log(domesticCustomize.sections),Object.keys(domesticCustomize.sections).forEach(function(o){console.log(o),wp.customize("domestic_front_page_section_color_"+o,function(t){t.bind(function(t){e(".front-page-section-key-"+o).css("color",t)})}),wp.customize("domestic_front_page_section_background_"+o,function(t){t.bind(function(t){e(".front-page-section-key-"+o).css("background-color",t)})})})}(jQuery)}});