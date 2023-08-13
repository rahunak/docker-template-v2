<?php 
$dbname = 'test';
$servername = "mysql"; // or mysql
$username = "test"; //test
$password = "test"; //test

if($_SERVER["REQUEST_METHOD"] == "POST") {

}else{
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        $sql = 'DELETE FROM MyGuests';
        $conn->query($sql);
        $sql = 'ALTER TABLE MyGuests AUTO_INCREMENT = 0';
        $conn->query($sql);
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD is empty</title>
</head>
<body>
  <form action="post" method="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <input type="submit" value="Download DB">
  </form>
    <button  onclick="goBack()">return</button>
<script>
    function goBack(){
        window.location.href='/';
    }
</script>
</body>
</html>