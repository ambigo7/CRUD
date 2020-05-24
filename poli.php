<?php

include_once("helper/config.php");
include_once("helper/fungsi.php");

$tarik_data = mysqli_query($koneksi, "Select * from poliklinik");

$page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<div id="content_data-pasien">
	<a class="tambah" href="<?php echo BASE_URL."index.php?page=add-poli"; ?>">+Tambah Data Poliklinik</a>

	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		if ($notif == "muncul-edit") {
				echo "<p class='notif'>Poliklinik Berhasil di Edit. <a href='index.php?page=poli'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if($notif == "muncul-del"){
				echo "<p class='notif-del'-del>Poliklinik Berhasil di Hapus. <a href='index.php?page=poli'>Refresh</a></p>";
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Mengedit Data Poliklinik <a href='index.php?page=poli'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Gagal Mengedit Data Poliklinik, Form Harus di Isi Semua <a href='index.php?page=poli'>Refresh</a></p>";
			}
		?>
	<div id="garis-data-poli">
		<table class="table_data" cellspacing='0'>
			<thead>
				<tr>
					<th>No</th> <th>Nama Poliklinik</th> <th>Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($tarik_data)) {
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data['nm_poli']."</td>";
					echo "<td><a class='link-table' href='index.php?page=edit-poli&id=$data[id_poli]'>Edit</a> | <a class='link-table' href='delete-poli.php?id=$data[id_poli]'>Hapus</a></td></tr>";
					}
		 		?>
		 	</tbody>
		</table>
	</div>
</div>