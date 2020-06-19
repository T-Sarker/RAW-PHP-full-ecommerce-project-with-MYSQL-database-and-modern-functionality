
<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/subCateCheckClass.php';

	$subCat = new SubCateCheckClass();


	if (isset($_POST['catId']) && !empty($_POST['catId'])) {
		
		$catId = $_POST['catId'];

		$getSubCategory = $subCat->getSubCategoryFromDB($catId);

		if ($getSubCategory) {
			
			while ($subCat = $getSubCategory->fetch_assoc()) {
				
?>
			<option value='<?php echo $subCat['subCateUid'] ?>'><?php echo $subCat['subCategory'] ?></option>
<?php
			}

			
		}


	}

?>