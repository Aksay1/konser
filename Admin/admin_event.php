<?php
//session_start();
include '../koneksi.php';

// Handle Edit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = $id");
    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error fetching user: " . mysqli_error($conn) . "</div>";
    }
}



// Handle Update Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $organizer_name = mysqli_real_escape_string($conn, $_POST['organizer_name']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $ticket_quantity = intval($_POST['ticket_quantity']);
    $ticket_price = intval($_POST['ticket_price']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "UPDATE tb_event SET event_name='$event_name', organizer_name='$organizer_name', event_date='$event_date', 
            event_time='$event_time', ticket_quantity=$ticket_quantity, ticket_price=$ticket_price, location='$location', 
            description='$description' WHERE event_id=$event_id";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?page=admin_event');
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error updating event: " . mysqli_error($conn) . "</div>";
    }
}

// Handle Delete Event
if (isset($_GET['delete_event'])) {
    $event_id = intval($_GET['delete_event']);
    $sql = "DELETE FROM tb_event WHERE event_id=$event_id";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?page=admin_event');
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting event: " . mysqli_error($conn) . "</div>";
    }
}

// Query untuk mengambil semua event
$event_result = mysqli_query($conn, "SELECT * FROM tb_event");
if (!$event_result) {
    echo "<div class='alert alert-danger' role='alert'>Error saat mengambil event: " . mysqli_error($conn) . "</div>";
}


?>



    <!-- List Event -->
    <div class="content">
        <div class="container mt-4">
            <h2 class="mb-4"><i class="fas fa-calendar-alt"></i> List Event</h2>
            <div class="row">
                <?php if ($event_result && mysqli_num_rows($event_result) > 0): ?>
                    <?php while ($event = mysqli_fetch_assoc($event_result)): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="../uploads/<?php echo $event['event_poster']; ?>" class="card-img-top event-poster" alt="Poster Event">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $event['event_name']; ?></h5>
                                    <p class="card-text"><strong>Organizer:</strong> <?php echo $event['organizer_name']; ?></p>
                                    <p class="card-text"><strong>Tanggal:</strong> <?php echo $event['event_date']; ?></p>
                                    <p class="card-text"><strong>Waktu:</strong> <?php echo $event['event_time']; ?></p>
                                    <p class="card-text"><strong>Tiket Tersedia:</strong> <?php echo $event['ticket_quantity']; ?></p>
                                    <p class="card-text"><strong>Harga:</strong> IDR <?php echo number_format($event['ticket_price'], 0, ',', '.'); ?></p>
                                    <p class="card-text"><strong>Lokasi:</strong> <?php echo $event['location']; ?></p>
                                    <p class="card-text"><strong>Deskripsi:</strong> <?php echo $event['description']; ?></p>
                                </div>
                                <div class="card-footer text-center">
                                    <!-- Tombol Edit -->
                                    <a href="#" class="btn btn-primary btn-action" data-toggle="modal" data-target="#editEventModal" 
                                       data-id="<?php echo $event['event_id']; ?>"
                                       data-name="<?php echo $event['event_name']; ?>"
                                       data-organizer="<?php echo $event['organizer_name']; ?>"
                                       data-date="<?php echo $event['event_date']; ?>"
                                       data-time="<?php echo $event['event_time']; ?>"
                                       data-ticket-quantity="<?php echo $event['ticket_quantity']; ?>"
                                       data-ticket-price="<?php echo $event['ticket_price']; ?>"
                                       data-location="<?php echo $event['location']; ?>"
                                       data-description="<?php echo $event['description']; ?>">
                                       Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <a href="?delete_event=<?php echo $event['event_id']; ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin ingin menghapus event ini?');">Hapus</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">Tidak ada event ditemukan</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal Edit Event -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editEventForm" method="POST" action="">
                        <input type="hidden" name="event_id" id="event_id">
                        <div class="form-group">
                            <label for="event_name">Nama Event</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="organizer_name">Nama Organizer</label>
                            <input type="text" class="form-control" id="organizer_name" name="organizer_name" required>
                        </div>
                        <div class="form-group">
                            <label for="event_date">Tanggal Event</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="event_time">Waktu Event</label>
                            <input type="time" class="form-control" id="event_time" name="event_time" required>
                        </div>
                        <div class="form-group">
                            <label for="ticket_quantity">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="ticket_quantity" name="ticket_quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="ticket_price">Harga Tiket</label>
                            <input type="number" class="form-control" id="ticket_price" name="ticket_price" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#editEventModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var organizer = button.data('organizer');
            var date = button.data('date');
            var time = button.data('time');
            var ticketQuantity = button.data('ticket-quantity');
            var ticketPrice = button.data('ticket-price');
            var location = button.data('location');
            var description = button.data('description');

            var modal = $(this);
            modal.find('#event_id').val(id);
            modal.find('#event_name').val(name);
            modal.find('#organizer_name').val(organizer);
            modal.find('#event_date').val(date);
            modal.find('#event_time').val(time);
            modal.find('#ticket_quantity').val(ticketQuantity);
            modal.find('#ticket_price').val(ticketPrice);
            modal.find('#location').val(location);
            modal.find('#description').val(description);
        });
    </script>
