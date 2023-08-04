<?php
require_once(__dir__ . '/Db.php');

class CourseModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `courses`");
        $this->execute();
        $courses = $this->fetchAll();
        if (!empty($courses)) {
            $Response = array(
                'data' => $courses
            );
            return $Response;
        }
        return array(
            'data' => []
        );
    }

    public function getBatch(){
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
    public function getTeacher(){
        $this->query("SELECT * FROM `stuff` WHERE `designation` = 'Teacher'");
        $this->execute();
        $teacher = $this->fetchAll();
        if (!empty($teacher)) {
            return $teacher;
        }
        return array();
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function create(array $data): array
    {
        
        $this->query("INSERT INTO `courses`(`teacherId`, `batchId`, `courseName`, `CourseDuration`, `courseFee`, `Discount`, `classSize`, `courseAbout`, `courseDetails`, `isFeatured`, `status`, `image`) 
        VALUES (:teacherId,:batchId,:courseName,:CourseDuration,:courseFee,:Discount,:classSize,:courseAbout,:courseDetails,:isFeatured,:status,:image)");
        $this->bind('teacherId', $data['teacherId']);
        $this->bind('batchId', $data['batchId']);
        $this->bind('courseName', $data['courseName']);
        $this->bind('CourseDuration', $data['CourseDuration']);
        $this->bind('courseFee', $data['courseFee']);
        $this->bind('Discount', $data['Discount']);
        $this->bind('classSize', $data['classSize']);
        $this->bind('courseAbout', $data['courseAbout']);
        $this->bind('courseDetails', $data['courseDetails']);
        $this->bind('isFeatured', $data['isFeatured']);
        $this->bind('status', $data['status']);
        $this->bind('image', $data['image']);
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
        $this->query("SELECT * FROM `courses` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $course = $this->fetch();
        if (!empty($course)) {
            return $course;
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
    public function Update(array $data): array
    {
       
        $this->query("UPDATE `courses` SET `teacherId`=:teacherId,`batchId`=:batchId,`courseName`=:courseName,`CourseDuration`=:CourseDuration,`courseFee`=:courseFee,`Discount`=:Discount,`classSize`=:classSize,`courseAbout`=:courseAbout,`courseDetails`=:courseDetails,`isFeatured`=:isFeatured,`status`=:status,`image`=:image WHERE `id`=:id");
        $this->bind('teacherId', $data['teacherId']);
        $this->bind('batchId', $data['batchId']);
        $this->bind('courseName', $data['courseName']);
        $this->bind('CourseDuration', $data['CourseDuration']);
        $this->bind('courseFee', $data['courseFee']);
        $this->bind('Discount', $data['Discount']);
        $this->bind('classSize', $data['classSize']);
        $this->bind('courseAbout', $data['courseAbout']);
        $this->bind('courseDetails', $data['courseDetails']);
        $this->bind('isFeatured', $data['isFeatured']);
        $this->bind('status', $data['status']);
        $this->bind('image', $data['image']);
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
    public function deleteImage($id){
        $this->query("SELECT `image` FROM `courses` WHERE `id` = :id");
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
        $this->query("DELETE FROM `courses` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Course Delete Successfully'
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