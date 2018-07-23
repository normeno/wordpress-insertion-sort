hljs.initHighlightingOnLoad(); // Init Highlight

(function($) {
    $( "textarea[name*='insertion-sort']" ).bind('input propertychange', function () {
        const previewId = '#' + $(this).prop('id') + '-preview';
        $(previewId).text($(this).val());
    });

    $('#insertion-sort-admin-form').submit(function(e){
        e.preventDefault();

        const data = $(this).serialize();

        $.post(
            ajaxurl + '?action=insertion_sort_admin_form',
            data,
            function( resp ) {
                if (resp.updated === 'undefined') {
                    return false;
                }

                const msg = (resp.updated > 0) ? [resp.updated + ' items updated','success'] : ['0 items updated', 'warning'];

                $.notify(msg[0], msg[1]);
            }
        );
    });
})( jQuery );