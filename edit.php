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
    <link rel="stylesheet" type="text/css" href="style/styleedit.css">
    <title>Edit</title>
</head>
<body>

<div class="baner">
<a style="color:white; text-decoration:none" href='/session/index.php'>Strona główna</a>
<b>Edytowanie przepisów</b>
<?php
if($_SESSION['permisje']=='staff'){
    echo '<a style="color:white; text-decoration:none" href="/session/staff.php">Panel pracownika</a>';
}elseif($_SESSION['permisje']=='admin'){
    echo '<a style="color:white; text-decoration:none" href="/session/admin.php">Panel admina</a>';
};


?>

</div>
    
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

if (mysqli_num_rows($result) > 0){

    for($i=0;$i<mysqli_num_rows($result);$i++){

    $row = mysqli_fetch_assoc($result);
    echo "<div class='przepisyworker' id='przepisy'>" . $row['nazwa'] . "

    <form action='edit2.php' method='post'>
    <input type='hidden' value=".$row['ID']." name='przepis'>
    <input type='text' name='nazwa' id='nazwa' placeholder='nazwa dania:'>
    <input type='text' name='składniki' id='składniki' placeholder='potrzebne składniki:'>
    <input type='text' name='przygotowanie' id='przygotowanie' placeholder='przygotowanie dania:'>
    <input type='submit' value='Edytuj przepis'>
    </form> </div> </br>";
   }

  }


?>



</body>
</html>