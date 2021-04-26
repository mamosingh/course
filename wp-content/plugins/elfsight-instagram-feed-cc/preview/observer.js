(function(window){"use strict";/*!
 * 
 * 	elfsight.com
 * 
 * 	Copyright (c) 2020 Elfsight, LLC. ALL RIGHTS RESERVED
 * 
 */
!function(r){var t={};function o(e){if(t[e])return t[e].exports;var n=t[e]={i:e,l:!1,exports:{}};return r[e].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=r,o.c=t,o.d=function(r,t,e){o.o(r,t)||Object.defineProperty(r,t,{configurable:!1,enumerable:!0,get:e})},o.n=function(r){var t=r&&r.__esModule?function(){return r.default}:function(){return r};return o.d(t,"a",t),t},o.o=function(r,t){return Object.prototype.hasOwnProperty.call(r,t)},o.p="",o(o.s=49)}([function(r,t,o){(function(t){var o=function(r){return r&&r.Math==Math&&r};r.exports=o("object"==typeof globalThis&&globalThis)||o("object"==typeof window&&window)||o("object"==typeof self&&self)||o("object"==typeof t&&t)||Function("return this")()}).call(t,o(51))},function(r,t){r.exports=function(r){try{return!!r()}catch(r){return!0}}},function(r,t,o){var e=o(0),n=o(27).f,i=o(9),c=o(32),u=o(18),l=o(56),a=o(62);r.exports=function(r,t){var o,s,f,p,g,v=r.target,d=r.global,b=r.stat;if(o=d?e:b?e[v]||u(v,{}):(e[v]||{}).prototype)for(s in t){if(p=t[s],f=r.noTargetGet?(g=n(o,s))&&g.value:o[s],!a(d?s:v+(b?".":"#")+s,r.forced)&&void 0!==f){if(typeof p==typeof f)continue;l(p,f)}(r.sham||f&&f.sham)&&i(p,"sham",!0),c(o,s,p,r)}}},function(r,t){r.exports=function(r){if(void 0==r)throw TypeError("Can't call method on "+r);return r}},function(r,t,o){var e=o(8);r.exports=function(r){if(!e(r))throw TypeError(String(r)+" is not an object");return r}},function(r,t){var o={}.hasOwnProperty;r.exports=function(r,t){return o.call(r,t)}},function(r,t,o){var e=o(0),n=o(36),i=o(5),c=o(37),u=o(42),l=o(66),a=n("wks"),s=e.Symbol,f=l?s:s&&s.withoutSetter||c;r.exports=function(r){return i(a,r)||(u&&i(s,r)?a[r]=s[r]:a[r]=f("Symbol."+r)),a[r]}},function(r,t,o){var e=o(1);r.exports=!e(function(){return 7!=Object.defineProperty({},1,{get:function(){return 7}})[1]})},function(r,t){r.exports=function(r){return"object"==typeof r?null!==r:"function"==typeof r}},function(r,t,o){var e=o(7),n=o(13),i=o(28);r.exports=e?function(r,t,o){return n.f(r,t,i(1,o))}:function(r,t,o){return r[t]=o,r}},function(r,t){var o=Math.ceil,e=Math.floor;r.exports=function(r){return isNaN(r=+r)?0:(r>0?e:o)(r)}},function(r,t){var o={}.toString;r.exports=function(r){return o.call(r).slice(8,-1)}},function(r,t,o){var e=o(17),n=o(3);r.exports=function(r){return e(n(r))}},function(r,t,o){var e=o(7),n=o(30),i=o(4),c=o(29),u=Object.defineProperty;t.f=e?u:function(r,t,o){if(i(r),t=c(t,!0),i(o),n)try{return u(r,t,o)}catch(r){}if("get"in o||"set"in o)throw TypeError("Accessors not supported");return"value"in o&&(r[t]=o.value),r}},function(r,t,o){var e=o(10),n=Math.min;r.exports=function(r){return r>0?n(e(r),9007199254740991):0}},function(r,t,o){var e=o(7),n=o(1),i=o(5),c=Object.defineProperty,u={},l=function(r){throw r};r.exports=function(r,t){if(i(u,r))return u[r];t||(t={});var o=[][r],a=!!i(t,"ACCESSORS")&&t.ACCESSORS,s=i(t,0)?t[0]:l,f=i(t,1)?t[1]:void 0;return u[r]=!!o&&!n(function(){if(a&&!e)return!0;var r={length:-1};a?c(r,1,{enumerable:!0,get:l}):r[1]=1,o.call(r,s,f)})}},function(r,t,o){"use strict";var e=o(85),n=o(86),i=RegExp.prototype.exec,c=String.prototype.replace,u=i,l=function(){var r=/a/,t=/b*/g;return i.call(r,"a"),i.call(t,"a"),0!==r.lastIndex||0!==t.lastIndex}(),a=n.UNSUPPORTED_Y||n.BROKEN_CARET,s=void 0!==/()??/.exec("")[1];(l||s||a)&&(u=function(r){var t,o,n,u,f=this,p=a&&f.sticky,g=e.call(f),v=f.source,d=0,b=r;return p&&(-1===(g=g.replace("y","")).indexOf("g")&&(g+="g"),b=String(r).slice(f.lastIndex),f.lastIndex>0&&(!f.multiline||f.multiline&&"\n"!==r[f.lastIndex-1])&&(v="(?: "+v+")",b=" "+b,d++),o=new RegExp("^(?:"+v+")",g)),s&&(o=new RegExp("^"+v+"$(?!\\s)",g)),l&&(t=f.lastIndex),n=i.call(p?o:f,b),p?n?(n.input=n.input.slice(d),n[0]=n[0].slice(d),n.index=f.lastIndex,f.lastIndex+=n[0].length):f.lastIndex=0:l&&n&&(f.lastIndex=f.global?n.index+n[0].length:t),s&&n&&n.length>1&&c.call(n[0],o,function(){for(u=1;u<arguments.length-2;u++)void 0===arguments[u]&&(n[u]=void 0)}),n}),r.exports=u},function(r,t,o){var e=o(1),n=o(11),i="".split;r.exports=e(function(){return!Object("z").propertyIsEnumerable(0)})?function(r){return"String"==n(r)?i.call(r,""):Object(r)}:Object},function(r,t,o){var e=o(0),n=o(9);r.exports=function(r,t){try{n(e,r,t)}catch(o){e[r]=t}return t}},function(r,t){r.exports={}},function(r,t,o){var e=o(58),n=o(0),i=function(r){return"function"==typeof r?r:void 0};r.exports=function(r,t){return arguments.length<2?i(e[r])||i(n[r]):e[r]&&e[r][t]||n[r]&&n[r][t]}},function(r,t,o){var e=o(12),n=o(14),i=o(60),c=function(r){return function(t,o,c){var u,l=e(t),a=n(l.length),s=i(c,a);if(r&&o!=o){for(;a>s;)if((u=l[s++])!=u)return!0}else for(;a>s;s++)if((r||s in l)&&l[s]===o)return r||s||0;return!r&&-1}};r.exports={includes:c(!0),indexOf:c(!1)}},function(r,t){r.exports=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"]},function(r,t,o){"use strict";var e=o(1);r.exports=function(r,t){var o=[][r];return!!o&&e(function(){o.call(null,t||function(){throw 1},1)})}},function(r,t){r.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},function(r,t,o){"use strict";o(46);var e=o(32),n=o(1),i=o(6),c=o(16),u=o(9),l=i("species"),a=!n(function(){var r=/./;return r.exec=function(){var r=[];return r.groups={a:"7"},r},"7"!=="".replace(r,"$<a>")}),s="$0"==="a".replace(/./,"$0"),f=i("replace"),p=!!/./[f]&&""===/./[f]("a","$0"),g=!n(function(){var r=/(?:)/,t=r.exec;r.exec=function(){return t.apply(this,arguments)};var o="ab".split(r);return 2!==o.length||"a"!==o[0]||"b"!==o[1]});r.exports=function(r,t,o,f){var v=i(r),d=!n(function(){var t={};return t[v]=function(){return 7},7!=""[r](t)}),b=d&&!n(function(){var t=!1,o=/a/;return"split"===r&&((o={}).constructor={},o.constructor[l]=function(){return o},o.flags="",o[v]=/./[v]),o.exec=function(){return t=!0,null},o[v](""),!t});if(!d||!b||"replace"===r&&(!a||!s||p)||"split"===r&&!g){var h=/./[v],y=o(v,""[r],function(r,t,o,e,n){return t.exec===c?d&&!n?{done:!0,value:h.call(t,o,e)}:{done:!0,value:r.call(o,t,e)}:{done:!1}},{REPLACE_KEEPS_$0:s,REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE:p}),x=y[0],P=y[1];e(String.prototype,r,x),e(RegExp.prototype,v,2==t?function(r,t){return P.call(r,this,t)}:function(r){return P.call(r,this)})}f&&u(RegExp.prototype[v],"sham",!0)}},function(r,t,o){var e=o(11),n=o(16);r.exports=function(r,t){var o=r.exec;if("function"==typeof o){var i=o.call(r,t);if("object"!=typeof i)throw TypeError("RegExp exec method returned something other than an Object or null");return i}if("RegExp"!==e(r))throw TypeError("RegExp#exec called on incompatible receiver");return n.call(r,t)}},function(r,t,o){var e=o(7),n=o(52),i=o(28),c=o(12),u=o(29),l=o(5),a=o(30),s=Object.getOwnPropertyDescriptor;t.f=e?s:function(r,t){if(r=c(r),t=u(t,!0),a)try{return s(r,t)}catch(r){}if(l(r,t))return i(!n.f.call(r,t),r[t])}},function(r,t){r.exports=function(r,t){return{enumerable:!(1&r),configurable:!(2&r),writable:!(4&r),value:t}}},function(r,t,o){var e=o(8);r.exports=function(r,t){if(!e(r))return r;var o,n;if(t&&"function"==typeof(o=r.toString)&&!e(n=o.call(r)))return n;if("function"==typeof(o=r.valueOf)&&!e(n=o.call(r)))return n;if(!t&&"function"==typeof(o=r.toString)&&!e(n=o.call(r)))return n;throw TypeError("Can't convert object to primitive value")}},function(r,t,o){var e=o(7),n=o(1),i=o(31);r.exports=!e&&!n(function(){return 7!=Object.defineProperty(i("div"),"a",{get:function(){return 7}}).a})},function(r,t,o){var e=o(0),n=o(8),i=e.document,c=n(i)&&n(i.createElement);r.exports=function(r){return c?i.createElement(r):{}}},function(r,t,o){var e=o(0),n=o(9),i=o(5),c=o(18),u=o(33),l=o(53),a=l.get,s=l.enforce,f=String(String).split("String");(r.exports=function(r,t,o,u){var l=!!u&&!!u.unsafe,a=!!u&&!!u.enumerable,p=!!u&&!!u.noTargetGet;"function"==typeof o&&("string"!=typeof t||i(o,"name")||n(o,"name",t),s(o).source=f.join("string"==typeof t?t:"")),r!==e?(l?!p&&r[t]&&(a=!0):delete r[t],a?r[t]=o:n(r,t,o)):a?r[t]=o:c(t,o)})(Function.prototype,"toString",function(){return"function"==typeof this&&a(this).source||u(this)})},function(r,t,o){var e=o(34),n=Function.toString;"function"!=typeof e.inspectSource&&(e.inspectSource=function(r){return n.call(r)}),r.exports=e.inspectSource},function(r,t,o){var e=o(0),n=o(18),i=e["__core-js_shared__"]||n("__core-js_shared__",{});r.exports=i},function(r,t,o){var e=o(36),n=o(37),i=e("keys");r.exports=function(r){return i[r]||(i[r]=n(r))}},function(r,t,o){var e=o(55),n=o(34);(r.exports=function(r,t){return n[r]||(n[r]=void 0!==t?t:{})})("versions",[]).push({version:"3.6.5",mode:e?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},function(r,t){var o=0,e=Math.random();r.exports=function(r){return"Symbol("+String(void 0===r?"":r)+")_"+(++o+e).toString(36)}},function(r,t,o){var e=o(5),n=o(12),i=o(21).indexOf,c=o(19);r.exports=function(r,t){var o,u=n(r),l=0,a=[];for(o in u)!e(c,o)&&e(u,o)&&a.push(o);for(;t.length>l;)e(u,o=t[l++])&&(~i(a,o)||a.push(o));return a}},function(r,t,o){var e=o(63),n=o(17),i=o(41),c=o(14),u=o(64),l=[].push,a=function(r){var t=1==r,o=2==r,a=3==r,s=4==r,f=6==r,p=5==r||f;return function(g,v,d,b){for(var h,y,x=i(g),P=n(x),S=e(v,d,3),w=c(P.length),m=0,O=b||u,T=t?O(g,w):o?O(g,0):void 0;w>m;m++)if((p||m in P)&&(y=S(h=P[m],m,x),r))if(t)T[m]=y;else if(y)switch(r){case 3:return!0;case 5:return h;case 6:return m;case 2:l.call(T,h)}else if(s)return!1;return f?-1:a||s?s:T}};r.exports={forEach:a(0),map:a(1),filter:a(2),some:a(3),every:a(4),find:a(5),findIndex:a(6)}},function(r,t){r.exports=function(r){if("function"!=typeof r)throw TypeError(String(r)+" is not a function");return r}},function(r,t,o){var e=o(3);r.exports=function(r){return Object(e(r))}},function(r,t,o){var e=o(1);r.exports=!!Object.getOwnPropertySymbols&&!e(function(){return!String(Symbol())})},function(r,t,o){var e=o(20);r.exports=e("navigator","userAgent")||""},function(r,t,o){"use strict";var e=o(39).forEach,n=o(23),i=o(15),c=n("forEach"),u=i("forEach");r.exports=c&&u?[].forEach:function(r){return e(this,r,arguments.length>1?arguments[1]:void 0)}},function(r,t,o){var e=o(3),n="["+o(24)+"]",i=RegExp("^"+n+n+"*"),c=RegExp(n+n+"*$"),u=function(r){return function(t){var o=String(e(t));return 1&r&&(o=o.replace(i,"")),2&r&&(o=o.replace(c,"")),o}};r.exports={start:u(1),end:u(2),trim:u(3)}},function(r,t,o){"use strict";var e=o(2),n=o(16);e({target:"RegExp",proto:!0,forced:/./.exec!==n},{exec:n})},function(r,t,o){var e=o(8),n=o(11),i=o(6)("match");r.exports=function(r){var t;return e(r)&&(void 0!==(t=r[i])?!!t:"RegExp"==n(r))}},function(r,t,o){"use strict";var e=o(91).charAt;r.exports=function(r,t,o){return t+(o?e(r,t).length:1)}},function(r,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var e=o(50),n=(o.n(e),o(69)),i=(o.n(n),o(70)),c=(o.n(i),o(76)),u=(o.n(c),o(77)),l=(o.n(u),o(78)),a=(o.n(l),o(81)),s=(o.n(a),o(83)),f=(o.n(s),o(46)),p=(o.n(f),o(87)),g=(o.n(p),o(90)),v=(o.n(g),o(92)),d=(o.n(v),o(94)),b=(o.n(d),o(96)),h=(o.n(b),o(98));o.n(h);!function(r){for(var t,o={default:{colorPostBg:"rgb(255, 255, 255)",colorPostText:"rgb(0, 0, 0)",colorPostLinks:"rgb(0, 53, 105)",colorPostOverlayBg:"rgba(0, 0, 0, 0.8)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(255, 255, 255)",colorSliderArrowsBg:"rgba(0, 0, 0, 0.9)",colorGridLoadMoreButton:"rgb(56, 151, 240)",colorPopupOverlay:"rgba(43, 43, 43, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(0, 0, 0)",colorPopupLinks:"rgb(0, 53, 105)",colorPopupFollowButton:"rgb(0, 53, 105)",colorPopupCtaButton:"rgb(56, 151, 240)"},sky:{colorPostBg:"rgb(33, 150, 243)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(33, 150, 243, 0.9)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(0, 142, 255)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(43, 43, 43, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(0, 0, 0)",colorPopupLinks:"rgb(0, 142, 255)",colorPopupFollowButton:"rgb(0, 142, 255)",colorPopupCtaButton:"rgb(0, 142, 255)"},dark:{colorPostBg:"rgb(28, 27, 27)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(28, 27, 27, 0.9)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(176, 176, 176)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(0, 0, 0, 0.9)",colorPopupBg:"rgb(49, 49, 49)",colorPopupText:"rgb(255, 255, 255)",colorPopupLinks:"rgb(30, 136, 241)",colorPopupFollowButton:"rgb(30, 136, 241)",colorPopupCtaButton:"rgb(30, 136, 241)"},emerald:{colorPostBg:"rgb(0, 162, 65)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(0, 162, 65, 0.97)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(0, 154, 91)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(6, 156, 119, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(68, 68, 68)",colorPopupLinks:"rgb(0, 143, 57)",colorPopupFollowButton:"rgb(0, 143, 57)",colorPopupCtaButton:"rgb(0, 143, 57)"},jeans:{colorPostBg:"rgb(0, 65, 98)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(0, 65, 98, 0.97)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(160, 88, 30)",colorSliderArrowsBg:"rgb(229, 182, 116)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(0, 18, 28, 0.9)",colorPopupBg:"rgb(14, 60, 84)",colorPopupText:"rgb(255, 255, 255)",colorPopupLinks:"rgb(255, 182, 80)",colorPopupFollowButton:"rgb(255, 182, 80)",colorPopupCtaButton:"rgb(255, 182, 80)"},leather:{colorPostBg:"rgb(163, 90, 36)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(163, 90, 36, 0.97)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(239, 129, 0)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(108, 40, 11, 0.9)",colorPopupBg:"rgb(255, 252, 235)",colorPopupText:"rgb(44, 24, 0)",colorPopupLinks:"rgb(239, 129, 0)",colorPopupFollowButton:"rgb(239, 129, 0)",colorPopupCtaButton:"rgb(239, 129, 0)"},light:{colorPostBg:"rgb(237, 237, 237)",colorPostText:"rgb(0, 0, 0)",colorPostLinks:"rgb(0, 0, 0)",colorPostOverlayBg:"rgba(237, 237, 237, 0.9)",colorPostOverlayText:"rgb(0, 0, 0)",colorSliderArrows:"rgb(0, 156, 255)",colorSliderArrowsBg:"rgb(255, 255, 255)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(228, 228, 228, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(68, 68, 68)",colorPopupLinks:"rgb(0, 156, 255)",colorPopupFollowButton:"rgb(0, 156, 255)",colorPopupCtaButton:"rgb(0, 156, 255)"},"night-life":{colorPostBg:"rgb(86, 44, 122)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(86, 44, 122, 0.97)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(182, 102, 255)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(86, 44, 122, 0.9)",colorPopupBg:"rgb(37, 37, 37)",colorPopupText:"rgb(255, 255, 255)",colorPopupLinks:"rgb(182, 102, 255)",colorPopupFollowButton:"rgb(182, 102, 255)",colorPopupCtaButton:"rgb(182, 102, 255)"},orange:{colorPostBg:"rgb(255, 126, 0)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(255, 126, 0, 0.9)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(255, 126, 0)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(242, 134, 29, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(0, 0, 0)",colorPopupLinks:"rgb(255, 144, 0)",colorPopupFollowButton:"rgb(255, 144, 0)",colorPopupCtaButton:"rgb(255, 144, 0)"},"red-power":{colorPostBg:"rgb(190, 13, 13)",colorPostText:"rgb(255, 255, 255)",colorPostLinks:"rgb(255, 255, 255)",colorPostOverlayBg:"rgba(190, 13, 13, 0.97)",colorPostOverlayText:"rgb(255, 255, 255)",colorSliderArrows:"rgb(255, 38, 38)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(221, 26, 26, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(68, 68, 68)",colorPopupLinks:"rgb(255, 38, 38)",colorPopupFollowButton:"rgb(255, 38, 38)",colorPopupCtaButton:"rgb(255, 38, 38)"},yellow:{colorPostBg:"rgb(255, 235, 14)",colorPostText:"rgb(0, 0, 0)",colorPostLinks:"rgb(0, 0, 0)",colorPostOverlayBg:"rgba(255, 235, 14, 0.9)",colorPostOverlayText:"rgb(0, 0, 0)",colorSliderArrows:"rgb(163, 163, 163)",colorSliderArrowsBg:"rgba(255, 255, 255, 0.9)",colorGridLoadMoreButton:"",colorPopupOverlay:"rgba(223, 190, 5, 0.9)",colorPopupBg:"rgb(255, 255, 255)",colorPopupText:"rgb(0, 0, 0)",colorPopupLinks:"rgb(223, 194, 0)",colorPopupFollowButton:"rgb(223, 194, 0)",colorPopupCtaButton:"rgb(223, 194, 0)"},custom:{}},e=["colorPostBg","colorPostText","colorPostArrows","colorPostArrowsBg"],n=[],i=0,c=e.length;i<c;i++)n.push("widget.data."+e[i]);var u=!0,l=!1;r.observer=function(r,i){r.widget.data=function(r){var t={postElements:"info",popupElements:"popupInfo",sliderArrows:"arrowsControl",sliderDrag:"dragControl",sliderSpeed:"speed",sliderAutoplay:"auto",imageClickAction:"mode",cacheTime:"cacheMediaTime",colorPostOverlayText:"colorGalleryDescription",colorPostOverlayBg:"colorGalleryOverlay",colorSliderArrows:"colorGalleryArrows",colorSliderArrowsBg:"colorGalleryArrowsBg",colorPopupLinks:"colorPopupAnchor",colorPopupFollowButton:"colorPopupInstagramLink"},o=["colorGalleryDescription","colorGalleryOverlay","colorGalleryArrows","colorGalleryArrowsBg","colorPopupAnchor","colorPopupInstagramLink"];for(var e in t){var n=t[e];r.hasOwnProperty(n)&&("info"!==n&&"popupInfo"!==n||(Array.isArray(r[n])&&(r[n]=r[n].join(" ")),r[n]=(r[n]||"").replace("username","user").replace("likesCounter","likesCount").replace("commentsCounter","commentsCount").replace("description","text"),r[n]=r[n].split(" ")),"auto"!==n&&"speed"!==n||(r[n]=parseFloat((parseInt(r[n],10)/1e3).toFixed(2))),r[e]=r[n],-1!==o.indexOf(n)&&r[n]&&(r.colorScheme="custom"),delete r[n])}return r}(r.widget.data);var c,a,s=r.getProperty("postElements"),f=s.checklist.options,p={tile:["likesCount","commentsCount","text"],classic:["user","date","instagramLink","likesCount","commentsCount","share","text"]};if(angular.forEach(i,function(r){"colorsPostTile"===r.id?c=r:"colorsPostClassic"===r.id&&(a=r)}),!r.enableCloudProperties||location.search.includes("cloud_options_hide=true")){r.setPropertyVisibility("source",!1),r.setPropertyVisibility("contentSort",!1),r.setPropertyVisibility("sourceType",!0);var g=!!r.widget.data.source&&r.widget.data.source.length>0,v=function(){var t=r.widget.data,o=t.sourceType,e=t.personalAccessToken,n=t.businessAccessToken,i=t.businessAccount;r.setPropertyVisibility("businessAccount",("businessAccount"===o||"businessHashtag"===o)&&!!n),r.setPropertyVisibility("businessHashtag","businessHashtag"===o&&!!n&&!!i),r.setPropertyVisibility("apiChangesMessage",g&&!e&&!n),r.setPropertyVisibility("contentFilters",!!e||!!n)};r.$watch("widget.data.sourceType",function(t){"legacy"===t&&(r.widget.data.sourceType="businessAccount"),r.setPropertyVisibility("personalAccessToken","personalAccount"===t),r.setPropertyVisibility("businessAccessToken","businessAccount"===t||"businessHashtag"===t),v()}),r.$watch("widget.data.personalAccessToken",v),r.$watch("widget.data.businessAccessToken",v),r.$watch("widget.data.businessAccount",v)}else r.setPropertyVisibility("source",!0),r.setPropertyVisibility("contentSort",!0),r.setPropertyVisibility("contentFilters",!0);r.$watch("widget.data.layout",function(t){if(t)switch(t){case"slider":r.setPropertyVisibility("layoutSlider",!0),r.setPropertyVisibility("colorsSlider",!0),r.setPropertyVisibility("colorsGrid",!1);break;case"grid":r.setPropertyVisibility("layoutSlider",!1),r.setPropertyVisibility("colorsSlider",!1),r.setPropertyVisibility("colorsGrid",!0)}}),r.$watch("widget.data.postTemplate",function(r){"tile"===r?(a.visible=!1,c.visible=!0):"classic"===r&&(a.visible=!0,c.visible=!1,s.checklist.options=f),s.checklist.options=f.filter(function(t){var o=t.value;return p[r].includes(o)})}),r.$watch("widget.data.colorScheme",function(t,e){void 0!==t&&t!==e&&t in o&&(angular.extend(r.widget.data,o[t]),l=!0)}),r.$watchGroup(n,function(n,i){l||(u=!1),clearTimeout(t),t=setTimeout(function(){if(void 0!==n&&n!==i){if(u&&l||!u&&!l)for(var t=0,c=e.length;t<c;t++)o.custom[e[t]]=n[t];l||"custom"===r.widget.data.colorScheme||(r.widget.data.colorScheme="custom"),l=!1}},300)})}}(window.eapps=window.eapps||{})},function(r,t,o){"use strict";var e=o(2),n=o(39).filter,i=o(67),c=o(15),u=i("filter"),l=c("filter");e({target:"Array",proto:!0,forced:!u||!l},{filter:function(r){return n(this,r,arguments.length>1?arguments[1]:void 0)}})},function(r,t){var o;o=function(){return this}();try{o=o||Function("return this")()||(0,eval)("this")}catch(r){"object"==typeof window&&(o=window)}r.exports=o},function(r,t,o){"use strict";var e={}.propertyIsEnumerable,n=Object.getOwnPropertyDescriptor,i=n&&!e.call({1:2},1);t.f=i?function(r){var t=n(this,r);return!!t&&t.enumerable}:e},function(r,t,o){var e,n,i,c=o(54),u=o(0),l=o(8),a=o(9),s=o(5),f=o(35),p=o(19),g=u.WeakMap;if(c){var v=new g,d=v.get,b=v.has,h=v.set;e=function(r,t){return h.call(v,r,t),t},n=function(r){return d.call(v,r)||{}},i=function(r){return b.call(v,r)}}else{var y=f("state");p[y]=!0,e=function(r,t){return a(r,y,t),t},n=function(r){return s(r,y)?r[y]:{}},i=function(r){return s(r,y)}}r.exports={set:e,get:n,has:i,enforce:function(r){return i(r)?n(r):e(r,{})},getterFor:function(r){return function(t){var o;if(!l(t)||(o=n(t)).type!==r)throw TypeError("Incompatible receiver, "+r+" required");return o}}}},function(r,t,o){var e=o(0),n=o(33),i=e.WeakMap;r.exports="function"==typeof i&&/native code/.test(n(i))},function(r,t){r.exports=!1},function(r,t,o){var e=o(5),n=o(57),i=o(27),c=o(13);r.exports=function(r,t){for(var o=n(t),u=c.f,l=i.f,a=0;a<o.length;a++){var s=o[a];e(r,s)||u(r,s,l(t,s))}}},function(r,t,o){var e=o(20),n=o(59),i=o(61),c=o(4);r.exports=e("Reflect","ownKeys")||function(r){var t=n.f(c(r)),o=i.f;return o?t.concat(o(r)):t}},function(r,t,o){var e=o(0);r.exports=e},function(r,t,o){var e=o(38),n=o(22).concat("length","prototype");t.f=Object.getOwnPropertyNames||function(r){return e(r,n)}},function(r,t,o){var e=o(10),n=Math.max,i=Math.min;r.exports=function(r,t){var o=e(r);return o<0?n(o+t,0):i(o,t)}},function(r,t){t.f=Object.getOwnPropertySymbols},function(r,t,o){var e=o(1),n=/#|\.prototype\./,i=function(r,t){var o=u[c(r)];return o==a||o!=l&&("function"==typeof t?e(t):!!t)},c=i.normalize=function(r){return String(r).replace(n,".").toLowerCase()},u=i.data={},l=i.NATIVE="N",a=i.POLYFILL="P";r.exports=i},function(r,t,o){var e=o(40);r.exports=function(r,t,o){if(e(r),void 0===t)return r;switch(o){case 0:return function(){return r.call(t)};case 1:return function(o){return r.call(t,o)};case 2:return function(o,e){return r.call(t,o,e)};case 3:return function(o,e,n){return r.call(t,o,e,n)}}return function(){return r.apply(t,arguments)}}},function(r,t,o){var e=o(8),n=o(65),i=o(6)("species");r.exports=function(r,t){var o;return n(r)&&("function"!=typeof(o=r.constructor)||o!==Array&&!n(o.prototype)?e(o)&&null===(o=o[i])&&(o=void 0):o=void 0),new(void 0===o?Array:o)(0===t?0:t)}},function(r,t,o){var e=o(11);r.exports=Array.isArray||function(r){return"Array"==e(r)}},function(r,t,o){var e=o(42);r.exports=e&&!Symbol.sham&&"symbol"==typeof Symbol.iterator},function(r,t,o){var e=o(1),n=o(6),i=o(68),c=n("species");r.exports=function(r){return i>=51||!e(function(){var t=[];return(t.constructor={})[c]=function(){return{foo:1}},1!==t[r](Boolean).foo})}},function(r,t,o){var e,n,i=o(0),c=o(43),u=i.process,l=u&&u.versions,a=l&&l.v8;a?n=(e=a.split("."))[0]+e[1]:c&&(!(e=c.match(/Edge\/(\d+)/))||e[1]>=74)&&(e=c.match(/Chrome\/(\d+)/))&&(n=e[1]),r.exports=n&&+n},function(r,t,o){"use strict";var e=o(2),n=o(44);e({target:"Array",proto:!0,forced:[].forEach!=n},{forEach:n})},function(r,t,o){"use strict";var e=o(2),n=o(21).includes,i=o(71);e({target:"Array",proto:!0,forced:!o(15)("indexOf",{ACCESSORS:!0,1:0})},{includes:function(r){return n(this,r,arguments.length>1?arguments[1]:void 0)}}),i("includes")},function(r,t,o){var e=o(6),n=o(72),i=o(13),c=e("unscopables"),u=Array.prototype;void 0==u[c]&&i.f(u,c,{configurable:!0,value:n(null)}),r.exports=function(r){u[c][r]=!0}},function(r,t,o){var e,n=o(4),i=o(73),c=o(22),u=o(19),l=o(75),a=o(31),s=o(35)("IE_PROTO"),f=function(){},p=function(r){return"<script>"+r+"<\/script>"},g=function(){try{e=document.domain&&new ActiveXObject("htmlfile")}catch(r){}g=e?function(r){r.write(p("")),r.close();var t=r.parentWindow.Object;return r=null,t}(e):function(){var r,t=a("iframe");return t.style.display="none",l.appendChild(t),t.src=String("javascript:"),(r=t.contentWindow.document).open(),r.write(p("document.F=Object")),r.close(),r.F}();for(var r=c.length;r--;)delete g.prototype[c[r]];return g()};u[s]=!0,r.exports=Object.create||function(r,t){var o;return null!==r?(f.prototype=n(r),o=new f,f.prototype=null,o[s]=r):o=g(),void 0===t?o:i(o,t)}},function(r,t,o){var e=o(7),n=o(13),i=o(4),c=o(74);r.exports=e?Object.defineProperties:function(r,t){i(r);for(var o,e=c(t),u=e.length,l=0;u>l;)n.f(r,o=e[l++],t[o]);return r}},function(r,t,o){var e=o(38),n=o(22);r.exports=Object.keys||function(r){return e(r,n)}},function(r,t,o){var e=o(20);r.exports=e("document","documentElement")},function(r,t,o){"use strict";var e=o(2),n=o(21).indexOf,i=o(23),c=o(15),u=[].indexOf,l=!!u&&1/[1].indexOf(1,-0)<0,a=i("indexOf"),s=c("indexOf",{ACCESSORS:!0,1:0});e({target:"Array",proto:!0,forced:l||!a||!s},{indexOf:function(r){return l?u.apply(this,arguments)||0:n(this,r,arguments.length>1?arguments[1]:void 0)}})},function(r,t,o){"use strict";var e=o(2),n=o(17),i=o(12),c=o(23),u=[].join,l=n!=Object,a=c("join",",");e({target:"Array",proto:!0,forced:l||!a},{join:function(r){return u.call(i(this),void 0===r?",":r)}})},function(r,t,o){"use strict";var e=o(2),n=o(10),i=o(79),c=o(80),u=o(1),l=1..toFixed,a=Math.floor,s=function(r,t,o){return 0===t?o:t%2==1?s(r,t-1,o*r):s(r*r,t/2,o)};e({target:"Number",proto:!0,forced:l&&("0.000"!==8e-5.toFixed(3)||"1"!==.9.toFixed(0)||"1.25"!==1.255.toFixed(2)||"1000000000000000128"!==(0xde0b6b3a7640080).toFixed(0))||!u(function(){l.call({})})},{toFixed:function(r){var t,o,e,u,l=i(this),f=n(r),p=[0,0,0,0,0,0],g="",v="0",d=function(r,t){for(var o=-1,e=t;++o<6;)e+=r*p[o],p[o]=e%1e7,e=a(e/1e7)},b=function(r){for(var t=6,o=0;--t>=0;)o+=p[t],p[t]=a(o/r),o=o%r*1e7},h=function(){for(var r=6,t="";--r>=0;)if(""!==t||0===r||0!==p[r]){var o=String(p[r]);t=""===t?o:t+c.call("0",7-o.length)+o}return t};if(f<0||f>20)throw RangeError("Incorrect fraction digits");if(l!=l)return"NaN";if(l<=-1e21||l>=1e21)return String(l);if(l<0&&(g="-",l=-l),l>1e-21)if(o=(t=function(r){for(var t=0,o=r;o>=4096;)t+=12,o/=4096;for(;o>=2;)t+=1,o/=2;return t}(l*s(2,69,1))-69)<0?l*s(2,-t,1):l/s(2,t,1),o*=4503599627370496,(t=52-t)>0){for(d(0,o),e=f;e>=7;)d(1e7,0),e-=7;for(d(s(10,e,1),0),e=t-1;e>=23;)b(1<<23),e-=23;b(1<<e),d(1,1),b(2),v=h()}else d(0,o),d(1<<-t,0),v=h()+c.call("0",f);return v=f>0?g+((u=v.length)<=f?"0."+c.call("0",f-u)+v:v.slice(0,u-f)+"."+v.slice(u-f)):g+v}})},function(r,t,o){var e=o(11);r.exports=function(r){if("number"!=typeof r&&"Number"!=e(r))throw TypeError("Incorrect invocation");return+r}},function(r,t,o){"use strict";var e=o(10),n=o(3);r.exports="".repeat||function(r){var t=String(n(this)),o="",i=e(r);if(i<0||i==1/0)throw RangeError("Wrong number of repetitions");for(;i>0;(i>>>=1)&&(t+=t))1&i&&(o+=t);return o}},function(r,t,o){var e=o(2),n=o(82);e({global:!0,forced:parseFloat!=n},{parseFloat:n})},function(r,t,o){var e=o(0),n=o(45).trim,i=o(24),c=e.parseFloat,u=1/c(i+"-0")!=-1/0;r.exports=u?function(r){var t=n(String(r)),o=c(t);return 0===o&&"-"==t.charAt(0)?-0:o}:c},function(r,t,o){var e=o(2),n=o(84);e({global:!0,forced:parseInt!=n},{parseInt:n})},function(r,t,o){var e=o(0),n=o(45).trim,i=o(24),c=e.parseInt,u=/^[+-]?0[Xx]/,l=8!==c(i+"08")||22!==c(i+"0x16");r.exports=l?function(r,t){var o=n(String(r));return c(o,t>>>0||(u.test(o)?16:10))}:c},function(r,t,o){"use strict";var e=o(4);r.exports=function(){var r=e(this),t="";return r.global&&(t+="g"),r.ignoreCase&&(t+="i"),r.multiline&&(t+="m"),r.dotAll&&(t+="s"),r.unicode&&(t+="u"),r.sticky&&(t+="y"),t}},function(r,t,o){"use strict";var e=o(1);function n(r,t){return RegExp(r,t)}t.UNSUPPORTED_Y=e(function(){var r=n("a","y");return r.lastIndex=2,null!=r.exec("abcd")}),t.BROKEN_CARET=e(function(){var r=n("^r","gy");return r.lastIndex=2,null!=r.exec("str")})},function(r,t,o){"use strict";var e=o(2),n=o(88),i=o(3);e({target:"String",proto:!0,forced:!o(89)("includes")},{includes:function(r){return!!~String(i(this)).indexOf(n(r),arguments.length>1?arguments[1]:void 0)}})},function(r,t,o){var e=o(47);r.exports=function(r){if(e(r))throw TypeError("The method doesn't accept regular expressions");return r}},function(r,t,o){var e=o(6)("match");r.exports=function(r){var t=/./;try{"/./"[r](t)}catch(o){try{return t[e]=!1,"/./"[r](t)}catch(r){}}return!1}},function(r,t,o){"use strict";var e=o(25),n=o(4),i=o(41),c=o(14),u=o(10),l=o(3),a=o(48),s=o(26),f=Math.max,p=Math.min,g=Math.floor,v=/\$([$&'`]|\d\d?|<[^>]*>)/g,d=/\$([$&'`]|\d\d?)/g,b=function(r){return void 0===r?r:String(r)};e("replace",2,function(r,t,o,e){var h=e.REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE,y=e.REPLACE_KEEPS_$0,x=h?"$":"$0";return[function(o,e){var n=l(this),i=void 0==o?void 0:o[r];return void 0!==i?i.call(o,n,e):t.call(String(n),o,e)},function(r,e){if(!h&&y||"string"==typeof e&&-1===e.indexOf(x)){var i=o(t,r,this,e);if(i.done)return i.value}var l=n(r),g=String(this),v="function"==typeof e;v||(e=String(e));var d=l.global;if(d){var S=l.unicode;l.lastIndex=0}for(var w=[];;){var m=s(l,g);if(null===m)break;if(w.push(m),!d)break;""===String(m[0])&&(l.lastIndex=a(g,c(l.lastIndex),S))}for(var O="",T=0,A=0;A<w.length;A++){m=w[A];for(var B=String(m[0]),E=f(p(u(m.index),g.length),0),L=[],k=1;k<m.length;k++)L.push(b(m[k]));var C=m.groups;if(v){var I=[B].concat(L,E,g);void 0!==C&&I.push(C);var j=String(e.apply(void 0,I))}else j=P(B,g,E,L,C,e);E>=T&&(O+=g.slice(T,E)+j,T=E+B.length)}return O+g.slice(T)}];function P(r,o,e,n,c,u){var l=e+r.length,a=n.length,s=d;return void 0!==c&&(c=i(c),s=v),t.call(u,s,function(t,i){var u;switch(i.charAt(0)){case"$":return"$";case"&":return r;case"`":return o.slice(0,e);case"'":return o.slice(l);case"<":u=c[i.slice(1,-1)];break;default:var s=+i;if(0===s)return t;if(s>a){var f=g(s/10);return 0===f?t:f<=a?void 0===n[f-1]?i.charAt(1):n[f-1]+i.charAt(1):t}u=n[s-1]}return void 0===u?"":u})}})},function(r,t,o){var e=o(10),n=o(3),i=function(r){return function(t,o){var i,c,u=String(n(t)),l=e(o),a=u.length;return l<0||l>=a?r?"":void 0:(i=u.charCodeAt(l))<55296||i>56319||l+1===a||(c=u.charCodeAt(l+1))<56320||c>57343?r?u.charAt(l):i:r?u.slice(l,l+2):c-56320+(i-55296<<10)+65536}};r.exports={codeAt:i(!1),charAt:i(!0)}},function(r,t,o){"use strict";var e=o(25),n=o(4),i=o(3),c=o(93),u=o(26);e("search",1,function(r,t,o){return[function(t){var o=i(this),e=void 0==t?void 0:t[r];return void 0!==e?e.call(t,o):new RegExp(t)[r](String(o))},function(r){var e=o(t,r,this);if(e.done)return e.value;var i=n(r),l=String(this),a=i.lastIndex;c(a,0)||(i.lastIndex=0);var s=u(i,l);return c(i.lastIndex,a)||(i.lastIndex=a),null===s?-1:s.index}]})},function(r,t){r.exports=Object.is||function(r,t){return r===t?0!==r||1/r==1/t:r!=r&&t!=t}},function(r,t,o){"use strict";var e=o(25),n=o(47),i=o(4),c=o(3),u=o(95),l=o(48),a=o(14),s=o(26),f=o(16),p=o(1),g=[].push,v=Math.min,d=!p(function(){return!RegExp(4294967295,"y")});e("split",2,function(r,t,o){var e;return e="c"=="abbc".split(/(b)*/)[1]||4!="test".split(/(?:)/,-1).length||2!="ab".split(/(?:ab)*/).length||4!=".".split(/(.?)(.?)/).length||".".split(/()()/).length>1||"".split(/.?/).length?function(r,o){var e=String(c(this)),i=void 0===o?4294967295:o>>>0;if(0===i)return[];if(void 0===r)return[e];if(!n(r))return t.call(e,r,i);for(var u,l,a,s=[],p=(r.ignoreCase?"i":"")+(r.multiline?"m":"")+(r.unicode?"u":"")+(r.sticky?"y":""),v=0,d=new RegExp(r.source,p+"g");(u=f.call(d,e))&&!((l=d.lastIndex)>v&&(s.push(e.slice(v,u.index)),u.length>1&&u.index<e.length&&g.apply(s,u.slice(1)),a=u[0].length,v=l,s.length>=i));)d.lastIndex===u.index&&d.lastIndex++;return v===e.length?!a&&d.test("")||s.push(""):s.push(e.slice(v)),s.length>i?s.slice(0,i):s}:"0".split(void 0,0).length?function(r,o){return void 0===r&&0===o?[]:t.call(this,r,o)}:t,[function(t,o){var n=c(this),i=void 0==t?void 0:t[r];return void 0!==i?i.call(t,n,o):e.call(String(n),t,o)},function(r,n){var c=o(e,r,this,n,e!==t);if(c.done)return c.value;var f=i(r),p=String(this),g=u(f,RegExp),b=f.unicode,h=(f.ignoreCase?"i":"")+(f.multiline?"m":"")+(f.unicode?"u":"")+(d?"y":"g"),y=new g(d?f:"^(?:"+f.source+")",h),x=void 0===n?4294967295:n>>>0;if(0===x)return[];if(0===p.length)return null===s(y,p)?[p]:[];for(var P=0,S=0,w=[];S<p.length;){y.lastIndex=d?S:0;var m,O=s(y,d?p:p.slice(S));if(null===O||(m=v(a(y.lastIndex+(d?0:S)),p.length))===P)S=l(p,S,b);else{if(w.push(p.slice(P,S)),w.length===x)return w;for(var T=1;T<=O.length-1;T++)if(w.push(O[T]),w.length===x)return w;S=P=m}}return w.push(p.slice(P)),w}]},!d)},function(r,t,o){var e=o(4),n=o(40),i=o(6)("species");r.exports=function(r,t){var o,c=e(r).constructor;return void 0===c||void 0==(o=e(c)[i])?t:n(o)}},function(r,t,o){var e=o(0),n=o(97),i=o(44),c=o(9);for(var u in n){var l=e[u],a=l&&l.prototype;if(a&&a.forEach!==i)try{c(a,"forEach",i)}catch(r){a.forEach=i}}},function(r,t){r.exports={CSSRuleList:0,CSSStyleDeclaration:0,CSSValueList:0,ClientRectList:0,DOMRectList:0,DOMStringList:0,DOMTokenList:1,DataTransferItemList:0,FileList:0,HTMLAllCollection:0,HTMLCollection:0,HTMLFormElement:0,HTMLSelectElement:0,MediaList:0,MimeTypeArray:0,NamedNodeMap:0,NodeList:1,PaintRequestList:0,Plugin:0,PluginArray:0,SVGLengthList:0,SVGNumberList:0,SVGPathSegList:0,SVGPointList:0,SVGStringList:0,SVGTransformList:0,SourceBufferList:0,StyleSheetList:0,TextTrackCueList:0,TextTrackList:0,TouchList:0}},function(r,t,o){var e=o(2),n=o(0),i=o(43),c=[].slice,u=function(r){return function(t,o){var e=arguments.length>2,n=e?c.call(arguments,2):void 0;return r(e?function(){("function"==typeof t?t:Function(t)).apply(this,n)}:t,o)}};e({global:!0,bind:!0,forced:/MSIE .\./.test(i)},{setTimeout:u(n.setTimeout),setInterval:u(n.setInterval)})}]);})(window)