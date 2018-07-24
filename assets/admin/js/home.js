hljs.initHighlightingOnLoad(); // Init Highlight

(function($) {

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

                let msg = [];

                if (resp.updated > 0) {
                    msg = ['Updated ' + resp.updated + ' items','success'];

                    $('*[id*=insertion-sort-]:visible').each(function() {
                        if ( !$(this).prop('id').includes('preview')
                            && ($(this).prop('id').includes('-js') || $(this).prop('id').includes('-css')) ) {
                            const elementId = '#' + $(this).prop('id');
                            const previewId = elementId + '-preview';

                            $(previewId).text( $(elementId).val() );
                        }
                    });

                    hljs.initHighlighting.called = false;
                    hljs.initHighlighting();
                } else {
                    msg = ['0 items updated', 'warning'];
                }

                $.notify(msg[0], msg[1]);
            }
        );
    });
})( jQuery );