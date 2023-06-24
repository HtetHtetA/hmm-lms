<?php
include_once __DIR__."/../model/course.php";
    class CourseController extends Course{
        public function getCourses(){
            return $this->getCourseList();
        }

        public function getTotalCourse(){
            return $this->getNumCourse();
        }

        public function addCourse($name,$cat,$outline)
        {
            return $this->addNewCourse($name,$cat,$outline);
        }

        public function getCourse($id)
        {
            return $this->getCourseInfo($id);
        }

        public function editCourse($id,$name,$category,$outline)
        {
            return $this->updateCourse($id,$name,$category,$outline);
        }

        public function getCatName(){
            return $this->catName();
          }
          public function getcourseCat($id){
            return $this->courseCat($id);
          }

          
          public function deleteCourse($id)
          {
            return $this->deleteCourseInfo($id);
          }

          public function getCourseBatch()
          {
            return $this->getCourseInfoBatch();
          }

    }


?>