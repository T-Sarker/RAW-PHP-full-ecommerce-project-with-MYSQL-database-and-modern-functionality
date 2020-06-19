<?php

class UserLogin{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertUserDetailsIntoDB($Remail,$userName,$phone,$Rpassword){
			
			$Remail = $this->fm->validator($Remail);
			$Remail= mysqli_real_escape_string($this->db->link,$Remail);

			$userName = $this->fm->validator($userName);
			$userName= mysqli_real_escape_string($this->db->link,$userName);

			$phone = $this->fm->validator($phone);
			$phone= mysqli_real_escape_string($this->db->link,$phone);

			$Rpassword = $this->fm->validator($Rpassword);
			$Rpassword= mysqli_real_escape_string($this->db->link,$Rpassword);
			$Rpassword= md5($Rpassword);

			$userId = substr(md5($Remail),0,6);

			if (empty($Remail) || empty($userName) || empty($phone) || empty($Rpassword)) {
				
				$result = "<div class='alert alert-danger' role='alert'>
  							Fields Must Not Be Empty</div>";

  							return $result;
			}else{

				$query = "SELECT * FROM tbl_user WHERE email='$Remail'";
				$result = $this->db->select($query);

					if (mysqli_num_rows($result) > 0) {
						
						$result = "<div class='alert alert-danger' role='alert'>
  							Email Allready Exists</div>";

  							return $result;
					}else{

						$query = "INSERT INTO tbl_user(email,name,phone,password,userUid,status) VALUES('$Remail','$userName','$phone','$Rpassword','$userId','0')";

						$result1 = $this->db->insert($query);

						if ($result1) {
							
							$userId = $userId;
							
						 	return $userId;

						    }else{

							$result = "<div class='alert alert-danger' role='alert'>
  							Something Wrong! Registration Failed</div>";

  							return $result;
						}




						}
					}
				}


		public function activateAccount($active,$account){

			$active = $this->fm->validator($active);
			$active= mysqli_real_escape_string($this->db->link,$active);

			$account = $this->fm->validator($account);
			$account= mysqli_real_escape_string($this->db->link,$account);

			$ucode = md5($account);

			$query = "UPDATE tbl_user SET status=1 WHERE userUid='$account'";

			$result = $this->db->update($query);

			if ($result) {
				$query = "SELECT * FROM tbl_user WHERE userUid='$account' AND status=1";

				$result = $this->db->select($query);

				if ($result) {
					 // getting values from db and if the result is not false set the sessions
					$value = $result->fetch_assoc();
					// redireting the Admin user to dashboard
					Session::set('Ulogin','true');
					Session::set('Uname',$value['name']);
					Session::set('Uemail',$value['email']);
					Session::set('Uid',$value['userUid']);

					setcookie("userUid", $value['userUid'], time()+600);
					
					echo "<script>window.location.href = 'profile.php?user=$account&ucode=$ucode';</script>";


				}
				else {

					$showError = "Username or password is wrong!";

					return $showError;
				}
			}else{
				$result = "<div class='alert alert-danger' role='alert'>
  							Something Wrong! Activation Failed</div>";

  							return $result;
			}
		}

		public function userLoginManually($email,$pass,$rememberMe){
		
			$email = $this->fm->validator($email);
			$pass = $this->fm->validator($pass);
			$rememberMe = $this->fm->validator($rememberMe);

			$email= mysqli_real_escape_string($this->db->link,$email);

			$pass= mysqli_real_escape_string($this->db->link,$pass);
			$pass = md5($pass);  

			

			if (empty($email) || empty($pass)) {

				$showError = "Fields can not be empty!";

				return $showError;
			}
			else{

				$query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$pass' AND status=1";

				$result = $this->db->select($query);

				$numRow = mysqli_num_rows($result);

				if( $numRow>0 && $numRow<2) {
					 // getting values from db and if the result is not false set the sessions
					$value = $result->fetch_assoc();
					// redireting the Admin user to dashboard
					Session::set('Ulogin','true');
					Session::set('Uname',$value['name']);
					Session::set('Uemail',$value['email']);
					Session::set('Uid',$value['userUid']);


					$account = $value['userUid'];
					$ucode = md5($value['userUid']);

					if (!empty($rememberMe) && !isset($_COOKIE["userUid"])) {

						setcookie("userUid", $value['userUid'], time()+600);
					}
					echo "<script>window.location.href = 'profile.php?user=$account&ucode=$ucode';</script>";

				}
				else {

					$showError = "Username or password is wrong!";

					return $showError;
				}

			}


		}


		public function getSingleUserDetails($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_user WHERE userUid='$id'";

			$result = $this->db->select($query);

			return $result;
		}
}




?>