<?php
require_once(__dir__ . '/controller.php');
require_once('./model/FeesModel.php');
class Fees extends Controller
{

    public $active = 'Fees Collection'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new FeesModel();
    }
    public function Batch(){
        return $this->Model->Batch();
    }
    public function Course(){
        return $this->Model->Course();
    }
    public function selectCourse($id){
        return $this->Model->getSelectCourse($id);
    }
    public function selectBatch($id){
        return $this->Model->getselectBatch($id);
    }
    public function selectFees($id){
        return $this->Model->getSelectFees($id);
    }
    public function selectAmount($id){
        return $this->Model->getSelectAmount($id);
    }
    public function selectStudent($id){
        return $this->Model->getSelectStudent($id);
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
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function create($data)
    {
    
        $Payload = array(
            'sid'       =>  $data['sid'],
            'amount'    =>  $data['amount'],
            'type'      =>  $data['type'],
            'paydate'   =>  $data['paydate'],
            'remarks'   =>  $data['remarks']
        );
        $Response = $this->Model->create($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:FeesIndex.php");
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

    public function Update(array $data)
    {
        

        $Payload = array(
            'id'        =>  $data['id'],
            'amount'    =>  $data['amount'],
            'type'      =>  $data['type'],
            'paydate'   =>  $data['paydate'],
            'remarks'   =>  $data['remarks'],
            'status'    =>  1,
        );

        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:Feeslog.php");
            return $Response;
        }
    }
}
