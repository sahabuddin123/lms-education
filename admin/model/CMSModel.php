<?php
require_once(__dir__ . '/Db.php');
class CMSModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexSlider()
    {
        $this->query("SELECT * FROM `slider`");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            $Response = array(
                $slider
            );
            return $Response;
        }
        return array(
            
        );
    }
    
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function SliderCreate(array $data)
    {
        $this->query("INSERT INTO `slider`(`title`, `shortDescription`, `btnOne`, `btnOnelink`, `btnTwo`, `btnTwolink`, `status`, `image`) VALUES (?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['shortDescription']);
        $this->bind(3, $data['btnOne']);
        $this->bind(4, $data['btnOnelink']);
        $this->bind(5, $data['btnTwo']);
        $this->bind(6, $data['btnTwolink']);
        $this->bind(7, $data['status']);
        $this->bind(8, $data['image']);
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
    public function editSlider($id)
    {
        $this->query("SELECT * FROM `slider` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $slider = $this->fetch();
        if (!empty($slider)) {
              return  $slider;
        }
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateSlider(array $data): array
    {
        // var_dump($data);
        $this->query("UPDATE `slider` SET `title`=?,`shortDescription`=?,`btnOne`=?,`btnOnelink`=?,`btnTwo`=?,`btnTwolink`=?,`status`=?,`image`=? WHERE `id` = ?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['shortDescription']);
        $this->bind(3, $data['btnOne']);
        $this->bind(4, $data['btnOnelink']);
        $this->bind(5, $data['btnTwo']);
        $this->bind(6, $data['btnTwolink']);
        $this->bind(7, $data['status']);
        $this->bind(8, $data['image']);
        $this->bind(9, $data['id']);
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


    public function deleteSliderImage($id){
        $this->query("SELECT `image` FROM `slider` WHERE `id` = :id");
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
    public function deleteSlider($id): array
    {
        $this->query("DELETE FROM `slider` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Slider Delete Successfully'
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