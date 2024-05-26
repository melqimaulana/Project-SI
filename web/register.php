<?php
require '../models/koneksi.php';

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role_id = 1; // Default role is 'user'

    // Check if email already exists
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Insert the new user
        $stmt = $koneksi->prepare("INSERT INTO users (fullname, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $fullname, $email, $password, $role_id);
        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: login.php");
            exit();   
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="relative xl:container mx-auto px-4 sm:px-10">
    <div class="w-full min-h-screen flex items-center justify-center flex-col py-10">
      <div class="absolute inset-0">
        <img src="../assets/image/jahit.jpg" alt="bg-login" class="hidden md:block w-full h-full object-cover">
      </div>
      <form method="post"
        class="relative w-full mt-4 max-w-2xl bg-black bg-opacity-60 backdrop-blur rounded-xl py-10 px-6 sm:px-10 shadow-md">
        <h2 class="text-3xl font-bold mb-4 text-center">
          <span class="text-white">Buat akun
        </h2>
        <div class="mb-6">
          <label for="fullname" class="inline-block mb-2 text-sm font-medium text-white">Nama Lengkap</label>
          <input type="text" id="fullname"
            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="fullname" placeholder="Masukan nama lengkap..." required>
        </div>
        <div class="mb-6">
          <label for="email" class="inline-block mb-2 text-sm font-medium text-white">Email</label>
          <input type="email" id="email"
            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="email" placeholder="Masukan email..." required>
        </div>
        <div class="mb-6">
          <label for="password" class="inline-block mb-2 text-sm font-medium text-white">Kata Sandi</label>
          <input type="password" id="password"
            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="password" placeholder="Masukan kata sandi..." required>
        </div>

        <input type="submit" name="register" value="Registrasi"
          class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 cursor-pointer">
        <span class="inline-block w-full text-white">
          Sudah punya akun? <a href="login.php" class="underline">Login</a>
        </span>
      </form>
    </div>
  </div>
</body>

</html>
