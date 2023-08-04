<?php
require_once(__dir__ . '/Db.php');

class StudentModel extends Db
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
        if (!empty($student)) {
        
            return $student;
        }
        return array();
    }

    public function getBatch()
    {
        $this->query("SELECT * FROM `batch`");
        $this->execute();
        $Batchs = $this->fetchAll();
        if (!empty($Batchs)) {
            return $Batchs;
        }
        return array(
            'data' => []
        );
    }

    public function getCourse()
    {
        $this->query("SELECT * FROM `courses`");
        $this->execute();
        $teacher = $this->fetchAll();
        if (!empty($teacher)) {
            return $teacher;
        }
        return array(
            'data' => []
        );
    }

    public function courseFees($id){
        $this->query("SELECT `courseFee`,`Discount` FROM `courses` where `id`= :id");
        $this->bind(':id', $id);
        $this->execute();
        $courseFee = $this->fetch();
        if (!empty($courseFee)) {
            return $courseFee;
        }
        return array(
            'data' => []
        );
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


    

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function create(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `student`(`courses`, `batchs`, `sname`, `gender`, `sdob`, `blood`, `relagion`, 
        `sheight`, `sweight`, `number`, `nid`, `scname`, `fname`, `fnumber`, `mname`, `mnumber`,
         `gname`, `gnumber`, `grelation`, `discount`, `coursefee`, `referance`, `adob`, `status`, `image`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['courses']);
        $this->bind(2, $data['batchs']);
        $this->bind(3, $data['sname']);
        $this->bind(4, $data['gender']);
        $this->bind(5, $data['sdob']);
        $this->bind(6, $data['blood']);
        $this->bind(7, $data['relagion']);
        $this->bind(8, $data['sheight']);
        $this->bind(9, $data['sweight']);
        $this->bind(10, $data['number']);
        $this->bind(11, $data['nid']);
        $this->bind(12, $data['scname']);
        $this->bind(13, $data['fname']);
        $this->bind(14, $data['fnumber']);
        $this->bind(15, $data['mname']);
        $this->bind(16, $data['mnumber']);
        $this->bind(17, $data['gname']);
        $this->bind(18, $data['gnumber']);
        $this->bind(19, $data['grelation']);
        $this->bind(20, $data['discount']);
        $this->bind(21, $data['coursefee']);
        $this->bind(22, $data['referance']);
        $this->bind(23, $data['adob']);
        $this->bind(24, $data['status']);
        $this->bind(25, $data['image']);

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
        $this->query("SELECT * FROM `student` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $student = $this->fetch();
        if (!empty($student)) {

            return $student;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Update(array $data): array
    {
       
        $this->query("UPDATE`student`SET`courses`=?,`batchs`=?,`sname`=?,`gender`=?,`sdob`=?,`blood`=?,`relagion`=?,`sheight`=?,`sweight`=?,`number`=?,`nid`=?,`scname`=?,`fname`=?,`fnumber`=?,`mname`=?,`mnumber`=?,`gname`=?,`gnumber`=?,`grelation`=?,`discount`=?,`coursefee`=?,`referance`=?,`adob`=?,`status`=?,`image`=?  WHERE `id`=?");
        $this->bind(1, $data['courses']);
        $this->bind(2, $data['batchs']);
        $this->bind(3, $data['sname']);
        $this->bind(4, $data['gender']);
        $this->bind(5, $data['sdob']);
        $this->bind(6, $data['blood']);
        $this->bind(7, $data['relagion']);
        $this->bind(8, $data['sheight']);
        $this->bind(9, $data['sweight']);
        $this->bind(10, $data['number']);
        $this->bind(11, $data['nid']);
        $this->bind(12, $data['scname']);
        $this->bind(13, $data['fname']);
        $this->bind(14, $data['fnumber']);
        $this->bind(15, $data['mname']);
        $this->bind(16, $data['mnumber']);
        $this->bind(17, $data['gname']);
        $this->bind(18, $data['gnumber']);
        $this->bind(19, $data['grelation']);
        $this->bind(20, $data['discount']);
        $this->bind(21, $data['coursefee']);
        $this->bind(22, $data['referance']);
        $this->bind(23, $data['adob']);
        $this->bind(24, $data['status']);
        $this->bind(25, $data['image']);
        $this->bind(26, $data['id']);
        
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
    public function deleteImage($id){
        $this->query("SELECT `image`FROM `student` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function delete($id): array
    {
        
        $this->query("DELETE FROM `student` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'student Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false,
                'msg' => 'Oops! somthing Wrong, Place try again'
            );
            return $Response;
        }
    }
}
