(function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});

        $("#product-modal").on('show.bs.modal', function(){
        });
    });
})(jQuery);