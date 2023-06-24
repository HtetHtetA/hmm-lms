<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/batchController.php';

$batch_controller=new BatchController();
$batchs=$batch_controller->getBatchs();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Batch</strong> Dashboard</h1>


                        <div class="row">
                            <div class="col-md-3">
                                <a href="add_batch.php" class='btn btn-dark'>Add New Batch</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-striped' id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>Duration</th>
                                            <th>Discount</th>
                                            <th>Batch_Course</th>
                                            <th>Fee</th>
                                            <th>Actions</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                            foreach($batchs as $batch)
                                            {
                                                echo "<tr >";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>" .$batch['bname']."</td>";
                                                echo "<td>" .$batch['start_date']."</td>";
                                                echo "<td>" .$batch['duration']."</td>";
                                                echo "<td>" .$batch['discount']."</td>";
                                                echo "<td>" .$batch['cname']."</td>";
                                                echo "<td>" .$batch['fee']."</td>";
                                                echo "<td id='".$batch['id']."'> <a class='btn btn-warning mx-3'>View </a> <a class='btn btn-success mx-3' href='edit_batch.php?id=".$batch['id']."'>Edit </a> <button class='btn btn-danger mx-3 delete_batch'>Delete </button> </td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


				</div>
			</main>

<?php
include_once __DIR__.'/../layouts/app_footer.php';		
?>