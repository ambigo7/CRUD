<?php

include_once("helper/config.php");

$id_poli=$_GET['id'];

$detect = mysqli_query($koneksi, "SELECT * from poliklinik where id_poli=$id_poli");

while($data = mysqli_fetch_array($detect))
{
    $nama = $data['nm_poli'];
}
?>
<?php

if(isset($_POST['update'])){
	$id_poli = $_POST['id'];
	$nama = $_POST['nama'];
	if(empty($nama)){
			header("Location: index.php?page=poli&notif=required");
		}else{
			$update = mysqli_query($koneksi, "UPDATE poliklinik set nm_poli='$nama'where id_poli=$id_poli");

			if ($update) {
				//echo "Pengguna Sukses ditambahkan. <a href='index.php'>Lihat Pengguna</a>";
				header("Location: index.php?page=poli&notif=muncul-edit");
			}else{
				header("Location: index.php?page=poli&notif=fail");
			}
		}
}
?>
<div id="content_edit-pasien">

	<form name="update_user" method="post" action="edit-poli.php">
		<div class="element-form">
			<label>Nama Poliklinik</label>
			<span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
		</div>
		<div class="element-form">
			<span><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></span>
			<span><input type="submit" name="update" value="Edit"/></span>
		</div>
			
	</form>
</div>