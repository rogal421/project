<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przepis</title>
    <link rel="stylesheet" type="text/css" href="style/styleprzepis.css">
</head>
<body>

    <div class="baner">
        <a href="index.php" style="color:white; text-decoration:none">Strona główna</a>
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

$id = $_POST['przepis'];

$sql="SELECT * FROM przepisy WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){

    for($i=0;$i<mysqli_num_rows($result);$i++){

        $row = mysqli_fetch_assoc($result);
        echo "<div class='przepis'>" . "<h1>" . $row['nazwa'] . "</h1> <h3>Potrzebne składniki: <br></h3><h4>" . $row['składniki'] . "</h4></br><h3>Przygotowanie:  </h3><h4>" . $row['przygotowanie']. "</h4>

        <form action='' method='post'>
        </form> </div> </br>";
    }

}else{
    echo "0 results";
}

?>


</body>
</html>