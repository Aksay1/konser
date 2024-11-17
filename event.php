
	<div class="container mt-5">
    <div class="row">
        <?php
        // Konfigurasi database
        $host = "localhost";
        $dbname = "db_gigseats";
        $username = "root";
        $password = "";

        // Buat koneksi ke database
        $conn = new mysqli($host, $username, $password, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Ambil data dari tabel tb_event
        $sql = "SELECT event_name, event_poster, ticket_price FROM tb_event"; // Sesuaikan dengan kolom yang ada di tabel
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data untuk setiap baris
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">'; // Menentukan ukuran kolom agar 4 kolom dalam satu baris
                echo '    <div class="single-product">';
                echo '        <div class="product-img">';
                echo '            <a href="product-details.html">';
                // Tambahkan path folder uploads sebelum nama file
                echo '                <img class="default-img" src="uploads/' . htmlspecialchars($row['event_poster']) . '" alt="' . htmlspecialchars($row['event_name']) . '">';
                echo '                <img class="hover-img" src="uploads/' . htmlspecialchars($row['event_poster']) . '" alt="' . htmlspecialchars($row['event_name']) . '">';
                echo '            </a>';
                echo '            <div class="button-head">';
                echo '                <div class="product-action">';
                echo '                    <a title="Detail" href="#"><i class="ti-eye"></i><span>Detail</span></a>';
                echo '                    <a title="Wishlist" href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>';
                echo '                </div>';
                echo '                <div class="product-action-2">';
                echo '                    <a title="Add to cart" href="#">Get The Ticket</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="product-content">';
                // Menggunakan event_name untuk nama acara
                echo '            <h3><a href="product-details.html">' . htmlspecialchars($row['event_name']) . '</a></h3>';
                echo '            <div class="product-price">';
                // Menggunakan ticket_price untuk harga
                echo '                <span>IDR ' . htmlspecialchars($row['ticket_price']) . '</span>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo "Tidak ada acara ditemukan.";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </div>
</div>

		
        <!-- Modal end -->
	
	