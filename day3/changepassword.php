<?php
require_once "config.php";
if(isset($_POST["submit"])){
    $email=$_REQUEST["email"];
    $currentpassword=$_REQUEST["Cpassword"];
    $newpassword=$_REQUEST["Npassword"];
    $sql = "SELECT `email`, `password` FROM `simplecrud` WHERE email = '$email' and password = '$currentpassword';";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        $sql1 = "UPDATE `simplecrud` SET `password`='$newpassword'
     WHERE email='$email' and password='$currentpassword';";
     if($con->query($sql1)===TRUE){
        echo "Password is changed Successfully";
     }
     else{
        echo "ERROR:".$sql."<br>".$con->error;
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
    <title>Change password</title>
</head>

<body>
    <div style="text-align: center; margin-top: 10%;">
        <h1 style="font-size: 50px;">Change password</h1><br>
        <form action="changepassword.php" method="post">
            <input type="email" placeholder="Enter your email...." name="email" required><br><br>
            <input type="password" placeholder="Enter your Current password...." name="Cpassword" required><br><br>
            <input type="password" placeholder="Create a new password...." name="Npassword" required><br><br>
            <button type="submit" name="submit">submit</button>
        </form><br><br><br><br>
        <h3> <a href="setting.html">Goback</a></h3>
    </div>
</body>

</html>