<?php
include ("header-uitloggen.php");
$account_id = $_GET['toegang'];


# het verkrijgen van een email van de account uit database
$query= "SELECT * FROM account WHERE id=$account_id  ";
$conn = Databaseverbinding::database_verbinding_maken();
$result= mysqli_query($conn,$query);
while ($roww = mysqli_fetch_array($result)){ 
  $email = $roww['email']; 
 
}
#######

# het verkrijgen van een todo uit database
$todo_id = $_GET['id'];
$query= "SELECT * FROM todo WHERE id=$todo_id  ";
$conn = Databaseverbinding::database_verbinding_maken();
$result= mysqli_query($conn,$query);
while ($roww = mysqli_fetch_array($result)){ 
  $todo = $roww['todo']; 
 
}
#######

# Hieronder is voor het ingelogd te moeten zijn, anders kun je niks doen
session_start();
if(!isset($_SESSION['toegang'])){
  echo 'U bent momenteel niet ingelogd! U moet eerst inloggen om de ToDoList te kunnen gebruiken!';
  ?>  
  <br/><a href='index.php'>Inloggen</a> 
 <?php
  } else {     
      echo ''; ?>


<?php
if (isset($_POST['submit'])){
    $todo = $_POST['todo'];
    $todo_id = $_POST['todo_id'];
  
    update($todo_id, $todo);
    header("Location: todolist.php?toegang='$email' ");
}


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
    <form action="" method="POST">
        <div class="form-group">
        <br>
        <h3><strong>Hier kunt u uw ToDo aanpassen:</strong><h3>
         <input hidden class="form-control" type="text" name="todo_id" value='<?php echo $todo_id ?>'><
            <input class="form-control" type="text" name="todo" value='<?php echo $todo ?>'><br>
            <input class="btn btn-success" type="submit" name="submit" value="Verstuur"/>
          
    </form>

</div>
    
</body>
</html>

<?php 
  }
  ?>