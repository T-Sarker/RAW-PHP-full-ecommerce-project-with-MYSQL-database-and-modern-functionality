<?php

class FrontFooterClass{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}


		public function getAllClientsFromDB(){

			$query = "SELECT * FROM tbl_client ORDER BY clientId DESC";

			$result = $this->db->select($query);

			return $result;
		}


		public function getFooterContacts(){

			$query = "SELECT * FROM tbl_contact ORDER BY contactId DESC LIMIT 1";

			$result = $this->db->select($query);

			return $result;
		}


		public function getAllFaqFromDB(){

			$query = "SELECT * FROM tbl_faq ORDER BY faqId DESC";

			$result = $this->db->select($query);

			return $result;
		}
	}
?>