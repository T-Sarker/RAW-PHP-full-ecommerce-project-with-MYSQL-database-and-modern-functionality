<?php

class FrontSingleProductClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function getSingleProductFromDB($product){

			$product = $this->fm->validator($product);
			$product = mysqli_real_escape_string($this->db->link,$product);

			$query = "SELECT * FROM tbl_product WHERE productUid='$product' AND pause=0";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSingleImageProductFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSingleImageProductFromDB2($id2){

			$id2 = $this->fm->validator($id2);
			$id2 = mysqli_real_escape_string($this->db->link,$id2);

			$query = "SELECT * FROM tbl_pimage WHERE puId='$id2'";

			$result = $this->db->select($query);

			return $result;
		}


		public function getBrandName($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_brand WHERE BrandUid='$id' AND status=0";

			$result = $this->db->select($query);

			return $result;
		}

		public function getRealtedProductFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$id = trim($id);

			$query = "SELECT * FROM tbl_product WHERE subCategory='$id' and pause=0 ORDER BY RAND()";

			$result = $this->db->select($query);

			return $result;
		}


		public function getRelatedProductImagesFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

			$result = $this->db->select($query);

			if ($result) {
				
				$rows = array();
				while($row = mysqli_fetch_array($result))
				{
				    $rows[] = $row;
				}

				return $rows;
			}
		}


		public function insertSingleProductReviewIntoDB($quality,$satisfy,$rating,$Comment,$Uname,$productId){

			$quality = $this->fm->validator($quality);
			$quality = mysqli_real_escape_string($this->db->link,$quality);

			$satisfy = $this->fm->validator($satisfy);
			$satisfy = mysqli_real_escape_string($this->db->link,$satisfy);

			$rating = $this->fm->validator($rating);
			$rating = mysqli_real_escape_string($this->db->link,$rating);

			$Comment = $this->fm->validator($Comment);
			$Comment = mysqli_real_escape_string($this->db->link,$Comment);

			$Uname = $this->fm->validator($Uname);
			$Uname = mysqli_real_escape_string($this->db->link,$Uname);

			$productId = $this->fm->validator($productId);
			$productId = mysqli_real_escape_string($this->db->link,$productId);

			$query = "INSERT INTO tbl_review(quality,satisfiction,comment,name,productUid,rating)VALUES('$quality','$satisfy','$Comment','$Uname','$productId','$rating')";

			$result = $this->db->insert($query);

			if ($result) {
				
				return 0;
			}else{
				return 1;
			}
		}


		public function getSingleProductAvarageRAting($id2){

			$id2 = $this->fm->validator($id2);
			$id2 = mysqli_real_escape_string($this->db->link,$id2);

			$query = "SELECT AVG(rating) as avarage FROM tbl_review WHERE productUid='$id2'";

			$result = $this->db->select($query);

			foreach($result as $row) {
			  return $row['avarage'];
			}

		}


		public function getSingleProductTotalRAting($id2){

			$id2 = $this->fm->validator($id2);
			$id2 = mysqli_real_escape_string($this->db->link,$id2);

			$query = "SELECT * FROM tbl_review WHERE productUid='$id2'";

			$result = $this->db->select($query);

			if ($result!=false) {
				
				$row = mysqli_num_rows($result);

				return $row;
			}else{

				return 0;
			}

		}
	}
?>