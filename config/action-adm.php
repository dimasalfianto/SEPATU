<?php
// Load file koneksi.php
session_start();
include "connect.php";

$judul            = $_POST['bulan'];
$isi              = $_POST['tgl_pembayaran'];


if(isset($_FILES['file'])){
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  if ($_FILES["file"]["size"] > 500000) {
    echo '<div class="alert alert-danger">File size terlalu besar.</div>';
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo '<div class="alert alert-danger">Hanya JPG, JPEG, PNG & GIF yang di izinkan.</div>';
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo '<div class="alert alert-danger">File gagal di upload.</div>';
} else {
  $file = $target_dir.''.$judul.'.'.$imageFileType;
  $wow = $judul.'.'.$imageFileType;
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
    $up = mysqli_query($connect, "INSERT INTO pembayaran(bulan, tgl_pembayaran, photo, id_user) VALUES ('$judul', '$isi', '$wow',".$_SESSION['sess_id'].")");
    if($up){
      header('location:../on-member/index.php');
    }
  } else {
    echo '<script language="javascript">alert("upload gagal ");</script>';

 }
}
} 
?>



