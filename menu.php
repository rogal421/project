<?php
echo "Zalogowano jako: ";
echo $_SESSION['permisje'];


?>

<?php
if($_SESSION['permisje']=='user'){
    echo '<a style="color:white; text-decoration:none" href="/session/user.php">Dodaj przepis</a>';
    echo '<a style="color:white; text-decoration:none" href="/session/logout.php">Wyloguj się</a>';
}


?>
<?php
if($_SESSION['permisje']=='staff'){
    echo '<a style="color:white; text-decoration:none" href="/session/staff.php">Panel pracownika</a>';
    echo '<a style="color:white; text-decoration:none" href="/session/logout.php">Wyloguj się</a>';
}


?>


<?php
if($_SESSION['permisje']=='admin'){
    echo '<a style="color:white; text-decoration:none" href="/session/admin.php">Admin panel</a>';
    echo '<a style="color:white; text-decoration:none" href="/session/logout.php">Wyloguj się</a>';
}
?>

<?php
if($_SESSION['permisje']!='user' && $_SESSION['permisje']!='staff' && $_SESSION['permisje']!='admin'){
    echo "<a href='/session/login.php'>Login</a>";
    echo "<a href='/session/rejestracja.php'>Rejestracja</a>";
}
?>
