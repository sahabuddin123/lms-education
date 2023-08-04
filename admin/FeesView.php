<?php require_once('./controller/FeesController.php'); ?>
<?php
$fees = new Fees();
$Response = [];
$active = $fees->active;
$students = $fees->selectStudent($_REQUEST['id']);
$fees = $fees->selectAmount($_REQUEST['id']);

date_default_timezone_set('Asia/Dhaka');

// var_dump($students['image']);
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
                        <h1 class="h3 mb-0 text-gray-800">Invoice Page</h1>
                        <a href="Feeslog.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All Transaction</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                                </div>
                                <div class="card-body">
                                    <div class="container bootdey">
                                        <div class="row invoice row-printable">
                                            <div class="col-md-12">
                                                <!-- col-lg-12 start here -->
                                                <div class="panel panel-default plain" id="dash_0">
                                                    <!-- Start .panel -->
                                                    <div class="panel-body p30">
                                                        <div class="row">
                                                            <!-- Start .row -->
                                                            <div class="col-lg-6">
                                                                <!-- col-lg-6 start here -->
                                                                <div class="invoice-logo"><img width="100" src="../<?php echo $students['image']; ?>" alt="Invoice logo"></div>
                                                            </div>
                                                            <!-- col-lg-6 end here -->
                                                            <div class="col-lg-6">
                                                                <!-- col-lg-6 start here -->
                                                                <div class="invoice-from">
                                                                    <ul class="list-unstyled text-right">
                                                                        <li>INNOVA Computers BD</li>
                                                                        <li>Masterpara Charbata Subarnachar</li>
                                                                        <li>01867033550,01817682323</li>
                                                                        <li>innovacomputersbd@gmail.com</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- col-lg-6 end here -->
                                                            <div class="col-lg-12">
                                                                <!-- col-lg-12 start here -->
                                                                <div class="invoice-details mt25">
                                                                    <div class="well">
                                                                        <ul class="list-unstyled mb0">
                                                                            <li><strong>Invoice</strong> #936988</li>
                                                                            <?php
                                                                                $date = date('D, W F, Y');
                                                                            ?>
                                                                            <li><strong>Invoice Date:</strong> <?php echo $date; ?></li>
                                                                            <!-- <li><strong>Due Date:</strong> Thursday, December 1th, 2015</li> -->
                                                                            <li><strong>Status:</strong> <span class="label label-danger">

                                                                            </span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="invoice-to mt25">
                                                                    <ul class="list-unstyled">
                                                                        <li><strong>Invoiced To</strong></li>
                                                                        <li><strong>Student Name : </strong><?php echo $students['sname']; ?></li>
                                                                        <li><strong>Student ID : </strong><?php echo $students['id']; ?></li>
                                                                        <li><strong>Student Phone : </strong><?php echo $students['number']; ?></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="invoice-items">
                                                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">SL</th>
                                                                                    <th class="text-center">Description</th>
                                                                                    <th class="text-center">Qty</th>
                                                                                    <th class="text-center">Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                $i = 1;
                                                                                foreach($fees as $item){
                                                                                ?>
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        <?php
                                                                                        echo $i;
                                                                                        ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                    <?php
                                                                                        echo $item['remarks'];
                                                                                        ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                    <?php
                                                                                        echo $item['paydate'];
                                                                                        ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                    <?php
                                                                                        echo $item['amount'];
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php 
                                                                                $i++;
                                                                            }
                                                                                ?>
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th colspan="3" class="text-right">Total Course Fees</th>
                                                                                    <th class="text-center">
                                                                                        <?php
                                                                                            echo number_format($students['coursefee'],2); 
                                                                                        ?>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="3" class="text-right">Pay Amount</th>
                                                                                    <th class="text-center">
                                                                                        <?php
                                                                                            $totalPay = new Fees();
                                                                                            $totalPay = $totalPay->selectFees($_REQUEST['id']);
                                                                                            echo number_format($totalPay['amount'],2);
                                                                                            
                                                                                        ?>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="3" class="text-right">Discount</th>
                                                                                    <th class="text-center">
                                                                                        <?php
                                                                                            $discount = $students['discount'];
                                                                                            $discount =  $students['coursefee']*$discount/100;
                                                                                            echo number_format($discount, 2);
                                                                                        ?>
                                                                                        
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="3" class="text-right">Total Due</th>
                                                                                    <th class="text-center">
                                                                                        <?php
                                                                                            $due = $totalPay['amount'] + $discount;
                                                                                            $due = ($students['coursefee'] - $due);
                                                                                            echo number_format($due,2);
                                                                                        ?>
                                                                                    </th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="invoice-footer mt25">
                                                                    <p class="text-center">Generated on  <?php echo $date; ?> <a href="#" onclick="print()" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print </a></p>
                                                                </div>
                                                            </div>
                                                            <!-- col-lg-12 end here -->
                                                        </div>
                                                        <!-- End .row -->
                                                    </div>
                                                </div>
                                                <!-- End .panel -->
                                            </div>
                                            <!-- col-lg-12 end here -->
                                        </div>
                                    </div>
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

</body>

</html>