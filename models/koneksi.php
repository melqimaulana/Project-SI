<?php
$servername = "localhost";  
$username = "root";         
$password = "";            
$dbname = "rumah_jahit"; 

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
