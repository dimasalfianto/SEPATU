<?php include "../config/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
  ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

  header('location:./../login.php');
exit();
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>SIALAN</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet"">
  <link rel="shortcut icon" href="logo.png">
</head>

<body>

<div class="container">
    <!-- Static navbar -->
    <nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <div class="navbar-brand"><h2>SIALAN<small> Sistem Pencekalan Mahasiswa</small></h2></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      </ul>

      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="index_tahfidz.php">Tahfidz</a></li>
        <li><a href="#">Akpam</a></li>
        <li><a href="#">Pembayaran</a></li>
        <li><a class="btn btn-primary" href="../logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>

  
    <!-- Main -->
    <section id="main">
      <div class="jumbotron">
        <div class="container">
          <div class="row">        
            <div class="col-md-3">
              <div class="photo">
                <img src="../poto.png" class="img-responsive" alt="Generic placeholder thumbnail">
              </div>
              <div class="list-group">
                <li class="list-group-item active main-color-bg">DASHBOARD</li>
                <li class="list-group-item">NIM</li>
                <li class="list-group-item"></li>
                <li class="list-group-item">Nama</li>
                <li class="list-group-item"><?=$_SESSION['nama'];?></li>
                <li class="list-group-item">Semester</li>
                <li class="list-group-item"></li>
              </div>
            </div>
            <div class="col-md-3">
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="../dist/js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>
