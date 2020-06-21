<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include "../classes/frontProductClass.php";

	$fpc = new FrontProductClass();

	if (isset($_POST['row']) && $_POST['row']!=null) {
		
		$startLimit = $_POST['row'];
		$range = $_POST['range'];

		$getMoreProduct = $fpc->getLoadMoreProductsFromDB2($startLimit,$range);

		if (isset($getMoreProduct) && $getMoreProduct!=false) {
			
			// echo $getMoreProduct;
			while ($product = $getMoreProduct->fetch_assoc()) {

				$proId= $product['productUid'];
		?>
				
				<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1 newArival">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                        	<?php
												$data = explode('-', $product['updateAt']);
												$month = $data[1];

												if ($month==date('m')) {
													
													
											?>
                                            <div class="flash">
													<span class="onnew">
													
														<span class="text">
															New
														</span>
													
													</span>
                                            </div>
                                            <?php

												}
                                            ?>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                            <?php
                                            	if ($proId!=null) {
                                            		
                                            		$getProImage = $fpc->getProductSingleImage($proId);
                                            	}
                                            ?>
                                                <a href="#">
                                                    <img src="<?php echo str_replace("../", "", $getProImage); ?>" alt="img">
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="#"><?php echo $product['name']; ?></a>
                                            </h5>
                                            <div class="group-info">
                                                <div class="stars-rating">
                                                    <div class="star-rating">
                                                        <span class="star-3"></span>
                                                    </div>
                                                    <div class="count-star">
                                                        (4)
                                                    </div>
                                                </div>
                                                <?php
                                                    if ($product['discount']!=0) {
                                                        
                                                ?>
                                                <div class="price">
                                                    <del>
                                                        <?php echo '<b>৳ </b>'.$product['price']; ?>
                                                    </del>
                                                    <ins>
                                                        <?php echo '<b>৳ </b>'.$product['discount']; ?>
                                                    </ins>
                                                </div>
                                                <?php

                                                    }else{
                                                ?>
                                                <div class="price">
                                                    
                                                    <ins>
                                                        <?php echo '<b>৳ </b>'.$product['price']; ?>
                                                    </ins>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>

		<?php
			}
		}
	}

?>