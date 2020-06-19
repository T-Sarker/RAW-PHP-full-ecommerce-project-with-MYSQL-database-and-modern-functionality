<?php include "inc/header.php" ?>
<?php include '../classes/bannerClass.php' ?>
<?php

    $bc = new BannerClass();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $insertBanner = $bc->topBannerInsertIntoDB($_POST,$_FILES);
    }

    if (!empty($_GET['Delete']) && isset($_GET['Delete'])) {

        $id = $_GET['Delete'];

        $deleteItem = $bc->deleteBannerFromDB($id);
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
        <h2>Add Top Banner</h2>
        <?php
            if (isset($insertBanner)) {
                
        ?>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> <?php echo $insertBanner; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            ?>
        <?php
            if (isset($$deleteItem)) {
                
        ?>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-Danger">Error</span> <?php echo $$deleteItem; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="image" class="form-control" id="image" aria-describedby="image" placeholder="Enter Company Name" required accept="image/*">
                        <small>Size: 380px X 300px</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Alt Text</label>
                        <input type="text" name="altText" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Slider Title" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Banner Offer Link</label>
                        <input type="text" name="offerLink" class="form-control" id="offerLink" aria-describedby="offerLink" placeholder="example: https://www.website.com/festival-offer" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <div class="col-10">
        <h2 class="mt-4">Banner Image</h2>
        <?php
            $getTopBanner = $bc->getLastTopBannerFromDB();

            if ($getTopBanner) {
                while ($top = $getTopBanner->fetch_assoc()) {
                    
        ?>
        <img style="width:50%;" src="<?php echo $top['image']; ?>" alt="<?php echo $top['altTag']; ?>">

        <a href="?Delete=<?php echo $top['bannerId']; ?>" class="btn btn-warning">DELETE</a>

        <?php


                }
            }

        ?>
    </div>
    <div class="col-2">
        
    </div>
</div>
<?php include "inc/footer.php" ?>