<?php
require_once(__dir__ . '/Controller.php');
require_once('./model/StuffModel.php');
require_once('./controller/UploadFile.php');
class Stuff extends Controller
{

    public $active = 'Stuff'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new StuffModel();
    }
    // public function batch(){
    //     return $this->Model->getBatch();
    // }
    // public function teacher(){
    //     return $this->Model->getTeacher();
    // }

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
    public function create($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image = $fileName->dbupload;
        } else {
            $image = "";
        }

        // $stuffId = stripcslashes(strip_tags($data['stuffId']));


        $Payload = array(
            'stuffId'       =>  $data['stuffId'],
            'name'          =>  $data['name'],
            'fname'         =>  $data['fname'],
            'mname'         =>  $data['mname'],
            'gender'        =>  $data['gender'],
            'dob'           =>  $data['dob'],
            'blood'         =>  $data['blood'],
            'relagion'      =>  $data['relagion'],
            'IsMarrid'      =>  $data['IsMarrid'],
            'phone'         =>  $data['phone'],
            'nid'           =>  $data['nid'],
            'education'     =>  $data['education'],
            'subjects'      =>  $data['subjects'],
            'designation'   =>  $data['designation'],
            'department'    =>  $data['department'],
            'salary'        =>  $data['salary'],
            'contactType'   =>  $data['contactType'],
            'workShift'     =>  $data['workShift'],
            'expriance'     =>  $data['expriance'],
            'joiningDate'   =>  $data['joiningDate'],
            'link1'         =>  $data['link1'],
            'link2'         =>  $data['link2'],
            'link3'         =>  $data['link3'],
            'link4'         =>  $data['link4'],
            'address'       =>  $data['address'],
            'status'        =>  $data['status'],
            'image'         =>  $image
        );

        $Response = $this->Model->create($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! Your Data added Successfully';
            header("Location:StuffIndex.php");
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
    public function Update(array $data, $file)
    {
        // echo $_SERVER['DOCUMENT_ROOT']."/education/".$data['oldImage'];
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image = $fileName->dbupload;
        }

    // var_dump($image); 

        $Payload = array(
            'id'            =>  $data['id'],
            'stuffId'       =>  $data['stuffId'],
            'name'          =>  $data['name'],
            'fname'         =>  $data['fname'],
            'mname'         =>  $data['mname'],
            'gender'        =>  $data['gender'],
            'dob'           =>  $data['dob'],
            'blood'         =>  $data['blood'],
            'relagion'      =>  $data['relagion'],
            'IsMarrid'      =>  $data['IsMarrid'],
            'phone'         =>  $data['phone'],
            'nid'           =>  $data['nid'],
            'education'     =>  $data['education'],
            'subjects'      =>  $data['subjects'],
            'designation'   =>  $data['designation'],
            'department'    =>  $data['department'],
            'salary'        =>  $data['salary'],
            'contactType'   =>  $data['contactType'],
            'workShift'     =>  $data['workShift'],
            'expriance'     =>  $data['expriance'],
            'joiningDate'   =>  $data['joiningDate'],
            'link1'         =>  $data['link1'],
            'link2'         =>  $data['link2'],
            'link3'         =>  $data['link3'],
            'link4'         =>  $data['link4'],
            'address'       =>  $data['address'],
            'status'        =>  $data['status'],
            'image'         =>  $image
        );

        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location:StuffIndex.php");
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
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $image['image']);
        }
        $response =  $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: StuffIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location: StuffIndex.php");
            return $response;
        }
    }
}
