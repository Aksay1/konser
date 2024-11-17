<?php
// Memulai sesi
session_start();

// Koneksi ke database
include "koneksi.php";

// Cek apakah `event_id` ada di POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];
    $user_id = $_SESSION['user_id']; // Pastikan user_id ada di session

    // Query untuk menghapus item dari wishlist
    $query = "DELETE FROM wishlist WHERE event_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $event_id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect kembali ke halaman wishlist setelah penghapusan berhasil
        header("Location: wishlist.php");
        exit();
    } else {
        echo "Gagal menghapus item dari wishlist.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Data tidak valid.";
}

// Tutup koneksi
mysqli_close($conn);
?>
