<?php

include_once("helper/config.php");
include_once("helper/fungsi.php");

$tarik_data = mysqli_query($koneksi, "Select * from antrian_pasien");

$page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<div id="content_data-pasien">
	<a class="tambah" href="<?php echo BASE_URL."index.php?page=add-pasien"; ?>">+Tambah Data Antri Pasien</a>

	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		if ($notif == "muncul-edit") {
				echo "<p class='notif'>Pasien Berhasil di Edit. <a href='index.php?page=data-pasien'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if($notif == "muncul-del"){
				echo "<p class='notif-del'>Pasien Berhasil di Hapus. <a href='index.php?page=data-pasien'>Refresh</a></p>";
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Mengedit Data Pasien <a href='index.php?page=data-pasien'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Gagal Mengedit Data Pasien, Form Harus di Isi Semua <a href='index.php?page=data-pasien'>Refresh</a></p>";
			}
		?>
	<div class="garis-data">
		<table class="table_data" cellspacing='0'>
			<thead>
				<tr>
					<th>No</th> <th>Nama</th> <th>Tanggal Lahir</th> <th>Jenis Kelamin</th> <th>Alamat</th> <th>Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($tarik_data)) {
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data['nm_pasien']."</td>";
					echo "<td>".$data['tgl_lahir']."</td>";
					echo "<td>".$data['jns_kelamin']."</td>";
					echo "<td>".$data['alamat']."</td>";
					echo "<td><a class='link-table' href='index.php?page=edit-pasien&id=$data[id_pasien]'>Edit</a> | <a class='link-table' href='delete-pasien.php?id=$data[id_pasien]'>Hapus</a></td></tr>";
					}
		 		?>
		 	</tbody>
		</table>
	</div>
</div>