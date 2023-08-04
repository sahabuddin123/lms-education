<?php
require_once(__dir__ . '/Db.php');

class StuffModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `stuff`");
        $this->execute();
        $stuff = $this->fetchAll();
        if (!empty($stuff)) {

            return $stuff;
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
        
        $this->query("INSERT INTO `stuff`( `stuffId`, `name`, `fname`, `mname`, `gender`, `dob`, `blood`, `relagion`, `IsMarrid`, `phone`, `nid`, `education`, `subjects`, `designation`, `department`, `salary`, `contactType`, `workShift`, `expriance`, `joiningDate`, `link1`, `link2`, `link3`, `link4`, `address`, `status`, `image`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['stuffId']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['fname']);
        $this->bind(4, $data['mname']);
        $this->bind(5, $data['gender']);
        $this->bind(6, $data['dob']);
        $this->bind(7, $data['blood']);
        $this->bind(8, $data['relagion']);
        $this->bind(9, $data['IsMarrid']);
        $this->bind(10, $data['phone']);
        $this->bind(11, $data['nid']);
        $this->bind(12, $data['education']);
        $this->bind(13, $data['subjects']);
        $this->bind(14, $data['designation']);
        $this->bind(15, $data['department']);
        $this->bind(16, $data['salary']);
        $this->bind(17, $data['contactType']);
        $this->bind(18, $data['workShift']);
        $this->bind(19, $data['expriance']);
        $this->bind(20, $data['joiningDate']);
        $this->bind(21, $data['link1']);
        $this->bind(22, $data['link2']);
        $this->bind(23, $data['link3']);
        $this->bind(24, $data['link4']);
        $this->bind(25, $data['address']);
        $this->bind(26, $data['status']);
        $this->bind(27, $data['image']);
        
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
        $this->query("SELECT * FROM `stuff` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $stuff = $this->fetch();
        if (!empty($stuff)) {

            return $stuff;
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
       
        $this->query("UPDATE `stuff` SET `stuffId`=?,`name`=?,`fname`=?,`mname`=?,`gender`=?,`dob`=?,`blood`=?,`relagion`=?,`IsMarrid`=?,`phone`=?,`nid`=?,`education`=?,`subjects`=?,`designation`=?,`department`=?,`salary`=?,`contactType`=?,`workShift`=?,`expriance`=?,`joiningDate`=?,`link1`=?,`link2`=?,`link3`=?,`link4`=?,`address`=?,`status`=?,`image`=? WHERE `id`=?");
        $this->bind(1, $data['stuffId']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['fname']);
        $this->bind(4, $data['mname']);
        $this->bind(5, $data['gender']);
        $this->bind(6, $data['dob']);
        $this->bind(7, $data['blood']);
        $this->bind(8, $data['relagion']);
        $this->bind(9, $data['IsMarrid']);
        $this->bind(10, $data['phone']);
        $this->bind(11, $data['nid']);
        $this->bind(12, $data['education']);
        $this->bind(13, $data['subjects']);
        $this->bind(14, $data['designation']);
        $this->bind(15, $data['department']);
        $this->bind(16, $data['salary']);
        $this->bind(17, $data['contactType']);
        $this->bind(18, $data['workShift']);
        $this->bind(19, $data['expriance']);
        $this->bind(20, $data['joiningDate']);
        $this->bind(21, $data['link1']);
        $this->bind(22, $data['link2']);
        $this->bind(23, $data['link3']);
        $this->bind(24, $data['link4']);
        $this->bind(25, $data['address']);
        $this->bind(26, $data['status']);
        $this->bind(27, $data['image']);
        $this->bind(28, $data['id']);

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
        $this->query("SELECT `image` FROM `stuff` WHERE `id` = :id");
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
        $this->query("DELETE FROM `stuff` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Stuff Delete Successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false,
                'msg' => 'Oops! Something Wrong, Please try again'
            );
            return $Response;
        }
    }

}