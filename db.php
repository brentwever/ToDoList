<?php

class Databaseverbinding {
    static public $servername = "localhost";
    static public $username = "root";
    static public $password = "";
    static public $db_name= "todolist";

    static function database_verbinding_maken(){
        $conn = new mysqli(self::$servername, self::$username, self::$password,self::$db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        #echo "Connected successfully";
        return $conn;
    } 
}

function create_account($naam,$email,$wachtwoord_veilig){
    $conn= Databaseverbinding::database_verbinding_maken();
    $naam= mysqli_real_escape_string($conn,$naam);
    $email= mysqli_real_escape_string($conn,$email);
    $wachtwoord_veilig= mysqli_real_escape_string($conn,$wachtwoord_veilig);
    $query= "INSERT INTO account(naam,email,wachtwoord) VALUES('$naam','$email','$wachtwoord_veilig')";
    $result = mysqli_query($conn,$query);
    if (mysqli_connect_error()){
        die("Fout met verbinding");
    }
}

function create_todo($account_id, $todo){
    $conn= Databaseverbinding::database_verbinding_maken();
    $account_id= mysqli_real_escape_string($conn,$account_id);
    $todo= mysqli_real_escape_string($conn,$todo);
    $query= "INSERT INTO todo(account_id, todo) VALUES('$account_id','$todo')";
    $result = mysqli_query($conn,$query);
    if (mysqli_connect_error()){
        die("Fout met verbinding");
    }
}


function update($todo_id,$todo){
    $conn= Databaseverbinding::database_verbinding_maken();
    $todo_id= mysqli_real_escape_string($conn,$todo_id);
    $todo= mysqli_real_escape_string($conn,$todo);
  
    $query= "UPDATE todo SET todo='$todo' WHERE id='$todo_id' ";
    $result = mysqli_query($conn,$query);
    if (mysqli_connect_error()){
        die("Fout met verbinding");
    }
}

function delete($todo_id){
    $conn= Databaseverbinding::database_verbinding_maken();
    $id= mysqli_real_escape_string($conn,$todo_id);
    $query= "DELETE FROM todo where id=$todo_id";
    $result = mysqli_query($conn,$query);
    if (mysqli_connect_error()){
        die("Fout met verbinding");
    }
}

?>