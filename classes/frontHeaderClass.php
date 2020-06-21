<?php

class HeaderClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}


		public function getLogoForMainHeader(){

			$query = "SELECT * FROM tbl_logo ORDER BY logoId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}

		public function getNavbarCategoryFromDB(){

			$query = "SELECT * FROM tbl_category WHERE status=1 ORDER BY cateId";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSubCategoryFromDB($cateId){

			$cateId = $this->fm->validator($cateId);
			$cateId = mysqli_real_escape_string($this->db->link,$cateId);

			$query = "SELECT * FROM tbl_subcategory WHERE category='$cateId' AND status=1";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSliderDetailsFromDB(){

			$query = "SELECT * FROM tbl_slider ORDER BY sliderId";

			$result = $this->db->select($query);

			return $result;
		}


		public function getBannerDetails($position){

			$query = "SELECT * FROM tbl_banner WHERE title='$position' ORDER BY bannerId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}

		public function getCategoryForSearchInDB(){

			$query = "SELECT * FROM tbl_category ORDER BY cateId";

			$result = $this->db->select($query);

			return $result;
		}

	}
?>