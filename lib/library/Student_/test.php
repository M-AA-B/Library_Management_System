<?php
include 'connection_booking.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Study Room Reservation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div class="container-xxl bg-white p-0">
    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">

            <div class="navbar-header">
                <a href="index.php"><img src="images/logo1.png" style="height: 40px; margin-top: -130px; margin-left: -40px; "></a>
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">

                    <ul class="nav navbar-nav" style="margin-top: 20px;">
                        <ul  class="nav navbar-nav" style="display: flex; align-items: flex-start;">
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
                                <li style="margin-left: 50px;margin-right: 150px;"><a href="study_room_booking.php">STUDY ROOMS</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: flex-start;">
                                <li><a href="profile.php">
                                        <div style="color: black">
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
                                <li style="margin-left: 420px;"><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                                <li style="margin-left: 50px;"><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </ul>
                    <div style="display: flex;margin-left: 250px;margin-top:50px ; align-items: center; justify-content: center;">
                        <div class="navbar-nav ms-auto py-0 pe-4">
                            <a href="#" class="nav-item nav-link check-status" data-dismiss="modal" data-toggle="modal" data-target="#statusModal">Check Status</a>
                        </div>
                        <a data-toggle="modal" data-target="#bookingModal" class="btn btn-primary py-2 px-4">Book A Room</a>
                    </div>
                </div>
            </nav>
        </div>



    </div>
    <!-- Navbar & Hero End -->
    <?php

    if(isset($_POST['submit'])){

        $booking_id = mt_rand(10000000,99999999);
        $name = $_POST['name'];
        $emailid = $_POST['email'];
        $mobile = $_POST['phone'];
        $room_type = $_POST['room_type'];
        $booking_date = date('Y-m-d', strtotime($_POST['bookingdate'])); // Get chosen date from form
        $booking_time = $_POST['bookingtime'];


        $insert_query = mysqli_query($connection, "INSERT INTO booking (booking_id, name, emailid, mobile, room_type, booking_date, booking_time ) VALUES ('$booking_id', '$name', '$emailid', '$mobile', '$room_type','$booking_date', '$booking_time')");        if($insert_query){
            echo '<script>alert("Your order sent successfully. Booking number is "+"'.$booking_id.'")</script>';
            echo "<script type='text/javascript'> document.location = 'study_room_booking.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
    ?>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #891635;">
                    <h5 class="modal-title" id="bookingModal">Room Booking Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <b><label for="name">Name:</label></b>
                            <input class="form-control" id="name" name="name" placeholder="Enter your Name" type="text" required>
                        </div>
                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                        </div>
                        <div class="form-group">
                            <b><label for="phone">Phone No:</label></b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+90</span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="form-label">Room Type</span>
                            <select id="room-type" class="form-control" required>
                                <option value="" selected hidden>Select room type</option>
                                <option>Red Room (1 to 3 People)</option>
                                <option>Blue Room (1 to 6 People)</option>
                                <option>Yellow Room(1 to 4 People)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <b><label for="bookingdate">Booking Date:</label></b>
                            <input type="date" class="form-control" name="bookingdate" placeholder="Choose Booking Date" min="<?php echo date("Y-m-d"); ?>" required>
                        </div>
                        <div class="form-group">
                            <b><label for="bookingtime">Booking Time:</label></b>
                            <select class="form-control" name="bookingtime" placeholder="Choose Booking Time" required>
                                <option value="" selected hidden>Select time</option>
                                <?php
                                $time_slots = [
                                    "08:30" => "8:30 AM - 10:30 AM",
                                    "10:30" => "10:30 AM - 12:30 PM",
                                    "12:30" => "12:30 PM - 2:30 PM",
                                    "14:30" => "2:30 PM - 4:30 PM",
                                    "16:30" => "4:30 PM - 6:30 PM",
                                    "18:30" => "6:30 PM - 8:30 PM",
                                    "20:30" => "8:30 PM - 10:30 PM"
                                ];

                                foreach ($time_slots as $time => $label) {
                                    // Check if the current date and time slot are booked
                                    $disabled = isset($existing_bookings[$booking_date][$time]) ? 'disabled' : '';
                                    echo "<option value='$time' $disabled>$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <center><button type="submit" name="submit" class="btn btn-success">Reserve a Room</button></center>
                    </form>
                    <center><p class="mb-0 mt-1">Booking Order Placed? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#statusModal">Check Status</a></p></center>
                </div>
            </div>
        </div>
    </div>

    <!-- Check Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #891635;">
                    <h5 class="modal-title" id="statusModal">Check Booking Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="status-details.php" method="post">
                        <div class="text-left my-2">
                            <b><label for="bookingid">Enter Booking Number:</label></b>
                            <input class="form-control" id="booking_no" name="booking_no" placeholder="Enter your Booking Number" type="text" required>
                        </div>
                        <br>
                        <center><button type="submit" name="statusDetails" class="btn btn-success">Check Status</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
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