<?php
require_once(__dir__ . '/Db.php');

class FeesModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index()
    {
        $this->query("SELECT * FROM `student`");
        $this->execute();
        $student = $this->fetchAll();
        $this->query("SELECT * FROM `fees`");
        $this->execute();
        $fees = $this->fetchAll();
        // if (!empty($student)) {
            return array(
                $student,
                $fees
            );
        // }
        // return array();
    }

    public function Batch()
    {
        $this->query("SELECT * FROM `batch`");
        $this->execute();
        $Batchs = $this->fetchAll();
        if (!empty($Batchs)) {
            return $Batchs;
        }
        return array();
    }

    public function Course()
    {
        $this->query("SELECT * FROM `courses`");
        $this->execute();
        $teacher = $this->fetchAll();
        if (!empty($teacher)) {
            return $teacher;
        }
        return array();
    }

    public function getSelectCourse($id){
        $this->query("SELECT `courseName` FROM `courses` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $courseName = $this->fetch();
        if (!empty($courseName)) {
            return $courseName;
        }
        return array(
            'data' => []
        );
    }
    public function getselectBatch($id){
        $this->query("SELECT `bname` FROM `batch` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $batch = $this->fetch();
        if (!empty($batch)) {
            return $batch;
        }
        return array(
            'data' => []
        );
    }
    public function getSelectFees($id){
        $this->query("SELECT SUM(`amount`) as `amount` FROM `fees` where `sid` = :id GROUP BY `sid`");
        $this->bind(':id', $id);
        $this->execute();
        $amount = $this->fetch();
        if (!empty($amount)) {
            return $amount;
        }
        return array(
            'amount' => '0.00'
        );
    }
    public function getSelectAmount($id){
        $this->query("SELECT * FROM `fees` where `sid` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $amount = $this->fetchAll();
        if (!empty($amount)) {
            return $amount;
        }
        return array(
            'amount' => '0.00'
        );
    }
    public function getSelectStudent($id){
        $this->query("SELECT * FROM `student` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $student = $this->fetch();
        if (!empty($student)) {
            return $student;
        }
        return array(
            
        );
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function create(array $data): array
    {
        // var_dump($data);

        $this->query(" INSERT INTO `fees`(`sid`, `amount`, `type`, `paydate`, `remarks`) VALUES (?,?,?,?,?) ");
        $this->bind(1, $data['sid']);
        $this->bind(2, $data['amount']);
        $this->bind(3, $data['type']);
        $this->bind(4, $data['paydate']);
        $this->bind(5, $data['remarks']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function edit($id): array
    {
        $this->query("SELECT * FROM `fees` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $fees = $this->fetch();
        if (!empty($fees)) {

            return $fees;
        }
        return array();
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Update(array $data): array
    {
       
        $this->query("UPDATE `fees` SET `amount`=?,`type`=?,`paydate`=?,`remarks`=?,`status`=?  WHERE `id` = ?");
      
        $this->bind(1, $data['amount']);
        $this->bind(2, $data['type']);
        $this->bind(3, $data['paydate']);
        $this->bind(4, $data['remarks']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['id']);
        
        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
}
