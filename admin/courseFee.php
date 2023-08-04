<?php
include_once('./controller/StudentController.php');
if($_REQUEST['id'] != ""){
    $student = new Student();
    $data = $student->courseFee($_REQUEST['id']);
    echo json_encode($data);
}
?>