!function(e,t){for(var n in t)e[n]=t[n]}(this,function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=74)}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},11:function(e,t){!function(){e.exports=this.wp.date}()},13:function(e,t){!function(){e.exports=this.React}()},19:function(e,t,n){"use strict";var r=n(0),o=(n(32),["primary","light","warning","alert"]);t.a=function(e){var t=e.message,n=e.type,c=e.isCompact,a=["chip","chip-".concat(o.find(function(e){return e===n})||"primary"),c?"is-compact":""];return Object(r.createElement)("span",{className:a.join(" ").trim()},t)}},32:function(e,t,n){},34:function(e,t,n){"use strict";var r=Object.assign||function(e){for(var t,n=1;n<arguments.length;n++)for(var r in t=arguments[n])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e};Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){var t=e.size,n=void 0===t?24:t,o=e.onClick,c=(e.icon,e.className),i=function(e,t){var n={};for(var r in e)0<=t.indexOf(r)||Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}(e,["size","onClick","icon","className"]),s=["gridicon","gridicons-checkmark-circle",c,!1,!1,!1].filter(Boolean).join(" ");return a.default.createElement("svg",r({className:s,height:n,width:n,onClick:o},i,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"}),a.default.createElement("g",null,a.default.createElement("path",{d:"M11 17.768l-4.884-4.884 1.768-1.768L11 14.232l8.658-8.658C17.823 3.39 15.075 2 12 2 6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10c0-1.528-.353-2.97-.966-4.266L11 17.768z"})))};var o,c=n(13),a=(o=c)&&o.__esModule?o:{default:o};e.exports=t.default},35:function(e,t,n){"use strict";var r=Object.assign||function(e){for(var t,n=1;n<arguments.length;n++)for(var r in t=arguments[n])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e};Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){var t,n=e.size,o=void 0===n?24:n,c=e.onClick,i=(e.icon,e.className),s=function(e,t){var n={};for(var r in e)0<=t.indexOf(r)||Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}(e,["size","onClick","icon","className"]),u=["gridicon","gridicons-notice",i,(t=o,!(0!=t%18)&&"needs-offset"),!1,!1].filter(Boolean).join(" ");return a.default.createElement("svg",r({className:u,height:o,width:o,onClick:c},s,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"}),a.default.createElement("g",null,a.default.createElement("path",{d:"M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm1 15h-2v-2h2v2zm0-4h-2l-.5-6h3l-.5 6z"})))};var o,c=n(13),a=(o=c)&&o.__esModule?o:{default:o};e.exports=t.default},42:function(e,t){!function(){e.exports=this.ReactDOM}()},6:function(e,t){!function(){e.exports=this.moment}()},68:function(e,t,n){},7:function(e,t){!function(){e.exports=this.wc.navigation}()},73:function(e,t,n){"use strict";function r(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function o(e,t){if(e){if("string"==typeof e)return r(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?r(e,t):void 0}}function c(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,o=!1,c=void 0;try{for(var a,i=e[Symbol.iterator]();!(r=(a=i.next()).done)&&(n.push(a.value),!t||n.length!==t);r=!0);}catch(e){o=!0,c=e}finally{try{r||null==i.return||i.return()}finally{if(o)throw c}}return n}}(e,t)||o(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function a(e){return(a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function i(e){return function(e){if(Array.isArray(e))return r(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||o(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}var s,u,l,m,f=n(13),p=/<(\/)?(\w+)\s*(\/)?>/g;function d(e,t,n,r,o){return{element:e,tokenStart:t,tokenLength:n,prevOffset:r,leadingTextStart:o,children:[]}}var b=function(e){var t="object"===a(e),n=t&&Object.values(e);return t&&n.length&&n.every(function(e){return Object(f.isValidElement)(e)})};function y(e){var t=function(){var e=p.exec(s);if(null===e)return["no-more-tokens"];var t=e.index,n=c(e,4),r=n[0],o=n[1],a=n[2],i=n[3],u=r.length;if(i)return["self-closed",a,t,u];if(o)return["closer",a,t,u];return["opener",a,t,u]}(),n=c(t,4),r=n[0],o=n[1],a=n[2],b=n[3],y=m.length,_=a>u?u:null;if(!e[o])return h(),!1;switch(r){case"no-more-tokens":if(0!==y){var j=m.pop(),O=j.leadingTextStart,w=j.tokenStart;l.push(s.substr(O,w))}return h(),!1;case"self-closed":return 0===y?(null!==_&&l.push(s.substr(_,a-_)),l.push(e[o]),u=a+b,!0):(v(new d(e[o],a,b)),u=a+b,!0);case"opener":return m.push(new d(e[o],a,b,a+b,_)),u=a+b,!0;case"closer":if(1===y)return function(e){var t=m.pop(),n=t.element,r=t.leadingTextStart,o=t.prevOffset,c=t.tokenStart,a=t.children,u=e?s.substr(o,e-o):s.substr(o);u&&a.push(u);null!==r&&l.push(s.substr(r,c-r));l.push(f.cloneElement.apply(void 0,[n,null].concat(i(a))))}(a),u=a+b,!0;var g=m.pop(),E=s.substr(g.prevOffset,a-g.prevOffset);g.children.push(E),g.prevOffset=a+b;var S=new d(g.element,g.tokenStart,g.tokenLength,a+b);return S.children=g.children,v(S),u=a+b,!0;default:return h(),!1}}function h(){var e=s.length-u;0!==e&&l.push(s.substr(u,e))}function v(e){var t=e.element,n=e.tokenStart,r=e.tokenLength,o=e.prevOffset,c=e.children,a=m[m.length-1],u=s.substr(a.prevOffset,n-a.prevOffset);u&&a.children.push(u),a.children.push(f.cloneElement.apply(void 0,[t,null].concat(i(c)))),a.prevOffset=o||n+r}t.a=function(e,t){if(s=e,u=0,l=[],m=[],p.lastIndex=0,!b(t))throw new TypeError("The conversionMap provided is not valid. It must be an object with values that are WPElements");do{}while(y(t));return f.createElement.apply(void 0,[f.Fragment,null].concat(i(l)))}},74:function(e,t,n){"use strict";n.r(t);var r,o,c,a,i=n(0),s=(n(13),n(42)),u=n.n(s),l=n(1),m=n(7),f=n(11),p=n(6),d=n.n(p),b=n(73),y=n(34),h=n.n(y),v=n(35),_=n.n(v),j=n(19),O=(n(68),function(e){var t,n,r,o=e.accountStatus;return o.error?Object(i.createElement)("div",null,Object(l.__)("Error determining the connection status.")):Object(i.createElement)("div",null,Object(i.createElement)("div",null,(t=o.status,n=Object(l.__)("Unknown","woocommerce-payments"),r="light","complete"===t?(n=Object(l.__)("Complete","woocommerce-payments"),r="primary"):"restricted_soon"===t?(n=Object(l.__)("Restricted soon","woocommerce-payments"),r="warning"):"restricted"===t?(n=Object(l.__)("Restricted","woocommerce-payments"),r="alert"):t.startsWith("rejected")&&(n=Object(l.__)("Rejected","woocommerce-payments"),r="light"),Object(i.createElement)(j.a,{message:n,type:r,isCompact:!0})),function(e){var t,n,r;return e?(n=Object(l.__)("Enabled","woocommerce-payments"),r=Object(i.createElement)(h.a,{size:18}),t="account-status__info__green"):(n=Object(l.__)("Disabled","woocommerce-payments"),r=Object(i.createElement)(_.a,{size:18}),t="account-status__info__red"),Object(i.createElement)("span",{className:"account-status__info"},Object(l.__)("Payments:","woocommerce-payments"),Object(i.createElement)("span",{className:t},r,n))}(o.paymentsEnabled),function(e){var t,n="account-status__info__green",r=Object(i.createElement)(h.a,{size:18});return"disabled"===e?(t=Object(l.__)("Disabled","woocommerce-payments"),n="account-status__info__red",r=Object(i.createElement)(_.a,{size:18})):t="daily"===e?Object(l.__)("Daily","woocommerce-payments"):"weekly"===e?Object(l.__)("Weekly","woocommerce-payments"):"monthly"===e?Object(l.__)("Monthly","woocommerce-payments"):"manual"===e?Object(l.__)("Manual","woocommerce-payments"):Object(l.__)("Unknown","woocommerce-payments"),Object(i.createElement)("span",{className:"account-status__info"},Object(l.__)("Deposits:","woocommerce-payments"),Object(i.createElement)("span",{className:n},r,t))}(o.depositsStatus)),function(e){var t=e.status,n=e.currentDeadline,r=e.pastDue,o=e.accountLink;if("complete"===t)return"";var c="";return"restricted_soon"===t?c=Object(b.a)(Object(l.sprintf)(Object(l.__)("To avoid disrupting deposits, <a>update this account</a> by %s with more information about the business.","woocommerce-payments"),Object(f.dateI18n)("ga M j, Y",d()(1e3*n))),{a:Object(i.createElement)("a",{href:o})}):"restricted"===t&&r?c=Object(b.a)(Object(l.__)("Payments and deposits are disabled for this account until missing business information is updated. <a>Update now</a>","woocommerce-payments"),{a:Object(i.createElement)("a",{href:o})}):"restricted"===t?c=Object(l.__)("Payments and deposits are disabled for this account until business information is verified by the payment processor.","woocommerce-payments"):"rejected.fraud"===t?c=Object(l.__)("This account has been rejected because of suspected fraudulent activity.","woocommerce-payments"):"rejected.terms_of_service"===t?c=Object(l.__)("This account has been rejected due to a Terms of Service violation.","woocommerce-payments"):t.startsWith("rejected")&&(c=Object(l.__)("This account has been rejected.","woocommerce-payments")),c?Object(i.createElement)("div",{className:"account-status__desc"},c):null}(o))});if(u.a.render(Object(i.createElement)(O,wcpayAdminSettings),document.getElementById("wcpay-account-status-container")),r=Object(m.getQuery)(),o=r.page,c=r.tab,a=r.section,"wc-settings"===o&&"checkout"===c&&"woocommerce_payments"===a){var w=document.querySelector("form#mainform"),g=document.getElementById("woocommerce_woocommerce_payments_manual_capture");w&&g&&!g.checked&&w.addEventListener("submit",function(e){g.checked&&(confirm(Object(l.__)("When manual capture is enabled, charges must be captured within 7 days of authorization, otherwise the authorization and order will be canceled. Are you sure you want to enable it?","woocommerce-payments"))||e.preventDefault())})}}}));