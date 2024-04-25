<?php
session_start();

$login=$_POST['login'];

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn=mysqli_connect($host,$dbuser,$dbpass,$database);
$sql="UPDATE users SET upr='worker' WHERE login='$login';";

if(mysqli_query($conn,$sql)){
    header('Location: adminpanel.php');
}else{
    header('Location: upr.php');
}

mysqli_close($conn);
?>