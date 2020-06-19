<?php include "inc/header.php" ?>
<?php include '../classes/categoryClass.php' ?>

<?php
    $cc = new CategoryClasses();

    if (!empty($_GET['edit'])) {
        $id = $_GET['edit'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $category = $_POST['category'];

        $updateCategory = $cc->updateCategoryIntoDB($category,$id);
    }

    $getCategory = $cc->getCategoryFromDB($id);
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
                    <h2>Edit Category</h2>
                    <?php
                        if (isset($updateCategory)) {
                            
                    ?>
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-danger">Error</span> <?php echo $updateCategory; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                            }
                        ?>
                    <?php
                        if ($getCategory) {
                            while ($Cat = $getCategory->fetch_assoc()) {
                                
                    ?>
                    <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="category" value="<?php echo $Cat['category'] ?>" class="form-control" id="category" aria-describedby="category" placeholder="Exp: Clothing" required maxlength="18">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php

                            }
                        }
                ?>
                </div>

        </div>

<?php include "inc/footer.php" ?>