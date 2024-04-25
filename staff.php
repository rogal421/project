<?php
session_start();
?>

<?php
if($_SESSION['permisje']!='staff'){
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/stylestaff.css">
    <title>Panel pracownika</title>
</head>
<body>
  <div class="baner">
    <a style="color:white; text-decoration:none" href='/session/index.php'>Strona główna</a>
    <b>Panel pracownika</b>
    <a style="color:white; text-decoration:none" href='/session/edit.php'>Edytuj przepisy</a>
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
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "users";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

 if(!$conn){
 echo mysqli_connect_error($conn);
 }

$sql="SELECT * FROM przepisy";

$result = mysqli_query($conn, $sql);


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
    }


if (mysqli_num_rows($result) > 0){

    for($i=0;$i<mysqli_num_rows($result);$i++){

    $row = mysqli_fetch_assoc($result);
    echo "<div class='przepisyworker' id='przepisy'>" . $row['nazwa'] . "

    <form action='delete.php' method='post'>
    <input type='hidden' value=".$row['ID']." name='przepis'>
    <input type='submit' value='usuń przepis'>
    </form> </div> </br>";
   }

  }

?>
</body>
</html>