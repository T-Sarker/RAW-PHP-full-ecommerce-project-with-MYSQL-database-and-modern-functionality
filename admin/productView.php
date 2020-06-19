<?php include "inc/header.php" ?>
<?php
    include '../classes/productClass.php';

    $prc = new ProductClass();

    if (isset($_GET['Show']) && !empty($_GET['Show'])) {
        
        $id = $_GET['Show'];
        $getPImg = $prc->getSingleProductsImagesFromDB($id);
        $getProduct = $prc->getSingleProductsFromDB($id);
    }else{
        echo "<script>window.location.href = 'error.php'</script>";
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
                    <h2>Product Details To Edit</h2>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="owl-carousel owl-theme" style="width:350px;">
                        <?php
                        

                                if ($getPImg) {
                                    while ($getImg = $getPImg->fetch_assoc()) {
                                        
                        ?>
                                
                                <!-- <li class="slide"></li> -->
                                <div class="item"><img src="<?php echo $getImg['image']; ?>" alt="" /></div>


                            <?php

                                    }
                                }
                            
                            ?>
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="productDetails">
                            <?php
                                if ($getProduct) {
                                    
                                    while ($getDetails = $getProduct->fetch_assoc()) {
                                        

                            ?>
                                <h3 class="pb-3"><?php echo $getDetails['name']; ?></h3>
                                <h6 class="pb-3"><?php echo "<strong>Old Proice:</strong> ".$getDetails['price'].' $'; ?></h6>
                                <h6 class="pb-3"><?php echo "<strong>New Price:</strong> ".$getDetails['discount'].' $'; ?></h6>
                                <h6 class="pb-3"><?php
                                        $id = $getDetails['category'];
                                        $getCat = $prc->getCat($id);
                                        echo "<strong>Category: </strong>". $getCat;
                                 ?></h6>
                                <h6 class="pb-3"><?php 
                                        $id = $getDetails['subCategory'];
                                        $getSubCat = $prc->getSubCat($id);
                                        echo "<strong>Sub Category: </strong>". $getSubCat;
                             
                                 ?></h6>
                                <h6 class="pb-3"><?php 
                                        $id = $getDetails['brand'];
                                        $getbrand = $prc->getbrand($id);
                                        echo "<strong>Brand: </strong>". $getbrand;
                             
                                 ?></h6>
                                <h6 class="pb-3"><?php echo "<strong>Type:</strong> ".$getDetails['Poption']; ?></h6>
                                <h6 class="pb-3"><?php echo "<strong>Availibility:</strong> ".$getDetails['available']; ?></h6>
                                <h6 class="pb-3"><?php echo "<strong>Flash Starts:</strong> ".$getDetails['Sdate']; ?></h6>
                                <h6 class="pb-3"><?php echo "<strong>Flash Ends:</strong> ".$getDetails['Cdate']; ?></h6>
                                <h6 class="pb-3"><?php
                                    if ($getDetails['pause']==0) {
                                        
                                        echo "<strong>Status:</strong> Active";
                                    }else{
                                        echo "<strong>Status:</strong>Paused";
                                    }
                                 ?></h6>
                                <p class="description pb-3"><?php echo "<strong>Details:</strong> ".$getDetails['pdetails']; ?></p>
                                <p class="features pb-3"><?php echo "<strong>Features:</strong> ".$getDetails['pFeature']; ?></p>

                                <a href="editProduct.php?edit=<?php echo $_GET['Show']; ?>" class="btn btn-warning">Edit This Product</a>
                                
                                <?php

                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

<?php include "inc/footer.php" ?>
<script>
    (function($) {
    $(document).ready(function(){
            var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    nav:false,
    dots: false,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[2000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
    });
})(jQuery); 

</script>