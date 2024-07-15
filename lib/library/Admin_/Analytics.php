
<?php
session_start();
include 'partials/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Analytics</title>
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
<div class="sidebar" id="sidebar" style="margin-top: 80px">

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu" >

            <ul>
                <li><a href="Analytics.php" class="active"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                <li><a href="student.php"><i class="fa-solid fa-users"></i><span>Students Information</span></a></li>
                <li><a href="booking.php" class=""><i class="fa-solid fa-calendar-days"></i><span>Study Room Reservation</span></a></li>
                <li><a href="issue_info.php"><i class="fa-solid fa-book"></i></i><span>Borrowed Books</span></a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i><span>Profile</span></a></li>
            </ul>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>


<div class="page-wrapper">
    <div class="content" style="margin-top: -50px">
        <?php
        // Total students
        $fetch_students_query = mysqli_query($conn, "SELECT COUNT(*) AS total_students FROM student");
        $total_students = mysqli_fetch_assoc($fetch_students_query)['total_students'];

        // Borrowed books
        $fetch_borrowed_books_query = mysqli_query($conn, "SELECT COUNT(*) AS total_borrowed_books FROM issue_book WHERE approve = 'Yes'");
        $total_borrowed_books = mysqli_fetch_assoc($fetch_borrowed_books_query)['total_borrowed_books'];

        // Hours Reserved
        $fetch_hours_reserved_query = mysqli_query($conn, "SELECT COUNT(*) * 2 AS total_hours_reserved FROM booking WHERE booking_status = 2");
        $total_hours_reserved = mysqli_fetch_assoc($fetch_hours_reserved_query)['total_hours_reserved'];
        ?>

        <!-- Overview Section -->
        <h2 class="section-head">Overview</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa-solid fa-book-open"></i></span>
                    <div class="dash-widget-info text-right">
                        <h4>Total books</h4>
                        <?php
                        $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total_books FROM books");
                        $total_books = mysqli_fetch_assoc($fetch_query)['total_books'];
                        ?>
                        <h3><?php echo $total_books; ?></h3>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fa-solid fa-user-group"></i></span>
                    <div class="dash-widget-info text-right">
                        <h4>Total students</h4>
                        <h3><?php echo $total_students; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa-solid fa-book-open-reader"></i></span>
                    <div class="dash-widget-info text-right">
                        <h4>Borrowed books</h4>
                        <h3><?php echo $total_borrowed_books; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fa-solid fa-clock"></i></span>
                    <div class="dash-widget-info text-right">
                        <h4>Hours Reserved</h4>
                        <h3><?php echo $total_hours_reserved; ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing Study Room Reservation Section -->
        <h2 class="section-head">Study Room Reservation</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa-sharp fa-solid fa-square-poll-vertical"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking");
                    $booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $booking[0]; ?></h3>
                        <span class="widget-title1">All Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fa-regular fa-calendar-days"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE DATE(created_at) = CURDATE()");
                    $today_booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $today_booking[0]; ?></h3>
                        <span class="widget-title4">Today Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa-regular fa-calendar-days"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE DATE(created_at) = CURDATE() - 1");
                    $yesterday_booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $yesterday_booking[0]; ?></h3>
                        <span class="widget-title3">Yesterday Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa-solid fa-calendar-week"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE WEEK(DATE(created_at)) = WEEK(NOW())");
                    $week_booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $week_booking[0]; ?></h3>
                        <span class="widget-title3">Last Week Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fa-solid fa-check"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE booking_status = 1");
                    $accept_booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $accept_booking[0]; ?></h3>
                        <span class="widget-title2">Accepted Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-bg5"><i class="fa fa-close" aria-hidden="true"></i></span>
                    <?php
                    $fetch_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE booking_status = 2");
                    $cancel_booking = mysqli_fetch_row($fetch_query);
                    ?>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo $cancel_booking[0]; ?></h3>
                        <span class="widget-title5">Cancelled Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title d-inline-block"><strong> Booking Details</strong></h1>
                        <a href="booking.php" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Booking No.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Room Type</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM booking ORDER BY created_at DESC LIMIT 5";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $Id = $row['id'];
                                    $booking_id = $row['booking_id'];
                                    $name = $row['name'];
                                    $mobile = $row['mobile'];
                                    $room_type = $row['room_type'];
                                    $booking_status = $row['booking_status'];
                                    if ($booking_status == 0) {
                                        $bookStatus = "<span class='badge badge-primary'>New Booking</span>";
                                    } elseif ($booking_status == 1) {
                                        $bookStatus = "<span class='badge badge-success'>Confirmed</span>";
                                    } else {
                                        $bookStatus = "<span class='badge badge-danger'>Rejected</span>";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $Id; ?></td>
                                        <td><?php echo $booking_id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $mobile; ?></td>
                                        <td><?php echo $room_type; ?></td>
                                        <td><?php echo $bookStatus; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>