<?php

include_once("helper/config.php");

$kd_pasien=$_GET['id'];

$delete = mysqli_query($koneksi, "DELETE from daftar_pasien where kd_pasien=$kd_pasien");


if ($delete) {
		header("Location: index.php?page=daftar-pasien&notif=muncul-del");
	}else{
		echo "Galat gagal!";
	}
?>