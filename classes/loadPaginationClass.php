<?php

class LoadPaginationOnClick{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}



		public function rowsCount($tableName,$condition){

			$query = "SELECT * FROM ".$tableName." WHERE Poption LIKE '%".$condition."%'";

			$result = $this->db->select($query);

			if (isset($result) && $result!=false) {
				
				$rows = mysqli_num_rows($result);

				return $rows;
				
			}else{
				return false;
			}

		}
}
?>
