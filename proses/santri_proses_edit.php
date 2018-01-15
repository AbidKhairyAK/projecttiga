<?php
session_start();
if (isset($_SESSION['login'])){
	include 'koneksi.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$tempat = isset($_POST['tempat']) ? $_POST['tempat'] : '';
	$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
	$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
	$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
	
	$input = date('Y-m-d H:i:s',time());
	$user = $_SESSION['user_id'];
	
	if (!empty($nama) && !empty($tempat) && !empty($tanggal) && !empty($alamat) && !empty($jenis)){
		mysqli_query($connect,"UPDATE santri SET nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin='$jenis', user_id='$user', tanggal_input='$input' WHERE id='$id'");
		header('location:../santri.php');
	} else {
		echo "Lengkapi <a href='../user_edit.php'>Data!</a>";
	}
} else {
	echo "please <a href='../index.php'>login</a> first";
}
?>