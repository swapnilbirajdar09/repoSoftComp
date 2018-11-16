"use strict";

(function () {

	/***
	 * Global variables
	 */
	var userAgent = navigator.userAgent.toLowerCase(),
		initialDate = new Date(),

		$document = $(document),
		$window = $(window),
		$html = $("html"),
		$body = $("body"),

		isDesktop = $html.hasClass("desktop"),
		isRtl = $html.attr("dir") === "rtl",
		isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		isiPhoneiPad = /iPhone|iPad|iPod/i.test(navigator.userAgent),
		lastScroll = 0,
		isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
		onloadCaptchaCallback,
		isNoviBuilder = false,
		plugins = {
			bgBody: $('.bg-background-fade'),
			bgPanel: $('.color-code'),
			rdNavbar: $(".rd-navbar"),
			materialParallax: $(".parallax-container"),
			rdGoogleMaps: $(".rd-google-map"),
			captcha: $('.recaptcha'),
			preloader: $(".preloader"),
			swiper: $(".swiper-slider"),
			rdMailForm: $(".rd-mailform"),
			rdInputLabel: $(".form-label"),
			regula: $("[data-constraints]"),
			radio: $("input[type='radio']"),
			checkbox: $("input[type='checkbox']"),
			lightGallery: $("[data-lightgallery='group']"),
			lightGalleryItem: $("[data-lightgallery='item']"),
			lightDynamicGalleryItem: $("[data-lightgallery='dynamic']"),
			revolution: $("#rev_slider_1"),
			typedjs: $('.typed-text-wrap'),
			customToggle: $("[data-custom-toggle]"),
			tilter: $(".tilter"),
			mailchimp: $('.mailchimp-mailform'),
			campaignMonitor: $('.campaign-mailform'),
			selectFilter: $("select"),
			customWaypoints: $('[data-custom-scroll-to]'),
			instafeed: $(".instafeed"),
			tilt: $('.tilt'),
			youtubeBg: $('.bg-youtube')
		};

	$window.on('load', function () {
		// Page loader
		if  ( plugins.preloader.length ) {
				plugins.preloader.addClass('loaded');
		}
	});

	/***
	 * Initialize All Scripts
	 */
	$(function () {
		var isNoviBuilder = window.xMode;

		/**
		 * @desc Calculate the height of swiper slider basing on data attr
		 * @param {object} object - slider jQuery object
		 * @param {string} attr - attribute name
		 * @return {number} slider height
		 */
		function getSwiperHeight(object, attr) {
			var val = object.attr("data-" + attr),
				dim;

			if (!val) {
				return undefined;
			}

			dim = val.match(/(px)|(%)|(vh)|(vw)$/i);

			if (dim.length) {
				switch (dim[0]) {
					case "px":
						return parseFloat(val);
					case "vh":
						return $window.height() * (parseFloat(val) / 100);
					case "vw":
						return $window.width() * (parseFloat(val) / 100);
					case "%":
						return object.width() * (parseFloat(val) / 100);
				}
			} else {
				return undefined;
			}
		}


		/**
		 * @desc Toggle swiper videos on active slides
		 * @param {object} swiper - swiper slider
		 */
		function toggleSwiperInnerVideos(swiper) {
			var prevSlide = $(swiper.slides[swiper.previousIndex]),
				nextSlide = $(swiper.slides[swiper.activeIndex]),
				videos,
				videoItems = prevSlide.find("video");

			for (var i = 0; i < videoItems.length; i++) {
				videoItems[i].pause();
			}

			videos = nextSlide.find("video");
			if (videos.length) {
				videos.get(0).play();
			}
		}

		/**
		 * @desc Toggle swiper animations on active slides
		 * @param {object} swiper - swiper slider
		 */
		function toggleSwiperCaptionAnimation(swiper) {
			var prevSlide = $(swiper.container).find("[data-caption-animate]"),
				nextSlide = $(swiper.slides[swiper.activeIndex]).find("[data-caption-animate]"),
				delay,
				duration,
				nextSlideItem,
				prevSlideItem;

			for (var i = 0; i < prevSlide.length; i++) {
				prevSlideItem = $(prevSlide[i]);

				prevSlideItem.removeClass("animated")
					.removeClass(prevSlideItem.attr("data-caption-animate"))
					.addClass("not-animated");
			}


			var tempFunction = function (nextSlideItem, duration) {
				return function () {
					nextSlideItem
						.removeClass("not-animated")
						.addClass(nextSlideItem.attr("data-caption-animate"))
						.addClass("animated");
					if (duration) {
						nextSlideItem.css('animation-duration', duration + 'ms');
					}
				};
			};

			for (var i = 0; i < nextSlide.length; i++) {
				nextSlideItem = $(nextSlide[i]);
				delay = nextSlideItem.attr("data-caption-delay");
				duration = nextSlideItem.attr('data-caption-duration');
				if (!isNoviBuilder) {
					if (delay) {
						setTimeout(tempFunction(nextSlideItem, duration), parseInt(delay, 10));
					} else {
						tempFunction(nextSlideItem, duration);
					}

				} else {
					nextSlideItem.removeClass("not-animated")
				}
			}
		}

		/**
		 * @desc Initialize the gallery with set of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).lightGallery({
					thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
					selector: "[data-lightgallery='item']",
					autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
					pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
					addClass: addClass,
					mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
					loop: $(itemsToInit).attr("data-lg-loop") !== "false"
				});
			}
		}

		/**
		 * @desc Initialize the gallery with dynamic addition of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initDynamicLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).on("click", function () {
					$(itemsToInit).lightGallery({
						thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
						selector: "[data-lightgallery='item']",
						autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
						pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
						addClass: addClass,
						mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
						loop: $(itemsToInit).attr("data-lg-loop") !== "false",
						dynamic: true,
						dynamicEl: JSON.parse($(itemsToInit).attr("data-lg-dynamic-elements")) || []
					});
				});
			}
		}

		/**
		 * @desc Initialize the gallery with one image
		 * @param {object} itemToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initLightGalleryItem(itemToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemToInit).lightGallery({
					selector: "this",
					addClass: addClass,
					counter: false,
					youtubePlayerParams: {
						modestbranding: 1,
						showinfo: 0,
						rel: 0,
						controls: 0
					},
					vimeoPlayerParams: {
						byline: 0,
						portrait: 0
					}
				});
			}
		}

		/***
		 * SetMegamenuPosition
		 */
		function SetMegamenuPosition() {
			if ($window.width() > 991) {
				setTimeout(function () {
					var totalHeight = $('nav.navbar').outerHeight();
					$('.mega-menu').css({top: totalHeight});
					if ($('.navbar-brand-top').length === 0)
						$('.dropdown.simple-dropdown > .dropdown-menu').css({top: totalHeight});
				}, 200);
			} else {
				$('.mega-menu').css('top', '');
				$('.dropdown.simple-dropdown > .dropdown-menu').css('top', '');
			}
		}

		function pad(d) {
			return (d < 10) ? '0' + d.toString() : d.toString();
		}



		/**
		 * Custom Toggles
		 */
		if (plugins.customToggle.length) {
			var i;

			for (i = 0; i < plugins.customToggle.length; i++) {
				var $this = $(plugins.customToggle[i]);

				$this.on('click', $.proxy(function (event) {
					event.preventDefault();
					var $ctx = $(this);
					$($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
				}, $this));

				if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
					$("body").on("click", $this, function (e) {
						if (e.target !== e.data[0]
							&& $(e.data.attr('data-custom-toggle')).find($(e.target)).length
							&& e.data.find($(e.target)).length == 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}

				if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
					$("body").on("click", $this, function (e) {
						if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length == 0 && e.data.find($(e.target)).length == 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}
			}
		}


		/**
		 * typedjs
		 * @description Enables Stepper Plugin
		 */
		if (plugins.typedjs.length && !isNoviBuilder && isDesktop ) {
			// var e = ["tech", "cooking", "gardening", "personal", "design", "travel", "adventure", "crafts", "family", "team"];
			var e = ["Creative", "Unique", 'Revolutionary'];
			$('.typed-text').typed({
				strings: e,
				typeSpeed: 100,
				backSpeed: 80,
				loop: !0,
				backDelay: 1000
			});
		}


		/***
		 * setPageTitleSpace
		 * @description page title space
		 */
		function setPageTitleSpace() {
			var $navbar = $('.navbar'),
				topSpace = $('.top-space'),
				topHeaderArea = $('.top-header-area');

			if ($navbar.hasClass('navbar-top') || $('nav').hasClass('navbar-fixed-top')) {
				if (topSpace.length > 0) {
					var top_space_height = $navbar.outerHeight();
					if (topHeaderArea.length > 0) {
						top_space_height = top_space_height + topHeaderArea.outerHeight();
					}
					topSpace.css('margin-top', top_space_height + "px");
				}
			}
		}

		/***
		 * setButtonPosition
		 * @description swiper button position in auto height slider
		 */
		function setButtonPosition() {

			var $swiperAutoHeightContainer = $(".swiper-auto-height-container"),
				$swiperAutoHeightContainerSlide = $swiperAutoHeightContainer.find('.swiper-slide'),
				$swiperAutoHeightContainerBanner = $swiperAutoHeightContainer.find('.slide-banner'),
				$navigationArea = $('.navigation-area');

			if ($window.width() > 767 && $swiperAutoHeightContainer.length > 0) {
				var leftPosition = parseInt($swiperAutoHeightContainerSlide.css('padding-left'));
				var bottomPosition = parseInt($swiperAutoHeightContainerSlide.css('padding-bottom'));
				var bannerWidth = parseInt($swiperAutoHeightContainerBanner.outerWidth());
				$navigationArea.css({'left': bannerWidth + leftPosition + 'px', 'bottom': bottomPosition + 'px'});
			} else if ($swiperAutoHeightContainer.length > 0) {
				$navigationArea.css({'left': '', 'bottom': ''});
			}
		}

		/***
		 * One Page Main JS
		 */
		$window.on("scroll", init_scroll_navigate);

		function init_scroll_navigate() {
			var menu_links = $(".navbar-nav li a");
			var scrollPos = $document.scrollTop();
			menu_links.each(function () {
				var currLink = $(this);
				if (currLink.attr("href").indexOf("#") > -1 && $(currLink.attr("href")).length > 0) {
					var refElement = $(currLink.attr("href"));
					if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
						menu_links.removeClass("active");
						currLink.addClass("active");
					} else {
						currLink.removeClass("active");
					}
				}
			});

			/***
			 * Background color slider Start
			 */
			if (plugins.bgPanel.length) {
				var scroll = $window.scrollTop() + ($window.height() / 2);

				plugins.bgPanel.each(function () {
					var $this = $(this);
					if ($this.position().top <= scroll && $this.position().top + $this.height() > scroll) {
						plugins.bgBody.removeClass(function (index, css) {
							return (css.match(/(^|\s)color-\S+/g) || []).join(' ');
						});
						plugins.bgBody.addClass('color-' + $(this).data('color'));
					}
				});
			}


			/**
			 sticky nav Start
			 */

			var headerHeight = $('nav').outerHeight();
			if (!$('header').hasClass('no-sticky')) {
				if ($document.scrollTop() >= headerHeight) {
					$('header').addClass('sticky');

				} else if ($document.scrollTop() <= headerHeight) {
					$('header').removeClass('sticky');
					setTimeout(function () {
						setPageTitleSpace();
					}, 500);
				}
				SetMegamenuPosition();
			}

			/***
			 * Scroll Top
			 * @description header appear on scroll up
			 */

			if (!isNoviBuilder) {
				var st = $(this).scrollTop();
				if (st > lastScroll) {
					$('.sticky').removeClass('header-appear');
					$('.dropdown.on').removeClass('on').removeClass('open').find('.dropdown-menu').fadeOut(100);
				} else
					$('.sticky').addClass('header-appear');
				lastScroll = st;
				if (lastScroll <= headerHeight)
					$('header').removeClass('header-appear');
			}
		}


		/***
		 * Parallax text
		 */
		function parallax_text() {
			var window_width = $window.width();
			if (window_width > 1024) {
				if ($('.swiper-auto-width .swiper-slide').length !== 0) {
					$document.on("mousemove", ".swiper-auto-width .swiper-slide", function (e) {
						var positionX = e.clientX;
						var positionY = e.clientY;
						positionX = Math.round(positionX / 10) - 80;
						positionY = Math.round(positionY / 10) - 40;
						$(this).find('.parallax-text').css({
							'transform': 'translate(' + positionX + 'px,' + positionY + 'px)',
							'transition-duration': '0s'
						});
					});

					$document.on("mouseout", ".swiper-auto-width .swiper-slide", function (e) {
						$('.parallax-text').css({'transform': 'translate(0,0)', 'transition-duration': '0.5s'});
					});
				}
			}
		}

		/***
		 * Search
		 */
		function ScrollStop() {
			return false;
		}

		function ScrollStart() {
			return true;
		}

		function validationSearchForm() {
			var error = true;
			$('#search-header input[type=text]').each(function (index) {
				if (index === 0) {
					if ($(this).val() === null || $(this).val() === "") {
						$("#search-header").find("input:eq(" + index + ")").css({
							"border": "none",
							"border-bottom": "2px solid red"
						});
						error = false;
					} else {
						$("#search-header").find("input:eq(" + index + ")").css({
							"border": "none",
							"border-bottom": "2px solid #000"
						});
					}
				}
			});
			return error;
		}

		/***
		 * Equalize
		 */
		function equalizeHeight() {
			$document.imagesLoaded(function () {
				if ($window.width() < 768 && !isNoviBuilder) {
					$('.equalize').equalize({equalize: 'outerHeight', reset: true});
					$('.equalize.md-equalize-auto').children().css("height", "");
					$('.equalize.sm-equalize-auto').children().css("height", "");
					$('.equalize.xs-equalize-auto').children().css("height", "");
					return false;
				} else if ($window.width() < 992) {
					$('.equalize').equalize({equalize: 'outerHeight', reset: true});
					$('.equalize.md-equalize-auto').children().css("height", "");
					$('.equalize.sm-equalize-auto').children().css("height", "");
					return false;
				} else if ($window.width() < 1199) {
					$('.equalize').equalize({equalize: 'outerHeight', reset: true});
					$('.equalize.md-equalize-auto').children().css("height", "");
					return false;
				} else {
					$('.equalize').equalize({equalize: 'outerHeight', reset: true});
				}
			});
		}

		/**
		 dynamic font size START CODE
		 */
		function feature_dynamic_font_line_height() {
			if ($('.dynamic-font-size').length > 0) {
				var site_width = 1100;
				var window_width = $window.width();
				if (window_width < site_width) {
					var window_site_width_ratio = window_width / site_width;
					$('.dynamic-font-size').each(function () {
						var font_size = $(this).attr('data-fontsize');
						var line_height = $(this).attr('data-lineheight');
						if (font_size != '' && font_size != undefined) {
							var new_font_size = Math.round(font_size * window_site_width_ratio * 1000) / 1000;
							$(this).css('font-size', new_font_size + 'px');
						}
						if (line_height !== '' && line_height !== undefined) {
							var new_line_height = Math.round(line_height * window_site_width_ratio * 1000) / 1000;
							$(this).css('line-height', new_line_height + 'px');
						}
					});
				} else {
					$('.dynamic-font-size').each(function () {
						var font_size = $(this).attr('data-fontsize');
						var line_height = $(this).attr('data-lineheight');
						if (font_size !== '' && font_size !== undefined) {
							$(this).css('font-size', font_size + 'px');
						}
						if (line_height !== '' && line_height !== undefined) {
							$(this).css('line-height', line_height + 'px');
						}
					});
				}
			}
		}

		/**
		 dynamic font size END CODE
		 */



		/**
		 full screen START CODE
		 */
		function fullScreenHeight() {
			var element = $(".full-screen");
			var $minheight = $window.height();
			element.parents('section').imagesLoaded(function () {
				if ($(".top-space .full-screen").length > 0) {
					var $headerheight = $("header nav.navbar").outerHeight();
					$(".top-space .full-screen").css('min-height', $minheight - $headerheight);
				} else {
					element.css('min-height', $minheight);
				}
			});

			var minwidth = $window.width();
			$(".full-screen-width").css('min-width', minwidth);
			var sidebarNavHeight = $('.sidebar-nav-style-1').height() - $('.logo-holder').parent().height() - $('.footer-holder').parent().height() - 10;
			$(".sidebar-nav-style-1 .nav").css('height', (sidebarNavHeight));
			var style2NavHeight = parseInt($('.sidebar-part2').height() - parseInt($('.sidebar-part2 .sidebar-middle').css('padding-top')) - parseInt($('.sidebar-part2 .sidebar-middle').css('padding-bottom')) - parseInt($(".sidebar-part2 .sidebar-middle .sidebar-middle-menu .nav").css('margin-bottom')));
			$(".sidebar-part2 .sidebar-middle .sidebar-middle-menu .nav").css('height', (style2NavHeight));


		}

		/*
	* Title
	*/
		if (plugins.tilt.length && !isIE && !isMobile) {
			$('.js-tilt').tilt({

			})
		}


		/**
		 full screen END CODE
		 */
		function SetResizeContent() {
			//    all function call
			feature_dynamic_font_line_height();
			SetMegamenuPosition();
			setPageTitleSpace();
			setButtonPosition();
			parallax_text();
			fullScreenHeight();
			equalizeHeight();
		}

		// Material Parallax
		if (plugins.materialParallax.length) {
			if (!isNoviBuilder && !isIE && !isMobile) {
				plugins.materialParallax.parallax();

				// heavy pages fix
				$window.on('load', function () {
						setTimeout(function () {
							$(window).scroll();
						}, 500);
					}
				);

			} else {
				for (var i = 0; i < plugins.materialParallax.length; i++) {
					var parallax = $(plugins.materialParallax[i]),
						imgPath = parallax.data("parallax-img");

					parallax.css({
						"background-image": 'url(' + imgPath + ')',
						"background-attachment": "fixed",
						"background-size": "cover"
					});
				}
			}
		}



		if (plugins.swiper.length) {
			for (var i = 0; i < plugins.swiper.length; i++) {
				var s = $(plugins.swiper[i]);
				var pag = s.find(".swiper-pagination"),
					next = s.find(".swiper-button-next"),
					prev = s.find(".swiper-button-prev"),
					bar = s.find(".swiper-scrollbar"),
					swiperSlide = s.find(".swiper-slide"),
					autoplay = false;

				for (var j = 0; j < swiperSlide.length; j++) {
					var $this = $(swiperSlide[j]),
						url;

					if (url = $this.attr("data-slide-bg")) {
						$this.css({
							"background-image": "url(" + url + ")",
							"background-size": "cover"
						})
					}
				}

				swiperSlide.end()
					.find("[data-caption-animate]")
					.addClass("not-animated")
					.end();

				s.swiper({
					autoplay: isNoviBuilder ? false : (s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000),
					direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
					effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
					speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
					keyboardControl: s.attr('data-keyboard') === "true",
					parallax: s.attr('data-parallax') === "true",
					mousewheelControl: s.attr('data-mousewheel') === "true",
					mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
					nextButton: next.length ? next.get(0) : null,
					prevButton: prev.length ? prev.get(0) : null,
					pagination: pag.length ? pag.get(0) : null,
					paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
					paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function (swiper, index, className) {
						return '<span class="' + className + '">' + (index + 1) + '</span>';
					} : null : null,
					scrollbar: bar.length ? bar.get(0) : null,
					scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
					scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
					loop: isNoviBuilder ? false : s.attr('data-loop') !== "false",
					simulateTouch: s.attr('data-simulate-touch') && !isNoviBuilder ? s.attr('data-simulate-touch') === "true" : false,
					onTransitionStart: function (swiper) {
						toggleSwiperInnerVideos(swiper);
					},
					onTransitionEnd: function (swiper) {
						toggleSwiperCaptionAnimation(swiper);
					},
					onInit: function (swiper) {
						toggleSwiperInnerVideos(swiper);
						toggleSwiperCaptionAnimation(swiper);

						if (!isRtl) {
							$window.on('resize', function () {
								swiper.update(true);
							});
						}

						initLightGalleryItem(s.find('[data-lightgallery="item"]'), 'lightGallery-in-carousel');
					}
				});

				$window.on("resize", (function (s) {
					return function () {
						var mh = getSwiperHeight(s, "min-height"),
							h = getSwiperHeight(s, "height");
						if (h) {
							s.css("height", mh ? mh > h ? mh : h : h);
						}
					}
				})(s)).trigger("resize");
			}
		}

		if (plugins.customWaypoints.length && !isNoviBuilder) {
			var i;
			for (i = 0; i < plugins.customWaypoints.length; i++) {
				var $this = $(plugins.customWaypoints[i]);

				$this.on('click', function (e) {
					e.preventDefault();
					$("body, html").stop().animate({
						scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
					}, 1000, function () {
						$window.trigger("resize");
					});
				});
			}
		}

		/**
		 * RD Navbar
		 * @description Enables RD Navbar plugin
		 */
		if (plugins.rdNavbar.length) {
			var aliaces, i, j, len, value, values, responsiveNavbar;

			aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
			values = [0, 576, 768, 992, 1200, 1600];
			responsiveNavbar = {};

			for (i = j = 0, len = values.length; j < len; i = ++j) {
				value = values[i];
				if (!responsiveNavbar[values[i]]) {
					responsiveNavbar[values[i]] = {};
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'layout')) {
					responsiveNavbar[values[i]].layout = plugins.rdNavbar.attr('data' + aliaces[i] + 'layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout')) {
					responsiveNavbar[values[i]]['deviceLayout'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on')) {
					responsiveNavbar[values[i]]['focusOnHover'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on') === 'true';
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height')) {
					responsiveNavbar[values[i]]['autoHeight'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height') === 'true';
				}

				if (isNoviBuilder) {
					responsiveNavbar[values[i]]['stickUp'] = false;
				} else if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up')) {
					responsiveNavbar[values[i]]['stickUp'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up') === 'true';
				}

				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset')) {
					responsiveNavbar[values[i]]['stickUpOffset'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset');
				}
			}


			plugins.rdNavbar.RDNavbar({
				anchorNav: !isNoviBuilder,
				stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false,
				responsive: responsiveNavbar,
				callbacks: {
					onStuck: function () {
						var navbarSearch = this.$element.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
						}
					},
					onDropdownOver: function () {
						return !isNoviBuilder;
					},
					onUnstuck: function () {
						if (this.$clone === null)
							return;

						var navbarSearch = this.$clone.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
							navbarSearch.trigger('blur');
						}

					}
				}
			});


			if (plugins.rdNavbar.attr("data-body-class")) {
				document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
			}
		}

		/**
		 * @desc Attach form validation to elements
		 * @param {object} elements - jQuery object
		 */
		function attachFormValidator(elements) {
			for (var i = 0; i < elements.length; i++) {
				var o = $(elements[i]), v;
				o.addClass("form-control-has-validation").after("<span class='form-validation'></span>");
				v = o.parent().find(".form-validation");
				if (v.is(":last-child")) {
					o.addClass("form-control-last-child");
				}
			}

			elements
				.on('input change propertychange blur', function (e) {
					var $this = $(this), results;

					if (e.type !== "blur") {
						if (!$this.parent().hasClass("has-error")) {
							return;
						}
					}

					if ($this.parents('.rd-mailform').hasClass('success')) {
						return;
					}

					if ((results = $this.regula('validate')).length) {
						for (i = 0; i < results.length; i++) {
							$this.siblings(".form-validation").text(results[i].message).parent().addClass("has-error")
						}
					} else {
						$this.siblings(".form-validation").text("").parent().removeClass("has-error")
					}
				})
				.regula('bind');

			var regularConstraintsMessages = [
				{
					type: regula.Constraint.Required,
					newMessage: "The text field is required."
				},
				{
					type: regula.Constraint.Email,
					newMessage: "The email is not a valid email."
				},
				{
					type: regula.Constraint.Numeric,
					newMessage: "Only numbers are required"
				},
				{
					type: regula.Constraint.Selected,
					newMessage: "Please choose an option."
				}
			];


			for (var i = 0; i < regularConstraintsMessages.length; i++) {
				var regularConstraint = regularConstraintsMessages[i];

				regula.override({
					constraintType: regularConstraint.type,
					defaultMessage: regularConstraint.newMessage
				});
			}
		}


		/**
		 * @desc Check the element whas been scrolled into the view
		 * @param {object} elem - jQuery object
		 * @return {boolean}
		 */
		function isScrolledIntoView(elem) {
			if (!isNoviBuilder) {
				return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
			}
			else {
				return true;
			}
		}


		/**
		 * @desc Calls a function when element has been scrolled into the view
		 * @param {object} element - jQuery object
		 * @param {function} func - callback function
		 */
		function lazyInit(element, func) {
			$document.on('scroll', function () {
				if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
					func.call();
					element.addClass('lazy-loaded');
				}
			}).trigger("scroll");
		}

		/**
		 * @desc Check if all elements pass validation
		 * @param {object} elements - object of items for validation
		 * @param {object} captcha - captcha object for validation
		 * @return {boolean}
		 */
		function isValidated(elements, captcha) {
			var results, errors = 0;

			if (elements.length) {
				for (var j = 0; j < elements.length; j++) {

					var $input = $(elements[j]);
					if ((results = $input.regula('validate')).length) {
						for (k = 0; k < results.length; k++) {
							errors++;
							$input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
						}
					} else {
						$input.siblings(".form-validation").text("").parent().removeClass("has-error")
					}
				}

				if (captcha) {
					if (captcha.length) {
						return validateReCaptcha(captcha) && errors === 0
					}
				}

				return errors === 0;
			}
			return true;
		}

		/**
		 * @desc Validate google reCaptcha
		 * @param {object} captcha - captcha object for validation
		 * @return {boolean}
		 */
		function validateReCaptcha(captcha) {
			var captchaToken = captcha.find('.g-recaptcha-response').val();

			if (captchaToken.length === 0) {
				captcha
					.siblings('.form-validation')
					.html('Please, prove that you are not robot.')
					.addClass('active');
				captcha
					.closest('.form-wrap')
					.addClass('has-error');

				captcha.on('propertychange', function () {
					var $this = $(this),
						captchaToken = $this.find('.g-recaptcha-response').val();

					if (captchaToken.length > 0) {
						$this
							.closest('.form-wrap')
							.removeClass('has-error');
						$this
							.siblings('.form-validation')
							.removeClass('active')
							.html('');
						$this.off('propertychange');
					}
				});

				return false;
			}

			return true;
		}

		if (isDesktop && !isNoviBuilder) {
			$().UItoTop({
				easingType: 'easeOutQuad',
				containerClass: 'ui-to-top fa fa-angle-up'
			});
		}

		/**
		 * @desc Initialize Google reCaptcha
		 */
		window.onloadCaptchaCallback = function () {
			for (var i = 0; i < plugins.captcha.length; i++) {
				var $capthcaItem = $(plugins.captcha[i]);

				grecaptcha.render(
					$capthcaItem.attr('id'),
					{
						sitekey: $capthcaItem.attr('data-sitekey'),
						size: $capthcaItem.attr('data-size') ? $capthcaItem.attr('data-size') : 'normal',
						theme: $capthcaItem.attr('data-theme') ? $capthcaItem.attr('data-theme') : 'light',
						callback: function (e) {
							$('.recaptcha').trigger('propertychange');
						}
					}
				);
				$capthcaItem.after("<span class='form-validation'></span>");
			}
		};

		// Google ReCaptcha
		if (plugins.captcha.length) {
			$.getScript("//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en");
		}

		if (plugins.radio.length) {
			for (var i = 0; i < plugins.radio.length; i++) {
				$(plugins.radio[i]).addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
			}
		}

		// Add custom styling options for input[type="checkbox"]
		if (plugins.checkbox.length) {
			for (var i = 0; i < plugins.checkbox.length; i++) {
				$(plugins.checkbox[i]).addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
			}
		}

		if (plugins.rdInputLabel.length) {
			plugins.rdInputLabel.RDInputLabel();
		}

		// Regula
		if (plugins.regula.length) {
			attachFormValidator(plugins.regula);
		}

		// MailChimp Ajax subscription
		if (plugins.mailchimp.length) {
			for (i = 0; i < plugins.mailchimp.length; i++) {
				var $mailchimpItem = $(plugins.mailchimp[i]),
					$email = $mailchimpItem.find('input[type="email"]');

				// Required by MailChimp
				$mailchimpItem.attr('novalidate', 'true');
				$email.attr('name', 'EMAIL');

				$mailchimpItem.on('submit', $.proxy(function (e) {
					e.preventDefault();

					var $this = this;

					var data = {},
						url = $this.attr('action').replace('/post?', '/post-json?').concat('&c=?'),
						dataArray = $this.serializeArray(),
						$output = $("#" + $this.attr("data-form-output"));

					for (i = 0; i < dataArray.length; i++) {
						data[dataArray[i].name] = dataArray[i].value;
					}

					$.ajax({
						data: data,
						url: url,
						dataType: 'jsonp',
						error: function (resp, text) {
							$output.html('Server error: ' + text);

							setTimeout(function () {
								$output.removeClass("active");
							}, 4000);
						},
						success: function (resp) {
							$output.html(resp.msg).addClass('active');

							setTimeout(function () {
								$output.removeClass("active");
							}, 6000);
						},
						beforeSend: function (data) {
							// Stop request if builder or inputs are invalide
							if (isNoviBuilder || !isValidated($this.find('[data-constraints]')))
								return false;

							$output.html('Submitting...').addClass('active');
						}
					});

					// Clear inputs after submit
					var inputs = $this[0].getElementsByTagName('input');
					for (var i = 0; i < inputs.length; i++) inputs[i].value = '';

					return false;
				}, $mailchimpItem));
			}
		}

		// Campaign Monitor ajax subscription
		if (plugins.campaignMonitor.length) {
			for (i = 0; i < plugins.campaignMonitor.length; i++) {
				var $campaignItem = $(plugins.campaignMonitor[i]);

				$campaignItem.on('submit', $.proxy(function (e) {
					var data = {},
						url = this.attr('action'),
						dataArray = this.serializeArray(),
						$output = $("#" + plugins.campaignMonitor.attr("data-form-output")),
						$this = $(this);

					for (i = 0; i < dataArray.length; i++) {
						data[dataArray[i].name] = dataArray[i].value;
					}

					$.ajax({
						data: data,
						url: url,
						dataType: 'jsonp',
						error: function (resp, text) {
							$output.html('Server error: ' + text);

							setTimeout(function () {
								$output.removeClass("active");
							}, 4000);
						},
						success: function (resp) {
							$output.html(resp.Message).addClass('active');

							setTimeout(function () {
								$output.removeClass("active");
							}, 6000);
						},
						beforeSend: function (data) {
							// Stop request if builder or inputs are invalide
							if (isNoviBuilder || !isValidated($this.find('[data-constraints]')))
								return false;

							$output.html('Submitting...').addClass('active');
						}
					});

					// Clear inputs after submit
					var inputs = $this[0].getElementsByTagName('input');
					for (var i = 0; i < inputs.length; i++) inputs[i].value = '';

					return false;
				}, $campaignItem));
			}
		}

		// RD Mailform
		if (plugins.rdMailForm.length) {
			var i, j, k,
				msg = {
					'MF000': 'Successfully sent!',
					'MF001': 'Recipients are not set!',
					'MF002': 'Form will not work locally!',
					'MF003': 'Please, define email field in your form!',
					'MF004': 'Please, define type of your form!',
					'MF254': 'Something went wrong with PHPMailer!',
					'MF255': 'Aw, snap! Something went wrong.'
				};

			for (i = 0; i < plugins.rdMailForm.length; i++) {
				var $form = $(plugins.rdMailForm[i]),
					formHasCaptcha = false;

				$form.attr('novalidate', 'novalidate').ajaxForm({
					data: {
						"form-type": $form.attr("data-form-type") || "contact",
						"counter": i
					},
					beforeSubmit: function (arr, $form, options) {
						if (isNoviBuilder)
							return;

						var form = $(plugins.rdMailForm[this.extraData.counter]),
							inputs = form.find("[data-constraints]"),
							output = $("#" + form.attr("data-form-output")),
							captcha = form.find('.recaptcha'),
							captchaFlag = true;

						output.removeClass("active error success");

						if (isValidated(inputs, captcha)) {

							// veify reCaptcha
							if (captcha.length) {
								var captchaToken = captcha.find('.g-recaptcha-response').val(),
									captchaMsg = {
										'CPT001': 'Please, setup you "site key" and "secret key" of reCaptcha',
										'CPT002': 'Something wrong with google reCaptcha'
									};

								formHasCaptcha = true;

								$.ajax({
									method: "POST",
									url: "bat/reCaptcha.php",
									data: {'g-recaptcha-response': captchaToken},
									async: false
								})
									.done(function (responceCode) {
										if (responceCode !== 'CPT000') {
											if (output.hasClass("snackbars")) {
												output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + captchaMsg[responceCode] + '</span></p>')

												setTimeout(function () {
													output.removeClass("active");
												}, 3500);

												captchaFlag = false;
											} else {
												output.html(captchaMsg[responceCode]);
											}

											output.addClass("active");
										}
									});
							}

							if (!captchaFlag) {
								return false;
							}

							form.addClass('form-in-process');

							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>');
								output.addClass("active");
							}
						} else {
							return false;
						}
					},
					error: function (result) {
						if (isNoviBuilder)
							return;

						var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output")),
							form = $(plugins.rdMailForm[this.extraData.counter]);

						output.text(msg[result]);
						form.removeClass('form-in-process');

						if (formHasCaptcha) {
							grecaptcha.reset();
						}
					},
					success: function (result) {
						if (isNoviBuilder)
							return;

						var form = $(plugins.rdMailForm[this.extraData.counter]),
							output = $("#" + form.attr("data-form-output")),
							select = form.find('select');

						form
							.addClass('success')
							.removeClass('form-in-process');

						if (formHasCaptcha) {
							grecaptcha.reset();
						}

						result = result.length === 5 ? result : 'MF255';
						output.text(msg[result]);

						if (result === "MF000") {
							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active success");
							}
						} else {
							if (output.hasClass("snackbars")) {
								output.html(' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active error");
							}
						}

						form.clearForm();

						if (select.length) {
							select.select2("val", "");
						}

						form.find('input, textarea').trigger('blur');

						setTimeout(function () {
							output.removeClass("active error success");
							form.removeClass('success');
						}, 3500);
					}
				});
			}
		}


		/**
		 * Is Mac os
		 * @description  add additional class on html if mac os.
		 */
		if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac-os");

		/**
		 * IE Polyfills
		 * @description  Adds some loosing functionality to IE browsers
		 */
		if (isIE) {
			if (isIE < 10) {
				$html.addClass("lt-ie-10");
			}

			if (isIE < 11) {
				if (plugins.pointerEvents) {
					$.getScript(plugins.pointerEvents)
						.done(function () {
							$html.addClass("ie-10");
							PointerEventsPolyfill.initialize({});
						});
				}
			}

			if (isIE === 11) {
				$("html").addClass("ie-11");
			}

			if (isIE === 12) {
				$("html").addClass("ie-edge");
			}
		}

		if (plugins.lightGallery.length) {
			for (var i = 0; i < plugins.lightGallery.length; i++) {
				initLightGallery(plugins.lightGallery[i]);
			}
		}

		// lightGallery item
		if (plugins.lightGalleryItem.length) {
			// Filter carousel items
			var notCarouselItems = [];

			for (var z = 0; z < plugins.lightGalleryItem.length; z++) {
				if (!$(plugins.lightGalleryItem[z]).parents('.owl-carousel').length &&
					!$(plugins.lightGalleryItem[z]).parents('.swiper-slider').length &&
					!$(plugins.lightGalleryItem[z]).parents('.slick-slider').length) {
					notCarouselItems.push(plugins.lightGalleryItem[z]);
				}
			}

			plugins.lightGalleryItem = notCarouselItems;

			for (var i = 0; i < plugins.lightGalleryItem.length; i++) {
				initLightGalleryItem(plugins.lightGalleryItem[i]);
			}
		}

		// Dynamic lightGallery
		if (plugins.lightDynamicGalleryItem.length) {
			for (var i = 0; i < plugins.lightDynamicGalleryItem.length; i++) {
				initDynamicLightGallery(plugins.lightDynamicGalleryItem[i]);
			}
		}

		// RD Google Maps
		if (plugins.rdGoogleMaps.length) {
			$.getScript("//maps.google.com/maps/api/js?key=AIzaSyAwH60q5rWrS8bXwpkZwZwhw9Bw0pqKTZM&sensor=false&libraries=geometry,places&v=3.7", function () {
				var head = document.getElementsByTagName('head')[0],
					insertBefore = head.insertBefore;

				head.insertBefore = function (newElement, referenceElement) {
					if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') !== -1 || newElement.innerHTML.indexOf('gm-style') !== -1) {
						return;
					}
					insertBefore.call(head, newElement, referenceElement);
				};

				for (var i = 0; i < plugins.rdGoogleMaps.length; i++) {
					var $googleMapItem = $(plugins.rdGoogleMaps[i]);

					lazyInit($googleMapItem, $.proxy(function () {
						var $this = $(this),
							styles = $this.attr("data-styles");

						$this.googleMap({
							marker: {
								basic: $this.data('marker'),
								active: $this.data('marker-active')
							},
							styles: styles ? JSON.parse(styles) : [],
							onInit: function (map) {
								var inputAddress = $('#rd-google-map-address');


								if (inputAddress.length) {
									var input = inputAddress;
									var geocoder = new google.maps.Geocoder();
									var marker = new google.maps.Marker(
										{
											map: map,
											icon: $this.data('marker-url')
										}
									);

									var autocomplete = new google.maps.places.Autocomplete(inputAddress[0]);
									autocomplete.bindTo('bounds', map);
									inputAddress.attr('placeholder', '');
									inputAddress.on('change', function () {
										$("#rd-google-map-address-submit").trigger('click');
									});
									inputAddress.on('keydown', function (e) {
										if (e.keyCode === 13) {
											$("#rd-google-map-address-submit").trigger('click');
										}
									});


									$("#rd-google-map-address-submit").on('click', function (e) {
										e.preventDefault();
										var address = input.val();
										geocoder.geocode({'address': address}, function (results, status) {
											if (status === google.maps.GeocoderStatus.OK) {
												var latitude = results[0].geometry.location.lat();
												var longitude = results[0].geometry.location.lng();

												map.setCenter(new google.maps.LatLng(
													parseFloat(latitude),
													parseFloat(longitude)
												));
												marker.setPosition(new google.maps.LatLng(
													parseFloat(latitude),
													parseFloat(longitude)
												))
											}
										});
									});
								}
							}
						});
					}, $googleMapItem));
				}
			});
		}

		/**
		 * Select2
		 * @description Enables select2 plugin
		 */
		if (plugins.selectFilter.length) {
			var i;
			for (i = 0; i < plugins.selectFilter.length; i++) {
				var select = $(plugins.selectFilter[i]);

				select.select2({
					placeholder: select.attr("data-placeholder") ? select.attr("data-placeholder") : false,
					minimumResultsForSearch: select.attr("data-minimum-results-search") ? select.attr("data-minimum-results-search") :  -1,
					maximumSelectionSize: 3
				});
			}
		}

		/**
		 START RESIZE
		 */
		$window.resize(function (event) {
			// Bootsnav menu work with eualize height
			$("nav.navbar.bootsnav ul.nav").each(function () {
				$("li.dropdown", this).on("mouseenter", function (e) {
					if ($window.width() > 991) {
						$(this).find('.equalize').equalize({equalize: 'outerHeight', reset: true});
						return false;
					}
				});
			});

			setTimeout(function () {
				SetResizeContent();
			}, 500);
			event.preventDefault();
		});
		/**
		 END RESIZE
		 */


		/**
		 START READY
		 */
		// Bootsnav menu work with eualize height
		$("nav.navbar.bootsnav ul.nav").each(function () {
			$("li.dropdown", this).on("mouseenter", function () {
				if ($window.width() > 991) {
					$(this).find('.equalize').equalize({equalize: 'outerHeight', reset: true});
					return false;
				}
			});
		});
		// Bootsnav tab work with eualize height
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var target = $(e.target).attr("href");
			if ($window.width() > 991) {
				$(target).find('.equalize').equalize({equalize: 'outerHeight', reset: true});
				return false;
			}
		});

		// Active class to current menu for only html
		var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
		var $hash = window.location.hash.substring(1);

		if ($hash) {
			$hash = "#" + $hash;
			pgurl = pgurl.replace($hash, "");
		} else {
			pgurl = pgurl.replace("#", "");
		}

		$(".nav li a").each(function () {
			if ($(this).attr("href") == pgurl || $(this).attr("href") == pgurl + '.html') {
				$(this).parent().addClass("active");
				$(this).parents('li.dropdown').addClass("active");
			}
		});


		/**
		 swiper slider
		 */
		var swiperFull = new Swiper('.swiper-full-screen', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			loop: isNoviBuilder ? false : true,
			autoplay: isNoviBuilder ? false : 5000,
			slidesPerView: 1,
			keyboardControl: true,
			preventClicks: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
      simulateTouch: isNoviBuilder ? false : true,
		});

		var swiperAutoFade = new Swiper('.swiper-auto-fade', {
			pagination: '.swiper-pagination',
			loop: isNoviBuilder ? false : true,
			autoplay: isNoviBuilder ? false : 3000,
			slidesPerView: 1,
			paginationClickable: true,
			keyboardControl: true,
			preventClicks: false,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev'
		});

		var swiperSecond = new Swiper('.swiper-slider-second', {
			pagination: '.swiper-pagination-second',
			slidesPerView: 1,
			paginationClickable: true,
			keyboardControl: true,
			preventClicks: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev'
		});

		var swiperThird = new Swiper('.swiper-slider-third', {
			pagination: '.swiper-pagination-third',
			slidesPerView: 1,
			paginationClickable: true,
			keyboardControl: true,
			preventClicks: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev'
		});

		var swiperNumber = new Swiper('.swiper-number-pagination', {
			pagination: '.swiper-number',
			paginationClickable: true,
      autoplay: isNoviBuilder ? false : 4000,
			preventClicks: false,
			autoplayDisableOnInteraction: false,
			paginationBulletRender: function (swiper, index, className) {
				return '<span class="' + className + '">' + pad((index + 1)) + '</span>';
			}
		});

		var swiperVerticalPagination = new Swiper('.swiper-vertical-pagination', {
			pagination: '.swiper-pagination-white',
			direction: 'vertical',
			slidesPerView: 1,
			paginationClickable: true,
			spaceBetween: 0,
			preventClicks: false,
			mousewheelControl: true
		});

		var swiperClients = new Swiper('.swiper-slider-clients', {
			pagination: null,
			slidesPerView: 4,
			paginationClickable: true,
      autoplay: isNoviBuilder ? false : 3000,
			preventClicks: false,
			autoplayDisableOnInteraction: false,
			breakpoints: {
				480: {
					slidesPerView: 1
				},
				650: {
					slidesPerView: 2
				},
				850: {
					slidesPerView: 3
				}
			}
		});

		var swiperThreeSlides = new Swiper('.swiper-three-slides', {
			pagination: '.swiper-pagination-three-slides',
			paginationClickable: true,
			slidesPerView: 3,
			keyboardControl: true,
			mousewheelControl: false,
			preventClicks: false,
			nextButton: '.second-swiper-button-next',
			prevButton: '.second-swiper-button-prev',
			breakpoints: {
				480: {
					slidesPerView: 1
				},
				767: {
					slidesPerView: 2
				},
				850: {
					slidesPerView: 2
				}
			}
		});

		var swiperFourSlides = new Swiper('.swiper-four-slides', {
			pagination: '.swiper-pagination-four-slides',
      autoplay: isNoviBuilder ? false : 3000,
			slidesPerView: 4,
			paginationClickable: true,
			keyboardControl: true,
			mousewheelControl: false,
			preventClicks: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			breakpoints: {
				850: {
					slidesPerView: 2
				},
				650: {
					slidesPerView: 2
				},
				480: {
					slidesPerView: 1
				}
			}
		});

		var swiperDemoHeaderStyle = new Swiper('.swiper-demo-header-style', {
			pagination: '.swiper-pagination-demo-header-style',
			loop: true,
      autoplay: isNoviBuilder ? false : 3000,
			slidesPerView: 4,
			paginationClickable: true,
			keyboardControl: true,
			mousewheelControl: false,
			preventClicks: true,
			slidesPerGroup: 4,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			breakpoints: {
				1199: {
					slidesPerGroup: 2,
					slidesPerView: 2
				},
				767: {
					slidesPerGroup: 1,
					slidesPerView: 1
				}
			}
		});

		var swiperAutoSlideIndex = 0;
		var swiperAutoSlide = new Swiper('.swiper-auto-width', {
			scrollbar: '.swiper-scrollbar',
			scrollbarHide: false,
			scrollbarDraggable: true,
			slidesPerView: 'auto',
			centeredSlides: true,
			spaceBetween: 80,
			preventClicks: false,
			scrollbarSnapOnRelease: true,
			nextButton: '.swiper-next-style2',
			prevButton: '.swiper-prev-style2',
			mousewheelControl: true,
			speed: 1000,
			keyboardControl: true,
			breakpoints: {
				1199: {
					spaceBetween: 60
				},
				960: {
					spaceBetween: 30
				},
				767: {
					spaceBetween: 15
				}
			},
			onSlideChangeEnd: function (swiper) {
				swiperAutoSlideIndex = swiper.activeIndex;
			}
		});

		var swiperMultipurpose = new Swiper('.swiper-bottom-scrollbar-full', {
			scrollbar: '.swiper-scrollbar',
			scrollbarHide: false,
			scrollbarDraggable: true,
			slidesPerView: 'auto',
			scrollbarSnapOnRelease: true,
			grabCursor: true,
			preventClicks: false,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			mousewheelControl: true,
			spaceBetween: 30,
			keyboardControl: true,
			speed: 1000,
			breakpoints: {
				767: {
					direction: 'vertical',
					//slidesPerView: 1,
					scrollbarHide: true,
					spaceBetween: 0,
					pagination: false,
					autoHeight: true
				}
			}
		});

		var swiperAutoHieght = new Swiper('.swiper-auto-height-container', {
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			effect: 'fade',
			loop: isNoviBuilder ? false : true,
			preventClicks: false,
			autoHeight: true
		});

		var swiperMultyRow = new Swiper('.swiper-multy-row-container', {
			nextButton: '.swiper-portfolio-next',
			prevButton: '.swiper-portfolio-prev',
			slidesPerView: 4,
			spaceBetween: 15,
			scrollbarSnapOnRelease: true,
			autoplay: isNoviBuilder ? false  : 3000,
			autoplayDisableOnInteraction: true,
			breakpoints: {
				991: {
					slidesPerView: 2
				},
				767: {
					slidesPerView: 1
				}
			}
		});

		var swiperBlog = new Swiper('.swiper-blog', {
			slidesPerView: "auto",
			centeredSlides: true,
			spaceBetween: 15,
			scrollbarSnapOnRelease: true,
			autoplay: isNoviBuilder ? false : 5000,
			autoplayDisableOnInteraction: true,
			preventClicks: false,
			loop: isNoviBuilder ? false : true,
			loopedSlides: 3
		});

		var swiperPresentation = new Swiper('.swiper-presentation', {
			slidesPerView: 4,
			centeredSlides: false,
			spaceBetween: 30,
			scrollbarSnapOnRelease: true,
			autoplay: {
				delay: 300,
				reverseDirection: true
			},
			speed: 2800,
			autoplayDisableOnInteraction: true,
			preventClicks: true,
			loop: true,
			loopedSlides: 6,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			breakpoints: {
				991: {
					spaceBetween: 15,
					slidesPerView: 2,
					autoplay: false,
					speed: 300,
				},
				767: {
					slidesPerView: 1
				}
			}
		});
		//swiper resize for IE
		if (isIE) {
			setTimeout(function () {
				$document.imagesLoaded(function () {
					if ($(".swiper-full-screen").length > 0)
						swiperFull.onResize()
					if ($(".swiper-auto-fade").length > 0)
						swiperAutoFade.onResize()
					if ($(".swiper-number-pagination").length > 0)
						swiperNumber.onResize()
					if ($(".swiper-slider-clients").length > 0)
						swiperClients.onResize()
					if ($(".swiper-slider-second").length > 0)
						swiperSecond.onResize()
					if ($(".swiper-slider-third").length > 0)
						swiperThird.onResize()
					if ($(".swiper-three-slides").length > 0)
						swiperThreeSlides.onResize()
					if ($(".swiper-four-slides").length > 0)
						swiperFourSlides.onResize()
					if ($(".swiper-vertical-pagination").length > 0)
						swiperVerticalPagination.onResize()
					if ($(".swiper-auto-height-container").length > 0)
						swiperAutoHieght.onResize()
					if ($(".swiper-multy-row-container").length > 0)
						swiperMultyRow.onResize()
					if ($(".swiper-blog").length > 0)
						swiperBlog.onResize()
					if ($(".swiper-swiperPresentation").length > 0)
						swiperPresentation.onResize()
					if ($(".swiper-demo-header-style").length > 0)
						swiperDemoHeaderStyle.onResize()
				});
			}, 300);
		}

		$window.resize(function () {
			setTimeout(function () {
				if ($(".swiper-full-screen").length > 0)
					swiperFull.onResize()
				if ($(".swiper-auto-fade").length > 0)
					swiperAutoFade.onResize()
				if ($(".swiper-number-pagination").length > 0)
					swiperNumber.onResize()
				if ($(".swiper-slider-second").length > 0)
					swiperSecond.onResize()
				if ($(".swiper-slider-third").length > 0)
					swiperThird.onResize()
				if ($(".swiper-three-slides").length > 0)
					swiperThreeSlides.onResize()
				if ($(".swiper-four-slides").length > 0)
					swiperFourSlides.onResize()
				if ($(".swiper-vertical-pagination").length > 0)
					swiperVerticalPagination.onResize()
				if ($(".swiper-auto-height-container").length > 0)
					swiperAutoHieght.onResize()
				if ($(".swiper-multy-row-container").length > 0)
					swiperMultyRow.onResize()
				if ($(".swiper-blog").length > 0)
					swiperBlog.onResize()
				if ($(".swiper-swiperPresentation").length > 0)
					swiperPresentation.onResize()
				if ($(".swiper-demo-header-style").length > 0)
					swiperDemoHeaderStyle.onResize()
			}, 500);

			setTimeout(function () {
				//destroy swiper
				var window_width = $window.width();
				if (window_width < 768) {
					if ($(".swiper-bottom-scrollbar-full").length > 0) {
						if (swiperMultipurpose) {
							swiperMultipurpose.detachEvents();
							swiperMultipurpose.destroy(true, true);
							swiperMultipurpose = undefined;
						}

						swiperMultipurpose = new Swiper('.swiper-bottom-scrollbar-full', {
							scrollbar: '.swiper-scrollbar',
							scrollbarHide: false,
							scrollbarDraggable: true,
							slidesPerView: 'auto',
							scrollbarSnapOnRelease: true,
							grabCursor: true,
							preventClicks: false,
							nextButton: '.swiper-button-next',
							prevButton: '.swiper-button-prev',
							mousewheelControl: true,
							spaceBetween: 30,
							keyboardControl: true,
							speed: 1000,
							breakpoints: {
								767: {
									direction: 'vertical',
									//slidesPerView: 1,
									scrollbarHide: true,
									spaceBetween: 0,
									pagination: false,
									autoHeight: true
								}
							}
						});
					}
				} else {
					if ($(".swiper-bottom-scrollbar-full").length > 0) {
						if (swiperMultipurpose) {
							swiperMultipurpose.detachEvents();
							swiperMultipurpose.destroy(true, true);
							swiperMultipurpose = undefined;
						}
						swiperMultipurpose = new Swiper('.swiper-bottom-scrollbar-full', {
							scrollbar: '.swiper-scrollbar',
							scrollbarHide: false,
							scrollbarDraggable: true,
							slidesPerView: 'auto',
							scrollbarSnapOnRelease: true,
							grabCursor: true,
							preventClicks: false,
							nextButton: '.swiper-button-next',
							prevButton: '.swiper-button-prev',
							mousewheelControl: true,
							spaceBetween: 30,
							keyboardControl: true,
							speed: 1000
						});
					}
				}
			}, 500);

			if ($(".swiper-auto-width").length > 0 && swiperAutoSlide) {
				swiperAutoSlide.detachEvents();
				swiperAutoSlide.destroy(true);
				swiperAutoSlide = undefined;
				$(".swiper-auto-width .swiper-wrapper").css("transform", "").css("transition-duration", "");
				$(".swiper-auto-width .swiper-slide").css("margin-right", "");

				setTimeout(function () {
					swiperAutoSlide = new Swiper('.swiper-auto-width', {
						scrollbar: '.swiper-scrollbar',
						scrollbarHide: false,
						scrollbarDraggable: true,
						slidesPerView: 'auto',
						centeredSlides: true,
						spaceBetween: 80,
						preventClicks: false,
						scrollbarSnapOnRelease: true,
						nextButton: '.swiper-next-style2',
						prevButton: '.swiper-prev-style2',
						mousewheelControl: true,
						speed: 1000,
						keyboardControl: true,
						breakpoints: {
							1199: {
								spaceBetween: 60
							},
							960: {
								spaceBetween: 30
							},
							767: {
								spaceBetween: 15
							}
						},
						onSlideChangeEnd: function (swiper) {
							swiperAutoSlideIndex = swiper.activeIndex;
						}
					});

					swiperAutoSlide.slideTo(swiperAutoSlideIndex, 1000, false);
				}, 1000);
			}
		});


		/**
		 *PieChart For Onepage - START CODE
		 */
		if ($('.chart1').length > 0) {
			$('.chart1').appear();
			$('.chart1').easyPieChart({
				barColor: '#929292',
				trackColor: '#d9d9d9',
				scaleColor: false,
				easing: 'easeInOut',
				scaleLength: 1,
				lineCap: 'round',
				lineWidth: 3, //12
				size: 150, //110
				animate: {
					duration: 2000,
					enabled: true
				},
				onStep: function (from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				}
			});
			$(document.body).on('appear', '.chart1', function (e) {
				// this code is executed for each appeared element
				if (!$(this).hasClass('appear')) {
					$(this).addClass('appear');
					$(this).data('easyPieChart').update(0).update($(this).data('percent'));
				}
			});
		}

		if ($('.chart2').length > 0) {
			$('.chart2').appear();
			$('.chart2').easyPieChart({
				easing: 'easeInOut',
				barColor: '#446cff',
				trackColor: '#c7c7c7',
				scaleColor: false,
				scaleLength: 1,
				lineCap: 'round',
				lineWidth: 2, //12
				size: 120, //110
				animate: {
					duration: 2000,
					enabled: true
				},
				onStep: function (from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				}
			});
			$(document.body).on('appear', '.chart2', function (e) {
				// this code is executed for each appeared element
				if (!$(this).hasClass('appear')) {
					$(this).addClass('appear');
					$(this).data('easyPieChart').update(0).update($(this).data('percent'));
				}
			});
		}

		if ($('.chart3').length > 0) {
			$('.chart3').appear();
			$('.chart3').easyPieChart({
				easing: 'easeInOut',
				barColor: '#446cff',
				trackColor: '',
				scaleColor: false,
				scaleLength: 1,
				lineCap: 'round',
				lineWidth: 3, //12
				size: 140, //110
				animate: {
					duration: 2000,
					enabled: true
				},
				onStep: function (from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				}
			});
			$(document.body).on('appear', '.chart3', function (e) {
				// this code is executed for each appeared element
				if (!$(this).hasClass('appear')) {
					$(this).addClass('appear');
					$(this).data('easyPieChart').update(0).update($(this).data('percent'));
				}
			});
		}


		var scrollAnimationTime = 1200, scrollAnimation = 'easeInOutExpo';
		$('a.scrollto').on('click.smoothscroll', function (event) {
			event.preventDefault();
			var target = this.hash;
			if ($(target).length != 0) {
				$('html, body').stop()
					.animate({
						'scrollTop': $(target)
							.offset()
							.top
					}, scrollAnimationTime, scrollAnimation, function () {
						window.location.hash = target;
					});
			}
		});
		// Inner links
		if ($('.navbar-top').length > 0 || $('.navbar-scroll-top').length > 0 || $('.nav-top-scroll').length > 0) {
			$('.inner-link').smoothScroll({
				speed: 900,
				offset: 0
			});
		} else {
			$('.inner-link').smoothScroll({
				speed: 900,
				offset: -59
			});
		}

		$('.section-link').smoothScroll({
			speed: 900,
			offset: 1
		});


		/**
		 PieChart For Onepage - END CODE
		 */

		/**
		 *portfolio filter
		 */
		var $portfolio_filter = $('.portfolio-grid');
		$portfolio_filter.imagesLoaded(function () {
			$portfolio_filter.isotope({
				layoutMode: 'masonry',
				itemSelector: '.grid-item',
				percentPosition: true,
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});
			$portfolio_filter.isotope();
		});
		var $grid_selectors = $('.portfolio-filter > li > a');
		$grid_selectors.on('click', function (event) {
			setTimeout(function () {
				$grid_selectors.parents('.portfolio-filter').removeClass('active');
			}, 300);
			$grid_selectors.parent().removeClass('active');
			$(this).parent().addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio_filter.find('.grid-item').removeClass('animated').css("visibility", ""); // avoid problem to filter after sorting
			$portfolio_filter.find('.grid-item').each(function () {
				/**remove perticular element from WOW array when you don't want animation on element after DOM lead */
				if ($html.hasClass("wow-animation") && !isNoviBuilder && isDesktop ) {
					wow.removeBox(this);
				}
				$(this).css("-webkit-animation", "none");
				$(this).css("-moz-animation", "none");
				$(this).css("-ms-animation", "none");
				$(this).css("animation", "none");
			});
			$portfolio_filter.isotope({filter: selector});
			return false;
		});
		$window.resize(function () {
			if (!isMobile && !isiPhoneiPad) {
				setTimeout(function () {
					$portfolio_filter.find('.grid-item').removeClass('wow').removeClass('animated'); // avoid problem to filter after window resize
					$portfolio_filter.isotope('layout');
				}, 300);
			}
		});
		var $blog_filter = $('.blog-grid');
		$blog_filter.imagesLoaded(function () {
			$blog_filter.isotope({
				layoutMode: 'masonry',
				itemSelector: '.grid-item',
				percentPosition: true,
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});
		});
		$window.resize(function () {
			setTimeout(function () {
				$blog_filter.find('.grid-item').removeClass('wow').removeClass('animated'); // avoid problem to filter after window resize
				$blog_filter.isotope('layout');
			}, 300);
		});

		/***/
		//Modal popup - START CODE
		/***/
		$('.modal-popup').magnificPopup({
			type: 'inline',
			preloader: false,
			// modal: true,
			blackbg: true
		});
		$('.popup-modal-dismiss').on('click', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
		/**
		 *Modal popup - END CODE
		 */

		/**
		 *Modal popup - zoom animation - START CODE
		 */
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			blackbg: true,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			blackbg: true,
			mainClass: 'my-mfp-slide-bottom'
		});
		/**
		 *Modal popup - zoom animation - END CODE
		 */

		/**
		 popup with form
		 */
		$('.popup-with-form').magnificPopup({
			type: 'inline',
			preloader: false,
			closeBtnInside: false,
			fixedContentPos: true,
			focus: '#name',
			callbacks: {
				beforeOpen: function () {
					if ($window.width() < 700) {
						this.st.focus = false;
					} else {
						this.st.focus = '#name';
					}
				}
			}
		});
		/**
		 video magnific popup
		 */
		$('.popup-youtube, .popup-vimeo, .popup-googlemap').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: true,
			closeBtnInside: false
		});
		/**
		 ajax magnific popup for onepage portfolio
		 */
		$('.ajax-popup').magnificPopup({
			type: 'ajax',
			alignTop: true,
			fixedContentPos: true,
			overflowY: 'scroll', // as we know that popup content is tall we set scroll overflow by default to avoid jump
			callbacks: {
				open: function () {
					$('.navbar .collapse').removeClass('in');
					$('.navbar a.dropdown-toggle').addClass('collapsed');
				}
			}
		});

		/**
		 mega menu width
		 */
		$("ul.mega-menu-full").each(function (idx, elm) {
			var megaMenuWidth = 0;
			$(this).children('li').each(function (idx, elm) {
				var LIheight = 0;

				megaMenuWidth += $(this).outerWidth();
			});
			$(this).width(megaMenuWidth + 95);
			megaMenuWidth = 0;
		});
		/**
		 fit videos
		 */
		$(".fit-videos").fitVids();

		/**
		 wow animation - on scroll
		 */
		var wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: false,
			live: true
		});

		if ($html.hasClass("wow-animation") && !isNoviBuilder && isDesktop ) {
			$window.imagesLoaded(function () {
				wow.init();
			});
		}


		/**
		 counter
		 */
		$(function ($) {
			animatecounters();
		});


		function animatecounters() {
			$('.timer').each(count);

			function count(options) {
				var $this = $(this);
				options = $.extend({}, options || {}, $this.data('countToOptions') || {});
				$this.countTo(options);
			}
		}

		/**
		 counter number reset while scrolling
		 */
		$('.timer').appear();
		$(document.body).on('appear', '.timer', function (e) {
			// this code is executed for each appeared element
			if (!$(this).hasClass('appear')) {
				animatecounters();
				$(this).addClass('appear');
			}
		});
		$('.countdown').countdown($('.countdown').attr("data-enddate")).on('update.countdown', function (event) {
			$(this).html(event.strftime('' + '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span>Day%!d</span></div>' + '<div class="counter-box"><div class="number">%H</div><span>Hours</span></div>' + '<div class="counter-box"><div class="number">%M</div><span>Minutes</span></div>' + '<div class="counter-box last"><div class="number">%S</div><span>Seconds</span></div></div>'))
		});
		/**
		 left nav
		 */
		$('.right-menu-button').on('click', function (e) {
			$('body').toggleClass('left-nav-on');
		});
		/**
		 *    hamburger menu
		 */
		$('.btn-hamburger').on('click', function (e) {
			e.stopImmediatePropagation();
			if ($('.hamburger-menu').hasClass('show-menu')) {
				$('.hamburger-menu').removeClass('show-menu')

			} else {
				$('.hamburger-menu').addClass('show-menu');
				$('body').removeClass('show-menu');
			}

		});
		/**
		 *sidebar nav open
		 */
		$('#mobileToggleSidenav').on('click', function (e) {
			e.stopImmediatePropagation();
			$(this).closest('nav').toggleClass('sidemenu-open');
		});
		/**
		 //justified Gallery
		 */
		$document.imagesLoaded(function () {
			if ($(".justified-gallery").length > 0) {
				$(".justified-gallery").justifiedGallery({
					rowHeight: 400,
					maxRowHeight: false,
					captions: true,
					margins: 10,
					waitThumbnailsLoad: true
				});
			}
		});

		$('.atr-nav').on("click", function () {
			$(".atr-div").append("<a class='close-cross' href='#'>X</a>");
			$(".atr-div").animate({
				width: "toggle"
			});
		});

		$('.close-cross').on("click", function () {
			$(".atr-div").hide();
		});

		var menuRight = document.getElementById('cbp-spmenu-s2'),
			showRightPush = document.getElementById('showRightPush'),
			body = document.body;
		if (showRightPush) {
			showRightPush.onclick = function () {
				classie.toggle(this, 'active');

				if (menuRight)
					classie.toggle(menuRight, 'cbp-spmenu-open');
			};
		}

		var test = document.getElementById('close-pushmenu');
		if (test) {
			test.onclick = function () {
				classie.toggle(this, 'active');
				if (menuRight)
					classie.toggle(menuRight, 'cbp-spmenu-open');
			};
		}

		//blog page header animation
		$(".blog-header-style1 li").on('mouseover', function () {
			$('.blog-header-style1 li.blog-column-active').removeClass('blog-column-active');
			$(this).addClass('blog-column-active');
		}).on('mouseleave', function () {
			$(this).removeClass('blog-column-active');
			$('.blog-header-style1 li:first-child').addClass('blog-column-active');
		});
		/**
		 *big menu open close start
		 */
		$('.big-menu-open').on("click", function () {
			$('.big-menu-right').addClass("open");
		});
		$('.big-menu-close').on("click", function () {
			$('.big-menu-right').removeClass("open");
		});
		/**
		 *big menu open close end
		 */


		/**
		 * RD Instafeed JS
		 * @description Enables Instafeed JS
		 */
		if (plugins.instafeed.length > 0) {
			for (var i = 0; i < plugins.instafeed.length; i++) {
				var instafeedItem = $(plugins.instafeed[i]);
				instafeedItem.RDInstafeed({
					accessToken: '5526956400.ba4c844.c832b2a554764bc8a1c66c39e99687d7',
					clientId: ' c832b2a554764bc8a1c66c39e99687d7',
					userId: '5526956400',
					showLog: false
				});
			}
		}

		/**
		 instagramfeed
		 */
		if ($('#instaFeed-style1').length != 0) {
			var instaFeedStyle1 = new Instafeed({
				target: 'instaFeed-style1',
				get: 'tagged',
				tagName: 'instagood',
				userId: 5640046896,
				limit: '8',
				accessToken: '5526956400.ba4c844.c832b2a554764bc8a1c66c39e99687d7',
				resolution: "standard_resolution",
				error: {
					template: '<div class="col-md-12 col-sm-12 col-xs-12"><span class=text-center>No Images Found</span></div>'
				},
				template: '<div class="col-md-3 col-sm-6 col-xs-12 instafeed-style1"><a class="insta-link" href="{{link}}" target="_blank"><img src="{{image}}" class="insta-image" /><div class="insta-counts"><span><i class="ti-heart"></i> <span class="count-number">{{likes}}</span></span><span><i class="ti-comment"></i> <span class="count-number">{{comments}}</span></span></div></a></div>'
			});
			instaFeedStyle1.run();
		}

		if ($('#instaFeed-aside').length != 0) {
			var instaFeedAside = new Instafeed({
				target: 'instaFeed-aside',
				get: 'tagged',
				tagName: 'instagood',
				userId: 5640046896,
				limit: '6',
				accessToken: '5526956400.ba4c844.c832b2a554764bc8a1c66c39e99687d7',
				resolution: "standard_resolution",
				after: function () {
					equalizeHeight();
				},
				error: {
					template: '<div class="col-md-12 col-sm-12 col-xs-12"><span class=text-center>No Images Found</span></div>'
				},
				template: '<li><figure><a href="{{link}}" target="_blank"><img src="{{image}}" class="insta-image" /><span class="insta-counts"><i class="ti-heart"></i>{{likes}}</span></a></figure></li>'
			});
			instaFeedAside.run();
		}

		if ($('#instaFeed-footer').length != 0) {
			var instaFeedFooter = new Instafeed({
				target: 'instaFeed-footer',
				get: 'tagged',
				tagName: 'instagood',
				userId: 5640046896,
				limit: '6',
				accessToken: '5526956400.ba4c844.c832b2a554764bc8a1c66c39e99687d7',
				resolution: "standard_resolution",
				after: function () {
					equalizeHeight();
				},
				error: {
					template: '<div class="col-md-12 col-sm-12 col-xs-12"><span class=text-center>No Images Found</span></div>'
				},
				template: '<li><figure><a href="{{link}}" target="_blank"><img src="{{image}}" class="insta-image" /><span class="insta-counts"><i class="ti-heart"></i><span>{{likes}}</span></span></a></figure></li>'
			});
			instaFeedFooter.run();
		}
		/***
		 instagramfeed end
		 */


		/****/
		//magnificPopup Start
		/****/
		$('.header-search-form').magnificPopup({
			mainClass: 'mfp-fade',
			closeOnBgClick: true,
			preloader: false,
			// for white backgriund
			fixedContentPos: false,
			closeBtnInside: false,
			callbacks: {
				open: function () {
					setTimeout(function () {
						$('.search-input').focus();
					}, 500);
					$('#search-header').parent().addClass('search-popup');
					if (!isMobile) {
						$('body').addClass('overflow-hidden');
						//$('body').addClass('position-fixed');
						$('body').addClass('width-100');
						document.onmousewheel = ScrollStop;
					} else {
						$('body, html').on('touchmove', function (e) {
							e.preventDefault();
						});
					}
				},
				close: function () {
					if (!isMobile) {
						$('body').removeClass('overflow-hidden');
						//$('body').removeClass('position-fixed');
						$('body').removeClass('width-100');
						$('#search-header input[type=text]').each(function (index) {
							if (index == 0) {
								$(this).val('');
								$("#search-header").find("input:eq(" + index + ")").css({
									"border": "none",
									"border-bottom": "2px solid rgba(255,255,255,0.5)"
								});
							}
						});
						document.onmousewheel = ScrollStart;
					} else {
						$('body, html').unbind('touchmove');
					}
				}
			}
		});

		/****/
		//magnificPopup End
		/****/
		$("input.search-input").on("keypress", function (event) {
			if (event.which == 13 && !isMobile) {
				$("button.search-button").trigger("click");
				event.preventDefault();
			}
		});

		$("input.search-input").on("keyup", function (event) {
			if ($(this).val() == null || $(this).val() == "") {
				$(this).css({"border": "none", "border-bottom": "2px solid red"});
			} else {
				$(this).css({"border": "none", "border-bottom": "2px solid rgba(255,255,255,0.5)"});
			}
		});

		$("form.search-form, form.search-form-result").submit(function (event) {
			var error = validationSearchForm();
			if (error) {
				var action = $(this).attr('action');
				action = action == '#' || action == '' ? 'blog-grid-3columns.html' : action;
				action = action + '?' + $(this).serialize();
				window.location = action;
			}

			event.preventDefault();
		});

		$document.on("click", '.navbar .navbar-collapse a.dropdown-toggle, .accordion-style1 .panel-heading a, .accordion-style2 .panel-heading a, .accordion-style3 .panel-heading a, .toggles .panel-heading a, .toggles-style2 .panel-heading a, .toggles-style3 .panel-heading a, a.carousel-control, .nav-tabs a[data-toggle="tab"], a.shopping-cart', function (e) {
			e.preventDefault();

		});

		$(".dropdown-toggle").dropdown();

		$('body').on('touchstart click', function (e) {
			if ($window.width() < 992) {
				if (!$('.navbar-collapse').has(e.target).is('.navbar-collapse') && $('.navbar-collapse').hasClass('in') && !$(e.target).hasClass('navbar-toggle')) {
					$('.navbar-collapse').collapse('hide');
				}
			} else {
				if (!$('.navbar-collapse').has(e.target).is('.navbar-collapse') && $('.navbar-collapse ul').hasClass('in')) {

					$('.navbar-collapse').find('a.dropdown-toggle').addClass('collapsed');
					$('.navbar-collapse').find('ul.dropdown-menu').removeClass('in');
					$('.navbar-collapse a.dropdown-toggle').removeClass('active');
				}
			}
		});

		$('.navbar-collapse a.dropdown-toggle').on('touchstart', function (e) {
			$('.navbar-collapse a.dropdown-toggle').not(this).removeClass('active');
			if ($(this).hasClass('active'))
				$(this).removeClass('active');
			else
				$(this).addClass('active');
		});

		$('button.navbar-toggle').on("click", function (e) {
			if (isMobile) {
				$(".cart-content").css('opacity', '0');
				$(".cart-content").css('visibility', 'hidden');
			}
		});

		$('a.dropdown-toggle').on("click", function (e) {
			if (isMobile) {
				$(".cart-content").css('opacity', '0');
				$(".cart-content").css('visibility', 'hidden');
			}
		});

		$('.navbar-collapse [data-toggle="dropdown"]').on('click', function (event) {

			var $innerLinkLI = $(this).parents('ul.navbar-nav').find('li.dropdown a.inner-link').parent('li.dropdown');
			if (!$(this).hasClass('inner-link') && $innerLinkLI.hasClass('open')) {
				$innerLinkLI.removeClass('open');
			}
			var target = $(this).attr('target');
			if ($window.width() <= 991 && $(this).attr('href') && $(this).attr('href').indexOf("#") <= -1 && !$(event.target).is('i')) {
				if (event.ctrlKey || event.metaKey) {
					window.open($(this).attr('href'), "_blank");
					return false;
				} else if (!target)
					window.location = $(this).attr('href');
				else
					window.open($(this).attr('href'), target);

			} else if ($window.width() > 991 && $(this).attr('href').indexOf("#") <= -1) {
				if (event.ctrlKey || event.metaKey) {
					window.open($(this).attr('href'), "_blank");
					return false;
				} else if (!target)
					window.location = $(this).attr('href');
				else
					window.open($(this).attr('href'), target);

			} else if ($window.width() <= 991 && $(this).attr('href') && $(this).attr('href').length > 1 && $(this).attr('href').indexOf("#") >= 0 && $(this).hasClass('inner-link')) {
				$(this).parents('ul.navbar-nav').find('li.dropdown').not($(this).parent('.dropdown')).removeClass('open');
				if ($(this).parent('.dropdown').hasClass('open')) {
					$(this).parent('.dropdown').removeClass('open');
				} else {
					$(this).parent('.dropdown').addClass('open');
				}
				$(this).toggleClass('active');
			}
		});

		/**
		 skillbar
		 */
		$('.skillbar').appear();
		$('.skillbar').skillBars({
			from: 0,
			speed: 4000,
			interval: 100,
			decimals: 0
		});

		$(document.body).on('appear', '.skillbar', function (e) {
			// this code is executed for each appeared element
			if (!$(this).hasClass('appear')) {
				$(this).addClass('appear');
				$(this).find('.skillbar-bar').css("width", "0%");
				$(this).skillBars({
					from: 0,
					speed: 4000,
					interval: 100,
					decimals: 0
				});
			}
		});
		/**
		 touchstart click
		 */
		$('body').on('touchstart click', function (e) {
			if ($window.width() < 992) {
			}
		});
		/**
		 *Set Resize Header Menu - START CODE
		 */
		$('nav.full-width-pull-menu ul.panel-group li.dropdown a.dropdown-toggle').on("click", function (e) {
			if ($(this).parent('li').find('ul.dropdown-menu').length > 0) {
				if ($(this).parent('li').hasClass('open')) {
					$(this).parent('li').removeClass('open');
				} else {
					$(this).parent('li').addClass('open');
				}
			}
		});
		/**
		 *accordion  - START CODE
		 */
		$('.accordion-style1 .collapse').on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="ti-minus"></i>');
		});

		$('.accordion-style1 .collapse').on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="ti-plus"></i>');
		});

		$('.nav.navbar-nav a.inner-link').on("click", function (e) {
			$(this).parents('ul.navbar-nav').find('a.inner-link').removeClass('active');
			var $this = $(this);
			if ($('.nav-header-container .navbar-toggle').is(':visible'))
				$(this).parents('.navbar-collapse').collapse('hide');
			setTimeout(function () {
				$this.addClass('active');
			}, 1000);

		});

		$('.accordion-style2 .collapse').on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title').find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
		});

		$('.accordion-style2 .collapse').on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
		});

		$('.accordion-style3 .collapse').on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title').find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
		});

		$('.accordion-style3 .collapse').on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
		});
		/**
		 *accordion - END CODE
		 */

		/**
		 *toggles  - START CODE
		 */
		$('.toggles .collapse').on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="ti-minus"></i>');
		});

		$('.toggles .collapse').on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="ti-plus"></i>');
		});

		$('.toggles-style2 .collapse').on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-angle-up"></i>');
		});

		$('.toggles-style2 .collapse').on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-angle-down"></i>');
		});
		/**
		 *toggles  - END CODE
		 */


		/**
		 blog hover box
		 */
		$document.on("mouseenter", ".blog-post-style4 .grid-item", function (e) {
			$(this).find("figcaption .blog-hover-text").slideDown(300);
		});
		$document.on("mouseleave", ".blog-post-style4 .grid-item", function (e) {
			$(this).find("figcaption .blog-hover-text").slideUp(300);
		});
		/**
		 End blog hover box
		 */
		SetResizeContent();

		var $allNonRatinaImages = $("img:not([data-at2x])");
		$allNonRatinaImages.attr('data-no-retina', '');

		/**
		 END READY
		 */


		/**
		 * Revolution slider
		 * @description  Initialize Revolution slider
		 */
		if (plugins.revolution.length) {
			plugins.revolution.show().revolution({
				delay: 9000,
				sliderLayout: 'fullscreen',
				responsiveLevels: [1200, 992, 768, 480],
				gridwidth: [1200, 992, 768, 480],
				visibilityLevels: [1200, 992, 768, 480],
				minHeight: ['630', '630', '630', '500'],
				stopLoop: 'on',
				stopAfterLoops: 0,
				stopAtSlide: 1,
				spinner: 'spinner3',
				extensions: 'js/extensions/',
				viewPort: {
					enable: true,
					outof: 'wait',
					visible_area: '80%',
					presize: true
				},
				navigation: {
					arrows: {
						enable: true,
						hide_onleave: true,
						hide_onmobile: true,
						hide_under: 1360,
						style: 'uranus',
					},
					bullets: {
						enable: true,
						style: 'uranus',
						hide_onleave: false,
						h_align: 'center',
						v_align: 'bottom',
						h_offset: 0,
						v_offset: 20,
						space: 10
					},
					touch: {
						touchenabled: "on",						// Enable Swipe Function : on/off
						swipe_treshold: 75,					// The number of pixels that the user must move their finger by before it is considered a swipe.
						swipe_min_touches: 1,					// Min Finger (touch) used for swipe
						drag_block_vertical: false,				// Prevent Vertical Scroll during Swipe
						swipe_direction: "horizontal"
					},
				},
				parallax: {
					type: 'scroll',
					origo: "slidercenter",
					speed: 1000,
					levels: [5, 10, 15, 20, 25, 30, 35, 40,
						45, 46, 47, 48, 49, 50, 51, 55],
					disable_onmobile: 'on'
				},
			});
		}

		/**
		 * Tilter
		 */
		if (plugins.tilter.length) {
			var tiltSettings = [
				{},
				{
					movement: {
						lines: {
							translation: {x: 40, y: 40, z: 0},
							reverseAnimation: {duration: 1500, easing: 'easeOutElastic'}
						},
						caption: {
							translation: {x: 20, y: 20, z: 0},
							rotation: {x: 0, y: 0, z: -5},
							reverseAnimation: {duration: 1000, easing: 'easeOutExpo'}
						},
						overlay: {
							translation: {x: -30, y: -30, z: 0},
							rotation: {x: 0, y: 0, z: 3},
							reverseAnimation: {duration: 750, easing: 'easeOutExpo'}
						},
						shine: {
							translation: {x: 100, y: 100, z: 0},
							reverseAnimation: {duration: 750, easing: 'easeOutExpo'}
						}
					}
				},
				{
					movement: {
						lines: {
							translation: {x: 40, y: 40, z: 0},
							reverseAnimation: {duration: 1500, easing: 'easeOutElastic'}
						},
						caption: {
							translation: {x: 20, y: 20, z: 0},
							rotation: {x: 0, y: 0, z: -5},
							reverseAnimation: {duration: 1000, easing: 'easeOutExpo'}
						},
						overlay: {
							translation: {x: -30, y: -30, z: 0},
							rotation: {x: 0, y: 0, z: 3},
							reverseAnimation: {duration: 750, easing: 'easeOutExpo'}
						},
						shine: {
							translation: {x: 100, y: 100, z: 0},
							reverseAnimation: {duration: 750, easing: 'easeOutExpo'}
						}
					}
				}];

			plugins.tilter.each(function (pos, el) {
				var idx = 0;
				idx = pos % 2 === 0 ? idx + 1 : idx;
				new TiltFx(el, tiltSettings[idx - 1]);
			});
		}

		if ($('#rev_slider_1').length) {
			$('.page').addClass('page-revolution');
		}






		/**
		 START Page Load
		 */
		$window.load(function () {
			var hash = window.location.hash.substr(1);
			if (hash != "") {
				setTimeout(function () {
					$window.imagesLoaded(function () {
						var scrollAnimationTime = 1200,
							scrollAnimation = 'easeInOutExpo';
						var target = '#' + hash;
						if ($(target).length > 0) {

							$('html, body').stop()
								.animate({
									'scrollTop': $(target).offset().top
								}, scrollAnimationTime, scrollAnimation, function () {
									window.location.hash = target;
								});
						}
					});
				}, 500);
			}
		});
		/**
		 END Page Load
		 */


		if(isNoviBuilder) {
      var $videos = $('video');
      $videos.each(function () {
        this.autoplay = false;
      })
    }

		if (isNoviBuilder) {
			$('.dropdown-menu').removeClass('animated');
		}


		//	youtube bg video
		if( plugins.youtubeBg.length ) {
			plugins.youtubeBg.YTPlayer({

			});
		}
		
		
	});
}());
