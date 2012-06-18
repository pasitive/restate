(function ($) {

    $.randomStringGenerator = function (length, special) {
        var iteration = 0;
        var result = "";
        var randomNumber;
        if (special == undefined) {
            var special = false;
        }

        while (iteration < length) {
            randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
            if (!special) {
                if ((randomNumber >= 33) && (randomNumber <= 47)) {
                    continue;
                }
                if ((randomNumber >= 58) && (randomNumber <= 64)) {
                    continue;
                }
                if ((randomNumber >= 91) && (randomNumber <= 96)) {
                    continue;
                }
                if ((randomNumber >= 123) && (randomNumber <= 126)) {
                    continue;
                }
            }
            iteration++;
            result += String.fromCharCode(randomNumber);
        }
        return result;
    };

    $.fn.generatePasswordLink = function (label, relatedId) {
        return this.each(function () {
            var text_input = $(this);
            var link = $('<a>' + label + '</a>')
                .attr({
                    href:'#',
                    id:text_input.attr('id') + '_randomGenerator'
                }).css({
                    'margin-left':'5px'
                });

            var resetLink = $('<a>Сбросить</a>')
                .attr({
                    href:'#',
                    id:text_input.attr('id') + '_reset'
                }).css({
                    'margin-left':'5px'
                }).hide();

            link.insertAfter(text_input);
            resetLink.insertAfter(link);

            link.bind('click', function () {
                var password = $.randomStringGenerator(8);
                text_input.val(password);
                text_input.attr({readonly:true});
                resetLink.show();
                return false;
            });

            resetLink.bind('click', function () {
                text_input.val('');
                text_input.attr({readonly:false});
                resetLink.hide();
                return false;
            });


        });
    };

    $.fn.copyValue = function (srcId) {
        return this.each(function () {
            var dest = $(this);
            var src = $('#' + srcId);

            var link = $('<a>Копировать сгенерированное значение</a>')
                .attr({
                    href:'#',
                    id:text_input.attr('id') + '_copier'
                }).css({
                    'margin-left':'5px'
                });

            link.insertAfter(src);

            link.bind('click', function () {
                dest.val(src.val());
                return false;
            });

        });
    }
})(jQuery);