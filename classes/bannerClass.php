<?php

class BannerClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}


		public function topBannerInsertIntoDB($post,$files){

			$offerLink = $this->fm->validator($post['offerLink']);
			$offerLink = mysqli_real_escape_string($this->db->link,$offerLink);

			$altTag = $this->fm->validator($post['altText']);
			$altTag = mysqli_real_escape_string($this->db->link,$altTag);

			// image validation and integration
			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['image']['name'];
            $fileSize = $files['image']['size'];
            $fileTmpName = $files['image']['tmp_name'];
            $fileType = $files['image']['type'];
            $uploadPath = $uploadDirectory . rand(0,9901).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (empty($altTag)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
                    return "This file size or extension is not allowed.";
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
					
					$query = "INSERT INTO tbl_banner(title,image,offerLink,altTag) VALUES('top','$uploadPath','$offerLink','$altTag')";

                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green'>Banner inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red'>Banner couldn't be inserted!!</span>";

						return $fieldError;

					}
                }

			}
		}


		public function getLastTopBannerFromDB(){

			$query = "SELECT * FROM tbl_banner WHERE title='top' ORDER BY bannerId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteBannerFromDB($id){

			$id = $this->fm->validator($id);

			$id = mysqli_real_escape_string($this->db->link,$id);

			$getQuery = "SELECT * FROM tbl_banner WHERE bannerId='$id'";
			
			$res1 = $this->db->select($getQuery);

			var_dump($res1);

			if ($res1) {
				while ($Bimg = $res1->fetch_assoc()) {
				
					$delimg = $Bimg['image'];
    				unlink($delimg);
				
				}
			}

			$query = "DELETE FROM tbl_banner WHERE bannerId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'topBanner.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;
				}

		}


		public function middleBannerInsertIntoDB($post,$files){

			$offerLink = $this->fm->validator($post['offerLink']);
			$offerLink = mysqli_real_escape_string($this->db->link,$offerLink);

			$altTag = $this->fm->validator($post['altText']);
			$altTag = mysqli_real_escape_string($this->db->link,$altTag);

			// image validation and integration
			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['image']['name'];
            $fileSize = $files['image']['size'];
            $fileTmpName = $files['image']['tmp_name'];
            $fileType = $files['image']['type'];
            $uploadPath = $uploadDirectory . rand(0,9901).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (empty($altTag) || empty($offerLink)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
                    return "This file size or extension is not allowed.";
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
					
					$query = "INSERT INTO tbl_banner(title,image,offerLink,altTag) VALUES('middle','$uploadPath','$offerLink','$altTag')";


                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green'>Banner inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red'>Banner couldn't be inserted!!</span>";

						return $fieldError;

					}
                }

			}

		}

		public function getLastMiddleBannerFromDB(){

			$query = "SELECT * FROM tbl_banner WHERE title='middle' ORDER BY bannerId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteMiddleBannerFromDB($id){

			$id = $this->fm->validator($id);

			$id = mysqli_real_escape_string($this->db->link,$id);

			$getQuery = "SELECT * FROM tbl_banner WHERE bannerId='$id'";
			
			$res1 = $this->db->select($getQuery);

			var_dump($res1);

			if ($res1) {
				while ($Bimg = $res1->fetch_assoc()) {
				
					$delimg = $Bimg['image'];
    				unlink($delimg);
				
				}
			}

			$query = "DELETE FROM tbl_banner WHERE bannerId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'middleBanner.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Category couldn't be Updated!!</span>";

					return $fieldError;
				}

		}


		public function bottomBannerInsertIntoDB($post,$files){


			$offerLink = $this->fm->validator($post['offerLink']);
			$offerLink = mysqli_real_escape_string($this->db->link,$offerLink);

			$altTag = $this->fm->validator($post['altText']);
			$altTag = mysqli_real_escape_string($this->db->link,$altTag);

			// image validation and integration
			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['image']['name'];
            $fileSize = $files['image']['size'];
            $fileTmpName = $files['image']['tmp_name'];
            $fileType = $files['image']['type'];
            $uploadPath = $uploadDirectory . rand(0,9901).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (empty($altTag) || empty($offerLink)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
                    return "This file size or extension is not allowed.";
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
					
					$query = "INSERT INTO tbl_banner(title,image,offerLink,altTag) VALUES('bottom','$uploadPath','$offerLink','$altTag')";


                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green'>Banner inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red'>Banner couldn't be inserted!!</span>";

						return $fieldError;

					}
                }

			}
		}

		public function getLastBottomBannerFromDB(){

			$query = "SELECT * FROM tbl_banner WHERE title='bottom' ORDER BY bannerId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteBottomBannerFromDB($id){

			$id = $this->fm->validator($id);

			$id = mysqli_real_escape_string($this->db->link,$id);

			$getQuery = "SELECT * FROM tbl_banner WHERE bannerId='$id'";
			
			$res1 = $this->db->select($getQuery);

			var_dump($res1);

			if ($res1) {
				while ($Bimg = $res1->fetch_assoc()) {
				
					$delimg = $Bimg['image'];
    				unlink($delimg);
				
				}
			}

			$query = "DELETE FROM tbl_banner WHERE bannerId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'bottomBanner.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Banner couldn't be Updated!!</span>";

					return $fieldError;
				}

		}

		public function getsomething(){

			return "<h1>Something </h1>";
		}


	}

?>