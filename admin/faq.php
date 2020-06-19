<?php include "inc/header.php" ?>
<?php include "../classes/pageClass.php"; ?>
<?php
    $pc = new PageClasses();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $insertFaq = $pc->insertFaqIntoDB($question,$answer);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteFaq = $pc->deleteFaqDataFromDB($id);
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
        <h2>Add Faq</h2>
        <?php
            if (isset($insertFaq)) {
                
        ?>
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>
            <?php echo $insertFaq; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
                }
            ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question" class="form-control" id="question" aria-describedby="question" placeholder="Exp: Why Choose Us?" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea name="answer" class="form-control" id="answer" aria-describedby="answer" placeholder="Provide Answer" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-12">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $getFaq = $pc->getFaqFromBD();

                if ($getFaq) {
                    while ($faq = $getFaq->fetch_assoc()) {
                        
            ?>
                <tr>
                    <td style="width:20%;"><?php echo $faq['question']; ?></td>
                    <td style="width:60%;"><?php 

                        $text = $faq['answer'];
                        echo $af->txtShortener($text,200);
                        ?></td>
                    <td style="width:20%;">
                        <a class="btn btn-warning" href="editFaq.php?edit=<?php echo $faq['faqId']; ?> && <?php echo md5($faq['question']); ?>">Edit</a>
                        
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $faq['faqId']; ?>&& <?php echo md5($faq['question']); ?>">Delete</a>    
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