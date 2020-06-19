<?php include "inc/header.php" ?>
<?php include "../classes/contactClass.php" ?>
<?php

    $coc = new ContactClass();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $address = $_POST['address'];

        $insertContact = $coc->insertContactDetailsFromBD($email,$phone,$phone2,$address);

    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        
        $id = $_GET['Delete'];

        $deleteContact = $coc->deleteContactFromDB($id);
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
        <h2>Add Contact Details</h2>
        <?php
            if (isset($insertContact)) {
                
        ?>
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>
            <?php echo $insertContact; ?>
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
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Exp: some@mail.com" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="phone" aria-describedby="phone" placeholder="Exp: 01xxxxxxxxx" required maxlength="11">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="phone2">Alternative Phone</label>
                        <input type="tel" name="phone2" class="form-control" id="phone2" aria-describedby="phone2" placeholder="Exp: 01xxxxxxxxx ( Optional )" maxlength="11">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" aria-describedby="address" placeholder="Exp: ThemesGround, 789 Main rd, Anytown, CA 12345 USA" required maxlength="108"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Optional Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getContact = $coc->getContactFromDB();

                        if ($getContact) {
                            while ($contact = $getContact->fetch_assoc()) {
                                
                    ?>
                    <tr>
                        <td style="width:20%;"><?php echo $contact['email']; ?></td>
                        <td style="width:15%;"><?php echo $contact['phone']; ?></td>
                        <td style="width:15%;"><?php echo $contact['phone2']; ?></td>
                        <td style="width:35%;"><?php echo $contact['address']; ?></td>
                        <td style="width:25%;">
                            <a  onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $contact['contactId'];?>&&exeop=<?php echo md5($contact['email']); ?>" class="btn btn-danger">Delete</a>
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