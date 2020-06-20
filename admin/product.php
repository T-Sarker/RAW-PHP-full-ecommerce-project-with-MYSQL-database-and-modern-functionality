<?php include "inc/header.php" ?>
<?php include '../classes/productClass.php' ?>


<?php
    
    $pc = new ProductClass();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ) {
        
        $insertProduct = $pc->insertProductIntoDB($_POST,$_FILES);
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

            if (isset($insertProduct) && $insertProduct!=false) {
                
                    echo $insertProduct;
                }
            ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Product Name"   required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control" required>
                            <option selected disabled>Choose...</option>
                            <?php
                                $getCategory = $pc->selectCategoryFromDB();
                                if ($getCategory) {
                                   while ($category = $getCategory->fetch_Assoc()) {
                                       

                            ?>
                            <option value="<?php echo $category['cateUid'] ?>"><?php echo $category['category'] ?></option>
                            <?php
                                    }
                                }else{
                                    echo "Category Not Found!";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="subCategory">Sub Category</label>
                        <select id="subCategory" name="subCategory" class="form-control" required>
                            <option selected disabled>Choose...</option>
                            
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="brand">Brands</label>
                        <select id="brand" name="brand" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php
                                $getBrand = $pc->selectBrandsFromDB();
                                if ($getBrand) {
                                   while ($brand = $getBrand->fetch_Assoc()) {
                                       

                            ?>
                            <option value="<?php echo $brand['BrandUid'] ?>"><?php echo $brand['name'] ?></option>
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
                        <label for="files">Product Images</label>
                        <input type="file" name="files[]" multiple class="form-control" id="files" aria-describedby="files" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Image Name</label>
                        <input type="text" name="altText" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Image Name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pdetails">Product Details</label>
                        <textarea name="pdetails" class="form-control lol" id="pdetails" placeholder="Enter Product Details"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pFeature">Product Feature</label>
                        <textarea name="pFeature" class="form-control lol" id="pFeature" aria-describedby="pFeature" placeholder="Enter Product Features"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" aria-describedby="price" placeholder="Example: 450" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="discount">Discount Price ( Optional )</label>
                        <input type="text" name="discount" class="form-control" id="discount" aria-describedby="discount" placeholder="Example: 400">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="option">Product Options</label>
                        <select id="option" name="option" class="form-control">
                            <option selected disabled>Choose...</option>
                            <option value="BEST SELLING">BEST SELLING</option>
                            <option value="NEW ARRIVALS">NEW ARRIVALS</option>
                            <option value="FEATURED">FEATURED</option>
                            <option value="FESTIVAL OFFER">FESTIVAL OFFER</option>
                            <option value="FLASH DEALS">FLASH DEALS</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="available">Available</label>
                        <select id="available" name="available" class="form-control">
                            <option selected disabled>Choose...</option>
                            <option value="IN STOCK">IN STOCK</option>
                            <option value="STOCK OUT">STOCK OUT</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="warranty">Product Warranty</label>
                        <input type="text" name="warranty" class="form-control" id="warranty" aria-describedby="warranty" placeholder="Enter Product Warranty">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    
    </div>
</div>
<?php include "inc/footer.php" ?>



