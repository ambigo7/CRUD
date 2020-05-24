<?php

include_once("helper/config.php");

$id_pasien=$_GET['id'];

$delete = mysqli_query($koneksi, "DELETE from antrian_pasien where id_pasien=$id_pasien");


if ($delete) {
		header("Location: index.php?page=data-pasien&notif=muncul-del");
	}else{
		echo "Galat gagal!";
	}
?>