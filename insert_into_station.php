<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAILWAY SYSTEM</title>
    <link rel="stylesheet" href="http://localhost/railway/style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="http://localhost/railway/index.htm">
            <img src="http://localhost/railway/images/logo.png" alt="Logo" class="logo">
        </a>
        <nav class="menu">
            <ul>
                <li>
                    <a href="http://localhost/railway/new_user_form.html">New User</a>
                </li>
                <li>
                    <a href="http://localhost/railway/enquiry.php" >Enquiry and Ticket Booking </a>
                </li>
                <li>
                    <a href="http://localhost/railway/user_login.htm">Ticket History OR Cancellation</a>
                </li>
                <li>
                    <a href="http://localhost/railway/admin_login.php">Admin Login</a>
                </li>
            </ul>
        </nav>
    </header>
<div class="content-area">
<?php

require "db.php";

$sql = "INSERT INTO station(sname) VALUES ('".$_POST["sname"]."')";

if ($conn->query($sql) === TRUE) {
    echo " '".$_POST["sname"]."':New record created successfully";
} else {
    echo "Error:" . $conn->error;
}


$conn->close();
?>
</div>
<footer class="footer">
        <p>All rights reserved</p>
        <div class="social-media">
            <a href="https://www.facebook.com/IRCTCofficial/" target="_blank" class="social-icon"><i class='bx bxl-facebook'></i></a>
            <a href="https://instagram.com/irctc.official" target="_blank" class="social-icon"><i class='bx bxl-instagram' ></i></a>
            <a href="https://twitter.com/IRCTCofficial" target="_blank" class="social-icon"><i class='bx bxl-twitter' ></i></a>
        </div>

    </footer>
</body>
</html>
