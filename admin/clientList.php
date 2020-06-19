<?php include "inc/header.php" ?>
<?php include '../classes/clientClass.php' ?>
<?php

    $cc = new ClientClass();

    if (!empty($_GET['Delete'])) {

    	$id = $_GET['Delete'];

    	$deleteClient = $cc->deleteClientFromDB($id);
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
        <h2>Client List</h2>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Company</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            	$getClients = $cc->getClientsFromBD();

            	if ($getClients) {
            		while ($client = $getClients->fetch_assoc()) {
            			
            ?>
                <tr>
                    <td><?php echo $client['company']; ?></td>
                    <td><img style="width:80px;height:80px" src="<?php echo $client['image']; ?>" alt="<?php echo $client['company']; ?>"></td>
                    <td>
                    	<a class="btn btn-warning" href="editClient.php?edit=<?php echo $client['clientId']; ?> && <?php echo md5($client['company']); ?>">Edit</a>
                    	
                    	<a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="?Delete=<?php echo $client['clientId']; ?>&& <?php echo md5($client['company']); ?>">Delete</a>	
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