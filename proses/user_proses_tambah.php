<?php
	session_start();
	if (isset($_SESSION['login'])){
		include 'koneksi.php';
		
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pass = isset($_POST['pass']) ? md5($_POST['pass']) : '';
		
		if (!empty($nama) && !empty($email) && !empty($pass)){
			mysqli_query($connect,"INSERT INTO user VALUES(null,'$nama','$email','$pass')");
			header('location:../user.php');
		} else {
			echo "Lengkapi <a href='../user_tambah.php'>Data...!</a>";
		}
		
	} else {
		echo "Please <a href='../index.php'>Login</a> First";
	}
?>