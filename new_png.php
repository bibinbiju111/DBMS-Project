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

$pname=$_POST["pname"];
$page=$_POST["page"];
$pgender=$_POST["pgender"];

$tno=$_SESSION["tno"];
$doj=$_SESSION["doj"];
$sp=$_SESSION["sp"];
$dp=$_SESSION["dp"];
$class=$_SESSION["class"];
//echo "$tno $doj $class";

$query=" SELECT fare FROM classseats WHERE trainno='".$tno."' AND class='".$class."' AND doj='".$doj."' AND sp='".$sp."' AND dp='".$dp."'  ";
$result=mysqli_query($conn,$query) or die(mysql_error());

$row=mysqli_fetch_array($result);
$fare=$row[0];
//echo "$fare";
$tempfare=0;
$temp=0;

for($i=0;$i<$_SESSION["nos"];$i++) 
{
 if($page[$i]>=18)
 {
  $temp++;
  $tempfare+=$fare;
 }
 else if($page[$i]<18)
  $tempfare+=0.5*$fare;
 else if($page[$i]>=60)
  $tempfare+=0.5*$fare;
}
//echo "   $tempfare";

if($temp==0)
{
 echo "<br><br>Atleast one adult must accompany!!!";
 echo "<br><br><a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a> <br>";
 die();
}

echo "Total fare is Rs.".$tempfare."/-";

$sql = "INSERT INTO resv(id,trainno,sp,dp,doj,tfare,class,nos) VALUES ('".$_SESSION["id"]."','".$_SESSION["tno"]."','".$_SESSION["sp"]."','".$_SESSION["dp"]."','".$_SESSION["doj"]."','".$tempfare."','".$_SESSION["class"]."','".$_SESSION["nos"]."' )";

if ($conn->query($sql) === TRUE) 
{
 echo "<br><br>Reservation Successful";
} 
else 
{
 echo "<br><br>Error: " . $conn->error;
}

$tid=$_SESSION["id"];
$ttno=$_SESSION["tno"];
$tdoj=$_SESSION["doj"];

$query=" Select pnr from resv where id='".$tid."' AND trainno='".$ttno."' AND doj='".$tdoj."' ";
$result=mysqli_query($conn,$query) or die(mysql_error());

//echo "HI,here's your ticket details";
//print_r($result);

$row=mysqli_fetch_array($result);
$rpnr=$row['pnr'];
//echo " $rpnr ";

$tpname=$_POST['pname'];
//$ntpname = count($_REQUEST['pname']);
$tpage=$_POST["page"];
$tpgender=$_POST["pgender"];

for($i=0;$i<$_SESSION["nos"];$i++) 
{
$sql = "INSERT INTO pd(pnr,pname,page,pgender) VALUES  ('".$rpnr."','".$tpname[$i]."','".$tpage[$i]."','".$tpgender[$i]."')";

if ($conn->query($sql) === TRUE) 
{
 echo "<br><br>Passenger details added!!!";
} 
else 
{
 echo "<br><br>Error: " . $conn->error;
}

//echo "Enter Passanger Name: <input type='text' name='pname[]' required> ";
//echo "Enter Passanger Age: <input type='text' name='page[]' required>";
//echo "Enter Passanger Gender: <input type='text' name='pgender[]' required> <br> ";
}

echo "<br><br><a href=\"http://localhost/railway/index.htm\">Go Back!!!</a> <br>";

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
