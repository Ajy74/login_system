<?php

    $server="localhost";
    $username="root";
    $password="";
    $database="users";

    $con= mysqli_connect($server,$username,$password,$database);
    
    if(!$con){
        die("connection failed due to: ". mysqli_connect_error());
    }
    // else{
    //     echo "success";
    // }

?>