<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/stylerejestracja.css">
    <title>REGISTER</title>
</head>
<body>
    <div class="baner">
        <div class="rejestracja">
        <a href="login.php" style="color:white; text-decoration:none">Logowanie</a>
        </div>
    </div>
    <div class="login">
    </div>
    <div class="input">
    <form action="rejestracja.php" method="POST">
        <h1>Zarejestruj się</h1>
        <div class="nameinp">
            Login:
            <input type="text" id="login" name="login" style="height: 20px; width: 250px;">
        </div>
        <div class="passwordinp">
            Hasło:
            <input type="password" id="pass" name="pass" style="height: 20px; width: 250px;">
        </div>
        <div class="submitinp">
            <input type="submit" id="rejestracja" value="Zarejestruj" style="height: 30px; width: 258px;">
        </div>
    </form>

    </div>
    <?php
    if(isset($_POST["login"]) && isset($_POST["pass"])){
        $log=$_POST["login"];
        $pas=$_POST["pass"];


        function szyfruj_haslo($pas){
            return md5($pas);
        }
        $zaszyfrowane=szyfruj_haslo($pas);
        
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="users";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        if(!$conn){
            die (mysqli_connect_error() . "error");
        }

        

        $sql="INSERT INTO acc(login,haslo,permisje) VALUES ('$log','$zaszyfrowane','user')";
        if(mysqli_query($conn,$sql)){
            header('Location: login.php');
        } else echo "error";
    }
    ?>
</body>
</html>