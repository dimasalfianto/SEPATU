 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!--style-->
    <style>
    body{
        background: #ecf0f1;
    }

    .form-register{
        padding-top: 0px;
    }

    .form-register form{
        padding-top: 70px;
    }

    .btn-danger{
       background: #26619a;
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
    top: 40px;
    border-radius: 50%;
    left: 40%;
}

</style>
</head>
<body>

 <div class="col-md-4 col-md-offset-4 form-register">
    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
    </div>
    <form action="config/action-register.php" class="inner-login" method="post">
        <h2 class="text-center title-login">Daftar Akun</h2>
        <?php

        if (isset($_SESSION['error-log'])) {
            $errors = $_SESSION['error-log'];
            foreach($errors as $error) { ?>
               <p><?php echo $error; ?></p>
               <?php
           }
           unset($_SESSION['error-log']);
       }
       ?>
       <div class="form-group">
           <label for="">Nama</label>
           <input type="text" class="form-control" name="title" placeholder="Nama Lengkap"/>
       </div>
       <div class="form-group">
           <label for="">Username</label>
           <input type="text" class="form-control" name="username" placeholder="Username"/>
       </div>
       <div class="form-group">
           <label for="">Password</label>
           <input type="Password" class="form-control" name="password" placeholder="Password"/>
       </div>
       <div class="form-group">
           <label for="">Re - Password</label>
           <input type="Password" class="form-control" name="repassword" placeholder=" Re Password"/>
       </div> 
       <button class="btn-block btn btn-danger" type="submit">Daftar</button>
       <div class="text-center forget">
        <p>Sudah Punya Akun ? Silakan Login</p>
        <p><a href="login.php">Login</a></p>
        </div>
</form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>