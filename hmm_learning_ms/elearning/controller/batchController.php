<?php
include_once __DIR__.'/../model/batch.php';
class BatchController extends Batch{
    public function getBatchs(){
        return $this->getBatchList();
    }

    public function getTotalBatch(){
        return $this->getNumBatch();
    }



    public function addBatch($name,$start_date,$duration,$discount,$batch_course,$fee)
    {
        return $this->addNewBatch($name,$start_date,$duration,$discount,$batch_course,$fee);

    }

    public function getBatch($id)
    {
        return $this->getBatchInfo($id);
    }

    public function editBatch($id,$name,$start_date,$duration,$discount,$batch_course,$fee)
    {
        return $this->updateBatch($id,$name,$start_date,$duration,$discount,$batch_course,$fee);
    }

    public function getBatchCourse($id){
        return $this->batchCourse($id);
      }


        public function deleteBatch($id)
        {
            return $this->deleteBatchInfo($id);
        }
}
?>