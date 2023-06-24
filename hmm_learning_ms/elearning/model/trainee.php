<?php
include_once __DIR__.'/../vendor/db.php';
class Trainee{
    public function getTraineeList()
    {
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //2.write sql
                $sql="select * from trainee";
                $statement=$con->prepare($sql);
        
                //3.sql excute
                if($statement->execute())
                {
                           //4.result
                           //data fetch()=> one row,fetchAll()=>multiple rows
                           $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
        
                }
                return $result;
    }

    public function createTrainee($name,$email,$phone,$city,$education,$remark,$status)
    {
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //2.write sql
                $sql='insert into trainee(name,email,phone,city,education,remark,status) values (:name,:email,:phone,:city,:education,:remark,:status)';
                $statement=$con->prepare($sql);
                $statement->bindParam(':name',$name);
                $statement->bindParam(':email',$email);
                $statement->bindParam(':phone',$phone);
                $statement->bindParam(':city',$city);
                $statement->bindParam(':education',$education);
                $statement->bindParam(':remark',$remark);
                $statement->bindParam(':status',$status);
                if($statement->execute())
                {
                    return true;
                }
                else{
                    return false;
                }


    }

    public function getTraineeInfo($id)
    {
         //1. db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2.write sql
         $sql='select * from trainee where id=:id';
         $statement=$con->prepare($sql);
         $statement->bindParam(':id',$id);

         if($statement->execute())
         {
             $result=$statement->fetch(PDO::FETCH_ASSOC);
             return $result;
         }
    }

    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status)
    {
         //1. db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2.write sql
         $sql='update trainee set name=:name,email=:email,phone=:phone,city=:city,education=:education,remark=:remark,status=:status where id=:id';
         $statement=$con->prepare($sql);
         $statement->bindParam(':id',$id);
         $statement->bindParam(':name',$name);
         $statement->bindParam(':email',$email);
         $statement->bindParam(':phone',$phone);
         $statement->bindParam(':city',$city);
         $statement->bindParam(':education',$education);
         $statement->bindParam(':remark',$remark);
         $statement->bindParam(':status',$status);
         if($statement->execute())
         {  
             return true;
         }
         else 
         {
             return false;
         }
    }

    public function deleteTraineeInfo($id)
    {
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //2.write sql
                $sql='delete from trainee where id=:id';
                $statement=$con->prepare($sql);
                $statement->bindParam(':id',$id);
                try{
                    $statement->execute();
                    return true;
                }
                catch(Exception $e)
                {
                    return false;
                }
    }
}
?>