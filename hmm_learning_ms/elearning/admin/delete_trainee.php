<?php
include_once __DIR__. '/../controller/traineeController.php';

$id=$_POST['id'];

$trainee_controller=new TraineeController();
$result=$trainee_controller->deleteTrainee($id);

if($result)
{
    echo "success";
}
else{
    echo "You can't delete as it has been releated child data.";
}
?>