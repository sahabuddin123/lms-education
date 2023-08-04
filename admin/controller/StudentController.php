<?php
require_once(__dir__ . '/controller.php');
require_once('./model/StudentModel.php');
require_once('./controller/UploadFile.php');
class Student extends Controller
{

    public $active = 'student'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new StudentModel();
    }
    public function StudentBatch(){
        return $this->Model->getBatch();
    }
    public function StudentCourse(){
        return $this->Model->getCourse();
    }
    public function selectCourse($id){
        return $this->Model->getSelectCourse($id);
    }
    public function selectBatch($id){
        return $this->Model->getselectBatch($id);
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function get(): array
    {
        return $this->Model->index();
    }

    public function courseFee($id){
        return $this->Model->courseFees($id);
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function create($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        // $teacherId = stripcslashes(strip_tags($data['teacherId']));


        var_dump($data);

        $Payload = array(
               'courses'=>$data['courses'],
               'batchs'=>$data['batchs'],
                'sname'=>$data['sname'],
                'gender'=>$data['gender'],
                'sdob'=>$data['sdob'],
                'blood'=>$data['blood'],
                'relagion'=>$data['relagion'],
                'sheight'=>$data['sheight'],
                'sweight'=>$data['sweight'],
                'number'=>$data['number'],
                'nid'=>$data['nid'],
                'scname'=>$data['scname'],
                'fname'=>$data['fname'],
                'fnumber'=>$data['fnumber'],
                'mname'=>$data['mname'],
                'mnumber'=>$data['mnumber'],
                'gname'=>$data['gname'],
                'gnumber'=>$data['gnumber'],
                'grelation'=>$data['grelation'],
                'discount'=>$data['discount'],
                'coursefee'=>$data['coursefee'],
                'referance'=>$data['referance'],
                'adob'=>$data['adob'],
                'status'=>$data['status'],
                'image'=> $image,
        );
        $Response = $this->Model->create($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:StudentIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit($id): array
    {
        return $this->Model->edit($id);
    }

    public function Update(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

        $Payload = array(
            'id'     => $data['id'],
            'courses'=>$data['courses'],
               'batchs'=>$data['batchs'],
                'sname'=>$data['sname'],
                'gender'=>$data['gender'],
                'sdob'=>$data['sdob'],
                'blood'=>$data['blood'],
                'relagion'=>$data['relagion'],
                'sheight'=>$data['sheight'],
                'sweight'=>$data['sweight'],
                'number'=>$data['number'],
                'nid'=>$data['nid'],
                'scname'=>$data['scname'],
                'fname'=>$data['fname'],
                'fnumber'=>$data['fnumber'],
                'mname'=>$data['mname'],
                'mnumber'=>$data['mnumber'],
                'gname'=>$data['gname'],
                'gnumber'=>$data['gnumber'],
                'grelation'=>$data['grelation'],
                'discount'=>$data['discount'],
                'coursefee'=>$data['coursefee'],
                'referance'=>$data['referance'],
                'adob'=>$data['adob'],
                'status'=>$data['status'],
                'image'=>$image,
        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:StudentIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function delete($id)
    {
        $image = $this->Model->deleteImage($id);
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $image['image']);
        }

        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:StudentIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:StudentIndex.php");
            return $Response;
        }
    }
}
