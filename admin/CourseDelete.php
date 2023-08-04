<?php require_once('./controller/CourseController.php');
$Batch = new Course();
$Response = [];
$active = $Batch->active;
// $indexBatch = $Batch->getBatch();
// var_dump($_SESSION);
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->delete($_REQUEST['id']);
?>