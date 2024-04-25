<?php
session_start();
?>

<?php
if($_SESSION['permisje']!='admin'){
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/styleadmin.css">
    <title>ADMIN</title>
</head>
<body>

    <div class="baner">
    <a style="color:white; text-decoration:none" href='/session/index.php'>Strona główna</a>
    <b>Panel admina</b>
    <a style="color:white; text-decoration:none" href='/session/edit.php'>Edytuj przepisy</a>
  </div>

    <form action="" method="post">
    <input type="text" name="nazwa" id="nazwa" placeholder="nazwa dania:">
    <input type="text" name="składniki" id="składniki" placeholder="potrzebne składniki:">
    <input type="text" name="przygotowanie" id="przygotowanie" placeholder="przygotowanie dania:">
    <input type="submit" value="dodaj">
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

<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "users";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

 if(!$conn){
 echo mysqli_connect_error($conn);
 }

$sql="SELECT * FROM acc WHERE permisje !='admin'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){

    for($i=0;$i<mysqli_num_rows($result);$i++){

    $row = mysqli_fetch_assoc($result);
    $permisje = $row['permisje'];
    $login = $row['login'];
    echo "<div class='users'>" . $row['login'] . " " . $row['permisje'] . " 

    <form action='delete.php' method='post'>
    <input type='hidden' value=".$row['id']." name='users'>
    <input type='submit' value='usuń użytkownika'>
    </form> </div>";

    if($permisje=="user"){
      echo '<form action="uprworker.php" method="post">
      <input type="hidden" value="'.$login.'" name="login">
      <input type="submit" value="zmień na pracownika">
      </form>';
    }else if($permisje=="staff"){
      echo '<form action="upruser.php" method="post">
      <input type="hidden" value="'.$login.'" name="login">
      <input type="submit" value="zmień na użytkownika">
      </form>';
    };

   }
}
 

?>
</body>
</html>