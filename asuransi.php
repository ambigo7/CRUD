<?php

include_once("helper/config.php");
include_once("helper/fungsi.php");

$tarik_data = mysqli_query($koneksi, "Select * from asuransi");

$page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<div id="content_data-pasien">
	<a class="tambah" href="<?php echo BASE_URL."index.php?page=add-asuransi"; ?>">+Tambah Data Asuransi</a>

	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		if ($notif == "muncul-edit") {
				echo "<p class='notif'>Asuransi Berhasil di Edit. <a href='index.php?page=asuransi'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if($notif == "muncul-del"){
				echo "<p class='notif-del'>Asuransi Berhasil di Hapus. <a href='index.php?page=asuransi'>Refresh</a></p>";
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Mengedit Data Asuransi <a href='index.php?page=asuransi'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Gagal Mengedit Data Asuransi, Form Harus di Isi Semua <a href='index.php?page=asuransi'>Refresh</a></p>";
			}
		?>
	<div class="garis-data">
		<table class="table_data" cellspacing='0'>
			<thead>
				<tr>
					<th>No</th> <th>Nama Asuransi</th> <th>Perusahaan</th> <th>Alamat Pusat</th> <th>Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($tarik_data)) {
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data['nm_asuransi']."</td>";
					echo "<td>".$data['pt_asuransi']."</td>";
					echo "<td>".$data['alamat_pusat']."</td>";
					echo "<td><a class='link-table' href='index.php?page=edit-asuransi&id=$data[id_asuransi]'>Edit</a> | <a class='link-table' href='delete-asuransi.php?id=$data[id_asuransi]'>Hapus</a></td></tr>";
					}
		 		?>
		 	</tbody>
		</table>
	</div>
</div>