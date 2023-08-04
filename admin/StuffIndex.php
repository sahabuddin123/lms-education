<?php require_once('./controller/StuffController.php'); ?>
<?php
$stuff = new Stuff();
$Response = [];
$active = $stuff->active;
$index = $stuff->get();
// var_dump($_SESSION);
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
                        <h1 class="h3 mb-0 text-gray-800">All <?php echo ucfirst($active); ?> </h1>
                        <a href="StuffCreate.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Add <?php echo ucfirst($active); ?> </a>
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
                                    <thead >
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>Subjects</th>
                                            <th>Contact Type</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="text-center">
                                        <?php
                                     
                                        $i = 1;
                                        foreach($index as $data){
                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><img src="../<?php echo $data['image']; ?>" height="50"></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['designation']; ?></td>
                                            <td><?php echo $data['subjects']; ?></td>
                                            <td>
                                                <?php 
                                                if($data['contactType'] == 1){
                                                    echo "Permanent"; 
                                                }
                                                elseif($data['contactType'] == 2){
                                                    echo "Intern"; 
                                                }
                                                elseif($data['contactType'] == 3){
                                                    echo "Contractual";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $data['phone']; ?></td>
                                            <td>
                                                <?php 
                                                if($data['status'] == 1){
                                                    echo "Active"; 
                                                }
                                                elseif($data['status'] == 2){
                                                    echo "Postponded"; 
                                                }
                                                elseif($data['status'] == 3){
                                                    echo "Restricted";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="StuffEdit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                                <button class="btn btn-sm btn-danger delete" id="delete<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>">Delete</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to Remove current Filds.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" id="deleteMain">Delete</a>
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
            var url = "StuffDelete.php?id="+value;
            $('#DeleteModal').modal('show');
            $('#deleteMain').attr('href', url);
        });
    </script>
</body>

</html>