<?php
require_once(__dir__ . '/Controller.php');
require_once('./model/BatchModel.php');
class Batch extends Controller
{

    public $active = 'Batch'; //for highlighting the active link...
    private $batchModel;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->batchModel = new BatchModel();
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function getBatch(): array
    {
        return $this->batchModel->indexBatch();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...
     **/
    public function createBatchData(array $data){

        $bname = stripcslashes(strip_tags($data['bname']));
        $seat = stripcslashes(strip_tags($data['seat']));
        $startDate = stripcslashes(strip_tags($data['startDate']));
        $endDate = stripcslashes(strip_tags($data['endDate']));
        $day1 = stripcslashes(strip_tags($data['day1']));
        $day2 = stripcslashes(strip_tags($data['day2']));
        $day3 = stripcslashes(strip_tags($data['day3']));
        $day4 = stripcslashes(strip_tags($data['day4']));
        $day5 = stripcslashes(strip_tags($data['day5']));
        $day6 = stripcslashes(strip_tags($data['day6']));
        $day7 = stripcslashes(strip_tags($data['day7']));
        $status = stripcslashes(strip_tags($data['status']));

        $Error = array(
            'bname' => '',
            'seat' => '',
            'status' => false
        );

        if (preg_match('/[^A-Za-z0-9\s]/', $bname)) {
            $Error['bname'] = 'Only Alphabets and Number are allowed.';
            return $Error;
        }
        if (preg_match('/[^0-9_]/', $seat)) {
            $Error['seat'] = 'Only Number are allowed.';
            return $Error;
        }
        
        $Payload = array(
            'bname' => $bname,
            'seat' => $seat,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7,
            'status' => $status,
        );

        $Response = $this->batchModel->createBatch($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data added Successfully';
            header("Location:BatchIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function editBatchData($id): array
    {
        return $this->batchModel->editBatch($id);
    }

    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...
     **/
    public function updateBatchData(array $data){

        $id = stripcslashes(strip_tags($data['id']));
        $bname = stripcslashes(strip_tags($data['bname']));
        $seat = stripcslashes(strip_tags($data['seat']));
        $startDate = stripcslashes(strip_tags($data['startDate']));
        $endDate = stripcslashes(strip_tags($data['endDate']));
        $day1 = stripcslashes(strip_tags($data['day1']));
        $day2 = stripcslashes(strip_tags($data['day2']));
        $day3 = stripcslashes(strip_tags($data['day3']));
        $day4 = stripcslashes(strip_tags($data['day4']));
        $day5 = stripcslashes(strip_tags($data['day5']));
        $day6 = stripcslashes(strip_tags($data['day6']));
        $day7 = stripcslashes(strip_tags($data['day7']));
        $status = stripcslashes(strip_tags($data['status']));

        $Error = array(
            'bname' => '',
            'seat' => '',
            'status' => false
        );

        if (preg_match('/[^A-Za-z0-9\s]/', $bname)) {
            $Error['bname'] = 'Only Alphabets and Number are allowed.';
            return $Error;
        }
        if (preg_match('/[^0-9_]/', $seat)) {
            $Error['seat'] = 'Only Number are allowed.';
            return $Error;
        }
        
        $Payload = array(
            'id' => $id,
            'bname' => $bname,
            'seat' => $seat,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7,
            'status' => $status,
        );

        $Response = $this->batchModel->UpdateBatch($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location:BatchIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    public function deleteBatchData($id): array
    {
        $response =  $this->batchModel->deleteBatch($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: BatchIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! Your Data Update Successfully';
            header("location: BatchIndex.php");
            return $response;
        }
    }
}
