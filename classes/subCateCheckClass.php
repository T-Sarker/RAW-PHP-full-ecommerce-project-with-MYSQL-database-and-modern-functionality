<?php

class SubCateCheckClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function getSubCategoryFromDB($catId){

			$catId = $this->fm->validator($catId);
			$catId = mysqli_real_escape_string($this->db->link,$catId);

			$query = "SELECT * FROM tbl_subcategory WHERE category='$catId'";

			$result = $this->db->select($query);

			return $result;

		}
	}
?>