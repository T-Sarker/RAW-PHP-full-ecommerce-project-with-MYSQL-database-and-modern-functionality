<?php

    include 'classes/loadPaginationClass.php';

    $lp = new LoadPaginationOnClick();

    $total = $lp->rowsCount('tbl_product','NEW ARRIVALS');
    $total2 = $lp->singleRowsCount('tbl_product');
?>
<style>
    
.loading {
  position: relative;
  top: 50%;
  /*left: 45%;*/
  transform: translate(50%,50%);
  /*max-width: 400px;*/
  margin: 0 auto;
}
.loading::after {
  clear: both;
  content: "";
  display: block;
}

@-webkit-keyframes fadeIn {
  0% {
    -webkit-transform: scale(1, 1);
  }
  25% {
    -webkit-transform: scale(3, 3);
  }
  50% {
    -webkit-transform: scale(1, 1);
  }
}
@-moz-keyframes fadeIn {
  0% {
    -moz-transform: scale(1, 1);
  }
  25% {
    -moz-transform: scale(3, 3);
  }
  50% {
    -moz-transform: scale(1, 1);
  }
}
@keyframes fadeIn {
  0% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  25% {
    -webkit-transform: scale(3, 3);
    -moz-transform: scale(3, 3);
    -ms-transform: scale(3, 3);
    -o-transform: scale(3, 3);
    transform: scale(3, 3);
  }
  50% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
.dot {
  height: 8px;
  width: 8px;
  background: #fff;
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}
.dot:nth-child(1) {
  background-color: #fff;
  -webkit-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-delay: 0.2s;
  -moz-animation-delay: 0.2s;
  animation-delay: 0.2s;
}
.dot:nth-child(2) {
  background-color: #fff;
  -webkit-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}
.dot:nth-child(3) {
  background-color: #fff;
  -webkit-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}
.dot:nth-child(4) {
  background-color: #fff;
  -webkit-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  animation: fadeIn 3s cubic-bezier(0.645, 0.045, 0.355, 1);
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

</style>
<div class="fullwidth-template">
        <div class="home-slider-banner">
            <div class="container">
                <div class="row10">
                    <div class="col-lg-8 silider-wrapp">
                        <div class="home-slider">
                            <div class="slider-owl owl-slick equal-container nav-center"
                                 data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                                 data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                                
                                <?php
                                    $getSlider = $hc->getSliderDetailsFromDB();

                                    if (isset($getSlider) && $getSlider!=false && !empty($getSlider)) {
                                        
                                        while ($slider = $getSlider->fetch_assoc()) {
                                            
                                ?>
                                <div class="slider-item style7">
                                    <div class="slider-inner equal-element" style="background-image:url(<?php echo str_replace('../', '',$slider['image']); ?>);">
                                        <div class="slider-infor">
                                            <h5 class="title-small">
                                                <?php echo $slider['title']; ?>
                                            </h5>
                                            <h3 class="title-big">
                                                <?php echo $slider['heading']; ?>
                                            </h3>
                                            <br>
                                            <div class="price pt-3">
                                                <?php echo $slider['content']; ?>
                                                
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <?php

                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 banner-wrapp">
                    <?php
                        $getBanner = $hc->getBannerDetails('top');

                        if (isset($getBanner) && !empty($getBanner) && $getBanner!=false) {
                            
                            $banner = mysqli_fetch_assoc($getBanner);
                        }
                    ?>
                        <div class="banner" style="width:100%;height: 290px;background: red;margin-bottom: 25px;">
                            <div class="item-banner style7" style="width:100%;height:100%;">
                                <div class="inner" style="background-image:url(<?php echo str_replace('../', '',$banner['image']); ?>);background-size:cover;height:100%;">
                                    <div class="banner-content" style="width:100%;height:100%;">
                                        
                                        <a href="<?php echo $banner['offerLink']; ?>" class="button btn-shop-now" style="position:relative;top:100%;">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $getBanner = $hc->getBannerDetails('middle');

                            if (isset($getBanner) && !empty($getBanner) && $getBanner!=false) {
                                
                                $banner = mysqli_fetch_assoc($getBanner);
                            }
                        ?>

                        <div class="banner" style="width:100%;height: 290px;background: red;margin-bottom: 20px;">
                            <div class="item-banner style8" style="width:100%;height:100%;">
                                <div class="inner" style="background-image:url(<?php echo str_replace('../', '',$banner['image']); ?>);background-size:cover;height:100%;">
                                    <div class="banner-content" style="width:100%;height:100%;">
                                        <a href="<?php echo $banner['offerLink']; ?>" class="button btn-shop-now" style="position:relative;top:100%;">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teamo-product produc-featured rows-space-65">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    Most Viewed Product
                </h3>
                <div class="owl-products owl-slick equal-container nav-center"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-17.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="10" data-w="4" data-d="10"
                                         data-h="20" data-i="20" data-s="60"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">Areca palm</a>
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
                    </div>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-21.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="9" data-w="2" data-d="30"
                                         data-h="20" data-i="60" data-s="60"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">European Pan Palm</a>
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
                    </div>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-20.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="12" data-w="1" data-d="24"
                                         data-h="20" data-i="50" data-s="60"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">Aluminum Plant Fit</a>
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
                    </div>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-22.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="7" data-w="3" data-d="20"
                                         data-h="10" data-i="10" data-s="20"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">Arrowhead</a>
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
                    </div>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-19.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="9" data-w="2" data-d="30"
                                         data-h="20" data-i="60" data-s="60"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">3-Bird’s Nest Fern</a>
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
                    </div>
                    <div class="product-item style-5">
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
                                        <img src="assets/images/product-item-18.jpg" alt="img">
                                    </a>
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                        <div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2020" data-m="9" data-w="2" data-d="30"
                                         data-h="20" data-i="60" data-s="60"></div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">Broadleaf Lady Palm</a>
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
                    </div>
                </div>
            </div>
        </div>
        
        <div class="banner-wrapp rows-space-65">
            <div class="container">
                <div class="banner" style="width:100%;height: 290px;background: red;margin-bottom: 20px;">
                    <div class="item-banner style17" style="width:100%;height:100%;">
                    <?php
                        $getBanner = $hc->getBannerDetails('bottom');

                        if (isset($getBanner) && !empty($getBanner) && $getBanner!=false) {
                            
                            $banner = mysqli_fetch_assoc($getBanner);
                        }
                    ?>
                        <div class="inner" style="background-image:url(<?php echo str_replace('../', '',$banner['image']); ?>);background-size:cover;height:100%;">
                            <div class="banner-content" style="height:100%;">
                                
                                <a href="<?php echo $banner['offerLink']; ?>" class="button btn-view-collection" style="position:relative;top:100%;">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teamo-tabs  default rows-space-40">
            <div class="container">
            

                <div class="tab-head">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" style="cursor: context-menu;" id="topPickTitle">Top Pick</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" style="cursor: context-menu;" id="newProduct">New Arrivals </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" style="cursor: context-menu;" id="topRated">Top Rated</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container">
                    <div id="new_arrivals" class="tab-panel ">
                        <div class="teamo-product">
                        <div class="loaderIcon" style="position: absolute;width: 100%;height: 100%;background: #1a272d;z-index: 100000;left:0;opacity: 0.9;">
                            <section class="loading">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                              </section>
                        </div>
                            <ul class="row list-products auto-clear equal-container product-grid" id="defaultProduct">
                            <?php
                                $getProduct = $fpc->getLimitedProduct();
                                $condition='';

                                if (isset($getProduct) && $getProduct!=false) {
                                    
                                    while ($product = $getProduct->fetch_assoc()) {
                                        $condition=$product['Poption'];
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
                                ?>
                            </ul>
                            <div class="text-center">
                                <span class="btn btn-success" id="loadMore">Load More</span>
                            </div>
                            <input type="hidden" value="0" id="startRow">
                            <input type="hidden" value="<?php echo $condition; ?>" id="condition">
                            <input type="hidden" value="<?php echo $total; ?>" id="totalRow">
                        </div>
                    </div>


                    <div id="topPick" class="tab-panel active">
                        <div class="teamo-product">
                            <div class="loaderIcon2" style="position: absolute;width: 100%;height: 100%;background: #1a272d;z-index: 100000;left:0;opacity: 0.9;">
                            <section class="loading">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                              </section>
                        </div>
                            <ul class="row list-products auto-clear equal-container product-grid" id="defaultProduct2">
                                <?php
                                    $getAllProduct = $fpc->getAllProductFromDB();

                                    if (isset($getAllProduct) && $getAllProduct!=false) {
                                        
                                        while ($allProduct = $getAllProduct->fetch_assoc()) {
                                            $proId= $allProduct['productUid'];
                                            
                                ?>
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <?php
                                                $data = explode('-', $allProduct['updateAt']);
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
                                                <a href="#"><?php echo $allProduct['name']; ?></a>
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
                                                    if ($allProduct['discount']!=0) {
                                                        
                                                ?>
                                                <div class="price">
                                                    <del>
                                                        <?php echo '<b>৳ </b>'.$allProduct['price']; ?>
                                                    </del>
                                                    <ins>
                                                        <?php echo '<b>৳ </b>'.$allProduct['discount']; ?>
                                                    </ins>
                                                </div>
                                                <?php

                                                    }else{
                                                ?>
                                                <div class="price">
                                                    
                                                    <ins>
                                                        <?php echo '<b>৳ </b>'.$allProduct['price']; ?>
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
                                ?>
                            </ul>
                            <div class="text-center">
                                <span class="btn btn-success" id="loadMore2">Load More</span>
                            </div>
                            <input type="hidden" value="0" id="startRow2">
                            <input type="hidden" value="<?php echo $total2; ?>" id="totalRow2">
                        </div>
                    </div>
                    <div id="top-rated" class="tab-panel">
                        <div class="teamo-product">
                            <ul class="row list-products auto-clear equal-container product-grid">
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
                                                    <img src="assets/images/product-item-10.jpg" alt="img">
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
                                                <a href="#">Projector Headlights</a>
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
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                    <img src="assets/images/product-item-12.jpg" alt="img">
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
                                                <a href="#">Beat Sonic</a>
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
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                    <img src="assets/images/product-item-8.jpg" alt="img">
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
                                                <a href="#">Shark Fin Antenna</a>
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
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                    <img src="assets/images/product-item-4.jpg" alt="img">
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
                                                <a href="#">Billet Specialties</a>
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
                                                    <img src="assets/images/product-item-9.jpg" alt="img">
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
                                                <a href="#">Side View Mirror</a>
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
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                    <img src="assets/images/product-item-13.jpg" alt="img">
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
                                                <a href="#">Cast Iron Plant</a>
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
                                <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                    <img src="assets/images/product-item-16.jpg" alt="img">
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
                                                <a href="#">Catalytic Converter</a>
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
                                                    <img src="assets/images/product-item-8.jpg" alt="img">
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
                                                <a href="#">Specialty Iridium</a>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teamo-iconbox-wrapp default">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="teamo-iconbox default">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-delivery-truck"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Free Delivery On order over $90.00
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teamo-blog-wraap default">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    Our Latest News
                </h3>
                <div class="teamo-blog default">
                    <div class="owl-slick equal-container nav-center"
                         data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}'
                         data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-1.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">Skincare</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We bring you the best </a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Phasellus condimentum nulla a arcu lacinia, a venenatis ex congue.
                                        Mauris nec ante magna.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-2.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">HOW TO</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We know that buying Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Using Lorem Ipsum allows designers to put together layouts
                                        and the form content
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <div class="video-teamo-blog">
                                    <figure>
                                        <img src="assets/images/slider-blog-thumb-3.jpg" alt="img" width="370"
                                             height="280">
                                    </figure>
                                    <a class="quick-install" href="#" data-videosite="vimeo"
                                       data-videoid="134060140"></a>
                                </div>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">VIDEO</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We design functional Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Risus non porta suscipit lobortis habitasse felis, aptent
                                        interdum pretium ut.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-4.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">Skincare</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We know that buying Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Class integer tellus praesent at torquent cras, potenti erat fames
                                        volutpat etiam.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>