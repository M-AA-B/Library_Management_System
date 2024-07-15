<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style type="text/css">
        .wrapper {
            width: 300px;
            margin: 0 auto;
            color: white;
        }
    </style>
</head>
<body style="background-color: white; ">
<div class="container">
    <form action="" method="post">
        <button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
    </form>
    <div class="wrapper">
        <?php

        if (isset($_POST['submit1'])) {
            ?>
            <script type="text/javascript">
                window.location = "edit.php"
            </script>
            <?php
        }
        $q = mysqli_query($db, "SELECT * FROM student where username='$_SESSION[login_user]' ;");
        ?>
        <h2 style="text-align: center;">My Profile</h2>

        <?php
        $row = mysqli_fetch_assoc($q);

        echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/" . $_SESSION['pic'] . "'>
 				</div>";
        ?>
        <div style="text-align: center; color:Black; "><b>Welcome, </b>
            <h4 style="color:#891635;">
                <?php echo $_SESSION['login_user']; ?>
            </h4>
        </div>
        <?php
        echo "<b>";
        echo "<table class='table table-bordered' >";
        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> First Name: </b>";
        echo "</td>";

        echo "<td style='color:#891635;'>";
        echo $row['first'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Last Name: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['last'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Username: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['username'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Password: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['password'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Student Number: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['roll'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Email: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['email'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='background-color:#891635;'>";
        echo "<b> Contact: </b>";
        echo "</td>";
        echo "<td style='color:#891635;'>";
        echo $row['contact'];
        echo "</td>";
        echo "</tr>";


        echo "</table>";
        echo "</b>";
        ?>
    </div>
</div>
</body>
</html>