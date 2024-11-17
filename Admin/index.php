<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 180px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }
        .sidebar-header {
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
            color: #f3b972;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #444;
        }
        .content {
            margin-left: 180px;
            padding: 20px;
        }
        .navbar {
            margin-left: 250px;
            background-color: #333;
            color: white;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-action {
            margin: 0 5px;
        }
        .event-poster {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>GigSeats</h2>
        </div>
        <a href="index.php?page=home"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#users"><i class="fas fa-users"></i> Users</a>
        <a href="#payments"><i class="fas fa-dollar-sign"></i> Payments</a>
        <a href="index.php?page=admin_event"><i class="fas fa-calendar-alt"></i> Events</a>
        <a href="#settings"><i class="fas fa-cogs"></i> Settings</a>
        <a href="index.php?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

     <!-- Konten -->
     <?php
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
	switch ($page) {
		case 'home' :
			include "home.php";
			break;
			case 'admin' :
				include "admin.php";
				break;
				case 'admin_event' :
					include "admin_event.php";
					break;
                    case 'logout' :
                        include "logout.php";
                        break;
			default:
			echo"halaman tidak ditemukan";
			break;
	}
	?>
    
</body>
</html>