!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(l){function e(){}function u(e,t){m.ev.on(n+e+b,t)}function d(e,t,n,o){var i=document.createElement("div");return i.className="mfp-"+e,n&&(i.innerHTML=n),o?t&&t.appendChild(i):(i=l(i),t&&i.appendTo(t)),i}function p(e,t){m.ev.triggerHandler(n+e,t),m.st.callbacks&&(e=e.charAt(0).toLowerCase()+e.slice(1),m.st.callbacks[e]&&m.st.callbacks[e].apply(m,l.isArray(t)?t:[t]))}function f(e){return e===t&&m.currTemplate.closeBtn||(m.currTemplate.closeBtn=l(m.st.closeMarkup.replace("%title%",m.st.tClose)),t=e),m.currTemplate.closeBtn}function r(){l.magnificPopup.instance||((m=new e).init(),l.magnificPopup.instance=m)}var m,o,h,i,g,t,c="Close",y="BeforeClose",v="MarkupParse",w="Open",a="Change",n="mfp",b="."+n,C="mfp-ready",s="mfp-removing",k="mfp-prevent-close",x=!!window.jQuery,I=l(window);e.prototype={constructor:e,init:function(){var e=navigator.appVersion;m.isLowIE=m.isIE8=document.all&&!document.addEventListener,m.isAndroid=/android/gi.test(e),m.isIOS=/iphone|ipad|ipod/gi.test(e),m.supportsTransition=function(){var e=document.createElement("p").style,t=["ms","O","Moz","Webkit"];if(void 0!==e.transition)return!0;for(;t.length;)if(t.pop()+"Transition"in e)return!0;return!1}(),m.probablyMobile=m.isAndroid||m.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),h=l(document),m.popupsCache={}},open:function(e){if(!1===e.isObj){m.items=e.items.toArray(),m.index=0;for(var t,n=e.items,o=0;o<n.length;o++)if((t=n[o]).parsed&&(t=t.el[0]),t===e.el[0]){m.index=o;break}}else m.items=l.isArray(e.items)?e.items:[e.items],m.index=e.index||0;if(!m.isOpen){m.types=[],g="",e.mainEl&&e.mainEl.length?m.ev=e.mainEl.eq(0):m.ev=h,e.key?(m.popupsCache[e.key]||(m.popupsCache[e.key]={}),m.currTemplate=m.popupsCache[e.key]):m.currTemplate={},m.st=l.extend(!0,{},l.magnificPopup.defaults,e),m.fixedContentPos="auto"===m.st.fixedContentPos?!m.probablyMobile:m.st.fixedContentPos,m.st.modal&&(m.st.closeOnContentClick=!1,m.st.closeOnBgClick=!1,m.st.showCloseBtn=!1,m.st.enableEscapeKey=!1),m.bgOverlay||(m.bgOverlay=d("bg").on("click"+b,function(){m.close()}),m.wrap=d("wrap").attr("tabindex",-1).on("click"+b,function(e){m._checkIfClose(e.target)&&m.close()}),m.container=d("container",m.wrap)),m.contentContainer=d("content"),m.st.preloader&&(m.preloader=d("preloader",m.container,m.st.tLoading));var i=l.magnificPopup.modules;for(o=0;o<i.length;o++){var r=(r=i[o]).charAt(0).toUpperCase()+r.slice(1);m["init"+r].call(m)}p("BeforeOpen"),m.st.showCloseBtn&&(m.st.closeBtnInside?(u(v,function(e,t,n,o){n.close_replaceWith=f(o.type)}),g+=" mfp-close-btn-in"):m.wrap.append(f())),m.st.alignTop&&(g+=" mfp-align-top"),m.fixedContentPos?m.wrap.css({overflow:m.st.overflowY,overflowX:"hidden",overflowY:m.st.overflowY}):m.wrap.css({top:I.scrollTop(),position:"absolute"}),!1!==m.st.fixedBgPos&&("auto"!==m.st.fixedBgPos||m.fixedContentPos)||m.bgOverlay.css({height:h.height(),position:"absolute"}),m.st.enableEscapeKey&&h.on("keyup"+b,function(e){27===e.keyCode&&m.close()}),I.on("resize"+b,function(){m.updateSize()}),m.st.closeOnContentClick||(g+=" mfp-auto-cursor"),g&&m.wrap.addClass(g);var a=m.wH=I.height(),s={};m.fixedContentPos&&m._hasScrollBar(a)&&((c=m._getScrollbarSize())&&(s.marginRight=c)),m.fixedContentPos&&(m.isIE7?l("body, html").css("overflow","hidden"):s.overflow="hidden");var c=m.st.mainClass;return m.isIE7&&(c+=" mfp-ie7"),c&&m._addClassToMFP(c),m.updateItemHTML(),p("BuildControls"),l("html").css(s),m.bgOverlay.add(m.wrap).prependTo(m.st.prependTo||l(document.body)),m._lastFocusedEl=document.activeElement,setTimeout(function(){m.content?(m._addClassToMFP(C),m._setFocus()):m.bgOverlay.addClass(C),h.on("focusin"+b,m._onFocusIn)},16),m.isOpen=!0,m.updateSize(a),p(w),e}m.updateItemHTML()},close:function(){m.isOpen&&(p(y),m.isOpen=!1,m.st.removalDelay&&!m.isLowIE&&m.supportsTransition?(m._addClassToMFP(s),setTimeout(function(){m._close()},m.st.removalDelay)):m._close())},_close:function(){p(c);var e=s+" "+C+" ";m.bgOverlay.detach(),m.wrap.detach(),m.container.empty(),m.st.mainClass&&(e+=m.st.mainClass+" "),m._removeClassFromMFP(e),m.fixedContentPos&&(e={marginRight:""},m.isIE7?l("body, html").css("overflow",""):e.overflow="",l("html").css(e)),h.off("keyup.mfp focusin"+b),m.ev.off(b),m.wrap.attr("class","mfp-wrap").removeAttr("style"),m.bgOverlay.attr("class","mfp-bg"),m.container.attr("class","mfp-container"),!m.st.showCloseBtn||m.st.closeBtnInside&&!0!==m.currTemplate[m.currItem.type]||m.currTemplate.closeBtn&&m.currTemplate.closeBtn.detach(),m.st.autoFocusLast&&m._lastFocusedEl&&l(m._lastFocusedEl).focus(),m.currItem=null,m.content=null,m.currTemplate=null,m.prevHeight=0,p("AfterClose")},updateSize:function(e){var t;m.isIOS?(t=document.documentElement.clientWidth/window.innerWidth,t=window.innerHeight*t,m.wrap.css("height",t),m.wH=t):m.wH=e||I.height(),m.fixedContentPos||m.wrap.css("height",m.wH),p("Resize")},updateItemHTML:function(){var e=m.items[m.index];m.contentContainer.detach(),m.content&&m.content.detach(),e.parsed||(e=m.parseEl(m.index));var t=e.type;p("BeforeChange",[m.currItem?m.currItem.type:"",t]),m.currItem=e,m.currTemplate[t]||(n=!!m.st[t]&&m.st[t].markup,p("FirstMarkupParse",n),m.currTemplate[t]=!n||l(n)),i&&i!==e.type&&m.container.removeClass("mfp-"+i+"-holder");var n=m["get"+t.charAt(0).toUpperCase()+t.slice(1)](e,m.currTemplate[t]);m.appendContent(n,t),e.preloaded=!0,p(a,e),i=e.type,m.container.prepend(m.contentContainer),p("AfterChange")},appendContent:function(e,t){(m.content=e)?m.st.showCloseBtn&&m.st.closeBtnInside&&!0===m.currTemplate[t]?m.content.find(".mfp-close").length||m.content.append(f()):m.content=e:m.content="",p("BeforeAppend"),m.container.addClass("mfp-"+t+"-holder"),m.contentContainer.append(m.content)},parseEl:function(e){var t,n=m.items[e];if((n=n.tagName?{el:l(n)}:(t=n.type,{data:n,src:n.src})).el){for(var o=m.types,i=0;i<o.length;i++)if(n.el.hasClass("mfp-"+o[i])){t=o[i];break}n.src=n.el.attr("data-mfp-src"),n.src||(n.src=n.el.attr("href"))}return n.type=t||m.st.type||"inline",n.index=e,n.parsed=!0,m.items[e]=n,p("ElementParse",n),m.items[e]},addGroup:function(t,n){function e(e){e.mfpEl=this,m._openClick(e,t,n)}var o="click.magnificPopup";(n=n||{}).mainEl=t,n.items?(n.isObj=!0,t.off(o).on(o,e)):(n.isObj=!1,n.delegate?t.off(o).on(o,n.delegate,e):(n.items=t).off(o).on(o,e))},_openClick:function(e,t,n){if((void 0!==n.midClick?n:l.magnificPopup.defaults).midClick||!(2===e.which||e.ctrlKey||e.metaKey||e.altKey||e.shiftKey)){var o=(void 0!==n.disableOn?n:l.magnificPopup.defaults).disableOn;if(o)if(l.isFunction(o)){if(!o.call(m))return!0}else if(I.width()<o)return!0;e.type&&(e.preventDefault(),m.isOpen&&e.stopPropagation()),n.el=l(e.mfpEl),n.delegate&&(n.items=t.find(n.delegate)),m.open(n)}},updateStatus:function(e,t){var n;m.preloader&&(o!==e&&m.container.removeClass("mfp-s-"+o),t||"loading"!==e||(t=m.st.tLoading),p("UpdateStatus",n={status:e,text:t}),e=n.status,t=n.text,m.preloader.html(t),m.preloader.find("a").on("click",function(e){e.stopImmediatePropagation()}),m.container.addClass("mfp-s-"+e),o=e)},_checkIfClose:function(e){if(!l(e).hasClass(k)){var t=m.st.closeOnContentClick,n=m.st.closeOnBgClick;if(t&&n)return!0;if(!m.content||l(e).hasClass("mfp-close")||m.preloader&&e===m.preloader[0])return!0;if(e===m.content[0]||l.contains(m.content[0],e)){if(t)return!0}else if(n&&l.contains(document,e))return!0;return!1}},_addClassToMFP:function(e){m.bgOverlay.addClass(e),m.wrap.addClass(e)},_removeClassFromMFP:function(e){this.bgOverlay.removeClass(e),m.wrap.removeClass(e)},_hasScrollBar:function(e){return(m.isIE7?h.height():document.body.scrollHeight)>(e||I.height())},_setFocus:function(){(m.st.focus?m.content.find(m.st.focus).eq(0):m.wrap).focus()},_onFocusIn:function(e){return e.target===m.wrap[0]||l.contains(m.wrap[0],e.target)?void 0:(m._setFocus(),!1)},_parseMarkup:function(i,e,t){var r;t.data&&(e=l.extend(t.data,e)),p(v,[i,e,t]),l.each(e,function(e,t){return void 0===t||!1===t||void(1<(r=e.split("_")).length?0<(n=i.find(b+"-"+r[0])).length&&("replaceWith"===(o=r[1])?n[0]!==t[0]&&n.replaceWith(t):"img"===o?n.is("img")?n.attr("src",t):n.replaceWith(l("<img>").attr("src",t).attr("class",n.attr("class"))):n.attr(r[1],t)):i.find(b+"-"+e).html(t));var n,o})},_getScrollbarSize:function(){var e;return void 0===m.scrollbarSize&&((e=document.createElement("div")).style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(e),m.scrollbarSize=e.offsetWidth-e.clientWidth,document.body.removeChild(e)),m.scrollbarSize}},l.magnificPopup={instance:null,proto:e.prototype,modules:[],open:function(e,t){return r(),(e=e?l.extend(!0,{},e):{}).isObj=!0,e.index=t||0,this.instance.open(e)},close:function(){return l.magnificPopup.instance&&l.magnificPopup.instance.close()},registerModule:function(e,t){t.options&&(l.magnificPopup.defaults[e]=t.options),l.extend(this.proto,t.proto),this.modules.push(e)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},l.fn.magnificPopup=function(e){r();var t,n,o,i=l(this);return"string"==typeof e?"open"===e?(t=x?i.data("magnificPopup"):i[0].magnificPopup,n=parseInt(arguments[1],10)||0,o=t.items?t.items[n]:(o=i,t.delegate&&(o=o.find(t.delegate)),o.eq(n)),m._openClick({mfpEl:o},i,t)):m.isOpen&&m[e].apply(m,Array.prototype.slice.call(arguments,1)):(e=l.extend(!0,{},e),x?i.data("magnificPopup",e):i[0].magnificPopup=e,m.addGroup(i,e)),i};function T(){E&&(S.after(E.addClass(j)).detach(),E=null)}var j,S,E,O="inline";l.magnificPopup.registerModule(O,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){m.types.push(O),u(c+"."+O,function(){T()})},getInline:function(e,t){if(T(),e.src){var n,o=m.st.inline,i=l(e.src);return i.length?((n=i[0].parentNode)&&n.tagName&&(S||(j=o.hiddenClass,S=d(j),j="mfp-"+j),E=i.after(S).detach().removeClass(j)),m.updateStatus("ready")):(m.updateStatus("error",o.tNotFound),i=l("<div>")),e.inlineElement=i}return m.updateStatus("ready"),m._parseMarkup(t,{},e),t}}});function _(){A&&l(document.body).removeClass(A)}function P(){_(),m.req&&m.req.abort()}var A,M="ajax";l.magnificPopup.registerModule(M,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){m.types.push(M),A=m.st.ajax.cursor,u(c+"."+M,P),u("BeforeChange."+M,P)},getAjax:function(o){A&&l(document.body).addClass(A),m.updateStatus("loading");var e=l.extend({url:o.src,success:function(e,t,n){n={data:e,xhr:n};p("ParseAjax",n),m.appendContent(l(n.data),M),o.finished=!0,_(),m._setFocus(),setTimeout(function(){m.wrap.addClass(C)},16),m.updateStatus("ready"),p("AjaxContentAdded")},error:function(){_(),o.finished=o.loadError=!0,m.updateStatus("error",m.st.ajax.tError.replace("%url%",o.src))}},m.st.ajax.settings);return m.req=l.ajax(e),""}}});var z;l.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var e=m.st.image,t=".image";m.types.push("image"),u(w+t,function(){"image"===m.currItem.type&&e.cursor&&l(document.body).addClass(e.cursor)}),u(c+t,function(){e.cursor&&l(document.body).removeClass(e.cursor),I.off("resize"+b)}),u("Resize"+t,m.resizeImage),m.isLowIE&&u("AfterChange",m.resizeImage)},resizeImage:function(){var e,t=m.currItem;t&&t.img&&m.st.image.verticalFit&&(e=0,m.isLowIE&&(e=parseInt(t.img.css("padding-top"),10)+parseInt(t.img.css("padding-bottom"),10)),t.img.css("max-height",m.wH-e))},_onImageHasSize:function(e){e.img&&(e.hasSize=!0,z&&clearInterval(z),e.isCheckingImgSize=!1,p("ImageHasSize",e),e.imgHidden&&(m.content&&m.content.removeClass("mfp-loading"),e.imgHidden=!1))},findImageSize:function(t){var n=0,o=t.img[0],i=function(e){z&&clearInterval(z),z=setInterval(function(){return 0<o.naturalWidth?void m._onImageHasSize(t):(200<n&&clearInterval(z),void(3===++n?i(10):40===n?i(50):100===n&&i(500)))},e)};i(1)},getImage:function(e,t){var n,o=0,i=function(){e&&(e.img[0].complete?(e.img.off(".mfploader"),e===m.currItem&&(m._onImageHasSize(e),m.updateStatus("ready")),e.hasSize=!0,e.loaded=!0,p("ImageLoadComplete")):++o<200?setTimeout(i,100):r())},r=function(){e&&(e.img.off(".mfploader"),e===m.currItem&&(m._onImageHasSize(e),m.updateStatus("error",a.tError.replace("%url%",e.src))),e.hasSize=!0,e.loaded=!0,e.loadError=!0)},a=m.st.image,s=t.find(".mfp-img");return s.length&&((n=document.createElement("img")).className="mfp-img",e.el&&e.el.find("img").length&&(n.alt=e.el.find("img").attr("alt")),e.img=l(n).on("load.mfploader",i).on("error.mfploader",r),n.src=e.src,s.is("img")&&(e.img=e.img.clone()),0<(n=e.img[0]).naturalWidth?e.hasSize=!0:n.width||(e.hasSize=!1)),m._parseMarkup(t,{title:function(e){if(e.data&&void 0!==e.data.title)return e.data.title;var t=m.st.image.titleSrc;if(t){if(l.isFunction(t))return t.call(m,e);if(e.el)return e.el.attr(t)||""}return""}(e),img_replaceWith:e.img},e),m.resizeImage(),e.hasSize?(z&&clearInterval(z),e.loadError?(t.addClass("mfp-loading"),m.updateStatus("error",a.tError.replace("%url%",e.src))):(t.removeClass("mfp-loading"),m.updateStatus("ready"))):(m.updateStatus("loading"),e.loading=!0,e.hasSize||(e.imgHidden=!0,t.addClass("mfp-loading"),m.findImageSize(e))),t}}});var N;l.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(e){return e.is("img")?e:e.find("img")}},proto:{initZoom:function(){var e,t,n,o,i,r,a=m.st.zoom,s=".zoom";a.enabled&&m.supportsTransition&&(o=a.duration,i=function(e){var t=e.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),n="all "+a.duration/1e3+"s "+a.easing,o={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},e="transition";return o["-webkit-"+e]=o["-moz-"+e]=o["-o-"+e]=o[e]=n,t.css(o),t},r=function(){m.content.css("visibility","visible")},u("BuildControls"+s,function(){m._allowZoom()&&(clearTimeout(t),m.content.css("visibility","hidden"),(e=m._getItemToZoom())?((n=i(e)).css(m._getOffset()),m.wrap.append(n),t=setTimeout(function(){n.css(m._getOffset(!0)),t=setTimeout(function(){r(),setTimeout(function(){n.remove(),e=n=null,p("ZoomAnimationEnded")},16)},o)},16)):r())}),u(y+s,function(){if(m._allowZoom()){if(clearTimeout(t),m.st.removalDelay=o,!e){if(!(e=m._getItemToZoom()))return;n=i(e)}n.css(m._getOffset(!0)),m.wrap.append(n),m.content.css("visibility","hidden"),setTimeout(function(){n.css(m._getOffset())},16)}}),u(c+s,function(){m._allowZoom()&&(r(),n&&n.remove(),e=null)}))},_allowZoom:function(){return"image"===m.currItem.type},_getItemToZoom:function(){return!!m.currItem.hasSize&&m.currItem.img},_getOffset:function(e){var t=e?m.currItem.img:m.st.zoom.opener(m.currItem.el||m.currItem),n=t.offset(),o=parseInt(t.css("padding-top"),10),e=parseInt(t.css("padding-bottom"),10);n.top-=l(window).scrollTop()-o;o={width:t.width(),height:(x?t.innerHeight():t[0].offsetHeight)-e-o};return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N?o["-moz-transform"]=o.transform="translate("+n.left+"px,"+n.top+"px)":(o.left=n.left,o.top=n.top),o}}});function L(e){var t;!m.currTemplate[B]||(t=m.currTemplate[B].find("iframe")).length&&(e||(t[0].src="//about:blank"),m.isIE8&&t.css("display",e?"block":"none"))}var B="iframe";l.magnificPopup.registerModule(B,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){m.types.push(B),u("BeforeChange",function(e,t,n){t!==n&&(t===B?L():n===B&&L(!0))}),u(c+"."+B,function(){L()})},getIframe:function(e,t){var n=e.src,o=m.st.iframe;l.each(o.patterns,function(){return-1<n.indexOf(this.index)?(this.id&&(n="string"==typeof this.id?n.substr(n.lastIndexOf(this.id)+this.id.length,n.length):this.id.call(this,n)),n=this.src.replace("%id%",n),!1):void 0});var i={};return o.srcAction&&(i[o.srcAction]=n),m._parseMarkup(t,i,e),m.updateStatus("ready"),t}}});function Q(e){var t=m.items.length;return t-1<e?e-t:e<0?t+e:e}function F(e,t,n){return e.replace(/%curr%/gi,t+1).replace(/%total%/gi,n)}l.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var r=m.st.gallery,e=".mfp-gallery";return m.direction=!0,!(!r||!r.enabled)&&(g+=" mfp-gallery",u(w+e,function(){r.navigateByImgClick&&m.wrap.on("click"+e,".mfp-img",function(){return 1<m.items.length?(m.next(),!1):void 0}),h.on("keydown"+e,function(e){37===e.keyCode?m.prev():39===e.keyCode&&m.next()})}),u("UpdateStatus"+e,function(e,t){t.text&&(t.text=F(t.text,m.currItem.index,m.items.length))}),u(v+e,function(e,t,n,o){var i=m.items.length;n.counter=1<i?F(r.tCounter,o.index,i):""}),u("BuildControls"+e,function(){var e,t;1<m.items.length&&r.arrows&&!m.arrowLeft&&(t=r.arrowMarkup,e=m.arrowLeft=l(t.replace(/%title%/gi,r.tPrev).replace(/%dir%/gi,"left")).addClass(k),t=m.arrowRight=l(t.replace(/%title%/gi,r.tNext).replace(/%dir%/gi,"right")).addClass(k),e.click(function(){m.prev()}),t.click(function(){m.next()}),m.container.append(e.add(t)))}),u(a+e,function(){m._preloadTimeout&&clearTimeout(m._preloadTimeout),m._preloadTimeout=setTimeout(function(){m.preloadNearbyImages(),m._preloadTimeout=null},16)}),void u(c+e,function(){h.off(e),m.wrap.off("click"+e),m.arrowRight=m.arrowLeft=null}))},next:function(){m.direction=!0,m.index=Q(m.index+1),m.updateItemHTML()},prev:function(){m.direction=!1,m.index=Q(m.index-1),m.updateItemHTML()},goTo:function(e){m.direction=e>=m.index,m.index=e,m.updateItemHTML()},preloadNearbyImages:function(){for(var e=m.st.gallery.preload,t=Math.min(e[0],m.items.length),n=Math.min(e[1],m.items.length),o=1;o<=(m.direction?n:t);o++)m._preloadItem(m.index+o);for(o=1;o<=(m.direction?t:n);o++)m._preloadItem(m.index-o)},_preloadItem:function(e){var t;e=Q(e),m.items[e].preloaded||((t=m.items[e]).parsed||(t=m.parseEl(e)),p("LazyLoad",t),"image"===t.type&&(t.img=l('<img class="mfp-img" />').on("load.mfploader",function(){t.hasSize=!0}).on("error.mfploader",function(){t.hasSize=!0,t.loadError=!0,p("LazyLoadError",t)}).attr("src",t.src)),t.preloaded=!0)}}});var q="retina";l.magnificPopup.registerModule(q,{options:{replaceSrc:function(e){return e.src.replace(/\.\w+$/,function(e){return"@2x"+e})},ratio:1},proto:{initRetina:function(){var n,o;1<window.devicePixelRatio&&(n=m.st.retina,o=n.ratio,1<(o=isNaN(o)?o():o)&&(u("ImageHasSize."+q,function(e,t){t.img.css({"max-width":t.img[0].naturalWidth/o,width:"100%"})}),u("ElementParse."+q,function(e,t){t.src=n.replaceSrc(t,o)})))}}}),r()}),function(r){"use strict";r.fn.fitVids=function(e){var t,n,i={customSelector:null,ignore:null};return document.getElementById("fit-vids-style")||(t=document.head||document.getElementsByTagName("head")[0],(n=document.createElement("div")).innerHTML='<p>x</p><style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>',t.appendChild(n.childNodes[1])),e&&r.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var o=".fitvidsignore";i.ignore&&(o=o+", "+i.ignore);e=r(this).find(e.join(","));(e=(e=e.not("object object")).not(o)).each(function(){var e,t,n=r(this);0<n.parents(o).length||"embed"===this.tagName.toLowerCase()&&n.parent("object").length||n.parent(".fluid-width-video-wrapper").length||(n.css("height")||n.css("width")||!isNaN(n.attr("height"))&&!isNaN(n.attr("width"))||(n.attr("height",9),n.attr("width",16)),e=("object"===this.tagName.toLowerCase()||n.attr("height")&&!isNaN(parseInt(n.attr("height"),10))?parseInt(n.attr("height"),10):n.height())/(isNaN(parseInt(n.attr("width"),10))?n.width():parseInt(n.attr("width"),10)),n.attr("name")||(t="fitvid"+r.fn.fitVids._count,n.attr("name",t),r.fn.fitVids._count++),n.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*e+"%"),n.removeAttr("height").removeAttr("width"))})})},r.fn.fitVids._count=0}(window.jQuery||window.Zepto),function(e){var t=e.separator||"&",l=!1!==e.spaces,n=!1!==e.prefix?!0===e.hash?"#":"?":"",r=!1!==e.numbers;jQuery.query=new function(){function s(e,t){return null!=e&&null!==e&&(!t||e.constructor==t)}function i(e){for(var t,n=/\[([^[]*)\]/g,o=/^([^[]+)(\[.*\])?$/.exec(e),e=o[1],i=[];t=n.exec(o[2]);)i.push(t[1]);return[e,i]}function o(e){var n=this;return n.keys={},e.queryObject?jQuery.each(e.get(),function(e,t){n.SET(e,t)}):n.parseNew.apply(n,arguments),n}var c=function(e,t,n){var o=t.shift();if("object"!=typeof e&&(e=null),""===o)if(s(e=e||[],Array))e.push(0==t.length?n:c(null,t.slice(0),n));else if(s(e,Object)){for(var i=0;null!=e[i++];);e[--i]=0==t.length?n:c(e[i],t.slice(0),n)}else(e=[]).push(0==t.length?n:c(null,t.slice(0),n));else if(o&&o.match(/^\s*[0-9]+\s*$/)){(e=e||[])[r=parseInt(o,10)]=0==t.length?n:c(e[r],t.slice(0),n)}else{if(!o)return n;var r=o.replace(/^\s*|\s*$/g,"");if(s(e=e||{},Array)){for(var a={},i=0;i<e.length;++i)a[i]=e[i];e=a}e[r]=0==t.length?n:c(e[r],t.slice(0),n)}return e};return o.prototype={queryObject:!0,parseNew:function(){var n=this;return n.keys={},jQuery.each(arguments,function(){var e=""+this;e=(e=e.replace(/^[?#]/,"")).replace(/[;&]$/,""),l&&(e=e.replace(/[+]/g," ")),jQuery.each(e.split(/[&;]/),function(){var e=decodeURIComponent(this.split("=")[0]||""),t=decodeURIComponent(this.split("=")[1]||"");e&&(r&&(/^[+-]?[0-9]+\.[0-9]*$/.test(t)?t=parseFloat(t):/^[+-]?[1-9][0-9]*$/.test(t)&&(t=parseInt(t,10))),t=!t&&0!==t||t,n.SET(e,t))})}),n},has:function(e,t){e=this.get(e);return s(e,t)},GET:function(e){if(!s(e))return this.keys;for(var t=i(e),e=t[0],n=t[1],o=this.keys[e];null!=o&&0!=n.length;)o=o[n.shift()];return"number"==typeof o?o:o||""},get:function(e){e=this.GET(e);return s(e,Object)?jQuery.extend(!0,{},e):s(e,Array)?e.slice(0):e},SET:function(e,t){var n=s(t)?t:null,o=i(e),t=o[0],e=o[1],o=this.keys[t];return this.keys[t]=c(o,e.slice(0),n),this},set:function(e,t){return this.copy().SET(e,t)},REMOVE:function(e,t){if(t){var n=this.GET(e);if(s(n,Array)){for(tval in n)n[tval]=n[tval].toString();var o=$.inArray(t,n);if(!(0<=o))return;e=(e=n.splice(o,1))[o]}else if(t!=n)return}return this.SET(e,null).COMPACT()},remove:function(e,t){return this.copy().REMOVE(e,t)},EMPTY:function(){var n=this;return jQuery.each(n.keys,function(e,t){delete n.keys[e]}),n},load:function(e){var t=e.replace(/^.*?[#](.+?)(?:\?.+)?$/,"$1"),n=e.replace(/^.*?[?](.+?)(?:#.+)?$/,"$1");return new o(e.length==n.length?"":n,e.length==t.length?"":t)},empty:function(){return this.copy().EMPTY()},copy:function(){return new o(this)},COMPACT:function(){return this.keys=function o(e){var i="object"==typeof e?s(e,Array)?[]:{}:e;return"object"==typeof e&&jQuery.each(e,function(e,t){return!s(t)||(n=i,t=o(t),void(s(n,Array)?n.push(t):n[e]=t));var n}),i}(this.keys),this},compact:function(){return this.copy().COMPACT()},toString:function(){function i(e){return e+="",l&&(e=e.replace(/ /g,"+")),encodeURIComponent(e)}var e=[],r=[],a=function(e,t){function o(e){return(t&&""!=t?[t,"[",e,"]"]:[e]).join("")}jQuery.each(e,function(e,t){var n;"object"==typeof t?a(t,o(e)):(n=r,e=o(e),s(t=t)&&!1!==t&&(e=[i(e)],!0!==t&&(e.push("="),e.push(i(t))),n.push(e.join(""))))})};return a(this.keys),0<r.length&&e.push(n),e.push(r.join(t)),e.join("")}},new o(location.search,location.hash)}}(jQuery.query||{}),jQuery(document).ready(function(e){e(".accordions").length&&e(".accordions .accordion .accordion-handle").click(function(){e(this).parent(".accordion").toggleClass("open")})}),jQuery(document).ready(function(e){e(".open-alum-link").magnificPopup({type:"inline",midClick:!0}),e(".alum-add-story").on("click",function(){e(".alum-add-story-form").toggle(),e(".alum-add-story-form").is(":visible")?e(".alum-add-story").html("Hide Form"):e(".alum-add-story").html("Add My Story")}),e(".alum-back").on("click",function(){location.href="/alumni/"}),e(".alum-reset").on("click",function(){location.href="/rconnections"}),e(".year-more").on("click",function(){e(".year-more-details").show(),e(".year-more").hide()})}),jQuery(document).ready(function(t){function n(){t(".area-faculty .photo").height(t(".area-faculty .photo").width())}var o,i,e,r;t(".back-to-areas").click(function(){location.href="/areas-of-study"}),t(".area .tab-nav li").on("click",function(){t(".area .tab-nav li.active").removeClass("active");var e=t(this).attr("class");t(this).addClass("active"),t(".area .tab-content:visible").removeClass("active"),t(".area .tab-content."+e).addClass("active"),n()}),0<t(".area").length&&(o=t(".area").offset(),t(window).on("resize",function(){o=t(".area").offset(),n()}),t(window).on("scroll",function(){var e=t(window).scrollTop();768<=t(window).innerWidth()&&(e>o.top?t(".area .tab-nav").addClass("scrolled"):t(".area .tab-nav").removeClass("scrolled"))}),n()),0<t(".area-listing").length&&(i=t(".area-listing"),e=t(".area-filter select"),r=t(".area-legend"),e.on("change",function(){i.find("li").show();var e=t(this).val();"all"==t(this).val()?(r.find(".mini-legend").show(),r.find(".term").hide()):(i.find("li:not(."+e+")").each(function(){t(this).hide()}),r.find(".term:not(."+e+")").hide(),r.find(".term."+e).show(),r.find(".mini-legend").hide())}))}),jQuery(document).ready(function(e){e(".back-to-faculty-list").click(function(){location.href="/faculty"}),e(".back-to-areas").click(function(){location.href="/areas-of-study"})}),jQuery(document).ready(function(t){t(".call-to-action").length&&t(window).scroll(function(){var e=t(window).scrollTop();(t(".two-column").length?t(".two-column"):t(".content")).offset().top<e?t("body").addClass("cta-active"):t("body").removeClass("cta-active"),parseInt(t(document).height())-parseInt(t(window).height())-140<e&&t("body").removeClass("cta-active")})}),jQuery(document).ready(function(n){0<n(".two-column").length&&(n(".two-column").offset(),n(window).on("resize",function(){n(".two-column").offset()}),n(window).on("scroll",function(){var e=n(".two-column").offset(),t=n(window).scrollTop();768<=n(window).innerWidth()&&(t>e.top?n(".two-column .sidebar").addClass("scrolled"):n(".two-column .sidebar").removeClass("scrolled"))}))});var jaaulde=window.jaaulde||{};jaaulde.utils=jaaulde.utils||{},jaaulde.utils.cookies=function(){var o={expiresAt:null,path:"/",domain:null,secure:!1},t=function(e){var t,n;return"object"!=typeof e||null===e?t=o:(t={expiresAt:o.expiresAt,path:o.path,domain:o.domain,secure:o.secure},"object"==typeof e.expiresAt&&e.expiresAt instanceof Date?t.expiresAt=e.expiresAt:"number"==typeof e.hoursToLive&&0!==e.hoursToLive&&((n=new Date).setTime(n.getTime()+60*e.hoursToLive*60*1e3),t.expiresAt=n),"string"==typeof e.path&&""!==e.path&&(t.path=e.path),"string"==typeof e.domain&&""!==e.domain&&(t.domain=e.domain),!0===e.secure&&(t.secure=e.secure)),t},i=function(e){return("object"==typeof(e=t(e)).expiresAt&&e.expiresAt instanceof Date?"; expires="+e.expiresAt.toGMTString():"")+"; path="+e.path+("string"==typeof e.domain?"; domain="+e.domain:"")+(!0===e.secure?"; secure":"")},r=function(){for(var t,e,n,o,i={},r=document.cookie.split(";"),a=0;a<r.length;a+=1){e=(t=r[a].split("="))[0].replace(/^\s*/,"").replace(/\s*$/,"");try{n=decodeURIComponent(t[1])}catch(e){n=t[1]}if("object"==typeof JSON&&null!==JSON&&"function"==typeof JSON.parse)try{o=n,n=JSON.parse(n)}catch(e){n=o}i[e]=n}return i},e=function(){};return e.prototype.get=function(e){var t,n,o=r();if("string"==typeof e)t=void 0!==o[e]?o[e]:null;else if("object"==typeof e&&null!==e)for(n in t={},e)void 0!==o[e[n]]?t[e[n]]=o[e[n]]:t[e[n]]=null;else t=o;return t},e.prototype.filter=function(e){var t,n={},o=r();for(t in"string"==typeof e&&(e=new RegExp(e)),o)t.match(e)&&(n[t]=o[t]);return n},e.prototype.set=function(e,t,n){if("object"==typeof n&&null!==n||(n={}),null==t)t="",n.hoursToLive=-8760;else if("string"!=typeof t){if("object"!=typeof JSON||null===JSON||"function"!=typeof JSON.stringify)throw new Error("cookies.set() received non-string value and could not serialize.");t=JSON.stringify(t)}n=i(n);document.cookie=e+"="+encodeURIComponent(t)+n},e.prototype.del=function(e,t){var n,o={};for(n in"object"==typeof t&&null!==t||(t={}),"boolean"==typeof e&&!0===e?o=this.get():"string"==typeof e&&(o[e]=!0),o)"string"==typeof n&&""!==n&&this.set(n,null,t)},e.prototype.test=function(){var e=!1;return this.set("cT","data"),"data"===this.get("cT")&&(this.del("cT"),e=!0),e},e.prototype.setOptions=function(e){"object"!=typeof e&&(e=null),o=t(e)},new e}(),window.jQuery&&function(a){a.cookies=jaaulde.utils.cookies;var e={cookify:function(r){return this.each(function(){var e,t,n,o=["name","id"],i=a(this);for(e in o)if(!isNaN(e)&&"string"==typeof(t=i.attr(o[e]))&&""!==t){i.is(":checkbox, :radio")?i.attr("checked")&&(n=i.val()):n=i.is(":input")?i.val():i.html(),"string"==typeof n&&""!==n||(n=null),a.cookies.set(t,n,r);break}})},cookieFill:function(){return this.each(function(){for(var e,t,n=["name","id"],o=a(this),i=function(){return!!(e=n.pop())};i();)if("string"==typeof(t=o.attr(e))&&""!==t){null!==(t=a.cookies.get(t))&&(o.is(":checkbox, :radio")?o.val()===t?o.attr("checked","checked"):o.removeAttr("checked"):o.is(":input")?o.val(t):o.html(t));break}})},cookieBind:function(t){return this.each(function(){var e=a(this);e.cookieFill().change(function(){e.cookify(t)})})}};a.each(e,function(e){a.fn[e]=this})}(window.jQuery),jQuery(document).ready(function(e){var t,n=e(".emergency-bar-container");n.length&&(t=n.attr("class").replace(" red-light","").replace(" red-dark","").replace(" orange","").replace(" yellow","").replace(" teal","").replace(" grey","").replace(" grey-light","").replace("emergency-bar-container",""),null==e.cookies.get("emergency-"+t+"shown")&&(e(".emergency-bar-container").addClass("show"),e(".emergency-bar-container .close").click(function(){e(".emergency-bar-container").removeClass("show"),e.cookies.set("emergency-"+t+"shown","true")})))}),jQuery(document).ready(function(e){e(".day-event-list").length&&e("table.calendar td").click(function(){e(".day-event-list").html(e(this).find(".day-events").html())}),e("select.event-category").change(function(){location.href=e.query.set("event_category",e(this).val())}),e("a.month-nav").click(function(){location.href=e.query.set("mo",e(this).data("month")).set("yr",e(this).data("year"))})}),jQuery(document).ready(function(e){e("a").each(function(){new RegExp("/"+window.location.host+"/").test(this.href)||e(this).click(function(e){e.preventDefault(),e.stopPropagation(),window.open(this.href,"_blank")})})}),jQuery(document).ready(function(e){e(".company-search")&&(e(".company-search").append('<div class="company-results"></div>'),e(".company-search input[type=text]").on("keyup",function(){e(this).val().length<3?e(".company-results").html("").hide():e(".company-results").load("/wp-content/themes/ripon/library/hep/company-search.php?company_search="+e(this).val()).show()}))});var setCompany=function(e){e=jQuery(".company-results li[data-id="+e+"]");jQuery(".company-search input[type=text]").val(e.text()+" - "+e.attr("data-id")),jQuery(".company-results").hide()};jQuery.fn.wrapStart=function(e,t){void 0===t&&(t="span");var n=this.contents().filter(function(){return 3==this.nodeType}).first(),o=n.text(),e=o.split(" ",e).join(" ");n.length&&(n[0].nodeValue=o.slice(e.length),n.before("<"+t+">"+e+"</"+t+">"))},jQuery(document).ready(function(e){e(".content img").removeAttr("width").removeAttr("height"),e(".lightbox-image").magnificPopup({type:"image"}),e(".lightbox-iframe").magnificPopup({type:"iframe"}),e(".content").fitVids(),e(".back-to-top").on("click",function(){e("html, body").animate({scrollTop:0},1e3)})}),jQuery(document).ready(function(o){var e=o(".menu-pane"),t=o(".menu-show"),n=e.find(".close"),i=o(".menu-photo");t.on("click",function(){e.addClass("open"),i.addClass("open")}),n.on("click",function(){e.removeClass("open"),i.removeClass("open"),e.find(".sub-menu").removeClass("open")}),e.find(".main-menu > li > a").on("click",function(e){e.preventDefault(),o(this).next(".sub-menu"),o(".sub-menu.open").removeClass("open"),o(this).next(".sub-menu").addClass("open"),o(this).on("click.submenu-active",function(){location.href=o(this).attr("href")})});var r=o(".sidebar .nav-menu");r.find("li.menu-item-has-children > a").click(function(e){var t=o(this).parent("li"),n=o(this).next("ul.sub-menu");n.hasClass("open")||(r.find("ul.sub-menu.open").removeClass("open"),e.preventDefault(),t.addClass("open"),n.addClass("open"))})}),jQuery.expr[":"].icontains=function(e,t,n){return 0<=jQuery(e).text().toUpperCase().indexOf(n[3].toUpperCase())},jQuery(document).ready(function(e){e(".people-search")&&e(".people-search input[type=text]").on("keyup",function(){e(".person-entry").addClass("visible"),e(".person-entry:not(:icontains('"+e(this).val()+"'))").removeClass("visible")})}),jQuery(document).ready(function(e){var t=e(".search-pane"),n=e(".search-show"),e=t.find(".close");n.on("click",function(){t.addClass("open"),t.find("input[type=text]").focus()}),e.on("click",function(){t.removeClass("open")})}),function(a,c){c.fn.extend({squirrel:function(t,n){(n=c.extend({},c.fn.squirrel.options,n)).clearOnSubmit=n.clear_on_submit,n.storageMethod=n.storage_method,n.storageKey=n.storage_key,n.storageKeyPrefix=n.storage_key_prefix;var s=null;if(m(n.storageMethod)?s="LOCAL"===n.storageMethod.toUpperCase()?a.localStorage:a.sessionStorage:null!==n.storageMethod&&r(n.storageMethod)&&(s=n.storageMethod),null===s||!(r(s)&&"getItem"in s&&"removeItem"in s&&"setItem"in s))return this;t=m(t)&&e.test(t)?t.toUpperCase():"START";var o="input[type!=file]:not(.squirrel-ignore), select:not(.squirrel-ignore), textarea:not(.squirrel-ignore)",i="button[type=reset], input[type=reset]";return n.storageKey=g(n.storageKey,"squirrel"),n.storageKeyPrefix=g(n.storageKeyPrefix,""),this.each(function(){var r=c(this),e=r.attr("data-squirrel"),a=n.storageKeyPrefix+(m(e)?e:n.storageKey);switch(t){case"CLEAR":case"REMOVE":f(s,a);break;case"OFF":case"STOP":r.find(o).off(u),r.find(i).off(l),r.off(d);break;default:r.find("*").filter("input[id], input[name], select[id], select[name], textarea[id], textarea[name]").each(function(){var n=c(this),e=n.attr("name");if(h(e)&&h(e=n.attr("id")))return r;var t=null;switch(this.tagName){case"INPUT":case"TEXTAREA":var o,i=n.attr("type");"checkbox"===i?(m(o=n.attr("value"))||(o=""),null!==(t=p(s,a,e+o))&&t!==this.checked&&(this.checked=!0===t,n.trigger("change"))):"radio"===i?null!==(t=p(s,a,e))&&t!==this.checked&&(this.checked=n.val()===t,n.trigger("change")):null!==(t=p(s,a,e))&&!n.is("[readonly]")&&n.is(":enabled")&&n.val()!==t&&n.val(t).trigger("change");break;case"SELECT":null!==(t=p(s,a,e))&&c.each(c.isArray(t)?t:[t],function(e,t){n.find("option").filter(function(){var e=c(this);return e.val()===t||e.html()===t}).prop("selected",!0).trigger("change")})}}),r.find(o).on(u,function(){var e,t=c(this),n=t.attr("name");h(n)&&h(n=t.attr("id"))||(e=t.attr("value"),e="checkbox"!==this.type||h(e)?n:n+e,p(s,a,e,"checkbox"===this.type?t.prop("checked"):t.val()))}),r.find(i).on(l,function(){f(s,a)}),r.on(d,function(){var e;e=n.clearOnSubmit,"boolean"===c.type(e)&&!n.clearOnSubmit||f(s,a)})}})}});var l="click.squirrel.js",u="blur.squirrel.js keyup.squirrel.js change.squirrel.js",d="submit.squirrel.js",e=/^(?:CLEAR|REMOVE|OFF|STOP)$/i;function p(e,t,n,o){var i=a.JSON.parse(e.getItem(t));if(null===i&&(i={}),h(o)||null===o)return h(i[n])?null:i[n];var r={};return r[n]=o,c.extend(i,r),e.setItem(t,a.JSON.stringify(i)),o}function f(e,t){e.removeItem(t)}function r(e){return"object"===c.type(e)}function m(e){return"string"===c.type(e)&&0<c.trim(e).length}function h(e){return void 0===e}function g(e,t){return m(e)?e:t}c.fn.squirrel.options={clear_on_submit:!0,storage_method:"local",storage_key:"squirrel",storage_key_prefix:""},c(function(){c("form.squirrel, form[data-squirrel]").squirrel()})}(window,window.jQuery),jQuery(document).ready(function(e){e(".video-showcase-container")&&(e(window).height(),e(window).width())});