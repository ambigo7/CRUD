<?php

include_once("helper/config.php");

$id_asuransi=$_GET['id'];

$detect = mysqli_query($koneksi, "SELECT * from asuransi where id_asuransi=$id_asuransi");

while($data = mysqli_fetch_array($detect))
{
    $nama = $data['nm_asuransi'];
    $pt = $data['pt_asuransi'];
    $alamat = $data['alamat_pusat'];
}
?>
<?php

if(isset($_POST['update'])){
	$id_asuransi = $_POST['id'];
	$nama = $_POST['nama'];
	$pt = $_POST['pt'];
	$alamat = $_POST['alamat'];

	if(empty($nama) || empty($pt) || empty($alamat)){
			header("Location: index.php?page=asuransi&notif=required");
		}else{
			$update = mysqli_query($koneksi, "UPDATE asuransi set nm_asuransi='$nama', pt_asuransi='$pt', alamat_pusat='$alamat' where id_asuransi=$id_asuransi");

			if ($update) {
				//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
				header("Location: index.php?page=asuransi&notif=muncul-edit");
			}else{
				header("Location: index.php?page=asuransi&notif=fail");
			}
		}
}
?>
<div id="content_edit-pasien">

	<form name="update_user" method="post" action="edit-asuransi.php">
		<div class="element-form">
			<label>Nama Asuransi</label>
			<span><input type="text" name="nama" value="<?php echo $nama;?>" /></span>
		</div>
		<div class="element-form">
			<label>Perusahaan Asuransi</label>
			<span><input type="text" name="pt" value="<?php echo $pt;?>"/></span>
		</div>
		<div class="element-form">
			<label>Alamat Pusat</label>
			<span><textarea name="alamat"><?php echo $alamat;?></textarea></span>
		</div>

		<div class="element-form">
			<span><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></span>
			<span><input type="submit" name="update" value="Edit"/></span>
		</div>
			
	</form>
</div>