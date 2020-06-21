<?php
    include 'classes/frontHeaderClass.php';
    include 'classes/frontProductClass.php';
    include 'classes/simplePagination.php';

    $hc = new HeaderClass();
    $fpc = new FrontProductClass();
    // $pc = new PaginatiorClasses();

    $getLogo = $hc->getLogoForMainHeader();

    if (isset($getLogo) && $getLogo!=false) {
        
        $logo = mysqli_fetch_assoc($getLogo);
    }
?>

<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our online store!
                </div>
            </div>
            <div class="top-bar-right">
                
                <ul class="header-user-links">
                    <li>
                        <a href="" disable><?php echo 'Today: '.date('d-M-Y'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-4 col-sm-5 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        
                        
                        <a href="index.php">
                            <img src="<?php 
                            if (isset($logo) && $logo!=false && !empty($logo)) {
                                echo str_replace('../', '',$logo['image']);
                            }
                        ?>" alt="<?php echo !empty($logo['altTag'])? $logo['altTag']:'Should be a Logo' ?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-7 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form class="form-search form-search-width-category">
                            <div class="form-content">
                                <div class="category">
                                    <select title="cate" data-placeholder="All Categories" class="chosen-select"
                                            tabindex="1">
                                        <option value="United States">Accessories</option>
                                        <option value="United Kingdom">Cacti</option>
                                        <option value="Afghanistan">Succulents</option>
                                        <option value="Aland Islands">Sofas</option>
                                        <option value="Albania">New Arrivals</option>
                                        <option value="Algeria">Storage</option>
                                    </select>
                                </div>
                                <div class="inner">
                                    <input type="text" class="input" name="s" value="" placeholder="Search here">
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text">All Categories</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="teamo-nav-vertical vertical-menu teamo-clone-mobile-menu">
                        <?php

                            $getCategory = $hc->getNavbarCategoryFromDB();

                            if (isset($getCategory) && $getCategory!=false && !empty($getCategory)) {
                                
                                while ($category = $getCategory->fetch_assoc()) {

                                    $cateId = $category['cateUid'];
                                    
                        ?>
                            
                            <li class="menu-item menu-item-has-children">
                                <a title="Accessories" href="category/<?php echo str_replace(' ','-',$category['category']); ?>" class="teamo-menu-item-title"><?php echo $category['category']; ?></a>
                                <span class="toggle-submenu"></span>
                                <?php
                                    $getSubCategory = $hc->getSubCategoryFromDB($cateId);

                                    if (isset($getSubCategory) && $getSubCategory!=false && !empty($getSubCategory)) {
                                ?>
                                <ul role="menu" class=" submenu">
                                <?php

                                        while ($subCate = $getSubCategory->fetch_assoc()) {
                                          
                                ?>
                                    <li class="menu-item">
                                        <a title="Audio" href="products/<?php echo $category['category']; ?>/<?php echo $subCate['subCategory'] ?>" class="teamo-item-title"><?php echo $subCate['subCategory'] ?></a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                                <?php
                                    }else{
                                        echo " ";
                                    }
                                ?>
                            </li>
                            <?php

                                    }
                                }else{
                                    echo "No Category Found";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="teamo-clone-mobile-menu teamo-nav main-menu " id="menu-main-menu">
                            <!-- <li class="menu-item  menu-item-has-children">
                                <a href="index-2.html" class="teamo-menu-item-title" title="Home">Home</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    <li class="menu-item">
                                        <a href="index-2.html">Home 01</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="home2.html">Home 02</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="home3.html">Home 03</a>
                                    </li>
                                </ul>
                            </li> -->
                            
                            <li class="menu-item">
                                <a href="index.php" class="teamo-menu-item-title" title="Home">HOme</a>
                            </li>

                            <li class="menu-item">
                                <a href="blogList.php" class="teamo-menu-item-title" title="Blog">Blog</a>
                            </li>

                            <li class="menu-item">
                                <a href="blogList.php" class="teamo-menu-item-title" title="Contact">Contact</a>
                            </li>

                            <!-- <li class="menu-item">
                                <a href="blogList.php" class="teamo-menu-item-title" title="Blog">Blog</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
            
                <a href="">
                    <img src="<?php 
                if (isset($logo) && $logo!=false && !empty($logo)) {
                    echo str_replace('../', '',$logo['image']);
                }
            ?>" alt="<?php echo !empty($logo['altTag'])? $logo['altTag']:'Should be a Logo' ?>">
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
                        <span class="icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form class="header-searchform">
                        <div class="searchform-wrap">
                            <input type="text" class="search-input" placeholder="Enter keywords to search...">
                            <input type="submit" class="submit button" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>