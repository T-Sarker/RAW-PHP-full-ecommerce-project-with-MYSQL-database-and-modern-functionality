
<?php

   include '../config/config.php';
   include "../lib/database.php";
   include "../helpers/formats.php";
   include '../classes/frontProductClass.php';

   $fpc = new FrontProductClass();

   $page =1;
   $perPage =4;

   if (isset($_POST['perpage']) && !empty($_POST['perpage'])) {

      // $perpage = $_POST['perpage'];

      if (isset($_POST['page'])) {
            
            $page = $_POST['page'];
      }

      if (isset($_POST['perpage'])) {
            
            // $perPage = $_POST['perpage'];
      }

      echo "<script>console.log(".$page."-".$perPage.")</script>";
      $startPage = ($page-1)*$perPage;
      echo "<script>console.log(".$startPage.")</script>";

      if (isset($_POST['category']) && !empty($_POST['category']) && empty($_POST['subCategory'])) {
         $category = $_POST['category'];
         $getcategoryWiseProduct = $fpc->getcategoryWiseProduct($startPage,$perPage,$category);


         if (isset($getcategoryWiseProduct) && $getcategoryWiseProduct!=false) {
            
            while ($product = $getcategoryWiseProduct->fetch_assoc()) {
               

?>
               <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                        <div class="product-inner equal-element">
                           <div class="product-top">
                              <div class="flash">
                                 <span class="onnew">
                                    <span class="text">
                                       new
                                    </span>
                                 </span>
                              </div>
                           </div>
                           <div class="product-thumb">
                              <div class="thumb-inner">
                                 <a href="#">
                                    <img src="assets/images/product-item-1.jpg" alt="img">
                                 </a>
                                 <div class="thumb-group">
                                    <div class="yith-wcwl-add-to-wishlist">
                                       <div class="yith-wcwl-add-button">
                                          <a href="#">Add to Wishlist</a>
                                       </div>
                                    </div>
                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                    <div class="loop-form-add-to-cart">
                                       <button class="single_add_to_cart_button button">Add to cart
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="product-info">
                              <h5 class="product-name product_title">
                                 <a href="#"><?php echo $product['name'] ?></a>
                              </h5>
                              <div class="group-info">
                                 <div class="stars-rating">
                                    <div class="star-rating">
                                       <span class="star-3"></span>
                                    </div>
                                    <div class="count-star">
                                       (3)
                                    </div>
                                 </div>
                                 <div class="price">
                                    <del>
                                       $65
                                    </del>
                                    <ins>
                                       $45
                                    </ins>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>


<?php
                  
            }
         }else{
            echo "No Product On this Category";
         }

      }elseif(isset($_POST['category']) && !empty($_POST['category']) && !empty($_POST['subCategory']) && isset($_POST['subCategory'])) {
         
         $category = $_POST['category'];
         $subCategory = $_POST['subCategory'];
         $getSubcategoryWiseProduct = $fpc->getSubCategoryWiseProduct($startPage,$perPage,$category,$subCategory);

         if (isset($getSubcategoryWiseProduct) && $getSubcategoryWiseProduct!=false) {
            
            while ($product = $getSubcategoryWiseProduct->fetch_assoc()) {
?>

                      <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                        <div class="product-inner equal-element">
                           <div class="product-top">
                              <div class="flash">
                                 <span class="onnew">
                                    <span class="text">
                                       new
                                    </span>
                                 </span>
                              </div>
                           </div>
                           <div class="product-thumb">
                              <div class="thumb-inner">
                                 <a href="#">
                                    <img src="assets/images/product-item-1.jpg" alt="img">
                                 </a>
                                 <div class="thumb-group">
                                    <div class="yith-wcwl-add-to-wishlist">
                                       <div class="yith-wcwl-add-button">
                                          <a href="#">Add to Wishlist</a>
                                       </div>
                                    </div>
                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                    <div class="loop-form-add-to-cart">
                                       <button class="single_add_to_cart_button button">Add to cart
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="product-info">
                              <h5 class="product-name product_title">
                                 <a href="#"><?php echo $product['name'] ?></a>
                              </h5>
                              <div class="group-info">
                                 <div class="stars-rating">
                                    <div class="star-rating">
                                       <span class="star-3"></span>
                                    </div>
                                    <div class="count-star">
                                       (3)
                                    </div>
                                 </div>
                                 <div class="price">
                                    <del>
                                       $65
                                    </del>
                                    <ins>
                                       $45
                                    </ins>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>  
<?php
               }
            }else{
               echo "No Product Found";
            }
      }
   }

?>