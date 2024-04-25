<?php
session_start();
?>
<?php
if($_SESSION['permisje']!='staff' && $_SESSION['permisje']!='admin'){
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
</head>
<body>


<?php

    $id = $_POST['przepis'];

    $nazwa = $_POST["nazwa"];
    $skladniki = $_POST["składniki"];
    $przygotowanie = $_POST["przygotowanie"];


    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $database = "users";

    $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE przepisy SET nazwa = '$nazwa', składniki = '$skladniki', przygotowanie = '$przygotowanie' WHERE ID='$id'";


    if (mysqli_query($conn, $sql)) {
        header('Location: staff.php');
    } else {
      echo mysqli_error($conn);
    }


    mysqli_close($conn);

?>


</body>
</html>