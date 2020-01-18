<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$data=mysqli_query($koneksi,"Delete FROM product WHERE id='$id'");
	header('location:index.php');
?>