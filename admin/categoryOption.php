<?php include "inc/header.php" ?>
<?php include '../classes/categoryClass.php' ?>
<?php
    $cc = new CategoryClasses();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $category = $_POST['category'];

        $insertCategory = $cc->insertCategoryIntoDB($category);
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['subsubmit'])) {
        
        $category = $_POST['categorys'];
        $subCategory = $_POST['subCategory'];

        $insertSubCategory = $cc->insertSubCategoryIntoDB($category,$subCategory);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteClient = $cc->deleteCategoryDataFromDB($id);
    }

        if (isset($_GET['sDelete']) && !empty($_GET['sDelete'])) {
        $id = $_GET['sDelete'];
        $deleteClient = $cc->deleteSubCategoryDataFromDB($id);
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
        <h2>Category Options</h2>
        <div class="row mt-4">
            <div class="col-md-5 border-right mr-3">
                <h3>Category Add</h3>
                <?php
            if (isset($insertCategory)) {
                
            ?>
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span>
                    <?php echo $insertCategory; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    }
                ?>
                <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="category" class="form-control" id="category" aria-describedby="category" placeholder="Exp: Clothing" required maxlength="18">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="categoryTablw mt-5">
                    <h4>Category List</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getCategory = $cc->selectCategoryFromDB();
                            $x = 1;
                            if ($getCategory) {
                                while ($category = $getCategory->fetch_assoc()) {
                                    
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $x++; ?>
                                </th>
                                <td>
                                    <?php echo $category['category'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="editCategory.php?edit=<?php echo $category['cateUid']; ?> && <?php echo md5($category['category']); ?>">Edit</a>
                                    
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure!')" href="categoryOption.php?Delete=<?php echo $category['cateUid']; ?>&& <?php echo md5($category['category']); ?>">Delete</a>
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
            <div class="col-md-6 border-left">
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
                <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12">
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
                            <div class="form-group">
                                <label for="subCategory">Category Name</label>
                                <input type="text" name="subCategory" class="form-control" id="subCategory" aria-describedby="subCategory" placeholder="Exp: Saree / Punjabi" required maxlength="20">
                            </div>
                            <button type="submit" name="subsubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php
                    $getCateGory = $cc->getSCategoryListFromDB();
                    if ($getCateGory) {
                        while ($Cat = $getCateGory->fetch_assoc()) {
                            
                ?>
                <div class="subCategoryList">
                    <div class="row">
                        <div class="col-5">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action" id="<?php echo $Cat['cateUid'].substr($Cat['category'],0,3) ?>" data-toggle="list" href="<?php echo '#'.$Cat['cateUid'] ?>" role="tab" aria-controls="<?php echo $Cat['cateUid'] ?>"><?php echo $Cat['category'] ?> <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="tab-content mt-3 bg-primary" id="nav-tabContent">
                                
                                <div class="tab-pane fade" id="<?php echo $Cat['cateUid'] ?>" role="tabpanel" aria-labelledby="<?php echo $Cat['cateUid'].substr($Cat['category'],0,3) ?>">
                                    <ul class="list-group">
                                        <?php
                                            $cat =  $Cat['cateUid'];
                                            $getSubCateGory = $cc->getSubCategoryListFromDB($cat);
                                            if ($getSubCateGory) {
                                                while ($getsub = $getSubCateGory->fetch_assoc()) {
                                                    
                                        ?>
                                        <li class="list-group-item"><?php echo $getsub['subCategory']; ?><span class="ml-4">

                                            <a class="btn btn-warning" href="editsubCategory.php?edit=<?php echo $getsub['subCateUid']; ?> && cate=<?php echo $getsub['category']; ?> && <?php echo md5($getsub['category']); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="categoryOption.php?sDelete=<?php echo $getsub['subCateUid']; ?> && <?php echo md5($getsub['category']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </span></li>
                                        <?php

                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>