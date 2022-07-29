
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

$cdquery="SELECT id,sname FROM station";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Id</td>\t\t<td>Station</td><td></td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdId=$cdrow['id'];$cdTitle=$cdrow['sname'];
	echo "
<tr><td>$cdId</td>\t\t<td>$cdTitle</td>\t\t<td><a href=\"http://localhost/railway/edit_station.php?id=".$cdId."\"><button>Edit</button></a></td>\t\t<td><a href=\"http://localhost/railway/delete_station.php?id=".$cdId."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

?>
<br>
<span><form action="insert_into_station.php" method="post">
Add Station : <input type="text" name="sname" placeholder=" New Station" required>
<input type="submit" value="Add"></span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
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
