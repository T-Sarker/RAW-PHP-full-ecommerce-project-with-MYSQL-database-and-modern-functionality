<?php include "inc/header.php" ?>
<?php include '../classes/cartClass.php' ?>
<?php
    $ucc= new UserCartClass();

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        
        $id = $_GET['id'];

        $updateCartStatus = $ucc->updateCartProductStatusFromDB($id);
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
                    <h2>ORDER PAGE</h2>
                   
                    <div class="orderTable">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">USER</th>
                              <th scope="col">PHONE</th>
                              <th scope="col">PRODUCT</th>
                              <th scope="col">QUANTITY</th>
                              <th scope="col">TOTAL</th>
                              <th scope="col">ORDER DATE</th>
                              <th scope="col">DONE</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php
                                $getCartValue = $ucc->getDetailsOrdersFromCartPage();

                                if ($getCartValue && $getCartValue!=false) {
                                    $x=1;
                                    while ($cart = $getCartValue->fetch_assoc()) {
                                        
                            ?>
                            <tr>
                              <th scope="row"><?php echo $x++ ?></th>
                              <?php
                                        $id = $cart['userId'];
                                        $getCartName = $ucc->getCartNameFromDB($id);

                                        if ($getCartName && $getCartName!=false) {
                                            
                                            while ($cName = $getCartName->fetch_assoc()) {
                                                
                                  ?>
                              <td>
                                  <?php echo $cName['name']; ?>
                              </td>
                              <td><?php echo $cName['phone']; ?></td>
                              <?php

                                            }
                                        }
                              ?>
                              <td>
                                <?php 
                                    $id = $cart['productId'];
                                    $getProName=$ucc->getProNameFromCart($id);
                                    if ($getProName!=false) {
                                        
                                        while ($proName = $getProName->fetch_assoc()) {
                                            
                                            echo $proName['name'];
                                        }
                                    }
                                ?>
                              </td>
                              
                              <td><?php echo $cart['quantity'] ?></td>
                              <td><?php echo $cart['totalPrice'] ?></td>
                              <td><?php echo $cart['orderDate'] ?></td>
                              <td>

                                  <a href="?id=<?php echo $cart['productId']; ?>"
                                    <?php
                                    $status = $cart['status'];
                                    if ($status==1) {
                                        
                                        echo "style='display:none;'";
                                    }
                              ?>
                                   class="btn btn-success">Done</a>
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

        </div>

<?php include "inc/footer.php" ?>