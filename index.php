<?php

include_once("helper/config.php");
include_once("helper/fungsi.php");
require_once("verifikasi.php");

/*session_start();
if (!isset($_SESSION['username'])) 
{
	header("location: login.php");
}*/
$page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."style.css"; ?>">
</head>
<body>
	 <div id="container">
	 	<div id="header">
	 		<h2><a href="<?php echo BASE_URL."index.php"; ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>"/></a>
			RS Dendi
			</h2>
			<div id="user">
				<p id="jabatan-user">Jabatan : <?php echo $_SESSION["user"]["jabatan"];?></p>
				<p id="tambah-user"><a id="user-add"href="<?php echo BASE_URL."index.php?page=add-user"; ?>">+Tambah Admin Baru</a></p>
			</div>
	 	</div>

	 	<div id="menu">
	 		<div id="menu-samping">
	 			<hr>
	 			<a class="data-menu"href="<?php echo BASE_URL."index.php?page=data-pasien"; ?>">Data Antrian Pasien</a> <br>
	 			<hr>
	 			<a class="data-menu" href="<?php echo BASE_URL."index.php?page=asuransi"; ?>">Data Jaminan Pembayaran</a> <br>
	 			<hr>
	 			<a class="data-menu" href="<?php echo BASE_URL."index.php?page=poli"; ?>">Data Poliklinik</a> <br>
	 			<hr>
	 			<a class="data-menu" href="<?php echo BASE_URL."index.php?page=daftar-pasien"; ?>">Pedaftaran Pasien</a> <br>
	 			<hr>
	 		</div>
	 		<div id="content">
	 		<?php
	 			$filename = "$page.php"; //"antri-pasien/".$page.".php";
				if(file_exists($filename)){
					include_once($filename);
				}else{
					/*echo "Maaf, file tersebut belum ada di dalam sistem kami";
					echo "<br>$filename";*/
					include_once("utama.php");
				}
	 		?>
	 	</div>
	 	</div>
	 	<div id="footer">
	 		<H4 id="identitas">Dendi Rizka Poetra<br>183112706450041</H4>
	 		<p id="copyright">CreatedBy@dendirzkptr 2020</p>
	 	</div>
	 </div>
</body>
</html>
