<?php include 'inc/header.php' ?>
<body class="productsgrid-page">
<?php
    include 'inc/navbar.php';
//checking for get empty or not
    if (isset($_GET) && !empty($_GET)) {

    	//making global to hold data for elseif
    	$cateUid='';
    	
    	//if url has space then from navbar it returns as bla-bla-bla so removing - from url to make bla bla bla 
    	$category = str_replace('-',' ',empty($_GET['category'])? null:$_GET['category']);
    	$subCategory = str_replace('-',' ',empty($_GET['Pcategory'])? null:$_GET['Pcategory']);

    	if ($category !=null && $subCategory==null) {

    		
    		
    		$getCategoryWiseProduct = $fpc->getCategoryIdFromDB($category);
    		echo "<script>var cat ='".$getCategoryWiseProduct."'</script>";
    		echo "<script>var sub ='".null."'</script>";

    		
    		
    	}elseif ($category !=null && $subCategory!=null) {

    	 	$cateUid  = $fpc->getCategoryIdFromDB($category);
    		echo "<script>var cat ='".$cateUid."'</script>";
    		
    	 	echo $getSubCategory = $fpc->getSubCategoryIdFromDB($subCategory);
    		echo "<script>var sub ='".$getSubCategory."'</script>";

    	}else{
			
			// echo "<script>window.location.href = '404.php';</script>";
    	}
    }
?>

	<div class="main-content main-content-product no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-trail breadcrumbs">
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="index-2.html">Home</a>
							</li>
							<li class="trail-item trail-end active">
								Grid Products
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							Grid Products
						</h3>
						<div class="shop-top-control">
							<form class="select-item select-form">
								<span class="title">Sort</span>
								<select title="sort" data-placeholder="9 Products/Page" class="chosen-select">
									<option value="2">9 Products/Page</option>
									<option value="1">12 Products/Page</option>
									<option value="3">10 Products/Page</option>
									<option value="4">8 Products/Page</option>
									<option value="5">6 Products/Page</option>
								</select>
							</form>
							<form class="filter-choice select-form">
								<span class="title">Sort by</span>
								<select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
									<option value="1">Price: Low to High</option>
									<option value="2">Sort by popularity</option>
									<option value="3">Sort by average rating</option>
									<option value="4">Sort by newness</option>
									<option value="5">Sort by price: low to high</option>
								</select>
							</form>
							<div class="grid-view-mode">
								<div class="inner">
									<a href="listproducts.html" class="modes-mode mode-list">
										<span></span>
										<span></span>
									</a>
									<a href="gridproducts.html" class="modes-mode mode-grid  active">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
							</div>
						</div>
						<ul class="row list-products auto-clear equal-container product-grid" id="showProducts">
							
						</ul>
						<div class="pagination clearfix style2">
							<div class="nav-link" id="pagination">
								<!-- <a href="#" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a> -->
								
								<a href="#" class="page-numbers">2</a>
								<a href="#" class="page-numbers current">3</a>
								<!-- <a href="#" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
    include 'inc/footer.php'
?>