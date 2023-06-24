<?php
    include_once __DIR__. '/../vendor/db.php';
class Instructor{
    public function getInstructorList(){
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                //2.write sql
                $sql="select * from instructor";
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

    public function createInstructor($name,$email,$phone,$address)
    {
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //2.write sql
                $sql='insert into instructor(name,email,phone,address) values (:name,:email,:phone,:address)';
                $statement=$con->prepare($sql);
                $statement->bindParam(':name',$name);
                $statement->bindParam(':email',$email);
                $statement->bindParam(':phone',$phone);
                $statement->bindParam(':address',$address);
                
                if($statement->execute())
                {
                    return true;
                }
                else{
                    return false;
                }
    }

    public function getInstructorInfo($id)
    {
                        //1. db connection
                        $con=Database::connect();
                        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        //2.write sql
                        $sql='select * from instructor where id=:id';
                        $statement=$con->prepare($sql);
                        $statement->bindParam(':id',$id);

                        if($statement->execute())
                        {
                            $result=$statement->fetch(PDO::FETCH_ASSOC);
                            return $result;
                        }
    }

    public function updateInstructor($id,$name,$email,$phone,$address)
    {
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                    $sql='update instructor set name=:name,email=:email,phone=:phone,address=:address where id=:id';
                    $statement=$con->prepare($sql);
                    $statement->bindParam(':id',$id);
                    $statement->bindParam(':name',$name);
                    $statement->bindParam(':email',$email);
                    $statement->bindParam(':phone',$phone);
                    $statement->bindParam(':address',$address);
                    if($statement->execute())
                    {  
                        return true;
                    }
                    else 
                    {
                        return false;
                    }
    }

    public function deleteInstructorInfo($id)
    {
        //1. db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql='delete from instructor where id=:id';
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        try{
            $statement->execute();
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

}
?>