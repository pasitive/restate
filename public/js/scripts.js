/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 4/14/12
 * Time: 6:41 PM
 * To change this template use File | Settings | File Templates.
 */

$(function () {

    $('#map_toggler').toggle(function () {
        $('#map div.map_content').animate({
            height:263
        });
        $('#map_toggler a').removeClass('arrow_down').addClass('arrow_up');
    }, function () {
        $('#map div.map_content').animate({
            height:100
        });
        $('#map_toggler a').removeClass('arrow_up').addClass('arrow_down');
    });

    $('.image_block').each(function () {

        /*$block = $(this);

        var height = $block.outerHeight();

        var overlay_css = {
            display:'none',
            height:height,
            'z-index':1999
        };
        $overlay = $('<div></div>').addClass('overlay').css(overlay_css);
        $overlay.prependTo($(this));

        $(this).hover(function () {
            $(this).find('.overlay').show();
        }, function () {
            $(this).find('.overlay').hide();
        });*/

    });

    $('.gallery').gallery();
    $('dl.dots').dots();
});

(function ($) {

    $.fn.dots = function (options) {

        var defaults = {
            'css':{
                'padding-left':'3px',
                'color':'#666',
                'font-size':'10px'
            }
        };

        var options = $.extend(defaults, options);

        this.each(function () {
            $dots = $(this);
            $dots.each(function () {
                $dt = $(this).find('dt');
                $dt.append(':');
                var a = [];
                while (a.length < 100) {
                    a.push('.');
                }
                $span = $('<span>').css(options.css);
                $dt.append($span.text(a.join('')));
            });
        });
    };
    $.fn.gallery = function (options) {

        var defaults = {
            'nextClass':'next',
            'prevClass':'prev'
        };

        var options = $.extend(defaults, options);


        this.each(function () {
            $gallery = $(this);

            $thumb_list = $gallery.find('.items > ul');

            $thumb_list.each(function () {
                var $this_list = $(this),
                    total_w = 0,
                    loaded = 0,
                    $images = $this_list.find('img'),
                    total_images = $images.length,
                    $counter = $gallery.find('.counter');

                $images.each(function () {
                    var $img = $(this);
                    $('<img alt="">').load(
                        function () {
                            ++loaded;
                            if (loaded == total_images) {
                                $this_list.data('current', 0).children().each(function () {
                                    total_w += $(this).outerWidth();
                                });
                                $this_list.css('width', total_w + 'px');

                                $this_list.parent()
                                    .siblings('.' + options.nextClass)
                                    .bind('click', function (e) {
                                        slideNext();
                                        e.preventDefault();
                                    })
                                    .end()
                                    .siblings('.' + options.prevClass)
                                    .bind('click',
                                    function (e) {
                                        slidePrev();
                                        e.preventDefault();
                                    });

                                function slideNext() {
                                    var current = $this_list.data('current');
                                    $counter.find('.current').text(current);
                                    if (current == $this_list.children().length - 1) return false;

                                    var next = ++current,
                                        ml = -next * $this_list.children(':first').outerWidth();

                                    $this_list.data('current', next)
                                        .stop()
                                        .animate({
                                            'marginLeft':ml + 'px'
                                        }, 250);
                                }

                                function slidePrev() {
                                    var current = $this_list.data('current');
                                    if (current == 0) return false;
                                    var prev = --current,
                                        ml = -prev * $this_list.children(':first').outerWidth();

                                    $this_list.data('current', prev)
                                        .stop()
                                        .animate({
                                            'marginLeft':ml + 'px'
                                        }, 250);
                                }
                            }
                        }).attr('src', $img.attr('src'));
                });
            });
        });
    };

})(jQuery);