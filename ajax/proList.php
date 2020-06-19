
<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/productClass.php';

	$prc = new ProductClass();

		$getP = $prc->getProductsFromDB();

		if ($getP) {
			
			while ($getPro = $getP->fetch_assoc()) {
				
?>

			<tr>

              <td style="width:30%;"><?php echo $getPro['name']; ?></td>
              
              <td>

             <div class="owl-carousel owl-theme" style="width:100px;">
		              	<?php
		              		$id = $getPro['productUid'];
		              		if (isset($id)) {
		              			
		              			$getPimages = $prc->getProductImagesFromDB($id);

		              			if ($getPimages) {
		              				while ($getImg = $getPimages->fetch_assoc()) {
		              					
		              	?>
		              			
								<!-- <li class="slide"></li> -->
								<div class="item"><img src="<?php echo $getImg['image']; ?>" alt="" /></div>


							<?php

		              				}
		              			}
		              		}
							?>
						</div>
             
             
          
					  
              </td>
              <td><?php echo $getPro['price']; ?></td>
              <td><?php echo $getPro['available']; ?></td>
              <td>
                  <?php
                  		if ($getPro['pause']==0) {
                  			
                  ?>
                <a class="btn btn-info" href="?Pause=<?php echo $getPro['productUid']; ?> && <?php echo md5($getPro['name']); ?>">Pause</a>
					<?php

                  		}else{
					?>
                <a class="btn btn-success" href="?Active=<?php echo $getPro['productUid']; ?> && <?php echo md5($getPro['name']); ?>">Active</a>

                <?php
                		}
                ?>
        
                <a class="btn btn-warning" href="editProduct.php?edit=<?php echo $getPro['productUid']; ?>&& <?php echo md5($getPro['name']); ?>">Edit</a>
        
                <a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $getPro['productUid']; ?>&& <?php echo md5($getPro['name']); ?>">Delete</a>

              </td>
            </tr>
<?php
			}

			
		}


	

?>


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


