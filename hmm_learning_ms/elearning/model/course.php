<?php
include_once __DIR__.'/../vendor/db.php';
class Course{
public function getCourseList(){
            //1. db connection
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //2.write sql
            $sql="select course.id as id,course.name as cname,category.name as catname,course.outline as coutline from course join category on course.cat_id=category.id";
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

public function getNumCourse()
{
                //1. db connection
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //2.write sql
                $sql="select category.name as name,count(course.id) as total from course join category on course.cat_id=category.id group by course.cat_id"; 
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
public function addNewCourse($name,$cat,$outline)
{
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                    $sql='insert into course(name,cat_id,outline) values (:name,:cat,:outline)';
                        $statement=$con->prepare($sql);
                        $statement->bindParam(':name',$name);
                        $statement->bindParam(':cat',$cat);
                        $statement->bindParam(':outline',$outline);
                        

                    //3.statement execute
                    if($statement->execute())
                    {
                        return true;            
                    }else
                    {
                        return false;
                    }
}

public function getCourseInfo($id)
{
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                    $sql='select * from course where id=:id';
                    $statement=$con->prepare($sql);
                    $statement->bindParam(':id',$id);

                    if($statement->execute())
                    {
                        $result=$statement->fetch(PDO::FETCH_ASSOC);
                        return $result;
                    }
}


public function courseCat($id){
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //2.write sql
    $sql = "select category.name,course.id from category join course on category.id = course.cat_id where course.id=:id";
   
    $statement=$con->prepare($sql);
    $statement->bindParam(':id',$id);
    
    //3.sql execute
    if($statement->execute())
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

public function updateCourse($id,$name,$category,$outline)
{
                            //1. db connection
                            $con=Database::connect();
                            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            //2.write sql
                            $sql='update course set name=:name,cat_id=:category,outline=:outline where id=:id';
                            $statement=$con->prepare($sql);
                            $statement->bindParam(':id',$id);
                            $statement->bindParam(':name',$name);
                            $statement->bindParam(':category',$category);
                            $statement->bindParam(':outline',$outline);
                            if($statement->execute())
                            {  
                                return true;
                            }
                            else 
                            {
                                return false;
                            }
}

public function catName(){
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2.write sql
    $sql = "select course.cat_id,category.name from category join course where category.id = course.cat_id group by name";
    $statement=$con->prepare($sql);
    
    
    //3.sql execute
    if($statement->execute())
    {
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
}

public function deleteCourseInfo($id)
{
            //1. db connection
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //2.write sql
            $sql='delete from course where id=:id';
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

public function getCourseInfoBatch()
{
                    //1. db connection
                    $con=Database::connect();
                    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //2.write sql
                    $sql='select * from course';
                    $statement=$con->prepare($sql);
                    if($statement->execute())
                    {
                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                    }
}

}

?>