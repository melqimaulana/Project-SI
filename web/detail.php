<?php
session_start();
require '../models/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil ID pesanan dari parameter URL
if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
} else {
    // Jika ID pesanan tidak tersedia, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
    header('Location: listriwayat.php');
    exit;
}

// Query untuk menampilkan detail pesanan sesuai dengan user_id yang sedang login dan ID pesanan yang dipilih
$query = "SELECT * FROM orders WHERE user_id = ? AND id = ?"; // Menggunakan tambahan kondisi id = ?
$stmt = $koneksi->prepare($query);
$stmt->bind_param("ii", $user_id, $order_id); // Bind parameter ID pesanan
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows === 0) {
    // Jika hasil query tidak ada atau tidak ada baris yang ditemukan, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
    header('Location: listriwayat.php');
    exit;
}

$data = $result->fetch_assoc(); // Mengambil data pesanan

// Sekarang Anda memiliki data detail pesanan dalam variabel $data
// Selanjutnya, tampilkan data ini di dalam HTML seperti yang Anda lakukan sebelumnya
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="xl:container mx-auto px-4 sm:px-10">
        <main class="py-10 max-w-6xl mx-auto">
            <a href="listriwayat.php" class="inline-block mb-4">
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
                    <a href="history.php"
                        class="block text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 cursor-pointer">
                        Selesai
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>