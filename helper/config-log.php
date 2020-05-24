<?php

/*$db_host = "localhost";
$db_user = "root";
$db_pass = "kopi";
$db_name = "pesbuk";*/

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'db_rumahsakit';

//$koneksi = mysqli_connect($host, $username, $password, $db_name) or die("Koneksi ke database gagal!");;
try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}