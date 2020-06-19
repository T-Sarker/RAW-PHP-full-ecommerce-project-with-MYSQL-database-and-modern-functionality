<?php

class SliderClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertSliderIntoDB($post,$files){

			$title = $this->fm->validator($post['title']);
			$title= mysqli_real_escape_string($this->db->link,$title);

			$heading = $this->fm->validator($post['heading']);
			$heading= mysqli_real_escape_string($this->db->link,$heading);

			$content = $this->fm->validator($post['content']);
			$content= mysqli_real_escape_string($this->db->link,$content);

			$altText = $this->fm->validator($post['altText']);
			$altText= mysqli_real_escape_string($this->db->link,$altText);

			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['image']['name'];
            $fileSize = $files['image']['size'];
            $fileTmpName = $files['image']['tmp_name'];
            $fileType = $files['image']['type'];
            $uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);


			if (empty($altText)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
                    return "This file size or extension is not allowed.";
                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
					
					$query = "INSERT INTO tbl_slider(title,heading,content,image,altText) VALUES('$title','$heading','$content','$uploadPath','$altText')";

                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green'>Slider inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red'>Slider couldn't be inserted!!</span>";

						return $fieldError;

					}
                }

			}
		}


		public function getSliderFromDB(){

			$query = "SELECT * FROM tbl_slider ORDER BY sliderId DESC LIMIT 4";

			$result = $this->db->select($query);
			return $result;
		}


		public function getSliderValueForForm($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_slider WHERE sliderId='$id'";
			$result = $this->db->select($query);

			return $result;
		}


		public function updateSliderIntoDB($post,$files,$id){

			$title = $this->fm->validator($post['title']);
			$title= mysqli_real_escape_string($this->db->link,$title);

			$heading = $this->fm->validator($post['heading']);
			$heading= mysqli_real_escape_string($this->db->link,$heading);

			$content = $this->fm->validator($post['content']);
			$content= mysqli_real_escape_string($this->db->link,$content);

			$altText = $this->fm->validator($post['altText']);
			$altText= mysqli_real_escape_string($this->db->link,$altText);

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$uploadDirectory = "../uploads/";
            $errors = []; // Store all foreseen and unforseen errors here
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG']; // Get all the file extensions
            $fileName = $files['image']['name'];
            $fileSize = $files['image']['size'];
            $fileTmpName = $files['image']['tmp_name'];
            $fileType = $files['image']['type'];
            $uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (empty($fileName)) {
				
				$query = "UPDATE tbl_slider SET
						title = '$title',
						heading = '$heading',
						content = '$content',
						altText = '$altText'
						WHERE sliderId = '$id'";

				$runQuery = $this->db->update($query);

				if ($runQuery) {
				 return "<script>window.location.href = 'sliderList.php';</script>";
				}else{

					$fieldError = "<span style='color:red'>Slider couldn't be Updated!!</span>";

					return $fieldError;
				}
			}elseif (!empty($fileName)) {
				
				$query = "SELECT * FROM tbl_slider WHERE sliderId='$id'";
		        $result = $this->db->select($query);

			    if (isset($result) && !empty($result) && $result!=false) {

			    	$imgs = mysqli_fetch_assoc($result);
		        	
		        	$img = $imgs['image'];
	                $imgName = explode('../uploads/',$img);
	                $unLink = unlink (__DIR__ . '/../uploads/' . $imgName[1]);

	                if ($unLink) {
	                	
	                	if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {
		                    return "This file size or extension is not allowed.";
		                } else {
		                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
							
							$query = "UPDATE tbl_slider SET
										title = '$title',
										heading = '$heading',
										content = '$content',
										image = '$uploadPath',
										altText = '$altText'
										WHERE sliderId = '$id'";

		                    $result = $this->db->update($query);
		                    if ($result && $didUpload && $result != false) {
		                        return "<script>window.location.href = 'sliderList.php';</script>";
							}
							else{

								$fieldError = "<span style='color:red'>Slider couldn't be Updated!!</span>";

								return $fieldError;

							}
		                }

	                }
			    }
			}
		}


		public function deleteDataFromDB($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_slider WHERE sliderId='$id'";
	        $result = $this->db->select($query);

		    if (isset($result) && !empty($result) && $result!=false) {

		    	$imgs = mysqli_fetch_assoc($result);
	        	
	        	$img = $imgs['image'];
                $imgName = explode('../uploads/',$img);
                $unLink = unlink (__DIR__ . '/../uploads/' . $imgName[1]);;

                if ($unlink) {

                	$query = "DELETE FROM tbl_slider WHERE sliderId='$id'";

					$result = $this->db->delete($query);

					if ($result) {
						 echo "<script>window.location.href = 'sliderList.php';</script>";
					}else{

						$fieldError = "<span style='color:red'>Slider couldn't be Updated!!</span>";

						return $fieldError;
					}
                }else{
                	
                	$fieldError = "<span style='color:red'>Previous Image Remove failed!!</span>";

						return $fieldError;
                }
            }

			
		}


	}
?>