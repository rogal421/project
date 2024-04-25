<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo isset($_SESSION['bgColorAll']) && $_SESSION['bgColorAll'] === "ciemny" ? "#666666" : "whitesmoke"; ?>;
            color: <?php echo isset($_SESSION['bgColorAll']) && $_SESSION['bgColorAll'] === "ciemny" ? "white" : "black"; ?>;
        }
    </style>
</head>
<body>
    <h1>PAGE</h1>
    <?php
    include 'menu.php'
    ?>
    <?php
    echo $_SESSION["bgColorAll"];
    ?>
    <?php
    echo $_SESSION["test"] . "<br>";
    ?>
    <?php
    if(isset($_SESSION["licznik"])){
        $_SESSION["licznik"]=$_SESSION["licznik"]+1;
    } else{
        $_SESSION["licznik"]=1;
    }
    echo "Liczba odwiedzeń: " . $_SESSION["licznik"];
    ?>
    
</body>
</html>