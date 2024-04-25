<?php
session_start();

$id = $_POST['przepis'];

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "users";

$conn = mysqli_connect($host, $dbuser, $dbpass, $database);

if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM przepisy WHERE ID='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: staff.php');
} else {
  echo mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
session_start();

$id = $_POST['users'];

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "users";

$conn = mysqli_connect($host, $dbuser, $dbpass, $database);

if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM acc WHERE ID='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: admin.php');
} else {
  echo mysqli_error($conn);
}

mysqli_close($conn);
?>