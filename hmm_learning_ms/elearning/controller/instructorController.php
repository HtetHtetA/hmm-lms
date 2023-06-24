<?php
include_once __DIR__.'/../model/instructor.php';
class InstructorController extends Instructor{
        public function getInstructors(){
            return $this->getInstructorList();
        }

        public function addInstructor($name,$email,$phone,$address)
        {
            return $this->createInstructor($name,$email,$phone,$address);
        }

        public function getInstructor($id)
        {
            return $this->getInstructorInfo($id);
        }

        public function editInstructor($id,$name,$email,$phone,$address)
        {
            return $this->updateInstructor($id,$name,$email,$phone,$address);
        }

        public function deleteInstructor($id)
        {
            return $this->deleteInstructorInfo($id);
        }
    }


?>