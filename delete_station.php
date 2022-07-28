<html>
<body style=" background-image: linear-gradient(190deg,rgb(230, 168, 76),rgb(235, 235, 100), rgb(84, 172, 239));
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$sql = "DELETE from station where id= ('".$_GET["id"]."')";
echo $_GET["id"];

if ($conn->query($sql) === TRUE) {
    echo " '".$_POST["sname"]."': Record deleted successfully";
} else {
    echo "Error:" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>


</body>
</html>
