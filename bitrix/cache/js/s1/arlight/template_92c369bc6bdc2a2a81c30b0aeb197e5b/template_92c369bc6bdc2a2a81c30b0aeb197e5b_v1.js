
; /* Start:"a:4:{s:4:"full";s:63:"/local/templates/arlight/js/jquery-3.1.1.min.js?165720755286709";s:6:"source";s:47:"/local/templates/arlight/js/jquery-3.1.1.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*! jQuery v3.1.1 | (c) jQuery Foundation | jquery.org/license */
!function(a,b){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){"use strict";var c=[],d=a.document,e=Object.getPrototypeOf,f=c.slice,g=c.concat,h=c.push,i=c.indexOf,j={},k=j.toString,l=j.hasOwnProperty,m=l.toString,n=m.call(Object),o={};function p(a,b){b=b||d;var c=b.createElement("script");c.text=a,b.head.appendChild(c).parentNode.removeChild(c)}var q="3.1.1",r=function(a,b){return new r.fn.init(a,b)},s=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,t=/^-ms-/,u=/-([a-z])/g,v=function(a,b){return b.toUpperCase()};r.fn=r.prototype={jquery:q,constructor:r,length:0,toArray:function(){return f.call(this)},get:function(a){return null==a?f.call(this):a<0?this[a+this.length]:this[a]},pushStack:function(a){var b=r.merge(this.constructor(),a);return b.prevObject=this,b},each:function(a){return r.each(this,a)},map:function(a){return this.pushStack(r.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(f.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(a<0?b:0);return this.pushStack(c>=0&&c<b?[this[c]]:[])},end:function(){return this.prevObject||this.constructor()},push:h,sort:c.sort,splice:c.splice},r.extend=r.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||r.isFunction(g)||(g={}),h===i&&(g=this,h--);h<i;h++)if(null!=(a=arguments[h]))for(b in a)c=g[b],d=a[b],g!==d&&(j&&d&&(r.isPlainObject(d)||(e=r.isArray(d)))?(e?(e=!1,f=c&&r.isArray(c)?c:[]):f=c&&r.isPlainObject(c)?c:{},g[b]=r.extend(j,f,d)):void 0!==d&&(g[b]=d));return g},r.extend({expando:"jQuery"+(q+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===r.type(a)},isArray:Array.isArray,isWindow:function(a){return null!=a&&a===a.window},isNumeric:function(a){var b=r.type(a);return("number"===b||"string"===b)&&!isNaN(a-parseFloat(a))},isPlainObject:function(a){var b,c;return!(!a||"[object Object]"!==k.call(a))&&(!(b=e(a))||(c=l.call(b,"constructor")&&b.constructor,"function"==typeof c&&m.call(c)===n))},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?j[k.call(a)]||"object":typeof a},globalEval:function(a){p(a)},camelCase:function(a){return a.replace(t,"ms-").replace(u,v)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b){var c,d=0;if(w(a)){for(c=a.length;d<c;d++)if(b.call(a[d],d,a[d])===!1)break}else for(d in a)if(b.call(a[d],d,a[d])===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(s,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(w(Object(a))?r.merge(c,"string"==typeof a?[a]:a):h.call(c,a)),c},inArray:function(a,b,c){return null==b?-1:i.call(b,a,c)},merge:function(a,b){for(var c=+b.length,d=0,e=a.length;d<c;d++)a[e++]=b[d];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;f<g;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,e,f=0,h=[];if(w(a))for(d=a.length;f<d;f++)e=b(a[f],f,c),null!=e&&h.push(e);else for(f in a)e=b(a[f],f,c),null!=e&&h.push(e);return g.apply([],h)},guid:1,proxy:function(a,b){var c,d,e;if("string"==typeof b&&(c=a[b],b=a,a=c),r.isFunction(a))return d=f.call(arguments,2),e=function(){return a.apply(b||this,d.concat(f.call(arguments)))},e.guid=a.guid=a.guid||r.guid++,e},now:Date.now,support:o}),"function"==typeof Symbol&&(r.fn[Symbol.iterator]=c[Symbol.iterator]),r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(a,b){j["[object "+b+"]"]=b.toLowerCase()});function w(a){var b=!!a&&"length"in a&&a.length,c=r.type(a);return"function"!==c&&!r.isWindow(a)&&("array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a)}var x=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=ha(),z=ha(),A=ha(),B=function(a,b){return a===b&&(l=!0),0},C={}.hasOwnProperty,D=[],E=D.pop,F=D.push,G=D.push,H=D.slice,I=function(a,b){for(var c=0,d=a.length;c<d;c++)if(a[c]===b)return c;return-1},J="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",K="[\\x20\\t\\r\\n\\f]",L="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",M="\\["+K+"*("+L+")(?:"+K+"*([*^$|!~]?=)"+K+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+L+"))|)"+K+"*\\]",N=":("+L+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+M+")*)|.*)\\)|)",O=new RegExp(K+"+","g"),P=new RegExp("^"+K+"+|((?:^|[^\\\\])(?:\\\\.)*)"+K+"+$","g"),Q=new RegExp("^"+K+"*,"+K+"*"),R=new RegExp("^"+K+"*([>+~]|"+K+")"+K+"*"),S=new RegExp("="+K+"*([^\\]'\"]*?)"+K+"*\\]","g"),T=new RegExp(N),U=new RegExp("^"+L+"$"),V={ID:new RegExp("^#("+L+")"),CLASS:new RegExp("^\\.("+L+")"),TAG:new RegExp("^("+L+"|[*])"),ATTR:new RegExp("^"+M),PSEUDO:new RegExp("^"+N),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+K+"*(even|odd|(([+-]|)(\\d*)n|)"+K+"*(?:([+-]|)"+K+"*(\\d+)|))"+K+"*\\)|)","i"),bool:new RegExp("^(?:"+J+")$","i"),needsContext:new RegExp("^"+K+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+K+"*((?:-\\d)?\\d*)"+K+"*\\)|)(?=[^-]|$)","i")},W=/^(?:input|select|textarea|button)$/i,X=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,$=/[+~]/,_=new RegExp("\\\\([\\da-f]{1,6}"+K+"?|("+K+")|.)","ig"),aa=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:d<0?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},ba=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ca=function(a,b){return b?"\0"===a?"\ufffd":a.slice(0,-1)+"\\"+a.charCodeAt(a.length-1).toString(16)+" ":"\\"+a},da=function(){m()},ea=ta(function(a){return a.disabled===!0&&("form"in a||"label"in a)},{dir:"parentNode",next:"legend"});try{G.apply(D=H.call(v.childNodes),v.childNodes),D[v.childNodes.length].nodeType}catch(fa){G={apply:D.length?function(a,b){F.apply(a,H.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function ga(a,b,d,e){var f,h,j,k,l,o,r,s=b&&b.ownerDocument,w=b?b.nodeType:9;if(d=d||[],"string"!=typeof a||!a||1!==w&&9!==w&&11!==w)return d;if(!e&&((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,p)){if(11!==w&&(l=Z.exec(a)))if(f=l[1]){if(9===w){if(!(j=b.getElementById(f)))return d;if(j.id===f)return d.push(j),d}else if(s&&(j=s.getElementById(f))&&t(b,j)&&j.id===f)return d.push(j),d}else{if(l[2])return G.apply(d,b.getElementsByTagName(a)),d;if((f=l[3])&&c.getElementsByClassName&&b.getElementsByClassName)return G.apply(d,b.getElementsByClassName(f)),d}if(c.qsa&&!A[a+" "]&&(!q||!q.test(a))){if(1!==w)s=b,r=a;else if("object"!==b.nodeName.toLowerCase()){(k=b.getAttribute("id"))?k=k.replace(ba,ca):b.setAttribute("id",k=u),o=g(a),h=o.length;while(h--)o[h]="#"+k+" "+sa(o[h]);r=o.join(","),s=$.test(a)&&qa(b.parentNode)||b}if(r)try{return G.apply(d,s.querySelectorAll(r)),d}catch(x){}finally{k===u&&b.removeAttribute("id")}}}return i(a.replace(P,"$1"),b,d,e)}function ha(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ia(a){return a[u]=!0,a}function ja(a){var b=n.createElement("fieldset");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function ka(a,b){var c=a.split("|"),e=c.length;while(e--)d.attrHandle[c[e]]=b}function la(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&a.sourceIndex-b.sourceIndex;if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function ma(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function na(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function oa(a){return function(b){return"form"in b?b.parentNode&&b.disabled===!1?"label"in b?"label"in b.parentNode?b.parentNode.disabled===a:b.disabled===a:b.isDisabled===a||b.isDisabled!==!a&&ea(b)===a:b.disabled===a:"label"in b&&b.disabled===a}}function pa(a){return ia(function(b){return b=+b,ia(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function qa(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=ga.support={},f=ga.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return!!b&&"HTML"!==b.nodeName},m=ga.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=n.documentElement,p=!f(n),v!==n&&(e=n.defaultView)&&e.top!==e&&(e.addEventListener?e.addEventListener("unload",da,!1):e.attachEvent&&e.attachEvent("onunload",da)),c.attributes=ja(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=ja(function(a){return a.appendChild(n.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=Y.test(n.getElementsByClassName),c.getById=ja(function(a){return o.appendChild(a).id=u,!n.getElementsByName||!n.getElementsByName(u).length}),c.getById?(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){return a.getAttribute("id")===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c?[c]:[]}}):(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c,d,e,f=b.getElementById(a);if(f){if(c=f.getAttributeNode("id"),c&&c.value===a)return[f];e=b.getElementsByName(a),d=0;while(f=e[d++])if(c=f.getAttributeNode("id"),c&&c.value===a)return[f]}return[]}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){if("undefined"!=typeof b.getElementsByClassName&&p)return b.getElementsByClassName(a)},r=[],q=[],(c.qsa=Y.test(n.querySelectorAll))&&(ja(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\r\\' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+K+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+K+"*(?:value|"+J+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),ja(function(a){a.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var b=n.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+K+"*[*^$|!~]?="),2!==a.querySelectorAll(":enabled").length&&q.push(":enabled",":disabled"),o.appendChild(a).disabled=!0,2!==a.querySelectorAll(":disabled").length&&q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=Y.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&ja(function(a){c.disconnectedMatch=s.call(a,"*"),s.call(a,"[s!='']:x"),r.push("!=",N)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=Y.test(o.compareDocumentPosition),t=b||Y.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===n||a.ownerDocument===v&&t(v,a)?-1:b===n||b.ownerDocument===v&&t(v,b)?1:k?I(k,a)-I(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,g=[a],h=[b];if(!e||!f)return a===n?-1:b===n?1:e?-1:f?1:k?I(k,a)-I(k,b):0;if(e===f)return la(a,b);c=a;while(c=c.parentNode)g.unshift(c);c=b;while(c=c.parentNode)h.unshift(c);while(g[d]===h[d])d++;return d?la(g[d],h[d]):g[d]===v?-1:h[d]===v?1:0},n):n},ga.matches=function(a,b){return ga(a,null,null,b)},ga.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(S,"='$1']"),c.matchesSelector&&p&&!A[b+" "]&&(!r||!r.test(b))&&(!q||!q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return ga(b,n,null,[a]).length>0},ga.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},ga.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&C.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},ga.escape=function(a){return(a+"").replace(ba,ca)},ga.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},ga.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=ga.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=ga.selectors={cacheLength:50,createPseudo:ia,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(_,aa),a[3]=(a[3]||a[4]||a[5]||"").replace(_,aa),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||ga.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&ga.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return V.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&T.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(_,aa).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+K+")"+a+"("+K+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=ga.attr(d,a);return null==e?"!="===b:!b||(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(O," ")+" ").indexOf(c)>-1:"|="===b&&(e===c||e.slice(0,c.length+1)===c+"-"))}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h,t=!1;if(q){if(f){while(p){m=b;while(m=m[p])if(h?m.nodeName.toLowerCase()===r:1===m.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){m=q,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n&&j[2],m=n&&q.childNodes[n];while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if(1===m.nodeType&&++t&&m===b){k[a]=[w,n,t];break}}else if(s&&(m=b,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n),t===!1)while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if((h?m.nodeName.toLowerCase()===r:1===m.nodeType)&&++t&&(s&&(l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),k[a]=[w,t]),m===b))break;return t-=e,t===d||t%d===0&&t/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||ga.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ia(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=I(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ia(function(a){var b=[],c=[],d=h(a.replace(P,"$1"));return d[u]?ia(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ia(function(a){return function(b){return ga(a,b).length>0}}),contains:ia(function(a){return a=a.replace(_,aa),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ia(function(a){return U.test(a||"")||ga.error("unsupported lang: "+a),a=a.replace(_,aa).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:oa(!1),disabled:oa(!0),checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return X.test(a.nodeName)},input:function(a){return W.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:pa(function(){return[0]}),last:pa(function(a,b){return[b-1]}),eq:pa(function(a,b,c){return[c<0?c+b:c]}),even:pa(function(a,b){for(var c=0;c<b;c+=2)a.push(c);return a}),odd:pa(function(a,b){for(var c=1;c<b;c+=2)a.push(c);return a}),lt:pa(function(a,b,c){for(var d=c<0?c+b:c;--d>=0;)a.push(d);return a}),gt:pa(function(a,b,c){for(var d=c<0?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=ma(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=na(b);function ra(){}ra.prototype=d.filters=d.pseudos,d.setFilters=new ra,g=ga.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){c&&!(e=Q.exec(h))||(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=R.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(P," ")}),h=h.slice(c.length));for(g in d.filter)!(e=V[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?ga.error(a):z(a,i).slice(0)};function sa(a){for(var b=0,c=a.length,d="";b<c;b++)d+=a[b].value;return d}function ta(a,b,c){var d=b.dir,e=b.next,f=e||d,g=c&&"parentNode"===f,h=x++;return b.first?function(b,c,e){while(b=b[d])if(1===b.nodeType||g)return a(b,c,e);return!1}:function(b,c,i){var j,k,l,m=[w,h];if(i){while(b=b[d])if((1===b.nodeType||g)&&a(b,c,i))return!0}else while(b=b[d])if(1===b.nodeType||g)if(l=b[u]||(b[u]={}),k=l[b.uniqueID]||(l[b.uniqueID]={}),e&&e===b.nodeName.toLowerCase())b=b[d]||b;else{if((j=k[f])&&j[0]===w&&j[1]===h)return m[2]=j[2];if(k[f]=m,m[2]=a(b,c,i))return!0}return!1}}function ua(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function va(a,b,c){for(var d=0,e=b.length;d<e;d++)ga(a,b[d],c);return c}function wa(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;h<i;h++)(f=a[h])&&(c&&!c(f,d,e)||(g.push(f),j&&b.push(h)));return g}function xa(a,b,c,d,e,f){return d&&!d[u]&&(d=xa(d)),e&&!e[u]&&(e=xa(e,f)),ia(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||va(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:wa(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=wa(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?I(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=wa(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):G.apply(g,r)})}function ya(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=ta(function(a){return a===b},h,!0),l=ta(function(a){return I(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];i<f;i++)if(c=d.relative[a[i].type])m=[ta(ua(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;e<f;e++)if(d.relative[a[e].type])break;return xa(i>1&&ua(m),i>1&&sa(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(P,"$1"),c,i<e&&ya(a.slice(i,e)),e<f&&ya(a=a.slice(e)),e<f&&sa(a))}m.push(c)}return ua(m)}function za(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,o,q,r=0,s="0",t=f&&[],u=[],v=j,x=f||e&&d.find.TAG("*",k),y=w+=null==v?1:Math.random()||.1,z=x.length;for(k&&(j=g===n||g||k);s!==z&&null!=(l=x[s]);s++){if(e&&l){o=0,g||l.ownerDocument===n||(m(l),h=!p);while(q=a[o++])if(q(l,g||n,h)){i.push(l);break}k&&(w=y)}c&&((l=!q&&l)&&r--,f&&t.push(l))}if(r+=s,c&&s!==r){o=0;while(q=b[o++])q(t,u,g,h);if(f){if(r>0)while(s--)t[s]||u[s]||(u[s]=E.call(i));u=wa(u)}G.apply(i,u),k&&!f&&u.length>0&&r+b.length>1&&ga.uniqueSort(i)}return k&&(w=y,j=v),t};return c?ia(f):f}return h=ga.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=ya(b[c]),f[u]?d.push(f):e.push(f);f=A(a,za(e,d)),f.selector=a}return f},i=ga.select=function(a,b,c,e){var f,i,j,k,l,m="function"==typeof a&&a,n=!e&&g(a=m.selector||a);if(c=c||[],1===n.length){if(i=n[0]=n[0].slice(0),i.length>2&&"ID"===(j=i[0]).type&&9===b.nodeType&&p&&d.relative[i[1].type]){if(b=(d.find.ID(j.matches[0].replace(_,aa),b)||[])[0],!b)return c;m&&(b=b.parentNode),a=a.slice(i.shift().value.length)}f=V.needsContext.test(a)?0:i.length;while(f--){if(j=i[f],d.relative[k=j.type])break;if((l=d.find[k])&&(e=l(j.matches[0].replace(_,aa),$.test(i[0].type)&&qa(b.parentNode)||b))){if(i.splice(f,1),a=e.length&&sa(i),!a)return G.apply(c,e),c;break}}}return(m||h(a,n))(e,b,!p,c,!b||$.test(a)&&qa(b.parentNode)||b),c},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=ja(function(a){return 1&a.compareDocumentPosition(n.createElement("fieldset"))}),ja(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||ka("type|href|height|width",function(a,b,c){if(!c)return a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&ja(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||ka("value",function(a,b,c){if(!c&&"input"===a.nodeName.toLowerCase())return a.defaultValue}),ja(function(a){return null==a.getAttribute("disabled")})||ka(J,function(a,b,c){var d;if(!c)return a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),ga}(a);r.find=x,r.expr=x.selectors,r.expr[":"]=r.expr.pseudos,r.uniqueSort=r.unique=x.uniqueSort,r.text=x.getText,r.isXMLDoc=x.isXML,r.contains=x.contains,r.escapeSelector=x.escape;var y=function(a,b,c){var d=[],e=void 0!==c;while((a=a[b])&&9!==a.nodeType)if(1===a.nodeType){if(e&&r(a).is(c))break;d.push(a)}return d},z=function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c},A=r.expr.match.needsContext,B=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,C=/^.[^:#\[\.,]*$/;function D(a,b,c){return r.isFunction(b)?r.grep(a,function(a,d){return!!b.call(a,d,a)!==c}):b.nodeType?r.grep(a,function(a){return a===b!==c}):"string"!=typeof b?r.grep(a,function(a){return i.call(b,a)>-1!==c}):C.test(b)?r.filter(b,a,c):(b=r.filter(b,a),r.grep(a,function(a){return i.call(b,a)>-1!==c&&1===a.nodeType}))}r.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?r.find.matchesSelector(d,a)?[d]:[]:r.find.matches(a,r.grep(b,function(a){return 1===a.nodeType}))},r.fn.extend({find:function(a){var b,c,d=this.length,e=this;if("string"!=typeof a)return this.pushStack(r(a).filter(function(){for(b=0;b<d;b++)if(r.contains(e[b],this))return!0}));for(c=this.pushStack([]),b=0;b<d;b++)r.find(a,e[b],c);return d>1?r.uniqueSort(c):c},filter:function(a){return this.pushStack(D(this,a||[],!1))},not:function(a){return this.pushStack(D(this,a||[],!0))},is:function(a){return!!D(this,"string"==typeof a&&A.test(a)?r(a):a||[],!1).length}});var E,F=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,G=r.fn.init=function(a,b,c){var e,f;if(!a)return this;if(c=c||E,"string"==typeof a){if(e="<"===a[0]&&">"===a[a.length-1]&&a.length>=3?[null,a,null]:F.exec(a),!e||!e[1]&&b)return!b||b.jquery?(b||c).find(a):this.constructor(b).find(a);if(e[1]){if(b=b instanceof r?b[0]:b,r.merge(this,r.parseHTML(e[1],b&&b.nodeType?b.ownerDocument||b:d,!0)),B.test(e[1])&&r.isPlainObject(b))for(e in b)r.isFunction(this[e])?this[e](b[e]):this.attr(e,b[e]);return this}return f=d.getElementById(e[2]),f&&(this[0]=f,this.length=1),this}return a.nodeType?(this[0]=a,this.length=1,this):r.isFunction(a)?void 0!==c.ready?c.ready(a):a(r):r.makeArray(a,this)};G.prototype=r.fn,E=r(d);var H=/^(?:parents|prev(?:Until|All))/,I={children:!0,contents:!0,next:!0,prev:!0};r.fn.extend({has:function(a){var b=r(a,this),c=b.length;return this.filter(function(){for(var a=0;a<c;a++)if(r.contains(this,b[a]))return!0})},closest:function(a,b){var c,d=0,e=this.length,f=[],g="string"!=typeof a&&r(a);if(!A.test(a))for(;d<e;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&r.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?r.uniqueSort(f):f)},index:function(a){return a?"string"==typeof a?i.call(r(a),this[0]):i.call(this,a.jquery?a[0]:a):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(r.uniqueSort(r.merge(this.get(),r(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function J(a,b){while((a=a[b])&&1!==a.nodeType);return a}r.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return y(a,"parentNode")},parentsUntil:function(a,b,c){return y(a,"parentNode",c)},next:function(a){return J(a,"nextSibling")},prev:function(a){return J(a,"previousSibling")},nextAll:function(a){return y(a,"nextSibling")},prevAll:function(a){return y(a,"previousSibling")},nextUntil:function(a,b,c){return y(a,"nextSibling",c)},prevUntil:function(a,b,c){return y(a,"previousSibling",c)},siblings:function(a){return z((a.parentNode||{}).firstChild,a)},children:function(a){return z(a.firstChild)},contents:function(a){return a.contentDocument||r.merge([],a.childNodes)}},function(a,b){r.fn[a]=function(c,d){var e=r.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=r.filter(d,e)),this.length>1&&(I[a]||r.uniqueSort(e),H.test(a)&&e.reverse()),this.pushStack(e)}});var K=/[^\x20\t\r\n\f]+/g;function L(a){var b={};return r.each(a.match(K)||[],function(a,c){b[c]=!0}),b}r.Callbacks=function(a){a="string"==typeof a?L(a):r.extend({},a);var b,c,d,e,f=[],g=[],h=-1,i=function(){for(e=a.once,d=b=!0;g.length;h=-1){c=g.shift();while(++h<f.length)f[h].apply(c[0],c[1])===!1&&a.stopOnFalse&&(h=f.length,c=!1)}a.memory||(c=!1),b=!1,e&&(f=c?[]:"")},j={add:function(){return f&&(c&&!b&&(h=f.length-1,g.push(c)),function d(b){r.each(b,function(b,c){r.isFunction(c)?a.unique&&j.has(c)||f.push(c):c&&c.length&&"string"!==r.type(c)&&d(c)})}(arguments),c&&!b&&i()),this},remove:function(){return r.each(arguments,function(a,b){var c;while((c=r.inArray(b,f,c))>-1)f.splice(c,1),c<=h&&h--}),this},has:function(a){return a?r.inArray(a,f)>-1:f.length>0},empty:function(){return f&&(f=[]),this},disable:function(){return e=g=[],f=c="",this},disabled:function(){return!f},lock:function(){return e=g=[],c||b||(f=c=""),this},locked:function(){return!!e},fireWith:function(a,c){return e||(c=c||[],c=[a,c.slice?c.slice():c],g.push(c),b||i()),this},fire:function(){return j.fireWith(this,arguments),this},fired:function(){return!!d}};return j};function M(a){return a}function N(a){throw a}function O(a,b,c){var d;try{a&&r.isFunction(d=a.promise)?d.call(a).done(b).fail(c):a&&r.isFunction(d=a.then)?d.call(a,b,c):b.call(void 0,a)}catch(a){c.call(void 0,a)}}r.extend({Deferred:function(b){var c=[["notify","progress",r.Callbacks("memory"),r.Callbacks("memory"),2],["resolve","done",r.Callbacks("once memory"),r.Callbacks("once memory"),0,"resolved"],["reject","fail",r.Callbacks("once memory"),r.Callbacks("once memory"),1,"rejected"]],d="pending",e={state:function(){return d},always:function(){return f.done(arguments).fail(arguments),this},"catch":function(a){return e.then(null,a)},pipe:function(){var a=arguments;return r.Deferred(function(b){r.each(c,function(c,d){var e=r.isFunction(a[d[4]])&&a[d[4]];f[d[1]](function(){var a=e&&e.apply(this,arguments);a&&r.isFunction(a.promise)?a.promise().progress(b.notify).done(b.resolve).fail(b.reject):b[d[0]+"With"](this,e?[a]:arguments)})}),a=null}).promise()},then:function(b,d,e){var f=0;function g(b,c,d,e){return function(){var h=this,i=arguments,j=function(){var a,j;if(!(b<f)){if(a=d.apply(h,i),a===c.promise())throw new TypeError("Thenable self-resolution");j=a&&("object"==typeof a||"function"==typeof a)&&a.then,r.isFunction(j)?e?j.call(a,g(f,c,M,e),g(f,c,N,e)):(f++,j.call(a,g(f,c,M,e),g(f,c,N,e),g(f,c,M,c.notifyWith))):(d!==M&&(h=void 0,i=[a]),(e||c.resolveWith)(h,i))}},k=e?j:function(){try{j()}catch(a){r.Deferred.exceptionHook&&r.Deferred.exceptionHook(a,k.stackTrace),b+1>=f&&(d!==N&&(h=void 0,i=[a]),c.rejectWith(h,i))}};b?k():(r.Deferred.getStackHook&&(k.stackTrace=r.Deferred.getStackHook()),a.setTimeout(k))}}return r.Deferred(function(a){c[0][3].add(g(0,a,r.isFunction(e)?e:M,a.notifyWith)),c[1][3].add(g(0,a,r.isFunction(b)?b:M)),c[2][3].add(g(0,a,r.isFunction(d)?d:N))}).promise()},promise:function(a){return null!=a?r.extend(a,e):e}},f={};return r.each(c,function(a,b){var g=b[2],h=b[5];e[b[1]]=g.add,h&&g.add(function(){d=h},c[3-a][2].disable,c[0][2].lock),g.add(b[3].fire),f[b[0]]=function(){return f[b[0]+"With"](this===f?void 0:this,arguments),this},f[b[0]+"With"]=g.fireWith}),e.promise(f),b&&b.call(f,f),f},when:function(a){var b=arguments.length,c=b,d=Array(c),e=f.call(arguments),g=r.Deferred(),h=function(a){return function(c){d[a]=this,e[a]=arguments.length>1?f.call(arguments):c,--b||g.resolveWith(d,e)}};if(b<=1&&(O(a,g.done(h(c)).resolve,g.reject),"pending"===g.state()||r.isFunction(e[c]&&e[c].then)))return g.then();while(c--)O(e[c],h(c),g.reject);return g.promise()}});var P=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;r.Deferred.exceptionHook=function(b,c){a.console&&a.console.warn&&b&&P.test(b.name)&&a.console.warn("jQuery.Deferred exception: "+b.message,b.stack,c)},r.readyException=function(b){a.setTimeout(function(){throw b})};var Q=r.Deferred();r.fn.ready=function(a){return Q.then(a)["catch"](function(a){r.readyException(a)}),this},r.extend({isReady:!1,readyWait:1,holdReady:function(a){a?r.readyWait++:r.ready(!0)},ready:function(a){(a===!0?--r.readyWait:r.isReady)||(r.isReady=!0,a!==!0&&--r.readyWait>0||Q.resolveWith(d,[r]))}}),r.ready.then=Q.then;function R(){d.removeEventListener("DOMContentLoaded",R),
a.removeEventListener("load",R),r.ready()}"complete"===d.readyState||"loading"!==d.readyState&&!d.documentElement.doScroll?a.setTimeout(r.ready):(d.addEventListener("DOMContentLoaded",R),a.addEventListener("load",R));var S=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===r.type(c)){e=!0;for(h in c)S(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,r.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(r(a),c)})),b))for(;h<i;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},T=function(a){return 1===a.nodeType||9===a.nodeType||!+a.nodeType};function U(){this.expando=r.expando+U.uid++}U.uid=1,U.prototype={cache:function(a){var b=a[this.expando];return b||(b={},T(a)&&(a.nodeType?a[this.expando]=b:Object.defineProperty(a,this.expando,{value:b,configurable:!0}))),b},set:function(a,b,c){var d,e=this.cache(a);if("string"==typeof b)e[r.camelCase(b)]=c;else for(d in b)e[r.camelCase(d)]=b[d];return e},get:function(a,b){return void 0===b?this.cache(a):a[this.expando]&&a[this.expando][r.camelCase(b)]},access:function(a,b,c){return void 0===b||b&&"string"==typeof b&&void 0===c?this.get(a,b):(this.set(a,b,c),void 0!==c?c:b)},remove:function(a,b){var c,d=a[this.expando];if(void 0!==d){if(void 0!==b){r.isArray(b)?b=b.map(r.camelCase):(b=r.camelCase(b),b=b in d?[b]:b.match(K)||[]),c=b.length;while(c--)delete d[b[c]]}(void 0===b||r.isEmptyObject(d))&&(a.nodeType?a[this.expando]=void 0:delete a[this.expando])}},hasData:function(a){var b=a[this.expando];return void 0!==b&&!r.isEmptyObject(b)}};var V=new U,W=new U,X=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,Y=/[A-Z]/g;function Z(a){return"true"===a||"false"!==a&&("null"===a?null:a===+a+""?+a:X.test(a)?JSON.parse(a):a)}function $(a,b,c){var d;if(void 0===c&&1===a.nodeType)if(d="data-"+b.replace(Y,"-$&").toLowerCase(),c=a.getAttribute(d),"string"==typeof c){try{c=Z(c)}catch(e){}W.set(a,b,c)}else c=void 0;return c}r.extend({hasData:function(a){return W.hasData(a)||V.hasData(a)},data:function(a,b,c){return W.access(a,b,c)},removeData:function(a,b){W.remove(a,b)},_data:function(a,b,c){return V.access(a,b,c)},_removeData:function(a,b){V.remove(a,b)}}),r.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=W.get(f),1===f.nodeType&&!V.get(f,"hasDataAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=r.camelCase(d.slice(5)),$(f,d,e[d])));V.set(f,"hasDataAttrs",!0)}return e}return"object"==typeof a?this.each(function(){W.set(this,a)}):S(this,function(b){var c;if(f&&void 0===b){if(c=W.get(f,a),void 0!==c)return c;if(c=$(f,a),void 0!==c)return c}else this.each(function(){W.set(this,a,b)})},null,b,arguments.length>1,null,!0)},removeData:function(a){return this.each(function(){W.remove(this,a)})}}),r.extend({queue:function(a,b,c){var d;if(a)return b=(b||"fx")+"queue",d=V.get(a,b),c&&(!d||r.isArray(c)?d=V.access(a,b,r.makeArray(c)):d.push(c)),d||[]},dequeue:function(a,b){b=b||"fx";var c=r.queue(a,b),d=c.length,e=c.shift(),f=r._queueHooks(a,b),g=function(){r.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return V.get(a,c)||V.access(a,c,{empty:r.Callbacks("once memory").add(function(){V.remove(a,[b+"queue",c])})})}}),r.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?r.queue(this[0],a):void 0===b?this:this.each(function(){var c=r.queue(this,a,b);r._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&r.dequeue(this,a)})},dequeue:function(a){return this.each(function(){r.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=r.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=V.get(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var _=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,aa=new RegExp("^(?:([+-])=|)("+_+")([a-z%]*)$","i"),ba=["Top","Right","Bottom","Left"],ca=function(a,b){return a=b||a,"none"===a.style.display||""===a.style.display&&r.contains(a.ownerDocument,a)&&"none"===r.css(a,"display")},da=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};function ea(a,b,c,d){var e,f=1,g=20,h=d?function(){return d.cur()}:function(){return r.css(a,b,"")},i=h(),j=c&&c[3]||(r.cssNumber[b]?"":"px"),k=(r.cssNumber[b]||"px"!==j&&+i)&&aa.exec(r.css(a,b));if(k&&k[3]!==j){j=j||k[3],c=c||[],k=+i||1;do f=f||".5",k/=f,r.style(a,b,k+j);while(f!==(f=h()/i)&&1!==f&&--g)}return c&&(k=+k||+i||0,e=c[1]?k+(c[1]+1)*c[2]:+c[2],d&&(d.unit=j,d.start=k,d.end=e)),e}var fa={};function ga(a){var b,c=a.ownerDocument,d=a.nodeName,e=fa[d];return e?e:(b=c.body.appendChild(c.createElement(d)),e=r.css(b,"display"),b.parentNode.removeChild(b),"none"===e&&(e="block"),fa[d]=e,e)}function ha(a,b){for(var c,d,e=[],f=0,g=a.length;f<g;f++)d=a[f],d.style&&(c=d.style.display,b?("none"===c&&(e[f]=V.get(d,"display")||null,e[f]||(d.style.display="")),""===d.style.display&&ca(d)&&(e[f]=ga(d))):"none"!==c&&(e[f]="none",V.set(d,"display",c)));for(f=0;f<g;f++)null!=e[f]&&(a[f].style.display=e[f]);return a}r.fn.extend({show:function(){return ha(this,!0)},hide:function(){return ha(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){ca(this)?r(this).show():r(this).hide()})}});var ia=/^(?:checkbox|radio)$/i,ja=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,ka=/^$|\/(?:java|ecma)script/i,la={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};la.optgroup=la.option,la.tbody=la.tfoot=la.colgroup=la.caption=la.thead,la.th=la.td;function ma(a,b){var c;return c="undefined"!=typeof a.getElementsByTagName?a.getElementsByTagName(b||"*"):"undefined"!=typeof a.querySelectorAll?a.querySelectorAll(b||"*"):[],void 0===b||b&&r.nodeName(a,b)?r.merge([a],c):c}function na(a,b){for(var c=0,d=a.length;c<d;c++)V.set(a[c],"globalEval",!b||V.get(b[c],"globalEval"))}var oa=/<|&#?\w+;/;function pa(a,b,c,d,e){for(var f,g,h,i,j,k,l=b.createDocumentFragment(),m=[],n=0,o=a.length;n<o;n++)if(f=a[n],f||0===f)if("object"===r.type(f))r.merge(m,f.nodeType?[f]:f);else if(oa.test(f)){g=g||l.appendChild(b.createElement("div")),h=(ja.exec(f)||["",""])[1].toLowerCase(),i=la[h]||la._default,g.innerHTML=i[1]+r.htmlPrefilter(f)+i[2],k=i[0];while(k--)g=g.lastChild;r.merge(m,g.childNodes),g=l.firstChild,g.textContent=""}else m.push(b.createTextNode(f));l.textContent="",n=0;while(f=m[n++])if(d&&r.inArray(f,d)>-1)e&&e.push(f);else if(j=r.contains(f.ownerDocument,f),g=ma(l.appendChild(f),"script"),j&&na(g),c){k=0;while(f=g[k++])ka.test(f.type||"")&&c.push(f)}return l}!function(){var a=d.createDocumentFragment(),b=a.appendChild(d.createElement("div")),c=d.createElement("input");c.setAttribute("type","radio"),c.setAttribute("checked","checked"),c.setAttribute("name","t"),b.appendChild(c),o.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,b.innerHTML="<textarea>x</textarea>",o.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue}();var qa=d.documentElement,ra=/^key/,sa=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,ta=/^([^.]*)(?:\.(.+)|)/;function ua(){return!0}function va(){return!1}function wa(){try{return d.activeElement}catch(a){}}function xa(a,b,c,d,e,f){var g,h;if("object"==typeof b){"string"!=typeof c&&(d=d||c,c=void 0);for(h in b)xa(a,h,c,d,b[h],f);return a}if(null==d&&null==e?(e=c,d=c=void 0):null==e&&("string"==typeof c?(e=d,d=void 0):(e=d,d=c,c=void 0)),e===!1)e=va;else if(!e)return a;return 1===f&&(g=e,e=function(a){return r().off(a),g.apply(this,arguments)},e.guid=g.guid||(g.guid=r.guid++)),a.each(function(){r.event.add(this,b,e,d,c)})}r.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=V.get(a);if(q){c.handler&&(f=c,c=f.handler,e=f.selector),e&&r.find.matchesSelector(qa,e),c.guid||(c.guid=r.guid++),(i=q.events)||(i=q.events={}),(g=q.handle)||(g=q.handle=function(b){return"undefined"!=typeof r&&r.event.triggered!==b.type?r.event.dispatch.apply(a,arguments):void 0}),b=(b||"").match(K)||[""],j=b.length;while(j--)h=ta.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n&&(l=r.event.special[n]||{},n=(e?l.delegateType:l.bindType)||n,l=r.event.special[n]||{},k=r.extend({type:n,origType:p,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&r.expr.match.needsContext.test(e),namespace:o.join(".")},f),(m=i[n])||(m=i[n]=[],m.delegateCount=0,l.setup&&l.setup.call(a,d,o,g)!==!1||a.addEventListener&&a.addEventListener(n,g)),l.add&&(l.add.call(a,k),k.handler.guid||(k.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,k):m.push(k),r.event.global[n]=!0)}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=V.hasData(a)&&V.get(a);if(q&&(i=q.events)){b=(b||"").match(K)||[""],j=b.length;while(j--)if(h=ta.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n){l=r.event.special[n]||{},n=(d?l.delegateType:l.bindType)||n,m=i[n]||[],h=h[2]&&new RegExp("(^|\\.)"+o.join("\\.(?:.*\\.|)")+"(\\.|$)"),g=f=m.length;while(f--)k=m[f],!e&&p!==k.origType||c&&c.guid!==k.guid||h&&!h.test(k.namespace)||d&&d!==k.selector&&("**"!==d||!k.selector)||(m.splice(f,1),k.selector&&m.delegateCount--,l.remove&&l.remove.call(a,k));g&&!m.length&&(l.teardown&&l.teardown.call(a,o,q.handle)!==!1||r.removeEvent(a,n,q.handle),delete i[n])}else for(n in i)r.event.remove(a,n+b[j],c,d,!0);r.isEmptyObject(i)&&V.remove(a,"handle events")}},dispatch:function(a){var b=r.event.fix(a),c,d,e,f,g,h,i=new Array(arguments.length),j=(V.get(this,"events")||{})[b.type]||[],k=r.event.special[b.type]||{};for(i[0]=b,c=1;c<arguments.length;c++)i[c]=arguments[c];if(b.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,b)!==!1){h=r.event.handlers.call(this,b,j),c=0;while((f=h[c++])&&!b.isPropagationStopped()){b.currentTarget=f.elem,d=0;while((g=f.handlers[d++])&&!b.isImmediatePropagationStopped())b.rnamespace&&!b.rnamespace.test(g.namespace)||(b.handleObj=g,b.data=g.data,e=((r.event.special[g.origType]||{}).handle||g.handler).apply(f.elem,i),void 0!==e&&(b.result=e)===!1&&(b.preventDefault(),b.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,b),b.result}},handlers:function(a,b){var c,d,e,f,g,h=[],i=b.delegateCount,j=a.target;if(i&&j.nodeType&&!("click"===a.type&&a.button>=1))for(;j!==this;j=j.parentNode||this)if(1===j.nodeType&&("click"!==a.type||j.disabled!==!0)){for(f=[],g={},c=0;c<i;c++)d=b[c],e=d.selector+" ",void 0===g[e]&&(g[e]=d.needsContext?r(e,this).index(j)>-1:r.find(e,this,null,[j]).length),g[e]&&f.push(d);f.length&&h.push({elem:j,handlers:f})}return j=this,i<b.length&&h.push({elem:j,handlers:b.slice(i)}),h},addProp:function(a,b){Object.defineProperty(r.Event.prototype,a,{enumerable:!0,configurable:!0,get:r.isFunction(b)?function(){if(this.originalEvent)return b(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[a]},set:function(b){Object.defineProperty(this,a,{enumerable:!0,configurable:!0,writable:!0,value:b})}})},fix:function(a){return a[r.expando]?a:new r.Event(a)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==wa()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===wa()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&r.nodeName(this,"input"))return this.click(),!1},_default:function(a){return r.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}}},r.removeEvent=function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c)},r.Event=function(a,b){return this instanceof r.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?ua:va,this.target=a.target&&3===a.target.nodeType?a.target.parentNode:a.target,this.currentTarget=a.currentTarget,this.relatedTarget=a.relatedTarget):this.type=a,b&&r.extend(this,b),this.timeStamp=a&&a.timeStamp||r.now(),void(this[r.expando]=!0)):new r.Event(a,b)},r.Event.prototype={constructor:r.Event,isDefaultPrevented:va,isPropagationStopped:va,isImmediatePropagationStopped:va,isSimulated:!1,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=ua,a&&!this.isSimulated&&a.preventDefault()},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=ua,a&&!this.isSimulated&&a.stopPropagation()},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=ua,a&&!this.isSimulated&&a.stopImmediatePropagation(),this.stopPropagation()}},r.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(a){var b=a.button;return null==a.which&&ra.test(a.type)?null!=a.charCode?a.charCode:a.keyCode:!a.which&&void 0!==b&&sa.test(a.type)?1&b?1:2&b?3:4&b?2:0:a.which}},r.event.addProp),r.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){r.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return e&&(e===d||r.contains(d,e))||(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),r.fn.extend({on:function(a,b,c,d){return xa(this,a,b,c,d)},one:function(a,b,c,d){return xa(this,a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,r(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return b!==!1&&"function"!=typeof b||(c=b,b=void 0),c===!1&&(c=va),this.each(function(){r.event.remove(this,a,c,b)})}});var ya=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,za=/<script|<style|<link/i,Aa=/checked\s*(?:[^=]|=\s*.checked.)/i,Ba=/^true\/(.*)/,Ca=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Da(a,b){return r.nodeName(a,"table")&&r.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a:a}function Ea(a){return a.type=(null!==a.getAttribute("type"))+"/"+a.type,a}function Fa(a){var b=Ba.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function Ga(a,b){var c,d,e,f,g,h,i,j;if(1===b.nodeType){if(V.hasData(a)&&(f=V.access(a),g=V.set(b,f),j=f.events)){delete g.handle,g.events={};for(e in j)for(c=0,d=j[e].length;c<d;c++)r.event.add(b,e,j[e][c])}W.hasData(a)&&(h=W.access(a),i=r.extend({},h),W.set(b,i))}}function Ha(a,b){var c=b.nodeName.toLowerCase();"input"===c&&ia.test(a.type)?b.checked=a.checked:"input"!==c&&"textarea"!==c||(b.defaultValue=a.defaultValue)}function Ia(a,b,c,d){b=g.apply([],b);var e,f,h,i,j,k,l=0,m=a.length,n=m-1,q=b[0],s=r.isFunction(q);if(s||m>1&&"string"==typeof q&&!o.checkClone&&Aa.test(q))return a.each(function(e){var f=a.eq(e);s&&(b[0]=q.call(this,e,f.html())),Ia(f,b,c,d)});if(m&&(e=pa(b,a[0].ownerDocument,!1,a,d),f=e.firstChild,1===e.childNodes.length&&(e=f),f||d)){for(h=r.map(ma(e,"script"),Ea),i=h.length;l<m;l++)j=e,l!==n&&(j=r.clone(j,!0,!0),i&&r.merge(h,ma(j,"script"))),c.call(a[l],j,l);if(i)for(k=h[h.length-1].ownerDocument,r.map(h,Fa),l=0;l<i;l++)j=h[l],ka.test(j.type||"")&&!V.access(j,"globalEval")&&r.contains(k,j)&&(j.src?r._evalUrl&&r._evalUrl(j.src):p(j.textContent.replace(Ca,""),k))}return a}function Ja(a,b,c){for(var d,e=b?r.filter(b,a):a,f=0;null!=(d=e[f]);f++)c||1!==d.nodeType||r.cleanData(ma(d)),d.parentNode&&(c&&r.contains(d.ownerDocument,d)&&na(ma(d,"script")),d.parentNode.removeChild(d));return a}r.extend({htmlPrefilter:function(a){return a.replace(ya,"<$1></$2>")},clone:function(a,b,c){var d,e,f,g,h=a.cloneNode(!0),i=r.contains(a.ownerDocument,a);if(!(o.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||r.isXMLDoc(a)))for(g=ma(h),f=ma(a),d=0,e=f.length;d<e;d++)Ha(f[d],g[d]);if(b)if(c)for(f=f||ma(a),g=g||ma(h),d=0,e=f.length;d<e;d++)Ga(f[d],g[d]);else Ga(a,h);return g=ma(h,"script"),g.length>0&&na(g,!i&&ma(a,"script")),h},cleanData:function(a){for(var b,c,d,e=r.event.special,f=0;void 0!==(c=a[f]);f++)if(T(c)){if(b=c[V.expando]){if(b.events)for(d in b.events)e[d]?r.event.remove(c,d):r.removeEvent(c,d,b.handle);c[V.expando]=void 0}c[W.expando]&&(c[W.expando]=void 0)}}}),r.fn.extend({detach:function(a){return Ja(this,a,!0)},remove:function(a){return Ja(this,a)},text:function(a){return S(this,function(a){return void 0===a?r.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=a)})},null,a,arguments.length)},append:function(){return Ia(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Da(this,a);b.appendChild(a)}})},prepend:function(){return Ia(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Da(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return Ia(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return Ia(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},empty:function(){for(var a,b=0;null!=(a=this[b]);b++)1===a.nodeType&&(r.cleanData(ma(a,!1)),a.textContent="");return this},clone:function(a,b){return a=null!=a&&a,b=null==b?a:b,this.map(function(){return r.clone(this,a,b)})},html:function(a){return S(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a&&1===b.nodeType)return b.innerHTML;if("string"==typeof a&&!za.test(a)&&!la[(ja.exec(a)||["",""])[1].toLowerCase()]){a=r.htmlPrefilter(a);try{for(;c<d;c++)b=this[c]||{},1===b.nodeType&&(r.cleanData(ma(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=[];return Ia(this,arguments,function(b){var c=this.parentNode;r.inArray(this,a)<0&&(r.cleanData(ma(this)),c&&c.replaceChild(b,this))},a)}}),r.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){r.fn[a]=function(a){for(var c,d=[],e=r(a),f=e.length-1,g=0;g<=f;g++)c=g===f?this:this.clone(!0),r(e[g])[b](c),h.apply(d,c.get());return this.pushStack(d)}});var Ka=/^margin/,La=new RegExp("^("+_+")(?!px)[a-z%]+$","i"),Ma=function(b){var c=b.ownerDocument.defaultView;return c&&c.opener||(c=a),c.getComputedStyle(b)};!function(){function b(){if(i){i.style.cssText="box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",i.innerHTML="",qa.appendChild(h);var b=a.getComputedStyle(i);c="1%"!==b.top,g="2px"===b.marginLeft,e="4px"===b.width,i.style.marginRight="50%",f="4px"===b.marginRight,qa.removeChild(h),i=null}}var c,e,f,g,h=d.createElement("div"),i=d.createElement("div");i.style&&(i.style.backgroundClip="content-box",i.cloneNode(!0).style.backgroundClip="",o.clearCloneStyle="content-box"===i.style.backgroundClip,h.style.cssText="border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute",h.appendChild(i),r.extend(o,{pixelPosition:function(){return b(),c},boxSizingReliable:function(){return b(),e},pixelMarginRight:function(){return b(),f},reliableMarginLeft:function(){return b(),g}}))}();function Na(a,b,c){var d,e,f,g,h=a.style;return c=c||Ma(a),c&&(g=c.getPropertyValue(b)||c[b],""!==g||r.contains(a.ownerDocument,a)||(g=r.style(a,b)),!o.pixelMarginRight()&&La.test(g)&&Ka.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0!==g?g+"":g}function Oa(a,b){return{get:function(){return a()?void delete this.get:(this.get=b).apply(this,arguments)}}}var Pa=/^(none|table(?!-c[ea]).+)/,Qa={position:"absolute",visibility:"hidden",display:"block"},Ra={letterSpacing:"0",fontWeight:"400"},Sa=["Webkit","Moz","ms"],Ta=d.createElement("div").style;function Ua(a){if(a in Ta)return a;var b=a[0].toUpperCase()+a.slice(1),c=Sa.length;while(c--)if(a=Sa[c]+b,a in Ta)return a}function Va(a,b,c){var d=aa.exec(b);return d?Math.max(0,d[2]-(c||0))+(d[3]||"px"):b}function Wa(a,b,c,d,e){var f,g=0;for(f=c===(d?"border":"content")?4:"width"===b?1:0;f<4;f+=2)"margin"===c&&(g+=r.css(a,c+ba[f],!0,e)),d?("content"===c&&(g-=r.css(a,"padding"+ba[f],!0,e)),"margin"!==c&&(g-=r.css(a,"border"+ba[f]+"Width",!0,e))):(g+=r.css(a,"padding"+ba[f],!0,e),"padding"!==c&&(g+=r.css(a,"border"+ba[f]+"Width",!0,e)));return g}function Xa(a,b,c){var d,e=!0,f=Ma(a),g="border-box"===r.css(a,"boxSizing",!1,f);if(a.getClientRects().length&&(d=a.getBoundingClientRect()[b]),d<=0||null==d){if(d=Na(a,b,f),(d<0||null==d)&&(d=a.style[b]),La.test(d))return d;e=g&&(o.boxSizingReliable()||d===a.style[b]),d=parseFloat(d)||0}return d+Wa(a,b,c||(g?"border":"content"),e,f)+"px"}r.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Na(a,"opacity");return""===c?"1":c}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=r.camelCase(b),i=a.style;return b=r.cssProps[h]||(r.cssProps[h]=Ua(h)||h),g=r.cssHooks[b]||r.cssHooks[h],void 0===c?g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b]:(f=typeof c,"string"===f&&(e=aa.exec(c))&&e[1]&&(c=ea(a,b,e),f="number"),null!=c&&c===c&&("number"===f&&(c+=e&&e[3]||(r.cssNumber[h]?"":"px")),o.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),g&&"set"in g&&void 0===(c=g.set(a,c,d))||(i[b]=c)),void 0)}},css:function(a,b,c,d){var e,f,g,h=r.camelCase(b);return b=r.cssProps[h]||(r.cssProps[h]=Ua(h)||h),g=r.cssHooks[b]||r.cssHooks[h],g&&"get"in g&&(e=g.get(a,!0,c)),void 0===e&&(e=Na(a,b,d)),"normal"===e&&b in Ra&&(e=Ra[b]),""===c||c?(f=parseFloat(e),c===!0||isFinite(f)?f||0:e):e}}),r.each(["height","width"],function(a,b){r.cssHooks[b]={get:function(a,c,d){if(c)return!Pa.test(r.css(a,"display"))||a.getClientRects().length&&a.getBoundingClientRect().width?Xa(a,b,d):da(a,Qa,function(){return Xa(a,b,d)})},set:function(a,c,d){var e,f=d&&Ma(a),g=d&&Wa(a,b,d,"border-box"===r.css(a,"boxSizing",!1,f),f);return g&&(e=aa.exec(c))&&"px"!==(e[3]||"px")&&(a.style[b]=c,c=r.css(a,b)),Va(a,c,g)}}}),r.cssHooks.marginLeft=Oa(o.reliableMarginLeft,function(a,b){if(b)return(parseFloat(Na(a,"marginLeft"))||a.getBoundingClientRect().left-da(a,{marginLeft:0},function(){return a.getBoundingClientRect().left}))+"px"}),r.each({margin:"",padding:"",border:"Width"},function(a,b){r.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];d<4;d++)e[a+ba[d]+b]=f[d]||f[d-2]||f[0];return e}},Ka.test(a)||(r.cssHooks[a+b].set=Va)}),r.fn.extend({css:function(a,b){return S(this,function(a,b,c){var d,e,f={},g=0;if(r.isArray(b)){for(d=Ma(a),e=b.length;g<e;g++)f[b[g]]=r.css(a,b[g],!1,d);return f}return void 0!==c?r.style(a,b,c):r.css(a,b)},a,b,arguments.length>1)}});function Ya(a,b,c,d,e){return new Ya.prototype.init(a,b,c,d,e)}r.Tween=Ya,Ya.prototype={constructor:Ya,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||r.easing._default,this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(r.cssNumber[c]?"":"px")},cur:function(){var a=Ya.propHooks[this.prop];return a&&a.get?a.get(this):Ya.propHooks._default.get(this)},run:function(a){var b,c=Ya.propHooks[this.prop];return this.options.duration?this.pos=b=r.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):this.pos=b=a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):Ya.propHooks._default.set(this),this}},Ya.prototype.init.prototype=Ya.prototype,Ya.propHooks={_default:{get:function(a){var b;return 1!==a.elem.nodeType||null!=a.elem[a.prop]&&null==a.elem.style[a.prop]?a.elem[a.prop]:(b=r.css(a.elem,a.prop,""),b&&"auto"!==b?b:0)},set:function(a){r.fx.step[a.prop]?r.fx.step[a.prop](a):1!==a.elem.nodeType||null==a.elem.style[r.cssProps[a.prop]]&&!r.cssHooks[a.prop]?a.elem[a.prop]=a.now:r.style(a.elem,a.prop,a.now+a.unit)}}},Ya.propHooks.scrollTop=Ya.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},r.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2},_default:"swing"},r.fx=Ya.prototype.init,r.fx.step={};var Za,$a,_a=/^(?:toggle|show|hide)$/,ab=/queueHooks$/;function bb(){$a&&(a.requestAnimationFrame(bb),r.fx.tick())}function cb(){return a.setTimeout(function(){Za=void 0}),Za=r.now()}function db(a,b){var c,d=0,e={height:a};for(b=b?1:0;d<4;d+=2-b)c=ba[d],e["margin"+c]=e["padding"+c]=a;return b&&(e.opacity=e.width=a),e}function eb(a,b,c){for(var d,e=(hb.tweeners[b]||[]).concat(hb.tweeners["*"]),f=0,g=e.length;f<g;f++)if(d=e[f].call(c,b,a))return d}function fb(a,b,c){var d,e,f,g,h,i,j,k,l="width"in b||"height"in b,m=this,n={},o=a.style,p=a.nodeType&&ca(a),q=V.get(a,"fxshow");c.queue||(g=r._queueHooks(a,"fx"),null==g.unqueued&&(g.unqueued=0,h=g.empty.fire,g.empty.fire=function(){g.unqueued||h()}),g.unqueued++,m.always(function(){m.always(function(){g.unqueued--,r.queue(a,"fx").length||g.empty.fire()})}));for(d in b)if(e=b[d],_a.test(e)){if(delete b[d],f=f||"toggle"===e,e===(p?"hide":"show")){if("show"!==e||!q||void 0===q[d])continue;p=!0}n[d]=q&&q[d]||r.style(a,d)}if(i=!r.isEmptyObject(b),i||!r.isEmptyObject(n)){l&&1===a.nodeType&&(c.overflow=[o.overflow,o.overflowX,o.overflowY],j=q&&q.display,null==j&&(j=V.get(a,"display")),k=r.css(a,"display"),"none"===k&&(j?k=j:(ha([a],!0),j=a.style.display||j,k=r.css(a,"display"),ha([a]))),("inline"===k||"inline-block"===k&&null!=j)&&"none"===r.css(a,"float")&&(i||(m.done(function(){o.display=j}),null==j&&(k=o.display,j="none"===k?"":k)),o.display="inline-block")),c.overflow&&(o.overflow="hidden",m.always(function(){o.overflow=c.overflow[0],o.overflowX=c.overflow[1],o.overflowY=c.overflow[2]})),i=!1;for(d in n)i||(q?"hidden"in q&&(p=q.hidden):q=V.access(a,"fxshow",{display:j}),f&&(q.hidden=!p),p&&ha([a],!0),m.done(function(){p||ha([a]),V.remove(a,"fxshow");for(d in n)r.style(a,d,n[d])})),i=eb(p?q[d]:0,d,m),d in q||(q[d]=i.start,p&&(i.end=i.start,i.start=0))}}function gb(a,b){var c,d,e,f,g;for(c in a)if(d=r.camelCase(c),e=b[d],f=a[c],r.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=r.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function hb(a,b,c){var d,e,f=0,g=hb.prefilters.length,h=r.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=Za||cb(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;g<i;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),f<1&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:r.extend({},b),opts:r.extend(!0,{specialEasing:{},easing:r.easing._default},c),originalProperties:b,originalOptions:c,startTime:Za||cb(),duration:c.duration,tweens:[],createTween:function(b,c){var d=r.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;c<d;c++)j.tweens[c].run(1);return b?(h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j,b])):h.rejectWith(a,[j,b]),this}}),k=j.props;for(gb(k,j.opts.specialEasing);f<g;f++)if(d=hb.prefilters[f].call(j,a,k,j.opts))return r.isFunction(d.stop)&&(r._queueHooks(j.elem,j.opts.queue).stop=r.proxy(d.stop,d)),d;return r.map(k,eb,j),r.isFunction(j.opts.start)&&j.opts.start.call(a,j),r.fx.timer(r.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}r.Animation=r.extend(hb,{tweeners:{"*":[function(a,b){var c=this.createTween(a,b);return ea(c.elem,a,aa.exec(b),c),c}]},tweener:function(a,b){r.isFunction(a)?(b=a,a=["*"]):a=a.match(K);for(var c,d=0,e=a.length;d<e;d++)c=a[d],hb.tweeners[c]=hb.tweeners[c]||[],hb.tweeners[c].unshift(b)},prefilters:[fb],prefilter:function(a,b){b?hb.prefilters.unshift(a):hb.prefilters.push(a)}}),r.speed=function(a,b,c){var e=a&&"object"==typeof a?r.extend({},a):{complete:c||!c&&b||r.isFunction(a)&&a,duration:a,easing:c&&b||b&&!r.isFunction(b)&&b};return r.fx.off||d.hidden?e.duration=0:"number"!=typeof e.duration&&(e.duration in r.fx.speeds?e.duration=r.fx.speeds[e.duration]:e.duration=r.fx.speeds._default),null!=e.queue&&e.queue!==!0||(e.queue="fx"),e.old=e.complete,e.complete=function(){r.isFunction(e.old)&&e.old.call(this),e.queue&&r.dequeue(this,e.queue)},e},r.fn.extend({fadeTo:function(a,b,c,d){return this.filter(ca).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=r.isEmptyObject(a),f=r.speed(b,c,d),g=function(){var b=hb(this,r.extend({},a),f);(e||V.get(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=r.timers,g=V.get(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&ab.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));!b&&c||r.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=V.get(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=r.timers,g=d?d.length:0;for(c.finish=!0,r.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;b<g;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),r.each(["toggle","show","hide"],function(a,b){var c=r.fn[b];r.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(db(b,!0),a,d,e)}}),r.each({slideDown:db("show"),slideUp:db("hide"),slideToggle:db("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){r.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),r.timers=[],r.fx.tick=function(){var a,b=0,c=r.timers;for(Za=r.now();b<c.length;b++)a=c[b],a()||c[b]!==a||c.splice(b--,1);c.length||r.fx.stop(),Za=void 0},r.fx.timer=function(a){r.timers.push(a),a()?r.fx.start():r.timers.pop()},r.fx.interval=13,r.fx.start=function(){$a||($a=a.requestAnimationFrame?a.requestAnimationFrame(bb):a.setInterval(r.fx.tick,r.fx.interval))},r.fx.stop=function(){a.cancelAnimationFrame?a.cancelAnimationFrame($a):a.clearInterval($a),$a=null},r.fx.speeds={slow:600,fast:200,_default:400},r.fn.delay=function(b,c){return b=r.fx?r.fx.speeds[b]||b:b,c=c||"fx",this.queue(c,function(c,d){var e=a.setTimeout(c,b);d.stop=function(){a.clearTimeout(e)}})},function(){var a=d.createElement("input"),b=d.createElement("select"),c=b.appendChild(d.createElement("option"));a.type="checkbox",o.checkOn=""!==a.value,o.optSelected=c.selected,a=d.createElement("input"),a.value="t",a.type="radio",o.radioValue="t"===a.value}();var ib,jb=r.expr.attrHandle;r.fn.extend({attr:function(a,b){return S(this,r.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){r.removeAttr(this,a)})}}),r.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return"undefined"==typeof a.getAttribute?r.prop(a,b,c):(1===f&&r.isXMLDoc(a)||(e=r.attrHooks[b.toLowerCase()]||(r.expr.match.bool.test(b)?ib:void 0)),
void 0!==c?null===c?void r.removeAttr(a,b):e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:(a.setAttribute(b,c+""),c):e&&"get"in e&&null!==(d=e.get(a,b))?d:(d=r.find.attr(a,b),null==d?void 0:d))},attrHooks:{type:{set:function(a,b){if(!o.radioValue&&"radio"===b&&r.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}},removeAttr:function(a,b){var c,d=0,e=b&&b.match(K);if(e&&1===a.nodeType)while(c=e[d++])a.removeAttribute(c)}}),ib={set:function(a,b,c){return b===!1?r.removeAttr(a,c):a.setAttribute(c,c),c}},r.each(r.expr.match.bool.source.match(/\w+/g),function(a,b){var c=jb[b]||r.find.attr;jb[b]=function(a,b,d){var e,f,g=b.toLowerCase();return d||(f=jb[g],jb[g]=e,e=null!=c(a,b,d)?g:null,jb[g]=f),e}});var kb=/^(?:input|select|textarea|button)$/i,lb=/^(?:a|area)$/i;r.fn.extend({prop:function(a,b){return S(this,r.prop,a,b,arguments.length>1)},removeProp:function(a){return this.each(function(){delete this[r.propFix[a]||a]})}}),r.extend({prop:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return 1===f&&r.isXMLDoc(a)||(b=r.propFix[b]||b,e=r.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=r.find.attr(a,"tabindex");return b?parseInt(b,10):kb.test(a.nodeName)||lb.test(a.nodeName)&&a.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),o.optSelected||(r.propHooks.selected={get:function(a){var b=a.parentNode;return b&&b.parentNode&&b.parentNode.selectedIndex,null},set:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex)}}),r.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){r.propFix[this.toLowerCase()]=this});function mb(a){var b=a.match(K)||[];return b.join(" ")}function nb(a){return a.getAttribute&&a.getAttribute("class")||""}r.fn.extend({addClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).addClass(a.call(this,b,nb(this)))});if("string"==typeof a&&a){b=a.match(K)||[];while(c=this[i++])if(e=nb(c),d=1===c.nodeType&&" "+mb(e)+" "){g=0;while(f=b[g++])d.indexOf(" "+f+" ")<0&&(d+=f+" ");h=mb(d),e!==h&&c.setAttribute("class",h)}}return this},removeClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).removeClass(a.call(this,b,nb(this)))});if(!arguments.length)return this.attr("class","");if("string"==typeof a&&a){b=a.match(K)||[];while(c=this[i++])if(e=nb(c),d=1===c.nodeType&&" "+mb(e)+" "){g=0;while(f=b[g++])while(d.indexOf(" "+f+" ")>-1)d=d.replace(" "+f+" "," ");h=mb(d),e!==h&&c.setAttribute("class",h)}}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):r.isFunction(a)?this.each(function(c){r(this).toggleClass(a.call(this,c,nb(this),b),b)}):this.each(function(){var b,d,e,f;if("string"===c){d=0,e=r(this),f=a.match(K)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else void 0!==a&&"boolean"!==c||(b=nb(this),b&&V.set(this,"__className__",b),this.setAttribute&&this.setAttribute("class",b||a===!1?"":V.get(this,"__className__")||""))})},hasClass:function(a){var b,c,d=0;b=" "+a+" ";while(c=this[d++])if(1===c.nodeType&&(" "+mb(nb(c))+" ").indexOf(b)>-1)return!0;return!1}});var ob=/\r/g;r.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=r.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,r(this).val()):a,null==e?e="":"number"==typeof e?e+="":r.isArray(e)&&(e=r.map(e,function(a){return null==a?"":a+""})),b=r.valHooks[this.type]||r.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=r.valHooks[e.type]||r.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(ob,""):null==c?"":c)}}}),r.extend({valHooks:{option:{get:function(a){var b=r.find.attr(a,"value");return null!=b?b:mb(r.text(a))}},select:{get:function(a){var b,c,d,e=a.options,f=a.selectedIndex,g="select-one"===a.type,h=g?null:[],i=g?f+1:e.length;for(d=f<0?i:g?f:0;d<i;d++)if(c=e[d],(c.selected||d===f)&&!c.disabled&&(!c.parentNode.disabled||!r.nodeName(c.parentNode,"optgroup"))){if(b=r(c).val(),g)return b;h.push(b)}return h},set:function(a,b){var c,d,e=a.options,f=r.makeArray(b),g=e.length;while(g--)d=e[g],(d.selected=r.inArray(r.valHooks.option.get(d),f)>-1)&&(c=!0);return c||(a.selectedIndex=-1),f}}}}),r.each(["radio","checkbox"],function(){r.valHooks[this]={set:function(a,b){if(r.isArray(b))return a.checked=r.inArray(r(a).val(),b)>-1}},o.checkOn||(r.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var pb=/^(?:focusinfocus|focusoutblur)$/;r.extend(r.event,{trigger:function(b,c,e,f){var g,h,i,j,k,m,n,o=[e||d],p=l.call(b,"type")?b.type:b,q=l.call(b,"namespace")?b.namespace.split("."):[];if(h=i=e=e||d,3!==e.nodeType&&8!==e.nodeType&&!pb.test(p+r.event.triggered)&&(p.indexOf(".")>-1&&(q=p.split("."),p=q.shift(),q.sort()),k=p.indexOf(":")<0&&"on"+p,b=b[r.expando]?b:new r.Event(p,"object"==typeof b&&b),b.isTrigger=f?2:3,b.namespace=q.join("."),b.rnamespace=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=e),c=null==c?[b]:r.makeArray(c,[b]),n=r.event.special[p]||{},f||!n.trigger||n.trigger.apply(e,c)!==!1)){if(!f&&!n.noBubble&&!r.isWindow(e)){for(j=n.delegateType||p,pb.test(j+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),i=h;i===(e.ownerDocument||d)&&o.push(i.defaultView||i.parentWindow||a)}g=0;while((h=o[g++])&&!b.isPropagationStopped())b.type=g>1?j:n.bindType||p,m=(V.get(h,"events")||{})[b.type]&&V.get(h,"handle"),m&&m.apply(h,c),m=k&&h[k],m&&m.apply&&T(h)&&(b.result=m.apply(h,c),b.result===!1&&b.preventDefault());return b.type=p,f||b.isDefaultPrevented()||n._default&&n._default.apply(o.pop(),c)!==!1||!T(e)||k&&r.isFunction(e[p])&&!r.isWindow(e)&&(i=e[k],i&&(e[k]=null),r.event.triggered=p,e[p](),r.event.triggered=void 0,i&&(e[k]=i)),b.result}},simulate:function(a,b,c){var d=r.extend(new r.Event,c,{type:a,isSimulated:!0});r.event.trigger(d,null,b)}}),r.fn.extend({trigger:function(a,b){return this.each(function(){r.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];if(c)return r.event.trigger(a,b,c,!0)}}),r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(a,b){r.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),r.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),o.focusin="onfocusin"in a,o.focusin||r.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){r.event.simulate(b,a.target,r.event.fix(a))};r.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=V.access(d,b);e||d.addEventListener(a,c,!0),V.access(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=V.access(d,b)-1;e?V.access(d,b,e):(d.removeEventListener(a,c,!0),V.remove(d,b))}}});var qb=a.location,rb=r.now(),sb=/\?/;r.parseXML=function(b){var c;if(!b||"string"!=typeof b)return null;try{c=(new a.DOMParser).parseFromString(b,"text/xml")}catch(d){c=void 0}return c&&!c.getElementsByTagName("parsererror").length||r.error("Invalid XML: "+b),c};var tb=/\[\]$/,ub=/\r?\n/g,vb=/^(?:submit|button|image|reset|file)$/i,wb=/^(?:input|select|textarea|keygen)/i;function xb(a,b,c,d){var e;if(r.isArray(b))r.each(b,function(b,e){c||tb.test(a)?d(a,e):xb(a+"["+("object"==typeof e&&null!=e?b:"")+"]",e,c,d)});else if(c||"object"!==r.type(b))d(a,b);else for(e in b)xb(a+"["+e+"]",b[e],c,d)}r.param=function(a,b){var c,d=[],e=function(a,b){var c=r.isFunction(b)?b():b;d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(null==c?"":c)};if(r.isArray(a)||a.jquery&&!r.isPlainObject(a))r.each(a,function(){e(this.name,this.value)});else for(c in a)xb(c,a[c],b,e);return d.join("&")},r.fn.extend({serialize:function(){return r.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=r.prop(this,"elements");return a?r.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!r(this).is(":disabled")&&wb.test(this.nodeName)&&!vb.test(a)&&(this.checked||!ia.test(a))}).map(function(a,b){var c=r(this).val();return null==c?null:r.isArray(c)?r.map(c,function(a){return{name:b.name,value:a.replace(ub,"\r\n")}}):{name:b.name,value:c.replace(ub,"\r\n")}}).get()}});var yb=/%20/g,zb=/#.*$/,Ab=/([?&])_=[^&]*/,Bb=/^(.*?):[ \t]*([^\r\n]*)$/gm,Cb=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Db=/^(?:GET|HEAD)$/,Eb=/^\/\//,Fb={},Gb={},Hb="*/".concat("*"),Ib=d.createElement("a");Ib.href=qb.href;function Jb(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(K)||[];if(r.isFunction(c))while(d=f[e++])"+"===d[0]?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Kb(a,b,c,d){var e={},f=a===Gb;function g(h){var i;return e[h]=!0,r.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Lb(a,b){var c,d,e=r.ajaxSettings.flatOptions||{};for(c in b)void 0!==b[c]&&((e[c]?a:d||(d={}))[c]=b[c]);return d&&r.extend(!0,a,d),a}function Mb(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===d&&(d=a.mimeType||b.getResponseHeader("Content-Type"));if(d)for(e in h)if(h[e]&&h[e].test(d)){i.unshift(e);break}if(i[0]in c)f=i[0];else{for(e in c){if(!i[0]||a.converters[e+" "+i[0]]){f=e;break}g||(g=e)}f=f||g}if(f)return f!==i[0]&&i.unshift(f),c[f]}function Nb(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}r.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:qb.href,type:"GET",isLocal:Cb.test(qb.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Hb,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":r.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Lb(Lb(a,r.ajaxSettings),b):Lb(r.ajaxSettings,a)},ajaxPrefilter:Jb(Fb),ajaxTransport:Jb(Gb),ajax:function(b,c){"object"==typeof b&&(c=b,b=void 0),c=c||{};var e,f,g,h,i,j,k,l,m,n,o=r.ajaxSetup({},c),p=o.context||o,q=o.context&&(p.nodeType||p.jquery)?r(p):r.event,s=r.Deferred(),t=r.Callbacks("once memory"),u=o.statusCode||{},v={},w={},x="canceled",y={readyState:0,getResponseHeader:function(a){var b;if(k){if(!h){h={};while(b=Bb.exec(g))h[b[1].toLowerCase()]=b[2]}b=h[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return k?g:null},setRequestHeader:function(a,b){return null==k&&(a=w[a.toLowerCase()]=w[a.toLowerCase()]||a,v[a]=b),this},overrideMimeType:function(a){return null==k&&(o.mimeType=a),this},statusCode:function(a){var b;if(a)if(k)y.always(a[y.status]);else for(b in a)u[b]=[u[b],a[b]];return this},abort:function(a){var b=a||x;return e&&e.abort(b),A(0,b),this}};if(s.promise(y),o.url=((b||o.url||qb.href)+"").replace(Eb,qb.protocol+"//"),o.type=c.method||c.type||o.method||o.type,o.dataTypes=(o.dataType||"*").toLowerCase().match(K)||[""],null==o.crossDomain){j=d.createElement("a");try{j.href=o.url,j.href=j.href,o.crossDomain=Ib.protocol+"//"+Ib.host!=j.protocol+"//"+j.host}catch(z){o.crossDomain=!0}}if(o.data&&o.processData&&"string"!=typeof o.data&&(o.data=r.param(o.data,o.traditional)),Kb(Fb,o,c,y),k)return y;l=r.event&&o.global,l&&0===r.active++&&r.event.trigger("ajaxStart"),o.type=o.type.toUpperCase(),o.hasContent=!Db.test(o.type),f=o.url.replace(zb,""),o.hasContent?o.data&&o.processData&&0===(o.contentType||"").indexOf("application/x-www-form-urlencoded")&&(o.data=o.data.replace(yb,"+")):(n=o.url.slice(f.length),o.data&&(f+=(sb.test(f)?"&":"?")+o.data,delete o.data),o.cache===!1&&(f=f.replace(Ab,"$1"),n=(sb.test(f)?"&":"?")+"_="+rb++ +n),o.url=f+n),o.ifModified&&(r.lastModified[f]&&y.setRequestHeader("If-Modified-Since",r.lastModified[f]),r.etag[f]&&y.setRequestHeader("If-None-Match",r.etag[f])),(o.data&&o.hasContent&&o.contentType!==!1||c.contentType)&&y.setRequestHeader("Content-Type",o.contentType),y.setRequestHeader("Accept",o.dataTypes[0]&&o.accepts[o.dataTypes[0]]?o.accepts[o.dataTypes[0]]+("*"!==o.dataTypes[0]?", "+Hb+"; q=0.01":""):o.accepts["*"]);for(m in o.headers)y.setRequestHeader(m,o.headers[m]);if(o.beforeSend&&(o.beforeSend.call(p,y,o)===!1||k))return y.abort();if(x="abort",t.add(o.complete),y.done(o.success),y.fail(o.error),e=Kb(Gb,o,c,y)){if(y.readyState=1,l&&q.trigger("ajaxSend",[y,o]),k)return y;o.async&&o.timeout>0&&(i=a.setTimeout(function(){y.abort("timeout")},o.timeout));try{k=!1,e.send(v,A)}catch(z){if(k)throw z;A(-1,z)}}else A(-1,"No Transport");function A(b,c,d,h){var j,m,n,v,w,x=c;k||(k=!0,i&&a.clearTimeout(i),e=void 0,g=h||"",y.readyState=b>0?4:0,j=b>=200&&b<300||304===b,d&&(v=Mb(o,y,d)),v=Nb(o,v,y,j),j?(o.ifModified&&(w=y.getResponseHeader("Last-Modified"),w&&(r.lastModified[f]=w),w=y.getResponseHeader("etag"),w&&(r.etag[f]=w)),204===b||"HEAD"===o.type?x="nocontent":304===b?x="notmodified":(x=v.state,m=v.data,n=v.error,j=!n)):(n=x,!b&&x||(x="error",b<0&&(b=0))),y.status=b,y.statusText=(c||x)+"",j?s.resolveWith(p,[m,x,y]):s.rejectWith(p,[y,x,n]),y.statusCode(u),u=void 0,l&&q.trigger(j?"ajaxSuccess":"ajaxError",[y,o,j?m:n]),t.fireWith(p,[y,x]),l&&(q.trigger("ajaxComplete",[y,o]),--r.active||r.event.trigger("ajaxStop")))}return y},getJSON:function(a,b,c){return r.get(a,b,c,"json")},getScript:function(a,b){return r.get(a,void 0,b,"script")}}),r.each(["get","post"],function(a,b){r[b]=function(a,c,d,e){return r.isFunction(c)&&(e=e||d,d=c,c=void 0),r.ajax(r.extend({url:a,type:b,dataType:e,data:c,success:d},r.isPlainObject(a)&&a))}}),r._evalUrl=function(a){return r.ajax({url:a,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},r.fn.extend({wrapAll:function(a){var b;return this[0]&&(r.isFunction(a)&&(a=a.call(this[0])),b=r(a,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstElementChild)a=a.firstElementChild;return a}).append(this)),this},wrapInner:function(a){return r.isFunction(a)?this.each(function(b){r(this).wrapInner(a.call(this,b))}):this.each(function(){var b=r(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=r.isFunction(a);return this.each(function(c){r(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(a){return this.parent(a).not("body").each(function(){r(this).replaceWith(this.childNodes)}),this}}),r.expr.pseudos.hidden=function(a){return!r.expr.pseudos.visible(a)},r.expr.pseudos.visible=function(a){return!!(a.offsetWidth||a.offsetHeight||a.getClientRects().length)},r.ajaxSettings.xhr=function(){try{return new a.XMLHttpRequest}catch(b){}};var Ob={0:200,1223:204},Pb=r.ajaxSettings.xhr();o.cors=!!Pb&&"withCredentials"in Pb,o.ajax=Pb=!!Pb,r.ajaxTransport(function(b){var c,d;if(o.cors||Pb&&!b.crossDomain)return{send:function(e,f){var g,h=b.xhr();if(h.open(b.type,b.url,b.async,b.username,b.password),b.xhrFields)for(g in b.xhrFields)h[g]=b.xhrFields[g];b.mimeType&&h.overrideMimeType&&h.overrideMimeType(b.mimeType),b.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest");for(g in e)h.setRequestHeader(g,e[g]);c=function(a){return function(){c&&(c=d=h.onload=h.onerror=h.onabort=h.onreadystatechange=null,"abort"===a?h.abort():"error"===a?"number"!=typeof h.status?f(0,"error"):f(h.status,h.statusText):f(Ob[h.status]||h.status,h.statusText,"text"!==(h.responseType||"text")||"string"!=typeof h.responseText?{binary:h.response}:{text:h.responseText},h.getAllResponseHeaders()))}},h.onload=c(),d=h.onerror=c("error"),void 0!==h.onabort?h.onabort=d:h.onreadystatechange=function(){4===h.readyState&&a.setTimeout(function(){c&&d()})},c=c("abort");try{h.send(b.hasContent&&b.data||null)}catch(i){if(c)throw i}},abort:function(){c&&c()}}}),r.ajaxPrefilter(function(a){a.crossDomain&&(a.contents.script=!1)}),r.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(a){return r.globalEval(a),a}}}),r.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET")}),r.ajaxTransport("script",function(a){if(a.crossDomain){var b,c;return{send:function(e,f){b=r("<script>").prop({charset:a.scriptCharset,src:a.url}).on("load error",c=function(a){b.remove(),c=null,a&&f("error"===a.type?404:200,a.type)}),d.head.appendChild(b[0])},abort:function(){c&&c()}}}});var Qb=[],Rb=/(=)\?(?=&|$)|\?\?/;r.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=Qb.pop()||r.expando+"_"+rb++;return this[a]=!0,a}}),r.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(Rb.test(b.url)?"url":"string"==typeof b.data&&0===(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&Rb.test(b.data)&&"data");if(h||"jsonp"===b.dataTypes[0])return e=b.jsonpCallback=r.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(Rb,"$1"+e):b.jsonp!==!1&&(b.url+=(sb.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||r.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){void 0===f?r(a).removeProp(e):a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,Qb.push(e)),g&&r.isFunction(f)&&f(g[0]),g=f=void 0}),"script"}),o.createHTMLDocument=function(){var a=d.implementation.createHTMLDocument("").body;return a.innerHTML="<form></form><form></form>",2===a.childNodes.length}(),r.parseHTML=function(a,b,c){if("string"!=typeof a)return[];"boolean"==typeof b&&(c=b,b=!1);var e,f,g;return b||(o.createHTMLDocument?(b=d.implementation.createHTMLDocument(""),e=b.createElement("base"),e.href=d.location.href,b.head.appendChild(e)):b=d),f=B.exec(a),g=!c&&[],f?[b.createElement(f[1])]:(f=pa([a],b,g),g&&g.length&&r(g).remove(),r.merge([],f.childNodes))},r.fn.load=function(a,b,c){var d,e,f,g=this,h=a.indexOf(" ");return h>-1&&(d=mb(a.slice(h)),a=a.slice(0,h)),r.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(e="POST"),g.length>0&&r.ajax({url:a,type:e||"GET",dataType:"html",data:b}).done(function(a){f=arguments,g.html(d?r("<div>").append(r.parseHTML(a)).find(d):a)}).always(c&&function(a,b){g.each(function(){c.apply(this,f||[a.responseText,b,a])})}),this},r.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){r.fn[b]=function(a){return this.on(b,a)}}),r.expr.pseudos.animated=function(a){return r.grep(r.timers,function(b){return a===b.elem}).length};function Sb(a){return r.isWindow(a)?a:9===a.nodeType&&a.defaultView}r.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=r.css(a,"position"),l=r(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=r.css(a,"top"),i=r.css(a,"left"),j=("absolute"===k||"fixed"===k)&&(f+i).indexOf("auto")>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),r.isFunction(b)&&(b=b.call(a,c,r.extend({},h))),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},r.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){r.offset.setOffset(this,a,b)});var b,c,d,e,f=this[0];if(f)return f.getClientRects().length?(d=f.getBoundingClientRect(),d.width||d.height?(e=f.ownerDocument,c=Sb(e),b=e.documentElement,{top:d.top+c.pageYOffset-b.clientTop,left:d.left+c.pageXOffset-b.clientLeft}):d):{top:0,left:0}},position:function(){if(this[0]){var a,b,c=this[0],d={top:0,left:0};return"fixed"===r.css(c,"position")?b=c.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),r.nodeName(a[0],"html")||(d=a.offset()),d={top:d.top+r.css(a[0],"borderTopWidth",!0),left:d.left+r.css(a[0],"borderLeftWidth",!0)}),{top:b.top-d.top-r.css(c,"marginTop",!0),left:b.left-d.left-r.css(c,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent;while(a&&"static"===r.css(a,"position"))a=a.offsetParent;return a||qa})}}),r.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c="pageYOffset"===b;r.fn[a]=function(d){return S(this,function(a,d,e){var f=Sb(a);return void 0===e?f?f[b]:a[d]:void(f?f.scrollTo(c?f.pageXOffset:e,c?e:f.pageYOffset):a[d]=e)},a,d,arguments.length)}}),r.each(["top","left"],function(a,b){r.cssHooks[b]=Oa(o.pixelPosition,function(a,c){if(c)return c=Na(a,b),La.test(c)?r(a).position()[b]+"px":c})}),r.each({Height:"height",Width:"width"},function(a,b){r.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){r.fn[d]=function(e,f){var g=arguments.length&&(c||"boolean"!=typeof e),h=c||(e===!0||f===!0?"margin":"border");return S(this,function(b,c,e){var f;return r.isWindow(b)?0===d.indexOf("outer")?b["inner"+a]:b.document.documentElement["client"+a]:9===b.nodeType?(f=b.documentElement,Math.max(b.body["scroll"+a],f["scroll"+a],b.body["offset"+a],f["offset"+a],f["client"+a])):void 0===e?r.css(b,c,h):r.style(b,c,e,h)},b,g?e:void 0,g)}})}),r.fn.extend({bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}}),r.parseJSON=JSON.parse,"function"==typeof define&&define.amd&&define("jquery",[],function(){return r});var Tb=a.jQuery,Ub=a.$;return r.noConflict=function(b){return a.$===r&&(a.$=Ub),b&&a.jQuery===r&&(a.jQuery=Tb),r},b||(a.jQuery=a.$=r),r});

/* End */
;
; /* Start:"a:4:{s:4:"full";s:60:"/local/templates/arlight/js/jquery-ui.min.js?165720755236675";s:6:"source";s:44:"/local/templates/arlight/js/jquery-ui.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*! jQuery UI - v1.12.1 - 2018-09-24
* http://jqueryui.com
* Includes: keycode.js, widgets/datepicker.js
* Copyright jQuery Foundation and other contributors; Licensed MIT */

(function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t(jQuery)})(function(t){function e(t){for(var e,i;t.length&&t[0]!==document;){if(e=t.css("position"),("absolute"===e||"relative"===e||"fixed"===e)&&(i=parseInt(t.css("zIndex"),10),!isNaN(i)&&0!==i))return i;t=t.parent()}return 0}function i(){this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},t.extend(this._defaults,this.regional[""]),this.regional.en=t.extend(!0,{},this.regional[""]),this.regional["en-US"]=t.extend(!0,{},this.regional.en),this.dpDiv=s(t("<div id='"+this._mainDivId+"' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))}function s(e){var i="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return e.on("mouseout",i,function(){t(this).removeClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&t(this).removeClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&t(this).removeClass("ui-datepicker-next-hover")}).on("mouseover",i,n)}function n(){t.datepicker._isDisabledDatepicker(a.inline?a.dpDiv.parent()[0]:a.input[0])||(t(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),t(this).addClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&t(this).addClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&t(this).addClass("ui-datepicker-next-hover"))}function o(e,i){t.extend(e,i);for(var s in i)null==i[s]&&(e[s]=i[s]);return e}t.ui=t.ui||{},t.ui.version="1.12.1",t.ui.keyCode={BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38},t.extend(t.ui,{datepicker:{version:"1.12.1"}});var a;t.extend(i.prototype,{markerClassName:"hasDatepicker",maxRows:4,_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(t){return o(this._defaults,t||{}),this},_attachDatepicker:function(e,i){var s,n,o;s=e.nodeName.toLowerCase(),n="div"===s||"span"===s,e.id||(this.uuid+=1,e.id="dp"+this.uuid),o=this._newInst(t(e),n),o.settings=t.extend({},i||{}),"input"===s?this._connectDatepicker(e,o):n&&this._inlineDatepicker(e,o)},_newInst:function(e,i){var n=e[0].id.replace(/([^A-Za-z0-9_\-])/g,"\\\\$1");return{id:n,input:e,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:i,dpDiv:i?s(t("<div class='"+this._inlineClass+" ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")):this.dpDiv}},_connectDatepicker:function(e,i){var s=t(e);i.append=t([]),i.trigger=t([]),s.hasClass(this.markerClassName)||(this._attachments(s,i),s.addClass(this.markerClassName).on("keydown",this._doKeyDown).on("keypress",this._doKeyPress).on("keyup",this._doKeyUp),this._autoSize(i),t.data(e,"datepicker",i),i.settings.disabled&&this._disableDatepicker(e))},_attachments:function(e,i){var s,n,o,a=this._get(i,"appendText"),r=this._get(i,"isRTL");i.append&&i.append.remove(),a&&(i.append=t("<span class='"+this._appendClass+"'>"+a+"</span>"),e[r?"before":"after"](i.append)),e.off("focus",this._showDatepicker),i.trigger&&i.trigger.remove(),s=this._get(i,"showOn"),("focus"===s||"both"===s)&&e.on("focus",this._showDatepicker),("button"===s||"both"===s)&&(n=this._get(i,"buttonText"),o=this._get(i,"buttonImage"),i.trigger=t(this._get(i,"buttonImageOnly")?t("<img/>").addClass(this._triggerClass).attr({src:o,alt:n,title:n}):t("<button type='button'></button>").addClass(this._triggerClass).html(o?t("<img/>").attr({src:o,alt:n,title:n}):n)),e[r?"before":"after"](i.trigger),i.trigger.on("click",function(){return t.datepicker._datepickerShowing&&t.datepicker._lastInput===e[0]?t.datepicker._hideDatepicker():t.datepicker._datepickerShowing&&t.datepicker._lastInput!==e[0]?(t.datepicker._hideDatepicker(),t.datepicker._showDatepicker(e[0])):t.datepicker._showDatepicker(e[0]),!1}))},_autoSize:function(t){if(this._get(t,"autoSize")&&!t.inline){var e,i,s,n,o=new Date(2009,11,20),a=this._get(t,"dateFormat");a.match(/[DM]/)&&(e=function(t){for(i=0,s=0,n=0;t.length>n;n++)t[n].length>i&&(i=t[n].length,s=n);return s},o.setMonth(e(this._get(t,a.match(/MM/)?"monthNames":"monthNamesShort"))),o.setDate(e(this._get(t,a.match(/DD/)?"dayNames":"dayNamesShort"))+20-o.getDay())),t.input.attr("size",this._formatDate(t,o).length)}},_inlineDatepicker:function(e,i){var s=t(e);s.hasClass(this.markerClassName)||(s.addClass(this.markerClassName).append(i.dpDiv),t.data(e,"datepicker",i),this._setDate(i,this._getDefaultDate(i),!0),this._updateDatepicker(i),this._updateAlternate(i),i.settings.disabled&&this._disableDatepicker(e),i.dpDiv.css("display","block"))},_dialogDatepicker:function(e,i,s,n,a){var r,l,h,c,u,d=this._dialogInst;return d||(this.uuid+=1,r="dp"+this.uuid,this._dialogInput=t("<input type='text' id='"+r+"' style='position: absolute; top: -100px; width: 0px;'/>"),this._dialogInput.on("keydown",this._doKeyDown),t("body").append(this._dialogInput),d=this._dialogInst=this._newInst(this._dialogInput,!1),d.settings={},t.data(this._dialogInput[0],"datepicker",d)),o(d.settings,n||{}),i=i&&i.constructor===Date?this._formatDate(d,i):i,this._dialogInput.val(i),this._pos=a?a.length?a:[a.pageX,a.pageY]:null,this._pos||(l=document.documentElement.clientWidth,h=document.documentElement.clientHeight,c=document.documentElement.scrollLeft||document.body.scrollLeft,u=document.documentElement.scrollTop||document.body.scrollTop,this._pos=[l/2-100+c,h/2-150+u]),this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),d.settings.onSelect=s,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),t.blockUI&&t.blockUI(this.dpDiv),t.data(this._dialogInput[0],"datepicker",d),this},_destroyDatepicker:function(e){var i,s=t(e),n=t.data(e,"datepicker");s.hasClass(this.markerClassName)&&(i=e.nodeName.toLowerCase(),t.removeData(e,"datepicker"),"input"===i?(n.append.remove(),n.trigger.remove(),s.removeClass(this.markerClassName).off("focus",this._showDatepicker).off("keydown",this._doKeyDown).off("keypress",this._doKeyPress).off("keyup",this._doKeyUp)):("div"===i||"span"===i)&&s.removeClass(this.markerClassName).empty(),a===n&&(a=null))},_enableDatepicker:function(e){var i,s,n=t(e),o=t.data(e,"datepicker");n.hasClass(this.markerClassName)&&(i=e.nodeName.toLowerCase(),"input"===i?(e.disabled=!1,o.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().removeClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!1)),this._disabledInputs=t.map(this._disabledInputs,function(t){return t===e?null:t}))},_disableDatepicker:function(e){var i,s,n=t(e),o=t.data(e,"datepicker");n.hasClass(this.markerClassName)&&(i=e.nodeName.toLowerCase(),"input"===i?(e.disabled=!0,o.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().addClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!0)),this._disabledInputs=t.map(this._disabledInputs,function(t){return t===e?null:t}),this._disabledInputs[this._disabledInputs.length]=e)},_isDisabledDatepicker:function(t){if(!t)return!1;for(var e=0;this._disabledInputs.length>e;e++)if(this._disabledInputs[e]===t)return!0;return!1},_getInst:function(e){try{return t.data(e,"datepicker")}catch(i){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(e,i,s){var n,a,r,l,h=this._getInst(e);return 2===arguments.length&&"string"==typeof i?"defaults"===i?t.extend({},t.datepicker._defaults):h?"all"===i?t.extend({},h.settings):this._get(h,i):null:(n=i||{},"string"==typeof i&&(n={},n[i]=s),h&&(this._curInst===h&&this._hideDatepicker(),a=this._getDateDatepicker(e,!0),r=this._getMinMaxDate(h,"min"),l=this._getMinMaxDate(h,"max"),o(h.settings,n),null!==r&&void 0!==n.dateFormat&&void 0===n.minDate&&(h.settings.minDate=this._formatDate(h,r)),null!==l&&void 0!==n.dateFormat&&void 0===n.maxDate&&(h.settings.maxDate=this._formatDate(h,l)),"disabled"in n&&(n.disabled?this._disableDatepicker(e):this._enableDatepicker(e)),this._attachments(t(e),h),this._autoSize(h),this._setDate(h,a),this._updateAlternate(h),this._updateDatepicker(h)),void 0)},_changeDatepicker:function(t,e,i){this._optionDatepicker(t,e,i)},_refreshDatepicker:function(t){var e=this._getInst(t);e&&this._updateDatepicker(e)},_setDateDatepicker:function(t,e){var i=this._getInst(t);i&&(this._setDate(i,e),this._updateDatepicker(i),this._updateAlternate(i))},_getDateDatepicker:function(t,e){var i=this._getInst(t);return i&&!i.inline&&this._setDateFromField(i,e),i?this._getDate(i):null},_doKeyDown:function(e){var i,s,n,o=t.datepicker._getInst(e.target),a=!0,r=o.dpDiv.is(".ui-datepicker-rtl");if(o._keyEvent=!0,t.datepicker._datepickerShowing)switch(e.keyCode){case 9:t.datepicker._hideDatepicker(),a=!1;break;case 13:return n=t("td."+t.datepicker._dayOverClass+":not(."+t.datepicker._currentClass+")",o.dpDiv),n[0]&&t.datepicker._selectDay(e.target,o.selectedMonth,o.selectedYear,n[0]),i=t.datepicker._get(o,"onSelect"),i?(s=t.datepicker._formatDate(o),i.apply(o.input?o.input[0]:null,[s,o])):t.datepicker._hideDatepicker(),!1;case 27:t.datepicker._hideDatepicker();break;case 33:t.datepicker._adjustDate(e.target,e.ctrlKey?-t.datepicker._get(o,"stepBigMonths"):-t.datepicker._get(o,"stepMonths"),"M");break;case 34:t.datepicker._adjustDate(e.target,e.ctrlKey?+t.datepicker._get(o,"stepBigMonths"):+t.datepicker._get(o,"stepMonths"),"M");break;case 35:(e.ctrlKey||e.metaKey)&&t.datepicker._clearDate(e.target),a=e.ctrlKey||e.metaKey;break;case 36:(e.ctrlKey||e.metaKey)&&t.datepicker._gotoToday(e.target),a=e.ctrlKey||e.metaKey;break;case 37:(e.ctrlKey||e.metaKey)&&t.datepicker._adjustDate(e.target,r?1:-1,"D"),a=e.ctrlKey||e.metaKey,e.originalEvent.altKey&&t.datepicker._adjustDate(e.target,e.ctrlKey?-t.datepicker._get(o,"stepBigMonths"):-t.datepicker._get(o,"stepMonths"),"M");break;case 38:(e.ctrlKey||e.metaKey)&&t.datepicker._adjustDate(e.target,-7,"D"),a=e.ctrlKey||e.metaKey;break;case 39:(e.ctrlKey||e.metaKey)&&t.datepicker._adjustDate(e.target,r?-1:1,"D"),a=e.ctrlKey||e.metaKey,e.originalEvent.altKey&&t.datepicker._adjustDate(e.target,e.ctrlKey?+t.datepicker._get(o,"stepBigMonths"):+t.datepicker._get(o,"stepMonths"),"M");break;case 40:(e.ctrlKey||e.metaKey)&&t.datepicker._adjustDate(e.target,7,"D"),a=e.ctrlKey||e.metaKey;break;default:a=!1}else 36===e.keyCode&&e.ctrlKey?t.datepicker._showDatepicker(this):a=!1;a&&(e.preventDefault(),e.stopPropagation())},_doKeyPress:function(e){var i,s,n=t.datepicker._getInst(e.target);return t.datepicker._get(n,"constrainInput")?(i=t.datepicker._possibleChars(t.datepicker._get(n,"dateFormat")),s=String.fromCharCode(null==e.charCode?e.keyCode:e.charCode),e.ctrlKey||e.metaKey||" ">s||!i||i.indexOf(s)>-1):void 0},_doKeyUp:function(e){var i,s=t.datepicker._getInst(e.target);if(s.input.val()!==s.lastVal)try{i=t.datepicker.parseDate(t.datepicker._get(s,"dateFormat"),s.input?s.input.val():null,t.datepicker._getFormatConfig(s)),i&&(t.datepicker._setDateFromField(s),t.datepicker._updateAlternate(s),t.datepicker._updateDatepicker(s))}catch(n){}return!0},_showDatepicker:function(i){if(i=i.target||i,"input"!==i.nodeName.toLowerCase()&&(i=t("input",i.parentNode)[0]),!t.datepicker._isDisabledDatepicker(i)&&t.datepicker._lastInput!==i){var s,n,a,r,l,h,c;s=t.datepicker._getInst(i),t.datepicker._curInst&&t.datepicker._curInst!==s&&(t.datepicker._curInst.dpDiv.stop(!0,!0),s&&t.datepicker._datepickerShowing&&t.datepicker._hideDatepicker(t.datepicker._curInst.input[0])),n=t.datepicker._get(s,"beforeShow"),a=n?n.apply(i,[i,s]):{},a!==!1&&(o(s.settings,a),s.lastVal=null,t.datepicker._lastInput=i,t.datepicker._setDateFromField(s),t.datepicker._inDialog&&(i.value=""),t.datepicker._pos||(t.datepicker._pos=t.datepicker._findPos(i),t.datepicker._pos[1]+=i.offsetHeight),r=!1,t(i).parents().each(function(){return r|="fixed"===t(this).css("position"),!r}),l={left:t.datepicker._pos[0],top:t.datepicker._pos[1]},t.datepicker._pos=null,s.dpDiv.empty(),s.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),t.datepicker._updateDatepicker(s),l=t.datepicker._checkOffset(s,l,r),s.dpDiv.css({position:t.datepicker._inDialog&&t.blockUI?"static":r?"fixed":"absolute",display:"none",left:l.left+"px",top:l.top+"px"}),s.inline||(h=t.datepicker._get(s,"showAnim"),c=t.datepicker._get(s,"duration"),s.dpDiv.css("z-index",e(t(i))+1),t.datepicker._datepickerShowing=!0,t.effects&&t.effects.effect[h]?s.dpDiv.show(h,t.datepicker._get(s,"showOptions"),c):s.dpDiv[h||"show"](h?c:null),t.datepicker._shouldFocusInput(s)&&s.input.trigger("focus"),t.datepicker._curInst=s))}},_updateDatepicker:function(e){this.maxRows=4,a=e,e.dpDiv.empty().append(this._generateHTML(e)),this._attachHandlers(e);var i,s=this._getNumberOfMonths(e),o=s[1],r=17,l=e.dpDiv.find("."+this._dayOverClass+" a");l.length>0&&n.apply(l.get(0)),e.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),o>1&&e.dpDiv.addClass("ui-datepicker-multi-"+o).css("width",r*o+"em"),e.dpDiv[(1!==s[0]||1!==s[1]?"add":"remove")+"Class"]("ui-datepicker-multi"),e.dpDiv[(this._get(e,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),e===t.datepicker._curInst&&t.datepicker._datepickerShowing&&t.datepicker._shouldFocusInput(e)&&e.input.trigger("focus"),e.yearshtml&&(i=e.yearshtml,setTimeout(function(){i===e.yearshtml&&e.yearshtml&&e.dpDiv.find("select.ui-datepicker-year:first").replaceWith(e.yearshtml),i=e.yearshtml=null},0))},_shouldFocusInput:function(t){return t.input&&t.input.is(":visible")&&!t.input.is(":disabled")&&!t.input.is(":focus")},_checkOffset:function(e,i,s){var n=e.dpDiv.outerWidth(),o=e.dpDiv.outerHeight(),a=e.input?e.input.outerWidth():0,r=e.input?e.input.outerHeight():0,l=document.documentElement.clientWidth+(s?0:t(document).scrollLeft()),h=document.documentElement.clientHeight+(s?0:t(document).scrollTop());return i.left-=this._get(e,"isRTL")?n-a:0,i.left-=s&&i.left===e.input.offset().left?t(document).scrollLeft():0,i.top-=s&&i.top===e.input.offset().top+r?t(document).scrollTop():0,i.left-=Math.min(i.left,i.left+n>l&&l>n?Math.abs(i.left+n-l):0),i.top-=Math.min(i.top,i.top+o>h&&h>o?Math.abs(o+r):0),i},_findPos:function(e){for(var i,s=this._getInst(e),n=this._get(s,"isRTL");e&&("hidden"===e.type||1!==e.nodeType||t.expr.filters.hidden(e));)e=e[n?"previousSibling":"nextSibling"];return i=t(e).offset(),[i.left,i.top]},_hideDatepicker:function(e){var i,s,n,o,a=this._curInst;!a||e&&a!==t.data(e,"datepicker")||this._datepickerShowing&&(i=this._get(a,"showAnim"),s=this._get(a,"duration"),n=function(){t.datepicker._tidyDialog(a)},t.effects&&(t.effects.effect[i]||t.effects[i])?a.dpDiv.hide(i,t.datepicker._get(a,"showOptions"),s,n):a.dpDiv["slideDown"===i?"slideUp":"fadeIn"===i?"fadeOut":"hide"](i?s:null,n),i||n(),this._datepickerShowing=!1,o=this._get(a,"onClose"),o&&o.apply(a.input?a.input[0]:null,[a.input?a.input.val():"",a]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),t.blockUI&&(t.unblockUI(),t("body").append(this.dpDiv))),this._inDialog=!1)},_tidyDialog:function(t){t.dpDiv.removeClass(this._dialogClass).off(".ui-datepicker-calendar")},_checkExternalClick:function(e){if(t.datepicker._curInst){var i=t(e.target),s=t.datepicker._getInst(i[0]);(i[0].id!==t.datepicker._mainDivId&&0===i.parents("#"+t.datepicker._mainDivId).length&&!i.hasClass(t.datepicker.markerClassName)&&!i.closest("."+t.datepicker._triggerClass).length&&t.datepicker._datepickerShowing&&(!t.datepicker._inDialog||!t.blockUI)||i.hasClass(t.datepicker.markerClassName)&&t.datepicker._curInst!==s)&&t.datepicker._hideDatepicker()}},_adjustDate:function(e,i,s){var n=t(e),o=this._getInst(n[0]);this._isDisabledDatepicker(n[0])||(this._adjustInstDate(o,i+("M"===s?this._get(o,"showCurrentAtPos"):0),s),this._updateDatepicker(o))},_gotoToday:function(e){var i,s=t(e),n=this._getInst(s[0]);this._get(n,"gotoCurrent")&&n.currentDay?(n.selectedDay=n.currentDay,n.drawMonth=n.selectedMonth=n.currentMonth,n.drawYear=n.selectedYear=n.currentYear):(i=new Date,n.selectedDay=i.getDate(),n.drawMonth=n.selectedMonth=i.getMonth(),n.drawYear=n.selectedYear=i.getFullYear()),this._notifyChange(n),this._adjustDate(s)},_selectMonthYear:function(e,i,s){var n=t(e),o=this._getInst(n[0]);o["selected"+("M"===s?"Month":"Year")]=o["draw"+("M"===s?"Month":"Year")]=parseInt(i.options[i.selectedIndex].value,10),this._notifyChange(o),this._adjustDate(n)},_selectDay:function(e,i,s,n){var o,a=t(e);t(n).hasClass(this._unselectableClass)||this._isDisabledDatepicker(a[0])||(o=this._getInst(a[0]),o.selectedDay=o.currentDay=t("a",n).html(),o.selectedMonth=o.currentMonth=i,o.selectedYear=o.currentYear=s,this._selectDate(e,this._formatDate(o,o.currentDay,o.currentMonth,o.currentYear)))},_clearDate:function(e){var i=t(e);this._selectDate(i,"")},_selectDate:function(e,i){var s,n=t(e),o=this._getInst(n[0]);i=null!=i?i:this._formatDate(o),o.input&&o.input.val(i),this._updateAlternate(o),s=this._get(o,"onSelect"),s?s.apply(o.input?o.input[0]:null,[i,o]):o.input&&o.input.trigger("change"),o.inline?this._updateDatepicker(o):(this._hideDatepicker(),this._lastInput=o.input[0],"object"!=typeof o.input[0]&&o.input.trigger("focus"),this._lastInput=null)},_updateAlternate:function(e){var i,s,n,o=this._get(e,"altField");o&&(i=this._get(e,"altFormat")||this._get(e,"dateFormat"),s=this._getDate(e),n=this.formatDate(i,s,this._getFormatConfig(e)),t(o).val(n))},noWeekends:function(t){var e=t.getDay();return[e>0&&6>e,""]},iso8601Week:function(t){var e,i=new Date(t.getTime());return i.setDate(i.getDate()+4-(i.getDay()||7)),e=i.getTime(),i.setMonth(0),i.setDate(1),Math.floor(Math.round((e-i)/864e5)/7)+1},parseDate:function(e,i,s){if(null==e||null==i)throw"Invalid arguments";if(i="object"==typeof i?""+i:i+"",""===i)return null;var n,o,a,r,l=0,h=(s?s.shortYearCutoff:null)||this._defaults.shortYearCutoff,c="string"!=typeof h?h:(new Date).getFullYear()%100+parseInt(h,10),u=(s?s.dayNamesShort:null)||this._defaults.dayNamesShort,d=(s?s.dayNames:null)||this._defaults.dayNames,p=(s?s.monthNamesShort:null)||this._defaults.monthNamesShort,f=(s?s.monthNames:null)||this._defaults.monthNames,m=-1,g=-1,_=-1,v=-1,b=!1,y=function(t){var i=e.length>n+1&&e.charAt(n+1)===t;return i&&n++,i},w=function(t){var e=y(t),s="@"===t?14:"!"===t?20:"y"===t&&e?4:"o"===t?3:2,n="y"===t?s:1,o=RegExp("^\\d{"+n+","+s+"}"),a=i.substring(l).match(o);if(!a)throw"Missing number at position "+l;return l+=a[0].length,parseInt(a[0],10)},k=function(e,s,n){var o=-1,a=t.map(y(e)?n:s,function(t,e){return[[e,t]]}).sort(function(t,e){return-(t[1].length-e[1].length)});if(t.each(a,function(t,e){var s=e[1];return i.substr(l,s.length).toLowerCase()===s.toLowerCase()?(o=e[0],l+=s.length,!1):void 0}),-1!==o)return o+1;throw"Unknown name at position "+l},x=function(){if(i.charAt(l)!==e.charAt(n))throw"Unexpected literal at position "+l;l++};for(n=0;e.length>n;n++)if(b)"'"!==e.charAt(n)||y("'")?x():b=!1;else switch(e.charAt(n)){case"d":_=w("d");break;case"D":k("D",u,d);break;case"o":v=w("o");break;case"m":g=w("m");break;case"M":g=k("M",p,f);break;case"y":m=w("y");break;case"@":r=new Date(w("@")),m=r.getFullYear(),g=r.getMonth()+1,_=r.getDate();break;case"!":r=new Date((w("!")-this._ticksTo1970)/1e4),m=r.getFullYear(),g=r.getMonth()+1,_=r.getDate();break;case"'":y("'")?x():b=!0;break;default:x()}if(i.length>l&&(a=i.substr(l),!/^\s+/.test(a)))throw"Extra/unparsed characters found in date: "+a;if(-1===m?m=(new Date).getFullYear():100>m&&(m+=(new Date).getFullYear()-(new Date).getFullYear()%100+(c>=m?0:-100)),v>-1)for(g=1,_=v;;){if(o=this._getDaysInMonth(m,g-1),o>=_)break;g++,_-=o}if(r=this._daylightSavingAdjust(new Date(m,g-1,_)),r.getFullYear()!==m||r.getMonth()+1!==g||r.getDate()!==_)throw"Invalid date";return r},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:1e7*60*60*24*(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925)),formatDate:function(t,e,i){if(!e)return"";var s,n=(i?i.dayNamesShort:null)||this._defaults.dayNamesShort,o=(i?i.dayNames:null)||this._defaults.dayNames,a=(i?i.monthNamesShort:null)||this._defaults.monthNamesShort,r=(i?i.monthNames:null)||this._defaults.monthNames,l=function(e){var i=t.length>s+1&&t.charAt(s+1)===e;return i&&s++,i},h=function(t,e,i){var s=""+e;if(l(t))for(;i>s.length;)s="0"+s;return s},c=function(t,e,i,s){return l(t)?s[e]:i[e]},u="",d=!1;if(e)for(s=0;t.length>s;s++)if(d)"'"!==t.charAt(s)||l("'")?u+=t.charAt(s):d=!1;else switch(t.charAt(s)){case"d":u+=h("d",e.getDate(),2);break;case"D":u+=c("D",e.getDay(),n,o);break;case"o":u+=h("o",Math.round((new Date(e.getFullYear(),e.getMonth(),e.getDate()).getTime()-new Date(e.getFullYear(),0,0).getTime())/864e5),3);break;case"m":u+=h("m",e.getMonth()+1,2);break;case"M":u+=c("M",e.getMonth(),a,r);break;case"y":u+=l("y")?e.getFullYear():(10>e.getFullYear()%100?"0":"")+e.getFullYear()%100;break;case"@":u+=e.getTime();break;case"!":u+=1e4*e.getTime()+this._ticksTo1970;break;case"'":l("'")?u+="'":d=!0;break;default:u+=t.charAt(s)}return u},_possibleChars:function(t){var e,i="",s=!1,n=function(i){var s=t.length>e+1&&t.charAt(e+1)===i;return s&&e++,s};for(e=0;t.length>e;e++)if(s)"'"!==t.charAt(e)||n("'")?i+=t.charAt(e):s=!1;else switch(t.charAt(e)){case"d":case"m":case"y":case"@":i+="0123456789";break;case"D":case"M":return null;case"'":n("'")?i+="'":s=!0;break;default:i+=t.charAt(e)}return i},_get:function(t,e){return void 0!==t.settings[e]?t.settings[e]:this._defaults[e]},_setDateFromField:function(t,e){if(t.input.val()!==t.lastVal){var i=this._get(t,"dateFormat"),s=t.lastVal=t.input?t.input.val():null,n=this._getDefaultDate(t),o=n,a=this._getFormatConfig(t);try{o=this.parseDate(i,s,a)||n}catch(r){s=e?"":s}t.selectedDay=o.getDate(),t.drawMonth=t.selectedMonth=o.getMonth(),t.drawYear=t.selectedYear=o.getFullYear(),t.currentDay=s?o.getDate():0,t.currentMonth=s?o.getMonth():0,t.currentYear=s?o.getFullYear():0,this._adjustInstDate(t)}},_getDefaultDate:function(t){return this._restrictMinMax(t,this._determineDate(t,this._get(t,"defaultDate"),new Date))},_determineDate:function(e,i,s){var n=function(t){var e=new Date;return e.setDate(e.getDate()+t),e},o=function(i){try{return t.datepicker.parseDate(t.datepicker._get(e,"dateFormat"),i,t.datepicker._getFormatConfig(e))}catch(s){}for(var n=(i.toLowerCase().match(/^c/)?t.datepicker._getDate(e):null)||new Date,o=n.getFullYear(),a=n.getMonth(),r=n.getDate(),l=/([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,h=l.exec(i);h;){switch(h[2]||"d"){case"d":case"D":r+=parseInt(h[1],10);break;case"w":case"W":r+=7*parseInt(h[1],10);break;case"m":case"M":a+=parseInt(h[1],10),r=Math.min(r,t.datepicker._getDaysInMonth(o,a));break;case"y":case"Y":o+=parseInt(h[1],10),r=Math.min(r,t.datepicker._getDaysInMonth(o,a))}h=l.exec(i)}return new Date(o,a,r)},a=null==i||""===i?s:"string"==typeof i?o(i):"number"==typeof i?isNaN(i)?s:n(i):new Date(i.getTime());return a=a&&"Invalid Date"==""+a?s:a,a&&(a.setHours(0),a.setMinutes(0),a.setSeconds(0),a.setMilliseconds(0)),this._daylightSavingAdjust(a)},_daylightSavingAdjust:function(t){return t?(t.setHours(t.getHours()>12?t.getHours()+2:0),t):null},_setDate:function(t,e,i){var s=!e,n=t.selectedMonth,o=t.selectedYear,a=this._restrictMinMax(t,this._determineDate(t,e,new Date));t.selectedDay=t.currentDay=a.getDate(),t.drawMonth=t.selectedMonth=t.currentMonth=a.getMonth(),t.drawYear=t.selectedYear=t.currentYear=a.getFullYear(),n===t.selectedMonth&&o===t.selectedYear||i||this._notifyChange(t),this._adjustInstDate(t),t.input&&t.input.val(s?"":this._formatDate(t))},_getDate:function(t){var e=!t.currentYear||t.input&&""===t.input.val()?null:this._daylightSavingAdjust(new Date(t.currentYear,t.currentMonth,t.currentDay));return e},_attachHandlers:function(e){var i=this._get(e,"stepMonths"),s="#"+e.id.replace(/\\\\/g,"\\");e.dpDiv.find("[data-handler]").map(function(){var e={prev:function(){t.datepicker._adjustDate(s,-i,"M")},next:function(){t.datepicker._adjustDate(s,+i,"M")},hide:function(){t.datepicker._hideDatepicker()},today:function(){t.datepicker._gotoToday(s)},selectDay:function(){return t.datepicker._selectDay(s,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return t.datepicker._selectMonthYear(s,this,"M"),!1},selectYear:function(){return t.datepicker._selectMonthYear(s,this,"Y"),!1}};t(this).on(this.getAttribute("data-event"),e[this.getAttribute("data-handler")])})},_generateHTML:function(t){var e,i,s,n,o,a,r,l,h,c,u,d,p,f,m,g,_,v,b,y,w,k,x,C,D,T,M,I,S,P,N,H,A,z,O,E,W,F,L,R=new Date,Y=this._daylightSavingAdjust(new Date(R.getFullYear(),R.getMonth(),R.getDate())),B=this._get(t,"isRTL"),j=this._get(t,"showButtonPanel"),q=this._get(t,"hideIfNoPrevNext"),K=this._get(t,"navigationAsDateFormat"),U=this._getNumberOfMonths(t),V=this._get(t,"showCurrentAtPos"),X=this._get(t,"stepMonths"),$=1!==U[0]||1!==U[1],G=this._daylightSavingAdjust(t.currentDay?new Date(t.currentYear,t.currentMonth,t.currentDay):new Date(9999,9,9)),J=this._getMinMaxDate(t,"min"),Q=this._getMinMaxDate(t,"max"),Z=t.drawMonth-V,te=t.drawYear;if(0>Z&&(Z+=12,te--),Q)for(e=this._daylightSavingAdjust(new Date(Q.getFullYear(),Q.getMonth()-U[0]*U[1]+1,Q.getDate())),e=J&&J>e?J:e;this._daylightSavingAdjust(new Date(te,Z,1))>e;)Z--,0>Z&&(Z=11,te--);for(t.drawMonth=Z,t.drawYear=te,i=this._get(t,"prevText"),i=K?this.formatDate(i,this._daylightSavingAdjust(new Date(te,Z-X,1)),this._getFormatConfig(t)):i,s=this._canAdjustMonth(t,-1,te,Z)?"<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(B?"e":"w")+"'>"+i+"</span></a>":q?"":"<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(B?"e":"w")+"'>"+i+"</span></a>",n=this._get(t,"nextText"),n=K?this.formatDate(n,this._daylightSavingAdjust(new Date(te,Z+X,1)),this._getFormatConfig(t)):n,o=this._canAdjustMonth(t,1,te,Z)?"<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(B?"w":"e")+"'>"+n+"</span></a>":q?"":"<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(B?"w":"e")+"'>"+n+"</span></a>",a=this._get(t,"currentText"),r=this._get(t,"gotoCurrent")&&t.currentDay?G:Y,a=K?this.formatDate(a,r,this._getFormatConfig(t)):a,l=t.inline?"":"<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>"+this._get(t,"closeText")+"</button>",h=j?"<div class='ui-datepicker-buttonpane ui-widget-content'>"+(B?l:"")+(this._isInRange(t,r)?"<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>"+a+"</button>":"")+(B?"":l)+"</div>":"",c=parseInt(this._get(t,"firstDay"),10),c=isNaN(c)?0:c,u=this._get(t,"showWeek"),d=this._get(t,"dayNames"),p=this._get(t,"dayNamesMin"),f=this._get(t,"monthNames"),m=this._get(t,"monthNamesShort"),g=this._get(t,"beforeShowDay"),_=this._get(t,"showOtherMonths"),v=this._get(t,"selectOtherMonths"),b=this._getDefaultDate(t),y="",k=0;U[0]>k;k++){for(x="",this.maxRows=4,C=0;U[1]>C;C++){if(D=this._daylightSavingAdjust(new Date(te,Z,t.selectedDay)),T=" ui-corner-all",M="",$){if(M+="<div class='ui-datepicker-group",U[1]>1)switch(C){case 0:M+=" ui-datepicker-group-first",T=" ui-corner-"+(B?"right":"left");break;case U[1]-1:M+=" ui-datepicker-group-last",T=" ui-corner-"+(B?"left":"right");break;default:M+=" ui-datepicker-group-middle",T=""}M+="'>"}for(M+="<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix"+T+"'>"+(/all|left/.test(T)&&0===k?B?o:s:"")+(/all|right/.test(T)&&0===k?B?s:o:"")+this._generateMonthYearHeader(t,Z,te,J,Q,k>0||C>0,f,m)+"</div><table class='ui-datepicker-calendar'><thead>"+"<tr>",I=u?"<th class='ui-datepicker-week-col'>"+this._get(t,"weekHeader")+"</th>":"",w=0;7>w;w++)S=(w+c)%7,I+="<th scope='col'"+((w+c+6)%7>=5?" class='ui-datepicker-week-end'":"")+">"+"<span title='"+d[S]+"'>"+p[S]+"</span></th>";for(M+=I+"</tr></thead><tbody>",P=this._getDaysInMonth(te,Z),te===t.selectedYear&&Z===t.selectedMonth&&(t.selectedDay=Math.min(t.selectedDay,P)),N=(this._getFirstDayOfMonth(te,Z)-c+7)%7,H=Math.ceil((N+P)/7),A=$?this.maxRows>H?this.maxRows:H:H,this.maxRows=A,z=this._daylightSavingAdjust(new Date(te,Z,1-N)),O=0;A>O;O++){for(M+="<tr>",E=u?"<td class='ui-datepicker-week-col'>"+this._get(t,"calculateWeek")(z)+"</td>":"",w=0;7>w;w++)W=g?g.apply(t.input?t.input[0]:null,[z]):[!0,""],F=z.getMonth()!==Z,L=F&&!v||!W[0]||J&&J>z||Q&&z>Q,E+="<td class='"+((w+c+6)%7>=5?" ui-datepicker-week-end":"")+(F?" ui-datepicker-other-month":"")+(z.getTime()===D.getTime()&&Z===t.selectedMonth&&t._keyEvent||b.getTime()===z.getTime()&&b.getTime()===D.getTime()?" "+this._dayOverClass:"")+(L?" "+this._unselectableClass+" ui-state-disabled":"")+(F&&!_?"":" "+W[1]+(z.getTime()===G.getTime()?" "+this._currentClass:"")+(z.getTime()===Y.getTime()?" ui-datepicker-today":""))+"'"+(F&&!_||!W[2]?"":" title='"+W[2].replace(/'/g,"&#39;")+"'")+(L?"":" data-handler='selectDay' data-event='click' data-month='"+z.getMonth()+"' data-year='"+z.getFullYear()+"'")+">"+(F&&!_?"&#xa0;":L?"<span class='ui-state-default'>"+z.getDate()+"</span>":"<a class='ui-state-default"+(z.getTime()===Y.getTime()?" ui-state-highlight":"")+(z.getTime()===G.getTime()?" ui-state-active":"")+(F?" ui-priority-secondary":"")+"' href='#'>"+z.getDate()+"</a>")+"</td>",z.setDate(z.getDate()+1),z=this._daylightSavingAdjust(z);M+=E+"</tr>"}Z++,Z>11&&(Z=0,te++),M+="</tbody></table>"+($?"</div>"+(U[0]>0&&C===U[1]-1?"<div class='ui-datepicker-row-break'></div>":""):""),x+=M}y+=x}return y+=h,t._keyEvent=!1,y},_generateMonthYearHeader:function(t,e,i,s,n,o,a,r){var l,h,c,u,d,p,f,m,g=this._get(t,"changeMonth"),_=this._get(t,"changeYear"),v=this._get(t,"showMonthAfterYear"),b="<div class='ui-datepicker-title'>",y="";
if(o||!g)y+="<span class='ui-datepicker-month'>"+a[e]+"</span>";else{for(l=s&&s.getFullYear()===i,h=n&&n.getFullYear()===i,y+="<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>",c=0;12>c;c++)(!l||c>=s.getMonth())&&(!h||n.getMonth()>=c)&&(y+="<option value='"+c+"'"+(c===e?" selected='selected'":"")+">"+r[c]+"</option>");y+="</select>"}if(v||(b+=y+(!o&&g&&_?"":"&#xa0;")),!t.yearshtml)if(t.yearshtml="",o||!_)b+="<span class='ui-datepicker-year'>"+i+"</span>";else{for(u=this._get(t,"yearRange").split(":"),d=(new Date).getFullYear(),p=function(t){var e=t.match(/c[+\-].*/)?i+parseInt(t.substring(1),10):t.match(/[+\-].*/)?d+parseInt(t,10):parseInt(t,10);return isNaN(e)?d:e},f=p(u[0]),m=Math.max(f,p(u[1]||"")),f=s?Math.max(f,s.getFullYear()):f,m=n?Math.min(m,n.getFullYear()):m,t.yearshtml+="<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>";m>=f;f++)t.yearshtml+="<option value='"+f+"'"+(f===i?" selected='selected'":"")+">"+f+"</option>";t.yearshtml+="</select>",b+=t.yearshtml,t.yearshtml=null}return b+=this._get(t,"yearSuffix"),v&&(b+=(!o&&g&&_?"":"&#xa0;")+y),b+="</div>"},_adjustInstDate:function(t,e,i){var s=t.selectedYear+("Y"===i?e:0),n=t.selectedMonth+("M"===i?e:0),o=Math.min(t.selectedDay,this._getDaysInMonth(s,n))+("D"===i?e:0),a=this._restrictMinMax(t,this._daylightSavingAdjust(new Date(s,n,o)));t.selectedDay=a.getDate(),t.drawMonth=t.selectedMonth=a.getMonth(),t.drawYear=t.selectedYear=a.getFullYear(),("M"===i||"Y"===i)&&this._notifyChange(t)},_restrictMinMax:function(t,e){var i=this._getMinMaxDate(t,"min"),s=this._getMinMaxDate(t,"max"),n=i&&i>e?i:e;return s&&n>s?s:n},_notifyChange:function(t){var e=this._get(t,"onChangeMonthYear");e&&e.apply(t.input?t.input[0]:null,[t.selectedYear,t.selectedMonth+1,t])},_getNumberOfMonths:function(t){var e=this._get(t,"numberOfMonths");return null==e?[1,1]:"number"==typeof e?[1,e]:e},_getMinMaxDate:function(t,e){return this._determineDate(t,this._get(t,e+"Date"),null)},_getDaysInMonth:function(t,e){return 32-this._daylightSavingAdjust(new Date(t,e,32)).getDate()},_getFirstDayOfMonth:function(t,e){return new Date(t,e,1).getDay()},_canAdjustMonth:function(t,e,i,s){var n=this._getNumberOfMonths(t),o=this._daylightSavingAdjust(new Date(i,s+(0>e?e:n[0]*n[1]),1));return 0>e&&o.setDate(this._getDaysInMonth(o.getFullYear(),o.getMonth())),this._isInRange(t,o)},_isInRange:function(t,e){var i,s,n=this._getMinMaxDate(t,"min"),o=this._getMinMaxDate(t,"max"),a=null,r=null,l=this._get(t,"yearRange");return l&&(i=l.split(":"),s=(new Date).getFullYear(),a=parseInt(i[0],10),r=parseInt(i[1],10),i[0].match(/[+\-].*/)&&(a+=s),i[1].match(/[+\-].*/)&&(r+=s)),(!n||e.getTime()>=n.getTime())&&(!o||e.getTime()<=o.getTime())&&(!a||e.getFullYear()>=a)&&(!r||r>=e.getFullYear())},_getFormatConfig:function(t){var e=this._get(t,"shortYearCutoff");return e="string"!=typeof e?e:(new Date).getFullYear()%100+parseInt(e,10),{shortYearCutoff:e,dayNamesShort:this._get(t,"dayNamesShort"),dayNames:this._get(t,"dayNames"),monthNamesShort:this._get(t,"monthNamesShort"),monthNames:this._get(t,"monthNames")}},_formatDate:function(t,e,i,s){e||(t.currentDay=t.selectedDay,t.currentMonth=t.selectedMonth,t.currentYear=t.selectedYear);var n=e?"object"==typeof e?e:this._daylightSavingAdjust(new Date(s,i,e)):this._daylightSavingAdjust(new Date(t.currentYear,t.currentMonth,t.currentDay));return this.formatDate(this._get(t,"dateFormat"),n,this._getFormatConfig(t))}}),t.fn.datepicker=function(e){if(!this.length)return this;t.datepicker.initialized||(t(document).on("mousedown",t.datepicker._checkExternalClick),t.datepicker.initialized=!0),0===t("#"+t.datepicker._mainDivId).length&&t("body").append(t.datepicker.dpDiv);var i=Array.prototype.slice.call(arguments,1);return"string"!=typeof e||"isDisabled"!==e&&"getDate"!==e&&"widget"!==e?"option"===e&&2===arguments.length&&"string"==typeof arguments[1]?t.datepicker["_"+e+"Datepicker"].apply(t.datepicker,[this[0]].concat(i)):this.each(function(){"string"==typeof e?t.datepicker["_"+e+"Datepicker"].apply(t.datepicker,[this].concat(i)):t.datepicker._attachDatepicker(this,e)}):t.datepicker["_"+e+"Datepicker"].apply(t.datepicker,[this[0]].concat(i))},t.datepicker=new i,t.datepicker.initialized=!1,t.datepicker.uuid=(new Date).getTime(),t.datepicker.version="1.12.1",t.datepicker});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:59:"/local/templates/arlight/js/datepicker-ru.js?16572075521589";s:6:"source";s:44:"/local/templates/arlight/js/datepicker-ru.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Andrew Stromnov (stromnov@gmail.com). */
( function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "../widgets/datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}( function( datepicker ) {

    datepicker.regional.ru = {
        closeText: "Закрыть",
        prevText: "&#x3C;Пред",
        nextText: "След&#x3E;",
        currentText: "Сегодня",
        monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
            "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
        monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
            "Июл","Авг","Сен","Окт","Ноя","Дек" ],
        dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
        dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
        dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
        weekHeader: "Нед",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" };
    datepicker.setDefaults( datepicker.regional.ru );

    return datepicker.regional.ru;

} ) );
/* End */
;
; /* Start:"a:4:{s:4:"full";s:66:"/local/templates/arlight/js/jquery.fancybox.min.js?165720755264692";s:6:"source";s:50:"/local/templates/arlight/js/jquery.fancybox.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
// ==================================================
// fancyBox v3.4.1
//
// Licensed GPLv3 for open source use
// or fancyBox Commercial License for commercial use
//
// http://fancyapps.com/fancybox/
// Copyright 2018 fancyApps
//
// ==================================================
!function(t,e,n,o){"use strict";function i(t,e){var o,i,a,s=[],r=0;t&&t.isDefaultPrevented()||(t.preventDefault(),e=e||{},t&&t.data&&(e=p(t.data.options,e)),o=e.$target||n(t.currentTarget).trigger("blur"),a=n.fancybox.getInstance(),a&&a.$trigger&&a.$trigger.is(o)||(e.selector?s=n(e.selector):(i=o.attr("data-fancybox")||"",i?(s=t.data?t.data.items:[],s=s.length?s.filter('[data-fancybox="'+i+'"]'):n('[data-fancybox="'+i+'"]')):s=[o]),r=n(s).index(o),r<0&&(r=0),a=n.fancybox.open(s,e,r),a.$trigger=o))}if(t.console=t.console||{info:function(t){}},n){if(n.fn.fancybox)return void console.info("fancyBox already initialized");var a={closeExisting:!1,loop:!1,gutter:50,keyboard:!0,arrows:!0,infobar:!0,smallBtn:"auto",toolbar:"auto",buttons:["zoom","thumbs","close"],idleTime:3,protect:!1,modal:!1,image:{preload:!1},ajax:{settings:{data:{fancybox:!0}}},iframe:{tpl:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',preload:!0,css:{},attr:{scrolling:"auto"}},video:{tpl:'<video class="fancybox-video" controls controlsList="nodownload"><source src="{{src}}" type="{{format}}" />Your browser doesn\'t support HTML5 video</video>',format:"",autoStart:!0},defaultType:"image",animationEffect:"zoom",animationDuration:366,zoomOpacity:"auto",transitionEffect:"fade",transitionDuration:366,slideClass:"",baseClass:"",baseTpl:'<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><div class="fancybox-toolbar">{{buttons}}</div><div class="fancybox-navigation">{{arrows}}</div><div class="fancybox-stage"></div><div class="fancybox-caption"></div></div></div>',spinnerTpl:'<div class="fancybox-loading"></div>',errorTpl:'<div class="fancybox-error"><p>{{ERROR}}</p></div>',btnTpl:{download:'<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.62 17.09V19H5.38v-1.91zm-2.97-6.96L17 11.45l-5 4.87-5-4.87 1.36-1.32 2.68 2.64V5h1.92v7.77z"/></svg></a>',zoom:'<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.7 17.3l-3-3a5.9 5.9 0 0 0-.6-7.6 5.9 5.9 0 0 0-8.4 0 5.9 5.9 0 0 0 0 8.4 5.9 5.9 0 0 0 7.7.7l3 3a1 1 0 0 0 1.3 0c.4-.5.4-1 0-1.5zM8.1 13.8a4 4 0 0 1 0-5.7 4 4 0 0 1 5.7 0 4 4 0 0 1 0 5.7 4 4 0 0 1-5.7 0z"/></svg></button>',close:'<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"/></svg></button>',arrowLeft:'<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.28 15.7l-1.34 1.37L5 12l4.94-5.07 1.34 1.38-2.68 2.72H19v1.94H8.6z"/></svg></div></button>',arrowRight:'<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4 12.97l-2.68 2.72 1.34 1.38L19 12l-4.94-5.07-1.34 1.38 2.68 2.72H5v1.94z"/></svg></div></button>',smallBtn:'<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"/></svg></button>'},parentEl:"body",hideScrollbar:!0,autoFocus:!0,backFocus:!0,trapFocus:!0,fullScreen:{autoStart:!1},touch:{vertical:!0,momentum:!0},hash:null,media:{},slideShow:{autoStart:!1,speed:3e3},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"},wheel:"auto",onInit:n.noop,beforeLoad:n.noop,afterLoad:n.noop,beforeShow:n.noop,afterShow:n.noop,beforeClose:n.noop,afterClose:n.noop,onActivate:n.noop,onDeactivate:n.noop,clickContent:function(t,e){return"image"===t.type&&"zoom"},clickSlide:"close",clickOutside:"close",dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1,mobile:{idleTime:!1,clickContent:function(t,e){return"image"===t.type&&"toggleControls"},clickSlide:function(t,e){return"image"===t.type?"toggleControls":"close"},dblclickContent:function(t,e){return"image"===t.type&&"zoom"},dblclickSlide:function(t,e){return"image"===t.type&&"zoom"}},lang:"en",i18n:{en:{CLOSE:"Close",NEXT:"Next",PREV:"Previous",ERROR:"The requested content cannot be loaded. <br/> Please try again later.",PLAY_START:"Start slideshow",PLAY_STOP:"Pause slideshow",FULL_SCREEN:"Full screen",THUMBS:"Thumbnails",DOWNLOAD:"Download",SHARE:"Share",ZOOM:"Zoom"},de:{CLOSE:"Schliessen",NEXT:"Weiter",PREV:"Zurück",ERROR:"Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.",PLAY_START:"Diaschau starten",PLAY_STOP:"Diaschau beenden",FULL_SCREEN:"Vollbild",THUMBS:"Vorschaubilder",DOWNLOAD:"Herunterladen",SHARE:"Teilen",ZOOM:"Maßstab"}}},s=n(t),r=n(e),c=0,l=function(t){return t&&t.hasOwnProperty&&t instanceof n},d=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),u=function(){var t,n=e.createElement("fakeelement"),i={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(t in i)if(n.style[t]!==o)return i[t];return"transitionend"}(),f=function(t){return t&&t.length&&t[0].offsetHeight},p=function(t,e){var o=n.extend(!0,{},t,e);return n.each(e,function(t,e){n.isArray(e)&&(o[t]=e)}),o},h=function(t,e,o){var i=this;i.opts=p({index:o},n.fancybox.defaults),n.isPlainObject(e)&&(i.opts=p(i.opts,e)),n.fancybox.isMobile&&(i.opts=p(i.opts,i.opts.mobile)),i.id=i.opts.id||++c,i.currIndex=parseInt(i.opts.index,10)||0,i.prevIndex=null,i.prevPos=null,i.currPos=0,i.firstRun=!0,i.group=[],i.slides={},i.addContent(t),i.group.length&&i.init()};n.extend(h.prototype,{init:function(){var i,a,s,r=this,c=r.group[r.currIndex],l=c.opts,d=n.fancybox.scrollbarWidth;l.closeExisting&&n.fancybox.close(!0),n("body").addClass("fancybox-active"),!n.fancybox.getInstance()&&l.hideScrollbar!==!1&&!n.fancybox.isMobile&&e.body.scrollHeight>t.innerHeight&&(d===o&&(i=n('<div style="width:100px;height:100px;overflow:scroll;" />').appendTo("body"),d=n.fancybox.scrollbarWidth=i[0].offsetWidth-i[0].clientWidth,i.remove()),n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar { margin-right: '+d+"px; }</style>"),n("body").addClass("compensate-for-scrollbar")),s="",n.each(l.buttons,function(t,e){s+=l.btnTpl[e]||""}),a=n(r.translate(r,l.baseTpl.replace("{{buttons}}",s).replace("{{arrows}}",l.btnTpl.arrowLeft+l.btnTpl.arrowRight))).attr("id","fancybox-container-"+r.id).addClass(l.baseClass).data("FancyBox",r).appendTo(l.parentEl),r.$refs={container:a},["bg","inner","infobar","toolbar","stage","caption","navigation"].forEach(function(t){r.$refs[t]=a.find(".fancybox-"+t)}),r.trigger("onInit"),r.activate(),r.jumpTo(r.currIndex)},translate:function(t,e){var n=t.opts.i18n[t.opts.lang];return e.replace(/\{\{(\w+)\}\}/g,function(t,e){var i=n[e];return i===o?t:i})},addContent:function(t){var e,i=this,a=n.makeArray(t);n.each(a,function(t,e){var a,s,r,c,l,d={},u={};n.isPlainObject(e)?(d=e,u=e.opts||e):"object"===n.type(e)&&n(e).length?(a=n(e),u=a.data()||{},u=n.extend(!0,{},u,u.options),u.$orig=a,d.src=i.opts.src||u.src||a.attr("href"),d.type||d.src||(d.type="inline",d.src=e)):d={type:"html",src:e+""},d.opts=n.extend(!0,{},i.opts,u),n.isArray(u.buttons)&&(d.opts.buttons=u.buttons),n.fancybox.isMobile&&d.opts.mobile&&(d.opts=p(d.opts,d.opts.mobile)),s=d.type||d.opts.type,c=d.src||"",!s&&c&&((r=c.match(/\.(mp4|mov|ogv|webm)((\?|#).*)?$/i))?(s="video",d.opts.video.format||(d.opts.video.format="video/"+("ogv"===r[1]?"ogg":r[1]))):c.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i)?s="image":c.match(/\.(pdf)((\?|#).*)?$/i)?s="iframe":"#"===c.charAt(0)&&(s="inline")),s?d.type=s:i.trigger("objectNeedsType",d),d.contentType||(d.contentType=n.inArray(d.type,["html","inline","ajax"])>-1?"html":d.type),d.index=i.group.length,"auto"==d.opts.smallBtn&&(d.opts.smallBtn=n.inArray(d.type,["html","inline","ajax"])>-1),"auto"===d.opts.toolbar&&(d.opts.toolbar=!d.opts.smallBtn),d.opts.$trigger&&d.index===i.opts.index&&(d.opts.$thumb=d.opts.$trigger.find("img:first"),d.opts.$thumb.length&&(d.opts.$orig=d.opts.$trigger)),d.opts.$thumb&&d.opts.$thumb.length||!d.opts.$orig||(d.opts.$thumb=d.opts.$orig.find("img:first")),"function"===n.type(d.opts.caption)&&(d.opts.caption=d.opts.caption.apply(e,[i,d])),"function"===n.type(i.opts.caption)&&(d.opts.caption=i.opts.caption.apply(e,[i,d])),d.opts.caption instanceof n||(d.opts.caption=d.opts.caption===o?"":d.opts.caption+""),"ajax"===d.type&&(l=c.split(/\s+/,2),l.length>1&&(d.src=l.shift(),d.opts.filter=l.shift())),d.opts.modal&&(d.opts=n.extend(!0,d.opts,{infobar:0,toolbar:0,smallBtn:0,keyboard:0,slideShow:0,fullScreen:0,thumbs:0,touch:0,clickContent:!1,clickSlide:!1,clickOutside:!1,dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1})),i.group.push(d)}),Object.keys(i.slides).length&&(i.updateControls(),e=i.Thumbs,e&&e.isActive&&(e.create(),e.focus()))},addEvents:function(){var e=this;e.removeEvents(),e.$refs.container.on("click.fb-close","[data-fancybox-close]",function(t){t.stopPropagation(),t.preventDefault(),e.close(t)}).on("touchstart.fb-prev click.fb-prev","[data-fancybox-prev]",function(t){t.stopPropagation(),t.preventDefault(),e.previous()}).on("touchstart.fb-next click.fb-next","[data-fancybox-next]",function(t){t.stopPropagation(),t.preventDefault(),e.next()}).on("click.fb","[data-fancybox-zoom]",function(t){e[e.isScaledDown()?"scaleToActual":"scaleToFit"]()}),s.on("orientationchange.fb resize.fb",function(t){t&&t.originalEvent&&"resize"===t.originalEvent.type?d(function(){e.update()}):(e.current&&"iframe"===e.current.type&&e.$refs.stage.hide(),setTimeout(function(){e.$refs.stage.show(),e.update()},n.fancybox.isMobile?600:250))}),r.on("keydown.fb",function(t){var o=n.fancybox?n.fancybox.getInstance():null,i=o.current,a=t.keyCode||t.which;if(9==a)return void(i.opts.trapFocus&&e.focus(t));if(!(!i.opts.keyboard||t.ctrlKey||t.altKey||t.shiftKey||n(t.target).is("input")||n(t.target).is("textarea")))return 8===a||27===a?(t.preventDefault(),void e.close(t)):37===a||38===a?(t.preventDefault(),void e.previous()):39===a||40===a?(t.preventDefault(),void e.next()):void e.trigger("afterKeydown",t,a)}),e.group[e.currIndex].opts.idleTime&&(e.idleSecondsCounter=0,r.on("mousemove.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle",function(t){e.idleSecondsCounter=0,e.isIdle&&e.showControls(),e.isIdle=!1}),e.idleInterval=t.setInterval(function(){e.idleSecondsCounter++,e.idleSecondsCounter>=e.group[e.currIndex].opts.idleTime&&!e.isDragging&&(e.isIdle=!0,e.idleSecondsCounter=0,e.hideControls())},1e3))},removeEvents:function(){var e=this;s.off("orientationchange.fb resize.fb"),r.off("keydown.fb .fb-idle"),this.$refs.container.off(".fb-close .fb-prev .fb-next"),e.idleInterval&&(t.clearInterval(e.idleInterval),e.idleInterval=null)},previous:function(t){return this.jumpTo(this.currPos-1,t)},next:function(t){return this.jumpTo(this.currPos+1,t)},jumpTo:function(t,e){var i,a,s,r,c,l,d,u=this,f=u.group.length;if(!(u.isDragging||u.isClosing||u.isAnimating&&u.firstRun)){if(t=parseInt(t,10),s=u.current?u.current.opts.loop:u.opts.loop,!s&&(t<0||t>=f))return!1;if(i=u.firstRun=!Object.keys(u.slides).length,!(f<2&&!i&&u.isDragging)){if(c=u.current,u.prevIndex=u.currIndex,u.prevPos=u.currPos,r=u.createSlide(t),f>1&&((s||r.index<f-1)&&u.createSlide(t+1),(s||r.index>0)&&u.createSlide(t-1)),u.current=r,u.currIndex=r.index,u.currPos=r.pos,u.trigger("beforeShow",i),u.updateControls(),a=u.isMoved(r),r.forcedDuration=o,n.isNumeric(e)?r.forcedDuration=e:e=r.opts[i?"animationDuration":"transitionDuration"],e=parseInt(e,10),i)return r.opts.animationEffect&&e&&u.$refs.container.css("transition-duration",e+"ms"),u.$refs.container.addClass("fancybox-is-open"),r.$slide.addClass("fancybox-slide--previous"),u.loadSlide(r),r.$slide.removeClass("fancybox-slide--previous").addClass("fancybox-slide--current"),u.preload("image"),void u.$refs.container.trigger("focus");n.each(u.slides,function(t,e){n.fancybox.stop(e.$slide,!0),e.$slide.removeClass("fancybox-animated").removeClass(function(t,e){return(e.match(/(^|\s)fancybox-fx-\S+/g)||[]).join(" ")})}),r.$slide.removeClass("fancybox-slide--next fancybox-slide--previous").addClass("fancybox-slide--current"),a?(l=Math.round(r.$slide.width()),n.each(u.slides,function(t,o){var i=o.pos-r.pos;n.fancybox.animate(o.$slide,{top:0,left:i*l+i*o.opts.gutter},e,function(){o.$slide.removeAttr("style").removeClass("fancybox-slide--next fancybox-slide--previous"),o.pos===u.currPos&&u.complete()})})):u.$refs.stage.children().removeAttr("style"),r.isLoaded?u.revealContent(r):u.loadSlide(r),u.preload("image"),c.pos!==r.pos&&(d="fancybox-slide--"+(c.pos>r.pos?"next":"previous"),c.$slide.removeClass("fancybox-slide--complete fancybox-slide--current fancybox-slide--next fancybox-slide--previous"),c.isComplete=!1,e&&(a||r.opts.transitionEffect)&&(a?c.$slide.addClass(d):(d="fancybox-animated "+d+" fancybox-fx-"+r.opts.transitionEffect,n.fancybox.animate(c.$slide,d,e,null,!1))))}}},createSlide:function(t){var e,o,i=this;return o=t%i.group.length,o=o<0?i.group.length+o:o,!i.slides[t]&&i.group[o]&&(e=n('<div class="fancybox-slide"></div>').appendTo(i.$refs.stage),i.slides[t]=n.extend(!0,{},i.group[o],{pos:t,$slide:e,isLoaded:!1}),i.updateSlide(i.slides[t])),i.slides[t]},scaleToActual:function(t,e,i){var a,s,r,c,l,d=this,u=d.current,f=u.$content,p=n.fancybox.getTranslate(u.$slide).width,h=n.fancybox.getTranslate(u.$slide).height,g=u.width,b=u.height;!d.isAnimating&&f&&"image"==u.type&&u.isLoaded&&!u.hasError&&(n.fancybox.stop(f),d.isAnimating=!0,t=t===o?.5*p:t,e=e===o?.5*h:e,a=n.fancybox.getTranslate(f),a.top-=n.fancybox.getTranslate(u.$slide).top,a.left-=n.fancybox.getTranslate(u.$slide).left,c=g/a.width,l=b/a.height,s=.5*p-.5*g,r=.5*h-.5*b,g>p&&(s=a.left*c-(t*c-t),s>0&&(s=0),s<p-g&&(s=p-g)),b>h&&(r=a.top*l-(e*l-e),r>0&&(r=0),r<h-b&&(r=h-b)),d.updateCursor(g,b),n.fancybox.animate(f,{top:r,left:s,scaleX:c,scaleY:l},i||330,function(){d.isAnimating=!1}),d.SlideShow&&d.SlideShow.isActive&&d.SlideShow.stop())},scaleToFit:function(t){var e,o=this,i=o.current,a=i.$content;!o.isAnimating&&a&&"image"==i.type&&i.isLoaded&&!i.hasError&&(n.fancybox.stop(a),o.isAnimating=!0,e=o.getFitPos(i),o.updateCursor(e.width,e.height),n.fancybox.animate(a,{top:e.top,left:e.left,scaleX:e.width/a.width(),scaleY:e.height/a.height()},t||330,function(){o.isAnimating=!1}))},getFitPos:function(t){var e,o,i,a,s=this,r=t.$content,c=t.$slide,l=t.width||t.opts.width,d=t.height||t.opts.height,u={};return!!(t.isLoaded&&r&&r.length)&&(e=n.fancybox.getTranslate(s.$refs.stage).width,o=n.fancybox.getTranslate(s.$refs.stage).height,e-=parseFloat(c.css("paddingLeft"))+parseFloat(c.css("paddingRight"))+parseFloat(r.css("marginLeft"))+parseFloat(r.css("marginRight")),o-=parseFloat(c.css("paddingTop"))+parseFloat(c.css("paddingBottom"))+parseFloat(r.css("marginTop"))+parseFloat(r.css("marginBottom")),l&&d||(l=e,d=o),i=Math.min(1,e/l,o/d),l=Math.floor(i*l),d=Math.floor(i*d),"image"===t.type?(u.top=Math.floor(.5*(o-d))+parseFloat(c.css("paddingTop")),u.left=Math.floor(.5*(e-l))+parseFloat(c.css("paddingLeft"))):"video"===t.contentType&&(a=t.opts.width&&t.opts.height?l/d:t.opts.ratio||16/9,d>l/a?d=l/a:l>d*a&&(l=d*a)),u.width=l,u.height=d,u)},update:function(){var t=this;n.each(t.slides,function(e,n){t.updateSlide(n)})},updateSlide:function(t){var e=this,o=t&&t.$content,i=t.width||t.opts.width,a=t.height||t.opts.height,s=t.$slide;o&&(i||a||"video"===t.contentType)&&!t.hasError&&(n.fancybox.stop(o),n.fancybox.setTranslate(o,e.getFitPos(t)),t.pos===e.currPos&&(e.isAnimating=!1,e.updateCursor())),s.length&&(s.trigger("refresh"),e.$refs.toolbar.toggleClass("compensate-for-scrollbar",s.get(0).scrollHeight>s.get(0).clientHeight)),e.trigger("onUpdate",t)},centerSlide:function(t,e){var i,a,s=this;s.current&&(i=Math.round(t.$slide.width()),a=t.pos-s.current.pos,n.fancybox.animate(t.$slide,{top:0,left:a*i+a*t.opts.gutter,opacity:1},e===o?0:e,null,!1))},isMoved:function(t){var e=t||this.current,o=n.fancybox.getTranslate(e.$slide);return(0!==o.left||0!==o.top)&&!e.$slide.hasClass("fancybox-animated")},updateCursor:function(t,e){var o,i=this,a=i.current,s=i.$refs.container.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-zoomOut fancybox-can-swipe fancybox-can-pan");a&&!i.isClosing&&(o=i.isZoomable(),s.toggleClass("fancybox-is-zoomable",o),n("[data-fancybox-zoom]").prop("disabled",!o),i.canPan(t,e)?s.addClass("fancybox-can-pan"):o&&("zoom"===a.opts.clickContent||n.isFunction(a.opts.clickContent)&&"zoom"==a.opts.clickContent(a))?s.addClass("fancybox-can-zoomIn"):a.opts.touch&&(a.opts.touch.vertical||i.group.length>1)&&"video"!==a.contentType&&s.addClass("fancybox-can-swipe"))},isZoomable:function(){var t,e=this,n=e.current;if(n&&!e.isClosing&&"image"===n.type&&!n.hasError){if(!n.isLoaded)return!0;if(t=e.getFitPos(n),n.width>t.width||n.height>t.height)return!0}return!1},isScaledDown:function(t,e){var i=this,a=!1,s=i.current,r=s.$content;return t!==o&&e!==o?a=t<s.width&&e<s.height:r&&(a=n.fancybox.getTranslate(r),a=a.width<s.width&&a.height<s.height),a},canPan:function(t,e){var i,a,s=this,r=!1,c=s.current;return"image"===c.type&&(i=c.$content)&&!c.hasError&&(r=s.getFitPos(c),a=t!==o&&e!==o?{width:t,height:e}:n.fancybox.getTranslate(i),r=Math.abs(a.width-r.width)>1.5||Math.abs(a.height-r.height)>1.5),r},loadSlide:function(t){var e,o,i,a=this;if(!t.isLoading&&!t.isLoaded){switch(t.isLoading=!0,a.trigger("beforeLoad",t),e=t.type,o=t.$slide,o.off("refresh").trigger("onReset").addClass(t.opts.slideClass),e){case"image":a.setImage(t);break;case"iframe":a.setIframe(t);break;case"html":a.setContent(t,t.src||t.content);break;case"video":a.setContent(t,t.opts.video.tpl.replace("{{src}}",t.src).replace("{{format}}",t.opts.videoFormat||t.opts.video.format));break;case"inline":n(t.src).length?a.setContent(t,n(t.src)):a.setError(t);break;case"ajax":a.showLoading(t),i=n.ajax(n.extend({},t.opts.ajax.settings,{url:t.src,success:function(e,n){"success"===n&&a.setContent(t,e)},error:function(e,n){e&&"abort"!==n&&a.setError(t)}})),o.one("onReset",function(){i.abort()});break;default:a.setError(t)}return!0}},setImage:function(e){var o,i,a,s,r,c=this,l=e.opts.srcset||e.opts.image.srcset;if(e.timouts=setTimeout(function(){var t=e.$image;!e.isLoading||t&&t.length&&t[0].complete||e.hasError||c.showLoading(e)},350),l){s=t.devicePixelRatio||1,r=t.innerWidth*s,a=l.split(",").map(function(t){var e={};return t.trim().split(/\s+/).forEach(function(t,n){var o=parseInt(t.substring(0,t.length-1),10);return 0===n?e.url=t:void(o&&(e.value=o,e.postfix=t[t.length-1]))}),e}),a.sort(function(t,e){return t.value-e.value});for(var d=0;d<a.length;d++){var u=a[d];if("w"===u.postfix&&u.value>=r||"x"===u.postfix&&u.value>=s){i=u;break}}!i&&a.length&&(i=a[a.length-1]),i&&(e.src=i.url,e.width&&e.height&&"w"==i.postfix&&(e.height=e.width/e.height*i.value,e.width=i.value),e.opts.srcset=l)}e.$content=n('<div class="fancybox-content"></div>').addClass("fancybox-is-hidden").appendTo(e.$slide.addClass("fancybox-slide--image")),o=e.opts.thumb||!(!e.opts.$thumb||!e.opts.$thumb.length)&&e.opts.$thumb.attr("src"),e.opts.preload!==!1&&e.opts.width&&e.opts.height&&o&&(e.width=e.opts.width,e.height=e.opts.height,e.$ghost=n("<img />").one("error",function(){n(this).remove(),e.$ghost=null}).one("load",function(){c.afterLoad(e)}).addClass("fancybox-image").appendTo(e.$content).attr("src",o)),c.setBigImage(e)},setBigImage:function(t){var e=this,o=n("<img />");t.$image=o.one("error",function(){e.setError(t)}).one("load",function(){var n;t.$ghost||(e.resolveImageSlideSize(t,this.naturalWidth,this.naturalHeight),e.afterLoad(t)),t.timouts&&(clearTimeout(t.timouts),t.timouts=null),e.isClosing||(t.opts.srcset&&(n=t.opts.sizes,n&&"auto"!==n||(n=(t.width/t.height>1&&s.width()/s.height()>1?"100":Math.round(t.width/t.height*100))+"vw"),o.attr("sizes",n).attr("srcset",t.opts.srcset)),t.$ghost&&setTimeout(function(){t.$ghost&&!e.isClosing&&t.$ghost.hide()},Math.min(300,Math.max(1e3,t.height/1600))),e.hideLoading(t))}).addClass("fancybox-image").attr("src",t.src).appendTo(t.$content),(o[0].complete||"complete"==o[0].readyState)&&o[0].naturalWidth&&o[0].naturalHeight?o.trigger("load"):o[0].error&&o.trigger("error")},resolveImageSlideSize:function(t,e,n){var o=parseInt(t.opts.width,10),i=parseInt(t.opts.height,10);t.width=e,t.height=n,o>0&&(t.width=o,t.height=Math.floor(o*n/e)),i>0&&(t.width=Math.floor(i*e/n),t.height=i)},setIframe:function(t){var e,i=this,a=t.opts.iframe,s=t.$slide;t.$content=n('<div class="fancybox-content'+(a.preload?" fancybox-is-hidden":"")+'"></div>').css(a.css).appendTo(s),s.addClass("fancybox-slide--"+t.contentType),t.$iframe=e=n(a.tpl.replace(/\{rnd\}/g,(new Date).getTime())).attr(a.attr).appendTo(t.$content),a.preload?(i.showLoading(t),e.on("load.fb error.fb",function(e){this.isReady=1,t.$slide.trigger("refresh"),i.afterLoad(t)}),s.on("refresh.fb",function(){var n,i,r=t.$content,c=a.css.width,l=a.css.height;if(1===e[0].isReady){try{n=e.contents(),i=n.find("body")}catch(t){}i&&i.length&&i.children().length&&(s.css("overflow","visible"),r.css({width:"100%",height:""}),c===o&&(c=Math.ceil(Math.max(i[0].clientWidth,i.outerWidth(!0)))),c&&r.width(c),l===o&&(l=Math.ceil(Math.max(i[0].clientHeight,i.outerHeight(!0)))),l&&r.height(l),s.css("overflow","auto")),r.removeClass("fancybox-is-hidden")}})):this.afterLoad(t),e.attr("src",t.src),s.one("onReset",function(){try{n(this).find("iframe").hide().unbind().attr("src","//about:blank")}catch(t){}n(this).off("refresh.fb").empty(),t.isLoaded=!1})},setContent:function(t,e){var o=this;o.isClosing||(o.hideLoading(t),t.$content&&n.fancybox.stop(t.$content),t.$slide.empty(),l(e)&&e.parent().length?(e.hasClass("fancybox-content")&&e.parent(".fancybox-slide--html").trigger("onReset"),t.$placeholder=n("<div>").hide().insertAfter(e),e.css("display","inline-block")):t.hasError||("string"===n.type(e)&&(e=n("<div>").append(n.trim(e)).contents()),t.opts.filter&&(e=n("<div>").html(e).find(t.opts.filter))),t.$slide.one("onReset",function(){n(this).find("video,audio").trigger("pause"),t.$placeholder&&(t.$placeholder.after(e.removeClass("fancybox-content").hide()).remove(),t.$placeholder=null),t.$smallBtn&&(t.$smallBtn.remove(),t.$smallBtn=null),t.hasError||(n(this).empty(),t.isLoaded=!1,t.isRevealed=!1)}),n(e).appendTo(t.$slide),n(e).is("video,audio")&&(n(e).addClass("fancybox-video"),n(e).wrap("<div></div>"),t.contentType="video",t.opts.width=t.opts.width||n(e).attr("width"),t.opts.height=t.opts.height||n(e).attr("height")),t.$content=t.$slide.children().filter("div,form,main,video,audio,article,.fancybox-content").first(),t.$content.siblings().hide(),t.$content.length||(t.$content=t.$slide.wrapInner("<div></div>").children().first()),t.$content.addClass("fancybox-content"),t.$slide.addClass("fancybox-slide--"+t.contentType),this.afterLoad(t))},setError:function(t){t.hasError=!0,t.$slide.trigger("onReset").removeClass("fancybox-slide--"+t.contentType).addClass("fancybox-slide--error"),t.contentType="html",this.setContent(t,this.translate(t,t.opts.errorTpl)),t.pos===this.currPos&&(this.isAnimating=!1)},showLoading:function(t){var e=this;t=t||e.current,t&&!t.$spinner&&(t.$spinner=n(e.translate(e,e.opts.spinnerTpl)).appendTo(t.$slide))},hideLoading:function(t){var e=this;t=t||e.current,t&&t.$spinner&&(t.$spinner.remove(),delete t.$spinner)},afterLoad:function(t){var e=this;e.isClosing||(t.isLoading=!1,t.isLoaded=!0,e.trigger("afterLoad",t),e.hideLoading(t),t.pos===e.currPos&&e.updateCursor(),!t.opts.smallBtn||t.$smallBtn&&t.$smallBtn.length||(t.$smallBtn=n(e.translate(t,t.opts.btnTpl.smallBtn)).appendTo(t.$content)),t.opts.protect&&t.$content&&!t.hasError&&(t.$content.on("contextmenu.fb",function(t){return 2==t.button&&t.preventDefault(),!0}),"image"===t.type&&n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)),e.revealContent(t))},revealContent:function(t){var e,i,a,s,r=this,c=t.$slide,l=!1,d=!1,u=r.isMoved(t),p=t.isRevealed;if(!u||!p){if(t.isRevealed=!0,e=t.opts[r.firstRun?"animationEffect":"transitionEffect"],a=t.opts[r.firstRun?"animationDuration":"transitionDuration"],a=parseInt(t.forcedDuration===o?a:t.forcedDuration,10),t.pos===r.currPos&&(t.isComplete?e=!1:r.isAnimating=!0),!u&&t.pos===r.currPos&&a||(e=!1),"zoom"===e&&(t.pos===r.currPos&&a&&"image"===t.type&&!t.hasError&&(d=r.getThumbPos(t))?l=r.getFitPos(t):e="fade"),"zoom"===e)return l.scaleX=l.width/d.width,l.scaleY=l.height/d.height,s=t.opts.zoomOpacity,"auto"==s&&(s=Math.abs(t.width/t.height-d.width/d.height)>.1),s&&(d.opacity=.1,l.opacity=1),n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"),d),f(t.$content),void n.fancybox.animate(t.$content,l,a,function(){r.isAnimating=!1,r.complete()});if(r.updateSlide(t),!e)return f(c),p||t.$content.removeClass("fancybox-is-hidden").hide().fadeIn("fast"),void(t.pos===r.currPos&&r.complete());n.fancybox.stop(c),i="fancybox-animated fancybox-slide--"+(t.pos>=r.prevPos?"next":"previous")+" fancybox-fx-"+e,c.removeAttr("style").removeClass("fancybox-slide--current fancybox-slide--next fancybox-slide--previous").addClass(i),t.$content.removeClass("fancybox-is-hidden"),f(c),n.fancybox.animate(c,"fancybox-slide--current",a,function(){c.removeClass(i).removeAttr("style"),t.pos===r.currPos&&r.complete()},!0)}},getThumbPos:function(o){var i,a=this,s=!1,r=o.opts.$thumb,c=r&&r.length&&r[0].ownerDocument===e?r.offset():0,l=function(e){for(var o,i=e[0],a=i.getBoundingClientRect(),s=[];null!==i.parentElement;)"hidden"!==n(i.parentElement).css("overflow")&&"auto"!==n(i.parentElement).css("overflow")||s.push(i.parentElement.getBoundingClientRect()),i=i.parentElement;return o=s.every(function(t){var e=Math.min(a.right,t.right)-Math.max(a.left,t.left),n=Math.min(a.bottom,t.bottom)-Math.max(a.top,t.top);return e>0&&n>0}),o&&a.bottom>0&&a.right>0&&a.left<n(t).width()&&a.top<n(t).height()};return c&&l(r)&&(i=a.$refs.stage.offset(),s={top:c.top-i.top+parseFloat(r.css("border-top-width")||0),left:c.left-i.left+parseFloat(r.css("border-left-width")||0),width:r.width(),height:r.height(),scaleX:1,scaleY:1}),s},complete:function(){var t,e=this,o=e.current,i={};!e.isMoved()&&o.isLoaded&&(o.isComplete||(o.isComplete=!0,o.$slide.siblings().trigger("onReset"),e.preload("inline"),f(o.$slide),o.$slide.addClass("fancybox-slide--complete"),n.each(e.slides,function(t,o){o.pos>=e.currPos-1&&o.pos<=e.currPos+1?i[o.pos]=o:o&&(n.fancybox.stop(o.$slide),o.$slide.off().remove())}),e.slides=i),e.isAnimating=!1,e.updateCursor(),e.trigger("afterShow"),o.opts.video.autoStart&&o.$slide.find("video,audio").filter(":visible:first").trigger("play"),o.opts.autoFocus&&"html"===o.contentType&&(t=o.$content.find("input[autofocus]:enabled:visible:first"),t.length?t.trigger("focus"):e.focus(null,!0)),o.$slide.scrollTop(0).scrollLeft(0))},preload:function(t){var e=this,n=e.slides[e.currPos+1],o=e.slides[e.currPos-1];o&&o.type===t&&e.loadSlide(o),n&&n.type===t&&e.loadSlide(n)},focus:function(t,o){var i,a,s=this,r=["a[href]","area[href]",'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',"select:not([disabled]):not([aria-hidden])","textarea:not([disabled]):not([aria-hidden])","button:not([disabled]):not([aria-hidden])","iframe","object","embed","[contenteditable]",'[tabindex]:not([tabindex^="-"])'].join(",");s.isClosing||(i=!t&&s.current&&s.current.isComplete?s.current.$slide.find("*:visible"+(o?":not(.fancybox-close-small)":"")):s.$refs.container.find("*:visible"),i=i.filter(r).filter(function(){return"hidden"!==n(this).css("visibility")&&!n(this).hasClass("disabled")}),i.length?(a=i.index(e.activeElement),t&&t.shiftKey?(a<0||0==a)&&(t.preventDefault(),i.eq(i.length-1).trigger("focus")):(a<0||a==i.length-1)&&(t&&t.preventDefault(),i.eq(0).trigger("focus"))):s.$refs.container.trigger("focus"))},activate:function(){var t=this;n(".fancybox-container").each(function(){var e=n(this).data("FancyBox");e&&e.id!==t.id&&!e.isClosing&&(e.trigger("onDeactivate"),e.removeEvents(),e.isVisible=!1)}),t.isVisible=!0,(t.current||t.isIdle)&&(t.update(),t.updateControls()),t.trigger("onActivate"),t.addEvents()},close:function(t,e){var o,i,a,s,r,c,l,p=this,h=p.current,g=function(){p.cleanUp(t)};return!p.isClosing&&(p.isClosing=!0,p.trigger("beforeClose",t)===!1?(p.isClosing=!1,d(function(){p.update()}),!1):(p.removeEvents(),h.timouts&&clearTimeout(h.timouts),a=h.$content,o=h.opts.animationEffect,i=n.isNumeric(e)?e:o?h.opts.animationDuration:0,h.$slide.off(u).removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"),h.$slide.siblings().trigger("onReset").remove(),i&&p.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing"),p.hideLoading(h),p.hideControls(),p.updateCursor(),"zoom"!==o||t!==!0&&a&&i&&"image"===h.type&&!h.hasError&&(l=p.getThumbPos(h))||(o="fade"),"zoom"===o?(n.fancybox.stop(a),s=n.fancybox.getTranslate(a),c={top:s.top,left:s.left,scaleX:s.width/l.width,scaleY:s.height/l.height,width:l.width,height:l.height},r=h.opts.zoomOpacity,"auto"==r&&(r=Math.abs(h.width/h.height-l.width/l.height)>.1),r&&(l.opacity=0),n.fancybox.setTranslate(a,c),f(a),n.fancybox.animate(a,l,i,g),!0):(o&&i?t===!0?setTimeout(g,i):n.fancybox.animate(h.$slide.removeClass("fancybox-slide--current"),"fancybox-animated fancybox-slide--previous fancybox-fx-"+o,i,g):g(),!0)))},cleanUp:function(e){var o,i,a,s=this,r=s.current.opts.$orig;s.current.$slide.trigger("onReset"),s.$refs.container.empty().remove(),s.trigger("afterClose",e),s.current.opts.backFocus&&(r&&r.length&&r.is(":visible")||(r=s.$trigger),r&&r.length&&(i=t.scrollX,a=t.scrollY,r.trigger("focus"),n("html, body").scrollTop(a).scrollLeft(i))),s.current=null,o=n.fancybox.getInstance(),o?o.activate():(n("body").removeClass("fancybox-active compensate-for-scrollbar"),n("#fancybox-style-noscroll").remove())},trigger:function(t,e){var o,i=Array.prototype.slice.call(arguments,1),a=this,s=e&&e.opts?e:a.current;return s?i.unshift(s):s=a,i.unshift(a),n.isFunction(s.opts[t])&&(o=s.opts[t].apply(s,i)),o===!1?o:void("afterClose"!==t&&a.$refs?a.$refs.container.trigger(t+".fb",i):r.trigger(t+".fb",i))},updateControls:function(){var t=this,o=t.current,i=o.index,a=o.opts.caption,s=t.$refs.container,r=t.$refs.caption;o.$slide.trigger("refresh"),t.$caption=a&&a.length?r.html(a):null,t.isHiddenControls||t.isIdle||t.showControls(),s.find("[data-fancybox-count]").html(t.group.length),s.find("[data-fancybox-index]").html(i+1),s.find("[data-fancybox-prev]").prop("disabled",!o.opts.loop&&i<=0),s.find("[data-fancybox-next]").prop("disabled",!o.opts.loop&&i>=t.group.length-1),"image"===o.type?s.find("[data-fancybox-zoom]").show().end().find("[data-fancybox-download]").attr("href",o.opts.image.src||o.src).show():o.opts.toolbar&&s.find("[data-fancybox-download],[data-fancybox-zoom]").hide(),n(e.activeElement).is(":hidden,[disabled]")&&t.$refs.container.trigger("focus")},hideControls:function(){this.isHiddenControls=!0,this.$refs.container.removeClass("fancybox-show-infobar fancybox-show-toolbar fancybox-show-caption fancybox-show-nav")},showControls:function(){var t=this,e=t.current?t.current.opts:t.opts,n=t.$refs.container;t.isHiddenControls=!1,
t.idleSecondsCounter=0,n.toggleClass("fancybox-show-toolbar",!(!e.toolbar||!e.buttons)).toggleClass("fancybox-show-infobar",!!(e.infobar&&t.group.length>1)).toggleClass("fancybox-show-caption",!!t.$caption).toggleClass("fancybox-show-nav",!!(e.arrows&&t.group.length>1)).toggleClass("fancybox-is-modal",!!e.modal)},toggleControls:function(){this.isHiddenControls?this.showControls():this.hideControls()}}),n.fancybox={version:"3.4.1",defaults:a,getInstance:function(t){var e=n('.fancybox-container:not(".fancybox-is-closing"):last').data("FancyBox"),o=Array.prototype.slice.call(arguments,1);return e instanceof h&&("string"===n.type(t)?e[t].apply(e,o):"function"===n.type(t)&&t.apply(e,o),e)},open:function(t,e,n){return new h(t,e,n)},close:function(t){var e=this.getInstance();e&&(e.close(),t===!0&&this.close(t))},destroy:function(){this.close(!0),r.add("body").off("click.fb-start","**")},isMobile:/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),use3d:function(){var n=e.createElement("div");return t.getComputedStyle&&t.getComputedStyle(n)&&t.getComputedStyle(n).getPropertyValue("transform")&&!(e.documentMode&&e.documentMode<11)}(),getTranslate:function(t){var e;return!(!t||!t.length)&&(e=t[0].getBoundingClientRect(),{top:e.top||0,left:e.left||0,width:e.width,height:e.height,opacity:parseFloat(t.css("opacity"))})},setTranslate:function(t,e){var n="",i={};if(t&&e)return e.left===o&&e.top===o||(n=(e.left===o?t.position().left:e.left)+"px, "+(e.top===o?t.position().top:e.top)+"px",n=this.use3d?"translate3d("+n+", 0px)":"translate("+n+")"),e.scaleX!==o&&e.scaleY!==o&&(n=(n.length?n+" ":"")+"scale("+e.scaleX+", "+e.scaleY+")"),n.length&&(i.transform=n),e.opacity!==o&&(i.opacity=e.opacity),e.width!==o&&(i.width=e.width),e.height!==o&&(i.height=e.height),t.css(i)},animate:function(t,e,i,a,s){var r,c=!1;n.isFunction(i)&&(a=i,i=null),n.isPlainObject(e)||t.removeAttr("style"),n.fancybox.stop(t),t.on(u,function(o){(!o||!o.originalEvent||t.is(o.originalEvent.target)&&"z-index"!=o.originalEvent.propertyName)&&(n.fancybox.stop(t),c&&n.fancybox.setTranslate(t,c),n.isNumeric(i)&&t.css("transition-duration",""),n.isPlainObject(e)?s===!1&&t.removeAttr("style"):s!==!0&&t.removeClass(e),n.isFunction(a)&&a(o))}),n.isNumeric(i)&&t.css("transition-duration",i+"ms"),n.isPlainObject(e)?(e.scaleX!==o&&e.scaleY!==o&&(r=n.fancybox.getTranslate(t),c=n.extend({},e,{width:r.width*e.scaleX,height:r.height*e.scaleY,scaleX:1,scaleY:1}),delete e.width,delete e.height,t.parent().hasClass("fancybox-slide--image")&&t.parent().addClass("fancybox-is-scaling")),n.fancybox.setTranslate(t,e)):t.addClass(e),t.data("timer",setTimeout(function(){t.trigger("transitionend")},i+16))},stop:function(t,e){t&&t.length&&(clearTimeout(t.data("timer")),e&&t.trigger(u),t.off(u).css("transition-duration",""),t.parent().removeClass("fancybox-is-scaling"))}},n.fn.fancybox=function(t){var e;return t=t||{},e=t.selector||!1,e?n("body").off("click.fb-start",e).on("click.fb-start",e,{options:t},i):this.off("click.fb-start").on("click.fb-start",{items:this,options:t},i),this},r.on("click.fb-start","[data-fancybox]",i),r.on("click.fb-start","[data-fancybox-trigger]",function(t){n('[data-fancybox="'+n(this).attr("data-fancybox-trigger")+'"]').eq(n(this).attr("data-fancybox-index")||0).trigger("click.fb-start",{$trigger:n(this)})}),function(){var t=".fancybox-button",e="fancybox-focus",o=null;r.on("mousedown mouseup focus blur",t,function(i){switch(i.type){case"mousedown":o=n(this);break;case"mouseup":o=null;break;case"focusin":n(t).removeClass(e),n(this).is(o)||n(this).is("[disabled]")||n(this).addClass(e);break;case"focusout":n(t).removeClass(e)}})}()}}(window,document,jQuery),function(t){"use strict";var e=function(e,n,o){if(e)return o=o||"","object"===t.type(o)&&(o=t.param(o,!0)),t.each(n,function(t,n){e=e.replace("$"+t,n||"")}),o.length&&(e+=(e.indexOf("?")>0?"&":"?")+o),e},n={youtube:{matcher:/(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i,params:{autoplay:1,autohide:1,fs:1,rel:0,hd:1,wmode:"transparent",enablejsapi:1,html5:1},paramPlace:8,type:"iframe",url:"//www.youtube-nocookie.com/embed/$4",thumb:"//img.youtube.com/vi/$4/hqdefault.jpg"},vimeo:{matcher:/^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/,params:{autoplay:1,hd:1,show_title:1,show_byline:1,show_portrait:0,fullscreen:1,api:1},paramPlace:3,type:"iframe",url:"//player.vimeo.com/video/$2"},instagram:{matcher:/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,type:"image",url:"//$1/p/$2/media/?size=l"},gmap_place:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/?ll="+(t[9]?t[9]+"&z="+Math.floor(t[10])+(t[12]?t[12].replace(/^\//,"&"):""):t[12]+"").replace(/\?/,"&")+"&output="+(t[12]&&t[12].indexOf("layer=c")>0?"svembed":"embed")}},gmap_search:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/maps?q="+t[5].replace("query=","q=").replace("api=1","")+"&output=embed"}}};t(document).on("objectNeedsType.fb",function(o,i,a){var s,r,c,l,d,u,f,p=a.src||"",h=!1;s=t.extend(!0,{},n,a.opts.media),t.each(s,function(n,o){if(c=p.match(o.matcher)){if(h=o.type,f=n,u={},o.paramPlace&&c[o.paramPlace]){d=c[o.paramPlace],"?"==d[0]&&(d=d.substring(1)),d=d.split("&");for(var i=0;i<d.length;++i){var s=d[i].split("=",2);2==s.length&&(u[s[0]]=decodeURIComponent(s[1].replace(/\+/g," ")))}}return l=t.extend(!0,{},o.params,a.opts[n],u),p="function"===t.type(o.url)?o.url.call(this,c,l,a):e(o.url,c,l),r="function"===t.type(o.thumb)?o.thumb.call(this,c,l,a):e(o.thumb,c),"youtube"===n?p=p.replace(/&t=((\d+)m)?(\d+)s/,function(t,e,n,o){return"&start="+((n?60*parseInt(n,10):0)+parseInt(o,10))}):"vimeo"===n&&(p=p.replace("&%23","#")),!1}}),h?(a.opts.thumb||a.opts.$thumb&&a.opts.$thumb.length||(a.opts.thumb=r),"iframe"===h&&(a.opts=t.extend(!0,a.opts,{iframe:{preload:!1,attr:{scrolling:"no"}}})),t.extend(a,{type:h,src:p,origSrc:a.src,contentSource:f,contentType:"image"===h?"image":"gmap_place"==f||"gmap_search"==f?"map":"video"})):p&&(a.type=a.opts.defaultType)})}(jQuery),function(t,e,n){"use strict";var o=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),i=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),a=function(e){var n=[];e=e.originalEvent||e||t.e,e=e.touches&&e.touches.length?e.touches:e.changedTouches&&e.changedTouches.length?e.changedTouches:[e];for(var o in e)e[o].pageX?n.push({x:e[o].pageX,y:e[o].pageY}):e[o].clientX&&n.push({x:e[o].clientX,y:e[o].clientY});return n},s=function(t,e,n){return e&&t?"x"===n?t.x-e.x:"y"===n?t.y-e.y:Math.sqrt(Math.pow(t.x-e.x,2)+Math.pow(t.y-e.y,2)):0},r=function(t){if(t.is('a,area,button,[role="button"],input,label,select,summary,textarea,video,audio')||n.isFunction(t.get(0).onclick)||t.data("selectable"))return!0;for(var e=0,o=t[0].attributes,i=o.length;e<i;e++)if("data-fancybox-"===o[e].nodeName.substr(0,14))return!0;return!1},c=function(e){var n=t.getComputedStyle(e)["overflow-y"],o=t.getComputedStyle(e)["overflow-x"],i=("scroll"===n||"auto"===n)&&e.scrollHeight>e.clientHeight,a=("scroll"===o||"auto"===o)&&e.scrollWidth>e.clientWidth;return i||a},l=function(t){for(var e=!1;;){if(e=c(t.get(0)))break;if(t=t.parent(),!t.length||t.hasClass("fancybox-stage")||t.is("body"))break}return e},d=function(t){var e=this;e.instance=t,e.$bg=t.$refs.bg,e.$stage=t.$refs.stage,e.$container=t.$refs.container,e.destroy(),e.$container.on("touchstart.fb.touch mousedown.fb.touch",n.proxy(e,"ontouchstart"))};d.prototype.destroy=function(){this.$container.off(".fb.touch")},d.prototype.ontouchstart=function(o){var i=this,c=n(o.target),d=i.instance,u=d.current,f=u.$slide,p=u.$content,h="touchstart"==o.type;if(h&&i.$container.off("mousedown.fb.touch"),(!o.originalEvent||2!=o.originalEvent.button)&&f.length&&c.length&&!r(c)&&!r(c.parent())&&(c.is("img")||!(o.originalEvent.clientX>c[0].clientWidth+c.offset().left))){if(!u||d.isAnimating||d.isClosing)return o.stopPropagation(),void o.preventDefault();if(i.realPoints=i.startPoints=a(o),i.startPoints.length){if(u.touch&&o.stopPropagation(),i.startEvent=o,i.canTap=!0,i.$target=c,i.$content=p,i.opts=u.opts.touch,i.isPanning=!1,i.isSwiping=!1,i.isZooming=!1,i.isScrolling=!1,i.canPan=d.canPan(),i.startTime=(new Date).getTime(),i.distanceX=i.distanceY=i.distance=0,i.canvasWidth=Math.round(f[0].clientWidth),i.canvasHeight=Math.round(f[0].clientHeight),i.contentLastPos=null,i.contentStartPos=n.fancybox.getTranslate(i.$content)||{top:0,left:0},i.sliderStartPos=i.sliderLastPos||n.fancybox.getTranslate(f),i.stagePos=n.fancybox.getTranslate(d.$refs.stage),i.sliderStartPos.top-=i.stagePos.top,i.sliderStartPos.left-=i.stagePos.left,i.contentStartPos.top-=i.stagePos.top,i.contentStartPos.left-=i.stagePos.left,n(e).off(".fb.touch").on(h?"touchend.fb.touch touchcancel.fb.touch":"mouseup.fb.touch mouseleave.fb.touch",n.proxy(i,"ontouchend")).on(h?"touchmove.fb.touch":"mousemove.fb.touch",n.proxy(i,"ontouchmove")),n.fancybox.isMobile&&e.addEventListener("scroll",i.onscroll,!0),!i.opts&&!i.canPan||!c.is(i.$stage)&&!i.$stage.find(c).length)return void(c.is(".fancybox-image")&&o.preventDefault());i.isScrollable=l(c)||l(c.parent()),n.fancybox.isMobile&&i.isScrollable||o.preventDefault(),(1===i.startPoints.length||u.hasError)&&(i.canPan?(n.fancybox.stop(i.$content),i.$content.css("transition-duration",""),i.isPanning=!0):i.isSwiping=!0,i.$container.addClass("fancybox-is-grabbing")),2===i.startPoints.length&&"image"===u.type&&(u.isLoaded||u.$ghost)&&(i.canTap=!1,i.isSwiping=!1,i.isPanning=!1,i.isZooming=!0,n.fancybox.stop(i.$content),i.$content.css("transition-duration",""),i.centerPointStartX=.5*(i.startPoints[0].x+i.startPoints[1].x)-n(t).scrollLeft(),i.centerPointStartY=.5*(i.startPoints[0].y+i.startPoints[1].y)-n(t).scrollTop(),i.percentageOfImageAtPinchPointX=(i.centerPointStartX-i.contentStartPos.left)/i.contentStartPos.width,i.percentageOfImageAtPinchPointY=(i.centerPointStartY-i.contentStartPos.top)/i.contentStartPos.height,i.startDistanceBetweenFingers=s(i.startPoints[0],i.startPoints[1]))}}},d.prototype.onscroll=function(t){var n=this;n.isScrolling=!0,e.removeEventListener("scroll",n.onscroll,!0)},d.prototype.ontouchmove=function(t){var e=this;return void 0!==t.originalEvent.buttons&&0===t.originalEvent.buttons?void e.ontouchend(t):e.isScrolling?void(e.canTap=!1):(e.newPoints=a(t),void((e.opts||e.canPan)&&e.newPoints.length&&e.newPoints.length&&(e.isSwiping&&e.isSwiping===!0||t.preventDefault(),e.distanceX=s(e.newPoints[0],e.startPoints[0],"x"),e.distanceY=s(e.newPoints[0],e.startPoints[0],"y"),e.distance=s(e.newPoints[0],e.startPoints[0]),e.distance>0&&(e.isSwiping?e.onSwipe(t):e.isPanning?e.onPan():e.isZooming&&e.onZoom()))))},d.prototype.onSwipe=function(e){var a,s=this,r=s.isSwiping,c=s.sliderStartPos.left||0;if(r!==!0)"x"==r&&(s.distanceX>0&&(s.instance.group.length<2||0===s.instance.current.index&&!s.instance.current.opts.loop)?c+=Math.pow(s.distanceX,.8):s.distanceX<0&&(s.instance.group.length<2||s.instance.current.index===s.instance.group.length-1&&!s.instance.current.opts.loop)?c-=Math.pow(-s.distanceX,.8):c+=s.distanceX),s.sliderLastPos={top:"x"==r?0:s.sliderStartPos.top+s.distanceY,left:c},s.requestId&&(i(s.requestId),s.requestId=null),s.requestId=o(function(){s.sliderLastPos&&(n.each(s.instance.slides,function(t,e){var o=e.pos-s.instance.currPos;n.fancybox.setTranslate(e.$slide,{top:s.sliderLastPos.top,left:s.sliderLastPos.left+o*s.canvasWidth+o*e.opts.gutter})}),s.$container.addClass("fancybox-is-sliding"))});else if(Math.abs(s.distance)>10){if(s.canTap=!1,s.instance.group.length<2&&s.opts.vertical?s.isSwiping="y":s.instance.isDragging||s.opts.vertical===!1||"auto"===s.opts.vertical&&n(t).width()>800?s.isSwiping="x":(a=Math.abs(180*Math.atan2(s.distanceY,s.distanceX)/Math.PI),s.isSwiping=a>45&&a<135?"y":"x"),s.canTap=!1,"y"===s.isSwiping&&n.fancybox.isMobile&&s.isScrollable)return void(s.isScrolling=!0);s.instance.isDragging=s.isSwiping,s.startPoints=s.newPoints,n.each(s.instance.slides,function(t,e){n.fancybox.stop(e.$slide),e.$slide.css("transition-duration",""),e.inTransition=!1,e.pos===s.instance.current.pos&&(s.sliderStartPos.left=n.fancybox.getTranslate(e.$slide).left-n.fancybox.getTranslate(s.instance.$refs.stage).left)}),s.instance.SlideShow&&s.instance.SlideShow.isActive&&s.instance.SlideShow.stop()}},d.prototype.onPan=function(){var t=this;return s(t.newPoints[0],t.realPoints[0])<(n.fancybox.isMobile?10:5)?void(t.startPoints=t.newPoints):(t.canTap=!1,t.contentLastPos=t.limitMovement(),t.requestId&&(i(t.requestId),t.requestId=null),void(t.requestId=o(function(){n.fancybox.setTranslate(t.$content,t.contentLastPos)})))},d.prototype.limitMovement=function(){var t,e,n,o,i,a,s=this,r=s.canvasWidth,c=s.canvasHeight,l=s.distanceX,d=s.distanceY,u=s.contentStartPos,f=u.left,p=u.top,h=u.width,g=u.height;return i=h>r?f+l:f,a=p+d,t=Math.max(0,.5*r-.5*h),e=Math.max(0,.5*c-.5*g),n=Math.min(r-h,.5*r-.5*h),o=Math.min(c-g,.5*c-.5*g),l>0&&i>t&&(i=t-1+Math.pow(-t+f+l,.8)||0),l<0&&i<n&&(i=n+1-Math.pow(n-f-l,.8)||0),d>0&&a>e&&(a=e-1+Math.pow(-e+p+d,.8)||0),d<0&&a<o&&(a=o+1-Math.pow(o-p-d,.8)||0),{top:a,left:i}},d.prototype.limitPosition=function(t,e,n,o){var i=this,a=i.canvasWidth,s=i.canvasHeight;return n>a?(t=t>0?0:t,t=t<a-n?a-n:t):t=Math.max(0,a/2-n/2),o>s?(e=e>0?0:e,e=e<s-o?s-o:e):e=Math.max(0,s/2-o/2),{top:e,left:t}},d.prototype.onZoom=function(){var e=this,a=e.contentStartPos,r=a.width,c=a.height,l=a.left,d=a.top,u=s(e.newPoints[0],e.newPoints[1]),f=u/e.startDistanceBetweenFingers,p=Math.floor(r*f),h=Math.floor(c*f),g=(r-p)*e.percentageOfImageAtPinchPointX,b=(c-h)*e.percentageOfImageAtPinchPointY,m=(e.newPoints[0].x+e.newPoints[1].x)/2-n(t).scrollLeft(),v=(e.newPoints[0].y+e.newPoints[1].y)/2-n(t).scrollTop(),y=m-e.centerPointStartX,x=v-e.centerPointStartY,w=l+(g+y),$=d+(b+x),S={top:$,left:w,scaleX:f,scaleY:f};e.canTap=!1,e.newWidth=p,e.newHeight=h,e.contentLastPos=S,e.requestId&&(i(e.requestId),e.requestId=null),e.requestId=o(function(){n.fancybox.setTranslate(e.$content,e.contentLastPos)})},d.prototype.ontouchend=function(t){var o=this,s=Math.max((new Date).getTime()-o.startTime,1),r=o.isSwiping,c=o.isPanning,l=o.isZooming,d=o.isScrolling;return o.endPoints=a(t),o.$container.removeClass("fancybox-is-grabbing"),n(e).off(".fb.touch"),e.removeEventListener("scroll",o.onscroll,!0),o.requestId&&(i(o.requestId),o.requestId=null),o.isSwiping=!1,o.isPanning=!1,o.isZooming=!1,o.isScrolling=!1,o.instance.isDragging=!1,o.canTap?o.onTap(t):(o.speed=366,o.velocityX=o.distanceX/s*.5,o.velocityY=o.distanceY/s*.5,o.speedX=Math.max(.5*o.speed,Math.min(1.5*o.speed,1/Math.abs(o.velocityX)*o.speed)),void(c?o.endPanning():l?o.endZooming():o.endSwiping(r,d)))},d.prototype.endSwiping=function(t,e){var o=this,i=!1,a=o.instance.group.length;o.sliderLastPos=null,"y"==t&&!e&&Math.abs(o.distanceY)>50?(n.fancybox.animate(o.instance.current.$slide,{top:o.sliderStartPos.top+o.distanceY+150*o.velocityY,opacity:0},200),i=o.instance.close(!0,200)):"x"==t&&o.distanceX>50&&a>1?i=o.instance.previous(o.speedX):"x"==t&&o.distanceX<-50&&a>1&&(i=o.instance.next(o.speedX)),i!==!1||"x"!=t&&"y"!=t||(e||a<2?o.instance.centerSlide(o.instance.current,150):o.instance.jumpTo(o.instance.current.index)),o.$container.removeClass("fancybox-is-sliding")},d.prototype.endPanning=function(){var t,e,o,i=this;i.contentLastPos&&(i.opts.momentum===!1?(t=i.contentLastPos.left,e=i.contentLastPos.top):(t=i.contentLastPos.left+i.velocityX*i.speed,e=i.contentLastPos.top+i.velocityY*i.speed),o=i.limitPosition(t,e,i.contentStartPos.width,i.contentStartPos.height),o.width=i.contentStartPos.width,o.height=i.contentStartPos.height,n.fancybox.animate(i.$content,o,330))},d.prototype.endZooming=function(){var t,e,o,i,a=this,s=a.instance.current,r=a.newWidth,c=a.newHeight;a.contentLastPos&&(t=a.contentLastPos.left,e=a.contentLastPos.top,i={top:e,left:t,width:r,height:c,scaleX:1,scaleY:1},n.fancybox.setTranslate(a.$content,i),r<a.canvasWidth&&c<a.canvasHeight?a.instance.scaleToFit(150):r>s.width||c>s.height?a.instance.scaleToActual(a.centerPointStartX,a.centerPointStartY,150):(o=a.limitPosition(t,e,r,c),n.fancybox.setTranslate(a.$content,n.fancybox.getTranslate(a.$content)),n.fancybox.animate(a.$content,o,150)))},d.prototype.onTap=function(e){var o,i=this,s=n(e.target),r=i.instance,c=r.current,l=e&&a(e)||i.startPoints,d=l[0]?l[0].x-n(t).scrollLeft()-i.stagePos.left:0,u=l[0]?l[0].y-n(t).scrollTop()-i.stagePos.top:0,f=function(t){var o=c.opts[t];if(n.isFunction(o)&&(o=o.apply(r,[c,e])),o)switch(o){case"close":r.close(i.startEvent);break;case"toggleControls":r.toggleControls(!0);break;case"next":r.next();break;case"nextOrClose":r.group.length>1?r.next():r.close(i.startEvent);break;case"zoom":"image"==c.type&&(c.isLoaded||c.$ghost)&&(r.canPan()?r.scaleToFit():r.isScaledDown()?r.scaleToActual(d,u):r.group.length<2&&r.close(i.startEvent))}};if((!e.originalEvent||2!=e.originalEvent.button)&&(s.is("img")||!(d>s[0].clientWidth+s.offset().left))){if(s.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container"))o="Outside";else if(s.is(".fancybox-slide"))o="Slide";else{if(!r.current.$content||!r.current.$content.find(s).addBack().filter(s).length)return;o="Content"}if(i.tapped){if(clearTimeout(i.tapped),i.tapped=null,Math.abs(d-i.tapX)>50||Math.abs(u-i.tapY)>50)return this;f("dblclick"+o)}else i.tapX=d,i.tapY=u,c.opts["dblclick"+o]&&c.opts["dblclick"+o]!==c.opts["click"+o]?i.tapped=setTimeout(function(){i.tapped=null,f("click"+o)},500):f("click"+o);return this}},n(e).on("onActivate.fb",function(t,e){e&&!e.Guestures&&(e.Guestures=new d(e))})}(window,document,jQuery),function(t,e){"use strict";e.extend(!0,e.fancybox.defaults,{btnTpl:{slideShow:'<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 5.4v13.2l11-6.6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.33 5.75h2.2v12.5h-2.2V5.75zm5.15 0h2.2v12.5h-2.2V5.75z"/></svg></button>'},slideShow:{autoStart:!1,speed:3e3}});var n=function(t){this.instance=t,this.init()};e.extend(n.prototype,{timer:null,isActive:!1,$button:null,init:function(){var t=this;t.$button=t.instance.$refs.toolbar.find("[data-fancybox-play]").on("click",function(){t.toggle()}),(t.instance.group.length<2||!t.instance.group[t.instance.currIndex].opts.slideShow)&&t.$button.hide()},set:function(t){var e=this,n=e.instance,o=n.current,i=function(){e.isActive&&n.jumpTo((n.currIndex+1)%n.group.length)};o&&(t===!0||o.opts.loop||n.currIndex<n.group.length-1)?e.timer=setTimeout(function(){var t;e.isActive&&(t=o.$slide.find("video,audio").filter(":visible:first"),t.length?t.one("ended",i):i())},o.opts.slideShow.speed):(e.stop(),n.idleSecondsCounter=0,n.showControls())},clear:function(){var t=this;clearTimeout(t.timer),t.timer=null},start:function(){var t=this,e=t.instance.current;e&&(t.$button.attr("title",e.opts.i18n[e.opts.lang].PLAY_STOP).removeClass("fancybox-button--play").addClass("fancybox-button--pause"),t.isActive=!0,e.isComplete&&t.set(!0),t.instance.trigger("onSlideShowChange",!0))},stop:function(){var t=this,e=t.instance.current;t.clear(),t.$button.attr("title",e.opts.i18n[e.opts.lang].PLAY_START).removeClass("fancybox-button--pause").addClass("fancybox-button--play"),t.isActive=!1,t.instance.trigger("onSlideShowChange",!1)},toggle:function(){var t=this;t.isActive?t.stop():t.start()}}),e(t).on({"onInit.fb":function(t,e){e&&!e.SlideShow&&(e.SlideShow=new n(e))},"beforeShow.fb":function(t,e,n,o){var i=e&&e.SlideShow;o?i&&n.opts.slideShow.autoStart&&i.start():i&&i.isActive&&i.clear()},"afterShow.fb":function(t,e,n){var o=e&&e.SlideShow;o&&o.isActive&&o.set()},"afterKeydown.fb":function(n,o,i,a,s){var r=o&&o.SlideShow;!r||!i.opts.slideShow||80!==s&&32!==s||e(t.activeElement).is("button,a,input")||(a.preventDefault(),r.toggle())},"beforeClose.fb onDeactivate.fb":function(t,e){var n=e&&e.SlideShow;n&&n.stop()}}),e(t).on("visibilitychange",function(){var n=e.fancybox.getInstance(),o=n&&n.SlideShow;o&&o.isActive&&(t.hidden?o.clear():o.set())})}(document,jQuery),function(t,e){"use strict";var n=function(){for(var e=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenEnabled","fullscreenchange","fullscreenerror"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitFullscreenEnabled","webkitfullscreenchange","webkitfullscreenerror"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitCancelFullScreen","webkitfullscreenchange","webkitfullscreenerror"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozFullScreenEnabled","mozfullscreenchange","mozfullscreenerror"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","msFullscreenEnabled","MSFullscreenChange","MSFullscreenError"]],n={},o=0;o<e.length;o++){var i=e[o];if(i&&i[1]in t){for(var a=0;a<i.length;a++)n[e[0][a]]=i[a];return n}}return!1}();if(n){var o={request:function(e){e=e||t.documentElement,e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT)},exit:function(){t[n.exitFullscreen]()},toggle:function(e){e=e||t.documentElement,this.isFullscreen()?this.exit():this.request(e)},isFullscreen:function(){return Boolean(t[n.fullscreenElement])},enabled:function(){return Boolean(t[n.fullscreenEnabled])}};e.extend(!0,e.fancybox.defaults,{btnTpl:{fullScreen:'<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fsenter" title="{{FULL_SCREEN}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 16h3v3h2v-5H5zm3-8H5v2h5V5H8zm6 11h2v-3h3v-2h-5zm2-11V5h-2v5h5V8z"/></svg></button>'},fullScreen:{autoStart:!1}}),e(t).on(n.fullscreenchange,function(){var t=o.isFullscreen(),n=e.fancybox.getInstance();n&&(n.current&&"image"===n.current.type&&n.isAnimating&&(n.current.$content.css("transition","none"),n.isAnimating=!1,n.update(!0,!0,0)),n.trigger("onFullscreenChange",t),n.$refs.container.toggleClass("fancybox-is-fullscreen",t),n.$refs.toolbar.find("[data-fancybox-fullscreen]").toggleClass("fancybox-button--fsenter",!t).toggleClass("fancybox-button--fsexit",t))})}e(t).on({"onInit.fb":function(t,e){var i;return n?void(e&&e.group[e.currIndex].opts.fullScreen?(i=e.$refs.container,i.on("click.fb-fullscreen","[data-fancybox-fullscreen]",function(t){t.stopPropagation(),t.preventDefault(),o.toggle()}),e.opts.fullScreen&&e.opts.fullScreen.autoStart===!0&&o.request(),e.FullScreen=o):e&&e.$refs.toolbar.find("[data-fancybox-fullscreen]").hide()):void e.$refs.toolbar.find("[data-fancybox-fullscreen]").remove()},"afterKeydown.fb":function(t,e,n,o,i){e&&e.FullScreen&&70===i&&(o.preventDefault(),e.FullScreen.toggle())},"beforeClose.fb":function(t,e){e&&e.FullScreen&&e.$refs.container.hasClass("fancybox-is-fullscreen")&&o.exit()}})}(document,jQuery),function(t,e){"use strict";var n="fancybox-thumbs",o=n+"-active";e.fancybox.defaults=e.extend(!0,{btnTpl:{thumbs:'<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.59 14.59h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76H5.65V5.65z"/></svg></button>'},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"}},e.fancybox.defaults);var i=function(t){this.init(t)};e.extend(i.prototype,{$button:null,$grid:null,$list:null,isVisible:!1,isActive:!1,init:function(t){var e,n,o=this;o.instance=t,t.Thumbs=o,o.opts=t.group[t.currIndex].opts.thumbs,e=t.group[0],e=e.opts.thumb||!(!e.opts.$thumb||!e.opts.$thumb.length)&&e.opts.$thumb.attr("src"),t.group.length>1&&(n=t.group[1],n=n.opts.thumb||!(!n.opts.$thumb||!n.opts.$thumb.length)&&n.opts.$thumb.attr("src")),o.$button=t.$refs.toolbar.find("[data-fancybox-thumbs]"),o.opts&&e&&n?(o.$button.show().on("click",function(){o.toggle()}),o.isActive=!0):o.$button.hide()},create:function(){var t,o=this,i=o.instance,a=o.opts.parentEl,s=[];o.$grid||(o.$grid=e('<div class="'+n+" "+n+"-"+o.opts.axis+'"></div>').appendTo(i.$refs.container.find(a).addBack().filter(a)),o.$grid.on("click","a",function(){i.jumpTo(e(this).attr("data-index"))})),o.$list||(o.$list=e('<div class="'+n+'__list">').appendTo(o.$grid)),e.each(i.group,function(e,n){t=n.opts.thumb||(n.opts.$thumb?n.opts.$thumb.attr("src"):null),t||"image"!==n.type||(t=n.src),s.push('<a href="javascript:;" tabindex="0" data-index="'+e+'" '+(t&&t.length?' style="background-image:url('+t+')" />':"")+"></a>")}),o.$list[0].innerHTML=s.join(""),"x"===o.opts.axis&&o.$list.width(parseInt(o.$grid.css("padding-right"),10)+i.group.length*o.$list.children().eq(0).outerWidth(!0))},focus:function(t){var e,n,i=this,a=i.$list,s=i.$grid;i.instance.current&&(e=a.children().removeClass(o).filter('[data-index="'+i.instance.current.index+'"]').addClass(o),n=e.position(),"y"===i.opts.axis&&(n.top<0||n.top>a.height()-e.outerHeight())?a.stop().animate({scrollTop:a.scrollTop()+n.top},t):"x"===i.opts.axis&&(n.left<s.scrollLeft()||n.left>s.scrollLeft()+(s.width()-e.outerWidth()))&&a.parent().stop().animate({scrollLeft:n.left},t))},update:function(){var t=this;t.instance.$refs.container.toggleClass("fancybox-show-thumbs",this.isVisible),t.isVisible?(t.$grid||t.create(),t.instance.trigger("onThumbsShow"),t.focus(0)):t.$grid&&t.instance.trigger("onThumbsHide"),t.instance.update()},hide:function(){this.isVisible=!1,this.update()},show:function(){this.isVisible=!0,this.update()},toggle:function(){this.isVisible=!this.isVisible,this.update()}}),e(t).on({"onInit.fb":function(t,e){var n;e&&!e.Thumbs&&(n=new i(e),n.isActive&&n.opts.autoStart===!0&&n.show())},"beforeShow.fb":function(t,e,n,o){var i=e&&e.Thumbs;i&&i.isVisible&&i.focus(o?0:250)},"afterKeydown.fb":function(t,e,n,o,i){var a=e&&e.Thumbs;a&&a.isActive&&71===i&&(o.preventDefault(),a.toggle())},"beforeClose.fb":function(t,e){var n=e&&e.Thumbs;n&&n.isVisible&&n.opts.hideOnClose!==!1&&n.$grid.hide()}})}(document,jQuery),function(t,e){"use strict";function n(t){var e={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#x2F;","`":"&#x60;","=":"&#x3D;"};return String(t).replace(/[&<>"'`=\/]/g,function(t){return e[t]})}e.extend(!0,e.fancybox.defaults,{btnTpl:{share:'<button data-fancybox-share class="fancybox-button fancybox-button--share" title="{{SHARE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2.55 19c1.4-8.4 9.1-9.8 11.9-9.8V5l7 7-7 6.3v-3.5c-2.8 0-10.5 2.1-11.9 4.2z"/></svg></button>'},share:{url:function(t,e){return!t.currentHash&&"inline"!==e.type&&"html"!==e.type&&(e.origSrc||e.src)||window.location},tpl:'<div class="fancybox-share"><h1>{{SHARE}}</h1><p><a class="fancybox-share__button fancybox-share__button--fb" href="https://www.facebook.com/sharer/sharer.php?u={{url}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196" /></svg><span>Facebook</span></a><a class="fancybox-share__button fancybox-share__button--tw" href="https://twitter.com/intent/tweet?url={{url}}&text={{descr}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m456 133c-14 7-31 11-47 13 17-10 30-27 37-46-15 10-34 16-52 20-61-62-157-7-141 75-68-3-129-35-169-85-22 37-11 86 26 109-13 0-26-4-37-9 0 39 28 72 65 80-12 3-25 4-37 2 10 33 41 57 77 57-42 30-77 38-122 34 170 111 378-32 359-208 16-11 30-25 41-42z" /></svg><span>Twitter</span></a><a class="fancybox-share__button fancybox-share__button--pt" href="https://www.pinterest.com/pin/create/button/?url={{url}}&description={{descr}}&media={{media}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m265 56c-109 0-164 78-164 144 0 39 15 74 47 87 5 2 10 0 12-5l4-19c2-6 1-8-3-13-9-11-15-25-15-45 0-58 43-110 113-110 62 0 96 38 96 88 0 67-30 122-73 122-24 0-42-19-36-44 6-29 20-60 20-81 0-19-10-35-31-35-25 0-44 26-44 60 0 21 7 36 7 36l-30 125c-8 37-1 83 0 87 0 3 4 4 5 2 2-3 32-39 42-75l16-64c8 16 31 29 56 29 74 0 124-67 124-157 0-69-58-132-146-132z" fill="#fff"/></svg><span>Pinterest</span></a></p><p><input class="fancybox-share__input" type="text" value="{{url_raw}}" onclick="select()" /></p></div>'}}),e(t).on("click","[data-fancybox-share]",function(){var t,o,i=e.fancybox.getInstance(),a=i.current||null;a&&("function"===e.type(a.opts.share.url)&&(t=a.opts.share.url.apply(a,[i,a])),o=a.opts.share.tpl.replace(/\{\{media\}\}/g,"image"===a.type?encodeURIComponent(a.src):"").replace(/\{\{url\}\}/g,encodeURIComponent(t)).replace(/\{\{url_raw\}\}/g,n(t)).replace(/\{\{descr\}\}/g,i.$caption?encodeURIComponent(i.$caption.text()):""),e.fancybox.open({src:i.translate(i,o),type:"html",opts:{touch:!1,animationEffect:!1,afterLoad:function(t,e){i.$refs.container.one("beforeClose.fb",function(){t.close(null,0)}),e.$content.find(".fancybox-share__button").click(function(){return window.open(this.href,"Share","width=550, height=450"),!1})},mobile:{autoFocus:!1}}}))})}(document,jQuery),function(t,e,n){"use strict";function o(){var e=t.location.hash.substr(1),n=e.split("-"),o=n.length>1&&/^\+?\d+$/.test(n[n.length-1])?parseInt(n.pop(-1),10)||1:1,i=n.join("-");return{hash:e,index:o<1?1:o,gallery:i}}function i(t){""!==t.gallery&&n("[data-fancybox='"+n.escapeSelector(t.gallery)+"']").eq(t.index-1).focus().trigger("click.fb-start")}function a(t){var e,n;return!!t&&(e=t.current?t.current.opts:t.opts,n=e.hash||(e.$orig?e.$orig.data("fancybox")||e.$orig.data("fancybox-trigger"):""),""!==n&&n)}n.escapeSelector||(n.escapeSelector=function(t){var e=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,n=function(t,e){return e?"\0"===t?"�":t.slice(0,-1)+"\\"+t.charCodeAt(t.length-1).toString(16)+" ":"\\"+t};return(t+"").replace(e,n)}),n(function(){n.fancybox.defaults.hash!==!1&&(n(e).on({"onInit.fb":function(t,e){var n,i;e.group[e.currIndex].opts.hash!==!1&&(n=o(),i=a(e),i&&n.gallery&&i==n.gallery&&(e.currIndex=n.index-1))},"beforeShow.fb":function(n,o,i,s){var r;i&&i.opts.hash!==!1&&(r=a(o),r&&(o.currentHash=r+(o.group.length>1?"-"+(i.index+1):""),t.location.hash!=="#"+o.currentHash&&(s&&!o.origHash&&(o.origHash=t.location.hash),o.hashTimer&&clearTimeout(o.hashTimer),o.hashTimer=setTimeout(function(){"replaceState"in t.history?(t.history[s?"pushState":"replaceState"]({},e.title,t.location.pathname+t.location.search+"#"+o.currentHash),s&&(o.hasCreatedHistory=!0)):t.location.hash=o.currentHash,o.hashTimer=null},300))))},"beforeClose.fb":function(n,o,i){i.opts.hash!==!1&&(clearTimeout(o.hashTimer),o.currentHash&&o.hasCreatedHistory?t.history.back():o.currentHash&&("replaceState"in t.history?t.history.replaceState({},e.title,t.location.pathname+t.location.search+(o.origHash||"")):t.location.hash=o.origHash),o.currentHash=null)}}),n(t).on("hashchange.fb",function(){var t=o(),e=null;n.each(n(".fancybox-container").get().reverse(),function(t,o){var i=n(o).data("FancyBox");if(i&&i.currentHash)return e=i,!1}),e?e.currentHash===t.gallery+"-"+t.index||1===t.index&&e.currentHash==t.gallery||(e.currentHash=null,e.close()):""!==t.gallery&&i(t)}),setTimeout(function(){n.fancybox.getInstance()||i(o())},50))})}(window,document,jQuery),function(t,e){"use strict";var n=(new Date).getTime();e(t).on({"onInit.fb":function(t,e,o){e.$refs.stage.on("mousewheel DOMMouseScroll wheel MozMousePixelScroll",function(t){
var o=e.current,i=(new Date).getTime();e.group.length<2||o.opts.wheel===!1||"auto"===o.opts.wheel&&"image"!==o.type||(t.preventDefault(),t.stopPropagation(),o.$slide.hasClass("fancybox-animated")||(t=t.originalEvent||t,i-n<250||(n=i,e[(-t.deltaY||-t.deltaX||t.wheelDelta||-t.detail)<0?"next":"previous"]())))})}})}(document,jQuery);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:56:"/local/templates/arlight/js/slick.min.js?165720755242863";s:6:"source";s:40:"/local/templates/arlight/js/slick.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
!function(i){"use strict";"function"==typeof define&&define.amd?define(["jquery"],i):"undefined"!=typeof exports?module.exports=i(require("jquery")):i(jQuery)}(function(i){"use strict";var e=window.Slick||{};(e=function(){var e=0;return function(t,o){var s,n=this;n.defaults={accessibility:!0,adaptiveHeight:!1,appendArrows:i(t),appendDots:i(t),arrows:!0,asNavFor:null,prevArrow:'<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',nextArrow:'<button class="slick-next" aria-label="Next" type="button">Next</button>',autoplay:!1,autoplaySpeed:3e3,centerMode:!1,centerPadding:"50px",cssEase:"ease",customPaging:function(e,t){return i('<button type="button" />').text(t+1)},dots:!1,dotsClass:"slick-dots",draggable:!0,easing:"linear",edgeFriction:.35,fade:!1,focusOnSelect:!1,focusOnChange:!1,infinite:!0,initialSlide:0,lazyLoad:"ondemand",mobileFirst:!1,pauseOnHover:!0,pauseOnFocus:!0,pauseOnDotsHover:!1,respondTo:"window",responsive:null,rows:1,rtl:!1,slide:"",slidesPerRow:1,slidesToShow:1,slidesToScroll:1,speed:500,swipe:!0,swipeToSlide:!1,touchMove:!0,touchThreshold:5,useCSS:!0,useTransform:!0,variableWidth:!1,vertical:!1,verticalSwiping:!1,waitForAnimate:!0,zIndex:1e3},n.initials={animating:!1,dragging:!1,autoPlayTimer:null,currentDirection:0,currentLeft:null,currentSlide:0,direction:1,$dots:null,listWidth:null,listHeight:null,loadIndex:0,$nextArrow:null,$prevArrow:null,scrolling:!1,slideCount:null,slideWidth:null,$slideTrack:null,$slides:null,sliding:!1,slideOffset:0,swipeLeft:null,swiping:!1,$list:null,touchObject:{},transformsEnabled:!1,unslicked:!1},i.extend(n,n.initials),n.activeBreakpoint=null,n.animType=null,n.animProp=null,n.breakpoints=[],n.breakpointSettings=[],n.cssTransitions=!1,n.focussed=!1,n.interrupted=!1,n.hidden="hidden",n.paused=!0,n.positionProp=null,n.respondTo=null,n.rowCount=1,n.shouldClick=!0,n.$slider=i(t),n.$slidesCache=null,n.transformType=null,n.transitionType=null,n.visibilityChange="visibilitychange",n.windowWidth=0,n.windowTimer=null,s=i(t).data("slick")||{},n.options=i.extend({},n.defaults,o,s),n.currentSlide=n.options.initialSlide,n.originalSettings=n.options,void 0!==document.mozHidden?(n.hidden="mozHidden",n.visibilityChange="mozvisibilitychange"):void 0!==document.webkitHidden&&(n.hidden="webkitHidden",n.visibilityChange="webkitvisibilitychange"),n.autoPlay=i.proxy(n.autoPlay,n),n.autoPlayClear=i.proxy(n.autoPlayClear,n),n.autoPlayIterator=i.proxy(n.autoPlayIterator,n),n.changeSlide=i.proxy(n.changeSlide,n),n.clickHandler=i.proxy(n.clickHandler,n),n.selectHandler=i.proxy(n.selectHandler,n),n.setPosition=i.proxy(n.setPosition,n),n.swipeHandler=i.proxy(n.swipeHandler,n),n.dragHandler=i.proxy(n.dragHandler,n),n.keyHandler=i.proxy(n.keyHandler,n),n.instanceUid=e++,n.htmlExpr=/^(?:\s*(<[\w\W]+>)[^>]*)$/,n.registerBreakpoints(),n.init(!0)}}()).prototype.activateADA=function(){this.$slideTrack.find(".slick-active").attr({"aria-hidden":"false"}).find("a, input, button, select").attr({tabindex:"0"})},e.prototype.addSlide=e.prototype.slickAdd=function(e,t,o){var s=this;if("boolean"==typeof t)o=t,t=null;else if(t<0||t>=s.slideCount)return!1;s.unload(),"number"==typeof t?0===t&&0===s.$slides.length?i(e).appendTo(s.$slideTrack):o?i(e).insertBefore(s.$slides.eq(t)):i(e).insertAfter(s.$slides.eq(t)):!0===o?i(e).prependTo(s.$slideTrack):i(e).appendTo(s.$slideTrack),s.$slides=s.$slideTrack.children(this.options.slide),s.$slideTrack.children(this.options.slide).detach(),s.$slideTrack.append(s.$slides),s.$slides.each(function(e,t){i(t).attr("data-slick-index",e)}),s.$slidesCache=s.$slides,s.reinit()},e.prototype.animateHeight=function(){var i=this;if(1===i.options.slidesToShow&&!0===i.options.adaptiveHeight&&!1===i.options.vertical){var e=i.$slides.eq(i.currentSlide).outerHeight(!0);i.$list.animate({height:e},i.options.speed)}},e.prototype.animateSlide=function(e,t){var o={},s=this;s.animateHeight(),!0===s.options.rtl&&!1===s.options.vertical&&(e=-e),!1===s.transformsEnabled?!1===s.options.vertical?s.$slideTrack.animate({left:e},s.options.speed,s.options.easing,t):s.$slideTrack.animate({top:e},s.options.speed,s.options.easing,t):!1===s.cssTransitions?(!0===s.options.rtl&&(s.currentLeft=-s.currentLeft),i({animStart:s.currentLeft}).animate({animStart:e},{duration:s.options.speed,easing:s.options.easing,step:function(i){i=Math.ceil(i),!1===s.options.vertical?(o[s.animType]="translate("+i+"px, 0px)",s.$slideTrack.css(o)):(o[s.animType]="translate(0px,"+i+"px)",s.$slideTrack.css(o))},complete:function(){t&&t.call()}})):(s.applyTransition(),e=Math.ceil(e),!1===s.options.vertical?o[s.animType]="translate3d("+e+"px, 0px, 0px)":o[s.animType]="translate3d(0px,"+e+"px, 0px)",s.$slideTrack.css(o),t&&setTimeout(function(){s.disableTransition(),t.call()},s.options.speed))},e.prototype.getNavTarget=function(){var e=this,t=e.options.asNavFor;return t&&null!==t&&(t=i(t).not(e.$slider)),t},e.prototype.asNavFor=function(e){var t=this.getNavTarget();null!==t&&"object"==typeof t&&t.each(function(){var t=i(this).slick("getSlick");t.unslicked||t.slideHandler(e,!0)})},e.prototype.applyTransition=function(i){var e=this,t={};!1===e.options.fade?t[e.transitionType]=e.transformType+" "+e.options.speed+"ms "+e.options.cssEase:t[e.transitionType]="opacity "+e.options.speed+"ms "+e.options.cssEase,!1===e.options.fade?e.$slideTrack.css(t):e.$slides.eq(i).css(t)},e.prototype.autoPlay=function(){var i=this;i.autoPlayClear(),i.slideCount>i.options.slidesToShow&&(i.autoPlayTimer=setInterval(i.autoPlayIterator,i.options.autoplaySpeed))},e.prototype.autoPlayClear=function(){var i=this;i.autoPlayTimer&&clearInterval(i.autoPlayTimer)},e.prototype.autoPlayIterator=function(){var i=this,e=i.currentSlide+i.options.slidesToScroll;i.paused||i.interrupted||i.focussed||(!1===i.options.infinite&&(1===i.direction&&i.currentSlide+1===i.slideCount-1?i.direction=0:0===i.direction&&(e=i.currentSlide-i.options.slidesToScroll,i.currentSlide-1==0&&(i.direction=1))),i.slideHandler(e))},e.prototype.buildArrows=function(){var e=this;!0===e.options.arrows&&(e.$prevArrow=i(e.options.prevArrow).addClass("slick-arrow"),e.$nextArrow=i(e.options.nextArrow).addClass("slick-arrow"),e.slideCount>e.options.slidesToShow?(e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),e.htmlExpr.test(e.options.prevArrow)&&e.$prevArrow.prependTo(e.options.appendArrows),e.htmlExpr.test(e.options.nextArrow)&&e.$nextArrow.appendTo(e.options.appendArrows),!0!==e.options.infinite&&e.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true")):e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({"aria-disabled":"true",tabindex:"-1"}))},e.prototype.buildDots=function(){var e,t,o=this;if(!0===o.options.dots){for(o.$slider.addClass("slick-dotted"),t=i("<ul />").addClass(o.options.dotsClass),e=0;e<=o.getDotCount();e+=1)t.append(i("<li />").append(o.options.customPaging.call(this,o,e)));o.$dots=t.appendTo(o.options.appendDots),o.$dots.find("li").first().addClass("slick-active")}},e.prototype.buildOut=function(){var e=this;e.$slides=e.$slider.children(e.options.slide+":not(.slick-cloned)").addClass("slick-slide"),e.slideCount=e.$slides.length,e.$slides.each(function(e,t){i(t).attr("data-slick-index",e).data("originalStyling",i(t).attr("style")||"")}),e.$slider.addClass("slick-slider"),e.$slideTrack=0===e.slideCount?i('<div class="slick-track"/>').appendTo(e.$slider):e.$slides.wrapAll('<div class="slick-track"/>').parent(),e.$list=e.$slideTrack.wrap('<div class="slick-list"/>').parent(),e.$slideTrack.css("opacity",0),!0!==e.options.centerMode&&!0!==e.options.swipeToSlide||(e.options.slidesToScroll=1),i("img[data-lazy]",e.$slider).not("[src]").addClass("slick-loading"),e.setupInfinite(),e.buildArrows(),e.buildDots(),e.updateDots(),e.setSlideClasses("number"==typeof e.currentSlide?e.currentSlide:0),!0===e.options.draggable&&e.$list.addClass("draggable")},e.prototype.buildRows=function(){var i,e,t,o,s,n,r,l=this;if(o=document.createDocumentFragment(),n=l.$slider.children(),l.options.rows>1){for(r=l.options.slidesPerRow*l.options.rows,s=Math.ceil(n.length/r),i=0;i<s;i++){var d=document.createElement("div");for(e=0;e<l.options.rows;e++){var a=document.createElement("div");for(t=0;t<l.options.slidesPerRow;t++){var c=i*r+(e*l.options.slidesPerRow+t);n.get(c)&&a.appendChild(n.get(c))}d.appendChild(a)}o.appendChild(d)}l.$slider.empty().append(o),l.$slider.children().children().children().css({width:100/l.options.slidesPerRow+"%",display:"inline-block"})}},e.prototype.checkResponsive=function(e,t){var o,s,n,r=this,l=!1,d=r.$slider.width(),a=window.innerWidth||i(window).width();if("window"===r.respondTo?n=a:"slider"===r.respondTo?n=d:"min"===r.respondTo&&(n=Math.min(a,d)),r.options.responsive&&r.options.responsive.length&&null!==r.options.responsive){s=null;for(o in r.breakpoints)r.breakpoints.hasOwnProperty(o)&&(!1===r.originalSettings.mobileFirst?n<r.breakpoints[o]&&(s=r.breakpoints[o]):n>r.breakpoints[o]&&(s=r.breakpoints[o]));null!==s?null!==r.activeBreakpoint?(s!==r.activeBreakpoint||t)&&(r.activeBreakpoint=s,"unslick"===r.breakpointSettings[s]?r.unslick(s):(r.options=i.extend({},r.originalSettings,r.breakpointSettings[s]),!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e)),l=s):(r.activeBreakpoint=s,"unslick"===r.breakpointSettings[s]?r.unslick(s):(r.options=i.extend({},r.originalSettings,r.breakpointSettings[s]),!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e)),l=s):null!==r.activeBreakpoint&&(r.activeBreakpoint=null,r.options=r.originalSettings,!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e),l=s),e||!1===l||r.$slider.trigger("breakpoint",[r,l])}},e.prototype.changeSlide=function(e,t){var o,s,n,r=this,l=i(e.currentTarget);switch(l.is("a")&&e.preventDefault(),l.is("li")||(l=l.closest("li")),n=r.slideCount%r.options.slidesToScroll!=0,o=n?0:(r.slideCount-r.currentSlide)%r.options.slidesToScroll,e.data.message){case"previous":s=0===o?r.options.slidesToScroll:r.options.slidesToShow-o,r.slideCount>r.options.slidesToShow&&r.slideHandler(r.currentSlide-s,!1,t);break;case"next":s=0===o?r.options.slidesToScroll:o,r.slideCount>r.options.slidesToShow&&r.slideHandler(r.currentSlide+s,!1,t);break;case"index":var d=0===e.data.index?0:e.data.index||l.index()*r.options.slidesToScroll;r.slideHandler(r.checkNavigable(d),!1,t),l.children().trigger("focus");break;default:return}},e.prototype.checkNavigable=function(i){var e,t;if(e=this.getNavigableIndexes(),t=0,i>e[e.length-1])i=e[e.length-1];else for(var o in e){if(i<e[o]){i=t;break}t=e[o]}return i},e.prototype.cleanUpEvents=function(){var e=this;e.options.dots&&null!==e.$dots&&(i("li",e.$dots).off("click.slick",e.changeSlide).off("mouseenter.slick",i.proxy(e.interrupt,e,!0)).off("mouseleave.slick",i.proxy(e.interrupt,e,!1)),!0===e.options.accessibility&&e.$dots.off("keydown.slick",e.keyHandler)),e.$slider.off("focus.slick blur.slick"),!0===e.options.arrows&&e.slideCount>e.options.slidesToShow&&(e.$prevArrow&&e.$prevArrow.off("click.slick",e.changeSlide),e.$nextArrow&&e.$nextArrow.off("click.slick",e.changeSlide),!0===e.options.accessibility&&(e.$prevArrow&&e.$prevArrow.off("keydown.slick",e.keyHandler),e.$nextArrow&&e.$nextArrow.off("keydown.slick",e.keyHandler))),e.$list.off("touchstart.slick mousedown.slick",e.swipeHandler),e.$list.off("touchmove.slick mousemove.slick",e.swipeHandler),e.$list.off("touchend.slick mouseup.slick",e.swipeHandler),e.$list.off("touchcancel.slick mouseleave.slick",e.swipeHandler),e.$list.off("click.slick",e.clickHandler),i(document).off(e.visibilityChange,e.visibility),e.cleanUpSlideEvents(),!0===e.options.accessibility&&e.$list.off("keydown.slick",e.keyHandler),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().off("click.slick",e.selectHandler),i(window).off("orientationchange.slick.slick-"+e.instanceUid,e.orientationChange),i(window).off("resize.slick.slick-"+e.instanceUid,e.resize),i("[draggable!=true]",e.$slideTrack).off("dragstart",e.preventDefault),i(window).off("load.slick.slick-"+e.instanceUid,e.setPosition)},e.prototype.cleanUpSlideEvents=function(){var e=this;e.$list.off("mouseenter.slick",i.proxy(e.interrupt,e,!0)),e.$list.off("mouseleave.slick",i.proxy(e.interrupt,e,!1))},e.prototype.cleanUpRows=function(){var i,e=this;e.options.rows>1&&((i=e.$slides.children().children()).removeAttr("style"),e.$slider.empty().append(i))},e.prototype.clickHandler=function(i){!1===this.shouldClick&&(i.stopImmediatePropagation(),i.stopPropagation(),i.preventDefault())},e.prototype.destroy=function(e){var t=this;t.autoPlayClear(),t.touchObject={},t.cleanUpEvents(),i(".slick-cloned",t.$slider).detach(),t.$dots&&t.$dots.remove(),t.$prevArrow&&t.$prevArrow.length&&(t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),t.htmlExpr.test(t.options.prevArrow)&&t.$prevArrow.remove()),t.$nextArrow&&t.$nextArrow.length&&(t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),t.htmlExpr.test(t.options.nextArrow)&&t.$nextArrow.remove()),t.$slides&&(t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function(){i(this).attr("style",i(this).data("originalStyling"))}),t.$slideTrack.children(this.options.slide).detach(),t.$slideTrack.detach(),t.$list.detach(),t.$slider.append(t.$slides)),t.cleanUpRows(),t.$slider.removeClass("slick-slider"),t.$slider.removeClass("slick-initialized"),t.$slider.removeClass("slick-dotted"),t.unslicked=!0,e||t.$slider.trigger("destroy",[t])},e.prototype.disableTransition=function(i){var e=this,t={};t[e.transitionType]="",!1===e.options.fade?e.$slideTrack.css(t):e.$slides.eq(i).css(t)},e.prototype.fadeSlide=function(i,e){var t=this;!1===t.cssTransitions?(t.$slides.eq(i).css({zIndex:t.options.zIndex}),t.$slides.eq(i).animate({opacity:1},t.options.speed,t.options.easing,e)):(t.applyTransition(i),t.$slides.eq(i).css({opacity:1,zIndex:t.options.zIndex}),e&&setTimeout(function(){t.disableTransition(i),e.call()},t.options.speed))},e.prototype.fadeSlideOut=function(i){var e=this;!1===e.cssTransitions?e.$slides.eq(i).animate({opacity:0,zIndex:e.options.zIndex-2},e.options.speed,e.options.easing):(e.applyTransition(i),e.$slides.eq(i).css({opacity:0,zIndex:e.options.zIndex-2}))},e.prototype.filterSlides=e.prototype.slickFilter=function(i){var e=this;null!==i&&(e.$slidesCache=e.$slides,e.unload(),e.$slideTrack.children(this.options.slide).detach(),e.$slidesCache.filter(i).appendTo(e.$slideTrack),e.reinit())},e.prototype.focusHandler=function(){var e=this;e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick","*",function(t){t.stopImmediatePropagation();var o=i(this);setTimeout(function(){e.options.pauseOnFocus&&(e.focussed=o.is(":focus"),e.autoPlay())},0)})},e.prototype.getCurrent=e.prototype.slickCurrentSlide=function(){return this.currentSlide},e.prototype.getDotCount=function(){var i=this,e=0,t=0,o=0;if(!0===i.options.infinite)if(i.slideCount<=i.options.slidesToShow)++o;else for(;e<i.slideCount;)++o,e=t+i.options.slidesToScroll,t+=i.options.slidesToScroll<=i.options.slidesToShow?i.options.slidesToScroll:i.options.slidesToShow;else if(!0===i.options.centerMode)o=i.slideCount;else if(i.options.asNavFor)for(;e<i.slideCount;)++o,e=t+i.options.slidesToScroll,t+=i.options.slidesToScroll<=i.options.slidesToShow?i.options.slidesToScroll:i.options.slidesToShow;else o=1+Math.ceil((i.slideCount-i.options.slidesToShow)/i.options.slidesToScroll);return o-1},e.prototype.getLeft=function(i){var e,t,o,s,n=this,r=0;return n.slideOffset=0,t=n.$slides.first().outerHeight(!0),!0===n.options.infinite?(n.slideCount>n.options.slidesToShow&&(n.slideOffset=n.slideWidth*n.options.slidesToShow*-1,s=-1,!0===n.options.vertical&&!0===n.options.centerMode&&(2===n.options.slidesToShow?s=-1.5:1===n.options.slidesToShow&&(s=-2)),r=t*n.options.slidesToShow*s),n.slideCount%n.options.slidesToScroll!=0&&i+n.options.slidesToScroll>n.slideCount&&n.slideCount>n.options.slidesToShow&&(i>n.slideCount?(n.slideOffset=(n.options.slidesToShow-(i-n.slideCount))*n.slideWidth*-1,r=(n.options.slidesToShow-(i-n.slideCount))*t*-1):(n.slideOffset=n.slideCount%n.options.slidesToScroll*n.slideWidth*-1,r=n.slideCount%n.options.slidesToScroll*t*-1))):i+n.options.slidesToShow>n.slideCount&&(n.slideOffset=(i+n.options.slidesToShow-n.slideCount)*n.slideWidth,r=(i+n.options.slidesToShow-n.slideCount)*t),n.slideCount<=n.options.slidesToShow&&(n.slideOffset=0,r=0),!0===n.options.centerMode&&n.slideCount<=n.options.slidesToShow?n.slideOffset=n.slideWidth*Math.floor(n.options.slidesToShow)/2-n.slideWidth*n.slideCount/2:!0===n.options.centerMode&&!0===n.options.infinite?n.slideOffset+=n.slideWidth*Math.floor(n.options.slidesToShow/2)-n.slideWidth:!0===n.options.centerMode&&(n.slideOffset=0,n.slideOffset+=n.slideWidth*Math.floor(n.options.slidesToShow/2)),e=!1===n.options.vertical?i*n.slideWidth*-1+n.slideOffset:i*t*-1+r,!0===n.options.variableWidth&&(o=n.slideCount<=n.options.slidesToShow||!1===n.options.infinite?n.$slideTrack.children(".slick-slide").eq(i):n.$slideTrack.children(".slick-slide").eq(i+n.options.slidesToShow),e=!0===n.options.rtl?o[0]?-1*(n.$slideTrack.width()-o[0].offsetLeft-o.width()):0:o[0]?-1*o[0].offsetLeft:0,!0===n.options.centerMode&&(o=n.slideCount<=n.options.slidesToShow||!1===n.options.infinite?n.$slideTrack.children(".slick-slide").eq(i):n.$slideTrack.children(".slick-slide").eq(i+n.options.slidesToShow+1),e=!0===n.options.rtl?o[0]?-1*(n.$slideTrack.width()-o[0].offsetLeft-o.width()):0:o[0]?-1*o[0].offsetLeft:0,e+=(n.$list.width()-o.outerWidth())/2)),e},e.prototype.getOption=e.prototype.slickGetOption=function(i){return this.options[i]},e.prototype.getNavigableIndexes=function(){var i,e=this,t=0,o=0,s=[];for(!1===e.options.infinite?i=e.slideCount:(t=-1*e.options.slidesToScroll,o=-1*e.options.slidesToScroll,i=2*e.slideCount);t<i;)s.push(t),t=o+e.options.slidesToScroll,o+=e.options.slidesToScroll<=e.options.slidesToShow?e.options.slidesToScroll:e.options.slidesToShow;return s},e.prototype.getSlick=function(){return this},e.prototype.getSlideCount=function(){var e,t,o=this;return t=!0===o.options.centerMode?o.slideWidth*Math.floor(o.options.slidesToShow/2):0,!0===o.options.swipeToSlide?(o.$slideTrack.find(".slick-slide").each(function(s,n){if(n.offsetLeft-t+i(n).outerWidth()/2>-1*o.swipeLeft)return e=n,!1}),Math.abs(i(e).attr("data-slick-index")-o.currentSlide)||1):o.options.slidesToScroll},e.prototype.goTo=e.prototype.slickGoTo=function(i,e){this.changeSlide({data:{message:"index",index:parseInt(i)}},e)},e.prototype.init=function(e){var t=this;i(t.$slider).hasClass("slick-initialized")||(i(t.$slider).addClass("slick-initialized"),t.buildRows(),t.buildOut(),t.setProps(),t.startLoad(),t.loadSlider(),t.initializeEvents(),t.updateArrows(),t.updateDots(),t.checkResponsive(!0),t.focusHandler()),e&&t.$slider.trigger("init",[t]),!0===t.options.accessibility&&t.initADA(),t.options.autoplay&&(t.paused=!1,t.autoPlay())},e.prototype.initADA=function(){var e=this,t=Math.ceil(e.slideCount/e.options.slidesToShow),o=e.getNavigableIndexes().filter(function(i){return i>=0&&i<e.slideCount});e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({"aria-hidden":"true",tabindex:"-1"}).find("a, input, button, select").attr({tabindex:"-1"}),null!==e.$dots&&(e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(t){var s=o.indexOf(t);i(this).attr({role:"tabpanel",id:"slick-slide"+e.instanceUid+t,tabindex:-1}),-1!==s&&i(this).attr({"aria-describedby":"slick-slide-control"+e.instanceUid+s})}),e.$dots.attr("role","tablist").find("li").each(function(s){var n=o[s];i(this).attr({role:"presentation"}),i(this).find("button").first().attr({role:"tab",id:"slick-slide-control"+e.instanceUid+s,"aria-controls":"slick-slide"+e.instanceUid+n,"aria-label":s+1+" of "+t,"aria-selected":null,tabindex:"-1"})}).eq(e.currentSlide).find("button").attr({"aria-selected":"true",tabindex:"0"}).end());for(var s=e.currentSlide,n=s+e.options.slidesToShow;s<n;s++)e.$slides.eq(s).attr("tabindex",0);e.activateADA()},e.prototype.initArrowEvents=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.off("click.slick").on("click.slick",{message:"previous"},i.changeSlide),i.$nextArrow.off("click.slick").on("click.slick",{message:"next"},i.changeSlide),!0===i.options.accessibility&&(i.$prevArrow.on("keydown.slick",i.keyHandler),i.$nextArrow.on("keydown.slick",i.keyHandler)))},e.prototype.initDotEvents=function(){var e=this;!0===e.options.dots&&(i("li",e.$dots).on("click.slick",{message:"index"},e.changeSlide),!0===e.options.accessibility&&e.$dots.on("keydown.slick",e.keyHandler)),!0===e.options.dots&&!0===e.options.pauseOnDotsHover&&i("li",e.$dots).on("mouseenter.slick",i.proxy(e.interrupt,e,!0)).on("mouseleave.slick",i.proxy(e.interrupt,e,!1))},e.prototype.initSlideEvents=function(){var e=this;e.options.pauseOnHover&&(e.$list.on("mouseenter.slick",i.proxy(e.interrupt,e,!0)),e.$list.on("mouseleave.slick",i.proxy(e.interrupt,e,!1)))},e.prototype.initializeEvents=function(){var e=this;e.initArrowEvents(),e.initDotEvents(),e.initSlideEvents(),e.$list.on("touchstart.slick mousedown.slick",{action:"start"},e.swipeHandler),e.$list.on("touchmove.slick mousemove.slick",{action:"move"},e.swipeHandler),e.$list.on("touchend.slick mouseup.slick",{action:"end"},e.swipeHandler),e.$list.on("touchcancel.slick mouseleave.slick",{action:"end"},e.swipeHandler),e.$list.on("click.slick",e.clickHandler),i(document).on(e.visibilityChange,i.proxy(e.visibility,e)),!0===e.options.accessibility&&e.$list.on("keydown.slick",e.keyHandler),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().on("click.slick",e.selectHandler),i(window).on("orientationchange.slick.slick-"+e.instanceUid,i.proxy(e.orientationChange,e)),i(window).on("resize.slick.slick-"+e.instanceUid,i.proxy(e.resize,e)),i("[draggable!=true]",e.$slideTrack).on("dragstart",e.preventDefault),i(window).on("load.slick.slick-"+e.instanceUid,e.setPosition),i(e.setPosition)},e.prototype.initUI=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.show(),i.$nextArrow.show()),!0===i.options.dots&&i.slideCount>i.options.slidesToShow&&i.$dots.show()},e.prototype.keyHandler=function(i){var e=this;i.target.tagName.match("TEXTAREA|INPUT|SELECT")||(37===i.keyCode&&!0===e.options.accessibility?e.changeSlide({data:{message:!0===e.options.rtl?"next":"previous"}}):39===i.keyCode&&!0===e.options.accessibility&&e.changeSlide({data:{message:!0===e.options.rtl?"previous":"next"}}))},e.prototype.lazyLoad=function(){function e(e){i("img[data-lazy]",e).each(function(){var e=i(this),t=i(this).attr("data-lazy"),o=i(this).attr("data-srcset"),s=i(this).attr("data-sizes")||n.$slider.attr("data-sizes"),r=document.createElement("img");r.onload=function(){e.animate({opacity:0},100,function(){o&&(e.attr("srcset",o),s&&e.attr("sizes",s)),e.attr("src",t).animate({opacity:1},200,function(){e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")}),n.$slider.trigger("lazyLoaded",[n,e,t])})},r.onerror=function(){e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),n.$slider.trigger("lazyLoadError",[n,e,t])},r.src=t})}var t,o,s,n=this;if(!0===n.options.centerMode?!0===n.options.infinite?s=(o=n.currentSlide+(n.options.slidesToShow/2+1))+n.options.slidesToShow+2:(o=Math.max(0,n.currentSlide-(n.options.slidesToShow/2+1)),s=n.options.slidesToShow/2+1+2+n.currentSlide):(o=n.options.infinite?n.options.slidesToShow+n.currentSlide:n.currentSlide,s=Math.ceil(o+n.options.slidesToShow),!0===n.options.fade&&(o>0&&o--,s<=n.slideCount&&s++)),t=n.$slider.find(".slick-slide").slice(o,s),"anticipated"===n.options.lazyLoad)for(var r=o-1,l=s,d=n.$slider.find(".slick-slide"),a=0;a<n.options.slidesToScroll;a++)r<0&&(r=n.slideCount-1),t=(t=t.add(d.eq(r))).add(d.eq(l)),r--,l++;e(t),n.slideCount<=n.options.slidesToShow?e(n.$slider.find(".slick-slide")):n.currentSlide>=n.slideCount-n.options.slidesToShow?e(n.$slider.find(".slick-cloned").slice(0,n.options.slidesToShow)):0===n.currentSlide&&e(n.$slider.find(".slick-cloned").slice(-1*n.options.slidesToShow))},e.prototype.loadSlider=function(){var i=this;i.setPosition(),i.$slideTrack.css({opacity:1}),i.$slider.removeClass("slick-loading"),i.initUI(),"progressive"===i.options.lazyLoad&&i.progressiveLazyLoad()},e.prototype.next=e.prototype.slickNext=function(){this.changeSlide({data:{message:"next"}})},e.prototype.orientationChange=function(){var i=this;i.checkResponsive(),i.setPosition()},e.prototype.pause=e.prototype.slickPause=function(){var i=this;i.autoPlayClear(),i.paused=!0},e.prototype.play=e.prototype.slickPlay=function(){var i=this;i.autoPlay(),i.options.autoplay=!0,i.paused=!1,i.focussed=!1,i.interrupted=!1},e.prototype.postSlide=function(e){var t=this;t.unslicked||(t.$slider.trigger("afterChange",[t,e]),t.animating=!1,t.slideCount>t.options.slidesToShow&&t.setPosition(),t.swipeLeft=null,t.options.autoplay&&t.autoPlay(),!0===t.options.accessibility&&(t.initADA(),t.options.focusOnChange&&i(t.$slides.get(t.currentSlide)).attr("tabindex",0).focus()))},e.prototype.prev=e.prototype.slickPrev=function(){this.changeSlide({data:{message:"previous"}})},e.prototype.preventDefault=function(i){i.preventDefault()},e.prototype.progressiveLazyLoad=function(e){e=e||1;var t,o,s,n,r,l=this,d=i("img[data-lazy]",l.$slider);d.length?(t=d.first(),o=t.attr("data-lazy"),s=t.attr("data-srcset"),n=t.attr("data-sizes")||l.$slider.attr("data-sizes"),(r=document.createElement("img")).onload=function(){s&&(t.attr("srcset",s),n&&t.attr("sizes",n)),t.attr("src",o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"),!0===l.options.adaptiveHeight&&l.setPosition(),l.$slider.trigger("lazyLoaded",[l,t,o]),l.progressiveLazyLoad()},r.onerror=function(){e<3?setTimeout(function(){l.progressiveLazyLoad(e+1)},500):(t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),l.$slider.trigger("lazyLoadError",[l,t,o]),l.progressiveLazyLoad())},r.src=o):l.$slider.trigger("allImagesLoaded",[l])},e.prototype.refresh=function(e){var t,o,s=this;o=s.slideCount-s.options.slidesToShow,!s.options.infinite&&s.currentSlide>o&&(s.currentSlide=o),s.slideCount<=s.options.slidesToShow&&(s.currentSlide=0),t=s.currentSlide,s.destroy(!0),i.extend(s,s.initials,{currentSlide:t}),s.init(),e||s.changeSlide({data:{message:"index",index:t}},!1)},e.prototype.registerBreakpoints=function(){var e,t,o,s=this,n=s.options.responsive||null;if("array"===i.type(n)&&n.length){s.respondTo=s.options.respondTo||"window";for(e in n)if(o=s.breakpoints.length-1,n.hasOwnProperty(e)){for(t=n[e].breakpoint;o>=0;)s.breakpoints[o]&&s.breakpoints[o]===t&&s.breakpoints.splice(o,1),o--;s.breakpoints.push(t),s.breakpointSettings[t]=n[e].settings}s.breakpoints.sort(function(i,e){return s.options.mobileFirst?i-e:e-i})}},e.prototype.reinit=function(){var e=this;e.$slides=e.$slideTrack.children(e.options.slide).addClass("slick-slide"),e.slideCount=e.$slides.length,e.currentSlide>=e.slideCount&&0!==e.currentSlide&&(e.currentSlide=e.currentSlide-e.options.slidesToScroll),e.slideCount<=e.options.slidesToShow&&(e.currentSlide=0),e.registerBreakpoints(),e.setProps(),e.setupInfinite(),e.buildArrows(),e.updateArrows(),e.initArrowEvents(),e.buildDots(),e.updateDots(),e.initDotEvents(),e.cleanUpSlideEvents(),e.initSlideEvents(),e.checkResponsive(!1,!0),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().on("click.slick",e.selectHandler),e.setSlideClasses("number"==typeof e.currentSlide?e.currentSlide:0),e.setPosition(),e.focusHandler(),e.paused=!e.options.autoplay,e.autoPlay(),e.$slider.trigger("reInit",[e])},e.prototype.resize=function(){var e=this;i(window).width()!==e.windowWidth&&(clearTimeout(e.windowDelay),e.windowDelay=window.setTimeout(function(){e.windowWidth=i(window).width(),e.checkResponsive(),e.unslicked||e.setPosition()},50))},e.prototype.removeSlide=e.prototype.slickRemove=function(i,e,t){var o=this;if(i="boolean"==typeof i?!0===(e=i)?0:o.slideCount-1:!0===e?--i:i,o.slideCount<1||i<0||i>o.slideCount-1)return!1;o.unload(),!0===t?o.$slideTrack.children().remove():o.$slideTrack.children(this.options.slide).eq(i).remove(),o.$slides=o.$slideTrack.children(this.options.slide),o.$slideTrack.children(this.options.slide).detach(),o.$slideTrack.append(o.$slides),o.$slidesCache=o.$slides,o.reinit()},e.prototype.setCSS=function(i){var e,t,o=this,s={};!0===o.options.rtl&&(i=-i),e="left"==o.positionProp?Math.ceil(i)+"px":"0px",t="top"==o.positionProp?Math.ceil(i)+"px":"0px",s[o.positionProp]=i,!1===o.transformsEnabled?o.$slideTrack.css(s):(s={},!1===o.cssTransitions?(s[o.animType]="translate("+e+", "+t+")",o.$slideTrack.css(s)):(s[o.animType]="translate3d("+e+", "+t+", 0px)",o.$slideTrack.css(s)))},e.prototype.setDimensions=function(){var i=this;!1===i.options.vertical?!0===i.options.centerMode&&i.$list.css({padding:"0px "+i.options.centerPadding}):(i.$list.height(i.$slides.first().outerHeight(!0)*i.options.slidesToShow),!0===i.options.centerMode&&i.$list.css({padding:i.options.centerPadding+" 0px"})),i.listWidth=i.$list.width(),i.listHeight=i.$list.height(),!1===i.options.vertical&&!1===i.options.variableWidth?(i.slideWidth=Math.ceil(i.listWidth/i.options.slidesToShow),i.$slideTrack.width(Math.ceil(i.slideWidth*i.$slideTrack.children(".slick-slide").length))):!0===i.options.variableWidth?i.$slideTrack.width(5e3*i.slideCount):(i.slideWidth=Math.ceil(i.listWidth),i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0)*i.$slideTrack.children(".slick-slide").length)));var e=i.$slides.first().outerWidth(!0)-i.$slides.first().width();!1===i.options.variableWidth&&i.$slideTrack.children(".slick-slide").width(i.slideWidth-e)},e.prototype.setFade=function(){var e,t=this;t.$slides.each(function(o,s){e=t.slideWidth*o*-1,!0===t.options.rtl?i(s).css({position:"relative",right:e,top:0,zIndex:t.options.zIndex-2,opacity:0}):i(s).css({position:"relative",left:e,top:0,zIndex:t.options.zIndex-2,opacity:0})}),t.$slides.eq(t.currentSlide).css({zIndex:t.options.zIndex-1,opacity:1})},e.prototype.setHeight=function(){var i=this;if(1===i.options.slidesToShow&&!0===i.options.adaptiveHeight&&!1===i.options.vertical){var e=i.$slides.eq(i.currentSlide).outerHeight(!0);i.$list.css("height",e)}},e.prototype.setOption=e.prototype.slickSetOption=function(){var e,t,o,s,n,r=this,l=!1;if("object"===i.type(arguments[0])?(o=arguments[0],l=arguments[1],n="multiple"):"string"===i.type(arguments[0])&&(o=arguments[0],s=arguments[1],l=arguments[2],"responsive"===arguments[0]&&"array"===i.type(arguments[1])?n="responsive":void 0!==arguments[1]&&(n="single")),"single"===n)r.options[o]=s;else if("multiple"===n)i.each(o,function(i,e){r.options[i]=e});else if("responsive"===n)for(t in s)if("array"!==i.type(r.options.responsive))r.options.responsive=[s[t]];else{for(e=r.options.responsive.length-1;e>=0;)r.options.responsive[e].breakpoint===s[t].breakpoint&&r.options.responsive.splice(e,1),e--;r.options.responsive.push(s[t])}l&&(r.unload(),r.reinit())},e.prototype.setPosition=function(){var i=this;i.setDimensions(),i.setHeight(),!1===i.options.fade?i.setCSS(i.getLeft(i.currentSlide)):i.setFade(),i.$slider.trigger("setPosition",[i])},e.prototype.setProps=function(){var i=this,e=document.body.style;i.positionProp=!0===i.options.vertical?"top":"left","top"===i.positionProp?i.$slider.addClass("slick-vertical"):i.$slider.removeClass("slick-vertical"),void 0===e.WebkitTransition&&void 0===e.MozTransition&&void 0===e.msTransition||!0===i.options.useCSS&&(i.cssTransitions=!0),i.options.fade&&("number"==typeof i.options.zIndex?i.options.zIndex<3&&(i.options.zIndex=3):i.options.zIndex=i.defaults.zIndex),void 0!==e.OTransform&&(i.animType="OTransform",i.transformType="-o-transform",i.transitionType="OTransition",void 0===e.perspectiveProperty&&void 0===e.webkitPerspective&&(i.animType=!1)),void 0!==e.MozTransform&&(i.animType="MozTransform",i.transformType="-moz-transform",i.transitionType="MozTransition",void 0===e.perspectiveProperty&&void 0===e.MozPerspective&&(i.animType=!1)),void 0!==e.webkitTransform&&(i.animType="webkitTransform",i.transformType="-webkit-transform",i.transitionType="webkitTransition",void 0===e.perspectiveProperty&&void 0===e.webkitPerspective&&(i.animType=!1)),void 0!==e.msTransform&&(i.animType="msTransform",i.transformType="-ms-transform",i.transitionType="msTransition",void 0===e.msTransform&&(i.animType=!1)),void 0!==e.transform&&!1!==i.animType&&(i.animType="transform",i.transformType="transform",i.transitionType="transition"),i.transformsEnabled=i.options.useTransform&&null!==i.animType&&!1!==i.animType},e.prototype.setSlideClasses=function(i){var e,t,o,s,n=this;if(t=n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden","true"),n.$slides.eq(i).addClass("slick-current"),!0===n.options.centerMode){var r=n.options.slidesToShow%2==0?1:0;e=Math.floor(n.options.slidesToShow/2),!0===n.options.infinite&&(i>=e&&i<=n.slideCount-1-e?n.$slides.slice(i-e+r,i+e+1).addClass("slick-active").attr("aria-hidden","false"):(o=n.options.slidesToShow+i,t.slice(o-e+1+r,o+e+2).addClass("slick-active").attr("aria-hidden","false")),0===i?t.eq(t.length-1-n.options.slidesToShow).addClass("slick-center"):i===n.slideCount-1&&t.eq(n.options.slidesToShow).addClass("slick-center")),n.$slides.eq(i).addClass("slick-center")}else i>=0&&i<=n.slideCount-n.options.slidesToShow?n.$slides.slice(i,i+n.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"):t.length<=n.options.slidesToShow?t.addClass("slick-active").attr("aria-hidden","false"):(s=n.slideCount%n.options.slidesToShow,o=!0===n.options.infinite?n.options.slidesToShow+i:i,n.options.slidesToShow==n.options.slidesToScroll&&n.slideCount-i<n.options.slidesToShow?t.slice(o-(n.options.slidesToShow-s),o+s).addClass("slick-active").attr("aria-hidden","false"):t.slice(o,o+n.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"));"ondemand"!==n.options.lazyLoad&&"anticipated"!==n.options.lazyLoad||n.lazyLoad()},e.prototype.setupInfinite=function(){var e,t,o,s=this;if(!0===s.options.fade&&(s.options.centerMode=!1),!0===s.options.infinite&&!1===s.options.fade&&(t=null,s.slideCount>s.options.slidesToShow)){for(o=!0===s.options.centerMode?s.options.slidesToShow+1:s.options.slidesToShow,e=s.slideCount;e>s.slideCount-o;e-=1)t=e-1,i(s.$slides[t]).clone(!0).attr("id","").attr("data-slick-index",t-s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");for(e=0;e<o+s.slideCount;e+=1)t=e,i(s.$slides[t]).clone(!0).attr("id","").attr("data-slick-index",t+s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");s.$slideTrack.find(".slick-cloned").find("[id]").each(function(){i(this).attr("id","")})}},e.prototype.interrupt=function(i){var e=this;i||e.autoPlay(),e.interrupted=i},e.prototype.selectHandler=function(e){var t=this,o=i(e.target).is(".slick-slide")?i(e.target):i(e.target).parents(".slick-slide"),s=parseInt(o.attr("data-slick-index"));s||(s=0),t.slideCount<=t.options.slidesToShow?t.slideHandler(s,!1,!0):t.slideHandler(s)},e.prototype.slideHandler=function(i,e,t){var o,s,n,r,l,d=null,a=this;if(e=e||!1,!(!0===a.animating&&!0===a.options.waitForAnimate||!0===a.options.fade&&a.currentSlide===i))if(!1===e&&a.asNavFor(i),o=i,d=a.getLeft(o),r=a.getLeft(a.currentSlide),a.currentLeft=null===a.swipeLeft?r:a.swipeLeft,!1===a.options.infinite&&!1===a.options.centerMode&&(i<0||i>a.getDotCount()*a.options.slidesToScroll))!1===a.options.fade&&(o=a.currentSlide,!0!==t?a.animateSlide(r,function(){a.postSlide(o)}):a.postSlide(o));else if(!1===a.options.infinite&&!0===a.options.centerMode&&(i<0||i>a.slideCount-a.options.slidesToScroll))!1===a.options.fade&&(o=a.currentSlide,!0!==t?a.animateSlide(r,function(){a.postSlide(o)}):a.postSlide(o));else{if(a.options.autoplay&&clearInterval(a.autoPlayTimer),s=o<0?a.slideCount%a.options.slidesToScroll!=0?a.slideCount-a.slideCount%a.options.slidesToScroll:a.slideCount+o:o>=a.slideCount?a.slideCount%a.options.slidesToScroll!=0?0:o-a.slideCount:o,a.animating=!0,a.$slider.trigger("beforeChange",[a,a.currentSlide,s]),n=a.currentSlide,a.currentSlide=s,a.setSlideClasses(a.currentSlide),a.options.asNavFor&&(l=(l=a.getNavTarget()).slick("getSlick")).slideCount<=l.options.slidesToShow&&l.setSlideClasses(a.currentSlide),a.updateDots(),a.updateArrows(),!0===a.options.fade)return!0!==t?(a.fadeSlideOut(n),a.fadeSlide(s,function(){a.postSlide(s)})):a.postSlide(s),void a.animateHeight();!0!==t?a.animateSlide(d,function(){a.postSlide(s)}):a.postSlide(s)}},e.prototype.startLoad=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.hide(),i.$nextArrow.hide()),!0===i.options.dots&&i.slideCount>i.options.slidesToShow&&i.$dots.hide(),i.$slider.addClass("slick-loading")},e.prototype.swipeDirection=function(){var i,e,t,o,s=this;return i=s.touchObject.startX-s.touchObject.curX,e=s.touchObject.startY-s.touchObject.curY,t=Math.atan2(e,i),(o=Math.round(180*t/Math.PI))<0&&(o=360-Math.abs(o)),o<=45&&o>=0?!1===s.options.rtl?"left":"right":o<=360&&o>=315?!1===s.options.rtl?"left":"right":o>=135&&o<=225?!1===s.options.rtl?"right":"left":!0===s.options.verticalSwiping?o>=35&&o<=135?"down":"up":"vertical"},e.prototype.swipeEnd=function(i){var e,t,o=this;if(o.dragging=!1,o.swiping=!1,o.scrolling)return o.scrolling=!1,!1;if(o.interrupted=!1,o.shouldClick=!(o.touchObject.swipeLength>10),void 0===o.touchObject.curX)return!1;if(!0===o.touchObject.edgeHit&&o.$slider.trigger("edge",[o,o.swipeDirection()]),o.touchObject.swipeLength>=o.touchObject.minSwipe){switch(t=o.swipeDirection()){case"left":case"down":e=o.options.swipeToSlide?o.checkNavigable(o.currentSlide+o.getSlideCount()):o.currentSlide+o.getSlideCount(),o.currentDirection=0;break;case"right":case"up":e=o.options.swipeToSlide?o.checkNavigable(o.currentSlide-o.getSlideCount()):o.currentSlide-o.getSlideCount(),o.currentDirection=1}"vertical"!=t&&(o.slideHandler(e),o.touchObject={},o.$slider.trigger("swipe",[o,t]))}else o.touchObject.startX!==o.touchObject.curX&&(o.slideHandler(o.currentSlide),o.touchObject={})},e.prototype.swipeHandler=function(i){var e=this;if(!(!1===e.options.swipe||"ontouchend"in document&&!1===e.options.swipe||!1===e.options.draggable&&-1!==i.type.indexOf("mouse")))switch(e.touchObject.fingerCount=i.originalEvent&&void 0!==i.originalEvent.touches?i.originalEvent.touches.length:1,e.touchObject.minSwipe=e.listWidth/e.options.touchThreshold,!0===e.options.verticalSwiping&&(e.touchObject.minSwipe=e.listHeight/e.options.touchThreshold),i.data.action){case"start":e.swipeStart(i);break;case"move":e.swipeMove(i);break;case"end":e.swipeEnd(i)}},e.prototype.swipeMove=function(i){var e,t,o,s,n,r,l=this;return n=void 0!==i.originalEvent?i.originalEvent.touches:null,!(!l.dragging||l.scrolling||n&&1!==n.length)&&(e=l.getLeft(l.currentSlide),l.touchObject.curX=void 0!==n?n[0].pageX:i.clientX,l.touchObject.curY=void 0!==n?n[0].pageY:i.clientY,l.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(l.touchObject.curX-l.touchObject.startX,2))),r=Math.round(Math.sqrt(Math.pow(l.touchObject.curY-l.touchObject.startY,2))),!l.options.verticalSwiping&&!l.swiping&&r>4?(l.scrolling=!0,!1):(!0===l.options.verticalSwiping&&(l.touchObject.swipeLength=r),t=l.swipeDirection(),void 0!==i.originalEvent&&l.touchObject.swipeLength>4&&(l.swiping=!0,i.preventDefault()),s=(!1===l.options.rtl?1:-1)*(l.touchObject.curX>l.touchObject.startX?1:-1),!0===l.options.verticalSwiping&&(s=l.touchObject.curY>l.touchObject.startY?1:-1),o=l.touchObject.swipeLength,l.touchObject.edgeHit=!1,!1===l.options.infinite&&(0===l.currentSlide&&"right"===t||l.currentSlide>=l.getDotCount()&&"left"===t)&&(o=l.touchObject.swipeLength*l.options.edgeFriction,l.touchObject.edgeHit=!0),!1===l.options.vertical?l.swipeLeft=e+o*s:l.swipeLeft=e+o*(l.$list.height()/l.listWidth)*s,!0===l.options.verticalSwiping&&(l.swipeLeft=e+o*s),!0!==l.options.fade&&!1!==l.options.touchMove&&(!0===l.animating?(l.swipeLeft=null,!1):void l.setCSS(l.swipeLeft))))},e.prototype.swipeStart=function(i){var e,t=this;if(t.interrupted=!0,1!==t.touchObject.fingerCount||t.slideCount<=t.options.slidesToShow)return t.touchObject={},!1;void 0!==i.originalEvent&&void 0!==i.originalEvent.touches&&(e=i.originalEvent.touches[0]),t.touchObject.startX=t.touchObject.curX=void 0!==e?e.pageX:i.clientX,t.touchObject.startY=t.touchObject.curY=void 0!==e?e.pageY:i.clientY,t.dragging=!0},e.prototype.unfilterSlides=e.prototype.slickUnfilter=function(){var i=this;null!==i.$slidesCache&&(i.unload(),i.$slideTrack.children(this.options.slide).detach(),i.$slidesCache.appendTo(i.$slideTrack),i.reinit())},e.prototype.unload=function(){var e=this;i(".slick-cloned",e.$slider).remove(),e.$dots&&e.$dots.remove(),e.$prevArrow&&e.htmlExpr.test(e.options.prevArrow)&&e.$prevArrow.remove(),e.$nextArrow&&e.htmlExpr.test(e.options.nextArrow)&&e.$nextArrow.remove(),e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden","true").css("width","")},e.prototype.unslick=function(i){var e=this;e.$slider.trigger("unslick",[e,i]),e.destroy()},e.prototype.updateArrows=function(){var i=this;Math.floor(i.options.slidesToShow/2),!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&!i.options.infinite&&(i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false"),i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false"),0===i.currentSlide?(i.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false")):i.currentSlide>=i.slideCount-i.options.slidesToShow&&!1===i.options.centerMode?(i.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")):i.currentSlide>=i.slideCount-1&&!0===i.options.centerMode&&(i.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")))},e.prototype.updateDots=function(){var i=this;null!==i.$dots&&(i.$dots.find("li").removeClass("slick-active").end(),i.$dots.find("li").eq(Math.floor(i.currentSlide/i.options.slidesToScroll)).addClass("slick-active"))},e.prototype.visibility=function(){var i=this;i.options.autoplay&&(document[i.hidden]?i.interrupted=!0:i.interrupted=!1)},i.fn.slick=function(){var i,t,o=this,s=arguments[0],n=Array.prototype.slice.call(arguments,1),r=o.length;for(i=0;i<r;i++)if("object"==typeof s||void 0===s?o[i].slick=new e(o[i],s):t=o[i].slick[s].apply(o[i].slick,n),void 0!==t)return t;return o}});

/* End */
;
; /* Start:"a:4:{s:4:"full";s:67:"/local/templates/arlight/js/plyr.polyfilled.min.js?1657207552131169";s:6:"source";s:50:"/local/templates/arlight/js/plyr.polyfilled.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
"object"==typeof navigator&&function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define("Plyr",t):e.Plyr=t()}(this,function(){"use strict";!function(){if("undefined"!=typeof window)try{var e=new window.CustomEvent("test",{cancelable:!0});if(e.preventDefault(),!0!==e.defaultPrevented)throw new Error("Could not prevent default")}catch(e){var t=function(e,t){var n,i;return t=t||{bubbles:!1,cancelable:!1,detail:void 0},(n=document.createEvent("CustomEvent")).initCustomEvent(e,t.bubbles,t.cancelable,t.detail),i=n.preventDefault,n.preventDefault=function(){i.call(this);try{Object.defineProperty(this,"defaultPrevented",{get:function(){return!0}})}catch(e){this.defaultPrevented=!0}},n};t.prototype=window.Event.prototype,window.CustomEvent=t}}();var e="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:{};function t(e,t){return e(t={exports:{}},t.exports),t.exports}!function(e){var t=function(){try{return!!Symbol.iterator}catch(e){return!1}}(),n=function(e){var n={next:function(){var t=e.shift();return{done:void 0===t,value:t}}};return t&&(n[Symbol.iterator]=function(){return n}),n},i=function(e){return encodeURIComponent(e).replace(/%20/g,"+")},r=function(e){return decodeURIComponent(e).replace(/\+/g," ")};"URLSearchParams"in e&&"a=1"===new URLSearchParams("?a=1").toString()||function(){var o=function(e){if(Object.defineProperty(this,"_entries",{writable:!0,value:{}}),"string"==typeof e)""!==e&&this._fromString(e);else if(e instanceof o){var t=this;e.forEach(function(e,n){t.append(n,e)})}},a=o.prototype;a.append=function(e,t){e in this._entries?this._entries[e].push(t.toString()):this._entries[e]=[t.toString()]},a.delete=function(e){delete this._entries[e]},a.get=function(e){return e in this._entries?this._entries[e][0]:null},a.getAll=function(e){return e in this._entries?this._entries[e].slice(0):[]},a.has=function(e){return e in this._entries},a.set=function(e,t){this._entries[e]=[t.toString()]},a.forEach=function(e,t){var n;for(var i in this._entries)if(this._entries.hasOwnProperty(i)){n=this._entries[i];for(var r=0;r<n.length;r++)e.call(t,n[r],i,this)}},a.keys=function(){var e=[];return this.forEach(function(t,n){e.push(n)}),n(e)},a.values=function(){var e=[];return this.forEach(function(t){e.push(t)}),n(e)},a.entries=function(){var e=[];return this.forEach(function(t,n){e.push([n,t])}),n(e)},t&&(a[Symbol.iterator]=a.entries),a.toString=function(){var e=[];return this.forEach(function(t,n){e.push(i(n)+"="+i(t))}),e.join("&")},Object.defineProperty(a,"_fromString",{enumerable:!1,configurable:!1,writable:!1,value:function(e){this._entries={};for(var t,n=(e=e.replace(/^\?/,"")).split("&"),i=0;i<n.length;i++)t=n[i].split("="),this.append(r(t[0]),t.length>1?r(t[1]):"")}}),e.URLSearchParams=o}(),"function"!=typeof URLSearchParams.prototype.sort&&(URLSearchParams.prototype.sort=function(){var e=this,t=[];this.forEach(function(n,i){t.push([i,n]),e._entries||e.delete(i)}),t.sort(function(e,t){return e[0]<t[0]?-1:e[0]>t[0]?1:0}),e._entries&&(e._entries={});for(var n=0;n<t.length;n++)this.append(t[n][0],t[n][1])})}(void 0!==e?e:"undefined"!=typeof window?window:"undefined"!=typeof self?self:e),function(e){if(function(){try{var e=new URL("b","http://a");return e.pathname="c%20d","http://a/c%20d"===e.href&&e.searchParams}catch(e){return!1}}()||function(){var t=e.URL,n=function(t,n){"string"!=typeof t&&(t=String(t));var i,r=document;if(n&&(void 0===e.location||n!==e.location.href)){(i=(r=document.implementation.createHTMLDocument("")).createElement("base")).href=n,r.head.appendChild(i);try{if(0!==i.href.indexOf(n))throw new Error(i.href)}catch(e){throw new Error("URL unable to set base "+n+" due to "+e)}}var o=r.createElement("a");if(o.href=t,i&&(r.body.appendChild(o),o.href=o.href),":"===o.protocol||!/:/.test(o.href))throw new TypeError("Invalid URL");Object.defineProperty(this,"_anchorElement",{value:o});var a=new URLSearchParams(this.search),s=!0,l=!0,c=this;["append","delete","set"].forEach(function(e){var t=a[e];a[e]=function(){t.apply(a,arguments),s&&(l=!1,c.search=a.toString(),l=!0)}}),Object.defineProperty(this,"searchParams",{value:a,enumerable:!0});var u=void 0;Object.defineProperty(this,"_updateSearchParams",{enumerable:!1,configurable:!1,writable:!1,value:function(){this.search!==u&&(u=this.search,l&&(s=!1,this.searchParams._fromString(this.search),s=!0))}})},i=n.prototype;["hash","host","hostname","port","protocol"].forEach(function(e){!function(e){Object.defineProperty(i,e,{get:function(){return this._anchorElement[e]},set:function(t){this._anchorElement[e]=t},enumerable:!0})}(e)}),Object.defineProperty(i,"search",{get:function(){return this._anchorElement.search},set:function(e){this._anchorElement.search=e,this._updateSearchParams()},enumerable:!0}),Object.defineProperties(i,{toString:{get:function(){var e=this;return function(){return e.href}}},href:{get:function(){return this._anchorElement.href.replace(/\?$/,"")},set:function(e){this._anchorElement.href=e,this._updateSearchParams()},enumerable:!0},pathname:{get:function(){return this._anchorElement.pathname.replace(/(^\/?)/,"/")},set:function(e){this._anchorElement.pathname=e},enumerable:!0},origin:{get:function(){var e={"http:":80,"https:":443,"ftp:":21}[this._anchorElement.protocol],t=this._anchorElement.port!=e&&""!==this._anchorElement.port;return this._anchorElement.protocol+"//"+this._anchorElement.hostname+(t?":"+this._anchorElement.port:"")},enumerable:!0},password:{get:function(){return""},set:function(e){},enumerable:!0},username:{get:function(){return""},set:function(e){},enumerable:!0}}),n.createObjectURL=function(e){return t.createObjectURL.apply(t,arguments)},n.revokeObjectURL=function(e){return t.revokeObjectURL.apply(t,arguments)},e.URL=n}(),void 0!==e.location&&!("origin"in e.location)){var t=function(){return e.location.protocol+"//"+e.location.hostname+(e.location.port?":"+e.location.port:"")};try{Object.defineProperty(e.location,"origin",{get:t,enumerable:!0})}catch(n){setInterval(function(){e.location.origin=t()},100)}}}(void 0!==e?e:"undefined"!=typeof window?window:"undefined"!=typeof self?self:e);var n=function(e){if("function"!=typeof e)throw TypeError(e+" is not a function!");return e},i=function(e,t,i){if(n(e),void 0===t)return e;switch(i){case 1:return function(n){return e.call(t,n)};case 2:return function(n,i){return e.call(t,n,i)};case 3:return function(n,i,r){return e.call(t,n,i,r)}}return function(){return e.apply(t,arguments)}},r=t(function(e){var t=e.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=t)}),o=t(function(e){var t=e.exports={version:"2.5.7"};"number"==typeof __e&&(__e=t)}),a=(o.version,function(e){return"object"==typeof e?null!==e:"function"==typeof e}),s=function(e){if(!a(e))throw TypeError(e+" is not an object!");return e},l=function(e){try{return!!e()}catch(e){return!0}},c=!l(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}),u=r.document,d=a(u)&&a(u.createElement),h=function(e){return d?u.createElement(e):{}},f=!c&&!l(function(){return 7!=Object.defineProperty(h("div"),"a",{get:function(){return 7}}).a}),p=function(e,t){if(!a(e))return e;var n,i;if(t&&"function"==typeof(n=e.toString)&&!a(i=n.call(e)))return i;if("function"==typeof(n=e.valueOf)&&!a(i=n.call(e)))return i;if(!t&&"function"==typeof(n=e.toString)&&!a(i=n.call(e)))return i;throw TypeError("Can't convert object to primitive value")},m=Object.defineProperty,g={f:c?Object.defineProperty:function(e,t,n){if(s(e),t=p(t,!0),s(n),f)try{return m(e,t,n)}catch(e){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(e[t]=n.value),e}},y=function(e,t){return{enumerable:!(1&e),configurable:!(2&e),writable:!(4&e),value:t}},v=c?function(e,t,n){return g.f(e,t,y(1,n))}:function(e,t,n){return e[t]=n,e},b={}.hasOwnProperty,k=function(e,t){return b.call(e,t)},w=0,T=Math.random(),E=function(e){return"Symbol(".concat(void 0===e?"":e,")_",(++w+T).toString(36))},A=t(function(e){var t=E("src"),n=Function.toString,i=(""+n).split("toString");o.inspectSource=function(e){return n.call(e)},(e.exports=function(e,n,o,a){var s="function"==typeof o;s&&(k(o,"name")||v(o,"name",n)),e[n]!==o&&(s&&(k(o,t)||v(o,t,e[n]?""+e[n]:i.join(String(n)))),e===r?e[n]=o:a?e[n]?e[n]=o:v(e,n,o):(delete e[n],v(e,n,o)))})(Function.prototype,"toString",function(){return"function"==typeof this&&this[t]||n.call(this)})}),_=function(e,t,n){var a,s,l,c,u=e&_.F,d=e&_.G,h=e&_.S,f=e&_.P,p=e&_.B,m=d?r:h?r[t]||(r[t]={}):(r[t]||{}).prototype,g=d?o:o[t]||(o[t]={}),y=g.prototype||(g.prototype={});for(a in d&&(n=t),n)l=((s=!u&&m&&void 0!==m[a])?m:n)[a],c=p&&s?i(l,r):f&&"function"==typeof l?i(Function.call,l):l,m&&A(m,a,l,e&_.U),g[a]!=l&&v(g,a,c),f&&y[a]!=l&&(y[a]=l)};r.core=o,_.F=1,_.G=2,_.S=4,_.P=8,_.B=16,_.W=32,_.U=64,_.R=128;var S=_,P=function(e){if(null==e)throw TypeError("Can't call method on  "+e);return e},C=function(e){return Object(P(e))},L=function(e,t,n,i){try{return i?t(s(n)[0],n[1]):t(n)}catch(t){var r=e.return;throw void 0!==r&&s(r.call(e)),t}},M={},N=t(function(e){var t=r["__core-js_shared__"]||(r["__core-js_shared__"]={});(e.exports=function(e,n){return t[e]||(t[e]=void 0!==n?n:{})})("versions",[]).push({version:o.version,mode:"global",copyright:"© 2018 Denis Pushkarev (zloirock.ru)"})}),x=t(function(e){var t=N("wks"),n=r.Symbol,i="function"==typeof n;(e.exports=function(e){return t[e]||(t[e]=i&&n[e]||(i?n:E)("Symbol."+e))}).store=t}),O=x("iterator"),j=Array.prototype,I=function(e){return void 0!==e&&(M.Array===e||j[O]===e)},R=Math.ceil,F=Math.floor,D=function(e){return isNaN(e=+e)?0:(e>0?F:R)(e)},q=Math.min,V=function(e){return e>0?q(D(e),9007199254740991):0},B=function(e,t,n){t in e?g.f(e,t,y(0,n)):e[t]=n},H={}.toString,U=function(e){return H.call(e).slice(8,-1)},W=x("toStringTag"),K="Arguments"==U(function(){return arguments}()),z=function(e){var t,n,i;return void 0===e?"Undefined":null===e?"Null":"string"==typeof(n=function(e,t){try{return e[t]}catch(e){}}(t=Object(e),W))?n:K?U(t):"Object"==(i=U(t))&&"function"==typeof t.callee?"Arguments":i},Y=x("iterator"),G=o.getIteratorMethod=function(e){if(null!=e)return e[Y]||e["@@iterator"]||M[z(e)]},$=x("iterator"),J=!1;try{[7][$]().return=function(){J=!0}}catch(e){}var Q=function(e,t){if(!t&&!J)return!1;var n=!1;try{var i=[7],r=i[$]();r.next=function(){return{done:n=!0}},i[$]=function(){return r},e(i)}catch(e){}return n};S(S.S+S.F*!Q(function(e){}),"Array",{from:function(e){var t,n,r,o,a=C(e),s="function"==typeof this?this:Array,l=arguments.length,c=l>1?arguments[1]:void 0,u=void 0!==c,d=0,h=G(a);if(u&&(c=i(c,l>2?arguments[2]:void 0,2)),null==h||s==Array&&I(h))for(n=new s(t=V(a.length));t>d;d++)B(n,d,u?c(a[d],d):a[d]);else for(o=h.call(a),n=new s;!(r=o.next()).done;d++)B(n,d,u?L(o,c,[r.value,d],!0):r.value);return n.length=d,n}});var X=Object("z").propertyIsEnumerable(0)?Object:function(e){return"String"==U(e)?e.split(""):Object(e)},Z=Array.isArray||function(e){return"Array"==U(e)},ee=x("species"),te=function(e,t){return new(function(e){var t;return Z(e)&&("function"!=typeof(t=e.constructor)||t!==Array&&!Z(t.prototype)||(t=void 0),a(t)&&null===(t=t[ee])&&(t=void 0)),void 0===t?Array:t}(e))(t)},ne=function(e,t){var n=1==e,r=2==e,o=3==e,a=4==e,s=6==e,l=5==e||s,c=t||te;return function(t,u,d){for(var h,f,p=C(t),m=X(p),g=i(u,d,3),y=V(m.length),v=0,b=n?c(t,y):r?c(t,0):void 0;y>v;v++)if((l||v in m)&&(f=g(h=m[v],v,p),e))if(n)b[v]=f;else if(f)switch(e){case 3:return!0;case 5:return h;case 6:return v;case 2:b.push(h)}else if(a)return!1;return s?-1:o||a?a:b}},ie=x("unscopables"),re=Array.prototype;null==re[ie]&&v(re,ie,{});var oe=function(e){re[ie][e]=!0},ae=ne(5),se=!0;"find"in[]&&Array(1).find(function(){se=!1}),S(S.P+S.F*se,"Array",{find:function(e){return ae(this,e,arguments.length>1?arguments[1]:void 0)}}),oe("find");var le={f:{}.propertyIsEnumerable},ce=function(e){return X(P(e))},ue=Object.getOwnPropertyDescriptor,de={f:c?ue:function(e,t){if(e=ce(e),t=p(t,!0),f)try{return ue(e,t)}catch(e){}if(k(e,t))return y(!le.f.call(e,t),e[t])}},he=function(e,t){if(s(e),!a(t)&&null!==t)throw TypeError(t+": can't set as prototype!")},fe={set:Object.setPrototypeOf||("__proto__"in{}?function(e,t,n){try{(n=i(Function.call,de.f(Object.prototype,"__proto__").set,2))(e,[]),t=!(e instanceof Array)}catch(e){t=!0}return function(e,i){return he(e,i),t?e.__proto__=i:n(e,i),e}}({},!1):void 0),check:he}.set,pe=function(e,t,n){var i,r=t.constructor;return r!==n&&"function"==typeof r&&(i=r.prototype)!==n.prototype&&a(i)&&fe&&fe(e,i),e},me=Math.max,ge=Math.min,ye=function(e){return function(t,n,i){var r,o=ce(t),a=V(o.length),s=function(e,t){return(e=D(e))<0?me(e+t,0):ge(e,t)}(i,a);if(e&&n!=n){for(;a>s;)if((r=o[s++])!=r)return!0}else for(;a>s;s++)if((e||s in o)&&o[s]===n)return e||s||0;return!e&&-1}},ve=N("keys"),be=function(e){return ve[e]||(ve[e]=E(e))},ke=ye(!1),we=be("IE_PROTO"),Te=function(e,t){var n,i=ce(e),r=0,o=[];for(n in i)n!=we&&k(i,n)&&o.push(n);for(;t.length>r;)k(i,n=t[r++])&&(~ke(o,n)||o.push(n));return o},Ee="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(","),Ae=Ee.concat("length","prototype"),_e={f:Object.getOwnPropertyNames||function(e){return Te(e,Ae)}},Se="\t\n\v\f\r   ᠎             　\u2028\u2029\ufeff",Pe="["+Se+"]",Ce=RegExp("^"+Pe+Pe+"*"),Le=RegExp(Pe+Pe+"*$"),Me=function(e,t,n){var i={},r=l(function(){return!!Se[e]()||"​"!="​"[e]()}),o=i[e]=r?t(Ne):Se[e];n&&(i[n]=o),S(S.P+S.F*r,"String",i)},Ne=Me.trim=function(e,t){return e=String(P(e)),1&t&&(e=e.replace(Ce,"")),2&t&&(e=e.replace(Le,"")),e},xe=Me,Oe=Object.keys||function(e){return Te(e,Ee)},je=c?Object.defineProperties:function(e,t){s(e);for(var n,i=Oe(t),r=i.length,o=0;r>o;)g.f(e,n=i[o++],t[n]);return e},Ie=r.document,Re=Ie&&Ie.documentElement,Fe=be("IE_PROTO"),De=function(){},qe=function(){var e,t=h("iframe"),n=Ee.length;for(t.style.display="none",Re.appendChild(t),t.src="javascript:",(e=t.contentWindow.document).open(),e.write("<script>document.F=Object<\/script>"),e.close(),qe=e.F;n--;)delete qe.prototype[Ee[n]];return qe()},Ve=Object.create||function(e,t){var n;return null!==e?(De.prototype=s(e),n=new De,De.prototype=null,n[Fe]=e):n=qe(),void 0===t?n:je(n,t)},Be=_e.f,He=de.f,Ue=g.f,We=xe.trim,Ke=r.Number,ze=Ke,Ye=Ke.prototype,Ge="Number"==U(Ve(Ye)),$e="trim"in String.prototype,Je=function(e){var t=p(e,!1);if("string"==typeof t&&t.length>2){var n,i,r,o=(t=$e?t.trim():We(t,3)).charCodeAt(0);if(43===o||45===o){if(88===(n=t.charCodeAt(2))||120===n)return NaN}else if(48===o){switch(t.charCodeAt(1)){case 66:case 98:i=2,r=49;break;case 79:case 111:i=8,r=55;break;default:return+t}for(var a,s=t.slice(2),l=0,c=s.length;l<c;l++)if((a=s.charCodeAt(l))<48||a>r)return NaN;return parseInt(s,i)}}return+t};if(!Ke(" 0o1")||!Ke("0b1")||Ke("+0x1")){Ke=function(e){var t=arguments.length<1?0:e,n=this;return n instanceof Ke&&(Ge?l(function(){Ye.valueOf.call(n)}):"Number"!=U(n))?pe(new ze(Je(t)),n,Ke):Je(t)};for(var Qe,Xe=c?Be(ze):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger".split(","),Ze=0;Xe.length>Ze;Ze++)k(ze,Qe=Xe[Ze])&&!k(Ke,Qe)&&Ue(Ke,Qe,He(ze,Qe));Ke.prototype=Ye,Ye.constructor=Ke,A(r,"Number",Ke)}!function(e,t){var n=(o.Object||{})[e]||Object[e],i={};i[e]=t(n),S(S.S+S.F*l(function(){n(1)}),"Object",i)}("keys",function(){return function(e){return Oe(C(e))}});var et=x("match"),tt=function(e){var t;return a(e)&&(void 0!==(t=e[et])?!!t:"RegExp"==U(e))},nt=function(e,t,n){if(tt(t))throw TypeError("String#"+n+" doesn't accept regex!");return String(P(e))},it=x("match"),rt=function(e){var t=/./;try{"/./"[e](t)}catch(n){try{return t[it]=!1,!"/./"[e](t)}catch(e){}}return!0};S(S.P+S.F*rt("includes"),"String",{includes:function(e){return!!~nt(this,e,"includes").indexOf(e,arguments.length>1?arguments[1]:void 0)}});var ot=ye(!0);S(S.P,"Array",{includes:function(e){return ot(this,e,arguments.length>1?arguments[1]:void 0)}}),oe("includes");var at=function(e,t,n){var i=x(e),r=n(P,i,""[e]),o=r[0],a=r[1];l(function(){var t={};return t[i]=function(){return 7},7!=""[e](t)})&&(A(String.prototype,e,o),v(RegExp.prototype,i,2==t?function(e,t){return a.call(e,this,t)}:function(e){return a.call(e,this)}))};at("search",1,function(e,t,n){return[function(n){var i=e(this),r=null==n?void 0:n[t];return void 0!==r?r.call(n,i):new RegExp(n)[t](String(i))},n]});var st=function(){var e=s(this),t="";return e.global&&(t+="g"),e.ignoreCase&&(t+="i"),e.multiline&&(t+="m"),e.unicode&&(t+="u"),e.sticky&&(t+="y"),t};c&&"g"!=/./g.flags&&g.f(RegExp.prototype,"flags",{configurable:!0,get:st});var lt=/./.toString,ct=function(e){A(RegExp.prototype,"toString",e,!0)};l(function(){return"/a/b"!=lt.call({source:"a",flags:"b"})})?ct(function(){var e=s(this);return"/".concat(e.source,"/","flags"in e?e.flags:!c&&e instanceof RegExp?st.call(e):void 0)}):"toString"!=lt.name&&ct(function(){return lt.call(this)});var ut=function(e,t){return{value:t,done:!!e}},dt=g.f,ht=x("toStringTag"),ft=function(e,t,n){e&&!k(e=n?e:e.prototype,ht)&&dt(e,ht,{configurable:!0,value:t})},pt={};v(pt,x("iterator"),function(){return this});var mt=function(e,t,n){e.prototype=Ve(pt,{next:y(1,n)}),ft(e,t+" Iterator")},gt=be("IE_PROTO"),yt=Object.prototype,vt=Object.getPrototypeOf||function(e){return e=C(e),k(e,gt)?e[gt]:"function"==typeof e.constructor&&e instanceof e.constructor?e.constructor.prototype:e instanceof Object?yt:null},bt=x("iterator"),kt=!([].keys&&"next"in[].keys()),wt=function(){return this},Tt=function(e,t,n,i,r,o,a){mt(n,t,i);var s,l,c,u=function(e){if(!kt&&e in p)return p[e];switch(e){case"keys":case"values":return function(){return new n(this,e)}}return function(){return new n(this,e)}},d=t+" Iterator",h="values"==r,f=!1,p=e.prototype,m=p[bt]||p["@@iterator"]||r&&p[r],g=m||u(r),y=r?h?u("entries"):g:void 0,b="Array"==t&&p.entries||m;if(b&&(c=vt(b.call(new e)))!==Object.prototype&&c.next&&(ft(c,d,!0),"function"!=typeof c[bt]&&v(c,bt,wt)),h&&m&&"values"!==m.name&&(f=!0,g=function(){return m.call(this)}),(kt||f||!p[bt])&&v(p,bt,g),M[t]=g,M[d]=wt,r)if(s={values:h?g:u("values"),keys:o?g:u("keys"),entries:y},a)for(l in s)l in p||A(p,l,s[l]);else S(S.P+S.F*(kt||f),t,s);return s},Et=Tt(Array,"Array",function(e,t){this._t=ce(e),this._i=0,this._k=t},function(){var e=this._t,t=this._k,n=this._i++;return!e||n>=e.length?(this._t=void 0,ut(1)):ut(0,"keys"==t?n:"values"==t?e[n]:[n,e[n]])},"values");M.Arguments=M.Array,oe("keys"),oe("values"),oe("entries");for(var At=x("iterator"),_t=x("toStringTag"),St=M.Array,Pt={CSSRuleList:!0,CSSStyleDeclaration:!1,CSSValueList:!1,ClientRectList:!1,DOMRectList:!1,DOMStringList:!1,DOMTokenList:!0,DataTransferItemList:!1,FileList:!1,HTMLAllCollection:!1,HTMLCollection:!1,HTMLFormElement:!1,HTMLSelectElement:!1,MediaList:!0,MimeTypeArray:!1,NamedNodeMap:!1,NodeList:!0,PaintRequestList:!1,Plugin:!1,PluginArray:!1,SVGLengthList:!1,SVGNumberList:!1,SVGPathSegList:!1,SVGPointList:!1,SVGStringList:!1,SVGTransformList:!1,SourceBufferList:!1,StyleSheetList:!0,TextTrackCueList:!1,TextTrackList:!1,TouchList:!1},Ct=Oe(Pt),Lt=0;Lt<Ct.length;Lt++){var Mt,Nt=Ct[Lt],xt=Pt[Nt],Ot=r[Nt],jt=Ot&&Ot.prototype;if(jt&&(jt[At]||v(jt,At,St),jt[_t]||v(jt,_t,Nt),M[Nt]=St,xt))for(Mt in Et)jt[Mt]||A(jt,Mt,Et[Mt],!0)}var It=function(e){return function(t,n){var i,r,o=String(P(t)),a=D(n),s=o.length;return a<0||a>=s?e?"":void 0:(i=o.charCodeAt(a))<55296||i>56319||a+1===s||(r=o.charCodeAt(a+1))<56320||r>57343?e?o.charAt(a):i:e?o.slice(a,a+2):r-56320+(i-55296<<10)+65536}}(!0);Tt(String,"String",function(e){this._t=String(e),this._i=0},function(){var e,t=this._t,n=this._i;return n>=t.length?{value:void 0,done:!0}:(e=It(t,n),this._i+=e.length,{value:e,done:!1})});var Rt=t(function(e){var t=E("meta"),n=g.f,i=0,r=Object.isExtensible||function(){return!0},o=!l(function(){return r(Object.preventExtensions({}))}),s=function(e){n(e,t,{value:{i:"O"+ ++i,w:{}}})},c=e.exports={KEY:t,NEED:!1,fastKey:function(e,n){if(!a(e))return"symbol"==typeof e?e:("string"==typeof e?"S":"P")+e;if(!k(e,t)){if(!r(e))return"F";if(!n)return"E";s(e)}return e[t].i},getWeak:function(e,n){if(!k(e,t)){if(!r(e))return!0;if(!n)return!1;s(e)}return e[t].w},onFreeze:function(e){return o&&c.NEED&&r(e)&&!k(e,t)&&s(e),e}}}),Ft=(Rt.KEY,Rt.NEED,Rt.fastKey,Rt.getWeak,Rt.onFreeze,{f:Object.getOwnPropertySymbols}),Dt=Object.assign,qt=!Dt||l(function(){var e={},t={},n=Symbol(),i="abcdefghijklmnopqrst";return e[n]=7,i.split("").forEach(function(e){t[e]=e}),7!=Dt({},e)[n]||Object.keys(Dt({},t)).join("")!=i})?function(e,t){for(var n=C(e),i=arguments.length,r=1,o=Ft.f,a=le.f;i>r;)for(var s,l=X(arguments[r++]),c=o?Oe(l).concat(o(l)):Oe(l),u=c.length,d=0;u>d;)a.call(l,s=c[d++])&&(n[s]=l[s]);return n}:Dt,Vt=function(e,t,n){for(var i in t)A(e,i,t[i],n);return e},Bt=function(e,t,n,i){if(!(e instanceof t)||void 0!==i&&i in e)throw TypeError(n+": incorrect invocation!");return e},Ht=t(function(e){var t={},n={},r=e.exports=function(e,r,o,a,l){var c,u,d,h,f=l?function(){return e}:G(e),p=i(o,a,r?2:1),m=0;if("function"!=typeof f)throw TypeError(e+" is not iterable!");if(I(f)){for(c=V(e.length);c>m;m++)if((h=r?p(s(u=e[m])[0],u[1]):p(e[m]))===t||h===n)return h}else for(d=f.call(e);!(u=d.next()).done;)if((h=L(d,p,u.value,r))===t||h===n)return h};r.BREAK=t,r.RETURN=n}),Ut=function(e,t){if(!a(e)||e._t!==t)throw TypeError("Incompatible receiver, "+t+" required!");return e},Wt=Rt.getWeak,Kt=ne(5),zt=ne(6),Yt=0,Gt=function(e){return e._l||(e._l=new $t)},$t=function(){this.a=[]},Jt=function(e,t){return Kt(e.a,function(e){return e[0]===t})};$t.prototype={get:function(e){var t=Jt(this,e);if(t)return t[1]},has:function(e){return!!Jt(this,e)},set:function(e,t){var n=Jt(this,e);n?n[1]=t:this.a.push([e,t])},delete:function(e){var t=zt(this.a,function(t){return t[0]===e});return~t&&this.a.splice(t,1),!!~t}};var Qt={getConstructor:function(e,t,n,i){var r=e(function(e,o){Bt(e,r,t,"_i"),e._t=t,e._i=Yt++,e._l=void 0,null!=o&&Ht(o,n,e[i],e)});return Vt(r.prototype,{delete:function(e){if(!a(e))return!1;var n=Wt(e);return!0===n?Gt(Ut(this,t)).delete(e):n&&k(n,this._i)&&delete n[this._i]},has:function(e){if(!a(e))return!1;var n=Wt(e);return!0===n?Gt(Ut(this,t)).has(e):n&&k(n,this._i)}}),r},def:function(e,t,n){var i=Wt(s(t),!0);return!0===i?Gt(e).set(t,n):i[e._i]=n,e},ufstore:Gt};t(function(e){var t,n=ne(0),i=Rt.getWeak,o=Object.isExtensible,s=Qt.ufstore,c={},u=function(e){return function(){return e(this,arguments.length>0?arguments[0]:void 0)}},d={get:function(e){if(a(e)){var t=i(e);return!0===t?s(Ut(this,"WeakMap")).get(e):t?t[this._i]:void 0}},set:function(e,t){return Qt.def(Ut(this,"WeakMap"),e,t)}},h=e.exports=function(e,t,n,i,o,s){var c=r[e],u=c,d=o?"set":"add",h=u&&u.prototype,f={},p=function(e){var t=h[e];A(h,e,"delete"==e?function(e){return!(s&&!a(e))&&t.call(this,0===e?0:e)}:"has"==e?function(e){return!(s&&!a(e))&&t.call(this,0===e?0:e)}:"get"==e?function(e){return s&&!a(e)?void 0:t.call(this,0===e?0:e)}:"add"==e?function(e){return t.call(this,0===e?0:e),this}:function(e,n){return t.call(this,0===e?0:e,n),this})};if("function"==typeof u&&(s||h.forEach&&!l(function(){(new u).entries().next()}))){var m=new u,g=m[d](s?{}:-0,1)!=m,y=l(function(){m.has(1)}),v=Q(function(e){new u(e)}),b=!s&&l(function(){for(var e=new u,t=5;t--;)e[d](t,t);return!e.has(-0)});v||((u=t(function(t,n){Bt(t,u,e);var i=pe(new c,t,u);return null!=n&&Ht(n,o,i[d],i),i})).prototype=h,h.constructor=u),(y||b)&&(p("delete"),p("has"),o&&p("get")),(b||g)&&p(d),s&&h.clear&&delete h.clear}else u=i.getConstructor(t,e,o,d),Vt(u.prototype,n),Rt.NEED=!0;return ft(u,e),f[e]=u,S(S.G+S.W+S.F*(u!=c),f),s||i.setStrong(u,e,o),u}("WeakMap",u,d,Qt,!0,!0);l(function(){return 7!=(new h).set((Object.freeze||Object)(c),7).get(c)})&&(t=Qt.getConstructor(u,"WeakMap"),qt(t.prototype,d),Rt.NEED=!0,n(["delete","has","get","set"],function(e){var n=h.prototype,i=n[e];A(n,e,function(n,r){if(a(n)&&!o(n)){this._f||(this._f=new t);var s=this._f[e](n,r);return"set"==e?this:s}return i.call(this,n,r)})}))});function Xt(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function Zt(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function en(e,t,n){return t&&Zt(e.prototype,t),n&&Zt(e,n),e}function tn(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function nn(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=[],i=!0,r=!1,o=void 0;try{for(var a,s=e[Symbol.iterator]();!(i=(a=s.next()).done)&&(n.push(a.value),!t||n.length!==t);i=!0);}catch(e){r=!0,o=e}finally{try{i||null==s.return||s.return()}finally{if(r)throw o}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}function rn(e){return function(e){if(Array.isArray(e)){for(var t=0,n=new Array(e.length);t<e.length;t++)n[t]=e[t];return n}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}S(S.S+S.F,"Object",{assign:qt}),at("split",2,function(e,t,n){var i=tt,r=n,o=[].push;if("c"=="abbc".split(/(b)*/)[1]||4!="test".split(/(?:)/,-1).length||2!="ab".split(/(?:ab)*/).length||4!=".".split(/(.?)(.?)/).length||".".split(/()()/).length>1||"".split(/.?/).length){var a=void 0===/()??/.exec("")[1];n=function(e,t){var n=String(this);if(void 0===e&&0===t)return[];if(!i(e))return r.call(n,e,t);var s,l,c,u,d,h=[],f=(e.ignoreCase?"i":"")+(e.multiline?"m":"")+(e.unicode?"u":"")+(e.sticky?"y":""),p=0,m=void 0===t?4294967295:t>>>0,g=new RegExp(e.source,f+"g");for(a||(s=new RegExp("^"+g.source+"$(?!\\s)",f));(l=g.exec(n))&&!((c=l.index+l[0].length)>p&&(h.push(n.slice(p,l.index)),!a&&l.length>1&&l[0].replace(s,function(){for(d=1;d<arguments.length-2;d++)void 0===arguments[d]&&(l[d]=void 0)}),l.length>1&&l.index<n.length&&o.apply(h,l.slice(1)),u=l[0].length,p=c,h.length>=m));)g.lastIndex===l.index&&g.lastIndex++;return p===n.length?!u&&g.test("")||h.push(""):h.push(n.slice(p)),h.length>m?h.slice(0,m):h}}else"0".split(void 0,0).length&&(n=function(e,t){return void 0===e&&0===t?[]:r.call(this,e,t)});return[function(i,r){var o=e(this),a=null==i?void 0:i[t];return void 0!==a?a.call(i,o,r):n.call(String(o),i,r)},n]});var on=le.f,an=function(e){return function(t){for(var n,i=ce(t),r=Oe(i),o=r.length,a=0,s=[];o>a;)on.call(i,n=r[a++])&&s.push(e?[n,i[n]]:i[n]);return s}},sn=an(!0);S(S.S,"Object",{entries:function(e){return sn(e)}});var ln=an(!1);S(S.S,"Object",{values:function(e){return ln(e)}}),at("replace",2,function(e,t,n){return[function(i,r){var o=e(this),a=null==i?void 0:i[t];return void 0!==a?a.call(i,o,r):n.call(String(o),i,r)},n]});var cn,un,dn,hn=x("species"),fn=r.process,pn=r.setImmediate,mn=r.clearImmediate,gn=r.MessageChannel,yn=r.Dispatch,vn=0,bn={},kn=function(){var e=+this;if(bn.hasOwnProperty(e)){var t=bn[e];delete bn[e],t()}},wn=function(e){kn.call(e.data)};pn&&mn||(pn=function(e){for(var t=[],n=1;arguments.length>n;)t.push(arguments[n++]);return bn[++vn]=function(){!function(e,t,n){var i=void 0===n;switch(t.length){case 0:return i?e():e.call(n);case 1:return i?e(t[0]):e.call(n,t[0]);case 2:return i?e(t[0],t[1]):e.call(n,t[0],t[1]);case 3:return i?e(t[0],t[1],t[2]):e.call(n,t[0],t[1],t[2]);case 4:return i?e(t[0],t[1],t[2],t[3]):e.call(n,t[0],t[1],t[2],t[3])}e.apply(n,t)}("function"==typeof e?e:Function(e),t)},cn(vn),vn},mn=function(e){delete bn[e]},"process"==U(fn)?cn=function(e){fn.nextTick(i(kn,e,1))}:yn&&yn.now?cn=function(e){yn.now(i(kn,e,1))}:gn?(dn=(un=new gn).port2,un.port1.onmessage=wn,cn=i(dn.postMessage,dn,1)):r.addEventListener&&"function"==typeof postMessage&&!r.importScripts?(cn=function(e){r.postMessage(e+"","*")},r.addEventListener("message",wn,!1)):cn="onreadystatechange"in h("script")?function(e){Re.appendChild(h("script")).onreadystatechange=function(){Re.removeChild(this),kn.call(e)}}:function(e){setTimeout(i(kn,e,1),0)});var Tn={set:pn,clear:mn},En=Tn.set,An=r.MutationObserver||r.WebKitMutationObserver,_n=r.process,Sn=r.Promise,Pn="process"==U(_n);function Cn(e){var t,i;this.promise=new e(function(e,n){if(void 0!==t||void 0!==i)throw TypeError("Bad Promise constructor");t=e,i=n}),this.resolve=n(t),this.reject=n(i)}var Ln,Mn,Nn,xn,On={f:function(e){return new Cn(e)}},jn=function(e){try{return{e:!1,v:e()}}catch(e){return{e:!0,v:e}}},In=r.navigator,Rn=In&&In.userAgent||"",Fn=x("species"),Dn=function(e){var t=r[e];c&&t&&!t[Fn]&&g.f(t,Fn,{configurable:!0,get:function(){return this}})},qn=Tn.set,Vn=function(){var e,t,n,i=function(){var i,r;for(Pn&&(i=_n.domain)&&i.exit();e;){r=e.fn,e=e.next;try{r()}catch(i){throw e?n():t=void 0,i}}t=void 0,i&&i.enter()};if(Pn)n=function(){_n.nextTick(i)};else if(!An||r.navigator&&r.navigator.standalone)if(Sn&&Sn.resolve){var o=Sn.resolve(void 0);n=function(){o.then(i)}}else n=function(){En.call(r,i)};else{var a=!0,s=document.createTextNode("");new An(i).observe(s,{characterData:!0}),n=function(){s.data=a=!a}}return function(i){var r={fn:i,next:void 0};t&&(t.next=r),e||(e=r,n()),t=r}}(),Bn=r.TypeError,Hn=r.process,Un=Hn&&Hn.versions,Wn=Un&&Un.v8||"",Kn=r.Promise,zn="process"==z(Hn),Yn=function(){},Gn=Mn=On.f,$n=!!function(){try{var e=Kn.resolve(1),t=(e.constructor={})[x("species")]=function(e){e(Yn,Yn)};return(zn||"function"==typeof PromiseRejectionEvent)&&e.then(Yn)instanceof t&&0!==Wn.indexOf("6.6")&&-1===Rn.indexOf("Chrome/66")}catch(e){}}(),Jn=function(e){var t;return!(!a(e)||"function"!=typeof(t=e.then))&&t},Qn=function(e,t){if(!e._n){e._n=!0;var n=e._c;Vn(function(){for(var i=e._v,r=1==e._s,o=0,a=function(t){var n,o,a,s=r?t.ok:t.fail,l=t.resolve,c=t.reject,u=t.domain;try{s?(r||(2==e._h&&ei(e),e._h=1),!0===s?n=i:(u&&u.enter(),n=s(i),u&&(u.exit(),a=!0)),n===t.promise?c(Bn("Promise-chain cycle")):(o=Jn(n))?o.call(n,l,c):l(n)):c(i)}catch(e){u&&!a&&u.exit(),c(e)}};n.length>o;)a(n[o++]);e._c=[],e._n=!1,t&&!e._h&&Xn(e)})}},Xn=function(e){qn.call(r,function(){var t,n,i,o=e._v,a=Zn(e);if(a&&(t=jn(function(){zn?Hn.emit("unhandledRejection",o,e):(n=r.onunhandledrejection)?n({promise:e,reason:o}):(i=r.console)&&i.error&&i.error("Unhandled promise rejection",o)}),e._h=zn||Zn(e)?2:1),e._a=void 0,a&&t.e)throw t.v})},Zn=function(e){return 1!==e._h&&0===(e._a||e._c).length},ei=function(e){qn.call(r,function(){var t;zn?Hn.emit("rejectionHandled",e):(t=r.onrejectionhandled)&&t({promise:e,reason:e._v})})},ti=function(e){var t=this;t._d||(t._d=!0,(t=t._w||t)._v=e,t._s=2,t._a||(t._a=t._c.slice()),Qn(t,!0))},ni=function(e){var t,n=this;if(!n._d){n._d=!0,n=n._w||n;try{if(n===e)throw Bn("Promise can't be resolved itself");(t=Jn(e))?Vn(function(){var r={_w:n,_d:!1};try{t.call(e,i(ni,r,1),i(ti,r,1))}catch(e){ti.call(r,e)}}):(n._v=e,n._s=1,Qn(n,!1))}catch(e){ti.call({_w:n,_d:!1},e)}}};$n||(Kn=function(e){Bt(this,Kn,"Promise","_h"),n(e),Ln.call(this);try{e(i(ni,this,1),i(ti,this,1))}catch(e){ti.call(this,e)}},(Ln=function(e){this._c=[],this._a=void 0,this._s=0,this._d=!1,this._v=void 0,this._h=0,this._n=!1}).prototype=Vt(Kn.prototype,{then:function(e,t){var i,r,o,a=Gn((i=Kn,void 0===(o=s(this).constructor)||null==(r=s(o)[hn])?i:n(r)));return a.ok="function"!=typeof e||e,a.fail="function"==typeof t&&t,a.domain=zn?Hn.domain:void 0,this._c.push(a),this._a&&this._a.push(a),this._s&&Qn(this,!1),a.promise},catch:function(e){return this.then(void 0,e)}}),Nn=function(){var e=new Ln;this.promise=e,this.resolve=i(ni,e,1),this.reject=i(ti,e,1)},On.f=Gn=function(e){return e===Kn||e===xn?new Nn(e):Mn(e)}),S(S.G+S.W+S.F*!$n,{Promise:Kn}),ft(Kn,"Promise"),Dn("Promise"),xn=o.Promise,S(S.S+S.F*!$n,"Promise",{reject:function(e){var t=Gn(this);return(0,t.reject)(e),t.promise}}),S(S.S+S.F*!$n,"Promise",{resolve:function(e){return function(e,t){if(s(e),a(t)&&t.constructor===e)return t;var n=On.f(e);return(0,n.resolve)(t),n.promise}(this,e)}}),S(S.S+S.F*!($n&&Q(function(e){Kn.all(e).catch(Yn)})),"Promise",{all:function(e){var t=this,n=Gn(t),i=n.resolve,r=n.reject,o=jn(function(){var n=[],o=0,a=1;Ht(e,!1,function(e){var s=o++,l=!1;n.push(void 0),a++,t.resolve(e).then(function(e){l||(l=!0,n[s]=e,--a||i(n))},r)}),--a||i(n)});return o.e&&r(o.v),n.promise},race:function(e){var t=this,n=Gn(t),i=n.reject,r=jn(function(){Ht(e,!1,function(e){t.resolve(e).then(n.resolve,i)})});return r.e&&i(r.v),n.promise}});var ii="".startsWith;S(S.P+S.F*rt("startsWith"),"String",{startsWith:function(e){var t=nt(this,e,"startsWith"),n=V(Math.min(arguments.length>1?arguments[1]:void 0,t.length)),i=String(e);return ii?ii.call(t,i,n):t.slice(n,n+i.length)===i}}),S(S.S,"Number",{isNaN:function(e){return e!=e}});var ri=function(e){return null!=e?e.constructor:null},oi=function(e,t){return Boolean(e&&t&&e instanceof t)},ai=function(e){return null==e},si=function(e){return ri(e)===Object},li=function(e){return ri(e)===String},ci=function(e){return Array.isArray(e)},ui=function(e){return oi(e,NodeList)},di=function(e){return ai(e)||(li(e)||ci(e)||ui(e))&&!e.length||si(e)&&!Object.keys(e).length},hi={nullOrUndefined:ai,object:si,number:function(e){return ri(e)===Number&&!Number.isNaN(e)},string:li,boolean:function(e){return ri(e)===Boolean},function:function(e){return ri(e)===Function},array:ci,weakMap:function(e){return oi(e,WeakMap)},nodeList:ui,element:function(e){return oi(e,Element)},textNode:function(e){return ri(e)===Text},event:function(e){return oi(e,Event)},keyboardEvent:function(e){return oi(e,KeyboardEvent)},cue:function(e){return oi(e,window.TextTrackCue)||oi(e,window.VTTCue)},track:function(e){return oi(e,TextTrack)||!ai(e)&&li(e.kind)},url:function(e){if(oi(e,window.URL))return!0;if(!li(e))return!1;var t=e;e.startsWith("http://")&&e.startsWith("https://")||(t="http://".concat(e));try{return!di(new URL(t).hostname)}catch(e){return!1}},empty:di},fi=function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){return e=!0,null}});window.addEventListener("test",null,t),window.removeEventListener("test",null,t)}catch(e){}return e}();function pi(e,t,n){var i=this,r=arguments.length>3&&void 0!==arguments[3]&&arguments[3],o=!(arguments.length>4&&void 0!==arguments[4])||arguments[4],a=arguments.length>5&&void 0!==arguments[5]&&arguments[5];if(e&&"addEventListener"in e&&!hi.empty(t)&&hi.function(n)){var s=t.split(" "),l=a;fi&&(l={passive:o,capture:a}),s.forEach(function(t){i&&i.eventListeners&&r&&i.eventListeners.push({element:e,type:t,callback:n,options:l}),e[r?"addEventListener":"removeEventListener"](t,n,l)})}}function mi(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2?arguments[2]:void 0,i=!(arguments.length>3&&void 0!==arguments[3])||arguments[3],r=arguments.length>4&&void 0!==arguments[4]&&arguments[4];pi.call(this,e,t,n,!0,i,r)}function gi(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2?arguments[2]:void 0,i=!(arguments.length>3&&void 0!==arguments[3])||arguments[3],r=arguments.length>4&&void 0!==arguments[4]&&arguments[4];pi.call(this,e,t,n,!1,i,r)}function yi(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2?arguments[2]:void 0,i=!(arguments.length>3&&void 0!==arguments[3])||arguments[3],r=arguments.length>4&&void 0!==arguments[4]&&arguments[4];pi.call(this,e,t,function o(){gi(e,t,o,i,r);for(var a=arguments.length,s=new Array(a),l=0;l<a;l++)s[l]=arguments[l];n.apply(this,s)},!0,i,r)}function vi(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2&&void 0!==arguments[2]&&arguments[2],i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:{};if(hi.element(e)&&!hi.empty(t)){var r=new CustomEvent(t,{bubbles:n,detail:Object.assign({},i,{plyr:this})});e.dispatchEvent(r)}}function bi(e,t){var n=e.length?e:[e];Array.from(n).reverse().forEach(function(e,n){var i=n>0?t.cloneNode(!0):t,r=e.parentNode,o=e.nextSibling;i.appendChild(e),o?r.insertBefore(i,o):r.appendChild(i)})}function ki(e,t){hi.element(e)&&!hi.empty(t)&&Object.entries(t).filter(function(e){var t=nn(e,2)[1];return!hi.nullOrUndefined(t)}).forEach(function(t){var n=nn(t,2),i=n[0],r=n[1];return e.setAttribute(i,r)})}function wi(e,t,n){var i=document.createElement(e);return hi.object(t)&&ki(i,t),hi.string(n)&&(i.innerText=n),i}function Ti(e,t,n,i){hi.element(t)&&t.appendChild(wi(e,n,i))}function Ei(e){hi.nodeList(e)||hi.array(e)?Array.from(e).forEach(Ei):hi.element(e)&&hi.element(e.parentNode)&&e.parentNode.removeChild(e)}function Ai(e){if(hi.element(e))for(var t=e.childNodes.length;t>0;)e.removeChild(e.lastChild),t-=1}function _i(e,t){return hi.element(t)&&hi.element(t.parentNode)&&hi.element(e)?(t.parentNode.replaceChild(e,t),e):null}function Si(e,t){if(!hi.string(e)||hi.empty(e))return{};var n={},i=t;return e.split(",").forEach(function(e){var t=e.trim(),r=t.replace(".",""),o=t.replace(/[[\]]/g,"").split("="),a=o[0],s=o.length>1?o[1].replace(/["']/g,""):"";switch(t.charAt(0)){case".":hi.object(i)&&hi.string(i.class)&&(i.class+=" ".concat(r)),n.class=r;break;case"#":n.id=t.replace("#","");break;case"[":n[a]=s}}),n}function Pi(e,t){if(hi.element(e)){var n=t;hi.boolean(n)||(n=!e.hidden),n?e.setAttribute("hidden",""):e.removeAttribute("hidden")}}function Ci(e,t,n){if(hi.nodeList(e))return Array.from(e).map(function(e){return Ci(e,t,n)});if(hi.element(e)){var i="toggle";return void 0!==n&&(i=n?"add":"remove"),e.classList[i](t),e.classList.contains(t)}return!1}function Li(e,t){return hi.element(e)&&e.classList.contains(t)}function Mi(e,t){return function(){return Array.from(document.querySelectorAll(t)).includes(this)}.call(e,t)}function Ni(e){return this.elements.container.querySelectorAll(e)}function xi(e){return this.elements.container.querySelector(e)}function Oi(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];hi.element(e)&&(e.focus({preventScroll:!0}),t&&Ci(e,this.config.classNames.tabFocus))}var ji,Ii,Ri,Fi=(ji=document.createElement("span"),Ii={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"},Ri=Object.keys(Ii).find(function(e){return void 0!==ji.style[e]}),!!hi.string(Ri)&&Ii[Ri]);function Di(e){setTimeout(function(){try{Pi(e,!0),e.offsetHeight,Pi(e,!1)}catch(e){}},0)}var qi,Vi={isIE:!!document.documentMode,isWebkit:"WebkitAppearance"in document.documentElement.style&&!/Edge/.test(navigator.userAgent),isIPhone:/(iPhone|iPod)/gi.test(navigator.platform),isIos:/(iPad|iPhone|iPod)/gi.test(navigator.platform)},Bi={"audio/ogg":"vorbis","audio/wav":"1","video/webm":"vp8, vorbis","video/mp4":"avc1.42E01E, mp4a.40.2","video/ogg":"theora"},Hi={audio:"canPlayType"in document.createElement("audio"),video:"canPlayType"in document.createElement("video"),check:function(e,t,n){var i=Vi.isIPhone&&n&&Hi.playsinline,r=Hi[e]||"html5"!==t;return{api:r,ui:r&&Hi.rangeInput&&("video"!==e||!Vi.isIPhone||i)}},pip:!(Vi.isIPhone||!hi.function(wi("video").webkitSetPresentationMode)&&(!document.pictureInPictureEnabled||wi("video").disablePictureInPicture)),airplay:hi.function(window.WebKitPlaybackTargetAvailabilityEvent),playsinline:"playsInline"in document.createElement("video"),mime:function(e){var t=nn(e.split("/"),1)[0],n=e;if(!this.isHTML5||t!==this.type)return!1;Object.keys(Bi).includes(n)&&(n+='; codecs="'.concat(Bi[e],'"'));try{return Boolean(n&&this.media.canPlayType(n).replace(/no/,""))}catch(e){return!1}},textTracks:"textTracks"in document.createElement("video"),rangeInput:(qi=document.createElement("input"),qi.type="range","range"===qi.type),touch:"ontouchstart"in document.documentElement,transitions:!1!==Fi,reducedMotion:"matchMedia"in window&&window.matchMedia("(prefers-reduced-motion)").matches},Ui={getSources:function(){var e=this;return this.isHTML5?Array.from(this.media.querySelectorAll("source")).filter(function(t){return Hi.mime.call(e,t.getAttribute("type"))}):[]},getQualityOptions:function(){return Ui.getSources.call(this).map(function(e){return Number(e.getAttribute("size"))}).filter(Boolean)},extend:function(){if(this.isHTML5){var e=this;Object.defineProperty(e.media,"quality",{get:function(){var t=Ui.getSources.call(e).find(function(t){return t.getAttribute("src")===e.source});return t&&Number(t.getAttribute("size"))},set:function(t){var n=Ui.getSources.call(e).find(function(e){return Number(e.getAttribute("size"))===t});if(n){var i=e.media,r=i.currentTime,o=i.paused,a=i.preload,s=i.readyState;e.media.src=n.getAttribute("src"),("none"!==a||s)&&(e.once("loadedmetadata",function(){e.currentTime=r,o||e.play()}),e.media.load()),vi.call(e,e.media,"qualitychange",!1,{quality:t})}}})}},cancelRequests:function(){this.isHTML5&&(Ei(Ui.getSources.call(this)),this.media.setAttribute("src",this.config.blankVideo),this.media.load(),this.debug.log("Cancelled network requests"))}};function Wi(e){return hi.array(e)?e.filter(function(t,n){return e.indexOf(t)===n}):e}function Ki(e,t){return t.split(".").reduce(function(e,t){return e&&e[t]},e)}function zi(){for(var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length,n=new Array(t>1?t-1:0),i=1;i<t;i++)n[i-1]=arguments[i];if(!n.length)return e;var r=n.shift();return hi.object(r)?(Object.keys(r).forEach(function(t){hi.object(r[t])?(Object.keys(e).includes(t)||Object.assign(e,tn({},t,{})),zi(e[t],r[t])):Object.assign(e,tn({},t,r[t]))}),zi.apply(void 0,[e].concat(n))):e}var Yi=g.f,Gi=_e.f,$i=r.RegExp,Ji=$i,Qi=$i.prototype,Xi=/a/g,Zi=/a/g,er=new $i(Xi)!==Xi;if(c&&(!er||l(function(){return Zi[x("match")]=!1,$i(Xi)!=Xi||$i(Zi)==Zi||"/a/i"!=$i(Xi,"i")}))){$i=function(e,t){var n=this instanceof $i,i=tt(e),r=void 0===t;return!n&&i&&e.constructor===$i&&r?e:pe(er?new Ji(i&&!r?e.source:e,t):Ji((i=e instanceof $i)?e.source:e,i&&r?st.call(e):t),n?this:Qi,$i)};for(var tr=function(e){e in $i||Yi($i,e,{configurable:!0,get:function(){return Ji[e]},set:function(t){Ji[e]=t}})},nr=Gi(Ji),ir=0;nr.length>ir;)tr(nr[ir++]);Qi.constructor=$i,$i.prototype=Qi,A(r,"RegExp",$i)}function rr(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),i=1;i<t;i++)n[i-1]=arguments[i];return hi.empty(e)?e:e.toString().replace(/{(\d+)}/g,function(e,t){return n[t].toString()})}function or(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"";return e.replace(new RegExp(t.toString().replace(/([.*+?^=!:${}()|[\]\/\\])/g,"\\$1"),"g"),n.toString())}function ar(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:"").toString().replace(/\w\S*/g,function(e){return e.charAt(0).toUpperCase()+e.substr(1).toLowerCase()})}function sr(){var e=(arguments.length>0&&void 0!==arguments[0]?arguments[0]:"").toString();return(e=function(){var e=(arguments.length>0&&void 0!==arguments[0]?arguments[0]:"").toString();return e=or(e,"-"," "),e=or(e,"_"," "),or(e=ar(e)," ","")}(e)).charAt(0).toLowerCase()+e.slice(1)}function lr(e){var t=document.createElement("div");return t.appendChild(e),t.innerHTML}Dn("RegExp");var cr={pip:"PIP",airplay:"AirPlay",html5:"HTML5",vimeo:"Vimeo",youtube:"YouTube"},ur=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(hi.empty(e)||hi.empty(t))return"";var n=Ki(t.i18n,e);if(hi.empty(n))return Object.keys(cr).includes(e)?cr[e]:"";var i={"{seektime}":t.seekTime,"{title}":t.title};return Object.entries(i).forEach(function(e){var t=nn(e,2),i=t[0],r=t[1];n=or(n,i,r)}),n},dr=function(){function e(t){Xt(this,e),this.enabled=t.config.storage.enabled,this.key=t.config.storage.key}return en(e,[{key:"get",value:function(t){if(!e.supported||!this.enabled)return null;var n=window.localStorage.getItem(this.key);if(hi.empty(n))return null;var i=JSON.parse(n);return hi.string(t)&&t.length?i[t]:i}},{key:"set",value:function(t){if(e.supported&&this.enabled&&hi.object(t)){var n=this.get();hi.empty(n)&&(n={}),zi(n,t),window.localStorage.setItem(this.key,JSON.stringify(n))}}}],[{key:"supported",get:function(){try{if(!("localStorage"in window))return!1;return window.localStorage.setItem("___test","___test"),window.localStorage.removeItem("___test"),!0}catch(e){return!1}}}]),e}();function hr(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"text";return new Promise(function(n,i){try{var r=new XMLHttpRequest;if(!("withCredentials"in r))return;r.addEventListener("load",function(){if("text"===t)try{n(JSON.parse(r.responseText))}catch(e){n(r.responseText)}else n(r.response)}),r.addEventListener("error",function(){throw new Error(r.status)}),r.open("GET",e,!0),r.responseType=t,r.send()}catch(e){i(e)}})}function fr(e,t){if(hi.string(e)){var n=hi.string(t),i=function(){return null!==document.getElementById(t)},r=function(e,t){e.innerHTML=t,n&&i()||document.body.insertAdjacentElement("afterbegin",e)};if(!n||!i()){var o=dr.supported,a=document.createElement("div");if(a.setAttribute("hidden",""),n&&a.setAttribute("id",t),o){var s=window.localStorage.getItem("".concat("cache","-").concat(t));if(null!==s){var l=JSON.parse(s);r(a,l.content)}}hr(e).then(function(e){hi.empty(e)||(o&&window.localStorage.setItem("".concat("cache","-").concat(t),JSON.stringify({content:e})),r(a,e))}).catch(function(){})}}}var pr=function(e){return parseInt(e/60/60%60,10)},mr=function(e){return parseInt(e/60%60,10)},gr=function(e){return parseInt(e%60,10)};function yr(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1],n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];if(!hi.number(e))return yr(null,t,n);var i=function(e){return"0".concat(e).slice(-2)},r=pr(e),o=mr(e),a=gr(e);return r=t||r>0?"".concat(r,":"):"","".concat(n&&e>0?"-":"").concat(r).concat(i(o),":").concat(i(a))}var vr={getIconUrl:function(){var e=new URL(this.config.iconUrl,window.location).host!==window.location.host||Vi.isIE&&!window.svg4everybody;return{url:this.config.iconUrl,cors:e}},findElements:function(){try{return this.elements.controls=xi.call(this,this.config.selectors.controls.wrapper),this.elements.buttons={play:Ni.call(this,this.config.selectors.buttons.play),pause:xi.call(this,this.config.selectors.buttons.pause),restart:xi.call(this,this.config.selectors.buttons.restart),rewind:xi.call(this,this.config.selectors.buttons.rewind),fastForward:xi.call(this,this.config.selectors.buttons.fastForward),mute:xi.call(this,this.config.selectors.buttons.mute),pip:xi.call(this,this.config.selectors.buttons.pip),airplay:xi.call(this,this.config.selectors.buttons.airplay),settings:xi.call(this,this.config.selectors.buttons.settings),captions:xi.call(this,this.config.selectors.buttons.captions),fullscreen:xi.call(this,this.config.selectors.buttons.fullscreen)},this.elements.progress=xi.call(this,this.config.selectors.progress),this.elements.inputs={seek:xi.call(this,this.config.selectors.inputs.seek),volume:xi.call(this,this.config.selectors.inputs.volume)},this.elements.display={buffer:xi.call(this,this.config.selectors.display.buffer),currentTime:xi.call(this,this.config.selectors.display.currentTime),duration:xi.call(this,this.config.selectors.display.duration)},hi.element(this.elements.progress)&&(this.elements.display.seekTooltip=this.elements.progress.querySelector(".".concat(this.config.classNames.tooltip))),!0}catch(e){return this.debug.warn("It looks like there is a problem with your custom controls HTML",e),this.toggleNativeControls(!0),!1}},createIcon:function(e,t){var n=vr.getIconUrl.call(this),i="".concat(n.cors?"":n.url,"#").concat(this.config.iconPrefix),r=document.createElementNS("http://www.w3.org/2000/svg","svg");ki(r,zi(t,{role:"presentation",focusable:"false"}));var o=document.createElementNS("http://www.w3.org/2000/svg","use"),a="".concat(i,"-").concat(e);return"href"in o&&o.setAttributeNS("http://www.w3.org/1999/xlink","href",a),o.setAttributeNS("http://www.w3.org/1999/xlink","xlink:href",a),r.appendChild(o),r},createLabel:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=ur(e,this.config);return wi("span",Object.assign({},t,{class:[t.class,this.config.classNames.hidden].filter(Boolean).join(" ")}),n)},createBadge:function(e){if(hi.empty(e))return null;var t=wi("span",{class:this.config.classNames.menu.value});return t.appendChild(wi("span",{class:this.config.classNames.menu.badge},e)),t},createButton:function(e,t){var n=Object.assign({},t),i=sr(e),r={element:"button",toggle:!1,label:null,icon:null,labelPressed:null,iconPressed:null};switch(["element","icon","label"].forEach(function(e){Object.keys(n).includes(e)&&(r[e]=n[e],delete n[e])}),"button"!==r.element||Object.keys(n).includes("type")||(n.type="button"),Object.keys(n).includes("class")?n.class.includes(this.config.classNames.control)||(n.class+=" ".concat(this.config.classNames.control)):n.class=this.config.classNames.control,e){case"play":r.toggle=!0,r.label="play",r.labelPressed="pause",r.icon="play",r.iconPressed="pause";break;case"mute":r.toggle=!0,r.label="mute",r.labelPressed="unmute",r.icon="volume",r.iconPressed="muted";break;case"captions":r.toggle=!0,r.label="enableCaptions",r.labelPressed="disableCaptions",r.icon="captions-off",r.iconPressed="captions-on";break;case"fullscreen":r.toggle=!0,r.label="enterFullscreen",r.labelPressed="exitFullscreen",r.icon="enter-fullscreen",r.iconPressed="exit-fullscreen";break;case"play-large":n.class+=" ".concat(this.config.classNames.control,"--overlaid"),i="play",r.label="play",r.icon="play";break;default:hi.empty(r.label)&&(r.label=i),hi.empty(r.icon)&&(r.icon=e)}var o=wi(r.element);return r.toggle?(o.appendChild(vr.createIcon.call(this,r.iconPressed,{class:"icon--pressed"})),o.appendChild(vr.createIcon.call(this,r.icon,{class:"icon--not-pressed"})),o.appendChild(vr.createLabel.call(this,r.labelPressed,{class:"label--pressed"})),o.appendChild(vr.createLabel.call(this,r.label,{class:"label--not-pressed"}))):(o.appendChild(vr.createIcon.call(this,r.icon)),o.appendChild(vr.createLabel.call(this,r.label))),zi(n,Si(this.config.selectors.buttons[i],n)),ki(o,n),"play"===i?(hi.array(this.elements.buttons[i])||(this.elements.buttons[i]=[]),this.elements.buttons[i].push(o)):this.elements.buttons[i]=o,o},createRange:function(e,t){var n=wi("input",zi(Si(this.config.selectors.inputs[e]),{type:"range",min:0,max:100,step:.01,value:0,autocomplete:"off",role:"slider","aria-label":ur(e,this.config),"aria-valuemin":0,"aria-valuemax":100,"aria-valuenow":0},t));return this.elements.inputs[e]=n,vr.updateRangeFill.call(this,n),n},createProgress:function(e,t){var n=wi("progress",zi(Si(this.config.selectors.display[e]),{min:0,max:100,value:0,role:"presentation","aria-hidden":!0},t));if("volume"!==e){n.appendChild(wi("span",null,"0"));var i={played:"played",buffer:"buffered"}[e],r=i?ur(i,this.config):"";n.innerText="% ".concat(r.toLowerCase())}return this.elements.display[e]=n,n},createTime:function(e){var t=Si(this.config.selectors.display[e]),n=wi("div",zi(t,{class:"".concat(this.config.classNames.display.time," ").concat(t.class?t.class:"").trim(),"aria-label":ur(e,this.config)}),"00:00");return this.elements.display[e]=n,n},bindMenuItemShortcuts:function(e,t){var n=this;mi(e,"keydown keyup",function(i){if([32,38,39,40].includes(i.which)&&(i.preventDefault(),i.stopPropagation(),"keydown"!==i.type)){var r,o=Mi(e,'[role="menuitemradio"]');if(!o&&[32,39].includes(i.which))vr.showMenuPanel.call(n,t,!0);else 32!==i.which&&(40===i.which||o&&39===i.which?(r=e.nextElementSibling,hi.element(r)||(r=e.parentNode.firstElementChild)):(r=e.previousElementSibling,hi.element(r)||(r=e.parentNode.lastElementChild)),Oi.call(n,r,!0))}},!1),mi(e,"keyup",function(e){13===e.which&&vr.focusFirstMenuItem.call(n,null,!0)})},createMenuItem:function(e){var t=this,n=e.value,i=e.list,r=e.type,o=e.title,a=e.badge,s=void 0===a?null:a,l=e.checked,c=void 0!==l&&l,u=Si(this.config.selectors.inputs[r]),d=wi("button",zi(u,{type:"button",role:"menuitemradio",class:"".concat(this.config.classNames.control," ").concat(u.class?u.class:"").trim(),"aria-checked":c,value:n})),h=wi("span");h.innerHTML=o,hi.element(s)&&h.appendChild(s),d.appendChild(h),Object.defineProperty(d,"checked",{enumerable:!0,get:function(){return"true"===d.getAttribute("aria-checked")},set:function(e){e&&Array.from(d.parentNode.children).filter(function(e){return Mi(e,'[role="menuitemradio"]')}).forEach(function(e){return e.setAttribute("aria-checked","false")}),d.setAttribute("aria-checked",e?"true":"false")}}),this.listeners.bind(d,"click keyup",function(e){if(!hi.keyboardEvent(e)||32===e.which){switch(e.preventDefault(),e.stopPropagation(),d.checked=!0,r){case"language":t.currentTrack=Number(n);break;case"quality":t.quality=n;break;case"speed":t.speed=parseFloat(n)}vr.showMenuPanel.call(t,"home",hi.keyboardEvent(e))}},r,!1),vr.bindMenuItemShortcuts.call(this,d,r),i.appendChild(d)},formatTime:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return hi.number(e)?yr(e,pr(this.duration)>0,t):e},updateTimeDisplay:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];hi.element(e)&&hi.number(t)&&(e.innerText=vr.formatTime(t,n))},updateVolume:function(){this.supported.ui&&(hi.element(this.elements.inputs.volume)&&vr.setRange.call(this,this.elements.inputs.volume,this.muted?0:this.volume),hi.element(this.elements.buttons.mute)&&(this.elements.buttons.mute.pressed=this.muted||0===this.volume))},setRange:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;hi.element(e)&&(e.value=t,vr.updateRangeFill.call(this,e))},updateProgress:function(e){var t=this;if(this.supported.ui&&hi.event(e)){var n,i,r=0;if(e)switch(e.type){case"timeupdate":case"seeking":case"seeked":n=this.currentTime,i=this.duration,r=0===n||0===i||Number.isNaN(n)||Number.isNaN(i)?0:(n/i*100).toFixed(2),"timeupdate"===e.type&&vr.setRange.call(this,this.elements.inputs.seek,r);break;case"playing":case"progress":!function(e,n){var i=hi.number(n)?n:0,r=hi.element(e)?e:t.elements.display.buffer;if(hi.element(r)){r.value=i;var o=r.getElementsByTagName("span")[0];hi.element(o)&&(o.childNodes[0].nodeValue=i)}}(this.elements.display.buffer,100*this.buffered)}}},updateRangeFill:function(e){var t=hi.event(e)?e.target:e;if(hi.element(t)&&"range"===t.getAttribute("type")){if(Mi(t,this.config.selectors.inputs.seek)){t.setAttribute("aria-valuenow",this.currentTime);var n=vr.formatTime(this.currentTime),i=vr.formatTime(this.duration),r=ur("seekLabel",this.config);t.setAttribute("aria-valuetext",r.replace("{currentTime}",n).replace("{duration}",i))}else if(Mi(t,this.config.selectors.inputs.volume)){var o=100*t.value;t.setAttribute("aria-valuenow",o),t.setAttribute("aria-valuetext","".concat(o.toFixed(1),"%"))}else t.setAttribute("aria-valuenow",t.value);Vi.isWebkit&&t.style.setProperty("--value","".concat(t.value/t.max*100,"%"))}},updateSeekTooltip:function(e){var t=this;if(this.config.tooltips.seek&&hi.element(this.elements.inputs.seek)&&hi.element(this.elements.display.seekTooltip)&&0!==this.duration){var n=0,i=this.elements.progress.getBoundingClientRect(),r="".concat(this.config.classNames.tooltip,"--visible"),o=function(e){Ci(t.elements.display.seekTooltip,r,e)};if(this.touch)o(!1);else{if(hi.event(e))n=100/i.width*(e.pageX-i.left);else{if(!Li(this.elements.display.seekTooltip,r))return;n=parseFloat(this.elements.display.seekTooltip.style.left,10)}n<0?n=0:n>100&&(n=100),vr.updateTimeDisplay.call(this,this.elements.display.seekTooltip,this.duration/100*n),this.elements.display.seekTooltip.style.left="".concat(n,"%"),hi.event(e)&&["mouseenter","mouseleave"].includes(e.type)&&o("mouseenter"===e.type)}}},timeUpdate:function(e){var t=!hi.element(this.elements.display.duration)&&this.config.invertTime;vr.updateTimeDisplay.call(this,this.elements.display.currentTime,t?this.duration-this.currentTime:this.currentTime,t),e&&"timeupdate"===e.type&&this.media.seeking||vr.updateProgress.call(this,e)},durationUpdate:function(){if(this.supported.ui&&(this.config.invertTime||!this.currentTime)){if(this.duration>=Math.pow(2,32))return Pi(this.elements.display.currentTime,!0),void Pi(this.elements.progress,!0);hi.element(this.elements.inputs.seek)&&this.elements.inputs.seek.setAttribute("aria-valuemax",this.duration);var e=hi.element(this.elements.display.duration);!e&&this.config.displayDuration&&this.paused&&vr.updateTimeDisplay.call(this,this.elements.display.currentTime,this.duration),e&&vr.updateTimeDisplay.call(this,this.elements.display.duration,this.duration),vr.updateSeekTooltip.call(this)}},toggleMenuButton:function(e,t){Pi(this.elements.settings.buttons[e],!t)},updateSetting:function(e,t,n){var i=this.elements.settings.panels[e],r=null,o=t;if("captions"===e)r=this.currentTrack;else{if(r=hi.empty(n)?this[e]:n,hi.empty(r)&&(r=this.config[e].default),!hi.empty(this.options[e])&&!this.options[e].includes(r))return void this.debug.warn("Unsupported value of '".concat(r,"' for ").concat(e));if(!this.config[e].options.includes(r))return void this.debug.warn("Disabled value of '".concat(r,"' for ").concat(e))}if(hi.element(o)||(o=i&&i.querySelector('[role="menu"]')),hi.element(o)){this.elements.settings.buttons[e].querySelector(".".concat(this.config.classNames.menu.value)).innerHTML=vr.getLabel.call(this,e,r);var a=o&&o.querySelector('[value="'.concat(r,'"]'));hi.element(a)&&(a.checked=!0)}},getLabel:function(e,t){switch(e){case"speed":return 1===t?ur("normal",this.config):"".concat(t,"&times;");case"quality":if(hi.number(t)){var n=ur("qualityLabel.".concat(t),this.config);return n.length?n:"".concat(t,"p")}return ar(t);case"captions":return wr.getLabel.call(this);default:return null}},setQualityMenu:function(e){var t=this;if(hi.element(this.elements.settings.panels.quality)){var n=this.elements.settings.panels.quality.querySelector('[role="menu"]');hi.array(e)&&(this.options.quality=Wi(e).filter(function(e){return t.config.quality.options.includes(e)}));var i=!hi.empty(this.options.quality)&&this.options.quality.length>1;if(vr.toggleMenuButton.call(this,"quality",i),Ai(n),vr.checkMenu.call(this),i){this.options.quality.sort(function(e,n){var i=t.config.quality.options;return i.indexOf(e)>i.indexOf(n)?1:-1}).forEach(function(e){vr.createMenuItem.call(t,{value:e,list:n,type:"quality",title:vr.getLabel.call(t,"quality",e),badge:function(e){var n=ur("qualityBadge.".concat(e),t.config);return n.length?vr.createBadge.call(t,n):null}(e)})}),vr.updateSetting.call(this,"quality",n)}}},setCaptionsMenu:function(){var e=this;if(hi.element(this.elements.settings.panels.captions)){var t=this.elements.settings.panels.captions.querySelector('[role="menu"]'),n=wr.getTracks.call(this),i=Boolean(n.length);if(vr.toggleMenuButton.call(this,"captions",i),Ai(t),vr.checkMenu.call(this),i){var r=n.map(function(n,i){return{value:i,checked:e.captions.toggled&&e.currentTrack===i,title:wr.getLabel.call(e,n),badge:n.language&&vr.createBadge.call(e,n.language.toUpperCase()),list:t,type:"language"}});r.unshift({value:-1,checked:!this.captions.toggled,title:ur("disabled",this.config),list:t,type:"language"}),r.forEach(vr.createMenuItem.bind(this)),vr.updateSetting.call(this,"captions",t)}}},setSpeedMenu:function(e){var t=this;if(hi.element(this.elements.settings.panels.speed)){var n=this.elements.settings.panels.speed.querySelector('[role="menu"]');hi.array(e)?this.options.speed=e:(this.isHTML5||this.isVimeo)&&(this.options.speed=[.5,.75,1,1.25,1.5,1.75,2]),this.options.speed=this.options.speed.filter(function(e){return t.config.speed.options.includes(e)});var i=!hi.empty(this.options.speed)&&this.options.speed.length>1;vr.toggleMenuButton.call(this,"speed",i),Ai(n),vr.checkMenu.call(this),i&&(this.options.speed.forEach(function(e){vr.createMenuItem.call(t,{value:e,list:n,type:"speed",title:vr.getLabel.call(t,"speed",e)})}),vr.updateSetting.call(this,"speed",n))}},checkMenu:function(){var e=this.elements.settings.buttons,t=!hi.empty(e)&&Object.values(e).some(function(e){return!e.hidden});Pi(this.elements.settings.menu,!t)},focusFirstMenuItem:function(e){var t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if(!this.elements.settings.popup.hidden){var n=e;hi.element(n)||(n=Object.values(this.elements.settings.panels).find(function(e){return!e.hidden}));var i=n.querySelector('[role^="menuitem"]');Oi.call(this,i,t)}},toggleMenu:function(e){var t=this.elements.settings.popup,n=this.elements.buttons.settings;if(hi.element(t)&&hi.element(n)){var i=t.hidden,r=i;if(hi.boolean(e))r=e;else if(hi.keyboardEvent(e)&&27===e.which)r=!1;else if(hi.event(e)){var o=t.contains(e.target);if(o||!o&&e.target!==n&&r)return}n.setAttribute("aria-expanded",r),Pi(t,!r),Ci(this.elements.container,this.config.classNames.menu.open,r),r&&hi.keyboardEvent(e)?vr.focusFirstMenuItem.call(this,null,!0):r||i||Oi.call(this,n,hi.keyboardEvent(e))}},getMenuSize:function(e){var t=e.cloneNode(!0);t.style.position="absolute",t.style.opacity=0,t.removeAttribute("hidden"),e.parentNode.appendChild(t);var n=t.scrollWidth,i=t.scrollHeight;return Ei(t),{width:n,height:i}},showMenuPanel:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",n=arguments.length>1&&void 0!==arguments[1]&&arguments[1],i=document.getElementById("plyr-settings-".concat(this.id,"-").concat(t));if(hi.element(i)){var r=i.parentNode,o=Array.from(r.children).find(function(e){return!e.hidden});if(Hi.transitions&&!Hi.reducedMotion){r.style.width="".concat(o.scrollWidth,"px"),r.style.height="".concat(o.scrollHeight,"px");var a=vr.getMenuSize.call(this,i);mi.call(this,r,Fi,function t(n){n.target===r&&["width","height"].includes(n.propertyName)&&(r.style.width="",r.style.height="",gi.call(e,r,Fi,t))}),r.style.width="".concat(a.width,"px"),r.style.height="".concat(a.height,"px")}Pi(o,!0),Pi(i,!1),vr.focusFirstMenuItem.call(this,i,n)}},setDownloadLink:function(){var e=this.elements.buttons.download;hi.element(e)&&e.setAttribute("href",this.download)},create:function(e){var t=this,n=wi("div",Si(this.config.selectors.controls.wrapper));if(this.config.controls.includes("restart")&&n.appendChild(vr.createButton.call(this,"restart")),this.config.controls.includes("rewind")&&n.appendChild(vr.createButton.call(this,"rewind")),this.config.controls.includes("play")&&n.appendChild(vr.createButton.call(this,"play")),this.config.controls.includes("fast-forward")&&n.appendChild(vr.createButton.call(this,"fast-forward")),this.config.controls.includes("progress")){var i=wi("div",Si(this.config.selectors.progress));if(i.appendChild(vr.createRange.call(this,"seek",{id:"plyr-seek-".concat(e.id)})),i.appendChild(vr.createProgress.call(this,"buffer")),this.config.tooltips.seek){var r=wi("span",{class:this.config.classNames.tooltip},"00:00");i.appendChild(r),this.elements.display.seekTooltip=r}this.elements.progress=i,n.appendChild(this.elements.progress)}if(this.config.controls.includes("current-time")&&n.appendChild(vr.createTime.call(this,"currentTime")),this.config.controls.includes("duration")&&n.appendChild(vr.createTime.call(this,"duration")),this.config.controls.includes("mute")||this.config.controls.includes("volume")){var o=wi("div",{class:"plyr__volume"});if(this.config.controls.includes("mute")&&o.appendChild(vr.createButton.call(this,"mute")),this.config.controls.includes("volume")){var a={max:1,step:.05,value:this.config.volume};o.appendChild(vr.createRange.call(this,"volume",zi(a,{id:"plyr-volume-".concat(e.id)}))),this.elements.volume=o}n.appendChild(o)}if(this.config.controls.includes("captions")&&n.appendChild(vr.createButton.call(this,"captions")),this.config.controls.includes("settings")&&!hi.empty(this.config.settings)){var s=wi("div",{class:"plyr__menu",hidden:""});s.appendChild(vr.createButton.call(this,"settings",{"aria-haspopup":!0,"aria-controls":"plyr-settings-".concat(e.id),"aria-expanded":!1}));var l=wi("div",{class:"plyr__menu__container",id:"plyr-settings-".concat(e.id),hidden:""}),c=wi("div"),u=wi("div",{id:"plyr-settings-".concat(e.id,"-home")}),d=wi("div",{role:"menu"});u.appendChild(d),c.appendChild(u),this.elements.settings.panels.home=u,this.config.settings.forEach(function(n){var i=wi("button",zi(Si(t.config.selectors.buttons.settings),{type:"button",class:"".concat(t.config.classNames.control," ").concat(t.config.classNames.control,"--forward"),role:"menuitem","aria-haspopup":!0,hidden:""}));vr.bindMenuItemShortcuts.call(t,i,n),mi(i,"click",function(){vr.showMenuPanel.call(t,n,!1)});var r=wi("span",null,ur(n,t.config)),o=wi("span",{class:t.config.classNames.menu.value});o.innerHTML=e[n],r.appendChild(o),i.appendChild(r),d.appendChild(i);var a=wi("div",{id:"plyr-settings-".concat(e.id,"-").concat(n),hidden:""}),s=wi("button",{type:"button",class:"".concat(t.config.classNames.control," ").concat(t.config.classNames.control,"--back")});s.appendChild(wi("span",{"aria-hidden":!0},ur(n,t.config))),s.appendChild(wi("span",{class:t.config.classNames.hidden},ur("menuBack",t.config))),mi(a,"keydown",function(e){37===e.which&&(e.preventDefault(),e.stopPropagation(),vr.showMenuPanel.call(t,"home",!0))},!1),mi(s,"click",function(){vr.showMenuPanel.call(t,"home",!1)}),a.appendChild(s),a.appendChild(wi("div",{role:"menu"})),c.appendChild(a),t.elements.settings.buttons[n]=i,t.elements.settings.panels[n]=a}),l.appendChild(c),s.appendChild(l),n.appendChild(s),this.elements.settings.popup=l,this.elements.settings.menu=s}if(this.config.controls.includes("pip")&&Hi.pip&&n.appendChild(vr.createButton.call(this,"pip")),this.config.controls.includes("airplay")&&Hi.airplay&&n.appendChild(vr.createButton.call(this,"airplay")),this.config.controls.includes("download")){var h={element:"a",href:this.download,target:"_blank"},f=this.config.urls.download;!hi.url(f)&&this.isEmbed&&zi(h,{icon:"logo-".concat(this.provider),label:this.provider}),n.appendChild(vr.createButton.call(this,"download",h))}return this.config.controls.includes("fullscreen")&&n.appendChild(vr.createButton.call(this,"fullscreen")),this.config.controls.includes("play-large")&&this.elements.container.appendChild(vr.createButton.call(this,"play-large")),this.elements.controls=n,this.isHTML5&&vr.setQualityMenu.call(this,Ui.getQualityOptions.call(this)),vr.setSpeedMenu.call(this),n},inject:function(){var e=this;if(this.config.loadSprite){var t=vr.getIconUrl.call(this);t.cors&&fr(t.url,"sprite-plyr")}this.id=Math.floor(1e4*Math.random());var n=null;this.elements.controls=null;var i={id:this.id,seektime:this.config.seekTime,title:this.config.title},r=!0;hi.function(this.config.controls)&&(this.config.controls=this.config.controls.call(this.props)),this.config.controls||(this.config.controls=[]),hi.element(this.config.controls)||hi.string(this.config.controls)?n=this.config.controls:(n=vr.create.call(this,{id:this.id,seektime:this.config.seekTime,speed:this.speed,quality:this.quality,captions:wr.getLabel.call(this)}),r=!1);var o,a=function(e){var t=e;return Object.entries(i).forEach(function(e){var n=nn(e,2),i=n[0],r=n[1];t=or(t,"{".concat(i,"}"),r)}),t};if(r&&(hi.string(this.config.controls)?n=a(n):hi.element(n)&&(n.innerHTML=a(n.innerHTML))),hi.string(this.config.selectors.controls.container)&&(o=document.querySelector(this.config.selectors.controls.container)),hi.element(o)||(o=this.elements.container),o[hi.element(n)?"insertAdjacentElement":"insertAdjacentHTML"]("afterbegin",n),hi.element(this.elements.controls)||vr.findElements.call(this),!hi.empty(this.elements.buttons)){var s=function(t){var n=e.config.classNames.controlPressed;Object.defineProperty(t,"pressed",{enumerable:!0,get:function(){return Li(t,n)},set:function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];Ci(t,n,e)}})};Object.values(this.elements.buttons).filter(Boolean).forEach(function(e){hi.array(e)||hi.nodeList(e)?Array.from(e).filter(Boolean).forEach(s):s(e)})}if(window.navigator.userAgent.includes("Edge")&&Di(o),this.config.tooltips.controls){var l=this.config,c=l.classNames,u=l.selectors,d="".concat(u.controls.wrapper," ").concat(u.labels," .").concat(c.hidden),h=Ni.call(this,d);Array.from(h).forEach(function(t){Ci(t,e.config.classNames.hidden,!1),Ci(t,e.config.classNames.tooltip,!0)})}}};function br(e){var t=e;if(!(arguments.length>1&&void 0!==arguments[1])||arguments[1]){var n=document.createElement("a");n.href=t,t=n.href}try{return new URL(t)}catch(e){return null}}function kr(e){var t=new URLSearchParams;return hi.object(e)&&Object.entries(e).forEach(function(e){var n=nn(e,2),i=n[0],r=n[1];t.set(i,r)}),t}var wr={setup:function(){if(this.supported.ui)if(!this.isVideo||this.isYouTube||this.isHTML5&&!Hi.textTracks)hi.array(this.config.controls)&&this.config.controls.includes("settings")&&this.config.settings.includes("captions")&&vr.setCaptionsMenu.call(this);else{var e,t;if(hi.element(this.elements.captions)||(this.elements.captions=wi("div",Si(this.config.selectors.captions)),e=this.elements.captions,t=this.elements.wrapper,hi.element(e)&&hi.element(t)&&t.parentNode.insertBefore(e,t.nextSibling)),Vi.isIE&&window.URL){var n=this.media.querySelectorAll("track");Array.from(n).forEach(function(e){var t=e.getAttribute("src"),n=br(t);null!==n&&n.hostname!==window.location.href.hostname&&["http:","https:"].includes(n.protocol)&&hr(t,"blob").then(function(t){e.setAttribute("src",window.URL.createObjectURL(t))}).catch(function(){Ei(e)})})}var i=Wi((navigator.languages||[navigator.language||navigator.userLanguage||"en"]).map(function(e){return e.split("-")[0]})),r=(this.storage.get("language")||this.config.captions.language||"auto").toLowerCase();if("auto"===r)r=nn(i,1)[0];var o=this.storage.get("captions");if(hi.boolean(o)||(o=this.config.captions.active),Object.assign(this.captions,{toggled:!1,active:o,language:r,languages:i}),this.isHTML5){var a=this.config.captions.update?"addtrack removetrack":"removetrack";mi.call(this,this.media.textTracks,a,wr.update.bind(this))}setTimeout(wr.update.bind(this),0)}},update:function(){var e=this,t=wr.getTracks.call(this,!0),n=this.captions,i=n.active,r=n.language,o=n.meta,a=n.currentTrackNode,s=Boolean(t.find(function(e){return e.language===r}));this.isHTML5&&this.isVideo&&t.filter(function(e){return!o.get(e)}).forEach(function(t){e.debug.log("Track added",t),o.set(t,{default:"showing"===t.mode}),t.mode="hidden",mi.call(e,t,"cuechange",function(){return wr.updateCues.call(e)})}),(s&&this.language!==r||!t.includes(a))&&(wr.setLanguage.call(this,r),wr.toggle.call(this,i&&s)),Ci(this.elements.container,this.config.classNames.captions.enabled,!hi.empty(t)),(this.config.controls||[]).includes("settings")&&this.config.settings.includes("captions")&&vr.setCaptionsMenu.call(this)},toggle:function(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];if(this.supported.ui){var n=this.captions.toggled,i=this.config.classNames.captions.active,r=hi.nullOrUndefined(e)?!n:e;if(r!==n){if(t||(this.captions.active=r,this.storage.set({captions:r})),!this.language&&r&&!t){var o=wr.getTracks.call(this),a=wr.findTrack.call(this,[this.captions.language].concat(rn(this.captions.languages)),!0);return this.captions.language=a.language,void wr.set.call(this,o.indexOf(a))}this.elements.buttons.captions&&(this.elements.buttons.captions.pressed=r),Ci(this.elements.container,i,r),this.captions.toggled=r,vr.updateSetting.call(this,"captions"),vi.call(this,this.media,r?"captionsenabled":"captionsdisabled")}}},set:function(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],n=wr.getTracks.call(this);if(-1!==e)if(hi.number(e))if(e in n){if(this.captions.currentTrack!==e){this.captions.currentTrack=e;var i=n[e],r=(i||{}).language;this.captions.currentTrackNode=i,vr.updateSetting.call(this,"captions"),t||(this.captions.language=r,this.storage.set({language:r})),this.isVimeo&&this.embed.enableTextTrack(r),vi.call(this,this.media,"languagechange")}wr.toggle.call(this,!0,t),this.isHTML5&&this.isVideo&&wr.updateCues.call(this)}else this.debug.warn("Track not found",e);else this.debug.warn("Invalid caption argument",e);else wr.toggle.call(this,!1,t)},setLanguage:function(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];if(hi.string(e)){var n=e.toLowerCase();this.captions.language=n;var i=wr.getTracks.call(this),r=wr.findTrack.call(this,[n]);wr.set.call(this,i.indexOf(r),t)}else this.debug.warn("Invalid language argument",e)},getTracks:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]&&arguments[0];return Array.from((this.media||{}).textTracks||[]).filter(function(n){return!e.isHTML5||t||e.captions.meta.has(n)}).filter(function(e){return["captions","subtitles"].includes(e.kind)})},findTrack:function(e){var t,n=this,i=arguments.length>1&&void 0!==arguments[1]&&arguments[1],r=wr.getTracks.call(this),o=function(e){return Number((n.captions.meta.get(e)||{}).default)},a=Array.from(r).sort(function(e,t){return o(t)-o(e)});return e.every(function(e){return!(t=a.find(function(t){return t.language===e}))}),t||(i?a[0]:void 0)},getCurrentTrack:function(){return wr.getTracks.call(this)[this.currentTrack]},getLabel:function(e){var t=e;return!hi.track(t)&&Hi.textTracks&&this.captions.toggled&&(t=wr.getCurrentTrack.call(this)),hi.track(t)?hi.empty(t.label)?hi.empty(t.language)?ur("enabled",this.config):e.language.toUpperCase():t.label:ur("disabled",this.config)},updateCues:function(e){if(this.supported.ui)if(hi.element(this.elements.captions))if(hi.nullOrUndefined(e)||Array.isArray(e)){var t=e;if(!t){var n=wr.getCurrentTrack.call(this);t=Array.from((n||{}).activeCues||[]).map(function(e){return e.getCueAsHTML()}).map(lr)}var i=t.map(function(e){return e.trim()}).join("\n");if(i!==this.elements.captions.innerHTML){Ai(this.elements.captions);var r=wi("span",Si(this.config.selectors.caption));r.innerHTML=i,this.elements.captions.appendChild(r),vi.call(this,this.media,"cuechange")}}else this.debug.warn("updateCues: Invalid input",e);else this.debug.warn("No captions element to render to")}},Tr={enabled:!0,title:"",debug:!1,autoplay:!1,autopause:!0,playsinline:!0,seekTime:10,volume:1,muted:!1,duration:null,displayDuration:!0,invertTime:!0,toggleInvert:!0,ratio:"16:9",clickToPlay:!0,hideControls:!0,resetOnEnd:!1,disableContextMenu:!0,loadSprite:!0,iconPrefix:"plyr",iconUrl:"https://cdn.plyr.io/3.4.7/plyr.svg",blankVideo:"https://cdn.plyr.io/static/blank.mp4",quality:{default:576,options:[4320,2880,2160,1440,1080,720,576,480,360,240]},loop:{active:!1},speed:{selected:1,options:[.5,.75,1,1.25,1.5,1.75,2]},keyboard:{focused:!0,global:!1},tooltips:{controls:!1,seek:!0},captions:{active:!1,language:"auto",update:!1},fullscreen:{enabled:!0,fallback:!0,iosNative:!1},storage:{enabled:!0,key:"plyr"},controls:["play-large","play","progress","current-time","mute","volume","captions","settings","pip","airplay","fullscreen"],settings:["captions","quality","speed"],i18n:{restart:"Restart",rewind:"Rewind {seektime}s",play:"Play",pause:"Pause",fastForward:"Forward {seektime}s",seek:"Seek",seekLabel:"{currentTime} of {duration}",played:"Played",buffered:"Buffered",currentTime:"Current time",duration:"Duration",volume:"Volume",mute:"Mute",unmute:"Unmute",enableCaptions:"Enable captions",disableCaptions:"Disable captions",download:"Download",enterFullscreen:"Enter fullscreen",exitFullscreen:"Exit fullscreen",frameTitle:"Player for {title}",captions:"Captions",settings:"Settings",menuBack:"Go back to previous menu",speed:"Speed",normal:"Normal",quality:"Quality",loop:"Loop",start:"Start",end:"End",all:"All",reset:"Reset",disabled:"Disabled",enabled:"Enabled",advertisement:"Ad",qualityBadge:{2160:"4K",1440:"HD",1080:"HD",720:"HD",576:"SD",480:"SD"}},urls:{download:null,vimeo:{sdk:"https://player.vimeo.com/api/player.js",iframe:"https://player.vimeo.com/video/{0}?{1}",api:"https://vimeo.com/api/v2/video/{0}.json"},youtube:{sdk:"https://www.youtube.com/iframe_api",api:"https://www.googleapis.com/youtube/v3/videos?id={0}&key={1}&fields=items(snippet(title))&part=snippet"},googleIMA:{sdk:"https://imasdk.googleapis.com/js/sdkloader/ima3.js"}},listeners:{seek:null,play:null,pause:null,restart:null,rewind:null,fastForward:null,mute:null,volume:null,captions:null,download:null,fullscreen:null,pip:null,airplay:null,speed:null,quality:null,loop:null,language:null},events:["ended","progress","stalled","playing","waiting","canplay","canplaythrough","loadstart","loadeddata","loadedmetadata","timeupdate","volumechange","play","pause","error","seeking","seeked","emptied","ratechange","cuechange","download","enterfullscreen","exitfullscreen","captionsenabled","captionsdisabled","languagechange","controlshidden","controlsshown","ready","statechange","qualitychange","adsloaded","adscontentpause","adscontentresume","adstarted","adsmidpoint","adscomplete","adsallcomplete","adsimpression","adsclick"],selectors:{editable:"input, textarea, select, [contenteditable]",container:".plyr",controls:{container:null,wrapper:".plyr__controls"},labels:"[data-plyr]",buttons:{play:'[data-plyr="play"]',pause:'[data-plyr="pause"]',restart:'[data-plyr="restart"]',rewind:'[data-plyr="rewind"]',fastForward:'[data-plyr="fast-forward"]',mute:'[data-plyr="mute"]',captions:'[data-plyr="captions"]',download:'[data-plyr="download"]',fullscreen:'[data-plyr="fullscreen"]',pip:'[data-plyr="pip"]',airplay:'[data-plyr="airplay"]',settings:'[data-plyr="settings"]',loop:'[data-plyr="loop"]'},inputs:{seek:'[data-plyr="seek"]',volume:'[data-plyr="volume"]',speed:'[data-plyr="speed"]',language:'[data-plyr="language"]',quality:'[data-plyr="quality"]'},display:{currentTime:".plyr__time--current",duration:".plyr__time--duration",buffer:".plyr__progress__buffer",loop:".plyr__progress__loop",volume:".plyr__volume--display"},progress:".plyr__progress",captions:".plyr__captions",caption:".plyr__caption",menu:{quality:".js-plyr__menu__list--quality"}},classNames:{type:"plyr--{0}",provider:"plyr--{0}",video:"plyr__video-wrapper",embed:"plyr__video-embed",embedContainer:"plyr__video-embed__container",poster:"plyr__poster",posterEnabled:"plyr__poster-enabled",ads:"plyr__ads",control:"plyr__control",controlPressed:"plyr__control--pressed",playing:"plyr--playing",paused:"plyr--paused",stopped:"plyr--stopped",loading:"plyr--loading",hover:"plyr--hover",tooltip:"plyr__tooltip",cues:"plyr__cues",hidden:"plyr__sr-only",hideControls:"plyr--hide-controls",isIos:"plyr--is-ios",isTouch:"plyr--is-touch",uiSupported:"plyr--full-ui",noTransition:"plyr--no-transition",display:{time:"plyr__time"},menu:{value:"plyr__menu__value",badge:"plyr__badge",open:"plyr--menu-open"},captions:{enabled:"plyr--captions-enabled",active:"plyr--captions-active"},fullscreen:{enabled:"plyr--fullscreen-enabled",fallback:"plyr--fullscreen-fallback"},pip:{supported:"plyr--pip-supported",active:"plyr--pip-active"},airplay:{supported:"plyr--airplay-supported",active:"plyr--airplay-active"},tabFocus:"plyr__tab-focus"},attributes:{embed:{provider:"data-plyr-provider",id:"data-plyr-embed-id"}},keys:{google:null},ads:{enabled:!1,publisherId:""}},Er="picture-in-picture",Ar="inline",_r={html5:"html5",youtube:"youtube",vimeo:"vimeo"},Sr={audio:"audio",video:"video"};var Pr=function(){},Cr=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]&&arguments[0];Xt(this,e),this.enabled=window.console&&t,this.enabled&&this.log("Debugging enabled")}return en(e,[{key:"log",get:function(){return this.enabled?Function.prototype.bind.call(console.log,console):Pr}},{key:"warn",get:function(){return this.enabled?Function.prototype.bind.call(console.warn,console):Pr}},{key:"error",get:function(){return this.enabled?Function.prototype.bind.call(console.error,console):Pr}}]),e}();function Lr(){if(this.enabled){var e=this.player.elements.buttons.fullscreen;hi.element(e)&&(e.pressed=this.active),vi.call(this.player,this.target,this.active?"enterfullscreen":"exitfullscreen",!0),Vi.isIos||function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if(hi.element(e)){var n=Ni.call(this,"button:not(:disabled), input:not(:disabled), [tabindex]"),i=n[0],r=n[n.length-1];pi.call(this,this.elements.container,"keydown",function(e){if("Tab"===e.key&&9===e.keyCode){var t=document.activeElement;t!==r||e.shiftKey?t===i&&e.shiftKey&&(r.focus(),e.preventDefault()):(i.focus(),e.preventDefault())}},t,!1)}}.call(this.player,this.target,this.active)}}function Mr(){var e=this,t=arguments.length>0&&void 0!==arguments[0]&&arguments[0];if(t?this.scrollPosition={x:window.scrollX||0,y:window.scrollY||0}:window.scrollTo(this.scrollPosition.x,this.scrollPosition.y),document.body.style.overflow=t?"hidden":"",Ci(this.target,this.player.config.classNames.fullscreen.fallback,t),Vi.isIos){var n=document.head.querySelector('meta[name="viewport"]'),i="viewport-fit=cover";n||(n=document.createElement("meta")).setAttribute("name","viewport");var r=hi.string(n.content)&&n.content.includes(i);t?(this.cleanupViewport=!r,r||(n.content+=",".concat(i))):this.cleanupViewport&&(n.content=n.content.split(",").filter(function(e){return e.trim()!==i}).join(",")),setTimeout(function(){return Di(e.target)},100)}Lr.call(this)}var Nr=function(){function e(t){var n=this;Xt(this,e),this.player=t,this.prefix=e.prefix,this.property=e.property,this.scrollPosition={x:0,y:0},mi.call(this.player,document,"ms"===this.prefix?"MSFullscreenChange":"".concat(this.prefix,"fullscreenchange"),function(){Lr.call(n)}),mi.call(this.player,this.player.elements.container,"dblclick",function(e){hi.element(n.player.elements.controls)&&n.player.elements.controls.contains(e.target)||n.toggle()}),this.update()}return en(e,[{key:"update",value:function(){this.enabled?this.player.debug.log("".concat(e.native?"Native":"Fallback"," fullscreen enabled")):this.player.debug.log("Fullscreen not supported and fallback disabled"),Ci(this.player.elements.container,this.player.config.classNames.fullscreen.enabled,this.enabled)}},{key:"enter",value:function(){this.enabled&&(Vi.isIos&&this.player.config.fullscreen.iosNative?this.target.webkitEnterFullscreen():e.native?this.prefix?hi.empty(this.prefix)||this.target["".concat(this.prefix,"Request").concat(this.property)]():this.target.requestFullscreen():Mr.call(this,!0))}},{key:"exit",value:function(){if(this.enabled)if(Vi.isIos&&this.player.config.fullscreen.iosNative)this.target.webkitExitFullscreen(),this.player.play();else if(e.native)if(this.prefix){if(!hi.empty(this.prefix)){var t="moz"===this.prefix?"Cancel":"Exit";document["".concat(this.prefix).concat(t).concat(this.property)]()}}else(document.cancelFullScreen||document.exitFullscreen).call(document);else Mr.call(this,!1)}},{key:"toggle",value:function(){this.active?this.exit():this.enter()}},{key:"enabled",get:function(){return(e.native||this.player.config.fullscreen.fallback)&&this.player.config.fullscreen.enabled&&this.player.supported.ui&&this.player.isVideo}},{key:"active",get:function(){return!!this.enabled&&(e.native?(this.prefix?document["".concat(this.prefix).concat(this.property,"Element")]:document.fullscreenElement)===this.target:Li(this.target,this.player.config.classNames.fullscreen.fallback))}},{key:"target",get:function(){return Vi.isIos&&this.player.config.fullscreen.iosNative?this.player.media:this.player.elements.container}}],[{key:"native",get:function(){return!!(document.fullscreenEnabled||document.webkitFullscreenEnabled||document.mozFullScreenEnabled||document.msFullscreenEnabled)}},{key:"prefix",get:function(){if(hi.function(document.exitFullscreen))return"";var e="";return["webkit","moz","ms"].some(function(t){return!(!hi.function(document["".concat(t,"ExitFullscreen")])&&!hi.function(document["".concat(t,"CancelFullScreen")]))&&(e=t,!0)}),e}},{key:"property",get:function(){return"moz"===this.prefix?"FullScreen":"Fullscreen"}}]),e}(),xr=Math.sign||function(e){return 0==(e=+e)||e!=e?e:e<0?-1:1};function Or(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1;return new Promise(function(n,i){var r=new Image,o=function(){delete r.onload,delete r.onerror,(r.naturalWidth>=t?n:i)(r)};Object.assign(r,{onload:o,onerror:o,src:e})})}S(S.S,"Math",{sign:xr});var jr={addStyleHook:function(){Ci(this.elements.container,this.config.selectors.container.replace(".",""),!0),Ci(this.elements.container,this.config.classNames.uiSupported,this.supported.ui)},toggleNativeControls:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0]&&this.isHTML5?this.media.setAttribute("controls",""):this.media.removeAttribute("controls")},build:function(){var e=this;if(this.listeners.media(),!this.supported.ui)return this.debug.warn("Basic support only for ".concat(this.provider," ").concat(this.type)),void jr.toggleNativeControls.call(this,!0);hi.element(this.elements.controls)||(vr.inject.call(this),this.listeners.controls()),jr.toggleNativeControls.call(this),this.isHTML5&&wr.setup.call(this),this.volume=null,this.muted=null,this.speed=null,this.loop=null,this.quality=null,vr.updateVolume.call(this),vr.timeUpdate.call(this),jr.checkPlaying.call(this),Ci(this.elements.container,this.config.classNames.pip.supported,Hi.pip&&this.isHTML5&&this.isVideo),Ci(this.elements.container,this.config.classNames.airplay.supported,Hi.airplay&&this.isHTML5),Ci(this.elements.container,this.config.classNames.isIos,Vi.isIos),Ci(this.elements.container,this.config.classNames.isTouch,this.touch),this.ready=!0,setTimeout(function(){vi.call(e,e.media,"ready")},0),jr.setTitle.call(this),this.poster&&jr.setPoster.call(this,this.poster,!1).catch(function(){}),this.config.duration&&vr.durationUpdate.call(this)},setTitle:function(){var e=ur("play",this.config);if(hi.string(this.config.title)&&!hi.empty(this.config.title)&&(e+=", ".concat(this.config.title)),Array.from(this.elements.buttons.play||[]).forEach(function(t){t.setAttribute("aria-label",e)}),this.isEmbed){var t=xi.call(this,"iframe");if(!hi.element(t))return;var n=hi.empty(this.config.title)?"video":this.config.title,i=ur("frameTitle",this.config);t.setAttribute("title",i.replace("{title}",n))}},togglePoster:function(e){Ci(this.elements.container,this.config.classNames.posterEnabled,e)},setPoster:function(e){var t=this;return arguments.length>1&&void 0!==arguments[1]&&!arguments[1]||!this.poster?(this.media.setAttribute("poster",e),function(){var e=this;return new Promise(function(t){return e.ready?setTimeout(t,0):mi.call(e,e.elements.container,"ready",t)}).then(function(){})}.call(this).then(function(){return Or(e)}).catch(function(n){throw e===t.poster&&jr.togglePoster.call(t,!1),n}).then(function(){if(e!==t.poster)throw new Error("setPoster cancelled by later call to setPoster")}).then(function(){return Object.assign(t.elements.poster.style,{backgroundImage:"url('".concat(e,"')"),backgroundSize:""}),jr.togglePoster.call(t,!0),e})):Promise.reject(new Error("Poster already set"))},checkPlaying:function(e){var t=this;Ci(this.elements.container,this.config.classNames.playing,this.playing),Ci(this.elements.container,this.config.classNames.paused,this.paused),Ci(this.elements.container,this.config.classNames.stopped,this.stopped),Array.from(this.elements.buttons.play||[]).forEach(function(e){e.pressed=t.playing}),hi.event(e)&&"timeupdate"===e.type||jr.toggleControls.call(this)},checkLoading:function(e){var t=this;this.loading=["stalled","waiting"].includes(e.type),clearTimeout(this.timers.loading),this.timers.loading=setTimeout(function(){Ci(t.elements.container,t.config.classNames.loading,t.loading),jr.toggleControls.call(t)},this.loading?250:0)},toggleControls:function(e){var t=this.elements.controls;if(t&&this.config.hideControls){var n=this.touch&&this.lastSeekTime+2e3>Date.now();this.toggleControls(Boolean(e||this.loading||this.paused||t.pressed||t.hover||n))}}},Ir=function(){function e(t){Xt(this,e),this.player=t,this.lastKey=null,this.focusTimer=null,this.lastKeyDown=null,this.handleKey=this.handleKey.bind(this),this.toggleMenu=this.toggleMenu.bind(this),this.setTabFocus=this.setTabFocus.bind(this),this.firstTouch=this.firstTouch.bind(this)}return en(e,[{key:"handleKey",value:function(e){var t=this.player,n=t.elements,i=e.keyCode?e.keyCode:e.which,r="keydown"===e.type,o=r&&i===this.lastKey;if(!(e.altKey||e.ctrlKey||e.metaKey||e.shiftKey)&&hi.number(i)){if(r){var a=document.activeElement;if(hi.element(a)){var s=t.config.selectors.editable;if(a!==n.inputs.seek&&Mi(a,s))return;if(32===e.which&&Mi(a,'button, [role^="menuitem"]'))return}switch([32,37,38,39,40,48,49,50,51,52,53,54,56,57,67,70,73,75,76,77,79].includes(i)&&(e.preventDefault(),e.stopPropagation()),i){case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:o||(t.currentTime=t.duration/10*(i-48));break;case 32:case 75:o||t.togglePlay();break;case 38:t.increaseVolume(.1);break;case 40:t.decreaseVolume(.1);break;case 77:o||(t.muted=!t.muted);break;case 39:t.forward();break;case 37:t.rewind();break;case 70:t.fullscreen.toggle();break;case 67:o||t.toggleCaptions();break;case 76:t.loop=!t.loop}!t.fullscreen.enabled&&t.fullscreen.active&&27===i&&t.fullscreen.toggle(),this.lastKey=i}else this.lastKey=null}}},{key:"toggleMenu",value:function(e){vr.toggleMenu.call(this.player,e)}},{key:"firstTouch",value:function(){var e=this.player,t=e.elements;e.touch=!0,Ci(t.container,e.config.classNames.isTouch,!0)}},{key:"setTabFocus",value:function(e){var t=this.player,n=t.elements;if(clearTimeout(this.focusTimer),"keydown"!==e.type||9===e.which){"keydown"===e.type&&(this.lastKeyDown=e.timeStamp);var i,r=e.timeStamp-this.lastKeyDown<=20;if("focus"!==e.type||r)i=t.config.classNames.tabFocus,Ci(Ni.call(t,".".concat(i)),i,!1),this.focusTimer=setTimeout(function(){var e=document.activeElement;n.container.contains(e)&&Ci(document.activeElement,t.config.classNames.tabFocus,!0)},10)}}},{key:"global",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0],t=this.player;t.config.keyboard.global&&pi.call(t,window,"keydown keyup",this.handleKey,e,!1),pi.call(t,document.body,"click",this.toggleMenu,e),yi.call(t,document.body,"touchstart",this.firstTouch),pi.call(t,document.body,"keydown focus blur",this.setTabFocus,e,!1,!0)}},{key:"container",value:function(){var e=this.player,t=e.elements;!e.config.keyboard.global&&e.config.keyboard.focused&&mi.call(e,t.container,"keydown keyup",this.handleKey,!1),mi.call(e,t.container,"mousemove mouseleave touchstart touchmove enterfullscreen exitfullscreen",function(n){var i=t.controls;i&&"enterfullscreen"===n.type&&(i.pressed=!1,i.hover=!1);var r=0;["touchstart","touchmove","mousemove"].includes(n.type)&&(jr.toggleControls.call(e,!0),r=e.touch?3e3:2e3),clearTimeout(e.timers.controls),e.timers.controls=setTimeout(function(){return jr.toggleControls.call(e,!1)},r)})}},{key:"media",value:function(){var e=this.player,t=e.elements;if(mi.call(e,e.media,"timeupdate seeking seeked",function(t){return vr.timeUpdate.call(e,t)}),mi.call(e,e.media,"durationchange loadeddata loadedmetadata",function(t){return vr.durationUpdate.call(e,t)}),mi.call(e,e.media,"canplay loadeddata",function(){Pi(t.volume,!e.hasAudio),Pi(t.buttons.mute,!e.hasAudio)}),mi.call(e,e.media,"ended",function(){e.isHTML5&&e.isVideo&&e.config.resetOnEnd&&e.restart()}),mi.call(e,e.media,"progress playing seeking seeked",function(t){return vr.updateProgress.call(e,t)}),mi.call(e,e.media,"volumechange",function(t){return vr.updateVolume.call(e,t)}),mi.call(e,e.media,"playing play pause ended emptied timeupdate",function(t){return jr.checkPlaying.call(e,t)}),mi.call(e,e.media,"waiting canplay seeked playing",function(t){return jr.checkLoading.call(e,t)}),mi.call(e,e.media,"playing",function(){e.ads&&e.ads.enabled&&!e.ads.initialized&&e.ads.managerPromise.then(function(){return e.ads.play()}).catch(function(){return e.play()})}),e.supported.ui&&e.config.clickToPlay&&!e.isAudio){var n=xi.call(e,".".concat(e.config.classNames.video));if(!hi.element(n))return;mi.call(e,t.container,"click",function(i){([t.container,n].includes(i.target)||n.contains(i.target))&&(e.touch&&e.config.hideControls||(e.ended?(e.restart(),e.play()):e.togglePlay()))})}e.supported.ui&&e.config.disableContextMenu&&mi.call(e,t.wrapper,"contextmenu",function(e){e.preventDefault()},!1),mi.call(e,e.media,"volumechange",function(){e.storage.set({volume:e.volume,muted:e.muted})}),mi.call(e,e.media,"ratechange",function(){vr.updateSetting.call(e,"speed"),e.storage.set({speed:e.speed})}),mi.call(e,e.media,"qualitychange",function(t){vr.updateSetting.call(e,"quality",null,t.detail.quality)}),mi.call(e,e.media,"ready qualitychange",function(){vr.setDownloadLink.call(e)});var i=e.config.events.concat(["keyup","keydown"]).join(" ");mi.call(e,e.media,i,function(n){var i=n.detail,r=void 0===i?{}:i;"error"===n.type&&(r=e.media.error),vi.call(e,t.container,n.type,!0,r)})}},{key:"proxy",value:function(e,t,n){var i=this.player,r=i.config.listeners[n],o=!0;hi.function(r)&&(o=r.call(i,e)),o&&hi.function(t)&&t.call(i,e)}},{key:"bind",value:function(e,t,n,i){var r=this,o=!(arguments.length>4&&void 0!==arguments[4])||arguments[4],a=this.player,s=a.config.listeners[i],l=hi.function(s);mi.call(a,e,t,function(e){return r.proxy(e,n,i)},o&&!l)}},{key:"controls",value:function(){var e=this,t=this.player,n=t.elements,i=Vi.isIE?"change":"input";if(n.buttons.play&&Array.from(n.buttons.play).forEach(function(n){e.bind(n,"click",t.togglePlay,"play")}),this.bind(n.buttons.restart,"click",t.restart,"restart"),this.bind(n.buttons.rewind,"click",t.rewind,"rewind"),this.bind(n.buttons.fastForward,"click",t.forward,"fastForward"),this.bind(n.buttons.mute,"click",function(){t.muted=!t.muted},"mute"),this.bind(n.buttons.captions,"click",function(){return t.toggleCaptions()}),this.bind(n.buttons.download,"click",function(){vi.call(t,t.media,"download")},"download"),this.bind(n.buttons.fullscreen,"click",function(){t.fullscreen.toggle()},"fullscreen"),this.bind(n.buttons.pip,"click",function(){t.pip="toggle"},"pip"),this.bind(n.buttons.airplay,"click",t.airplay,"airplay"),this.bind(n.buttons.settings,"click",function(e){e.stopPropagation(),vr.toggleMenu.call(t,e)}),this.bind(n.buttons.settings,"keyup",function(e){var n=e.which;[13,32].includes(n)&&(13!==n?(e.preventDefault(),e.stopPropagation(),vr.toggleMenu.call(t,e)):vr.focusFirstMenuItem.call(t,null,!0))},null,!1),this.bind(n.settings.menu,"keydown",function(e){27===e.which&&vr.toggleMenu.call(t,e)}),this.bind(n.inputs.seek,"mousedown mousemove",function(e){var t=n.progress.getBoundingClientRect(),i=100/t.width*(e.pageX-t.left);e.currentTarget.setAttribute("seek-value",i)}),this.bind(n.inputs.seek,"mousedown mouseup keydown keyup touchstart touchend",function(e){var n=e.currentTarget,i=e.keyCode?e.keyCode:e.which;if(!hi.keyboardEvent(e)||39===i||37===i){t.lastSeekTime=Date.now();var r=n.hasAttribute("play-on-seeked"),o=["mouseup","touchend","keyup"].includes(e.type);r&&o?(n.removeAttribute("play-on-seeked"),t.play()):!o&&t.playing&&(n.setAttribute("play-on-seeked",""),t.pause())}}),Vi.isIos){var r=Ni.call(t,'input[type="range"]');Array.from(r).forEach(function(t){return e.bind(t,i,function(e){return Di(e.target)})})}this.bind(n.inputs.seek,i,function(e){var n=e.currentTarget,i=n.getAttribute("seek-value");hi.empty(i)&&(i=n.value),n.removeAttribute("seek-value"),t.currentTime=i/n.max*t.duration},"seek"),this.bind(n.progress,"mouseenter mouseleave mousemove",function(e){return vr.updateSeekTooltip.call(t,e)}),Vi.isWebkit&&Array.from(Ni.call(t,'input[type="range"]')).forEach(function(n){e.bind(n,"input",function(e){return vr.updateRangeFill.call(t,e.target)})}),t.config.toggleInvert&&!hi.element(n.display.duration)&&this.bind(n.display.currentTime,"click",function(){0!==t.currentTime&&(t.config.invertTime=!t.config.invertTime,vr.timeUpdate.call(t))}),this.bind(n.inputs.volume,i,function(e){t.volume=e.target.value},"volume"),this.bind(n.controls,"mouseenter mouseleave",function(e){n.controls.hover=!t.touch&&"mouseenter"===e.type}),this.bind(n.controls,"mousedown mouseup touchstart touchend touchcancel",function(e){n.controls.pressed=["mousedown","touchstart"].includes(e.type)}),this.bind(n.controls,"focusin",function(){var n=t.config,i=t.elements,r=t.timers;Ci(i.controls,n.classNames.noTransition,!0),jr.toggleControls.call(t,!0),setTimeout(function(){Ci(i.controls,n.classNames.noTransition,!1)},0);var o=e.touch?3e3:4e3;clearTimeout(r.controls),r.controls=setTimeout(function(){return jr.toggleControls.call(t,!1)},o)}),this.bind(n.inputs.volume,"wheel",function(e){var n=e.webkitDirectionInvertedFromDevice,i=nn([e.deltaX,-e.deltaY].map(function(e){return n?-e:e}),2),r=i[0],o=i[1],a=Math.sign(Math.abs(r)>Math.abs(o)?r:o);t.increaseVolume(a/50);var s=t.media.volume;(1===a&&s<1||-1===a&&s>0)&&e.preventDefault()},"volume",!1)}}]),e}(),Rr=g.f,Fr=Function.prototype,Dr=/^\s*function ([^ (]*)/;"name"in Fr||c&&Rr(Fr,"name",{configurable:!0,get:function(){try{return(""+this).match(Dr)[1]}catch(e){return""}}}),at("match",1,function(e,t,n){return[function(n){var i=e(this),r=null==n?void 0:n[t];return void 0!==r?r.call(n,i):new RegExp(n)[t](String(i))},n]});var qr=t(function(e,t){e.exports=function(){var e=function(){},t={},n={},i={};function r(e,t){if(e){var r=i[e];if(n[e]=t,r)for(;r.length;)r[0](e,t),r.splice(0,1)}}function o(t,n){t.call&&(t={success:t}),n.length?(t.error||e)(n):(t.success||e)(t)}function a(t,n,i,r){var o,s,l=document,c=i.async,u=(i.numRetries||0)+1,d=i.before||e,h=t.replace(/^(css|img)!/,"");r=r||0,/(^css!|\.css$)/.test(t)?(o=!0,(s=l.createElement("link")).rel="stylesheet",s.href=h):/(^img!|\.(png|gif|jpg|svg)$)/.test(t)?(s=l.createElement("img")).src=h:((s=l.createElement("script")).src=t,s.async=void 0===c||c),s.onload=s.onerror=s.onbeforeload=function(e){var l=e.type[0];if(o&&"hideFocus"in s)try{s.sheet.cssText.length||(l="e")}catch(e){l="e"}if("e"==l&&(r+=1)<u)return a(t,n,i,r);n(t,l,e.defaultPrevented)},!1!==d(t,s)&&l.head.appendChild(s)}function s(e,n,i){var s,l;if(n&&n.trim&&(s=n),l=(s?i:n)||{},s){if(s in t)throw"LoadJS";t[s]=!0}!function(e,t,n){var i,r,o=(e=e.push?e:[e]).length,s=o,l=[];for(i=function(e,n,i){if("e"==n&&l.push(e),"b"==n){if(!i)return;l.push(e)}--o||t(l)},r=0;r<s;r++)a(e[r],i,n)}(e,function(e){o(l,e),r(s,e)},l)}return s.ready=function(e,t){return function(e,t){e=e.push?e:[e];var r,o,a,s=[],l=e.length,c=l;for(r=function(e,n){n.length&&s.push(e),--c||t(s)};l--;)o=e[l],(a=n[o])?r(o,a):(i[o]=i[o]||[]).push(r)}(e,function(e){o(t,e)}),s},s.done=function(e){r(e,[])},s.reset=function(){t={},n={},i={}},s.isDefined=function(e){return e in t},s}()});function Vr(e){return new Promise(function(t,n){qr(e,{success:t,error:n})})}function Br(e){e&&!this.embed.hasPlayed&&(this.embed.hasPlayed=!0),this.media.paused===e&&(this.media.paused=!e,vi.call(this,this.media,e?"play":"pause"))}var Hr={setup:function(){var e=this;Ci(this.elements.wrapper,this.config.classNames.embed,!0),Hr.setAspectRatio.call(this),hi.object(window.Vimeo)?Hr.ready.call(this):Vr(this.config.urls.vimeo.sdk).then(function(){Hr.ready.call(e)}).catch(function(t){e.debug.warn("Vimeo API failed to load",t)})},setAspectRatio:function(e){var t=nn((hi.string(e)?e:this.config.ratio).split(":").map(Number),2),n=100/t[0]*t[1];if(Hr.padding=n,this.elements.wrapper.style.paddingBottom="".concat(n,"%"),this.supported.ui){var i=(240-n)/4.8;this.media.style.transform="translateY(-".concat(i,"%)")}},ready:function(){var e=this,t=this,n=kr({loop:t.config.loop.active,autoplay:t.autoplay,byline:!1,portrait:!1,title:!1,speed:!0,transparent:0,gesture:"media",playsinline:!this.config.fullscreen.iosNative}),i=t.media.getAttribute("src");hi.empty(i)&&(i=t.media.getAttribute(t.config.attributes.embed.id));var r,o=(r=i,hi.empty(r)?null:hi.number(Number(r))?r:r.match(/^.*(vimeo.com\/|video\/)(\d+).*/)?RegExp.$2:r),a=wi("iframe"),s=rr(t.config.urls.vimeo.iframe,o,n);a.setAttribute("src",s),a.setAttribute("allowfullscreen",""),a.setAttribute("allowtransparency",""),a.setAttribute("allow","autoplay");var l=wi("div",{poster:t.poster,class:t.config.classNames.embedContainer});l.appendChild(a),t.media=_i(l,t.media),hr(rr(t.config.urls.vimeo.api,o),"json").then(function(e){if(!hi.empty(e)){var n=new URL(e[0].thumbnail_large);n.pathname="".concat(n.pathname.split("_")[0],".jpg"),jr.setPoster.call(t,n.href).catch(function(){})}}),t.embed=new window.Vimeo.Player(a,{autopause:t.config.autopause,muted:t.muted}),t.media.paused=!0,t.media.currentTime=0,t.supported.ui&&t.embed.disableTextTrack(),t.media.play=function(){return Br.call(t,!0),t.embed.play()},t.media.pause=function(){return Br.call(t,!1),t.embed.pause()},t.media.stop=function(){t.pause(),t.currentTime=0};var c=t.media.currentTime;Object.defineProperty(t.media,"currentTime",{get:function(){return c},set:function(e){var n=t.embed,i=t.media,r=t.paused,o=t.volume,a=r&&!n.hasPlayed;i.seeking=!0,vi.call(t,i,"seeking"),Promise.resolve(a&&n.setVolume(0)).then(function(){return n.setCurrentTime(e)}).then(function(){return a&&n.pause()}).then(function(){return a&&n.setVolume(o)}).catch(function(){})}});var u=t.config.speed.selected;Object.defineProperty(t.media,"playbackRate",{get:function(){return u},set:function(e){t.embed.setPlaybackRate(e).then(function(){u=e,vi.call(t,t.media,"ratechange")}).catch(function(e){"Error"===e.name&&vr.setSpeedMenu.call(t,[])})}});var d=t.config.volume;Object.defineProperty(t.media,"volume",{get:function(){return d},set:function(e){t.embed.setVolume(e).then(function(){d=e,vi.call(t,t.media,"volumechange")})}});var h=t.config.muted;Object.defineProperty(t.media,"muted",{get:function(){return h},set:function(e){var n=!!hi.boolean(e)&&e;t.embed.setVolume(n?0:t.config.volume).then(function(){h=n,vi.call(t,t.media,"volumechange")})}});var f,p=t.config.loop;Object.defineProperty(t.media,"loop",{get:function(){return p},set:function(e){var n=hi.boolean(e)?e:t.config.loop.active;t.embed.setLoop(n).then(function(){p=n})}}),t.embed.getVideoUrl().then(function(e){f=e,vr.setDownloadLink.call(t)}).catch(function(t){e.debug.warn(t)}),Object.defineProperty(t.media,"currentSrc",{get:function(){return f}}),Object.defineProperty(t.media,"ended",{get:function(){return t.currentTime===t.duration}}),Promise.all([t.embed.getVideoWidth(),t.embed.getVideoHeight()]).then(function(t){var n,i,r;Hr.ratio=(n=t[0],i=t[1],r=function e(t,n){return 0===n?t:e(n,t%n)}(n,i),"".concat(n/r,":").concat(i/r)),Hr.setAspectRatio.call(e,Hr.ratio)}),t.embed.setAutopause(t.config.autopause).then(function(e){t.config.autopause=e}),t.embed.getVideoTitle().then(function(n){t.config.title=n,jr.setTitle.call(e)}),t.embed.getCurrentTime().then(function(e){c=e,vi.call(t,t.media,"timeupdate")}),t.embed.getDuration().then(function(e){t.media.duration=e,vi.call(t,t.media,"durationchange")}),t.embed.getTextTracks().then(function(e){t.media.textTracks=e,wr.setup.call(t)}),t.embed.on("cuechange",function(e){var n=e.cues,i=(void 0===n?[]:n).map(function(e){return t=e.text,n=document.createDocumentFragment(),i=document.createElement("div"),n.appendChild(i),i.innerHTML=t,n.firstChild.innerText;var t,n,i});wr.updateCues.call(t,i)}),t.embed.on("loaded",function(){(t.embed.getPaused().then(function(e){Br.call(t,!e),e||vi.call(t,t.media,"playing")}),hi.element(t.embed.element)&&t.supported.ui)&&t.embed.element.setAttribute("tabindex",-1)}),t.embed.on("play",function(){Br.call(t,!0),vi.call(t,t.media,"playing")}),t.embed.on("pause",function(){Br.call(t,!1)}),t.embed.on("timeupdate",function(e){t.media.seeking=!1,c=e.seconds,vi.call(t,t.media,"timeupdate")}),t.embed.on("progress",function(e){t.media.buffered=e.percent,vi.call(t,t.media,"progress"),1===parseInt(e.percent,10)&&vi.call(t,t.media,"canplaythrough"),t.embed.getDuration().then(function(e){e!==t.media.duration&&(t.media.duration=e,vi.call(t,t.media,"durationchange"))})}),t.embed.on("seeked",function(){t.media.seeking=!1,vi.call(t,t.media,"seeked")}),t.embed.on("ended",function(){t.media.paused=!0,vi.call(t,t.media,"ended")}),t.embed.on("error",function(e){t.media.error=e,vi.call(t,t.media,"error")}),t.on("enterfullscreen exitfullscreen",function(e){var n=t.fullscreen.target;if(n===t.elements.container){var i="enterfullscreen"===e.type,r=nn(Hr.ratio.split(":").map(Number),2),o=r[0]>r[1]?"width":"height";n.style[o]=i?"".concat(Hr.padding,"%"):null}}),setTimeout(function(){return jr.build.call(t)},0)}};function Ur(e){e&&!this.embed.hasPlayed&&(this.embed.hasPlayed=!0),this.media.paused===e&&(this.media.paused=!e,vi.call(this,this.media,e?"play":"pause"))}var Wr,Kr={setup:function(){var e=this;Ci(this.elements.wrapper,this.config.classNames.embed,!0),Kr.setAspectRatio.call(this),hi.object(window.YT)&&hi.function(window.YT.Player)?Kr.ready.call(this):(Vr(this.config.urls.youtube.sdk).catch(function(t){e.debug.warn("YouTube API failed to load",t)}),window.onYouTubeReadyCallbacks=window.onYouTubeReadyCallbacks||[],window.onYouTubeReadyCallbacks.push(function(){Kr.ready.call(e)}),window.onYouTubeIframeAPIReady=function(){window.onYouTubeReadyCallbacks.forEach(function(e){e()})})},getTitle:function(e){var t=this;if(hi.function(this.embed.getVideoData)){var n=this.embed.getVideoData().title;if(hi.empty(n))return this.config.title=n,void jr.setTitle.call(this)}var i=this.config.keys.google;hi.string(i)&&!hi.empty(i)&&hr(rr(this.config.urls.youtube.api,e,i)).then(function(e){hi.object(e)&&(t.config.title=e.items[0].snippet.title,jr.setTitle.call(t))}).catch(function(){})},setAspectRatio:function(){var e=this.config.ratio.split(":");this.elements.wrapper.style.paddingBottom="".concat(100/e[0]*e[1],"%")},ready:function(){var e=this,t=e.media.getAttribute("id");if(hi.empty(t)||!t.startsWith("youtube-")){var n=e.media.getAttribute("src");hi.empty(n)&&(n=e.media.getAttribute(this.config.attributes.embed.id));var i,r,o=(i=n,hi.empty(i)?null:i.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/)?RegExp.$2:i),a=(r=e.provider,"".concat(r,"-").concat(Math.floor(1e4*Math.random()))),s=wi("div",{id:a,poster:e.poster});e.media=_i(s,e.media);var l=function(e){return"https://img.youtube.com/vi/".concat(o,"/").concat(e,"default.jpg")};Or(l("maxres"),121).catch(function(){return Or(l("sd"),121)}).catch(function(){return Or(l("hq"))}).then(function(t){return jr.setPoster.call(e,t.src)}).then(function(t){t.includes("maxres")||(e.elements.poster.style.backgroundSize="cover")}).catch(function(){}),e.embed=new window.YT.Player(a,{videoId:o,playerVars:{autoplay:e.config.autoplay?1:0,hl:e.config.hl,controls:e.supported.ui?0:1,rel:0,showinfo:0,iv_load_policy:3,modestbranding:1,disablekb:1,playsinline:1,widget_referrer:window?window.location.href:null,cc_load_policy:e.captions.active?1:0,cc_lang_pref:e.config.captions.language},events:{onError:function(t){if(!e.media.error){var n=t.data,i={2:"The request contains an invalid parameter value. For example, this error occurs if you specify a video ID that does not have 11 characters, or if the video ID contains invalid characters, such as exclamation points or asterisks.",5:"The requested content cannot be played in an HTML5 player or another error related to the HTML5 player has occurred.",100:"The video requested was not found. This error occurs when a video has been removed (for any reason) or has been marked as private.",101:"The owner of the requested video does not allow it to be played in embedded players.",150:"The owner of the requested video does not allow it to be played in embedded players."}[n]||"An unknown error occured";e.media.error={code:n,message:i},vi.call(e,e.media,"error")}},onPlaybackRateChange:function(t){var n=t.target;e.media.playbackRate=n.getPlaybackRate(),vi.call(e,e.media,"ratechange")},onReady:function(t){if(!hi.function(e.media.play)){var n=t.target;Kr.getTitle.call(e,o),e.media.play=function(){Ur.call(e,!0),n.playVideo()},e.media.pause=function(){Ur.call(e,!1),n.pauseVideo()},e.media.stop=function(){n.stopVideo()},e.media.duration=n.getDuration(),e.media.paused=!0,e.media.currentTime=0,Object.defineProperty(e.media,"currentTime",{get:function(){return Number(n.getCurrentTime())},set:function(t){e.paused&&!e.embed.hasPlayed&&e.embed.mute(),e.media.seeking=!0,vi.call(e,e.media,"seeking"),n.seekTo(t)}}),Object.defineProperty(e.media,"playbackRate",{get:function(){return n.getPlaybackRate()},set:function(e){n.setPlaybackRate(e)}});var i=e.config.volume;Object.defineProperty(e.media,"volume",{get:function(){return i},set:function(t){i=t,n.setVolume(100*i),vi.call(e,e.media,"volumechange")}});var r=e.config.muted;Object.defineProperty(e.media,"muted",{get:function(){return r},set:function(t){var i=hi.boolean(t)?t:r;r=i,n[i?"mute":"unMute"](),vi.call(e,e.media,"volumechange")}}),Object.defineProperty(e.media,"currentSrc",{get:function(){return n.getVideoUrl()}}),Object.defineProperty(e.media,"ended",{get:function(){return e.currentTime===e.duration}}),e.options.speed=n.getAvailablePlaybackRates(),e.supported.ui&&e.media.setAttribute("tabindex",-1),vi.call(e,e.media,"timeupdate"),vi.call(e,e.media,"durationchange"),clearInterval(e.timers.buffering),e.timers.buffering=setInterval(function(){e.media.buffered=n.getVideoLoadedFraction(),(null===e.media.lastBuffered||e.media.lastBuffered<e.media.buffered)&&vi.call(e,e.media,"progress"),e.media.lastBuffered=e.media.buffered,1===e.media.buffered&&(clearInterval(e.timers.buffering),vi.call(e,e.media,"canplaythrough"))},200),setTimeout(function(){return jr.build.call(e)},50)}},onStateChange:function(t){var n=t.target;switch(clearInterval(e.timers.playing),e.media.seeking&&[1,2].includes(t.data)&&(e.media.seeking=!1,vi.call(e,e.media,"seeked")),t.data){case-1:vi.call(e,e.media,"timeupdate"),e.media.buffered=n.getVideoLoadedFraction(),vi.call(e,e.media,"progress");break;case 0:Ur.call(e,!1),e.media.loop?(n.stopVideo(),n.playVideo()):vi.call(e,e.media,"ended");break;case 1:e.media.paused&&!e.embed.hasPlayed?e.media.pause():(Ur.call(e,!0),vi.call(e,e.media,"playing"),e.timers.playing=setInterval(function(){vi.call(e,e.media,"timeupdate")},50),e.media.duration!==n.getDuration()&&(e.media.duration=n.getDuration(),vi.call(e,e.media,"durationchange")));break;case 2:e.muted||e.embed.unMute(),Ur.call(e,!1)}vi.call(e,e.elements.container,"statechange",!1,{code:t.data})}}})}}},zr={setup:function(){this.media?(Ci(this.elements.container,this.config.classNames.type.replace("{0}",this.type),!0),Ci(this.elements.container,this.config.classNames.provider.replace("{0}",this.provider),!0),this.isEmbed&&Ci(this.elements.container,this.config.classNames.type.replace("{0}","video"),!0),this.isVideo&&(this.elements.wrapper=wi("div",{class:this.config.classNames.video}),bi(this.media,this.elements.wrapper),this.elements.poster=wi("div",{class:this.config.classNames.poster}),this.elements.wrapper.appendChild(this.elements.poster)),this.isHTML5?Ui.extend.call(this):this.isYouTube?Kr.setup.call(this):this.isVimeo&&Hr.setup.call(this)):this.debug.warn("No media element found!")}},Yr=function(){function e(t){var n=this;Xt(this,e),this.player=t,this.publisherId=t.config.ads.publisherId,this.playing=!1,this.initialized=!1,this.elements={container:null,displayContainer:null},this.manager=null,this.loader=null,this.cuePoints=null,this.events={},this.safetyTimer=null,this.countdownTimer=null,this.managerPromise=new Promise(function(e,t){n.on("loaded",e),n.on("error",t)}),this.load()}return en(e,[{key:"load",value:function(){var e=this;this.enabled&&(hi.object(window.google)&&hi.object(window.google.ima)?this.ready():Vr(this.player.config.urls.googleIMA.sdk).then(function(){e.ready()}).catch(function(){e.trigger("error",new Error("Google IMA SDK failed to load"))}))}},{key:"ready",value:function(){var e=this;this.startSafetyTimer(12e3,"ready()"),this.managerPromise.then(function(){e.clearSafetyTimer("onAdsManagerLoaded()")}),this.listeners(),this.setupIMA()}},{key:"setupIMA",value:function(){this.elements.container=wi("div",{class:this.player.config.classNames.ads}),this.player.elements.container.appendChild(this.elements.container),google.ima.settings.setVpaidMode(google.ima.ImaSdkSettings.VpaidMode.ENABLED),google.ima.settings.setLocale(this.player.config.ads.language),this.elements.displayContainer=new google.ima.AdDisplayContainer(this.elements.container),this.requestAds()}},{key:"requestAds",value:function(){var e=this,t=this.player.elements.container;try{this.loader=new google.ima.AdsLoader(this.elements.displayContainer),this.loader.addEventListener(google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED,function(t){return e.onAdsManagerLoaded(t)},!1),this.loader.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR,function(t){return e.onAdError(t)},!1);var n=new google.ima.AdsRequest;n.adTagUrl=this.tagUrl,n.linearAdSlotWidth=t.offsetWidth,n.linearAdSlotHeight=t.offsetHeight,n.nonLinearAdSlotWidth=t.offsetWidth,n.nonLinearAdSlotHeight=t.offsetHeight,n.forceNonLinearFullSlot=!1,n.setAdWillPlayMuted(!this.player.muted),this.loader.requestAds(n)}catch(e){this.onAdError(e)}}},{key:"pollCountdown",value:function(){var e=this;if(!(arguments.length>0&&void 0!==arguments[0]&&arguments[0]))return clearInterval(this.countdownTimer),void this.elements.container.removeAttribute("data-badge-text");this.countdownTimer=setInterval(function(){var t=yr(Math.max(e.manager.getRemainingTime(),0)),n="".concat(ur("advertisement",e.player.config)," - ").concat(t);e.elements.container.setAttribute("data-badge-text",n)},100)}},{key:"onAdsManagerLoaded",value:function(e){var t=this;if(this.enabled){var n=new google.ima.AdsRenderingSettings;n.restoreCustomPlaybackStateOnAdBreakComplete=!0,n.enablePreloading=!0,this.manager=e.getAdsManager(this.player,n),this.cuePoints=this.manager.getCuePoints(),hi.empty(this.cuePoints)||this.cuePoints.forEach(function(e){if(0!==e&&-1!==e&&e<t.player.duration){var n=t.player.elements.progress;if(hi.element(n)){var i=100/t.player.duration*e,r=wi("span",{class:t.player.config.classNames.cues});r.style.left="".concat(i.toString(),"%"),n.appendChild(r)}}}),this.manager.setVolume(this.player.volume),this.manager.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR,function(e){return t.onAdError(e)}),Object.keys(google.ima.AdEvent.Type).forEach(function(e){t.manager.addEventListener(google.ima.AdEvent.Type[e],function(e){return t.onAdEvent(e)})}),this.trigger("loaded")}}},{key:"onAdEvent",value:function(e){var t=this,n=this.player.elements.container,i=e.getAd(),r=function(e){var n="ads".concat(e.replace(/_/g,"").toLowerCase());vi.call(t.player,t.player.media,n)};switch(e.type){case google.ima.AdEvent.Type.LOADED:this.trigger("loaded"),r(e.type),this.pollCountdown(!0),i.isLinear()||(i.width=n.offsetWidth,i.height=n.offsetHeight);break;case google.ima.AdEvent.Type.ALL_ADS_COMPLETED:r(e.type),this.loadAds();break;case google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED:r(e.type),this.pauseContent();break;case google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED:r(e.type),this.pollCountdown(),this.resumeContent();break;case google.ima.AdEvent.Type.STARTED:case google.ima.AdEvent.Type.MIDPOINT:case google.ima.AdEvent.Type.COMPLETE:case google.ima.AdEvent.Type.IMPRESSION:case google.ima.AdEvent.Type.CLICK:r(e.type)}}},{key:"onAdError",value:function(e){this.cancel(),this.player.debug.warn("Ads error",e)}},{key:"listeners",value:function(){var e,t=this,n=this.player.elements.container;this.player.on("ended",function(){t.loader.contentComplete()}),this.player.on("seeking",function(){return e=t.player.currentTime}),this.player.on("seeked",function(){var n=t.player.currentTime;hi.empty(t.cuePoints)||t.cuePoints.forEach(function(i,r){e<i&&i<n&&(t.manager.discardAdBreak(),t.cuePoints.splice(r,1))})}),window.addEventListener("resize",function(){t.manager&&t.manager.resize(n.offsetWidth,n.offsetHeight,google.ima.ViewMode.NORMAL)})}},{key:"play",value:function(){var e=this,t=this.player.elements.container;this.managerPromise||this.resumeContent(),this.managerPromise.then(function(){e.elements.displayContainer.initialize();try{e.initialized||(e.manager.init(t.offsetWidth,t.offsetHeight,google.ima.ViewMode.NORMAL),e.manager.start()),e.initialized=!0}catch(t){e.onAdError(t)}}).catch(function(){})}},{key:"resumeContent",value:function(){this.elements.container.style.zIndex="",this.playing=!1,this.player.currentTime<this.player.duration&&this.player.play()}},{key:"pauseContent",value:function(){this.elements.container.style.zIndex=3,this.playing=!0,this.player.pause()}},{key:"cancel",value:function(){this.initialized&&this.resumeContent(),this.trigger("error"),this.loadAds()}},{key:"loadAds",value:function(){var e=this;this.managerPromise.then(function(){e.manager&&e.manager.destroy(),e.managerPromise=new Promise(function(t){e.on("loaded",t),e.player.debug.log(e.manager)}),e.requestAds()}).catch(function(){})}},{key:"trigger",value:function(e){for(var t=this,n=arguments.length,i=new Array(n>1?n-1:0),r=1;r<n;r++)i[r-1]=arguments[r];var o=this.events[e];hi.array(o)&&o.forEach(function(e){hi.function(e)&&e.apply(t,i)})}},{key:"on",value:function(e,t){return hi.array(this.events[e])||(this.events[e]=[]),this.events[e].push(t),this}},{key:"startSafetyTimer",value:function(e,t){var n=this;this.player.debug.log("Safety timer invoked from: ".concat(t)),this.safetyTimer=setTimeout(function(){n.cancel(),n.clearSafetyTimer("startSafetyTimer()")},e)}},{key:"clearSafetyTimer",value:function(e){hi.nullOrUndefined(this.safetyTimer)||(this.player.debug.log("Safety timer cleared from: ".concat(e)),clearTimeout(this.safetyTimer),this.safetyTimer=null)}},{key:"enabled",get:function(){return this.player.isHTML5&&this.player.isVideo&&this.player.config.ads.enabled&&!hi.empty(this.publisherId)}},{key:"tagUrl",get:function(){var e={AV_PUBLISHERID:"58c25bb0073ef448b1087ad6",AV_CHANNELID:"5a0458dc28a06145e4519d21",AV_URL:window.location.hostname,cb:Date.now(),AV_WIDTH:640,AV_HEIGHT:480,AV_CDIM2:this.publisherId};return"".concat("https://go.aniview.com/api/adserver6/vast/","?").concat(kr(e))}}]),e}(),Gr={insertElements:function(e,t){var n=this;hi.string(t)?Ti(e,this.media,{src:t}):hi.array(t)&&t.forEach(function(t){Ti(e,n.media,t)})},change:function(e){var t=this;Ki(e,"sources.length")?(Ui.cancelRequests.call(this),this.destroy.call(this,function(){t.options.quality=[],Ei(t.media),t.media=null,hi.element(t.elements.container)&&t.elements.container.removeAttribute("class");var n=e.sources,i=e.type,r=nn(n,1)[0],o=r.provider,a=void 0===o?_r.html5:o,s=r.src,l="html5"===a?i:"div",c="html5"===a?{}:{src:s};Object.assign(t,{provider:a,type:i,supported:Hi.check(i,a,t.config.playsinline),media:wi(l,c)}),t.elements.container.appendChild(t.media),hi.boolean(e.autoplay)&&(t.config.autoplay=e.autoplay),t.isHTML5&&(t.config.crossorigin&&t.media.setAttribute("crossorigin",""),t.config.autoplay&&t.media.setAttribute("autoplay",""),hi.empty(e.poster)||(t.poster=e.poster),t.config.loop.active&&t.media.setAttribute("loop",""),t.config.muted&&t.media.setAttribute("muted",""),t.config.playsinline&&t.media.setAttribute("playsinline","")),jr.addStyleHook.call(t),t.isHTML5&&Gr.insertElements.call(t,"source",n),t.config.title=e.title,zr.setup.call(t),t.isHTML5&&Object.keys(e).includes("tracks")&&Gr.insertElements.call(t,"track",e.tracks),(t.isHTML5||t.isEmbed&&!t.supported.ui)&&jr.build.call(t),t.isHTML5&&t.media.load(),t.fullscreen.update()},!0)):this.debug.warn("Invalid source format")}},$r=function(){function e(t,n){var i=this;if(Xt(this,e),this.timers={},this.ready=!1,this.loading=!1,this.failed=!1,this.touch=Hi.touch,this.media=t,hi.string(this.media)&&(this.media=document.querySelectorAll(this.media)),(window.jQuery&&this.media instanceof jQuery||hi.nodeList(this.media)||hi.array(this.media))&&(this.media=this.media[0]),this.config=zi({},Tr,e.defaults,n||{},function(){try{return JSON.parse(i.media.getAttribute("data-plyr-config"))}catch(e){return{}}}()),this.elements={container:null,captions:null,buttons:{},display:{},progress:{},inputs:{},settings:{popup:null,menu:null,panels:{},buttons:{}}},this.captions={active:null,currentTrack:-1,meta:new WeakMap},this.fullscreen={active:!1},this.options={speed:[],quality:[]},this.debug=new Cr(this.config.debug),this.debug.log("Config",this.config),this.debug.log("Support",Hi),!hi.nullOrUndefined(this.media)&&hi.element(this.media))if(this.media.plyr)this.debug.warn("Target already setup");else if(this.config.enabled)if(Hi.check().api){var r=this.media.cloneNode(!0);r.autoplay=!1,this.elements.original=r;var o=this.media.tagName.toLowerCase(),a=null,s=null;switch(o){case"div":if(a=this.media.querySelector("iframe"),hi.element(a)){if(s=br(a.getAttribute("src")),this.provider=function(e){return/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/.test(e)?_r.youtube:/^https?:\/\/player.vimeo.com\/video\/\d{0,9}(?=\b|\/)/.test(e)?_r.vimeo:null}(s.toString()),this.elements.container=this.media,this.media=a,this.elements.container.className="",s.search.length){var l=["1","true"];l.includes(s.searchParams.get("autoplay"))&&(this.config.autoplay=!0),l.includes(s.searchParams.get("loop"))&&(this.config.loop.active=!0),this.isYouTube?(this.config.playsinline=l.includes(s.searchParams.get("playsinline")),this.config.hl=s.searchParams.get("hl")):this.config.playsinline=!0}}else this.provider=this.media.getAttribute(this.config.attributes.embed.provider),this.media.removeAttribute(this.config.attributes.embed.provider);if(hi.empty(this.provider)||!Object.keys(_r).includes(this.provider))return void this.debug.error("Setup failed: Invalid provider");this.type=Sr.video;break;case"video":case"audio":this.type=o,this.provider=_r.html5,this.media.hasAttribute("crossorigin")&&(this.config.crossorigin=!0),this.media.hasAttribute("autoplay")&&(this.config.autoplay=!0),(this.media.hasAttribute("playsinline")||this.media.hasAttribute("webkit-playsinline"))&&(this.config.playsinline=!0),this.media.hasAttribute("muted")&&(this.config.muted=!0),this.media.hasAttribute("loop")&&(this.config.loop.active=!0);break;default:return void this.debug.error("Setup failed: unsupported type")}this.supported=Hi.check(this.type,this.provider,this.config.playsinline),this.supported.api?(this.eventListeners=[],this.listeners=new Ir(this),this.storage=new dr(this),this.media.plyr=this,hi.element(this.elements.container)||(this.elements.container=wi("div"),bi(this.media,this.elements.container)),jr.addStyleHook.call(this),zr.setup.call(this),this.config.debug&&mi.call(this,this.elements.container,this.config.events.join(" "),function(e){i.debug.log("event: ".concat(e.type))}),(this.isHTML5||this.isEmbed&&!this.supported.ui)&&jr.build.call(this),this.listeners.container(),this.listeners.global(),this.fullscreen=new Nr(this),this.config.ads.enabled&&(this.ads=new Yr(this)),this.config.autoplay&&this.play(),this.lastSeekTime=0):this.debug.error("Setup failed: no support")}else this.debug.error("Setup failed: no support");else this.debug.error("Setup failed: disabled by config");else this.debug.error("Setup failed: no suitable element passed")}return en(e,[{key:"play",value:function(){return hi.function(this.media.play)?this.media.play():null}},{key:"pause",value:function(){this.playing&&hi.function(this.media.pause)&&this.media.pause()}},{key:"togglePlay",value:function(e){(hi.boolean(e)?e:!this.playing)?this.play():this.pause()}},{key:"stop",value:function(){this.isHTML5?(this.pause(),this.restart()):hi.function(this.media.stop)&&this.media.stop()}},{key:"restart",value:function(){this.currentTime=0}},{key:"rewind",value:function(e){this.currentTime=this.currentTime-(hi.number(e)?e:this.config.seekTime)}},{key:"forward",value:function(e){this.currentTime=this.currentTime+(hi.number(e)?e:this.config.seekTime)}},{key:"increaseVolume",value:function(e){var t=this.media.muted?0:this.volume;this.volume=t+(hi.number(e)?e:0)}},{key:"decreaseVolume",value:function(e){this.increaseVolume(-e)}},{key:"toggleCaptions",value:function(e){wr.toggle.call(this,e,!1)}},{key:"airplay",value:function(){Hi.airplay&&this.media.webkitShowPlaybackTargetPicker()}},{key:"toggleControls",value:function(e){if(this.supported.ui&&!this.isAudio){var t=Li(this.elements.container,this.config.classNames.hideControls),n=void 0===e?void 0:!e,i=Ci(this.elements.container,this.config.classNames.hideControls,n);if(i&&this.config.controls.includes("settings")&&!hi.empty(this.config.settings)&&vr.toggleMenu.call(this,!1),i!==t){var r=i?"controlshidden":"controlsshown";vi.call(this,this.media,r)}return!i}return!1}},{key:"on",value:function(e,t){mi.call(this,this.elements.container,e,t)}},{key:"once",value:function(e,t){yi.call(this,this.elements.container,e,t)}},{key:"off",value:function(e,t){gi(this.elements.container,e,t)}},{key:"destroy",value:function(e){var t=this,n=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if(this.ready){var i=function(){document.body.style.overflow="",t.embed=null,n?(Object.keys(t.elements).length&&(Ei(t.elements.buttons.play),Ei(t.elements.captions),Ei(t.elements.controls),Ei(t.elements.wrapper),t.elements.buttons.play=null,t.elements.captions=null,t.elements.controls=null,t.elements.wrapper=null),hi.function(e)&&e()):(function(){this&&this.eventListeners&&(this.eventListeners.forEach(function(e){var t=e.element,n=e.type,i=e.callback,r=e.options;t.removeEventListener(n,i,r)}),this.eventListeners=[])}.call(t),_i(t.elements.original,t.elements.container),vi.call(t,t.elements.original,"destroyed",!0),hi.function(e)&&e.call(t.elements.original),t.ready=!1,setTimeout(function(){t.elements=null,t.media=null},200))};this.stop(),this.isHTML5?(clearTimeout(this.timers.loading),jr.toggleNativeControls.call(this,!0),i()):this.isYouTube?(clearInterval(this.timers.buffering),clearInterval(this.timers.playing),null!==this.embed&&hi.function(this.embed.destroy)&&this.embed.destroy(),i()):this.isVimeo&&(null!==this.embed&&this.embed.unload().then(i),setTimeout(i,200))}}},{key:"supports",value:function(e){return Hi.mime.call(this,e)}},{key:"isHTML5",get:function(){return Boolean(this.provider===_r.html5)}},{key:"isEmbed",get:function(){return Boolean(this.isYouTube||this.isVimeo)}},{key:"isYouTube",get:function(){return Boolean(this.provider===_r.youtube)}},{key:"isVimeo",get:function(){return Boolean(this.provider===_r.vimeo)}},{key:"isVideo",get:function(){return Boolean(this.type===Sr.video)}},{key:"isAudio",get:function(){return Boolean(this.type===Sr.audio)}},{key:"playing",get:function(){return Boolean(this.ready&&!this.paused&&!this.ended)}},{key:"paused",get:function(){return Boolean(this.media.paused)}},{key:"stopped",get:function(){return Boolean(this.paused&&0===this.currentTime)}},{key:"ended",get:function(){return Boolean(this.media.ended)}},{key:"currentTime",set:function(e){if(this.duration){var t=hi.number(e)&&e>0;this.media.currentTime=t?Math.min(e,this.duration):0,this.debug.log("Seeking to ".concat(this.currentTime," seconds"))}},get:function(){return Number(this.media.currentTime)}},{key:"buffered",get:function(){var e=this.media.buffered;return hi.number(e)?e:e&&e.length&&this.duration>0?e.end(0)/this.duration:0}},{key:"seeking",get:function(){return Boolean(this.media.seeking)}},{key:"duration",get:function(){var e=parseFloat(this.config.duration),t=(this.media||{}).duration,n=hi.number(t)&&t!==1/0?t:0;return e||n}},{key:"volume",set:function(e){var t=e;hi.string(t)&&(t=Number(t)),hi.number(t)||(t=this.storage.get("volume")),hi.number(t)||(t=this.config.volume),t>1&&(t=1),t<0&&(t=0),this.config.volume=t,this.media.volume=t,!hi.empty(e)&&this.muted&&t>0&&(this.muted=!1)},get:function(){return Number(this.media.volume)}},{key:"muted",set:function(e){var t=e;hi.boolean(t)||(t=this.storage.get("muted")),hi.boolean(t)||(t=this.config.muted),this.config.muted=t,this.media.muted=t},get:function(){return Boolean(this.media.muted)}},{key:"hasAudio",get:function(){return!this.isHTML5||(!!this.isAudio||(Boolean(this.media.mozHasAudio)||Boolean(this.media.webkitAudioDecodedByteCount)||Boolean(this.media.audioTracks&&this.media.audioTracks.length)))}},{key:"speed",set:function(e){var t=null;hi.number(e)&&(t=e),hi.number(t)||(t=this.storage.get("speed")),hi.number(t)||(t=this.config.speed.selected),t<.1&&(t=.1),t>2&&(t=2),this.config.speed.options.includes(t)?(this.config.speed.selected=t,this.media.playbackRate=t):this.debug.warn("Unsupported speed (".concat(t,")"))},get:function(){return Number(this.media.playbackRate)}},{key:"quality",set:function(e){var t=this.config.quality,n=this.options.quality;if(n.length){var i=[!hi.empty(e)&&Number(e),this.storage.get("quality"),t.selected,t.default].find(hi.number),r=!0;if(!n.includes(i)){var o=function(e,t){return hi.array(e)&&e.length?e.reduce(function(e,n){return Math.abs(n-t)<Math.abs(e-t)?n:e}):null}(n,i);this.debug.warn("Unsupported quality option: ".concat(i,", using ").concat(o," instead")),i=o,r=!1}t.selected=i,this.media.quality=i,r&&this.storage.set({quality:i})}},get:function(){return this.media.quality}},{key:"loop",set:function(e){var t=hi.boolean(e)?e:this.config.loop.active;this.config.loop.active=t,this.media.loop=t},get:function(){return Boolean(this.media.loop)}},{key:"source",set:function(e){Gr.change.call(this,e)},get:function(){return this.media.currentSrc}},{key:"download",get:function(){var e=this.config.urls.download;return hi.url(e)?e:this.source}},{key:"poster",set:function(e){this.isVideo?jr.setPoster.call(this,e,!1).catch(function(){}):this.debug.warn("Poster can only be set for video")},get:function(){return this.isVideo?this.media.getAttribute("poster"):null}},{key:"autoplay",set:function(e){var t=hi.boolean(e)?e:this.config.autoplay;this.config.autoplay=t},get:function(){return Boolean(this.config.autoplay)}},{key:"currentTrack",set:function(e){wr.set.call(this,e,!1)},get:function(){var e=this.captions,t=e.toggled,n=e.currentTrack;return t?n:-1}},{key:"language",set:function(e){wr.setLanguage.call(this,e,!1)},get:function(){return(wr.getCurrentTrack.call(this)||{}).language}},{key:"pip",set:function(e){if(Hi.pip){var t=hi.boolean(e)?e:!this.pip;hi.function(this.media.webkitSetPresentationMode)&&this.media.webkitSetPresentationMode(t?Er:Ar),hi.function(this.media.requestPictureInPicture)&&(!this.pip&&t?this.media.requestPictureInPicture():this.pip&&!t&&document.exitPictureInPicture())}},get:function(){return Hi.pip?hi.empty(this.media.webkitPresentationMode)?this.media===document.pictureInPictureElement:this.media.webkitPresentationMode===Er:null}}],[{key:"supported",value:function(e,t,n){return Hi.check(e,t,n)}},{key:"loadSprite",value:function(e,t){return fr(e,t)}},{key:"setup",value:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},i=null;return hi.string(t)?i=Array.from(document.querySelectorAll(t)):hi.nodeList(t)?i=Array.from(t):hi.array(t)&&(i=t.filter(hi.element)),hi.empty(i)?null:i.map(function(t){return new e(t,n)})}}]),e}();return $r.defaults=(Wr=Tr,JSON.parse(JSON.stringify(Wr))),$r});


/* End */
;
; /* Start:"a:4:{s:4:"full";s:66:"/local/templates/arlight/js/jquery.validate.min.js?165720755223261";s:6:"source";s:50:"/local/templates/arlight/js/jquery.validate.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*! jQuery Validation Plugin - v1.17.0 - 7/29/2017
 * https://jqueryvalidation.org/
 * Copyright (c) 2017 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof module&&module.exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){a.extend(a.fn,{validate:function(b){if(!this.length)return void(b&&b.debug&&window.console&&console.warn("Nothing selected, can't validate, returning nothing."));var c=a.data(this[0],"validator");return c?c:(this.attr("novalidate","novalidate"),c=new a.validator(b,this[0]),a.data(this[0],"validator",c),c.settings.onsubmit&&(this.on("click.validate",":submit",function(b){c.submitButton=b.currentTarget,a(this).hasClass("cancel")&&(c.cancelSubmit=!0),void 0!==a(this).attr("formnovalidate")&&(c.cancelSubmit=!0)}),this.on("submit.validate",function(b){function d(){var d,e;return c.submitButton&&(c.settings.submitHandler||c.formSubmitted)&&(d=a("<input type='hidden'/>").attr("name",c.submitButton.name).val(a(c.submitButton).val()).appendTo(c.currentForm)),!c.settings.submitHandler||(e=c.settings.submitHandler.call(c,c.currentForm,b),d&&d.remove(),void 0!==e&&e)}return c.settings.debug&&b.preventDefault(),c.cancelSubmit?(c.cancelSubmit=!1,d()):c.form()?c.pendingRequest?(c.formSubmitted=!0,!1):d():(c.focusInvalid(),!1)})),c)},valid:function(){var b,c,d;return a(this[0]).is("form")?b=this.validate().form():(d=[],b=!0,c=a(this[0].form).validate(),this.each(function(){b=c.element(this)&&b,b||(d=d.concat(c.errorList))}),c.errorList=d),b},rules:function(b,c){var d,e,f,g,h,i,j=this[0];if(null!=j&&(!j.form&&j.hasAttribute("contenteditable")&&(j.form=this.closest("form")[0],j.name=this.attr("name")),null!=j.form)){if(b)switch(d=a.data(j.form,"validator").settings,e=d.rules,f=a.validator.staticRules(j),b){case"add":a.extend(f,a.validator.normalizeRule(c)),delete f.messages,e[j.name]=f,c.messages&&(d.messages[j.name]=a.extend(d.messages[j.name],c.messages));break;case"remove":return c?(i={},a.each(c.split(/\s/),function(a,b){i[b]=f[b],delete f[b]}),i):(delete e[j.name],f)}return g=a.validator.normalizeRules(a.extend({},a.validator.classRules(j),a.validator.attributeRules(j),a.validator.dataRules(j),a.validator.staticRules(j)),j),g.required&&(h=g.required,delete g.required,g=a.extend({required:h},g)),g.remote&&(h=g.remote,delete g.remote,g=a.extend(g,{remote:h})),g}}}),a.extend(a.expr.pseudos||a.expr[":"],{blank:function(b){return!a.trim(""+a(b).val())},filled:function(b){var c=a(b).val();return null!==c&&!!a.trim(""+c)},unchecked:function(b){return!a(b).prop("checked")}}),a.validator=function(b,c){this.settings=a.extend(!0,{},a.validator.defaults,b),this.currentForm=c,this.init()},a.validator.format=function(b,c){return 1===arguments.length?function(){var c=a.makeArray(arguments);return c.unshift(b),a.validator.format.apply(this,c)}:void 0===c?b:(arguments.length>2&&c.constructor!==Array&&(c=a.makeArray(arguments).slice(1)),c.constructor!==Array&&(c=[c]),a.each(c,function(a,c){b=b.replace(new RegExp("\\{"+a+"\\}","g"),function(){return c})}),b)},a.extend(a.validator,{defaults:{messages:{},groups:{},rules:{},errorClass:"error",pendingClass:"pending",validClass:"valid",errorElement:"label",focusCleanup:!1,focusInvalid:!0,errorContainer:a([]),errorLabelContainer:a([]),onsubmit:!0,ignore:":hidden",ignoreTitle:!1,onfocusin:function(a){this.lastActive=a,this.settings.focusCleanup&&(this.settings.unhighlight&&this.settings.unhighlight.call(this,a,this.settings.errorClass,this.settings.validClass),this.hideThese(this.errorsFor(a)))},onfocusout:function(a){this.checkable(a)||!(a.name in this.submitted)&&this.optional(a)||this.element(a)},onkeyup:function(b,c){var d=[16,17,18,20,35,36,37,38,39,40,45,144,225];9===c.which&&""===this.elementValue(b)||a.inArray(c.keyCode,d)!==-1||(b.name in this.submitted||b.name in this.invalid)&&this.element(b)},onclick:function(a){a.name in this.submitted?this.element(a):a.parentNode.name in this.submitted&&this.element(a.parentNode)},highlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).addClass(c).removeClass(d):a(b).addClass(c).removeClass(d)},unhighlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).removeClass(c).addClass(d):a(b).removeClass(c).addClass(d)}},setDefaults:function(b){a.extend(a.validator.defaults,b)},messages:{required:"This field is required.",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date (ISO).",number:"Please enter a valid number.",digits:"Please enter only digits.",equalTo:"Please enter the same value again.",maxlength:a.validator.format("Please enter no more than {0} characters."),minlength:a.validator.format("Please enter at least {0} characters."),rangelength:a.validator.format("Please enter a value between {0} and {1} characters long."),range:a.validator.format("Please enter a value between {0} and {1}."),max:a.validator.format("Please enter a value less than or equal to {0}."),min:a.validator.format("Please enter a value greater than or equal to {0}."),step:a.validator.format("Please enter a multiple of {0}.")},autoCreateRanges:!1,prototype:{init:function(){function b(b){!this.form&&this.hasAttribute("contenteditable")&&(this.form=a(this).closest("form")[0],this.name=a(this).attr("name"));var c=a.data(this.form,"validator"),d="on"+b.type.replace(/^validate/,""),e=c.settings;e[d]&&!a(this).is(e.ignore)&&e[d].call(c,this,b)}this.labelContainer=a(this.settings.errorLabelContainer),this.errorContext=this.labelContainer.length&&this.labelContainer||a(this.currentForm),this.containers=a(this.settings.errorContainer).add(this.settings.errorLabelContainer),this.submitted={},this.valueCache={},this.pendingRequest=0,this.pending={},this.invalid={},this.reset();var c,d=this.groups={};a.each(this.settings.groups,function(b,c){"string"==typeof c&&(c=c.split(/\s/)),a.each(c,function(a,c){d[c]=b})}),c=this.settings.rules,a.each(c,function(b,d){c[b]=a.validator.normalizeRule(d)}),a(this.currentForm).on("focusin.validate focusout.validate keyup.validate",":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'], [type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox'], [contenteditable], [type='button']",b).on("click.validate","select, option, [type='radio'], [type='checkbox']",b),this.settings.invalidHandler&&a(this.currentForm).on("invalid-form.validate",this.settings.invalidHandler)},form:function(){return this.checkForm(),a.extend(this.submitted,this.errorMap),this.invalid=a.extend({},this.errorMap),this.valid()||a(this.currentForm).triggerHandler("invalid-form",[this]),this.showErrors(),this.valid()},checkForm:function(){this.prepareForm();for(var a=0,b=this.currentElements=this.elements();b[a];a++)this.check(b[a]);return this.valid()},element:function(b){var c,d,e=this.clean(b),f=this.validationTargetFor(e),g=this,h=!0;return void 0===f?delete this.invalid[e.name]:(this.prepareElement(f),this.currentElements=a(f),d=this.groups[f.name],d&&a.each(this.groups,function(a,b){b===d&&a!==f.name&&(e=g.validationTargetFor(g.clean(g.findByName(a))),e&&e.name in g.invalid&&(g.currentElements.push(e),h=g.check(e)&&h))}),c=this.check(f)!==!1,h=h&&c,c?this.invalid[f.name]=!1:this.invalid[f.name]=!0,this.numberOfInvalids()||(this.toHide=this.toHide.add(this.containers)),this.showErrors(),a(b).attr("aria-invalid",!c)),h},showErrors:function(b){if(b){var c=this;a.extend(this.errorMap,b),this.errorList=a.map(this.errorMap,function(a,b){return{message:a,element:c.findByName(b)[0]}}),this.successList=a.grep(this.successList,function(a){return!(a.name in b)})}this.settings.showErrors?this.settings.showErrors.call(this,this.errorMap,this.errorList):this.defaultShowErrors()},resetForm:function(){a.fn.resetForm&&a(this.currentForm).resetForm(),this.invalid={},this.submitted={},this.prepareForm(),this.hideErrors();var b=this.elements().removeData("previousValue").removeAttr("aria-invalid");this.resetElements(b)},resetElements:function(a){var b;if(this.settings.unhighlight)for(b=0;a[b];b++)this.settings.unhighlight.call(this,a[b],this.settings.errorClass,""),this.findByName(a[b].name).removeClass(this.settings.validClass);else a.removeClass(this.settings.errorClass).removeClass(this.settings.validClass)},numberOfInvalids:function(){return this.objectLength(this.invalid)},objectLength:function(a){var b,c=0;for(b in a)void 0!==a[b]&&null!==a[b]&&a[b]!==!1&&c++;return c},hideErrors:function(){this.hideThese(this.toHide)},hideThese:function(a){a.not(this.containers).text(""),this.addWrapper(a).hide()},valid:function(){return 0===this.size()},size:function(){return this.errorList.length},focusInvalid:function(){if(this.settings.focusInvalid)try{a(this.findLastActive()||this.errorList.length&&this.errorList[0].element||[]).filter(":visible").focus().trigger("focusin")}catch(b){}},findLastActive:function(){var b=this.lastActive;return b&&1===a.grep(this.errorList,function(a){return a.element.name===b.name}).length&&b},elements:function(){var b=this,c={};return a(this.currentForm).find("input, select, textarea, [contenteditable]").not(":submit, :reset, :image, :disabled").not(this.settings.ignore).filter(function(){var d=this.name||a(this).attr("name");return!d&&b.settings.debug&&window.console&&console.error("%o has no name assigned",this),this.hasAttribute("contenteditable")&&(this.form=a(this).closest("form")[0],this.name=d),!(d in c||!b.objectLength(a(this).rules()))&&(c[d]=!0,!0)})},clean:function(b){return a(b)[0]},errors:function(){var b=this.settings.errorClass.split(" ").join(".");return a(this.settings.errorElement+"."+b,this.errorContext)},resetInternals:function(){this.successList=[],this.errorList=[],this.errorMap={},this.toShow=a([]),this.toHide=a([])},reset:function(){this.resetInternals(),this.currentElements=a([])},prepareForm:function(){this.reset(),this.toHide=this.errors().add(this.containers)},prepareElement:function(a){this.reset(),this.toHide=this.errorsFor(a)},elementValue:function(b){var c,d,e=a(b),f=b.type;return"radio"===f||"checkbox"===f?this.findByName(b.name).filter(":checked").val():"number"===f&&"undefined"!=typeof b.validity?b.validity.badInput?"NaN":e.val():(c=b.hasAttribute("contenteditable")?e.text():e.val(),"file"===f?"C:\\fakepath\\"===c.substr(0,12)?c.substr(12):(d=c.lastIndexOf("/"),d>=0?c.substr(d+1):(d=c.lastIndexOf("\\"),d>=0?c.substr(d+1):c)):"string"==typeof c?c.replace(/\r/g,""):c)},check:function(b){b=this.validationTargetFor(this.clean(b));var c,d,e,f,g=a(b).rules(),h=a.map(g,function(a,b){return b}).length,i=!1,j=this.elementValue(b);if("function"==typeof g.normalizer?f=g.normalizer:"function"==typeof this.settings.normalizer&&(f=this.settings.normalizer),f){if(j=f.call(b,j),"string"!=typeof j)throw new TypeError("The normalizer should return a string value.");delete g.normalizer}for(d in g){e={method:d,parameters:g[d]};try{if(c=a.validator.methods[d].call(this,j,b,e.parameters),"dependency-mismatch"===c&&1===h){i=!0;continue}if(i=!1,"pending"===c)return void(this.toHide=this.toHide.not(this.errorsFor(b)));if(!c)return this.formatAndAdd(b,e),!1}catch(k){throw this.settings.debug&&window.console&&console.log("Exception occurred when checking element "+b.id+", check the '"+e.method+"' method.",k),k instanceof TypeError&&(k.message+=".  Exception occurred when checking element "+b.id+", check the '"+e.method+"' method."),k}}if(!i)return this.objectLength(g)&&this.successList.push(b),!0},customDataMessage:function(b,c){return a(b).data("msg"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase())||a(b).data("msg")},customMessage:function(a,b){var c=this.settings.messages[a];return c&&(c.constructor===String?c:c[b])},findDefined:function(){for(var a=0;a<arguments.length;a++)if(void 0!==arguments[a])return arguments[a]},defaultMessage:function(b,c){"string"==typeof c&&(c={method:c});var d=this.findDefined(this.customMessage(b.name,c.method),this.customDataMessage(b,c.method),!this.settings.ignoreTitle&&b.title||void 0,a.validator.messages[c.method],"<strong>Warning: No message defined for "+b.name+"</strong>"),e=/\$?\{(\d+)\}/g;return"function"==typeof d?d=d.call(this,c.parameters,b):e.test(d)&&(d=a.validator.format(d.replace(e,"{$1}"),c.parameters)),d},formatAndAdd:function(a,b){var c=this.defaultMessage(a,b);this.errorList.push({message:c,element:a,method:b.method}),this.errorMap[a.name]=c,this.submitted[a.name]=c},addWrapper:function(a){return this.settings.wrapper&&(a=a.add(a.parent(this.settings.wrapper))),a},defaultShowErrors:function(){var a,b,c;for(a=0;this.errorList[a];a++)c=this.errorList[a],this.settings.highlight&&this.settings.highlight.call(this,c.element,this.settings.errorClass,this.settings.validClass),this.showLabel(c.element,c.message);if(this.errorList.length&&(this.toShow=this.toShow.add(this.containers)),this.settings.success)for(a=0;this.successList[a];a++)this.showLabel(this.successList[a]);if(this.settings.unhighlight)for(a=0,b=this.validElements();b[a];a++)this.settings.unhighlight.call(this,b[a],this.settings.errorClass,this.settings.validClass);this.toHide=this.toHide.not(this.toShow),this.hideErrors(),this.addWrapper(this.toShow).show()},validElements:function(){return this.currentElements.not(this.invalidElements())},invalidElements:function(){return a(this.errorList).map(function(){return this.element})},showLabel:function(b,c){var d,e,f,g,h=this.errorsFor(b),i=this.idOrName(b),j=a(b).attr("aria-describedby");h.length?(h.removeClass(this.settings.validClass).addClass(this.settings.errorClass),h.html(c)):(h=a("<"+this.settings.errorElement+">").attr("id",i+"-error").addClass(this.settings.errorClass).html(c||""),d=h,this.settings.wrapper&&(d=h.hide().show().wrap("<"+this.settings.wrapper+"/>").parent()),this.labelContainer.length?this.labelContainer.append(d):this.settings.errorPlacement?this.settings.errorPlacement.call(this,d,a(b)):d.insertAfter(b),h.is("label")?h.attr("for",i):0===h.parents("label[for='"+this.escapeCssMeta(i)+"']").length&&(f=h.attr("id"),j?j.match(new RegExp("\\b"+this.escapeCssMeta(f)+"\\b"))||(j+=" "+f):j=f,a(b).attr("aria-describedby",j),e=this.groups[b.name],e&&(g=this,a.each(g.groups,function(b,c){c===e&&a("[name='"+g.escapeCssMeta(b)+"']",g.currentForm).attr("aria-describedby",h.attr("id"))})))),!c&&this.settings.success&&(h.text(""),"string"==typeof this.settings.success?h.addClass(this.settings.success):this.settings.success(h,b)),this.toShow=this.toShow.add(h)},errorsFor:function(b){var c=this.escapeCssMeta(this.idOrName(b)),d=a(b).attr("aria-describedby"),e="label[for='"+c+"'], label[for='"+c+"'] *";return d&&(e=e+", #"+this.escapeCssMeta(d).replace(/\s+/g,", #")),this.errors().filter(e)},escapeCssMeta:function(a){return a.replace(/([\\!"#$%&'()*+,.\/:;<=>?@\[\]^`{|}~])/g,"\\$1")},idOrName:function(a){return this.groups[a.name]||(this.checkable(a)?a.name:a.id||a.name)},validationTargetFor:function(b){return this.checkable(b)&&(b=this.findByName(b.name)),a(b).not(this.settings.ignore)[0]},checkable:function(a){return/radio|checkbox/i.test(a.type)},findByName:function(b){return a(this.currentForm).find("[name='"+this.escapeCssMeta(b)+"']")},getLength:function(b,c){switch(c.nodeName.toLowerCase()){case"select":return a("option:selected",c).length;case"input":if(this.checkable(c))return this.findByName(c.name).filter(":checked").length}return b.length},depend:function(a,b){return!this.dependTypes[typeof a]||this.dependTypes[typeof a](a,b)},dependTypes:{"boolean":function(a){return a},string:function(b,c){return!!a(b,c.form).length},"function":function(a,b){return a(b)}},optional:function(b){var c=this.elementValue(b);return!a.validator.methods.required.call(this,c,b)&&"dependency-mismatch"},startRequest:function(b){this.pending[b.name]||(this.pendingRequest++,a(b).addClass(this.settings.pendingClass),this.pending[b.name]=!0)},stopRequest:function(b,c){this.pendingRequest--,this.pendingRequest<0&&(this.pendingRequest=0),delete this.pending[b.name],a(b).removeClass(this.settings.pendingClass),c&&0===this.pendingRequest&&this.formSubmitted&&this.form()?(a(this.currentForm).submit(),this.submitButton&&a("input:hidden[name='"+this.submitButton.name+"']",this.currentForm).remove(),this.formSubmitted=!1):!c&&0===this.pendingRequest&&this.formSubmitted&&(a(this.currentForm).triggerHandler("invalid-form",[this]),this.formSubmitted=!1)},previousValue:function(b,c){return c="string"==typeof c&&c||"remote",a.data(b,"previousValue")||a.data(b,"previousValue",{old:null,valid:!0,message:this.defaultMessage(b,{method:c})})},destroy:function(){this.resetForm(),a(this.currentForm).off(".validate").removeData("validator").find(".validate-equalTo-blur").off(".validate-equalTo").removeClass("validate-equalTo-blur")}},classRuleSettings:{required:{required:!0},email:{email:!0},url:{url:!0},date:{date:!0},dateISO:{dateISO:!0},number:{number:!0},digits:{digits:!0},creditcard:{creditcard:!0}},addClassRules:function(b,c){b.constructor===String?this.classRuleSettings[b]=c:a.extend(this.classRuleSettings,b)},classRules:function(b){var c={},d=a(b).attr("class");return d&&a.each(d.split(" "),function(){this in a.validator.classRuleSettings&&a.extend(c,a.validator.classRuleSettings[this])}),c},normalizeAttributeRule:function(a,b,c,d){/min|max|step/.test(c)&&(null===b||/number|range|text/.test(b))&&(d=Number(d),isNaN(d)&&(d=void 0)),d||0===d?a[c]=d:b===c&&"range"!==b&&(a[c]=!0)},attributeRules:function(b){var c,d,e={},f=a(b),g=b.getAttribute("type");for(c in a.validator.methods)"required"===c?(d=b.getAttribute(c),""===d&&(d=!0),d=!!d):d=f.attr(c),this.normalizeAttributeRule(e,g,c,d);return e.maxlength&&/-1|2147483647|524288/.test(e.maxlength)&&delete e.maxlength,e},dataRules:function(b){var c,d,e={},f=a(b),g=b.getAttribute("type");for(c in a.validator.methods)d=f.data("rule"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase()),this.normalizeAttributeRule(e,g,c,d);return e},staticRules:function(b){var c={},d=a.data(b.form,"validator");return d.settings.rules&&(c=a.validator.normalizeRule(d.settings.rules[b.name])||{}),c},normalizeRules:function(b,c){return a.each(b,function(d,e){if(e===!1)return void delete b[d];if(e.param||e.depends){var f=!0;switch(typeof e.depends){case"string":f=!!a(e.depends,c.form).length;break;case"function":f=e.depends.call(c,c)}f?b[d]=void 0===e.param||e.param:(a.data(c.form,"validator").resetElements(a(c)),delete b[d])}}),a.each(b,function(d,e){b[d]=a.isFunction(e)&&"normalizer"!==d?e(c):e}),a.each(["minlength","maxlength"],function(){b[this]&&(b[this]=Number(b[this]))}),a.each(["rangelength","range"],function(){var c;b[this]&&(a.isArray(b[this])?b[this]=[Number(b[this][0]),Number(b[this][1])]:"string"==typeof b[this]&&(c=b[this].replace(/[\[\]]/g,"").split(/[\s,]+/),b[this]=[Number(c[0]),Number(c[1])]))}),a.validator.autoCreateRanges&&(null!=b.min&&null!=b.max&&(b.range=[b.min,b.max],delete b.min,delete b.max),null!=b.minlength&&null!=b.maxlength&&(b.rangelength=[b.minlength,b.maxlength],delete b.minlength,delete b.maxlength)),b},normalizeRule:function(b){if("string"==typeof b){var c={};a.each(b.split(/\s/),function(){c[this]=!0}),b=c}return b},addMethod:function(b,c,d){a.validator.methods[b]=c,a.validator.messages[b]=void 0!==d?d:a.validator.messages[b],c.length<3&&a.validator.addClassRules(b,a.validator.normalizeRule(b))},methods:{required:function(b,c,d){if(!this.depend(d,c))return"dependency-mismatch";if("select"===c.nodeName.toLowerCase()){var e=a(c).val();return e&&e.length>0}return this.checkable(c)?this.getLength(b,c)>0:b.length>0},email:function(a,b){return this.optional(b)||/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(a)},url:function(a,b){return this.optional(b)||/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[\/?#]\S*)?$/i.test(a)},date:function(a,b){return this.optional(b)||!/Invalid|NaN/.test(new Date(a).toString())},dateISO:function(a,b){return this.optional(b)||/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(a)},number:function(a,b){return this.optional(b)||/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(a)},digits:function(a,b){return this.optional(b)||/^\d+$/.test(a)},minlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d},maxlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e<=d},rangelength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d[0]&&e<=d[1]},min:function(a,b,c){return this.optional(b)||a>=c},max:function(a,b,c){return this.optional(b)||a<=c},range:function(a,b,c){return this.optional(b)||a>=c[0]&&a<=c[1]},step:function(b,c,d){var e,f=a(c).attr("type"),g="Step attribute on input type "+f+" is not supported.",h=["text","number","range"],i=new RegExp("\\b"+f+"\\b"),j=f&&!i.test(h.join()),k=function(a){var b=(""+a).match(/(?:\.(\d+))?$/);return b&&b[1]?b[1].length:0},l=function(a){return Math.round(a*Math.pow(10,e))},m=!0;if(j)throw new Error(g);return e=k(d),(k(b)>e||l(b)%l(d)!==0)&&(m=!1),this.optional(c)||m},equalTo:function(b,c,d){var e=a(d);return this.settings.onfocusout&&e.not(".validate-equalTo-blur").length&&e.addClass("validate-equalTo-blur").on("blur.validate-equalTo",function(){a(c).valid()}),b===e.val()},remote:function(b,c,d,e){if(this.optional(c))return"dependency-mismatch";e="string"==typeof e&&e||"remote";var f,g,h,i=this.previousValue(c,e);return this.settings.messages[c.name]||(this.settings.messages[c.name]={}),i.originalMessage=i.originalMessage||this.settings.messages[c.name][e],this.settings.messages[c.name][e]=i.message,d="string"==typeof d&&{url:d}||d,h=a.param(a.extend({data:b},d.data)),i.old===h?i.valid:(i.old=h,f=this,this.startRequest(c),g={},g[c.name]=b,a.ajax(a.extend(!0,{mode:"abort",port:"validate"+c.name,dataType:"json",data:g,context:f.currentForm,success:function(a){var d,g,h,j=a===!0||"true"===a;f.settings.messages[c.name][e]=i.originalMessage,j?(h=f.formSubmitted,f.resetInternals(),f.toHide=f.errorsFor(c),f.formSubmitted=h,f.successList.push(c),f.invalid[c.name]=!1,f.showErrors()):(d={},g=a||f.defaultMessage(c,{method:e,parameters:b}),d[c.name]=i.message=g,f.invalid[c.name]=!0,f.showErrors(d)),i.valid=j,f.stopRequest(c,j)}},d)),"pending")}}});var b,c={};return a.ajaxPrefilter?a.ajaxPrefilter(function(a,b,d){var e=a.port;"abort"===a.mode&&(c[e]&&c[e].abort(),c[e]=d)}):(b=a.ajax,a.ajax=function(d){var e=("mode"in d?d:a.ajaxSettings).mode,f=("port"in d?d:a.ajaxSettings).port;return"abort"===e?(c[f]&&c[f].abort(),c[f]=b.apply(this,arguments),c[f]):b.apply(this,arguments)}),a});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:44:"/assets/json/messages_ru.json?16572075501582";s:6:"source";s:29:"/assets/json/messages_ru.json";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
messages_ru = '{"required": "Это поле необходимо заполнить.","remote": "Пожалуйста, введите правильное значение.","email": "Пожалуйста, введите корректный адрес электронной почты.","url": "Пожалуйста, введите корректный URL.","date": "Пожалуйста, введите корректную дату.","dateISO": "Пожалуйста, введите корректную дату в формате ISO.","number": "Пожалуйста, введите число.","digits": "Пожалуйста, вводите только цифры.","creditcard": "Пожалуйста, введите правильный номер кредитной карты.","equalTo": "Пожалуйста, введите такое же значение ещё раз.","extension": "Пожалуйста, выберите файл с правильным расширением.","maxlength": "Пожалуйста, введите не больше {0} символов.","minlength": "Пожалуйста, введите не меньше {0} символов.","rangelength": "Пожалуйста, введите значение длиной от {0} до {1} символов.","range": "Пожалуйста, введите число от {0} до {1}.","max": "Пожалуйста, введите число, меньшее или равное {0}.","min": "Пожалуйста, введите число, большее или равное {0}."}'
/* End */
;
; /* Start:"a:4:{s:4:"full";s:61:"/local/templates/arlight/js/messages_ru.min.js?16572075521165";s:6:"source";s:46:"/local/templates/arlight/js/messages_ru.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*! jQuery Validation Plugin - v1.17.0 - 7/29/2017
 * https://jqueryvalidation.org/
 * Copyright (c) 2017 Jörn Zaefferer; Licensed MIT */
!function (a) {
    "function" == typeof define && define.amd ? define(["jquery", "../jquery.validate.min"], a) : "object" == typeof module && module.exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function (a) {
    var messages = JSON.parse(messages_ru);
    return a.extend(a.validator.messages, {
        required: messages.required,
        remote: messages.remote,
        email: messages.email,
        url: messages.url,
        date: messages.date,
        dateISO: messages.dateISO,
        number: messages.number,
        digits: messages.digits,
        creditcard: messages.creditcard,
        equalTo: messages.equalTo,
        extension: messages.extension,
        maxlength: a.validator.format(messages.maxlength),
        minlength: a.validator.format(messages.minlength),
        rangelength: a.validator.format(messages.rangelength),
        range: a.validator.format(messages.range),
        max: a.validator.format(messages.max),
        min: a.validator.format(messages.min)
    }), a
});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:67:"/local/templates/arlight/js/jquery.scrollbar.min.js?165720755213026";s:6:"source";s:51:"/local/templates/arlight/js/jquery.scrollbar.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/**
 * jQuery CSS Customizable Scrollbar
 *
 * Copyright 2015, Yuriy Khabarov
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * If you found bug, please contact me via email <13real008@gmail.com>
 *
 * Compressed by http://jscompress.com/
 *
 * @author Yuriy Khabarov aka Gromo
 * @version 0.2.11
 * @url https://github.com/gromo/jquery.scrollbar/
 *
 */
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],b):b("undefined"!=typeof exports?require("jquery"):a.jQuery)}(this,function(a){"use strict";function h(b){if(c.webkit&&!b)return{height:0,width:0};if(!c.data.outer){var d={border:"none","box-sizing":"content-box",height:"200px",margin:"0",padding:"0",width:"200px"};c.data.inner=a("<div>").css(a.extend({},d)),c.data.outer=a("<div>").css(a.extend({left:"-1000px",overflow:"scroll",position:"absolute",top:"-1000px"},d)).append(c.data.inner).appendTo("body")}return c.data.outer.scrollLeft(1e3).scrollTop(1e3),{height:Math.ceil(c.data.outer.offset().top-c.data.inner.offset().top||0),width:Math.ceil(c.data.outer.offset().left-c.data.inner.offset().left||0)}}function i(){var a=h(!0);return!(a.height||a.width)}function j(a){var b=a.originalEvent;return(!b.axis||b.axis!==b.HORIZONTAL_AXIS)&&!b.wheelDeltaX}var b=!1,c={data:{index:0,name:"scrollbar"},firefox:/firefox/i.test(navigator.userAgent),macosx:/mac/i.test(navigator.platform),msedge:/edge\/\d+/i.test(navigator.userAgent),msie:/(msie|trident)/i.test(navigator.userAgent),mobile:/android|webos|iphone|ipad|ipod|blackberry/i.test(navigator.userAgent),overlay:null,scroll:null,scrolls:[],webkit:/webkit/i.test(navigator.userAgent)&&!/edge\/\d+/i.test(navigator.userAgent)};c.scrolls.add=function(a){this.remove(a).push(a)},c.scrolls.remove=function(b){for(;a.inArray(b,this)>=0;)this.splice(a.inArray(b,this),1);return this};var d={autoScrollSize:!0,autoUpdate:!0,debug:!1,disableBodyScroll:!1,duration:200,ignoreMobile:!1,ignoreOverlay:!1,isRtl:!1,scrollStep:30,showArrows:!1,stepScrolling:!0,scrollx:null,scrolly:null,onDestroy:null,onFallback:null,onInit:null,onScroll:null,onUpdate:null},e=function(b){c.scroll||(c.overlay=i(),c.scroll=h(),g(),a(window).resize(function(){var a=!1;if(c.scroll&&(c.scroll.height||c.scroll.width)){var b=h();b.height===c.scroll.height&&b.width===c.scroll.width||(c.scroll=b,a=!0)}g(a)})),this.container=b,this.namespace=".scrollbar_"+c.data.index++,this.options=a.extend({},d,window.jQueryScrollbarOptions||{}),this.scrollTo=null,this.scrollx={},this.scrolly={},b.data(c.data.name,this),c.scrolls.add(this)};e.prototype={destroy:function(){if(this.wrapper){this.container.removeData(c.data.name),c.scrolls.remove(this);var b=this.container.scrollLeft(),d=this.container.scrollTop();this.container.insertBefore(this.wrapper).css({height:"",margin:"","max-height":""}).removeClass("scroll-content scroll-scrollx_visible scroll-scrolly_visible").off(this.namespace).scrollLeft(b).scrollTop(d),this.scrollx.scroll.removeClass("scroll-scrollx_visible").find("div").addBack().off(this.namespace),this.scrolly.scroll.removeClass("scroll-scrolly_visible").find("div").addBack().off(this.namespace),this.wrapper.remove(),a(document).add("body").off(this.namespace),a.isFunction(this.options.onDestroy)&&this.options.onDestroy.apply(this,[this.container])}},init:function(b){var d=this,e=this.container,f=this.containerWrapper||e,g=this.namespace,h=a.extend(this.options,b||{}),i={x:this.scrollx,y:this.scrolly},k=this.wrapper,l={},m={scrollLeft:e.scrollLeft(),scrollTop:e.scrollTop()};if(c.mobile&&h.ignoreMobile||c.overlay&&h.ignoreOverlay||c.macosx&&!c.webkit)return a.isFunction(h.onFallback)&&h.onFallback.apply(this,[e]),!1;if(k)l={height:"auto","margin-bottom":c.scroll.height*-1+"px","max-height":""},l[h.isRtl?"margin-left":"margin-right"]=c.scroll.width*-1+"px",f.css(l);else{if(this.wrapper=k=a("<div>").addClass("scroll-wrapper").addClass(e.attr("class")).css("position","absolute"===e.css("position")?"absolute":"relative").insertBefore(e).append(e),h.isRtl&&k.addClass("scroll--rtl"),e.is("textarea")&&(this.containerWrapper=f=a("<div>").insertBefore(e).append(e),k.addClass("scroll-textarea")),l={height:"auto","margin-bottom":c.scroll.height*-1+"px","max-height":""},l[h.isRtl?"margin-left":"margin-right"]=c.scroll.width*-1+"px",f.addClass("scroll-content").css(l),e.on("scroll"+g,function(b){var f=e.scrollLeft(),g=e.scrollTop();if(h.isRtl)switch(!0){case c.firefox:f=Math.abs(f);case c.msedge||c.msie:f=e[0].scrollWidth-e[0].clientWidth-f}a.isFunction(h.onScroll)&&h.onScroll.call(d,{maxScroll:i.y.maxScrollOffset,scroll:g,size:i.y.size,visible:i.y.visible},{maxScroll:i.x.maxScrollOffset,scroll:f,size:i.x.size,visible:i.x.visible}),i.x.isVisible&&i.x.scroll.bar.css("left",f*i.x.kx+"px"),i.y.isVisible&&i.y.scroll.bar.css("top",g*i.y.kx+"px")}),k.on("scroll"+g,function(){k.scrollTop(0).scrollLeft(0)}),h.disableBodyScroll){var n=function(a){j(a)?i.y.isVisible&&i.y.mousewheel(a):i.x.isVisible&&i.x.mousewheel(a)};k.on("MozMousePixelScroll"+g,n),k.on("mousewheel"+g,n),c.mobile&&k.on("touchstart"+g,function(b){var c=b.originalEvent.touches&&b.originalEvent.touches[0]||b,d={pageX:c.pageX,pageY:c.pageY},f={left:e.scrollLeft(),top:e.scrollTop()};a(document).on("touchmove"+g,function(a){var b=a.originalEvent.targetTouches&&a.originalEvent.targetTouches[0]||a;e.scrollLeft(f.left+d.pageX-b.pageX),e.scrollTop(f.top+d.pageY-b.pageY),a.preventDefault()}),a(document).on("touchend"+g,function(){a(document).off(g)})})}a.isFunction(h.onInit)&&h.onInit.apply(this,[e])}a.each(i,function(b,f){var k=null,l=1,m="x"===b?"scrollLeft":"scrollTop",n=h.scrollStep,o=function(){var a=e[m]();e[m](a+n),1==l&&a+n>=p&&(a=e[m]()),l==-1&&a+n<=p&&(a=e[m]()),e[m]()==a&&k&&k()},p=0;f.scroll||(f.scroll=d._getScroll(h["scroll"+b]).addClass("scroll-"+b),h.showArrows&&f.scroll.addClass("scroll-element_arrows_visible"),f.mousewheel=function(a){if(!f.isVisible||"x"===b&&j(a))return!0;if("y"===b&&!j(a))return i.x.mousewheel(a),!0;var c=a.originalEvent.wheelDelta*-1||a.originalEvent.detail,g=f.size-f.visible-f.offset;return c||("x"===b&&a.originalEvent.deltaX?c=40*a.originalEvent.deltaX:"y"===b&&a.originalEvent.deltaY&&(c=40*a.originalEvent.deltaY)),(c>0&&p<g||c<0&&p>0)&&(p+=c,p<0&&(p=0),p>g&&(p=g),d.scrollTo=d.scrollTo||{},d.scrollTo[m]=p,setTimeout(function(){d.scrollTo&&(e.stop().animate(d.scrollTo,240,"linear",function(){p=e[m]()}),d.scrollTo=null)},1)),a.preventDefault(),!1},f.scroll.on("MozMousePixelScroll"+g,f.mousewheel).on("mousewheel"+g,f.mousewheel).on("mouseenter"+g,function(){p=e[m]()}),f.scroll.find(".scroll-arrow, .scroll-element_track").on("mousedown"+g,function(g){if(1!=g.which)return!0;l=1;var i={eventOffset:g["x"===b?"pageX":"pageY"],maxScrollValue:f.size-f.visible-f.offset,scrollbarOffset:f.scroll.bar.offset()["x"===b?"left":"top"],scrollbarSize:f.scroll.bar["x"===b?"outerWidth":"outerHeight"]()},j=0,q=0;if(a(this).hasClass("scroll-arrow")){if(l=a(this).hasClass("scroll-arrow_more")?1:-1,n=h.scrollStep*l,p=l>0?i.maxScrollValue:0,h.isRtl)switch(!0){case c.firefox:p=l>0?0:i.maxScrollValue*-1;break;case c.msie||c.msedge:}}else l=i.eventOffset>i.scrollbarOffset+i.scrollbarSize?1:i.eventOffset<i.scrollbarOffset?-1:0,"x"===b&&h.isRtl&&(c.msie||c.msedge)&&(l*=-1),n=Math.round(.75*f.visible)*l,p=i.eventOffset-i.scrollbarOffset-(h.stepScrolling?1==l?i.scrollbarSize:0:Math.round(i.scrollbarSize/2)),p=e[m]()+p/f.kx;return d.scrollTo=d.scrollTo||{},d.scrollTo[m]=h.stepScrolling?e[m]()+n:p,h.stepScrolling&&(k=function(){p=e[m](),clearInterval(q),clearTimeout(j),j=0,q=0},j=setTimeout(function(){q=setInterval(o,40)},h.duration+100)),setTimeout(function(){d.scrollTo&&(e.animate(d.scrollTo,h.duration),d.scrollTo=null)},1),d._handleMouseDown(k,g)}),f.scroll.bar.on("mousedown"+g,function(i){if(1!=i.which)return!0;var j=i["x"===b?"pageX":"pageY"],k=e[m]();return f.scroll.addClass("scroll-draggable"),a(document).on("mousemove"+g,function(a){var d=parseInt((a["x"===b?"pageX":"pageY"]-j)/f.kx,10);"x"===b&&h.isRtl&&(c.msie||c.msedge)&&(d*=-1),e[m](k+d)}),d._handleMouseDown(function(){f.scroll.removeClass("scroll-draggable"),p=e[m]()},i)}))}),a.each(i,function(a,b){var c="scroll-scroll"+a+"_visible",d="x"==a?i.y:i.x;b.scroll.removeClass(c),d.scroll.removeClass(c),f.removeClass(c)}),a.each(i,function(b,c){a.extend(c,"x"==b?{offset:parseInt(e.css("left"),10)||0,size:e.prop("scrollWidth"),visible:k.width()}:{offset:parseInt(e.css("top"),10)||0,size:e.prop("scrollHeight"),visible:k.height()})}),this._updateScroll("x",this.scrollx),this._updateScroll("y",this.scrolly),a.isFunction(h.onUpdate)&&h.onUpdate.apply(this,[e]),a.each(i,function(a,b){var c="x"===a?"left":"top",d="x"===a?"outerWidth":"outerHeight",f="x"===a?"width":"height",g=parseInt(e.css(c),10)||0,i=b.size,j=b.visible+g,k=b.scroll.size[d]()+(parseInt(b.scroll.size.css(c),10)||0);h.autoScrollSize&&(b.scrollbarSize=parseInt(k*j/i,10),b.scroll.bar.css(f,b.scrollbarSize+"px")),b.scrollbarSize=b.scroll.bar[d](),b.kx=(k-b.scrollbarSize)/(i-j)||1,b.maxScrollOffset=i-j}),e.scrollLeft(m.scrollLeft).scrollTop(m.scrollTop).trigger("scroll")},_getScroll:function(b){var c={advanced:['<div class="scroll-element">','<div class="scroll-element_corner"></div>','<div class="scroll-arrow scroll-arrow_less"></div>','<div class="scroll-arrow scroll-arrow_more"></div>','<div class="scroll-element_outer">','<div class="scroll-element_size"></div>','<div class="scroll-element_inner-wrapper">','<div class="scroll-element_inner scroll-element_track">','<div class="scroll-element_inner-bottom"></div>',"</div>","</div>",'<div class="scroll-bar">','<div class="scroll-bar_body">','<div class="scroll-bar_body-inner"></div>',"</div>",'<div class="scroll-bar_bottom"></div>','<div class="scroll-bar_center"></div>',"</div>","</div>","</div>"].join(""),simple:['<div class="scroll-element">','<div class="scroll-element_outer">','<div class="scroll-element_size"></div>','<div class="scroll-element_track"></div>','<div class="scroll-bar"></div>',"</div>","</div>"].join("")};return c[b]&&(b=c[b]),b||(b=c.simple),b="string"==typeof b?a(b).appendTo(this.wrapper):a(b),a.extend(b,{bar:b.find(".scroll-bar"),size:b.find(".scroll-element_size"),track:b.find(".scroll-element_track")}),b},_handleMouseDown:function(b,c){var d=this.namespace;return a(document).on("blur"+d,function(){a(document).add("body").off(d),b&&b()}),a(document).on("dragstart"+d,function(a){return a.preventDefault(),!1}),a(document).on("mouseup"+d,function(){a(document).add("body").off(d),b&&b()}),a("body").on("selectstart"+d,function(a){return a.preventDefault(),!1}),c&&c.preventDefault(),!1},_updateScroll:function(b,d){var e=this.container,f=this.containerWrapper||e,g="scroll-scroll"+b+"_visible",h="x"===b?this.scrolly:this.scrollx,i=parseInt(this.container.css("x"===b?"left":"top"),10)||0,j=this.wrapper,k=d.size,l=d.visible+i;d.isVisible=k-l>1,d.isVisible?(d.scroll.addClass(g),h.scroll.addClass(g),f.addClass(g)):(d.scroll.removeClass(g),h.scroll.removeClass(g),f.removeClass(g)),"y"===b&&(e.is("textarea")||k<l?f.css({height:l+c.scroll.height+"px","max-height":"none"}):f.css({"max-height":l+c.scroll.height+"px"})),d.size==e.prop("scrollWidth")&&h.size==e.prop("scrollHeight")&&d.visible==j.width()&&h.visible==j.height()&&d.offset==(parseInt(e.css("left"),10)||0)&&h.offset==(parseInt(e.css("top"),10)||0)||(a.extend(this.scrollx,{offset:parseInt(e.css("left"),10)||0,size:e.prop("scrollWidth"),visible:j.width()}),a.extend(this.scrolly,{offset:parseInt(e.css("top"),10)||0,size:this.container.prop("scrollHeight"),visible:j.height()}),this._updateScroll("x"===b?"y":"x",h))}};var f=e;a.fn.scrollbar=function(b,d){return"string"!=typeof b&&(d=b,b="init"),"undefined"==typeof d&&(d=[]),a.isArray(d)||(d=[d]),this.not("body, .scroll-wrapper").each(function(){var e=a(this),g=e.data(c.data.name);(g||"init"===b)&&(g||(g=new f(e)),g[b]&&g[b].apply(g,d))}),this},a.fn.scrollbar.options=d;var g=function(){var a=0,d=0;return function(e){var f,h,i,j,k,l,m;for(f=0;f<c.scrolls.length;f++)j=c.scrolls[f],h=j.container,i=j.options,k=j.wrapper,l=j.scrollx,m=j.scrolly,(e||i.autoUpdate&&k&&k.is(":visible")&&(h.prop("scrollWidth")!=l.size||h.prop("scrollHeight")!=m.size||k.width()!=l.visible||k.height()!=m.visible))&&(j.init(),i.debug&&(window.console&&console.log({scrollHeight:h.prop("scrollHeight")+":"+j.scrolly.size,scrollWidth:h.prop("scrollWidth")+":"+j.scrollx.size,visibleHeight:k.height()+":"+j.scrolly.visible,visibleWidth:k.width()+":"+j.scrollx.visible},!0),d++));b&&d>10?(window.console&&console.log("Scroll updates exceed 10"),g=function(){}):(clearTimeout(a),a=setTimeout(g,300))}}();window.angular&&!function(a){a.module("jQueryScrollbar",[]).provider("jQueryScrollbar",function(){var b=d;return{setOptions:function(c){a.extend(b,c)},$get:function(){return{options:a.copy(b)}}}}).directive("jqueryScrollbar",["jQueryScrollbar","$parse",function(a,b){return{restrict:"AC",link:function(c,d,e){var f=b(e.jqueryScrollbar),g=f(c);d.scrollbar(g||a.options).on("$destroy",function(){d.scrollbar("destroy")})}}}])}(window.angular)});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:61:"/local/templates/arlight/js/jquery.mask.min.js?16572075528185";s:6:"source";s:46:"/local/templates/arlight/js/jquery.mask.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
// jQuery Mask Plugin v1.14.15
// github.com/igorescobar/jQuery-Mask-Plugin
var $jscomp={scope:{},findInternal:function(a,l,d){a instanceof String&&(a=String(a));for(var p=a.length,h=0;h<p;h++){var b=a[h];if(l.call(d,b,h,a))return{i:h,v:b}}return{i:-1,v:void 0}}};$jscomp.defineProperty="function"==typeof Object.defineProperties?Object.defineProperty:function(a,l,d){if(d.get||d.set)throw new TypeError("ES3 does not support getters and setters.");a!=Array.prototype&&a!=Object.prototype&&(a[l]=d.value)};
$jscomp.getGlobal=function(a){return"undefined"!=typeof window&&window===a?a:"undefined"!=typeof global&&null!=global?global:a};$jscomp.global=$jscomp.getGlobal(this);$jscomp.polyfill=function(a,l,d,p){if(l){d=$jscomp.global;a=a.split(".");for(p=0;p<a.length-1;p++){var h=a[p];h in d||(d[h]={});d=d[h]}a=a[a.length-1];p=d[a];l=l(p);l!=p&&null!=l&&$jscomp.defineProperty(d,a,{configurable:!0,writable:!0,value:l})}};
$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,d){return $jscomp.findInternal(this,a,d).v}},"es6-impl","es3");
(function(a,l,d){"function"===typeof define&&define.amd?define(["jquery"],a):"object"===typeof exports?module.exports=a(require("jquery")):a(l||d)})(function(a){var l=function(b,e,f){var c={invalid:[],getCaret:function(){try{var a,r=0,g=b.get(0),e=document.selection,f=g.selectionStart;if(e&&-1===navigator.appVersion.indexOf("MSIE 10"))a=e.createRange(),a.moveStart("character",-c.val().length),r=a.text.length;else if(f||"0"===f)r=f;return r}catch(C){}},setCaret:function(a){try{if(b.is(":focus")){var c,
g=b.get(0);g.setSelectionRange?g.setSelectionRange(a,a):(c=g.createTextRange(),c.collapse(!0),c.moveEnd("character",a),c.moveStart("character",a),c.select())}}catch(B){}},events:function(){b.on("keydown.mask",function(a){b.data("mask-keycode",a.keyCode||a.which);b.data("mask-previus-value",b.val());b.data("mask-previus-caret-pos",c.getCaret());c.maskDigitPosMapOld=c.maskDigitPosMap}).on(a.jMaskGlobals.useInput?"input.mask":"keyup.mask",c.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){b.keydown().keyup()},
100)}).on("change.mask",function(){b.data("changed",!0)}).on("blur.mask",function(){d===c.val()||b.data("changed")||b.trigger("change");b.data("changed",!1)}).on("blur.mask",function(){d=c.val()}).on("focus.mask",function(b){!0===f.selectOnFocus&&a(b.target).select()}).on("focusout.mask",function(){f.clearIfNotMatch&&!h.test(c.val())&&c.val("")})},getRegexMask:function(){for(var a=[],b,c,f,n,d=0;d<e.length;d++)(b=m.translation[e.charAt(d)])?(c=b.pattern.toString().replace(/.{1}$|^.{1}/g,""),f=b.optional,
(b=b.recursive)?(a.push(e.charAt(d)),n={digit:e.charAt(d),pattern:c}):a.push(f||b?c+"?":c)):a.push(e.charAt(d).replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));a=a.join("");n&&(a=a.replace(new RegExp("("+n.digit+"(.*"+n.digit+")?)"),"($1)?").replace(new RegExp(n.digit,"g"),n.pattern));return new RegExp(a)},destroyEvents:function(){b.off("input keydown keyup paste drop blur focusout ".split(" ").join(".mask "))},val:function(a){var c=b.is("input")?"val":"text";if(0<arguments.length){if(b[c]()!==a)b[c](a);
c=b}else c=b[c]();return c},calculateCaretPosition:function(){var a=b.data("mask-previus-value")||"",e=c.getMasked(),g=c.getCaret();if(a!==e){var f=b.data("mask-previus-caret-pos")||0,e=e.length,d=a.length,m=a=0,h=0,l=0,k;for(k=g;k<e&&c.maskDigitPosMap[k];k++)m++;for(k=g-1;0<=k&&c.maskDigitPosMap[k];k--)a++;for(k=g-1;0<=k;k--)c.maskDigitPosMap[k]&&h++;for(k=f-1;0<=k;k--)c.maskDigitPosMapOld[k]&&l++;g>d?g=10*e:f>=g&&f!==d?c.maskDigitPosMapOld[g]||(f=g,g=g-(l-h)-a,c.maskDigitPosMap[g]&&(g=f)):g>f&&
(g=g+(h-l)+m)}return g},behaviour:function(f){f=f||window.event;c.invalid=[];var e=b.data("mask-keycode");if(-1===a.inArray(e,m.byPassKeys)){var e=c.getMasked(),g=c.getCaret();setTimeout(function(){c.setCaret(c.calculateCaretPosition())},a.jMaskGlobals.keyStrokeCompensation);c.val(e);c.setCaret(g);return c.callbacks(f)}},getMasked:function(a,b){var g=[],d=void 0===b?c.val():b+"",n=0,h=e.length,q=0,l=d.length,k=1,r="push",p=-1,t=0,y=[],v,z;f.reverse?(r="unshift",k=-1,v=0,n=h-1,q=l-1,z=function(){return-1<
n&&-1<q}):(v=h-1,z=function(){return n<h&&q<l});for(var A;z();){var x=e.charAt(n),w=d.charAt(q),u=m.translation[x];if(u)w.match(u.pattern)?(g[r](w),u.recursive&&(-1===p?p=n:n===v&&n!==p&&(n=p-k),v===p&&(n-=k)),n+=k):w===A?(t--,A=void 0):u.optional?(n+=k,q-=k):u.fallback?(g[r](u.fallback),n+=k,q-=k):c.invalid.push({p:q,v:w,e:u.pattern}),q+=k;else{if(!a)g[r](x);w===x?(y.push(q),q+=k):(A=x,y.push(q+t),t++);n+=k}}d=e.charAt(v);h!==l+1||m.translation[d]||g.push(d);g=g.join("");c.mapMaskdigitPositions(g,
y,l);return g},mapMaskdigitPositions:function(a,b,e){a=f.reverse?a.length-e:0;c.maskDigitPosMap={};for(e=0;e<b.length;e++)c.maskDigitPosMap[b[e]+a]=1},callbacks:function(a){var h=c.val(),g=h!==d,m=[h,a,b,f],q=function(a,b,c){"function"===typeof f[a]&&b&&f[a].apply(this,c)};q("onChange",!0===g,m);q("onKeyPress",!0===g,m);q("onComplete",h.length===e.length,m);q("onInvalid",0<c.invalid.length,[h,a,b,c.invalid,f])}};b=a(b);var m=this,d=c.val(),h;e="function"===typeof e?e(c.val(),void 0,b,f):e;m.mask=
e;m.options=f;m.remove=function(){var a=c.getCaret();m.options.placeholder&&b.removeAttr("placeholder");b.data("mask-maxlength")&&b.removeAttr("maxlength");c.destroyEvents();c.val(m.getCleanVal());c.setCaret(a);return b};m.getCleanVal=function(){return c.getMasked(!0)};m.getMaskedVal=function(a){return c.getMasked(!1,a)};m.init=function(d){d=d||!1;f=f||{};m.clearIfNotMatch=a.jMaskGlobals.clearIfNotMatch;m.byPassKeys=a.jMaskGlobals.byPassKeys;m.translation=a.extend({},a.jMaskGlobals.translation,f.translation);
m=a.extend(!0,{},m,f);h=c.getRegexMask();if(d)c.events(),c.val(c.getMasked());else{f.placeholder&&b.attr("placeholder",f.placeholder);b.data("mask")&&b.attr("autocomplete","off");d=0;for(var l=!0;d<e.length;d++){var g=m.translation[e.charAt(d)];if(g&&g.recursive){l=!1;break}}l&&b.attr("maxlength",e.length).data("mask-maxlength",!0);c.destroyEvents();c.events();d=c.getCaret();c.val(c.getMasked());c.setCaret(d)}};m.init(!b.is("input"))};a.maskWatchers={};var d=function(){var b=a(this),e={},f=b.attr("data-mask");
b.attr("data-mask-reverse")&&(e.reverse=!0);b.attr("data-mask-clearifnotmatch")&&(e.clearIfNotMatch=!0);"true"===b.attr("data-mask-selectonfocus")&&(e.selectOnFocus=!0);if(p(b,f,e))return b.data("mask",new l(this,f,e))},p=function(b,e,f){f=f||{};var c=a(b).data("mask"),d=JSON.stringify;b=a(b).val()||a(b).text();try{return"function"===typeof e&&(e=e(b)),"object"!==typeof c||d(c.options)!==d(f)||c.mask!==e}catch(t){}},h=function(a){var b=document.createElement("div"),d;a="on"+a;d=a in b;d||(b.setAttribute(a,
"return;"),d="function"===typeof b[a]);return d};a.fn.mask=function(b,d){d=d||{};var e=this.selector,c=a.jMaskGlobals,h=c.watchInterval,c=d.watchInputs||c.watchInputs,t=function(){if(p(this,b,d))return a(this).data("mask",new l(this,b,d))};a(this).each(t);e&&""!==e&&c&&(clearInterval(a.maskWatchers[e]),a.maskWatchers[e]=setInterval(function(){a(document).find(e).each(t)},h));return this};a.fn.masked=function(a){return this.data("mask").getMaskedVal(a)};a.fn.unmask=function(){clearInterval(a.maskWatchers[this.selector]);
delete a.maskWatchers[this.selector];return this.each(function(){var b=a(this).data("mask");b&&b.remove().removeData("mask")})};a.fn.cleanVal=function(){return this.data("mask").getCleanVal()};a.applyDataMask=function(b){b=b||a.jMaskGlobals.maskElements;(b instanceof a?b:a(b)).filter(a.jMaskGlobals.dataMaskAttr).each(d)};h={maskElements:"input,td,span,div",dataMaskAttr:"*[data-mask]",dataMask:!0,watchInterval:300,watchInputs:!0,keyStrokeCompensation:10,useInput:!/Chrome\/[2-4][0-9]|SamsungBrowser/.test(window.navigator.userAgent)&&
h("input"),watchDataMask:!1,byPassKeys:[9,16,17,18,36,37,38,39,40,91],translation:{0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}}};a.jMaskGlobals=a.jMaskGlobals||{};h=a.jMaskGlobals=a.extend(!0,{},h,a.jMaskGlobals);h.dataMask&&a.applyDataMask();setInterval(function(){a.jMaskGlobals.watchDataMask&&a.applyDataMask()},h.watchInterval)},window.jQuery,window.Zepto);

/* End */
;
; /* Start:"a:4:{s:4:"full";s:62:"/local/templates/arlight/js/jquery.hyphenate.js?16572075523410";s:6:"source";s:47:"/local/templates/arlight/js/jquery.hyphenate.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$.fn.hyphenate = function (align) {
    var all = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]",
        glas = "[аеёиоуыэю\я]",
        sogl = "[бвгджзклмнпрстфхцчшщ]",
        zn = "[йъь]",
        shy = "\xAD",
        re = [];
    re[1] = new RegExp("(" + zn + ")(" + all + all + ")", "ig");
    re[2] = new RegExp("(" + glas + ")(" + glas + all + ")", "ig");
    re[3] = new RegExp("(" + glas + sogl + ")(" + sogl + glas + ")", "ig");
    re[4] = new RegExp("(" + sogl + glas + ")(" + sogl + glas + ")", "ig");
    re[5] = new RegExp("(" + glas + sogl + ")(" + sogl + sogl + glas + ")", "ig");
    re[6] = new RegExp("(" + glas + sogl + sogl + ")(" + sogl + sogl + glas + ")", "ig");

    var allPretxt = ['в', 'без', 'до', 'из', 'к', 'на', 'по', 'о', 'от', 'перед', 'при', 'через', 'с', 'у', 'за', 'над', 'об', 'под', 'про', 'для', 'из-под', 'из-за', 'по-над', 'и', 'а', 'но', 'да', 'или', 'либо', 'ни–ни', 'то–то', 'что', 'чтобы', 'как', 'потому что', 'так как', 'если', 'хотя', 'когда', 'как только', 'между тем как', 'лишь', 'лишь только', 'едва', 'едва лишь', 'пока', 'так что', 'если бы', 'не', 'ни'],
        allNspace = [],
        nbsp = "\xa0";

    allPretxt.forEach(function (item, i, arr) {
        allNspace[allNspace.length] = ' ' + item + ' ';
    });

    return this.each(function () {
        var text = $(this).html();

        //запрет переноса предлогов
        allNspace.forEach(function (item, i, arr) {
            var reg = new RegExp("(" + item + ")", "ig");
            function replacer(match){
                return match.replace(/\s+$/g, '')+ nbsp;
            }
            text = text.replace(reg, replacer);
        });

        //перенос по слогам
        // for (var i = 1; i < 7; ++i) {
        //     text = text.replace(re[i], "$1" + shy + "$2");
        // }

        //для чисел и ед.измерения
        var unitAll = ['шт/м', 'шт', 'м', 'V', 'мм', 'Вт', 'K', 'А', 'mm', 'W', 'г', 'LED', 'W/метр', 'шт/метр', 'LED/m', 'm', 'Lm', 'вольт', 'В'];
        unitAll.forEach(function (item, i, arr) {
            var regnumber = '([0-9]{1,})(\\s)?';
            var reg = RegExp(regnumber + "(" + item + ")", "g");
            function replacerUnit(match, p1, p2, p3) {
                if (p3.indexOf('/') + 1){
                    //не разрывать единицы измерения
                    p3 = '<span style="white-space: nowrap">'+p3+'</span>'
                }
                return p1 + nbsp + p3;
            }
            text = text.replace(reg, replacerUnit);
        });

        $(this).html(text).css('text-align', align);

        $(this).find('a').each(function () {
            var href = ($(this).attr('href')).replace(nbsp, '');
            href = href.replace(' ', '');
            $(this).attr('href', href);
        });

        $(this).find('img').each(function () {
            var src = ($(this).attr('src')).replace(nbsp, '').replace(' ', '').replace(' ', '');
            $(this).attr('src', src);
        });
    });
};

/* End */
;
; /* Start:"a:4:{s:4:"full";s:69:"/local/templates/arlight/js/jquery.tablesorter.min.js?165720755244371";s:6:"source";s:53:"/local/templates/arlight/js/jquery.tablesorter.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&"object"==typeof module.exports?module.exports=e(require("jquery")):e(jQuery)}(function(e){return function(A){"use strict";var L=A.tablesorter={version:"2.31.1",parsers:[],widgets:[],defaults:{theme:"default",widthFixed:!1,showProcessing:!1,headerTemplate:"{content}",onRenderTemplate:null,onRenderHeader:null,cancelSelection:!0,tabIndex:!0,dateFormat:"mmddyyyy",sortMultiSortKey:"shiftKey",sortResetKey:"ctrlKey",usNumberFormat:!0,delayInit:!1,serverSideSorting:!1,resort:!0,headers:{},ignoreCase:!0,sortForce:null,sortList:[],sortAppend:null,sortStable:!1,sortInitialOrder:"asc",sortLocaleCompare:!1,sortReset:!1,sortRestart:!1,emptyTo:"bottom",stringTo:"max",duplicateSpan:!0,textExtraction:"basic",textAttribute:"data-text",textSorter:null,numberSorter:null,initWidgets:!0,widgetClass:"widget-{name}",widgets:[],widgetOptions:{zebra:["even","odd"]},initialized:null,tableClass:"",cssAsc:"",cssDesc:"",cssNone:"",cssHeader:"",cssHeaderRow:"",cssProcessing:"",cssChildRow:"tablesorter-childRow",cssInfoBlock:"tablesorter-infoOnly",cssNoSort:"tablesorter-noSort",cssIgnoreRow:"tablesorter-ignoreRow",cssIcon:"tablesorter-icon",cssIconNone:"",cssIconAsc:"",cssIconDesc:"",cssIconDisabled:"",pointerClick:"click",pointerDown:"mousedown",pointerUp:"mouseup",selectorHeaders:"> thead th, > thead td",selectorSort:"th, td",selectorRemove:".remove-me",debug:!1,headerList:[],empties:{},strings:{},parsers:[],globalize:0,imgAttr:0},css:{table:"tablesorter",cssHasChild:"tablesorter-hasChildRow",childRow:"tablesorter-childRow",colgroup:"tablesorter-colgroup",header:"tablesorter-header",headerRow:"tablesorter-headerRow",headerIn:"tablesorter-header-inner",icon:"tablesorter-icon",processing:"tablesorter-processing",sortAsc:"tablesorter-headerAsc",sortDesc:"tablesorter-headerDesc",sortNone:"tablesorter-headerUnSorted"},language:{sortAsc:"Ascending sort applied, ",sortDesc:"Descending sort applied, ",sortNone:"No sort applied, ",sortDisabled:"sorting is disabled",nextAsc:"activate to apply an ascending sort",nextDesc:"activate to apply a descending sort",nextNone:"activate to remove the sort"},regex:{templateContent:/\{content\}/g,templateIcon:/\{icon\}/g,templateName:/\{name\}/i,spaces:/\s+/g,nonWord:/\W/g,formElements:/(input|select|button|textarea)/i,chunk:/(^([+\-]?(?:\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?)?$|^0x[0-9a-f]+$|\d+)/gi,chunks:/(^\\0|\\0$)/,hex:/^0x[0-9a-f]+$/i,comma:/,/g,digitNonUS:/[\s|\.]/g,digitNegativeTest:/^\s*\([.\d]+\)/,digitNegativeReplace:/^\s*\(([.\d]+)\)/,digitTest:/^[\-+(]?\d+[)]?$/,digitReplace:/[,.'"\s]/g},string:{max:1,min:-1,emptymin:1,emptymax:-1,zero:0,none:0,"null":0,top:!0,bottom:!1},keyCodes:{enter:13},dates:{},instanceMethods:{},setup:function(t,r){if(t&&t.tHead&&0!==t.tBodies.length&&!0!==t.hasInitialized){var e,o="",s=A(t),a=A.metadata;t.hasInitialized=!1,t.isProcessing=!0,t.config=r,A.data(t,"tablesorter",r),L.debug(r,"core")&&(console[console.group?"group":"log"]("Initializing tablesorter v"+L.version),A.data(t,"startoveralltimer",new Date)),r.supportsDataObject=((e=A.fn.jquery.split("."))[0]=parseInt(e[0],10),1<e[0]||1===e[0]&&4<=parseInt(e[1],10)),r.emptyTo=r.emptyTo.toLowerCase(),r.stringTo=r.stringTo.toLowerCase(),r.last={sortList:[],clickedIndex:-1},/tablesorter\-/.test(s.attr("class"))||(o=""!==r.theme?" tablesorter-"+r.theme:""),r.namespace?r.namespace="."+r.namespace.replace(L.regex.nonWord,""):r.namespace=".tablesorter"+Math.random().toString(16).slice(2),r.table=t,r.$table=s.addClass(L.css.table+" "+r.tableClass+o+" "+r.namespace.slice(1)).attr("role","grid"),r.$headers=s.find(r.selectorHeaders),r.$table.children().children("tr").attr("role","row"),r.$tbodies=s.children("tbody:not(."+r.cssInfoBlock+")").attr({"aria-live":"polite","aria-relevant":"all"}),r.$table.children("caption").length&&((o=r.$table.children("caption")[0]).id||(o.id=r.namespace.slice(1)+"caption"),r.$table.attr("aria-labelledby",o.id)),r.widgetInit={},r.textExtraction=r.$table.attr("data-text-extraction")||r.textExtraction||"basic",L.buildHeaders(r),L.fixColumnWidth(t),L.addWidgetFromClass(t),L.applyWidgetOptions(t),L.setupParsers(r),r.totalRows=0,r.debug&&L.validateOptions(r),r.delayInit||L.buildCache(r),L.bindEvents(t,r.$headers,!0),L.bindMethods(r),r.supportsDataObject&&void 0!==s.data().sortlist?r.sortList=s.data().sortlist:a&&s.metadata()&&s.metadata().sortlist&&(r.sortList=s.metadata().sortlist),L.applyWidget(t,!0),0<r.sortList.length?(r.last.sortList=r.sortList,L.sortOn(r,r.sortList,{},!r.initWidgets)):(L.setHeadersCss(r),r.initWidgets&&L.applyWidget(t,!1)),r.showProcessing&&s.unbind("sortBegin"+r.namespace+" sortEnd"+r.namespace).bind("sortBegin"+r.namespace+" sortEnd"+r.namespace,function(e){clearTimeout(r.timerProcessing),L.isProcessing(t),"sortBegin"===e.type&&(r.timerProcessing=setTimeout(function(){L.isProcessing(t,!0)},500))}),t.hasInitialized=!0,t.isProcessing=!1,L.debug(r,"core")&&(console.log("Overall initialization time:"+L.benchmark(A.data(t,"startoveralltimer"))),L.debug(r,"core")&&console.groupEnd&&console.groupEnd()),s.triggerHandler("tablesorter-initialized",t),"function"==typeof r.initialized&&r.initialized(t)}else L.debug(r,"core")&&(t.hasInitialized?console.warn("Stopping initialization. Tablesorter has already been initialized"):console.error("Stopping initialization! No table, thead or tbody",t))},bindMethods:function(r){var e=r.$table,t=r.namespace,o="sortReset update updateRows updateAll updateHeaders addRows updateCell updateComplete sorton appendCache updateCache applyWidgetId applyWidgets refreshWidgets destroy mouseup mouseleave ".split(" ").join(t+" ");e.unbind(o.replace(L.regex.spaces," ")).bind("sortReset"+t,function(e,t){e.stopPropagation(),L.sortReset(this.config,function(e){e.isApplyingWidgets?setTimeout(function(){L.applyWidget(e,"",t)},100):L.applyWidget(e,"",t)})}).bind("updateAll"+t,function(e,t,r){e.stopPropagation(),L.updateAll(this.config,t,r)}).bind("update"+t+" updateRows"+t,function(e,t,r){e.stopPropagation(),L.update(this.config,t,r)}).bind("updateHeaders"+t,function(e,t){e.stopPropagation(),L.updateHeaders(this.config,t)}).bind("updateCell"+t,function(e,t,r,o){e.stopPropagation(),L.updateCell(this.config,t,r,o)}).bind("addRows"+t,function(e,t,r,o){e.stopPropagation(),L.addRows(this.config,t,r,o)}).bind("updateComplete"+t,function(){this.isUpdating=!1}).bind("sorton"+t,function(e,t,r,o){e.stopPropagation(),L.sortOn(this.config,t,r,o)}).bind("appendCache"+t,function(e,t,r){e.stopPropagation(),L.appendCache(this.config,r),A.isFunction(t)&&t(this)}).bind("updateCache"+t,function(e,t,r){e.stopPropagation(),L.updateCache(this.config,t,r)}).bind("applyWidgetId"+t,function(e,t){e.stopPropagation(),L.applyWidgetId(this,t)}).bind("applyWidgets"+t,function(e,t){e.stopPropagation(),L.applyWidget(this,!1,t)}).bind("refreshWidgets"+t,function(e,t,r){e.stopPropagation(),L.refreshWidgets(this,t,r)}).bind("removeWidget"+t,function(e,t,r){e.stopPropagation(),L.removeWidget(this,t,r)}).bind("destroy"+t,function(e,t,r){e.stopPropagation(),L.destroy(this,t,r)}).bind("resetToLoadState"+t,function(e){e.stopPropagation(),L.removeWidget(this,!0,!1);var t=A.extend(!0,{},r.originalSettings);(r=A.extend(!0,{},L.defaults,t)).originalSettings=t,this.hasInitialized=!1,L.setup(this,r)})},bindEvents:function(e,t,r){var o,i=(e=A(e)[0]).config,s=i.namespace,d=null;!0!==r&&(t.addClass(s.slice(1)+"_extra_headers"),(o=L.getClosest(t,"table")).length&&"TABLE"===o[0].nodeName&&o[0]!==e&&A(o[0]).addClass(s.slice(1)+"_extra_table")),o=(i.pointerDown+" "+i.pointerUp+" "+i.pointerClick+" sort keyup ").replace(L.regex.spaces," ").split(" ").join(s+" "),t.find(i.selectorSort).add(t.filter(i.selectorSort)).unbind(o).bind(o,function(e,t){var r,o,s,a=A(e.target),n=" "+e.type+" ";if(!(1!==(e.which||e.button)&&!n.match(" "+i.pointerClick+" | sort | keyup ")||" keyup "===n&&e.which!==L.keyCodes.enter||n.match(" "+i.pointerClick+" ")&&void 0!==e.which||n.match(" "+i.pointerUp+" ")&&d!==e.target&&!0!==t)){if(n.match(" "+i.pointerDown+" "))return d=e.target,void("1"===(s=a.jquery.split("."))[0]&&s[1]<4&&e.preventDefault());if(d=null,r=L.getClosest(A(this),"."+L.css.header),L.regex.formElements.test(e.target.nodeName)||a.hasClass(i.cssNoSort)||0<a.parents("."+i.cssNoSort).length||r.hasClass("sorter-false")||0<a.parents("button").length)return!i.cancelSelection;i.delayInit&&L.isEmptyObject(i.cache)&&L.buildCache(i),i.last.clickedIndex=r.attr("data-column")||r.index(),(o=i.$headerIndexed[i.last.clickedIndex][0])&&!o.sortDisabled&&L.initSort(i,o,e)}}),i.cancelSelection&&t.attr("unselectable","on").bind("selectstart",!1).css({"user-select":"none",MozUserSelect:"none"})},buildHeaders:function(d){var e,l,t,r;for(d.headerList=[],d.headerContent=[],d.sortVars=[],L.debug(d,"core")&&(t=new Date),d.columns=L.computeColumnIndex(d.$table.children("thead, tfoot").children("tr")),l=d.cssIcon?'<i class="'+(d.cssIcon===L.css.icon?L.css.icon:d.cssIcon+" "+L.css.icon)+'"></i>':"",d.$headers=A(A.map(d.$table.find(d.selectorHeaders),function(e,t){var r,o,s,a,n,i=A(e);if(!L.getClosest(i,"tr").hasClass(d.cssIgnoreRow))return/(th|td)/i.test(e.nodeName)||(n=L.getClosest(i,"th, td"),i.attr("data-column",n.attr("data-column"))),r=L.getColumnData(d.table,d.headers,t,!0),d.headerContent[t]=i.html(),""===d.headerTemplate||i.find("."+L.css.headerIn).length||(a=d.headerTemplate.replace(L.regex.templateContent,i.html()).replace(L.regex.templateIcon,i.find("."+L.css.icon).length?"":l),d.onRenderTemplate&&(o=d.onRenderTemplate.apply(i,[t,a]))&&"string"==typeof o&&(a=o),i.html('<div class="'+L.css.headerIn+'">'+a+"</div>")),d.onRenderHeader&&d.onRenderHeader.apply(i,[t,d,d.$table]),s=parseInt(i.attr("data-column"),10),e.column=s,n=L.getOrder(L.getData(i,r,"sortInitialOrder")||d.sortInitialOrder),d.sortVars[s]={count:-1,order:n?d.sortReset?[1,0,2]:[1,0]:d.sortReset?[0,1,2]:[0,1],lockedOrder:!1,sortedBy:""},void 0!==(n=L.getData(i,r,"lockedOrder")||!1)&&!1!==n&&(d.sortVars[s].lockedOrder=!0,d.sortVars[s].order=L.getOrder(n)?[1,1]:[0,0]),d.headerList[t]=e,i.addClass(L.css.header+" "+d.cssHeader),L.getClosest(i,"tr").addClass(L.css.headerRow+" "+d.cssHeaderRow).attr("role","row"),d.tabIndex&&i.attr("tabindex",0),e})),d.$headerIndexed=[],r=0;r<d.columns;r++)L.isEmptyObject(d.sortVars[r])&&(d.sortVars[r]={}),e=d.$headers.filter('[data-column="'+r+'"]'),d.$headerIndexed[r]=e.length?e.not(".sorter-false").length?e.not(".sorter-false").filter(":last"):e.filter(":last"):A();d.$table.find(d.selectorHeaders).attr({scope:"col",role:"columnheader"}),L.updateHeader(d),L.debug(d,"core")&&(console.log("Built headers:"+L.benchmark(t)),console.log(d.$headers))},addInstanceMethods:function(e){A.extend(L.instanceMethods,e)},setupParsers:function(e,t){var r,o,s,a,n,i,d,l,c,g,p,u,f,h,m=e.table,b=0,y=L.debug(e,"core"),w={};if(e.$tbodies=e.$table.children("tbody:not(."+e.cssInfoBlock+")"),0===(h=(f=void 0===t?e.$tbodies:t).length))return y?console.warn("Warning: *Empty table!* Not building a parser cache"):"";for(y&&(u=new Date,console[console.group?"group":"log"]("Detecting parsers for each column")),o={extractors:[],parsers:[]};b<h;){if((r=f[b].rows).length)for(n=0,a=e.columns,i=0;i<a;i++){if((d=e.$headerIndexed[n])&&d.length&&(l=L.getColumnData(m,e.headers,n),p=L.getParserById(L.getData(d,l,"extractor")),g=L.getParserById(L.getData(d,l,"sorter")),c="false"===L.getData(d,l,"parser"),e.empties[n]=(L.getData(d,l,"empty")||e.emptyTo||(e.emptyToBottom?"bottom":"top")).toLowerCase(),e.strings[n]=(L.getData(d,l,"string")||e.stringTo||"max").toLowerCase(),c&&(g=L.getParserById("no-parser")),p||(p=!1),g||(g=L.detectParserForColumn(e,r,-1,n)),y&&(w["("+n+") "+d.text()]={parser:g.id,extractor:p?p.id:"none",string:e.strings[n],empty:e.empties[n]}),o.parsers[n]=g,o.extractors[n]=p,0<(s=d[0].colSpan-1)))for(n+=s,a+=s;0<s+1;)o.parsers[n-s]=g,o.extractors[n-s]=p,s--;n++}b+=o.parsers.length?h:1}y&&(L.isEmptyObject(w)?console.warn("  No parsers detected!"):console[console.table?"table":"log"](w),console.log("Completed detecting parsers"+L.benchmark(u)),console.groupEnd&&console.groupEnd()),e.parsers=o.parsers,e.extractors=o.extractors},addParser:function(e){var t,r=L.parsers.length,o=!0;for(t=0;t<r;t++)L.parsers[t].id.toLowerCase()===e.id.toLowerCase()&&(o=!1);o&&(L.parsers[L.parsers.length]=e)},getParserById:function(e){if("false"==e)return!1;var t,r=L.parsers.length;for(t=0;t<r;t++)if(L.parsers[t].id.toLowerCase()===e.toString().toLowerCase())return L.parsers[t];return!1},detectParserForColumn:function(e,t,r,o){for(var s,a,n,i=L.parsers.length,d=!1,l="",c=L.debug(e,"core"),g=!0;""===l&&g;)(n=t[++r])&&r<50?n.className.indexOf(L.cssIgnoreRow)<0&&(d=t[r].cells[o],l=L.getElementText(e,d,o),a=A(d),c&&console.log("Checking if value was empty on row "+r+", column: "+o+': "'+l+'"')):g=!1;for(;0<=--i;)if((s=L.parsers[i])&&"text"!==s.id&&s.is&&s.is(l,e.table,d,a))return s;return L.getParserById("text")},getElementText:function(e,t,r){if(!t)return"";var o,s=e.textExtraction||"",a=t.jquery?t:A(t);return"string"==typeof s?"basic"===s&&void 0!==(o=a.attr(e.textAttribute))?A.trim(o):A.trim(t.textContent||a.text()):"function"==typeof s?A.trim(s(a[0],e.table,r)):"function"==typeof(o=L.getColumnData(e.table,s,r))?A.trim(o(a[0],e.table,r)):A.trim(a[0].textContent||a.text())},getParsedText:function(e,t,r,o){void 0===o&&(o=L.getElementText(e,t,r));var s=""+o,a=e.parsers[r],n=e.extractors[r];return a&&(n&&"function"==typeof n.format&&(o=n.format(o,e.table,t,r)),s="no-parser"===a.id?"":a.format(""+o,e.table,t,r),e.ignoreCase&&"string"==typeof s&&(s=s.toLowerCase())),s},buildCache:function(e,t,r){var o,s,a,n,i,d,l,c,g,p,u,f,h,m,b,y,w,x,v,C,$,I,D=e.table,R=e.parsers,T=L.debug(e,"core");if(e.$tbodies=e.$table.children("tbody:not(."+e.cssInfoBlock+")"),l=void 0===r?e.$tbodies:r,e.cache={},e.totalRows=0,!R)return T?console.warn("Warning: *Empty table!* Not building a cache"):"";for(T&&(f=new Date),e.showProcessing&&L.isProcessing(D,!0),d=0;d<l.length;d++){for(y=[],o=e.cache[d]={normalized:[]},h=l[d]&&l[d].rows.length||0,n=0;n<h;++n)if(m={child:[],raw:[]},g=[],!(c=A(l[d].rows[n])).hasClass(e.selectorRemove.slice(1)))if(c.hasClass(e.cssChildRow)&&0!==n)for($=o.normalized.length-1,(b=o.normalized[$][e.columns]).$row=b.$row.add(c),c.prev().hasClass(e.cssChildRow)||c.prev().addClass(L.css.cssHasChild),p=c.children("th, td"),$=b.child.length,b.child[$]=[],x=0,C=e.columns,i=0;i<C;i++)(u=p[i])&&(b.child[$][i]=L.getParsedText(e,u,i),0<(w=p[i].colSpan-1)&&(x+=w,C+=w)),x++;else{for(m.$row=c,m.order=n,x=0,C=e.columns,i=0;i<C;++i){if((u=c[0].cells[i])&&x<e.columns&&(!(v=void 0!==R[x])&&T&&console.warn("No parser found for row: "+n+", column: "+i+'; cell containing: "'+A(u).text()+'"; does it have a header?'),s=L.getElementText(e,u,x),m.raw[x]=s,a=L.getParsedText(e,u,x,s),g[x]=a,v&&"numeric"===(R[x].type||"").toLowerCase()&&(y[x]=Math.max(Math.abs(a)||0,y[x]||0)),0<(w=u.colSpan-1))){for(I=0;I<=w;)a=e.duplicateSpan||0===I?s:"string"!=typeof e.textExtraction&&L.getElementText(e,u,x+I)||"",m.raw[x+I]=a,g[x+I]=a,I++;x+=w,C+=w}x++}g[e.columns]=m,o.normalized[o.normalized.length]=g}o.colMax=y,e.totalRows+=o.normalized.length}if(e.showProcessing&&L.isProcessing(D),T){for($=Math.min(5,e.cache[0].normalized.length),console[console.group?"group":"log"]("Building cache for "+e.totalRows+" rows (showing "+$+" rows in log) and "+e.columns+" columns"+L.benchmark(f)),s={},i=0;i<e.columns;i++)for(x=0;x<$;x++)s["row: "+x]||(s["row: "+x]={}),s["row: "+x][e.$headerIndexed[i].text()]=e.cache[0].normalized[x][i];console[console.table?"table":"log"](s),console.groupEnd&&console.groupEnd()}A.isFunction(t)&&t(D)},getColumnText:function(e,t,r,o){var s,a,n,i,d,l,c,g,p,u,f="function"==typeof r,h="all"===t,m={raw:[],parsed:[],$cell:[]},b=(e=A(e)[0]).config;if(!L.isEmptyObject(b)){for(d=b.$tbodies.length,s=0;s<d;s++)for(l=(n=b.cache[s].normalized).length,a=0;a<l;a++)i=n[a],o&&!i[b.columns].$row.is(o)||(u=!0,g=h?i.slice(0,b.columns):i[t],i=i[b.columns],c=h?i.raw:i.raw[t],p=h?i.$row.children():i.$row.children().eq(t),f&&(u=r({tbodyIndex:s,rowIndex:a,parsed:g,raw:c,$row:i.$row,$cell:p})),!1!==u&&(m.parsed[m.parsed.length]=g,m.raw[m.raw.length]=c,m.$cell[m.$cell.length]=p));return m}L.debug(b,"core")&&console.warn("No cache found - aborting getColumnText function!")},setHeadersCss:function(a){var e,t,r=a.sortList,o=r.length,s=L.css.sortNone+" "+a.cssNone,n=[L.css.sortAsc+" "+a.cssAsc,L.css.sortDesc+" "+a.cssDesc],i=[a.cssIconAsc,a.cssIconDesc,a.cssIconNone],d=["ascending","descending"],l=function(e,t){e.removeClass(s).addClass(n[t]).attr("aria-sort",d[t]).find("."+L.css.icon).removeClass(i[2]).addClass(i[t])},c=a.$table.find("tfoot tr").children("td, th").add(A(a.namespace+"_extra_headers")).removeClass(n.join(" ")),g=a.$headers.add(A("thead "+a.namespace+"_extra_headers")).removeClass(n.join(" ")).addClass(s).attr("aria-sort","none").find("."+L.css.icon).removeClass(i.join(" ")).end();for(g.not(".sorter-false").find("."+L.css.icon).addClass(i[2]),a.cssIconDisabled&&g.filter(".sorter-false").find("."+L.css.icon).addClass(a.cssIconDisabled),e=0;e<o;e++)if(2!==r[e][1]){if((g=(g=a.$headers.filter(function(e){for(var t=!0,r=a.$headers.eq(e),o=parseInt(r.attr("data-column"),10),s=o+L.getClosest(r,"th, td")[0].colSpan;o<s;o++)t=!!t&&(t||-1<L.isValueInArray(o,a.sortList));return t})).not(".sorter-false").filter('[data-column="'+r[e][0]+'"]'+(1===o?":last":""))).length)for(t=0;t<g.length;t++)g[t].sortDisabled||l(g.eq(t),r[e][1]);c.length&&l(c.filter('[data-column="'+r[e][0]+'"]'),r[e][1])}for(o=a.$headers.length,e=0;e<o;e++)L.setColumnAriaLabel(a,a.$headers.eq(e))},getClosest:function(e,t){return A.fn.closest?e.closest(t):e.is(t)?e:e.parents(t).filter(":first")},setColumnAriaLabel:function(e,t,r){if(t.length){var o=parseInt(t.attr("data-column"),10),s=e.sortVars[o],a=t.hasClass(L.css.sortAsc)?"sortAsc":t.hasClass(L.css.sortDesc)?"sortDesc":"sortNone",n=A.trim(t.text())+": "+L.language[a];t.hasClass("sorter-false")||!1===r?n+=L.language.sortDisabled:(a=(s.count+1)%s.order.length,r=s.order[a],n+=L.language[0===r?"nextAsc":1===r?"nextDesc":"nextNone"]),t.attr("aria-label",n),s.sortedBy?t.attr("data-sortedBy",s.sortedBy):t.removeAttr("data-sortedBy")}},updateHeader:function(e){var t,r,o,s,a=e.table,n=e.$headers.length;for(t=0;t<n;t++)o=e.$headers.eq(t),s=L.getColumnData(a,e.headers,t,!0),r="false"===L.getData(o,s,"sorter")||"false"===L.getData(o,s,"parser"),L.setColumnSort(e,o,r)},setColumnSort:function(e,t,r){var o=e.table.id;t[0].sortDisabled=r,t[r?"addClass":"removeClass"]("sorter-false").attr("aria-disabled",""+r),e.tabIndex&&(r?t.removeAttr("tabindex"):t.attr("tabindex","0")),o&&(r?t.removeAttr("aria-controls"):t.attr("aria-controls",o))},updateHeaderSortCount:function(e,t){var r,o,s,a,n,i,d,l,c=t||e.sortList,g=c.length;for(e.sortList=[],a=0;a<g;a++)if(d=c[a],(r=parseInt(d[0],10))<e.columns){switch(e.sortVars[r].order||(l=L.getOrder(e.sortInitialOrder)?e.sortReset?[1,0,2]:[1,0]:e.sortReset?[0,1,2]:[0,1],e.sortVars[r].order=l,e.sortVars[r].count=0),l=e.sortVars[r].order,o=(o=(""+d[1]).match(/^(1|d|s|o|n)/))?o[0]:""){case"1":case"d":o=1;break;case"s":o=n||0;break;case"o":o=0===(i=l[(n||0)%l.length])?1:1===i?0:2;break;case"n":o=l[++e.sortVars[r].count%l.length];break;default:o=0}n=0===a?o:n,s=[r,parseInt(o,10)||0],e.sortList[e.sortList.length]=s,o=A.inArray(s[1],l),e.sortVars[r].count=0<=o?o:s[1]%l.length}},updateAll:function(e,t,r){var o=e.table;o.isUpdating=!0,L.refreshWidgets(o,!0,!0),L.buildHeaders(e),L.bindEvents(o,e.$headers,!0),L.bindMethods(e),L.commonUpdate(e,t,r)},update:function(e,t,r){e.table.isUpdating=!0,L.updateHeader(e),L.commonUpdate(e,t,r)},updateHeaders:function(e,t){e.table.isUpdating=!0,L.buildHeaders(e),L.bindEvents(e.table,e.$headers,!0),L.resortComplete(e,t)},updateCell:function(e,t,r,o){if(A(t).closest("tr").hasClass(e.cssChildRow))console.warn('Tablesorter Warning! "updateCell" for child row content has been disabled, use "update" instead');else{if(L.isEmptyObject(e.cache))return L.updateHeader(e),void L.commonUpdate(e,r,o);e.table.isUpdating=!0,e.$table.find(e.selectorRemove).remove();var s,a,n,i,d,l,c=e.$tbodies,g=A(t),p=c.index(L.getClosest(g,"tbody")),u=e.cache[p],f=L.getClosest(g,"tr");if(t=g[0],c.length&&0<=p){if(n=c.eq(p).find("tr").not("."+e.cssChildRow).index(f),d=u.normalized[n],(l=f[0].cells.length)!==e.columns)for(s=!1,a=i=0;a<l;a++)s||f[0].cells[a]===t?s=!0:i+=f[0].cells[a].colSpan;else i=g.index();s=L.getElementText(e,t,i),d[e.columns].raw[i]=s,s=L.getParsedText(e,t,i,s),d[i]=s,"numeric"===(e.parsers[i].type||"").toLowerCase()&&(u.colMax[i]=Math.max(Math.abs(s)||0,u.colMax[i]||0)),!1!==(s="undefined"!==r?r:e.resort)?L.checkResort(e,s,o):L.resortComplete(e,o)}else L.debug(e,"core")&&console.error("updateCell aborted, tbody missing or not within the indicated table"),e.table.isUpdating=!1}},addRows:function(e,t,r,o){var s,a,n,i,d,l,c,g,p,u,f,h,m,b="string"==typeof t&&1===e.$tbodies.length&&/<tr/.test(t||""),y=e.table;if(b)t=A(t),e.$tbodies.append(t);else if(!(t&&t instanceof A&&L.getClosest(t,"table")[0]===e.table))return L.debug(e,"core")&&console.error("addRows method requires (1) a jQuery selector reference to rows that have already been added to the table, or (2) row HTML string to be added to a table with only one tbody"),!1;if(y.isUpdating=!0,L.isEmptyObject(e.cache))L.updateHeader(e),L.commonUpdate(e,r,o);else{for(d=t.filter("tr").attr("role","row").length,n=e.$tbodies.index(t.parents("tbody").filter(":first")),e.parsers&&e.parsers.length||L.setupParsers(e),i=0;i<d;i++){for(p=0,c=t[i].cells.length,g=e.cache[n].normalized.length,f=[],u={child:[],raw:[],$row:t.eq(i),order:g},l=0;l<c;l++)h=t[i].cells[l],s=L.getElementText(e,h,p),u.raw[p]=s,a=L.getParsedText(e,h,p,s),f[p]=a,"numeric"===(e.parsers[p].type||"").toLowerCase()&&(e.cache[n].colMax[p]=Math.max(Math.abs(a)||0,e.cache[n].colMax[p]||0)),0<(m=h.colSpan-1)&&(p+=m),p++;f[e.columns]=u,e.cache[n].normalized[g]=f}L.checkResort(e,r,o)}},updateCache:function(e,t,r){e.parsers&&e.parsers.length||L.setupParsers(e,r),L.buildCache(e,t,r)},appendCache:function(e,t){var r,o,s,a,n,i,d,l=e.table,c=e.$tbodies,g=[],p=e.cache;if(L.isEmptyObject(p))return e.appender?e.appender(l,g):l.isUpdating?e.$table.triggerHandler("updateComplete",l):"";for(L.debug(e,"core")&&(d=new Date),i=0;i<c.length;i++)if((s=c.eq(i)).length){for(a=L.processTbody(l,s,!0),o=(r=p[i].normalized).length,n=0;n<o;n++)g[g.length]=r[n][e.columns].$row,e.appender&&(!e.pager||e.pager.removeRows||e.pager.ajax)||a.append(r[n][e.columns].$row);L.processTbody(l,a,!1)}e.appender&&e.appender(l,g),L.debug(e,"core")&&console.log("Rebuilt table"+L.benchmark(d)),t||e.appender||L.applyWidget(l),l.isUpdating&&e.$table.triggerHandler("updateComplete",l)},commonUpdate:function(e,t,r){e.$table.find(e.selectorRemove).remove(),L.setupParsers(e),L.buildCache(e),L.checkResort(e,t,r)},initSort:function(t,e,r){if(t.table.isUpdating)return setTimeout(function(){L.initSort(t,e,r)},50);var o,s,a,n,i,d,l,c=!r[t.sortMultiSortKey],g=t.table,p=t.$headers.length,u=L.getClosest(A(e),"th, td"),f=parseInt(u.attr("data-column"),10),h="mouseup"===r.type?"user":r.type,m=t.sortVars[f].order;if(u=u[0],t.$table.triggerHandler("sortStart",g),d=(t.sortVars[f].count+1)%m.length,t.sortVars[f].count=r[t.sortResetKey]?2:d,t.sortRestart)for(a=0;a<p;a++)l=t.$headers.eq(a),f!==(d=parseInt(l.attr("data-column"),10))&&(c||l.hasClass(L.css.sortNone))&&(t.sortVars[d].count=-1);if(c){if(A.each(t.sortVars,function(e){t.sortVars[e].sortedBy=""}),t.sortList=[],t.last.sortList=[],null!==t.sortForce)for(o=t.sortForce,s=0;s<o.length;s++)o[s][0]!==f&&(t.sortList[t.sortList.length]=o[s],t.sortVars[o[s][0]].sortedBy="sortForce");if((n=m[t.sortVars[f].count])<2&&(t.sortList[t.sortList.length]=[f,n],t.sortVars[f].sortedBy=h,1<u.colSpan))for(s=1;s<u.colSpan;s++)t.sortList[t.sortList.length]=[f+s,n],t.sortVars[f+s].count=A.inArray(n,m),t.sortVars[f+s].sortedBy=h}else if(t.sortList=A.extend([],t.last.sortList),0<=L.isValueInArray(f,t.sortList))for(t.sortVars[f].sortedBy=h,s=0;s<t.sortList.length;s++)(d=t.sortList[s])[0]===f&&(d[1]=m[t.sortVars[f].count],2===d[1]&&(t.sortList.splice(s,1),t.sortVars[f].count=-1));else if(n=m[t.sortVars[f].count],t.sortVars[f].sortedBy=h,n<2&&(t.sortList[t.sortList.length]=[f,n],1<u.colSpan))for(s=1;s<u.colSpan;s++)t.sortList[t.sortList.length]=[f+s,n],t.sortVars[f+s].count=A.inArray(n,m),t.sortVars[f+s].sortedBy=h;if(t.last.sortList=A.extend([],t.sortList),t.sortList.length&&t.sortAppend&&(o=A.isArray(t.sortAppend)?t.sortAppend:t.sortAppend[t.sortList[0][0]],!L.isEmptyObject(o)))for(s=0;s<o.length;s++)if(o[s][0]!==f&&L.isValueInArray(o[s][0],t.sortList)<0){if(i=(""+(n=o[s][1])).match(/^(a|d|s|o|n)/))switch(d=t.sortList[0][1],i[0]){case"d":n=1;break;case"s":n=d;break;case"o":n=0===d?1:0;break;case"n":n=(d+1)%m.length;break;default:n=0}t.sortList[t.sortList.length]=[o[s][0],n],t.sortVars[o[s][0]].sortedBy="sortAppend"}t.$table.triggerHandler("sortBegin",g),setTimeout(function(){L.setHeadersCss(t),L.multisort(t),L.appendCache(t),t.$table.triggerHandler("sortBeforeEnd",g),t.$table.triggerHandler("sortEnd",g)},1)},multisort:function(l){var e,t,c,r,g=l.table,p=[],u=0,f=l.textSorter||"",h=l.sortList,m=h.length,o=l.$tbodies.length;if(!l.serverSideSorting&&!L.isEmptyObject(l.cache)){if(L.debug(l,"core")&&(t=new Date),"object"==typeof f)for(c=l.columns;c--;)"function"==typeof(r=L.getColumnData(g,f,c))&&(p[c]=r);for(e=0;e<o;e++)c=l.cache[e].colMax,l.cache[e].normalized.sort(function(e,t){var r,o,s,a,n,i,d;for(r=0;r<m;r++){if(s=h[r][0],a=h[r][1],u=0===a,l.sortStable&&e[s]===t[s]&&1===m)return e[l.columns].order-t[l.columns].order;if(n=(o=/n/i.test(L.getSortType(l.parsers,s)))&&l.strings[s]?(o="boolean"==typeof L.string[l.strings[s]]?(u?1:-1)*(L.string[l.strings[s]]?-1:1):l.strings[s]&&L.string[l.strings[s]]||0,l.numberSorter?l.numberSorter(e[s],t[s],u,c[s],g):L["sortNumeric"+(u?"Asc":"Desc")](e[s],t[s],o,c[s],s,l)):(i=u?e:t,d=u?t:e,"function"==typeof f?f(i[s],d[s],u,s,g):"function"==typeof p[s]?p[s](i[s],d[s],u,s,g):L["sortNatural"+(u?"Asc":"Desc")](e[s]||"",t[s]||"",s,l)))return n}return e[l.columns].order-t[l.columns].order});L.debug(l,"core")&&console.log("Applying sort "+h.toString()+L.benchmark(t))}},resortComplete:function(e,t){e.table.isUpdating&&e.$table.triggerHandler("updateComplete",e.table),A.isFunction(t)&&t(e.table)},checkResort:function(e,t,r){var o=A.isArray(t)?t:e.sortList;!1===(void 0===t?e.resort:t)||e.serverSideSorting||e.table.isProcessing?(L.resortComplete(e,r),L.applyWidget(e.table,!1)):o.length?L.sortOn(e,o,function(){L.resortComplete(e,r)},!0):L.sortReset(e,function(){L.resortComplete(e,r),L.applyWidget(e.table,!1)})},sortOn:function(e,t,r,o){var s,a=e.table;for(e.$table.triggerHandler("sortStart",a),s=0;s<e.columns;s++)e.sortVars[s].sortedBy=-1<L.isValueInArray(s,t)?"sorton":"";L.updateHeaderSortCount(e,t),L.setHeadersCss(e),e.delayInit&&L.isEmptyObject(e.cache)&&L.buildCache(e),e.$table.triggerHandler("sortBegin",a),L.multisort(e),L.appendCache(e,o),e.$table.triggerHandler("sortBeforeEnd",a),e.$table.triggerHandler("sortEnd",a),L.applyWidget(a),A.isFunction(r)&&r(a)},sortReset:function(e,t){var r;for(e.sortList=[],r=0;r<e.columns;r++)e.sortVars[r].count=-1,e.sortVars[r].sortedBy="";L.setHeadersCss(e),L.multisort(e),L.appendCache(e),A.isFunction(t)&&t(e.table)},getSortType:function(e,t){return e&&e[t]&&e[t].type||""},getOrder:function(e){return/^d/i.test(e)||1===e},sortNatural:function(e,t){if(e===t)return 0;e=(e||"").toString(),t=(t||"").toString();var r,o,s,a,n,i,d=L.regex;if(d.hex.test(t)){if((r=parseInt(e.match(d.hex),16))<(o=parseInt(t.match(d.hex),16)))return-1;if(o<r)return 1}for(r=e.replace(d.chunk,"\\0$1\\0").replace(d.chunks,"").split("\\0"),o=t.replace(d.chunk,"\\0$1\\0").replace(d.chunks,"").split("\\0"),i=Math.max(r.length,o.length),n=0;n<i;n++){if(s=isNaN(r[n])?r[n]||0:parseFloat(r[n])||0,a=isNaN(o[n])?o[n]||0:parseFloat(o[n])||0,isNaN(s)!==isNaN(a))return isNaN(s)?1:-1;if(typeof s!=typeof a&&(s+="",a+=""),s<a)return-1;if(a<s)return 1}return 0},sortNaturalAsc:function(e,t,r,o){if(e===t)return 0;var s=L.string[o.empties[r]||o.emptyTo];return""===e&&0!==s?"boolean"==typeof s?s?-1:1:-s||-1:""===t&&0!==s?"boolean"==typeof s?s?1:-1:s||1:L.sortNatural(e,t)},sortNaturalDesc:function(e,t,r,o){if(e===t)return 0;var s=L.string[o.empties[r]||o.emptyTo];return""===e&&0!==s?"boolean"==typeof s?s?-1:1:s||1:""===t&&0!==s?"boolean"==typeof s?s?1:-1:-s||-1:L.sortNatural(t,e)},sortText:function(e,t){return t<e?1:e<t?-1:0},getTextValue:function(e,t,r){if(r){var o,s=e?e.length:0,a=r+t;for(o=0;o<s;o++)a+=e.charCodeAt(o);return t*a}return 0},sortNumericAsc:function(e,t,r,o,s,a){if(e===t)return 0;var n=L.string[a.empties[s]||a.emptyTo];return""===e&&0!==n?"boolean"==typeof n?n?-1:1:-n||-1:""===t&&0!==n?"boolean"==typeof n?n?1:-1:n||1:(isNaN(e)&&(e=L.getTextValue(e,r,o)),isNaN(t)&&(t=L.getTextValue(t,r,o)),e-t)},sortNumericDesc:function(e,t,r,o,s,a){if(e===t)return 0;var n=L.string[a.empties[s]||a.emptyTo];return""===e&&0!==n?"boolean"==typeof n?n?-1:1:n||1:""===t&&0!==n?"boolean"==typeof n?n?1:-1:-n||-1:(isNaN(e)&&(e=L.getTextValue(e,r,o)),isNaN(t)&&(t=L.getTextValue(t,r,o)),t-e)},sortNumeric:function(e,t){return e-t},addWidget:function(e){e.id&&!L.isEmptyObject(L.getWidgetById(e.id))&&console.warn('"'+e.id+'" widget was loaded more than once!'),L.widgets[L.widgets.length]=e},hasWidget:function(e,t){return(e=A(e)).length&&e[0].config&&e[0].config.widgetInit[t]||!1},getWidgetById:function(e){var t,r,o=L.widgets.length;for(t=0;t<o;t++)if((r=L.widgets[t])&&r.id&&r.id.toLowerCase()===e.toLowerCase())return r},applyWidgetOptions:function(e){var t,r,o,s=e.config,a=s.widgets.length;if(a)for(t=0;t<a;t++)(r=L.getWidgetById(s.widgets[t]))&&r.options&&(o=A.extend(!0,{},r.options),s.widgetOptions=A.extend(!0,o,s.widgetOptions),A.extend(!0,L.defaults.widgetOptions,r.options))},addWidgetFromClass:function(e){var t,r,o=e.config,s="^"+o.widgetClass.replace(L.regex.templateName,"(\\S+)+")+"$",a=new RegExp(s,"g"),n=(e.className||"").split(L.regex.spaces);if(n.length)for(t=n.length,r=0;r<t;r++)n[r].match(a)&&(o.widgets[o.widgets.length]=n[r].replace(a,"$1"))},applyWidgetId:function(e,t,r){var o,s,a,n=(e=A(e)[0]).config,i=n.widgetOptions,d=L.debug(n,"core"),l=L.getWidgetById(t);l&&(a=l.id,o=!1,A.inArray(a,n.widgets)<0&&(n.widgets[n.widgets.length]=a),d&&(s=new Date),!r&&n.widgetInit[a]||(n.widgetInit[a]=!0,e.hasInitialized&&L.applyWidgetOptions(e),"function"==typeof l.init&&(o=!0,d&&console[console.group?"group":"log"]("Initializing "+a+" widget"),l.init(e,l,n,i))),r||"function"!=typeof l.format||(o=!0,d&&console[console.group?"group":"log"]("Updating "+a+" widget"),l.format(e,n,i,!1)),d&&o&&(console.log("Completed "+(r?"initializing ":"applying ")+a+" widget"+L.benchmark(s)),console.groupEnd&&console.groupEnd()))},applyWidget:function(e,t,r){var o,s,a,n,i,d=(e=A(e)[0]).config,l=L.debug(d,"core"),c=[];if(!1===t||!e.hasInitialized||!e.isApplyingWidgets&&!e.isUpdating){if(l&&(i=new Date),L.addWidgetFromClass(e),clearTimeout(d.timerReady),d.widgets.length){for(e.isApplyingWidgets=!0,d.widgets=A.grep(d.widgets,function(e,t){return A.inArray(e,d.widgets)===t}),s=(a=d.widgets||[]).length,o=0;o<s;o++)(n=L.getWidgetById(a[o]))&&n.id?(n.priority||(n.priority=10),c[o]=n):l&&console.warn('"'+a[o]+'" was enabled, but the widget code has not been loaded!');for(c.sort(function(e,t){return e.priority<t.priority?-1:e.priority===t.priority?0:1}),s=c.length,l&&console[console.group?"group":"log"]("Start "+(t?"initializing":"applying")+" widgets"),o=0;o<s;o++)(n=c[o])&&n.id&&L.applyWidgetId(e,n.id,t);l&&console.groupEnd&&console.groupEnd()}d.timerReady=setTimeout(function(){e.isApplyingWidgets=!1,A.data(e,"lastWidgetApplication",new Date),d.$table.triggerHandler("tablesorter-ready"),t||"function"!=typeof r||r(e),l&&(n=d.widgets.length,console.log("Completed "+(!0===t?"initializing ":"applying ")+n+" widget"+(1!==n?"s":"")+L.benchmark(i)))},10)}},removeWidget:function(e,t,r){var o,s,a,n,i=(e=A(e)[0]).config;if(!0===t)for(t=[],n=L.widgets.length,a=0;a<n;a++)(s=L.widgets[a])&&s.id&&(t[t.length]=s.id);else t=(A.isArray(t)?t.join(","):t||"").toLowerCase().split(/[\s,]+/);for(n=t.length,o=0;o<n;o++)s=L.getWidgetById(t[o]),0<=(a=A.inArray(t[o],i.widgets))&&!0!==r&&i.widgets.splice(a,1),s&&s.remove&&(L.debug(i,"core")&&console.log((r?"Refreshing":"Removing")+' "'+t[o]+'" widget'),s.remove(e,i,i.widgetOptions,r),i.widgetInit[t[o]]=!1);i.$table.triggerHandler("widgetRemoveEnd",e)},refreshWidgets:function(e,t,r){var o,s,a=(e=A(e)[0]).config.widgets,n=L.widgets,i=n.length,d=[],l=function(e){A(e).triggerHandler("refreshComplete")};for(o=0;o<i;o++)(s=n[o])&&s.id&&(t||A.inArray(s.id,a)<0)&&(d[d.length]=s.id);L.removeWidget(e,d.join(","),!0),!0!==r?(L.applyWidget(e,t||!1,l),t&&L.applyWidget(e,!1,l)):l(e)},benchmark:function(e){return" ("+((new Date).getTime()-e.getTime())+" ms)"},log:function(){console.log(arguments)},debug:function(e,t){return e&&(!0===e.debug||"string"==typeof e.debug&&-1<e.debug.indexOf(t))},isEmptyObject:function(e){for(var t in e)return!1;return!0},isValueInArray:function(e,t){var r,o=t&&t.length||0;for(r=0;r<o;r++)if(t[r][0]===e)return r;return-1},formatFloat:function(e,t){return"string"!=typeof e||""===e?e:(e=(t&&t.config?!1!==t.config.usNumberFormat:void 0===t||t)?e.replace(L.regex.comma,""):e.replace(L.regex.digitNonUS,"").replace(L.regex.comma,"."),L.regex.digitNegativeTest.test(e)&&(e=e.replace(L.regex.digitNegativeReplace,"-$1")),r=parseFloat(e),isNaN(r)?A.trim(e):r);var r},isDigit:function(e){return isNaN(e)?L.regex.digitTest.test(e.toString().replace(L.regex.digitReplace,"")):""!==e},computeColumnIndex:function(e,t){var r,o,s,a,n,i,d,l,c,g,p=t&&t.columns||0,u=[],f=new Array(p);for(r=0;r<e.length;r++)for(i=e[r].cells,o=0;o<i.length;o++){for(d=r,l=(n=i[o]).rowSpan||1,c=n.colSpan||1,void 0===u[d]&&(u[d]=[]),s=0;s<u[d].length+1;s++)if(void 0===u[d][s]){g=s;break}for(p&&n.cellIndex===g||(n.setAttribute?n.setAttribute("data-column",g):A(n).attr("data-column",g)),s=d;s<d+l;s++)for(void 0===u[s]&&(u[s]=[]),f=u[s],a=g;a<g+c;a++)f[a]="x"}return L.checkColumnCount(e,u,f.length),f.length},checkColumnCount:function(e,t,r){var o,s,a=!0,n=[];for(o=0;o<t.length;o++)if(t[o]&&(s=t[o].length,t[o].length!==r)){a=!1;break}a||(e.each(function(e,t){var r=t.parentElement.nodeName;n.indexOf(r)<0&&n.push(r)}),console.error("Invalid or incorrect number of columns in the "+n.join(" or ")+"; expected "+r+", but found "+s+" columns"))},fixColumnWidth:function(e){var t,r,o,s,a,n=(e=A(e)[0]).config,i=n.$table.children("colgroup");if(i.length&&i.hasClass(L.css.colgroup)&&i.remove(),n.widthFixed&&0===n.$table.children("colgroup").length){for(i=A('<colgroup class="'+L.css.colgroup+'">'),t=n.$table.width(),s=(o=n.$tbodies.find("tr:first").children(":visible")).length,a=0;a<s;a++)r=parseInt(o.eq(a).width()/t*1e3,10)/10+"%",i.append(A("<col>").css("width",r));n.$table.prepend(i)}},getData:function(e,t,r){var o,s,a="",n=A(e);return n.length?(o=!!A.metadata&&n.metadata(),s=" "+(n.attr("class")||""),void 0!==n.data(r)||void 0!==n.data(r.toLowerCase())?a+=n.data(r)||n.data(r.toLowerCase()):o&&void 0!==o[r]?a+=o[r]:t&&void 0!==t[r]?a+=t[r]:" "!==s&&s.match(" "+r+"-")&&(a=s.match(new RegExp("\\s"+r+"-([\\w-]+)"))[1]||""),A.trim(a)):""},getColumnData:function(e,t,r,o,s){if("object"!=typeof t||null===t)return t;var a,n=(e=A(e)[0]).config,i=s||n.$headers,d=n.$headerIndexed&&n.$headerIndexed[r]||i.find('[data-column="'+r+'"]:last');if(void 0!==t[r])return o?t[r]:t[i.index(d)];for(a in t)if("string"==typeof a&&d.filter(a).add(d.find(a)).length)return t[a]},isProcessing:function(e,t,r){var o=(e=A(e))[0].config,s=r||e.find("."+L.css.header);t?(void 0!==r&&0<o.sortList.length&&(s=s.filter(function(){return!this.sortDisabled&&0<=L.isValueInArray(parseFloat(A(this).attr("data-column")),o.sortList)})),e.add(s).addClass(L.css.processing+" "+o.cssProcessing)):e.add(s).removeClass(L.css.processing+" "+o.cssProcessing)},processTbody:function(e,t,r){if(e=A(e)[0],r)return e.isProcessing=!0,t.before('<colgroup class="tablesorter-savemyplace"/>'),A.fn.detach?t.detach():t.remove();var o=A(e).find("colgroup.tablesorter-savemyplace");t.insertAfter(o),o.remove(),e.isProcessing=!1},clearTableBody:function(e){A(e)[0].config.$tbodies.children().detach()},characterEquivalents:{a:"áàâãäąå",A:"ÁÀÂÃÄĄÅ",c:"çćč",C:"ÇĆČ",e:"éèêëěę",E:"ÉÈÊËĚĘ",i:"íìİîïı",I:"ÍÌİÎÏ",o:"óòôõöō",O:"ÓÒÔÕÖŌ",ss:"ß",SS:"ẞ",u:"úùûüů",U:"ÚÙÛÜŮ"},replaceAccents:function(e){var t,r="[",o=L.characterEquivalents;if(!L.characterRegex){for(t in L.characterRegexArray={},o)"string"==typeof t&&(r+=o[t],L.characterRegexArray[t]=new RegExp("["+o[t]+"]","g"));L.characterRegex=new RegExp(r+"]")}if(L.characterRegex.test(e))for(t in o)"string"==typeof t&&(e=e.replace(L.characterRegexArray[t],t));return e},validateOptions:function(e){var t,r,o,s,a="headers sortForce sortList sortAppend widgets".split(" "),n=e.originalSettings;if(n){for(t in L.debug(e,"core")&&(s=new Date),n)if("undefined"===(o=typeof L.defaults[t]))console.warn('Tablesorter Warning! "table.config.'+t+'" option not recognized');else if("object"===o)for(r in n[t])o=L.defaults[t]&&typeof L.defaults[t][r],A.inArray(t,a)<0&&"undefined"===o&&console.warn('Tablesorter Warning! "table.config.'+t+"."+r+'" option not recognized');L.debug(e,"core")&&console.log("validate options time:"+L.benchmark(s))}},restoreHeaders:function(e){var t,r,o=A(e)[0].config,s=o.$table.find(o.selectorHeaders),a=s.length;for(t=0;t<a;t++)(r=s.eq(t)).find("."+L.css.headerIn).length&&r.html(o.headerContent[t])},destroy:function(e,t,r){if((e=A(e)[0]).hasInitialized){L.removeWidget(e,!0,!1);var o,s=A(e),a=e.config,n=s.find("thead:first"),i=n.find("tr."+L.css.headerRow).removeClass(L.css.headerRow+" "+a.cssHeaderRow),d=s.find("tfoot:first > tr").children("th, td");!1===t&&0<=A.inArray("uitheme",a.widgets)&&(s.triggerHandler("applyWidgetId",["uitheme"]),s.triggerHandler("applyWidgetId",["zebra"])),n.find("tr").not(i).remove(),o="sortReset update updateRows updateAll updateHeaders updateCell addRows updateComplete sorton appendCache updateCache applyWidgetId applyWidgets refreshWidgets removeWidget destroy mouseup mouseleave "+"keypress sortBegin sortEnd resetToLoadState ".split(" ").join(a.namespace+" "),s.removeData("tablesorter").unbind(o.replace(L.regex.spaces," ")),a.$headers.add(d).removeClass([L.css.header,a.cssHeader,a.cssAsc,a.cssDesc,L.css.sortAsc,L.css.sortDesc,L.css.sortNone].join(" ")).removeAttr("data-column").removeAttr("aria-label").attr("aria-disabled","true"),i.find(a.selectorSort).unbind("mousedown mouseup keypress ".split(" ").join(a.namespace+" ").replace(L.regex.spaces," ")),L.restoreHeaders(e),s.toggleClass(L.css.table+" "+a.tableClass+" tablesorter-"+a.theme,!1===t),s.removeClass(a.namespace.slice(1)),e.hasInitialized=!1,delete e.config.cache,"function"==typeof r&&r(e),L.debug(a,"core")&&console.log("tablesorter has been removed")}}};A.fn.tablesorter=function(t){return this.each(function(){var e=A.extend(!0,{},L.defaults,t,L.instanceMethods);e.originalSettings=t,!this.hasInitialized&&L.buildTable&&"TABLE"!==this.nodeName?L.buildTable(this,e):L.setup(this,e)})},window.console&&window.console.log||(L.logs=[],console={},console.log=console.warn=console.error=console.table=function(){var e=1<arguments.length?arguments:arguments[0];L.logs[L.logs.length]={date:Date.now(),log:e}}),L.addParser({id:"no-parser",is:function(){return!1},format:function(){return""},type:"text"}),L.addParser({id:"text",is:function(){return!0},format:function(e,t){var r=t.config;return e&&(e=A.trim(r.ignoreCase?e.toLocaleLowerCase():e),e=r.sortLocaleCompare?L.replaceAccents(e):e),e},type:"text"}),L.regex.nondigit=/[^\w,. \-()]/g,L.addParser({id:"digit",is:function(e){return L.isDigit(e)},format:function(e,t){var r=L.formatFloat((e||"").replace(L.regex.nondigit,""),t);return e&&"number"==typeof r?r:e?A.trim(e&&t.config.ignoreCase?e.toLocaleLowerCase():e):e},type:"numeric"}),L.regex.currencyReplace=/[+\-,. ]/g,L.regex.currencyTest=/^\(?\d+[\u00a3$\u20ac\u00a4\u00a5\u00a2?.]|[\u00a3$\u20ac\u00a4\u00a5\u00a2?.]\d+\)?$/,L.addParser({id:"currency",is:function(e){return e=(e||"").replace(L.regex.currencyReplace,""),L.regex.currencyTest.test(e)},format:function(e,t){var r=L.formatFloat((e||"").replace(L.regex.nondigit,""),t);return e&&"number"==typeof r?r:e?A.trim(e&&t.config.ignoreCase?e.toLocaleLowerCase():e):e},type:"numeric"}),L.regex.urlProtocolTest=/^(https?|ftp|file):\/\//,L.regex.urlProtocolReplace=/(https?|ftp|file):\/\/(www\.)?/,L.addParser({id:"url",is:function(e){return L.regex.urlProtocolTest.test(e)},format:function(e){return e?A.trim(e.replace(L.regex.urlProtocolReplace,"")):e},type:"text"}),L.regex.dash=/-/g,L.regex.isoDate=/^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}/,L.addParser({id:"isoDate",is:function(e){return L.regex.isoDate.test(e)},format:function(e){var t=e?new Date(e.replace(L.regex.dash,"/")):e;return t instanceof Date&&isFinite(t)?t.getTime():e},type:"numeric"}),L.regex.percent=/%/g,L.regex.percentTest=/(\d\s*?%|%\s*?\d)/,L.addParser({id:"percent",is:function(e){return L.regex.percentTest.test(e)&&e.length<15},format:function(e,t){return e?L.formatFloat(e.replace(L.regex.percent,""),t):e},type:"numeric"}),L.addParser({id:"image",is:function(e,t,r,o){return 0<o.find("img").length},format:function(e,t,r){return A(r).find("img").attr(t.config.imgAttr||"alt")||e},parsed:!0,type:"text"}),L.regex.dateReplace=/(\S)([AP]M)$/i,L.regex.usLongDateTest1=/^[A-Z]{3,10}\.?\s+\d{1,2},?\s+(\d{4})(\s+\d{1,2}:\d{2}(:\d{2})?(\s+[AP]M)?)?$/i,L.regex.usLongDateTest2=/^\d{1,2}\s+[A-Z]{3,10}\s+\d{4}/i,L.addParser({id:"usLongDate",is:function(e){return L.regex.usLongDateTest1.test(e)||L.regex.usLongDateTest2.test(e)},format:function(e){var t=e?new Date(e.replace(L.regex.dateReplace,"$1 $2")):e;return t instanceof Date&&isFinite(t)?t.getTime():e},type:"numeric"}),L.regex.shortDateTest=/(^\d{1,2}[\/\s]\d{1,2}[\/\s]\d{4})|(^\d{4}[\/\s]\d{1,2}[\/\s]\d{1,2})/,L.regex.shortDateReplace=/[\-.,]/g,L.regex.shortDateXXY=/(\d{1,2})[\/\s](\d{1,2})[\/\s](\d{4})/,L.regex.shortDateYMD=/(\d{4})[\/\s](\d{1,2})[\/\s](\d{1,2})/,L.convertFormat=function(e,t){e=(e||"").replace(L.regex.spaces," ").replace(L.regex.shortDateReplace,"/"),"mmddyyyy"===t?e=e.replace(L.regex.shortDateXXY,"$3/$1/$2"):"ddmmyyyy"===t?e=e.replace(L.regex.shortDateXXY,"$3/$2/$1"):"yyyymmdd"===t&&(e=e.replace(L.regex.shortDateYMD,"$1/$2/$3"));var r=new Date(e);return r instanceof Date&&isFinite(r)?r.getTime():""},L.addParser({id:"shortDate",is:function(e){return e=(e||"").replace(L.regex.spaces," ").replace(L.regex.shortDateReplace,"/"),L.regex.shortDateTest.test(e)},format:function(e,t,r,o){if(e){var s=t.config,a=s.$headerIndexed[o],n=a.length&&a.data("dateFormat")||L.getData(a,L.getColumnData(t,s.headers,o),"dateFormat")||s.dateFormat;return a.length&&a.data("dateFormat",n),L.convertFormat(e,n)||e}return e},type:"numeric"}),L.regex.timeTest=/^(0?[1-9]|1[0-2]):([0-5]\d)(\s[AP]M)$|^((?:[01]\d|[2][0-4]):[0-5]\d)$/i,L.regex.timeMatch=/(0?[1-9]|1[0-2]):([0-5]\d)(\s[AP]M)|((?:[01]\d|[2][0-4]):[0-5]\d)/i,L.addParser({id:"time",is:function(e){return L.regex.timeTest.test(e)},format:function(e){var t=(e||"").match(L.regex.timeMatch),r=new Date(e),o=e&&(null!==t?t[0]:"00:00 AM"),s=o?new Date("2000/01/01 "+o.replace(L.regex.dateReplace,"$1 $2")):o;return s instanceof Date&&isFinite(s)?(r instanceof Date&&isFinite(r)?r.getTime():0)?parseFloat(s.getTime()+"."+r.getTime()):s.getTime():e},type:"numeric"}),L.addParser({id:"metadata",is:function(){return!1},format:function(e,t,r){var o=t.config,s=o.parserMetadataName?o.parserMetadataName:"sortValue";return A(r).metadata()[s]},type:"numeric"}),L.addWidget({id:"zebra",priority:90,format:function(e,t,r){var o,s,a,n,i,d,l,c=new RegExp(t.cssChildRow,"i"),g=t.$tbodies.add(A(t.namespace+"_extra_table").children("tbody:not(."+t.cssInfoBlock+")"));for(i=0;i<g.length;i++)for(a=0,l=(o=g.eq(i).children("tr:visible").not(t.selectorRemove)).length,d=0;d<l;d++)s=o.eq(d),c.test(s[0].className)||a++,n=a%2==0,s.removeClass(r.zebra[n?1:0]).addClass(r.zebra[n?0:1])},remove:function(e,t,r,o){if(!o){var s,a,n=t.$tbodies,i=(r.zebra||["even","odd"]).join(" ");for(s=0;s<n.length;s++)(a=L.processTbody(e,n.eq(s),!0)).children().removeClass(i),L.processTbody(e,a,!1)}}})}(e),e.tablesorter});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:78:"/local/templates/arlight/js/jquery.tablesorter.widgets.min.js?1657207552182017";s:6:"source";s:61:"/local/templates/arlight/js/jquery.tablesorter.widgets.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*** This file is dynamically generated ***
 █████▄ ▄████▄   █████▄ ▄████▄ ██████   ███████▄ ▄████▄ █████▄ ██ ██████ ██  ██
 ██  ██ ██  ██   ██  ██ ██  ██   ██     ██ ██ ██ ██  ██ ██  ██ ██ ██▄▄   ██▄▄██
 ██  ██ ██  ██   ██  ██ ██  ██   ██     ██ ██ ██ ██  ██ ██  ██ ██ ██▀▀    ▀▀▀██
 █████▀ ▀████▀   ██  ██ ▀████▀   ██     ██ ██ ██ ▀████▀ █████▀ ██ ██     █████▀
 */
/*! tablesorter (FORK) - updated 2018-11-20 (v2.31.1)*/
/* Includes widgets ( storage,uitheme,columns,filter,stickyHeaders,resizable,saveSort ) */
(function(factory){if (typeof define === 'function' && define.amd){define(['jquery'], factory);} else if (typeof module === 'object' && typeof module.exports === 'object'){module.exports = factory(require('jquery'));} else {factory(jQuery);}}(function(jQuery) {
    /*! Widget: storage - updated 2018-03-18 (v2.30.0) */
    /*global JSON:false */
    ;(function ($, window, document) {
        'use strict';

        var ts = $.tablesorter || {};

        // update defaults for validator; these values must be falsy!
        $.extend(true, ts.defaults, {
            fixedUrl: '',
            widgetOptions: {
                storage_fixedUrl: '',
                storage_group: '',
                storage_page: '',
                storage_storageType: '',
                storage_tableId: '',
                storage_useSessionStorage: ''
            }
        });

        // *** Store data in local storage, with a cookie fallback ***
        /* IE7 needs JSON library for JSON.stringify - (http://caniuse.com/#search=json)
	   if you need it, then include https://github.com/douglascrockford/JSON-js

	   $.parseJSON is not available is jQuery versions older than 1.4.1, using older
	   versions will only allow storing information for one page at a time

	   // *** Save data (JSON format only) ***
	   // val must be valid JSON... use http://jsonlint.com/ to ensure it is valid
	   var val = { "mywidget" : "data1" }; // valid JSON uses double quotes
	   // $.tablesorter.storage(table, key, val);
	   $.tablesorter.storage(table, 'tablesorter-mywidget', val);

	   // *** Get data: $.tablesorter.storage(table, key); ***
	   v = $.tablesorter.storage(table, 'tablesorter-mywidget');
	   // val may be empty, so also check for your data
	   val = (v && v.hasOwnProperty('mywidget')) ? v.mywidget : '';
	   alert(val); // 'data1' if saved, or '' if not
	*/
        ts.storage = function(table, key, value, options) {
            table = $(table)[0];
            var cookieIndex, cookies, date,
                hasStorage = false,
                values = {},
                c = table.config,
                wo = c && c.widgetOptions,
                debug = ts.debug(c, 'storage'),
                storageType = (
                    ( options && options.storageType ) || ( wo && wo.storage_storageType )
                ).toString().charAt(0).toLowerCase(),
                // deprecating "useSessionStorage"; any storageType setting overrides it
                session = storageType ? '' :
                    ( options && options.useSessionStorage ) || ( wo && wo.storage_useSessionStorage ),
                $table = $(table),
                // id from (1) options ID, (2) table 'data-table-group' attribute, (3) widgetOptions.storage_tableId,
                // (4) table ID, then (5) table index
                id = options && options.id ||
                    $table.attr( options && options.group || wo && wo.storage_group || 'data-table-group') ||
                    wo && wo.storage_tableId || table.id || $('.tablesorter').index( $table ),
                // url from (1) options url, (2) table 'data-table-page' attribute, (3) widgetOptions.storage_fixedUrl,
                // (4) table.config.fixedUrl (deprecated), then (5) window location path
                url = options && options.url ||
                    $table.attr(options && options.page || wo && wo.storage_page || 'data-table-page') ||
                    wo && wo.storage_fixedUrl || c && c.fixedUrl || window.location.pathname;

            // skip if using cookies
            if (storageType !== 'c') {
                storageType = (storageType === 's' || session) ? 'sessionStorage' : 'localStorage';
                // https://gist.github.com/paulirish/5558557
                if (storageType in window) {
                    try {
                        window[storageType].setItem('_tmptest', 'temp');
                        hasStorage = true;
                        window[storageType].removeItem('_tmptest');
                    } catch (error) {
                        console.warn( storageType + ' is not supported in this browser' );
                    }
                }
            }
            if (debug) {
                console.log('Storage >> Using', hasStorage ? storageType : 'cookies');
            }
            // *** get value ***
            if ($.parseJSON) {
                if (hasStorage) {
                    values = $.parseJSON( window[storageType][key] || 'null' ) || {};
                } else {
                    // old browser, using cookies
                    cookies = document.cookie.split(/[;\s|=]/);
                    // add one to get from the key to the value
                    cookieIndex = $.inArray(key, cookies) + 1;
                    values = (cookieIndex !== 0) ? $.parseJSON(cookies[cookieIndex] || 'null') || {} : {};
                }
            }
            // allow value to be an empty string too
            if (typeof value !== 'undefined' && window.JSON && JSON.hasOwnProperty('stringify')) {
                // add unique identifiers = url pathname > table ID/index on page > data
                if (!values[url]) {
                    values[url] = {};
                }
                values[url][id] = value;
                // *** set value ***
                if (hasStorage) {
                    window[storageType][key] = JSON.stringify(values);
                } else {
                    date = new Date();
                    date.setTime(date.getTime() + (31536e+6)); // 365 days
                    document.cookie = key + '=' + (JSON.stringify(values)).replace(/\"/g, '\"') + '; expires=' + date.toGMTString() + '; path=/';
                }
            } else {
                return values && values[url] ? values[url][id] : '';
            }
        };

    })(jQuery, window, document);

    /*! Widget: uitheme - updated 2018-03-18 (v2.30.0) */
    ;(function ($) {
        'use strict';
        var ts = $.tablesorter || {};

        ts.themes = {
            'bootstrap' : {
                table        : 'table table-bordered table-striped',
                caption      : 'caption',
                // header class names
                header       : 'bootstrap-header', // give the header a gradient background (theme.bootstrap_2.css)
                sortNone     : '',
                sortAsc      : '',
                sortDesc     : '',
                active       : '', // applied when column is sorted
                hover        : '', // custom css required - a defined bootstrap style may not override other classes
                // icon class names
                icons        : '', // add 'bootstrap-icon-white' to make them white; this icon class is added to the <i> in the header
                iconSortNone : 'bootstrap-icon-unsorted', // class name added to icon when column is not sorted
                iconSortAsc  : 'glyphicon glyphicon-chevron-up', // class name added to icon when column has ascending sort
                iconSortDesc : 'glyphicon glyphicon-chevron-down', // class name added to icon when column has descending sort
                filterRow    : '', // filter row class
                footerRow    : '',
                footerCells  : '',
                even         : '', // even row zebra striping
                odd          : ''  // odd row zebra striping
            },
            'jui' : {
                table        : 'ui-widget ui-widget-content ui-corner-all', // table classes
                caption      : 'ui-widget-content',
                // header class names
                header       : 'ui-widget-header ui-corner-all ui-state-default', // header classes
                sortNone     : '',
                sortAsc      : '',
                sortDesc     : '',
                active       : 'ui-state-active', // applied when column is sorted
                hover        : 'ui-state-hover',  // hover class
                // icon class names
                icons        : 'ui-icon', // icon class added to the <i> in the header
                iconSortNone : 'ui-icon-carat-2-n-s ui-icon-caret-2-n-s', // class name added to icon when column is not sorted
                iconSortAsc  : 'ui-icon-carat-1-n ui-icon-caret-1-n', // class name added to icon when column has ascending sort
                iconSortDesc : 'ui-icon-carat-1-s ui-icon-caret-1-s', // class name added to icon when column has descending sort
                filterRow    : '',
                footerRow    : '',
                footerCells  : '',
                even         : 'ui-widget-content', // even row zebra striping
                odd          : 'ui-state-default'   // odd row zebra striping
            }
        };

        $.extend(ts.css, {
            wrapper : 'tablesorter-wrapper' // ui theme & resizable
        });

        ts.addWidget({
            id: 'uitheme',
            priority: 10,
            format: function(table, c, wo) {
                var i, tmp, hdr, icon, time, $header, $icon, $tfoot, $h, oldtheme, oldremove, oldIconRmv, hasOldTheme,
                    themesAll = ts.themes,
                    $table = c.$table.add( $( c.namespace + '_extra_table' ) ),
                    $headers = c.$headers.add( $( c.namespace + '_extra_headers' ) ),
                    theme = c.theme || 'jui',
                    themes = themesAll[theme] || {},
                    remove = $.trim( [ themes.sortNone, themes.sortDesc, themes.sortAsc, themes.active ].join( ' ' ) ),
                    iconRmv = $.trim( [ themes.iconSortNone, themes.iconSortDesc, themes.iconSortAsc ].join( ' ' ) ),
                    debug = ts.debug(c, 'uitheme');
                if (debug) { time = new Date(); }
                // initialization code - run once
                if (!$table.hasClass('tablesorter-' + theme) || c.theme !== c.appliedTheme || !wo.uitheme_applied) {
                    wo.uitheme_applied = true;
                    oldtheme = themesAll[c.appliedTheme] || {};
                    hasOldTheme = !$.isEmptyObject(oldtheme);
                    oldremove =  hasOldTheme ? [ oldtheme.sortNone, oldtheme.sortDesc, oldtheme.sortAsc, oldtheme.active ].join( ' ' ) : '';
                    oldIconRmv = hasOldTheme ? [ oldtheme.iconSortNone, oldtheme.iconSortDesc, oldtheme.iconSortAsc ].join( ' ' ) : '';
                    if (hasOldTheme) {
                        wo.zebra[0] = $.trim( ' ' + wo.zebra[0].replace(' ' + oldtheme.even, '') );
                        wo.zebra[1] = $.trim( ' ' + wo.zebra[1].replace(' ' + oldtheme.odd, '') );
                        c.$tbodies.children().removeClass( [ oldtheme.even, oldtheme.odd ].join(' ') );
                    }
                    // update zebra stripes
                    if (themes.even) { wo.zebra[0] += ' ' + themes.even; }
                    if (themes.odd) { wo.zebra[1] += ' ' + themes.odd; }
                    // add caption style
                    $table.children('caption')
                        .removeClass(oldtheme.caption || '')
                        .addClass(themes.caption);
                    // add table/footer class names
                    $tfoot = $table
                    // remove other selected themes
                        .removeClass( (c.appliedTheme ? 'tablesorter-' + (c.appliedTheme || '') : '') + ' ' + (oldtheme.table || '') )
                        .addClass('tablesorter-' + theme + ' ' + (themes.table || '')) // add theme widget class name
                        .children('tfoot');
                    c.appliedTheme = c.theme;

                    if ($tfoot.length) {
                        $tfoot
                        // if oldtheme.footerRow or oldtheme.footerCells are undefined, all class names are removed
                            .children('tr').removeClass(oldtheme.footerRow || '').addClass(themes.footerRow)
                            .children('th, td').removeClass(oldtheme.footerCells || '').addClass(themes.footerCells);
                    }
                    // update header classes
                    $headers
                        .removeClass( (hasOldTheme ? [ oldtheme.header, oldtheme.hover, oldremove ].join(' ') : '') || '' )
                        .addClass(themes.header)
                        .not('.sorter-false')
                        .unbind('mouseenter.tsuitheme mouseleave.tsuitheme')
                        .bind('mouseenter.tsuitheme mouseleave.tsuitheme', function(event) {
                            // toggleClass with switch added in jQuery 1.3
                            $(this)[ event.type === 'mouseenter' ? 'addClass' : 'removeClass' ](themes.hover || '');
                        });

                    $headers.each(function() {
                        var $this = $(this);
                        if (!$this.find('.' + ts.css.wrapper).length) {
                            // Firefox needs this inner div to position the icon & resizer correctly
                            $this.wrapInner('<div class="' + ts.css.wrapper + '" style="position:relative;height:100%;width:100%"></div>');
                        }
                    });
                    if (c.cssIcon) {
                        // if c.cssIcon is '', then no <i> is added to the header
                        $headers
                            .find('.' + ts.css.icon)
                            .removeClass(hasOldTheme ? [ oldtheme.icons, oldIconRmv ].join(' ') : '')
                            .addClass(themes.icons || '');
                    }
                    // filter widget initializes after uitheme
                    if (ts.hasWidget( c.table, 'filter' )) {
                        tmp = function() {
                            $table.children('thead').children('.' + ts.css.filterRow)
                                .removeClass(hasOldTheme ? oldtheme.filterRow || '' : '')
                                .addClass(themes.filterRow || '');
                        };
                        if (wo.filter_initialized) {
                            tmp();
                        } else {
                            $table.one('filterInit', function() {
                                tmp();
                            });
                        }
                    }
                }
                for (i = 0; i < c.columns; i++) {
                    $header = c.$headers
                        .add($(c.namespace + '_extra_headers'))
                        .not('.sorter-false')
                        .filter('[data-column="' + i + '"]');
                    $icon = (ts.css.icon) ? $header.find('.' + ts.css.icon) : $();
                    $h = $headers.not('.sorter-false').filter('[data-column="' + i + '"]:last');
                    if ($h.length) {
                        $header.removeClass(remove);
                        $icon.removeClass(iconRmv);
                        if ($h[0].sortDisabled) {
                            // no sort arrows for disabled columns!
                            $icon.removeClass(themes.icons || '');
                        } else {
                            hdr = themes.sortNone;
                            icon = themes.iconSortNone;
                            if ($h.hasClass(ts.css.sortAsc)) {
                                hdr = [ themes.sortAsc, themes.active ].join(' ');
                                icon = themes.iconSortAsc;
                            } else if ($h.hasClass(ts.css.sortDesc)) {
                                hdr = [ themes.sortDesc, themes.active ].join(' ');
                                icon = themes.iconSortDesc;
                            }
                            $header.addClass(hdr);
                            $icon.addClass(icon || '');
                        }
                    }
                }
                if (debug) {
                    console.log('uitheme >> Applied ' + theme + ' theme' + ts.benchmark(time));
                }
            },
            remove: function(table, c, wo, refreshing) {
                if (!wo.uitheme_applied) { return; }
                var $table = c.$table,
                    theme = c.appliedTheme || 'jui',
                    themes = ts.themes[ theme ] || ts.themes.jui,
                    $headers = $table.children('thead').children(),
                    remove = themes.sortNone + ' ' + themes.sortDesc + ' ' + themes.sortAsc,
                    iconRmv = themes.iconSortNone + ' ' + themes.iconSortDesc + ' ' + themes.iconSortAsc;
                $table.removeClass('tablesorter-' + theme + ' ' + themes.table);
                wo.uitheme_applied = false;
                if (refreshing) { return; }
                $table.find(ts.css.header).removeClass(themes.header);
                $headers
                    .unbind('mouseenter.tsuitheme mouseleave.tsuitheme') // remove hover
                    .removeClass(themes.hover + ' ' + remove + ' ' + themes.active)
                    .filter('.' + ts.css.filterRow)
                    .removeClass(themes.filterRow);
                $headers.find('.' + ts.css.icon).removeClass(themes.icons + ' ' + iconRmv);
            }
        });

    })(jQuery);

    /*! Widget: columns - updated 5/24/2017 (v2.28.11) */
    ;(function ($) {
        'use strict';
        var ts = $.tablesorter || {};

        ts.addWidget({
            id: 'columns',
            priority: 65,
            options : {
                columns : [ 'primary', 'secondary', 'tertiary' ]
            },
            format: function(table, c, wo) {
                var $tbody, tbodyIndex, $rows, rows, $row, $cells, remove, indx,
                    $table = c.$table,
                    $tbodies = c.$tbodies,
                    sortList = c.sortList,
                    len = sortList.length,
                    // removed c.widgetColumns support
                    css = wo && wo.columns || [ 'primary', 'secondary', 'tertiary' ],
                    last = css.length - 1;
                remove = css.join(' ');
                // check if there is a sort (on initialization there may not be one)
                for (tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ) {
                    $tbody = ts.processTbody(table, $tbodies.eq(tbodyIndex), true); // detach tbody
                    $rows = $tbody.children('tr');
                    // loop through the visible rows
                    $rows.each(function() {
                        $row = $(this);
                        if (this.style.display !== 'none') {
                            // remove all columns class names
                            $cells = $row.children().removeClass(remove);
                            // add appropriate column class names
                            if (sortList && sortList[0]) {
                                // primary sort column class
                                $cells.eq(sortList[0][0]).addClass(css[0]);
                                if (len > 1) {
                                    for (indx = 1; indx < len; indx++) {
                                        // secondary, tertiary, etc sort column classes
                                        $cells.eq(sortList[indx][0]).addClass( css[indx] || css[last] );
                                    }
                                }
                            }
                        }
                    });
                    ts.processTbody(table, $tbody, false);
                }
                // add classes to thead and tfoot
                rows = wo.columns_thead !== false ? [ 'thead tr' ] : [];
                if (wo.columns_tfoot !== false) {
                    rows.push('tfoot tr');
                }
                if (rows.length) {
                    $rows = $table.find( rows.join(',') ).children().removeClass(remove);
                    if (len) {
                        for (indx = 0; indx < len; indx++) {
                            // add primary. secondary, tertiary, etc sort column classes
                            $rows.filter('[data-column="' + sortList[indx][0] + '"]').addClass(css[indx] || css[last]);
                        }
                    }
                }
            },
            remove: function(table, c, wo) {
                var tbodyIndex, $tbody,
                    $tbodies = c.$tbodies,
                    remove = (wo.columns || [ 'primary', 'secondary', 'tertiary' ]).join(' ');
                c.$headers.removeClass(remove);
                c.$table.children('tfoot').children('tr').children('th, td').removeClass(remove);
                for (tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ) {
                    $tbody = ts.processTbody(table, $tbodies.eq(tbodyIndex), true); // remove tbody
                    $tbody.children('tr').each(function() {
                        $(this).children().removeClass(remove);
                    });
                    ts.processTbody(table, $tbody, false); // restore tbody
                }
            }
        });

    })(jQuery);

    /*! Widget: filter - updated 2018-03-18 (v2.30.0) *//*
 * Requires tablesorter v2.8+ and jQuery 1.7+
 * by Rob Garrison
 */
    ;( function ( $ ) {
        'use strict';
        var tsf, tsfRegex,
            ts = $.tablesorter || {},
            tscss = ts.css,
            tskeyCodes = ts.keyCodes;

        $.extend( tscss, {
            filterRow      : 'tablesorter-filter-row',
            filter         : 'tablesorter-filter',
            filterDisabled : 'disabled',
            filterRowHide  : 'hideme'
        });

        $.extend( tskeyCodes, {
            backSpace : 8,
            escape : 27,
            space : 32,
            left : 37,
            down : 40
        });

        ts.addWidget({
            id: 'filter',
            priority: 50,
            options : {
                filter_cellFilter    : '',    // css class name added to the filter cell ( string or array )
                filter_childRows     : false, // if true, filter includes child row content in the search
                filter_childByColumn : false, // ( filter_childRows must be true ) if true = search child rows by column; false = search all child row text grouped
                filter_childWithSibs : true,  // if true, include matching child row siblings
                filter_columnAnyMatch: true,  // if true, allows using '#:{query}' in AnyMatch searches ( column:query )
                filter_columnFilters : true,  // if true, a filter will be added to the top of each table column
                filter_cssFilter     : '',    // css class name added to the filter row & each input in the row ( tablesorter-filter is ALWAYS added )
                filter_defaultAttrib : 'data-value', // data attribute in the header cell that contains the default filter value
                filter_defaultFilter : {},    // add a default column filter type '~{query}' to make fuzzy searches default; '{q1} AND {q2}' to make all searches use a logical AND.
                filter_excludeFilter : {},    // filters to exclude, per column
                filter_external      : '',    // jQuery selector string ( or jQuery object ) of external filters
                filter_filteredRow   : 'filtered', // class added to filtered rows; define in css with "display:none" to hide the filtered-out rows
                filter_filterLabel   : 'Filter "{{label}}" column by...', // Aria-label added to filter input/select; see #1495
                filter_formatter     : null,  // add custom filter elements to the filter row
                filter_functions     : null,  // add custom filter functions using this option
                filter_hideEmpty     : true,  // hide filter row when table is empty
                filter_hideFilters   : false, // collapse filter row when mouse leaves the area
                filter_ignoreCase    : true,  // if true, make all searches case-insensitive
                filter_liveSearch    : true,  // if true, search column content while the user types ( with a delay )
                filter_matchType     : { 'input': 'exact', 'select': 'exact' }, // global query settings ('exact' or 'match'); overridden by "filter-match" or "filter-exact" class
                filter_onlyAvail     : 'filter-onlyAvail', // a header with a select dropdown & this class name will only show available ( visible ) options within the drop down
                filter_placeholder   : { search : '', select : '' }, // default placeholder text ( overridden by any header 'data-placeholder' setting )
                filter_reset         : null,  // jQuery selector string of an element used to reset the filters
                filter_resetOnEsc    : true,  // Reset filter input when the user presses escape - normalized across browsers
                filter_saveFilters   : false, // Use the $.tablesorter.storage utility to save the most recent filters
                filter_searchDelay   : 300,   // typing delay in milliseconds before starting a search
                filter_searchFiltered: true,  // allow searching through already filtered rows in special circumstances; will speed up searching in large tables if true
                filter_selectSource  : null,  // include a function to return an array of values to be added to the column filter select
                filter_selectSourceSeparator : '|', // filter_selectSource array text left of the separator is added to the option value, right into the option text
                filter_serversideFiltering : false, // if true, must perform server-side filtering b/c client-side filtering is disabled, but the ui and events will still be used.
                filter_startsWith    : false, // if true, filter start from the beginning of the cell contents
                filter_useParsedData : false  // filter all data using parsed content
            },
            format: function( table, c, wo ) {
                if ( !c.$table.hasClass( 'hasFilters' ) ) {
                    tsf.init( table, c, wo );
                }
            },
            remove: function( table, c, wo, refreshing ) {
                var tbodyIndex, $tbody,
                    $table = c.$table,
                    $tbodies = c.$tbodies,
                    events = (
                        'addRows updateCell update updateRows updateComplete appendCache filterReset ' +
                        'filterAndSortReset filterFomatterUpdate filterEnd search stickyHeadersInit '
                    ).split( ' ' ).join( c.namespace + 'filter ' );
                $table
                    .removeClass( 'hasFilters' )
                    // add filter namespace to all BUT search
                    .unbind( events.replace( ts.regex.spaces, ' ' ) )
                    // remove the filter row even if refreshing, because the column might have been moved
                    .find( '.' + tscss.filterRow ).remove();
                wo.filter_initialized = false;
                if ( refreshing ) { return; }
                for ( tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ) {
                    $tbody = ts.processTbody( table, $tbodies.eq( tbodyIndex ), true ); // remove tbody
                    $tbody.children().removeClass( wo.filter_filteredRow ).show();
                    ts.processTbody( table, $tbody, false ); // restore tbody
                }
                if ( wo.filter_reset ) {
                    $( document ).undelegate( wo.filter_reset, 'click' + c.namespace + 'filter' );
                }
            }
        });

        tsf = ts.filter = {

            // regex used in filter 'check' functions - not for general use and not documented
            regex: {
                regex     : /^\/((?:\\\/|[^\/])+)\/([migyu]{0,5})?$/, // regex to test for regex
                child     : /tablesorter-childRow/, // child row class name; this gets updated in the script
                filtered  : /filtered/, // filtered (hidden) row class name; updated in the script
                type      : /undefined|number/, // check type
                exact     : /(^[\"\'=]+)|([\"\'=]+$)/g, // exact match (allow '==')
                operators : /[<>=]/g, // replace operators
                query     : '(q|query)', // replace filter queries
                wild01    : /\?/g, // wild card match 0 or 1
                wild0More : /\*/g, // wild care match 0 or more
                quote     : /\"/g,
                isNeg1    : /(>=?\s*-\d)/,
                isNeg2    : /(<=?\s*\d)/
            },
            // function( c, data ) { }
            // c = table.config
            // data.$row = jQuery object of the row currently being processed
            // data.$cells = jQuery object of all cells within the current row
            // data.filters = array of filters for all columns ( some may be undefined )
            // data.filter = filter for the current column
            // data.iFilter = same as data.filter, except lowercase ( if wo.filter_ignoreCase is true )
            // data.exact = table cell text ( or parsed data if column parser enabled; may be a number & not a string )
            // data.iExact = same as data.exact, except lowercase ( if wo.filter_ignoreCase is true; may be a number & not a string )
            // data.cache = table cell text from cache, so it has been parsed ( & in all lower case if c.ignoreCase is true )
            // data.cacheArray = An array of parsed content from each table cell in the row being processed
            // data.index = column index; table = table element ( DOM )
            // data.parsed = array ( by column ) of boolean values ( from filter_useParsedData or 'filter-parsed' class )
            types: {
                or : function( c, data, vars ) {
                    // look for "|", but not if it is inside of a regular expression
                    if ( ( tsfRegex.orTest.test( data.iFilter ) || tsfRegex.orSplit.test( data.filter ) ) &&
                        // this test for regex has potential to slow down the overall search
                        !tsfRegex.regex.test( data.filter ) ) {
                        var indx, filterMatched, query, regex,
                            // duplicate data but split filter
                            data2 = $.extend( {}, data ),
                            filter = data.filter.split( tsfRegex.orSplit ),
                            iFilter = data.iFilter.split( tsfRegex.orSplit ),
                            len = filter.length;
                        for ( indx = 0; indx < len; indx++ ) {
                            data2.nestedFilters = true;
                            data2.filter = '' + ( tsf.parseFilter( c, filter[ indx ], data ) || '' );
                            data2.iFilter = '' + ( tsf.parseFilter( c, iFilter[ indx ], data ) || '' );
                            query = '(' + ( tsf.parseFilter( c, data2.filter, data ) || '' ) + ')';
                            try {
                                // use try/catch, because query may not be a valid regex if "|" is contained within a partial regex search,
                                // e.g "/(Alex|Aar" -> Uncaught SyntaxError: Invalid regular expression: /(/(Alex)/: Unterminated group
                                regex = new RegExp( data.isMatch ? query : '^' + query + '$', c.widgetOptions.filter_ignoreCase ? 'i' : '' );
                                // filterMatched = data2.filter === '' && indx > 0 ? true
                                // look for an exact match with the 'or' unless the 'filter-match' class is found
                                filterMatched = regex.test( data2.exact ) || tsf.processTypes( c, data2, vars );
                                if ( filterMatched ) {
                                    return filterMatched;
                                }
                            } catch ( error ) {
                                return null;
                            }
                        }
                        // may be null from processing types
                        return filterMatched || false;
                    }
                    return null;
                },
                // Look for an AND or && operator ( logical and )
                and : function( c, data, vars ) {
                    if ( tsfRegex.andTest.test( data.filter ) ) {
                        var indx, filterMatched, result, query, regex,
                            // duplicate data but split filter
                            data2 = $.extend( {}, data ),
                            filter = data.filter.split( tsfRegex.andSplit ),
                            iFilter = data.iFilter.split( tsfRegex.andSplit ),
                            len = filter.length;
                        for ( indx = 0; indx < len; indx++ ) {
                            data2.nestedFilters = true;
                            data2.filter = '' + ( tsf.parseFilter( c, filter[ indx ], data ) || '' );
                            data2.iFilter = '' + ( tsf.parseFilter( c, iFilter[ indx ], data ) || '' );
                            query = ( '(' + ( tsf.parseFilter( c, data2.filter, data ) || '' ) + ')' )
                            // replace wild cards since /(a*)/i will match anything
                                .replace( tsfRegex.wild01, '\\S{1}' ).replace( tsfRegex.wild0More, '\\S*' );
                            try {
                                // use try/catch just in case RegExp is invalid
                                regex = new RegExp( data.isMatch ? query : '^' + query + '$', c.widgetOptions.filter_ignoreCase ? 'i' : '' );
                                // look for an exact match with the 'and' unless the 'filter-match' class is found
                                result = ( regex.test( data2.exact ) || tsf.processTypes( c, data2, vars ) );
                                if ( indx === 0 ) {
                                    filterMatched = result;
                                } else {
                                    filterMatched = filterMatched && result;
                                }
                            } catch ( error ) {
                                return null;
                            }
                        }
                        // may be null from processing types
                        return filterMatched || false;
                    }
                    return null;
                },
                // Look for regex
                regex: function( c, data ) {
                    if ( tsfRegex.regex.test( data.filter ) ) {
                        var matches,
                            // cache regex per column for optimal speed
                            regex = data.filter_regexCache[ data.index ] || tsfRegex.regex.exec( data.filter ),
                            isRegex = regex instanceof RegExp;
                        try {
                            if ( !isRegex ) {
                                // force case insensitive search if ignoreCase option set?
                                // if ( c.ignoreCase && !regex[2] ) { regex[2] = 'i'; }
                                data.filter_regexCache[ data.index ] = regex = new RegExp( regex[1], regex[2] );
                            }
                            matches = regex.test( data.exact );
                        } catch ( error ) {
                            matches = false;
                        }
                        return matches;
                    }
                    return null;
                },
                // Look for operators >, >=, < or <=
                operators: function( c, data ) {
                    // ignore empty strings... because '' < 10 is true
                    if ( tsfRegex.operTest.test( data.iFilter ) && data.iExact !== '' ) {
                        var cachedValue, result, txt,
                            table = c.table,
                            parsed = data.parsed[ data.index ],
                            query = ts.formatFloat( data.iFilter.replace( tsfRegex.operators, '' ), table ),
                            parser = c.parsers[ data.index ] || {},
                            savedSearch = query;
                        // parse filter value in case we're comparing numbers ( dates )
                        if ( parsed || parser.type === 'numeric' ) {
                            txt = $.trim( '' + data.iFilter.replace( tsfRegex.operators, '' ) );
                            result = tsf.parseFilter( c, txt, data, true );
                            query = ( typeof result === 'number' && result !== '' && !isNaN( result ) ) ? result : query;
                        }
                        // iExact may be numeric - see issue #149;
                        // check if cached is defined, because sometimes j goes out of range? ( numeric columns )
                        if ( ( parsed || parser.type === 'numeric' ) && !isNaN( query ) &&
                            typeof data.cache !== 'undefined' ) {
                            cachedValue = data.cache;
                        } else {
                            txt = isNaN( data.iExact ) ? data.iExact.replace( ts.regex.nondigit, '' ) : data.iExact;
                            cachedValue = ts.formatFloat( txt, table );
                        }
                        if ( tsfRegex.gtTest.test( data.iFilter ) ) {
                            result = tsfRegex.gteTest.test( data.iFilter ) ? cachedValue >= query : cachedValue > query;
                        } else if ( tsfRegex.ltTest.test( data.iFilter ) ) {
                            result = tsfRegex.lteTest.test( data.iFilter ) ? cachedValue <= query : cachedValue < query;
                        }
                        // keep showing all rows if nothing follows the operator
                        if ( !result && savedSearch === '' ) {
                            result = true;
                        }
                        return result;
                    }
                    return null;
                },
                // Look for a not match
                notMatch: function( c, data ) {
                    if ( tsfRegex.notTest.test( data.iFilter ) ) {
                        var indx,
                            txt = data.iFilter.replace( '!', '' ),
                            filter = tsf.parseFilter( c, txt, data ) || '';
                        if ( tsfRegex.exact.test( filter ) ) {
                            // look for exact not matches - see #628
                            filter = filter.replace( tsfRegex.exact, '' );
                            return filter === '' ? true : $.trim( filter ) !== data.iExact;
                        } else {
                            indx = data.iExact.search( $.trim( filter ) );
                            return filter === '' ? true :
                                // return true if not found
                                data.anyMatch ? indx < 0 :
                                    // return false if found
                                    !( c.widgetOptions.filter_startsWith ? indx === 0 : indx >= 0 );
                        }
                    }
                    return null;
                },
                // Look for quotes or equals to get an exact match; ignore type since iExact could be numeric
                exact: function( c, data ) {
                    /*jshint eqeqeq:false */
                    if ( tsfRegex.exact.test( data.iFilter ) ) {
                        var txt = data.iFilter.replace( tsfRegex.exact, '' ),
                            filter = tsf.parseFilter( c, txt, data ) || '';
                        // eslint-disable-next-line eqeqeq
                        return data.anyMatch ? $.inArray( filter, data.rowArray ) >= 0 : filter == data.iExact;
                    }
                    return null;
                },
                // Look for a range ( using ' to ' or ' - ' ) - see issue #166; thanks matzhu!
                range : function( c, data ) {
                    if ( tsfRegex.toTest.test( data.iFilter ) ) {
                        var result, tmp, range1, range2,
                            table = c.table,
                            index = data.index,
                            parsed = data.parsed[index],
                            // make sure the dash is for a range and not indicating a negative number
                            query = data.iFilter.split( tsfRegex.toSplit );

                        tmp = query[0].replace( ts.regex.nondigit, '' ) || '';
                        range1 = ts.formatFloat( tsf.parseFilter( c, tmp, data ), table );
                        tmp = query[1].replace( ts.regex.nondigit, '' ) || '';
                        range2 = ts.formatFloat( tsf.parseFilter( c, tmp, data ), table );
                        // parse filter value in case we're comparing numbers ( dates )
                        if ( parsed || c.parsers[ index ].type === 'numeric' ) {
                            result = c.parsers[ index ].format( '' + query[0], table, c.$headers.eq( index ), index );
                            range1 = ( result !== '' && !isNaN( result ) ) ? result : range1;
                            result = c.parsers[ index ].format( '' + query[1], table, c.$headers.eq( index ), index );
                            range2 = ( result !== '' && !isNaN( result ) ) ? result : range2;
                        }
                        if ( ( parsed || c.parsers[ index ].type === 'numeric' ) && !isNaN( range1 ) && !isNaN( range2 ) ) {
                            result = data.cache;
                        } else {
                            tmp = isNaN( data.iExact ) ? data.iExact.replace( ts.regex.nondigit, '' ) : data.iExact;
                            result = ts.formatFloat( tmp, table );
                        }
                        if ( range1 > range2 ) {
                            tmp = range1; range1 = range2; range2 = tmp; // swap
                        }
                        return ( result >= range1 && result <= range2 ) || ( range1 === '' || range2 === '' );
                    }
                    return null;
                },
                // Look for wild card: ? = single, * = multiple, or | = logical OR
                wild : function( c, data ) {
                    if ( tsfRegex.wildOrTest.test( data.iFilter ) ) {
                        var query = '' + ( tsf.parseFilter( c, data.iFilter, data ) || '' );
                        // look for an exact match with the 'or' unless the 'filter-match' class is found
                        if ( !tsfRegex.wildTest.test( query ) && data.nestedFilters ) {
                            query = data.isMatch ? query : '^(' + query + ')$';
                        }
                        // parsing the filter may not work properly when using wildcards =/
                        try {
                            return new RegExp(
                                query.replace( tsfRegex.wild01, '\\S{1}' ).replace( tsfRegex.wild0More, '\\S*' ),
                                c.widgetOptions.filter_ignoreCase ? 'i' : ''
                            )
                                .test( data.exact );
                        } catch ( error ) {
                            return null;
                        }
                    }
                    return null;
                },
                // fuzzy text search; modified from https://github.com/mattyork/fuzzy ( MIT license )
                fuzzy: function( c, data ) {
                    if ( tsfRegex.fuzzyTest.test( data.iFilter ) ) {
                        var indx,
                            patternIndx = 0,
                            len = data.iExact.length,
                            txt = data.iFilter.slice( 1 ),
                            pattern = tsf.parseFilter( c, txt, data ) || '';
                        for ( indx = 0; indx < len; indx++ ) {
                            if ( data.iExact[ indx ] === pattern[ patternIndx ] ) {
                                patternIndx += 1;
                            }
                        }
                        return patternIndx === pattern.length;
                    }
                    return null;
                }
            },
            init: function( table ) {
                // filter language options
                ts.language = $.extend( true, {}, {
                    to  : 'to',
                    or  : 'or',
                    and : 'and'
                }, ts.language );

                var options, string, txt, $header, column, val, fxn, noSelect,
                    c = table.config,
                    wo = c.widgetOptions,
                    processStr = function(prefix, str, suffix) {
                        str = str.trim();
                        // don't include prefix/suffix if str is empty
                        return str === '' ? '' : (prefix || '') + str + (suffix || '');
                    };
                c.$table.addClass( 'hasFilters' );
                c.lastSearch = [];

                // define timers so using clearTimeout won't cause an undefined error
                wo.filter_searchTimer = null;
                wo.filter_initTimer = null;
                wo.filter_formatterCount = 0;
                wo.filter_formatterInit = [];
                wo.filter_anyColumnSelector = '[data-column="all"],[data-column="any"]';
                wo.filter_multipleColumnSelector = '[data-column*="-"],[data-column*=","]';

                val = '\\{' + tsfRegex.query + '\\}';
                $.extend( tsfRegex, {
                    child : new RegExp( c.cssChildRow ),
                    filtered : new RegExp( wo.filter_filteredRow ),
                    alreadyFiltered : new RegExp( '(\\s+(-' + processStr('|', ts.language.or) + processStr('|', ts.language.to) + ')\\s+)', 'i' ),
                    toTest : new RegExp( '\\s+(-' + processStr('|', ts.language.to) + ')\\s+', 'i' ),
                    toSplit : new RegExp( '(?:\\s+(?:-' + processStr('|', ts.language.to) + ')\\s+)', 'gi' ),
                    andTest : new RegExp( '\\s+(' + processStr('', ts.language.and, '|') + '&&)\\s+', 'i' ),
                    andSplit : new RegExp( '(?:\\s+(?:' + processStr('', ts.language.and, '|') + '&&)\\s+)', 'gi' ),
                    orTest : new RegExp( '(\\|' + processStr('|\\s+', ts.language.or, '\\s+') + ')', 'i' ),
                    orSplit : new RegExp( '(?:\\|' + processStr('|\\s+(?:', ts.language.or, ')\\s+') + ')', 'gi' ),
                    iQuery : new RegExp( val, 'i' ),
                    igQuery : new RegExp( val, 'ig' ),
                    operTest : /^[<>]=?/,
                    gtTest  : />/,
                    gteTest : />=/,
                    ltTest  : /</,
                    lteTest : /<=/,
                    notTest : /^\!/,
                    wildOrTest : /[\?\*\|]/,
                    wildTest : /\?\*/,
                    fuzzyTest : /^~/,
                    exactTest : /[=\"\|!]/
                });

                // don't build filter row if columnFilters is false or all columns are set to 'filter-false'
                // see issue #156
                val = c.$headers.filter( '.filter-false, .parser-false' ).length;
                if ( wo.filter_columnFilters !== false && val !== c.$headers.length ) {
                    // build filter row
                    tsf.buildRow( table, c, wo );
                }

                txt = 'addRows updateCell update updateRows updateComplete appendCache filterReset ' +
                    'filterAndSortReset filterResetSaved filterEnd search '.split( ' ' ).join( c.namespace + 'filter ' );
                c.$table.bind( txt, function( event, filter ) {
                    val = wo.filter_hideEmpty &&
                        $.isEmptyObject( c.cache ) &&
                        !( c.delayInit && event.type === 'appendCache' );
                    // hide filter row using the 'filtered' class name
                    c.$table.find( '.' + tscss.filterRow ).toggleClass( wo.filter_filteredRow, val ); // fixes #450
                    if ( !/(search|filter)/.test( event.type ) ) {
                        event.stopPropagation();
                        tsf.buildDefault( table, true );
                    }
                    // Add filterAndSortReset - see #1361
                    if ( event.type === 'filterReset' || event.type === 'filterAndSortReset' ) {
                        c.$table.find( '.' + tscss.filter ).add( wo.filter_$externalFilters ).val( '' );
                        if ( event.type === 'filterAndSortReset' ) {
                            ts.sortReset( this.config, function() {
                                tsf.searching( table, [] );
                            });
                        } else {
                            tsf.searching( table, [] );
                        }
                    } else if ( event.type === 'filterResetSaved' ) {
                        ts.storage( table, 'tablesorter-filters', '' );
                    } else if ( event.type === 'filterEnd' ) {
                        tsf.buildDefault( table, true );
                    } else {
                        // send false argument to force a new search; otherwise if the filter hasn't changed,
                        // it will return
                        filter = event.type === 'search' ? filter :
                            event.type === 'updateComplete' ? c.$table.data( 'lastSearch' ) : '';
                        if ( /(update|add)/.test( event.type ) && event.type !== 'updateComplete' ) {
                            // force a new search since content has changed
                            c.lastCombinedFilter = null;
                            c.lastSearch = [];
                            // update filterFormatters after update (& small delay) - Fixes #1237
                            setTimeout(function() {
                                c.$table.triggerHandler( 'filterFomatterUpdate' );
                            }, 100);
                        }
                        // pass true ( skipFirst ) to prevent the tablesorter.setFilters function from skipping the first
                        // input ensures all inputs are updated when a search is triggered on the table
                        // $( 'table' ).trigger( 'search', [...] );
                        tsf.searching( table, filter, true );
                    }
                    return false;
                });

                // reset button/link
                if ( wo.filter_reset ) {
                    if ( wo.filter_reset instanceof $ ) {
                        // reset contains a jQuery object, bind to it
                        wo.filter_reset.click( function() {
                            c.$table.triggerHandler( 'filterReset' );
                        });
                    } else if ( $( wo.filter_reset ).length ) {
                        // reset is a jQuery selector, use event delegation
                        $( document )
                            .undelegate( wo.filter_reset, 'click' + c.namespace + 'filter' )
                            .delegate( wo.filter_reset, 'click' + c.namespace + 'filter', function() {
                                // trigger a reset event, so other functions ( filter_formatter ) know when to reset
                                c.$table.triggerHandler( 'filterReset' );
                            });
                    }
                }
                if ( wo.filter_functions ) {
                    for ( column = 0; column < c.columns; column++ ) {
                        fxn = ts.getColumnData( table, wo.filter_functions, column );
                        if ( fxn ) {
                            // remove 'filter-select' from header otherwise the options added here are replaced with
                            // all options
                            $header = c.$headerIndexed[ column ].removeClass( 'filter-select' );
                            // don't build select if 'filter-false' or 'parser-false' set
                            noSelect = !( $header.hasClass( 'filter-false' ) || $header.hasClass( 'parser-false' ) );
                            options = '';
                            if ( fxn === true && noSelect ) {
                                tsf.buildSelect( table, column );
                            } else if ( typeof fxn === 'object' && noSelect ) {
                                // add custom drop down list
                                for ( string in fxn ) {
                                    if ( typeof string === 'string' ) {
                                        options += options === '' ?
                                            '<option value="">' +
                                            ( $header.data( 'placeholder' ) ||
                                                $header.attr( 'data-placeholder' ) ||
                                                wo.filter_placeholder.select ||
                                                ''
                                            ) +
                                            '</option>' : '';
                                        val = string;
                                        txt = string;
                                        if ( string.indexOf( wo.filter_selectSourceSeparator ) >= 0 ) {
                                            val = string.split( wo.filter_selectSourceSeparator );
                                            txt = val[1];
                                            val = val[0];
                                        }
                                        options += '<option ' +
                                            ( txt === val ? '' : 'data-function-name="' + string + '" ' ) +
                                            'value="' + val + '">' + txt + '</option>';
                                    }
                                }
                                c.$table
                                    .find( 'thead' )
                                    .find( 'select.' + tscss.filter + '[data-column="' + column + '"]' )
                                    .append( options );
                                txt = wo.filter_selectSource;
                                fxn = typeof txt === 'function' ? true : ts.getColumnData( table, txt, column );
                                if ( fxn ) {
                                    // updating so the extra options are appended
                                    tsf.buildSelect( c.table, column, '', true, $header.hasClass( wo.filter_onlyAvail ) );
                                }
                            }
                        }
                    }
                }
                // not really updating, but if the column has both the 'filter-select' class &
                // filter_functions set to true, it would append the same options twice.
                tsf.buildDefault( table, true );

                tsf.bindSearch( table, c.$table.find( '.' + tscss.filter ), true );
                if ( wo.filter_external ) {
                    tsf.bindSearch( table, wo.filter_external );
                }

                if ( wo.filter_hideFilters ) {
                    tsf.hideFilters( c );
                }

                // show processing icon
                if ( c.showProcessing ) {
                    txt = 'filterStart filterEnd '.split( ' ' ).join( c.namespace + 'filter-sp ' );
                    c.$table
                        .unbind( txt.replace( ts.regex.spaces, ' ' ) )
                        .bind( txt, function( event, columns ) {
                            // only add processing to certain columns to all columns
                            $header = ( columns ) ?
                                c.$table
                                    .find( '.' + tscss.header )
                                    .filter( '[data-column]' )
                                    .filter( function() {
                                        return columns[ $( this ).data( 'column' ) ] !== '';
                                    }) : '';
                            ts.isProcessing( table, event.type === 'filterStart', columns ? $header : '' );
                        });
                }

                // set filtered rows count ( intially unfiltered )
                c.filteredRows = c.totalRows;

                // add default values
                txt = 'tablesorter-initialized pagerBeforeInitialized '.split( ' ' ).join( c.namespace + 'filter ' );
                c.$table
                    .unbind( txt.replace( ts.regex.spaces, ' ' ) )
                    .bind( txt, function() {
                        tsf.completeInit( this );
                    });
                // if filter widget is added after pager has initialized; then set filter init flag
                if ( c.pager && c.pager.initialized && !wo.filter_initialized ) {
                    c.$table.triggerHandler( 'filterFomatterUpdate' );
                    setTimeout( function() {
                        tsf.filterInitComplete( c );
                    }, 100 );
                } else if ( !wo.filter_initialized ) {
                    tsf.completeInit( table );
                }
            },
            completeInit: function( table ) {
                // redefine 'c' & 'wo' so they update properly inside this callback
                var c = table.config,
                    wo = c.widgetOptions,
                    filters = tsf.setDefaults( table, c, wo ) || [];
                if ( filters.length ) {
                    // prevent delayInit from triggering a cache build if filters are empty
                    if ( !( c.delayInit && filters.join( '' ) === '' ) ) {
                        ts.setFilters( table, filters, true );
                    }
                }
                c.$table.triggerHandler( 'filterFomatterUpdate' );
                // trigger init after setTimeout to prevent multiple filterStart/End/Init triggers
                setTimeout( function() {
                    if ( !wo.filter_initialized ) {
                        tsf.filterInitComplete( c );
                    }
                }, 100 );
            },

            // $cell parameter, but not the config, is passed to the filter_formatters,
            // so we have to work with it instead
            formatterUpdated: function( $cell, column ) {
                // prevent error if $cell is undefined - see #1056
                var $table = $cell && $cell.closest( 'table' );
                var config = $table.length && $table[0].config,
                    wo = config && config.widgetOptions;
                if ( wo && !wo.filter_initialized ) {
                    // add updates by column since this function
                    // may be called numerous times before initialization
                    wo.filter_formatterInit[ column ] = 1;
                }
            },
            filterInitComplete: function( c ) {
                var indx, len,
                    wo = c.widgetOptions,
                    count = 0,
                    completed = function() {
                        wo.filter_initialized = true;
                        // update lastSearch - it gets cleared often
                        c.lastSearch = c.$table.data( 'lastSearch' );
                        c.$table.triggerHandler( 'filterInit', c );
                        tsf.findRows( c.table, c.lastSearch || [] );
                        if (ts.debug(c, 'filter')) {
                            console.log('Filter >> Widget initialized');
                        }
                    };
                if ( $.isEmptyObject( wo.filter_formatter ) ) {
                    completed();
                } else {
                    len = wo.filter_formatterInit.length;
                    for ( indx = 0; indx < len; indx++ ) {
                        if ( wo.filter_formatterInit[ indx ] === 1 ) {
                            count++;
                        }
                    }
                    clearTimeout( wo.filter_initTimer );
                    if ( !wo.filter_initialized && count === wo.filter_formatterCount ) {
                        // filter widget initialized
                        completed();
                    } else if ( !wo.filter_initialized ) {
                        // fall back in case a filter_formatter doesn't call
                        // $.tablesorter.filter.formatterUpdated( $cell, column ), and the count is off
                        wo.filter_initTimer = setTimeout( function() {
                            completed();
                        }, 500 );
                    }
                }
            },
            // encode or decode filters for storage; see #1026
            processFilters: function( filters, encode ) {
                var indx,
                    // fixes #1237; previously returning an encoded "filters" value
                    result = [],
                    mode = encode ? encodeURIComponent : decodeURIComponent,
                    len = filters.length;
                for ( indx = 0; indx < len; indx++ ) {
                    if ( filters[ indx ] ) {
                        result[ indx ] = mode( filters[ indx ] );
                    }
                }
                return result;
            },
            setDefaults: function( table, c, wo ) {
                var isArray, saved, indx, col, $filters,
                    // get current ( default ) filters
                    filters = ts.getFilters( table ) || [];
                if ( wo.filter_saveFilters && ts.storage ) {
                    saved = ts.storage( table, 'tablesorter-filters' ) || [];
                    isArray = $.isArray( saved );
                    // make sure we're not just getting an empty array
                    if ( !( isArray && saved.join( '' ) === '' || !isArray ) ) {
                        filters = tsf.processFilters( saved );
                    }
                }
                // if no filters saved, then check default settings
                if ( filters.join( '' ) === '' ) {
                    // allow adding default setting to external filters
                    $filters = c.$headers.add( wo.filter_$externalFilters )
                        .filter( '[' + wo.filter_defaultAttrib + ']' );
                    for ( indx = 0; indx <= c.columns; indx++ ) {
                        // include data-column='all' external filters
                        col = indx === c.columns ? 'all' : indx;
                        filters[ indx ] = $filters
                            .filter( '[data-column="' + col + '"]' )
                            .attr( wo.filter_defaultAttrib ) || filters[indx] || '';
                    }
                }
                c.$table.data( 'lastSearch', filters );
                return filters;
            },
            parseFilter: function( c, filter, data, parsed ) {
                return parsed || data.parsed[ data.index ] ?
                    c.parsers[ data.index ].format( filter, c.table, [], data.index ) :
                    filter;
            },
            buildRow: function( table, c, wo ) {
                var $filter, col, column, $header, makeSelect, disabled, name, ffxn, tmp,
                    // c.columns defined in computeThIndexes()
                    cellFilter = wo.filter_cellFilter,
                    columns = c.columns,
                    arry = $.isArray( cellFilter ),
                    buildFilter = '<tr role="search" class="' + tscss.filterRow + ' ' + c.cssIgnoreRow + '">';
                for ( column = 0; column < columns; column++ ) {
                    if ( c.$headerIndexed[ column ].length ) {
                        // account for entire column set with colspan. See #1047
                        tmp = c.$headerIndexed[ column ] && c.$headerIndexed[ column ][0].colSpan || 0;
                        if ( tmp > 1 ) {
                            buildFilter += '<td data-column="' + column + '-' + ( column + tmp - 1 ) + '" colspan="' + tmp + '"';
                        } else {
                            buildFilter += '<td data-column="' + column + '"';
                        }
                        if ( arry ) {
                            buildFilter += ( cellFilter[ column ] ? ' class="' + cellFilter[ column ] + '"' : '' );
                        } else {
                            buildFilter += ( cellFilter !== '' ? ' class="' + cellFilter + '"' : '' );
                        }
                        buildFilter += '></td>';
                    }
                }
                c.$filters = $( buildFilter += '</tr>' )
                    .appendTo( c.$table.children( 'thead' ).eq( 0 ) )
                    .children( 'td' );
                // build each filter input
                for ( column = 0; column < columns; column++ ) {
                    disabled = false;
                    // assuming last cell of a column is the main column
                    $header = c.$headerIndexed[ column ];
                    if ( $header && $header.length ) {
                        // $filter = c.$filters.filter( '[data-column="' + column + '"]' );
                        $filter = tsf.getColumnElm( c, c.$filters, column );
                        ffxn = ts.getColumnData( table, wo.filter_functions, column );
                        makeSelect = ( wo.filter_functions && ffxn && typeof ffxn !== 'function' ) ||
                            $header.hasClass( 'filter-select' );
                        // get data from jQuery data, metadata, headers option or header class name
                        col = ts.getColumnData( table, c.headers, column );
                        disabled = ts.getData( $header[0], col, 'filter' ) === 'false' ||
                            ts.getData( $header[0], col, 'parser' ) === 'false';

                        if ( makeSelect ) {
                            buildFilter = $( '<select>' ).appendTo( $filter );
                        } else {
                            ffxn = ts.getColumnData( table, wo.filter_formatter, column );
                            if ( ffxn ) {
                                wo.filter_formatterCount++;
                                buildFilter = ffxn( $filter, column );
                                // no element returned, so lets go find it
                                if ( buildFilter && buildFilter.length === 0 ) {
                                    buildFilter = $filter.children( 'input' );
                                }
                                // element not in DOM, so lets attach it
                                if ( buildFilter && ( buildFilter.parent().length === 0 ||
                                    ( buildFilter.parent().length && buildFilter.parent()[0] !== $filter[0] ) ) ) {
                                    $filter.append( buildFilter );
                                }
                            } else {
                                buildFilter = $( '<input type="search">' ).appendTo( $filter );
                            }
                            if ( buildFilter ) {
                                tmp = $header.data( 'placeholder' ) ||
                                    $header.attr( 'data-placeholder' ) ||
                                    wo.filter_placeholder.search || '';
                                buildFilter.attr( 'placeholder', tmp );
                            }
                        }
                        if ( buildFilter ) {
                            // add filter class name
                            name = ( $.isArray( wo.filter_cssFilter ) ?
                                ( typeof wo.filter_cssFilter[column] !== 'undefined' ? wo.filter_cssFilter[column] || '' : '' ) :
                                wo.filter_cssFilter ) || '';
                            // copy data-column from table cell (it will include colspan)
                            buildFilter.addClass( tscss.filter + ' ' + name );
                            name = wo.filter_filterLabel;
                            tmp = name.match(/{{([^}]+?)}}/g);
                            if (!tmp) {
                                tmp = [ '{{label}}' ];
                            }
                            $.each(tmp, function(indx, attr) {
                                var regex = new RegExp(attr, 'g'),
                                    data = $header.attr('data-' + attr.replace(/{{|}}/g, '')),
                                    text = typeof data === 'undefined' ? $header.text() : data;
                                name = name.replace( regex, $.trim( text ) );
                            });
                            buildFilter.attr({
                                'data-column': $filter.attr( 'data-column' ),
                                'aria-label': name
                            });
                            if ( disabled ) {
                                buildFilter.attr( 'placeholder', '' ).addClass( tscss.filterDisabled )[0].disabled = true;
                            }
                        }
                    }
                }
            },
            bindSearch: function( table, $el, internal ) {
                table = $( table )[0];
                $el = $( $el ); // allow passing a selector string
                if ( !$el.length ) { return; }
                var tmp,
                    c = table.config,
                    wo = c.widgetOptions,
                    namespace = c.namespace + 'filter',
                    $ext = wo.filter_$externalFilters;
                if ( internal !== true ) {
                    // save anyMatch element
                    tmp = wo.filter_anyColumnSelector + ',' + wo.filter_multipleColumnSelector;
                    wo.filter_$anyMatch = $el.filter( tmp );
                    if ( $ext && $ext.length ) {
                        wo.filter_$externalFilters = wo.filter_$externalFilters.add( $el );
                    } else {
                        wo.filter_$externalFilters = $el;
                    }
                    // update values ( external filters added after table initialization )
                    ts.setFilters( table, c.$table.data( 'lastSearch' ) || [], internal === false );
                }
                // unbind events
                tmp = ( 'keypress keyup keydown search change input '.split( ' ' ).join( namespace + ' ' ) );
                $el
                // use data attribute instead of jQuery data since the head is cloned without including
                // the data/binding
                    .attr( 'data-lastSearchTime', new Date().getTime() )
                    .unbind( tmp.replace( ts.regex.spaces, ' ' ) )
                    .bind( 'keydown' + namespace, function( event ) {
                        if ( event.which === tskeyCodes.escape && !table.config.widgetOptions.filter_resetOnEsc ) {
                            // prevent keypress event
                            return false;
                        }
                    })
                    .bind( 'keyup' + namespace, function( event ) {
                        wo = table.config.widgetOptions; // make sure "wo" isn't cached
                        var column = parseInt( $( this ).attr( 'data-column' ), 10 ),
                            liveSearch = typeof wo.filter_liveSearch === 'boolean' ? wo.filter_liveSearch :
                                ts.getColumnData( table, wo.filter_liveSearch, column );
                        if ( typeof liveSearch === 'undefined' ) {
                            liveSearch = wo.filter_liveSearch.fallback || false;
                        }
                        $( this ).attr( 'data-lastSearchTime', new Date().getTime() );
                        // emulate what webkit does.... escape clears the filter
                        if ( event.which === tskeyCodes.escape ) {
                            // make sure to restore the last value on escape
                            this.value = wo.filter_resetOnEsc ? '' : c.lastSearch[column];
                            // don't return if the search value is empty ( all rows need to be revealed )
                        } else if ( this.value !== '' && (
                            // liveSearch can contain a min value length; ignore arrow and meta keys, but allow backspace
                            ( typeof liveSearch === 'number' && this.value.length < liveSearch ) ||
                            // let return & backspace continue on, but ignore arrows & non-valid characters
                            ( event.which !== tskeyCodes.enter && event.which !== tskeyCodes.backSpace &&
                                ( event.which < tskeyCodes.space || ( event.which >= tskeyCodes.left && event.which <= tskeyCodes.down ) ) ) ) ) {
                            return;
                            // live search
                        } else if ( liveSearch === false ) {
                            if ( this.value !== '' && event.which !== tskeyCodes.enter ) {
                                return;
                            }
                        }
                        // change event = no delay; last true flag tells getFilters to skip newest timed input
                        tsf.searching( table, true, true, column );
                    })
                    // include change for select - fixes #473
                    .bind( 'search change keypress input blur '.split( ' ' ).join( namespace + ' ' ), function( event ) {
                        // don't get cached data, in case data-column changes dynamically
                        var column = parseInt( $( this ).attr( 'data-column' ), 10 ),
                            eventType = event.type,
                            liveSearch = typeof wo.filter_liveSearch === 'boolean' ?
                                wo.filter_liveSearch :
                                ts.getColumnData( table, wo.filter_liveSearch, column );
                        if ( table.config.widgetOptions.filter_initialized &&
                            // immediate search if user presses enter
                            ( event.which === tskeyCodes.enter ||
                                // immediate search if a "search" or "blur" is triggered on the input
                                ( eventType === 'search' || eventType === 'blur' ) ||
                                // change & input events must be ignored if liveSearch !== true
                                ( eventType === 'change' || eventType === 'input' ) &&
                                // prevent search if liveSearch is a number
                                ( liveSearch === true || liveSearch !== true && event.target.nodeName !== 'INPUT' ) &&
                                // don't allow 'change' or 'input' event to process if the input value
                                // is the same - fixes #685
                                this.value !== c.lastSearch[column]
                            )
                        ) {
                            event.preventDefault();
                            // init search with no delay
                            $( this ).attr( 'data-lastSearchTime', new Date().getTime() );
                            tsf.searching( table, eventType !== 'keypress', true, column );
                        }
                    });
            },
            searching: function( table, filter, skipFirst, column ) {
                var liveSearch,
                    wo = table.config.widgetOptions;
                if (typeof column === 'undefined') {
                    // no delay
                    liveSearch = false;
                } else {
                    liveSearch = typeof wo.filter_liveSearch === 'boolean' ?
                        wo.filter_liveSearch :
                        // get column setting, or set to fallback value, or default to false
                        ts.getColumnData( table, wo.filter_liveSearch, column );
                    if ( typeof liveSearch === 'undefined' ) {
                        liveSearch = wo.filter_liveSearch.fallback || false;
                    }
                }
                clearTimeout( wo.filter_searchTimer );
                if ( typeof filter === 'undefined' || filter === true ) {
                    // delay filtering
                    wo.filter_searchTimer = setTimeout( function() {
                        tsf.checkFilters( table, filter, skipFirst );
                    }, liveSearch ? wo.filter_searchDelay : 10 );
                } else {
                    // skip delay
                    tsf.checkFilters( table, filter, skipFirst );
                }
            },
            equalFilters: function (c, filter1, filter2) {
                var indx,
                    f1 = [],
                    f2 = [],
                    len = c.columns + 1; // add one to include anyMatch filter
                filter1 = $.isArray(filter1) ? filter1 : [];
                filter2 = $.isArray(filter2) ? filter2 : [];
                for (indx = 0; indx < len; indx++) {
                    f1[indx] = filter1[indx] || '';
                    f2[indx] = filter2[indx] || '';
                }
                return f1.join(',') === f2.join(',');
            },
            checkFilters: function( table, filter, skipFirst ) {
                var c = table.config,
                    wo = c.widgetOptions,
                    filterArray = $.isArray( filter ),
                    filters = ( filterArray ) ? filter : ts.getFilters( table, true ),
                    currentFilters = filters || []; // current filter values
                // prevent errors if delay init is set
                if ( $.isEmptyObject( c.cache ) ) {
                    // update cache if delayInit set & pager has initialized ( after user initiates a search )
                    if ( c.delayInit && ( !c.pager || c.pager && c.pager.initialized ) ) {
                        ts.updateCache( c, function() {
                            tsf.checkFilters( table, false, skipFirst );
                        });
                    }
                    return;
                }
                // add filter array back into inputs
                if ( filterArray ) {
                    ts.setFilters( table, filters, false, skipFirst !== true );
                    if ( !wo.filter_initialized ) {
                        c.lastSearch = [];
                        c.lastCombinedFilter = '';
                    }
                }
                if ( wo.filter_hideFilters ) {
                    // show/hide filter row as needed
                    c.$table
                        .find( '.' + tscss.filterRow )
                        .triggerHandler( tsf.hideFiltersCheck( c ) ? 'mouseleave' : 'mouseenter' );
                }
                // return if the last search is the same; but filter === false when updating the search
                // see example-widget-filter.html filter toggle buttons
                if ( tsf.equalFilters(c, c.lastSearch, currentFilters) && filter !== false ) {
                    return;
                } else if ( filter === false ) {
                    // force filter refresh
                    c.lastCombinedFilter = '';
                    c.lastSearch = [];
                }
                // define filter inside it is false
                filters = filters || [];
                // convert filters to strings - see #1070
                filters = Array.prototype.map ?
                    filters.map( String ) :
                    // for IE8 & older browsers - maybe not the best method
                    filters.join( '\ufffd' ).split( '\ufffd' );

                if ( wo.filter_initialized ) {
                    c.$table.triggerHandler( 'filterStart', [ filters ] );
                }
                if ( c.showProcessing ) {
                    // give it time for the processing icon to kick in
                    setTimeout( function() {
                        tsf.findRows( table, filters, currentFilters );
                        return false;
                    }, 30 );
                } else {
                    tsf.findRows( table, filters, currentFilters );
                    return false;
                }
            },
            hideFiltersCheck: function( c ) {
                if (typeof c.widgetOptions.filter_hideFilters === 'function') {
                    var val = c.widgetOptions.filter_hideFilters( c );
                    if (typeof val === 'boolean') {
                        return val;
                    }
                }
                return ts.getFilters( c.$table ).join( '' ) === '';
            },
            hideFilters: function( c, $table ) {
                var timer;
                ( $table || c.$table )
                    .find( '.' + tscss.filterRow )
                    .addClass( tscss.filterRowHide )
                    .bind( 'mouseenter mouseleave', function( e ) {
                        // save event object - http://bugs.jquery.com/ticket/12140
                        var event = e,
                            $row = $( this );
                        clearTimeout( timer );
                        timer = setTimeout( function() {
                            if ( /enter|over/.test( event.type ) ) {
                                $row.removeClass( tscss.filterRowHide );
                            } else {
                                // don't hide if input has focus
                                // $( ':focus' ) needs jQuery 1.6+
                                if ( $( document.activeElement ).closest( 'tr' )[0] !== $row[0] ) {
                                    // don't hide row if any filter has a value
                                    $row.toggleClass( tscss.filterRowHide, tsf.hideFiltersCheck( c ) );
                                }
                            }
                        }, 200 );
                    })
                    .find( 'input, select' ).bind( 'focus blur', function( e ) {
                    var event = e,
                        $row = $( this ).closest( 'tr' );
                    clearTimeout( timer );
                    timer = setTimeout( function() {
                        clearTimeout( timer );
                        // don't hide row if any filter has a value
                        $row.toggleClass( tscss.filterRowHide, tsf.hideFiltersCheck( c ) && event.type !== 'focus' );
                    }, 200 );
                });
            },
            defaultFilter: function( filter, mask ) {
                if ( filter === '' ) { return filter; }
                var regex = tsfRegex.iQuery,
                    maskLen = mask.match( tsfRegex.igQuery ).length,
                    query = maskLen > 1 ? $.trim( filter ).split( /\s/ ) : [ $.trim( filter ) ],
                    len = query.length - 1,
                    indx = 0,
                    val = mask;
                if ( len < 1 && maskLen > 1 ) {
                    // only one 'word' in query but mask has >1 slots
                    query[1] = query[0];
                }
                // replace all {query} with query words...
                // if query = 'Bob', then convert mask from '!{query}' to '!Bob'
                // if query = 'Bob Joe Frank', then convert mask '{q} OR {q}' to 'Bob OR Joe OR Frank'
                while ( regex.test( val ) ) {
                    val = val.replace( regex, query[indx++] || '' );
                    if ( regex.test( val ) && indx < len && ( query[indx] || '' ) !== '' ) {
                        val = mask.replace( regex, val );
                    }
                }
                return val;
            },
            getLatestSearch: function( $input ) {
                if ( $input ) {
                    return $input.sort( function( a, b ) {
                        return $( b ).attr( 'data-lastSearchTime' ) - $( a ).attr( 'data-lastSearchTime' );
                    });
                }
                return $input || $();
            },
            findRange: function( c, val, ignoreRanges ) {
                // look for multiple columns '1-3,4-6,8' in data-column
                var temp, ranges, range, start, end, singles, i, indx, len,
                    columns = [];
                if ( /^[0-9]+$/.test( val ) ) {
                    // always return an array
                    return [ parseInt( val, 10 ) ];
                }
                // process column range
                if ( !ignoreRanges && /-/.test( val ) ) {
                    ranges = val.match( /(\d+)\s*-\s*(\d+)/g );
                    len = ranges ? ranges.length : 0;
                    for ( indx = 0; indx < len; indx++ ) {
                        range = ranges[indx].split( /\s*-\s*/ );
                        start = parseInt( range[0], 10 ) || 0;
                        end = parseInt( range[1], 10 ) || ( c.columns - 1 );
                        if ( start > end ) {
                            temp = start; start = end; end = temp; // swap
                        }
                        if ( end >= c.columns ) {
                            end = c.columns - 1;
                        }
                        for ( ; start <= end; start++ ) {
                            columns[ columns.length ] = start;
                        }
                        // remove processed range from val
                        val = val.replace( ranges[ indx ], '' );
                    }
                }
                // process single columns
                if ( !ignoreRanges && /,/.test( val ) ) {
                    singles = val.split( /\s*,\s*/ );
                    len = singles.length;
                    for ( i = 0; i < len; i++ ) {
                        if ( singles[ i ] !== '' ) {
                            indx = parseInt( singles[ i ], 10 );
                            if ( indx < c.columns ) {
                                columns[ columns.length ] = indx;
                            }
                        }
                    }
                }
                // return all columns
                if ( !columns.length ) {
                    for ( indx = 0; indx < c.columns; indx++ ) {
                        columns[ columns.length ] = indx;
                    }
                }
                return columns;
            },
            getColumnElm: function( c, $elements, column ) {
                // data-column may contain multiple columns '1-3,5-6,8'
                // replaces: c.$filters.filter( '[data-column="' + column + '"]' );
                return $elements.filter( function() {
                    var cols = tsf.findRange( c, $( this ).attr( 'data-column' ) );
                    return $.inArray( column, cols ) > -1;
                });
            },
            multipleColumns: function( c, $input ) {
                // look for multiple columns '1-3,4-6,8' in data-column
                var wo = c.widgetOptions,
                    // only target 'all' column inputs on initialization
                    // & don't target 'all' column inputs if they don't exist
                    targets = wo.filter_initialized || !$input.filter( wo.filter_anyColumnSelector ).length,
                    val = $.trim( tsf.getLatestSearch( $input ).attr( 'data-column' ) || '' );
                return tsf.findRange( c, val, !targets );
            },
            processTypes: function( c, data, vars ) {
                var ffxn,
                    filterMatched = null,
                    matches = null;
                for ( ffxn in tsf.types ) {
                    if ( $.inArray( ffxn, vars.excludeMatch ) < 0 && matches === null ) {
                        matches = tsf.types[ffxn]( c, data, vars );
                        if ( matches !== null ) {
                            data.matchedOn = ffxn;
                            filterMatched = matches;
                        }
                    }
                }
                return filterMatched;
            },
            matchType: function( c, columnIndex ) {
                var isMatch,
                    wo = c.widgetOptions,
                    $el = c.$headerIndexed[ columnIndex ];
                // filter-exact > filter-match > filter_matchType for type
                if ( $el.hasClass( 'filter-exact' ) ) {
                    isMatch = false;
                } else if ( $el.hasClass( 'filter-match' ) ) {
                    isMatch = true;
                } else {
                    // filter-select is not applied when filter_functions are used, so look for a select
                    if ( wo.filter_columnFilters ) {
                        $el = c.$filters
                            .find( '.' + tscss.filter )
                            .add( wo.filter_$externalFilters )
                            .filter( '[data-column="' + columnIndex + '"]' );
                    } else if ( wo.filter_$externalFilters ) {
                        $el = wo.filter_$externalFilters.filter( '[data-column="' + columnIndex + '"]' );
                    }
                    isMatch = $el.length ?
                        c.widgetOptions.filter_matchType[ ( $el[ 0 ].nodeName || '' ).toLowerCase() ] === 'match' :
                        // default to exact, if no inputs found
                        false;
                }
                return isMatch;
            },
            processRow: function( c, data, vars ) {
                var result, filterMatched,
                    fxn, ffxn, txt,
                    wo = c.widgetOptions,
                    showRow = true,
                    hasAnyMatchInput = wo.filter_$anyMatch && wo.filter_$anyMatch.length,

                    // if wo.filter_$anyMatch data-column attribute is changed dynamically
                    // we don't want to do an "anyMatch" search on one column using data
                    // for the entire row - see #998
                    columnIndex = wo.filter_$anyMatch && wo.filter_$anyMatch.length ?
                        // look for multiple columns '1-3,4-6,8'
                        tsf.multipleColumns( c, wo.filter_$anyMatch ) :
                        [];
                data.$cells = data.$row.children();
                data.matchedOn = null;
                if ( data.anyMatchFlag && columnIndex.length > 1 || ( data.anyMatchFilter && !hasAnyMatchInput ) ) {
                    data.anyMatch = true;
                    data.isMatch = true;
                    data.rowArray = data.$cells.map( function( i ) {
                        if ( $.inArray( i, columnIndex ) > -1 || ( data.anyMatchFilter && !hasAnyMatchInput ) ) {
                            if ( data.parsed[ i ] ) {
                                txt = data.cacheArray[ i ];
                            } else {
                                txt = data.rawArray[ i ];
                                txt = $.trim( wo.filter_ignoreCase ? txt.toLowerCase() : txt );
                                if ( c.sortLocaleCompare ) {
                                    txt = ts.replaceAccents( txt );
                                }
                            }
                            return txt;
                        }
                    }).get();
                    data.filter = data.anyMatchFilter;
                    data.iFilter = data.iAnyMatchFilter;
                    data.exact = data.rowArray.join( ' ' );
                    data.iExact = wo.filter_ignoreCase ? data.exact.toLowerCase() : data.exact;
                    data.cache = data.cacheArray.slice( 0, -1 ).join( ' ' );
                    vars.excludeMatch = vars.noAnyMatch;
                    filterMatched = tsf.processTypes( c, data, vars );
                    if ( filterMatched !== null ) {
                        showRow = filterMatched;
                    } else {
                        if ( wo.filter_startsWith ) {
                            showRow = false;
                            // data.rowArray may not contain all columns
                            columnIndex = Math.min( c.columns, data.rowArray.length );
                            while ( !showRow && columnIndex > 0 ) {
                                columnIndex--;
                                showRow = showRow || data.rowArray[ columnIndex ].indexOf( data.iFilter ) === 0;
                            }
                        } else {
                            showRow = ( data.iExact + data.childRowText ).indexOf( data.iFilter ) >= 0;
                        }
                    }
                    data.anyMatch = false;
                    // no other filters to process
                    if ( data.filters.join( '' ) === data.filter ) {
                        return showRow;
                    }
                }

                for ( columnIndex = 0; columnIndex < c.columns; columnIndex++ ) {
                    data.filter = data.filters[ columnIndex ];
                    data.index = columnIndex;

                    // filter types to exclude, per column
                    vars.excludeMatch = vars.excludeFilter[ columnIndex ];

                    // ignore if filter is empty or disabled
                    if ( data.filter ) {
                        data.cache = data.cacheArray[ columnIndex ];
                        result = data.parsed[ columnIndex ] ? data.cache : data.rawArray[ columnIndex ] || '';
                        data.exact = c.sortLocaleCompare ? ts.replaceAccents( result ) : result; // issue #405
                        data.iExact = !tsfRegex.type.test( typeof data.exact ) && wo.filter_ignoreCase ?
                            data.exact.toLowerCase() : data.exact;
                        data.isMatch = tsf.matchType( c, columnIndex );

                        result = showRow; // if showRow is true, show that row

                        // in case select filter option has a different value vs text 'a - z|A through Z'
                        ffxn = wo.filter_columnFilters ?
                            c.$filters.add( wo.filter_$externalFilters )
                                .filter( '[data-column="' + columnIndex + '"]' )
                                .find( 'select option:selected' )
                                .attr( 'data-function-name' ) || '' : '';
                        // replace accents - see #357
                        if ( c.sortLocaleCompare ) {
                            data.filter = ts.replaceAccents( data.filter );
                        }

                        // replace column specific default filters - see #1088
                        if ( wo.filter_defaultFilter && tsfRegex.iQuery.test( vars.defaultColFilter[ columnIndex ] ) ) {
                            data.filter = tsf.defaultFilter( data.filter, vars.defaultColFilter[ columnIndex ] );
                        }

                        // data.iFilter = case insensitive ( if wo.filter_ignoreCase is true ),
                        // data.filter = case sensitive
                        data.iFilter = wo.filter_ignoreCase ? ( data.filter || '' ).toLowerCase() : data.filter;
                        fxn = vars.functions[ columnIndex ];
                        filterMatched = null;
                        if ( fxn ) {
                            if ( typeof fxn === 'function' ) {
                                // filter callback( exact cell content, parser normalized content,
                                // filter input value, column index, jQuery row object )
                                filterMatched = fxn( data.exact, data.cache, data.filter, columnIndex, data.$row, c, data );
                            } else if ( typeof fxn[ ffxn || data.filter ] === 'function' ) {
                                // selector option function
                                txt = ffxn || data.filter;
                                filterMatched =
                                    fxn[ txt ]( data.exact, data.cache, data.filter, columnIndex, data.$row, c, data );
                            }
                        }
                        if ( filterMatched === null ) {
                            // cycle through the different filters
                            // filters return a boolean or null if nothing matches
                            filterMatched = tsf.processTypes( c, data, vars );
                            // select with exact match; ignore "and" or "or" within the text; fixes #1486
                            txt = fxn === true && (data.matchedOn === 'and' || data.matchedOn === 'or');
                            if ( filterMatched !== null && !txt) {
                                result = filterMatched;
                                // Look for match, and add child row data for matching
                            } else {
                                // check fxn (filter-select in header) after filter types are checked
                                // without this, the filter + jQuery UI selectmenu demo was breaking
                                if ( fxn === true ) {
                                    // default selector uses exact match unless 'filter-match' class is found
                                    result = data.isMatch ?
                                        // data.iExact may be a number
                                        ( '' + data.iExact ).search( data.iFilter ) >= 0 :
                                        data.filter === data.exact;
                                } else {
                                    txt = ( data.iExact + data.childRowText ).indexOf( tsf.parseFilter( c, data.iFilter, data ) );
                                    result = ( ( !wo.filter_startsWith && txt >= 0 ) || ( wo.filter_startsWith && txt === 0 ) );
                                }
                            }
                        } else {
                            result = filterMatched;
                        }
                        showRow = ( result ) ? showRow : false;
                    }
                }
                return showRow;
            },
            findRows: function( table, filters, currentFilters ) {
                if (
                    tsf.equalFilters(table.config, table.config.lastSearch, currentFilters) ||
                    !table.config.widgetOptions.filter_initialized
                ) {
                    return;
                }
                var len, norm_rows, rowData, $rows, $row, rowIndex, tbodyIndex, $tbody, columnIndex,
                    isChild, childRow, lastSearch, showRow, showParent, time, val, indx,
                    notFiltered, searchFiltered, query, injected, res, id, txt,
                    storedFilters = $.extend( [], filters ),
                    c = table.config,
                    wo = c.widgetOptions,
                    debug = ts.debug(c, 'filter'),
                    // data object passed to filters; anyMatch is a flag for the filters
                    data = {
                        anyMatch: false,
                        filters: filters,
                        // regex filter type cache
                        filter_regexCache : []
                    },
                    vars = {
                        // anyMatch really screws up with these types of filters
                        noAnyMatch: [ 'range',  'operators' ],
                        // cache filter variables that use ts.getColumnData in the main loop
                        functions : [],
                        excludeFilter : [],
                        defaultColFilter : [],
                        defaultAnyFilter : ts.getColumnData( table, wo.filter_defaultFilter, c.columns, true ) || ''
                    };
                // parse columns after formatter, in case the class is added at that point
                data.parsed = [];
                for ( columnIndex = 0; columnIndex < c.columns; columnIndex++ ) {
                    data.parsed[ columnIndex ] = wo.filter_useParsedData ||
                        // parser has a "parsed" parameter
                        ( c.parsers && c.parsers[ columnIndex ] && c.parsers[ columnIndex ].parsed ||
                            // getData may not return 'parsed' if other 'filter-' class names exist
                            // ( e.g. <th class="filter-select filter-parsed"> )
                            ts.getData && ts.getData( c.$headerIndexed[ columnIndex ],
                                ts.getColumnData( table, c.headers, columnIndex ), 'filter' ) === 'parsed' ||
                            c.$headerIndexed[ columnIndex ].hasClass( 'filter-parsed' ) );

                    vars.functions[ columnIndex ] =
                        ts.getColumnData( table, wo.filter_functions, columnIndex ) ||
                        c.$headerIndexed[ columnIndex ].hasClass( 'filter-select' );
                    vars.defaultColFilter[ columnIndex ] =
                        ts.getColumnData( table, wo.filter_defaultFilter, columnIndex ) || '';
                    vars.excludeFilter[ columnIndex ] =
                        ( ts.getColumnData( table, wo.filter_excludeFilter, columnIndex, true ) || '' ).split( /\s+/ );
                }

                if ( debug ) {
                    console.log( 'Filter >> Starting filter widget search', filters );
                    time = new Date();
                }
                // filtered rows count
                c.filteredRows = 0;
                c.totalRows = 0;
                currentFilters = ( storedFilters || [] );

                for ( tbodyIndex = 0; tbodyIndex < c.$tbodies.length; tbodyIndex++ ) {
                    $tbody = ts.processTbody( table, c.$tbodies.eq( tbodyIndex ), true );
                    // skip child rows & widget added ( removable ) rows - fixes #448 thanks to @hempel!
                    // $rows = $tbody.children( 'tr' ).not( c.selectorRemove );
                    columnIndex = c.columns;
                    // convert stored rows into a jQuery object
                    norm_rows = c.cache[ tbodyIndex ].normalized;
                    $rows = $( $.map( norm_rows, function( el ) {
                        return el[ columnIndex ].$row.get();
                    }) );

                    if ( currentFilters.join('') === '' || wo.filter_serversideFiltering ) {
                        $rows
                            .removeClass( wo.filter_filteredRow )
                            .not( '.' + c.cssChildRow )
                            .css( 'display', '' );
                    } else {
                        // filter out child rows
                        $rows = $rows.not( '.' + c.cssChildRow );
                        len = $rows.length;

                        if ( ( wo.filter_$anyMatch && wo.filter_$anyMatch.length ) ||
                            typeof filters[c.columns] !== 'undefined' ) {
                            data.anyMatchFlag = true;
                            data.anyMatchFilter = '' + (
                                filters[ c.columns ] ||
                                wo.filter_$anyMatch && tsf.getLatestSearch( wo.filter_$anyMatch ).val() ||
                                ''
                            );
                            if ( wo.filter_columnAnyMatch ) {
                                // specific columns search
                                query = data.anyMatchFilter.split( tsfRegex.andSplit );
                                injected = false;
                                for ( indx = 0; indx < query.length; indx++ ) {
                                    res = query[ indx ].split( ':' );
                                    if ( res.length > 1 ) {
                                        // make the column a one-based index ( non-developers start counting from one :P )
                                        if ( isNaN( res[0] ) ) {
                                            $.each( c.headerContent, function( i, txt ) {
                                                // multiple matches are possible
                                                if ( txt.toLowerCase().indexOf( res[0] ) > -1 ) {
                                                    id = i;
                                                    filters[ id ] = res[1];
                                                }
                                            });
                                        } else {
                                            id = parseInt( res[0], 10 ) - 1;
                                        }
                                        if ( id >= 0 && id < c.columns ) { // if id is an integer
                                            filters[ id ] = res[1];
                                            query.splice( indx, 1 );
                                            indx--;
                                            injected = true;
                                        }
                                    }
                                }
                                if ( injected ) {
                                    data.anyMatchFilter = query.join( ' && ' );
                                }
                            }
                        }

                        // optimize searching only through already filtered rows - see #313
                        searchFiltered = wo.filter_searchFiltered;
                        lastSearch = c.lastSearch || c.$table.data( 'lastSearch' ) || [];
                        if ( searchFiltered ) {
                            // cycle through all filters; include last ( columnIndex + 1 = match any column ). Fixes #669
                            for ( indx = 0; indx < columnIndex + 1; indx++ ) {
                                val = filters[indx] || '';
                                // break out of loop if we've already determined not to search filtered rows
                                if ( !searchFiltered ) { indx = columnIndex; }
                                // search already filtered rows if...
                                searchFiltered = searchFiltered && lastSearch.length &&
                                    // there are no changes from beginning of filter
                                    val.indexOf( lastSearch[indx] || '' ) === 0 &&
                                    // if there is NOT a logical 'or', or range ( 'to' or '-' ) in the string
                                    !tsfRegex.alreadyFiltered.test( val ) &&
                                    // if we are not doing exact matches, using '|' ( logical or ) or not '!'
                                    !tsfRegex.exactTest.test( val ) &&
                                    // don't search only filtered if the value is negative
                                    // ( '> -10' => '> -100' will ignore hidden rows )
                                    !( tsfRegex.isNeg1.test( val ) || tsfRegex.isNeg2.test( val ) ) &&
                                    // if filtering using a select without a 'filter-match' class ( exact match ) - fixes #593
                                    !( val !== '' && c.$filters && c.$filters.filter( '[data-column="' + indx + '"]' ).find( 'select' ).length &&
                                        !tsf.matchType( c, indx ) );
                            }
                        }
                        notFiltered = $rows.not( '.' + wo.filter_filteredRow ).length;
                        // can't search when all rows are hidden - this happens when looking for exact matches
                        if ( searchFiltered && notFiltered === 0 ) { searchFiltered = false; }
                        if ( debug ) {
                            console.log( 'Filter >> Searching through ' +
                                ( searchFiltered && notFiltered < len ? notFiltered : 'all' ) + ' rows' );
                        }
                        if ( data.anyMatchFlag ) {
                            if ( c.sortLocaleCompare ) {
                                // replace accents
                                data.anyMatchFilter = ts.replaceAccents( data.anyMatchFilter );
                            }
                            if ( wo.filter_defaultFilter && tsfRegex.iQuery.test( vars.defaultAnyFilter ) ) {
                                data.anyMatchFilter = tsf.defaultFilter( data.anyMatchFilter, vars.defaultAnyFilter );
                                // clear search filtered flag because default filters are not saved to the last search
                                searchFiltered = false;
                            }
                            // make iAnyMatchFilter lowercase unless both filter widget & core ignoreCase options are true
                            // when c.ignoreCase is true, the cache contains all lower case data
                            data.iAnyMatchFilter = !( wo.filter_ignoreCase && c.ignoreCase ) ?
                                data.anyMatchFilter :
                                data.anyMatchFilter.toLowerCase();
                        }

                        // loop through the rows
                        for ( rowIndex = 0; rowIndex < len; rowIndex++ ) {

                            txt = $rows[ rowIndex ].className;
                            // the first row can never be a child row
                            isChild = rowIndex && tsfRegex.child.test( txt );
                            // skip child rows & already filtered rows
                            if ( isChild || ( searchFiltered && tsfRegex.filtered.test( txt ) ) ) {
                                continue;
                            }

                            data.$row = $rows.eq( rowIndex );
                            data.rowIndex = rowIndex;
                            data.cacheArray = norm_rows[ rowIndex ];
                            rowData = data.cacheArray[ c.columns ];
                            data.rawArray = rowData.raw;
                            data.childRowText = '';

                            if ( !wo.filter_childByColumn ) {
                                txt = '';
                                // child row cached text
                                childRow = rowData.child;
                                // so, if 'table.config.widgetOptions.filter_childRows' is true and there is
                                // a match anywhere in the child row, then it will make the row visible
                                // checked here so the option can be changed dynamically
                                for ( indx = 0; indx < childRow.length; indx++ ) {
                                    txt += ' ' + childRow[indx].join( ' ' ) || '';
                                }
                                data.childRowText = wo.filter_childRows ?
                                    ( wo.filter_ignoreCase ? txt.toLowerCase() : txt ) :
                                    '';
                            }

                            showRow = false;
                            showParent = tsf.processRow( c, data, vars );
                            $row = rowData.$row;

                            // don't pass reference to val
                            val = showParent ? true : false;
                            childRow = rowData.$row.filter( ':gt(0)' );
                            if ( wo.filter_childRows && childRow.length ) {
                                if ( wo.filter_childByColumn ) {
                                    if ( !wo.filter_childWithSibs ) {
                                        // hide all child rows
                                        childRow.addClass( wo.filter_filteredRow );
                                        // if only showing resulting child row, only include parent
                                        $row = $row.eq( 0 );
                                    }
                                    // cycle through each child row
                                    for ( indx = 0; indx < childRow.length; indx++ ) {
                                        data.$row = childRow.eq( indx );
                                        data.cacheArray = rowData.child[ indx ];
                                        data.rawArray = data.cacheArray;
                                        val = tsf.processRow( c, data, vars );
                                        // use OR comparison on child rows
                                        showRow = showRow || val;
                                        if ( !wo.filter_childWithSibs && val ) {
                                            childRow.eq( indx ).removeClass( wo.filter_filteredRow );
                                        }
                                    }
                                }
                                // keep parent row match even if no child matches... see #1020
                                showRow = showRow || showParent;
                            } else {
                                showRow = val;
                            }
                            $row
                                .toggleClass( wo.filter_filteredRow, !showRow )[0]
                                .display = showRow ? '' : 'none';
                        }
                    }
                    c.filteredRows += $rows.not( '.' + wo.filter_filteredRow ).length;
                    c.totalRows += $rows.length;
                    ts.processTbody( table, $tbody, false );
                }
                // lastCombinedFilter is no longer used internally
                c.lastCombinedFilter = storedFilters.join(''); // save last search
                // don't save 'filters' directly since it may have altered ( AnyMatch column searches )
                c.lastSearch = storedFilters;
                c.$table.data( 'lastSearch', storedFilters );
                if ( wo.filter_saveFilters && ts.storage ) {
                    ts.storage( table, 'tablesorter-filters', tsf.processFilters( storedFilters, true ) );
                }
                if ( debug ) {
                    console.log( 'Filter >> Completed search' + ts.benchmark(time) );
                }
                if ( wo.filter_initialized ) {
                    c.$table.triggerHandler( 'filterBeforeEnd', c );
                    c.$table.triggerHandler( 'filterEnd', c );
                }
                setTimeout( function() {
                    ts.applyWidget( c.table ); // make sure zebra widget is applied
                }, 0 );
            },
            getOptionSource: function( table, column, onlyAvail ) {
                table = $( table )[0];
                var c = table.config,
                    wo = c.widgetOptions,
                    arry = false,
                    source = wo.filter_selectSource,
                    last = c.$table.data( 'lastSearch' ) || [],
                    fxn = typeof source === 'function' ? true : ts.getColumnData( table, source, column );

                if ( onlyAvail && last[column] !== '' ) {
                    onlyAvail = false;
                }

                // filter select source option
                if ( fxn === true ) {
                    // OVERALL source
                    arry = source( table, column, onlyAvail );
                } else if ( fxn instanceof $ || ( $.type( fxn ) === 'string' && fxn.indexOf( '</option>' ) >= 0 ) ) {
                    // selectSource is a jQuery object or string of options
                    return fxn;
                } else if ( $.isArray( fxn ) ) {
                    arry = fxn;
                } else if ( $.type( source ) === 'object' && fxn ) {
                    // custom select source function for a SPECIFIC COLUMN
                    arry = fxn( table, column, onlyAvail );
                    // abort - updating the selects from an external method
                    if (arry === null) {
                        return null;
                    }
                }
                if ( arry === false ) {
                    // fall back to original method
                    arry = tsf.getOptions( table, column, onlyAvail );
                }

                return tsf.processOptions( table, column, arry );

            },
            processOptions: function( table, column, arry ) {
                if ( !$.isArray( arry ) ) {
                    return false;
                }
                table = $( table )[0];
                var cts, txt, indx, len, parsedTxt, str,
                    c = table.config,
                    validColumn = typeof column !== 'undefined' && column !== null && column >= 0 && column < c.columns,
                    direction = validColumn ? c.$headerIndexed[ column ].hasClass( 'filter-select-sort-desc' ) : false,
                    parsed = [];
                // get unique elements and sort the list
                // if $.tablesorter.sortText exists ( not in the original tablesorter ),
                // then natural sort the list otherwise use a basic sort
                arry = $.grep( arry, function( value, indx ) {
                    if ( value.text ) {
                        return true;
                    }
                    return $.inArray( value, arry ) === indx;
                });
                if ( validColumn && c.$headerIndexed[ column ].hasClass( 'filter-select-nosort' ) ) {
                    // unsorted select options
                    return arry;
                } else {
                    len = arry.length;
                    // parse select option values
                    for ( indx = 0; indx < len; indx++ ) {
                        txt = arry[ indx ];
                        // check for object
                        str = txt.text ? txt.text : txt;
                        // sortNatural breaks if you don't pass it strings
                        parsedTxt = ( validColumn && c.parsers && c.parsers.length &&
                            c.parsers[ column ].format( str, table, [], column ) || str ).toString();
                        parsedTxt = c.widgetOptions.filter_ignoreCase ? parsedTxt.toLowerCase() : parsedTxt;
                        // parse array data using set column parser; this DOES NOT pass the original
                        // table cell to the parser format function
                        if ( txt.text ) {
                            txt.parsed = parsedTxt;
                            parsed[ parsed.length ] = txt;
                        } else {
                            parsed[ parsed.length ] = {
                                text : txt,
                                // check parser length - fixes #934
                                parsed : parsedTxt
                            };
                        }
                    }
                    // sort parsed select options
                    cts = c.textSorter || '';
                    parsed.sort( function( a, b ) {
                        var x = direction ? b.parsed : a.parsed,
                            y = direction ? a.parsed : b.parsed;
                        if ( validColumn && typeof cts === 'function' ) {
                            // custom OVERALL text sorter
                            return cts( x, y, true, column, table );
                        } else if ( validColumn && typeof cts === 'object' && cts.hasOwnProperty( column ) ) {
                            // custom text sorter for a SPECIFIC COLUMN
                            return cts[column]( x, y, true, column, table );
                        } else if ( ts.sortNatural ) {
                            // fall back to natural sort
                            return ts.sortNatural( x, y );
                        }
                        // using an older version! do a basic sort
                        return true;
                    });
                    // rebuild arry from sorted parsed data
                    arry = [];
                    len = parsed.length;
                    for ( indx = 0; indx < len; indx++ ) {
                        arry[ arry.length ] = parsed[indx];
                    }
                    return arry;
                }
            },
            getOptions: function( table, column, onlyAvail ) {
                table = $( table )[0];
                var rowIndex, tbodyIndex, len, row, cache, indx, child, childLen,
                    c = table.config,
                    wo = c.widgetOptions,
                    arry = [];
                for ( tbodyIndex = 0; tbodyIndex < c.$tbodies.length; tbodyIndex++ ) {
                    cache = c.cache[tbodyIndex];
                    len = c.cache[tbodyIndex].normalized.length;
                    // loop through the rows
                    for ( rowIndex = 0; rowIndex < len; rowIndex++ ) {
                        // get cached row from cache.row ( old ) or row data object
                        // ( new; last item in normalized array )
                        row = cache.row ?
                            cache.row[ rowIndex ] :
                            cache.normalized[ rowIndex ][ c.columns ].$row[0];
                        // check if has class filtered
                        if ( onlyAvail && row.className.match( wo.filter_filteredRow ) ) {
                            continue;
                        }
                        // get non-normalized cell content
                        if ( wo.filter_useParsedData ||
                            c.parsers[column].parsed ||
                            c.$headerIndexed[column].hasClass( 'filter-parsed' ) ) {
                            arry[ arry.length ] = '' + cache.normalized[ rowIndex ][ column ];
                            // child row parsed data
                            if ( wo.filter_childRows && wo.filter_childByColumn ) {
                                childLen = cache.normalized[ rowIndex ][ c.columns ].$row.length - 1;
                                for ( indx = 0; indx < childLen; indx++ ) {
                                    arry[ arry.length ] = '' + cache.normalized[ rowIndex ][ c.columns ].child[ indx ][ column ];
                                }
                            }
                        } else {
                            // get raw cached data instead of content directly from the cells
                            arry[ arry.length ] = cache.normalized[ rowIndex ][ c.columns ].raw[ column ];
                            // child row unparsed data
                            if ( wo.filter_childRows && wo.filter_childByColumn ) {
                                childLen = cache.normalized[ rowIndex ][ c.columns ].$row.length;
                                for ( indx = 1; indx < childLen; indx++ ) {
                                    child =  cache.normalized[ rowIndex ][ c.columns ].$row.eq( indx ).children().eq( column );
                                    arry[ arry.length ] = '' + ts.getElementText( c, child, column );
                                }
                            }
                        }
                    }
                }
                return arry;
            },
            buildSelect: function( table, column, arry, updating, onlyAvail ) {
                table = $( table )[0];
                column = parseInt( column, 10 );
                if ( !table.config.cache || $.isEmptyObject( table.config.cache ) ) {
                    return;
                }

                var indx, val, txt, t, $filters, $filter, option,
                    c = table.config,
                    wo = c.widgetOptions,
                    node = c.$headerIndexed[ column ],
                    // t.data( 'placeholder' ) won't work in jQuery older than 1.4.3
                    options = '<option value="">' +
                        ( node.data( 'placeholder' ) ||
                            node.attr( 'data-placeholder' ) ||
                            wo.filter_placeholder.select || ''
                        ) + '</option>',
                    // Get curent filter value
                    currentValue = c.$table
                        .find( 'thead' )
                        .find( 'select.' + tscss.filter + '[data-column="' + column + '"]' )
                        .val();

                // nothing included in arry ( external source ), so get the options from
                // filter_selectSource or column data
                if ( typeof arry === 'undefined' || arry === '' ) {
                    arry = tsf.getOptionSource( table, column, onlyAvail );
                    // abort, selects are updated by an external method
                    if (arry === null) {
                        return;
                    }
                }

                if ( $.isArray( arry ) ) {
                    // build option list
                    for ( indx = 0; indx < arry.length; indx++ ) {
                        option = arry[ indx ];
                        if ( option.text ) {
                            // OBJECT!! add data-function-name in case the value is set in filter_functions
                            option['data-function-name'] = typeof option.value === 'undefined' ? option.text : option.value;

                            // support jQuery < v1.8, otherwise the below code could be shortened to
                            // options += $( '<option>', option )[ 0 ].outerHTML;
                            options += '<option';
                            for ( val in option ) {
                                if ( option.hasOwnProperty( val ) && val !== 'text' ) {
                                    options += ' ' + val + '="' + option[ val ].replace( tsfRegex.quote, '&quot;' ) + '"';
                                }
                            }
                            if ( !option.value ) {
                                options += ' value="' + option.text.replace( tsfRegex.quote, '&quot;' ) + '"';
                            }
                            options += '>' + option.text.replace( tsfRegex.quote, '&quot;' ) + '</option>';
                            // above code is needed in jQuery < v1.8

                            // make sure we don't turn an object into a string (objects without a "text" property)
                        } else if ( '' + option !== '[object Object]' ) {
                            txt = option = ( '' + option ).replace( tsfRegex.quote, '&quot;' );
                            val = txt;
                            // allow including a symbol in the selectSource array
                            // 'a-z|A through Z' so that 'a-z' becomes the option value
                            // and 'A through Z' becomes the option text
                            if ( txt.indexOf( wo.filter_selectSourceSeparator ) >= 0 ) {
                                t = txt.split( wo.filter_selectSourceSeparator );
                                val = t[0];
                                txt = t[1];
                            }
                            // replace quotes - fixes #242 & ignore empty strings
                            // see http://stackoverflow.com/q/14990971/145346
                            options += option !== '' ?
                                '<option ' +
                                ( val === txt ? '' : 'data-function-name="' + option + '" ' ) +
                                'value="' + val + '">' + txt +
                                '</option>' : '';
                        }
                    }
                    // clear arry so it doesn't get appended twice
                    arry = [];
                }

                // update all selects in the same column ( clone thead in sticky headers &
                // any external selects ) - fixes 473
                $filters = ( c.$filters ? c.$filters : c.$table.children( 'thead' ) )
                    .find( '.' + tscss.filter );
                if ( wo.filter_$externalFilters ) {
                    $filters = $filters && $filters.length ?
                        $filters.add( wo.filter_$externalFilters ) :
                        wo.filter_$externalFilters;
                }
                $filter = $filters.filter( 'select[data-column="' + column + '"]' );

                // make sure there is a select there!
                if ( $filter.length ) {
                    $filter[ updating ? 'html' : 'append' ]( options );
                    if ( !$.isArray( arry ) ) {
                        // append options if arry is provided externally as a string or jQuery object
                        // options ( default value ) was already added
                        $filter.append( arry ).val( currentValue );
                    }
                    $filter.val( currentValue );
                }
            },
            buildDefault: function( table, updating ) {
                var columnIndex, $header, noSelect,
                    c = table.config,
                    wo = c.widgetOptions,
                    columns = c.columns;
                // build default select dropdown
                for ( columnIndex = 0; columnIndex < columns; columnIndex++ ) {
                    $header = c.$headerIndexed[columnIndex];
                    noSelect = !( $header.hasClass( 'filter-false' ) || $header.hasClass( 'parser-false' ) );
                    // look for the filter-select class; build/update it if found
                    if ( ( $header.hasClass( 'filter-select' ) ||
                        ts.getColumnData( table, wo.filter_functions, columnIndex ) === true ) && noSelect ) {
                        tsf.buildSelect( table, columnIndex, '', updating, $header.hasClass( wo.filter_onlyAvail ) );
                    }
                }
            }
        };

        // filter regex variable
        tsfRegex = tsf.regex;

        ts.getFilters = function( table, getRaw, setFilters, skipFirst ) {
            var i, $filters, $column, cols,
                filters = [],
                c = table ? $( table )[0].config : '',
                wo = c ? c.widgetOptions : '';
            if ( ( getRaw !== true && wo && !wo.filter_columnFilters ) ||
                // setFilters called, but last search is exactly the same as the current
                // fixes issue #733 & #903 where calling update causes the input values to reset
                ( $.isArray(setFilters) && tsf.equalFilters(c, setFilters, c.lastSearch) )
            ) {
                return $( table ).data( 'lastSearch' ) || [];
            }
            if ( c ) {
                if ( c.$filters ) {
                    $filters = c.$filters.find( '.' + tscss.filter );
                }
                if ( wo.filter_$externalFilters ) {
                    $filters = $filters && $filters.length ?
                        $filters.add( wo.filter_$externalFilters ) :
                        wo.filter_$externalFilters;
                }
                if ( $filters && $filters.length ) {
                    filters = setFilters || [];
                    for ( i = 0; i < c.columns + 1; i++ ) {
                        cols = ( i === c.columns ?
                            // 'all' columns can now include a range or set of columms ( data-column='0-2,4,6-7' )
                            wo.filter_anyColumnSelector + ',' + wo.filter_multipleColumnSelector :
                            '[data-column="' + i + '"]' );
                        $column = $filters.filter( cols );
                        if ( $column.length ) {
                            // move the latest search to the first slot in the array
                            $column = tsf.getLatestSearch( $column );
                            if ( $.isArray( setFilters ) ) {
                                // skip first ( latest input ) to maintain cursor position while typing
                                if ( skipFirst && $column.length > 1 ) {
                                    $column = $column.slice( 1 );
                                }
                                if ( i === c.columns ) {
                                    // prevent data-column='all' from filling data-column='0,1' ( etc )
                                    cols = $column.filter( wo.filter_anyColumnSelector );
                                    $column = cols.length ? cols : $column;
                                }
                                $column
                                    .val( setFilters[ i ] )
                                    // must include a namespace here; but not c.namespace + 'filter'?
                                    .trigger( 'change' + c.namespace );
                            } else {
                                filters[i] = $column.val() || '';
                                // don't change the first... it will move the cursor
                                if ( i === c.columns ) {
                                    // don't update range columns from 'all' setting
                                    $column
                                        .slice( 1 )
                                        .filter( '[data-column*="' + $column.attr( 'data-column' ) + '"]' )
                                        .val( filters[ i ] );
                                } else {
                                    $column
                                        .slice( 1 )
                                        .val( filters[ i ] );
                                }
                            }
                            // save any match input dynamically
                            if ( i === c.columns && $column.length ) {
                                wo.filter_$anyMatch = $column;
                            }
                        }
                    }
                }
            }
            return filters;
        };

        ts.setFilters = function( table, filter, apply, skipFirst ) {
            var c = table ? $( table )[0].config : '',
                valid = ts.getFilters( table, true, filter, skipFirst );
            // default apply to "true"
            if ( typeof apply === 'undefined' ) {
                apply = true;
            }
            if ( c && apply ) {
                // ensure new set filters are applied, even if the search is the same
                c.lastCombinedFilter = null;
                c.lastSearch = [];
                tsf.searching( c.table, filter, skipFirst );
                c.$table.triggerHandler( 'filterFomatterUpdate' );
            }
            return valid.length !== 0;
        };

    })( jQuery );

    /*! Widget: stickyHeaders - updated 9/27/2017 (v2.29.0) *//*
 * Requires tablesorter v2.8+ and jQuery 1.4.3+
 * by Rob Garrison
 */
    ;(function ($, window) {
        'use strict';
        var ts = $.tablesorter || {};

        $.extend(ts.css, {
            sticky    : 'tablesorter-stickyHeader', // stickyHeader
            stickyVis : 'tablesorter-sticky-visible',
            stickyHide: 'tablesorter-sticky-hidden',
            stickyWrap: 'tablesorter-sticky-wrapper'
        });

        // Add a resize event to table headers
        ts.addHeaderResizeEvent = function(table, disable, settings) {
            table = $(table)[0]; // make sure we're using a dom element
            if ( !table.config ) { return; }
            var defaults = {
                    timer : 250
                },
                options = $.extend({}, defaults, settings),
                c = table.config,
                wo = c.widgetOptions,
                checkSizes = function( triggerEvent ) {
                    var index, headers, $header, sizes, width, height,
                        len = c.$headers.length;
                    wo.resize_flag = true;
                    headers = [];
                    for ( index = 0; index < len; index++ ) {
                        $header = c.$headers.eq( index );
                        sizes = $header.data( 'savedSizes' ) || [ 0, 0 ]; // fixes #394
                        width = $header[0].offsetWidth;
                        height = $header[0].offsetHeight;
                        if ( width !== sizes[0] || height !== sizes[1] ) {
                            $header.data( 'savedSizes', [ width, height ] );
                            headers.push( $header[0] );
                        }
                    }
                    if ( headers.length && triggerEvent !== false ) {
                        c.$table.triggerHandler( 'resize', [ headers ] );
                    }
                    wo.resize_flag = false;
                };
            clearInterval(wo.resize_timer);
            if (disable) {
                wo.resize_flag = false;
                return false;
            }
            checkSizes( false );
            wo.resize_timer = setInterval(function() {
                if (wo.resize_flag) { return; }
                checkSizes();
            }, options.timer);
        };

        function getStickyOffset(c, wo) {
            var $el = isNaN(wo.stickyHeaders_offset) ? $(wo.stickyHeaders_offset) : [];
            return $el.length ?
                $el.height() || 0 :
                parseInt(wo.stickyHeaders_offset, 10) || 0;
        }

        // Sticky headers based on this awesome article:
        // http://css-tricks.com/13465-persistent-headers/
        // and https://github.com/jmosbech/StickyTableHeaders by Jonas Mosbech
        // **************************
        ts.addWidget({
            id: 'stickyHeaders',
            priority: 54, // sticky widget must be initialized after the filter & before pager widget!
            options: {
                stickyHeaders : '',       // extra class name added to the sticky header row
                stickyHeaders_appendTo : null, // jQuery selector or object to phycially attach the sticky headers
                stickyHeaders_attachTo : null, // jQuery selector or object to attach scroll listener to (overridden by xScroll & yScroll settings)
                stickyHeaders_xScroll : null, // jQuery selector or object to monitor horizontal scroll position (defaults: xScroll > attachTo > window)
                stickyHeaders_yScroll : null, // jQuery selector or object to monitor vertical scroll position (defaults: yScroll > attachTo > window)
                stickyHeaders_offset : 0, // number or jquery selector targeting the position:fixed element
                stickyHeaders_filteredToTop: true, // scroll table top into view after filtering
                stickyHeaders_cloneId : '-sticky', // added to table ID, if it exists
                stickyHeaders_addResizeEvent : true, // trigger 'resize' event on headers
                stickyHeaders_includeCaption : true, // if false and a caption exist, it won't be included in the sticky header
                stickyHeaders_zIndex : 2 // The zIndex of the stickyHeaders, allows the user to adjust this to their needs
            },
            format: function(table, c, wo) {
                // filter widget doesn't initialize on an empty table. Fixes #449
                if ( c.$table.hasClass('hasStickyHeaders') || ($.inArray('filter', c.widgets) >= 0 && !c.$table.hasClass('hasFilters')) ) {
                    return;
                }
                var index, len, $t,
                    $table = c.$table,
                    // add position: relative to attach element, hopefully it won't cause trouble.
                    $attach = $(wo.stickyHeaders_attachTo || wo.stickyHeaders_appendTo),
                    namespace = c.namespace + 'stickyheaders ',
                    // element to watch for the scroll event
                    $yScroll = $(wo.stickyHeaders_yScroll || wo.stickyHeaders_attachTo || window),
                    $xScroll = $(wo.stickyHeaders_xScroll || wo.stickyHeaders_attachTo || window),
                    $thead = $table.children('thead:first'),
                    $header = $thead.children('tr').not('.sticky-false').children(),
                    $tfoot = $table.children('tfoot'),
                    stickyOffset = getStickyOffset(c, wo),
                    // is this table nested? If so, find parent sticky header wrapper (div, not table)
                    $nestedSticky = $table.parent().closest('.' + ts.css.table).hasClass('hasStickyHeaders') ?
                        $table.parent().closest('table.tablesorter')[0].config.widgetOptions.$sticky.parent() : [],
                    nestedStickyTop = $nestedSticky.length ? $nestedSticky.height() : 0,
                    // clone table, then wrap to make sticky header
                    $stickyTable = wo.$sticky = $table.clone()
                        .addClass('containsStickyHeaders ' + ts.css.sticky + ' ' + wo.stickyHeaders + ' ' + c.namespace.slice(1) + '_extra_table' )
                        .wrap('<div class="' + ts.css.stickyWrap + '">'),
                    $stickyWrap = $stickyTable.parent()
                        .addClass(ts.css.stickyHide)
                        .css({
                            position   : $attach.length ? 'absolute' : 'fixed',
                            padding    : parseInt( $stickyTable.parent().parent().css('padding-left'), 10 ),
                            top        : stickyOffset + nestedStickyTop,
                            left       : 0,
                            visibility : 'hidden',
                            zIndex     : wo.stickyHeaders_zIndex || 2
                        }),
                    $stickyThead = $stickyTable.children('thead:first'),
                    $stickyCells,
                    laststate = '',
                    setWidth = function($orig, $clone) {
                        var index, width, border, $cell, $this,
                            $cells = $orig.filter(':visible'),
                            len = $cells.length;
                        for ( index = 0; index < len; index++ ) {
                            $cell = $clone.filter(':visible').eq(index);
                            $this = $cells.eq(index);
                            // code from https://github.com/jmosbech/StickyTableHeaders
                            if ($this.css('box-sizing') === 'border-box') {
                                width = $this.outerWidth();
                            } else {
                                if ($cell.css('border-collapse') === 'collapse') {
                                    if (window.getComputedStyle) {
                                        width = parseFloat( window.getComputedStyle($this[0], null).width );
                                    } else {
                                        // ie8 only
                                        border = parseFloat( $this.css('border-width') );
                                        width = $this.outerWidth() - parseFloat( $this.css('padding-left') ) - parseFloat( $this.css('padding-right') ) - border;
                                    }
                                } else {
                                    width = $this.width();
                                }
                            }
                            $cell.css({
                                'width': width,
                                'min-width': width,
                                'max-width': width
                            });
                        }
                    },
                    getLeftPosition = function(yWindow) {
                        if (yWindow === false && $nestedSticky.length) {
                            return $table.position().left;
                        }
                        return $attach.length ?
                            parseInt($attach.css('padding-left'), 10) || 0 :
                            $table.offset().left - parseInt($table.css('margin-left'), 10) - $(window).scrollLeft();
                    },
                    resizeHeader = function() {
                        $stickyWrap.css({
                            left : getLeftPosition(),
                            width: $table.outerWidth()
                        });
                        setWidth( $table, $stickyTable );
                        setWidth( $header, $stickyCells );
                    },
                    scrollSticky = function( resizing ) {
                        if (!$table.is(':visible')) { return; } // fixes #278
                        // Detect nested tables - fixes #724
                        nestedStickyTop = $nestedSticky.length ? $nestedSticky.offset().top - $yScroll.scrollTop() + $nestedSticky.height() : 0;
                        var tmp,
                            offset = $table.offset(),
                            stickyOffset = getStickyOffset(c, wo),
                            yWindow = $.isWindow( $yScroll[0] ), // $.isWindow needs jQuery 1.4.3
                            yScroll = yWindow ?
                                $yScroll.scrollTop() :
                                // use parent sticky position if nested AND inside of a scrollable element - see #1512
                                $nestedSticky.length ? parseInt($nestedSticky[0].style.top, 10) : $yScroll.offset().top,
                            attachTop = $attach.length ? yScroll : $yScroll.scrollTop(),
                            captionHeight = wo.stickyHeaders_includeCaption ? 0 : $table.children( 'caption' ).height() || 0,
                            scrollTop = attachTop + stickyOffset + nestedStickyTop - captionHeight,
                            tableHeight = $table.height() - ($stickyWrap.height() + ($tfoot.height() || 0)) - captionHeight,
                            isVisible = ( scrollTop > offset.top ) && ( scrollTop < offset.top + tableHeight ) ? 'visible' : 'hidden',
                            state = isVisible === 'visible' ? ts.css.stickyVis : ts.css.stickyHide,
                            needsUpdating = !$stickyWrap.hasClass( state ),
                            cssSettings = { visibility : isVisible };
                        if ($attach.length) {
                            // attached sticky headers always need updating
                            needsUpdating = true;
                            cssSettings.top = yWindow ? scrollTop - $attach.offset().top : $attach.scrollTop();
                        }
                        // adjust when scrolling horizontally - fixes issue #143
                        tmp = getLeftPosition(yWindow);
                        if (tmp !== parseInt($stickyWrap.css('left'), 10)) {
                            needsUpdating = true;
                            cssSettings.left = tmp;
                        }
                        cssSettings.top = ( cssSettings.top || 0 ) +
                            // If nested AND inside of a scrollable element, only add parent sticky height
                            (!yWindow && $nestedSticky.length ? $nestedSticky.height() : stickyOffset + nestedStickyTop);
                        if (needsUpdating) {
                            $stickyWrap
                                .removeClass( ts.css.stickyVis + ' ' + ts.css.stickyHide )
                                .addClass( state )
                                .css(cssSettings);
                        }
                        if (isVisible !== laststate || resizing) {
                            // make sure the column widths match
                            resizeHeader();
                            laststate = isVisible;
                        }
                    };
                // only add a position relative if a position isn't already defined
                if ($attach.length && !$attach.css('position')) {
                    $attach.css('position', 'relative');
                }
                // fix clone ID, if it exists - fixes #271
                if ($stickyTable.attr('id')) { $stickyTable[0].id += wo.stickyHeaders_cloneId; }
                // clear out cloned table, except for sticky header
                // include caption & filter row (fixes #126 & #249) - don't remove cells to get correct cell indexing
                $stickyTable.find('> thead:gt(0), tr.sticky-false').hide();
                $stickyTable.find('> tbody, > tfoot').remove();
                $stickyTable.find('caption').toggle(wo.stickyHeaders_includeCaption);
                // issue #172 - find td/th in sticky header
                $stickyCells = $stickyThead.children().children();
                $stickyTable.css({ height:0, width:0, margin: 0 });
                // remove resizable block
                $stickyCells.find('.' + ts.css.resizer).remove();
                // update sticky header class names to match real header after sorting
                $table
                    .addClass('hasStickyHeaders')
                    .bind('pagerComplete' + namespace, function() {
                        resizeHeader();
                    });

                ts.bindEvents(table, $stickyThead.children().children('.' + ts.css.header));

                if (wo.stickyHeaders_appendTo) {
                    $(wo.stickyHeaders_appendTo).append( $stickyWrap );
                } else {
                    // add stickyheaders AFTER the table. If the table is selected by ID, the original one (first) will be returned.
                    $table.after( $stickyWrap );
                }

                // onRenderHeader is defined, we need to do something about it (fixes #641)
                if (c.onRenderHeader) {
                    $t = $stickyThead.children('tr').children();
                    len = $t.length;
                    for ( index = 0; index < len; index++ ) {
                        // send second parameter
                        c.onRenderHeader.apply( $t.eq( index ), [ index, c, $stickyTable ] );
                    }
                }
                // make it sticky!
                $xScroll.add($yScroll)
                    .unbind( ('scroll resize '.split(' ').join( namespace )).replace(/\s+/g, ' ') )
                    .bind('scroll resize '.split(' ').join( namespace ), function( event ) {
                        scrollSticky( event.type === 'resize' );
                    });
                c.$table
                    .unbind('stickyHeadersUpdate' + namespace)
                    .bind('stickyHeadersUpdate' + namespace, function() {
                        scrollSticky( true );
                    });

                if (wo.stickyHeaders_addResizeEvent) {
                    ts.addHeaderResizeEvent(table);
                }

                // look for filter widget
                if ($table.hasClass('hasFilters') && wo.filter_columnFilters) {
                    // scroll table into view after filtering, if sticky header is active - #482
                    $table.bind('filterEnd' + namespace, function() {
                        // $(':focus') needs jQuery 1.6+
                        var $td = $(document.activeElement).closest('td'),
                            column = $td.parent().children().index($td);
                        // only scroll if sticky header is active
                        if ($stickyWrap.hasClass(ts.css.stickyVis) && wo.stickyHeaders_filteredToTop) {
                            // scroll to original table (not sticky clone)
                            window.scrollTo(0, $table.position().top);
                            // give same input/select focus; check if c.$filters exists; fixes #594
                            if (column >= 0 && c.$filters) {
                                c.$filters.eq(column).find('a, select, input').filter(':visible').focus();
                            }
                        }
                    });
                    ts.filter.bindSearch( $table, $stickyCells.find('.' + ts.css.filter) );
                    // support hideFilters
                    if (wo.filter_hideFilters) {
                        ts.filter.hideFilters(c, $stickyTable);
                    }
                }

                // resize table (Firefox)
                if (wo.stickyHeaders_addResizeEvent) {
                    $table.bind('resize' + c.namespace + 'stickyheaders', function() {
                        resizeHeader();
                    });
                }

                // make sure sticky is visible if page is partially scrolled
                scrollSticky( true );
                $table.triggerHandler('stickyHeadersInit');

            },
            remove: function(table, c, wo) {
                var namespace = c.namespace + 'stickyheaders ';
                c.$table
                    .removeClass('hasStickyHeaders')
                    .unbind( ('pagerComplete resize filterEnd stickyHeadersUpdate '.split(' ').join(namespace)).replace(/\s+/g, ' ') )
                    .next('.' + ts.css.stickyWrap).remove();
                if (wo.$sticky && wo.$sticky.length) { wo.$sticky.remove(); } // remove cloned table
                $(window)
                    .add(wo.stickyHeaders_xScroll)
                    .add(wo.stickyHeaders_yScroll)
                    .add(wo.stickyHeaders_attachTo)
                    .unbind( ('scroll resize '.split(' ').join(namespace)).replace(/\s+/g, ' ') );
                ts.addHeaderResizeEvent(table, true);
            }
        });

    })(jQuery, window);

    /*! Widget: resizable - updated 2018-03-26 (v2.30.2) */
    /*jshint browser:true, jquery:true, unused:false */
    ;(function ($, window) {
        'use strict';
        var ts = $.tablesorter || {};

        $.extend(ts.css, {
            resizableContainer : 'tablesorter-resizable-container',
            resizableHandle    : 'tablesorter-resizable-handle',
            resizableNoSelect  : 'tablesorter-disableSelection',
            resizableStorage   : 'tablesorter-resizable'
        });

        // Add extra scroller css
        $(function() {
            var s = '<style>' +
                'body.' + ts.css.resizableNoSelect + ' { -ms-user-select: none; -moz-user-select: -moz-none;' +
                '-khtml-user-select: none; -webkit-user-select: none; user-select: none; }' +
                '.' + ts.css.resizableContainer + ' { position: relative; height: 1px; }' +
                // make handle z-index > than stickyHeader z-index, so the handle stays above sticky header
                '.' + ts.css.resizableHandle + ' { position: absolute; display: inline-block; width: 8px;' +
                'top: 1px; cursor: ew-resize; z-index: 3; user-select: none; -moz-user-select: none; }' +
                '</style>';
            $('head').append(s);
        });

        ts.resizable = {
            init : function( c, wo ) {
                if ( c.$table.hasClass( 'hasResizable' ) ) { return; }
                c.$table.addClass( 'hasResizable' );

                var noResize, $header, column, storedSizes, tmp,
                    $table = c.$table,
                    $parent = $table.parent(),
                    marginTop = parseInt( $table.css( 'margin-top' ), 10 ),

                    // internal variables
                    vars = wo.resizable_vars = {
                        useStorage : ts.storage && wo.resizable !== false,
                        $wrap : $parent,
                        mouseXPosition : 0,
                        $target : null,
                        $next : null,
                        overflow : $parent.css('overflow') === 'auto' ||
                            $parent.css('overflow') === 'scroll' ||
                            $parent.css('overflow-x') === 'auto' ||
                            $parent.css('overflow-x') === 'scroll',
                        storedSizes : []
                    };

                // set default widths
                ts.resizableReset( c.table, true );

                // now get measurements!
                vars.tableWidth = $table.width();
                // attempt to autodetect
                vars.fullWidth = Math.abs( $parent.width() - vars.tableWidth ) < 20;

                /*
			// Hacky method to determine if table width is set to 'auto'
			// http://stackoverflow.com/a/20892048/145346
			if ( !vars.fullWidth ) {
				tmp = $table.width();
				$header = $table.wrap('<span>').parent(); // temp variable
				storedSizes = parseInt( $table.css( 'margin-left' ), 10 ) || 0;
				$table.css( 'margin-left', storedSizes + 50 );
				vars.tableWidth = $header.width() > tmp ? 'auto' : tmp;
				$table.css( 'margin-left', storedSizes ? storedSizes : '' );
				$header = null;
				$table.unwrap('<span>');
			}
			*/

                if ( vars.useStorage && vars.overflow ) {
                    // save table width
                    ts.storage( c.table, 'tablesorter-table-original-css-width', vars.tableWidth );
                    tmp = ts.storage( c.table, 'tablesorter-table-resized-width' ) || 'auto';
                    ts.resizable.setWidth( $table, tmp, true );
                }
                wo.resizable_vars.storedSizes = storedSizes = ( vars.useStorage ?
                    ts.storage( c.table, ts.css.resizableStorage ) :
                    [] ) || [];
                ts.resizable.setWidths( c, wo, storedSizes );
                ts.resizable.updateStoredSizes( c, wo );

                wo.$resizable_container = $( '<div class="' + ts.css.resizableContainer + '">' )
                    .css({ top : marginTop })
                    .insertBefore( $table );
                // add container
                for ( column = 0; column < c.columns; column++ ) {
                    $header = c.$headerIndexed[ column ];
                    tmp = ts.getColumnData( c.table, c.headers, column );
                    noResize = ts.getData( $header, tmp, 'resizable' ) === 'false';
                    if ( !noResize ) {
                        $( '<div class="' + ts.css.resizableHandle + '">' )
                            .appendTo( wo.$resizable_container )
                            .attr({
                                'data-column' : column,
                                'unselectable' : 'on'
                            })
                            .data( 'header', $header )
                            .bind( 'selectstart', false );
                    }
                }
                ts.resizable.bindings( c, wo );
            },

            updateStoredSizes : function( c, wo ) {
                var column, $header,
                    len = c.columns,
                    vars = wo.resizable_vars;
                vars.storedSizes = [];
                for ( column = 0; column < len; column++ ) {
                    $header = c.$headerIndexed[ column ];
                    vars.storedSizes[ column ] = $header.is(':visible') ? $header.width() : 0;
                }
            },

            setWidth : function( $el, width, overflow ) {
                // overflow tables need min & max width set as well
                $el.css({
                    'width' : width,
                    'min-width' : overflow ? width : '',
                    'max-width' : overflow ? width : ''
                });
            },

            setWidths : function( c, wo, storedSizes ) {
                var column, $temp,
                    vars = wo.resizable_vars,
                    $extra = $( c.namespace + '_extra_headers' ),
                    $col = c.$table.children( 'colgroup' ).children( 'col' );
                storedSizes = storedSizes || vars.storedSizes || [];
                // process only if table ID or url match
                if ( storedSizes.length ) {
                    for ( column = 0; column < c.columns; column++ ) {
                        // set saved resizable widths
                        ts.resizable.setWidth( c.$headerIndexed[ column ], storedSizes[ column ], vars.overflow );
                        if ( $extra.length ) {
                            // stickyHeaders needs to modify min & max width as well
                            $temp = $extra.eq( column ).add( $col.eq( column ) );
                            ts.resizable.setWidth( $temp, storedSizes[ column ], vars.overflow );
                        }
                    }
                    $temp = $( c.namespace + '_extra_table' );
                    if ( $temp.length && !ts.hasWidget( c.table, 'scroller' ) ) {
                        ts.resizable.setWidth( $temp, c.$table.outerWidth(), vars.overflow );
                    }
                }
            },

            setHandlePosition : function( c, wo ) {
                var startPosition,
                    tableHeight = c.$table.height(),
                    $handles = wo.$resizable_container.children(),
                    handleCenter = Math.floor( $handles.width() / 2 );

                if ( ts.hasWidget( c.table, 'scroller' ) ) {
                    tableHeight = 0;
                    c.$table.closest( '.' + ts.css.scrollerWrap ).children().each(function() {
                        var $this = $(this);
                        // center table has a max-height set
                        tableHeight += $this.filter('[style*="height"]').length ? $this.height() : $this.children('table').height();
                    });
                }

                if ( !wo.resizable_includeFooter && c.$table.children('tfoot').length ) {
                    tableHeight -= c.$table.children('tfoot').height();
                }
                // subtract out table left position from resizable handles. Fixes #864
                // jQuery v3.3.0+ appears to include the start position with the $header.position().left; see #1544
                startPosition = parseFloat($.fn.jquery) >= 3.3 ? 0 : c.$table.position().left;
                $handles.each( function() {
                    var $this = $(this),
                        column = parseInt( $this.attr( 'data-column' ), 10 ),
                        columns = c.columns - 1,
                        $header = $this.data( 'header' );
                    if ( !$header ) { return; } // see #859
                    if (
                        !$header.is(':visible') ||
                        ( !wo.resizable_addLastColumn && ts.resizable.checkVisibleColumns(c, column) )
                    ) {
                        $this.hide();
                    } else if ( column < columns || column === columns && wo.resizable_addLastColumn ) {
                        $this.css({
                            display: 'inline-block',
                            height : tableHeight,
                            left : $header.position().left - startPosition + $header.outerWidth() - handleCenter
                        });
                    }
                });
            },

            // Fixes #1485
            checkVisibleColumns: function( c, column ) {
                var i,
                    len = 0;
                for ( i = column + 1; i < c.columns; i++ ) {
                    len += c.$headerIndexed[i].is( ':visible' ) ? 1 : 0;
                }
                return len === 0;
            },

            // prevent text selection while dragging resize bar
            toggleTextSelection : function( c, wo, toggle ) {
                var namespace = c.namespace + 'tsresize';
                wo.resizable_vars.disabled = toggle;
                $( 'body' ).toggleClass( ts.css.resizableNoSelect, toggle );
                if ( toggle ) {
                    $( 'body' )
                        .attr( 'unselectable', 'on' )
                        .bind( 'selectstart' + namespace, false );
                } else {
                    $( 'body' )
                        .removeAttr( 'unselectable' )
                        .unbind( 'selectstart' + namespace );
                }
            },

            bindings : function( c, wo ) {
                var namespace = c.namespace + 'tsresize';
                wo.$resizable_container.children().bind( 'mousedown', function( event ) {
                    // save header cell and mouse position
                    var column,
                        vars = wo.resizable_vars,
                        $extras = $( c.namespace + '_extra_headers' ),
                        $header = $( event.target ).data( 'header' );

                    column = parseInt( $header.attr( 'data-column' ), 10 );
                    vars.$target = $header = $header.add( $extras.filter('[data-column="' + column + '"]') );
                    vars.target = column;

                    // if table is not as wide as it's parent, then resize the table
                    vars.$next = event.shiftKey || wo.resizable_targetLast ?
                        $header.parent().children().not( '.resizable-false' ).filter( ':last' ) :
                        $header.nextAll( ':not(.resizable-false)' ).eq( 0 );

                    column = parseInt( vars.$next.attr( 'data-column' ), 10 );
                    vars.$next = vars.$next.add( $extras.filter('[data-column="' + column + '"]') );
                    vars.next = column;

                    vars.mouseXPosition = event.pageX;
                    ts.resizable.updateStoredSizes( c, wo );
                    ts.resizable.toggleTextSelection(c, wo, true );
                });

                $( document )
                    .bind( 'mousemove' + namespace, function( event ) {
                        var vars = wo.resizable_vars;
                        // ignore mousemove if no mousedown
                        if ( !vars.disabled || vars.mouseXPosition === 0 || !vars.$target ) { return; }
                        if ( wo.resizable_throttle ) {
                            clearTimeout( vars.timer );
                            vars.timer = setTimeout( function() {
                                ts.resizable.mouseMove( c, wo, event );
                            }, isNaN( wo.resizable_throttle ) ? 5 : wo.resizable_throttle );
                        } else {
                            ts.resizable.mouseMove( c, wo, event );
                        }
                    })
                    .bind( 'mouseup' + namespace, function() {
                        if (!wo.resizable_vars.disabled) { return; }
                        ts.resizable.toggleTextSelection( c, wo, false );
                        ts.resizable.stopResize( c, wo );
                        ts.resizable.setHandlePosition( c, wo );
                    });

                // resizeEnd event triggered by scroller widget
                $( window ).bind( 'resize' + namespace + ' resizeEnd' + namespace, function() {
                    ts.resizable.setHandlePosition( c, wo );
                });

                // right click to reset columns to default widths
                c.$table
                    .bind( 'columnUpdate pagerComplete resizableUpdate '.split( ' ' ).join( namespace + ' ' ), function() {
                        ts.resizable.setHandlePosition( c, wo );
                    })
                    .bind( 'resizableReset' + namespace, function() {
                        ts.resizableReset( c.table );
                    })
                    .find( 'thead:first' )
                    .add( $( c.namespace + '_extra_table' ).find( 'thead:first' ) )
                    .bind( 'contextmenu' + namespace, function() {
                        // $.isEmptyObject() needs jQuery 1.4+; allow right click if already reset
                        var allowClick = wo.resizable_vars.storedSizes.length === 0;
                        ts.resizableReset( c.table );
                        ts.resizable.setHandlePosition( c, wo );
                        wo.resizable_vars.storedSizes = [];
                        return allowClick;
                    });

            },

            mouseMove : function( c, wo, event ) {
                if ( wo.resizable_vars.mouseXPosition === 0 || !wo.resizable_vars.$target ) { return; }
                // resize columns
                var column,
                    total = 0,
                    vars = wo.resizable_vars,
                    $next = vars.$next,
                    tar = vars.storedSizes[ vars.target ],
                    leftEdge = event.pageX - vars.mouseXPosition;
                if ( vars.overflow ) {
                    if ( tar + leftEdge > 0 ) {
                        vars.storedSizes[ vars.target ] += leftEdge;
                        ts.resizable.setWidth( vars.$target, vars.storedSizes[ vars.target ], true );
                        // update the entire table width
                        for ( column = 0; column < c.columns; column++ ) {
                            total += vars.storedSizes[ column ];
                        }
                        ts.resizable.setWidth( c.$table.add( $( c.namespace + '_extra_table' ) ), total );
                    }
                    if ( !$next.length ) {
                        // if expanding right-most column, scroll the wrapper
                        vars.$wrap[0].scrollLeft = c.$table.width();
                    }
                } else if ( vars.fullWidth ) {
                    vars.storedSizes[ vars.target ] += leftEdge;
                    vars.storedSizes[ vars.next ] -= leftEdge;
                    ts.resizable.setWidths( c, wo );
                } else {
                    vars.storedSizes[ vars.target ] += leftEdge;
                    ts.resizable.setWidths( c, wo );
                }
                vars.mouseXPosition = event.pageX;
                // dynamically update sticky header widths
                c.$table.triggerHandler('stickyHeadersUpdate');
            },

            stopResize : function( c, wo ) {
                var vars = wo.resizable_vars;
                ts.resizable.updateStoredSizes( c, wo );
                if ( vars.useStorage ) {
                    // save all column widths
                    ts.storage( c.table, ts.css.resizableStorage, vars.storedSizes );
                    ts.storage( c.table, 'tablesorter-table-resized-width', c.$table.width() );
                }
                vars.mouseXPosition = 0;
                vars.$target = vars.$next = null;
                // will update stickyHeaders, just in case, see #912
                c.$table.triggerHandler('stickyHeadersUpdate');
                c.$table.triggerHandler('resizableComplete');
            }
        };

        // this widget saves the column widths if
        // $.tablesorter.storage function is included
        // **************************
        ts.addWidget({
            id: 'resizable',
            priority: 40,
            options: {
                resizable : true, // save column widths to storage
                resizable_addLastColumn : false,
                resizable_includeFooter: true,
                resizable_widths : [],
                resizable_throttle : false, // set to true (5ms) or any number 0-10 range
                resizable_targetLast : false
            },
            init: function(table, thisWidget, c, wo) {
                ts.resizable.init( c, wo );
            },
            format: function( table, c, wo ) {
                ts.resizable.setHandlePosition( c, wo );
            },
            remove: function( table, c, wo, refreshing ) {
                if (wo.$resizable_container) {
                    var namespace = c.namespace + 'tsresize';
                    c.$table.add( $( c.namespace + '_extra_table' ) )
                        .removeClass('hasResizable')
                        .children( 'thead' )
                        .unbind( 'contextmenu' + namespace );

                    wo.$resizable_container.remove();
                    ts.resizable.toggleTextSelection( c, wo, false );
                    ts.resizableReset( table, refreshing );
                    $( document ).unbind( 'mousemove' + namespace + ' mouseup' + namespace );
                }
            }
        });

        ts.resizableReset = function( table, refreshing ) {
            $( table ).each(function() {
                var index, $t,
                    c = this.config,
                    wo = c && c.widgetOptions,
                    vars = wo.resizable_vars;
                if ( table && c && c.$headerIndexed.length ) {
                    // restore the initial table width
                    if ( vars.overflow && vars.tableWidth ) {
                        ts.resizable.setWidth( c.$table, vars.tableWidth, true );
                        if ( vars.useStorage ) {
                            ts.storage( table, 'tablesorter-table-resized-width', vars.tableWidth );
                        }
                    }
                    for ( index = 0; index < c.columns; index++ ) {
                        $t = c.$headerIndexed[ index ];
                        if ( wo.resizable_widths && wo.resizable_widths[ index ] ) {
                            ts.resizable.setWidth( $t, wo.resizable_widths[ index ], vars.overflow );
                        } else if ( !$t.hasClass( 'resizable-false' ) ) {
                            // don't clear the width of any column that is not resizable
                            ts.resizable.setWidth( $t, '', vars.overflow );
                        }
                    }

                    // reset stickyHeader widths
                    c.$table.triggerHandler( 'stickyHeadersUpdate' );
                    if ( ts.storage && !refreshing ) {
                        ts.storage( this, ts.css.resizableStorage, [] );
                    }
                }
            });
        };

    })( jQuery, window );

    /*! Widget: saveSort - updated 2018-03-19 (v2.30.1) *//*
* Requires tablesorter v2.16+
* by Rob Garrison
*/
    ;(function ($) {
        'use strict';
        var ts = $.tablesorter || {};

        function getStoredSortList(c) {
            var stored = ts.storage( c.table, 'tablesorter-savesort' );
            return (stored && stored.hasOwnProperty('sortList') && $.isArray(stored.sortList)) ? stored.sortList : [];
        }

        function sortListChanged(c, sortList) {
            return (sortList || getStoredSortList(c)).join(',') !== c.sortList.join(',');
        }

        // this widget saves the last sort only if the
        // saveSort widget option is true AND the
        // $.tablesorter.storage function is included
        // **************************
        ts.addWidget({
            id: 'saveSort',
            priority: 20,
            options: {
                saveSort : true
            },
            init: function(table, thisWidget, c, wo) {
                // run widget format before all other widgets are applied to the table
                thisWidget.format(table, c, wo, true);
            },
            format: function(table, c, wo, init) {
                var time,
                    $table = c.$table,
                    saveSort = wo.saveSort !== false, // make saveSort active/inactive; default to true
                    sortList = { 'sortList' : c.sortList },
                    debug = ts.debug(c, 'saveSort');
                if (debug) {
                    time = new Date();
                }
                if ($table.hasClass('hasSaveSort')) {
                    if (saveSort && table.hasInitialized && ts.storage && sortListChanged(c)) {
                        ts.storage( table, 'tablesorter-savesort', sortList );
                        if (debug) {
                            console.log('saveSort >> Saving last sort: ' + c.sortList + ts.benchmark(time));
                        }
                    }
                } else {
                    // set table sort on initial run of the widget
                    $table.addClass('hasSaveSort');
                    sortList = '';
                    // get data
                    if (ts.storage) {
                        sortList = getStoredSortList(c);
                        if (debug) {
                            console.log('saveSort >> Last sort loaded: "' + sortList + '"' + ts.benchmark(time));
                        }
                        $table.bind('saveSortReset', function(event) {
                            event.stopPropagation();
                            ts.storage( table, 'tablesorter-savesort', '' );
                        });
                    }
                    // init is true when widget init is run, this will run this widget before all other widgets have initialized
                    // this method allows using this widget in the original tablesorter plugin; but then it will run all widgets twice.
                    if (init && sortList && sortList.length > 0) {
                        c.sortList = sortList;
                    } else if (table.hasInitialized && sortList && sortList.length > 0) {
                        // update sort change
                        if (sortListChanged(c, sortList)) {
                            ts.sortOn(c, sortList);
                        }
                    }
                }
            },
            remove: function(table, c) {
                c.$table.removeClass('hasSaveSort');
                // clear storage
                if (ts.storage) { ts.storage( table, 'tablesorter-savesort', '' ); }
            }
        });

    })(jQuery);
    return jQuery.tablesorter;}));
/* End */
;
; /* Start:"a:4:{s:4:"full";s:74:"/local/templates/arlight/js/jquery.inputmask.bundle.min.js?165720755271343";s:6:"source";s:58:"/local/templates/arlight/js/jquery.inputmask.bundle.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*!
* jquery.inputmask.bundle.js
* http://github.com/RobinHerbots/jquery.inputmask
* Copyright (c) 2010 - 2016 Robin Herbots
* Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
* Version: 3.2.7
*/
!function(a){function b(c,d){return this instanceof b?(a.isPlainObject(c)?d=c:(d=d||{},d.alias=c),this.el=void 0,this.opts=a.extend(!0,{},this.defaults,d),this.noMasksCache=d&&void 0!==d.definitions,this.userOptions=d||{},this.events={},void e(this.opts.alias,d,this.opts)):new b(c,d)}function c(a){var b=document.createElement("input"),c="on"+a,d=c in b;return d||(b.setAttribute(c,"return;"),d="function"==typeof b[c]),b=null,d}function d(b,c){var d=b.getAttribute("type"),e="INPUT"===b.tagName&&-1!==a.inArray(d,c.supportsInputType)||b.isContentEditable||"TEXTAREA"===b.tagName;if(!e){var f=document.createElement("input");f.setAttribute("type",d),e="text"===f.type,f=null}return e}function e(b,c,d){var f=d.aliases[b];return f?(f.alias&&e(f.alias,void 0,d),a.extend(!0,d,f),a.extend(!0,d,c),!0):(null===d.mask&&(d.mask=b),!1)}function f(b,c,d){function f(a,c){c=void 0!==c?c:b.getAttribute("data-inputmask-"+a),null!==c&&("string"==typeof c&&(0===a.indexOf("on")?c=window[c]:"false"===c?c=!1:"true"===c&&(c=!0)),d[a]=c)}var g,h,i,j,k=b.getAttribute("data-inputmask");if(k&&""!==k&&(k=k.replace(new RegExp("'","g"),'"'),h=JSON.parse("{"+k+"}")),h){i=void 0;for(j in h)if("alias"===j.toLowerCase()){i=h[j];break}}f("alias",i),d.alias&&e(d.alias,d,c);for(g in c){if(h){i=void 0;for(j in h)if(j.toLowerCase()===g.toLowerCase()){i=h[j];break}}f(g,i)}return a.extend(!0,c,d),c}function g(c,d){function e(b){function d(a,b,c,d){this.matches=[],this.isGroup=a||!1,this.isOptional=b||!1,this.isQuantifier=c||!1,this.isAlternator=d||!1,this.quantifier={min:1,max:1}}function e(b,d,e){var f=c.definitions[d];e=void 0!==e?e:b.matches.length;var g=b.matches[e-1];if(f&&!r){f.placeholder=a.isFunction(f.placeholder)?f.placeholder(c):f.placeholder;for(var h=f.prevalidator,i=h?h.length:0,j=1;j<f.cardinality;j++){var k=i>=j?h[j-1]:[],l=k.validator,m=k.cardinality;b.matches.splice(e++,0,{fn:l?"string"==typeof l?new RegExp(l):new function(){this.test=l}:new RegExp("."),cardinality:m?m:1,optionality:b.isOptional,newBlockMarker:void 0===g||g.def!==(f.definitionSymbol||d),casing:f.casing,def:f.definitionSymbol||d,placeholder:f.placeholder,mask:d}),g=b.matches[e-1]}b.matches.splice(e++,0,{fn:f.validator?"string"==typeof f.validator?new RegExp(f.validator):new function(){this.test=f.validator}:new RegExp("."),cardinality:f.cardinality,optionality:b.isOptional,newBlockMarker:void 0===g||g.def!==(f.definitionSymbol||d),casing:f.casing,def:f.definitionSymbol||d,placeholder:f.placeholder,mask:d})}else b.matches.splice(e++,0,{fn:null,cardinality:0,optionality:b.isOptional,newBlockMarker:void 0===g||g.def!==d,casing:null,def:c.staticDefinitionSymbol||d,placeholder:void 0!==c.staticDefinitionSymbol?d:void 0,mask:d}),r=!1}function f(a,b){a.isGroup&&(a.isGroup=!1,e(a,c.groupmarker.start,0),b!==!0&&e(a,c.groupmarker.end))}function g(a,b,c,d){b.matches.length>0&&(void 0===d||d)&&(c=b.matches[b.matches.length-1],f(c)),e(b,a)}function h(){if(t.length>0){if(m=t[t.length-1],g(k,m,o,!m.isAlternator),m.isAlternator){n=t.pop();for(var a=0;a<n.matches.length;a++)n.matches[a].isGroup=!1;t.length>0?(m=t[t.length-1],m.matches.push(n)):s.matches.push(n)}}else g(k,s,o)}function i(a){function b(a){return a===c.optionalmarker.start?a=c.optionalmarker.end:a===c.optionalmarker.end?a=c.optionalmarker.start:a===c.groupmarker.start?a=c.groupmarker.end:a===c.groupmarker.end&&(a=c.groupmarker.start),a}a.matches=a.matches.reverse();for(var d in a.matches){var e=parseInt(d);if(a.matches[d].isQuantifier&&a.matches[e+1]&&a.matches[e+1].isGroup){var f=a.matches[d];a.matches.splice(d,1),a.matches.splice(e+1,0,f)}void 0!==a.matches[d].matches?a.matches[d]=i(a.matches[d]):a.matches[d]=b(a.matches[d])}return a}for(var j,k,l,m,n,o,p,q=/(?:[?*+]|\{[0-9\+\*]+(?:,[0-9\+\*]*)?\})|[^.?*+^${[]()|\\]+|./g,r=!1,s=new d,t=[],u=[];j=q.exec(b);)if(k=j[0],r)h();else switch(k.charAt(0)){case c.escapeChar:r=!0;break;case c.optionalmarker.end:case c.groupmarker.end:if(l=t.pop(),void 0!==l)if(t.length>0){if(m=t[t.length-1],m.matches.push(l),m.isAlternator){n=t.pop();for(var v=0;v<n.matches.length;v++)n.matches[v].isGroup=!1;t.length>0?(m=t[t.length-1],m.matches.push(n)):s.matches.push(n)}}else s.matches.push(l);else h();break;case c.optionalmarker.start:t.push(new d(!1,!0));break;case c.groupmarker.start:t.push(new d(!0));break;case c.quantifiermarker.start:var w=new d(!1,!1,!0);k=k.replace(/[{}]/g,"");var x=k.split(","),y=isNaN(x[0])?x[0]:parseInt(x[0]),z=1===x.length?y:isNaN(x[1])?x[1]:parseInt(x[1]);if(("*"===z||"+"===z)&&(y="*"===z?0:1),w.quantifier={min:y,max:z},t.length>0){var A=t[t.length-1].matches;j=A.pop(),j.isGroup||(p=new d(!0),p.matches.push(j),j=p),A.push(j),A.push(w)}else j=s.matches.pop(),j.isGroup||(p=new d(!0),p.matches.push(j),j=p),s.matches.push(j),s.matches.push(w);break;case c.alternatormarker:t.length>0?(m=t[t.length-1],o=m.matches.pop()):o=s.matches.pop(),o.isAlternator?t.push(o):(n=new d(!1,!1,!1,!0),n.matches.push(o),t.push(n));break;default:h()}for(;t.length>0;)l=t.pop(),f(l,!0),s.matches.push(l);return s.matches.length>0&&(o=s.matches[s.matches.length-1],f(o),u.push(s)),c.numericInput&&i(u[0]),u}function f(f,g){if(null===f||""===f)return void 0;if(1===f.length&&c.greedy===!1&&0!==c.repeat&&(c.placeholder=""),c.repeat>0||"*"===c.repeat||"+"===c.repeat){var h="*"===c.repeat?0:"+"===c.repeat?1:c.repeat;f=c.groupmarker.start+f+c.groupmarker.end+c.quantifiermarker.start+h+","+c.repeat+c.quantifiermarker.end}var i;return void 0===b.prototype.masksCache[f]||d===!0?(i={mask:f,maskToken:e(f),validPositions:{},_buffer:void 0,buffer:void 0,tests:{},metadata:g},d!==!0&&(b.prototype.masksCache[c.numericInput?f.split("").reverse().join(""):f]=i,i=a.extend(!0,{},b.prototype.masksCache[c.numericInput?f.split("").reverse().join(""):f]))):i=a.extend(!0,{},b.prototype.masksCache[c.numericInput?f.split("").reverse().join(""):f]),i}function g(a){return a=a.toString()}var h;if(a.isFunction(c.mask)&&(c.mask=c.mask(c)),a.isArray(c.mask)){if(c.mask.length>1){c.keepStatic=null===c.keepStatic?!0:c.keepStatic;var i="(";return a.each(c.numericInput?c.mask.reverse():c.mask,function(b,c){i.length>1&&(i+=")|("),i+=g(void 0===c.mask||a.isFunction(c.mask)?c:c.mask)}),i+=")",f(i,c.mask)}c.mask=c.mask.pop()}return c.mask&&(h=void 0===c.mask.mask||a.isFunction(c.mask.mask)?f(g(c.mask),c.mask):f(g(c.mask.mask),c.mask)),h}function h(e,f,g){function i(a,b,c){b=b||0;var d,e,f,h=[],i=0,j=o();do{if(a===!0&&m().validPositions[i]){var k=m().validPositions[i];e=k.match,d=k.locator.slice(),h.push(c===!0?k.input:I(i,e))}else f=r(i,d,i-1),e=f.match,d=f.locator.slice(),(g.jitMasking===!1||j>i||isFinite(g.jitMasking)&&g.jitMasking>i)&&h.push(I(i,e));i++}while((void 0===ma||ma>i-1)&&null!==e.fn||null===e.fn&&""!==e.def||b>=i);return""===h[h.length-1]&&h.pop(),h}function m(){return f}function n(a){var b=m();b.buffer=void 0,a!==!0&&(b.tests={},b._buffer=void 0,b.validPositions={},b.p=0)}function o(a,b){var c=-1,d=-1,e=m().validPositions;void 0===a&&(a=-1);for(var f in e){var g=parseInt(f);e[g]&&(b||null!==e[g].match.fn)&&(a>=g&&(c=g),g>=a&&(d=g))}return-1!==c&&a-c>1||a>d?c:d}function p(b,c,d){if(g.insertMode&&void 0!==m().validPositions[b]&&void 0===d){var e,f=a.extend(!0,{},m().validPositions),h=o();for(e=b;h>=e;e++)delete m().validPositions[e];m().validPositions[b]=c;var i,j=!0,k=m().validPositions;for(e=i=b;h>=e;e++){var l=f[e];if(void 0!==l)for(var p=i,q=-1;p<D()&&(null==l.match.fn&&k[e]&&(k[e].match.optionalQuantifier===!0||k[e].match.optionality===!0)||null!=l.match.fn);){if(null===l.match.fn||!g.keepStatic&&k[e]&&(void 0!==k[e+1]&&v(e+1,k[e].locator.slice(),e).length>1||void 0!==k[e].alternation)?p++:p=E(i),t(p,l.match.def)){var r=B(p,l.input,!0,!0);j=r!==!1,i=r.caret||r.insert?o():p;break}if(j=null==l.match.fn,q===p)break;q=p}if(!j)break}if(!j)return m().validPositions=a.extend(!0,{},f),n(!0),!1}else m().validPositions[b]=c;return n(!0),!0}function q(a,b,c,d){var e,f=a;for(m().p=a,e=f;b>e;e++)void 0!==m().validPositions[e]&&(c===!0||g.canClearPosition(m(),e,o(),d,g)!==!1)&&delete m().validPositions[e];for(e=f+1;e<=o();){for(;void 0!==m().validPositions[f];)f++;var h=m().validPositions[f];if(f>e&&(e=f+1),void 0===m().validPositions[e]&&C(e)||void 0!==h)e++;else{var i=r(e);t(f,i.match.def)?B(f,i.input||I(e),!0)!==!1&&(delete m().validPositions[e],e++):C(e)||(e++,f--),f++}}var j=o(),k=D();for(d!==!0&&c!==!0&&void 0!==m().validPositions[j]&&m().validPositions[j].input===g.radixPoint&&delete m().validPositions[j],e=j+1;k>=e;e++)m().validPositions[e]&&delete m().validPositions[e];n(!0)}function r(a,b,c){var d=m().validPositions[a];if(void 0===d)for(var e=v(a,b,c),f=o(),h=m().validPositions[f]||v(0)[0],i=void 0!==h.alternation?h.locator[h.alternation].toString().split(","):[],j=0;j<e.length&&(d=e[j],!(d.match&&(g.greedy&&d.match.optionalQuantifier!==!0||(d.match.optionality===!1||d.match.newBlockMarker===!1)&&d.match.optionalQuantifier!==!0)&&(void 0===h.alternation||h.alternation!==d.alternation||void 0!==d.locator[h.alternation]&&A(d.locator[h.alternation].toString().split(","),i))));j++);return d}function s(a){return m().validPositions[a]?m().validPositions[a].match:v(a)[0].match}function t(a,b){for(var c=!1,d=v(a),e=0;e<d.length;e++)if(d[e].match&&d[e].match.def===b){c=!0;break}return c}function u(b,c){var d,e;return(m().tests[b]||m().validPositions[b])&&a.each(m().tests[b]||[m().validPositions[b]],function(a,b){var f=b.alternation?b.locator[b.alternation].toString().indexOf(c):-1;(void 0===e||e>f)&&-1!==f&&(d=b,e=f)}),d}function v(b,c,d){function e(c,d,f,h){function j(f,h,o){function p(b,c){var d=0===a.inArray(b,c.matches);return d||a.each(c.matches,function(a,e){return e.isQuantifier===!0&&(d=p(b,c.matches[a-1]))?!1:void 0}),d}function q(a,b){var c=u(a,b);return c?c.locator.slice(c.alternation+1):[]}if(i>1e4)throw"Inputmask: There is probably an error in your mask definition or in the code. Create an issue on github with an example of the mask you are using. "+m().mask;if(i===b&&void 0===f.matches)return k.push({match:f,locator:h.reverse(),cd:n}),!0;if(void 0!==f.matches){if(f.isGroup&&o!==f){if(f=j(c.matches[a.inArray(f,c.matches)+1],h))return!0}else if(f.isOptional){var r=f;if(f=e(f,d,h,o)){if(g=k[k.length-1].match,!p(g,r))return!0;l=!0,i=b}}else if(f.isAlternator){var s,t=f,v=[],w=k.slice(),x=h.length,y=d.length>0?d.shift():-1;if(-1===y||"string"==typeof y){var z,A=i,B=d.slice(),C=[];if("string"==typeof y)C=y.split(",");else for(z=0;z<t.matches.length;z++)C.push(z);for(var D=0;D<C.length;D++){if(z=parseInt(C[D]),k=[],d=q(i,z),f=j(t.matches[z]||c.matches[z],[z].concat(h),o)||f,f!==!0&&void 0!==f&&C[C.length-1]<t.matches.length){var E=a.inArray(f,c.matches)+1;c.matches.length>E&&(f=j(c.matches[E],[E].concat(h.slice(1,h.length)),o),f&&(C.push(E.toString()),a.each(k,function(a,b){b.alternation=h.length-1})))}s=k.slice(),i=A,k=[];for(var F=0;F<B.length;F++)d[F]=B[F];for(var G=0;G<s.length;G++){var H=s[G];H.alternation=H.alternation||x;for(var I=0;I<v.length;I++){var J=v[I];if(H.match.def===J.match.def&&("string"!=typeof y||-1!==a.inArray(H.locator[H.alternation].toString(),C))){H.match.mask===J.match.mask&&(s.splice(G,1),G--),-1===J.locator[H.alternation].toString().indexOf(H.locator[H.alternation])&&(J.locator[H.alternation]=J.locator[H.alternation]+","+H.locator[H.alternation],J.alternation=H.alternation);break}}}v=v.concat(s)}"string"==typeof y&&(v=a.map(v,function(b,c){if(isFinite(c)){var d,e=b.alternation,f=b.locator[e].toString().split(",");b.locator[e]=void 0,b.alternation=void 0;for(var g=0;g<f.length;g++)d=-1!==a.inArray(f[g],C),d&&(void 0!==b.locator[e]?(b.locator[e]+=",",b.locator[e]+=f[g]):b.locator[e]=parseInt(f[g]),b.alternation=e);if(void 0!==b.locator[e])return b}})),k=w.concat(v),i=b,l=k.length>0}else f=j(t.matches[y]||c.matches[y],[y].concat(h),o);if(f)return!0}else if(f.isQuantifier&&o!==c.matches[a.inArray(f,c.matches)-1])for(var K=f,L=d.length>0?d.shift():0;L<(isNaN(K.quantifier.max)?L+1:K.quantifier.max)&&b>=i;L++){var M=c.matches[a.inArray(K,c.matches)-1];if(f=j(M,[L].concat(h),M)){if(g=k[k.length-1].match,g.optionalQuantifier=L>K.quantifier.min-1,p(g,M)){if(L>K.quantifier.min-1){l=!0,i=b;break}return!0}return!0}}else if(f=e(f,d,h,o))return!0}else i++}for(var o=d.length>0?d.shift():0;o<c.matches.length;o++)if(c.matches[o].isQuantifier!==!0){var p=j(c.matches[o],[o].concat(f),h);if(p&&i===b)return p;if(i>b)break}}function f(a){var b=a[0]||a;return b.locator.slice()}var g,h=m().maskToken,i=c?d:0,j=c||[0],k=[],l=!1,n=c?c.join(""):"";if(b>-1){if(void 0===c){for(var o,p=b-1;void 0===(o=m().validPositions[p]||m().tests[p])&&p>-1;)p--;void 0!==o&&p>-1&&(j=f(o),n=j.join(""),o=o[0]||o,i=p)}if(m().tests[b]&&m().tests[b][0].cd===n)return m().tests[b];for(var q=j.shift();q<h.length;q++){var r=e(h[q],j,[q]);if(r&&i===b||i>b)break}}return(0===k.length||l)&&k.push({match:{fn:null,cardinality:0,optionality:!0,casing:null,def:""},locator:[]}),m().tests[b]=a.extend(!0,[],k),m().tests[b]}function w(){return void 0===m()._buffer&&(m()._buffer=i(!1,1)),m()._buffer}function x(a){if(void 0===m().buffer||a===!0){if(a===!0)for(var b in m().tests)void 0===m().validPositions[b]&&delete m().tests[b];m().buffer=i(!0,o(),!0)}return m().buffer}function y(a,b,c){var d;if(c=c,a===!0)n(),a=0,b=c.length;else for(d=a;b>d;d++)delete m().validPositions[d],delete m().tests[d];for(d=a;b>d;d++)n(!0),c[d]!==g.skipOptionalPartCharacter&&B(d,c[d],!0,!0)}function z(a,b){switch(b.casing){case"upper":a=a.toUpperCase();break;case"lower":a=a.toLowerCase()}return a}function A(b,c){for(var d=g.greedy?c:c.slice(0,1),e=!1,f=0;f<b.length;f++)if(-1!==a.inArray(b[f],d)){e=!0;break}return e}function B(b,c,d,e){function f(b,c,d,e){var f=!1;return a.each(v(b),function(h,i){for(var j=i.match,k=c?1:0,l="",r=j.cardinality;r>k;r--)l+=G(b-(r-1));if(c&&(l+=c),x(!0),f=null!=j.fn?j.fn.test(l,m(),b,d,g):c!==j.def&&c!==g.skipOptionalPartCharacter||""===j.def?!1:{c:j.placeholder||j.def,pos:b},f!==!1){var s=void 0!==f.c?f.c:c;s=s===g.skipOptionalPartCharacter&&null===j.fn?j.placeholder||j.def:s;var t=b,u=x();if(void 0!==f.remove&&(a.isArray(f.remove)||(f.remove=[f.remove]),a.each(f.remove.sort(function(a,b){return b-a}),function(a,b){q(b,b+1,!0)})),void 0!==f.insert&&(a.isArray(f.insert)||(f.insert=[f.insert]),a.each(f.insert.sort(function(a,b){return a-b}),function(a,b){B(b.pos,b.c,!1,e)})),f.refreshFromBuffer){var v=f.refreshFromBuffer;if(d=!0,y(v===!0?v:v.start,v.end,u),void 0===f.pos&&void 0===f.c)return f.pos=o(),!1;if(t=void 0!==f.pos?f.pos:b,t!==b)return f=a.extend(f,B(t,s,!0,e)),!1}else if(f!==!0&&void 0!==f.pos&&f.pos!==b&&(t=f.pos,y(b,t,x().slice()),t!==b))return f=a.extend(f,B(t,s,!0)),!1;return f!==!0&&void 0===f.pos&&void 0===f.c?!1:(h>0&&n(!0),p(t,a.extend({},i,{input:z(s,j)}),e)||(f=!1),!1)}}),f}function h(b,c,d,e){for(var f,h,i,j,k,l,p=a.extend(!0,{},m().validPositions),q=a.extend(!0,{},m().tests),s=o();s>=0&&(j=m().validPositions[s],!j||void 0===j.alternation||(f=s,h=m().validPositions[f].alternation,r(f).locator[j.alternation]===j.locator[j.alternation]));s--);if(void 0!==h){f=parseInt(f);for(var t in m().validPositions)if(t=parseInt(t),j=m().validPositions[t],t>=f&&void 0!==j.alternation){var v;0===f?(v=[],a.each(m().tests[f],function(a,b){void 0!==b.locator[h]&&(v=v.concat(b.locator[h].toString().split(",")))})):v=m().validPositions[f].locator[h].toString().split(",");var w=void 0!==j.locator[h]?j.locator[h]:v[0];w.length>0&&(w=w.split(",")[0]);for(var x=0;x<v.length;x++){var y=[],z=0,A=0;if(w<v[x]){for(var C,D,E=t;E>=0;E--)if(C=m().validPositions[E],void 0!==C){var F=u(E,v[x]);m().validPositions[E].match.def!==F.match.def&&(y.push(m().validPositions[E].input),m().validPositions[E]=F,m().validPositions[E].input=I(E),null===m().validPositions[E].match.fn&&A++,C=F),D=C.locator[h],C.locator[h]=parseInt(v[x]);break}if(w!==C.locator[h]){for(k=t+1;k<o(void 0,!0)+1;k++)l=m().validPositions[k],l&&null!=l.match.fn?y.push(l.input):b>k&&z++,delete m().validPositions[k],delete m().tests[k];for(n(!0),g.keepStatic=!g.keepStatic,i=!0;y.length>0;){var G=y.shift();if(G!==g.skipOptionalPartCharacter&&!(i=B(o(void 0,!0)+1,G,!1,e)))break}if(C.alternation=h,C.locator[h]=D,i){var H=o(b)+1;for(k=t+1;k<o()+1;k++)l=m().validPositions[k],(void 0===l||null==l.match.fn)&&b>k&&A++;b+=A-z,i=B(b>H?H:b,c,d,e)}if(g.keepStatic=!g.keepStatic,i)return i;n(),m().validPositions=a.extend(!0,{},p),m().tests=a.extend(!0,{},q)}}}break}}return!1}function i(b,c){for(var d=m().validPositions[c],e=d.locator,f=e.length,g=b;c>g;g++)if(void 0===m().validPositions[g]&&!C(g,!0)){var h=v(g),i=h[0],j=-1;a.each(h,function(a,b){for(var c=0;f>c&&(void 0!==b.locator[c]&&A(b.locator[c].toString().split(","),e[c].toString().split(",")));c++)c>j&&(j=c,i=b)}),p(g,a.extend({},i,{input:i.match.placeholder||i.match.def}),!0)}}d=d===!0;for(var j=x(),k=b-1;k>-1&&!m().validPositions[k];k--);for(k++;b>k;k++)void 0===m().validPositions[k]&&((!C(k)||j[k]!==I(k))&&v(k).length>1||j[k]===g.radixPoint||"0"===j[k]&&a.inArray(g.radixPoint,j)<k)&&f(k,j[k],!0,e);var l=b,s=!1,t=a.extend(!0,{},m().validPositions);if(l<D()&&(s=f(l,c,d,e),(!d||e===!0)&&s===!1)){var w=m().validPositions[l];if(!w||null!==w.match.fn||w.match.def!==c&&c!==g.skipOptionalPartCharacter){if((g.insertMode||void 0===m().validPositions[E(l)])&&!C(l,!0)){var F=r(l).match,F=F.placeholder||F.def;f(l,F,d,e);for(var H=l+1,J=E(l);J>=H;H++)if(s=f(H,c,d,e),s!==!1){i(l,H),l=H;break}}}else s={caret:E(l)}}if(s===!1&&g.keepStatic&&(s=h(b,c,d,e)),s===!0&&(s={pos:l}),a.isFunction(g.postValidation)&&s!==!1&&!d&&e!==!0){var K=g.postValidation(x(!0),s,g);if(K){if(K.refreshFromBuffer){var L=K.refreshFromBuffer;y(L===!0?L:L.start,L.end,K.buffer),n(!0),s=K}}else n(!0),m().validPositions=a.extend(!0,{},t),s=!1}return s}function C(a,b){var c;if(b?(c=r(a).match,""==c.def&&(c=s(a))):c=s(a),null!=c.fn)return c.fn;if(b!==!0&&a>-1&&!g.keepStatic&&void 0===m().validPositions[a]){var d=v(a);return d.length>2}return!1}function D(){var a;ma=void 0!==ka?ka.maxLength:void 0,-1===ma&&(ma=void 0);var b,c=o(),d=m().validPositions[c],e=void 0!==d?d.locator.slice():void 0;for(b=c+1;void 0===d||null!==d.match.fn||null===d.match.fn&&""!==d.match.def;b++)d=r(b,e,b-1),e=d.locator.slice();var f=s(b-1);return a=""!==f.def?b:b-1,void 0===ma||ma>a?a:ma}function E(a,b){var c=D();if(a>=c)return c;for(var d=a;++d<c&&(b===!0&&(s(d).newBlockMarker!==!0||!C(d))||b!==!0&&!C(d)&&(g.nojumps!==!0||g.nojumpsThreshold>d)););return d}function F(a,b){var c=a;if(0>=c)return 0;for(;--c>0&&(b===!0&&s(c).newBlockMarker!==!0||b!==!0&&!C(c)););return c}function G(a){return void 0===m().validPositions[a]?I(a):m().validPositions[a].input}function H(b,c,d,e,f){if(e&&a.isFunction(g.onBeforeWrite)){var h=g.onBeforeWrite(e,c,d,g);if(h){if(h.refreshFromBuffer){var i=h.refreshFromBuffer;y(i===!0?i:i.start,i.end,h.buffer||c),c=x(!0)}void 0!==d&&(d=void 0!==h.caret?h.caret:d)}}b.inputmask._valueSet(c.join("")),void 0===d||void 0!==e&&"blur"===e.type||L(b,d),f===!0&&(qa=!0,a(b).trigger("input"))}function I(a,b){if(b=b||s(a),void 0!==b.placeholder)return b.placeholder;if(null===b.fn){if(a>-1&&!g.keepStatic&&void 0===m().validPositions[a]){var c,d=v(a),e=0;if(d.length>2)for(var f=0;f<d.length;f++)if(d[f].match.optionality!==!0&&d[f].match.optionalQuantifier!==!0&&(null===d[f].match.fn||void 0===c||d[f].match.fn.test(c.match.def,m(),a,!0,g)!==!1)&&(e++,null===d[f].match.fn&&(c=d[f]),e>1))return g.placeholder.charAt(a%g.placeholder.length)}return b.def}return g.placeholder.charAt(a%g.placeholder.length)}function J(c,d,e,f){function h(){var a=!1,b=w().slice(k,E(k)).join("").indexOf(j);if(-1!==b&&!C(k)){a=!0;for(var c=w().slice(k,k+b),d=0;d<c.length;d++)if(" "!==c[d]){a=!1;break}}return a}var i=f.slice(),j="",k=0;if(n(),m().p=E(-1),!e)if(g.autoUnmask!==!0){var l=w().slice(0,E(-1)).join(""),p=i.join("").match(new RegExp("^"+b.escapeRegex(l),"g"));p&&p.length>0&&(i.splice(0,p.length*l.length),k=E(k))}else k=E(k);a.each(i,function(b,d){if(void 0!==d){var f=new a.Event("keypress");f.which=d.charCodeAt(0),j+=d;var i=o(void 0,!0),l=m().validPositions[i],n=r(i+1,l?l.locator.slice():void 0,i);if(!h()||e||g.autoUnmask){var p=e?b:null==n.match.fn&&n.match.optionality&&i+1<m().p?i+1:m().p;T.call(c,f,!0,!1,e,p),k=p+1,j=""}else T.call(c,f,!0,!1,!0,i+1)}}),d&&H(c,x(),document.activeElement===c?E(o(0)):void 0,new a.Event("checkval"))}function K(b){if(b&&void 0===b.inputmask)return b.value;var c=[],d=m().validPositions;for(var e in d)d[e].match&&null!=d[e].match.fn&&c.push(d[e].input);var f=0===c.length?null:(oa?c.reverse():c).join("");if(null!==f){var h=(oa?x().slice().reverse():x()).join("");a.isFunction(g.onUnMask)&&(f=g.onUnMask(h,f,g)||f)}return f}function L(a,b,c,d){function e(a){if(d!==!0&&oa&&"number"==typeof a&&(!g.greedy||""!==g.placeholder)){var b=x().join("").length;a=b-a}return a}var f;if("number"!=typeof b)return a.setSelectionRange?(b=a.selectionStart,c=a.selectionEnd):window.getSelection?(f=window.getSelection().getRangeAt(0),(f.commonAncestorContainer.parentNode===a||f.commonAncestorContainer===a)&&(b=f.startOffset,c=f.endOffset)):document.selection&&document.selection.createRange&&(f=document.selection.createRange(),b=0-f.duplicate().moveStart("character",-1e5),c=b+f.text.length),{begin:e(b),end:e(c)};b=e(b),c=e(c),c="number"==typeof c?c:b;var h=parseInt(((a.ownerDocument.defaultView||window).getComputedStyle?(a.ownerDocument.defaultView||window).getComputedStyle(a,null):a.currentStyle).fontSize)*c;if(a.scrollLeft=h>a.scrollWidth?h:0,j||g.insertMode!==!1||b!==c||c++,a.setSelectionRange)a.selectionStart=b,a.selectionEnd=c;else if(window.getSelection){if(f=document.createRange(),void 0===a.firstChild||null===a.firstChild){var i=document.createTextNode("");a.appendChild(i)}f.setStart(a.firstChild,b<a.inputmask._valueGet().length?b:a.inputmask._valueGet().length),f.setEnd(a.firstChild,c<a.inputmask._valueGet().length?c:a.inputmask._valueGet().length),f.collapse(!0);var k=window.getSelection();k.removeAllRanges(),k.addRange(f)}else a.createTextRange&&(f=a.createTextRange(),f.collapse(!0),f.moveEnd("character",c),f.moveStart("character",b),f.select())}function M(b){var c,d,e=x(),f=e.length,g=o(),h={},i=m().validPositions[g],j=void 0!==i?i.locator.slice():void 0;for(c=g+1;c<e.length;c++)d=r(c,j,c-1),j=d.locator.slice(),h[c]=a.extend(!0,{},d);var k=i&&void 0!==i.alternation?i.locator[i.alternation]:void 0;for(c=f-1;c>g&&(d=h[c],(d.match.optionality||d.match.optionalQuantifier||k&&(k!==h[c].locator[i.alternation]&&null!=d.match.fn||null===d.match.fn&&d.locator[i.alternation]&&A(d.locator[i.alternation].toString().split(","),k.toString().split(","))&&""!==v(c)[0].def))&&e[c]===I(c,d.match));c--)f--;return b?{l:f,def:h[f]?h[f].match:void 0}:f}function N(a){for(var b=M(),c=a.length-1;c>b&&!C(c);c--);return a.splice(b,c+1-b),a}function O(b){if(a.isFunction(g.isComplete))return g.isComplete(b,g);if("*"===g.repeat)return void 0;var c=!1,d=M(!0),e=F(d.l);if(void 0===d.def||d.def.newBlockMarker||d.def.optionality||d.def.optionalQuantifier){c=!0;for(var f=0;e>=f;f++){var h=r(f).match;if(null!==h.fn&&void 0===m().validPositions[f]&&h.optionality!==!0&&h.optionalQuantifier!==!0||null===h.fn&&b[f]!==I(f,h)){c=!1;break}}}return c}function P(a,b){return oa?a-b>1||a-b===1&&g.insertMode:b-a>1||b-a===1&&g.insertMode}function Q(b){function c(b){if(a.valHooks&&(void 0===a.valHooks[b]||a.valHooks[b].inputmaskpatch!==!0)){var c=a.valHooks[b]&&a.valHooks[b].get?a.valHooks[b].get:function(a){return a.value},d=a.valHooks[b]&&a.valHooks[b].set?a.valHooks[b].set:function(a,b){return a.value=b,a};a.valHooks[b]={get:function(a){if(a.inputmask){if(a.inputmask.opts.autoUnmask)return a.inputmask.unmaskedvalue();var b=c(a),d=a.inputmask.maskset,e=d._buffer;return e=e?e.join(""):"",b!==e?b:""}return c(a)},set:function(b,c){var e,f=a(b);return e=d(b,c),b.inputmask&&f.trigger("setvalue"),e},inputmaskpatch:!0}}}function d(){return this.inputmask?this.inputmask.opts.autoUnmask?this.inputmask.unmaskedvalue():h.call(this)!==w().join("")?document.activeElement===this&&g.clearMaskOnLostFocus?(oa?N(x().slice()).reverse():N(x().slice())).join(""):h.call(this):"":h.call(this)}function e(b){i.call(this,b),this.inputmask&&a(this).trigger("setvalue")}function f(b){ua.on(b,"mouseenter",function(b){var c=a(this),d=this,e=d.inputmask._valueGet();e!==x().join("")&&o()>0&&c.trigger("setvalue")})}var h,i;b.inputmask.__valueGet||(Object.getOwnPropertyDescriptor&&void 0===b.value?(h=function(){return this.textContent},i=function(a){this.textContent=a},Object.defineProperty(b,"value",{get:d,set:e})):document.__lookupGetter__&&b.__lookupGetter__("value")?(h=b.__lookupGetter__("value"),i=b.__lookupSetter__("value"),b.__defineGetter__("value",d),b.__defineSetter__("value",e)):(h=function(){return b.value},i=function(a){b.value=a},c(b.type),f(b)),b.inputmask.__valueGet=h,b.inputmask._valueGet=function(a){return oa&&a!==!0?h.call(this.el).split("").reverse().join(""):h.call(this.el)},b.inputmask.__valueSet=i,b.inputmask._valueSet=function(a,b){i.call(this.el,null===a||void 0===a?"":b!==!0&&oa?a.split("").reverse().join(""):a)})}function R(c,d,e,f){function h(){if(g.keepStatic){n(!0);var b,d=[],e=a.extend(!0,{},m().validPositions);for(b=o();b>=0;b--){var f=m().validPositions[b];if(f&&(null!=f.match.fn&&d.push(f.input),delete m().validPositions[b],void 0!==f.alternation&&f.locator[f.alternation]===r(b).locator[f.alternation]))break}if(b>-1)for(;d.length>0;){m().p=E(o());var h=new a.Event("keypress");h.which=d.pop().charCodeAt(0),T.call(c,h,!0,!1,!1,m().p)}else m().validPositions=a.extend(!0,{},e)}}if((g.numericInput||oa)&&(d===b.keyCode.BACKSPACE?d=b.keyCode.DELETE:d===b.keyCode.DELETE&&(d=b.keyCode.BACKSPACE),oa)){var i=e.end;e.end=e.begin,e.begin=i}d===b.keyCode.BACKSPACE&&(e.end-e.begin<1||g.insertMode===!1)?(e.begin=F(e.begin),void 0===m().validPositions[e.begin]||m().validPositions[e.begin].input!==g.groupSeparator&&m().validPositions[e.begin].input!==g.radixPoint||e.begin--):d===b.keyCode.DELETE&&e.begin===e.end&&(e.end=C(e.end)?e.end+1:E(e.end)+1,void 0===m().validPositions[e.begin]||m().validPositions[e.begin].input!==g.groupSeparator&&m().validPositions[e.begin].input!==g.radixPoint||e.end++),q(e.begin,e.end,!1,f),f!==!0&&h();var j=o(e.begin);j<e.begin?(-1===j&&n(),m().p=E(j)):f!==!0&&(m().p=e.begin)}function S(d){var e=this,f=a(e),h=d.keyCode,i=L(e);if(h===b.keyCode.BACKSPACE||h===b.keyCode.DELETE||l&&127===h||d.ctrlKey&&88===h&&!c("cut"))d.preventDefault(),88===h&&(ia=x().join("")),R(e,h,i),H(e,x(),m().p,d,ia!==x().join("")),e.inputmask._valueGet()===w().join("")?f.trigger("cleared"):O(x())===!0&&f.trigger("complete"),g.showTooltip&&(e.title=g.tooltip||m().mask);else if(h===b.keyCode.END||h===b.keyCode.PAGE_DOWN){d.preventDefault();var j=E(o());g.insertMode||j!==D()||d.shiftKey||j--,L(e,d.shiftKey?i.begin:j,j,!0)}else h===b.keyCode.HOME&&!d.shiftKey||h===b.keyCode.PAGE_UP?(d.preventDefault(),L(e,0,d.shiftKey?i.begin:0,!0)):(g.undoOnEscape&&h===b.keyCode.ESCAPE||90===h&&d.ctrlKey)&&d.altKey!==!0?(J(e,!0,!1,ia.split("")),f.trigger("click")):h!==b.keyCode.INSERT||d.shiftKey||d.ctrlKey?g.tabThrough===!0&&h===b.keyCode.TAB?(d.shiftKey===!0?(null===s(i.begin).fn&&(i.begin=E(i.begin)),i.end=F(i.begin,!0),i.begin=F(i.end,!0)):(i.begin=E(i.begin,!0),i.end=E(i.begin,!0),i.end<D()&&i.end--),i.begin<D()&&(d.preventDefault(),L(e,i.begin,i.end))):g.insertMode!==!1||d.shiftKey||(h===b.keyCode.RIGHT?setTimeout(function(){var a=L(e);L(e,a.begin)},0):h===b.keyCode.LEFT&&setTimeout(function(){var a=L(e);L(e,oa?a.begin+1:a.begin-1)},0)):(g.insertMode=!g.insertMode,L(e,g.insertMode||i.begin!==D()?i.begin:i.begin-1));g.onKeyDown.call(this,d,x(),L(e).begin,g),ra=-1!==a.inArray(h,g.ignorables)}function T(c,d,e,f,h){var i=this,j=a(i),k=c.which||c.charCode||c.keyCode;if(!(d===!0||c.ctrlKey&&c.altKey)&&(c.ctrlKey||c.metaKey||ra))return k===b.keyCode.ENTER&&ia!==x().join("")&&(ia=x().join(""),setTimeout(function(){j.trigger("change")},0)),!0;if(k){46===k&&c.shiftKey===!1&&","===g.radixPoint&&(k=44);var l,o=d?{begin:h,end:h}:L(i),q=String.fromCharCode(k),r=P(o.begin,o.end);r&&(m().undoPositions=a.extend(!0,{},m().validPositions),R(i,b.keyCode.DELETE,o,!0),o.begin=m().p,g.insertMode||(g.insertMode=!g.insertMode,p(o.begin,f),g.insertMode=!g.insertMode),r=!g.multi),m().writeOutBuffer=!0;var s=oa&&!r?o.end:o.begin,t=B(s,q,f);if(t!==!1){if(t!==!0&&(s=void 0!==t.pos?t.pos:s,q=void 0!==t.c?t.c:q),n(!0),void 0!==t.caret)l=t.caret;else{var u=m().validPositions;l=!g.keepStatic&&(void 0!==u[s+1]&&v(s+1,u[s].locator.slice(),s).length>1||void 0!==u[s].alternation)?s+1:E(s)}m().p=l}if(e!==!1){var w=this;if(setTimeout(function(){g.onKeyValidation.call(w,k,t,g)},0),m().writeOutBuffer&&t!==!1){var z=x();H(i,z,g.numericInput&&void 0===t.caret?F(l):l,c,d!==!0),d!==!0&&setTimeout(function(){O(z)===!0&&j.trigger("complete")},0)}else r&&(m().buffer=void 0,m().validPositions=m().undoPositions)}else r&&(m().buffer=void 0,m().validPositions=m().undoPositions);if(g.showTooltip&&(i.title=g.tooltip||m().mask),d&&a.isFunction(g.onBeforeWrite)){var A=g.onBeforeWrite(c,x(),l,g);if(A&&A.refreshFromBuffer){var C=A.refreshFromBuffer;y(C===!0?C:C.start,C.end,A.buffer),n(!0),A.caret&&(m().p=A.caret)}}if(c.preventDefault(),d)return t}}function U(b){var c=this,d=b.originalEvent||b,e=a(c),f=c.inputmask._valueGet(!0),h=L(c),i=f.substr(0,h.begin),j=f.substr(h.end,f.length);i===w().slice(0,h.begin).join("")&&(i=""),j===w().slice(h.end).join("")&&(j=""),window.clipboardData&&window.clipboardData.getData?f=i+window.clipboardData.getData("Text")+j:d.clipboardData&&d.clipboardData.getData&&(f=i+d.clipboardData.getData("text/plain")+j);var k=f;if(a.isFunction(g.onBeforePaste)){if(k=g.onBeforePaste(f,g),k===!1)return b.preventDefault(),!1;k||(k=f)}return J(c,!1,!1,oa?k.split("").reverse():k.toString().split("")),H(c,x(),void 0,b,!0),e.trigger("click"),O(x())===!0&&e.trigger("complete"),!1}function V(c){var d=this,e=d.inputmask._valueGet();if(x().join("")!==e){var f=L(d);if(e=e.replace(new RegExp("("+b.escapeRegex(w().join(""))+")*"),""),k){var g=e.replace(x().join(""),"");if(1===g.length){var h=new a.Event("keypress");return h.which=g.charCodeAt(0),T.call(d,h,!0,!0,!1,m().validPositions[f.begin-1]?f.begin:f.begin-1),!1}}if(f.begin>e.length&&(L(d,e.length),f=L(d)),x().length-e.length!==1||e.charAt(f.begin)===x()[f.begin]||e.charAt(f.begin+1)===x()[f.begin]||C(f.begin)){for(var i=o()+1,j=x().slice(i).join("");null===e.match(b.escapeRegex(j)+"$");)j=j.slice(1);e=e.replace(j,""),e=e.split(""),J(d,!0,!1,e),O(x())===!0&&a(d).trigger("complete")}else c.keyCode=b.keyCode.BACKSPACE,S.call(d,c);c.preventDefault()}}function W(a){var b=a.originalEvent||a;ia=x().join(""),""===ja||0!==b.data.indexOf(ja)}function X(b){var c=this,d=b.originalEvent||b,e=x().join("");0===d.data.indexOf(ja)&&(n(),m().p=E(-1));for(var f=d.data,h=0;h<f.length;h++){var i=new a.Event("keypress");i.which=f.charCodeAt(h),pa=!1,ra=!1,T.call(c,i,!0,!1,!1,m().p)}e!==x().join("")&&setTimeout(function(){var a=m().p;H(c,x(),g.numericInput?F(a):a)},0),ja=d.data}function Y(a){}function Z(b){var c=this,d=c.inputmask._valueGet();J(c,!0,!1,(a.isFunction(g.onBeforeMask)?g.onBeforeMask(d,g)||d:d).split("")),ia=x().join(""),(g.clearMaskOnLostFocus||g.clearIncomplete)&&c.inputmask._valueGet()===w().join("")&&c.inputmask._valueSet("")}function $(a){var b=this,c=b.inputmask._valueGet();g.showMaskOnFocus&&(!g.showMaskOnHover||g.showMaskOnHover&&""===c)?b.inputmask._valueGet()!==x().join("")&&H(b,x(),E(o())):sa===!1&&L(b,E(o())),g.positionCaretOnTab===!0&&setTimeout(function(){L(b,E(o()))},0),ia=x().join("")}function _(a){var b=this;if(sa=!1,g.clearMaskOnLostFocus&&document.activeElement!==b){var c=x().slice(),d=b.inputmask._valueGet();d!==b.getAttribute("placeholder")&&""!==d&&(-1===o()&&d===w().join("")?c=[]:N(c),H(b,c))}}function aa(b){function c(b){if(g.radixFocus&&""!==g.radixPoint){var c=m().validPositions;if(void 0===c[b]||c[b].input===I(b)){if(b<E(-1))return!0;var d=a.inArray(g.radixPoint,x());if(-1!==d){for(var e in c)if(e>d&&c[e].input!==I(e))return!1;return!0}}}return!1}var d=this;if(document.activeElement===d){
var e=L(d);if(e.begin===e.end)if(c(e.begin))L(d,g.numericInput?E(a.inArray(g.radixPoint,x())):a.inArray(g.radixPoint,x()));else{var f=e.begin,h=o(f),i=E(h);i>f?L(d,C(f)||C(f-1)?f:E(f)):((x()[i]!==I(i)||!C(i,!0)&&s(i).def===I(i))&&(i=E(i)),L(d,i))}}}function ba(a){var b=this;setTimeout(function(){L(b,0,E(o()))},0)}function ca(c){var d=this,e=a(d),f=L(d),h=c.originalEvent||c,i=window.clipboardData||h.clipboardData,j=oa?x().slice(f.end,f.begin):x().slice(f.begin,f.end);i.setData("text",oa?j.reverse().join(""):j.join("")),document.execCommand&&document.execCommand("copy"),R(d,b.keyCode.DELETE,f),H(d,x(),m().p,c,ia!==x().join("")),d.inputmask._valueGet()===w().join("")&&e.trigger("cleared"),g.showTooltip&&(d.title=g.tooltip||m().mask)}function da(b){var c=a(this),d=this;if(d.inputmask){var e=d.inputmask._valueGet(),f=x().slice();ia!==f.join("")&&setTimeout(function(){c.trigger("change"),ia=f.join("")},0),""!==e&&(g.clearMaskOnLostFocus&&(-1===o()&&e===w().join("")?f=[]:N(f)),O(f)===!1&&(setTimeout(function(){c.trigger("incomplete")},0),g.clearIncomplete&&(n(),f=g.clearMaskOnLostFocus?[]:w().slice())),H(d,f,void 0,b))}}function ea(a){var b=this;sa=!0,document.activeElement!==b&&g.showMaskOnHover&&b.inputmask._valueGet()!==x().join("")&&H(b,x())}function fa(a){ia!==x().join("")&&la.trigger("change"),g.clearMaskOnLostFocus&&-1===o()&&ka.inputmask._valueGet&&ka.inputmask._valueGet()===w().join("")&&ka.inputmask._valueSet(""),g.removeMaskOnSubmit&&(ka.inputmask._valueSet(ka.inputmask.unmaskedvalue(),!0),setTimeout(function(){H(ka,x())},0))}function ga(a){setTimeout(function(){la.trigger("setvalue")},0)}function ha(b){if(ka=b,la=a(ka),g.showTooltip&&(ka.title=g.tooltip||m().mask),("rtl"===ka.dir||g.rightAlign)&&(ka.style.textAlign="right"),("rtl"===ka.dir||g.numericInput)&&(ka.dir="ltr",ka.removeAttribute("dir"),ka.inputmask.isRTL=!0,oa=!0),ua.off(ka),Q(ka),d(ka,g)&&(ua.on(ka,"submit",fa),ua.on(ka,"reset",ga),ua.on(ka,"mouseenter",ea),ua.on(ka,"blur",da),ua.on(ka,"focus",$),ua.on(ka,"mouseleave",_),ua.on(ka,"click",aa),ua.on(ka,"dblclick",ba),ua.on(ka,"paste",U),ua.on(ka,"dragdrop",U),ua.on(ka,"drop",U),ua.on(ka,"cut",ca),ua.on(ka,"complete",g.oncomplete),ua.on(ka,"incomplete",g.onincomplete),ua.on(ka,"cleared",g.oncleared),ua.on(ka,"keydown",S),ua.on(ka,"keypress",T),ua.on(ka,"input",V),j||(ua.on(ka,"compositionstart",W),ua.on(ka,"compositionupdate",X),ua.on(ka,"compositionend",Y))),ua.on(ka,"setvalue",Z),""!==ka.inputmask._valueGet()||g.clearMaskOnLostFocus===!1){var c=a.isFunction(g.onBeforeMask)?g.onBeforeMask(ka.inputmask._valueGet(),g)||ka.inputmask._valueGet():ka.inputmask._valueGet();J(ka,!0,!1,c.split(""));var e=x().slice();ia=e.join(""),O(e)===!1&&g.clearIncomplete&&n(),g.clearMaskOnLostFocus&&(e.join("")===w().join("")?e=[]:N(e)),H(ka,e),document.activeElement===ka&&L(ka,E(o()))}}var ia,ja,ka,la,ma,na,oa=!1,pa=!1,qa=!1,ra=!1,sa=!0,ta=!1,ua={on:function(c,d,e){var f=function(c){if(void 0===this.inputmask&&"FORM"!==this.nodeName){var d=a.data(this,"_inputmask_opts");d?new b(d).mask(this):ua.off(this)}else{if("setvalue"===c.type||!(this.disabled||this.readOnly&&!("keydown"===c.type&&c.ctrlKey&&67===c.keyCode||g.tabThrough===!1&&c.keyCode===b.keyCode.TAB))){switch(c.type){case"input":if(qa===!0||ta===!0)return qa=ta,c.preventDefault();break;case"keydown":pa=!1,qa=!1,ta=!1;break;case"keypress":if(pa===!0)return c.preventDefault();pa=!0;break;case"compositionstart":ta=!0;break;case"compositionupdate":qa=!0;break;case"compositionend":ta=!1;break;case"cut":qa=!0;break;case"click":if(k){var f=this;return setTimeout(function(){e.apply(f,arguments)},0),!1}}return e.apply(this,arguments)}c.preventDefault()}};c.inputmask.events[d]=c.inputmask.events[d]||[],c.inputmask.events[d].push(f),-1!==a.inArray(d,["submit","reset"])?null!=c.form&&a(c.form).on(d,f):a(c).on(d,f)},off:function(b,c){if(b.inputmask&&b.inputmask.events){var d;c?(d=[],d[c]=b.inputmask.events[c]):d=b.inputmask.events,a.each(d,function(c,d){for(;d.length>0;){var e=d.pop();-1!==a.inArray(c,["submit","reset"])?null!=b.form&&a(b.form).off(c,e):a(b).off(c,e)}delete b.inputmask.events[c]})}}};if(void 0!==e)switch(e.action){case"isComplete":return ka=e.el,O(x());case"unmaskedvalue":return ka=e.el,void 0!==ka&&void 0!==ka.inputmask?(f=ka.inputmask.maskset,g=ka.inputmask.opts,oa=ka.inputmask.isRTL):(na=e.value,g.numericInput&&(oa=!0),na=(a.isFunction(g.onBeforeMask)?g.onBeforeMask(na,g)||na:na).split(""),J(void 0,!1,!1,oa?na.reverse():na),a.isFunction(g.onBeforeWrite)&&g.onBeforeWrite(void 0,x(),0,g)),K(ka);case"mask":ka=e.el,f=ka.inputmask.maskset,g=ka.inputmask.opts,oa=ka.inputmask.isRTL,ia=x().join(""),ha(ka);break;case"format":return g.numericInput&&(oa=!0),na=(a.isFunction(g.onBeforeMask)?g.onBeforeMask(e.value,g)||e.value:e.value).split(""),J(void 0,!1,!1,oa?na.reverse():na),a.isFunction(g.onBeforeWrite)&&g.onBeforeWrite(void 0,x(),0,g),e.metadata?{value:oa?x().slice().reverse().join(""):x().join(""),metadata:h({action:"getmetadata"},f,g)}:oa?x().slice().reverse().join(""):x().join("");case"isValid":g.numericInput&&(oa=!0),e.value?(na=e.value.split(""),J(void 0,!1,!0,oa?na.reverse():na)):e.value=x().join("");for(var va=x(),wa=M(),xa=va.length-1;xa>wa&&!C(xa);xa--);return va.splice(wa,xa+1-wa),O(va)&&e.value===x().join("");case"getemptymask":return w();case"remove":ka=e.el,la=a(ka),f=ka.inputmask.maskset,g=ka.inputmask.opts,ka.inputmask._valueSet(K(ka)),ua.off(ka);var ya;Object.getOwnPropertyDescriptor&&(ya=Object.getOwnPropertyDescriptor(ka,"value")),ya&&ya.get?ka.inputmask.__valueGet&&Object.defineProperty(ka,"value",{get:ka.inputmask.__valueGet,set:ka.inputmask.__valueSet}):document.__lookupGetter__&&ka.__lookupGetter__("value")&&ka.inputmask.__valueGet&&(ka.__defineGetter__("value",ka.inputmask.__valueGet),ka.__defineSetter__("value",ka.inputmask.__valueSet)),ka.inputmask=void 0;break;case"getmetadata":if(a.isArray(f.metadata)){for(var za,Aa=o(),Ba=Aa;Ba>=0;Ba--)if(m().validPositions[Ba]&&void 0!==m().validPositions[Ba].alternation){za=m().validPositions[Ba].alternation;break}return void 0!==za?f.metadata[m().validPositions[Aa].locator[za]]:f.metadata[0]}return f.metadata}}b.prototype={defaults:{placeholder:"_",optionalmarker:{start:"[",end:"]"},quantifiermarker:{start:"{",end:"}"},groupmarker:{start:"(",end:")"},alternatormarker:"|",escapeChar:"\\",mask:null,oncomplete:a.noop,onincomplete:a.noop,oncleared:a.noop,repeat:0,greedy:!0,autoUnmask:!1,removeMaskOnSubmit:!1,clearMaskOnLostFocus:!0,insertMode:!0,clearIncomplete:!1,aliases:{},alias:null,onKeyDown:a.noop,onBeforeMask:null,onBeforePaste:function(b,c){return a.isFunction(c.onBeforeMask)?c.onBeforeMask(b,c):b},onBeforeWrite:null,onUnMask:null,showMaskOnFocus:!0,showMaskOnHover:!0,onKeyValidation:a.noop,skipOptionalPartCharacter:" ",showTooltip:!1,tooltip:void 0,numericInput:!1,rightAlign:!1,undoOnEscape:!0,radixPoint:"",groupSeparator:"",radixFocus:!1,nojumps:!1,nojumpsThreshold:0,keepStatic:null,positionCaretOnTab:!1,tabThrough:!1,supportsInputType:["text","tel","password"],definitions:{9:{validator:"[0-9]",cardinality:1,definitionSymbol:"*"},a:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,definitionSymbol:"*"},"*":{validator:"[0-9A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1}},ignorables:[8,9,13,19,27,33,34,35,36,37,38,39,40,45,46,93,112,113,114,115,116,117,118,119,120,121,122,123],isComplete:null,canClearPosition:a.noop,postValidation:null,staticDefinitionSymbol:void 0,jitMasking:!1},masksCache:{},mask:function(c){var d=this;return"string"==typeof c&&(c=document.getElementById(c)||document.querySelectorAll(c)),c=c.nodeName?[c]:c,a.each(c,function(c,e){var i=a.extend(!0,{},d.opts);f(e,i,a.extend(!0,{},d.userOptions));var j=g(i,d.noMasksCache);void 0!==j&&(void 0!==e.inputmask&&e.inputmask.remove(),e.inputmask=new b,e.inputmask.opts=i,e.inputmask.noMasksCache=d.noMasksCache,e.inputmask.userOptions=a.extend(!0,{},d.userOptions),e.inputmask.el=e,e.inputmask.maskset=j,e.inputmask.isRTL=!1,a.data(e,"_inputmask_opts",i),h({action:"mask",el:e}))}),c&&c[0]?c[0].inputmask||this:this},option:function(b){return"string"==typeof b?this.opts[b]:"object"==typeof b?(a.extend(this.opts,b),a.extend(this.userOptions,b),this.el&&(void 0!==b.mask||void 0!==b.alias?this.mask(this.el):(a.data(this.el,"_inputmask_opts",this.opts),h({action:"mask",el:this.el}))),this):void 0},unmaskedvalue:function(a){return h({action:"unmaskedvalue",el:this.el,value:a},this.el&&this.el.inputmask?this.el.inputmask.maskset:g(this.opts,this.noMasksCache),this.opts)},remove:function(){return this.el?(h({action:"remove",el:this.el}),this.el.inputmask=void 0,this.el):void 0},getemptymask:function(){return h({action:"getemptymask"},this.maskset||g(this.opts,this.noMasksCache),this.opts)},hasMaskedValue:function(){return!this.opts.autoUnmask},isComplete:function(){return h({action:"isComplete",el:this.el},this.maskset||g(this.opts,this.noMasksCache),this.opts)},getmetadata:function(){return h({action:"getmetadata"},this.maskset||g(this.opts,this.noMasksCache),this.opts)},isValid:function(a){return h({action:"isValid",value:a},this.maskset||g(this.opts,this.noMasksCache),this.opts)},format:function(a,b){return h({action:"format",value:a,metadata:b},this.maskset||g(this.opts,this.noMasksCache),this.opts)}},b.extendDefaults=function(c){a.extend(!0,b.prototype.defaults,c)},b.extendDefinitions=function(c){a.extend(!0,b.prototype.defaults.definitions,c)},b.extendAliases=function(c){a.extend(!0,b.prototype.defaults.aliases,c)},b.format=function(a,c,d){return b(c).format(a,d)},b.unmask=function(a,c){return b(c).unmaskedvalue(a)},b.isValid=function(a,c){return b(c).isValid(a)},b.remove=function(b){a.each(b,function(a,b){b.inputmask&&b.inputmask.remove()})},b.escapeRegex=function(a){var b=["/",".","*","+","?","|","(",")","[","]","{","}","\\","$","^"];return a.replace(new RegExp("(\\"+b.join("|\\")+")","gim"),"\\$1")},b.keyCode={ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91};var i=navigator.userAgent,j=/mobile/i.test(i),k=/iemobile/i.test(i),l=/iphone/i.test(i)&&!k;/android.*safari.*/i.test(i)&&!k;return window.Inputmask=b,b}(jQuery),function(a,b){return void 0===a.fn.inputmask&&(a.fn.inputmask=function(c,d){var e,f=this[0];if(d=d||{},"string"==typeof c)switch(c){case"unmaskedvalue":return f&&f.inputmask?f.inputmask.unmaskedvalue():a(f).val();case"remove":return this.each(function(){this.inputmask&&this.inputmask.remove()});case"getemptymask":return f&&f.inputmask?f.inputmask.getemptymask():"";case"hasMaskedValue":return f&&f.inputmask?f.inputmask.hasMaskedValue():!1;case"isComplete":return f&&f.inputmask?f.inputmask.isComplete():!0;case"getmetadata":return f&&f.inputmask?f.inputmask.getmetadata():void 0;case"setvalue":a(f).val(d),f&&void 0!==f.inputmask&&a(f).triggerHandler("setvalue");break;case"option":if("string"!=typeof d)return this.each(function(){return void 0!==this.inputmask?this.inputmask.option(d):void 0});if(f&&void 0!==f.inputmask)return f.inputmask.option(d);break;default:return d.alias=c,e=new b(d),this.each(function(){e.mask(this)})}else{if("object"==typeof c)return e=new b(c),void 0===c.mask&&void 0===c.alias?this.each(function(){return void 0!==this.inputmask?this.inputmask.option(c):void e.mask(this)}):this.each(function(){e.mask(this)});if(void 0===c)return this.each(function(){e=new b(d),e.mask(this)})}}),a.fn.inputmask}(jQuery,Inputmask),function(a,b){return b.extendDefinitions({h:{validator:"[01][0-9]|2[0-3]",cardinality:2,prevalidator:[{validator:"[0-2]",cardinality:1}]},s:{validator:"[0-5][0-9]",cardinality:2,prevalidator:[{validator:"[0-5]",cardinality:1}]},d:{validator:"0[1-9]|[12][0-9]|3[01]",cardinality:2,prevalidator:[{validator:"[0-3]",cardinality:1}]},m:{validator:"0[1-9]|1[012]",cardinality:2,prevalidator:[{validator:"[01]",cardinality:1}]},y:{validator:"(19|20)\\d{2}",cardinality:4,prevalidator:[{validator:"[12]",cardinality:1},{validator:"(19|20)",cardinality:2},{validator:"(19|20)\\d",cardinality:3}]}}),b.extendAliases({"dd/mm/yyyy":{mask:"1/2/y",placeholder:"dd/mm/yyyy",regex:{val1pre:new RegExp("[0-3]"),val1:new RegExp("0[1-9]|[12][0-9]|3[01]"),val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|[12][0-9]|3[01])"+c+"[01])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|[12][0-9])"+c+"(0[1-9]|1[012]))|(30"+c+"(0[13-9]|1[012]))|(31"+c+"(0[13578]|1[02]))")}},leapday:"29/02/",separator:"/",yearrange:{minyear:1900,maxyear:2099},isInYearRange:function(a,b,c){if(isNaN(a))return!1;var d=parseInt(a.concat(b.toString().slice(a.length))),e=parseInt(a.concat(c.toString().slice(a.length)));return(isNaN(d)?!1:d>=b&&c>=d)||(isNaN(e)?!1:e>=b&&c>=e)},determinebaseyear:function(a,b,c){var d=(new Date).getFullYear();if(a>d)return a;if(d>b){for(var e=b.toString().slice(0,2),f=b.toString().slice(2,4);e+c>b;)e--;var g=e+f;return a>g?a:g}return d},onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val(h.getDate().toString()+(h.getMonth()+1).toString()+h.getFullYear().toString()),g.trigger("setvalue")}},getFrontValue:function(a,b,c){for(var d=0,e=0,f=0;f<a.length&&"2"!==a.charAt(f);f++){var g=c.definitions[a.charAt(f)];g?(d+=e,e=g.cardinality):e++}return b.join("").substr(d,e)},definitions:{1:{validator:function(a,b,c,d,e){var f=e.regex.val1.test(a);return d||f||a.charAt(1)!==e.separator&&-1==="-./".indexOf(a.charAt(1))||!(f=e.regex.val1.test("0"+a.charAt(0)))?f:(b.buffer[c-1]="0",{refreshFromBuffer:{start:c-1,end:c},pos:c,c:a.charAt(0)})},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=a;isNaN(b.buffer[c+1])||(f+=b.buffer[c+1]);var g=1===f.length?e.regex.val1pre.test(f):e.regex.val1.test(f);if(!d&&!g){if(g=e.regex.val1.test(a+"0"))return b.buffer[c]=a,b.buffer[++c]="0",{pos:c,c:"0"};if(g=e.regex.val1.test("0"+a))return b.buffer[c]="0",c++,{pos:c}}return g},cardinality:1}]},2:{validator:function(a,b,c,d,e){var f=e.getFrontValue(b.mask,b.buffer,e);-1!==f.indexOf(e.placeholder[0])&&(f="01"+e.separator);var g=e.regex.val2(e.separator).test(f+a);if(!d&&!g&&(a.charAt(1)===e.separator||-1!=="-./".indexOf(a.charAt(1)))&&(g=e.regex.val2(e.separator).test(f+"0"+a.charAt(0))))return b.buffer[c-1]="0",{refreshFromBuffer:{start:c-1,end:c},pos:c,c:a.charAt(0)};if(e.mask.indexOf("2")===e.mask.length-1&&g){var h=b.buffer.join("").substr(4,4)+a;if(h!==e.leapday)return!0;var i=parseInt(b.buffer.join("").substr(0,4),10);return i%4===0?i%100===0?i%400===0?!0:!1:!0:!1}return g},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){isNaN(b.buffer[c+1])||(a+=b.buffer[c+1]);var f=e.getFrontValue(b.mask,b.buffer,e);-1!==f.indexOf(e.placeholder[0])&&(f="01"+e.separator);var g=1===a.length?e.regex.val2pre(e.separator).test(f+a):e.regex.val2(e.separator).test(f+a);return d||g||!(g=e.regex.val2(e.separator).test(f+"0"+a))?g:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},y:{validator:function(a,b,c,d,e){if(e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear)){var f=b.buffer.join("").substr(0,6);if(f!==e.leapday)return!0;var g=parseInt(a,10);return g%4===0?g%100===0?g%400===0?!0:!1:!0:!1}return!1},cardinality:4,prevalidator:[{validator:function(a,b,c,d,e){var f=e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear);if(!d&&!f){var g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a+"0").toString().slice(0,1);if(f=e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(0),{pos:c};if(g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a+"0").toString().slice(0,2),f=e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(0),b.buffer[c++]=g.charAt(1),{pos:c}}return f},cardinality:1},{validator:function(a,b,c,d,e){var f=e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear);if(!d&&!f){var g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a).toString().slice(0,2);if(f=e.isInYearRange(a[0]+g[1]+a[1],e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(1),{pos:c};if(g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a).toString().slice(0,2),e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear)){var h=b.buffer.join("").substr(0,6);if(h!==e.leapday)f=!0;else{var i=parseInt(a,10);f=i%4===0?i%100===0?i%400===0?!0:!1:!0:!1}}else f=!1;if(f)return b.buffer[c-1]=g.charAt(0),b.buffer[c++]=g.charAt(1),b.buffer[c++]=a.charAt(0),{refreshFromBuffer:{start:c-3,end:c},pos:c}}return f},cardinality:2},{validator:function(a,b,c,d,e){return e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear)},cardinality:3}]}},insertMode:!1,autoUnmask:!1},"mm/dd/yyyy":{placeholder:"mm/dd/yyyy",alias:"dd/mm/yyyy",regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[13-9]|1[012])"+c+"[0-3])|(02"+c+"[0-2])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[13-9]|1[012])"+c+"30)|((0[13578]|1[02])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},leapday:"02/29/",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val((h.getMonth()+1).toString()+h.getDate().toString()+h.getFullYear().toString()),g.trigger("setvalue")}}},"yyyy/mm/dd":{mask:"y/1/2",placeholder:"yyyy/mm/dd",alias:"mm/dd/yyyy",leapday:"/02/29",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val(h.getFullYear().toString()+(h.getMonth()+1).toString()+h.getDate().toString()),g.trigger("setvalue")}}},"dd.mm.yyyy":{mask:"1.2.y",placeholder:"dd.mm.yyyy",leapday:"29.02.",separator:".",alias:"dd/mm/yyyy"},"dd-mm-yyyy":{mask:"1-2-y",placeholder:"dd-mm-yyyy",leapday:"29-02-",separator:"-",alias:"dd/mm/yyyy"},"mm.dd.yyyy":{mask:"1.2.y",placeholder:"mm.dd.yyyy",leapday:"02.29.",separator:".",alias:"mm/dd/yyyy"},"mm-dd-yyyy":{mask:"1-2-y",placeholder:"mm-dd-yyyy",leapday:"02-29-",separator:"-",alias:"mm/dd/yyyy"},"yyyy.mm.dd":{mask:"y.1.2",placeholder:"yyyy.mm.dd",leapday:".02.29",separator:".",alias:"yyyy/mm/dd"},"yyyy-mm-dd":{mask:"y-1-2",placeholder:"yyyy-mm-dd",leapday:"-02-29",separator:"-",alias:"yyyy/mm/dd"},datetime:{mask:"1/2/y h:s",placeholder:"dd/mm/yyyy hh:mm",alias:"dd/mm/yyyy",regex:{hrspre:new RegExp("[012]"),hrs24:new RegExp("2[0-4]|1[3-9]"),hrs:new RegExp("[01][0-9]|2[0-4]"),ampm:new RegExp("^[a|p|A|P][m|M]"),mspre:new RegExp("[0-5]"),ms:new RegExp("[0-5][0-9]")},timeseparator:":",hourFormat:"24",definitions:{h:{validator:function(a,b,c,d,e){if("24"===e.hourFormat&&24===parseInt(a,10))return b.buffer[c-1]="0",b.buffer[c]="0",{refreshFromBuffer:{start:c-1,end:c},c:"0"};var f=e.regex.hrs.test(a);if(!d&&!f&&(a.charAt(1)===e.timeseparator||-1!=="-.:".indexOf(a.charAt(1)))&&(f=e.regex.hrs.test("0"+a.charAt(0))))return b.buffer[c-1]="0",b.buffer[c]=a.charAt(0),c++,{refreshFromBuffer:{start:c-2,end:c},pos:c,c:e.timeseparator};if(f&&"24"!==e.hourFormat&&e.regex.hrs24.test(a)){var g=parseInt(a,10);return 24===g?(b.buffer[c+5]="a",b.buffer[c+6]="m"):(b.buffer[c+5]="p",b.buffer[c+6]="m"),g-=12,10>g?(b.buffer[c]=g.toString(),b.buffer[c-1]="0"):(b.buffer[c]=g.toString().charAt(1),b.buffer[c-1]=g.toString().charAt(0)),{refreshFromBuffer:{start:c-1,end:c+6},c:b.buffer[c]}}return f},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=e.regex.hrspre.test(a);return d||f||!(f=e.regex.hrs.test("0"+a))?f:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},s:{validator:"[0-5][0-9]",cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=e.regex.mspre.test(a);return d||f||!(f=e.regex.ms.test("0"+a))?f:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},t:{validator:function(a,b,c,d,e){return e.regex.ampm.test(a+"m")},casing:"lower",cardinality:1}},insertMode:!1,autoUnmask:!1},datetime12:{mask:"1/2/y h:s t\\m",placeholder:"dd/mm/yyyy hh:mm xm",alias:"datetime",hourFormat:"12"},"mm/dd/yyyy hh:mm xm":{mask:"1/2/y h:s t\\m",placeholder:"mm/dd/yyyy hh:mm xm",alias:"datetime12",regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[13-9]|1[012])"+c+"[0-3])|(02"+c+"[0-2])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[13-9]|1[012])"+c+"30)|((0[13578]|1[02])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},leapday:"02/29/",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val((h.getMonth()+1).toString()+h.getDate().toString()+h.getFullYear().toString()),g.trigger("setvalue")}}},"hh:mm t":{mask:"h:s t\\m",placeholder:"hh:mm xm",alias:"datetime",hourFormat:"12"},"h:s t":{mask:"h:s t\\m",placeholder:"hh:mm xm",alias:"datetime",hourFormat:"12"},"hh:mm:ss":{mask:"h:s:s",placeholder:"hh:mm:ss",alias:"datetime",autoUnmask:!1},"hh:mm":{mask:"h:s",placeholder:"hh:mm",alias:"datetime",autoUnmask:!1},date:{alias:"dd/mm/yyyy"},"mm/yyyy":{mask:"1/y",placeholder:"mm/yyyy",leapday:"donotuse",separator:"/",alias:"mm/dd/yyyy"},shamsi:{regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"[0-3])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[1-9]|1[012])"+c+"30)|((0[1-6])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},yearrange:{minyear:1300,maxyear:1499},mask:"y/1/2",leapday:"/12/30",placeholder:"yyyy/mm/dd",alias:"mm/dd/yyyy",clearIncomplete:!0}}),b}(jQuery,Inputmask),function(a,b){return b.extendDefinitions({A:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,casing:"upper"},"&":{validator:"[0-9A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,casing:"upper"},"#":{validator:"[0-9A-Fa-f]",cardinality:1,casing:"upper"}}),b.extendAliases({url:{definitions:{i:{validator:".",cardinality:1}},mask:"(\\http://)|(\\http\\s://)|(ftp://)|(ftp\\s://)i{+}",insertMode:!1,autoUnmask:!1},ip:{mask:"i[i[i]].i[i[i]].i[i[i]].i[i[i]]",definitions:{i:{validator:function(a,b,c,d,e){return c-1>-1&&"."!==b.buffer[c-1]?(a=b.buffer[c-1]+a,a=c-2>-1&&"."!==b.buffer[c-2]?b.buffer[c-2]+a:"0"+a):a="00"+a,new RegExp("25[0-5]|2[0-4][0-9]|[01][0-9][0-9]").test(a)},cardinality:1}},onUnMask:function(a,b,c){return a}},email:{mask:"*{1,64}[.*{1,64}][.*{1,64}][.*{1,64}]@*{1,64}[.*{2,64}][.*{2,6}][.*{1,2}]",greedy:!1,onBeforePaste:function(a,b){return a=a.toLowerCase(),a.replace("mailto:","")},definitions:{"*":{validator:"[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]",cardinality:1,casing:"lower"}},onUnMask:function(a,b,c){return a}},mac:{mask:"##:##:##:##:##:##"}}),b}(jQuery,Inputmask),function(a,b){return b.extendAliases({numeric:{mask:function(a){function b(b){for(var c="",d=0;d<b.length;d++)c+=a.definitions[b.charAt(d)]?"\\"+b.charAt(d):b.charAt(d);return c}if(0!==a.repeat&&isNaN(a.integerDigits)&&(a.integerDigits=a.repeat),a.repeat=0,a.groupSeparator===a.radixPoint&&("."===a.radixPoint?a.groupSeparator=",":","===a.radixPoint?a.groupSeparator=".":a.groupSeparator="")," "===a.groupSeparator&&(a.skipOptionalPartCharacter=void 0),a.autoGroup=a.autoGroup&&""!==a.groupSeparator,a.autoGroup&&("string"==typeof a.groupSize&&isFinite(a.groupSize)&&(a.groupSize=parseInt(a.groupSize)),isFinite(a.integerDigits))){var c=Math.floor(a.integerDigits/a.groupSize),d=a.integerDigits%a.groupSize;a.integerDigits=parseInt(a.integerDigits)+(0===d?c-1:c),a.integerDigits<1&&(a.integerDigits="*")}a.placeholder.length>1&&(a.placeholder=a.placeholder.charAt(0)),a.radixFocus=a.radixFocus&&""!==a.placeholder&&a.integerOptional===!0,a.definitions[";"]=a.definitions["~"],a.definitions[";"].definitionSymbol="~",1==a.numericInput&&(a.radixFocus=!1,a.digitsOptional=!1,isNaN(a.digits)&&(a.digits=2),a.decimalProtect=!1);var e=b(a.prefix);return e+="[+]",e+=a.integerOptional===!0?"~{1,"+a.integerDigits+"}":"~{"+a.integerDigits+"}",void 0!==a.digits&&(isNaN(a.digits)||parseInt(a.digits)>0)&&(e+=a.digitsOptional?"["+(a.decimalProtect?":":a.radixPoint)+";{1,"+a.digits+"}]":(a.decimalProtect?":":a.radixPoint)+";{"+a.digits+"}"),""!==a.negationSymbol.back&&(e+="[-]"),e+=b(a.suffix),a.greedy=!1,e},placeholder:"",greedy:!1,digits:"*",digitsOptional:!0,radixPoint:".",radixFocus:!0,groupSize:3,groupSeparator:"",autoGroup:!1,allowPlus:!0,allowMinus:!0,negationSymbol:{front:"-",back:""},integerDigits:"+",integerOptional:!0,prefix:"",suffix:"",rightAlign:!0,decimalProtect:!0,min:null,max:null,step:1,insertMode:!0,autoUnmask:!1,unmaskAsNumber:!1,postFormat:function(c,d,e,f){f.numericInput===!0&&(c=c.reverse(),isFinite(d)&&(d=c.join("").length-d-1));var g,h,i=!1;c.length>=f.suffix.length&&c.join("").indexOf(f.suffix)===c.length-f.suffix.length&&(c.length=c.length-f.suffix.length,i=!0),d=d>=c.length?c.length-1:d<f.prefix.length?f.prefix.length:d;var j=!1,k=c[d];if(""===f.groupSeparator||f.numericInput!==!0&&-1!==a.inArray(f.radixPoint,c)&&d>a.inArray(f.radixPoint,c)||new RegExp("["+b.escapeRegex(f.negationSymbol.front)+"+]").test(k)){if(i)for(g=0,h=f.suffix.length;h>g;g++)c.push(f.suffix.charAt(g));return{pos:d}}var l=c.slice();k===f.groupSeparator&&(l.splice(d--,1),k=l[d]),e?k!==f.radixPoint&&(l[d]="?"):l.splice(d,0,"?");var m=l.join(""),n=m;if(m.length>0&&f.autoGroup||e&&-1!==m.indexOf(f.groupSeparator)){var o=b.escapeRegex(f.groupSeparator);j=0===m.indexOf(f.groupSeparator),m=m.replace(new RegExp(o,"g"),"");var p=m.split(f.radixPoint);if(m=""===f.radixPoint?m:p[0],m!==f.prefix+"?0"&&m.length>=f.groupSize+f.prefix.length)for(var q=new RegExp("([-+]?[\\d?]+)([\\d?]{"+f.groupSize+"})");q.test(m);)m=m.replace(q,"$1"+f.groupSeparator+"$2"),m=m.replace(f.groupSeparator+f.groupSeparator,f.groupSeparator);""!==f.radixPoint&&p.length>1&&(m+=f.radixPoint+p[1])}for(j=n!==m,c.length=m.length,g=0,h=m.length;h>g;g++)c[g]=m.charAt(g);var r=a.inArray("?",c);if(-1===r&&k===f.radixPoint&&(r=a.inArray(f.radixPoint,c)),e?c[r]=k:c.splice(r,1),!j&&i)for(g=0,h=f.suffix.length;h>g;g++)c.push(f.suffix.charAt(g));return r=f.numericInput&&isFinite(d)?c.join("").length-r-1:r,f.numericInput&&(c=c.reverse(),a.inArray(f.radixPoint,c)<r&&c.join("").length-f.suffix.length!==r&&(r-=1)),{pos:r,refreshFromBuffer:j,buffer:c}},onBeforeWrite:function(c,d,e,f){if(c&&("blur"===c.type||"checkval"===c.type)){var g=d.join(""),h=g.replace(f.prefix,"");if(h=h.replace(f.suffix,""),h=h.replace(new RegExp(b.escapeRegex(f.groupSeparator),"g"),""),","===f.radixPoint&&(h=h.replace(b.escapeRegex(f.radixPoint),".")),isFinite(h)&&isFinite(f.min)&&parseFloat(h)<parseFloat(f.min))return a.extend(!0,{refreshFromBuffer:!0,buffer:(f.prefix+f.min).split("")},f.postFormat((f.prefix+f.min).split(""),0,!0,f));if(f.numericInput!==!0){var i=""!==f.radixPoint?d.join("").split(f.radixPoint):[d.join("")],j=i[0].match(f.regex.integerPart(f)),k=2===i.length?i[1].match(f.regex.integerNPart(f)):void 0;if(j){j[0]!==f.negationSymbol.front+"0"&&j[0]!==f.negationSymbol.front&&"+"!==j[0]||void 0!==k&&!k[0].match(/^0+$/)||d.splice(j.index,1);var l=a.inArray(f.radixPoint,d);if(-1!==l){if(isFinite(f.digits)&&!f.digitsOptional){for(var m=1;m<=f.digits;m++)(void 0===d[l+m]||d[l+m]===f.placeholder.charAt(0))&&(d[l+m]="0");return{refreshFromBuffer:g!==d.join(""),buffer:d}}if(l===d.length-f.suffix.length-1)return d.splice(l,1),{refreshFromBuffer:!0,buffer:d}}}}}if(f.autoGroup){var n=f.postFormat(d,f.numericInput?e:e-1,!0,f);return n.caret=e<=f.prefix.length?n.pos:n.pos+1,n}},regex:{integerPart:function(a){return new RegExp("["+b.escapeRegex(a.negationSymbol.front)+"+]?\\d+")},integerNPart:function(a){return new RegExp("[\\d"+b.escapeRegex(a.groupSeparator)+"]+")}},signHandler:function(a,b,c,d,e){if(!d&&e.allowMinus&&"-"===a||e.allowPlus&&"+"===a){var f=b.buffer.join("").match(e.regex.integerPart(e));if(f&&f[0].length>0)return b.buffer[f.index]===("-"===a?"+":e.negationSymbol.front)?"-"===a?""!==e.negationSymbol.back?{pos:f.index,c:e.negationSymbol.front,remove:f.index,caret:c,insert:{pos:b.buffer.length-e.suffix.length-1,c:e.negationSymbol.back}}:{pos:f.index,c:e.negationSymbol.front,remove:f.index,caret:c}:""!==e.negationSymbol.back?{pos:f.index,c:"+",remove:[f.index,b.buffer.length-e.suffix.length-1],caret:c}:{pos:f.index,c:"+",remove:f.index,caret:c}:b.buffer[f.index]===("-"===a?e.negationSymbol.front:"+")?"-"===a&&""!==e.negationSymbol.back?{remove:[f.index,b.buffer.length-e.suffix.length-1],caret:c-1}:{remove:f.index,caret:c-1}:"-"===a?""!==e.negationSymbol.back?{pos:f.index,c:e.negationSymbol.front,caret:c+1,insert:{pos:b.buffer.length-e.suffix.length,c:e.negationSymbol.back}}:{pos:f.index,c:e.negationSymbol.front,caret:c+1}:{pos:f.index,c:a,caret:c+1}}return!1},radixHandler:function(b,c,d,e,f){if(!e&&(-1!==a.inArray(b,[",","."])&&(b=f.radixPoint),b===f.radixPoint&&void 0!==f.digits&&(isNaN(f.digits)||parseInt(f.digits)>0))){var g=a.inArray(f.radixPoint,c.buffer),h=c.buffer.join("").match(f.regex.integerPart(f));if(-1!==g&&c.validPositions[g])return c.validPositions[g-1]?{caret:g+1}:{pos:h.index,c:h[0],caret:g+1};if(!h||"0"===h[0]&&h.index+1!==d)return c.buffer[h?h.index:d]="0",{pos:(h?h.index:d)+1,c:f.radixPoint}}return!1},leadingZeroHandler:function(b,c,d,e,f){if(f.numericInput===!0){if("0"===c.buffer[c.buffer.length-f.prefix.length-1])return{pos:d,remove:c.buffer.length-f.prefix.length-1}}else{var g=c.buffer.join("").match(f.regex.integerNPart(f)),h=a.inArray(f.radixPoint,c.buffer);if(g&&!e&&(-1===h||h>=d))if(0===g[0].indexOf("0")){d<f.prefix.length&&(d=g.index);var i=a.inArray(f.radixPoint,c._buffer),j=c._buffer&&c.buffer.slice(h).join("")===c._buffer.slice(i).join("")||0===parseInt(c.buffer.slice(h+1).join("")),k=c._buffer&&c.buffer.slice(g.index,h).join("")===c._buffer.slice(f.prefix.length,i).join("")||"0"===c.buffer.slice(g.index,h).join("");if(-1===h||j&&k)return c.buffer.splice(g.index,1),d=d>g.index?d-1:g.index,{pos:d,remove:g.index};if(g.index+1===d||"0"===b)return c.buffer.splice(g.index,1),d=g.index,{pos:d,remove:g.index}}else if("0"===b&&d<=g.index&&g[0]!==f.groupSeparator)return!1}return!0},postValidation:function(a,c,d){var e=!0,f=d.numericInput?a.slice().reverse().join(""):a.join(""),g=f.replace(d.prefix,"");return g=g.replace(d.suffix,""),g=g.replace(new RegExp(b.escapeRegex(d.groupSeparator),"g"),""),","===d.radixPoint&&(g=g.replace(b.escapeRegex(d.radixPoint),".")),g=g.replace(new RegExp("^"+b.escapeRegex(d.negationSymbol.front)),"-"),g=g.replace(new RegExp(b.escapeRegex(d.negationSymbol.back)+"$"),""),g=g===d.negationSymbol.front?g+"0":g,isFinite(g)&&(null!==d.max&&isFinite(d.max)&&(g=parseFloat(g)>parseFloat(d.max)?d.max:g,e=d.postFormat((d.prefix+g).split(""),0,!0,d)),null!==d.min&&isFinite(d.min)&&(g=parseFloat(g)<parseFloat(d.min)?d.min:g,e=d.postFormat((d.prefix+g).split(""),0,!0,d))),e},definitions:{"~":{validator:function(c,d,e,f,g){var h=g.signHandler(c,d,e,f,g);if(!h&&(h=g.radixHandler(c,d,e,f,g),!h&&(h=f?new RegExp("[0-9"+b.escapeRegex(g.groupSeparator)+"]").test(c):new RegExp("[0-9]").test(c),h===!0&&(h=g.leadingZeroHandler(c,d,e,f,g),h===!0)))){var i=a.inArray(g.radixPoint,d.buffer);h=-1!==i&&g.digitsOptional===!1&&g.numericInput!==!0&&e>i&&!f?{pos:e,remove:e}:{pos:e}}return h},cardinality:1,prevalidator:null},"+":{validator:function(a,b,c,d,e){var f=e.signHandler(a,b,c,d,e);return!f&&(d&&e.allowMinus&&a===e.negationSymbol.front||e.allowMinus&&"-"===a||e.allowPlus&&"+"===a)&&(f="-"===a?""!==e.negationSymbol.back?{pos:c,c:"-"===a?e.negationSymbol.front:"+",caret:c+1,insert:{pos:b.buffer.length,c:e.negationSymbol.back}}:{pos:c,c:"-"===a?e.negationSymbol.front:"+",caret:c+1}:!0),f},cardinality:1,prevalidator:null,placeholder:""},"-":{validator:function(a,b,c,d,e){var f=e.signHandler(a,b,c,d,e);return!f&&d&&e.allowMinus&&a===e.negationSymbol.back&&(f=!0),f},cardinality:1,prevalidator:null,placeholder:""
},":":{validator:function(a,c,d,e,f){var g=f.signHandler(a,c,d,e,f);if(!g){var h="["+b.escapeRegex(f.radixPoint)+",\\.]";g=new RegExp(h).test(a),g&&c.validPositions[d]&&c.validPositions[d].match.placeholder===f.radixPoint&&(g={caret:d+1})}return g?{c:f.radixPoint}:g},cardinality:1,prevalidator:null,placeholder:function(a){return a.radixPoint}}},onUnMask:function(a,c,d){var e=a.replace(d.prefix,"");return e=e.replace(d.suffix,""),e=e.replace(new RegExp(b.escapeRegex(d.groupSeparator),"g"),""),d.unmaskAsNumber?(""!==d.radixPoint&&-1!==e.indexOf(d.radixPoint)&&(e=e.replace(b.escapeRegex.call(this,d.radixPoint),".")),Number(e)):e},isComplete:function(a,c){var d=a.join(""),e=a.slice();if(c.postFormat(e,0,!0,c),e.join("")!==d)return!1;var f=d.replace(c.prefix,"");return f=f.replace(c.suffix,""),f=f.replace(new RegExp(b.escapeRegex(c.groupSeparator),"g"),""),","===c.radixPoint&&(f=f.replace(b.escapeRegex(c.radixPoint),".")),isFinite(f)},onBeforeMask:function(a,c){if(""!==c.radixPoint&&isFinite(a))a=a.toString().replace(".",c.radixPoint);else{var d=a.match(/,/g),e=a.match(/\./g);e&&d?e.length>d.length?(a=a.replace(/\./g,""),a=a.replace(",",c.radixPoint)):d.length>e.length?(a=a.replace(/,/g,""),a=a.replace(".",c.radixPoint)):a=a.indexOf(".")<a.indexOf(",")?a.replace(/\./g,""):a=a.replace(/,/g,""):a=a.replace(new RegExp(b.escapeRegex(c.groupSeparator),"g"),"")}if(0===c.digits&&(-1!==a.indexOf(".")?a=a.substring(0,a.indexOf(".")):-1!==a.indexOf(",")&&(a=a.substring(0,a.indexOf(",")))),""!==c.radixPoint&&isFinite(c.digits)&&-1!==a.indexOf(c.radixPoint)){var f=a.split(c.radixPoint),g=f[1].match(new RegExp("\\d*"))[0];if(parseInt(c.digits)<g.toString().length){var h=Math.pow(10,parseInt(c.digits));a=a.replace(b.escapeRegex(c.radixPoint),"."),a=Math.round(parseFloat(a)*h)/h,a=a.toString().replace(".",c.radixPoint)}}return a.toString()},canClearPosition:function(c,d,e,f,g){var h=c.validPositions[d].input,i=h!==g.radixPoint||null!==c.validPositions[d].match.fn&&g.decimalProtect===!1||isFinite(h)||d===e||h===g.groupSeparator||h===g.negationSymbol.front||h===g.negationSymbol.back;if(i&&isFinite(h)){var j,k=a.inArray(g.radixPoint,c.buffer),l=!1;if(void 0===c.validPositions[k]&&(c.validPositions[k]={input:g.radixPoint},l=!0),!f&&c.buffer){j=c.buffer.join("").substr(0,d).match(g.regex.integerNPart(g));var m=d+1,n=null==j||0===parseInt(j[0].replace(new RegExp(b.escapeRegex(g.groupSeparator),"g"),""));if(n)for(;c.validPositions[m]&&(c.validPositions[m].input===g.groupSeparator||"0"===c.validPositions[m].input);)delete c.validPositions[m],m++}var o=[];for(var p in c.validPositions)void 0!==c.validPositions[p].input&&o.push(c.validPositions[p].input);if(l&&delete c.validPositions[k],k>0){var q=o.join("");if(j=q.match(g.regex.integerNPart(g)))if(k>=d)if(0===j[0].indexOf("0"))i=j.index!==d||"0"===g.placeholder;else{var r=parseInt(j[0].replace(new RegExp(b.escapeRegex(g.groupSeparator),"g"),"")),s=parseInt(q.split(g.radixPoint)[1]);10>r&&c.validPositions[d]&&("0"!==g.placeholder||s>0)&&(c.validPositions[d].input="0",c.p=g.prefix.length+1,i=!1)}else 0===j[0].indexOf("0")&&3===q.length&&(c.validPositions={},i=!1)}}return i},onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey)switch(c.keyCode){case b.keyCode.UP:g.val(parseFloat(this.inputmask.unmaskedvalue())+parseInt(f.step)),g.trigger("setvalue");break;case b.keyCode.DOWN:g.val(parseFloat(this.inputmask.unmaskedvalue())-parseInt(f.step)),g.trigger("setvalue")}}},currency:{prefix:"$ ",groupSeparator:",",alias:"numeric",placeholder:"0",autoGroup:!0,digits:2,digitsOptional:!1,clearMaskOnLostFocus:!1},decimal:{alias:"numeric"},integer:{alias:"numeric",digits:0,radixPoint:""},percentage:{alias:"numeric",digits:2,radixPoint:".",placeholder:"0",autoGroup:!1,min:0,max:100,suffix:" %",allowPlus:!1,allowMinus:!1}}),b}(jQuery,Inputmask),function(a,b){return b.extendAliases({phone:{url:"phone-codes/phone-codes.js",countrycode:"",phoneCodeCache:{},mask:function(b){if(void 0===b.phoneCodeCache[b.url]){var c=[];b.definitions["#"]=b.definitions[9],a.ajax({url:b.url,async:!1,type:"get",dataType:"json",success:function(a){c=a},error:function(a,c,d){alert(d+" - "+b.url)}}),b.phoneCodeCache[b.url]=c.sort(function(a,b){return(a.mask||a)<(b.mask||b)?-1:1})}return b.phoneCodeCache[b.url]},keepStatic:!1,nojumps:!0,nojumpsThreshold:1,onBeforeMask:function(a,b){var c=a.replace(/^0{1,2}/,"").replace(/[\s]/g,"");return(c.indexOf(b.countrycode)>1||-1===c.indexOf(b.countrycode))&&(c="+"+b.countrycode+c),c}},phonebe:{alias:"phone",url:"phone-codes/phone-be.js",countrycode:"32",nojumpsThreshold:4}}),b}(jQuery,Inputmask),function(a,b){return b.extendAliases({Regex:{mask:"r",greedy:!1,repeat:"*",regex:null,regexTokens:null,tokenizer:/\[\^?]?(?:[^\\\]]+|\\[\S\s]?)*]?|\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9][0-9]*|x[0-9A-Fa-f]{2}|u[0-9A-Fa-f]{4}|c[A-Za-z]|[\S\s]?)|\((?:\?[:=!]?)?|(?:[?*+]|\{[0-9]+(?:,[0-9]*)?\})\??|[^.?*+^${[()|\\]+|./g,quantifierFilter:/[0-9]+[^,]/,isComplete:function(a,b){return new RegExp(b.regex).test(a.join(""))},definitions:{r:{validator:function(b,c,d,e,f){function g(a,b){this.matches=[],this.isGroup=a||!1,this.isQuantifier=b||!1,this.quantifier={min:1,max:1},this.repeaterPart=void 0}function h(){var a,b,c=new g,d=[];for(f.regexTokens=[];a=f.tokenizer.exec(f.regex);)switch(b=a[0],b.charAt(0)){case"(":d.push(new g(!0));break;case")":k=d.pop(),d.length>0?d[d.length-1].matches.push(k):c.matches.push(k);break;case"{":case"+":case"*":var e=new g(!1,!0);b=b.replace(/[{}]/g,"");var h=b.split(","),i=isNaN(h[0])?h[0]:parseInt(h[0]),j=1===h.length?i:isNaN(h[1])?h[1]:parseInt(h[1]);if(e.quantifier={min:i,max:j},d.length>0){var l=d[d.length-1].matches;a=l.pop(),a.isGroup||(k=new g(!0),k.matches.push(a),a=k),l.push(a),l.push(e)}else a=c.matches.pop(),a.isGroup||(k=new g(!0),k.matches.push(a),a=k),c.matches.push(a),c.matches.push(e);break;default:d.length>0?d[d.length-1].matches.push(b):c.matches.push(b)}c.matches.length>0&&f.regexTokens.push(c)}function i(b,c){var d=!1;c&&(m+="(",o++);for(var e=0;e<b.matches.length;e++){var f=b.matches[e];if(f.isGroup===!0)d=i(f,!0);else if(f.isQuantifier===!0){var g=a.inArray(f,b.matches),h=b.matches[g-1],k=m;if(isNaN(f.quantifier.max)){for(;f.repeaterPart&&f.repeaterPart!==m&&f.repeaterPart.length>m.length&&!(d=i(h,!0)););d=d||i(h,!0),d&&(f.repeaterPart=m),m=k+f.quantifier.max}else{for(var l=0,n=f.quantifier.max-1;n>l&&!(d=i(h,!0));l++);m=k+"{"+f.quantifier.min+","+f.quantifier.max+"}"}}else if(void 0!==f.matches)for(var p=0;p<f.length&&!(d=i(f[p],c));p++);else{var q;if("["==f.charAt(0)){q=m,q+=f;for(var r=0;o>r;r++)q+=")";var s=new RegExp("^("+q+")$");d=s.test(j)}else for(var t=0,u=f.length;u>t;t++)if("\\"!==f.charAt(t)){q=m,q+=f.substr(0,t+1),q=q.replace(/\|$/,"");for(var r=0;o>r;r++)q+=")";var s=new RegExp("^("+q+")$");if(d=s.test(j))break}m+=f}if(d)break}return c&&(m+=")",o--),d}var j,k,l=c.buffer.slice(),m="",n=!1,o=0;null===f.regexTokens&&h(),l.splice(d,0,b),j=l.join("");for(var p=0;p<f.regexTokens.length;p++){var q=f.regexTokens[p];if(n=i(q,q.isGroup))break}return n},cardinality:1}}}}),b}(jQuery,Inputmask);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:72:"/local/templates/arlight/js/jquery.inputmask-multi.min.js?16572075526469";s:6:"source";s:57:"/local/templates/arlight/js/jquery.inputmask-multi.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*
 * @license Multi Input Mask plugin for jquery
 * https://github.com/andr-04/inputmask-multi
 * Copyright (c) 2012-2016 Andrey Egorov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 * Version: 1.2.0
 *
 * Requriements:
 * https://github.com/RobinHerbots/jquery.inputmask
 */
!function(t){t.masksLoad=function(e){var s;return t.ajax({url:e,async:!1,dataType:"json",success:function(t){s=t}}),s},t.masksSort=function(e,s,i,n){return e.sort(function(e,a){for(var r=0,o=0;r<e[n].length&&o<a[n].length;){var h=e[n].charAt(r),c=a[n].charAt(o);if(i.test(h))if(i.test(c)){if(-1!=t.inArray(h,s)&&-1==t.inArray(c,s))return 1;if(-1==t.inArray(h,s)&&-1!=t.inArray(c,s))return-1;if(-1==t.inArray(h,s)&&-1==t.inArray(c,s)&&h!=c)return c>h?-1:1;r++,o++}else o++;else r++}for(;r<e[n].length||o<a[n].length;)if(r<e[n].length&&!i.test(e[n].charAt(r)))r++;else if(o<a[n].length&&!i.test(a[n].charAt(o)))o++;else{if(r<e[n].length)return 1;if(o<a[n].length)return-1}return 0}),e};var e=function(t,e){if("number"!=typeof t){if(this.setSelectionRange)t=this.selectionStart,e=this.selectionEnd;else if(document.selection&&document.selection.createRange){var s=document.selection.createRange();t=0-s.duplicate().moveStart("character",-1e5),e=t+s.text.length}return{begin:t,end:e}}if(e="number"==typeof e?e:t,this.setSelectionRange)this.setSelectionRange(t,e);else if(this.createTextRange){var s=this.createTextRange();s.collapse(!0),s.moveEnd("character",e),s.moveStart("character",t),s.select()}},s=Object.keys||function(t){if(t!==Object(t))throw new TypeError("Invalid object");var e=[];for(var s in t)e[e.length]=s;return e},i=function(t){for(var e=this.inputmasks.options,i="",n=0;n<t.length;n++){var a=t.charAt(n);if(a==this.inputmasks.placeholder)break;e.match.test(a)&&(i+=a)}for(var r in e.list){for(var o=e.list[r][e.listKey],h=!0,c=0,u=0;c<i.length&&u<o.length;){var l=o.charAt(u),p=i.charAt(c);if(e.match.test(l)||l in this.inputmasks.defs){if(!(l in this.inputmasks.defs&&this.inputmasks.defs[l].test(p)||p==l)){h=!1;break}c++,u++}else u++}if(h&&c==i.length){var m=-1==o.substr(u).search(e.match);o=o.replace(new RegExp([e.match.source].concat(s(this.inputmasks.defs)).join("|"),"g"),e.replace);var d=-1==o.substr(u).search(e.replace);return{mask:o,obj:e.list[r],determined:m,completed:d}}}return!1},n=function(t,e,s){var i=this.inputmasks.options;if(!t)return 0;for(var n=0,a=0;n<s.begin;n++)t.charAt(n)==i.replace&&a++;for(var r=0;n<s.end;n++)t.charAt(n)==i.replace&&r++;for(n=0;n<e.length&&(a>0||e.charAt(n)!=i.replace);n++)e.charAt(n)==i.replace&&a--;for(a=n;n<e.length&&r>0;n++)e.charAt(n)==i.replace&&r--;return r=n,{begin:a,end:r}},a=function(){t(this).off(".inputmasks")},r=function(){events=t._data(this,"events");var e=["keydown","keypress","paste","dragdrop","drop","setvalue","reset","cut","blur"],s=this;t.each(e,function(e,i){t.each(s.inputmask.events[i],function(e,n){t(s).off(i,n)})})},o=function(e){var s=this;t.each(this.inputmask.events[e.type],function(t,i){i.call(s,e)})},h=function(){t(this).on("keydown.inputmasks",l).on("keypress.inputmasks",p).on("paste.inputmasks",d).on("dragdrop.inputmasks",d).on("drop.inputmasks",d).on("cut.inputmasks",d).on("setvalue.inputmasks",m).on("blur.inputmasks",m).on("reset.inputmasks",m)},c=function(s,i){var a=this.inputmasks.options;if(s&&(void 0!==i||s.mask!=this.inputmasks.oldmatch.mask)){var o;void 0===i?o=n.call(this,this.inputmasks.oldmatch.mask,s.mask,e.call(this)):(this.inputmask&&this.inputmask.remove(),this.value=i),t(this).inputmask(s.mask,t.extend(!0,a.inputmask,{insertMode:this.inputmasks.insertMode})),r.call(this),void 0===i&&e.call(this,o.begin,o.end)}this.inputmasks.oldmatch=s,a.onMaskChange.call(this,s.obj,s.determined)},u=function(t,e,s){var n=i.call(this,e);return n&&n.obj==this.inputmasks.oldmatch.obj&&n.determined==this.inputmasks.oldmatch.determined?(o.call(this,t),!0):(n?s?(c.call(this,n),o.call(this,t)):(o.call(this,t),c.call(this,n)):s&&this.inputmasks.insertMode||f.call(this,e),!1)},l=function(t){if(t.metaKey)return o.call(this,t),!0;var s=this.inputmasks.options;t=t||window.event;var i=t.which||t.charCode||t.keyCode;if(8==i||46==i||this.inputmasks.iphone&&127==i){var n=this.inputmask._valueGet(),a=e.call(this);if(a.begin==a.end){var r=a.begin;do{46!=i&&r--;var h=n.charAt(r);n=n.substring(0,r)+n.substring(r+1)}while(r>0&&r<n.length&&h!=this.inputmasks.placeholder&&!s.match.test(h))}else n=n.substring(0,a.begin)+n.substring(a.end);return u.call(this,t,n,!1)}return 45==i&&(this.inputmasks.insertMode=!this.inputmasks.insertMode),o.call(this,t),!0},p=function(t){if(t.metaKey)return o.call(this,t),!0;var s=this.inputmask._valueGet();t=t||window.event;var i=t.which||t.charCode||t.keyCode,n=String.fromCharCode(i);return caretPos=e.call(this),s=caretPos.begin==caretPos.end&&s.charAt(caretPos.begin)==this.inputmasks.placeholder?s.substring(0,caretPos.begin)+n+s.substring(caretPos.end+1):s.substring(0,caretPos.begin)+n+s.substring(caretPos.end),u.call(this,t,s,!0)},m=function(t){return f.call(this),!0},d=function(t){var e=this;return setTimeout(function(){f.call(e)},0),!0},f=function(t){void 0===t&&(t=this.inputmask&&this.inputmask._valueGet?this.inputmask._valueGet():this.value);for(var e=i.call(this,t);!e&&t.length>0;)t=t.substr(0,t.length-1),e=i.call(this,t);c.call(this,e,t)},k=function(e){e=t.extend(!0,{onMaskChange:t.noop},e);var s={};for(var i in e.inputmask.definitions){var n=e.inputmask.definitions[i].validator;switch(typeof n){case"string":s[i]=new RegExp(n);break;case"object":"test"in e.definitions[i].validator&&(s[i]=n);break;case"function":s[i]={test:n}}}e.inputmask.definitions[e.replace]={validator:e.match.source,cardinality:1},this.inputmasks&&t(this).inputmasks("remove"),this.inputmasks={},this.inputmasks.options=e,this.inputmasks.defs=s,this.inputmasks.iphone=null!=navigator.userAgent.match(/iphone/i),this.inputmasks.oldmatch=!1,this.inputmasks.placeholder=e.inputmask.placeholder||Inputmask.prototype.defaults.placeholder,this.inputmasks.insertMode=void 0!==e.inputmask.insertMode?e.inputmask.insertMode:Inputmask.prototype.defaults.insertMode,f.call(this)};t.fn.inputmasks=function(e){switch(e){case"remove":a.call(this),this.inputmasks=void 0,t(this).inputmask("remove");break;case"isCompleted":var s=i.call(this[0],this[0].inputmask&&this[0].inputmask._valueGet()||this[0].value);return s&&s.completed;default:return this.each(function(){k.call(this,e),h.call(this)}),this}}}(jQuery);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:69:"/local/templates/arlight/js/tooltipster.bundle.min.js?165720755239901";s:6:"source";s:53:"/local/templates/arlight/js/tooltipster.bundle.min.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
/*! tooltipster v4.2.8 */!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(a){return b(a)}):"object"==typeof exports?module.exports=b(require("jquery")):b(jQuery)}(this,function(a){function b(a){this.$container,this.constraints=null,this.__$tooltip,this.__init(a)}function c(b,c){var d=!0;return a.each(b,function(a,e){return void 0===c[a]||b[a]!==c[a]?(d=!1,!1):void 0}),d}function d(b){var c=b.attr("id"),d=c?h.window.document.getElementById(c):null;return d?d===b[0]:a.contains(h.window.document.body,b[0])}function e(){if(!g)return!1;var a=g.document.body||g.document.documentElement,b=a.style,c="transition",d=["Moz","Webkit","Khtml","O","ms"];if("string"==typeof b[c])return!0;c=c.charAt(0).toUpperCase()+c.substr(1);for(var e=0;e<d.length;e++)if("string"==typeof b[d[e]+c])return!0;return!1}var f={animation:"fade",animationDuration:350,content:null,contentAsHTML:!1,contentCloning:!1,debug:!0,delay:300,delayTouch:[300,500],functionInit:null,functionBefore:null,functionReady:null,functionAfter:null,functionFormat:null,IEmin:6,interactive:!1,multiple:!1,parent:null,plugins:["sideTip"],repositionOnScroll:!1,restoration:"none",selfDestruction:!0,theme:[],timer:0,trackerInterval:500,trackOrigin:!1,trackTooltip:!1,trigger:"hover",triggerClose:{click:!1,mouseleave:!1,originClick:!1,scroll:!1,tap:!1,touchleave:!1},triggerOpen:{click:!1,mouseenter:!1,tap:!1,touchstart:!1},updateAnimation:"rotate",zIndex:9999999},g="undefined"!=typeof window?window:null,h={hasTouchCapability:!(!g||!("ontouchstart"in g||g.DocumentTouch&&g.document instanceof g.DocumentTouch||g.navigator.maxTouchPoints)),hasTransitions:e(),IE:!1,semVer:"4.2.8",window:g},i=function(){this.__$emitterPrivate=a({}),this.__$emitterPublic=a({}),this.__instancesLatestArr=[],this.__plugins={},this._env=h};i.prototype={__bridge:function(b,c,d){if(!c[d]){var e=function(){};e.prototype=b;var g=new e;g.__init&&g.__init(c),a.each(b,function(a,b){0!=a.indexOf("__")&&(c[a]?f.debug&&console.log("The "+a+" method of the "+d+" plugin conflicts with another plugin or native methods"):(c[a]=function(){return g[a].apply(g,Array.prototype.slice.apply(arguments))},c[a].bridged=g))}),c[d]=g}return this},__setWindow:function(a){return h.window=a,this},_getRuler:function(a){return new b(a)},_off:function(){return this.__$emitterPrivate.off.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_on:function(){return this.__$emitterPrivate.on.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_one:function(){return this.__$emitterPrivate.one.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_plugin:function(b){var c=this;if("string"==typeof b){var d=b,e=null;return d.indexOf(".")>0?e=c.__plugins[d]:a.each(c.__plugins,function(a,b){return b.name.substring(b.name.length-d.length-1)=="."+d?(e=b,!1):void 0}),e}if(b.name.indexOf(".")<0)throw new Error("Plugins must be namespaced");return c.__plugins[b.name]=b,b.core&&c.__bridge(b.core,c,b.name),this},_trigger:function(){var a=Array.prototype.slice.apply(arguments);return"string"==typeof a[0]&&(a[0]={type:a[0]}),this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate,a),this.__$emitterPublic.trigger.apply(this.__$emitterPublic,a),this},instances:function(b){var c=[],d=b||".tooltipstered";return a(d).each(function(){var b=a(this),d=b.data("tooltipster-ns");d&&a.each(d,function(a,d){c.push(b.data(d))})}),c},instancesLatest:function(){return this.__instancesLatestArr},off:function(){return this.__$emitterPublic.off.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},on:function(){return this.__$emitterPublic.on.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},one:function(){return this.__$emitterPublic.one.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},origins:function(b){var c=b?b+" ":"";return a(c+".tooltipstered").toArray()},setDefaults:function(b){return a.extend(f,b),this},triggerHandler:function(){return this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this}},a.tooltipster=new i,a.Tooltipster=function(b,c){this.__callbacks={close:[],open:[]},this.__closingTime,this.__Content,this.__contentBcr,this.__destroyed=!1,this.__$emitterPrivate=a({}),this.__$emitterPublic=a({}),this.__enabled=!0,this.__garbageCollector,this.__Geometry,this.__lastPosition,this.__namespace="tooltipster-"+Math.round(1e6*Math.random()),this.__options,this.__$originParents,this.__pointerIsOverOrigin=!1,this.__previousThemes=[],this.__state="closed",this.__timeouts={close:[],open:null},this.__touchEvents=[],this.__tracker=null,this._$origin,this._$tooltip,this.__init(b,c)},a.Tooltipster.prototype={__init:function(b,c){var d=this;if(d._$origin=a(b),d.__options=a.extend(!0,{},f,c),d.__optionsFormat(),!h.IE||h.IE>=d.__options.IEmin){var e=null;if(void 0===d._$origin.data("tooltipster-initialTitle")&&(e=d._$origin.attr("title"),void 0===e&&(e=null),d._$origin.data("tooltipster-initialTitle",e)),null!==d.__options.content)d.__contentSet(d.__options.content);else{var g,i=d._$origin.attr("data-tooltip-content");i&&(g=a(i)),g&&g[0]?d.__contentSet(g.first()):d.__contentSet(e)}d._$origin.removeAttr("title").addClass("tooltipstered"),d.__prepareOrigin(),d.__prepareGC(),a.each(d.__options.plugins,function(a,b){d._plug(b)}),h.hasTouchCapability&&a(h.window.document.body).on("touchmove."+d.__namespace+"-triggerOpen",function(a){d._touchRecordEvent(a)}),d._on("created",function(){d.__prepareTooltip()})._on("repositioned",function(a){d.__lastPosition=a.position})}else d.__options.disabled=!0},__contentInsert:function(){var a=this,b=a._$tooltip.find(".tooltipster-content"),c=a.__Content,d=function(a){c=a};return a._trigger({type:"format",content:a.__Content,format:d}),a.__options.functionFormat&&(c=a.__options.functionFormat.call(a,a,{origin:a._$origin[0]},a.__Content)),"string"!=typeof c||a.__options.contentAsHTML?b.empty().append(c):b.text(c),a},__contentSet:function(b){return b instanceof a&&this.__options.contentCloning&&(b=b.clone(!0)),this.__Content=b,this._trigger({type:"updated",content:b}),this},__destroyError:function(){throw new Error("This tooltip has been destroyed and cannot execute your method call.")},__geometry:function(){var b=this,c=b._$origin,d=b._$origin.is("area");if(d){var e=b._$origin.parent().attr("name");c=a('img[usemap="#'+e+'"]')}var f=c[0].getBoundingClientRect(),g=a(h.window.document),i=a(h.window),j=c,k={available:{document:null,window:null},document:{size:{height:g.height(),width:g.width()}},window:{scroll:{left:h.window.scrollX||h.window.document.documentElement.scrollLeft,top:h.window.scrollY||h.window.document.documentElement.scrollTop},size:{height:i.height(),width:i.width()}},origin:{fixedLineage:!1,offset:{},size:{height:f.bottom-f.top,width:f.right-f.left},usemapImage:d?c[0]:null,windowOffset:{bottom:f.bottom,left:f.left,right:f.right,top:f.top}}};if(d){var l=b._$origin.attr("shape"),m=b._$origin.attr("coords");if(m&&(m=m.split(","),a.map(m,function(a,b){m[b]=parseInt(a)})),"default"!=l)switch(l){case"circle":var n=m[0],o=m[1],p=m[2],q=o-p,r=n-p;k.origin.size.height=2*p,k.origin.size.width=k.origin.size.height,k.origin.windowOffset.left+=r,k.origin.windowOffset.top+=q;break;case"rect":var s=m[0],t=m[1],u=m[2],v=m[3];k.origin.size.height=v-t,k.origin.size.width=u-s,k.origin.windowOffset.left+=s,k.origin.windowOffset.top+=t;break;case"poly":for(var w=0,x=0,y=0,z=0,A="even",B=0;B<m.length;B++){var C=m[B];"even"==A?(C>y&&(y=C,0===B&&(w=y)),w>C&&(w=C),A="odd"):(C>z&&(z=C,1==B&&(x=z)),x>C&&(x=C),A="even")}k.origin.size.height=z-x,k.origin.size.width=y-w,k.origin.windowOffset.left+=w,k.origin.windowOffset.top+=x}}var D=function(a){k.origin.size.height=a.height,k.origin.windowOffset.left=a.left,k.origin.windowOffset.top=a.top,k.origin.size.width=a.width};for(b._trigger({type:"geometry",edit:D,geometry:{height:k.origin.size.height,left:k.origin.windowOffset.left,top:k.origin.windowOffset.top,width:k.origin.size.width}}),k.origin.windowOffset.right=k.origin.windowOffset.left+k.origin.size.width,k.origin.windowOffset.bottom=k.origin.windowOffset.top+k.origin.size.height,k.origin.offset.left=k.origin.windowOffset.left+k.window.scroll.left,k.origin.offset.top=k.origin.windowOffset.top+k.window.scroll.top,k.origin.offset.bottom=k.origin.offset.top+k.origin.size.height,k.origin.offset.right=k.origin.offset.left+k.origin.size.width,k.available.document={bottom:{height:k.document.size.height-k.origin.offset.bottom,width:k.document.size.width},left:{height:k.document.size.height,width:k.origin.offset.left},right:{height:k.document.size.height,width:k.document.size.width-k.origin.offset.right},top:{height:k.origin.offset.top,width:k.document.size.width}},k.available.window={bottom:{height:Math.max(k.window.size.height-Math.max(k.origin.windowOffset.bottom,0),0),width:k.window.size.width},left:{height:k.window.size.height,width:Math.max(k.origin.windowOffset.left,0)},right:{height:k.window.size.height,width:Math.max(k.window.size.width-Math.max(k.origin.windowOffset.right,0),0)},top:{height:Math.max(k.origin.windowOffset.top,0),width:k.window.size.width}};"html"!=j[0].tagName.toLowerCase();){if("fixed"==j.css("position")){k.origin.fixedLineage=!0;break}j=j.parent()}return k},__optionsFormat:function(){return"number"==typeof this.__options.animationDuration&&(this.__options.animationDuration=[this.__options.animationDuration,this.__options.animationDuration]),"number"==typeof this.__options.delay&&(this.__options.delay=[this.__options.delay,this.__options.delay]),"number"==typeof this.__options.delayTouch&&(this.__options.delayTouch=[this.__options.delayTouch,this.__options.delayTouch]),"string"==typeof this.__options.theme&&(this.__options.theme=[this.__options.theme]),null===this.__options.parent?this.__options.parent=a(h.window.document.body):"string"==typeof this.__options.parent&&(this.__options.parent=a(this.__options.parent)),"hover"==this.__options.trigger?(this.__options.triggerOpen={mouseenter:!0,touchstart:!0},this.__options.triggerClose={mouseleave:!0,originClick:!0,touchleave:!0}):"click"==this.__options.trigger&&(this.__options.triggerOpen={click:!0,tap:!0},this.__options.triggerClose={click:!0,tap:!0}),this._trigger("options"),this},__prepareGC:function(){var b=this;return b.__options.selfDestruction?b.__garbageCollector=setInterval(function(){var c=(new Date).getTime();b.__touchEvents=a.grep(b.__touchEvents,function(a,b){return c-a.time>6e4}),d(b._$origin)||b.close(function(){b.destroy()})},2e4):clearInterval(b.__garbageCollector),b},__prepareOrigin:function(){var a=this;if(a._$origin.off("."+a.__namespace+"-triggerOpen"),h.hasTouchCapability&&a._$origin.on("touchstart."+a.__namespace+"-triggerOpen touchend."+a.__namespace+"-triggerOpen touchcancel."+a.__namespace+"-triggerOpen",function(b){a._touchRecordEvent(b)}),a.__options.triggerOpen.click||a.__options.triggerOpen.tap&&h.hasTouchCapability){var b="";a.__options.triggerOpen.click&&(b+="click."+a.__namespace+"-triggerOpen "),a.__options.triggerOpen.tap&&h.hasTouchCapability&&(b+="touchend."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){a._touchIsMeaningfulEvent(b)&&a._open(b)})}if(a.__options.triggerOpen.mouseenter||a.__options.triggerOpen.touchstart&&h.hasTouchCapability){var b="";a.__options.triggerOpen.mouseenter&&(b+="mouseenter."+a.__namespace+"-triggerOpen "),a.__options.triggerOpen.touchstart&&h.hasTouchCapability&&(b+="touchstart."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){!a._touchIsTouchEvent(b)&&a._touchIsEmulatedEvent(b)||(a.__pointerIsOverOrigin=!0,a._openShortly(b))})}if(a.__options.triggerClose.mouseleave||a.__options.triggerClose.touchleave&&h.hasTouchCapability){var b="";a.__options.triggerClose.mouseleave&&(b+="mouseleave."+a.__namespace+"-triggerOpen "),a.__options.triggerClose.touchleave&&h.hasTouchCapability&&(b+="touchend."+a.__namespace+"-triggerOpen touchcancel."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){a._touchIsMeaningfulEvent(b)&&(a.__pointerIsOverOrigin=!1)})}return a},__prepareTooltip:function(){var b=this,c=b.__options.interactive?"auto":"";return b._$tooltip.attr("id",b.__namespace).css({"pointer-events":c,zIndex:b.__options.zIndex}),a.each(b.__previousThemes,function(a,c){b._$tooltip.removeClass(c)}),a.each(b.__options.theme,function(a,c){b._$tooltip.addClass(c)}),b.__previousThemes=a.merge([],b.__options.theme),b},__scrollHandler:function(b){var c=this;if(c.__options.triggerClose.scroll)c._close(b);else if(d(c._$origin)&&d(c._$tooltip)){var e=null;if(b.target===h.window.document)c.__Geometry.origin.fixedLineage||c.__options.repositionOnScroll&&c.reposition(b);else{e=c.__geometry();var f=!1;if("fixed"!=c._$origin.css("position")&&c.__$originParents.each(function(b,c){var d=a(c),g=d.css("overflow-x"),h=d.css("overflow-y");if("visible"!=g||"visible"!=h){var i=c.getBoundingClientRect();if("visible"!=g&&(e.origin.windowOffset.left<i.left||e.origin.windowOffset.right>i.right))return f=!0,!1;if("visible"!=h&&(e.origin.windowOffset.top<i.top||e.origin.windowOffset.bottom>i.bottom))return f=!0,!1}return"fixed"==d.css("position")?!1:void 0}),f)c._$tooltip.css("visibility","hidden");else if(c._$tooltip.css("visibility","visible"),c.__options.repositionOnScroll)c.reposition(b);else{var g=e.origin.offset.left-c.__Geometry.origin.offset.left,i=e.origin.offset.top-c.__Geometry.origin.offset.top;c._$tooltip.css({left:c.__lastPosition.coord.left+g,top:c.__lastPosition.coord.top+i})}}c._trigger({type:"scroll",event:b,geo:e})}return c},__stateSet:function(a){return this.__state=a,this._trigger({type:"state",state:a}),this},__timeoutsClear:function(){return clearTimeout(this.__timeouts.open),this.__timeouts.open=null,a.each(this.__timeouts.close,function(a,b){clearTimeout(b)}),this.__timeouts.close=[],this},__trackerStart:function(){var a=this,b=a._$tooltip.find(".tooltipster-content");return a.__options.trackTooltip&&(a.__contentBcr=b[0].getBoundingClientRect()),a.__tracker=setInterval(function(){if(d(a._$origin)&&d(a._$tooltip)){if(a.__options.trackOrigin){var e=a.__geometry(),f=!1;c(e.origin.size,a.__Geometry.origin.size)&&(a.__Geometry.origin.fixedLineage?c(e.origin.windowOffset,a.__Geometry.origin.windowOffset)&&(f=!0):c(e.origin.offset,a.__Geometry.origin.offset)&&(f=!0)),f||(a.__options.triggerClose.mouseleave?a._close():a.reposition())}if(a.__options.trackTooltip){var g=b[0].getBoundingClientRect();g.height===a.__contentBcr.height&&g.width===a.__contentBcr.width||(a.reposition(),a.__contentBcr=g)}}else a._close()},a.__options.trackerInterval),a},_close:function(b,c,d){var e=this,f=!0;if(e._trigger({type:"close",event:b,stop:function(){f=!1}}),f||d){c&&e.__callbacks.close.push(c),e.__callbacks.open=[],e.__timeoutsClear();var g=function(){a.each(e.__callbacks.close,function(a,c){c.call(e,e,{event:b,origin:e._$origin[0]})}),e.__callbacks.close=[]};if("closed"!=e.__state){var i=!0,j=new Date,k=j.getTime(),l=k+e.__options.animationDuration[1];if("disappearing"==e.__state&&l>e.__closingTime&&e.__options.animationDuration[1]>0&&(i=!1),i){e.__closingTime=l,"disappearing"!=e.__state&&e.__stateSet("disappearing");var m=function(){clearInterval(e.__tracker),e._trigger({type:"closing",event:b}),e._$tooltip.off("."+e.__namespace+"-triggerClose").removeClass("tooltipster-dying"),a(h.window).off("."+e.__namespace+"-triggerClose"),e.__$originParents.each(function(b,c){a(c).off("scroll."+e.__namespace+"-triggerClose")}),e.__$originParents=null,a(h.window.document.body).off("."+e.__namespace+"-triggerClose"),e._$origin.off("."+e.__namespace+"-triggerClose"),e._off("dismissable"),e.__stateSet("closed"),e._trigger({type:"after",event:b}),e.__options.functionAfter&&e.__options.functionAfter.call(e,e,{event:b,origin:e._$origin[0]}),g()};h.hasTransitions?(e._$tooltip.css({"-moz-animation-duration":e.__options.animationDuration[1]+"ms","-ms-animation-duration":e.__options.animationDuration[1]+"ms","-o-animation-duration":e.__options.animationDuration[1]+"ms","-webkit-animation-duration":e.__options.animationDuration[1]+"ms","animation-duration":e.__options.animationDuration[1]+"ms","transition-duration":e.__options.animationDuration[1]+"ms"}),e._$tooltip.clearQueue().removeClass("tooltipster-show").addClass("tooltipster-dying"),e.__options.animationDuration[1]>0&&e._$tooltip.delay(e.__options.animationDuration[1]),e._$tooltip.queue(m)):e._$tooltip.stop().fadeOut(e.__options.animationDuration[1],m)}}else g()}return e},_off:function(){return this.__$emitterPrivate.off.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_on:function(){return this.__$emitterPrivate.on.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_one:function(){return this.__$emitterPrivate.one.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_open:function(b,c){var e=this;if(!e.__destroying&&d(e._$origin)&&e.__enabled){var f=!0;if("closed"==e.__state&&(e._trigger({type:"before",event:b,stop:function(){f=!1}}),f&&e.__options.functionBefore&&(f=e.__options.functionBefore.call(e,e,{event:b,origin:e._$origin[0]}))),f!==!1&&null!==e.__Content){c&&e.__callbacks.open.push(c),e.__callbacks.close=[],e.__timeoutsClear();var g,i=function(){"stable"!=e.__state&&e.__stateSet("stable"),a.each(e.__callbacks.open,function(a,b){b.call(e,e,{origin:e._$origin[0],tooltip:e._$tooltip[0]})}),e.__callbacks.open=[]};if("closed"!==e.__state)g=0,"disappearing"===e.__state?(e.__stateSet("appearing"),h.hasTransitions?(e._$tooltip.clearQueue().removeClass("tooltipster-dying").addClass("tooltipster-show"),e.__options.animationDuration[0]>0&&e._$tooltip.delay(e.__options.animationDuration[0]),e._$tooltip.queue(i)):e._$tooltip.stop().fadeIn(i)):"stable"==e.__state&&i();else{if(e.__stateSet("appearing"),g=e.__options.animationDuration[0],e.__contentInsert(),e.reposition(b,!0),h.hasTransitions?(e._$tooltip.addClass("tooltipster-"+e.__options.animation).addClass("tooltipster-initial").css({"-moz-animation-duration":e.__options.animationDuration[0]+"ms","-ms-animation-duration":e.__options.animationDuration[0]+"ms","-o-animation-duration":e.__options.animationDuration[0]+"ms","-webkit-animation-duration":e.__options.animationDuration[0]+"ms","animation-duration":e.__options.animationDuration[0]+"ms","transition-duration":e.__options.animationDuration[0]+"ms"}),setTimeout(function(){"closed"!=e.__state&&(e._$tooltip.addClass("tooltipster-show").removeClass("tooltipster-initial"),e.__options.animationDuration[0]>0&&e._$tooltip.delay(e.__options.animationDuration[0]),e._$tooltip.queue(i))},0)):e._$tooltip.css("display","none").fadeIn(e.__options.animationDuration[0],i),e.__trackerStart(),a(h.window).on("resize."+e.__namespace+"-triggerClose",function(b){var c=a(document.activeElement);(c.is("input")||c.is("textarea"))&&a.contains(e._$tooltip[0],c[0])||e.reposition(b)}).on("scroll."+e.__namespace+"-triggerClose",function(a){e.__scrollHandler(a)}),e.__$originParents=e._$origin.parents(),e.__$originParents.each(function(b,c){a(c).on("scroll."+e.__namespace+"-triggerClose",function(a){e.__scrollHandler(a)})}),e.__options.triggerClose.mouseleave||e.__options.triggerClose.touchleave&&h.hasTouchCapability){e._on("dismissable",function(a){a.dismissable?a.delay?(m=setTimeout(function(){e._close(a.event)},a.delay),e.__timeouts.close.push(m)):e._close(a):clearTimeout(m)});var j=e._$origin,k="",l="",m=null;e.__options.interactive&&(j=j.add(e._$tooltip)),e.__options.triggerClose.mouseleave&&(k+="mouseenter."+e.__namespace+"-triggerClose ",l+="mouseleave."+e.__namespace+"-triggerClose "),e.__options.triggerClose.touchleave&&h.hasTouchCapability&&(k+="touchstart."+e.__namespace+"-triggerClose",l+="touchend."+e.__namespace+"-triggerClose touchcancel."+e.__namespace+"-triggerClose"),j.on(l,function(a){if(e._touchIsTouchEvent(a)||!e._touchIsEmulatedEvent(a)){var b="mouseleave"==a.type?e.__options.delay:e.__options.delayTouch;e._trigger({delay:b[1],dismissable:!0,event:a,type:"dismissable"})}}).on(k,function(a){!e._touchIsTouchEvent(a)&&e._touchIsEmulatedEvent(a)||e._trigger({dismissable:!1,event:a,type:"dismissable"})})}e.__options.triggerClose.originClick&&e._$origin.on("click."+e.__namespace+"-triggerClose",function(a){e._touchIsTouchEvent(a)||e._touchIsEmulatedEvent(a)||e._close(a)}),(e.__options.triggerClose.click||e.__options.triggerClose.tap&&h.hasTouchCapability)&&setTimeout(function(){if("closed"!=e.__state){var b="",c=a(h.window.document.body);e.__options.triggerClose.click&&(b+="click."+e.__namespace+"-triggerClose "),e.__options.triggerClose.tap&&h.hasTouchCapability&&(b+="touchend."+e.__namespace+"-triggerClose"),c.on(b,function(b){e._touchIsMeaningfulEvent(b)&&(e._touchRecordEvent(b),e.__options.interactive&&a.contains(e._$tooltip[0],b.target)||e._close(b))}),e.__options.triggerClose.tap&&h.hasTouchCapability&&c.on("touchstart."+e.__namespace+"-triggerClose",function(a){e._touchRecordEvent(a)})}},0),e._trigger("ready"),e.__options.functionReady&&e.__options.functionReady.call(e,e,{origin:e._$origin[0],tooltip:e._$tooltip[0]})}if(e.__options.timer>0){var m=setTimeout(function(){e._close()},e.__options.timer+g);e.__timeouts.close.push(m)}}}return e},_openShortly:function(a){var b=this,c=!0;if("stable"!=b.__state&&"appearing"!=b.__state&&!b.__timeouts.open&&(b._trigger({type:"start",event:a,stop:function(){c=!1}}),c)){var d=0==a.type.indexOf("touch")?b.__options.delayTouch:b.__options.delay;d[0]?b.__timeouts.open=setTimeout(function(){b.__timeouts.open=null,b.__pointerIsOverOrigin&&b._touchIsMeaningfulEvent(a)?(b._trigger("startend"),b._open(a)):b._trigger("startcancel")},d[0]):(b._trigger("startend"),b._open(a))}return b},_optionsExtract:function(b,c){var d=this,e=a.extend(!0,{},c),f=d.__options[b];return f||(f={},a.each(c,function(a,b){var c=d.__options[a];void 0!==c&&(f[a]=c)})),a.each(e,function(b,c){void 0!==f[b]&&("object"!=typeof c||c instanceof Array||null==c||"object"!=typeof f[b]||f[b]instanceof Array||null==f[b]?e[b]=f[b]:a.extend(e[b],f[b]))}),e},_plug:function(b){var c=a.tooltipster._plugin(b);if(!c)throw new Error('The "'+b+'" plugin is not defined');return c.instance&&a.tooltipster.__bridge(c.instance,this,c.name),this},_touchIsEmulatedEvent:function(a){for(var b=!1,c=(new Date).getTime(),d=this.__touchEvents.length-1;d>=0;d--){var e=this.__touchEvents[d];if(!(c-e.time<500))break;e.target===a.target&&(b=!0)}return b},_touchIsMeaningfulEvent:function(a){return this._touchIsTouchEvent(a)&&!this._touchSwiped(a.target)||!this._touchIsTouchEvent(a)&&!this._touchIsEmulatedEvent(a)},_touchIsTouchEvent:function(a){return 0==a.type.indexOf("touch")},_touchRecordEvent:function(a){return this._touchIsTouchEvent(a)&&(a.time=(new Date).getTime(),this.__touchEvents.push(a)),this},_touchSwiped:function(a){for(var b=!1,c=this.__touchEvents.length-1;c>=0;c--){var d=this.__touchEvents[c];if("touchmove"==d.type){b=!0;break}if("touchstart"==d.type&&a===d.target)break}return b},_trigger:function(){var b=Array.prototype.slice.apply(arguments);return"string"==typeof b[0]&&(b[0]={type:b[0]}),b[0].instance=this,b[0].origin=this._$origin?this._$origin[0]:null,b[0].tooltip=this._$tooltip?this._$tooltip[0]:null,this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate,b),a.tooltipster._trigger.apply(a.tooltipster,b),this.__$emitterPublic.trigger.apply(this.__$emitterPublic,b),this},_unplug:function(b){var c=this;if(c[b]){var d=a.tooltipster._plugin(b);d.instance&&a.each(d.instance,function(a,d){c[a]&&c[a].bridged===c[b]&&delete c[a]}),c[b].__destroy&&c[b].__destroy(),delete c[b]}return c},close:function(a){return this.__destroyed?this.__destroyError():this._close(null,a),this},content:function(a){var b=this;if(void 0===a)return b.__Content;if(b.__destroyed)b.__destroyError();else if(b.__contentSet(a),null!==b.__Content){if("closed"!==b.__state&&(b.__contentInsert(),b.reposition(),b.__options.updateAnimation))if(h.hasTransitions){var c=b.__options.updateAnimation;b._$tooltip.addClass("tooltipster-update-"+c),setTimeout(function(){"closed"!=b.__state&&b._$tooltip.removeClass("tooltipster-update-"+c)},1e3)}else b._$tooltip.fadeTo(200,.5,function(){"closed"!=b.__state&&b._$tooltip.fadeTo(200,1)})}else b._close();return b},destroy:function(){var b=this;if(b.__destroyed)b.__destroyError();else{"closed"!=b.__state?b.option("animationDuration",0)._close(null,null,!0):b.__timeoutsClear(),b._trigger("destroy"),b.__destroyed=!0,b._$origin.removeData(b.__namespace).off("."+b.__namespace+"-triggerOpen"),a(h.window.document.body).off("."+b.__namespace+"-triggerOpen");var c=b._$origin.data("tooltipster-ns");if(c)if(1===c.length){var d=null;"previous"==b.__options.restoration?d=b._$origin.data("tooltipster-initialTitle"):"current"==b.__options.restoration&&(d="string"==typeof b.__Content?b.__Content:a("<div></div>").append(b.__Content).html()),d&&b._$origin.attr("title",d),b._$origin.removeClass("tooltipstered"),b._$origin.removeData("tooltipster-ns").removeData("tooltipster-initialTitle")}else c=a.grep(c,function(a,c){return a!==b.__namespace}),b._$origin.data("tooltipster-ns",c);b._trigger("destroyed"),b._off(),b.off(),b.__Content=null,b.__$emitterPrivate=null,b.__$emitterPublic=null,b.__options.parent=null,b._$origin=null,b._$tooltip=null,a.tooltipster.__instancesLatestArr=a.grep(a.tooltipster.__instancesLatestArr,function(a,c){return b!==a}),clearInterval(b.__garbageCollector)}return b},disable:function(){return this.__destroyed?(this.__destroyError(),this):(this._close(),this.__enabled=!1,this)},elementOrigin:function(){return this.__destroyed?void this.__destroyError():this._$origin[0]},elementTooltip:function(){return this._$tooltip?this._$tooltip[0]:null},enable:function(){return this.__enabled=!0,this},hide:function(a){return this.close(a)},instance:function(){return this},off:function(){return this.__destroyed||this.__$emitterPublic.off.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},on:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.on.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},one:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.one.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},open:function(a){return this.__destroyed?this.__destroyError():this._open(null,a),this},option:function(b,c){return void 0===c?this.__options[b]:(this.__destroyed?this.__destroyError():(this.__options[b]=c,this.__optionsFormat(),a.inArray(b,["trigger","triggerClose","triggerOpen"])>=0&&this.__prepareOrigin(),"selfDestruction"===b&&this.__prepareGC()),this)},reposition:function(a,b){var c=this;return c.__destroyed?c.__destroyError():"closed"!=c.__state&&d(c._$origin)&&(b||d(c._$tooltip))&&(b||c._$tooltip.detach(),c.__Geometry=c.__geometry(),c._trigger({type:"reposition",event:a,helper:{geo:c.__Geometry}})),c},show:function(a){return this.open(a)},status:function(){return{destroyed:this.__destroyed,enabled:this.__enabled,open:"closed"!==this.__state,state:this.__state}},triggerHandler:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this}},a.fn.tooltipster=function(){var b=Array.prototype.slice.apply(arguments),c="You are using a single HTML element as content for several tooltips. You probably want to set the contentCloning option to TRUE.";if(0===this.length)return this;if("string"==typeof b[0]){var d="#*$~&";return this.each(function(){var e=a(this).data("tooltipster-ns"),f=e?a(this).data(e[0]):null;if(!f)throw new Error("You called Tooltipster's \""+b[0]+'" method on an uninitialized element');if("function"!=typeof f[b[0]])throw new Error('Unknown method "'+b[0]+'"');this.length>1&&"content"==b[0]&&(b[1]instanceof a||"object"==typeof b[1]&&null!=b[1]&&b[1].tagName)&&!f.__options.contentCloning&&f.__options.debug&&console.log(c);var g=f[b[0]](b[1],b[2]);return g!==f||"instance"===b[0]?(d=g,!1):void 0}),"#*$~&"!==d?d:this}a.tooltipster.__instancesLatestArr=[];var e=b[0]&&void 0!==b[0].multiple,g=e&&b[0].multiple||!e&&f.multiple,h=b[0]&&void 0!==b[0].content,i=h&&b[0].content||!h&&f.content,j=b[0]&&void 0!==b[0].contentCloning,k=j&&b[0].contentCloning||!j&&f.contentCloning,l=b[0]&&void 0!==b[0].debug,m=l&&b[0].debug||!l&&f.debug;return this.length>1&&(i instanceof a||"object"==typeof i&&null!=i&&i.tagName)&&!k&&m&&console.log(c),this.each(function(){var c=!1,d=a(this),e=d.data("tooltipster-ns"),f=null;e?g?c=!0:m&&(console.log("Tooltipster: one or more tooltips are already attached to the element below. Ignoring."),console.log(this)):c=!0,c&&(f=new a.Tooltipster(this,b[0]),e||(e=[]),e.push(f.__namespace),d.data("tooltipster-ns",e),d.data(f.__namespace,f),f.__options.functionInit&&f.__options.functionInit.call(f,f,{origin:this}),f._trigger("init")),a.tooltipster.__instancesLatestArr.push(f)}),this},b.prototype={__init:function(b){this.__$tooltip=b,this.__$tooltip.css({left:0,overflow:"hidden",position:"absolute",top:0}).find(".tooltipster-content").css("overflow","auto"),this.$container=a('<div class="tooltipster-ruler"></div>').append(this.__$tooltip).appendTo(h.window.document.body)},__forceRedraw:function(){var a=this.__$tooltip.parent();this.__$tooltip.detach(),this.__$tooltip.appendTo(a)},constrain:function(a,b){return this.constraints={width:a,height:b},this.__$tooltip.css({display:"block",height:"",overflow:"auto",width:a}),this},destroy:function(){this.__$tooltip.detach().find(".tooltipster-content").css({display:"",overflow:""}),this.$container.remove()},free:function(){return this.constraints=null,this.__$tooltip.css({display:"",height:"",overflow:"visible",width:""}),this},measure:function(){this.__forceRedraw();var a=this.__$tooltip[0].getBoundingClientRect(),b={size:{height:a.height||a.bottom-a.top,width:a.width||a.right-a.left}};if(this.constraints){var c=this.__$tooltip.find(".tooltipster-content"),d=this.__$tooltip.outerHeight(),e=c[0].getBoundingClientRect(),f={height:d<=this.constraints.height,width:a.width<=this.constraints.width&&e.width>=c[0].scrollWidth-1};b.fits=f.height&&f.width}return h.IE&&h.IE<=11&&b.size.width!==h.window.document.documentElement.clientWidth&&(b.size.width=Math.ceil(b.size.width)+1),b}};var j=navigator.userAgent.toLowerCase();-1!=j.indexOf("msie")?h.IE=parseInt(j.split("msie")[1]):-1!==j.toLowerCase().indexOf("trident")&&-1!==j.indexOf(" rv:11")?h.IE=11:-1!=j.toLowerCase().indexOf("edge/")&&(h.IE=parseInt(j.toLowerCase().split("edge/")[1]));var k="tooltipster.sideTip";return a.tooltipster._plugin({name:k,instance:{__defaults:function(){return{arrow:!0,distance:6,functionPosition:null,maxWidth:null,minIntersection:16,minWidth:0,position:null,side:"top",viewportAware:!0}},__init:function(a){var b=this;b.__instance=a,b.__namespace="tooltipster-sideTip-"+Math.round(1e6*Math.random()),b.__previousState="closed",b.__options,b.__optionsFormat(),b.__instance._on("state."+b.__namespace,function(a){"closed"==a.state?b.__close():"appearing"==a.state&&"closed"==b.__previousState&&b.__create(),b.__previousState=a.state}),b.__instance._on("options."+b.__namespace,function(){b.__optionsFormat()}),b.__instance._on("reposition."+b.__namespace,function(a){b.__reposition(a.event,a.helper)})},__close:function(){this.__instance.content()instanceof a&&this.__instance.content().detach(),this.__instance._$tooltip.remove(),this.__instance._$tooltip=null},__create:function(){var b=a('<div class="tooltipster-base tooltipster-sidetip"><div class="tooltipster-box"><div class="tooltipster-content"></div></div><div class="tooltipster-arrow"><div class="tooltipster-arrow-uncropped"><div class="tooltipster-arrow-border"></div><div class="tooltipster-arrow-background"></div></div></div></div>');this.__options.arrow||b.find(".tooltipster-box").css("margin",0).end().find(".tooltipster-arrow").hide(),this.__options.minWidth&&b.css("min-width",this.__options.minWidth+"px"),this.__options.maxWidth&&b.css("max-width",this.__options.maxWidth+"px"),
this.__instance._$tooltip=b,this.__instance._trigger("created")},__destroy:function(){this.__instance._off("."+self.__namespace)},__optionsFormat:function(){var b=this;if(b.__options=b.__instance._optionsExtract(k,b.__defaults()),b.__options.position&&(b.__options.side=b.__options.position),"object"!=typeof b.__options.distance&&(b.__options.distance=[b.__options.distance]),b.__options.distance.length<4&&(void 0===b.__options.distance[1]&&(b.__options.distance[1]=b.__options.distance[0]),void 0===b.__options.distance[2]&&(b.__options.distance[2]=b.__options.distance[0]),void 0===b.__options.distance[3]&&(b.__options.distance[3]=b.__options.distance[1])),b.__options.distance={top:b.__options.distance[0],right:b.__options.distance[1],bottom:b.__options.distance[2],left:b.__options.distance[3]},"string"==typeof b.__options.side){var c={top:"bottom",right:"left",bottom:"top",left:"right"};b.__options.side=[b.__options.side,c[b.__options.side]],"left"==b.__options.side[0]||"right"==b.__options.side[0]?b.__options.side.push("top","bottom"):b.__options.side.push("right","left")}6===a.tooltipster._env.IE&&b.__options.arrow!==!0&&(b.__options.arrow=!1)},__reposition:function(b,c){var d,e=this,f=e.__targetFind(c),g=[];e.__instance._$tooltip.detach();var h=e.__instance._$tooltip.clone(),i=a.tooltipster._getRuler(h),j=!1,k=e.__instance.option("animation");switch(k&&h.removeClass("tooltipster-"+k),a.each(["window","document"],function(d,k){var l=null;if(e.__instance._trigger({container:k,helper:c,satisfied:j,takeTest:function(a){l=a},results:g,type:"positionTest"}),1==l||0!=l&&0==j&&("window"!=k||e.__options.viewportAware))for(var d=0;d<e.__options.side.length;d++){var m={horizontal:0,vertical:0},n=e.__options.side[d];"top"==n||"bottom"==n?m.vertical=e.__options.distance[n]:m.horizontal=e.__options.distance[n],e.__sideChange(h,n),a.each(["natural","constrained"],function(a,d){if(l=null,e.__instance._trigger({container:k,event:b,helper:c,mode:d,results:g,satisfied:j,side:n,takeTest:function(a){l=a},type:"positionTest"}),1==l||0!=l&&0==j){var h={container:k,distance:m,fits:null,mode:d,outerSize:null,side:n,size:null,target:f[n],whole:null},o="natural"==d?i.free():i.constrain(c.geo.available[k][n].width-m.horizontal,c.geo.available[k][n].height-m.vertical),p=o.measure();if(h.size=p.size,h.outerSize={height:p.size.height+m.vertical,width:p.size.width+m.horizontal},"natural"==d?c.geo.available[k][n].width>=h.outerSize.width&&c.geo.available[k][n].height>=h.outerSize.height?h.fits=!0:h.fits=!1:h.fits=p.fits,"window"==k&&(h.fits?"top"==n||"bottom"==n?h.whole=c.geo.origin.windowOffset.right>=e.__options.minIntersection&&c.geo.window.size.width-c.geo.origin.windowOffset.left>=e.__options.minIntersection:h.whole=c.geo.origin.windowOffset.bottom>=e.__options.minIntersection&&c.geo.window.size.height-c.geo.origin.windowOffset.top>=e.__options.minIntersection:h.whole=!1),g.push(h),h.whole)j=!0;else if("natural"==h.mode&&(h.fits||h.size.width<=c.geo.available[k][n].width))return!1}})}}),e.__instance._trigger({edit:function(a){g=a},event:b,helper:c,results:g,type:"positionTested"}),g.sort(function(a,b){if(a.whole&&!b.whole)return-1;if(!a.whole&&b.whole)return 1;if(a.whole&&b.whole){var c=e.__options.side.indexOf(a.side),d=e.__options.side.indexOf(b.side);return d>c?-1:c>d?1:"natural"==a.mode?-1:1}if(a.fits&&!b.fits)return-1;if(!a.fits&&b.fits)return 1;if(a.fits&&b.fits){var c=e.__options.side.indexOf(a.side),d=e.__options.side.indexOf(b.side);return d>c?-1:c>d?1:"natural"==a.mode?-1:1}return"document"==a.container&&"bottom"==a.side&&"natural"==a.mode?-1:1}),d=g[0],d.coord={},d.side){case"left":case"right":d.coord.top=Math.floor(d.target-d.size.height/2);break;case"bottom":case"top":d.coord.left=Math.floor(d.target-d.size.width/2)}switch(d.side){case"left":d.coord.left=c.geo.origin.windowOffset.left-d.outerSize.width;break;case"right":d.coord.left=c.geo.origin.windowOffset.right+d.distance.horizontal;break;case"top":d.coord.top=c.geo.origin.windowOffset.top-d.outerSize.height;break;case"bottom":d.coord.top=c.geo.origin.windowOffset.bottom+d.distance.vertical}"window"==d.container?"top"==d.side||"bottom"==d.side?d.coord.left<0?c.geo.origin.windowOffset.right-this.__options.minIntersection>=0?d.coord.left=0:d.coord.left=c.geo.origin.windowOffset.right-this.__options.minIntersection-1:d.coord.left>c.geo.window.size.width-d.size.width&&(c.geo.origin.windowOffset.left+this.__options.minIntersection<=c.geo.window.size.width?d.coord.left=c.geo.window.size.width-d.size.width:d.coord.left=c.geo.origin.windowOffset.left+this.__options.minIntersection+1-d.size.width):d.coord.top<0?c.geo.origin.windowOffset.bottom-this.__options.minIntersection>=0?d.coord.top=0:d.coord.top=c.geo.origin.windowOffset.bottom-this.__options.minIntersection-1:d.coord.top>c.geo.window.size.height-d.size.height&&(c.geo.origin.windowOffset.top+this.__options.minIntersection<=c.geo.window.size.height?d.coord.top=c.geo.window.size.height-d.size.height:d.coord.top=c.geo.origin.windowOffset.top+this.__options.minIntersection+1-d.size.height):(d.coord.left>c.geo.window.size.width-d.size.width&&(d.coord.left=c.geo.window.size.width-d.size.width),d.coord.left<0&&(d.coord.left=0)),e.__sideChange(h,d.side),c.tooltipClone=h[0],c.tooltipParent=e.__instance.option("parent").parent[0],c.mode=d.mode,c.whole=d.whole,c.origin=e.__instance._$origin[0],c.tooltip=e.__instance._$tooltip[0],delete d.container,delete d.fits,delete d.mode,delete d.outerSize,delete d.whole,d.distance=d.distance.horizontal||d.distance.vertical;var l=a.extend(!0,{},d);if(e.__instance._trigger({edit:function(a){d=a},event:b,helper:c,position:l,type:"position"}),e.__options.functionPosition){var m=e.__options.functionPosition.call(e,e.__instance,c,l);m&&(d=m)}i.destroy();var n,o;"top"==d.side||"bottom"==d.side?(n={prop:"left",val:d.target-d.coord.left},o=d.size.width-this.__options.minIntersection):(n={prop:"top",val:d.target-d.coord.top},o=d.size.height-this.__options.minIntersection),n.val<this.__options.minIntersection?n.val=this.__options.minIntersection:n.val>o&&(n.val=o);var p;p=c.geo.origin.fixedLineage?c.geo.origin.windowOffset:{left:c.geo.origin.windowOffset.left+c.geo.window.scroll.left,top:c.geo.origin.windowOffset.top+c.geo.window.scroll.top},d.coord={left:p.left+(d.coord.left-c.geo.origin.windowOffset.left),top:p.top+(d.coord.top-c.geo.origin.windowOffset.top)},e.__sideChange(e.__instance._$tooltip,d.side),c.geo.origin.fixedLineage?e.__instance._$tooltip.css("position","fixed"):e.__instance._$tooltip.css("position",""),e.__instance._$tooltip.css({left:d.coord.left,top:d.coord.top,height:d.size.height,width:d.size.width}).find(".tooltipster-arrow").css({left:"",top:""}).css(n.prop,n.val),e.__instance._$tooltip.appendTo(e.__instance.option("parent")),e.__instance._trigger({type:"repositioned",event:b,position:d})},__sideChange:function(a,b){a.removeClass("tooltipster-bottom").removeClass("tooltipster-left").removeClass("tooltipster-right").removeClass("tooltipster-top").addClass("tooltipster-"+b)},__targetFind:function(a){var b={},c=this.__instance._$origin[0].getClientRects();if(c.length>1){var d=this.__instance._$origin.css("opacity");1==d&&(this.__instance._$origin.css("opacity",.99),c=this.__instance._$origin[0].getClientRects(),this.__instance._$origin.css("opacity",1))}if(c.length<2)b.top=Math.floor(a.geo.origin.windowOffset.left+a.geo.origin.size.width/2),b.bottom=b.top,b.left=Math.floor(a.geo.origin.windowOffset.top+a.geo.origin.size.height/2),b.right=b.left;else{var e=c[0];b.top=Math.floor(e.left+(e.right-e.left)/2),e=c.length>2?c[Math.ceil(c.length/2)-1]:c[0],b.right=Math.floor(e.top+(e.bottom-e.top)/2),e=c[c.length-1],b.bottom=Math.floor(e.left+(e.right-e.left)/2),e=c.length>2?c[Math.ceil((c.length+1)/2)-1]:c[c.length-1],b.left=Math.floor(e.top+(e.bottom-e.top)/2)}return b}}}),a});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:54:"/local/templates/arlight/js/script.js?1657207552150772";s:6:"source";s:37:"/local/templates/arlight/js/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
if (!siteDir) {
    var siteDir = '/';
}
if (!SITE_ID) {
    var SITE_ID = '';
}

function ready(fn) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

var fn = function () {
    var hellopreloader = document.getElementById("preloader_block");
    window.onload = function () {
        fadeOutnojquery(hellopreloader);
    };
    setTimeout(function () {
        fadeOutnojquery(hellopreloader);
    }, 1500);

    function fadeOutnojquery(el) {
        el.style.opacity = 1;
        var interhellopreloader = setInterval(function () {
            el.style.opacity = el.style.opacity - 0.05;
            if (el.style.opacity <= 0.05) {
                clearInterval(interhellopreloader);
                hellopreloader.style.display = "none";
            }
        }, 15);
    }
};

ready(fn);

(function ($) {
    $(document).ready(function () {
        //сортировка таблиц
        TableSorter();
        //инициализация слайдеров
        SliderInit();
        //скролл вверх
        ToTheTop();
        //мобильное меню
        MobileMenu();
        //открытие поиска
        OpenBlock();
        //переключение между Авторизация/Регистрация
        AuthReg();
        //переход по ссылке вернуться
        BackHistory();
        //селекты
        SelectFunc();
        //события в фильтре
        FilterFunc();
        //слайдер цены
        PriceSlider();
        //действия на странице Вопрос-ответ
        FaqFunc();
        //количество товаров
        BuyFunc();
        //видео plyr
        PlyrInit();
        //валидация форм
        ValidateForm();
        //переключение закладок в профиле
        ProfileTab();
        //активные пункты в фильтре
        CatalogSectionInFilter();
        //сортировка в каталоге
        CatalogSorting();
        //отображение прелоадера при фильтрации
        PreloadFilter();
        //подключение календаря
        DatePicker();
        //отображение результатов фильтрации, аякс
        CatalogFilterAjax();
        //переход на сраницу оформления заказа в мобильном по клику вместо открытия миникорзины
        CartButtonOnMobile();
        //форма настроек сайта
        FormSetting();
        //действия на странице сравнения товаров
        CompareFunc();
        CompareChangeSection();
        // форма обратной связи на странице контакты
        SendContactsForm();
        // форма подписаться на новостти
        SendSubscribeForm();
        //кастомный скролл
        ScrollInit();
        //страница избранных товаров
        FavoriteFunc();
        //прилипание блока в корзине
        StickyBlock();
        //лайки к новостям
        LikeAction();
        //подбор размера шрифта в поле ввода поиска
        ChangeSizeFontInSearch();
        //табы в контактах
        ContactTab();
        //маска для форм
        MaskInput();
        //перенос текста
        HyphenateInit();
        //высота картинки в разделе Информация
        SetImgHeight();
        //скролл в списке магазинов по клику
        ScrollInStoreList();
        //переход в сравнение и избранное  только если есть товары
        CompareFavoriteLink();
        //постепенная загрузка изображений слайдера
        LazyLoadMainSlider();
        //липкий хедер
        StickyHeader();
        //ограничение для демоверсии
        DemoVersionFunction();
        //ховер по кнопке В козину после того, как товар добавлен
        ActionHover();
        //форма изменения статуса отправки ответа на сообщения в админке
        FeedbakFormStatus();
        //форма изменения списка пользователей, получающих уведомления
        NotificationFormUser();
        //проверяем italic на сайте
        FindItalic();
        //оборачиваем таблицы в блоки респонсив
        TableResponsiveWrapper();
        //изменяем тайтлы для кнопок на странице сравнения
        ChangeButtonTitlesOnComparePage();
        //фиксим картинки в главном слайдере по высоте
        MainSliderFixPictures();
        //обработчик повторения заказа
        RepeatOrder();
        //обработка seo-формы
        SeoForm();
        //разделы поиска
        ChangeSearchSection();
        //карточка товара, показать больше параметров
        ShowMoreInCard();
        //установка наценки на товары
        UpdatePricesIncrease();
        UpdateLocalPrice();
        //подсказки для статусов
        TooltipStatus();
        //функции для кастомных светильников
        MenuLampHrefButton();
        CustomProducts();
        CustomProducts2();
        CustomLampsFunctions();
        openCalc();
    });

    function openCalc() {
        $(document).on('submit', '#form-calc_6', function (e) {
            e.preventDefault();
            var urlPage = $('[data-service="CALC_RESET"]').attr('href');
            var action = $(this).serialize();
            var url = urlPage + '?' + action;
            $('.preloader_block_2').fadeIn();
            $.ajax({
                type: 'POST',
                url: url,
                success: function (response) {
                    if (response !== '') {
                        response = $(response);
                        var calcHtml = response.find('.block').html();
                        $('.news-detail .block').html(calcHtml);
                        // $('.input-with-btns').each(function () {
                        //     var block = $(this).parent();
                        //     block.addClass('input-with-btns--wrap').append('<div class=" input-with-btns--change input-with-btns--minus">-</div>').prepend('<div class="input-with-btns--change input-with-btns--plus">+</div>');
                        // });
                        $('.calc-block__section--result-table').addClass('active');
                        $('.preloader_block_2').fadeOut();
                    }
                }
            });
        });
    }

    function TooltipStatus() {
        if ($('.tooltip_status').length) {
            $('.tooltip_status').tooltipster({
                theme: 'tooltipster-shadow',
                touchDevices: false,
                maxWidth: 280
            });
        }
    }

    function UpdatePricesIncrease() {
        if ($('.update_prices_percent_input').length && $('.update_prices_percent_button').length) {
            $(document).on('click', '.update_prices_percent_button', function (e) {
                e.preventDefault();
                var input = $('.update_prices_percent_input');
                var oldValue = input.attr('data-start-value');
                var maxValue = input.attr('data-max-value');
                var newValue = input.val();
                if (oldValue && parseInt(maxValue) && newValue) {
                    oldValue = parseInt(oldValue);
                    maxValue = parseInt(maxValue);
                    newValue = parseInt(newValue);
                    if (newValue === oldValue) {
                        alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_IZMENILO);
                    } else {
                        if (newValue < 0) {
                            alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY);
                        } else {
                            if (newValue > maxValue) {
                                alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY1 + maxValue + '%!');
                            } else {
                                $('.preloader_block').fadeIn();
                                $.ajax({
                                    url: siteDir + 'ajax/pricesIncreasePercents.php',
                                    data: 'newValue=' + newValue,
                                    type: 'POST',
                                    success: function (data) {
                                        if (data === 'ok') {
                                            alert(LangConst.ARLIGHT_ARSTORE_CENY_IMENENY);
                                        }
                                        $('.preloader_block').fadeOut();
                                    }
                                });
                            }
                        }
                    }
                }
            });
        }
    }

    function UpdateLocalPrice(){
        $(document).on('submit', '#change_price', function (e) {
            e.preventDefault();
            $('.preloader_block').fadeIn();
            $.ajax({
                url: '/ajax/pricesIncreasePercents.php',
                data: $(this).serialize(),
                type: 'POST',
                success: function (data) {
                    if(data === 'ok'){
                        alert('Цены успешно изменены!');
                    }else{
                        alert(data);
                    }
                    $('.preloader_block').fadeOut();
                }
            });
        });
    }

    function ShowMoreInCard() {
        $(document).on('click', '.specifications__text-more', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('.specifications__text').toggleClass('active')
        });
        $(document).on('click', '.specifications__table-all', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('.card__table').toggleClass('active')
        });
    }

    function ChangeSearchSection() {
        var item = localStorage.getItem("searchSectionActive");
        if (item > 0) {
            if ($('[data-search=' + item + ']').length > 0 && $('.button[data-search=' + item + ']').length > 0) {
                $('.button[data-search]').removeClass('active_el');
                $('.search-section').removeClass('active_el');
                $(document).find('[data-search=' + item + ']').addClass('active_el');
                $(document).find('.button[data-search=' + item + ']').addClass('active_el');
            } else {
                localStorage.removeItem("searchSectionActive");
            }
        }

        $(document).on('click', '.button[data-search]', function (e) {
            e.preventDefault();
            var item = $(this).attr('data-search');
            $('.button[data-search]').removeClass('active_el');
            $('.search-section').removeClass('active_el');
            $(document).find('[data-search=' + item + ']').addClass('active_el');
            $(document).find('.button[data-search=' + item + ']').addClass('active_el');
            localStorage.setItem("searchSectionActive", item);

        })
    }

    function SeoForm() {
        var sectionTable = $("#seo-table--sections");
        var productTable = $("#seo-table--products");
        if (sectionTable.length > 0) {
            sectionTable.tablesorter({
                sortList: [[0, 0]],
                widgets: ["filter"],
                widgetOptions: {
                    filter_external: '.search',
                    filter_reset: '.reset',
                    filter_searchFiltered: false,
                    filter_placeholder: {search: LangConst.ARLIGHT_ARSTORE_POISK}
                }
            });
        }
        if (productTable.length > 0) {
            productTable.tablesorter({
                sortList: [[0, 0]],
                widgets: ["filter"],
                widgetOptions: {
                    filter_external: '.search',
                    filter_reset: '.reset',
                    filter_searchFiltered: false,
                    filter_placeholder: {search: LangConst.ARLIGHT_ARSTORE_POISK}
                }
            });
        }

        //show/hide empty inputs
        $(document).on('click', '[data-show="empty"]', function (e) {
            e.preventDefault();
            $(this).hide();
            $('[data-show="all"]').show();

            $('.seo-table').addClass('search-empty');
            $('.seo-table tbody tr input[type="text"], .seo-table tbody tr textarea').each(function () {
                var value = $(this).val();
                if (!value)
                    $(this).parents('tr').addClass('is-empty');
            });
        });
        $(document).on('click', '[data-show="all"]', function (e) {
            e.preventDefault();
            $(this).hide();
            $('[data-show="empty"]').show();

            $('.seo-table').removeClass('search-empty');
            $('.seo-table tbody tr input[type="text"]').each(function () {
                $(this).parents('tr').removeClass('is-empty');
            })
        });


        function sendAjax(table, action) {
            $('.preloader_block').fadeIn();
            var tableRow = table.find('tbody tr');
            var data = {action: action, items: {}};
            tableRow.each(function () {
                var name = $(this).find('[data-seo="name"]').attr('data-seo-code');
                var title = $(this).find('[name="seo[title]"]').val();
                var keywords = $(this).find('[name="seo[keywords]"]').val();
                var descriptions = $(this).find('[name="seo[descriptions]"]').val();
                data.items[name] = {title: title, keywords: keywords, descriptions: descriptions};
            });
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/seo_save.php',
                data: data,
                success: function (response) {
                    $('.preloader_block').fadeOut();
                },
                error: function (xhr) {
                    $('.preloader_block').fadeOut();
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        }

        $(document).on('click', '#seo-table--save', function (e) {
            e.preventDefault();
            sendAjax($('#seo-table--sections'), 'sections');
        });

        $(document).on('click', '#seo-table--pr---save', function (e) {
            e.preventDefault();
            var section = 'empty';
            if ($(this).data('section'))
                section = $(this).data('section');
            sendAjax($('#seo-table--products'), section);
        });
    }

    function ChangeButtonTitlesOnComparePage() {
        if ($('.buy-block__button--favorite').length) {
            $('.buy-block__button--favorite[data-slug="ADD_TO_FAVORITE"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE);
            });
            $('.buy-block__button--favorite[data-slug="ADD_TO_CART"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_PEREYTI_V_KORZINU : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU);
            });
        }
    }

    function TableResponsiveWrapper() {
        if ($('.news-detail .content__text table').length) {
            $('.news-detail .content__text table').each(function () {
                $(this).wrap("<div class='news_table_responsive'></div>");
            });
        }
    }

    function getStyle(elem) {
        if (window.getComputedStyle) return getComputedStyle(elem, null);
        else return elem.currentStyle;
    }

    function FindItalic() {
        $('body *').each(function () {
            if (getStyle(this).fontStyle === 'italic') {
                $(this).addClass('font_style_normal');
            }
        });

    }

    function RepeatOrder() {
        if ($('.repeat_order_init').length) {
            var articles = {};
            var names = {};
            $(document).on('click', '.repeat_order_init', function () {
                $('.preloader_block').fadeIn();
                $('.personal__order-list-item--table:not(.personal__order-list-item--title) .personal__order-list-col--vend').each(function () {
                    articles[$.trim($(this).text())] = $.trim($(this).parent().find('.personal__order-list-col--count').text());
                    names[$.trim($(this).text())] = $.trim($(this).parent().find('.personal__order-list-col--name').text());
                });
                $.ajax({
                    url: siteDir + 'ajax/ajax_repeat_order.php',
                    data: 'check=yes&data=' + JSON.stringify(articles),
                    type: 'POST',
                    success: function (data) {
                        var cartCount = parseInt($.trim($('.header__cart .header__count').text()));
                        if (cartCount || data !== 'ok') {
                            var popupHTML = '';
                            if (cartCount) {
                                popupHTML += '<div class="popup_order_repeat_text">' + LangConst.ARLIGHT_ARSTORE_V_VASEY_KORZINE_ESTQ + '</div>';
                            }
                            if (data !== 'ok') {
                                var articles = JSON.parse(data);
                                $(articles).each(function (index, item) {
                                    popupHTML += '<div class="popup_order_repeat_text">' + LangConst.ARLIGHT_ARSTORE_TOVAR + ' <b>' + names[item] + '</b> ' + LangConst.ARLIGHT_ARSTORE_V_DANNYY_MOMENT_NE_D + '</div>';
                                    delete articles[item];
                                });
                            }
                            $('.popup_order_repeat_messages').html(popupHTML);
                            $('.popup_order_repeat_opener').click();
                            $('.preloader_block').fadeOut();
                        } else {
                            $('.popup_order_repeat_continue').click();
                        }
                    }
                });

            });
            $(document).on('click', '.popup_order_repeat_continue', function () {
                $('.preloader_block').fadeIn();
                $.fancybox.close();
                $.ajax({
                    url: siteDir + 'ajax/ajax_repeat_order.php',
                    data: 'check=no&data=' + JSON.stringify(articles),
                    type: 'POST',
                    success: function (data) {
                        if (data === 'ok') {
                            window.location.href = siteDir + 'order/';
                        }
                    }
                });
            });
            $(document).on('click', '.popup_order_repeat_closer, .popup_order_repeat_cancel', function () {
                $.fancybox.close();
            });
        }
    }

    function MainSliderFixPictures() {
        if ($('.banner-slider .slide__img img').length) {
            $('.banner-slider .slide__img img').each(function () {
                var a = $(this).height();
                var b = $(this).parents('.slide__img').height();
                if (parseFloat(a) && parseFloat(a) > 100 && parseFloat(a) < parseFloat(b)) {
                    $(this).css({'height': '100%', 'width': 'auto'});
                }
            });
        }
    }

    function ChangeButtonTitlesOnComparePage() {
        if ($('.buy-block__button--favorite').length) {
            $('.buy-block__button--favorite[data-slug="ADD_TO_FAVORITE"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE);
            });
            $('.buy-block__button--favorite[data-slug="ADD_TO_CART"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_PEREYTI_V_KORZINU : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU);
            });
        }
    }

    function TableResponsiveWrapper() {
        if ($('.news-detail .content__text table').length) {
            $('.news-detail .content__text table').each(function () {
                $(this).wrap("<div class='news_table_responsive'></div>");
            });
        }
    }

    function getStyle(elem) {
        if (window.getComputedStyle) return getComputedStyle(elem, null);
        else return elem.currentStyle;
    }

    function FindItalic() {
        $('body *').each(function () {
            if (getStyle(this).fontStyle === 'italic') {
                $(this).addClass('font_style_normal');
            }
        });

    }

    function NotificationFormUser() {
        $(document).on('click', '.note_order_add', function (e) {
            e.preventDefault();
            var input = $(this).prev('p').html();
            $(this).before('<p>' + input + '</p>');
        });

        $(document).on('submit', '#notifications_user', function (e) {
            e.preventDefault();
            var emailOrderAll = '';
            var emailFeedbackAll = '';
            var email1 = $(this).find('input[name="note_order"]');
            var email2 = $(this).find('input[name="note_feedback"]');
            email1.each(function () {
                var email = $(this).val();
                if (email.length > 0) {
                    emailOrderAll = emailOrderAll + ', ' + email
                }
            });
            email2.each(function () {
                var email = $(this).val();
                if (email.length > 0) {
                    emailFeedbackAll = emailFeedbackAll + ', ' + email
                }
            });
            emailOrderAll = emailOrderAll.slice(2);
            emailFeedbackAll = emailFeedbackAll.slice(2);
            var data = {emailOrderAll: emailOrderAll, emailFeedbackAll: emailFeedbackAll};
            $('.preloader_block').fadeIn();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/action_notifications_user.php',
                data: data,
                success: function (data) {
                    if (data === 'ok') {
                        location.reload();
                    }
                },
                error: function (xhr) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        })
    }

    function FeedbakFormStatus() {
        $(document).on('click', '.change-status--feedback', function (e) {
            e.preventDefault();
            $(this).hide();
            $(this).next('.change-status--feedback---form').show();
        });
        var select = $('select[name="status_filter_select"]');
        select.change(function () {
            var valStatus = $(this).val();
            var form = $(this).parents('form'),
                iblockID = form.attr('data-ibid'),
                elId = form.find('input[name="el-id"]').val(),
                data = {id: elId, ibId: iblockID, status: valStatus};

            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/action_change_feedback_status.php',
                data: data,
                success: function (data) {
                    var answer = '';
                    if (data === 'N') {
                        answer = '<div class="alert alert-success" role="alert">' + LangConst.ARLIGHT_ARSTORE_NOVYY + '</div>';
                    } else {
                        if (data === 'Y') {
                            answer = '<div class="alert alert-info" role="alert">' + LangConst.ARLIGHT_ARSTORE_OTVET_OTPRAVLEN + '</div>'
                        }
                    }
                    form.prev('.change-status--feedback').html(answer);
                    form.prev('.change-status--feedback').show();
                    form.hide();
                },
                error: function (xhr) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });
    }

    function ActionHover() {
        $('.buy-block__button--submit').hover(function () {
                if ($(this).hasClass('in_cart')) {
                    var newText = $(this).attr('data-sendorder');
                    var oldText = $(this).text();
                    $(this).attr('data-old', oldText);
                    $(this).text(newText);
                }
            },
            function () {
                var oldText = $(this).attr('data-old');
                $(this).text(oldText);
            })
    }

    function DemoVersionFunction() {
        $(document).on('click', '#save-demo', function (e) {
            e.preventDefault();
            e.stopPropagation();
            alert(LangConst.ARLIGHT_ARSTORE_V_DEMO);
        });
    }

    function StickyHeader() {
        var header = $('header.header');
        var body = $('body');
        var type = $('body').attr('data-header');
        $(window).scroll(function () {
            if (type === 'scheme1') {
                if ($(window).scrollTop() < 290) {
                    header.removeClass('header_fixed');
                    body.removeClass('header_fixed');
                } else {
                    header.addClass('header_fixed');
                    body.addClass('header_fixed');
                }
            } else {
                if ($(window).scrollTop() < 50) {
                    header.removeClass('header_fixed');
                    body.removeClass('header_fixed');
                } else {
                    header.addClass('header_fixed');
                    body.addClass('header_fixed');
                }
            }
        });
    }

    function TableSorter() {
        if ($("#tableUser").length > 0) {
            $("#tableUser").tablesorter({sortList: [[3, 0]]});
        }
    }

    function LazyLoadMainSlider() {
        var slider = $('.banner-slider');
        if (slider.length > 0) {
            var slide = $('.banner-slider [data-slick-index=0]');
            if (slide.length > 0) {
                var srcArr = slide.find('.slide__img picture').attr('data-srcset').split(', ');
                $.each(slide.find('.slide__img source'), function (i, item) {
                    $(item).attr('srcset', srcArr[i])
                });
                slide.find('.slide__img img').attr('src', srcArr[srcArr.length - 1]);

                slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                    var slide = $('.banner-slider [data-slick-index=' + nextSlide + ']');
                    var srcArr = slide.find('.slide__img picture').attr('data-srcset').split(', ');
                    $.each(slide.find('.slide__img source'), function (i, item) {
                        $(item).attr('srcset', srcArr[i])
                    });
                    slide.find('.slide__img img').attr('src', srcArr[srcArr.length - 1]);
                    setTimeout(function () {
                        MainSliderFixPictures();
                    }, 100);
                });
            }
        }
    }

    function CompareFavoriteLink() {
        $(document).on('click', '.header__compare a, .header__favorite a', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var count = parseInt($(this).find('.header__count').html());
            if (count > 0)
                window.location = href;
        })
    }

    function ScrollInStoreList() {
        var scroll;
        var block = $("#map__list");
        $(document).on('dblclick', '.map__list-more a', function (e) {
            e.preventDefault();
            var h = block.find('.map__list-block').height();
            block.animate({scrollTop: h}, 500);
        });
        var timeInt;
        var time = 150;
        $(document).on('mousedown', '.map__list-more a', function (e) {
            e.preventDefault();
            scroll = parseInt(block.scrollTop());
            block.animate({scrollTop: scroll + 30}, time);
            timeInt = setInterval(function () {
                scroll = parseInt(block.scrollTop());
                block.animate({scrollTop: scroll + 30}, time);
            }, time);
        });
        $(document).on('mouseup', '.map__list-more a', function (e) {
            e.preventDefault();
            clearTimeout(timeInt);
        });

        if (block.length > 0) {
            if ($('.map__list-block').height() <= $('.map__list').height()) {
                $('.map__list-more').hide();
            }
        }
    }

    function SetImgHeight() {
        $('.news-item__img').each(function () {
            var wrap = $(this).find('a'),
                img = $(this).find('img'),
                hWr = wrap.height(),
                hImg = img.height();
            if (hImg < hWr) {
                img.addClass('fullheight')
            }
        })
    }

    function HyphenateInit() {
        var text = $('.newnews-item__content, .content__text, .content__text p, .content__text:not(a), .content__text:not(img), .card__description, .card__param-value, .news-item__text, .news-item__title span, .item__answer, .text-wrap p, .text-wrap li, .slide__description, .slide__title-text > a');
        var textLeft = $('.item__name span');
        var textCenter = $('.additional-goods__title');
        text.hyphenate('left');
        textLeft.hyphenate('left');
        textCenter.hyphenate('center');
    }

    function MaskInput() {
        var input = $("input[name='phone']:not(#phone), input[name='PERSONAL_PHONE'], input[name='field[USER][PHONE]'], input[name='REGISTER[PERSONAL_PHONE]'], input[name='order-phone']");
        var options = {
            onKeyPress: function (cep, e, field, options) {
                var mask;
                var masks = ['+0(000)000-00-00', '+000(00)000-00-00'];
                if (cep.indexOf('+375') === 0 || cep.indexOf('+3(75') === 0) {
                    mask = masks[1]
                } else {
                    mask = masks[0]
                }
                input.mask(mask, options);
            },
            clearIfNotMatch: false
        };

        if (input.val()) {
            var cep = input.val().trim();

            var mask;
            var masks = ['+0(000)000-00-00', '+000(00)000-00-00'];
            if (cep.indexOf('375') === 0 || cep.indexOf('3(75') === 0 || cep.indexOf('+375') === 0 || cep.indexOf('+3(75') === 0) {
                mask = masks[1]
            } else {
                mask = masks[0]
            }
            input.mask(mask, options);
        }

        //маска для главного номера телефона в шапке и футере
        var mainPhone = $('#send_main_setting #phone');
        if (mainPhone.length > 0) {
            var maskList = $.masksSort($.masksLoad("/local/templates/arlight/js/phones-ru.json"), ['#'], /[0-9]|#/, "mask");
            var maskOpts = {
                inputmask: {
                    definitions: {
                        '#': {
                            validator: "[0-9]",
                            cardinality: 1
                        }
                    },
                    //clearIncomplete: true,
                    showMaskOnHover: false,
                    autoUnmask: true,
                    clearMaskOnLostFocus: false
                },
                match: /[0-9]/,
                replace: '#',
                list: maskList,
                listKey: "mask",
                onMaskChange: function (maskObj, completed) {
                    if (completed) {
                        var hint = maskObj.name_ru;
                        if (maskObj.desc_ru && maskObj.desc_ru != "") {
                            hint += " (" + maskObj.desc_ru + ")";
                        }
                    }
                    $(this).attr("placeholder", $(this).inputmask("getemptymask"));
                }
            };
            mainPhone.inputmasks(maskOpts);
        }
    }

    function ContactTab() {
        $(document).on('click', '.info__menu-list--contact li a', function (e) {
            e.preventDefault();
            $('.info__menu-list--contact li a').removeClass('active_el');
            $(this).addClass('active_el');
            var href = $(this).attr('data-href');
            if (href !== 'all') {
                $('.contacts__item').hide();
                $('.contacts__item[data-href="' + href + '"]').show();
            } else {
                $('.contacts__item').show()
            }

        })
    }

    function ChangeSizeFontInSearch() {
        if ($(window).width() > 1200) {
            $('.header__search-form-block').append("<span class='changesearch'></span>");
            var input = $('.header__search-form-input'),
                wInput,
                wSpan,
                fSzInput,
                span = $('.changesearch');
            $(document).on('input', '.header__search-form-input', function () {
                span.text($(this).val());
                wInput = input.width();
                wSpan = span.width() + 200;
                if (wSpan > wInput) {
                    while (wSpan > wInput) {
                        fSzInput = parseInt(input.css('font-size'));
                        fSzInput = 0.95 * fSzInput;
                        input.css('font-size', '' + fSzInput + 'px');
                        span.css('font-size', '' + fSzInput + 'px');
                        wSpan = span.width();
                    }
                } else {
                    if (fSzInput < 110) {
                        while (wSpan < wInput) {
                            fSzInput = parseInt(input.css('font-size'));
                            fSzInput = 1.05 * fSzInput;
                            input.css('font-size', '' + fSzInput + 'px');
                            span.css('font-size', '' + fSzInput + 'px');
                            wSpan = span.width();
                        }
                    }
                }

            })
        }
    }

    function LikeAction() {
        $(document).on('click', '.like-link', function (e) {
            e.preventDefault();
            var type = $(this).attr('data-like'),
                newsId = $('.like-block').attr('data-newsId'),
                iblockID = $('.like-block').attr('data-iblock'),
                data = {type: type, id: newsId, ibId: iblockID},
                val,
                localValue = localStorage.getItem('news_' + newsId);

            if (!localValue) {
                $.ajax({
                    type: 'POST',
                    url: siteDir + 'ajax/action_like.php',
                    data: data,
                    success: function (data) {
                        val = data;
                        $('.like-link[data-like="' + type + '"] .like-block__txt').text(val);
                        localStorage.setItem('news_' + newsId, type);
                        $('.like-link[data-like="' + type + '"]').addClass('active_el');
                    },
                    error: function (xhr) {
                        alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                    }
                });
            }
        });

        if ($('.news-detail .like-block').length > 0) {
            var newsId = $('.like-block').attr('data-newsId'),
                localValue = localStorage.getItem('news_' + newsId);
            if (localValue) {
                $('.like-link').addClass('disabled_el');
                $('.like-link[data-like="' + localValue + '"]').addClass('active_el');
            }
        }
    }

    function StickyBlock() {
        var menu = document.querySelector('.order__pay-block');
        var order = document.querySelector('.order.row');


        function Sticky() {
            if ($(window).width() > 768 && $(order).length > 0 && $(menu).length > 0) {
                var menuPosition2 = $(order).offset().top;
                var parw = $(menu).parent().width();
                var ScrBody = $(window).scrollTop();
                var ScrFooter = $('.footer').offset().top;
                var a = $(menu).height();
                var menuHeight = parseFloat($('.header__menu').outerHeight(true)) + 20;
                var b = ScrFooter - ScrBody - menuHeight - 20;
                if (ScrBody >= menuPosition2) {
                    $(menu).width(parw);
                    if (a > b) {
                        menu.style.top = 'auto';
                        menu.style.position = 'absolute';
                        menu.style.bottom = '-20px';
                    } else {
                        menu.style.bottom = 'auto';
                        menu.style.position = 'fixed';
                        menu.style.top = menuHeight + 'px';
                    }
                } else {
                    menu.style.position = 'static';
                    menu.style.top = '';
                }
            }
        }

        window.addEventListener('scroll', function () {
            Sticky();
        });

        $('.order.row').click(function () {
            Sticky();
        })
    }

    function FavoriteFunc() {
        $(document).on('click', '.favorite__result .compare__section a', function (e) {
            e.preventDefault();
            var n = $(this).attr('data-item');
            if (n !== 'all') {
                $('.compare__section a').removeClass('active_el');
                $(this).addClass('active_el');
                $('.item__main-block').hide();
                $('.item-group-marker[data-group="' + n + '"]').next().show();
            } else {
                $('.item__main-block').show();
            }
        })
    }

    favoriteFunc = function () {
        var groupID = $('.favorite__result .compare__section .button_transparent.active_el').attr('data-item');
        if (parseInt(groupID)) {
            if (!$('.item-group-marker[data-group="' + groupID + '"]').length && $('.favorite__result .compare__section .button_transparent:not(.active_el)').length) {
                $('.favorite__result .compare__section .button_transparent.active_el').parent('li').remove();
                $('.favorite__result .compare__section .button_transparent:not(.active_el)')[0].click();
            }
        }
    };

    function ScrollInit() {
        $('.scrollbar-macosx').scrollbar();
    }

    function SendContactsForm() {
        $('.contacts__form form').validate({
            rules: {
                test_input_contact: {
                    maxlength: 0
                }
            }
        });

        $(document).on('submit', '.contacts__form form', function (e) {
            var msg = $(this).serialize();
            e.preventDefault();
            $('.preloader_block').fadeIn();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/form_contacts.php',
                data: msg,
                success: function (msg) {
                    $('.preloader_block').fadeOut();
                    $('.contacts__form form').html('<div class="contacts__form-answer">' + LangConst.ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA + '</div>');
                },
                error: function (xhr, str) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });

    }

    function SendSubscribeForm() {
        $('.subscribe__form form').validate({
            rules: {
                test_input_subscr: {
                    maxlength: 0
                }
            }
        });
        $('.footer__subscribe form').validate({
            rules: {
                test_input_subscr: {
                    maxlength: 0
                }
            }
        });

        function sendSubFormAll(form) {
            $(document).on('submit', form, function (e) {
                var msg = $(this).serialize();
                e.preventDefault();
                $('.preloader_block').fadeIn();
                $.ajax({
                    type: 'POST',
                    url: siteDir + 'ajax/form_subscribe.php',
                    data: msg,
                    success: function (msg) {
                        $('.preloader_block').fadeOut();
                        $(form).html('<div class="contacts__form-answer">' + LangConst.ARLIGHT_ARSTORE_PODPISKA_OFORMLENA + '</div>');
                    },
                    error: function (xhr, str) {
                        alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                    }
                });
            });
        }

        sendSubFormAll('.subscribe__form form');
        sendSubFormAll('.footer__subscribe form');


    }

    function CompareFunc() {
        var styleBlock = '<div class="compare_different_block"><style>.compare__table-main .compare__body .compare__td.compare_different { color: #ef172f!important; } </style></div>';
        if (!$('.compare_different_block').length) $('.compare__result').before(styleBlock);
        $.each($('.compare__table-main .compare__row'), function (i, item) {
            var row = $(item),
                rowH = row.height();
            row.attr('data-numb', i).attr('data-height', rowH).height(rowH);

        });
        $.each($('.compare__table-left .compare__row'), function (i, item2) {
            $(this).attr('data-numb', i);
            var rowH = $('.compare__table-main .compare__row[data-numb="' + i + '"]').attr('data-height');
            var rowHLeft = $(this).height();
            if (parseFloat(rowH) > parseFloat(rowHLeft)) {
                $(item2).height(parseFloat(rowH));
            } else {
                $('.compare__table-main .compare__row[data-numb="' + i + '"]').attr('data-height', rowHLeft).height(rowHLeft);
            }
        });

        $('.compare__table-main .compare__body .compare__row').hover(
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '#F3D2D4');
                $('.compare__table-left .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '#F3D2D4');
            }
            ,
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '');
                $('.compare__table-left .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '');
            }
        );
        $('.compare__table-left .compare__body .compare__row').hover(
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '#F3D2D4');
                $('.compare__table-main .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '#F3D2D4');
            }
            ,
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '');
                $('.compare__table-main .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '');
            }
        );
        $.each($('.compare__table-wrap2'), function (i, item) {
            if ($(item).is(":visible")) {
                $.each($(item).find('.compare__table-main .compare__row'), function (i2, item2) {
                    var dataNumber = $(item2).attr('data-numb');
                    if ($.trim($(item2).text()) === '') {
                        $(item).find('.compare__table-main .compare__row[data-numb="' + dataNumber + '"]').detach();
                        $(item).find('.compare__table-left .compare__row[data-numb="' + dataNumber + '"]').detach();
                    } else {

                        if ($(item).find('.compare__td-title').length > 1) {
                            if (!$(item2).parent('div').hasClass('compare__head')) {
                                var valuesArr = {};
                                $.each($(item2).find('.compare__td'), function (i3, item3) {
                                    valuesArr[$.trim($(item3).text())] = true;
                                });
                                var size = Object.keys(valuesArr).length;
                                if (size > 1) {
                                    var propName = $.trim($(item).find('.compare__table-left .compare__row[data-numb="' + dataNumber + '"] .compare__td').text());
                                    if (propName !== LangConst.ARLIGHT_ARSTORE_NAIMENOVANIE && propName !== LangConst.ARLIGHT_ARSTORE_ARTICUL) {
                                        $(item).find('.compare__table-main .compare__row[data-numb="' + dataNumber + '"] .compare__td').addClass('compare_different');
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
        $('.scrollbar-outer').scrollbar();
    }

    compareFunc = function () {
        $.each($('.compare__table-wrap2'), function (i, item) {
            if ($(item).is(":visible")) {
                if ($(item).find('.compare__table-main .compare__body .compare__td-title').length) {
                    $('.compare__row .compare__td').removeClass('compare_different');
                    CompareFunc();
                } else {
                    if ($('.compare__result .compare__section .button_transparent:not(.active_el)').length) {
                        $('.compare__result .compare__section .button_transparent.active_el').parent('li').remove();
                        $('.compare__result .compare__section .button_transparent:not(.active_el)')[0].click();
                    }
                }
            }
        });
    };

    function CompareChangeSection() {
        $(document).on('click', '.compare__section a', function (e) {
            e.preventDefault();
            var n = $(this).attr('data-item');

            $('.compare__section a').removeClass('active_el');
            $('.compare__row .compare__td').removeClass('compare_different');
            $(this).addClass('active_el');
            $('.compare__table-wrap2').hide();
            $('.compare__table-wrap2[data-item="' + n + '"]').show();
            $.each($('.compare__table-main .compare__row'), function (i, item) {
                var row = $(item);
                row.attr('data-numb', i).height('auto');
            });
            $.each($('.compare__table-left .compare__row'), function (i, item) {
                var row = $(item);
                row.attr('data-numb', i).height('auto');
            });
            CompareFunc();
        })
    }


    function FormSetting() {

        $(document).on('click', '.tablink', function (e) {
            e.preventDefault();
            $(this).next('.tabcontent').slideToggle();
        });

        $(document).on('click', '.shop__name-edit', function (e) {
            e.preventDefault();
            $(this).prev('form').slideToggle();
        });

        //подсчет вводимых символов
        $(document).on('input', '#header_message_text', function () {
            var lengthInput = 30 - parseInt($(this).val().length);
            var text;
            if (lengthInput >= 0) {
                text = '. '+LangConst.ARLIGHT_ARSTORE_OSTALOS_VVESTI+' - ' + lengthInput;
            } else {
                text = '. '+LangConst.ARLIGHT_ARSTORE_BOLSCHE_SIMV+''
            }
            $('label[for="header_message_text"] span').html(text);
        });

        //подставление класса иконки в инпут
        $(document).on('click', '.header_message_icon-item', function (e) {
            e.preventDefault();
            $('.header_message_icon-item').removeClass('active_el');
            $(this).addClass('active_el');
            var value = $(this).attr('data-icon');
            $('#header_message_icon').val(value);
        });
        //выделение активной иконки по инпуту
        var icon = $('#header_message_icon').val();
        $('.header_message_icon-item[data-icon="' + icon + '"]').addClass('active_el');

        //выбор цветовой схемы
        $(document).on('click', '.color-scheme-items', function () {
            var val = $(this).attr('data-scheme');
            $('.color-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-color-scheme').val(val);
            $('body').attr('data-color', val);
        });
        var colorScheme = $('#data-color-scheme').val();
        $('.color-scheme-items[data-scheme="' + colorScheme + '"]').addClass('active_el');

        //выбор font family схемы
        $(document).on('click', '.font-scheme-items', function () {
            var val = $(this).attr('data-font');
            $('.font-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-font-scheme').val(val);
            $('body').attr('data-font', val);
        });
        var fontScheme = $('#data-font-scheme').val();
        $('.font-scheme-items[data-font="' + fontScheme + '"]').addClass('active_el');

        //выбор cхемы header
        $(document).on('click', '.header-scheme-items', function () {
            var val = $(this).attr('data-header');
            $('.header-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-header-scheme').val(val);
            $('body').attr('data-header', val);
        });
        var headerScheme = $('#data-header-scheme').val();
        $('.header-scheme-items[data-header="' + headerScheme + '"]').addClass('active_el');

        //добавление дополнительных полей ввода телефона и email
        $(document).on('click', '.add_input', function (e) {
            e.preventDefault();
            var input = $(this).prev('input'),
                copy = input.clone().val('').attr('data-default', '').attr('value', '').attr('data-required', 'false');
            $(this).before(copy);
        });

        //добавление формы нового магазина
        $(document).on('click', '.add-shop', function (e) {
            e.preventDefault();
            var time = new Date();
            var timeForId = Date.parse(time);
            $(".settings__shop-list-hide").clone().insertBefore($(this)).removeClass('settings__shop-list-hide').wrap("<form class='form_shop' id='" + timeForId + "'></form>");
            $(this).before("<hr>");
        });
        //удаление формы нового магазина
        $(document).on('click', '.settings__shop-list--del', function (e) {
            e.preventDefault();
            $(this).parents('.form_shop').next('hr').remove();
            $(this).parents('.form_shop').remove();
        });
        //удаление существующего магазина
        $(document).on('click', '.shop__name-del', function (e) {
            e.preventDefault();
            $(this).parents('.shop__wrap').addClass('add-hidden').append('<div class="mess"><span>' + LangConst.ARLIGHT_ARSTORE_MAGAZIN_BUDET_UDALEN + '</span> <a href="javascript:void(null);" class="remove-hidden">' + LangConst.ARLIGHT_ARSTORE_OTMENITQ_UDALENIE + '</a></div>');
            $(this).parents('.shop__wrap').find('input[name="delete"]').val('true');
        });
        $(document).on('click', '.remove-hidden', function (e) {
            e.preventDefault();
            $(this).parents('.shop__wrap').find('input[name="delete"]').val('false');
            $(this).parents('.shop__wrap').removeClass('add-hidden');
            $(this).parents('.shop__wrap').find("div.mess").remove();

        });
        $(document).on('input', 'input[name="shop-geo"]', function () {
            $(this).val(($(this).val()).replace(/\s/g, ''));
        });

        //валидация полей формы настроек
        function ValidInput(input) {
            var pattern;
            input.removeClass('is-invalid');
            input.next('.invalid-feedback').remove();
            if (input.val() !== '') {
                if (input.attr('type') === 'email') {
                    pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,7}\.)?[a-z]{2,7}$/i;
                } else {
                    if (input.attr('type') === 'tel') {
                        pattern = /^\+?[0-9\-?\(?\)?\s?]{7,30}$/g;
                    } else {
                        if (input.attr('name') === 'shop-geo') {
                            pattern = /^\-?\d{1,3}\.\d{1,}\,\-?\d{1,3}\.+\d{1,}$/g;
                        }
                    }
                }

                if (pattern !== undefined) {
                    if (pattern.test(input.val())) {
                        input.removeClass('is-invalid');
                        input.next('.invalid-feedback').remove();
                    } else {
                        input.addClass('is-invalid').after("<div class='invalid-feedback'></div>");
                        input.next('div.invalid-feedback').text(LangConst.ARLIGHT_ARSTORE_VVEDITE_VERNOE_ZNACE);
                    }
                }
            } else {
                if (input.attr('data-required') === 'true') {
                    input.addClass('is-invalid').after("<div class='invalid-feedback'></div>");
                    input.next('div.invalid-feedback').text(LangConst.ARLIGHT_ARSTORE_ETO_POLE_DOLJNO_BYTQ);
                }
            }
        }

        function appendArray(form_data, values, name) {
            if (!values && name)
                form_data.append(name, '');
            else {
                if (typeof values == 'object') {
                    for (key in values) {
                        if (typeof values[key] == 'object')
                            appendArray(form_data, values[key], name + '[' + key + ']');
                        else
                            form_data.append(name + '[' + key + ']', values[key]);
                    }
                } else
                    form_data.append(name, values);
            }
            return form_data;
        }

        var valid;

        $(document).on('click', '#save_admin_settings', function (e) {
            e.preventDefault();

            valid = true;

            var form1 = $('#send_main_setting'),
                form2 = $('#send_main_setting_logo'),
                form3 = $('.form_shop'),
                img_shop_input = $('.form_shop input[type="file"]'),
                form4 = $('#send_setting_header');
            var sendData = new FormData();

            $.each(form1.find('input'), function (i, item) {
                var input = $(item);
                if ($(input).attr('type') === 'checkbox') {
                    if ($(this).prop('checked') === true) {
                        $(this).val('Y')
                    } else {
                        $(this).val('N')
                    }
                }
                if (input.attr('data-default') !== input.val()) {
                    sendData.append(input.attr('name'), $.trim(input.val()));
                }

                //преобразование номера телефона с учетом маски
                if (input.attr('id') === 'phone' && input.attr('data-default') !== input.val()) {
                    var plHolderPhone = (input.attr('placeholder')).replace(/,/g, '');
                    var valPhoneAr = input.val().split('');
                    i = 0;
                    while (plHolderPhone.indexOf('_') >= 0) {
                        plHolderPhone = plHolderPhone.replace('_', valPhoneAr[i]);
                        i++;
                    }
                    sendData.append(input.attr('name'), $.trim(plHolderPhone));
                }
            });

            $.each(form2.find('input[type="file"]'), function (i, item) {
                var input = $(item);
                if (input.val() !== input.attr('data-default') && this.files.length) {
                    sendData.append('new_files', 'true');
                    sendData.append(input.attr('name'), this.files[0]);
                }
            });


            //склеивание множественных телефонов и e-mail в один инпут
            $('input[name="shop-phone"]').each(function () {
                var val = [],
                    str;
                $(this).parents('.shop-phone').find('input[name="shop-phone-item"]').each(function () {
                    if ($(this).val() !== '') {
                        val[val.length] = $(this).val()
                    }
                });
                str = val.join(';');
                $(this).val(str);
            });

            $('input[name="shop-email"]').each(function () {
                var val = [],
                    str;
                $(this).parents('.shop-email').find('input[name="shop-email-item"]').each(function () {
                    if ($(this).val() !== '') {
                        val[val.length] = $(this).val()
                    }
                });
                str = val.join(';');
                $(this).val(str);
            });


            var ShopListAr = [],
                ShopList = {},
                ShopItem = {};

            $.each(form3, function (i, item) {
                var form = item,
                    id = $(form).attr('id');

                $.each($(item).find('input'), function (j, item_input) {
                    if ($(item_input).attr('type') === 'checkbox') {
                        if ($(this).prop('checked') === true) {
                            $(this).val('Y')
                        } else {
                            $(this).val('N')
                        }
                    }

                    var input = $(item_input),
                        name = input.attr('name'),
                        val = $.trim(input.val());

                    if (input.attr('data-default') !== input.val()) {
                        var timeName = (input.attr('name')).slice(0, -2);
                        if (timeName === "shop-time" || timeName === "shop-days") {
                            var shopInputsTime = input.parents('.shop-time').find('input');
                            shopInputsTime.each(function (i, el) {
                                var inputTime = $(el),
                                    nameTime = inputTime.attr('name');
                                ShopItem[nameTime] = $.trim(inputTime.val());
                            })
                        } else {
                            if (name.indexOf('shop-set') == -1)
                                ShopItem[name] = val;
                            else {
                                name = (name.slice(1)).slice(0, -1);
                                ShopItem[name] = val;
                            }
                        }
                    }
                });
                ShopList[id] = ShopItem;
                ShopItem = {};
            });
            //добавление изображений магазинов в formdata
            $.each(img_shop_input, function (i, item) {
                var input = $(item);
                // var idShopImg = input.parents('.form_shop').find('input[name="shop-id"]').val();
                var idShopImg = input.parents('.form_shop').attr('id');
                if (input.val() !== input.attr('data-default') && this.files.length) {
                    sendData.append('new_files_shop', 'true');
                    sendData.append((input.attr('name') + '_' + idShopImg), this.files[0]);
                }
            });

            //добавление списка измененных, добавленных магазинов в formdata
            appendArray(sendData, ShopList, 'ShopList');

            $.each(form4.find('input'), function (i, item) {
                var input = $(item);
                if (input.attr('data-default') !== input.val()) {
                    if (input.attr('type') !== 'radio')
                        sendData.append(input.attr('name'), $.trim(input.val()));
                    else {
                        if (input.attr('type') === 'radio' && input.prop("checked") === true) {
                            sendData.append(input.attr('name'), $.trim(input.val()));
                        }
                    }
                }
            });

            //проверка на наличие ошибок
            var InputsAll = $('#send_main_setting, .form_shop').find('input'),
                InputsAllInvalid = [];
            $.each(InputsAll, function (i, item) {
                ValidInput($(item));
                if ($(item).hasClass('is-invalid')) {
                    valid = false;
                    InputsAllInvalid[InputsAllInvalid.length] = $(item);
                }
                $(item).keyup(function () {
                    ValidInput($(this))
                });
                $(item).change(function () {
                    ValidInput($(this))
                })
            });

            if (valid === true) {
                $('.preloader_block').show();
                $.ajax({
                    url: siteDir + 'ajax/action_form_setting.php',
                    type: 'POST',
                    data: sendData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $(window).unbind('beforeunload');
                        location.reload();
                    }
                });
            } else {
                InputsAllInvalid[0].focus();
            }
        });

        //перезагрузка страницы с несохраненными данными
        $(window).bind('beforeunload', function (e) {
            var changArr = [];
            $('.mainsetting input').each(function () {
                var def = $(this).attr('data-default');
                var defsoc = $(this).attr('data-value');
                if (def && def !== '' && $(this).val() && $(this).attr('id') !== 'phone') {
                    if (def !== $(this).val()) {
                        changArr.push($(this).val());
                    }
                }
                if (defsoc && defsoc !== '' && $(this).val()) {
                    if (defsoc !== $(this).val()) {
                        changArr.push($(this).val());
                    }
                }
            });
            if (changArr.length > 0)
                return LangConst.ARLIGHT_ARSTORE_VOMONO_IMENENIA;
        });

        //изменение внешнего вида загрузчика изображений лого
        $(document).on('click', '.file-upload-btn', function (e) {
            e.preventDefault();
            $(this).nextAll('.image-upload-wrap').find('.file-upload-input').trigger('click');
        });

        $(document).on('change', '.file-upload-input', function (e) {
            e.preventDefault();
            var wrap = $(this).parents('.image-upload-wrap'),
                name = this.files[0].name,
                error = $(this).parents('.image-upload-wrap').find('.error'),
                img = $(this).parents('.image-upload-wrap').nextAll('.file-upload-content').find('.file-upload-image'),
                content = $(this).parents('.image-upload-wrap').nextAll('.file-upload-content');


            if (this.files && this.files[0] && this.files[0].size < 5242880 && this.files[0].type === 'image/png') {
                var reader = new FileReader();
                error.html('');
                reader.onload = function (e) {
                    wrap.hide();
                    img.attr('src', e.target.result);
                    content.show();
                    img.nextAll('.image-title-wrap').find('.image-title').html(name);
                };
                reader.readAsDataURL(this.files[0]);
            } else {
                if (this.files[0].size > 5242880) {
                    error.html(LangConst.ARLIGHT_ARSTORE_IZOBRAJENIE_NE_DOLJN)
                }
                if (this.files[0].type !== 'image/png') {
                    error.html(LangConst.ARLIGHT_ARSTORE_IZOBRAJENIE_PNG)
                }
            }
        });
        $(document).on('click', '.remove-image', function (e) {
            e.preventDefault();
            var parent = $(this).parents('.file-upload');
            parent.find('.file-upload-input').val('');
            parent.find('.file-upload-input').replaceWith($('.file-upload-input').clone());
            parent.find('.file-upload-content').hide();
            parent.find('.image-upload-wrap').show();

        });

        //вставка координат из карты
        $(document).on('click', '.shop-checkpoint', function () {
            var IdShop = $(this).parents('form.form_shop').attr('id');
            $('#map_shop_popup').attr('data-forshop', IdShop);
        });

        $(document).on('click', '.map_shop_btn a', function (e) {
            e.preventDefault();
            var inputVal = $(this).prev().val();
            var IdShop = $(this).parents('#map_shop_popup').attr('data-forshop');
            $('form.form_shop#' + IdShop + '').find('.shop-coord input').val(inputVal);
            $.fancybox.close();
            $('#temp-coord').val('');
        })

    }


    function CartButtonOnMobile() {
        $(document).on('click', '.header__cart>a', function (e) {
            if ($(window).width() < 1200) {
                e.preventDefault();
                location.href = siteDir + "order/"
            }
        })
    }

    function CatalogFilterAjax() {
        $(document).on('click', '#modef .filter-block-result-col a', function (e) {
            $('.preloader_block').fadeIn(200);
        });
        $(document).on('click', '#modef2 .filter-block-result-col a', function (e) {
            e.preventDefault();
            $('#modef .filter-block-result-col a').click();
        });
    }

    function DatePicker() {
        var dateFormat = "mm/dd/yy",
            from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    }

    function PreloadFilter() {
        $(document).on('click', 'input[name="set_filter"], #del_filter', function () {
            $('.preloader_block').fadeIn(200);
        });
    }

    function CatalogSectionInFilter() {
        var link = $('.categories-list__link.active_el');
        link.parents('.categories-list--sub').prev('.categories-list__link').addClass('active_el');
        link.parents('.categories-list--sub').addClass('active_el');
        link.next('.categories-list--sub').addClass('active_el');
    }

    function setGetAttr(prmName, val) {
        var res = '';
        var d = location.href.split("#")[0].split("?");
        var base = d[0];
        var query = d[1];
        if (query) {
            var params = query.split("&");
            for (var i = 0; i < params.length; i++) {
                var keyval = params[i].split("=");
                if (keyval[0] != prmName) {
                    res += params[i] + '&';
                }
            }
        }
        res += prmName + '=' + val;
        return base + '?' + res;
    }

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    function SelectFunc() {
        $(document).on('click', '.meta-info__sort', function () {
            $(this).children('ul').slideToggle();
        });
        $(document).on('click', '.meta-info__sort a', function (e) {
            e.preventDefault();
            var value = $(this).text().trim();
            var valueAttr = $(this).attr('data-value').trim();
            $(this).parents('.meta-info__sort').find('input').val(value).attr('data-value', valueAttr).change();
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".info__sort li, .meta-info__sort-item").length) return;
            $('.meta-info__sort-list').slideUp();
            event.stopPropagation();
        });
    }

    function CatalogSorting() {

        if (getUrlParameter('catSortOrder')) {
            var key = getUrlParameter('catSortOrder');
            var key2 = $('.meta-info__sort input').val();
            if (key !== key2) {
                var valueText = $('a[ data-value=' + key + ']').text().trim();
                $('.meta-info__sort input').attr('data-value', key).val(valueText);
            }
        }
        var stopper = false;

        $(document).on('change', '.meta-info__sort input', function () {
            var value = $(this).attr('data-value');
            if (!stopper) {
                stopper = true;
                $('.preloader_block').fadeIn(200);
                window.location.href = setGetAttr('catSortOrder', value);
            }
        })
    }


    function ProfileTab() {
        $(document).on('click', '#personal .personal__tabs-link', function (e) {
            e.preventDefault();
            $('#personal .personal__tabs-link, #personal .personal__block').removeClass('active_el');
            var href = $(this).attr('data-block');
            $(this).addClass('active_el');
            $('#personal .personal__block[data-block="' + href + '"]').addClass('active_el');
        })
    }

    function ValidateForm() {
        $.validator.methods.email = function (value, element) {
            return this.optional(element) || /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,7}\.)?[a-z]{2,7}$/i.test(value);
        };

        var validator = $(".question form").validate({
            rules: {
                test_input: {
                    maxlength: 0
                }
            }
        });

        $("form[name='regform_popup']").validate();

        $(document).on('submit', '.question form', function () {
            FormQuest();
        });

        $(document).on('click', '.question__close', function () {
            validator.resetForm();
            $('.question .input').val('');
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".question__block, .question").length) return;
            if (validator) {
                validator.resetForm();
                $('.question .input').val('');
                event.stopPropagation();
            }
        });

        $("#send_order").validate();

        $("#lamp_order").validate();

        $('#alulamp__request').validate();
        $(document).on('submit', '#alulamp__request', function () {
            var msg = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/form.php',
                data: msg,
                success: function (msg) {
                    if (msg !== '' && isNaN(parseInt(msg)) === false) {
                        $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_VASA_ZAAVKA_USPESNO + '</div>');
                        $('#alulamp__request input, #alulamp__request textarea').each(function () {
                            $(this).val('');
                        });
                    }
                },
                error: function (xhr, str) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });
    }

    function FormQuest() {
        var msg = $('.question form').serialize();
        $('.question__col-center').addClass('preload');
        $('.question__col-center .question__col-block, .question__submit, .form__policy').hide();
        $.ajax({
            type: 'POST',
            url: siteDir + 'ajax/form.php',
            data: msg,
            success: function (msg) {
                if (msg !== '' && isNaN(parseInt(msg)) === false) {
                    $('.question__col-center').removeClass('preload').append('<div class="question__col-answer">' + LangConst.ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA + '</div>');
                    $('.question form input, .question form textarea').each(function () {
                        $(this).val('');
                    });
                    //YM
                    if (arGoalsYM['send-ask-form'] && arGoalsYM['send-ask-form']['id'] && arGoalsYM['send-ask-form']['name']) {
                        if (window.ym) {
                            ym(arGoalsYM['send-ask-form']['id'], 'reachGoal', arGoalsYM['send-ask-form']['name']);
                        }
                    }
                }
            },
            error: function (xhr, str) {
                alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
            }
        });

        $(document).on('click', '.question__close', function (e) {
            e.preventDefault();
            $('.question__col-answer').remove();
            $('.question__col-center .question__col-block, .question__submit, .form__policy').show();
        })
    }


    function PlyrInit() {
        if ($('.js-player').length > 0)
            var players = Plyr.setup('.js-player');
    }


    // DIDGO
    $(document).on('keyup', '#searchUser', function () {
        _this = this;
        $.each($("#tableUser tbody tr"), function () {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    function BuyFunc() {
        $(document).on('mousedown', '.buy-block__button', function (e) {
            e.preventDefault();
            var input = $(this).siblings('input');
            var operation = $(this).html();
            var normal = parseFloat(input.attr('data-packnorm'));
            var val = parseFloat(input.val());

            var residual = (val % normal);
            if (residual !== 0) {
                if (operation === "+") {
                    input.val(val + normal - residual).change();
                } else {
                    if (operation === "-") {
                        if ((val - normal) < 0) {
                            input.val(0).change()
                        } else {
                            input.val(val - normal + residual).change();
                        }
                    }
                }
            } else {
                if (operation === "+") {
                    input.val(val + normal).change();
                } else {
                    if (operation === "-") {
                        if ((val - normal) < 0) {
                            input.val(0).change()
                        } else {
                            input.val(val - normal).change();
                        }
                    }
                }
            }
            input.blur();
        });
        $(document).on('click', '.buy-block__button', function (e) {
            e.preventDefault();
        });

        $(document).on('change', '.buy-block__input', function (e) {
            var val = parseFloat($(this).val());
            var normal = parseFloat($(this).attr('data-packnorm'));
            if (val <= 0 || !$(this).val()) {
                $(this).val(0)
            } else {
                var residual = Math.ceil(parseFloat(val / normal));
                if (residual !== 0) {
                    $(this).val(residual * normal)
                }
            }
        });
        //запрет ввода не цифровых символов
        $(document).on('keydown', '.buy-block__input', function (e) {
            if ((e.which >= 48 && e.which <= 57)  // цифры
                || (e.which >= 96 && e.which <= 105)  // num lock
                || e.which === 8 // backspace
                || e.which === 190 // .
                || e.which === 110 // .
                || (e.which >= 37 && e.which <= 40) // стрелки
                || e.which === 46) // delete
            {
                return true;
            } else {
                return false;
            }
        });


        $('.buy-block__input').bind("paste", function (e) {
            e.preventDefault();
        });
    }

    function FaqFunc() {
        $(document).on('click', '.faq .item__link', function (e) {
            e.preventDefault();
            $(this).parents('.item').toggleClass('active_el');
        })
    }

    function PriceSlider() {
        $('.slider-range').each(function () {
            $(this).slider({
                range: true,
                min: 0,
                max: 500,
                values: [0, 500],
                slide: function (event, ui) {
                    $(this).siblings().find('.slider-range--input-min').val(ui.values[0]);
                    $(this).siblings().find('.slider-range--input-max').val(ui.values[1]);
                }
            });
            $(this).siblings().find('.slider-range--input-min').val($(this).slider("values", 0));
            $(this).siblings().find('.slider-range--input-max').val($(this).slider("values", 1));
        });
    }

    function FilterFunc() {
        //-begin- переключатель радио для мощности
        $(document).on('change', '.filter-block__change-type input[type="radio"]', function () {
            if ($('.filter-block__change-type input#radio_1').prop("checked")) {
                $('.filter-block__item-toggle').removeClass('type2');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-1').addClass('active_el');
            } else {
                if ($('.filter-block__change-type input#radio_2').prop("checked")) {
                    $('.filter-block__item-toggle').addClass('type2');
                    $('.filter-block__change-type-block').removeClass('active_el');
                    $('.filter-block__change-type-block-2').addClass('active_el');
                }
            }
        });
        $(document).on('click', '.filter-block__item-toggle', function () {
            $(this).toggleClass('type2');
            if ($(this).hasClass('type2')) {
                $('.filter-block__change-type input#radio_2').prop("checked", 'true');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-2').addClass('active_el');
            } else {
                $('.filter-block__change-type input#radio_1').prop("checked", 'true');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-1').addClass('active_el');
            }
        });
        //-end- переключатель радио для мощности

        //-begin- выбрать все в цветах
        if ($('.select-all .filter-block__item-checkbox').prop('checked')) {
            $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                $(this).prop('checked', true);
            })
        }

        $(document).on('change', '.select-all .filter-block__item-checkbox', function () {
            if ($(this).prop('checked')) {
                $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                    $(this).prop('checked', true);
                })
            } else {
                $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                    $(this).prop('checked', false);
                })
            }
        });
        //-end- выбрать все в цветах

        //-begin- переключение между разделами фильтра
        var SidebarBlockActive = localStorage.getItem("sidebar__block");
        if (SidebarBlockActive) {
            $('.sidebar__block').hide();
            $('.sidebar__choose-button').removeClass('active_el');
            $('.sidebar__block[data-block="' + SidebarBlockActive + '"]').show();
            $('.sidebar__choose-button[data-block="' + SidebarBlockActive + '"]').addClass('active_el');
        }
        $(document).on('click', '.sidebar__choose-button', function () {
            $('.sidebar__choose-button').removeClass('active_el');
            $(this).addClass('active_el');
            var val = $(this).attr('data-block');
            $('.sidebar__block').hide();
            $('.sidebar__block[data-block="' + val + '"]').show();
            localStorage.setItem("sidebar__block", val);
        });
        var filterLength = $('.bx-filter .bx-filter-parameters-box').length;
        if (filterLength === 0) {
            $('.sidebar__choose-button[data-block="2"]').removeClass('active_el').hide();
            $('.sidebar__choose-button[data-block="1"]').addClass('active_el');
            $('.sidebar__block[data-block="2"]').hide();
            $('.sidebar__block[data-block="1"]').show();
        }
        // -end- переключение между разделами фильтра

        //-begin- скрывать фильтры в мобильной версии
        $(document).on('click', '.sidebar__block-hide', function (e) {
            e.preventDefault();
            $('.sidebar__block').hide();
            $("html, body").animate({scrollTop: 0}, 1000);
        });
        // -end- скрывать фильтры в мобильной версии

        //-begin- скрывать характеристики товара в карточке в мобильной версии
        $(document).on('click', '.card__param', function (e) {
            e.preventDefault();
            $(this).parents('.card__row').toggleClass('active_el');
        });
        // -end- скрывать характеристики товара в карточке в мобильной версии

        $(document).on('click', '.select-all-input', function (e) {
            e.preventDefault();
            var list = $(this).parents('ul').find('.filter-block__item--checkbox');
            var list_ch = $(this).parents('ul').find('.filter-block__item--checkbox:checked');
            if (list.length === list_ch.length) {
                list.each(function () {
                    $(this).click();
                })
            } else {
                list.each(function () {
                    if ($(this).prop("checked") === false) {
                        $(this).click();
                    }
                })
            }
        })
    }

    function BackHistory() {
        $(document).on('click', '.title__backlink a', function (e) {
            e.preventDefault();
            history.back();
        })
    }

    function AuthReg() {
        $(document).on('click', '.popup__title-name', function () {
            var name = $(this).attr('data-name');
            $('.popup__block, .popup__title-name').removeClass('active_el');
            $('.popup__block[data-name="' + name + '"]').addClass('active_el');
            $(this).addClass('active_el');
        });
        $(document).on('click', 'a[href="#popup-auth"]', function () {
            var name = $(this).attr('data-name');
            $('.popup__block, .popup__title-name').removeClass('active_el');
            $('.popup__block[data-name="' + name + '"]').addClass('active_el');
            $('.popup__title-name[data-name="' + name + '"]').addClass('active_el');
        });
        $(document).on('click', '.popup-close', function () {
            var a = location.search;
            var b = location.href;
            b = b.replace(a, '');
            history.replaceState(null, null, b);
        });
    }

    function OpenBlock() {
        $(document).on('click', '.header__search, .header__search-form-close', function () {
            $('.header__search-form').slideToggle();
        });
        $(document).on('click', '.header__search', function () {
            $('.header__search-form-input').focus();
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".header__search-form, .header__search").length) return;
            $('.header__search-form').slideUp();
            event.stopPropagation();
        });
    }

    function MobileMenu() {
        $(document).on('click', '.header__btn-menu', function () {
            $('.header__nav').slideDown();
        });
        $(document).on('click', '.header__btn-close', function () {
            $('.header__nav').slideUp();
        });
        $('.header__nav nav > ul > li.menu-parent > a').after('<span class="open-child"></span>');
        $('.header__nav nav > ul > li.menu-parent > span.link-parrent').after('<span class="open-child"></span>');

        $(document).on('click', '.open-child', function () {
            $(this).parents('li').toggleClass('open');
            $(this).parents('li').find('.menu-child_1').slideToggle()
        });
    }

    function SliderInit() {
        $('.additional-goods__slider-3').slick({
            infinite: true,
            speed: 200,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1631,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 560,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        $('.additional-goods__slider-5').slick({
            infinite: false,
            speed: 200,
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1850,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 1631,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,

                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        if ($('.additional-goods--tabs').length > 0) {
            $('.title[data-href="accessories_goods"]').addClass('active');
            $(document).on('click', '.additional-goods--tabs---title .title', function (e) {
                e.preventDefault();
                var chooseSlider = $(this).attr('data-href');
                $('#accessories_goods, #related_goods').hide();
                $('#' + chooseSlider).show();
                $('.additional-goods--tabs---title .title').removeClass('active');
                $('.title[data-href="' + chooseSlider + '"]').addClass('active');
                $('#' + chooseSlider + ' .additional-goods__slider').slick('setPosition');
            })
        }

        $('.banner-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });

        $('.showroom-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });

        $('.card__slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: false,
            infinite: true,
            draggable: false,
            asNavFor: '.card__slider-nav',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        adaptiveHeight: true
                    }
                }
            ]
        });
        $('.card__slider-nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.card__slider-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            vertical: true,
            infinite: true,
            verticalSwiping: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1650,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 6
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        adaptiveHeight: false,
                        vertical: false,
                        verticalSwiping: false,
                        swipe: true,
                        variableWidth: true,
                        slidesToShow: 5,
                    }
                }
            ]
        });

        //    слайдер на стринце проекта детально
        $('.content__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: false,
            infinite: true,
            adaptiveHeight: true,
            asNavFor: '.content__slider-nav',
        });
        $('.content__slider-nav').slick({
            slidesToShow: 5,
            arrows: false,
            asNavFor: '.content__slider',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            variableWidth: true,
            swipeToSlide: true,

        });

        $('.contacts__item-image--slider').slick({
            slidesToScroll: 1,
            slidesToShow: 1,
            arrows: false,
            dots: true,
            focusOnSelect: true,
            infinite: true,
            swipeToSlide: true,
            adaptiveHeight: true
        });
    }

    function ToTheTop() {
        $(document).on('click', '.to-top', function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });

        function TopAboveFooter() {
            var scrTop = $(window).scrollTop(),
                winHeight = $(window).height(),
                footerTop = $('.footer__b').offset().top;
            if ((scrTop + winHeight) >= footerTop) {
                $('.page-control').addClass('before-footer');
            } else {
                $('.page-control').removeClass('before-footer');
            }
        }

        TopAboveFooter();
        $(window).scroll(
            function () {
                TopAboveFooter();
                if ($(window).scrollTop() < 300) {
                    $('.to-top').removeClass('active_el');
                } else {
                    $('.to-top').addClass('active_el');
                }
            }
        );

        $(document).on('click', '.question__button', function () {
            $('.question__block').addClass('active_el')
        });

        $(document).on('click', '.question__close', function () {
            $('.question__block').removeClass('active_el');
        });

        $(document).click(function (event) {
            if ($(event.target).closest(".question__block, .question").length) return;
            $('.question__block').removeClass('active_el');
            $('.question__col-answer').remove();
            $('.question__col-center .question__col-block, .question__submit, .form__policy').show();
            event.stopPropagation();
        });

    }

    function MenuLampHrefButton() {
        $(document).on('click', '.lamp__nav a', function (e) {
            e.preventDefault();
            var section = $(this).attr('data-section');
            $('.lamp__nav a').removeClass('active');
            $(this).addClass('active');
            if (section !== 'all') {
                $('.lamp__item').hide();
                $('.lamp__item[data-section="' + section + '"]').show();
            } else
                $('.lamp__item').show();
        });

        $(document).on('click', '.header__custom > a', function (e) {
            e.preventDefault();
            $('.header__clamp').slideToggle();
        });

        $(document).on("click", function (e) {
            if (!$(e.target).closest(".header__clamp").length && !$(e.target).closest(".header__custom").length) {
                if ($('.header__clamp').is(':visible')) {
                    $('.header__clamp').slideUp();
                }
            }
        });
    }

    function CustomProducts() {
        if ($('.custom_prod_wrapper').length) {

            function CountProductPrice() {
                $('.custom_prod_active .custom_prod_more_header .custom_prod_piece_wrap').each(function () {
                    var currWrapper = $(this);
                    var currOptions = currWrapper.find('.custom_prod_piece_opt_block ');
                    var totalSumDraft = 0;
                    if (currOptions.length) {
                        currOptions.each(function () {
                            var currOptionSelectPrice = parseFloat($(this).find('option:selected').attr('data-price'));
                            if (currOptionSelectPrice) totalSumDraft = totalSumDraft + currOptionSelectPrice;
                        })
                    }

                    var priceContent = 0;
                    var priceHTML = '';
                    if (parseFloat(totalSumDraft)) {
                        var totalPrice = parseFloat(totalSumDraft);
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceProduct = currWrapper.find('.custom_prod_piece_select_price .custom_prod_piece_price');
                    totalPriceProduct.attr('data-price', priceContent);
                    totalPriceProduct.html(priceHTML);
                });
                RecountTotalPiece();
            }

            function pieceNumber() {
                $('.custom_prod_more_header').each(function (i, item) {
                    var wrapper = $(this);
                    var productBlocks = wrapper.find('.custom_prod_piece_wrap');
                    productBlocks.each(function (i, item) {
                        $(this).find('.custom_prod_piece_title span').text(i + 1);
                    });
                });
                CountProductPrice();
            }

            function RecountTotalWrap() {
                $('.custom_prod_active').each(function () {
                    var currWrapper = $(this);
                    var totalSumDraft = 0;
                    var currProds = currWrapper.find('.custom_prod_more_header .custom_prod_piece_wrap .custom_prod_piece_price_total');
                    if (currProds.length) {
                        currProds.each(function () {
                            var currProdPriceTotal = parseFloat($(this).attr('data-price'));
                            if (currProdPriceTotal) totalSumDraft = totalSumDraft + currProdPriceTotal;
                        })
                    }
                    var currRelated = currWrapper.find('.custom_prod_table_sum.total .price');
                    if (currRelated.length) {
                        currRelated.each(function () {
                            var currRelatedPriceTotal = parseFloat($(this).attr('data-content'));
                            if (currRelatedPriceTotal) totalSumDraft = totalSumDraft + currRelatedPriceTotal;
                        })
                    }

                    var priceContent = 0;
                    var priceHTML = '';
                    if (parseFloat(totalSumDraft)) {
                        var totalPrice = parseFloat(totalSumDraft);
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTotalWrap = $(this).find('.custom_prod_total .custom_prod_piece_price_total');
                    totalPriceTotalWrap.attr('data-price', priceContent);
                    totalPriceTotalWrap.html(priceHTML);

                })
            }

            function RecountTotalPiece() {
                $('.custom_prod_more_header .custom_prod_piece_wrap').each(function () {
                    var price = parseFloat($(this).find('.custom_prod_piece_price').attr('data-price'));
                    var qnt = parseInt($(this).find('.custom_prod_piece_counter_input').val());
                    var priceContent = 0;
                    var priceHTML = '';
                    if (price && qnt) {
                        var totalPrice = price * qnt;
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTotalPiece = $(this).find('.custom_prod_piece_price_total');
                    totalPriceTotalPiece.attr('data-price', priceContent);
                    totalPriceTotalPiece.html(priceHTML);
                });
                RecountTotalWrap();
            }

            function RecountTrPiece() {
                $('.custom_prod_compatibles_table tbody tr').each(function () {
                    var row = $(this);
                    var priceBlock = row.find('.custom_prod_table_sum:not(.total) .price');
                    var price = parseFloat(priceBlock.attr('data-content'));
                    var qnt = parseFloat(row.find('.custom_prod_td_counter_input').val());
                    var priceContent = 0;
                    var priceHTML = '';
                    if (price && qnt) {
                        var totalPrice = price * qnt;
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTd = row.find('.custom_prod_table_sum.total .price');
                    totalPriceTd.attr('data-content', priceContent);
                    totalPriceTd.html(priceHTML);
                });
                RecountTotalWrap();
            }

            $(document).on('click', '.custom_prod_show_more', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                if (parentBlock.hasClass('custom_prod_active')) {
                    parentBlock.removeClass('custom_prod_active');
                    parentBlock.find('.custom_prod_more_header').html('');
                    parentBlock.find('.custom_prod_td_counter_input').val('0');
                    parentBlock.find('.custom_prod_order_form input').val('');
                    RecountTrPiece();
                } else {
                    parentBlock.addClass('custom_prod_active');
                    var content = parentBlock.find('.custom_prod_more_new_prod_template').html();
                    parentBlock.find('.custom_prod_more_header').append(content);
                    pieceNumber();
                }
            });

            $(document).on('click', '.custom_prod_more_another', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                var content = parentBlock.find('.custom_prod_more_new_prod_template').html();
                parentBlock.find('.custom_prod_more_header').append(content);
                pieceNumber();
            });

            $(document).on('click', '.custom_prod_closer', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                var thisBlock = $(this).parents('.custom_prod_piece_wrap');
                thisBlock.remove();
                if ($('.custom_prod_more_header .custom_prod_piece_wrap').length) {
                    pieceNumber();
                } else {
                    parentBlock.removeClass('custom_prod_active');
                }
            });

            $(document).on('change keyup input click', '.custom_prod_piece_counter_input', function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                } else {
                    var value = this.value.replace(/[^0-9]/g, '');
                    if (value === '0') value = 1;
                    this.value = value;
                }
                RecountTotalPiece();
            });

            $(document).on('click', '.custom_prod_piece_counter_minus', function () {
                var input = $(this).parent('.custom_prod_piece_counter_block').find('.custom_prod_piece_counter_input');
                var value = parseInt(input.val());
                if (value > 1) {
                    value--;
                    input.val(value);
                    RecountTotalPiece();
                }
            });
            $(document).on('click', '.custom_prod_piece_counter_plus', function () {
                var input = $(this).parent('.custom_prod_piece_counter_block').find('.custom_prod_piece_counter_input');
                var value = parseInt(input.val());
                if (value) {
                    value++;
                    input.val(value);
                    RecountTotalPiece();
                }
            });

            var timerTD = setTimeout(function () {
            }, 100);
            $(document).on('change keyup input click', '.custom_prod_td_counter_input', function () {
                var input = $(this);
                if (input.val().match(/[^0-9]/g)) {
                    input.val(input.val().replace(/[^.\d]+/g, "").replace(/^([^\.]*\.)|\./g, '$1'));
                }
                RecountTrPiece();
                clearTimeout(timerTD);
                timerTD = setTimeout(function () {
                    var nowValue = parseFloat(input.val());
                    if (nowValue) {
                        var packNorm = parseFloat(input.attr('data-packnorm'));
                        var left = nowValue % packNorm;
                        if (parseFloat(left) && parseFloat(left) > 0) {
                            var correctVal = nowValue - parseFloat(left) + packNorm;
                            input.val(correctVal);
                            RecountTrPiece();
                        }
                    }
                }, 1000)
            });
            $(document).on('click', '.custom_prod_td_counter_minus', function () {
                var input = $(this).parent('.custom_prod_td_counter').find('.custom_prod_td_counter_input');
                var value = parseFloat(input.val());
                var packNorm = parseFloat(input.attr('data-packnorm'));
                if (value && packNorm) {
                    value = parseFloat(value) - packNorm;
                    if (value < 0) value = 0;
                    input.val(value);
                    RecountTrPiece();
                }
            });
            $(document).on('click', '.custom_prod_td_counter_plus', function () {
                var input = $(this).parent('.custom_prod_td_counter').find('.custom_prod_td_counter_input');
                var value = input.val();
                var packNorm = parseFloat(input.attr('data-packnorm'));
                if (value && packNorm) {
                    value = parseFloat(value) + packNorm;
                    input.val(value);
                    RecountTrPiece();
                }
            });
            $(document).on('change', '.custom_prod_piece_opt_block select', function () {
                CountProductPrice();
            });
            $(document).on('change', '.custom_prod_piece_opt_block.custom_prod_piece_opt_block_group_select', function () {
                var groupSelect = $(this);
                var parentBlock = groupSelect.parents('.custom_prod_piece_wrap_options');
                var article = parentBlock.attr('data-article');
                var groupID = groupSelect.find('option:selected').attr('data-id');
                var selectsInBlock = parentBlock.find('.custom_prod_piece_opt_block:not(.custom_prod_piece_opt_block_group_select)');
                if (selectsInBlock.length) {
                    selectsInBlock.each(function () {
                        var currSelect = $(this);
                        var currOptions = currSelect.find('option');
                        if (currOptions.length) {
                            currOptions.each(function () {
                                var currOpt = $(this);
                                var currOptID = currOpt.attr('data-id');
                                if (customPricesData[article][groupID] && customPricesData[article][groupID][currOptID]) {
                                    currOpt.attr('data-price', customPricesData[article][groupID][currOptID]);
                                }
                            })
                        }
                    });
                }
                CountProductPrice();
            });

            $(document).on('click', '.custom_prod_select_fake_span', function () {
                $('.custom_prod_select_fake_span').not(this).parents('.custom_prod_select_fake_block').removeClass('active');
                $(this).parents('.custom_prod_select_fake_block').toggleClass('active');
            });

            $(document).on('click', function (e) {
                var el = '.custom_prod_select_fake_block';
                if ($(e.target).closest(el).length) return;
                $('.custom_prod_select_fake_block').removeClass('active');
            });

            $(document).on('click', '.custom_prod_select_fake_block.active ul li', function () {
                var className = $(this).attr('data-class');
                var text = $.trim($(this).find('span').html());
                var parentBlock = $(this).parents('.custom_prod_piece_opt_block');
                parentBlock.find('.custom_prod_select_fake_span span').html(text);
                parentBlock.find('.' + className).prop('selected', true);
                parentBlock.find('select').change();
                $(this).parents('.custom_prod_select_fake_block').removeClass('active');
            });

            $(document).on('click', '.custom_prod_order_submit', function () {
                var productBlock = $(this).parents('.custom_prod_wrapper');
                var clientName = $.trim(productBlock.find('input[name="order-name"]').val());
                var clientSurname = $.trim(productBlock.find('input[name="order-surname"]').val());
                var clientIP = $.trim(productBlock.find('input[name="order-name"]').attr('data-ip'));
                var clientPhone = $.trim(productBlock.find('input[name="order-phone"]').val());
                var clientEmail = $.trim(productBlock.find('input[name="order-email"]').val());
                var formErrorHTML = '';
                if (clientName === '') formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA;
                if (clientSurname === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA;
                }
                if (clientPhone === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE;
                } else {
                    var preg = clientPhone.replace(/^[0-9]+\.[0-9]$/i);
                    if (!preg.length || preg.length < 7) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK;
                    }
                }
                if (clientEmail === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN;
                } else {
                    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                    var valid = re.test(clientEmail);
                    if (!valid) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO;
                    }
                }
                if (formErrorHTML !== '') {
                    $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ + '</div>');
                    return false;
                }
                var dataObject = {};
                dataObject['userData'] = {};
                dataObject['userData']['name'] = clientName;
                dataObject['userData']['surname'] = clientSurname;
                dataObject['userData']['phone'] = clientPhone;
                dataObject['userData']['mail'] = clientEmail;
                dataObject['userData']['ip'] = clientIP;
                dataObject['productData'] = GetProductData(productBlock);

                $('.preloader_block_2').fadeIn();
                var sendData = 'dataUpdate=' + JSON.stringify(dataObject);
                $.ajax({
                    url: siteDir + 'ajax/customProductsOrder.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        $('.preloader_block_2').fadeOut();
                        var answer = '';
                        var orderNumber = parseInt($.trim(response));
                        if (orderNumber) {
                            answer = LangConst.ARLIGHT_ARSTORE_VAS_ZAKAZ + orderNumber + LangConst.ARLIGHT_ARSTORE_PRINAT_V_TECENII;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            productBlock.find('.custom_prod_show_more').click();

                        } else {
                            answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                        }
                    }
                });
            });

            function GetProductData(productBlock) {
                var customProdName = $.trim(productBlock.find('.custom_prod_title').text());
                var dataObject = {};
                dataObject['customProducts'] = [];
                dataObject['compatibles'] = [];
                var customBlocks = productBlock.find('.custom_prod_more_header .custom_prod_piece_wrap');
                if (customBlocks.length) {
                    customBlocks.each(function () {
                        var customBlock = $(this);
                        var customObject = {};
                        var article = $.trim(customBlock.find('.custom_prod_piece_wrap_options').attr('data-article'));
                        customObject['selectData'] = [];
                        var customSelectBlocks = customBlock.find('.custom_prod_piece_opt_block');
                        if (customSelectBlocks.length) {
                            customSelectBlocks.each(function () {
                                var customSelectBlock = $(this);
                                if (!customSelectBlock.hasClass('custom_prod_piece_opt_block_hide')) {
                                    var currSelectData = {};
                                    currSelectData[$.trim(customSelectBlock.find('select').attr('data-name'))] = $.trim(customSelectBlock.find('option:selected').attr('data-name'));
                                    customObject['selectData'].push(currSelectData);
                                }

                            })
                        }
                        customObject['qnt'] = parseInt(customBlock.find('.custom_prod_piece_counter_input').val()).toString() + LangConst.ARLIGHT_ARSTORE_ST;
                        customObject['article'] = article;
                        customObject['name'] = customProdName;
                        customObject['price'] = parseFloat(customBlock.find('span.custom_prod_piece_price').attr('data-price'));
                        customObject['total'] = parseFloat(customBlock.find('span.custom_prod_piece_price_total').attr('data-price'));
                        customObject['image'] = customBlock.parents('.custom_prod_active').find('.custom_prod_picture img').attr('src');
                        dataObject['customProducts'].push(customObject);

                    })
                }
                var compatibleRows = productBlock.find('.custom_prod_compatibles_table tbody tr');
                if (compatibleRows.length) {
                    compatibleRows.each(function () {
                        var compatibleRow = $(this);
                        var qnt = compatibleRow.find('.custom_prod_td_counter_input').val();
                        if (parseFloat(qnt)) {
                            var compatibleData = {};
                            compatibleData['article'] = $.trim(compatibleRow.attr('data-article'));
                            compatibleData['name'] = $.trim(compatibleRow.attr('data-name'));
                            compatibleData['price'] = parseFloat(compatibleRow.find('.custom_prod_table_sum:not(.total) span.price').attr('data-content'));
                            compatibleData['total'] = parseFloat(compatibleRow.find('.custom_prod_table_sum.total span.price').attr('data-content'));
                            compatibleData['qnt'] = parseFloat(qnt).toString() + ' ' + $.trim(compatibleRow.attr('data-unit'));
                            compatibleData['image'] = compatibleRow.find('.custom_prod_td_img_td img').attr('src');
                            dataObject['compatibles'].push(compatibleData);
                        }
                    })
                }
                dataObject['totalPrice'] = parseFloat(productBlock.find('.custom_prod_total .custom_prod_piece_price_total').attr('data-price'));
                return dataObject;
            }
        }

    }

    function CustomProducts2() {
        if ($('.lamp-calc').length) {
            function CheckPrices() {
                var article = $('.lamp_select_group').attr('data-article');
                var groupID = $('.lamp_select_group').find('input:checked').attr('data-id');
                var selectsInBlock = $('.lamp_select_option');
                if (selectsInBlock.length) {
                    selectsInBlock.each(function () {
                        var currSelect = $(this);
                        var currOptions = currSelect.find('input');
                        if (currOptions.length) {
                            currOptions.each(function () {
                                var currOpt = $(this);
                                var currOptID = currOpt.attr('data-id');
                                if (customPricesData[article][groupID] && customPricesData[article][groupID][currOptID]) {
                                    currOpt.attr('data-price', customPricesData[article][groupID][currOptID]);
                                }
                            })
                        }
                    });
                }
                var SumDraft = 0;
                $('.lamp_select_option .lamp-calc__prop-check input[type="radio"]:checked').each(function () {
                    SumDraft += parseFloat($(this).attr('data-price'));
                });
                var quantity = parseInt($('.lamp_page_qnt_input.buy-block__input').val());
                var totalSumDraft = SumDraft * quantity;
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceContent = parseInt(priceArray[0]);
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceContent = parseFloat(rubles.toString() + '.' + cents);
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceContent = priceHTML = 0;
                    priceHTML = priceHTML + '<sup></sup>';
                }
                var priceBlock = $('.lamp-calc__result-price .card__price-now .price');
                priceBlock.html(priceHTML);
                priceBlock.attr('data-price', priceContent);

                var length = $('.lamp_result_select_length input:checked').attr('data-name');
                var linePower = $('.lamp_result_select_power input:checked').attr('data-name');
                if (parseFloat(length) && parseFloat(linePower)) {
                    var powerOfLamp = parseFloat(linePower) * parseFloat(length) / 1000;
                    $('.lamp_result_power').text(powerOfLamp);
                    $('.lamp_result_flow').text(powerOfLamp * 80);
                }

            }

            if (!$('.lamp_page_edit_button').length) {
                $('.lamp-calc__prop-item').each(function () {
                    var block = $(this);
                    block.find('[data-counter="1"]').prop('checked', true);
                });
            }

            $(document).on('change', '.lamp-calc__prop-check input[type="radio"]', function () {
                CheckPrices();
            });

            $(document).on('change keyup input click', '.lamp_page_qnt_input', function () {
                var article = $(this).attr('data-article');
                var inputAll = $('.lamp_page_qnt_input[data-article="' + article + '"]');
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    inputAll.val(this.value.replace(/[^0-9]/g, ''));
                } else {
                    var value = this.value.replace(/[^0-9]/g, '');
                    if (value === '0') value = 1;
                    this.value = value;
                    inputAll.val(value);
                }
                CheckPrices();
            });


            $(document).on('click', '.lamp_page_add_button', function () {
                $('.preloader_block_2').fadeIn();
                var button = $(this);
                var update = false;
                if (button.hasClass('lamp_page_edit_button')) update = true;
                var lampData = {};
                lampData['article'] = $('.lamp_select_group').attr('data-article');
                lampData['group_select'] = {};
                lampData['group_select']['name'] = $('.lamp_select_group').attr('data-name');
                lampData['group_select']['value'] = $('.lamp_select_group input:checked').attr('data-name');
                lampData['group_select']['value_id'] = $('.lamp_select_group input:checked').attr('data-id');
                lampData['selects'] = {};
                $('.lamp_select_option').each(function () {
                    var currSelect = $(this);
                    var selectID = currSelect.attr('data-id');
                    var selectArr = {};
                    selectArr['name'] = currSelect.attr('data-name');
                    selectArr['value'] = currSelect.find('input:checked').attr('data-name');
                    selectArr['value_id'] = currSelect.find('input:checked').attr('data-id');
                    lampData['selects'][selectID] = selectArr;
                });
                lampData['power'] = $.trim($('.lamp_result_power').text());
                lampData['flow'] = $.trim($('.lamp_result_flow').text());
                lampData['quantity'] = parseInt($('.lamp_page_qnt_input').val());
                lampData['add'] = {};
                lampData['add']['cri'] = $('[data-key="lamp_add_cri"]').is(':checked');
                lampData['add']['control'] = $('[data-key="lamp_add_control"]').is(':checked');
                lampData['add']['power'] = $('[data-key="lamp_add_power"]').is(':checked');
                lampData['comment'] = $('.lamp-calc__result-comment textarea').val();
                lampData['totalPrice'] = parseFloat($('.lamp-calc__result-price .price').attr('data-price'));
                lampData['lampPrice'] = parseFloat(lampData['totalPrice']) / parseInt(lampData['quantity']);
                if (update) lampData['update_id'] = button.attr('data-id');
                var sendData = 'dataUpdate=' + JSON.stringify(lampData);

                $.ajax({
                    url: siteDir + 'ajax/customLampsSaveProduct.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        if (response === 'ok') {
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                        } else {
                            var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.preloader_block_2').fadeOut();
                        }
                    }
                });

            });
            CheckPrices();
        }
        if ($('.lamp-order').length) {
            function CalcPrices() {
                var totalSumDraft = 0;
                $('.lamp__result').each(function () {
                    var block = $(this);
                    var piecePrice = parseFloat(block.find('.card__price-now').attr('data-piece-price'));
                    var qnt = parseInt(block.find('.lamp_page_qnt_input').val());
                    var priceTotPiece = piecePrice * qnt;
                    if (parseFloat(priceTotPiece)) totalSumDraft += priceTotPiece;
                });
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceContent = parseInt(priceArray[0]);
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceContent = parseFloat(rubles.toString() + '.' + cents);
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceContent = priceHTML = 0;
                }
                var priceBlock = $('.custom_prod_order_sum_content .custom_prod_piece_price_total');
                priceBlock.html(priceHTML);
                priceBlock.attr('data-price', priceContent);

                var projectPower = 0;
                $('.lamp_project_item_power').each(function () {
                    var powerBlock = $(this);
                    var piecePower = parseFloat(powerBlock.attr('data-value'));
                    var qnt = parseInt(powerBlock.parents('.lamp__item').find('.lamp_page_qnt_input').val());
                    var totalPiecePower = piecePower * qnt;
                    if (parseFloat(totalPiecePower)) projectPower += totalPiecePower;
                });
                if (parseFloat(projectPower)) $('.lamp_result_power').text(projectPower);

            }

            function CalcPiecePrices(data) {
                var input = $(data).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var block = input.parents('.lamp__item').find('.lamp__result-all .card__price-now');
                var price = parseFloat(block.attr('data-piece-price'));
                var qnt = parseInt(input.val());
                var totalSumDraft = price * qnt;
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceHTML = 0;
                }
                block.find('.price').html(priceHTML);
            }

            $(document).on('click', '.custom_prod_order_return', function () {
                var href = $(this).attr('data-href');
                if (href && href !== '')
                    window.location.href = href;
            });
            $(document).on('click', '.lamp_delete_from_order', function () {
                $('.preloader_block_2').fadeIn();
                var sendData = 'dataDelete=' + $(this).attr('data-id');
                $.ajax({
                    url: siteDir + 'ajax/customLampsSaveProduct.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        if (response === 'ok') {
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                        } else {
                            var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.preloader_block_2').fadeOut();
                        }
                    }
                });
            });
            $(document).on('click', '.lamp_projects_qnt_plus', function () {
                var that = this;
                var input = $(this).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var value = parseInt(input.val());
                if (value) {
                    $('.preloader_block_2').fadeIn();
                    var sendData = 'dataPlus=' + $(this).attr('data-id');
                    $.ajax({
                        url: siteDir + 'ajax/customLampsSaveProduct.php',
                        data: sendData,
                        type: 'POST',
                        success: function (response) {
                            if (response === 'ok') {
                                input.val(value);
                                $('.preloader_block_2').fadeOut();
                                CalcPiecePrices(that);
                                CalcPrices();
                            } else {
                                var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                                $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                                $('.preloader_block_2').fadeOut();
                            }
                        }
                    });
                }
            });
            $(document).on('click', '.lamp_projects_qnt_minus', function () {
                var that = this;
                var input = $(this).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var value = parseInt(input.val());
                if (value > 0) {
                    $('.preloader_block_2').fadeIn();
                    var sendData = 'dataMinus=' + $(this).attr('data-id');
                    $.ajax({
                        url: siteDir + 'ajax/customLampsSaveProduct.php',
                        data: sendData,
                        type: 'POST',
                        success: function (response) {
                            if (response === 'ok') {
                                input.val(value);
                                $('.preloader_block_2').fadeOut();
                                CalcPiecePrices(that);
                                CalcPrices();
                            } else {
                                var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                                $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                                $('.preloader_block_2').fadeOut();
                            }
                        }
                    });
                }
            });
            $(document).on('click', '.custom_prod_order_submit', function () {
                var productBlock = $(this).parents('.lamp-form');
                var clientName = $.trim(productBlock.find('input[name="order-name"]').val());
                var clientSurname = $.trim(productBlock.find('input[name="order-surname"]').val());
                var clientIP = $.trim(productBlock.find('input[name="order-name"]').attr('data-ip'));
                var clientPhone = $.trim(productBlock.find('input[name="order-phone"]').val());
                var clientEmail = $.trim(productBlock.find('input[name="order-email"]').val());
                var formErrorHTML = '';
                if (clientName === '') formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA;
                if (clientSurname === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA;
                }
                if (clientPhone === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE;
                } else {
                    var preg = clientPhone.replace(/^[0-9]+\.[0-9]$/i);
                    if (!preg.length || preg.length < 7) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK;
                    }
                }
                if (clientEmail === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN;
                } else {
                    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                    var valid = re.test(clientEmail);
                    if (!valid) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO;
                    }
                }
                if (formErrorHTML !== '') {
                    $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ + '</div>');
                    return false;
                }

                var dataObject = {};
                dataObject['userData'] = {};
                dataObject['userData']['name'] = clientName;
                dataObject['userData']['surname'] = clientSurname;
                dataObject['userData']['phone'] = clientPhone;
                dataObject['userData']['mail'] = clientEmail;
                dataObject['userData']['ip'] = clientIP;
                dataObject['productData'] = [];
                dataObject['siteID'] = SITE_ID;
                $('.preloader_block_2').fadeIn();
                var sendData = 'dataUpdate=' + JSON.stringify(dataObject);
                $.ajax({
                    url: siteDir + 'ajax/customProductsOrder2.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        $('.preloader_block_2').fadeOut();
                        var answer = '';
                        var orderNumber = parseInt($.trim(response));
                        if (orderNumber) {
                            answer = LangConst.ARLIGHT_ARSTORE_VAS_ZAKAZ + orderNumber + LangConst.ARLIGHT_ARSTORE_PRINAT_V_TECENII;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.lamp-order').html('<div class="lamp-page-title">' + LangConst.ARLIGHT_ARSTORE_SAG_MOI_SVETILQN + '<a href="' + siteDir + 'catalog/custom-lamps/" style="text-decoration: underline">' + LangConst.ARLIGHT_ARSTORE_SOZDANIU_SVOEGO_SVET + '</a></div>');
                            $('.navigation-block_basket').remove();
                            $('.lamp-form').remove();
                        } else {
                            answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                        }
                    }
                });
            });
            CalcPrices();
        }
    }

    function CustomLampsFunctions() {
        $(document).on('click', '[data-service="HIDE_CART"]', function (e) {
            e.preventDefault();
            $('#basket-items-list-wrapper, .lamp-order').slideToggle();
            $(this).toggleClass('active');
        });
    }


})(jQuery);

/* End */
;
; /* Start:"a:4:{s:4:"full";s:82:"/bitrix/components/itertech/smallcart/templates/.default/script.js?165720755330237";s:6:"source";s:66:"/bitrix/components/itertech/smallcart/templates/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
window.cart = {};
if(!siteDir){
    var siteDir = '/';
}
$(document).ready(function () {
    getItemsFromCart();
    setTimeout(function () {
        itemsFavorite()
    }, 300);
    setTimeout(function () {
        itemsCompare()
    }, 600);
    openMoreProduct();

    function openMoreProduct() {
        $(document).on('click', '.cart__button-more', function (e) {
            e.preventDefault();
            $('.item--cart-all').toggleClass('max3')
        })
    }

    $(document).on("click", '[data-slug="ADD_TO_CART"]', function () {
        var id = $(this).attr("data-id");
        var quantityInput = $(this).closest('[data-slug="BUY_BLOCK"]').find('[data-slug="QUANTITY"]');
        var quantity = parseFloat(quantityInput.val());
        var normal = parseFloat(quantityInput.attr('data-packnorm'));
        quantity = !isNaN(quantity) && quantity > 0 ? quantity : normal;
        if ($(this).hasClass('in_cart')){
            location.pathname = siteDir + 'order/';
        }
        else{
            addItemToCart(id, quantity, '');
        }
        return false;
    });

    $(document).on('change', '[data-slug="QUANTITY"]', function () {
        var id = parseInt($(this).parents('.buy-block').find('[data-slug="ADD_TO_CART"]').data('id'));
        var quantity = parseFloat($(this).val());
        mathQuantity(id, quantity);
    });

    $(document).on('change', '[data-slug="CART_QUANTITY"]', function () {
        var id = parseInt($(this).closest('[data-slug="CART_ROW"]').data('id'));
        var quantity = parseFloat($(this).val());
        mathQuantity(id, quantity);
    });

    $(document).on("click", '[data-slug="CART_ROW_REMOVE"]', function () {
        var id = parseInt($(this).closest('[data-slug="CART_ROW"]').data('id'));
        var quantity = 0;
        mathQuantity(id, quantity);
        return false;
    });

    $(document).on("click", '[data-slug="CART_LINK"]', function (e) {
        if(!$(arItertechSmallCart.ID).hasClass('full')){
            return false;
        }
        if ($(window).width() > 1200) {
            e.preventDefault();
            $(arItertechSmallCart.ID).slideToggle();
        }
        $(document).click(function (e) {
            if ($(e.target).closest('[data-slug="CART_LINK"],'+arItertechSmallCart.ID).length) return;
            $(arItertechSmallCart.ID).slideUp();
            e.stopPropagation();
        });
    });

    // Избранное
    $(document).on("click", '[data-slug="ADD_TO_FAVORITE"]', function () {
        var id = $(this).attr("data-id");
        itemsFavorite(id);
        if($(this).hasClass('in_cart')){
            $(this).removeClass('in_cart');
        } else {
            //YM
            var goalParams = {};

            function goalCallback() {
                console.log('запрос в Метрику успешно отправлен');
            }

            if (arGoalsYM['add-to-favorite'] && arGoalsYM['add-to-favorite']['id'] && arGoalsYM['add-to-favorite']['name']) {
                if (window.ym) {
                    ym(arGoalsYM['add-to-favorite']['id'], 'reachGoal', arGoalsYM['add-to-favorite']['name'], goalParams, goalCallback);
                }
            }
        }
        return false;
    });

    // Сравнение
    $(document).on("click", '[data-slug="ADD_TO_COMPARE"]', function () {
        var id = $(this).attr("data-id");
        itemsCompare(id);
        if($(this).hasClass('in_cart')){
            $(this).removeClass('in_cart');
        }
        return false;
    });

    // Применение промокода
    $(document).on("click", '[data-slug="PROMOCODE_SEND"]', function (e) {
        var PROMOCODE = $('[data-slug="PROMOCODE"]');
        var PROMOCODE_VAL = PROMOCODE[0].value;
        if(PROMOCODE[0].dataset.func === 'remove'){
            PROMOCODE_VAL = '-1N';
        }
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'promocode', 'params':PROMOCODE_VAL, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.ID){
                    PROMOCODE[0].disabled = true;
                    PROMOCODE[0].dataset.func = 'remove';
                    $('[data-slug="PROMOCODE_SEND"]').removeClass('button_red').val('Отменить');
                } else {
                    PROMOCODE[0].disabled = false;
                    PROMOCODE[0].dataset.func = 'add';
                    PROMOCODE[0].value = '';
                    $('[data-slug="PROMOCODE_SEND"]').addClass('button-red').val('Применить');
                }
                getItemsFromCart();
            }
        });

    });



    /* Функции по корзине на order.php */
    $(document).on('click', '.button_change', function (e) {
        e.preventDefault();
        $('.order-cart').slideToggle();
        $(this).toggleClass('active_el');
    });


    /* Смена способов доставки на на order.php */
    $('[name="field[DELIVERY_ID]"]').change(function () {
        var price = $(this).data('price');
        var fPrice = formatPrice(price);
        $('[data-slug="DELIVERY_PRICE"]').attr('data-price',price).data('price', price).html(fPrice);
        calcOrder('', price);
    });

    // работа с количеством
    function mathQuantity(id, quantity){
        var func = 'U';
        quantity = !isNaN(quantity) && quantity >= 0 ? quantity : 0;
        if(quantity <= 0 ){
            quantity = 0;
            func = 'R';
            $('[data-slug="FULL_CART"]').find('[data-id="'+id+'"]').remove();
        }
        addItemToCart(id, quantity, func);
        return false;
    }

    /* Калькуляция итоговой стоимости заказа на order.php */
    function calcOrder(TOTALCART_SUMM, DELIVERY_PRICE){
        if(!TOTALCART_SUMM){
            TOTALCART_SUMM = $('[data-slug="TOTALCART_SUMM"]').data('price');
        }
        if(!DELIVERY_PRICE){
            DELIVERY_PRICE = $('[data-slug="DELIVERY_PRICE"]').data('price');
        }
        var fPrice = formatPrice(parseFloat(TOTALCART_SUMM) + parseFloat(DELIVERY_PRICE));
        $('[data-slug="ORDER_SUMM"]').html(fPrice);
    }

    /* Форматирование стоимости */
    function formatPrice(price, quantity, wsep){
        if(!quantity){
            quantity = 1;
        }
        var sum = (parseInt(quantity) * parseFloat(price)).toFixed((arItertechSmallCart.params['DECIMALS']=='Y') ? 2 : 0).split('.', 2);
        var sum1 = sum[0].replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1'+arItertechSmallCart.params['THOUSANDS_SEPARATOR']);
        var result = sum1;
        if(arItertechSmallCart.params['DECIMALS']==='Y'){
            var sum2 = sum[1];
            if(wsep){
                result = sum1 +'.'+ sum2;
            } else {
                result = sum1 +' '+ arItertechSmallCart.params['DELIMITER_DECIMALS'].replace('*', sum2);
            }
        }
        result = result+' '+arItertechSmallCart.params['CURRENCY'];
        return result;
    }

    /* Добавление в корзину */
    function addItemToCart(id, quantity, func) {
        $('body').append('<div class="preloader_hide" style="width:100%; height:100%; position: fixed; left: 0; top: 0; z-index: 999999"></div>');
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'addItemToCart', 'id': id, 'quantity': quantity, 'params':arItertechSmallCart.params, 'func':func, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    var btnBuy = $(document).find('[data-slug="ADD_TO_CART"][data-id="'+id+'"]');

                    if(func=='R'){
                        if (btnBuy.parents('.additional-goods').length > 0 || btnBuy.parents('.compare__head').length > 0) {
                            btnBuy.removeClass('in_cart');
                        } else {
                            btnBuy.html('В корзину').removeClass('in_cart');
                        }
                        btnBuy.parents('.buy-block').find('[data-slug="QUANTITY"]').val(0);
                    }
                    visualRenderCart(data);

                    if(data.SHOW_MESS_ADD){
                        // var acceptAnswer = btnBuy.parent().siblings('[data-slug="ACCEPT_BUY"]');
                        var acceptAnswer = $('.accept-buy--wrap');
                        if (acceptAnswer.length > 0) {
                            acceptAnswer.fadeIn(200);
                            setTimeout(function () {
                                acceptAnswer.fadeOut(400);
                            }, 2500);
                        }

                        if (data.PRODUCTS[id]){
                            //YM
                            var goalParams = {};

                            function goalCallback() {
                                console.log('запрос в Метрику успешно отправлен');
                            }

                            if (arGoalsYM['add-to-cart'] && arGoalsYM['add-to-cart']['id'] && arGoalsYM['add-to-cart']['name']) {
                                if (window.ym) {
                                    ym(arGoalsYM['add-to-cart']['id'], 'reachGoal', arGoalsYM['add-to-cart']['name'], goalParams, goalCallback);
                                }
                            }
                        }
                    }
                }
            },
            complete: function() {
                $('.preloader_hide').remove();
            }
        });
    }

    /* Получаем корзину */
    function getItemsFromCart() {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'getItemsFromCart', 'params':arItertechSmallCart.params, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data){
                    if(data.result=='error'){
                        alert(data.result_mess);
                    } else {
                        visualRenderCart(data);
                    }
                }
            }
        });
    }

    /* Обработка корзины */
    function visualRenderCart(data){
        if(arItertechSmallCart.params['DEBUG']=='Y'){
            console.log('Отладка visualRenderCart');
            console.log(data);
        }

        var htmlCart  = $(data.HTML);
        var itemsDimensions = [];
        var order_items = [];
        if(!data.PRODUCTS) {
            $(document).find('#itertech_cart').html('');
            $(document).find('[data-slug="CART_LINK_COUNT"]').html('0');
            $(document).find('[data-slug="CART_LINK_SUMM"]').html('');
            if(window.location.href.indexOf('/order/')>0 && $(arItertechSmallCart.ID).hasClass('full')){
                location.reload();
            }
            $(arItertechSmallCart.ID).removeClass('full').slideUp();
            return false;
        }

        $.each(data.PRODUCTS, function (i, elem) {
            var btnBuy = $(document).find('[data-slug="ADD_TO_CART"][data-id="'+data.PRODUCTS[i]['ID']+'"]');
            if(arItertechSmallCart.params['CHANGE_BUTTON_TEXT']){
                if (btnBuy.parents('.additional-goods').length > 0 || btnBuy.parents('.compare__head').length > 0) {
                    btnBuy.addClass('in_cart');
                } else {
                    btnBuy.html(arItertechSmallCart.params['CHANGE_BUTTON_TEXT']).addClass('in_cart');
                }
            }

            // обновить кол-во у товара при изменении кол-ва в корзине
            btnBuy.parents('.buy-block').find('[data-slug="QUANTITY"]').val(elem['QUANTITY']);

            // обновить сумму и кол-во у товара в корзине на order.php
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_SUMM"]').html(elem['SUMM']);
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="CART_QUANTITY"]').val(elem['QUANTITY']);
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('.order-cart__item-price').html(elem['PRICE']);
            if(elem['OLDSUMM']){
                $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_OLDSUMM"]').html(elem['OLDSUMM']);
            }else{
                $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_OLDSUMM"]').html('');
            }

            itemsDimensions.push([elem['LENGTH']*100,elem['WIDTH']*100,elem['HEIGHT']*100,elem['PACKAGE_QUANTITY']]);
            order_items.push({
                'orderitem_article': elem['ARTNUMBER'],
                'orderitem_name': elem['NAME']+' Ед.изм: '+elem['PACKAGE']+' '+elem['PACKAGE_COUNT']+' '+elem['UNIT'],
                'orderitem_quantity': elem['PACKAGE_QUANTITY'],
                'orderitem_cost': Math.ceil(elem['PRICE_MATH']*elem['PACKAGE_COUNT'])
            });


        });


        // Обновили AJAX корзину
        var visAllProd = false;
        if(!$(document).find('#itertech_cart .item--cart-all').hasClass('max3')){
            visAllProd = true;
        }
        $(document).find('#itertech_cart').html(htmlCart[0].innerHTML);
        if(visAllProd){
            $('.item--cart-all').toggleClass('max3');
        }

        $(arItertechSmallCart.ID).addClass('full').find('[data-slug="TOTALCART_QUANTITY"]').html(data.TOTALCART.QUANTITY);

        $(document).find('[data-slug="TOTALCART_SUMM"]').html((data.TOTALCART.OLDSUMM_MATH > 0) ? data.TOTALCART.OLDSUMM : data.TOTALCART.SUMM).attr('data-price',data.TOTALCART.SUMM_MATH).data('price', data.TOTALCART.SUMM_MATH);

        if(data.TOTALCART.DISCOUNT_SUMM_MATH > 0){
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM"]').html(data.TOTALCART.DISCOUNT_SUMM).parent().show();
            $(document).find('[data-slug="TOTALCART_DISCOUNT_PERCENT"]').html(data.TOTALCART.DISCOUNT_PERCENT).parent().show();
        } else {
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM"]').html(0).parent().hide();
            $(document).find('[data-slug="TOTALCART_DISCOUNT_PERCENT"]').html(0).parent().hide();
        }
        if(data.TOTALCART.DISCOUNT_SUMM_DOP_MATH > 0){
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM_DOP"]').html(data.TOTALCART.DISCOUNT_SUMM_DOP).parent().show();
            $(document).find('[data-slug="TOTALCART_SUMM_PROM"]').html(data.TOTALCART.SUMM_PROM).parent().show();
        } else {
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM_DOP"]').html(0).parent().hide();
            $(document).find('[data-slug="TOTALCART_SUMM_PROM"]').html(0).parent().hide();
        }
        $(document).find('[data-slug="CART_LINK_COUNT"]').html(data.TOTALCART.QUANTITY);
        $(document).find('[data-slug="CART_LINK_SUMM"]').html(data.TOTALCART.SUMM);

        if(data.TOTALCART.ERROR_PROMOCODE){
            $(document).find('[data-slug="ERROR_PROMOCODE"]').html(data.TOTALCART.ERROR_PROMOCODE).show();
            $(document).find('[data-slug="PROMOCODE"]').val('').attr('disabled', false).attr('data-func','add');
            $(document).find('[data-slug="PROMOCODE_SEND"]').val('Применить').addClass('button_red');
            setTimeout(function () {
                $(document).find('[data-slug="ERROR_PROMOCODE"]').fadeOut();
            },3000);
        }
        calcOrder(data.TOTALCART.SUMM_MATH, '');

        // добавляем данные для яндекса
        window.cart['quantity'] = data.TOTALCART.PACKAGE_QUANTITY;
        window.cart['weight'] = data.TOTALCART.WEIGHT;
        window.cart['cost'] = Math.ceil(data.TOTALCART.SUMM_MATH);
        window.cart['itemsDimensions'] = itemsDimensions;
        window.cart['order_items'] = order_items;

    }

    /* Добавление в избранное */
    function itemsFavorite(id) {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'itemsFavorite', 'id': id, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    if(arItertechSmallCart.params['DEBUG']=='Y'){
                        console.log('Отладка itemsFavorite');
                        console.log(data);
                    }
                    $(document).find('[data-slug="FAVORITE_COUNT"]').text(data.COUNT);
                    $(document).find('[data-slug="FAVORITE_COUNT_LABEL"]').text(declOfNum(data.COUNT, [BX.message('ARLIGHT_ARSTORE_TOV'), BX.message('ARLIGHT_ARSTORE_TOV1'), BX.message('ARLIGHT_ARSTORE_TOV2')]));
                    $.each(data.IDS, function (i, elem) {
                        $(document).find('[data-slug="ADD_TO_FAVORITE"][data-id="'+elem+'"]').addClass('in_cart');
                    });
                    if(data.DELETE){
                        if(window.location.href.indexOf('/favorite/')) $(document).find('[data-slug="FAVORITE_ROW"][data-id="'+data.DELETE+'"]').prev('.item-group-marker').remove();
                        $(document).find('[data-slug="FAVORITE_ROW"][data-id="'+data.DELETE+'"]').remove();
                        if(window.location.href.indexOf('/favorite/')) favoriteFunc();
                        if(data.COUNT == 0 && window.location.href.indexOf('/favorite/')>0){
                            data.RELOAD = true;
                        }
                    }
                    if(data.RELOAD){
                        location.reload();
                    }

                }
            }
        });
    }

    /* Добавление в сравнение */
    function itemsCompare(id) {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'itemsCompare', 'id': id, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    if(arItertechSmallCart.params['DEBUG']=='Y'){
                        console.log('Отладка itemsCompare');
                        console.log(data);
                    }
                    $(document).find('[data-slug="COMPARE_COUNT"]').text(data.COUNT);
                    $(document).find('[data-slug="COMPARE_COUNT_LABEL"]').text(declOfNum(data.COUNT, [BX.message('ARLIGHT_ARSTORE_TOV'), BX.message('ARLIGHT_ARSTORE_TOV1'), BX.message('ARLIGHT_ARSTORE_TOV2')]));
                    $.each(data.IDS, function (i, elem) {
                        $(document).find('[data-slug="ADD_TO_COMPARE"][data-id="'+elem+'"]').addClass('in_cart');
                    });
                    if(data.DELETE){
                        $(document).find('[data-slug="COMPARE_TD"][data-id="'+data.DELETE+'"]').remove();
                        if(window.location.href.indexOf('/compare/')) compareFunc();
                        if(data.COUNT == 0 && window.location.href.indexOf('/compare/')>0){
                            data.RELOAD = true;
                        }
                    }
                    if(data.RELOAD){
                        location.reload();
                    }

                }
            }
        });
    }

    // Для админа
    $(document).on('change', '[data-slug="CART_QUANTITY_ADMIN"]', function () {
        var quantity = parseFloat($(this).val());
        if(quantity <= 0){
            if (confirm("Удалить данный товар из заказа?")) {
                $(this).parents('[data-slug="CART_ROW_ADMIN"]').remove();
            } else {
                $(this).val($(this).data('packnorm')).change();
            }
        }
        updateOrderProducts();
    });
    function updateOrderProducts(orderProducts){
        if(!orderProducts){
            orderProducts = {};
        }
        $('[data-slug="CART_QUANTITY_ADMIN"]').each(function () {
            var id = $(this).data('id');
            if(id){
                orderProducts[id] = {'quantity': $(this).val()};
            }
        });
        arItertechSmallCart.params['IDS_CART'] =  orderProducts;
        arItertechSmallCart.params['USER_ID'] =  $('#userId').val();
        arItertechSmallCart.params['PROMOCODE'] =  $('#promocode').val();
        arItertechSmallCart.params['CUSTOM_DISCOUNT'] =  $('[data-slug="DISCOUNT_ADMIN"]').val();
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'getItemsFromOrderAdminEdit', 'params':arItertechSmallCart.params, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data){
                    if(data.result=='error'){
                        alert(data.result_mess);
                    } else {
                        if(arItertechSmallCart.params['DEBUG']=='Y') {
                            console.log('Отладка updateOrderProducts');
                            console.log(data);
                        }
                        var tr = '';
                        var cnt = 1;
                        $.each(data.PRODUCTS, function (i, elem) {
                            tr += insertProductRow(cnt, elem);
                            cnt++;
                        });
                        $('#products_list_admin').html(tr);
                        $('#products_list_admin>div').show();

                        var deliveryPrice =  parseInt($('[data-slug="DELIVERY"] option:selected').data('price'));

                        $('[data-slug="TOTALCART_SUMM_ADMIN"]').html(formatPrice((data.TOTALCART.OLDSUMM_MATH) ? data.TOTALCART.OLDSUMM_MATH : data.TOTALCART.SUMM_MATH, 1, true));

                        if(data.TOTALCART.DISCOUNT_TYPE){
                            $('[data-slug="DISCOUNT_BLOCKS"]').show();
                        } else {
                            $('[data-slug="DISCOUNT_BLOCKS"]').hide();
                        }

                        $('[data-slug="TOTALCART_DISCOUNT_TYPE_ADMIN"]').html(data.TOTALCART.DISCOUNT_TYPE_TEXT);
                        $('[data-slug="TOTALCART_DISCOUNT_PERCENT_ADMIN"]').html(data.TOTALCART.DISCOUNT_PERCENT_MATH+((data.TOTALCART.DISCOUNT_PERCENT_MATH_DOP) ? '+'+data.TOTALCART.DISCOUNT_PERCENT_MATH_DOP : '') + '%');
                        $('[data-slug="TOTALCART_DISCOUNT_SUMM_ADMIN"]').html(formatPrice(data.TOTALCART.DISCOUNT_SUMM_MATH+((data.TOTALCART.DISCOUNT_SUMM_DOP_MATH) ? data.TOTALCART.DISCOUNT_SUMM_DOP_MATH : 0), 1, true));
                        $('[data-slug="TOTALCART_SUMM_PROM_ADMIN"]').html(formatPrice(data.TOTALCART.SUMM_MATH), 1, true);
                        $('[data-slug="DELIVERY_PRICE_ADMIN"]').html(formatPrice(deliveryPrice), 1, true);
                        $('[data-slug="TOTALCART_ORDER_SUMM_ADMIN"]').html(formatPrice(data.TOTALCART.SUMM_MATH+deliveryPrice), 1, true);
                    }
                }
            }
        });

    }
    function insertProductRow(cnt , data){
        var tr = $('div.FOR_ROW');
        tr = tr[0].outerHTML;
        var item_packnorm = false;
        if(data.PACKAGE && data.PACKAGE_COUNT){
            item_packnorm = (data.PACKAGE === '-' ? "Ед.изм" : data.PACKAGE) + ': '+ data.PACKAGE_COUNT +' '+data.UNIT;
        }
        tr = tr.replace(/#ID#/g, data.ID)
            .replace(/#NUMBER#/g, cnt)
            .replace(/#ARTNUMBER#/g, data.ARTNUMBER)
            .replace(/#NAME#/g, data.NAME)
            .replace(/#DESCRIPTION#/g, data.DESCRIPTION)
            .replace(/#PRICE#/g, formatPrice(data.PRICE_MATH, 1, true))
            .replace(/#OLDPRICE#/g, (data.OLDPRICE_MATH) ? formatPrice(data.OLDPRICE_MATH, 1, true) : '')
            .replace(/#SUMM#/g, formatPrice(data.PRICE_MATH, data.QUANTITY, true))
            .replace(/#OLDSUMM#/g, (data.OLDPRICE_MATH) ? formatPrice(data.OLDPRICE_MATH, data.QUANTITY, true) : '')
            .replace(/#PRICE_MATH#/g, data.PRICE_MATH)
            .replace(/#QUANTITY#/g, data.QUANTITY)
            .replace(/#PACKAGE_COUNT#/g, data.PACKAGE_COUNT)
            .replace(/#ITEM_PACKNORM#/g, item_packnorm)
        ;
        return tr;
    }
    $(document).on('click', '.pr_remove', function () {
        if (confirm("Удалить данный товар из заказа?")) {
            $(this).parents('[data-slug="CART_ROW_ADMIN"]').remove();
            updateOrderProducts();
        }
        return false;
    });
    $('[data-slug="BTN_SEARCH_ADMIN"]').click(function () {

        var input = $(this).parents('.block_prods').find('[data-slug="INPUT_SEARCH"]');
        var find = input.val();
        var iblock = input.data('iblock');
        find = find.trim();

        var addedProducts = [];
        $('[data-slug="CART_QUANTITY_ADMIN"]').each(function () {
            var id = $(this).data('id');
            addedProducts.push(parseInt(id));
        });
        if(!find){
            return false;
        }

        $.ajax({
            url: '/admin/content/asset/php/ajax.php',
            data: {'method': 'findProduct', 'find': find, 'addedProducts':addedProducts, 'iblock':iblock, 'sessid':BX.bitrix_sessid()},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    var optionList = '';
                    data_elem = new Map();
                    $.each(data, function (i, elem) {
                        data_elem.set(elem.ID, elem);
                        optionList += '<tr><td class="NAME"><a target="_blank" href="'+elem.DETAIL_PAGE_URL+'">'+elem.NAME+'</a></td><td>Арт: '+elem.PROPERTY_ARTICLE_VALUE+'</td><td><a data-id="'+elem.ID+'" class="add_product_admin" href="#">добавить</a></td></tr>';
                    });
                    if(!optionList){
                        optionList = '<tr><td>Ничего не найдено!</td></tr>';
                    }
                    $('.select-search tbody').html(optionList);
                    $('.select-search').slideDown(300);
                }
            }
        });
    });
    $(document).on('click', '.add_product_admin', function () {
        var id = $(this)[0].dataset.id;
        var thisData = data_elem.get(id);
        var quantity = (thisData.PROPERTY_PACKNORM_VALUE) ? thisData.PROPERTY_PACKNORM_VALUE : 1;
        var addProduct = {};
        addProduct[id] = {'quantity': quantity};
        updateOrderProducts(addProduct);
        return false;
    });
    $('[data-slug="DELIVERY"]').change(function () {
        updateOrderProducts();
    });
    $('[data-slug="INPUT_SEARCH"]').keydown(function(e) {
        if(e.keyCode === 13) {
            $('[data-slug="BTN_SEARCH_ADMIN"]').click();
        }
    });
    $(document).on('click', '[data-slug="ADD_CUSTOM_DISCOUNT"]', function () {
        if($(this).hasClass('btn-danger')){
            if (confirm("При удалении индивидуальной скидки сумма заказа будет пересчитана с учетом стандартных скидок, если покупатель попадает под их действие. Продолжить?")) {
                $('[data-slug="DISCOUNT_ADMIN"], [data-slug="DISCOUNT_ADMIN_APPEND"]').hide().val('');
                $(this).removeClass('btn-danger');
                $(this).text('Добавить индивидуальную скидку');
                $('[name="field[UPDATE_PRODUCTS]"]').val('Y');
                updateOrderProducts();
            }
        } else {
            if (confirm("Внимание! При добавлении индивидуальной скидки все остальные типы скидок для данного заказа будут отменены.")) {
                $('[data-slug="DISCOUNT_ADMIN"], [data-slug="DISCOUNT_ADMIN_APPEND"]').show();
                $(this).addClass('btn-danger');
                $(this).text('Удалить индивидуальную скидку');
            }
        }
    });
    $('[data-slug="DISCOUNT_ADMIN"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    }).keyup(function (e) {
        var locationURL = window.location.pathname;
        var maxPercents = 10;
        if(locationURL === siteDir + 'admin/settings/discount/edit/'){
            maxPercents = 35;
        }
        if(locationURL === siteDir + 'admin/order/'){
            maxPercents = 30;
        }
        if(e.currentTarget.value > maxPercents){
            e.currentTarget.value = maxPercents;
        }
    }).change(function () {
        $('[name="field[UPDATE_PRODUCTS]"]').val('Y');
        updateOrderProducts();
    });


    // Склонение числительных
    function declOfNum(number, titles) {
        var cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }

});


(function (window) {
    if (window.ItertechSmallCart)
        return;

    window.ItertechSmallCart = function (arParams) {
        arItertechSmallCart = [];
        arItertechSmallCart.params = arParams.jsParams;
        arItertechSmallCart.ID = arParams.ID;
        arItertechSmallCart.path = arParams.path;
        arItertechSmallCart.siteID = arParams.jsParams.SITE_ID;
    }
})(window);
/* End */
;; /* /local/templates/arlight/js/jquery-3.1.1.min.js?165720755286709*/
; /* /local/templates/arlight/js/jquery-ui.min.js?165720755236675*/
; /* /local/templates/arlight/js/datepicker-ru.js?16572075521589*/
; /* /local/templates/arlight/js/jquery.fancybox.min.js?165720755264692*/
; /* /local/templates/arlight/js/slick.min.js?165720755242863*/
; /* /local/templates/arlight/js/plyr.polyfilled.min.js?1657207552131169*/
; /* /local/templates/arlight/js/jquery.validate.min.js?165720755223261*/
; /* /assets/json/messages_ru.json?16572075501582*/
; /* /local/templates/arlight/js/messages_ru.min.js?16572075521165*/
; /* /local/templates/arlight/js/jquery.scrollbar.min.js?165720755213026*/
; /* /local/templates/arlight/js/jquery.mask.min.js?16572075528185*/
; /* /local/templates/arlight/js/jquery.hyphenate.js?16572075523410*/
; /* /local/templates/arlight/js/jquery.tablesorter.min.js?165720755244371*/
; /* /local/templates/arlight/js/jquery.tablesorter.widgets.min.js?1657207552182017*/
; /* /local/templates/arlight/js/jquery.inputmask.bundle.min.js?165720755271343*/
; /* /local/templates/arlight/js/jquery.inputmask-multi.min.js?16572075526469*/
; /* /local/templates/arlight/js/tooltipster.bundle.min.js?165720755239901*/
; /* /local/templates/arlight/js/script.js?1657207552150772*/
; /* /bitrix/components/itertech/smallcart/templates/.default/script.js?165720755330237*/
