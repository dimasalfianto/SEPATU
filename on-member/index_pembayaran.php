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
  ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'member' ) ) {

  header('location:./../login.php');
exit();
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIAKAD</title>
<link rel="shortcut icon" href="logo.ico">
<link rel="stylesheet" type="text/css" href="../assets/css/stylehome.css">
<!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Dashboard  <small>Halo <?=$_SESSION['nama'];?></small></h1>
        </div>
        <div class="logout">
          <button class="btn btn-logout btn-danger" type="button" name="logout"><a href="../logout.php">Logout</a></button>
        </div>
      </div>
    </div>
  </header>
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="photo">
          <img src="../profil.png" class="img-responsive" alt="Generic placeholder thumbnail">
        </div>
        <div class="col-md-3">
          <div class="list-group">
            <a href="index.php" class="list-group-item active main-color-bg"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a>
            <a href="index_tahfidz.php" class="list-group-item">TAHFID</a>
            <a href="index_akpam.php" class="list-group-item">AKPAM</a>
            <a href="../konfirmasiadm.php" class="list-group-item">PEMBAYARAN</a>
          </div>
        </div>
        <div class="col-xs-9">           
          <div class="row">
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>no</th>
                  <th>bulan</th>
                  <th>tgl_pembayaran</th>
                  <th>photo</th>
                
                </tr>
              </thead>
              <?php
              $query = "SELECT * FROM pembayaran where id_user = '$_SESSION[sess_id]'"; 
              $sql = mysqli_query($connect, $query); 
              while($data = mysqli_fetch_array($sql)){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $data['id_pembayaran'];?></td>
                    <td><?php echo $data['bulan'];?></td>
                    <td><?php echo $data['tgl_pembayaran'];?></td>
                    <td><?php echo $data['photo'];?></td>
                  
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div> 
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
