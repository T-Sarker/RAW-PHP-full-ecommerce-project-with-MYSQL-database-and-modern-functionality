<?php include "inc/header.php" ?>
<?php include "../classes/pageClass.php"; ?>
<?php
    $pc = new PageClasses();

    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    	
    	$id = $_GET['edit'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $updateFaq = $pc->updateDeliveryIntoDB($title,$description,$id);
    }
?>
<?php include "inc/sidebar.php" ?>
<div id="right-panel" class="right-panel">
    <?php include "inc/secHeader.php" ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h2>Update Delivery</h2>

        <?php

        	$getDelivery = $pc->getDeliveryFromDBwithID($id);

        	if ($getDelivery) {
        		
        		while ($delivery = $getDelivery->fetch_assoc()) {
        			
        ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="<?php echo $delivery['title']; ?>" class="form-control" id="title" aria-describedby="title" placeholder="Exp: Cash On Delivery" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" aria-describedby="description" placeholder="Provide Description" required><?php echo $delivery['description']; ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php

        		}
        	}

        ?>
    </div>
</div>
<?php include "inc/footer.php" ?>