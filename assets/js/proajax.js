(function($) {
    $(document).ready(function() {


        $('#topPickTitle').click(function(){

            $('#topPick').addClass('active');

            if($('#new_arrivals').hasClass('active')){
                $('#new_arrivals').removeClass('active')
            }

            if($('#top-rated').hasClass('active')){
                $('#top-rated').removeClass('active')
            }
        });

        $('#newProduct').click(function(){

            $('#new_arrivals').addClass('active');

            if($('#topPick').hasClass('active')){
                $('#topPick').removeClass('active')
            }

            if($('#top-rated').hasClass('active')){
                $('#top-rated').removeClass('active')
            }
        });

        $('#topRated').click(function(){

            $('#top-rated').addClass('active');

            if($('#topPick').hasClass('active')){
                $('#topPick').removeClass('active')
            }

            if($('#new_arrivals').hasClass('active')){
                $('#new_arrivals').removeClass('active')
            }
        });


        $('.loaderIcon').hide();
        $('.loaderIcon2').hide();

        $('#loadMore').click(function(){


            var row = Number($('#startRow').val());
            var totalRow = Number($('#totalRow').val());
            var condition = $('#condition').val();
            var rowPerPage = 4;


            row = row+rowPerPage;

            if (row<totalRow) {
                

                $('#startRow').val(row);

                $.ajax({

                    url: 'ajax/defaultPro.php',
                    type: 'POST',
                    data: { row: row,range:rowPerPage,condition:condition },
                    beforeSend:function(){

                        $('.loaderIcon').show();

                        // $("#loadMore").text("Loading...");
                    },
                    success: function(response) {

                            // console.log(''+response);
                        

                        setTimeout(function(){


                            $('#defaultProduct:last').append(response);

                            var rowNow = row+rowPerPage;

                            if (rowNow>totalRow) {
                                $('#loadMore').hide('slow');
                                $('.loaderIcon').hide();
                            }else{
                                $('.loaderIcon').hide();
                            }
                        },2000);


                    }
                });

            }else{
                 // console.log(''+rowNow+totalRow);
                 $('#loadMore').hide('slow');
            }
        })



        $('#loadMore2').click(function(){


            var row2 = Number($('#startRow2').val());
            var totalRow2 = Number($('#totalRow2').val());
            var rowPerPage = 4;

            row2 = row2+rowPerPage;

            if (row2<totalRow2) {

                $('#startRow2').val(row2);

                $.ajax({

                    url: 'ajax/defaultPro2.php',
                    type: 'POST',
                    data: { row: row2,range:rowPerPage},
                    beforeSend:function(){

                        $('.loaderIcon2').show();

                        // $("#loadMore").text("Loading...");
                    },
                    success: function(data) {

                            console.log(''+data);
                        

                        setTimeout(function(){


                            $('#defaultProduct2:last').append(data);

                            var rowNow = row2+rowPerPage;

                            if (rowNow>totalRow2) {
                                $('#loadMore2').hide('slow');
                                $('.loaderIcon2').hide();
                            }else{
                                $('.loaderIcon2').hide();
                            }
                        },2000);


                    }
                });

            }else{
                 console.log(''+rowNow+totalRow2);
                 $('#loadMore').hide('slow');
            }
        })        
    });
})(jQuery);


function paginateData(category,subCategory,page,perpage){


    $.ajax({
        url: 'ajax/simplePagination.php',
        type: 'POST',
        data: { page: page,category:category,subCategory:subCategory,perpage:perpage },
        success: function(response) {

            console.log(response);
            $('#showProducts').html(response);
        }
    });
}

// getPagination(perPage)

function getPagination(perpage,category,subCategory){


    $.ajax({
        url: 'ajax/paginationPages.php',
        type: 'POST',
        data: { perpage:perpage,category:category,subCategory:subCategory },
        success: function(response) {

            console.log(response);
            $('#pagination').html(response);
        }
    });
}