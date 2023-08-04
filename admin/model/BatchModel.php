<?php
require_once(__dir__ . '/Db.php');
class BatchModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexBatch(): array
    {
        $this->query("SELECT * FROM `batch`");
        $this->execute();

        $Batch = $this->fetchAll();
        if (!empty($Batch)) {
            $Response = array(
                'status' => true,
                'data' => $Batch
            );
            return $Response;
        }
        return array(
            'status' => false,
            'data' => []
        );
    }
    
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function createBatch(array $data): array
    {
        $this->query("INSERT INTO `batch`(`bname`, `seat`, `startDate`, `endDate`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `status`) VALUES (:name,:seat,:start,:end,:d1,:d2,:d3,:d4,:d5,:d6,:d7,:status)");
        $this->bind('name', $data['bname']);
        $this->bind('seat', $data['seat']);
        $this->bind('start', $data['startDate']);
        $this->bind('end', $data['endDate']);
        $this->bind('d1', $data['day1']);
        $this->bind('d2', $data['day2']);
        $this->bind('d3', $data['day3']);
        $this->bind('d4', $data['day4']);
        $this->bind('d5', $data['day5']);
        $this->bind('d6', $data['day6']);
        $this->bind('d7', $data['day7']);
        $this->bind('status', $data['status']);
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
    public function editBatch($id): array
    {
        $this->query("SELECT * FROM `batch` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $Batch = $this->fetch();
        if (!empty($Batch)) {
            $Response = array(
                'status' => true,
                'data' => $Batch
            );
            return $Response;
        }
        return array(
            'status' => false,
            'data' => []
        );
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateBatch(array $data): array
    {
        $this->query("UPDATE `batch` SET `bname`=:bname,`seat`=:seat,`startDate`= :startDate,`endDate`=:endDate,`day1`=:day1,`day2`=:day2,`day3`=:day3,`day4`=:day4,`day5`=:day5,`day6`=:day6,`day7`=:day7,`status`=:status WHERE `id` = :id");
        $this->bind('bname', $data['bname']);
        $this->bind('seat', $data['seat']);
        $this->bind('startDate', $data['startDate']);
        $this->bind('endDate', $data['endDate']);
        $this->bind('day1', $data['day1']);
        $this->bind('day2', $data['day2']);
        $this->bind('day3', $data['day3']);
        $this->bind('day4', $data['day4']);
        $this->bind('day5', $data['day5']);
        $this->bind('day6', $data['day6']);
        $this->bind('day7', $data['day7']);
        $this->bind('status', $data['status']);
        $this->bind('id', $data['id']);
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
    public function deleteBatch($id): array
    {
        $this->query("DELETE FROM `batch` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Batch Delete Successfully'
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