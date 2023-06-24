<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/instructorController.php';

$instructor_controller=new InstructorController();
$instructors=$instructor_controller->getInstructors();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Instructor</strong> Dashboard</h1>
                    <?php
                        if(isset($_GET['status']) && $_GET['status']==1)
                        {
                            echo "<div class='alert alert-success text-success'> New Instructor has been Successfully</div>";
                        }
                        elseif(isset($_GET['status']) && $_GET['status'] == 2)
                        {
                            echo "<div class='alert alert-success text-primary' > New Instructor has been successfully Updated</div>";
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_instructor.php" class="btn btn-dark" >Add new Instructor</a>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <table class='table table-striped' id='mytable'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                            foreach($instructors as $instructor)
                                            {
                                                echo "<tr>";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>" .$instructor['name']."</td>";
                                                echo "<td>" .$instructor['email']."</td>";
                                                echo "<td>" .$instructor['phone']."</td>";
                                                echo "<td>" .$instructor['address']."</td>";
                                                echo "<td id='".$instructor['id']."'> <a class='btn btn-warning mx-3'>View </a> <a class='btn btn-success mx-3' href='edit_instructor.php?id=".$instructor['id']."'>Edit </a> <button class='btn btn-danger mx-3 ins_delete'>Delete </button> </td>";
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