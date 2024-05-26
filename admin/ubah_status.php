<?php
require '../models/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("si", $status, $order_id);

    if ($stmt->execute()) {
        header("Location: dataorder.php");
        exit();
    } else {
        echo "Error updating status: " . $koneksi->error;
    }
}
?>
