<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/traineeController.php';
$trainee_controller=new TraineeController();
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$education=$_POST['education'];
$remark=$_POST['remark'];
$status=$_POST['status'];

$result=$trainee_controller->addTrainee($name,$email,$phone,$city,$education,$remark,$status);
if($result)
{
    echo "<script>location.href='trainee.php?result=".$result."'</script>";
}
}

?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Trainee</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Trainee Name</label>
                                        <input type="text" name="name" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Trainee Email</label>
                                        <input type="text" name="email" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Phone</label>
                                        <input type="text" name="phone" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>City</label>
                                        <input type="text" name="city" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Education</label>
                                        <input type="text" name="education" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Remark</label>
                                        <input type="text" name="remark" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Status</label>
                                        <input type="text" name="status" id="" class='form-control'>
                                    </div>
                                    <div class='mt-3'>
                                        <button class="btn btn-dark" name="submit">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>


				</div>
			</main>

<?php
include_once __DIR__.'/../layouts/app_footer.php';		
?>