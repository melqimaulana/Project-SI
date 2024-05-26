<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/koneksi.php';

session_start();

if (!isset($_SESSION['user_id'])) {
   
    header("Location: ../web/login.php");
    exit; 
}

$sql_new_orders = "SELECT COUNT(*) as count_new_orders FROM orders WHERE status = 'new'";
$result_new_orders = $koneksi->query($sql_new_orders);

$new_orders_count = 0;
if ($result_new_orders->num_rows > 0) {
    $row_new_orders = $result_new_orders->fetch_assoc();
    $new_orders_count = $row_new_orders['count_new_orders'];
}

$sql_total_order = "SELECT COUNT(*) AS total_order FROM orders";
$result_total_order = $koneksi->query($sql_total_order);
$total_order = 0;

if ($result_total_order->num_rows > 0) {
    $row = $result_total_order->fetch_assoc();
    $total_order = $row['total_order'];
}

$sql = "SELECT * FROM orders";
$result = $koneksi->query($sql);

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
        <li class="active">
            <a href="dashboard.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="dataorder.php">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Data Order</span>
            </a>
        </li>
        <ul class="side-menu">
        </li>
        <li>
            <a href="../web/logout.php" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>

<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
      
    </nav>

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3><?= $new_orders_count; ?></h3>
                    <p>New Order</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
				<h3><?= $total_order ?></h3>
                    <p>Total order</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nomer WhatsApp</th>
                            <th>Alamat</th>
                            <th>Jenis Pakaian</th>
                            <th>Ukuran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['nomer_telpon']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                            <td><?= htmlspecialchars($row['jenis_pakaian']); ?></td>
                            <td><?= htmlspecialchars($row['ukuran']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</section>

<script src="script.js"></script>
</body>
</html>
