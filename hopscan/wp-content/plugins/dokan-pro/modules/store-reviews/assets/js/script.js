!function(t){var r={};function n(e){if(r[e])return r[e].exports;var o=r[e]={i:e,l:!1,exports:{}};return t[e].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=t,n.c=r,n.d=function(t,r,e){n.o(t,r)||Object.defineProperty(t,r,{enumerable:!0,get:e})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,r){if(1&r&&(t=n(t)),8&r)return t;if(4&r&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(n.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&r&&"string"!=typeof t)for(var o in t)n.d(e,o,function(r){return t[r]}.bind(null,o));return e},n.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(r,"a",r),r},n.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},n.p="",n(n.s=86)}({4:function(t,r){function n(r){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?t.exports=n=function(t){return typeof t}:t.exports=n=function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(r)}t.exports=n},68:function(t,r,n){},86:function(t,r,n){"use strict";n.r(r);n(68);var e,o,i,a,s=n(4),l=n.n(s);!function(t){function r(t,r,n){return t===r?t=r:t===n&&(t=n),t}function n(t){return void 0!==t}function e(t,r,n){var e=n/100*(r-t);return 1===(e=Math.round(t+e).toString(16)).length&&(e="0"+e),e}function o(t,r,o){if(!t||!r)return null;o=n(o)?o:0,t=p(t),r=p(r);var i=e(t.r,r.r,o),a=e(t.b,r.b,o);return"#"+i+e(t.g,r.g,o)+a}function i(e,a){function s(t){n(t)||(t=a.rating),N=t;var r=t/W,e=r*A;r>1&&(e+=(Math.ceil(r)-1)*U),g(a.ratedFill),B.css("width",e+"%")}function l(){Y=T*a.numStars+R*(a.numStars-1),A=T/Y*100,U=R/Y*100,e.width(Y),s()}function c(t){var r=a.starWidth=t;return T=window.parseFloat(a.starWidth.replace("px","")),Q.find("svg").attr({width:a.starWidth,height:r}),B.find("svg").attr({width:a.starWidth,height:r}),l(),e}function f(t){return a.spacing=t,R=parseFloat(a.spacing.replace("px","")),Q.find("svg:not(:first-child)").css({"margin-left":t}),B.find("svg:not(:first-child)").css({"margin-left":t}),l(),e}function p(t){return a.normalFill=t,Q.find("svg").attr({fill:a.normalFill}),e}function g(t){if(a.multiColor){var r=(N-D)/a.maxValue*100,n=a.multiColor||{};t=o(n.startColor||d.startColor,n.endColor||d.endColor,r)}else $=t;return a.ratedFill=t,B.find("svg").attr({fill:a.ratedFill}),e}function h(t){a.multiColor=t,g(t||$)}function v(r){a.numStars=r,W=a.maxValue/a.numStars,Q.empty(),B.empty();for(var n=0;n<a.numStars;n++)Q.append(t(u)),B.append(t(u));return c(a.starWidth),p(a.normalFill),f(a.spacing),s(),e}function m(t){return a.maxValue=t,W=a.maxValue/a.numStars,a.rating>t&&S(t),s(),e}function y(t){return a.precision=t,S(a.rating),e}function b(t){return a.halfStar=t,e}function w(t){return a.fullStar=t,e}function x(t){var r=Q.offset().left,n=r+Q.width(),e=a.maxValue,o=t.pageX,i=0;if(r>o)i=D;else if(o>n)i=e;else{var s=(o-r)/(n-r);if(R>0)for(var l=s*=100;l>0;)l>A?(i+=W,l-=A+U):(i+=l/A*W,l=0);else i=s*a.maxValue;i=function(t){var r=t%W,n=W/2,e=a.halfStar,o=a.fullStar;return o||e?(o||e&&r>n?t+=W-r:(t-=r,r>0&&(t+=n)),t):t}(i)}return i}function k(t){return a.readOnly=t,e.attr("readonly",!0),P(),t||(e.removeAttr("readonly"),e.on("mousemove",F).on("mouseenter",F).on("mouseleave",O).on("click",I).on("rateyo.init",V).on("rateyo.change",E).on("rateyo.set",M)),e}function S(t){var n=t,o=a.maxValue;return"string"==typeof n&&("%"===n[n.length-1]&&(n=n.substr(0,n.length-1),m(o=100)),n=parseFloat(n)),function(t,r,n){if(!(t>=r&&n>=t))throw Error("Invalid Rating, expected value between "+r+" and "+n)}(n,D,o),n=parseFloat(n.toFixed(a.precision)),r(parseFloat(n),D,o),a.rating=n,s(),X&&e.trigger("rateyo.set",{rating:n}),e}function C(t){return a.onInit=t,e}function _(t){return a.onSet=t,e}function j(t){return a.onChange=t,e}function F(t){var n=x(t).toFixed(a.precision),o=a.maxValue;s(n=r(parseFloat(n),D,o)),e.trigger("rateyo.change",{rating:n})}function O(){s(),e.trigger("rateyo.change",{rating:a.rating})}function I(t){var r=x(t).toFixed(a.precision);r=parseFloat(r),q.rating(r)}function V(t,r){a.onInit&&"function"==typeof a.onInit&&a.onInit.apply(this,[r.rating,q])}function E(t,r){a.onChange&&"function"==typeof a.onChange&&a.onChange.apply(this,[r.rating,q])}function M(t,r){a.onSet&&"function"==typeof a.onSet&&a.onSet.apply(this,[r.rating,q])}function P(){e.off("mousemove",F).off("mouseenter",F).off("mouseleave",O).off("click",I).off("rateyo.init",V).off("rateyo.change",E).off("rateyo.set",M)}this.node=e.get(0);var q=this;e.empty().addClass("jq-ry-container");var W,T,A,R,U,Y,z=t("<div/>").addClass("jq-ry-group-wrapper").appendTo(e),Q=t("<div/>").addClass("jq-ry-normal-group").addClass("jq-ry-group").appendTo(z),B=t("<div/>").addClass("jq-ry-rated-group").addClass("jq-ry-group").appendTo(z),D=0,N=a.rating,X=!1,$=a.ratedFill;this.rating=function(t){return n(t)?(S(t),e):a.rating},this.destroy=function(){return a.readOnly||P(),i.prototype.collection=function(r,n){return t.each(n,(function(t){if(r===this.node){var e=n.slice(0,t),o=n.slice(t+1,n.length);return n=e.concat(o),!1}})),n}(e.get(0),this.collection),e.removeClass("jq-ry-container").children().remove(),e},this.method=function(t){if(!t)throw Error("Method name not specified!");if(!n(this[t]))throw Error("Method "+t+" doesn't exist!");var r=Array.prototype.slice.apply(arguments,[]),e=r.slice(1),o=this[t];return o.apply(this,e)},this.option=function(t,r){if(!n(t))return a;var e;switch(t){case"starWidth":e=c;break;case"numStars":e=v;break;case"normalFill":e=p;break;case"ratedFill":e=g;break;case"multiColor":e=h;break;case"maxValue":e=m;break;case"precision":e=y;break;case"rating":e=S;break;case"halfStar":e=b;break;case"fullStar":e=w;break;case"readOnly":e=k;break;case"spacing":e=f;break;case"onInit":e=C;break;case"onSet":e=_;break;case"onChange":e=j;break;default:throw Error("No such option as "+t)}return n(r)?e(r):a[t]},v(a.numStars),k(a.readOnly),this.collection.push(this),this.rating(a.rating,!0),X=!0,e.trigger("rateyo.init",{rating:a.rating})}function a(r,n){var e;return t.each(n,(function(){return r===this.node?(e=this,!1):void 0})),e}function s(r){var n=i.prototype.collection,e=t(this);if(0===e.length)return e;var o=Array.prototype.slice.apply(arguments,[]);if(0===o.length)r=o[0]={};else{if(1!==o.length||"object"!=l()(o[0])){if(o.length>=1&&"string"==typeof o[0]){var s=o[0],u=o.slice(1),d=[];return t.each(e,(function(t,r){var e=a(r,n);if(!e)throw Error("Trying to set options before even initialization");var o=e[s];if(!o)throw Error("Method "+s+" does not exist!");var i=o.apply(e,u);d.push(i)})),d=1===d.length?d[0]:d}throw Error("Invalid Arguments")}r=o[0]}return r=t.extend({},c,r),t.each(e,(function(){return a(this,n)?void 0:new i(t(this),t.extend({},r))}))}var u='<?xml version="1.0" encoding="utf-8"?><svg version="1.1"xmlns="http://www.w3.org/2000/svg"viewBox="0 12.705 512 486.59"x="0px" y="0px"xml:space="preserve"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "/></svg>',c={starWidth:"32px",normalFill:"gray",ratedFill:"#f39c12",numStars:5,maxValue:5,precision:1,rating:0,fullStar:!1,halfStar:!1,readOnly:!1,spacing:"0px",multiColor:null,onInit:null,onChange:null,onSet:null},d={startColor:"#c0392b",endColor:"#f1c40f"},f=/^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i,p=function(t){if(!f.test(t))return null;var r=f.exec(t);return{r:parseInt(r[1],16),g:parseInt(r[2],16),b:parseInt(r[3],16)}};i.prototype.collection=[],window.RateYo=i,t.fn.rateYo=function(){return s.apply(this,Array.prototype.slice.apply(arguments,[]))}}(window.jQuery),e=jQuery,o=e(".dokan-review-wrapper"),i="dokan_store_rating_ajax_handler",a={init:function(){o.on("click","button.add-review-btn",this.popUp.show),o.on("click","button.edit-review-btn",this.popUp.showEdit),e("body").on("submit","#dokan-add-review-form",this.popUp.submitReview)},popUp:{show:function(t){var r={action:i,data:"review_form",store_id:e("button.add-review-btn").data("store_id")};e.post(dokan.ajaxurl,r,(function(t){1==t.success?e.magnificPopup.open({items:{src:'<div class="white-popup dokan-seller-rating-add-wrapper"><div id="ds-error-msg" ></div>'+t.data+"</div>",type:"inline"}}):alert("failed")}))},showEdit:function(t){var r={action:i,data:"edit_review_form",store_id:e("button.edit-review-btn").data("store_id"),post_id:e("button.edit-review-btn").data("post_id")};e.post(dokan.ajaxurl,r,(function(t){1==t.success?e.magnificPopup.open({items:{src:'<div class="white-popup dokan-seller-rating-add-wrapper"><div id="ds-error-msg" ></div>'+t.data+"</div>",type:"inline"}}):alert("failed")}))},submitReview:function(t){t.preventDefault();var r=e(this),n={action:i,data:"submit_review",store_id:e("button.add-review-btn").data("store_id"),rating:e("#dokan-seller-rating").rateYo("rating"),form_data:r.serialize()},o=e("#ds-error-msg");e.post(dokan.ajaxurl,n,(function(t){1==t.success?(e.magnificPopup.close(),e.magnificPopup.open({items:{src:'<div class="white-popup dokan-seller-rating-add-wrapper dokan-alert dokan-alert-success">'+t.msg+"</div>",type:"inline"}}),location.reload()):0==t.success?(o.removeClass("dokan-hide"),o.html(t.msg),o.addClass("dokan-alert dokan-alert-danger")):alert("failed")}))}}},e((function(){a.init()}))}});