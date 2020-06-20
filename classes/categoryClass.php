<?php

class CategoryClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertCategoryIntoDB($category){

			$category = $this->fm->validator($category);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$cateUid = substr(md5($category),1,8);

			$query = "INSERT INTO tbl_category(category,cateUid,status) VALUES('$category','$cateUid',1)";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Category inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function selectCategoryFromDB(){

			$query = "SELECT * FROM tbl_category WHERE status=1";

			$result = $this->db->select($query);

			return $result;
		}

		public function insertSubCategoryIntoDB($category,$subCategory){

			$category = $this->fm->validator($category);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$subCategory = $this->fm->validator($subCategory);
			$subCategory = mysqli_real_escape_string($this->db->link,$subCategory);

			$subCateUid = substr(md5($subCategory),1,8);

			$query = "INSERT INTO tbl_subcategory(subCategory,category,subCateUid,status) VALUES('$subCategory','$category','$subCateUid',1)";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Category inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category couldn't be inserted!!</span>";

					return $fieldError;

				}
		}



		public function getSCategoryListFromDB(){

			$query = "SELECT * FROM tbl_category WHERE status=1";

			$result = $this->db->select($query);

			return $result;
		}

		public function getSubCategoryListFromDB($cat){
			$query = "SELECT * FROM tbl_subcategory WHERE category='$cat' AND status=1";

			$result = $this->db->select($query);

			return $result;
		}

		public function getCategoryFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_category WHERE cateUid='$id' AND status=1";

			$result = $this->db->select($query);

			return $result;
		}


		public function updateCategoryIntoDB($category,$id){

			$category = $this->fm->validator($category);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_category SET category='$category' WHERE cateUid='$id'";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'categoryOption.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;
				}
		}


		public function deleteCategoryDataFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_category SET status=0  WHERE cateUid='$id'";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'categoryOption.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;
				}
		}


		public function getSubCategoryCategoryFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_subcategory WHERE subCateUid='$id' AND status=1";

			$result = $this->db->select($query);

			return $result;
		}


		public function updateSubCategoryIntoDB($category,$subCategory,$id){

			$category = $this->fm->validator($category);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$subCategory = $this->fm->validator($subCategory);
			$subCategory = mysqli_real_escape_string($this->db->link,$subCategory);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$id = trim($id);

			$query = "UPDATE tbl_subcategory SET subCategory = '$subCategory',
												category = '$category'
												WHERE subCateUid='$id'";

			$result = $this->db->update($query);

			if ($result) {
					# if sucessfull the show success
					echo "<script>window.location.href = 'categoryOption.php';</script>";
				}
				else{

					$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;

				}
		}


		public function deleteSubCategoryDataFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			echo $id = trim($id);

			$query = "UPDATE tbl_subcategory SET status=1 WHERE subCateUid='$id'";

			$result = $this->db->update($query);

			if ($result) {
					# if sucessfull the show success
					echo "<script>window.location.href = 'categoryOption.php';</script>";
			}
			else{

				$fieldError = "<span style='color:red'>Sub Category couldn't be Deleted!!</span>";

				return $fieldError;

			}
		}


		public function insertBrandIntoDB($brand,$categorys){

			$brand = $this->fm->validator($brand);
			$brand = mysqli_real_escape_string($this->db->link,$brand);

			$categorys = $this->fm->validator($categorys);
			$categorys = mysqli_real_escape_string($this->db->link,$categorys);

			$subBrandUid = substr(md5($brand),1,8);

			$query = "INSERT INTO tbl_brand(name,BrandUid,category,status) VALUES('$brand','$subBrandUid','$categorys',0)";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Brand inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Brand couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function deleteBrandDataFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_brand SET status=1  WHERE BrandUid='$id'";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'brandOption.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Brand couldn't be Deleted!!</span>";

					return $fieldError;
				}
		}


		public function selectBrandFromDB(){

			$query = "SELECT * FROM tbl_brand WHERE status=0 ORDER BY brandId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getAllBrands($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_brand WHERE BrandUid='$id' AND status=0";

			$result = $this->db->select($query);

			return $result;
		}


		public function udateBrandIntoDB($brand,$categorys,$id){

			$brand = $this->fm->validator($brand);
			$brand = mysqli_real_escape_string($this->db->link,$brand);

			$categorys = $this->fm->validator($categorys);
			$categorys = mysqli_real_escape_string($this->db->link,$categorys);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_brand SET name='$brand',category='$categorys' WHERE BrandUid='$id' AND status=0";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'brandOption.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Brand couldn't be Deleted!!</span>";

					return $fieldError;
				}
		}



	}
?>