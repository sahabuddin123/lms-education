<?php require_once('./controller/StudentController.php'); ?>
<?php
$student = new Student();
$Response = [];
$active = $student->active;
$data = $student->edit($_REQUEST['id']);
$batch = $student->StudentBatch();
// var_dump($batch);
$course = $student->StudentCourse();
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $student->Update($_REQUEST, $_FILES);

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


            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('./partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $active; ?></h1>
                        <a href="StudentIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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
                                                          
                                                            <option value="<?php echo $value['id'];?>" <?php if($data['courses'] == $value['id']){echo "selected";} ?> ><?php echo $value['courseName'];?></option>
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
                                                            <option value="">~~Select~~</option>
                                                            <?php
                                                                foreach ($batch as $value) {
                                                            ?>
                                                          
                                                            <option value="<?php echo $value['id'];?>" <?php if($data['batchs'] == $value['id']){echo "selected";} ?> ><?php echo $value['bname'];?></option>
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
                                                        <input class="form-control " type="text" name="sname" id="sname" placeholder="Mr." value="<?php if (isset($_REQUEST['sname'])) {echo $__REQUEST['sname']; } else { echo $data['sname']; } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gender">Gender <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="gender" id="gender">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Male</option>
                                                            <option value="2" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Female</option>
                                                            <option value="3" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } ?>>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sdob">Student Date of Birth </label>
                                                        <input class="form-control " type="date" name="sdob" id="sdob" value="<?php if (isset($_REQUEST['sdob'])) {
                                                                                                                                    echo $__REQUEST['sdob'];
                                                                                                                                } else {
                                                                                                                                    echo $data['sdob'];
                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="blood">Blood Group </label>
                                                        <select class="form-control " name="blood" id="blood">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 1) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 1) {
                                                                                    echo "selected";
                                                                                } ?>>A(+ve)</option>
                                                            <option value="2" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 2) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 2) {
                                                                                    echo "selected";
                                                                                } ?>>O(+ve)</option>
                                                            <option value="3" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 3) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 3) {
                                                                                    echo "selected";
                                                                                } ?>>B(+ve)</option>
                                                            <option value="4" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 4) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 4) {
                                                                                    echo "selected";
                                                                                } ?>>AB(+ve)</option>
                                                            <option value="5" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 5) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 5) {
                                                                                    echo "selected";
                                                                                } ?>>A(-ve)</option>
                                                            <option value="6" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 6) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 6) {
                                                                                    echo "selected";
                                                                                } ?>>O(-ve)</option>
                                                            <option value="7" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 7) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 7) {
                                                                                    echo "selected";
                                                                                } ?>>B(-ve)</option>
                                                            <option value="8" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 8) {
                                                                                    echo "selected";
                                                                                } elseif ($data['blood'] == 8) {
                                                                                    echo "selected";
                                                                                } ?>>AB(-ve)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="relagion">Relagion <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="relagion" id="relagion">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Islam</option>
                                                            <option value="2" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Hindhu</option>
                                                            <option value="3" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } ?>>Bhudist</option>
                                                            <option value="4" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 4) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 4) {
                                                                                    echo "selected";
                                                                                } ?>>Christian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sheight"> Student Height <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="sheight" id="sheight" placeholder="Inches" value="<?php if (isset($_REQUEST['sheight'])) {
                                                                                                                                                                echo $__REQUEST['sheight'];
                                                                                                                                                            } else {
                                                                                                                                                                echo $data['sheight'];
                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sweight"> Student Weight <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="sweight" id="sweight" placeholder="kilogram" value="<?php if (isset($_REQUEST['sweight'])) {
                                                                                                                                                                echo $__REQUEST['sweight'];
                                                                                                                                                            } else {
                                                                                                                                                                echo $data['sweight'];
                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="number"> Student Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="number" id="number" placeholder="+880" value="<?php if (isset($_REQUEST['number'])) {
                                                                                                                                                            echo $__REQUEST['number'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['number'];
                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="nid"> Student NID or Birth Certificate Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="nid" id="nid" placeholder="123456789" value="<?php if (isset($_REQUEST['nid'])) {
                                                                                                                                                        echo $__REQUEST['nid'];
                                                                                                                                                    } else {
                                                                                                                                                        echo $data['nid'];
                                                                                                                                                    } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="scname"> previous or Collage<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="scname" id="scname" placeholder="School or Collage Name" value="<?php if (isset($_REQUEST['scname'])) {
                                                                                                                                                                            echo $__REQUEST['scname'];
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $data['scname'];
                                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fname"> Father's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="fname" id="fname" placeholder="Mr" value="<?php if (isset($_REQUEST['fname'])) {
                                                                                                                                                        echo $__REQUEST['fname'];
                                                                                                                                                    } else {
                                                                                                                                                        echo $data['fname'];
                                                                                                                                                    } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fnumber"> Father's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="fnumber" id="fnumber" placeholder="+880" value="<?php if (isset($_REQUEST['fnumber'])) {
                                                                                                                                                            echo $__REQUEST['fnumber'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['fnumber'];
                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mname"> Mother's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="mname" id="mname" placeholder="Mrs" value="<?php if (isset($_REQUEST['mname'])) {
                                                                                                                                                        echo $__REQUEST['mname'];
                                                                                                                                                    } else {
                                                                                                                                                        echo $data['mname'];
                                                                                                                                                    } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mnumber"> Mother's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="mnumber" id="mnumber" placeholder="+880" value="<?php if (isset($_REQUEST['mnumber'])) {
                                                                                                                                                            echo $__REQUEST['mnumber'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['mnumber'];
                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gname"> Guardian's Name<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="gname" id="gname" placeholder="Mr/Mrs" value="<?php if (isset($_REQUEST['gname'])) {
                                                                                                                                                            echo $__REQUEST['gname'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['gname'];
                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gnumber"> Guardian's Phone Number<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="gnumber" id="gnumber" placeholder="+880" value="<?php if (isset($_REQUEST['gnumber'])) {
                                                                                                                                                            echo $__REQUEST['gnumber'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['gnumber'];
                                                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="grelation"> Relation with Guardian<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="grelation" id="grelation" placeholder="Relation" value="<?php if (isset($_REQUEST['grelation'])) {
                                                                                                                                                                    echo $__REQUEST['grelation'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo $data['grelation'];
                                                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="discount"> Discount<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text"  id="discounts" placeholder="0%" value="<?php echo $data['discount']; ?>" disabled>
                                                        <input type="hidden" name="discount" id="discount" value="<?php echo $data['discount']; ?>">
                                                                                                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="coursefee"> Course Fee<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text"  id="coursefees"  placeholder="0.00" value="<?php echo $data['coursefee'];?>" disabled>
                                                        <input type="hidden" name="coursefee" id="coursefee" value="<?php echo $data['coursefee'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="referance"> Referance<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="referance" id="referance" placeholder="Referance" value="<?php if (isset($_REQUEST['referance'])) {
                                                                                                                                                                    echo $__REQUEST['referance'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo $data['referance'];
                                                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="adob">Addmission Date <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="date" name="adob" id="adob" value="<?php if (isset($_REQUEST['adob'])) {
                                                                                                                                    echo $__REQUEST['adob'];
                                                                                                                                } else {
                                                                                                                                    echo $data['adob'];
                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="status">Status<span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="status" id="status">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                            <option value="2" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Postponded</option>
                                                            <option value="3" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } elseif ($data['gender'] == 3) {
                                                                                    echo "selected";
                                                                                } ?>>Restricted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <img src="../<?php echo $data['image'] ?>" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="image"> Featured Image</label>
                                                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
                                                        <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                    <a href="./StudentIndex.php" class="btn btn-danger">Cancle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
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