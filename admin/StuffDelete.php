<?php require_once('./controller/StuffController.php');
$Batch = new Stuff();
$Response = [];
$active = $Batch->active;
// $indexBatch = $Batch->getBatch();
// var_dump($_SESSION);
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->delete($_REQUEST['id']);
?>