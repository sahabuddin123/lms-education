<?php require_once('./controller/StudentController.php'); ?>
<?php
$Batch = new Student();
$Response = [];
$active = $Batch->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->delete($_REQUEST['id']);

?>