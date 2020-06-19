<?php

class UserCartClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertProductDiscritionIntoCart($price,$pUid,$quantity,$Uid,$total){

			$price = $this->fm->validator($price);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$pUid = $this->fm->validator($pUid);
			$pUid = mysqli_real_escape_string($this->db->link,$pUid);

			$quantity = $this->fm->validator($quantity);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);

			$Uid = $this->fm->validator($Uid);
			$Uid = mysqli_real_escape_string($this->db->link,$Uid);

			$total = $this->fm->validator($total);
			$total = mysqli_real_escape_string($this->db->link,$total);

			date_default_timezone_set("Asia/Dhaka");
			$date = date('Y-m-d');

			$query = "SELECT * FROM tbl_cart WHERE productId='$pUid' AND active=0";

			$res = $this->db->select($query);

			if ($res && $res!=false) {
				
				return 3;
			}else{

				$query = "INSERT INTO tbl_cart(userId,productId,price,totalPrice,orderDate,quantity,active,status) VALUES('$Uid','$pUid','$price','$total','$date','$quantity','0','0')";

				$result = $this->db->insert($query);

				if ($result) {
					return 2;
				}else{
					return 1;
				}
			}
		}


		public function getCartDetailsFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_cart WHERE userId='$id' AND active=0";

			$result = $this->db->select($query);

			if ($result && $result != false) {
					return $result;
			}else{
				return 0;
			}
		}


		public function getDetailsOrdersFromCartPage(){

			$query = "SELECT * FROM tbl_cart WHERE active=1 ORDER BY cartId DESC";

			$result=$this->db->select($query);

			return $result;
		}


		public function getCartNameFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query ="SELECT * FROM tbl_user WHERE userUid='$id'";

			$result = $this->db->select($query);

			return $result;
		}


		public function getProNameFromCart($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query ="SELECT * FROM tbl_product WHERE productUid='$id'";

			$result = $this->db->select($query);

			return $result;
		}

		public function updateCartProductStatusFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_cart SET status=1 WHERE active=1 AND productId='$id'";

			$result = $this->db->update($query);

			if ($result!=false) {
				
				echo "<script>window.location.href = 'order.php';</script>";
			}else{

				echo "SOMETHING WENT WRONG!!";
			}
		}
	}
?>