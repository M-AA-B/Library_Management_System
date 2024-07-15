<?php
session_start();
require_once 'partials/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Booking Details</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<div class="container-xxl bg-white p-0">
    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <div class="navbar navbar-expand-lg  px-4 px-lg-5 py-3 py-lg-0">
            <div class="navbar-header">
                <a href="index.php"><img src="images/logo1.png" style="height: 40px; margin-top: -40px; margin-left: -40px; "></a>
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">

                    <ul class="nav navbar-nav" style="margin-top: 20px;">
                        <ul  class="nav navbar-nav" style="display: flex; align-items: flex-start;color: #891635">
                            <li><a href="index.php">HOME</a></li>
                            <li style="margin-left: 50px"><a href="books.php">BOOKS</a></li>
                            <li style="margin-left: 50px;"><a href="feedback.php">FEEDBACK</a></li>
                        </ul>
                        <?php
                        if(isset($_SESSION['login_user']))
                        {
                            ?>
                            <ul class="nav navbar-nav">
                                <li style="margin-left: 50px;"><a href="profile.php">PROFILE</a></li>
                                <li style="margin-left: 50px;"><a href="fine.php">FINES</a></li>
                                <li style="margin-left: 50px;margin-right: 150px;"><a href="booking.php">STUDY ROOMS</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: flex-start;">
                                <li><a href="profile.php">
                                        <div style="color: black;margin-top: -5px; margin-left: 140px">
                                            <?php
                                            echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                                            echo " ".$_SESSION['login_user'];
                                            ?>
                                        </div>
                                    </a></li>
                                <li style="margin-left: 20px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                            </ul>
                            <?php
                        }
                        else
                        {   ?>
                            <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: flex-start;">
                                <li style="margin-left: 600px;"><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </ul>
                    <div style="display: flex;margin-left: 250px;margin-top:50px ; align-items: center; justify-content: center;">


                    </div>

            </nav>

        </div>
        <div style="background-color: #891635; height: 10px;margin-top: -50px"></div>




        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </div>



    <div class="sidebar" id="sidebar"  style="margin-top: 50px">

        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu" >

                <ul>
                    <li><a href="Analytics.php" class="active"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                    <li><a href="student.php"><i class="fa-solid fa-users"></i><span>Members</span></a></li>
                    <li><a href="booking.php" class=""><i class="fa-solid fa-calendar-days"></i><span>Study Room Reservation</span></a></li>
                    <li><a href="issue_info.php"><i class="fa-solid fa-book"></i></i><span>Borrowed Books</span></a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-gear"></i><span>Profile</span></a></li>
                </ul>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>

    <div class="page-wrapper">
        <div class="content"style="margin-top: -50px">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Booking Details</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="datatable table table-striped">
                    <thead>
                    <tr>
                        <th>Booking No.</th>
                        <th>Name</th>
                        <th>Phone No.</th>
                        <th>Room Type</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM `booking` order by created_at desc";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $bookingId = $row['booking_id'];
                        $name = $row['name'];
                        $mobile = $row['mobile'];
                        $room_type = $row['room_type'];
                        $booking_date = $row['booking_date'];
                        $booking_time = date('h:i a', strtotime($row['booking_time']));
                        $booking_status = $row['booking_status'];
                        if($booking_status == 0) {
                            $bookStatus = "<span class='badge badge-primary'>New Booking</span>";
                        }
                        else if($booking_status == 1){
                            $bookStatus = "<span class='badge badge-success'>Confirmed</span>";
                        }
                        else
                        {
                            $bookStatus = "<span class='badge badge-danger'>Rejected</span>";
                        }

                        $counter++;

                        echo '<tr>
                                <td>' . $bookingId . '</td>
                                <td>' . $name . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $room_type . '</td>
                                <td>' . $booking_date . '</td>
                                <td>' . $booking_time . '</td>
                                <td>' . $bookStatus . '</td>
                                <td><div class="row mx-auto" style="width:127px"><a class="btn btn-sm btn-success" href="view-details.php?bookDetails='.$bookingId.'">View</a>
                                <form action="partials/_bookingStatusModal.php" method="POST">
                                                <button name="removeBooking" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                <input type="hidden" name="bookId" value="'.$bookingId. '">
                                            </form></div>
                                </td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Received any Request!	</div>';</script> <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include 'partials/_bookingStatusModal.php';
    ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .tooltip.show {
            top: -62px !important;
        }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }
        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
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
            background: #4b5366;
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
            /* background-color: #fcfcfc; */
        }
        table.table-striped.table-hover tbody tr:hover {
            /* background: #f5f5f5; */
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td a {
            /*        font-weight: bold;*/
            /*        color: #566787;*/
            display: inline-block;
            text-decoration: none;
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

        .count:before {
            counter-increment: section;
            content: counter(section);
        }


    </style>
</body>
</html>