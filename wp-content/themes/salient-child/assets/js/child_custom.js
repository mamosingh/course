/* Custom */
jQuery(function ($) {
    $(document).ready(function () {
        $(document).on('change', '.custom_filter select', function () {
            $('.custom_filter').submit();
        });

        $(function() {
            $('.custom_filter select').selectric();
        });
    });

});
