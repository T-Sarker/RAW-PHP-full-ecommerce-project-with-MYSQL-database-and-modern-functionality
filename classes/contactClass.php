<?php

class ContactClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertContactDetailsFromBD($email,$phone,$phone2,$address){

			$email = $this->fm->validator($email);
			$email = mysqli_real_escape_string($this->db->link,$email);

			$phone = $this->fm->validator($phone);
			$phone = mysqli_real_escape_string($this->db->link,$phone);

			$phone2 = $this->fm->validator($phone2);
			$phone2 = mysqli_real_escape_string($this->db->link,$phone2);

			$address = $this->fm->validator($address);
			$address = mysqli_real_escape_string($this->db->link,$address);

			$query = "INSERT INTO tbl_contact(email,phone,phone2,address) VALUES('$email','$phone','$phone2','$address')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Contact inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Contact couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function getContactFromDB(){

			$query = "SELECT * FROM tbl_contact ORDER BY contactId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteContactFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_contact WHERE contactId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'contact.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>Contact couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}


		public function insertSocialLinkIntoDB($social,$link){

			$social = $this->fm->validator($social);
			$social = mysqli_real_escape_string($this->db->link,$social);

			$link = $this->fm->validator($link);
			$link = mysqli_real_escape_string($this->db->link,$link);

			$query = "INSERT INTO tbl_social(socialIcon,socialLink) VALUES('$social','$link')";

			$result = $this->db->insert($query);


			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Social inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Social couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function getSocialFromDB(){

			$query = "SELECT * FROM tbl_social ORDER BY socialId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function deleteSocialFromDB($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_social WHERE socialId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
				 echo "<script>window.location.href = 'social.php';</script>";
			}else{

				$fieldError = "<span style='color:red'>Contact couldn't be Deleted!!</span>";

				return $fieldError;
			}
		}



	}
?>