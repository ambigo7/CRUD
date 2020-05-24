<?php
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];

	if(empty($nama)){
		header("Location: index.php?page=add-poli&notif=required");
	}else{
		include_once("helper/config.php");
		$input = mysqli_query($koneksi, "INSERT INTO poliklinik(nm_poli)
													   VALUES ('$nama')");

		if ($input) {
			//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
			header("Location: index.php?page=add-poli&notif=muncul");
		}else{
			header("Location: index.php?page=add-poli&notif=fail");
		}
			
	}
}

?>
<div id="content_add-pasien">

	<form action="add-poli.php" method="post">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if ($notif == "muncul") {
				echo "<p class='notif'>Poliklinik Sukses ditambahkan. <a href='index.php?page=poli'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Menambahkan Poliklinik <a href='index.php?page=add-poli'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Form Harus di Isi <a href='index.php?page=add-poli'>Refresh</a></p>";
			}
		?>
		<div class="element-form">
			<label>Nama Poliklinik</label>
			<span><input type="text" name="nama" /></span>
		</div>
		<div class="element-form">
			<span><input type="submit" name="submit" value="Masukan"/></span>
		</div>
	</form>
</div>