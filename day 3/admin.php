<?php
 require_once "config.php";
 if(isset($_POST["Activecustomer"])){
    $sql = "SELECT * FROM `simplecrud` WHERE flag=1;";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        echo '<table border="0" cellspacing="2" cellpadding="2">
        <th>
            <font face="Arial">Name</font>
        </th>
        <th>
            <font face="Arial">Email</font>
        </th>';
        if($q = $con->query($sql)){
            while($row=$q->fetch_assoc()){
                $name = $row["name"];
                $email = $row["email"];
                echo '<tr>
                           <td><font face="Arial">'.$name.'</font> </td>
                           <td><font face="Arial">'.$email.'</font> </td>
                      </tr>';
            }
            $q->free();
        }
    }
 }
 if(isset($_POST["lostcustomer"])){
    $sql = "SELECT * FROM `simplecrud` WHERE flag=0;";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        echo '<table border="0" cellspacing="2" cellpadding="2">
        <th>
            <font face="Arial">Name</font>
        </th>
        <th>
            <font face="Arial">Email</font>
        </th>';
        if($q = $con->query($sql)){
            while($row=$q->fetch_assoc()){
                $name = $row["name"];
                $email = $row["email"];
                echo '<tr>
                           <td><font face="Arial">'.$name.'</font> </td>
                           <td><font face="Arial">'.$email.'</font> </td>
                      </tr>';
            }
            $q->free();
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
    <title>Admin</title>
    <style>
    th,
    tr,
    table,
    td {
        border: 1px solid black;
    }

    th {
        font-weight: 800;
        background-color: grey;
    }

    td {
        color: white;
        background-color: red;
    }
    </style>
</head>

<body>
    <div>
        <form action="admin.php" method="post">
            <button type="submit" name="Activecustomer">Active customer</button>
        </form><br><br>
        <form action="admin.php" method="post">
            <button type="submit" name="lostcustomer">lost customer</button>
        </form><br><br>
        <h1>Customer Details</h1>
    </div>
</body>

</html>