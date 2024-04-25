<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style/stylelogin.css">
</head>
<body>
<div class="baner">
        <div class="rejestracja">
        <a href="rejestracja.php" style="color:white; text-decoration:none">Zarejestruj się</a>
        </div>
    </div>
    <div class="login">
    </div>
    <div class="input">
    <form action="login.php" method="POST">
        <h1>Zaloguj się</h1>
        <div class="nameinp">
            Login:
            <input type="text" name="login" id="login" style="height: 20px; width: 250px;">
        </div>
        <div class="passwordinp">
            Hasło:
            <input type="password" name="pass" id="pass" style="height: 20px; width: 250px;">
        </div>
        <div class="submitinp">
            <input type="submit" id="zaloguj" value="Zaloguj" style="height: 30px; width: 258px;">
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

        

        $sql="SELECT * FROM acc WHERE login='$log' AND haslo='$zaszyfrowane'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $_SESSION['zalogowano']=true;

            $row = mysqli_fetch_assoc($result);
            
            $_SESSION['user'] = $row['login'];
            
            $_SESSION['permisje'] = $row['permisje'];
            
            header('Location: ./index.php');
        } else {
            $_SESSION['zalogowano']=false;
            $_SESSION['user'] = "";
            
            $_SESSION['permisje'] = "";
            echo "error";
    }
}
    
    ?>
</body>
</html>