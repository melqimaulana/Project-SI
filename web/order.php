<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip setelah pengalihan
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jahit</title>
    <link rel="stylesheet" href="../assets/order.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<header class="header">
        <a href="#" class="logo">Rumah Jahit</a>
        <nav class="navbar navbar-expand-lg navbar-transfarent bg-transfarent  navbar">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-black d-block dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Order
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="order.php">Jahit</a>
                                <a class="dropdown-item" href="permak.php">Permak</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacus.php">Contac Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <button type="button" class="btn btn-danger" onclick="window.location.href='logout.php';">Logout</button>
            <?php else: ?>
                <button type="button" class="btn btn-primary" onclick="window.location.href='login.php';">Login</button>
            <?php endif; ?>
        </nav>
    </header>
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-6">
                    <img src="../assets/image/jahit.jpg" alt="Booking Camp" class="img-fluid rounded-3"
                        style="height: 400px;">

                    <h4 class="text-black underline" style="margin-top: 5px;">Panduan Ukuran:</h4>
                    <div class="d-grid gap-2 d-md-block">
                        <button id="showUkuranKameja" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalUkuranKameja">Ukuran Pria</button>
                        <button id="showUkuranWanita" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalUkuranWanita">Ukuran Wanita</button>
                    </div>

                </div>
                <div class="modal fade" id="modalUkuranKameja" tabindex="-1" aria-labelledby="modalUkuranKamejaLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUkuranKamejaLabel">Ukuran Kameja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="imgUkuranKameja" src="../assets/image/ukuranKameja.jpg" alt="Ukuran Kameja"
                                    class="img-fluid rounded-3">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ukuran Wanita -->
                <div class="modal fade" id="modalUkuranWanita" tabindex="-1" aria-labelledby="modalUkuranWanitaLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUkuranWanitaLabel">Ukuran Wanita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="imgUkuranWanita" src="../assets/image/ukuranWanita.jpeg" alt="Ukuran Wanita"
                                    class="img-fluid rounded-3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-column">
                    <form action="../models/book_form.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col d-flex flex-column gap-1">
                                    <label for="name">Nama lengkap:</label>
                                    <input type="text" name="nama" id="name" class="form-control"
                                        placeholder="Nama lengkap..." required>
                                </div>
                                <div class="col d-flex flex-column gap-1">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Masukan email..." required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col d-flex flex-column gap-1">
                                    <label for="nomer_telpon">Nomor WhatsApp:</label>
                                    <input type="text" name="nomertelpon" id="nomertelpon" class="form-control"
                                        placeholder="Nomer WhatsApp" required>
                                </div>
                                <div class="col d-flex flex-column gap-1">
                                    <label for="alamat">Alamat:</label>
                                    <input type="alamat" name="alamat" id="alamat" class="form-control"
                                        placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col d-flex flex-column gap-1">
                                    <label for="jenis_pakaian">Jenis Pakaian:</label>
                                    <input type="text" name="jenis_pakaian" id="jenis_pakaian" class="form-control"
                                        placeholder="Jenis Pakaian" required>
                                </div>
                                <div class="col d-flex flex-column gap-1">
                                    <label for="ukuran">ukuran:</label>
                                    <input type="ukuran" name="ukuran" id="ukuran" class="form-control"
                                        placeholder="Ukuran" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col d-flex flex-column gap-1">
                                    <label for="message">Contoh Model</label>
                                    <input type="file" name="file" id="file" class="form-control"
                                    required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col d-flex flex-column gap-1">
                                    <label for="message">Pesan:</label>
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="10"
                                        placeholder="Your message..."></textarea>
                                </div>
                            </div>
                            <button id="btn" class="btn btn-primary w-100" type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>