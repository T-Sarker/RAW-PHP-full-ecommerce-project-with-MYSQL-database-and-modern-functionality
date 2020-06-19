<?php

class PageClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertFaqIntoDB($question,$answer){

			$question = $this->fm->validator($question);
			$question = mysqli_real_escape_string($this->db->link,$question);

			$answer = $this->fm->validator($answer);
			$answer = mysqli_real_escape_string($this->db->link,$answer);

			$query = "INSERT INTO tbl_faq(question,answer) VALUES('$question','$answer')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>FAQ inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>FAQ couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function getFaqFromBD(){

			$query = "SELECT * FROM tbl_faq ORDER BY faqId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getFaqFromDBwithID($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_faq WHERE faqId='$id'";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteFaqDataFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_faq WHERE faqId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'faq.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>Faq couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}

		public function updateFaqIntoDB($question,$answer,$id){

			$question = $this->fm->validator($question);
			$question = mysqli_real_escape_string($this->db->link,$question);

			$answer = $this->fm->validator($answer);
			$answer = mysqli_real_escape_string($this->db->link,$answer);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_faq SET
										question='$question',
										answer = '$answer'
										WHERE faqId='$id'
										";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'faq.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>Faq couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}


		public function insertDeliveryIntoDB($title,$description){

			$title = $this->fm->validator($title);
			$title = mysqli_real_escape_string($this->db->link,$title);

			$description = $this->fm->validator($description);
			$description = mysqli_real_escape_string($this->db->link,$description);

			$query = "INSERT INTO tbl_delivery(title,description) VALUES('$title','$description')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Delivery inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Delivery couldn't be inserted!!</span>";

					return $fieldError;

				}
		}

		public function getDeliveryFromBD(){

			$query = "SELECT * FROM tbl_delivery ORDER BY deliveryId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getDeliveryFromDBwithID($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_delivery WHERE deliveryId='$id'";

			$result = $this->db->select($query);

			return $result;
		}

		public function deleteDeliveryDataFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_delivery WHERE deliveryId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'delivery.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>Delivery couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}

		public function updateDeliveryIntoDB($title,$description,$id){

			$title = $this->fm->validator($title);
			$title = mysqli_real_escape_string($this->db->link,$title);

			$description = $this->fm->validator($description);
			$description = mysqli_real_escape_string($this->db->link,$description);

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_delivery SET
										title='$title',
										description = '$description'
										WHERE deliveryId='$id'
										";

			$result = $this->db->update($query);

			if ($result) {
				 echo "<script>window.location.href = 'delivery.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>delivery couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}

	}
?>