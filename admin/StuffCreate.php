<?php require_once('./controller/StuffController.php'); ?>
<?php
$stuff = new Stuff();
$Response = [];
$active = $stuff->active;
// $batch = $course->batch();
// var_dump($batch);
// $teacher = $course->teacher();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $stuff->create($_REQUEST, $_FILES);
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
                        <a href="CourseIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> All <?php echo ucfirst($active); ?> </a>
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
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create a New <?php echo ucfirst($active); ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <div class="tile-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="stuffId">Stuff ID <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="stuffId" placeholder="ICBDEP-01" id="stuffId" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label" for="name">Stuff Name <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="name" id="name" placeholder="Mr." value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fname">Father's Name </label>
                                                        <input class="form-control " type="text" name="fname" id="fname" placeholder="Mr." value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mname">Mother's Name </label>
                                                        <input class="form-control " type="text" name="mname" id="mname" placeholder="Mrs." value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gender">Gender <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="gender" id="gender">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                            <option value="3">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="dob">Stuff Date of Birth </label>
                                                        <input class="form-control " type="date" name="dob" id="dob" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="blood">Blood Group </label>
                                                        <select class="form-control " name="blood" id="blood">
                                                            <option value="">--Select--</option>
                                                            <option value="1">A(+ve)</option>
                                                            <option value="2">O(+ve)</option>
                                                            <option value="3">B(+ve)</option>
                                                            <option value="4">AB(+ve)</option>
                                                            <option value="5">A(-ve)</option>
                                                            <option value="6">O(-ve)</option>
                                                            <option value="7">B(-ve)</option>
                                                            <option value="8">AB(-ve)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="relagion">Relagion <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="relagion" id="relagion">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Islam</option>
                                                            <option value="2">Hindhu</option>
                                                            <option value="3">Bhudist</option>
                                                            <option value="4">Christian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="IsMarrid">Marital Status <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="IsMarrid" id="IsMarrid">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Unmerrid</option>
                                                            <option value="2">Merrid</option>
                                                            <option value="3">Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="phone">Stuff Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="phone" id="phone" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="nid">NID/BCN </label>
                                                        <input class="form-control " type="text" name="nid" placeholder="NID/BCN" id="nid" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="education">Education Qualification<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="education" id="education" placeholder="BSc" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="subjects">Stuff Subjects<span class="m-l-5 text-danger"> *</span> </label>
                                                        <input class="form-control " type="text" name="subjects" id="subjects" placeholder="Web Developer" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="designation">Stuff Designation<span class="m-l-5 text-danger"> *</span> </label>
                                                        <input class="form-control " type="text" name="designation" id="designation" placeholder="Director" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="department">Stuff Department </label>
                                                        <input class="form-control " type="text" name="department" id="department" placeholder="IT" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="salary">Basic Salary <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="salary" id="salary" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="contactType">Contract Type <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="contactType" id="contactType">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Permanent</option>
                                                            <option value="2">Intern</option>
                                                            <option value="3">Contractual</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="workShift">Work Shift </label>
                                                        <input class="form-control " type="text" name="workShift" id="workShift" placeholder="Morning" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="expriance">Work Exprience <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="expriance" id="expriance" placeholder="5 Years" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="joiningDate">Joining Date <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="date" name="joiningDate" id="joiningDate" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link1">Facebook Link </label>
                                                        <input class="form-control " type="url" name="link1" id="link1" placeholder="https://" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link2">Linkedin Link </label>
                                                        <input class="form-control " type="url" name="link2" id="link2" placeholder="https://" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link3">Github Link </label>
                                                        <input class="form-control " type="url" name="link3" id="link3" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link4">Behance Link </label>
                                                        <input class="form-control " type="url" name="link4" id="link4" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="address">Address<span class="m-l-5 text-danger"> *</span></label>
                                                        <textarea name="address" id="address" class="form-control " cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="status">Status<span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="status" id="status">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Postponded</option>
                                                            <option value="3">Restricted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group" id="image-area">
                                                        <label class="control-label" for="image-tag">Stuff Image <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control  image-tag" type="file" name="image" id="image-tag">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block">Save</button>
                                                    <a href="StuffIndex.php" class="btn btn-danger btn-block">Cancle</a>
                                                </div>
                                            </div>
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