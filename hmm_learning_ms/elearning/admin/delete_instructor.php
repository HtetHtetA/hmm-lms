<?php
include_once __DIR__. "/../controller/instructorController.php";
$id=$_POST['id'];

$instructor_controller=new InstructorController();
$result=$instructor_controller->deleteInstructor($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete as it has releted child data.";
}

?>

