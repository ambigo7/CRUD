<?php

include_once("helper/config.php");

$id_poli=$_GET['id'];

$delete = mysqli_query($koneksi, "DELETE from poliklinik where id_poli=$id_poli");


if ($delete) {
		header("Location: index.php?page=poli&notif=muncul-del");
	}else{
		echo "Galat gagal!";
	}
?>