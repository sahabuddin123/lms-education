<?php require_once('./controller/StudentController.php'); ?>
<?php
$student = new Student();
$Response = [];
$active = $student->active;
$batch = $student->StudentBatch();
// var_dump($batch);
$course = $student->StudentCourse();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $student->create($_REQUEST, $_FILES);
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
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="courses">Courses <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="courses" id="courses">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                                foreach ($course as $value) {
                                                            ?>
                                                          
                                                            <option value="<?php echo $value['id'];?>"><?php echo $value['courseName'];?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="batchs"> Batchs <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="batchs" id="batchs">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                                foreach ($batch as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['bname'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sname">Student Name</label>
                                                        <input class="form-control " type="text" name="sname" id="sname" placeholder="Mr." value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
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
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sdob">Student Date of Birth </label>
                                                        <input class="form-control " type="date" name="sdob" id="sdob" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
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
                                                <div class="col-sm-12 col-md-3">
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
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sheight"> Student Height <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="sheight" id="sheight" placeholder="Inches" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sweight"> Student Weight <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="sweight" id="sweight" placeholder="kilogram" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="number"> Student Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="number" id="number" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="nid"> Student NID or Birth Certificate Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="nid" id="nid" placeholder="123456789" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="scname"> previous or Collage<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="scname" id="scname" placeholder="School or Collage Name" value="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fname"> Father's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="fname" id="fname" placeholder="Mr" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fnumber"> Father's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="fnumber" id="fnumber" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mname"> Mother's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="mname" id="mname" placeholder="Mrs" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mnumber"> Mother's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="mnumber" id="mnumber" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gname"> Guardian's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="gname" id="gname" placeholder="Mr/Mrs" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gnumber"> Guardian's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="gnumber" id="gnumber" placeholder="+880" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="grelation"> Relation with Guardian<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="grelation" id="grelation" placeholder="Relation" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="discount"> Discount<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text"  id="discounts" placeholder="%" disabled>
                                                        <input type="hidden" name="discount" id="discount">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="coursefee"> Course Fee<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" id="coursefees" placeholder="0.00" disabled>
                                                        <input type="hidden" name="coursefee" id="coursefee">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="referance"> Referance<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="referance" id="referance" placeholder="Referance">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="adob">Addmission Date <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="date" name="adob" id="adob" value="">
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
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group" id="image-tag">
                                                        <label class="control-label" for="image"> Student Image <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control  image-tag" type="file" name="image" id="image">
                                                    </div>
                                                </div>
                                                <div class="col-6 ">
                                                    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary ">Add Students</button>
                                                    <a href="StudentIndex.php" class="btn btn-danger ">Cancle</a>
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
        <script>
            $(document).ready(function(){
                $('#courses').on('change', function(){
                    var id = $(this).val();
                    let url = "courseFee.php?id="+id;
                    $.ajax({   
                    type: "GET",
                    url: url,                            
                    success: function(data){     
                        let item = JSON.parse(data);               
                        $('#coursefee').val(item['courseFee']);
                        $('#coursefees').val(item['courseFee']);
                        $('#discount').val(item['Discount']);
                        $('#discounts').val(item['Discount']);
                    }
                });
                });
            })
        </script>
</body>

</html>