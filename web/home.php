<?php
session_start();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">Rumah Jahit.</a>
        <div class="navbar">
            <a href="#home">Home</a>
            <div class="dropdown">
              <button class="dropbtn">Order
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="order.php">Jahit</a>
                <a href="permak.php">Permak</a>
              </div>
            </div> 
            <a href="history.php">History</a></a>
            <a href="contacus.php">Contac us</a>
            <?php if (isset($_SESSION['user_id'])): ?>
            <button class="login-btn" id="logoutButton" onclick="window.location.href='logout.php';">Logout</button>
            <?php else: ?>
            <button class="login-btn"  onclick="window.location.href='login.php';">Login</button>
            <?php endif; ?>
          </div>
    </header>

    <!-- Konten lainnya -->
</body>

    </header>
    <section class="home" id="home">
        <div class="home-content">
            <h1>Welcome <span>To </span></h1>
            <div class="text-animate">
                <h3>Rumah Jahit</h3>
            </div>
            <p>Siap melayani keluhan tentang pakaian anda</p>


        </div>

        <div class="home-sci">
            <a href="https://www.facebook.com/njang.tayo?mibextid=ZbWKwL"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/melkiar_?igsh=MTg4M3YybzJ6ZGhxOA=="><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-whatsapp'></i></i></a>
        </div>
    </section>

    <section class="about" id="about">
        <h2 class="heading">About <span>Me</span></h2>

        <div class="about-img">
            <img src="../assets/image/jahit.jpg" alt="Image">
            <span class="circle-spin"></span>
        </div>

        <div class="about-content">
            <h3>Rumah Jahit</h3>
            <p>Rumah jahit adalah tempat di mana kreativitas dan keterampilan menyatu untuk menciptakan pakaian yang indah dan fungsional. Ketika Anda melangkahkan kaki ke dalam rumah jahit, 
                Anda akan disambut oleh aroma kain baru dan bunyi mesin jahit yang berdenyut dengan irama kesabaran dan keahlian.</p>
        </div>
    </section>


    <section class="aktivity" id="aktivity">
        <div class="title">
            <h1 class="heading">Working <span>process</span></h1>
        </div>
        <div class="timeline">
            <div class="checkpoint">
                <div>
                    <h2>Order</h2>
                    <p>Lakukan order pada halaman yang telah di sediakan.</p>
                </div>
            </div>

            <div class="checkpoint">
                <div>
                    <h2>Penjemputan Barang</h2>
                    <p>Setelah order berhasil dan kesepakatan barang akan di jemput atau di kirim melalui ekspedisi untuk dilakukan proses pengerjaan.</p>
                </div>
            </div>

            <div class="checkpoint">
                <div>
                    <h2>Pengerjaan</h2>
                    <p>Setelah barang di sampai/diterima maka akan di lakukan proses pengerjaan sesuai dengan orderan.
                        kami juga akan menghubungi owner untuk memastikan orderan apakah sudah sesuai dengan apa yang di
                        inputkan agar meminimalisir kesalahan.Owner juga dapat meberikan pesan ketika pengecekan ulang apabila ada hal yang belum tersampaikan sewaktu order.
                    </p>
                </div>
            </div>

            <div class="checkpoint">
                <div>
                    <h2>Pembayaran</h2>
                    <p>Setelah pengerjaan selesai maka tim kami akan menghubungi owner untuk melakukan pembayaran dan barang akan di antarkan.</p>
                </div>
            </div>

            <div class="checkpoint">
                <div>
                    <h2>Pengiriman</h2>
                    <p>Pengiriman akan di lakukan setelh owner membayar jasa.</p>
                </div>
            </div>
        </div>


    </section>


    <section class="image-card" id="image-card">
        <div class="card-container">
            <div class="card-content">
                <h1 class="heading">Model <span>Example</span></h1>
            </div>

            <div class="update-card">
                <div class="card">
                    <img src="../assets/image/gamis-1.jpg" alt="Image">
                    <h4>Gamis</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non consequatur
                        totam eaque incidunt praesentium deserunt veritatis fuga doloremque libero harum.</p>
                </div>

                <div class="card">
                    <img src="../assets/image/gamis-2.jpg" alt="Image">
                    <h4>Abaya</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non consequatur
                        totam eaque incidunt praesentium deserunt veritatis fuga doloremque libero harum.</p>
                </div>

                <div class="card">
                    <img src="../assets/image/kameja-1.jpg" alt="Image">
                    <h4>Kameja</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non consequatur
                        totam eaque incidunt praesentium deserunt veritatis fuga doloremque libero harum.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <h3>Melqi Maulana</h3>
            <p>Mahasiswa Informatika, Universitas Siliwangi. Membangun masa depan dengan teknologi.</p>
            <ul class="socials">
                <li><a href="https://www.facebook.com/njang.tayo?mibextid=ZbWKwL"><i class='bx bxl-facebook'></i></a>
                </li>
                <li><a href="https://www.instagram.com/melkiar_?igsh=MTg4M3YybzJ6ZGhxOA=="><i
                            class='bx bxl-instagram'></i></a></li>
                <li><a href="https://github.com/melqimaulana"><i class='bx bxl-github'></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Melqi Maulana. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>