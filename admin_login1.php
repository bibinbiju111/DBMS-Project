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
    <div class="content-area admin-login">
    <div class="align center">
<?php 
session_start();
if($_POST["uid"]=='admin' AND $_POST["password"]=='admin' )
{
$_SESSION["admin_login"]=True;
}

if($_SESSION["admin_login"]==True)
{
echo " <br><a href=\"http://localhost/railway/insert_into_stations.php\"> Show All Stations </a><br> ";
echo " <br><a href=\"http://localhost/railway/show_trains.php\"> Show All Trains </a><br> ";
echo " <br><a href=\"http://localhost/railway/show_users.php\"> Show All Users </a><br> ";
echo " <br><a href=\"http://localhost/railway/insert_into_train_3.php\"> Enter New Train </a><br> ";
echo " <br><a href=\"http://localhost/railway/insert_into_classseats_3.php\"> Enter Train Schedule </a><br> ";
echo " <br><a href=\"http://localhost/railway/booked.php\"> View all booked tickets </a><br> ";
echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View all cancelled tickets </a><br> ";
//echo " <br><a href=\"http://localhost/railway/logout.php\"> Logout </a><br> ";
}
else 
{

echo "
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br>
Password: <input type=\"password\" name=\"password\" required><br>
<input type=\"submit\">
</form>
";
}


?>

</div>
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
