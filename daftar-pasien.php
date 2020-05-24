<?php

include_once("helper/config.php");
include_once("helper/fungsi.php");

$tarik_antri = mysqli_query($koneksi, "Select * from antrian_pasien");
$tarik_daftar = mysqli_query($koneksi, "Select * from daftar_pasien");

?>

<div id="content_data-pasien">
	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		if ($notif == "muncul-edit") {
				echo "<p class='notif'>Data Pendaftaran Pasien Berhasil di Edit. <a href='index.php?page=daftar-pasien'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if($notif == "muncul-del"){
				echo "<p class='notif-del'>Pasien Berhasil di Hapus dari Pendaftaran. <a href='index.php?page=daftar-pasien'>Refresh</a></p>";
			}else if ($notif == "muncul-add"){
				echo "<p class='notif'>Pasien Berhasil di Daftarkan. <a href='index.php?page=daftar-pasien'>Refresh</a></p>";
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Mendaftarkan Pasien <a href='index.php?page=daftar-pasien'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Gagal Mendaftarkan Pasien, Form Harus di Isi Semua <a href='index.php?page=daftar-pasien'>Refresh</a></p>";
			}else if ($notif == "required-edit"){
				echo "<p class='notif-del'>Gagal Mengedit Pasien, Form Harus di Isi Semua <a href='index.php?page=daftar-pasien'>Refresh</a></p>";
			}
		?>
	<h4><ul><li>Data Antrian Pasien</li></ul></h4>
	<div id="table-1">
		<table class="table_data" cellspacing='0'>
			<thead>
				<tr>
					<th>No</th> <th>Nama</th> <th>Jenis Kelamin</th> <th>Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data_antri = mysqli_fetch_array($tarik_antri)) {
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data_antri['nm_pasien']."</td>";
					echo "<td>".$data_antri['jns_kelamin']."</td>";
					echo "<td><a class='link-table' href='index.php?page=add-daftar&id=$data_antri[id_pasien]'>Daftarkan</a></td></tr>";
					}
		 		?>
		 	</tbody>
		</table>
	</div>
	<h4><ul><li>Data Pasien yang Terdaftar</li></ul></h4>
	<div id="table-2">
		<table class="table_data" cellspacing='0'>
			<thead>
				<tr>
					<th class="short">No</th> <th class="normal">Nama</th> <th class="normal">Tanggal Lahir</th> <th class="normal">Jenis Kelamin</th> <th class="normal">Poliklinik</th> <th class="normal">Asuransi</th> <th class="normal">Alamat</th> <th class="normal">Tanggal Kunjungan</th> <th class="short">Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($tarik_daftar)) {
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data['nm_pasien']."</td>";
					echo "<td>".$data['tgl_lahir']."</td>";
					echo "<td>".$data['jns_kelamin']."</td>";
					echo "<td>".$data['poliklinik']."</td>";
					echo "<td>".$data['asuransi']."</td>";
					echo "<td>".$data['alamat']."</td>";
					echo "<td>".$data['tgl_kunjung']."</td>";
					echo "<td><a class='link-table' href='index.php?page=edit-daftar&id=$data[kd_pasien]'>Edit</a> <a class='link-table' href='delete-daftar.php?id=$data[kd_pasien]'>Hapus</a></td></tr>";
					}
		 		?>
		 	</tbody>
		</table>
	</div>
</div>