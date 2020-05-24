<?php

require_once("helper/config-log.php");
include_once("helper/fungsi.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $enkrip = md5($password);

	if (empty($username) || empty($password)){
		header("location: ".BASE_URL."index-log.php?notif=required");
	}else{
    	$sql = "SELECT * FROM user WHERE nm_login=:username";
    	$stmt = $db->prepare($sql);
    
    	// bind parameter ke query
    	$params = array(
        	":username" => $username,
    	);

    	$stmt->execute($params);

    	$user = $stmt->fetch(PDO::FETCH_ASSOC);

    	// jika user terdaftar
    	if($user){
       	 	// verifikasi password
        	if($enkrip == $user["pwd_user"]){
            	// buat Session
            	session_start();
            	$_SESSION["user"] = $user;
            	// login sukses, alihkan ke halaman timeline
            	header("Location: index.php");
        	}else{
    		header("Location: index-log.php?notif=pw");
    		}
    	}else{
    		header("Location: index-log.php?notif=id");
    	}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."style-log.css"; ?>">
</head>
<body>
	 <div id="container">
	 	<div id="header">
	 		<h2><a href="<?php echo BASE_URL."index-log.php"; ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>"/></a>
			RS Dendi
			</h2>
			<div id="user">
				<p id="log">Login</p>
			</div>
	 	</div>
	 	<div id="content">
	 		<?php
				$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
				if ($notif == "id") {
					echo "<p class='notif-del'>ID/Username Tidak Terdaftar <a href='index-log.php'>Refresh</a></p>";
				}else if ($notif == "pw") {
					echo "<p class='notif-del'>Password Salah <a href='index-log.php'>Refresh</a></p>";
				}else if ($notif == "required"){
					echo "<p class='notif-del'>Form Harus di isi Semua <a href='index-log.php'>Refresh</a></p>";
				}
			?>
	 		<form action="index-log.php" method="post">
				<div class="element-form">
					<label>ID/Username</label>
					<span><input type="text" name="username" /></span>
				</div>
				<div class="element-form">
					<label>Password</label>
					<span><input type="password" name="password" /></span>
				</div>
				<div class="element-form">
					<span><input type="submit" name="login" value="Masuk"/></span>
				</div>
			</form>
	 	</div>
	 	<div id="footer">
	 		<H4 id="identitas">Dendi Rizka Poetra<br>183112706450041</H4>
	 		<p id="copyright">CreatedBy@dendirzkptr 2020</p>
	 	</div>
	 </div>
</body>
</html>