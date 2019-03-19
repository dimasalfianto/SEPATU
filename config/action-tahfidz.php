<?php

$params = array();
parse_str($_POST['dataTahfidz'], $params);

// Load file koneksi.php
session_start();
include "connect.php";

$nama       = $params['nama'];
$semester   = $params['semester'];
$hafalan    = $params['hafalan'];
$kelancaran = $params['kelancaran'];
$tajwid     = $params['tajwid'];
$makhraj    = $params['makhraj'];


$up = mysqli_query($connect, "INSERT INTO tahfidz (nama, semester, hafalan, kelancaran, tajwid,  makhraj) VALUES ('$nama', '$semester', '$hafalan', '$kelancaran', '$tajwid', '$makhraj')");
if($up){
	header('location:../on-admin/index_tahfidz.php');
}
else {
	echo '<script language="javascript">alert("input gagal ");</script>';

}


?>



