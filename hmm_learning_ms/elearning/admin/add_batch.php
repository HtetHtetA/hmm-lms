<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/courseController.php';
include_once __DIR__. '/../controller/batchController.php';

$course_controller=new CourseController();
$courses=$course_controller->getCourses();

$batch_con=new BatchController();
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
	$start_date=$_POST['start_date'];
	$duration=$_POST['duration'];
    $discount=$_POST['discount'];
    $batch_course=$_POST['batch_course'];
    $fee=$_POST['fee'];
    $status=$batch_con->addBatch($name,$start_date,$duration,$discount,$batch_course,$fee);
    if($status)
    {
        echo '<script>location.href="batch.php"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New batch</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Batch Name</label>
                                        <input type="text" name="name" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Start_Date</label>
                                        <input type="date" name="start_date" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Duration</label>
                                        <input type="text" name="duration" id="" class='form-control'>
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Discount</label>
                                        <input type="text" name="discount" id="" class='form-control'>
                                    </div>
                                    
                                    <div class="my-3">
									<label for="" class="form-class">Batch Course</label>
									<select name="batch_course" id="" class="form-select">
										<?php
										foreach($courses as $course)
										{
											echo "<option value=".$course['id'].">".$course['cname']."</option>";
										}

										?>
									</select>
								</div>

                                    <div>
                                        <label for="" class='form-label'>Fee</label>
                                        <input type="text" name="fee" id="" class='form-control'>
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