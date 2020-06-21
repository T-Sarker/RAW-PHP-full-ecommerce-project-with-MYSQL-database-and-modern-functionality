<?php
   class SimplePaginationClass
   {
   
   		private $db;
      	private $fm;

      	// pagination variables
		public $current_page;
		public $per_page;
		public $total_count;
      	
      	function __construct()
      	{
      		# connecting db and formats
      		$this->db = new Database();
      		$this->fm = new Format();

      		// this is to assing value send from class insatance
   //    		$this->current_page = (int)$page;
			// $this->per_page = 3;
			// $this->total_count = (int)$total_count;
      	}


      	// public function totatlCount($tableName,$condition){

      	// 	$query = "SELECT COUNT(*) FROM tbl_product WHERE ";
      	// }
}
?>
