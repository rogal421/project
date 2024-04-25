<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/stylelogout.css">
    <title>Wylogowywanie...</title>
</head>
<body>
    <?php
    $_SESSION['zalogowano']=false;
    $_SESSION['user'] = "";
    $_SESSION['permisje'] = "";
    

    echo "<h1>Wylogowywanie...</h1>";


    echo "
    <script>
    setTimeout(()=>{
        location.href = './login.php'
    },'2000');
    </script>
    ";
    
    ?>
</body>
</html>