<?php
include ("header-uitloggen.php");

# het verkrijgen van een id van de account uit database
$email = $_GET['toegang'];
$query= "SELECT id FROM account WHERE email=$email  ";
$conn = Databaseverbinding::database_verbinding_maken();
$result= mysqli_query($conn,$query);
while ($roww = mysqli_fetch_array($result)){ 
  $account_id = $roww['id']; 
 
}
########


session_start();
if(!isset($_SESSION['toegang'])){
  echo 'U bent momenteel niet ingelogd! U moet eerst inloggen om de ToDoList te kunnen gebruiken!';
  ?>
  
  <br/><a href='index.php'>Inloggen</a>
 
 <?php
  } else {
     
      echo ''; ?>



<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
</head>
<body>
<div class='container'>
<br>
<p>Mijn To Do List:</p>
<table class='table table-dark'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Aktiviteit</th>
      <th scope='col'>Edit</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
  # het verkrijgen van de todo's uit de database van de ingelogde account
  $query= "SELECT * FROM todo WHERE account_id='$account_id' ";
  $conn = Databaseverbinding::database_verbinding_maken();
  $result= mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)){ 
    ?>     
      <tr>
  <th scope='row'> <?php echo $todo_id=$row['id']; ?> </th>
  <td><?php echo $todo_grabber= $row['todo']; ?></td>
  <td><a href='update.php?id=<?php echo $todo_id; ?>&toegang=<?php echo $account_id = $row['account_id'];?> '>Edit</a></td>
  <td><a href='delete.php?id=<?php echo $todo_id; ?>&toegang=<?php echo $account_id = $row['account_id'];?> '>Delete</a></td>
  </tr>
  <?php }; ?>
  </tbody>
</table>
<a href='create.php?toegang=<?php echo $account_id ?>'>Klik hier om een ToDo toe te voegen</a>
</div>
</body>
</html>

<?php 

  }

?>