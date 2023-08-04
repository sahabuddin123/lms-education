<?php require_once('./controller/CourseController.php'); ?>
<?php
$course = new Course();
$Response = [];
$active = $course->active;
$batch = $course->batch();
// var_dump($batch);
$teacher = $course->teacher();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $course->create($_REQUEST, $_FILES);
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
                        <a href="CourseIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-book-reader fa-sm text-white-50"></i> All Course</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Create a New <?php echo ucfirst($active); ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="teacherId">Assign Teacher</label>
                                            <select name="teacherId" id="teacherId" class="form-control">
                                                <option value="">~~Select Teacher~~</option>
                                                <?php
                                                foreach ($teacher as $item) {
                                                ?>
                                                <option value="<?php echo $item['id'] ?>" <?php if (isset($_REQUEST['teacherId']) && $_REQUEST['teacherId'] == $item['id']) {echo "selected";} ?>><?php echo $item['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="batchId">Assign Batch</label>
                                        <select name="batchId" id="batchId" class="form-control">
                                            <option value="">~~Select Batch~~</option>
                                            <?php
                                            foreach ($batch as  $items) {
                                            ?>
                                                <option value="<?php echo $items['id']; ?>" <?php if (isset($_REQUEST['batchId']) && $_REQUEST['batchId'] == $items['id']) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $items['bname'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="courseName">Course Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="courseName" id="courseName" class="form-control" placeholder="Course Name" value="<?php if(isset($_REQUEST['courseName'])){echo $_REQUEST['courseName'];}; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="CourseDuration">Course Duration</label>
                                            <select name="CourseDuration" id="CourseDuration" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "1") {echo "selected";} ?>>1 Month</option>
                                                <option value="2" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "2") {echo "selected";} ?>>2 Months</option>
                                                <option value="3" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "3") {echo "selected";} ?>>3 Months</option>
                                                <option value="4" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "4") {echo "selected";} ?>>4 Months</option>
                                                <option value="5" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "5") {echo "selected";} ?>>5 Months</option>
                                                <option value="6" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "6") {echo "selected";} ?>>6 Months</option>
                                                <option value="8" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "8") {echo "selected";} ?>>8 Months</option>
                                                <option value="10" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "10") {echo "selected";} ?>>10 Months</option>
                                                <option value="12" <?php if (isset($_REQUEST['CourseDuration']) && $_REQUEST['CourseDuration'] == "12") {echo "selected";} ?>>12 Months</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="courseFee">Course Fee <sup class="text-danger">*</sup></label>
                                            <input type="text" name="courseFee" id="courseFee" class="form-control" placeholder="Course Fee" value="<?php if(isset($_REQUEST['courseFee'])){echo $_REQUEST['courseFee'];}; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Discount">Discount </label>
                                            <input type="text" name="Discount" id="Discount" class="form-control" placeholder="Discount" value="<?php if(isset($_REQUEST['Discount'])){echo $_REQUEST['Discount'];}; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="classSize">Room Size </label>
                                            <input type="text" name="classSize" id="classSize" class="form-control" placeholder="classSize" value="<?php if(isset($_REQUEST['classSize'])){echo $_REQUEST['classSize'];}; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="courseAbout">About Of Course</label>
                                            <textarea class="form-control" name="courseAbout" id="courseAbout" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="courseDetails">Course Details</label>
                                            <textarea class="form-control" name="courseDetails" id="courseDetails" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="isFeatured">Is Home Page</label>
                                            <select name="isFeatured" id="isFeatured" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['isFeatured']) && $_REQUEST['isFeatured'] == 1) {echo "selected";} ?>>Yes</option>
                                                <option value="0" <?php if (isset($_REQUEST['isFeatured']) && $_REQUEST['isFeatured'] == 0) {echo "selected";} ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Is Active</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {echo "selected";} ?>>Active</option>
                                                <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) {echo "selected";} ?>>Deactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Featured Image </label>
                                            <input type="file" name="image" id="image" class="form-control" placeholder="image" value="<?php if(isset($_FILES['image'])){echo $_FILES['image'];}; ?>">
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                            <a href="./CourseIndex.php" class="btn btn-danger">Cancle</a>
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
    <script src="./assets/vendor/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'courseAbout' );
        CKEDITOR.replace( 'courseDetails' );
        
    </script>
</body>

</html>