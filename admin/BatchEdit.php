<?php require_once('./controller/Batch.php'); ?>
<?php
$Batch = new Batch();
$Response = [];
$active = $Batch->active;
$data = $Batch->editBatchData($_REQUEST['id']);
// echo "<pre>";
// var_dump($data);
// var_dump($_SESSION);
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $Batch->updateBatchData($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Educafe</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('./partials/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Batch</h1>
                        <a href="BatchIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All Batch</a>
                    </div>
                    <?php if (isset($Response['status']) && !$Response['status']) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <span><B>Oops!</B> Some errors occurred in your form.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-7 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit a New Batch</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
                                    <input type="hidden" name="id" value="<?php echo $data['data']['id'] ?>">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="inputName" class="sr-only">Batch Name</label>
                                                <input type="text" id="inputName" class="form-control form-control-user" placeholder="Enter Batch Name" name="bname" required autofocus value="<?php if (isset($_POST['bname'])){ echo $_POST['bname'];}else{echo $data['data']['bname'];} ?>">
                                                <?php if (isset($Response['bname']) && !empty($Response['bname'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['bname']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="inputEmail" class="sr-only">Seat</label>
                                                <input type="number" id="inputEmail" class="form-control form-control-user" placeholder="Enter Total Seat" name="seat" required autofocus value="<?php if (isset($_POST['seat'])){ echo $_POST['seat'];}else{echo $data['data']['seat'];} ?>">
                                                <?php if (isset($Response['seat']) && !empty($Response['seat'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['seat']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="startDate" class="sr-only">StartDate</label>
                                                <input type="date" id="startDate" class="form-control form-control-user" placeholder="Enter Phone" name="startDate" required autofocus value="<?php if (isset($_POST['startDate'])){ echo $_POST['startDate'];}else{echo $data['data']['startDate'];} ?>">
                                               
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">EndDate</label>
                                                <input type="date" id="endDate" class="form-control form-control-user" placeholder="Enter Phone" name="endDate" autofocus value="<?php if (isset($_POST['endDate'])){ echo $_POST['endDate'];}else{echo $data['data']['endDate'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day1</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day1" name="day1" autofocus value="<?php if (isset($_POST['day1'])){ echo $_POST['day1'];}else{echo $data['data']['day1'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day2</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day2" name="day2" autofocus value="<?php if (isset($_POST['day2'])){ echo $_POST['day2'];}else{echo $data['data']['day2'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day3</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day3" name="day3" autofocus value="<?php if (isset($_POST['day3'])) { echo $_POST['day3'];}else{echo $data['data']['day3'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day4</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day4" name="day4" autofocus value="<?php if (isset($_POST['day4'])) { echo $_POST['day4'];}else{echo $data['data']['day4'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day5</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day5" name="day5" autofocus value="<?php if (isset($_POST['day5'])){ echo $_POST['day5'];}else{echo $data['data']['day5'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day6</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day6" name="day6" autofocus value="<?php if (isset($_POST['day6'])) { echo $_POST['day6'];}else{echo $data['data']['day6'];} ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="endDate" class="sr-only">Day7</label>
                                                <input type="text" id="endDate" class="form-control form-control-user" placeholder="Day7" name="day7" autofocus value="<?php if (isset($_POST['day7'])){ echo $_POST['day7'];}else{echo $data['data']['day7'];} ?>">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="inputPassword" class="sr-only">Status</label>
                                                <!-- <input type="password" name="password" id="inputPassword" class="form-control form-control-user" placeholder="Password" required> -->
                                                <select name="status" id="status" class="form-control form-control-user">
                                                    <option>Select</option>
                                                    <option value="1" <?php if($data['data']['status'] == 1) echo "selected"; ?>>Active</option>
                                                    <option value="0" <?php if($data['data']['status'] == 0) echo "selected"; ?>>Deactive</option>
                                                </select>
                                                <?php if (isset($Response['status']) && !empty($Response['status'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['status']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                                            <button class="btn btn-md btn-primary" type="submit" name="submit">Update batch</button>
                                            <a href="BatchIndex.php" class="btn btn-md btn-danger">Cancle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once('./partials/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>

</body>

</html>