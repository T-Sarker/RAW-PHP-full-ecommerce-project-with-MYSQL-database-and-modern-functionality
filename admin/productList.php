<?php include "inc/header.php" ?>
<?php include '../classes/productClass.php' ?>

<?php
    
    $pc = new ProductClass();

    if (isset($_GET['Pause']) && !empty($_GET['Pause'])) {
            
            $id =$_GET['Pause'];

            $pauseProduct = $pc->pauseProductFromProductList($id);
    }

    if (isset($_GET['Active']) && !empty($_GET['Active'])) {
            
            $id =$_GET['Active'];

            $pauseProduct = $pc->activeProductFromProductList($id);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
            
            $id =$_GET['Delete'];

            $deleteProduct = $pc->deleteProductFromProductList($id);
    }

?>

    <?php include "inc/sidebar.php" ?>

        <div id="right-panel" class="right-panel">

            <?php include "inc/secHeader.php" ?>

                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h2>Product List</h2>

                    <?php 

                        if (isset($pauseProduct)) {

                            $message = "You Product Settings will Be Changed!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            echo "<script type='text/javascript'>
                            window.location.href = 'productList.php';
                            </script>";
                        }

                     ?>

                    <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Image</th>
                              <th scope="col">Price</th>
                              <th scope="col">Available</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="proId">
                            
                                                        
                          </tbody>
                        </table>
                </div>

        </div>

<?php include "inc/footer.php" ?>

<script>
(function($) {
    $(document).ready(function(){
        $.ajax({
            type:"GET",
            url:"../ajax/proList.php",
            success: function(data){

                $('#proId').html(data);
            },
        });
    });
})(jQuery);
</script>




