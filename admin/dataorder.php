<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/koneksi.php';

session_start();

if (!isset($_SESSION['user_id'])) {
   
    header("Location: ../web/login.php");
    exit; 
}

$sql = "SELECT * FROM orders";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {

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
            <li >
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

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                        <i class='bx bx-search' ></i>
                        <i class='bx bx-filter' ></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nomer WhatsApp</th>
                                <th>Alamat</th>
                                <th>Jenis Pakaian</th>
                                <th>Ukuran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nomer_telpon']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['jenis_pakaian']; ?></td>
                                <td><?= $row['ukuran']; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $row["id"] ?>" class="block w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 cursor-pointer">Detail</a>
                                </td>
								<td>
                                <form method="post" action="ubah_status.php">
                                    <input type="hidden" name="order_id" value="<?= $row['id']; ?>">
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="new" <?= $row['status'] == 'new' ? 'selected' : ''; ?>>New</option>
                                        <option value="in-progress" <?= $row['status'] == 'in-progress' ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="completed" <?= $row['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    </select>
                                </form>
                            </td>
								
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </main>
        
    </section>

    </div>
</div>
</body>
</html>
