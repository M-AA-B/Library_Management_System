

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

<?php
$bookid = $_GET['bookDetails'];
$bookdetailSql = "SELECT * FROM `booking` where booking_id='$bookid'";
$bookdetailsResult = mysqli_query($conn, $bookdetailSql);
$bookdetailsRow = mysqli_fetch_assoc($bookdetailsResult);
$bookingid = $bookdetailsRow['booking_id'];
$name = $bookdetailsRow['name'];
$email = $bookdetailsRow['emailid'];
$mobile = $bookdetailsRow['mobile'];
$room_type = $bookdetailsRow['room_type'];
$booking_date = $bookdetailsRow['booking_date'];
$booking_time = date('h:i a', strtotime($bookdetailsRow['booking_time']));
$booking_status = $bookdetailsRow['booking_status'];
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

?>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Booking Details</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="zctb" class="table table-striped table-bordered no-wrap"><tbody>
                        <tr>
                            <td colspan="8"><b>Date & Time of Registration : <?php echo $bookdetailsRow['created_at'];?></b></td>

                        </tr>

                        <tr>
                            <td><b>Booking Number :</b></td>
                            <td><?php echo $bookingid;?></td>
                            <td><b>Full Name :</b></td>
                            <td><?php echo $name; ?></td>
                            <td><b>Email Address :</b></td>
                            <td><?php echo $email;?></td>
                            <td><b>Contact Number :</b></td>
                            <td><?php echo $mobile;?></td>
                            <td><b>Room Type :</b></td>
                            <td><?php echo $room_type;?></td>
                        </tr>


                        <tr>


                            <td><b>Booking Date :</b></td>
                            <td><?php echo $booking_date;?></td>
                            <td><b>Booking Time :</b></td>
                            <td><?php echo $booking_time;?></td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Status :
                                    <?php
                                    echo $bookStatus;    ?></b>

                            </td>
                            <?php
                            $remarkSql = "SELECT * FROM `booking_status` where booking_id='$bookid'";
                            $remarkResult = mysqli_query($conn, $remarkSql);
                            $remarkRow = mysqli_fetch_assoc($remarkResult);
                            if($remarkRow>0){
                                if($remarkRow['booking_status']==1){
                                    ?>
                                    <td colspan="2"><b>Remarks :
                                            <?php
                                            echo $remarkRow['remarks'];?></b></td>
                                <?php }
                                else
                                {?>
                                    <td colspan="4"><b>Remarks :
                                            <?php
                                            echo $remarkRow['remarks'];?></b></td>
                                <?php   }
                            }?>

                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if($booking_status == 0){?>
                <center><button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#bookingStatus" class="btn btn-success">Action</button></center>
            <?php } ?>
        </div>
    </div>
<?php
include 'partials/_bookingStatusModal.php';

?>
<div class="sidebar-overlay" data-reff=""></div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" ></script>
<!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>
