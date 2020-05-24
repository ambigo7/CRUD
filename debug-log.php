<?php
if(isset($_POST['login'])){
		$options = [
    'cost' => 10,
];
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = $_POST["password"];
$passmd5 = md5($password);
//$pass = md5($pas);
}

echo "$username <br> $passmd5"
?>
	 		<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."style.css"; ?>">
</head>
<body>
	 <div id="container">
	 	<div id="header">
	 		<h2><a href="<?php echo BASE_URL."index-log.php"; ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>"/></a>
			RS Dendi
			</h2>
	 	</div>
	 	<div id="content">
	 		<?php
				$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
				if ($notif == "gagal") {
					echo "<p class='notif'>gagal login <a href='index-log.php'>Refresh</a></p>";
					echo "$password"; /*memberikan notif dengan html*/
				}
		?>
	 		<form action="debug-log.php" method="post">
				<div class="element-form">
					<label>ID/Username</label>
					<span><input type="text" name="username" /></span>
				</div>
				<div class="element-form">
					<label>Password</label>
					<span><input type="password" name="password" /></span>
				</div>
				<div class="element-form">
					<span><input type="submit" name="login" value="Login"/></span>
				</div>
			</form>
	 	</div>
	 	</div>
	 	<div id="footer">
	 		<H4 id="identitas">Dendi Rizka Poetra<br>183112706450041</H4>
	 		<p id="copyright">CreatedBy@dendirzkptr 2020</p>
	 	</div>
	 </div>
</body>
</html>