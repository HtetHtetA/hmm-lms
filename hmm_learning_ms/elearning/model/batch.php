<?php
include_once __DIR__."/../vendor/db.php";
class Batch{
    public function getBatchInfo()
    {
                        //1. db connection
                        $con=Database::connect();
                        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        //2.write sql
                        $sql='select * from batch';
                        $statement=$con->prepare($sql);


                        if($statement->execute())
                        {
                            $result=$statement->fetch(PDO::FETCH_ASSOC);
                            return $result;
                        }
    }

        public function getBatchList(){
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                    $sql="select batch.id as id,batch.name as bname,course.name as cname,batch.start_date as start_date,
                    batch.duration as duration,batch.discount as discount,batch.course_id as course_id,batch.fee as fee 
                    from batch join course on batch.course_id=course.id";
                    $statement=$con->prepare($sql);
        
                    //3.statement execute
                    if($statement->execute())
                    {
                               //4.result
                               //data fetch()=> one row,fetchAll()=>multiple rows
                               $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
            
                    }
                    return $result;
        }

    
        public function getNumBatch()
        {
                        //1. db connection
                        $con=Database::connect();
                        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        //2.write sql
                        $sql="select course.name as name,count(batch.id) as total from batch join course on batch.course_id=course.id group by batch.course_id"; 
                        $statement=$con->prepare($sql);
        
                        //3.statement execute
                        if($statement->execute())
                        {
                                   //4.result
                                   //data fetch()=> one row,fetchAll()=>multiple rows
                                   $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
                
                        }
                        return $result;
        }

   

        public function addNewBatch($name,$start_date,$duration,$discount,$batch_course,$fee)
        {
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                $sql='insert into batch(name,start_date,duration,discount,course_id,fee) values (:name,:start_date,:duration,:discount,:course_id,:fee)';
                        $statement=$con->prepare($sql);
                        $statement->bindParam(':name',$name);
                        $statement->bindParam(':start_date',$start_date);
                        $statement->bindParam(':duration',$duration);
                        $statement->bindParam(':discount',$discount);
                        $statement->bindParam(':course_id',$batch_course);
                        $statement->bindParam(':fee',$fee);
                    //3.statement execute
                    if($statement->execute())
                    {
                        return true;            
                    }else
                    {
                        return false;
                    }
        }

        
    public function batchCourse($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        //2.write sql
        $sql = "select course.name,batch.id
        from course join batch on course.id = batch.course_id where batch.course_id=course.id";
       
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        
        //3.sql execute
        if($statement->execute())
        {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }



        public function updateBatch($id,$name,$start_date,$duration,$discount,$batch_course,$fee)
        {
                                    //1. db connection
                                    $con=Database::connect();
                                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    //2.write sql
                                    $sql='update batch set name=:name,start_date=:start_date,duration=:duration,discount=:discount,
                                    course_id=:batch_course,fee=:fee where id=:id';
                                    $statement=$con->prepare($sql);
                                    $statement->bindParam(':id',$id);
                                    $statement->bindParam(':name',$name);
                                    $statement->bindParam(':start_date',$start_date);
                                    $statement->bindParam(':duration',$duration);
                                    $statement->bindParam(':discount',$discount);
                                    $statement->bindParam(':batch_course',$batch_course);
                                    $statement->bindParam(':fee',$fee);
                                    if($statement->execute())
                                    {  
                                        return true;
                                    }
                                    else 
                                    {
                                        return false;
                                    }
        }

        
    public function courseName($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql = "select batch.course_id,course.name from course join batch where course.id = batch.course_id group by name";
        $statement=$con->prepare($sql);
        
        //3.sql execute
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        

}

public function deleteBatchInfo($id)
{
    //1. db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2.write sql
    $sql='delete from batch where id=:id';
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