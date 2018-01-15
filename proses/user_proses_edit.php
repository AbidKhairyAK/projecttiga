<?php
session_start();
if (isset($_SESSION['login'])){
	include 'koneksi.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	
	if (!empty($nama) && !empty($email) && !empty($pass)){
		mysqli_query($connect,"UPDATE user SET nama='$nama', email='$email', password='$pass' WHERE id='$id'");
		header('location:../user.php');
	} else if (!empty($nama) && !empty($email)){
		mysqli_query($connect,"UPDATE user SET nama='$nama', email='$email' WHERE id='$id'");
		header('location:../user.php');
	} else {
		echo "Lengkapi <a href='../user_edit.php'>Data!</a>";
	}
} else {
	echo "please <a href='../index.php'>login</a> first";
}
?>