<?php
require 'connect.php';

if(isset($_POST['username'])) { //jika ada akses
	$error = array();

	$nama = $_POST['title'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword =$_POST['repassword'];

	
	if(empty($nama)) {
		$error[] = "nama tidak boleh kosong";
	}

	if(empty($username)) {
		$error[] = "username tidak boleh kosong";	 
	}

	if(empty($password)) {
		 $error[] = "password tidak boleh kosong";
	}

	if($password != $repassword) {
		 $error[] = "kata ulang sandi tidak cocok";
	}

	if (count($error) == 0){
		$password =md5($password);
		$sql = "INSERT INTO users (nama, username, password, level_user) VALUES ('$nama', '$username','$password', 'member' )";
		$insert =$connect->query($sql);

		if ($insert) {
			echo "<script>alert('Registrasi Berhasil'); window.location.href = '../login.php';</script>";
			exit(); 
		} else {
			echo "Oops error";
		}
	} else {
		session_start();
		$_SESSION['error-log'] = $error;
		header('location:../register.php?error=register');
	}
}else {// jika di akses langsung
	header('location:../register.php');
}