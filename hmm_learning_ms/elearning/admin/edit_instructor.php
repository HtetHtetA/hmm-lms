<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/instructorController.php';

$id=$_GET['id'];
$instructor_controller=new InstructorController();
$instructor=$instructor_controller->getInstructor($id);
// ob_start();

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $status=$instructor_controller->editInstructor($id,$name,$email,$phone,$address);
    if($status)
    {
        // header('location:category.php');
        $message=3;
        echo '<script> location.href="instructor.php?status='.$message.'"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Instructor</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Instructor Name</label>
                                        <input type="text" name="name" id="" class='form-control' value="<?php echo $instructor['name']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Instructor Email</label>
                                        <input type="text" name="email" id="" class='form-control' value="<?php echo $instructor['email']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Phone</label>
                                        <input type="text" name="phone" id="" class='form-control' value="<?php echo $instructor['phone']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Address</label>
                                        <input type="text" name="address" id="" class='form-control' value="<?php echo $instructor['address']; ?>">
                                    </div>
                                    <div class='mt-3'>
                                        <button class="btn btn-dark" name='submit'>Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>


				</div>
			</main>

<?php
include_once __DIR__.'/../layouts/app_footer.php';		
?>