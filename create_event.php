<?php
// Contoh cara membuat snapToken menggunakan Midtrans
require_once 'vendor/midtrans/midtrans-php/Midtrans.php';

\Midtrans\Config::$serverKey = 'SB-Mid-server-YV_tRbulfIa7__SPvFzp3oyq';
\Midtrans\Config::$isProduction = false; // Gunakan false untuk sandbox

// Data transaksi yang dikirim ke Midtrans
$transaction_details = array(
    'order_id' => 'order-12345',
    'gross_amount' => 50000, // Contoh jumlah yang harus dibayar
);

$item_details = array(
    array(
        'id' => 'item1',
        'price' => 50000,
        'quantity' => 1,
        'name' => 'Event Example',
    ),
);

// Data pelanggan
$customer_details = array(
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'johndoe@example.com',
    'phone' => '081234567890',
);

$transaction_data = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
    'customer_details' => $customer_details,
);

try {
    // Dapatkan snapToken
    $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
} catch (Exception $e) {
    echo 'Error generating snapToken: ' . $e->getMessage();
    exit;
}

// Kirim snapToken ke JavaScript



?>

<!-- HTML Form for Event Creation -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <div class="title">
                            <h4>Create Your Event</h4>
                            <h3>Fill out the details below</h3>
                        </div>
                        <form class="form" method="post" action="create_event.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Event Name<span>*</span></label>
                                        <input name="name" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Organizer Name<span>*</span></label>
                                        <input name="company_name" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Event Date<span>*</span></label>
                                        <input name="date" type="date" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Event Hour<span>*</span></label>
                                        <input name="time" type="time" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Ticket Quantity<span>*</span></label>
                                        <input id="ticketAmount" name="ticket_amount" type="number" min="1" placeholder="Enter the number of available tickets" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Ticket Price<span>*</span></label>
                                        <input id="ticketPrice" name="ticket_price" type="number" min="0" placeholder="Enter the price per ticket" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Event Poster<span>*</span></label>
                                        <input name="photo" type="file" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Location<span>*</span></label>
                                        <input name="location" type="text" placeholder="Enter location" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Description Event<span>*</span></label>
                                        <textarea name="message" placeholder="" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Total Fee for Creating Event:</label>
                                        <table class="table">
                                            <tr>
                                                <td>Rp 50.000</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
									<button type="button" class="btn" id="pay-button">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Modal Midtrans -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-iNnAn0mWllTAloXv"></script>

<script>
document.getElementById('pay-button').addEventListener('click', function () {
    // Ambil snapToken dari PHP
    const snapToken = "<?php echo $snapToken ?? ''; ?>";  // Mengambil snapToken yang dihasilkan

    if (snapToken) {
        // Panggil Midtrans Snap untuk menampilkan modal pembayaran
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                alert('Pembayaran berhasil!');
                console.log(result);
            },
            onPending: function(result) {
                alert('Menunggu pembayaran!');
                console.log(result);
            },
            onError: function(result) {
                alert('Pembayaran gagal!');
                console.log(result);
            }
        });
    } else {
        alert("Terjadi kesalahan dalam pembayaran.");
    }
});
</script>
</html>
