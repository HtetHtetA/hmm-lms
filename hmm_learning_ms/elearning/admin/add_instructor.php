<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/instructorController.php';

// ob_start();
$instructor_controller=new InstructorController();
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST["address"];
    $status=$instructor_controller->addInstructor($name,$email,$phone,$address);
    if($status)
    {
        echo '<script> location.href="instructor.php?status='.$status.'"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Instructor</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Instructor Name</label>
                                        <input type="text" name="name" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Instructor Email</label>
                                        <input type="text" name="email" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Phone</label>
                                        <input type="text" name="phone" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Address</label>
                                        <input type="text" name="address" id="" class='form-control'>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <button class="btn btn-dark" name='submit'>Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>


				</div>
			</main>

<?php
include_once __DIR__.'/../layouts/app_footer.php';		
?>