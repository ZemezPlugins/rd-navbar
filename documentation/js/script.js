function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};


/* ToTop
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart',
                containerClass: 'toTop fa fa-angle-up'
            });
        });
    }
})(jQuery);

/* Orientation tablet fix
 ========================================================*/
$(function () {
    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },

        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };

    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM);
        if (!result) {
            $('.sf-menus li').each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');

/* Select Pseudo-DOM
 ========================================================*/
;
(function ($) {
    var o = $('.select');
    if (o.length > 0) {
        $(document).ready(function () {
            o.each(function () {
                var select = $(this);
                select.append('<div class="pseudo-select"></div>');
                select.append('<ul class="pseudo-dropdown"></ul>');

                var origin = select.find('select');
                var pseudo = select.find('.pseudo-select');
                var pseudo_dropdown = select.find('.pseudo-dropdown');

                origin.css('display', 'none');

                origin.find('option').each(function () {
                    var option = $(this);
                    pseudo_dropdown.append('<li><a href="' + option.attr('data-href') + '">' + option.text() + '</a></li>');
                });


                var pseudo_options = pseudo_dropdown.find('li');
                if (origin.find('option').index(origin.find('option').filter(':selected')) > 0) {
                    var selected = origin.find('option').index(origin.find('option').filter(':selected'));
                    pseudo_options.eq(selected).addClass('selected');
                }
                else {
                    pseudo_options.eq(0).addClass('selected');
                    origin.find('option')[0].setAttribute('selected', '');
                }
                pseudo.text(function () {
                    return pseudo_dropdown.find('.selected').text();
                });

                pseudo.click(function () {
                    if (!select.hasClass('opened')) {
                        select.addClass('opened');
                    }
                    else {
                        select.removeClass('opened');
                    }
                });

                pseudo_options.click(function () {
                    var num_old = pseudo_options.index(pseudo_options.filter('.selected'));
                    var num = pseudo_options.index($(this));

                    pseudo_dropdown.find('.selected').removeClass('selected');
                    $(this).addClass('selected');
                    pseudo.text(function () {
                        return pseudo_dropdown.find('.selected').text();
                    });
                    select.removeClass('opened');

                    origin.find('option')[num_old].removeAttribute('selected')
                    origin.find('option')[num].setAttribute('selected', '')
                });

                $(document).on('click', function (e) {
                    if (select.length) {
                        if (!select.is(e.target) && select.has(e.target).length === 0) {
                            select.removeClass('opened');
                        }
                    }
                });

                select.filter('.opened').on('click', function (e) {
                    select.removeClass('opened');
                });
            });
        });
    }
})(jQuery);


/* AJAX Load Section
 ========================================================*/
;
(function ($) {
    $(document).ready(function () {
        var section_item = $('.rd-mobilemenu ul li.section a.section_link');
        var article_item = $('.rd-mobilemenu ul li.section a.article_link');

        var menu_items = $('.rd-mobilemenu ul li');
        var menu_sublists = menu_items.find('ul');

        section_item.on('click', function (e) {
            var item_link = $(this).attr('href').split('?')[1];
            var item_key = $(this).attr('data-key');
            var section_id = $(this).attr('data-id');
            var menu_list_item = $(this).parent();
            sectionClass(item_key);

            // if (section_id != $('body').attr('data-section')) {
            // 	$.ajax({
            // 		type: 'GET',
            // 		url: 'section.php',
            // 		data: item_link,
            // 		dataType: 'html',
            // 		success: function(data){
            // 			//console.log('successful');

            // 			$('#main .container').html(data);
            // 			window.scrollTo(0, 0);

            // 			// Close all submenus
            // 			menu_items.removeClass('opened');
            // 			menu_sublists.slideUp("slow");

            // 			//Open current submenu
            // 			menu_list_item.addClass('opened');
            // 			menu_list_item.find('ul').slideDown("slow");
            // 		},
            // 		fail: function(data){
            // 			console.log('fail');
            // 		},
            // 		done: function(data){
            // 			console.log('done');
            // 		}
            // 	})

            // 	e.stopImmediatePropagation();
            // 	e.preventDefault();
            // };

        })

        article_item.on('click', function (e) {
            var item_link = $(this).attr('href').split('?')[1].split('#')[0];
            var article_id = $(this).attr('data-id');
            var section_key = $(this).attr('data-sectionId');
            var section_id = $(this).attr('data-section');
            var hash = '#' + article_id;

            article_item.parent().removeClass('active');
            $(this).parent().addClass('active');

            if ($('body').attr('data-section') == section_id) {
                $("html, body").animate({scrollTop: $(hash).stickUpOffset().top - 100}, 300);
                document.location.hash = hash;
            }
            // else {
            // 	$.ajax({
            // 		type: 'GET',
            // 		url: 'section.php',
            // 		data: item_link,
            // 		dataType: 'html',
            // 		success: function(data){
            // 			// console.log('successful');
            // 			sectionClass(section_key);
            // 			$('#main .container').html(data).promise().done(function(){
            // 				document.location.hash = hash;
            // 			});
            // 			$('body').attr('data-section', section_id);

            // 			//Open current submenu
            // 			// menu_list_item.addClass('opened');
            // 			// menu_list_item.find('ul').slideDown("slow");
            // 		},
            // 		fail: function(data){
            // 			console.log('fail');
            // 		}
            // 	})
            // };
            e.stopImmediatePropagation();
            e.preventDefault();
        })
    });
})(jQuery);


/* AJAX Search
 ========================================================*/
;
(function ($) {
    $(document).ready(function () {

        var form = $('#search-form');

        form.submit(function(e){
            e.preventDefault();

            var url = 'search.php';

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data){
                    //console.log(data);
                    $('.search-results').html(data);
                }
            })
        })

    });
})(jQuery);