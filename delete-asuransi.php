<?php

include_once("helper/config.php");

$id_asuransi=$_GET['id'];

$delete = mysqli_query($koneksi, "DELETE from asuransi where id_asuransi=$id_asuransi");


if ($delete) {
		header("Location: index.php?page=asuransi&notif=muncul-del");
	}else{
		echo "Galat gagal!";
	}
?>