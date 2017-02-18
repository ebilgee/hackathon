//Global var
var FUNCT = {};

(function ($) {

    // USE STRICT
    "use strict";

    //----------------------------------------------------/
    // Predefined Variables
    //----------------------------------------------------/
    var $window = $(window),
        $document = $(document),
        $body = $('body'),
        $wrapper = $('.wrapper'),
        $topbar = $('#topbar'),
        $header = $('#header'),

        //Logo
        logo = $('#logo').find('.logo'),
        logoImg = logo.find('img').attr('src'),
        logoDark = logo.attr('data-dark-logo'),

        //Main menu
        //mainmenuitems = $("#mainMenu > ul > li"),
        mainmenu = $('#mainMenu'),
        mainmenuitems = mainmenu.find('li.dropdown > a'),
        mainsubmenuitems = mainmenu.find('li.dropdown-submenu > a, li.dropdown-submenu > span'),

        //Vertical Dot Menu
        navigationItems = $('#vertical-dot-menu a'),

        //Side panel
        sidePanel = $('#side-panel'),
        sidePanellogo = $('#panel-logo').find('.logo'),
        sidePanellogoImg = sidePanellogo.find('img').attr('src'),
        sidePanellogoDark = sidePanellogo.attr('data-dark-logo'),

        //Fullscreen panel
        fullScreenPanel = $('#fullscreen-panel'),

        $topSearch = $('#top-search'),
        $parallax = $('.parallax'),
        $textRotator = $('.text-rotator'),

        //Window size control
        $fullScreen = $('.fullscreen') || $('.section-fullscreen'),
        $halfScreen = $('.halfscreen'),

        //Elements
        dataAnimation = $("[data-animation]"),
        $counter = $('.counter:not(.counter-instant)'),
        $countdownTimer = $('.countdown'),
        $progressBar = $('.progress-bar'),
        $pieChart = $('.pie-chart'),
        $map = $('.map'),
        accordionType = "accordion",
        toogleType = "toggle",
        accordionItem = "ac-item",
        itemActive = "ac-active",
        itemTitle = "ac-title",
        itemContent = "ac-content",

        $lightbox_gallery = $('[data-lightbox-type="gallery"]'),
        $lightbox_image = $('[data-lightbox-type="image"]'),
        $lightbox_iframe = $('[data-lightbox-type="iframe"]'),
        $lightbox_ajax = $('[data-lightbox-type="ajax"]'),

        //Widgets
        $flickr_widget = $('.flickr-widget'),

        $ytPlayer = $('.youtube-background'),

        //Utilites
        classFinder = ".";



    //----------------------------------------------------/
    // UTILITIES
    //----------------------------------------------------/

    //Check if function exists
    $.fn.exists = function () {
        return this.length > 0;
    };


    //----------------------------------------------------/
    // MOBILE CHECK
    //----------------------------------------------------/
    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };


    //----------------------------------------------------/
    // STICKY HEADER
    //----------------------------------------------------/
    FUNCT.stickyHeaderStatus = function () {
        if ($header.exists()) {
            var headerOffset = $header.offset().top;

            if ($window.scrollTop() > headerOffset) {

                if ($body.hasClass('device-lg') || $body.hasClass('device-md')) {

                    if (!$header.hasClass("header-no-sticky")) {
                        $header.addClass('header-sticky');
                    }
                    if ($header.hasClass('header-navigation-light')) {
                        logo.find('img').attr('src', logoImg);
                    }
                } else {
                    $header.removeClass('header-sticky');
                }
            } else {
                $header.removeClass('header-sticky');
            }
        }
    };

    FUNCT.stickyHeader = function () {
        $window.on('scroll', function () {
            FUNCT.logoStatus();
            FUNCT.stickyHeaderStatus();

        });
    };

    //----------------------------------------------------/
    // MAIN MENU FIXES
    //----------------------------------------------------/

    if (!$body.hasClass('device-lg') || !$body.hasClass('device-md')) {

        if (mainmenu.hasClass('mega-menu')) {
            mainmenuitems.on('click', function () {
                $(this).parent('ul li').toggleClass("resp-active", 1000, "easeOutSine");
                return false;
            });
            mainsubmenuitems.on('click', function () {
                $(this).parent('li').toggleClass('resp-active');
                return false;
            });
        }
    }

    FUNCT.menuFix = function () {
        if ($body.hasClass('device-lg') || $body.hasClass('device-md')) {
            $('ul.main-menu .dropdown:not(.mega-menu-item) ul ul').each(function (index, element) {
                if ($window.width() - ($(element).width() + $(element).offset().left) < 0) {
                    $(element).addClass('menu-invert');
                }
            });
        }
    };



    //----------------------------------------------------/
    // Button lines
    //----------------------------------------------------/
    $(".lines-button").on("click", function () {
        $(this).toggleClass("lines-button-close");
    });


    /* ---------------------------------------------------------------------------
     * PARALLAX
     * --------------------------------------------------------------------------- */
    FUNCT.parallax = function () {
        if ($parallax.exists() || $(".page-title-parallax")) {

            if ($body.hasClass('device-lg') || $body.hasClass('device-md')) {
                $.stellar({
                    horizontalScrolling: false,
                    verticalScrolling: true,
                    horizontalOffset: 0,
                    verticalOffset: 0,
                });

            }
        }
    };



    //----------------------------------------------------/
    // Mouse Scroll
    //----------------------------------------------------/
    FUNCT.mouseScroll = function () {

        if ($body.hasClass('mouse-scroll') && $window.width() > 767) {

            var $offset = 0;

            if ($header.hasClass('header-transparent')) {
                $offset = -$header.height() - 20;
            }

            $.scrollify({
                section: "section",
                sectionName: "section-name",
                scrollSpeed: 1100,
                offset: $offset,
                scrollbars: true,
            });
        }
    }


})(jQuery);
