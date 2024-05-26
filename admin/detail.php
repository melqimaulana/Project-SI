<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/koneksi.php';

session_start();

if (!isset($_SESSION['user_id'])) {
   
    header("Location: ../we/login.php");
    exit; 
}

$sql = "SELECT * FROM orders";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {

    $data = $result->fetch_assoc();
} else {
    echo "0 results";
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/dashboard.css">

    <title>Rumah Jahit</title>
</head>
<body>



    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Rumah Jahit</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboar.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="dataorder.php">
                    <i class='bx bxs-shopping-bag-alt' ></i>
                    <span class="text">Data Order</span>
                </a>
            </li>
            
        <ul class="side-menu">
            </li>
            <li>
                <a href="../web/logout.php" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>





    <section id="content">
    
        <nav>
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
          
        </nav>

        <main class="py-10 max-w-6xl mx-auto">
            <a href="dataorder.php" class="inline-block mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                    height="20px" width="20px" version="1.1" id="Layer_1" viewBox="0 0 476.213 476.213"
                    xml:space="preserve">
                    <polygon
                        points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5   57.427,253.107 476.213,253.107 " />
                </svg>
            </a>
            <div class="space-y-10">

                <div class="w-full relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Informasi Pribadi
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-r-lg"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Nama Lengkap
                                </td>
                                <td id="nama" class="px-6 py-4">
                                    : <?= $data["nama"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Email
                                </td>
                                <td id="email" class="px-6 py-4">
                                    : <?= $data["email"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Nomer WhatsApp
                                </td>
                                <td id="nomertelpon" class="px-6 py-4">
                                    : <?= isset($data["nomer_telpon"]) ? $data["nomer_telpon"] : 'N/A'; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Alamat
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["alamat"]; ?>
                                </td>
                            </tr>
                        </tbody>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Informasi Pakaian
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-r-lg"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Jenis Pakaian
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["jenis_pakaian"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Ukuran
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["ukuran"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Contoh Model
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["contoh_model"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Pesan
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["pesan"]; ?>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-4">
                                    Status
                                </td>
                                <td class="px-6 py-4">
                                    : <?= $data["status"]; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="dataorder.php"
                        class="block text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 cursor-pointer">
                        Selesai
                    </a>
                </div>
            </div>
        </main>
    </section>
    

    <script src="script.js"></script>
</body>
</html>