<?php

class ProductClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function selectCategoryFromDB(){

			$query = "SELECT * FROM tbl_category WHERE status=1";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSubCategoryListFromDB(){

			$query = "SELECT * FROM tbl_subcategory WHERE status=1";

			$result = $this->db->select($query);

			return $result;
		}

		public function selectBrandsFromDB(){

			$query = "SELECT * FROM tbl_brand WHERE status=0";

			$result = $this->db->select($query);

			return $result;
		}

		public function insertProductIntoDB($post,$files){
			$Pbrand ='';
			$Pdiscount =0;

			$name = $this->fm->validator($post['name']);
			$name = mysqli_real_escape_string($this->db->link,$name);

			$category = $this->fm->validator($post['category']);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$subCategory = $this->fm->validator($post['subCategory']);
			$subCategory = mysqli_real_escape_string($this->db->link,$subCategory);

			

			if (!empty($post['brand'])) {
				$brand = $this->fm->validator($post['brand']);
				$brand = mysqli_real_escape_string($this->db->link,$brand);
				$Pbrand = $brand;
			}else{
				$Pbrand = 'No Brand';
			}

			$pdetails = $this->fm->validator($post['pdetails']);
			$pdetails = mysqli_real_escape_string($this->db->link,$pdetails);

			$pFeature = $this->fm->validator($post['pFeature']);
			$pFeature = mysqli_real_escape_string($this->db->link,$pFeature);

			$price = $this->fm->validator($post['price']);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$discount = $this->fm->validator($post['discount']);
			$discount = mysqli_real_escape_string($this->db->link,$discount);

			$altText = $this->fm->validator($post['altText']);
			$altText = mysqli_real_escape_string($this->db->link,$altText);

			if (!empty($discount)) {
				$Pdiscount = $discount;
			}else{
				$Pdiscount = 0;
			}


			$option = $this->fm->validator($post['option']);
			$option = mysqli_real_escape_string($this->db->link,$option);

			$available = $this->fm->validator($post['available']);
			$available = mysqli_real_escape_string($this->db->link,$available);

			$updateAt = date('Y-m-d');

			if (!empty($post['brand'])) {
				$warranty = $this->fm->validator($post['warranty']);
				$warranty = mysqli_real_escape_string($this->db->link,$warranty);
			}else{
				$warranty = ' ';
			}

			$txt = $name.$updateAt.$category;

			$productUid = substr(md5($txt),1,6);

			$query = "INSERT INTO tbl_product(name,category,subCategory,brand,pdetails,pFeature,price,discount,Poption,available,warrenty,updateAt,view,productUid,active,pause) VALUES('$name','$category','$subCategory','$Pbrand','$pdetails','$pFeature','$price','$Pdiscount','$option','$available','$warranty','$updateAt',0,'$productUid',0,0)";

			$result = $this->db->insert($query);

			if (isset($result) && $result!=false) {

		        $targetDir = "../uploads/";

	            $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG');

	            if (!empty(array_filter($_FILES['files']['name']))) {

	                foreach ($_FILES['files']['name'] as $key => $val) {

	                	// echo $_FILES['files']['name'][$key];
	                    // File upload path
	                    $fileName =  rand(0,76990).basename($_FILES['files']['name'][$key]);

	                    $targetFilePath = $targetDir . $fileName;

	                    // Check whether file type is valid
	                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

	                    if (in_array($fileType, $allowTypes)) {

	                        // Upload file to server
	                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

	                            $query = "INSERT INTO tbl_pimage(image,altText,puId,status) VALUES('$targetFilePath','$altText','$productUid',0)";
	                            
	                            $result1 = $this->db->insert($query);

	                            

	                        } else {
	                            return '<div class="alert alert-danger" role="alert">
	                                                      Something Went Wrong. image Upload Failed !
	                                                    </div>';
	                        }
	                    } else {
	                        return '<div class="alert alert-danger" role="alert">
	                                                      Wrong Format. Action Failed !
	                                                    </div>';
	                    }
	                }



	                
	            }		 
			}else{

				$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;
			}

			if ($result && $result != false && $result1 && $result1 != false) {

                return '<div class="alert alert-success" role="alert">
                                      Success !
                                    </div>';
            } else {
                return '<div class="alert alert-danger" role="alert">
                                      Something Went Wrong. image Upload Failed !
                                    </div>';
            }


		}

		


		public function getProductsFromDB(){

			$query = "SELECT * FROM tbl_product ORDER BY productId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getProductImagesFromDB($id){

			$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";

			$result = $this->db->select($query);

			return $result;
		}

		public function pauseProductFromProductList($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_product SET pause=1 WHERE productUid='$id'";

			$result = $this->db->update($query);

			return $result;
		}

		public function activeProductFromProductList($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_product SET pause=0 WHERE productUid='$id'";

			$result = $this->db->update($query);

			return $result;
		}

		public function deleteProductFromProductList($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_product WHERE productUid='$id'";
			$result1 = $this->db->delete($query);

			$query2 = "SELECT * FROM tbl_pimage WHERE puId='$id'";
			$result2 = $this->db->select($query2);

			if ($result2) {
				while ($getImg = $result2->fetch_assoc()) {
					$query3 = "DELETE FROM tbl_pimage WHERE puId='$id'";
					$result3 = $this->db->delete($query3);
					$img = $getImg['image'];
					$imgName = chop($img,'uploads/');
					$unLink = unlink($imgName);

					if ($result3) {
						echo "<script>window.location.href = 'productList.php';</script>";
					}else{
						echo "<script type='text/javascript'>
                            window.location.href = 'error.php';";
					}
				}
			}else{
				echo "<script type='text/javascript'>
                            window.location.href = 'error.php';";
			}

			
		}


		public function getSingleProductsImagesFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_pimage WHERE puId = '$id'";
			$result = $this->db->select($query);

			return $result;
		}

		public function getSingleProductsFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_product WHERE productUid = '$id'";
			$result = $this->db->select($query);

			return $result;
		}

		public function getCat($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_category WHERE cateUid='$id'";
			$result = $this->db->select($query);

			while ($res = $result->fetch_assoc()) {
				
				$getCat = $res['category'];

				return $getCat;
			}
		}

		public function getSubCat($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_subcategory WHERE subCateUid='$id'";
			$result = $this->db->select($query);

			while ($res = $result->fetch_assoc()) {
				
				$getSubCat = $res['subCategory'];

				return $getSubCat;
			}
		}

		public function getbrand($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_brand WHERE BrandUid='$id'";
			$result = $this->db->select($query);

			while ($res = $result->fetch_assoc()) {
				
				$getBra = $res['name'];

				return $getBra;
			}
		}


		public function getProductForEditFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_product WHERE productUid = '$id'";
			$result = $this->db->select($query);

			return $result;
		}

		public function updateProductIntoDB($post,$files,$id){

			$Pbrand ='';
			$Pdiscount =0;

			$name = $this->fm->validator($post['name']);
			$name = mysqli_real_escape_string($this->db->link,$name);

			$category = $this->fm->validator($post['category']);
			$category = mysqli_real_escape_string($this->db->link,$category);

			$subCategory = $this->fm->validator($post['subCategory']);
			$subCategory = mysqli_real_escape_string($this->db->link,$subCategory);

			

			if (!empty($post['brand'])) {
				$brand = $this->fm->validator($post['brand']);
				$brand = mysqli_real_escape_string($this->db->link,$brand);
				$Pbrand = $brand;
			}else{
				$Pbrand = 'No Brand';
			}

			$pdetails = $this->fm->validator($post['pdetails']);
			$pdetails = mysqli_real_escape_string($this->db->link,$pdetails);

			$pFeature = $this->fm->validator($post['pFeature']);
			$pFeature = mysqli_real_escape_string($this->db->link,$pFeature);

			$price = $this->fm->validator($post['price']);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$discount = $this->fm->validator($post['discount']);
			$discount = mysqli_real_escape_string($this->db->link,$discount);

			$altText = $this->fm->validator($post['altText']);
			$altText = mysqli_real_escape_string($this->db->link,$altText);

			if (!empty($discount)) {
				$Pdiscount = $discount;
			}else{
				$Pdiscount = 0;
			}


			$option = $this->fm->validator($post['option']);
			$option = mysqli_real_escape_string($this->db->link,$option);

			$available = $this->fm->validator($post['available']);
			$available = mysqli_real_escape_string($this->db->link,$available);

			$updateAt = date('d-m-Y');

			if (!empty($post['brand'])) {
				$warranty = $this->fm->validator($post['warranty']);
				$warranty = mysqli_real_escape_string($this->db->link,$warranty);
			}else{
				$warranty = ' ';
			}

			$warranty = $this->fm->validator($post['warranty']);
			$warranty = mysqli_real_escape_string($this->db->link,$warranty);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$id = trim($id);

			
            		
            		$targetDir = "../uploads/";

		            $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG');

		            if (!empty(array_filter($_FILES['files']['name']))) {

		            	if (!empty($id)) {
				
							$query="UPDATE tbl_product SET
			            							name ='$name',
			            							category ='$category',
			            							subCategory ='$subCategory',
			            							brand ='$Pbrand',
			            							pdetails ='$pdetails',
			            							pFeature ='$pFeature',
			            							price ='$price',
			            							discount ='$Pdiscount',
			            							Poption ='$option',
			            							available ='$available',
			            							warrenty = '$warranty',
			            							updateAt = '$updateAt' WHERE productUid='$id'";

			            	$resUpdate = $this->db->update($query);
			            }

		            	$query = "SELECT * FROM tbl_pimage WHERE puId='$id'";
		            	$result = $this->db->select($query);

		            	if (isset($result) && $result!=false) {
		            		
		            		while ($img = $result->fetch_assoc()) {
		            			
		            			//getting image name from db
		            			$imgName = $img['image'];
		            			$image = explode('../uploads/',$imgName);
		            			//unlinking the image
		                		$unLink = unlink (__DIR__ . '/../uploads/' . $image[1]);

		                		if ($unLink) {
		                			
		                			$query = "DELETE FROM tbl_pimage WHERE puId='$id'";
		                			$res = $this->db->delete($query);
		                		}
		                	}

		                			if (isset($res) && $res!=false) {


		                				
		                				foreach ($_FILES['files']['name'] as $key => $val) {
						                    // File upload path
						                    $fileName =  rand(0,76990).basename($_FILES['files']['name'][$key]);

						                    $targetFilePath = $targetDir . $fileName;

						                    // Check whether file type is valid
						                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

						                    if (in_array($fileType, $allowTypes)) {

						                        // Upload file to server
						                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

						                            $query = "INSERT INTO tbl_pimage(image,altText,puId,status) VALUES('$targetFilePath','$altText','$id',0)";
						                            
						                            $result1 = $this->db->insert($query);

						                            

						                        } else {
						                            return '<div class="alert alert-danger" role="alert">
						                                                      Something Went Wrong. image Upload Failed !
						                                                    </div>';
						                        }
						                    } else {
						                        return '<div class="alert alert-danger" role="alert">
						                                                      Wrong Format. Action Failed !
						                                                    </div>';
						                    }
						                }
		                			}
		                		// }
		            		// }
		            	}else{
		            		echo "This Product has no Image!So enter Images";
		            	}
		            }else{
		            	
	            		if (!empty($id)) {
			
							$query="UPDATE tbl_product SET
			            							name ='$name',
			            							category ='$category',
			            							subCategory ='$subCategory',
			            							brand ='$Pbrand',
			            							pdetails ='$pdetails',
			            							pFeature ='$pFeature',
			            							price ='$price',
			            							discount ='$Pdiscount',
			            							Poption ='$option',
			            							available ='$available',
			            							warrenty = '$warranty',
			            							updateAt = '$updateAt' WHERE productUid='$id'";

			            	$resUpdate = $this->db->update($query);
			            }
		            }
            	


            	if (($resUpdate && $resUpdate != false) || ($result1 && $result1 != false)) {

                   echo "<script>window.location.href = 'productList.php';</script>";

                } else {
                    return '<div class="alert alert-danger" role="alert">
                                          Something Went Wrong. image Upload Failed !
                                        </div>';
                }
			

		}


	}
?>


