<?php
include ("header.php");

if (isset($_GET['id'])){
    $todo_id = $_GET['id'];
    delete($todo_id);       
}

# het verkrijgen van een email van de account uit database
$account_id = $_GET['toegang'];
$query= "SELECT * FROM account WHERE id=$account_id  ";
$conn = Databaseverbinding::database_verbinding_maken();
$result= mysqli_query($conn,$query);
while ($roww = mysqli_fetch_array($result)){ 
  $email = $roww['email']; 
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
<br>
<p>ToDo is met succes verwijderd!</p>
<br> 
</div>
</body>
</html>