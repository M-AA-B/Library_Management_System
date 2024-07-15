<?php
include "connection.php"; // Include the correct connection file
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>OTU Study Room Reservation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>
<style>
    .table-wrapper {
        background: #fff;
        width: 100%;

    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
        width: 100%;
    }
    .table-wrapper table.table tr th,
    .table-wrapper table.table tr td {
        border-color: #e9e9e9;
        padding: 5px 5px; /* Adjust padding */
        vertical-align: middle;
    }
    .table-wrapper table.table tr th:nth-child(5),
    .table-wrapper table.table tr th:nth-child(6),
    .table-wrapper table.table tr td:nth-child(6),
    .table-wrapper table.table tr th:nth-child(7),
    .table-wrapper table.table tr td:nth-child(7) {
        white-space: nowrap; /* Ensure content doesn't wrap */
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;

    }
    .table-title .btn {
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #891635;
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
        width: 100%;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }
</style>
<body>
<div class="container-xxl bg-white p-0" ">
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="table-wrapper" id="empty">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Booking <b>Details</b></h2>
                        </div>
                        <div class="col-sm-8">
                            <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>Booking No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Room Type</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['statusDetails'])) {
                            $booking_no = $_POST['booking_no'];
                            $fetch_details = mysqli_query($db, "SELECT * FROM booking WHERE booking_id='$booking_no'");
                            $fetch_row = mysqli_num_rows($fetch_details);
                            if ($fetch_row > 0) {
                                while ($row = mysqli_fetch_assoc($fetch_details)) {
                                    $booking_id = $row['booking_id'];
                                    $name = $row['name'];
                                    $emailid = $row['emailid'];
                                    $mobile = $row['mobile'];
                                    $room_type = $row['room_type']; // Ensure this matches your database column
                                    $booking_date = $row['booking_date'];
                                    $booking_time = date('h:i A', strtotime($row['booking_time']));
                                    $booking_status = $row['booking_status'];
                                    $tstatus = ($booking_status == 0) ? "Booking Order Placed." : (($booking_status == 1) ? "Booking Confirmed." : "Booking Cancelled.");

                                    echo '<tr>
                                        <td>' . $booking_id . '</td>
                                        <td>' . $name . '</td>
                                        <td>' . $emailid . '</td>
                                        <td>' . $mobile . '</td>
                                        <td>' . $room_type . '</td> <!-- Ensure this is correct -->
                                        <td>' . $booking_date . '</td>
                                        <td>' . $booking_time . ' - ' . date('h:i A', strtotime($row['booking_time'] . '+2 hours')) . '</td>
                                        <td>' . $tstatus . '</td>
                                    </tr>';
                                }
                            } else {
                                echo "<script>alert('Please enter valid booking number');
                                window.history.back(1);
                                </script>";
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
