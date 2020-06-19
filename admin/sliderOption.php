<?php include "inc/header.php" ?>

<?php include '../classes/sliderClass.php' ?>

<?php
    $sc = new SliderClasses();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $insertSlider = $sc->insertSliderIntoDB($_POST,$_FILES);
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
        <h2>Update Slider</h2>
        <?php
            if (isset($insertSlider)) {
                
        ?>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> <?php echo $insertSlider; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="col">
                    <div class="form-group">
                        <label for="image">Slider Image</label>
                        <input type="file" name="image" class="form-control" id="image" aria-describedby="image" placeholder="Enter Company Name" required accept="image/*">
                        <small>Size: 770px X 620px</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title">Slider Title</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter Slider Title" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="heading">Slider Heading</label>
                        <input type="text" name="heading" class="form-control" id="heading" aria-describedby="heading" placeholder="Enter Slider Heading" required>
                    </div>
                    <div class="form-group">
                        <label for="altText">ALT Tag ( SEO PERPOUS )</label>
                        <input type="text" name="altText" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Alt text">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="content">Slider Content</label>
                        <textarea name="content" class="form-control" id="content" aria-describedby="content" placeholder="Enter Slider Content" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
    </div>
</div>
<?php include "inc/footer.php" ?>