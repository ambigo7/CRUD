<?php

include_once("helper/config.php");

$id_pasien=$_GET['id'];

$detect = mysqli_query($koneksi, "SELECT * from antrian_pasien where id_pasien=$id_pasien");

while($data = mysqli_fetch_array($detect))
{
    $nama = $data['nm_pasien'];
    $tgl_lahir = $data['tgl_lahir'];
    $alamat = $data['alamat'];
}
?>
<?php

if(isset($_POST['update'])){
	$id_pasien = $_POST['id'];
	$nama = $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jns_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];

	if(empty($nama) || empty($tgl_lahir) || empty($jns_kelamin) || empty($alamat)){
			header("Location: index.php?page=data-pasien&notif=required");
		}else{
			$update = mysqli_query($koneksi, "UPDATE antrian_pasien set nm_pasien='$nama', tgl_lahir='$tgl_lahir', jns_kelamin='$jns_kelamin', alamat='$alamat' where id_pasien=$id_pasien");

			if ($update) {
			//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
				header("Location: index.php?page=data-pasien&notif=muncul-edit");
			}else{
				header("Location: index.php?page=data-pasien&notif=fail");
			}
		}
}
?>
<div id="content_edit-pasien">

	<form name="update_user" method="post" action="edit-pasien.php">
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
		</div>

		<div class="element-form">
			<label>Tanggal Lahir </label>
			<span><input type="date" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>"/></span>
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
			<span><textarea name="alamat"><?php echo $alamat;?></textarea></span>
		</div>
		<div class="element-form">
			<span><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></span>
			<span><input type="submit" name="update" value="Edit"/></span>
		</div>
			
	</form>
</div>