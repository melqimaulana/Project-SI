<?php
session_start();
require '../models/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Query untuk menampilkan riwayat pesanan sesuai dengan user_id yang sedang login
$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY id ASC";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

// Mengekstrak data hasil query ke dalam array
$dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="xl:container mx-auto px-4 sm:px-10">
    <main class="py-10 max-w-6xl mx-auto">
      <a href="home.php" class="inline-block mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" viewBox="0 0 476.213 476.213" xml:space="preserve">
          <polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 57.427,253.107 476.213,253.107 " />
        </svg>
      </a>
      <h2 class="mb-4 text-3xl sm:text-4xl font-bold text-gray-900">Riwayat Transaksi</h2>
      <div class="space-y-10">
        <div class="w-full relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
              <tr>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Nomer Telpon</th>
                <th scope="col" class="px-6 py-3">Jenis pakaian</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($dataArray)): ?>
                <?php foreach ($dataArray as $order): ?>
                  <tr>
                    <td class="px-6 py-3"><?php echo htmlspecialchars($order['nama']); ?></td>
                    <td class="px-6 py-3"><?php echo htmlspecialchars($order['nomer_telpon']); ?></td>
                    <td class="px-6 py-3"><?php echo htmlspecialchars($order['jenis_pakaian']); ?></td>
                    <td class="px-6 py-4">
                    <a
                      href="detail.php?id=<?php echo $order["id"] ?>"
                      class="block w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 cursor-pointer"
                    >
                      Detail
                    </a>
                    </td>
                  </tr>
                  
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center px-6 py-3">Tidak ada riwayat transaksi!</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>

</html>
