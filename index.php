<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/styleindex.css">
    <title>Strona główna</title>
</head>
<body>
    <div class="baner">
        <b>Strona główna</b>
    <?php
    include 'menu.php'
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

    echo "<div class='przepisynapis'>";
    echo "<h1><b>Przepisy:</b></h1>";
    echo "</div>";

if (mysqli_num_rows($result) > 0){

    for($i=0;$i<mysqli_num_rows($result);$i++){

    $row = mysqli_fetch_assoc($result);
    echo "<div class='przepis id='przepisy''>
    <form action='przepisy.php' method='post'>
    <input type='hidden' value=".$row['ID']." name='przepis'>
    <input type='submit' class='button' value='".$row['nazwa']."'>
    </form> </div> </br>";
   }

  }

?>


</body>
</html>