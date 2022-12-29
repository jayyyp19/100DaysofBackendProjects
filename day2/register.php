<?php
   $server = "localhost";
   $username = "root";
   $password = "";
   $t=0;
   $t1=0;

   $con = mysqli_connect($server,$username,$password,"tweets");

   if(!$con){
    die("connection of database failed due to".mysqli_connect_error());
   }
   // echo "Registration Successful";
   if(isset($_POST["Register"]))
    {
    $name = $_REQUEST["name"];
    $Phoneno = $_REQUEST['Phoneno'];
    $userid = $_REQUEST['userid'];
    
    $query = "SELECT * FROM `user details` WHERE Phoneno = $Phoneno" ;
    $query1 = "SELECT * FROM `user details` WHERE Userid = '$userid'";
    $results = mysqli_query($con, $query);
    $results1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($results) == 1 || mysqli_num_rows($results1) == 1) {
        $t1=1;
      // die();
      if(mysqli_num_rows($results) == 1 && mysqli_num_rows($results1) == 1){
        $t1=12;
      }
      elseif(mysqli_num_rows($results1) == 1){
        $t1=2;
      }
    }
    else{
      $sql = "INSERT INTO `tweets`.`user details` (`First Name`, `Phoneno`, `Userid`) VALUES ('$name', '$Phoneno', '$userid');";
   //  echo $sql;
    if($con->query($sql) == true){
        // Storing username in session variable
        $_SESSION['Name'] = $name;
         
        // Welcome message
        $_SESSION['success'] = "You have logged in!";
         
        // Page on which the user is sent
        // to after logging in
        header('location: tweets/searchtweets.php');
    }
    else{
        echo "error :<br>$sql <br> $con->error";
    }
    
   }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <section class="container">
        <?php
             if($t1==1){
                echo '<h3 style="color:red; border: 1px solid white; background-color:yellow; border-radius:5px; padding:4px; text-align:center; margin-bottom:7px;">Phone number already registered</h3>';
                }
                elseif($t1==2){
                echo '<h3 style="color:red; border: 1px solid white; background-color:yellow; border-radius:5px; padding:4px; text-align:center; margin-bottom:7px;">User Id already registered</h3>';
                }
                elseif($t1==12){
                echo '<h3 style="color:red; border: 1px solid white; background-color:yellow; border-radius:5px; padding:4px; text-align:center; margin-bottom:7px;">Phone number and Userid already registered</h3>';
                }
         ?>
        <h2>Registration Form</h2>
        <form action="register.php" class="form" method="post">
            <div class="input-box">
                <label>First name</label>
                <input type="text" placeholder="Enter first name" name="name" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" placeholder="Enter phone number" name="Phoneno" required />
                </div>
            </div>
            <div class="input-box address">
                <label>User Id</label>
                <input type="text" placeholder="Create your unique Userid" name="userid" required />
            </div>
            <button name="Register">Register</button>
        </form>
    </section>
</body>

</html>