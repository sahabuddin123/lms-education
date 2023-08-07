<?php require_once('./controller/CMSController.php');
$slider = new CMSController();
$Response = [];
$active = $slider->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $slider->SliderDelete($_REQUEST['id']);
?>