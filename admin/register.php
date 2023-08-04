<?php require_once('./controller/Register.php'); ?>
<?php
$Register = new Register();
$Response = [];
$active = $Register->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Register->register($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Educafe - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7">
                        <?php if (isset($Response['status']) && !$Response['status']) : ?>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <span><B>Oops!</B> Some errors occurred in your form.</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" class="text-danger">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
                                <h4 class="h3 mb-3 font-weight-normal text-center">Register</h4>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputName" class="sr-only">Names</label>
                                        <input type="text" id="inputName" class="form-control form-control-user" placeholder="Enter Full Name" name="name" required autofocus value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                                        <?php if (isset($Response['name']) && !empty($Response['name'])) : ?>
                                            <small class="text-danger"><?php echo $Response['name']; ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputEmail" class="sr-only">Email</label>
                                        <input type="email" id="inputEmail" class="form-control form-control-user" placeholder="Enter Email Address" name="email" required autofocus value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                        <?php if (isset($Response['email']) && !empty($Response['email'])) : ?>
                                            <small class="text-danger"><?php echo $Response['email']; ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputPhone" class="sr-only">Phone Number</label>
                                        <input type="text" id="inputPhone" class="form-control form-control-user" placeholder="Enter Phone" name="phone" required autofocus value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>">
                                        <?php if (isset($Response['phone']) && !empty($Response['phone'])) : ?>
                                            <small class="text-danger"><?php echo $Response['phone']; ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="inputPassword" class="sr-only">Password</label>
                                        <input type="password" name="password" id="inputPassword" class="form-control form-control-user" placeholder="Password" required>
                                        <?php if (isset($Response['password']) && !empty($Response['password'])) : ?>
                                            <small class="text-danger"><?php echo $Response['password']; ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                    <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>
                                </div>
                                <p class="mt-5 text-center mb-3 text-muted">&copy; INNOVA <?php echo date('Y'); ?></p>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="./index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>