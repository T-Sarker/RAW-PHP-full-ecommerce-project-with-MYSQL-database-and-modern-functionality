<?php include "inc/header.php" ?>
<?php include "../classes/pageClass.php"; ?>
<?php
    $pc = new PageClasses();

    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    	
    	$id = $_GET['edit'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $updateFaq = $pc->updateFaqIntoDB($question,$answer,$id);
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

        <?php

        	$getFaq = $pc->getFaqFromDBwithID($id);

        	if ($getFaq) {
        		
        		while ($faq = $getFaq->fetch_assoc()) {
        			
        ?>
        <form class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question" value="<?php echo $faq['question'] ?>" class="form-control" id="question" aria-describedby="question" placeholder="Exp: Why Choose Us?" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea name="answer"  class="form-control" id="answer" aria-describedby="answer" placeholder="Provide Answer" required><?php echo $faq['answer'] ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php

        		}
        	}

        ?>
    </div>
</div>
<?php include "inc/footer.php" ?>