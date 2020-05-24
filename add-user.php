<?php
require_once("helper/config-log.php");

if(isset($_POST['register'])){
    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $jabatan = filter_input(INPUT_POST, 'jabatan', FILTER_SANITIZE_STRING);
    // enkripsi password
   	$password = $_POST["password"];
   	$enkrip = md5($password);
   	$re_pw = $_POST["pass"];

   	if(empty($nama) || empty($username)|| empty($jabatan) || empty($password) || empty($re_pw)){
   		header("Location: index.php?page=add-user&notif=required");
   	}else if ($password != $re_pw){
   		header("Location: index.php?page=add-user&notif=!pw");
   	}else{
    	// menyiapkan query
    	$sql = "INSERT INTO user (nm_user, nm_login, pwd_user, jabatan)
            	VALUES (:nama, :username, :password, :jabatan)";
    	$stmt = $db->prepare($sql);

    	// bind parameter ke query
    	$params = array(
        	":nama" => $nama,
        	":username" => $username,
        	":password" => $enkrip,
        	":jabatan" => $jabatan
    	);

    // eksekusi query untuk menyimpan ke database
    	$saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    	if($saved){
    		header("Location: index.php?page=add-user&notif=muncul");
    	}else{
    		header("Location: index-log.php?notif=fail");
    	}
    }
}



?>
<div id="content_add-user">

	<form action="add-user.php" method="post">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if ($notif == "muncul") {
				echo "<p class='notif'>Admin Sukses ditambahkan. <a href='index.php'>Refresh</a></p>"; /*memberikan notif dengan html*/
			}else if ($notif == "fail"){
				echo "<p class='notif-del'>Gagal Menambahkan Admin <a href='index.php?page=add-user'>Refresh</a></p>";
			}else if ($notif == "required"){
				echo "<p class='notif-del'>Form Harus di Isi Semua <a href='index.php?page=add-user'>Refresh</a></p>";
			}else if ($notif == "!pw"){
				echo "<p class='notif-del'>Password tidak sama <a href='index.php?page=add-user'>Refresh</a></p>";
			}
		?>
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama" /></span>
		</div>

		<div class="element-form">
			<label>ID/Username</label>
			<span><input type="text" name="username" /></span>
		</div>

		<div class="element-form">
			<label>Jabatan</label>
			<span>
				<label><input type="radio" name="jabatan" value="Admin Web" /> Admin Web</label>
            	<label><input type="radio" name="jabatan" value="Perawat" /> Perawat</label>
        	</span>
		</div>
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" /></span>
		</div>
		<div class="element-form">
			<label>Konfirmasi Password</label>
			<span><input type="password" name="pass" /></span>
		</div>
		<div class="element-form">
			<span><input type="submit" name="register" value="Masukan"/></span>
		</div>
	</form>
</div>