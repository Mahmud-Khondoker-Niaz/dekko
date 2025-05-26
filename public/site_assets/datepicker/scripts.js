
(function ($) {
    "use strict";

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.blueDatePicker = function () {

        if (! this.length) return;

        if (typeof $.fn.datepicker != 'undefined') {

            this.datepicker();

        }

    };

    $('.datepicker').blueDatePicker();


    $.fn.blueTimePicker = function () {

        if (! this.length) return;

        if (typeof $.fn.datepicker != 'undefined') {

            this.timepicker({
                minuteStep: 5,
                showInputs: false,
                disableFocus: true
            });

        }

    };


    $('#timepicker3').blueTimePicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });


})(jQuery);