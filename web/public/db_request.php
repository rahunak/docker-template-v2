<?php

$db_name = 'test';
$servername = "mysql";  
$username = "test"; 
$password = "test";  
$errorFirstName =  $errorLastName =  $errorEmail = $firstName = $lastName = $email = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(!empty($_POST["firstName"])) {
      $firstName = $_POST["firstName"];
    }else{
        $errorFirstName = 'First name is required';
    }
    if(!empty($_POST["lastName"])) {
        $lastName = $_POST["lastName"];
    }else{
        $errorLastName = 'Last name is required';
    }
    if(!empty($_POST["email"])) {
        $email = $_POST["email"];
    }else{
        $errorEmail = 'Email is required';
    } 
}
if (empty($errorFirstName) && empty($errorLastName) && empty($errorEmail) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    try{
        $connection = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);

        $sql1 = "SELECT * FROM table LIMIT 1";
        $reult = $connection->exec($sql1); 


        $connection = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstName VARCHAR(30) NOT NULL,
            lastName VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        $connection->exec($sql); 
    
        $sql = "INSERT INTO MyGuests (firstName, lastName, email) 
        VALUES ('.$firstName.','. $lastName.', '.$email.')";
        $connection->exec($sql);
    
    }catch(ErrorException $e){
        echo "Error". $e;
    }
    $connection = null;
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = "SELECT * FROM MyGuests";
    if($result = $conn->query($sql)){
        foreach($result as $row){
          // var_dump($row);
            $userid = $row["id"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $reg_date = $row["reg_date"];
            echo '|'.$userid . ' + ' . $firstname . ' + ' . $lastname . ' + ' . $email . ' + ' . $reg_date . '|<br/>'; 
        }
    }
  
  
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;