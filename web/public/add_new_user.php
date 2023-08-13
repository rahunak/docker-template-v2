<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>docker-nginx-mysql-phpmyadmin</title>
    </head>
    <body>
<h1>Эта сборка открывается здесь: http://localhost:81</h1>

        <div>SERVER ADDRESS = <?php echo $_SERVER['SERVER_ADDR'] ?></div>
        <div>REMOTE ADDRESS = <?php echo $_SERVER['REMOTE_ADDR'] ?></div>
        
<?php
$errorFirstName =  $errorLastName =  $errorEmail = $firstName = $lastName = $email = NULL;

$tesp = '';
?>
<form method="post" action="removeAll.php" >
<input type="submit" name="removeAll" value="Remove all in DB" />
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
First name: <input type="text" name='firstName' value="<?php echo $firstName; ?>" />
<span class="errorMessage"><?php echo $errorFirstName; ?></span>
<br/>
Last name: <input type="text" name='lastName' value="<?php echo $lastName; ?>" />
<span class="errorMessage"><?php echo $errorLastName; ?></span>
<br/>
Email:<input type="text" name='email' value="<?php echo $email; ?>" />
<span class="errorMessage"><?php echo $errorEmail; ?></span>
<br/>
<input type="submit" value="Submit">
</form>
<hr>

<?php

include('./db_request.php');

?>



    </body>
</html>
