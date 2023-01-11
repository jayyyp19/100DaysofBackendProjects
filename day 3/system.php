<?php
   require_once "config.php";
   if(isset($_POST["submit"])){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    if($email=="jay@gmail.com" && $password=="wedfvb "){
        header('location: admin.php');
    }
    else{
        $sql = "INSERT INTO `simplecrud` (`name`,`email`, `password`, `flag`)
         VALUES ('$name','$email','$password','1');";
         if($con->query($sql)===TRUE){
            echo "Successfully registered";
            header('location: setting.html');
         }
         else{
            echo "ERROR :".$sql."<br>".$con->error;
         }
       }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD System</title>
</head>

<body>
    <div style="text-align: center; margin-top: 12%;">
        <h1 style="font-size: 50px;">Simple CRUD System</h1><br>
        <form action="system.php" method="post">
            <input type="text" placeholder="Enter your name...." required name="name"><br><br>
            <input type="email" placeholder="Enter your email...." required name="email"><br><br>
            <input type="password" placeholder="Enter your password...." required name="password"><br><br>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>

</html>