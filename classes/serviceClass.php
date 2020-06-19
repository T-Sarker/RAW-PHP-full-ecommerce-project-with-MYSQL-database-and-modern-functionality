<?php

class ServicesClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertServiceIntodb($title,$description,$icon){

			$title = $this->fm->validator($title);
			$title= mysqli_real_escape_string($this->db->link,$title);

			$description = $this->fm->validator($description);
			$description= mysqli_real_escape_string($this->db->link,$description);

			$icon = $this->fm->validator($icon);
			$icon= mysqli_real_escape_string($this->db->link,$icon);

			if (empty($title) || empty($description) || empty($icon)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				$query = "INSERT INTO tbl_service(title,description,icon) VALUES('$title','$description','$icon')";

				$result = $this->db->insert($query);

				if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Service inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Service couldn't be inserted!!</span>";

					return $fieldError;

				}
			}
		}


		public function showAllService(){
			$query = "SELECT * FROM tbl_service ORDER BY serviceId DESC";

			$result = $this->db->select($query);

			return $result;
		}

		public function getServiceDataFromDb($id){

			$id = $this->fm->validator($id);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_service WHERE serviceId='$id'";

			$result = $this->db->select($query);

			return $result;
		}


		public function updateServiceIntodb($title,$description,$icon,$id){

			$title = $this->fm->validator($title);
			$title= mysqli_real_escape_string($this->db->link,$title);

			$description = $this->fm->validator($description);
			$description= mysqli_real_escape_string($this->db->link,$description);

			$icon = $this->fm->validator($icon);
			$icon= mysqli_real_escape_string($this->db->link,$icon);

			if (empty($title) || empty($description) || empty($icon)) {

				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}else{

				$query = "UPDATE tbl_service
							SET	title='$title',
									description = '$description',
									icon = '$icon'
							WHERE serviceId = '$id'";

				$result = $this->db->update($query);

				if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'service.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be Updated!!</span>";

					return $fieldError;

				}
			}
		}

		public function deleteDataFromService($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_service WHERE serviceId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'service.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}

		public function insertClientData($post,$files){

			$name = $this->fm->validator($post['name']);
			$designation = $this->fm->validator($post['designation']);
			$message = $this->fm->validator($post['message']);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$designation= mysqli_real_escape_string($this->db->link,$designation);
			$message= mysqli_real_escape_string($this->db->link,$message);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['Cimage']['name'];
			$imgSize = $files['Cimage']['size'];
			$imgTemp = $files['Cimage']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($name) || empty($designation) || empty($message)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query = "INSERT INTO tbl_client(name,designation,message,image) VALUES('$name','$designation','$message','$uploadImage')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be inserted!!</span>";

					return $fieldError;

				}

			}

		}


		public function showAllClients(){

			$query = "SELECT * FROM tbl_client ORDER BY clientId DESC ";

			$result = $this->db->select($query);
			return $result;
		}

		public function getSingleClient($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_client WHERE clientId='$id'";

			$result = $this->db->select($query);

			return $result;
		}


		public function udateClientData($post,$files,$id){

			$name = $this->fm->validator($post['name']);
			$designation = $this->fm->validator($post['designation']);
			$message = $this->fm->validator($post['message']);
			$id = $this->fm->validator($id);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$designation= mysqli_real_escape_string($this->db->link,$designation);
			$message= mysqli_real_escape_string($this->db->link,$message);
			$id= mysqli_real_escape_string($this->db->link,$id);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['Cimage']['name'];
			$imgSize = $files['Cimage']['size'];
			$imgTemp = $files['Cimage']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($name) || empty($designation) || empty($message)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="UPDATE tbl_client SET
											name='$name',
											designation='$designation',
											message='$message',
											image = '$uploadImage'
									WHERE clientId='$id'";

				$runQuery = $this->db->update($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'client.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}



		public function deleteDataFromClient($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_client WHERE clientId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'client.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}


		public function insertExperienceData($heading,$exyear,$exTitle,$teamNumber,$teamTitle,$proNumber,$proTitle,$clientNumber,$clientTitle){

			$heading = $this->fm->validator($heading);
			$heading= mysqli_real_escape_string($this->db->link,$heading);

			$exyear = $this->fm->validator($exyear);
			$exyear= mysqli_real_escape_string($this->db->link,$exyear);

			$exTitle = $this->fm->validator($exTitle);
			$exTitle= mysqli_real_escape_string($this->db->link,$exTitle);

			$teamNumber = $this->fm->validator($teamNumber);
			$teamNumber= mysqli_real_escape_string($this->db->link,$teamNumber);

			$teamTitle = $this->fm->validator($teamTitle);
			$teamTitle= mysqli_real_escape_string($this->db->link,$teamTitle);

			$proNumber = $this->fm->validator($proNumber);
			$proNumber= mysqli_real_escape_string($this->db->link,$proNumber);

			$proTitle = $this->fm->validator($proTitle);
			$proTitle= mysqli_real_escape_string($this->db->link,$proTitle);

			$clientNumber = $this->fm->validator($clientNumber);
			$clientNumber= mysqli_real_escape_string($this->db->link,$clientNumber);

			$clientTitle = $this->fm->validator($clientTitle);
			$clientTitle= mysqli_real_escape_string($this->db->link,$clientTitle);

			$query ="INSERT INTO tbl_experience(heading,exyear,exTitle,teamNumber,teamTitle,proNumber,proTitle,clientNumber,clientTitle) VALUES('$heading','$exyear','$exTitle','$teamNumber','$teamTitle','$proNumber','$proTitle','$clientNumber','$clientTitle')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Content couldn't be inserted!!</span>";

					return $fieldError;

				}

		}

		public function showAllExperience(){
			$query ="SELECT * FROM tbl_experience ORDER BY expId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}



		public function insertTeamData($post,$files){

			$name = $this->fm->validator($post['name']);
			$position = $this->fm->validator($post['position']);
			$fb = $this->fm->validator($post['fb']);
			$twitter = $this->fm->validator($post['twitter']);
			$behance = $this->fm->validator($post['behance']);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$position= mysqli_real_escape_string($this->db->link,$position);
			$fb= mysqli_real_escape_string($this->db->link,$fb);
			$twitter= mysqli_real_escape_string($this->db->link,$twitter);
			$behance= mysqli_real_escape_string($this->db->link,$behance);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($name) || empty($position) || empty($fb) || empty($twitter) || empty($behance)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="INSERT INTO tbl_team(name,position,fb,twitter,behance,image) VALUES('$name','$position','$fb','$twitter','$behance','$uploadImage')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Team Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Team Content couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}


		public function showAllTeam(){
			$query = "SELECT * FROM tbl_team ORDER BY teamId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getSingleTeamData($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "SELECT * FROM tbl_team WHERE teamId='$id'";

			$result = $this->db->select($query);

			return $result;
		}



		public function updateTeamData($post,$files,$id){

			$name = $this->fm->validator($post['name']);
			$position = $this->fm->validator($post['position']);
			$fb = $this->fm->validator($post['fb']);
			$twitter = $this->fm->validator($post['twitter']);
			$behance = $this->fm->validator($post['behance']);
			$id = $this->fm->validator($id);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$position= mysqli_real_escape_string($this->db->link,$position);
			$fb= mysqli_real_escape_string($this->db->link,$fb);
			$twitter= mysqli_real_escape_string($this->db->link,$twitter);
			$behance= mysqli_real_escape_string($this->db->link,$behance);
			$id= mysqli_real_escape_string($this->db->link,$id);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($name) || empty($position) || empty($fb) || empty($twitter) || empty($behance)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="UPDATE tbl_team SET
											name='$name',
											position='$position',
											fb='$fb',
											twitter='$twitter',
											behance='$behance',
											image = '$uploadImage'
									WHERE teamId='$id'";

				$runQuery = $this->db->update($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'team.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Team Content couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}


		public function deleteSingleTeamData($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_team WHERE teamId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'team.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Team Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}


		public function insertCateoryIntodb($category){

			$category = $this->fm->validator($category);
			$category= mysqli_real_escape_string($this->db->link,$category);

			$query = "INSERT INTO tbl_category(cateName) VALUES('$category')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Category Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category Content couldn't be inserted!!</span>";

					return $fieldError;

				}
		}


		public function showAllcategory(){
			$query ="SELECT * FROM tbl_category ORDER BY cateid DESC";
			$result = $this->db->select($query);

			return $result;
		}

		public function getCategoryDatas($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query ="SELECT * FROM tbl_category WHERE cateid='$id'";
			$result = $this->db->select($query);

			return $result;
		}



		public function updateCateoryIntodb($category,$id){

			$category = $this->fm->validator($category);
			$category= mysqli_real_escape_string($this->db->link,$category);

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_category
						SET	cateName='$category'
						WHERE cateid='$id'";

			$result = $this->db->update($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'category.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category Content couldn't be inserted!!</span>";

					return $fieldError;

				}
		}



		public function insertPortfolioData($post,$files){

			$category = $this->fm->validator($post['category']);
			$title = $this->fm->validator($post['title']);
			$link = $this->fm->validator($post['link']);

			$category= mysqli_real_escape_string($this->db->link,$category);
			$title= mysqli_real_escape_string($this->db->link,$title);
			$link= mysqli_real_escape_string($this->db->link,$link);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($category) || empty($title)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="INSERT INTO tbl_portfolio(portCate,portTitle,ylink,image) VALUES('$category','$title','$link','$uploadImage')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Portfolio Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Portfolio Content couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}


		public function showAllPortfolioS(){

			$query ="SELECT * FROM tbl_portfolio ORDER BY portId DESC";
			$result = $this->db->select($query);
			return $result;
		}


		public function getPortDataxFromDb($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query ="SELECT * FROM tbl_portfolio WHERE portId='$id'";
			$result = $this->db->select($query);
			return $result;
		}




		public function updatePortfolioData($post,$files,$id){

			$category = $this->fm->validator($post['category']);
			$title = $this->fm->validator($post['title']);
			$link = $this->fm->validator($post['link']);
			$id = $this->fm->validator($id);

			$category= mysqli_real_escape_string($this->db->link,$category);
			$title= mysqli_real_escape_string($this->db->link,$title);
			$link= mysqli_real_escape_string($this->db->link,$link);
			$id= mysqli_real_escape_string($this->db->link,$id);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($category) || empty($title)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="UPDATE tbl_portfolio SET
											portCate='$category',
											portTitle='$title',
											ylink='$link',
											image = '$uploadImage'
									WHERE portId='$id'";

				$runQuery = $this->db->update($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'portfolio.php';</script>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Portfolio Content couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}



		public function deleteSinglePortData($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_portfolio WHERE portId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'portfolio.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}


		

		public function insertConsumerIntoDb($post,$files){

			$company = $this->fm->validator($post['company']);

			$company= mysqli_real_escape_string($this->db->link,$company);
			
			$permitedImg = array('jpg','jpeg','png');
			$imgName = $files['image']['name'];
			$imgSize = $files['image']['size'];
			$imgTemp = $files['image']['tmp_name'];

			$imgIdentify =explode('.',$imgName);
			$imgExtension = strtolower(end($imgIdentify));
			$uniqueImage = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage = "upload/".$uniqueImage;

			if (empty($company)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp, $uploadImage);

				$query ="INSERT INTO tbl_consumer(name,image) VALUES('$company','$uploadImage')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Consumer Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Consumer Content couldn't be Inserted!!</span>";

					return $fieldError;

				}

			}

		}

		public function showAllConsumerLogos(){
			$query = "SELECT * FROM tbl_consumer ORDER BY consumerId DESC";
			$result = $this->db->select($query);

			return $result;
		}


		public function deleteSingleConsumer($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_consumer WHERE consumerId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'consumer.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Category Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}

		public function insertMissionDataIntoDb($mission,$vission){

			$mission = $this->fm->validator($mission);
			$mission= mysqli_real_escape_string($this->db->link,$mission);


			$vission = $this->fm->validator($vission);
			$vission= mysqli_real_escape_string($this->db->link,$vission);

			$query ="INSERT INTO tbl_about(mission,vission) VALUES('$mission','$vission')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>About Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>About Content couldn't be Inserted!!</span>";

					return $fieldError;

				}
		}


		public function showAllAbouts(){
			$query ="SELECT * FROM tbl_about ORDER BY aboitId DESC LIMIT 1";
			$result= $this->db->select($query);

			return $result;
		}

		public function deleteDataFromAbout($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_about WHERE aboitId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'about.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>About Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}


		public function insertContactIntodb($address,$emails,$phones){

			$address = $this->fm->validator($address);
			$address= mysqli_real_escape_string($this->db->link,$address);

			$emails = $this->fm->validator($emails);
			$emails= mysqli_real_escape_string($this->db->link,$emails);

			$phones = $this->fm->validator($phones);
			$phones= mysqli_real_escape_string($this->db->link,$phones);

			$query = "INSERT INTO tbl_contact(address,email,phone) VALUES('$address','$emails','$phones')";

			$result = $this->db->insert($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Contact Content inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Contact Content couldn't be Inserted!!</span>";

					return $fieldError;

				}
		}


		public function showAllContactdTails(){
			$query = "SELECT * FROM tbl_contact ORDER BY contactId DESC LIMIT 1";
			$result = $this->db->select($query);

			return $result;
		}


		public function deleteSingleContact($id){

			$id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

			$query = "DELETE FROM tbl_contact WHERE contactId='$id'";

			$result = $this->db->delete($query);

			if ($result) {
					# if sucessfull the show success
					$successNote = "<script>window.location.href = 'contact.php';</script>";

						echo $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Contact Content couldn't be Deleted!!</span>";

					return $fieldError;

				}
		}


		public function showAllMessage(){
			
			$query ="SELECT * FROM tbl_message ORDER BY msgId DESC";
			$result = $this->db->select($query);

			return $result;
		}


		public function insertAllTopClients($post,$files){

			$alt1 = $this->fm->validator($post['alt1']);
			$alt2 = $this->fm->validator($post['alt2']);
			$alt3 = $this->fm->validator($post['alt3']);
			$alt4 = $this->fm->validator($post['alt4']);
			$alt5 = $this->fm->validator($post['alt5']);
			$alt6 = $this->fm->validator($post['alt6']);

			$alt1= mysqli_real_escape_string($this->db->link,$alt1);
			$alt2= mysqli_real_escape_string($this->db->link,$alt2);
			$alt3= mysqli_real_escape_string($this->db->link,$alt3);
			$alt4= mysqli_real_escape_string($this->db->link,$alt4);
			$alt5= mysqli_real_escape_string($this->db->link,$alt5);
			$alt6= mysqli_real_escape_string($this->db->link,$alt6);
			
			$permitedImg1 = array('jpg','jpeg','png');
			$imgName1 = $files['img1']['name'];
			$imgSize1 = $files['img1']['size'];
			$imgTemp1 = $files['img1']['tmp_name'];

			$imgIdentify1 =explode('.',$imgName1);
			$imgExtension1 = strtolower(end($imgIdentify1));
			$uniqueImage1 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage1 = "upload/".$uniqueImage1;



			$permitedImg2 = array('jpg','jpeg','png');
			$imgName2 = $files['img2']['name'];
			$imgSize2 = $files['img2']['size'];
			$imgTemp2 = $files['img2']['tmp_name'];

			$imgIdentify2 =explode('.',$imgName2);
			$imgExtension2 = strtolower(end($imgIdentify2));
			$uniqueImage2 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage2 = "upload/".$uniqueImage2;



			$permitedImg3 = array('jpg','jpeg','png');
			$imgName3 = $files['img3']['name'];
			$imgSize3 = $files['img3']['size'];
			$imgTemp3 = $files['img3']['tmp_name'];

			$imgIdentify3 =explode('.',$imgName3);
			$imgExtension3= strtolower(end($imgIdentify3));
			$uniqueImage3 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage3 = "upload/".$uniqueImage3;



			$permitedImg4 = array('jpg','jpeg','png');
			$imgName4 = $files['img4']['name'];
			$imgSize4 = $files['img4']['size'];
			$imgTemp4 = $files['img4']['tmp_name'];

			$imgIdentify4 =explode('.',$imgName4);
			$imgExtension4 = strtolower(end($imgIdentify4));
			$uniqueImage4 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage4 = "upload/".$uniqueImage4;



			$permitedImg5 = array('jpg','jpeg','png');
			$imgName5 = $files['img5']['name'];
			$imgSize5 = $files['img5']['size'];
			$imgTemp5 = $files['img5']['tmp_name'];

			$imgIdentify5 =explode('.',$imgName5);
			$imgExtension5 = strtolower(end($imgIdentify5));
			$uniqueImage5 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage5 = "upload/".$uniqueImage5;



			$permitedImg6 = array('jpg','jpeg','png');
			$imgName6 = $files['img6']['name'];
			$imgSize6 = $files['img6']['size'];
			$imgTemp6 = $files['img6']['tmp_name'];

			$imgIdentify6 =explode('.',$imgName6);
			$imgExtension6 = strtolower(end($imgIdentify6));
			$uniqueImage6 = substr(md5(time()),0,10).'.'.'imgExtension';

			$uploadImage6 = "upload/".$uniqueImage6;

			if (empty($alt1) || empty($alt2) || empty($alt3) || empty($alt4) || empty($alt5) || empty($alt6)) {
				# not found error occures
				$fieldError = "<span style='color:red'>Field Mustn't be empty!!</span>";

					return $fieldError;
			}
			else{

				move_uploaded_file($imgTemp1, $uploadImage1);
				move_uploaded_file($imgTemp2, $uploadImage2);
				move_uploaded_file($imgTemp3, $uploadImage3);
				move_uploaded_file($imgTemp4, $uploadImage4);
				move_uploaded_file($imgTemp5, $uploadImage5);
				move_uploaded_file($imgTemp6, $uploadImage6);

				$query ="INSERT INTO tbl_topclient(textImga,textImgb,textImgc,textImgd,textImge,textImgf,imgA,imgB,imgC,imgD,imgE,imgF) VALUES('$alt1','$alt2','$alt3','$alt4','$alt5','$alt6','$uploadImage1','$uploadImage2','$uploadImage3','$uploadImage4','$uploadImage5','$uploadImage6')";

				$runQuery = $this->db->insert($query);

				if ($runQuery) {
					# if sucessfull the show success
					$successNote = "<span style='color:green'>Top Client inserted successfully </span>";

						return $successNote;
				}
				else{

					$fieldError = "<span style='color:red'>Top Client couldn't be Updated!!</span>";

					return $fieldError;

				}

			}

		}
 
	}
?>