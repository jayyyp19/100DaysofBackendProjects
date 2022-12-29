<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets search engine</title>
    <link rel="stylesheet" href="style.css">
</head>
<!-- php 3 -->
<?php
   $server = "localhost";
   $username = "root";
   $password = "";
   $all="";

   $con = mysqli_connect($server,$username,$password,"tweets");

   if(!$con){
    die("connection of database failed due to".mysqli_connect_error());
   }
?>

<body>
    <!-- <div class="main"> -->
    <div class="phone">
        <h1>Search Tweets using username</h1><br>
        <form action="searchtweets.php" method="post">
            <label for="user_details" class="label">Enter the username of the user</label>
            <input type="text" id="user_details" name="userid" placeholder="Type the username...." required><br><br>
            <button class="button" name="Search">Search</button><br><br>
        </form>
        <!-- php1 -->
        <?php
  if(isset($_POST["Search"]))
    {
        $Userid = $_REQUEST["userid"];
        $query = "SELECT * FROM `likes` WHERE userid ='$Userid'";
        $query1 = "SELECT * FROM `likes`";

        $results = mysqli_query($con, $query);
        $results1 = mysqli_query($con, $query1);
        
        if (mysqli_num_rows($results) !=0 or (mysqli_num_rows($results1) !=0 and $all=="ohk")) {

     if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["count"];
            $field2name = $row["tweet"];
            $query2 = "SELECT * FROM `user details` Where Userid = '$Userid'";
           if ($result_1 = $con->query($query2)) {
            while ($row = $result_1->fetch_assoc()) {
                $firstname = $row["First Name"];
            echo '<div class="m"><div class="like">
                <p><span id="fname">'.$firstname.'</span><span id="userid" name="userid1">@'.$Userid.':<br></span><span>'.$field2name.'</span></p>
                <button onclick="like()" name="like"><img src="assests/like.png" alt="" srcset="" width="20px" height="20px"
                        id="like"><span id="count">'.$field1name.'</span></button>
                </div></div>';
            }
            $result_1->free();
        }
    }
    $result->free();
}
        }
        else{
            echo "Incorrect username name";
        }
    }
    
        
?>

        <h2>OR</h2><br>
        <form action="searchtweets.php" method="post">
            <button name="Showall" class="button" onclick="hide()">Show All
                Tweets</button><br><br><br>
        </form>
        <!-- php2 -->
        <?php
   if(isset($_POST["Showall"])){
    $query1 = "SELECT * FROM `likes`";
    if ($result = $con->query($query1)) {
        while ($row = $result->fetch_assoc()) {
        $field2name = $row["userid"];
        $field3name = $row["count"];
        $field4name = $row["tweet"];
        $query2 = "SELECT * FROM `user details` Where Userid = '$field2name'";
        if ($result_1 = $con->query($query2)) {
            while ($row = $result_1->fetch_assoc()) {
                $firstname = $row["First Name"];
            echo '<div class="m"><div class="like">
                <p><span id="fname">'.$firstname.'</span><span id="userid" name="userid1">@'.$field2name.':</span><br><span>'.$field4name.'</span></p>
                <button onclick="like()" name="like"><img src="assests/heart.png" alt="" srcset="" width="20px" height="20px"
                        id="like"><span id="count">'.$field3name.'</span></button>
                </div></div>';
            }
            $result_1->free();
        }
    }
    $result->free();
    }
   }
   ?>

    </div>
    <!-- </div> -->
    <script src="main1.js"></script>
</body>

</html>