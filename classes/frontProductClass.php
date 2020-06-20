<?php

class FrontProductClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		// public function getLatestProductFromDB(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='NEW ARRIVALS' AND pause=0 ORDER BY productId DESC";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }

		// public function getProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getFeaturedProductsFromDB(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='FEATURED' AND pause=0 ORDER BY productId DESC";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getFeaturedProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getSomeBestSellerProduct1(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='BEST SELLING' AND pause=0 ORDER BY RAND() LIMIT 4";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getSomeBestSellerProduct2(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='BEST SELLING' AND pause=0 ORDER BY RAND() LIMIT 4";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getBestSellingProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getBestSellingProductImagesFromDB2($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getFestivalProductsFromDB(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='FESTIVAL OFFER' AND pause=0 ORDER BY RAND()";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getFestivalProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getWishListProductsFromDB($productId,$userId){

		// 	$productId = $this->fm->validator($productId);
		// 	$productId = mysqli_real_escape_string($this->db->link,$productId);

		// 	$userId = $this->fm->validator($userId);
		// 	$userId = mysqli_real_escape_string($this->db->link,$userId);

		// 	$query = "INSERT INTO tbl_wishlist(productId,userId) VALUES('$productId','$userId')";

		// 	$result = $this->db->insert($query);

		// 	if ($result) {
				
		// 		return 1;
		// 	}else{
		// 		return 0;
		// 	}


		// }

		// public function getSubCategoryProductFromDB($catId,$subId){

		// 	$catId = $this->fm->validator($catId);
		// 	$catId = mysqli_real_escape_string($this->db->link,$catId);

		// 	$subId = $this->fm->validator($subId);
		// 	$subId = mysqli_real_escape_string($this->db->link,$subId);

		// 	$query = "SELECT * FROM tbl_product WHERE category='$catId' AND subCategory='$subId' AND pause=0";
		// 	$result = $this->db->select($query);

		// 	return $result;
		// }



		// public function getsubsCategoryTypeProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getRelatedBrandsFromDB($getCat){

		// 	$getCat = $this->fm->validator($getCat);
		// 	$getCat = mysqli_real_escape_string($this->db->link,$getCat);

		// 	$query = "SELECT * FROM tbl_brand WHERE category='$getCat'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }



		// public function getFilteredProductsFromDB($brand,$subCat){

		// 	$brand = $this->fm->validator($brand);
		// 	$brand = mysqli_real_escape_string($this->db->link,$brand);

		// 	$subCat = $this->fm->validator($subCat);
		// 	$subCat = mysqli_real_escape_string($this->db->link,$subCat);

		// 	$query = "SELECT * FROM tbl_product WHERE brand='$brand' AND subCategory='$subCat' AND pause=0";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getPriceFilteredProductsFromDB($minVal,$maxVal,$brand,$subCat){
			
		// 	$minVal = $this->fm->validator($minVal);
		// 	$minVal = mysqli_real_escape_string($this->db->link,$minVal);

		// 	$maxVal = $this->fm->validator($maxVal);
		// 	$maxVal = mysqli_real_escape_string($this->db->link,$maxVal);

		// 	$brand = $this->fm->validator($brand);
		// 	$brand = mysqli_real_escape_string($this->db->link,$brand);

		// 	$subCat = $this->fm->validator($subCat);
		// 	$subCat = mysqli_real_escape_string($this->db->link,$subCat);

		// 	if (!empty($minVal) && !empty($maxVal) && $brand!=0 && !empty($subCat)) {
				
		// 		$query = "SELECT * FROM tbl_product WHERE brand='$brand' AND subCategory='$subCat' AND pause=0 AND discount BETWEEN '$minVal' AND '$maxVal'";

		// 		$result = $this->db->select($query);

		// 		return $result;

		// 	}elseif (!empty($minVal) && !empty($maxVal) && $brand==0 && !empty($subCat)) {
		// 		$query = "SELECT * FROM tbl_product WHERE subCategory='$subCat' AND pause=0 AND discount BETWEEN '$minVal' AND '$maxVal'";

		// 		$result = $this->db->select($query);
		// 		return $result;
		// 	}else{

		// 		return "False Query";
		// 	}
		// }


		// public function getPriceFilterTypeProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getFlashDealsFromDB(){

		// 	date_default_timezone_set("Asia/Dhaka");
		// 	$date = date('Y-m-d');
		// 	$query = "SELECT * FROM tbl_product WHERE Poption='FLASH DEALS' AND flashQuantity > 0 AND pause=0 AND Sdate='$date'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getFlashProductImagesFromDB($id){
			
		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getmyHotDealsFromDB1(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='NEW ARRIVALS' AND pause=0 ORDER BY RAND() DESC LIMIT 3";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getHotmyProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getmyHotDealsFromDB2(){

		// 	$query = "SELECT * FROM tbl_product WHERE Poption='NEW ARRIVALS' AND pause=0 ORDER BY RAND() LIMIT 3";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getHotmyProductImagesFromDB2($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getWishListFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_wishlist WHERE userId='$id' ORDER BY wishlistId DESC LIMIT 10";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getWishProduct($pId){

		// 	$pId = $this->fm->validator($pId);
		// 	$pId = mysqli_real_escape_string($this->db->link,$pId);

		// 	$query = "SELECT * FROM tbl_product WHERE productUid='$pId'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getWishProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getSingleProductAvarageRAting($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT AVG(rating) as avarage FROM tbl_review WHERE productUid='$id'";

		// 	$result = $this->db->select($query);

		// 	foreach($result as $row) {
		// 	  return $row['avarage'];
		// 	}

		// }


		// public function getSearchedProductFromDB($catId,$pCode){

		// 	$catId = $this->fm->validator($catId);
		// 	$catId = mysqli_real_escape_string($this->db->link,$catId);

		// 	$pCode = $this->fm->validator($pCode);
		// 	$pCode = mysqli_real_escape_string($this->db->link,$pCode);

		// 	$query = "SELECT * FROM tbl_product WHERE category='$catId' AND name LIKE '%$pCode%'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getSearchTypeProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function getCartProductDetailsFromDB($userId){

		// 	$userId = $this->fm->validator($userId);
		// 	$userId = mysqli_real_escape_string($this->db->link,$userId);

		// 	$query = "SELECT * FROM tbl_cart WHERE userId='$userId' AND status=0";

		// 	$result = $this->db->select($query);

		// 	return $result;

		// }


		// public function getSelectedProductDetailsFromCart($productId){

		// 	$productId = $this->fm->validator($productId);
		// 	$productId = mysqli_real_escape_string($this->db->link,$productId);

		// 	$query = "SELECT * FROM tbl_product WHERE productUid='$productId'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getCartProductImagesFromDB($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

		// 	$result = $this->db->select($query);

		// 	if ($result) {
				
		// 		$rows = array();
		// 		while($row = mysqli_fetch_array($result))
		// 		{
		// 		    $rows[] = $row;
		// 		}

		// 		return $rows;
		// 	}
		// }


		// public function removeProductFromCart($id,$uid){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$uid = $this->fm->validator($uid);
		// 	$uid = mysqli_real_escape_string($this->db->link,$uid);

		// 	$ucode = md5($uid);

		// 	$query = "DELETE FROM tbl_cart WHERE productId='$id' AND userId='$uid' AND active=0";

		// 	$result = $this->db->delete($query);

		// 	if ($result && $result!=false) {
				
		// 		echo "<script>window.location.href = 'cart.php?user=$uid&udcode=$ucode';</script>";
		// 	}else{

		// 		echo "OOPS! Something Went Wrong!!";
		// 	}
		// }



		// public function updateCartQuantityIntoDB($cartPid,$price,$quantity,$uid){

		// 	$cartPid = $this->fm->validator($cartPid);
		// 	$cartPid = mysqli_real_escape_string($this->db->link,$cartPid);

		// 	$price = $this->fm->validator($price);
		// 	$price = mysqli_real_escape_string($this->db->link,$price);

		// 	$quantity = $this->fm->validator($quantity);
		// 	$quantity = mysqli_real_escape_string($this->db->link,$quantity);

		// 	$uid = $this->fm->validator($uid);
		// 	$uid = mysqli_real_escape_string($this->db->link,$uid);

		// 	$ucode = md5($uid);
			
		// 	$total= $price*$quantity;

		// 	$query = "UPDATE tbl_cart SET 
		// 								totalPrice='$total',
		// 								quantity = '$quantity'
		// 						WHERE	productId='$cartPid' AND userId='$uid'";
		// 	$result = $this->db->update($query);

		// 	if ($result && $result!=false) {
				
		// 		echo "<script>window.location.href = 'cart.php?user=$uid&udcode=$ucode';</script>";
		// 	}else{

		// 		echo "OOPS! Something Went Wrong!!";
		// 	}
		// }


		// public function updateCartActiveStatusOnCheckout($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "UPDATE tbl_cart SET active=1 WHERE userId='$id'";

		// 	$result = $this->db->update($query);

		// 	return $result;
		// }


		// public function getDetailsOrdersFromCartPage1($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query = "SELECT * FROM tbl_cart WHERE status=1 AND active=1 AND userId='$id'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		// public function getProNameFromCart($id){

		// 	$id = $this->fm->validator($id);
		// 	$id = mysqli_real_escape_string($this->db->link,$id);

		// 	$query ="SELECT * FROM tbl_product WHERE productUid='$id'";

		// 	$result = $this->db->select($query);

		// 	return $result;
		// }


		public function getLoadMoreProductsFromDB($startLimit,$range,$condition){

			$startLimit = $this->fm->validator($startLimit);
			$startLimit = mysqli_real_escape_string($this->db->link,$startLimit);

			$range = $this->fm->validator($range);
			$range = mysqli_real_escape_string($this->db->link,$range);

			$condition = $this->fm->validator($condition);
			$condition = mysqli_real_escape_string($this->db->link,$condition);

			$query ="SELECT * FROM tbl_product WHERE Poption LIKE '%$condition%' LIMIT $startLimit,$range";

			$result = $this->db->select($query);

			return $result;
		}


		public function getLimitedProduct(){

			$query = "SELECT * FROM tbl_product LIMIT 0,2";

			$result = $this->db->select($query);

			return $result;
		}
		
	}
?>