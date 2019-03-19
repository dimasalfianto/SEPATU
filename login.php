<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

    <!--style-->
    <style>
    body{
        background: #ecf0f1;
    }
    .background-photo{
        position: absolute;
    }
    .form-login{
        margin-top: 13%;
    }
    .outter-form-login {
        padding: 20px;
        background: #EEEEEE;
        position: relative;
        border-radius: 5px;
    }
    .logo-login {
        position: absolute;
        font-size: 35px;
        background: #26619a ;
        color: #FFFFFF;
        padding: 10px 18px;
        top: -40px;
        border-radius: 50%;
        left: 40%;
    }
    .inner-login .form-control {
        background: #D3D3D3;
    }
    h3.title-login {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .forget {
        margin-top: 20px;
        color: #ADADAD;
    }
    .btn-custom-green {
        background: #26619a;
        color: #fff;
    }
</style>
</head>
<body>
    <div class="background-photo">
        <img src="bg.png">
    </div>
    <div class="col-md-4 col-md-offset-4 form-login">

        <?php
        /* handle error */
        if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form action="config/check-login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Silahkan Login </h3>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />

            <div class="text-center forget">
                <p>Forgot Password ?</p>
                <p><a href="register.php">Daftar Akun</a></p>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>