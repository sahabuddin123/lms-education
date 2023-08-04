<?php
require_once(__dir__ . '/Controller.php');
require_once('./model/CourseModel.php');
require_once('./controller/UploadFile.php');
class Course extends Controller
{

    public $active = 'Course'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new CourseModel();
    }
    public function batch(){
        return $this->Model->getBatch();
    }
    public function teacher(){
        return $this->Model->getTeacher();
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function get(): array
    {
        return $this->Model->index();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...
     **/
    public function create($data, $file){
        if($file['image']['name']!= ""){
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image = $fileName->dbupload;
        }
        else{
            $image = "";  
        }
        
        $teacherId = stripcslashes(strip_tags($data['teacherId']));
        $batchId = stripcslashes(strip_tags($data['batchId']));
        $courseName = stripcslashes(strip_tags($data['courseName']));
        $CourseDuration = stripcslashes(strip_tags($data['CourseDuration']));
        $courseFee = stripcslashes(strip_tags($data['courseFee']));
        $Discount = stripcslashes(strip_tags($data['Discount']));
        $classSize = stripcslashes(strip_tags($data['classSize']));
        $courseAbout = stripcslashes(strip_tags($data['courseAbout']));
        $courseDetails = stripcslashes(strip_tags($data['courseDetails']));
        $isFeatured = stripcslashes(strip_tags($data['isFeatured']));
        $status = stripcslashes(strip_tags($data['status']));
        // $image = stripcslashes(strip_tags($file['image']));

        // $Error = array(
        //     'bname' => '',
        //     'seat' => '',
        //     'status' => false
        // );

        // if (preg_match('/[^A-Za-z0-9\s]/', $bname)) {
        //     $Error['bname'] = 'Only Alphabets and Number are allowed.';
        //     return $Error;
        // }
        // if (preg_match('/[^0-9_]/', $seat)) {
        //     $Error['seat'] = 'Only Number are allowed.';
        //     return $Error;
        // }
        
        $Payload = array(
            'teacherId' => $teacherId,
            'batchId' => $batchId,
            'courseName' => $courseName,
            'CourseDuration' => $CourseDuration,
            'courseFee' => $courseFee,
            'Discount' => $Discount,
            'classSize' => $classSize,
            'courseAbout' => $courseAbout,
            'courseDetails' => $courseDetails,
            'isFeatured' => $isFeatured,
            'status' => $status,
            'image' => $image,
        );

        $Response = $this->Model->create($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data added Successfully';
            header("Location:CourseIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function edit($id): array
    {
        return $this->Model->edit($id);
    }

    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...
     **/
    public function Update(array $data, $file){
        // echo $_SERVER['DOCUMENT_ROOT']."/education/".$data['oldImage'];
        if($file['image']['name'] != ""){
            if($data['oldImage'] != ""){
                unlink($_SERVER['DOCUMENT_ROOT']."/education/".$data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image = $fileName->dbupload;
        }
        else{
            $image = $data['oldImage'];
        }
        $id = stripcslashes(strip_tags($data['id']));
        $teacherId = stripcslashes(strip_tags($data['teacherId']));
        $batchId = stripcslashes(strip_tags($data['batchId']));
        $courseName = stripcslashes(strip_tags($data['courseName']));
        $CourseDuration = stripcslashes(strip_tags($data['CourseDuration']));
        $courseFee = stripcslashes(strip_tags($data['courseFee']));
        $Discount = stripcslashes(strip_tags($data['Discount']));
        $classSize = stripcslashes(strip_tags($data['classSize']));
        $courseAbout = stripcslashes(strip_tags($data['courseAbout']));
        $courseDetails = stripcslashes(strip_tags($data['courseDetails']));
        $isFeatured = stripcslashes(strip_tags($data['isFeatured']));
        $status = stripcslashes(strip_tags($data['status']));
        // $image = stripcslashes(strip_tags($data['image']));

        // $Error = array(
        //     'bname' => '',
        //     'seat' => '',
        //     'status' => false
        // );

        // if (preg_match('/[^A-Za-z0-9\s]/', $bname)) {
        //     $Error['bname'] = 'Only Alphabets and Number are allowed.';
        //     return $Error;
        // }
        // if (preg_match('/[^0-9_]/', $seat)) {
        //     $Error['seat'] = 'Only Number are allowed.';
        //     return $Error;
        // }
        
        $Payload = array(
            'id' => $id,
            'teacherId' => $teacherId,
            'batchId' => $batchId,
            'courseName' => $courseName,
            'CourseDuration' => $CourseDuration,
            'courseFee' => $courseFee,
            'Discount' => $Discount,
            'classSize' => $classSize,
            'courseAbout' => $courseAbout,
            'courseDetails' => $courseDetails,
            'isFeatured' => $isFeatured,
            'status' => $status,
            'image' => $image,
        );

        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location:CourseIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function delete($id): array
    {   
        $image = $this->Model->deleteImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/education/".$image['image']);
        }
        $response =  $this->Model->delete($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: CourseIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location: CourseIndex.php");
            return $response;
        }
    }
}
