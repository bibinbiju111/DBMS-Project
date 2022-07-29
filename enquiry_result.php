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
    <div class="enquiry-result-wrap align-center">

<?php 

session_start();

require "db.php";

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";

$query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.trainno=c.trainno AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");

echo "<table><thead><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Train_Class</td><td>Fare</td><td>Seats_Left</td></thead>";

while($row = mysqli_fetch_array($query))
{
 echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
}
echo "</table>";

//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such train <br><br> ";

}
?>

If you wish to proceed with booking fill in the following details:<br><br>
<form action="resvn.php" method="post">
Registered Mobile No: <input type="text" name="mno" required><br><br>
Password: <input type="password" name="password" required><br><br>
Enter Train No: <input type="text" name="tno" required><br><br>
Enter Class: <input type="text" name="class" required><br><br>
No. of Seats: <input type="text" name="nos" required><br><br>
<input type="submit" value="Proceed with Booking" class="btn"><br><br>
</form><br><br>

<?php

echo " <a class=\"btn-link\" href=\"http://localhost/railway/enquiry.php\">More Enquiry</a> <br>";

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

