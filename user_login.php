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

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());

$temp1;
$temp2;
if($row = mysqli_fetch_array($query))
{
 echo "Welcome ";
 $temp1=$row['emailid'];
 $temp2=$row['id'];
 echo "$temp1";
 echo "<br><br>";

 $query2 = mysqli_query($conn," select * from user,resv where user.id=resv.id AND  user.mobileno=$mobile ") or die(mysql_error());

echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

 while($row = mysqli_fetch_array($query2))
 {
  echo "<tr><td>".$row["pnr"]."</td><td>".$row["trainno"]."</td><td>".$row["doj"]."</td><td>".$row["tfare"]."</td><td>".$row["class"]."</td><td>".$row["nos"]."</td><td>".$row["status"]."</td></tr>";
 }

echo "</table>";

 if(mysqli_num_rows($query2) == 0)
 {
  echo "No Reservations Yet !!! <br><br> ";
 }
}

$_SESSION["id"]=$temp2;

//$rowcount=mysqli_num_rows($result);
if(mysqli_num_rows($query) == 0)
{
 echo "Wrong Combination!!! <br><br> ";
 echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";
 die();
}

?>

<form action="cancel.php" method="post">
Enter PNR for Cancellation: <input type="text" name="cancpnr" required><br><br>
<input type="submit" value="Cancel"><br><br>
</form>
<?php



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
