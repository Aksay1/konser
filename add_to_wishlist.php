<?php
// Koneksi database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $event_id = $_POST['event_id'];

    // Periksa apakah user_id dan event_id tidak kosong
    if (empty($user_id) || empty($event_id)) {
        echo "User ID dan Event ID tidak boleh kosong.";
        exit;
    }

    // Persiapkan statement SQL untuk menghindari SQL injection
    $stmt = $conn->prepare("INSERT INTO wishlist (user_id, event_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $event_id);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        header("Location: user.php?message=Acara telah ditambahkan ke wishlist!"); // Ganti dengan halaman yang sesuai
        exit;
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
