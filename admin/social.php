<?php include "inc/header.php" ?>
<?php include "../classes/contactClass.php" ?>
<?php

    $coc = new ContactClass();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

        $social = $_POST['social'];
        $link = $_POST['link'];

        $insertSocial = $coc->insertSocialLinkIntoDB($social,$link);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        
        $id = $_GET['Delete'];

        $deleteSocial = $coc->deleteSocialFromDB($id);
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
        <h2>Add Social Media Link</h2>
        <?php
            if (isset($insertSocial)) {
                
        ?>
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>
            <?php echo $insertSocial; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
                }
            ?>
        <form class="mt-3" action="" method="POST">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="form-group">
                        <label for="inputState">Social Media</label>
                        <select class="form-control" name="social" id="exampleFormControlSelect1">
                            <option selected disabled>Choose...</option>
                            <option value="fa fa-facebook-official">facebook</option>
                            <option value="fa fa-youtube-square">youtube</option>
                            <option value="fa fa-instagram">instagram</option>
                            <option value="fa fa-linkedin-square">linkedin</option>
                            <option value="fa fa-pinterest-square">pinterest</option>
                            <option value="fa fa-skype">skype</option>
                            <option value="fa fa-twitter-square">twitter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link">Social Link</label>
                        <input type="text" name="link" class="form-control" id="link" aria-describedby="link" placeholder="Exp: https://facebook.com/something" required >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Icon</th>
                        <th scope="col">Social Link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getSocial = $coc->getSocialFromDB();

                        if ($getSocial) {
                            while ($social = $getSocial->fetch_assoc()) {
                                
                    ?>
                    <tr>
                        <td><i class="<?php echo $social['socialIcon'].' fa-2x'; ?>" aria-hidden="true"></i></td>
                        <td style="width:40%"><?php echo $social['socialLink']; ?></td>
                        <td>
                            <a  onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $social['socialId'];?>&&exeop=<?php echo md5($social['socialLink']); ?>" class="btn btn-danger">Delete</a>
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
</div>
<?php include "inc/footer.php" ?>