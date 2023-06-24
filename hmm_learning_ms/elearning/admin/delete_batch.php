<?php
include_once __DIR__. "/../controller/batchController.php";
$id=$_POST['id'];

$batch_controller=new BatchController();
$result=$batch_controller->deleteBatch($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete as it has releted child data.";
}

?>