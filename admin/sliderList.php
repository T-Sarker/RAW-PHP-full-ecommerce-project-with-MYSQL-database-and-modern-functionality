<?php include "inc/header.php" ?>
<?php include '../classes/sliderClass.php' ?>
<?php
    $sc = new SliderClasses();

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteClient = $sc->deleteDataFromDB($id);
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
        <h2>Slider List</h2>
        <table class="table">
            <thead>
                <tr class="mb-3">
                    <th scope="col">Title</th>
                    <th scope="col">Heading</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            	$getSLider = $sc->getSliderFromDB();
            	if ($getSLider) {
            		while ($slider = $getSLider->fetch_assoc()) {
            			
            ?>
                <tr class="shadow-sm p-3 mb-5 rounded align-middle">
                    <td><?php echo $slider['title'] ?></td>
                    <td><?php echo $slider['heading'] ?></td>
                    <td><?php 
                    		$text = $slider['content'];
                    		echo $af->txtShortener($text,40);
                    		 
                    	?>
                    </td>
                    <td><img style="width:100px;50px;" src="<?php echo $slider['image'] ?>" alt=""></td>
                    <td>
                    	<a class="btn btn-warning" href="editSlider.php?edit=<?php echo $slider['sliderId']; ?> && <?php echo md5($slider['title']); ?>">Edit</a>
                    	
                    	<a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="sliderList.php?Delete=<?php echo $slider['sliderId']; ?>&& <?php echo md5($slider['title']); ?>">Delete</a>
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