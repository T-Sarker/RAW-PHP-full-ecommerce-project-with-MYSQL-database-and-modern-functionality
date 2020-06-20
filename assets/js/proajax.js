(function($) {
    $(document).ready(function() {

        $('.loaderIcon').hide();

        $('#loadMore').click(function(){


            var row = Number($('#startRow').val());
            var totalRow = Number($('#totalRow').val());
            var condition = $('#condition').val();
            var rowPerPage = 2;

            row = row+rowPerPage;

            if (row<totalRow) {

                $('#startRow').val(row);

                $.ajax({

                    url: 'ajax/defaultPro.php',
                    type: 'POST',
                    data: { row: row,range:rowPerPage,condition:condition },
                    beforeSend:function(){

                        $('.loaderIcon').show();

                        $("#loadMore").text("Loading...");
                    },
                    success: function(response) {

                            console.log(''+response);
                        

                        setTimeout(function(){


                            $('#defaultProduct:last').append(response);

                            var rowNow = row+rowPerPage;

                            if (rowNow>totalRow) {
                                $('#loadMore').hide('slow');
                                $('.loaderIcon').hide();
                            }else{
                                $('.loaderIcon').hide();
                                 $('#loadMore').html('<span class="btn btn-success" id="loadMore">Load More</span>');
                            }
                        },2000);


                    }
                });

            }else{
                 console.log(''+rowNow+totalRow);
                 $('#loadMore').hide('slow');
            }
        })

        // $.ajax({
        //     url: 'ajax/defaultPro.php',
        //     type: 'POST',
        //     // data: { id: myId },
        //     success: function(response) {

        //         $('#defaultProduct').html(response);
        //     }
        // });
    });
})(jQuery);