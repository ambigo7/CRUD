<?php
if (isset($_POST['submit'])) {
			$nama = $_POST['nama'];
			$tgl_lahir = $_POST['tgl_lahir'];
			$jns_kelamin = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];

		if(empty($nama) || empty($tgl_lahir) || empty($jns_kelamin) || empty($alamat)){
			header("Location: index.php?page=add-pasien&notif=required");
		}else{
			include_once("helper/config.php");
			$input = mysqli_query($koneksi, "INSERT INTO antrian_pasien(nm_pasien, tgl_lahir, jns_kelamin, alamat)
													   VALUES ('$nama', '$tgl_lahir', '$jns_kelamin', '$alamat')");

			if ($input) {
				//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
				header("Location: index.php?page=add-pasien&notif=muncul");
			}else{
				header("Location: index.php?page=add-pasien&notif=fail");
			}
			
		}
}

?>
<div id="content_add-pasien">

	<form action="add-pasien.php" method="post">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if ($notif == "muncul") {
				echo "<p class='notif'>Pasien Sukses ditambahkan ke Antrian <a href='index.php?page=data-pasien'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Menambahkan Pasien <a href='index.php?page=add-pasien'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Form Harus di Isi Semua <a href='index.php?page=add-pasien'>Refresh</a></p>";
			}
		?>
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama" /></span>
		</div>

		<div class="element-form">
			<label>Tanggal Lahir </label>
			<span><input type="date" name="tgl_lahir" /></span>
		</div>

		<div class="element-form">
			<label>Jenis Kelamin</label>
			<span>
				<label><input type="radio" name="jenis_kelamin" value="Laki-laki" /> Laki-laki</label>
            	<label><input type="radio" name="jenis_kelamin" value="Perempuan" /> Perempuan</label>
        	</span>
		</div>
		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"></textarea></span>
		</div>
		<div class="element-form">
			<span><input type="submit" name="submit" value="Masukan"/></span>
		</div>
	</form>
</div>