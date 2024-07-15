<?php
include "connection.php";
include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            /* Add some padding for better readability */
            padding: 20px;
        }
        .wrapper {
            padding: 10px;
            margin: 20px auto;
            width: 900px;
            height: 600px;
            background-color: black;
            opacity: .8;
            color: white;
        }
        .form-control {
            height: 70px;
            width: 60%;
        }
        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <h4>If you have any suggestions or questions please comment below.</h4>
    <form style="" action="" method="post">
        <input class="form-control" type="text" name="comment" placeholder="Write something..."><br>
        <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
    </form>

    <br><br>
    <div class="scroll">
        <?php
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO `comments` VALUES('', '" . $_SESSION['login_user'] . "', '" . $_POST['comment'] . "');";
            if (mysqli_query($db, $sql)) {
                // Debug: Insertion successful
                echo "Comment added successfully.";
            } else {
                // Debug: Insertion failed
                echo "Error: " . mysqli_error($db);
            }
        }

        $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
        $res = mysqli_query($db, $q);

        // Debug: Check if query returns results
        if (mysqli_num_rows($res) > 0) {
            echo "<table class='table table-bordered'>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['comment'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Debug: No comments found
            echo "No comments found.";
        }
        ?>
    </div>
</div>

</body>
</html>
