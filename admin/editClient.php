<?php include "inc/header.php" ?>
<?php include '../classes/clientClass.php' ?>
<?php

    $cc = new ClientClass();

    if (!empty($_GET['edit']) && isset($_GET['edit'])) {

        $id = $_GET['edit'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
       
            $updateBanner = $cc->clientUpdateIntoDB($_POST,$_FILES,$id);
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
        <h2>Add Client <small><a href="clientList.php" class="btn btn-primary">Client List</a></small></h2>
        <?php
            if (isset($updateBanner)) {
                
        ?>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-danger">Error</span> <?php echo $updateBanner; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            ?>
       
        <?php
            $getClients = $cc->getAllClientsFromDB($id);
            if ($getClients) {
                while ($clients = $getClients->fetch_assoc()) {
                    
        ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="image" class="form-control" id="image" aria-describedby="image" placeholder="Enter Company Name" required accept="image/*">
                        <small>Size: 166px X 110px</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" name="company" value="<?php echo $clients['company'] ?>" class="form-control" id="company" aria-describedby="company" placeholder="Enter Company Name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Alt Text</label>
                        <input type="text" name="altText" value="<?php echo $clients['altTag'] ?>" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Alt text" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php

                }
            }
        ?>
    </div>

</div>
<?php include "inc/footer.php" ?>