<?php
include('header.php');
session_start();
$_SESSION['toegang']=$_REQUEST['toegang'];
$email = $_GET['toegang'];


if(!isset($_SESSION['toegang'])){ 
    echo"<b>Momenteel bent u uitgelogd! U moet eerst inloggen!</b><br/><a href='index.php'>Inloggen</a>";
   
  } else {
      header("Location: todolist.php?toegang=$email");
  }
?>