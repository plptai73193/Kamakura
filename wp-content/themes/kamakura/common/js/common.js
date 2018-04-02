/* ===============================================
# 繝倥ャ繝繝ｼ繝｡繝九Η繝ｼ
=============================================== */
// 螟画焚
var _ua = (function(){
	return {
		ltIE6:typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
		ltIE7:typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
		ltIE8:typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
		ltIE9:document.uniqueID && !window.matchMedia,
		gtIE10:document.uniqueID && document.documentMode >= 10,
		Trident:document.uniqueID,
		Gecko:window.sidebar,
		Presto:window.opera,
		Blink:window.chrome,
		Webkit:!window.chrome && typeof document.webkitIsFullScreen != undefined,
		Touch:typeof document.ontouchstart != "undefined",
		Mobile:typeof window.orientation != "undefined"
	}
})();

var switch2 = 1;
var switch3 = 1;
//var getScope = $('.subMenu').slideDown(200);

if(_ua.ltIE9){
	$(function(){
		var trigger_width = 623;
		var myWidthLoad = $(window).width();
		if (myWidthLoad < trigger_width) {
			element2_sp();
		} else {
			element2_pc();
		}
		$(window).resize(function() {
			var myWidth = $(window).width();
			if(myWidthLoad != myWidth) {
				if (myWidth < trigger_width) {
					element2_sp();
				} else {
					element2_pc();
				}
			}
		});
	});
} else {
	$(function(){
		var myWidthLoad = $(window).width();
		if (window.matchMedia('(max-width:640px)').matches) {
			element2_sp();
		} else {
			element2_pc();
		}
		$(window).resize(function() {
		// window縺ｮ蟷�′蛻�ｊ譖ｿ繧上▲縺溘ｉ螳溯｡後☆繧�
			var myWidth = $(window).width();
			if(myWidthLoad != myWidth) {
				if (window.matchMedia('(max-width:640px)').matches) {
					element2_sp();
				} else {
					element2_pc();
				}
			}
		});
	});
}

// 繧ｹ繝槭�譎ゅ↓螳溯｡後＆縺帙◆縺��逅�ｒ譖ｸ縺�
function element2_sp() {
	switch3 = 1;
	if(switch2 == 1) {
		//$.colorbox.resize({width:'50%'});

		$('#spGnavi').css('display','none');
		$('#spMenu').removeClass('open');

		$('#spMenu').on("click", function(){
			if($(this).hasClass('open')) {
				$(this).removeClass('open');
				$('#spGnavi').slideUp(200);
			}else{
				$(this).addClass('open');
				$('#spGnavi').slideDown(200);
			}
		});
		switch2 = 2;
	}
}

// PC譎ゅ↓螳溯｡後＆縺帙◆縺��逅�ｒ譖ｸ縺�
function element2_pc() {
	switch2 = 1;
	if(switch3 == 1) {

		$('#spGnavi').css('display','none');
		$('#spMenu').removeClass('open');
		$("#spMenu").off("click");

		switch3 = 2;
	}
}

/* ===============================================
# 繧ｹ繝�繝ｼ繧ｹ繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ
=============================================== */
$(function() {
	var topBtn = $('#footer .pageTop');
	topBtn.hide();
	//繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ縺�100縺ｫ驕斐＠縺溘ｉ繝懊ち繝ｳ陦ｨ遉ｺ
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});

	// #縺ｧ蟋九∪繧九い繝ｳ繧ｫ繝ｼ繧偵け繝ｪ繝�け縺励◆蝣ｴ蜷医↓蜃ｦ逅�
	$('a[href^=#]:not(.inline)').click(function() {
		// 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ縺ｮ騾溷ｺｦ
		var speed = 400;// 繝溘Μ遘�
		// 繧｢繝ｳ繧ｫ繝ｼ縺ｮ蛟､蜿門ｾ�
		var href= $(this).attr("href");
		// 遘ｻ蜍募�繧貞叙蠕�
		var target = $(href == "#" || href == "" ? 'html' : href);
		// 遘ｻ蜍募�繧呈焚蛟､縺ｧ蜿門ｾ�
		var position = target.offset().top;
		// 繧ｹ繝�繝ｼ繧ｹ繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});
});

/* ===============================================
# class="imgover" 縺ｮ隕∫ｴ�縺ｫ縲√�繧ｦ繧ｹ繧ｪ繝ｼ繝舌�縺ｧ
縲"_o.gif" 縺ｮ逕ｻ蜒上→蜈･繧梧崛縺医ｋ
=============================================== */
function initRollovers() {
	if (!document.getElementById) return

	var aPreLoad = new Array();
	var sTempSrc;
	var aImages = document.getElementsByTagName('img');

	for (var i = 0; i < aImages.length; i++) {
		if (aImages[i].className == 'imgover') {
			var src = aImages[i].getAttribute('src');
			var ftype = src.substring(src.lastIndexOf('.'), src.length);
			var hsrc = src.replace(ftype, '_o'+ftype);

			aImages[i].setAttribute('hsrc', hsrc);
			aPreLoad[i] = new Image();
			aPreLoad[i].src = hsrc;
			aImages[i].onmouseover = function() {
				sTempSrc = this.getAttribute('src');
				this.setAttribute('src', this.getAttribute('hsrc'));
			}
			aImages[i].onmouseout = function() {
				if (!sTempSrc) sTempSrc = this.getAttribute('src').replace('_o'+ftype, ftype);
				this.setAttribute('src', sTempSrc);
			}
		}
	}
}
window.onload = initRollovers;
try{
	window.addEventListener("load",initRollovers,false);
}catch(e){
	window.attachEvent("onload",initRollovers);
}
$(document).ready(function() {
	// BEGIN: bxSlider plugin
	if ($(".bxSlider").length) {
		if ($.fn.bxSlider) {
			$(".bxSlider").each(function() {
				var $bxSliderData = {
						mode: $.inArray($(this).attr("data-mode"), ["horizontal", "vertical", "fade"]) >= 0 ? $(this).attr("data-mode") : "fade",
						auto: $.inArray($(this).attr("data-auto"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						controls: $.inArray($(this).attr("data-controls"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						randomStart: $.inArray($(this).attr("data-randomStart"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						infiniteLoop: $.inArray($(this).attr("data-infiniteLoop"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						ticker: $.inArray($(this).attr("data-ticker"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						tickerHover: $.inArray($(this).attr("data-tickerHover"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						pager: $.inArray($(this).attr("data-pager"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						pagerCustom: typeof $(this).attr("data-pagerCustom") != "undefined" && $(this).attr("data-pagerCustom").length > 0 ? $(this).attr("data-pagerCustom") : null,
						pagerSelector: typeof $(this).attr("data-pagerSelector") != "undefined" ? $(this).attr("data-pagerSelector") : null,
						useCSS: $.inArray($(this).attr("data-useCSS"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						autoHover: $.inArray($(this).attr("data-autoHover"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						preloadImages: $.inArray($(this).attr("data-preloadImages"), ["all", "visible"]) >= 0 ? $(this).attr("data-preloadImages") : "visible",
						hideControlOnEnd: $.inArray($(this).attr("data-hideControlOnEnd"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						captions: $.inArray($(this).attr("data-captions"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						clickContinue: $.inArray($(this).attr("data-clickContinue"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						speed: typeof $(this).attr("data-speed") != "undefined" ? parseInt($(this).attr("data-speed")) : 1000,
						pause: typeof $(this).attr("data-pause") != "undefined" ? parseInt($(this).attr("data-pause")) : 4000,
						slideMargin: typeof $(this).attr("data-slideMargin") != "undefined" ? parseInt($(this).attr("data-slideMargin")) : 0,
						startSlide: typeof $(this).attr("data-startSlide") != "undefined" ? parseInt($(this).attr("data-startSlide")) : 0,
						autoDelay: typeof $(this).attr("data-autoDelay") != "undefined" ? parseInt($(this).attr("data-autoDelay")) : 0,
						minSlides: typeof $(this).attr("data-minSlides") != "undefined" ? parseInt($(this).attr("data-minSlides")) : 1,
						maxSlides: typeof $(this).attr("data-maxSlides") != "undefined" ? parseInt($(this).attr("data-maxSlides")) : 1,
						moveSlides: typeof $(this).attr("data-moveSlides") != "undefined" ? parseInt($(this).attr("data-moveSlides")) : 0,
						slideWidth: typeof $(this).attr("data-slideWidth") != "undefined" ? parseInt($(this).attr("data-slideWidth")) : 0,
						autoDirection: $.inArray($(this).attr("data-autoDirection"), ["next", "prev"]) >= 0 ? $(this).attr("data-autoDirection") : "next",
						adaptiveHeight: $.inArray($(this).attr("data-adaptiveHeight"), ["true", "on", "enable", "enabled", "1"]) >= 0 ? true : false,
						adaptiveHeightSpeed: typeof $(this).attr("data-adaptiveHeightSpeed") != "undefined" ? parseInt($(this).attr("data-adaptiveHeightSpeed")) : 500,
						nextSelector: typeof $(this).attr("data-nextSelector") != "undefined" ? $(this).attr("data-nextSelector") : null,
						prevSelector: typeof $(this).attr("data-prevSelector") != "undefined" ? $(this).attr("data-prevSelector") : null,
						nextText: typeof $(this).attr("data-nextText") != "undefined" ? $(this).attr("data-nextText") : "Next",
						prevText: typeof $(this).attr("data-prevText") != "undefined" ? $(this).attr("data-prevText") : "Prev",
						easing: typeof $(this).attr("data-easing") != "undefined" ? $(this).attr("data-easing") : null
					};

				if (typeof $(this).attr("data-auto") == "undefined") $bxSliderData.auto = true;
				if (typeof $(this).attr("data-infiniteLoop") == "undefined") $bxSliderData.infiniteLoop = true;
				if (typeof $(this).attr("data-useCSS") == "undefined" && $bxSliderData.mode === "fade") $bxSliderData.useCSS = true;
				if (typeof $(this).attr("data-controls") == "undefined" && ($bxSliderData.pagerCustom !== null || $bxSliderData.pagerSelector !== null)) $bxSliderData.pager = true;
				if (typeof $(this).attr("data-controls") == "undefined" && ($bxSliderData.nextSelector !== null || $bxSliderData.nextSelector !== null)) $bxSliderData.controls = true;
				if (typeof $(this).attr("data-nextText") == "undefined" && $bxSliderData.nextSelector !== null) $bxSliderData.nextText = "";
				if (typeof $(this).attr("data-prevText") == "undefined" && $bxSliderData.prevSelector !== null) $bxSliderData.prevText = "";

				if ($bxSliderData.ticker === true) {
					$bxSliderData.mode = $.inArray($bxSliderData.mode, ["horizontal", "vertical"]) >= 0 ? $bxSliderData.mode : "horizontal";
					$bxSliderData.auto = false;
					$bxSliderData.autoStart = true;
					$bxSliderData.autoDelay = 0;
					$bxSliderData.autoHover = false;
					$bxSliderData.useCSS = false;
				}

				var $bxSlider = $(this).bxSlider({
						mode: $bxSliderData.mode,
						auto: $bxSliderData.auto,
						controls: $bxSliderData.controls,
						randomStart: $bxSliderData.randomStart,
						infiniteLoop: $bxSliderData.infiniteLoop,
						ticker: $bxSliderData.ticker,
						tickerHover: $bxSliderData.tickerHover,
						pager: $bxSliderData.pager,
						pagerCustom: $bxSliderData.pagerCustom,
						useCSS: $bxSliderData.useCSS,
						autoHover: $bxSliderData.autoHover,
						preloadImages: $bxSliderData.preloadImages,
						hideControlOnEnd: $bxSliderData.hideControlOnEnd,
						captions: $bxSliderData.captions,
						speed: $bxSliderData.speed,
						pause: $bxSliderData.pause,
						slideMargin: $bxSliderData.slideMargin,
						startSlide: $bxSliderData.startSlide,
						autoDelay: $bxSliderData.autoDelay,
						minSlides: $bxSliderData.minSlides,
						maxSlides: $bxSliderData.maxSlides,
						moveSlides: $bxSliderData.moveSlides,
						slideWidth: $bxSliderData.slideWidth,
						autoDirection: $bxSliderData.autoDirection,
						adaptiveHeight: $bxSliderData.adaptiveHeight,
						adaptiveHeightSpeed: $bxSliderData.adaptiveHeightSpeed,
						nextSelector: $bxSliderData.nextSelector,
						prevSelector: $bxSliderData.prevSelector,
						nextText: $bxSliderData.nextText,
						prevText: $bxSliderData.prevText,
						easing: $bxSliderData.easing,
						onSlideAfter: function() {
							if (($bxSliderData.ticker !== true && $bxSliderData.tickerHover !== true) && $bxSliderData.auto !== false && $bxSliderData.clickContinue) {
								$bxSlider.stopAuto();
								$bxSlider.startAuto();
							}
						}
					});

				if ($(this).parents(".bxSlider-pager").length) {
					$(this).parents(".bxSlider-pager").on("mouseenter", "a[data-slide-index]", function() {
						var $idx = $(this).attr("data-slide-index");
						if ($idx != $bxSlider.getCurrentSlide()) $bxSlider.goToSlide($idx);
					});
				}
			});
		} else console.error("required libs bxSlider");
	}
	// END: bxSlider plugin
});