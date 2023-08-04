<?php require_once('./controller/Batch.php');
$Batch = new Batch();
$Response = [];
$active = $Batch->active;
// $indexBatch = $Batch->getBatch();
// var_dump($_SESSION);
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->deleteBatchData($_REQUEST['id']);
?>