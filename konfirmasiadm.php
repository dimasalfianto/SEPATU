<?php 

require 'config/connect.php';
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>konfirmasi pembayaran</title>

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

        .btn-danger{
        	background: #26619a;
        }

	  </style>
  </head>
  <body>

  	<div class="col-md-4 col-md-offset-4 form-register">
  	<form action="config/action-adm.php" class="inner-login" method="POST" enctype="multipart/form-data">
            <h2 class="text-center title-login">KONFIRMASI PEMBAYARAN</h2>
            <?php

            if (isset($_SESSION['error-log'])) {
            $errors = $_SESSION['error-log'];
            foreach($errors as $error) { ?>
            	<p><?php echo $error;?></p>
            	<?php
        	}
        	unset($_SESSION['error-log']);
        }
        ?>

           
             <div class="form-group">
            	<label for="">bulan</label>
            	<input type="text" class="form-control" name="bulan" placeholder="bulan"/>
            </div>

            <div class="form-group">
            	<label for="">tgl_pembayaran</label>
            	<input type="date" class="form-control" name="tgl_pembayaran" placeholder="tgl_pembayaran"/>
            </div>
            
             <div class="form-group">
                <label for="">upload photo</label>
                <input type="file" name="file" class="form-control" />
            </div>
            <button class="btn-block btn btn-danger" type="submit" name="upload">submit</button>
    </form>
    <div class="text-center">
    	<br/>
    	<p>Back To <a href="on-member/index.php">Home</a>
    	
    </div>
	</div>
  	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>