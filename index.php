<?php
include ("header.php");

session_start();
if(!isset($_SESSION['toegang'])){ 
  
 } else {    
    header('Location: todolist.php');
}

$message = '';
if (isset($_POST['submit'])){
  $email= $_POST['email'];
  $wachtwoord= $_POST['wachtwoord'];
  $hash='$2y$33';
  $salt='Ikhouvansimracen33';
  $hash_and_salt= $hash.$salt;
  $wachtwoord_veilig=md5($wachtwoord,$hash_and_salt);
  $conn= Databaseverbinding::database_verbinding_maken();
  $email= mysqli_real_escape_string($conn,$email);
  $query= "SELECT wachtwoord FROM account WHERE email='$email'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array ($result)){ 
    $db_wachtwoord = $row['wachtwoord'];        
  }  
  if ($wachtwoord_veilig == $db_wachtwoord){
    header("Location: login.php?toegang='$email' ");
  } else {
    $message='Uw mail of wachtwoord is niet juist, probeer opnieuw!';
  }  
}

?>
<div class='container'>
<br>
<?php 
if ($message!=''){
 ?>
<div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
<?php } ?>
<h3>Welkom bij deze Todo list ! </h3>
<br>
<p> Hieronder kunt u inloggen (als u al een account heeft, zo niet dan kunt u er een aanmaken (Registreer))</p>
<br>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email adres</label>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord</label>
    <input type="password" name='wachtwoord' class="form-control" id="exampleInputPassword1">
  </div> 
  <input class="btn btn-primary" type="submit" name="submit" value="Verstuur"/>
</form>
</div>
</body>
</html>