<?php
if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$pt = $_POST['pt'];
		$alamat = $_POST['alamat'];

	if(empty($nama) || empty($pt) || empty($alamat)){
			header("Location: index.php?page=add-asuransi&notif=required");
		}else{
			include_once("helper/config.php");
			$input = mysqli_query($koneksi, "INSERT INTO asuransi(nm_asuransi, pt_asuransi, alamat_pusat)
													   VALUES ('$nama', '$pt', '$alamat')");

			if ($input) {
				//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
				header("Location: index.php?page=add-asuransi&notif=muncul");
			}else{
				header("Location: index.php?page=add-asuransi&notif=fail");
			}
		}
	}
?>
<div id="content_add-pasien">

	<form action="add-asuransi.php" method="post">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if ($notif == "muncul") {
				echo "<p class='notif'>Asuransi Sukses ditambahkan. <a href='index.php?page=asuransi'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Menambahkan Asuransi <a href='index.php?page=add-asuransi'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Form Harus di Isi Semua <a href='index.php?page=add-asuransi'>Refresh</a></p>";
			}
		?>
		<div class="element-form">
			<label>Nama Asuransi</label>
			<span><input type="text" name="nama" /></span>
		</div>
		<div class="element-form">
			<label>Perusahaan Asuransi</label>
			<span><input type="text" name="pt" /></span>
		</div>
		<div class="element-form">
			<label>Alamat Pusat</label>
			<span><textarea name="alamat"></textarea></span>
		</div>

		<div class="element-form">
			<span><input type="submit" name="submit" value="Masukan"/></span>
		</div>
	</form>
</div>