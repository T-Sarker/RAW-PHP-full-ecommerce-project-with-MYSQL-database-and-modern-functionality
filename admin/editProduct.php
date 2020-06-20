<?php include "inc/header.php" ?>
<?php include '../classes/productClass.php' ?>
<?php
    
    $pc = new ProductClass();


    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];

        $getSproducts = $pc->getProductForEditFromDB($id);
?>
<style>

    </style>
<?php
    }
    if (isset($_GET['edit'])) {
        
        $id = $_GET['edit'];
        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ) {
            
            $insertProduct = $pc->updateProductIntoDB($_POST,$_FILES,$id);
        }
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
        <h2>Product Add</h2>
        <?php

            if (isset($insertImgProduct) && $insertImgProduct!=0) {
                
                    echo $insertImgProduct;
                }
            ?>
        <form  class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <?php

                if (isset($getSproducts)) {
                    while ($getSproduct = $getSproducts->fetch_assoc()) {
                        
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" value="<?php echo $getSproduct['name']; ?>" class="form-control" id="name" aria-describedby="name" placeholder="Enter Product Name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php
                                $selectCategory = $pc->selectCategoryFromDB();
                                echo $cId =  $getSproduct['category'];
                                if ($selectCategory) {
                                    while ($category = $selectCategory->fetch_assoc()) {
                                            // echo var_dump($category['cateUid']);
                                    
                                       

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
                                }else{
                                    echo "no category"; 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="subCategory">Sub Category</label>
                        <select id="subCategory" name="subCategory" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php
                                $selectSubCategory = $pc->getSubCategoryListFromDB();
                                echo $sId =  $getSproduct['subCategory'];
                                if ($selectSubCategory) {
                                    while ($subcategory = $selectSubCategory->fetch_assoc()) {
                                            // echo var_dump($category['cateUid']);
                                    
                                       

                            ?>
                            <option
                                        <?php
                                            if ($subcategory['subCateUid']==$sId) {
                                                echo "selected";
                                            }
                                        ?>
                                     value="<?php echo $subcategory['subCateUid'] ?>">
                                        <?php echo $subcategory['subCategory'] ?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="brands">Brands</label>
                        <select id="brands" name="brands" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php
                                $selectBrands = $pc->selectBrandsFromDB();
                                echo $bId =  $getSproduct['brand'];
                                if ($selectBrands) {
                                    while ($brand = $selectBrands->fetch_assoc()) {
                                            // echo var_dump($category['cateUid']);
                                    
                                       

                            ?>
                            <option
                                        <?php
                                            if ($brand['BrandUid']==$bId) {
                                                echo "selected";
                                            }
                                        ?>
                                     value="<?php echo $brand['BrandUid'] ?>">
                                        <?php echo $brand['name'] ?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="files">Images</label>
                        <input type="file" name="files[]" multiple class="form-control" id="files" aria-describedby="files" placeholder="Enter Company Name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Image Name</label>
                        <input type="text" name="altText" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Image Name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pdetails">Product Details</label>
                        <textarea name="pdetails" class="form-control lol" id="pdetails" aria-describedby="pdetails" placeholder="Enter Product Details" required><?php echo $getSproduct['pdetails']; ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pFeature">Product Feature</label>
                        <textarea name="pFeature" class="form-control lol" id="pFeature" aria-describedby="pFeature" placeholder="Enter Product Details" required><?php echo $getSproduct['pFeature']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="<?php echo $getSproduct['price']; ?>" class="form-control" id="price" aria-describedby="price" placeholder="Enter Company Name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="discount">Discount Price ( Optional )</label>
                        <input type="text" name="discount" value="<?php echo $getSproduct['discount']; ?>" class="form-control" id="discount" aria-describedby="discount" placeholder="Enter Company Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="option">Product Options</label>
                        <select id="option" name="option" class="form-control">
                            <option selected disabled>Choose...</option>
                            <option value="BEST SELLING" <?php
                                if ($getSproduct['Poption']=='BEST SELLING') {
                                    echo "selected";
                                }
                            ?>>BEST SELLING</option>
                            <option value="NEW ARRIVALS" <?php
                                if ($getSproduct['Poption']=='NEW ARRIVALS') {
                                    echo "selected";
                                }
                            ?>>NEW ARRIVALS</option>
                            <option value="FEATURED" <?php
                                if ($getSproduct['Poption']=='FEATURED') {
                                    echo "selected";
                                }
                            ?>>FEATURED</option>
                            <option value="OCCATIONAL OFFER" <?php
                                if ($getSproduct['Poption']=='OCCATIONAL OFFER') {
                                    echo "selected";
                                }
                            ?>>OCCATIONAL OFFER</option>
                            <option value="FLASH DEALS" <?php
                                if ($getSproduct['Poption']=='FLASH DEALS') {
                                    echo "selected";
                                }
                            ?>>SPECIAL DEALS</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="available">Available</label>
                        <select id="available" name="available" class="form-control">
                            <option selected disabled>Choose...</option>
                            <option value="IN STOCK"<?php
                                if ($getSproduct['available']=='IN STOCK') {
                                    echo "selected";
                                }
                            ?>>IN STOCK</option>
                            <option value="STOCK OUT"<?php
                                if ($getSproduct['available']=='STOCK OUT') {
                                    echo "selected";
                                }
                            ?>>STOCK OUT</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="warranty">Product Warranty</label>
                        <input type="text" name="warranty" class="form-control" id="warranty" aria-describedby="warranty" value="<?php echo $getSproduct['warrenty']; ?>" required>
                    </div>
                </div>
            </div>
            
            <button id="fForm" type="submit" class="btn btn-primary" name="submit">Submit</button>
            <?php

                    }
                }

        ?>
        </form>
       
    </div>
</div>
<?php include "inc/footer.php" ?>