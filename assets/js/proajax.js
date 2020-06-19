(function($) {
    $(document).ready(function() {
        $.ajax({
            url: '../ajax/defaultPro.php',
            type: 'POST',
            // data: { id: myId },
            success: function(response) {

                $('#defaultProduct').html(response);
            }
        });
    });
})(jQuery);