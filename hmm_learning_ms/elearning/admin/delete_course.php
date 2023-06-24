<?php
include_once __DIR__. "/../controller/courseController.php";
$id=$_POST['id'];

$course_controller=new CourseController();
$result=$course_controller->deleteCourse($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete as it has releted child data.";
}

?>