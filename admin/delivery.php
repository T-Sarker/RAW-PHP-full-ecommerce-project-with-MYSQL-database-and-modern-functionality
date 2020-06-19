<?php include "inc/header.php" ?>
<?php include "../classes/pageClass.php"; ?>
<?php
    $pc = new PageClasses();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $insertDelivery = $pc->insertDeliveryIntoDB($title,$description);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteFaq = $pc->deleteDeliveryDataFromDB($id);
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
        <h2>Add Delivery</h2>
        <?php
            if (isset($insertDelivery)) {
                
        ?>
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>
            <?php echo $insertDelivery; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
                }
            ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Exp: Cash On Delivery" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" aria-describedby="description" placeholder="Provide Description" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-12">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $getDelivery = $pc->getDeliveryFromBD();

                if ($getDelivery) {
                    while ($delivery = $getDelivery->fetch_assoc()) {
                        
            ?>
                <tr>
                    <td style="width:20%;"><?php echo $delivery['title']; ?></td>
                    <td style="width:60%;"><?php 

                        $text = $delivery['description'];
                        echo $af->txtShortener($text,200);
                        ?></td>
                    <td style="width:20%;">
                        <a class="btn btn-warning" href="editDelivery.php?edit=<?php echo $delivery['deliveryId']; ?> && <?php echo md5($delivery['title']); ?>">Edit</a>
                        
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $delivery['deliveryId']; ?>&& <?php echo md5($delivery['title']); ?>">Delete</a>    
                    </td>
                </tr>
                <?php

                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "inc/footer.php" ?>