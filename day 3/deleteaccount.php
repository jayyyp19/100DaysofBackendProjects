<?php
   require_once "config.php";
   if(isset($_POST["submit"])){
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $sql = "SELECT `email`, `password` FROM `simplecrud` WHERE email = '$email' and password = '$password';";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        $sql1 = "UPDATE `simplecrud` SET `flag`='0' WHERE email='$email' and password='$password';";
        if($con->query($sql1)==TRUE){
        echo "Your account is successfully deleted";
        header('location: system.php');
     }
     else{
        echo "ERROR :".$sql."<br>".$con->error;
     }
    }
    else{
        echo "Email or password is incorrect";
    }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>

<body>
    <div style="text-align: center; margin-top: 12%;">
        <h1 style="font-size: 50px;">Delete account</h1><br>
        <form action="deleteaccount.php" method="post">
            <input type="email" placeholder="Enter your email...." required name="email"><br><br>
            <input type="password" placeholder="Enter your password...." required name="password"><br><br>
            <button type="submit" name="submit">Delete</button>
        </form>
    </div>
</body>

</html>