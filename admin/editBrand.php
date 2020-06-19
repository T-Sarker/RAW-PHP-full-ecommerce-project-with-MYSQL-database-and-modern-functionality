<?php include "inc/header.php" ?>
<?php include '../classes/categoryClass.php' ?>
<?php
    $cc = new CategoryClasses();

    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
        
        $id = $_GET['edit'];
        $getBrand = $cc->getAllBrands($id);
    }


     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $brand = $_POST['brand'];
        $categorys = $_POST['categorys'];

        $udateBrand = $cc->udateBrandIntoDB($brand,$categorys,$id);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteBrand = $cc->deleteBrandDataFromDB($id);
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
                    <h2>Brand Add</h2>
                    <?php
                        if (isset($insertBrand)) {
                            
                            echo $insertBrand;
                        }
                    ?>
                    <?php
                        if (isset($getBrand)) {
                                
                                while ($brand = $getBrand->fetch_assoc()) {
                                    
                    ?>
                    <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputState">Categoty</label>
                                <select id="inputState" class="form-control" name="categorys" required>
                                    <option selected disabled>Choose...</option>
                                    <?php
                                        $selectCategory = $cc->selectCategoryFromDB();
                                        if ($selectCategory) {
                                            while ($category = $selectCategory->fetch_assoc()) {
                                                
                                    ?>
                                    <option value="<?php echo $category['cateUid'] ?>">
                                        <?php echo $category['category'] ?>
                                    </option>
                                    <?php

                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="brand">Brand Name</label>
                                <input type="text" name="brand" value="<?php echo $brand['name']; ?>" class="form-control" id="brand" aria-describedby="brand" placeholder="Exp: EASY " required maxlength="18">
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