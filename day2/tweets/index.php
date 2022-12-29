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
            echo '<div class="like">
        <p> <span id="userid" name="userid1">@'.$Userid.'</span><span>:'.$field2name.'</span></p>
        <button onclick="like()" name="like"><img src="assests/heart.png" alt="" srcset="" width="20px" height="20px"
                id="like"><span id="count">'.$field1name.'</span></button>
</div>';
    }
    $result->free();
}
        }
        else{
            echo "Incorrect username name";
        }
    }
    
        
?>




<?php
   if(isset($_POST["Showall"])){
    $query1 = "SELECT * FROM `likes`";
    if ($result = $con->query($query1)) {
        while ($row = $result->fetch_assoc()) {
        $field2name = $row["userid"];
        $field3name = $row["count"];
        $field4name = $row["tweet"];
    
    
        echo '<div class="like">
            <p><span id="userid" name="userid1">@'.$field2name.':</span><span>'.$field4name.'</span></p>
            <button onclick="like()" name="like"><img src="assests/heart.png" alt="" srcset="" width="20px" height="20px"
                    id="like"><span id="count">'.$field3name.'</span></button>
    </div>';
    }
    $result->free();
    }
   }
   ?>



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