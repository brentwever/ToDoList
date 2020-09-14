<?php
include ("header.php");
$message = '';
if (isset($_POST['submit'])){
  $naam= $_POST['naam'];
  $email= $_POST['email'];
  $wachtwoord= $_POST['wachtwoord'];

  $hash='$2y$33';
  $salt='Ikhouvansimracen33';
  $hash_and_salt= $hash.$salt;
  $wachtwoord_veilig=md5($wachtwoord,$hash_and_salt);

  create_account($naam,$email,$wachtwoord_veilig);
  $message = 'Uw account is met succes aangemaakt! U kunt nu inloggen';
    
}

session_start();
if(isset($_SESSION['toegang'])){ 
  echo"<b>Momenteel bent u ingelogd! Als u een nieuw account wilt aanmaken moet u eerst uitloggen!</b><br/><a href='logout-reg.php'>Uitloggen</a>";
 
} else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class='container'>
<br>
<?php 
if ($message!=''){
  echo $message;
?><br><a href="index.php">Klik hier voor inloggen</a>
<?php
}
 ?>

<?php if ($message==''){
  ?>

<h3>Account aanmaken</h3>
<br>
<form action="" method="POST">
<div class="form-group">
    <label for="naam">Achternaam</label>
    <input type="text" class="form-control" name='naam'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email adres</label>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord</label>
    <input type="password" name='wachtwoord' class="form-control" id="exampleInputPassword1">
  </div>
 
  <input class="btn btn-success" type="submit" name="submit" value="Verstuur"/>
</form>

</div>
</body>
</html>

<?php }} ?>