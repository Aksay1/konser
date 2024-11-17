<?php
// Pastikan file ini berada di direktori server Anda dan dapat diakses

// Load autoload.php dari Midtrans SDK jika Anda menggunakannya
require_once 'vendor/autoload.php';

// Set konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'SB-Mid-server-YV_tRbulfIa7__SPvFzp3oyq';
\Midtrans\Config::$isProduction = false; // Ganti dengan true untuk produksi
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Ambil data dari permintaan klien (misalnya, dari fetch)
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

// Persiapkan parameter transaksi
$transaction_details = array(
    'order_id' => uniqid('order-'), // Buat ID pesanan unik
    'gross_amount' => $data['amount'] // Jumlah total transaksi
);

$item_details = array(
    array(
        'id' => 'item1',
        'price' => $data['ticket_price'],
        'quantity' => $data['ticket_amount'],
        'name' => $data['event_name']
    )
);

$customer_details = array(
    'first_name' => $data['organizer_name'],
    'email' => 'customer@example.com' // Sesuaikan dengan data pelanggan
);

// Buat array parameter yang dikirim ke Midtrans
$params = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
    'customer_details' => $customer_details
);

try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo json_encode(array('snapToken' => $snapToken));
} catch (Exception $e) {
    echo json_encode(array('error' => $e->getMessage()));
}
?>
