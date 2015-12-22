/*
 * Author: Evgeniy Gusarov StMechanus (Diversant)
 * Under the MIT License
 *
 * Version: 1.0.1
 *
 */


;
(function ($) {

    var window_width = $(window).width();

    var settings = {
            cntClass: 'rd-mobilemenu',
            menuClass: 'rd-mobilemenu_ul',
            submenuClass: 'rd-mobilemenu_submenu',
            panelClass: 'rd-mobilepanel',
            toggleClass: 'rd-mobilepanel_toggle',
            titleClass: 'rd-mobilepanel_title'
        },
        lastY, dir, wheel = 0;


    var RDMobileMenu = function (element, options) {
        this.options = options;

        this.$source = $(element);
    };

    RDMobileMenu.prototype = {
        init: function () {
            var nav = this;
            nav.createDOM();
            nav.createListeners();
        },

        createDOM: function () {
            var nav = this;

            //$('body')
            //    .prepend($('<div/>', {
            //        'class': settings.panelClass
            //    })
            //        .append(
            //        $('<h1/>', {
            //            'class': settings.titleClass
            //        }).append($('.brand').html())
            //    ))
            //    .prepend($('<button/>', {
            //        'class': 'rd-mobilepanel_toggle'
            //    }).append($('<span/>')))
            //    .wrapInner($('<div/>', {'class': 'page-content'}).css({
            //        "overflow": "hidden"
            //    }))
            //    .prepend($('<div/>', {
            //        'class': 'rd-mobilemenu'
            //    })
            //        .append($('.logo'))
            //        .append($('.panel'))
            //        .append($('.copyright'))
            //        .append(nav.createNavDOM()))
            //    .wrapInner($('<div/>', {'class': 'page-wrap'}).css({
            //        "overflow": "hidden"
            //    }));

            $('.rd-mobilemenu').append(nav.createNavDOM());

            if ($('html').hasClass('desktop') && (window_width >= 1600)) {
                $('body').delegate('*', 'mousewheel', nav.scroll);
                $('body').delegate('*', 'touchmove', nav.scroll);
                $('body').delegate('*', 'touchend', nav.touchend);
                $('body').delegate('*', 'touchstart', {type: 'click'}, nav.close);
            }else{
                $('.rd-mobilepanel_toggle, .page-content, .rd-mobilemenu').removeClass('active');
            }
        },

        createNavDOM: function () {
            var nav = this;

            var menu = $('<ul>', {'class': settings.menuClass});

            var li = nav.$source.children();
            for (var i = 0; i < li.length; i++) {
                var o = li[i].children,
                    item = null;
                for (var j = 0; j < o.length; j++) {
                    if (o[j].tagName) {
                        if (!item) {
                            item = document.createElement('li');
                            if (li[i].className.indexOf('active') > -1) {
                                item.className = 'active';
                            }
                        }

                        switch (o[j].tagName.toLowerCase()) {
                            case 'a':
                                var link = o[j].cloneNode(true);
                                item.appendChild(link);
                                break;
                            case 'ul':
                                var submenu = o[j].cloneNode(true);
                                submenu.className = settings.submenuClass;
                                item.appendChild(submenu);

                                if (!$(item).find('> a').hasClass('opened')) {
                                    $(submenu).css({"display": "none"});
                                }

                                $(item).find('> a')
                                    .each(function () {
                                        $this = $(this);
                                        $this.addClass('rd-with-ul')
                                            .on('click', function (e) {
                                                e.preventDefault();
                                                $this = $(this);

                                                if ($this.hasClass('rd-with-ul') && !$this.hasClass('active')) {
                                                    $('.rd-with-ul').removeClass('active');
                                                    var submenu = $this.addClass('active').parent().find('.' + settings.submenuClass);
                                                    submenu.stop().slideDown();
                                                    $('.' + settings.submenuClass).not(submenu).stop().slideUp();
                                                } else {
                                                    var submenu = $this.removeClass('active').parent().find('.' + settings.submenuClass);
                                                    submenu.stop().slideUp();
                                                }
                                            });
                                    });

                                break;
                            default:
                                break;
                        }
                    }
                }

                if (item) {
                    menu.append(item);
                }
            }

            menu
                .find('a')
                .each(function () {
                    if (window.location.href.indexOf($(this).attr('href')) > -1) {
                        $(this).parents('.rd-mobilemenu_ul').find('a').removeClass('focus');
                        $(this).addClass('focus');
                    }
                });


            return menu;
        },

        createListeners: function () {
            var nav = this;
            nav.panelHeight = $('.rd-mobilepanel').outerHeight();

            nav.createToggleListener();
            nav.createResizeListener();
            nav.createScrollListener();
            nav.createItemScrollListener();
        },

        createToggleListener: function () {
            var nav = this,
                type;

            if (nav.isMobile()) {
                type = 'touchstart';
            } else {
                type = 'click';
            }

            $('body').delegate('.' + settings.toggleClass, type, function (e) {
                e.preventDefault();
                e.stopPropagation();
                var o = $('.' + settings.cntClass);
                $(this).toggleClass('active');
                $('.page-content').toggleClass('active');

                console.log('toggle');

                if (o.hasClass('active')) {
                    $(this).removeClass('active');
                    o.removeClass('active');
                    $('body').undelegate('*', 'mousewheel', nav.scroll);
                    $('body').undelegate('*', 'touchmove', nav.scroll);
                    $('body').undelegate('*', 'touchend', nav.touchend);
                } else {
                    $(this).addClass('active');
                    o.addClass('active');
                    $('body').delegate('*', 'mousewheel', nav.scroll);
                    $('body').delegate('*', 'touchmove', nav.scroll);
                    $('body').delegate('*', 'touchend', nav.touchend);
                }
            });
        },

        createResizeListener: function () {
            var nav = this;

            $(window).on('resize', function () {
                var o = $('.' + settings.cntClass);

                if (o.css('display') == 'none') {
                    o.removeClass('active');
                    $('.' + settings.toggleClass).removeClass('active');
                    $('body').undelegate('*', 'mousewheel', nav.scroll);
                    $('body').undelegate('*', 'touchmove', nav.scroll);
                    $('body').undelegate('*', 'touchend', nav.touchend);
                }
            });
        },

        createScrollListener: function () {
            var nav = this,
                p = $('.rd-mobilepanel'),
                st_before = 0,
                fz = 56;


            function resizePanel() {
                var p = $('.rd-mobilepanel'),
                    t = $('.rd-mobilepanel_title'),
                    st = $(document).scrollTop();

                function resize() {
                    p.removeClass('fixed');
                    $('body').removeClass('navbar-stickup').removeClass('navbar-fixed');
                    if (st > st_before && !p.hasClass('fixed')) {
                        t.css({
                            "transform": "translateY(" + (st / 4) + "px)",
                            "font-size": fz - st / 6.7
                        });
                    } else {
                        t.css({
                            "transform": "translateY(" + (st / 4) + "px)",
                            "font-size": fz - st / 6.7
                        });
                    }
                }

                function fix() {
                    p.addClass('fixed');
                    t.css({
                        "transform": "translateY(50.25px)",
                        "font-size": 24
                    });
                }

                if ($(window).width() > 1067) {
                    if (st < 202) {
                        resize();
                    } else {
                        fix();
                        $('body').removeClass('navbar-fixed').addClass('navbar-stickup');
                    }
                } else {
                    fix();
                    $('body').removeClass('navbar-stickup').addClass('navbar-fixed');
                }

                st_before = st;
            }

            $(window).on('scroll', resizePanel);
            $(window).on('resize', resizePanel);
            resizePanel();
        },

        createItemScrollListener: function () {
            $('.rd-mobilemenu_ul').find('a[href*="#"]').on('click', function (e) {
                if (window.location.search.indexOf($(this).attr('data-section')) == -1) {
                    return true;
                }

                e.preventDefault();

                $(this).parents('.rd-mobilemenu_ul').find('a').removeClass('focus');
                $(this).addClass('focus');

                var target = this.hash;

                console.log(this.hash);

                if (this.hash == '') {
                    $('html, body').stop().animate({
                        'scrollTop': 0
                    }, 300, 'swing', function () {
                        window.location.hash = target;
                    });
                } else {
                    var $target = $(target);
                    $('html, body').stop().animate({
                        'scrollTop': $target.stickUpOffset().top + 2
                    }, 300, 'swing', function () {
                        window.location.hash = target;
                    });
                }
            });

            function onScroll(event) {
                var scrollPos = $(document).scrollTop();

                var o = $('.rd-mobilemenu_ul > li > a.rd-with-ul'), menu;

                o.each(function () {
                    if (window.location.search.indexOf($(this).attr("data-id")) > -1) {
                        menu = $(this).parent().find('.rd-mobilemenu_submenu');
                    }
                });

                if (menu) {
                    if (((scrollPos + $(window).height()) > ($(document).height() - 100))) {
                        menu.find('a').removeClass("focus");
                        menu.find('> li:last-child a').addClass("focus");
                    } else {
                        menu.find('a').each(function () {
                            var currLink = $(this);
                            var refElement = $("#" + currLink.attr("data-id"));

                            if (refElement.length > 0) {
                                if ((refElement.stickUpOffset().top - 20) <= scrollPos && refElement.stickUpOffset().top + refElement.height() > scrollPos) {
                                    currLink.parents('.rd-mobilemenu_ul').find('a').removeClass("focus");
                                    currLink.addClass("focus");
                                }
                            }
                        });
                    }
                }
            }


            $(document).on("scroll", onScroll);
        },

        scroll: function (e) {

            var menu = $('.rd-mobilemenu_ul');

            var x = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageX : e.pageX,
                y = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageY : e.pageY;

            if (
                y > menu.stickUpOffset().top &&
                y < (menu.stickUpOffset().top + menu.outerHeight()) &&
                x > menu.stickUpOffset().left &&
                x < (menu.stickUpOffset().left + menu.outerWidth())
            ) {
                var delta = 0;
                if (e.originalEvent.targetTouches) {
                    if (!lastY) lastY = y;
                    delta = (lastY - y);

                    lastY = y;
                    dir = delta > 0;
                } else {
                    var t = new Date().getTime();
                    if (t - wheel < 40) {
                        wheel = t;
                        return;
                    }
                    wheel = t;
                    delta = (e.originalEvent.wheelDelta || -e.originalEvent.detail) * (-25)
                }

                menu.stop().scrollTop(menu.scrollTop() + delta);
            } else {
                if ($('html').hasClass("desktop")) {
                    return true;
                }

            }
            e.preventDefault();
            return false;
        },

        touchend: function (e) {
            var menu = $('.' + settings.menuClass);

            menu.stop().animate({
                scrollTop: menu.scrollTop() + (dir ? 100 : -100)
            }, 3000, 'easeOutQuint');
            lastY = undefined;
        },

        close: function (e) {
            if (!e.originalEvent) {
                return;
            }

            var menu = $('.rd-mobilemenu');
            var x = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageX : e.pageX,
                y = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageY : e.pageY;

            if (!(
                y > menu.stickUpOffset().top &&
                y < (menu.stickUpOffset().top + menu.outerHeight()) &&
                x > menu.stickUpOffset().left &&
                x < (menu.stickUpOffset().left + menu.outerWidth())
                )
            ) {
                $('.' + settings.toggleClass).trigger(e.data.type);
            }
        },

        isMobile: function () {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }
    };

    $.fn.rdparallax = function (option) {
        var o = this;
        if (o.length) {
            new RDMobileMenu(o[0]).init();
        }
        return o;
    };

    window.RDMobilemenu_autoinit = function (selector) {
        var o = $(selector);
        if (o.length) {
            new RDMobileMenu(o[0]).init();
        }
    };
})(jQuery);

$(document).ready(function () {
    RDMobilemenu_autoinit('[data-type="navbar"]');
});
