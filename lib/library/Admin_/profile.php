<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style type="text/css">
        .wrapper
        {
            width: 300px;
            margin: 0 auto;
            color: white;
        }
    </style>
</head>
<body style="background-color: White; ">
<div class="container">
    <form action="" method="post">
        <button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
    </form>
    <div class="wrapper">
        <?php
        if(isset($_POST['submit1']))
        {
            ?>
            <script type="text/javascript">
                window.location="edit.php";
            </script>
            <?php
        }
        // Ensure $_SESSION['pic'] is set before trying to display the image
        if(isset($_SESSION['pic'])) {
            $q = mysqli_query($db, "SELECT * FROM admin WHERE username='$_SESSION[login_user]'");
            $row = mysqli_fetch_assoc($q);
            echo "<h2 style='text-align: center;'>My Profile</h2>";
            echo "<div style='text-align: center'>
							<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
						</div>";
            echo "<div style='text-align: center; color: Black;'> <b>Welcome, </b>
							<h4>".$_SESSION['login_user']."</h4>
						</div>";
            echo "<b>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<td>";
            echo "<b> First Name: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['first'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<b> Last Name: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['last'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<b> User Name: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['username'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<b> Password: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['password'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<b> Email: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['email'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<b> Contact: </b>";
            echo "</td>";
            echo "<td>";
            echo $row['contact'];
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</b>";
        } else {
            echo "Profile picture not found.";
        }
        ?>
    </div>
</div>
</body>
</html>
