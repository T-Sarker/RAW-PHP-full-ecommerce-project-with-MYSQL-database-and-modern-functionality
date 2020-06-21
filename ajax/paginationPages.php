<?php

   include '../config/config.php';
   include "../lib/database.php";
   include "../helpers/formats.php";
   include '../classes/frontProductClass.php';

   $fpc = new FrontProductClass();

   $page =1;
   $perPage =4;

   if (isset($_POST['perpage']) && !empty($_POST['perpage'])) {

   		$perpage = $_POST['perpage'];
   		$category = $_POST['category'];
   		$subCategory = $_POST['subCategory'];

   		$getTotal = $fpc->getTotalResultsOfCategory($category);

   		if (isset($getTotal) && !empty($getTotal)) {
   			
   			for ($i=1; $i <= $getTotal; $i++) { 
?>
				<span class="page-numbers" id="<?php echo $i; ?>"><?php echo $i; ?></span>
<?php
   			}
   		}


   }

?>