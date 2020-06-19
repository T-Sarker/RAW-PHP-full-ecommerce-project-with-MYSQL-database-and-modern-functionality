<?php

class ClientClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function clientInsertIntoDB($post,$files){

			$company = $this->fm->validator($post['company']);
			$company = mysqli_real_escape_string($this->db->link,$company);

			$altTag = $this->fm->validator($post['altText']);
			$altTag = mysqli_real_escape_string($this->db->link,$altTag);

			// image validation and integration
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify = explode('.', $imgName);
			    
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()), 0,10).'.'.'imgExtension';
			$uploadImage = "uploads/".$uniqueImage;

			if (empty($altTag) || empty($company)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query = "INSERT INTO tbl_client(company,image,altTag) VALUES('$company','$uploadImage','$altTag')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Client inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Client couldn't be inserted!!</span>";

					return $fieldError;

				}

			}
		}


		public function getClientsFromBD(){

			$query = "SELECT * FROM tbl_client ORDER BY clientId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteClientFromDB($id){

			$id = $this->fm->validator($id);

			$id = mysqli_real_escape_string($this->db->link,$id);

			$getQuery = "SELECT * FROM tbl_client WHERE clientId='$id'";
			
			$res1 = $this->db->select($getQuery);

			var_dump($res1);

			if ($res1) {
				while ($Bimg = $res1->fetch_assoc()) {
				
					$delimg = $Bimg['image'];
    				unlink($delimg);
				
				}
			}

			$query = "DELETE FROM tbl_client WHERE clientId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'clientList.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Client couldn't be Updated!!</span>";

					return $fieldError;
				}

		}

		public function getAllClientsFromDB($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_client WHERE clientId='$id'";

			$result = $this->db->select($query);

			return $result;
		}



		public function clientUpdateIntoDB($post,$files,$id){

			$company = $this->fm->validator($post['company']);
			$company= mysqli_real_escape_string($this->db->link,$company);

			$altTag = $this->fm->validator($post['altText']);
			$altTag= mysqli_real_escape_string($this->db->link,$altTag);

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

						// image validation and integration
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify = explode('.', $imgName);
			    
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()), 0,10).'.'.'imgExtension';
			$uploadImage = "uploads/".$uniqueImage;

			if (empty($altTag) || empty($company)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query = "
						UPDATE tbl_client SET
						company = '$company',
						image = '$uploadImage',
						altTag = '$altTag'
						WHERE clientId = '$id'
						";

				$runQuery = $this->db->update($query);

				if ($runQuery) {
				 return "<script>window.location.href = 'clientList.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Slider couldn't be Updated!!</span>";

					return $fieldError;
				}

			}
		}

	}
?>