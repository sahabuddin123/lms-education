<?php require_once('./controller/StudentController.php'); ?>
<?php
$student = new Student();
$Response = [];
$active = $student->active;
$Index = $student->get();
// if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $course->create($_REQUEST['id']);

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
                        <h1 class="h3 mb-0 text-gray-800">All <?php echo ucfirst($active); ?></h1>
                        <a href="StudentCreate.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Create <?php echo ucfirst($active); ?></a>
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Courses</th>
                                            <th>Batchs</th>
                                            <th>Student Number</th>
                                            <th>Gander</th>
                                            <th>Blood</th>
                                            <th>status</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $i = 1;
                                        foreach ($Index as $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="../<?php echo $data['image']; ?>" height="50"></img></td>
                                                <td><?php echo $data['sname']; ?></td>
                                                <td>
                                                    <?php
                                                    $selectCourse = $student->selectCourse($data['courses']);
                                                    echo $selectCourse['courseName'];
                                                     ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $selectbatch = $student->selectBatch($data['batchs']);
                                                    echo $selectbatch['bname'];
                                                     ?>
                                            
                                            </td>
                                                <td><?php echo $data['number']; ?></td>
                                               
                                                <td>
                                                    <?php
                                                    if ($data['gender'] == 1) {
                                                        echo "Male";
                                                    }
                                                    elseif ($data['gender'] == 2) {
                                                        echo "Female";
                                                    }
                                                    elseif ($data['gender'] == 3){
                                                        echo "Others";
                                                    }
                                                    
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data['blood'] == 1) {
                                                        echo "A(+ve)";
                                                    }
                                                    elseif ($data['blood'] == 2) {
                                                        echo "O(+ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "B(+ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "AB(+ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "A(-ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "O(-ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "B(-ve)";
                                                    }
                                                    elseif ($data['blood'] == 3){
                                                        echo "AB(-ve)";
                                                    }
                                                    
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                     if ($data['status'] == 1) {
                                                        echo "Active";
                                                    }
                                                    elseif ($data['status'] == 2) {
                                                        echo "Postponded";
                                                    }
                                                    elseif ($data['status'] == 3){
                                                        echo "Restricted";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="StudentEdit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                                    <button  class="btn btn-sm btn-danger delete" id="delete <?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to Remove current Filds.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" id="deletemain">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>


    <script>
        $('.delete').on('click',function(){
            var value = $(this).val();
            var url = "StudentDelete.php?id="+value;
            $('#DeleteModal').modal('show');
            $('#deletemain').attr('href',url);
        });
    </script>
    

</body>

</html>