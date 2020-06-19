<?php include "inc/header.php" ?>
<?php include '../classes/categoryClass.php' ?>
<?php
    $cc = new CategoryClasses();


    if (!empty($_GET['edit'])) {
        $id = $_GET['edit'];
    }

    $getCategorySubCtegory = $cc->getSubCategoryCategoryFromDB($id);


    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['subsubmit'])) {
        
        $category = $_POST['categorys'];
        $subCategory = $_POST['subCategory'];

        $updateSubCategory = $cc->updateSubCategoryIntoDB($category,$subCategory,$id);
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
        
            <div class="col-md-8 border-left">
                <h3>Sub Category Add</h3>
                <?php
                if (isset($insertSubCategory)) {
                
            ?>
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span>
                    <?php echo $insertSubCategory; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    }
                ?>

                <?php
                    if ($getCategorySubCtegory) {
                        while ($subCats = $getCategorySubCtegory->fetch_assoc()) {
                            
                ?>
                <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputState">Categoty</label>
                                <select id="inputState" class="form-control" name="categorys" required>
                                    <option disabled>Choose...</option>
                                    <?php
                                        $selectCategory = $cc->selectCategoryFromDB();
                                        echo $cId =  trim($_GET['cate']);
                                        var_dump($cId);
                                        if ($selectCategory) {
                                            while ($category = $selectCategory->fetch_assoc()) {
                                                    echo var_dump($category['cateUid']);
                                    ?>
                                    <option
                                        <?php
                                            if ($category['cateUid']==$cId) {
                                                echo "selected";
                                            }
                                        ?>
                                     value="<?php echo $category['cateUid'] ?>">
                                        <?php echo $category['category'] ?>
                                    </option>
                                    <?php
                                                
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subCategory">Category Name</label>
                                <input type="text" name="subCategory" value="<?php echo $subCats['subCategory']; ?>" class="form-control" id="subCategory" aria-describedby="subCategory" placeholder="Exp: Saree / Punjabi" required maxlength="20">
                            </div>
                            <button type="submit" name="subsubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php

                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>