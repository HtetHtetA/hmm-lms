<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__. '/../controller/batchController.php';
include_once __DIR__. '/../controller/courseController.php';

$id=$_GET['id'];
$batch_controller=new BatchController();
$batch=$batch_controller->getBatch($id);

$course_controller=new CourseController();
$courses=$course_controller->getCourseInfoBatch();

// ob_start();

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $discount=$_POST['discount'];
    $batch_course=$_POST['batch_course'];
    $fee=$_POST['fee'];
    $status=$batch_controller->editBatch($id,$name,$start_date,$duration,$discount,$batch_course,$fee);
    if($status)
    {
        // header('location:category.php');
        $message=6;
        echo '<script> location.href="batch.php?status='.$message.'"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Batch</strong> Dashboard</h1>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div>
                                        <label for="" class='form-label'>Batch Name</label>
                                        <input type="text" name="name" id="" class='form-control' value="<?php echo $batch['name']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Start_Date</label>
                                        <input type="text" name="start_date" id="" class='form-control' value="<?php echo $batch['start_date']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Duration</label>
                                        <input type="text" name="duration" id="" class='form-control' value="<?php echo $batch['duration']; ?>">
                                    </div>
                                    <div>
                                        <label for="" class='form-label'>Discount</label>
                                        <input type="text" name="discount" id="" class='form-control' value="<?php echo $batch['discount']; ?>">
                                    </div>
                                    
                                    <div class="my-3">
									<label for="" class="form-class">Batch Course</label>
									<select name="batch_course" id="" class="form-select">
										<?php
										 foreach($courses as $course)
                                            {
                                                if($course['id']==$batch['course_id'])
                                                {
                                                    echo "<option value=".$course['id']." selected>".$course['name']."</option>";
                                                }
                                                else
                                                echo "<option value=".$course['id'].">".$course['name']."</option>";
                                            }

										?>
									</select>
								</div>

                                    <div>
                                        <label for="" class='form-label'>Fee</label>
                                        <input type="text" name="fee" id="" class='form-control' value="<?php echo $batch['fee']; ?>">
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