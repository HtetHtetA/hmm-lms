<?php
include_once __DIR__. "/../layouts/sidebar.php";
include_once __DIR__. "/../controller/traineeController.php";

$trainee_controller=new TraineeController();
$trainees=$trainee_controller->getTrainees();
?>
<main class="content">
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <div class="row">
                    <?php
                        if(isset($_GET['result']) && $_GET['result'] == 1)
                        {
                            echo "<div class='alert alert-success text-success' > New Trainee has been successfully </div>";
                        }
                        elseif(isset($_GET['result']) && $_GET['result'] == 2)
                        {
                            echo "<div class='alert alert-success text-primary' > New Trainee has been successfully Updated</div>";
                        }
                    ?>
                <div class="col-md-3">
                    <a href="add_trainee.php" class='btn btn-dark'>Add New Trainee</a>
                </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Education</th>
                            <th>Remark</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count=1;
                            foreach($trainees as $trainee)
                            {
                                echo "<tr>";
                                echo "<td>".$count++."</td>";
                                echo "<td>".$trainee['name']."</td>";
                                echo "<td>".$trainee['email']."</td>";
                                echo "<td>".$trainee['phone']."</td>";
                                echo "<td>".$trainee['city']."</td>";
                                echo "<td>".$trainee['education']."</td>";
                                echo "<td>".$trainee['remark']."</td>";
                                echo "<td>".$trainee['status']."</td>";
                                echo "<td id='".$trainee['id']."'><a class='btn btn-success mx-2' href='edit_trainee.php?id=".$trainee['id']."'>Edit</a><button class='btn btn-danger mx-2 delete_trainee'>Delete</button></td>";
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