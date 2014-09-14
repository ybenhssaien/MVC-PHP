﻿(function(g,f,b,e,c,d,o){/*! Jssor */
$Jssor$=g.$Jssor$=g.$Jssor$||{};new(function(){});var m=function(){var b=this,a={};b.$On=b.addEventListener=function(b,c){if(typeof c!="function")return;if(!a[b])a[b]=[];a[b].push(c)};b.$Off=b.removeEventListener=function(e,d){var b=a[e];if(typeof d!="function")return;else if(!b)return;for(var c=0;c<b.length;c++)if(d==b[c]){b.splice(c,1);return}};b.h=function(e){var c=a[e],d=[];if(!c)return;for(var b=1;b<arguments.length;b++)d.push(arguments[b]);for(var b=0;b<c.length;b++)try{c[b].apply(g,d)}catch(f){}}},h;(function(){h=function(a,b){this.x=typeof a=="number"?a:0;this.y=typeof b=="number"?b:0};})();var l=g.$JssorEasing$={$EaseLinear:function(a){return a},$EaseGoBack:function(a){return 1-b.abs(2-1)},$EaseSwing:function(a){return-b.cos(a*b.PI)/2+.5},$EaseInQuad:function(a){return a*a},$EaseOutQuad:function(a){return-a*(a-2)},$EaseInOutQuad:function(a){return(a*=2)<1?1/2*a*a:-1/2*(--a*(a-2)-1)},$EaseInCubic:function(a){return a*a*a},$EaseOutCubic:function(a){return(a-=1)*a*a+1},$EaseInOutCubic:function(a){return(a*=2)<1?1/2*a*a*a:1/2*((a-=2)*a*a+2)},$EaseInQuart:function(a){return a*a*a*a},$EaseOutQuart:function(a){return-((a-=1)*a*a*a-1)},$EaseInOutQuart:function(a){return(a*=2)<1?1/2*a*a*a*a:-1/2*((a-=2)*a*a*a-2)},$EaseInQuint:function(a){return a*a*a*a*a},$EaseOutQuint:function(a){return(a-=1)*a*a*a*a+1},$EaseInOutQuint:function(a){return(a*=2)<1?1/2*a*a*a*a*a:1/2*((a-=2)*a*a*a*a+2)},$EaseInSine:function(a){return 1-b.cos(a*b.PI/2)},$EaseOutSine:function(a){return b.sin(a*b.PI/2)},$EaseInOutSine:function(a){return-1/2*(b.cos(b.PI*a)-1)},$EaseInExpo:function(a){return a==0?0:b.pow(2,10*(a-1))},$EaseOutExpo:function(a){return a==1?1:-b.pow(2,-10*a)+1},$EaseInOutExpo:function(a){return a==0||a==1?a:(a*=2)<1?1/2*b.pow(2,10*(a-1)):1/2*(-b.pow(2,-10*--a)+2)},$EaseInCirc:function(a){return-(b.sqrt(1-a*a)-1)},$EaseOutCirc:function(a){return b.sqrt(1-(a-=1)*a)},$EaseInOutCirc:function(a){return(a*=2)<1?-1/2*(b.sqrt(1-a*a)-1):1/2*(b.sqrt(1-(a-=2)*a)+1)},$EaseInElastic:function(a){if(!a||a==1)return a;var c=.3,d=.075;return-(b.pow(2,10*(a-=1))*b.sin((a-d)*2*b.PI/c))},$EaseOutElastic:function(a){if(!a||a==1)return a;var c=.3,d=.075;return b.pow(2,-10*a)*b.sin((a-d)*2*b.PI/c)+1},$EaseInOutElastic:function(a){if(!a||a==1)return a;var c=.45,d=.1125;return(a*=2)<1?-.5*b.pow(2,10*(a-=1))*b.sin((a-d)*2*b.PI/c):b.pow(2,-10*(a-=1))*b.sin((a-d)*2*b.PI/c)*.5+1},$EaseInBack:function(a){var b=1.70158;return a*a*((b+1)*a-b)},$EaseOutBack:function(a){var b=1.70158;return(a-=1)*a*((b+1)*a+b)+1},$EaseInOutBack:function(a){var b=1.70158;return(a*=2)<1?1/2*a*a*(((b*=1.525)+1)*a-b):1/2*((a-=2)*a*(((b*=1.525)+1)*a+b)+2)},$EaseInBounce:function(a){return 1-l.$EaseOutBounce(1-a)},$EaseOutBounce:function(a){return a<1/2.75?7.5625*a*a:a<2/2.75?7.5625*(a-=1.5/2.75)*a+.75:a<2.5/2.75?7.5625*(a-=2.25/2.75)*a+.9375:7.5625*(a-=2.625/2.75)*a+.984375},$EaseInOutBounce:function(a){return a<1/2?l.$EaseInBounce(a*2)*.5:l.$EaseOutBounce(a*2-1)*.5+.5},$EaseInWave:function(a){return 1-b.cos(a*b.PI*2)},$EaseOutWave:function(a){return b.sin(a*b.PI*2)},$EaseOutJump:function(a){return 1-((a*=2)<1?(a=1-a)*a*a:(a-=1)*a*a)},$EaseInJump:function(a){return(a*=2)<1?a*a*a:(a=2-a)*a*a}},i={Ce:function(a){return(a&3)==1},Be:function(a){return(a&3)==2},Ge:function(a){return(a&12)==4},Fe:function(a){return(a&12)==8}},r={Ee:37,De:39},p,n={Le:0,Me:1,Ne:2,Ie:3,Je:4,Ke:5},z=1,v=2,x=3,w=4,y=5,j,a=new function(){var i=this,m=n.Le,j=0,s=0,T=0,B=0,fb=navigator.appName,k=navigator.userAgent;function F(){if(!m)if(fb=="Microsoft Internet Explorer"&&!!g.attachEvent&&!!g.ActiveXObject){var d=k.indexOf("MSIE");m=n.Me;s=parseFloat(k.substring(d+5,k.indexOf(";",d)));/*@cc_on T=@_jscript_version@*/;j=f.documentMode||s}else if(fb=="Netscape"&&!!g.addEventListener){var c=k.indexOf("Firefox"),a=k.indexOf("Safari"),h=k.indexOf("Chrome"),b=k.indexOf("AppleWebKit");if(c>=0){m=n.Ne;j=parseFloat(k.substring(c+8))}else if(a>=0){var i=k.substring(0,a).lastIndexOf("/");m=h>=0?n.Je:n.Ie;j=parseFloat(k.substring(i+1,a))}if(b>=0)B=parseFloat(k.substring(b+12))}else{var e=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(k);if(e){m=n.Ke;j=parseFloat(e[2])}}}function r(){F();return m==z}function I(){return r()&&(j<6||f.compatMode=="BackCompat")}function Z(){F();return m==v}function O(){F();return m==x}function lb(){F();return m==w}function nb(){F();return m==y}function V(){return O()&&B>534&&B<535}function A(){return r()&&j<9}var D;function t(a){if(!D){q(["transform","WebkitTransform","msTransform","MozTransform","OTransform"],function(b){if(!i.Ob(a.style[b])){D=b;return c}});D=D||"transform"}return D}function db(a){return Object.prototype.toString.call(a)}var L;function q(a,c){if(db(a)=="[object Array]"){for(var b=0;b<a.length;b++)if(c(a[b],b,a))break}else for(var d in a)if(c(a[d],d,a))break}function ob(){if(!L){L={};q(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){L["[object "+a+"]"]=a.toLowerCase()})}return L}function C(a){return a==e?String(a):ob()[db(a)]||"object"}function eb(b,a){setTimeout(b,a||0)}function K(b,d,c){var a=!b||b=="inherit"?"":b;q(d,function(c){var b=c.exec(a);if(b){var d=a.substr(0,b.index),e=a.substr(b.lastIndex+1,a.length-(b.lastIndex+1));a=d+e}});a=c+(a.indexOf(" ")!=0?" ":"")+a;return a}function ab(b,a){if(j<9)b.style.filter=a}function ib(b,a,c){if(T<9){var e=b.style.filter,g=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),f=a?"progid:DXImageTransform.Microsoft.Matrix(M11="+a[0][0]+", M12="+a[0][1]+", M21="+a[1][0]+", M22="+a[1][1]+", SizingMethod='auto expand')":"",d=K(e,[g],f);ab(b,d);i.oc(b,c.y);i.nc(b,c.x)}}i.Nb=r;i.qb=lb;i.cc=nb;i.rb=A;i.cb=function(){return j};i.pc=function(){return B};i.$Delay=eb;i.E=function(a){if(i.sc(a))a=f.getElementById(a);return a};i.zb=function(a){return a?a:g.event};i.oe=function(a){a=i.zb(a);return a.target||a.srcElement||f};i.rc=function(a){a=i.zb(a);var b=new h;if(a.type=="DOMMouseScroll"&&Z()&&j<3){b.x=a.screenX;b.y=a.screenY}else if(typeof a.pageX=="number"){b.x=a.pageX;b.y=a.pageY}else if(typeof a.clientX=="number"){b.x=a.clientX+f.body.scrollLeft+f.documentElement.scrollLeft;b.y=a.clientY+f.body.scrollTop+f.documentElement.scrollTop}return b};function G(c,d,a){if(a!=o)c.style[d]=a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&g.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,e);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function Q(b,c,a,d){if(a!=o){d&&(a+="px");G(b,c,a)}else return parseFloat(G(b,c))}function l(d,a){var b=a&2,c=a?Q:G;return function(e,a){return c(e,d,a,b)}}function kb(b){if(r()&&s<9){var a=/opacity=([^)]*)/.exec(b.style.filter||"");return a?parseFloat(a[1])/100:1}else return parseFloat(b.style.opacity||"1")}function mb(c,a,f){if(r()&&s<9){var h=c.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),e=b.round(100*a),d="";if(e<100||f)d="alpha(opacity="+e+") ";var g=K(h,[i],d);ab(c,g)}else c.style.opacity=a==1?"":b.round(a*100)/100}function S(g,c){var f=c.$Rotate||0,d=c.$Scale==o?1:c.$Scale;if(A()){var k=i.pe(f/180*b.PI,d,d);ib(g,!f&&d==1?e:k,i.qe(k,c.W,c.X))}else{var h=t(g);if(h){var j="rotate("+f%360+"deg) scale("+d+")";if(a.qb()&&B>535)j+=" perspective(2000px)";g.style[h]=j}}}i.ue=function(b,a){if(V())eb(i.o(e,S,b,a));else S(b,a)};i.ye=function(b,c){var a=t(b);if(a)b.style[a+"Origin"]=c};i.ze=function(a,c){if(r()&&s<9||s<10&&I())a.style.zoom=c==1?"":c;else{var b=t(a);if(b){var f="scale("+c+")",e=a.style[b],g=new RegExp(/[\s]*scale\(.*?\)/g),d=K(e,[g],f);a.style[b]=d}}};i.Ae=function(a){if(!a.style[t(a)]||a.style[t(a)]=="none")a.style[t(a)]="perspective(2000px)"};i.g=function(a,c,d,b){a=i.E(a);if(a.addEventListener){c=="mousewheel"&&a.addEventListener("DOMMouseScroll",d,b);a.addEventListener(c,d,b)}else if(a.attachEvent){a.attachEvent("on"+c,d);b&&a.setCapture&&a.setCapture()}};i.ve=function(a,c,d,b){a=i.E(a);if(a.removeEventListener){c=="mousewheel"&&a.removeEventListener("DOMMouseScroll",d,b);a.removeEventListener(c,d,b)}else if(a.detachEvent){a.detachEvent("on"+c,d);b&&a.releaseCapture&&a.releaseCapture()}};i.we=function(b,a){i.g(A()?f:g,"mouseup",b,a)};i.bb=function(a){a=i.zb(a);a.preventDefault&&a.preventDefault();a.cancel=c;a.returnValue=d};i.o=function(e,d){for(var b=[],a=2;a<arguments.length;a++)b.push(arguments[a]);var c=function(){for(var c=b.concat([]),a=0;a<arguments.length;a++)c.push(arguments[a]);return d.apply(e,c)};return c};i.xe=function(a,c){var b=f.createTextNode(c);i.wc(a);a.appendChild(b)};i.wc=function(a){a.innerHTML=""};i.Z=function(c){for(var b=[],a=c.firstChild;a;a=a.nextSibling)a.nodeType==1&&b.push(a);return b};function R(a,c,b,f){if(!b)b="u";for(a=a?a.firstChild:e;a;a=a.nextSibling)if(a.nodeType==1){if(i.w(a,b)==c)return a;if(f){var d=R(a,c,b,f);if(d)return d}}}i.q=R;function W(a,c,d){for(a=a?a.firstChild:e;a;a=a.nextSibling)if(a.nodeType==1){if(a.tagName==c)return a;if(d){var b=W(a,c,d);if(b)return b}}}i.Pe=W;i.Ue=function(b,a){return b.getElementsByTagName(a)};i.i=function(c){for(var b=1;b<arguments.length;b++){var a=arguments[b];if(a)for(var d in a)c[d]=a[d]}return c};i.Ob=function(a){return C(a)=="undefined"};i.Re=function(a){return C(a)=="function"};i.ac=Array.isArray||function(a){return C(a)=="array"};i.sc=function(a){return C(a)=="string"};i.Se=function(a){return!isNaN(parseFloat(a))&&isFinite(a)};i.c=q;i.M=function(a){return i.yc("DIV",a)};i.Te=function(a){return i.yc("SPAN",a)};i.yc=function(b,a){a=a||f;return a.createElement(b)};i.U=function(){};i.Hb=function(a,b){return a.getAttribute(b)};i.w=function(a,b){return i.Hb(a,b)||i.Hb(a,"data-"+b)};i.Oe=function(b,c,a){b.setAttribute(c,a)};i.Fb=function(a){return a.className};i.Pb=function(b,a){b.className=a||""};i.P=function(a){return a.parentNode};i.D=function(a){i.S(a,"none")};i.p=function(a,b){i.S(a,b==d?"none":"")};i.Qe=function(b,a){b.removeAttribute(a)};i.Ve=function(){return r()&&j<10};i.bd=function(d,c){if(c)d.style.clip="rect("+b.round(c.$Top)+"px "+b.round(c.$Right)+"px "+b.round(c.$Bottom)+"px "+b.round(c.$Left)+"px)";else{var g=d.style.cssText,f=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],e=K(g,f,"");a.mb(d,e)}};i.x=function(){return+new Date};i.v=function(b,a){b.appendChild(a)};i.lb=function(c,b,a){c.insertBefore(b,a)};i.hb=function(b,a){b.removeChild(a)};i.Vc=function(b,a){q(a,function(a){i.hb(b,a)})};i.cd=function(a){i.Vc(a,i.Z(a))};i.Xc=function(b,a){return parseInt(b,a||10)};i.uc=function(a){return parseFloat(a)};i.Sc=function(b,a){var c=f.body;while(a&&b!=a&&c!=a)try{a=a.parentNode}catch(e){return d}return b==a};i.A=function(b,a){return b.cloneNode(a)};function N(b,a,c){a.onload=e;a.abort=e;b&&b(a,c)}i.V=function(d,b){if(i.cc()&&j<11.6||!d)N(b,e);else{var a=new Image;a.onload=i.o(e,N,b,a);a.onabort=i.o(e,N,b,a,c);a.src=d}};i.ad=function(e,b,f){var d=e.length+1;function c(a){d--;if(b&&a&&a.src==b.src)b=a;!d&&f&&f(b)}a.c(e,function(b){a.V(b.src,c)});c()};i.Fc=function(d,k,j,i){if(i)d=a.A(d,c);for(var h=a.Ue(d,k),f=h.length-1;f>-1;f--){var b=h[f],e=a.A(j,c);a.Pb(e,a.Fb(b));a.mb(e,b.style.cssText);var g=a.P(b);a.lb(g,e,b);a.hb(g,b)}return d};var E;function qb(b){var g=this,h,e,j;function f(){var c=h;if(e)c+="dn";else if(j)c+="av";a.Pb(b,c)}function k(){E.push(g);e=c;f()}g.Yc=function(){e=d;f()};g.Ec=function(a){j=a;f()};b=i.E(b);if(!E){i.we(function(){var a=E;E=[];q(a,function(a){a.Yc()})});E=[]}h=i.Fb(b);a.g(b,"mousedown",k)}i.ub=function(a){return new qb(a)};i.Ub=G;i.db=l("overflow");i.k=l("top",2);i.l=l("left",2);i.e=l("width",2);i.f=l("height",2);i.nc=l("marginLeft",2);i.oc=l("marginTop",2);i.t=l("position");i.S=l("display");i.y=l("zIndex",1);i.bc=function(b,a,c){if(a!=o)mb(b,a,c);else return kb(b)};i.mb=function(a,b){if(b!=o)a.style.cssText=b;else return a.style.cssText};var P={$Opacity:i.bc,$Top:i.k,$Left:i.l,Sb:i.e,Rb:i.f,fb:i.t,eg:i.S,$ZIndex:i.y},u;function J(){if(!u)u=i.i({dg:i.oc,cg:i.nc,$Clip:i.bd,yb:i.ue},P);return u}function Y(){J();u.yb=u.yb;return u}i.Wc=J;i.Td=Y;i.Sd=function(c,b){J();var a={};q(b,function(d,b){if(P[b])a[b]=P[b](c)});return a};i.I=function(c,b){var a=J();q(b,function(d,b){a[b]&&a[b](c,d)})};p=new function(){var a=this;function b(d,g){for(var j=d[0].length,i=d.length,h=g[0].length,f=[],c=0;c<i;c++)for(var k=f[c]=[],b=0;b<h;b++){for(var e=0,a=0;a<j;a++)e+=d[c][a]*g[a][b];k[b]=e}return f}a.Ab=function(d,c){var a=b(d,[[c.x],[c.y]]);return new h(a[0][0],a[1][0])}};i.pe=function(d,a,c){var e=b.cos(d),f=b.sin(d);return[[e*a,-f*c],[f*a,e*c]]};i.qe=function(d,c,a){var e=p.Ab(d,new h(-c/2,-a/2)),f=p.Ab(d,new h(c/2,-a/2)),g=p.Ab(d,new h(c/2,a/2)),i=p.Ab(d,new h(-c/2,a/2));return new h(b.min(e.x,f.x,g.x,i.x)+c/2,b.min(e.y,f.y,g.y,i.y)+a/2)}};j=function(n,m,g,O,z,x){n=n||0;var f=this,r,o,p,y,A=0,C,M,L,D,j=0,t=0,E,k=n,i,h,q,u=[],B;function I(b){i+=b;h+=b;k+=b;j+=b;t+=b;a.c(u,function(a){a,a.$Shift(b)})}function N(a,b){var c=a-i+n*b;I(c);return h}function w(w,G){var n=w;if(q&&(n>=h||n<=i))n=((n-i)%q+q)%q+i;if(!E||y||G||j!=n){var p=b.min(n,h);p=b.max(p,i);if(!E||y||G||p!=t){if(x){var d=x;if(z){var s=(p-k)/(m||1);if(g.Rd&&a.qb()&&m)s=b.round(s*m/16)/m*16;if(g.$Reverse)s=1-s;d={};for(var o in x){var R=M[o]||1,J=L[o]||[0,1],l=(s-J[0])/J[1];l=b.min(b.max(l,0),1);l=l*R;var H=b.floor(l);if(l!=H)l-=H;var Q=C[o]||C.L,I=Q(l),r,K=z[o],F=x[o];if(a.Se(F))r=K+(F-K)*I;else{r=a.i({F:{}},z[o]);a.c(F.F,function(c,b){var a=c*I;r.F[b]=a;r[b]+=a})}d[o]=r}}if(z.$Zoom)d.yb={$Rotate:d.$Rotate||0,$Scale:d.$Zoom,W:g.W,X:g.X};if(x.$Clip&&g.$Move){var v=d.$Clip.F,D=(v.$Top||0)+(v.$Bottom||0),A=(v.$Left||0)+(v.$Right||0);d.$Left=(d.$Left||0)+A;d.$Top=(d.$Top||0)+D;d.$Clip.$Left-=A;d.$Clip.$Right-=A;d.$Clip.$Top-=D;d.$Clip.$Bottom-=D}if(d.$Clip&&a.Ve()&&!d.$Clip.$Top&&!d.$Clip.$Left&&d.$Clip.$Right==g.W&&d.$Clip.$Bottom==g.X)d.$Clip=e;a.c(d,function(b,a){B[a]&&B[a](O,b)})}f.Ib(t-k,p-k)}t=p;a.c(u,function(b,c){var a=w<j?u[u.length-c-1]:b;a.C(w,G)});var P=j,N=w;j=n;E=c;f.Bb(P,N)}}function F(a,c){c&&a.xb(h,1);h=b.max(h,a.O());u.push(a)}function H(){if(r){var d=a.x(),e=b.min(d-A,a.cc()?80:20),c=j+e*p;A=d;if(c*p>=o*p)c=o;w(c);if(!y&&c*p>=o*p)J(D);else a.$Delay(H,g.$Interval)}}function v(d,e,g){if(!r){r=c;y=g;D=e;d=b.max(d,i);d=b.min(d,h);o=d;p=o<j?-1:1;f.kc();A=a.x();H()}}function J(a){if(r){y=r=D=d;f.ic();a&&a()}}f.$Play=function(a,b,c){v(a?j+a:h,b,c)};f.Nc=function(b,a,c){v(b,a,c)};f.R=function(){J()};f.Ud=function(a){v(a)};f.Q=function(){return j};f.Lc=function(){return o};f.wb=function(){return t};f.C=w;f.Db=function(){w(i,c)};f.$Move=function(a){w(j+a)};f.$IsPlaying=function(){return r};f.Wd=function(a){q=a};f.xb=N;f.$Shift=I;f.G=function(a){F(a,0)};f.Kb=function(a){F(a,1)};f.O=function(){return h};f.Bb=a.U;f.kc=a.U;f.ic=a.U;f.Ib=a.U;f.Jb=a.x();g=a.i({$Interval:16},g);q=g.Kc;B=a.i({},a.Wc(),g.lc);i=k=n;h=n+m;var M=g.$Round||{},L=g.$During||{};C=a.i({L:a.Re(g.$Easing)&&g.$Easing||l.$EaseSwing},g.$Easing)};var s;new function(){;function n(o,dc){var i=this;function yc(){var a=this;j.call(a,-1e8,2e8);a.Nd=function(){var c=a.wb(),d=b.floor(c),f=u(d),e=c-b.floor(c);return{T:f,Yd:d,fb:e}};a.Bb=function(d,a){var e=b.floor(a);if(e!=a&&a>d)e++;Qb(e,c);i.h(n.$EVT_POSITION_CHANGE,u(a),u(d),a,d)}}function xc(){var b=this;j.call(b,0,0,{Kc:s});a.c(C,function(a){T&1&&a.Wd(s);b.Kb(a);a.$Shift(hb/Yb)})}function wc(){var a=this,b=Pb.$Elmt;j.call(a,-1,2,{$Easing:l.$EaseLinear,lc:{fb:Wb},Kc:s},b,{fb:1},{fb:-1});a.sb=b}function lc(o,m){var a=this,f,g,h,l,b;j.call(a,-1e8,2e8);a.kc=function(){Q=c;V=e;i.h(n.$EVT_SWIPE_START,u(y.Q()),y.Q())};a.ic=function(){Q=d;l=d;var a=y.Nd();i.h(n.$EVT_SWIPE_END,u(y.Q()),y.Q());!a.fb&&Ac(a.Yd,p)};a.Bb=function(d,c){var a;if(l)a=b;else{a=g;if(h)a=k.$SlideEasing(c/h)*(g-f)+f}y.C(a)};a.nb=function(b,d,c,e){f=b;g=d;h=c;y.C(b);a.C(0);a.Nc(c,e)};a.ne=function(d){l=c;b=d;a.$Play(d,e,c)};a.me=function(a){b=a};y=new yc;y.G(o);y.G(m)}function mc(){var c=this,b=Vb();a.y(b,0);c.$Elmt=b;c.pb=function(){a.D(b);a.wc(b)}}function vc(q,o){var f=this,t,w,K,y,g,z=[],T,r,X,I,P,F,l,v,h;j.call(f,-x,x+1,{});function E(a){w&&w.gc();t&&t.gc();W(q,a);F=c;t=new M.$Class(q,M,1);w=new M.$Class(q,M);w.Db();t.Db()}function Z(){t.Jb<M.Jb&&E()}function L(o,q,m){if(!I){I=c;if(g&&m){var e=m.width,b=m.height,l=e,j=b;if(e&&b&&k.$FillMode){if(k.$FillMode&3&&(!(k.$FillMode&4)||e>J||b>H)){var h=d,p=J/H*b/e;if(k.$FillMode&1)h=p>1;else if(k.$FillMode&2)h=p<1;l=h?e*H/b:J;j=h?H:b*J/e}a.e(g,l);a.f(g,j);a.k(g,(H-j)/2);a.l(g,(J-l)/2)}a.t(g,"absolute");i.h(n.$EVT_LOAD_END,bc)}}a.D(q);o&&o(f)}function Y(b,c,d,e){if(e==V&&p==o&&R)if(!zc){var a=u(b);A.Pd(a,o,c,f,d);c.ge();ab.xb(a,1);ab.C(a);B.nb(b,b,0)}}function cb(b){if(b==V&&p==o){if(!l){var a=e;if(A)if(A.T==o)a=A.Od();else A.pb();Z();l=new tc(o,a,f.be(),f.ae());l.Ac(h)}!l.$IsPlaying()&&l.Wb()}}function Q(d,c){if(d==o){if(d!=c)C[c]&&C[c].Zd();h&&h.$Enable();var j=V=a.x();f.V(a.o(e,cb,j))}else{var i=b.abs(o-d),g=x+k.$LazyLoading;(!P||i<=g||s-i<=g)&&f.V()}}function fb(){if(p==o&&l){l.R();h&&h.$Quit();h&&h.$Disable();l.Gc()}}function gb(){p==o&&l&&l.R()}function O(b){if(U)a.bb(b);else i.h(n.$EVT_CLICK,o,b)}function N(){h=v.pInstance;l&&l.Ac(h)}f.V=function(d,b){b=b||y;if(z.length&&!I){a.p(b);if(!X){X=c;i.h(n.$EVT_LOAD_START);a.c(z,function(b){if(!b.src){b.src=a.w(b,"src2");a.S(b,b["display-origin"])}})}a.ad(z,g,a.o(e,L,d,b))}else L(d,b)};f.ld=function(){if(A){var b=A.Md(s);if(b){var f=V=a.x(),c=o+1*Ub,d=C[u(c)];return d.V(a.o(e,Y,c,d,b,f),y)}}bb(p+k.$AutoPlaySteps*Ub)};f.Yb=function(){Q(o,o)};f.Zd=function(){h&&h.$Quit();h&&h.$Disable();f.Dc();l&&l.rd();l=e;E()};f.ge=function(){a.D(q)};f.Dc=function(){a.p(q)};f.qd=function(){h&&h.$Enable()};function W(b,f,e){if(b["jssor-slider"]||a.Hb(b,"u")=="thumb")return;e=e||0;if(!F){if(b.tagName=="IMG"){z.push(b);if(!b.src){P=c;b["display-origin"]=a.S(b);a.D(b)}}a.rb()&&a.y(b,(a.y(b)||0)+1);if(k.$HWA&&a.pc()>0)(!G||a.pc()<534||!eb)&&a.Ae(b)}var h=a.Z(b);a.c(h,function(h){var j=a.w(h,"u");if(j=="player"&&!v){v=h;if(v.pInstance)N();else a.g(v,"dataavailable",N)}if(j=="caption"){if(!a.Nb()&&!f){var i=a.A(h,c);a.lb(b,i,h);a.hb(b,h);h=i;f=c}}else if(!F&&!e&&!g&&a.w(h,"u")=="image"){g=h;if(g){if(g.tagName=="A"){T=g;a.I(T,S);r=a.A(g,d);a.g(r,"click",O);a.I(r,S);a.S(r,"block");a.bc(r,0);a.Ub(r,"backgroundColor","#000");g=a.Pe(g,"IMG")}g.border=0;a.I(g,S)}}W(h,f,e+1)})}f.Ib=function(c,b){var a=x-b;Wb(K,a)};f.be=function(){return t};f.ae=function(){return w};f.T=o;m.call(f);var D=a.q(q,"thumb");if(D){f.kd=a.A(D,c);a.Qe(D,"id");a.D(D)}a.p(q);y=a.A(db,c);a.y(y,1e3);a.g(q,"click",O);E(c);f.Uc=g;f.Cc=r;f.sb=K=q;a.v(K,y);i.$On(203,Q);i.$On(22,gb);i.$On(24,fb)}function tc(g,r,v,u){var b=this,m=0,x=0,o,h,e,f,l,s,w,t,q=C[g];j.call(b,0,0);function y(){a.cd(N);cc&&l&&q.Cc&&a.v(N,q.Cc);a.p(N,l||!q.Uc)}function z(){if(s){s=d;i.h(n.$EVT_ROLLBACK_END,g,e,m,h,e,f);b.C(h)}b.Wb()}function B(a){t=a;b.R();b.Wb()}b.Wb=function(){var a=b.wb();if(!I&&!Q&&!t&&p==g){if(!a){if(o&&!l){l=c;b.Gc(c);i.h(n.$EVT_SLIDESHOW_START,g,m,x,o,f)}y()}var d,k=n.$EVT_STATE_CHANGE;if(a!=f)if(a==e)d=f;else if(a==h)d=e;else if(!a)d=h;else if(a>e){s=c;d=e;k=n.$EVT_ROLLBACK_START}else d=b.Lc();i.h(k,g,a,m,h,e,f);var j=R&&(!Sb||Z);if(a==f)j&&q.ld();else(j||a!=e)&&b.Nc(d,z)}};b.rd=function(){A&&A.T==g&&A.pb();var a=b.wb();a<f&&i.h(n.$EVT_STATE_CHANGE,g,-a-1,m,h,e,f)};b.Gc=function(b){r&&a.db(jb,b&&r.ab.$Outside?"":"hidden")};b.Ib=function(b,a){if(l&&a>=o){l=d;y();q.Dc();A.pb();i.h(n.$EVT_SLIDESHOW_END,g,m,x,o,f)}i.h(n.$EVT_PROGRESS_CHANGE,g,a,m,h,e,f)};b.Ac=function(a){if(a&&!w){w=a;a.$On($JssorPlayer$.Qd,B)}};r&&b.Kb(r);o=b.O();b.O();b.Kb(v);h=v.O();e=h+k.$AutoPlayInterval;u.$Shift(e);b.G(u);f=b.O()}function Wb(c,g){var f=w>0?w:ib,d=zb*g*(f&1),e=Ab*g*(f>>1&1);if(!a.qb()){d=b.round(d);e=b.round(e)}if(a.Nb()&&a.cb()>=10&&a.cb()<11)c.style.msTransform="translate("+d+"px, "+e+"px)";else if(a.qb()&&a.cb()>=30&&a.cb()<34){c.style.WebkitTransition="transform 0s";c.style.WebkitTransform="translate3d("+d+"px, "+e+"px, 0px) perspective(2000px)"}else{a.l(c,d);a.k(c,e)}}function rc(c){U=0;var b=a.oe(c).tagName;!K&&b!="INPUT"&&b!="TEXTAREA"&&pc()&&qc(c)}function qc(b){pb=Q;I=c;yb=d;V=e;a.g(f,nb,Zb);a.x();Hb=B.Lc();B.R();if(!pb)w=0;if(G){var h=b.touches[0];tb=h.clientX;ub=h.clientY}else{var g=a.rc(b);tb=g.x;ub=g.y;a.bb(b)}E=0;cb=0;gb=0;D=y.Q();i.h(n.$EVT_DRAG_START,u(D),D,b)}function Zb(e){if(I&&(!a.rb()||e.button)){var f;if(G){var m=e.touches;if(m&&m.length>0)f=new h(m[0].clientX,m[0].clientY)}else f=a.rc(e);if(f){var k=f.x-tb,l=f.y-ub;if(b.floor(D)!=D)w=w||ib&K;if((k||l)&&!w){if(K==3)if(b.abs(l)>b.abs(k))w=2;else w=1;else w=K;if(G&&w==1&&b.abs(l)-b.abs(k)>3)yb=c}if(w){var d=l,j=Ab;if(w==1){d=k;j=zb}if(!(T&1)){if(d>0){var g=j*p,i=d-g;if(i>0)d=g+b.sqrt(i)*5}if(d<0){var g=j*(s-x-p),i=-d-g;if(i>0)d=-g-b.sqrt(i)*5}}if(E-cb<-2)gb=1;else if(E-cb>2)gb=0;cb=E;E=d;rb=D-E/j/(mb||1);if(E&&w&&!yb){a.bb(e);if(!Q)B.ne(rb);else B.me(rb)}else a.rb()&&a.bb(e)}}}else Db(e)}function Db(h){nc();if(I){I=d;a.x();a.ve(f,nb,Zb);U=E;U&&a.bb(h);B.R();var e=y.Q();i.h(n.$EVT_DRAG_END,u(e),e,u(D),D,h);var c=b.floor(D);if(b.abs(E)>=k.$MinDragOffsetToSlide){c=b.floor(e);c+=gb}if(!(T&1))c=b.min(s-x,b.max(c,0));var g=b.abs(c-e);g=1-b.pow(1-g,5);if(!U&&pb)B.Ud(Hb);else if(e==c){sb.qd();sb.Yb()}else B.nb(e,c,g*Rb)}}function kc(a){C[p];p=u(a);sb=C[p];Qb(a);return p}function Ac(a,b){w=0;kc(a);i.h(n.$EVT_PARK,u(a),b)}function Qb(b,c){wb=b;a.c(P,function(a){a.ec(u(b),b,c)})}function pc(){var b=n.xc||0,a=O;if(G)a&1&&(a&=1);n.xc|=a;return K=a&~b}function nc(){if(K){n.xc&=~O;K=0}}function Vb(){var b=a.M();a.I(b,S);a.t(b,"absolute");return b}function u(a){return(a%s+s)%s}function hc(a,c){if(c)if(!T){a=b.min(b.max(a+wb,0),s-1);c=d}else if(T&2){a=u(a+wb);c=d}bb(a,k.$SlideDuration,c)}function xb(){a.c(P,function(a){a.dc(a.ob.$ChanceToShow>Z)})}function fc(b){b=a.zb(b);var c=b.target?b.target:b.srcElement,d=b.relatedTarget?b.relatedTarget:b.toElement;if(!a.Sc(o,c)||a.Sc(o,d))return;Z=1;xb();C[p].Yb()}function ec(){Z=0;xb()}function gc(){S={Sb:J,Rb:H,$Top:0,$Left:0};a.c(X,function(b){a.I(b,S);a.t(b,"absolute");a.db(b,"hidden");a.D(b)});a.I(db,S)}function kb(b,a){bb(b,a,c)}function bb(h,g,l){if(Nb&&(!I||k.$NaviQuitDrag)){Q=c;I=d;B.R();if(a.Ob(g))g=Rb;var f=Eb.wb(),e=h;if(l){e=f+h;if(h>0)e=b.ceil(e);else e=b.floor(e)}if(!(T&1)){e=u(e);e=b.max(0,b.min(e,s-x))}var j=(e-f)%s;e=f+j;var i=f==e?0:g*b.abs(j);i=b.min(i,g*x*1.5);B.nb(f,e,i||1)}}i.$PlayTo=bb;i.$GoTo=function(a){bb(a,1)};i.$Next=function(){kb(1)};i.$Prev=function(){kb(-1)};i.$Pause=function(){R=d};i.$Play=function(){if(!R){R=c;C[p]&&C[p].Yb()}};i.$SetSlideshowTransitions=function(a){k.$SlideshowOptions.$Transitions=a};i.$SetCaptionTransitions=function(b){M.$CaptionTransitions=b;M.Jb=a.x()};i.$SlidesCount=function(){return X.length};i.$CurrentIndex=function(){return p};i.$IsAutoPlaying=function(){return R};i.$IsDragging=function(){return I};i.$IsSliding=function(){return Q};i.$IsMouseOver=function(){return!Z};i.$LastDragSucceded=function(){return U};i.$GetOriginalWidth=function(){return a.e(v||o)};i.$GetOriginalHeight=function(){return a.f(v||o)};i.$GetScaleWidth=function(){return a.e(o)};i.$GetScaleHeight=function(){return a.f(o)};i.$SetScaleWidth=function(c){if(!v){var b=a.M(f);a.mb(b,a.mb(o));a.Pb(b,a.Fb(o));a.t(b,"relative");a.k(b,0);a.l(b,0);a.db(b,"visible");v=a.M(f);a.t(v,"absolute");a.k(v,0);a.l(v,0);a.e(v,a.e(o));a.f(v,a.f(o));a.ye(v,"0 0");a.v(v,b);var g=a.Z(o);a.v(o,v);a.Ub(o,"backgroundImage","");var e={navigator:Y&&Y.$Scale==d,arrowleft:L&&L.$Scale==d,arrowright:L&&L.$Scale==d,thumbnavigator:F&&F.$Scale==d,thumbwrapper:F&&F.$Scale==d};a.c(g,function(c){a.v(e[a.w(c,"u")]?o:b,c)});a.p(b);a.p(v)}mb=c/a.e(v);a.ze(v,mb);a.e(o,c);a.f(o,mb*a.f(v));a.c(P,function(a){a.Lb()})};i.Pc=function(a){var d=b.ceil(u(hb/Yb)),c=u(a-p+d);if(c>x){if(a-p>s/2)a-=s;else if(a-p<=-s/2)a+=s}else a=p+c-d;return a};m.call(this);i.$Elmt=o=a.E(o);var k=a.i({$FillMode:0,$LazyLoading:1,$StartIndex:0,$AutoPlay:d,$Loop:1,$HWA:c,$NaviQuitDrag:c,$AutoPlaySteps:1,$AutoPlayInterval:3e3,$PauseOnHover:1,$SlideDuration:500,$SlideEasing:l.$EaseOutQuad,$MinDragOffsetToSlide:20,$SlideSpacing:0,$DisplayPieces:1,$ParkingPosition:0,$UISearchMode:1,$PlayOrientation:1,$DragOrientation:1},dc),ib=k.$PlayOrientation&3,Ub=(k.$PlayOrientation&4)/-4||1,fb=k.$SlideshowOptions,M=a.i({$Class:t,$PlayInMode:1,$PlayOutMode:1},k.$CaptionSliderOptions),Y=k.$BulletNavigatorOptions,L=k.$ArrowNavigatorOptions,F=k.$ThumbnailNavigatorOptions,W=k.$UISearchMode,v,z=a.q(o,"slides",e,W),db=a.q(o,"loading",e,W)||a.M(f),Jb=a.q(o,"navigator",e,W),ac=a.q(o,"arrowleft",e,W),Xb=a.q(o,"arrowright",e,W),Gb=a.q(o,"thumbnavigator",e,W),jc=a.e(z),ic=a.f(z),S,X=[],sc=a.Z(z);a.c(sc,function(b){b.tagName=="DIV"&&!a.w(b,"u")&&X.push(b)});var p=-1,wb,sb,s=X.length,J=k.$SlideWidth||jc,H=k.$SlideHeight||ic,Tb=k.$SlideSpacing,zb=J+Tb,Ab=H+Tb,Yb=ib&1?zb:Ab,x=b.min(k.$DisplayPieces,s),jb,w,K,yb,G,P=[],Mb,Ob,Lb,cc,zc,R,Sb=k.$PauseOnHover,Rb=k.$SlideDuration,qb,eb,hb,Nb=x<s,T=Nb?k.$Loop:0,O,U,Z=1,Q,I,V,tb=0,ub=0,E,cb,gb,Eb,y,ab,B,Pb=new mc,mb;R=k.$AutoPlay;i.ob=dc;gc();o["jssor-slider"]=c;a.y(z,a.y(z)||0);a.t(z,"absolute");jb=a.A(z);a.lb(a.P(z),jb,z);if(fb){cc=fb.$ShowLink;qb=fb.$Class;eb=x==1&&s>1&&qb&&(!a.Nb()||a.cb()>=8)}hb=eb||x>=s||!(T&1)?0:k.$ParkingPosition;O=(x>1||hb?ib:-1)&k.$DragOrientation;var vb=z,C=[],A,N,Cb="mousedown",nb="mousemove",Fb="mouseup",lb,D,pb,Hb,rb;if(g.navigator.msPointerEnabled){Cb="MSPointerDown";nb="MSPointerMove";Fb="MSPointerUp";lb="MSPointerCancel";if(O){var Bb="none";if(O==1)Bb="pan-y";else if(O==2)Bb="pan-x";a.Oe(vb.style,"-ms-touch-action",Bb)}}else if("ontouchstart"in g||"createTouch"in f){G=c;Cb="touchstart";nb="touchmove";Fb="touchend";lb="touchcancel"}ab=new wc;if(eb)A=new qb(Pb,J,H,fb,G);a.v(jb,ab.sb);a.db(z,"hidden");N=Vb();a.Ub(N,"backgroundColor","#000");a.bc(N,0);a.lb(vb,N,vb.firstChild);for(var ob=0;ob<X.length;ob++){var uc=X[ob],bc=new vc(uc,ob);C.push(bc)}a.D(db);Eb=new xc;B=new lc(Eb,ab);if(O){a.g(z,Cb,rc);a.g(f,Fb,Db);lb&&a.g(f,lb,Db)}Sb&=G?2:1;if(Jb&&Y){Mb=new Y.$Class(Jb,Y);P.push(Mb)}if(L&&ac&&Xb){Ob=new L.$Class(ac,Xb,L);P.push(Ob)}if(Gb&&F){F.$StartIndex=k.$StartIndex;Lb=new F.$Class(Gb,F);P.push(Lb)}a.c(P,function(a){a.Eb(s,C,db);a.$On(q.tb,hc)});i.$SetScaleWidth(i.$GetOriginalWidth());a.g(o,"mouseout",fc);a.g(o,"mouseover",ec);xb();k.$ArrowKeyNavigation&&a.g(f,"keydown",function(a){if(a.keyCode==r.Ee)kb(-1);else a.keyCode==r.De&&kb(1)});B.nb(k.$StartIndex,k.$StartIndex,0)}n.$EVT_CLICK=21;n.$EVT_DRAG_START=22;n.$EVT_DRAG_END=23;n.$EVT_SWIPE_START=24;n.$EVT_SWIPE_END=25;n.$EVT_LOAD_START=26;n.$EVT_LOAD_END=27;n.$EVT_POSITION_CHANGE=202;n.$EVT_PARK=203;n.$EVT_SLIDESHOW_START=206;n.$EVT_SLIDESHOW_END=207;n.$EVT_PROGRESS_CHANGE=208;n.$EVT_STATE_CHANGE=209;n.$EVT_ROLLBACK_START=210;n.$EVT_ROLLBACK_END=211;g.$JssorSlider$=s=n};var q={tb:1};g.$JssorBulletNavigator$=function(f,D){var h=this;m.call(h);f=a.E(f);var t,u,s,r,l=0,g,n,k,y,z,j,i,p,o,C=[],A=[];function x(a){a!=-1&&A[a].Ec(a==l)}function v(a){h.h(q.tb,a*n)}h.$Elmt=f;h.ec=function(a){if(a!=r){var d=l,c=b.floor(a/n);l=c;r=a;x(d);x(c)}};h.dc=function(b){a.p(f,b)};var B;h.Lb=function(){if(!B||g.$Scale==d){g.$AutoCenter&1&&a.l(f,(a.e(a.P(f))-u)/2);g.$AutoCenter&2&&a.k(f,(a.f(a.P(f))-s)/2);B=c}};var w;h.Eb=function(D){if(!w){t=b.ceil(D/n);l=0;var q=p+y,r=o+z,m=b.ceil(t/k)-1;u=p+q*(!j?m:k-1);s=o+r*(j?m:k-1);a.e(f,u);a.f(f,s);for(var d=0;d<t;d++){var B=a.Te();a.xe(B,d+1);var h=a.Fc(i,"NumberTemplate",B,c);a.t(h,"absolute");var x=d%(m+1);a.l(h,!j?q*x:d%k*q);a.k(h,j?r*x:b.floor(d/(m+1))*r);a.v(f,h);C[d]=h;g.$ActionMode&1&&a.g(h,"click",a.o(e,v,d));g.$ActionMode&2&&a.g(h,"mouseover",a.o(e,v,d));A[d]=a.ub(h)}w=c}};h.ob=g=a.i({$SpacingX:0,$SpacingY:0,$Orientation:1,$ActionMode:1},D);i=a.q(f,"prototype");p=a.e(i);o=a.f(i);a.hb(f,i);n=g.$Steps||1;k=g.$Lanes||1;y=g.$SpacingX;z=g.$SpacingY;j=g.$Orientation-1};g.$JssorArrowNavigator$=function(b,g,s){var f=this;m.call(f);var h,j,p=a.P(b),o=a.e(b),l=a.f(b);function k(a){f.h(q.tb,a,c)}f.ec=function(b,a,c){if(c);};f.dc=function(c){a.p(b,c);a.p(g,c)};var r;f.Lb=function(){if(!r||h.$Scale==d){var f=a.e(p),e=a.f(p);if(h.$AutoCenter&1){a.l(b,(f-o)/2);a.l(g,(f-o)/2)}if(h.$AutoCenter&2){a.k(b,(e-l)/2);a.k(g,(e-l)/2)}r=c}};var n;f.Eb=function(d){if(!n){a.g(b,"click",a.o(e,k,-j));a.g(g,"click",a.o(e,k,j));a.ub(b);a.ub(g);n=c}};f.ob=h=a.i({$Steps:1},s);j=h.$Steps};g.$JssorThumbnailNavigator$=function(i,A){var h=this,x,l,e,u=[],y,w,f,n,o,t,r,k,p,g,j;m.call(h);i=a.E(i);function z(n,d){var g=this,b,m,k;function o(){m.Ec(l==d)}function i(){if(!p.$LastDragSucceded()){var a=(f-d%f)%f,b=p.Pc((d+a)/f),c=b*f-a;h.h(q.tb,c)}}g.T=d;g.hc=o;k=n.kd||n.Uc||a.M();g.sb=b=a.Fc(j,"ThumbnailTemplate",k,c);m=a.ub(b);e.$ActionMode&1&&a.g(b,"click",i);e.$ActionMode&2&&a.g(b,"mouseover",i)}h.ec=function(c,d,e){var a=l;l=c;a!=-1&&u[a].hc();u[c].hc();!e&&p.$PlayTo(p.Pc(b.floor(d/f)))};h.dc=function(b){a.p(i,b)};h.Lb=a.U;var v;h.Eb=function(F,D){if(!v){x=F;b.ceil(x/f);l=-1;k=b.min(k,D.length);var h=e.$Orientation&1,q=t+(t+n)*(f-1)*(1-h),m=r+(r+o)*(f-1)*h,C=q+(q+n)*(k-1)*h,A=m+(m+o)*(k-1)*(1-h);a.t(g,"absolute");a.db(g,"hidden");e.$AutoCenter&1&&a.l(g,(y-C)/2);e.$AutoCenter&2&&a.k(g,(w-A)/2);a.e(g,C);a.f(g,A);var j=[];a.c(D,function(l,e){var i=new z(l,e),d=i.sb,c=b.floor(e/f),k=e%f;a.l(d,(t+n)*k*(1-h));a.k(d,(r+o)*k*h);if(!j[c]){j[c]=a.M();a.v(g,j[c])}a.v(j[c],d);u.push(i)});var E=a.i({$AutoPlay:d,$NaviQuitDrag:d,$SlideWidth:q,$SlideHeight:m,$SlideSpacing:n*h+o*(1-h),$MinDragOffsetToSlide:12,$SlideDuration:200,$PauseOnHover:1,$PlayOrientation:e.$Orientation,$DragOrientation:e.$DisableDrag?0:e.$Orientation},e);p=new s(i,E);v=c}};h.ob=e=a.i({$SpacingX:3,$SpacingY:3,$DisplayPieces:1,$Orientation:1,$AutoCenter:3,$ActionMode:1},A);y=a.e(i);w=a.f(i);g=a.q(i,"slides");j=a.q(g,"prototype");t=a.e(j);r=a.f(j);a.hb(g,j);f=e.$Lanes||1;n=e.$SpacingX;o=e.$SpacingY;k=e.$DisplayPieces};function t(){j.call(this,0,0);this.gc=a.U}g.$JssorCaptionSlider$=function(p,k,g){var d=this,h,f=k.$CaptionTransitions,o={ab:"t",$Delay:"d",$Duration:"du",$ScaleHorizontal:"x",$ScaleVertical:"y",$Rotate:"r",$Zoom:"z",$Opacity:"f",J:"b"},e={L:function(b,a){if(!isNaN(a.K))b=a.K;else b*=a.Vd;return b},$Opacity:function(b,a){return this.L(b-1,a)}};e.$Zoom=e.$Opacity;j.call(d,0,0);function m(r,n){var l=[],i,j=[],c=[];function h(c,d){var b={};a.c(o,function(g,h){var e=a.w(c,g+(d||""));if(e){var f={};if(g=="t")f.K=e;else if(e.indexOf("%")+1)f.Vd=a.uc(e)/100;else f.K=a.uc(e);b[h]=f}});return b}function p(){return f[b.floor(b.random()*f.length)]}function d(g){var h;if(g=="*")h=p();else if(g){var e=f[a.Xc(g)]||f[g];if(a.ac(e)){if(g!=i){i=g;c[g]=0;j[g]=e[b.floor(b.random()*e.length)]}else c[g]++;e=j[g];if(a.ac(e)){e=e.length&&e[c[g]%e.length];if(a.ac(e))e=e[b.floor(b.random()*e.length)]}}h=e;if(a.sc(h))h=d(h)}return h}var q=a.Z(r);a.c(q,function(b){var c=[];c.$Elmt=b;var f=a.w(b,"u")=="caption";a.c(g?[0,3]:[2],function(o,p){if(f){var l,i;if(o!=2||!a.w(b,"t3")){i=h(b,o);if(o==2&&!i.ab){i.$Delay=i.$Delay||{K:0};i=a.i(h(b,0),i)}}if(i&&i.ab){l=d(i.ab.K);if(l){var j=a.i({$Delay:0,$ScaleHorizontal:1,$ScaleVertical:1},l);a.c(i,function(c,a){var b=(e[a]||e.L).apply(e,[j[a],i[a]]);if(!isNaN(b))j[a]=b});if(!p)if(i.J)j.J=i.J.K||0;else if((g?k.$PlayInMode:k.$PlayOutMode)&2)j.J=0}}c.push(j)}if(n%2&&!p)c.Zc=m(b,n+1)});l.push(c)});return l}function n(E,d,F){var h={$Easing:d.$Easing,$Round:d.$Round,$During:d.$During,$Reverse:g&&!F,Rd:c},k=E,y=a.P(E),o=a.e(k),n=a.f(k),u=a.e(y),t=a.f(y),f={},l={},m=d.$ScaleClip||1;if(d.$Opacity)f.$Opacity=2-d.$Opacity;h.W=o;h.X=n;if(d.$Zoom||d.$Rotate){f.$Zoom=d.$Zoom?d.$Zoom-1:1;if(a.rb()||a.cc())f.$Zoom=b.min(f.$Zoom,2);l.$Zoom=1;var s=d.$Rotate||0;if(s==c)s=1;f.$Rotate=s*360;l.$Rotate=0}else if(d.$Clip){var z={$Top:0,$Right:o,$Bottom:n,$Left:0},D=a.i({},z),e=D.F={},C=d.$Clip&4,v=d.$Clip&8,A=d.$Clip&1,x=d.$Clip&2;if(C&&v){e.$Top=n/2*m;e.$Bottom=-e.$Top}else if(C)e.$Bottom=-n*m;else if(v)e.$Top=n*m;if(A&&x){e.$Left=o/2*m;e.$Right=-e.$Left}else if(A)e.$Right=-o*m;else if(x)e.$Left=o*m;h.$Move=d.$Move;f.$Clip=D;l.$Clip=z}var p=d.$FlyDirection,q=0,r=0,w=d.$ScaleHorizontal,B=d.$ScaleVertical;if(i.Ce(p))q-=u*w;else if(i.Be(p))q+=u*w;if(i.Ge(p))r-=t*B;else if(i.Fe(p))r+=t*B;if(q||r||h.$Move){f.$Left=q+a.l(k);f.$Top=r+a.k(k)}var G=d.$Duration;l=a.i(l,a.Sd(k,f));h.lc=a.Td();return new j(d.$Delay,G,h,k,l,f)}function l(b,c){a.c(c,function(c){var f,i=c.$Elmt,e=c[0],j=c[1];if(e){f=n(i,e);b=f.xb(a.Ob(e.J)?b:e.J,1)}b=l(b,c.Zc);if(j){var g=n(i,j,1);g.xb(b,1);d.G(g);h.G(g)}f&&d.G(f)});return b}d.gc=function(){d.C(d.O()*(g||0));h.Db()};h=new j(0,0);l(0,m(p,1))}})(window,document,Math,null,true,false)