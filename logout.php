<?php
include('header-uitloggen.php');
session_start();

if(!isset($_SESSION['toegang'])){
    echo'U bent niet ingelogd! Dus u hoeft niet uit te loggen!';
    header("Refresh:2;url=index.php");

} else {      
    session_destroy();
    header('Location: index.php');

}
