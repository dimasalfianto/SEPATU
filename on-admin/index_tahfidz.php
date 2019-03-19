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

        <div class="navbar-brand"><h2>SEPATU<small> Sistem Pencekalan Terpadu</small></h2></div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

        </ul>

        <ul class="nav navbar-nav navbar-right">

          <li><a href="#">Tahfidz</a></li>
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
            <div class="col-md-9">
              <div class="row">
                <ul class="container">
                 <button class="btn btn-info" data-toggle="modal" data-target="#input" style="position: relative;left: -13px;"><span class="glyphicon glyphicon-log-in"></span> Input Data</button>
                 <!-- modal -->
                 
                 <div id="input" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header" style=" background-color:#58a6ff;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: #ffffff;">Masukkan Nilai Tahfidz</h4>
                      </div>
                      <div class="modal-body">
                        <form action="../config/action-tahfidz.php" class="inner-login" method="POST" id="form_tahfidz">
                          <?php

                          if (isset($_SESSION['error-log'])) {
                            $errors = $_SESSION['error-log'];
                            foreach($errors as $error) { ?>
                              <p><?php echo $error;?></p>
                              <?php
                            }
                            unset($_SESSION['error-log']);}
                            ?>
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                              <label for="">Semester</label>
                              <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester">
                            </div>
                            <div class="form-group">
                              <label for="">Jumlah Hafalan</label>
                              <input type="text" class="form-control" name="hafalan" id="hafalan" placeholder="Nilai Jumlah Hafalan">
                            </div>
                            <div class="form-group">
                              <label for="">Kelancaran Bacaan</label>
                              <input type="text" class="form-control" name="kelancaran" id="kelancaran" placeholder="Nilai Kelancaran Hafalan">
                            </div>
                            <div class="form-group">
                              <label for="">Tajwid</label>
                              <input type="text" class="form-control" name="tajwid" id="tajwid" placeholder="Nilai Tajwid">
                            </div>
                            <div class="form-group">
                              <label for="">Makhraj Huruf</label>
                              <input type="text" class="form-control" name="makhraj" id="makhraj" placeholder="Nilai Makhraj Huruf">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                         <button id="btn-input" type="button" class="btn btn-success" data-dismiss="modal">Input</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                       </div>
                     </div>
                   </div>
                 </div><!-- modal -->
               </ul>
               <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <?php
                $query = "SELECT * FROM tahfidz"; 
                $sql = mysqli_query($connect, $query); 
                $no = 1;
                 ?>
                  <tbody>
                    <?php
                    while($data = mysqli_fetch_array($sql)){

                      $a = $data['hafalan']*50/100;
                      $b = $data['kelancaran']*30/100;
                      $c = $data['tajwid']*10/100;
                      $d = $data['makhraj']*10/100;
                      $total = $a+$b+$c+$d;

                      if ($total<= 50) {
                        $z = "tidak lulus";
                      }
                      elseif ($total<="55") {
                         $z = "tidak lulus";
                      }
                      elseif ($total<="60") {
                         $z = "lulus predikat C";
                      }
                      elseif ($total<="65") {
                         $z = "lulus predikat C+";
                      }
                      elseif ($total<="70") {
                         $z = "lulus predikat B-";
                      }
                      elseif ($total<="75") {
                         $z = "lulus predikat B";
                      }
                      elseif ($total<="80") {
                         $z = "lulus predikat B+";
                      }
                      elseif ($total<="85") {
                         $z = "lulus predikat A-";
                      }
                      elseif ($total<="90") {
                         $z = "lulus predikat A";
                      }
                      elseif ($total<="100") {
                         $z = "lulus predikat A+";
                      }



                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['nama'];?></td>
                      <td><?php echo $data['semester'];?></td>
                      <td><?php echo $total;?></td>
                      <td><?php echo $z;?></td>
                    </tr>               
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- /container -->




    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="../assets/js/jquery-1.12.4.min.js"></script>
      <script>window.jQuery || document.write('<script src="docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../docs/assets/js/ie10-viewport-bug-workaround.js"></script>

<script>
  
  $('#btn-input').click(function(e){
    e.preventDefault();

    var obj = $('#form_tahfidz').serialize();

    $.ajax({
      url : 'http://localhost/mppl/config/action-tahfidz.php',
      type : 'post',
      data : {
        dataTahfidz : obj
      },
      success : function(data){
        console.log(data);
      }
    });

  });

</script>
    </body>
    </html>
