<?php require_once('./controller/FeesController.php'); ?>
<?php
$fees = new Fees();
$Response = [];
$active = $fees->active;
$student = $fees->selectStudent($_REQUEST['id']);
if (isset($_REQUEST['submit']) && count($_REQUEST) > 0) $Response = $fees->create($_REQUEST);
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
                        <h1 class="h3 mb-0 text-gray-800">Create <?php echo ucfirst($active); ?></h1>
                        <a href="FeesIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> All Students </a>
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
                        <div class="col-md-8 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $student['sname']; ?> Fees</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <div class="tile-body">
                                            <input type="hidden" name="sid" value="<?php echo $student['id']; ?>">
                                            <div class="col-md-12">
                                                <div class="form-group" id="image-tag">
                                                    <label class="control-label" for="amount"> Amount <span class="m-l-5 text-danger"> *</span></label>
                                                    <input type="number" name="amount" id="amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="image-tag">
                                                    <label class="control-label" for="type"> Payment type <span class="m-l-5 text-danger"> *</span></label>
                                                    <select class="form-control" id="type" name="type">
                                                        <option value="1">Course Fees</option>
                                                        <option value="2">Registration Fees</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="image-tag">
                                                    <label class="control-label" for="paydate"> Payments Date <span class="m-l-5 text-danger"> *</span></label>
                                                    <input type="date" name="paydate" id="paydate" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="image-tag">
                                                    <label class="control-label" for="remarks"> Remarks <span class="m-l-5 text-danger"> *</span></label>
                                                    <input type="text" name="remarks" id="remarks" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary ">Add payments</button>
                                                <a href="FeesIndex.php" class="btn btn-danger ">Cancle</a>
                                            </div>
                                        </div>
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