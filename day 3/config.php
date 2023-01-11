<?php
   $server = "localhost";
   $username = "root";
   $password = "";

   $con = mysqli_connect($server,$username,$password,"crud");

   if(!$con){
    die("connection of database failed due to".mysqli_connect_error());
   }
?>