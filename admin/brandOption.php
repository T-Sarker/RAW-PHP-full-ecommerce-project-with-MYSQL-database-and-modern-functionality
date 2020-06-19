<?php include "inc/header.php" ?>
<?php include '../classes/categoryClass.php' ?>
<?php
    $cc = new CategoryClasses();

     if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $brand = $_POST['brand'];
        $categorys = $_POST['categorys'];

        $insertCategory = $cc->insertBrandIntoDB($brand,$categorys);
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
                        if (isset($insertCategory)) {
                            
                            echo $insertCategory;
                        }
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
                                <input type="text" name="brand" class="form-control" id="brand" aria-describedby="brand" placeholder="Exp: EASY " required maxlength="18">
                            </div>
                        </div>
                            <button type="submit" name="submit" class="btn btn-primary ml-4">Submit</button>
                    </div>
                </form>

                <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $getBrand = $cc->selectBrandFromDB();
                                $x = 1;
                                if ($getBrand) {
                                    while ($brand = $getBrand->fetch_assoc()) {
                                        
                            ?>
                                <tr>
                                  <td><?php echo $x++; ?></td>
                                  <td><?php echo $brand['name'] ?></td>
                                  <td>
                                      <a class="btn btn-warning" href="editBrand.php?edit=<?php echo $brand['BrandUid']; ?> && <?php echo md5($brand['name']); ?>">Edit</a>
                                    
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure!')" href="?Delete=<?php echo $brand['BrandUid']; ?>&& <?php echo md5($brand['name']); ?>">Delete</a>
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