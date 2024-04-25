<?php
session_start();
?>

<?php
if($_SESSION['permisje']!='user'){
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/styleuser.css">
    <title>Dodaj przepis</title>
</head>
<body>
    <div class="baner">
        <b>Dodawanie przepisu</b>
    <a style="color:white; text-decoration:none" href='/session/index.php'>Strona główna</a>
</div>
    <div class="input">
    <form action="" method="post">
    <h1>Dodaj przepis</h1>
    <div class="nameinp">
        Nazwa dania:
    <input type="text" name="nazwa" id="nazwa" style="height: 20px; width: 250px;">
    </div>
        <div class="skladinp">
        Skład:
    <input type="text" name="składniki" id="składniki" style="height: 20px; width: 250px;">
    </div>
        <div class="przyginp">
            Przygotowanie:
    <input type="text" name="przygotowanie" id="przygotowanie" style="height: 20px; width: 250px;">
    </div>
        <div class="submitinp">
    <input type="submit" value="Dodaj" id="dodaj" style="height: 30px; width: 258px;">
    </div>
</form>

<?php

if(isset($_POST["nazwa"]) && isset($_POST["składniki"]) && isset($_POST["przygotowanie"])){

    $nazwa = $_POST["nazwa"];
    $skladniki = $_POST["składniki"];
    $przygotowanie = $_POST["przygotowanie"];

    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $database = "users";

    $conn = mysqli_connect($host,$dbuser,$dbpass,$database);

     if(!$conn){
     echo mysqli_connect_error($conn);
     }

    $sql="INSERT INTO przepisy(nazwa, składniki, przygotowanie) VALUES ('$nazwa','$skladniki','$przygotowanie')";


    $query = mysqli_query($conn,$sql);

    if(!$conn){

    }

    if ($query) {
        echo "dodano";
        // header('Location: login.php');
      } else {
        mysqli_error($conn);
      }

      mysqli_close($conn);
}
?>
</body>
</html>