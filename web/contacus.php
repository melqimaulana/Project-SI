<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contac Us</title>
    <link rel="stylesheet" href="../assets/contac.css">

</head>

<body>
    <header class="header">
        <a href="#" class="logo">Rumah Jahit.</a>
        <div class="navbar">
            <a href="home.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Order
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="order.php">Jahit</a>
                    <a href="permak.php">Permak</a>
                </div>
            </div>
            <a href="history.php">History</a>
            <a href="contacus.php">Contau Us</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <button class="login-btn logout" onclick="window.location.href='logout.php';">Logout</button>
            <?php else: ?>
                <button class="login-btn" onclick="window.location.href='logout.php';">Login</button>
            <?php endif; ?>
        </div>
    </header>


    <section>
        <h1 class="sectionHeader">Contac Us</h1>
        <h1 class="heading">Get In Touch</h1>
        <p class="para">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, eaque possimus reiciendis quasi
            excepturi maxime debitis pariatur praesentium quae nemo.</p>

        <div class="contacform">
            <form action="#">
                <h1 class="sub-heading">Need Support!</h1>
                <p class="para para2">
                    Contac us for a quote, Help to join the them.
                </p>

                <input type="text" class="input" placeholder="Your Name">
                <input type="text" class="input" placeholder="Your email">
                <input type="text" class="input" placeholder="Your subject">
                <textarea class="input" cols="30" rows="5"></textarea>
                <input type="submit" class="input submit" value="Send Message">
            </form>

            <div class="maps-container">
                <div class="mapsbg"></div>
                <div class="maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3956.9406525114805!2d108.0720975881082!3d-7.360549762167384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1716645409204!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="contacMethod">
            <div class="method">
                <i class='bx bx-current-location  contaction'></i>
                <article class="text">
                    <h1 class="sub-heading">Location</h1>
                    <p class="para">Jln.Raya Cigalontang</p>

                </article>
            </div>

            <div class="method">
                <i class='bx bx-envelope  contaction'></i>
                <article class="text">
                    <h1 class="sub-heading">Email</h1>
                    <p class="para">Calonajengan@gamail,com</p>

                </article>
            </div>

            <div class="method">
                <i class='bx bx-phone  contaction'></i>
                <article class="text">
                    <h1 class="sub-heading">Phone Number</h1>
                    <p class="para">0856-9574-0494</p>

                </article>
            </div>
        </div>
    </section>
</body>

</html>