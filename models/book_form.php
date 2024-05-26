<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'koneksi.php';

// Mulai sesi jika belum dimulai
session_start();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomertelpon = $_POST['nomertelpon'];
    $alamat = $_POST['alamat'];
    $jenis_pakaian = $_POST['jenis_pakaian'];
    $ukuran = $_POST['ukuran'];
    $pesan = $_POST['message'];

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }


    if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

   
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
        exit;
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $contoh_model = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
            exit;
        }
    }

 
    if (isset($_SESSION['user_id'])) {
      
        $sql = "INSERT INTO orders (nama, email, nomer_telpon, alamat, jenis_pakaian, ukuran, contoh_model, pesan, user_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssssssssi", $nama, $email, $nomertelpon, $alamat, $jenis_pakaian, $ukuran, $contoh_model, $pesan, $_SESSION['user_id']);

        if ($stmt->execute()) {
            header("Location: ../web/history.php");
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }

        $stmt->close();
    } else {
        echo "User ID is not set.";
    }
    $koneksi->close();
}
?>
