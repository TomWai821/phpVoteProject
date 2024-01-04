<?php
    //  die() = execute in java
    //                                    host, user, password, database_name                      
    $connect = mysqli_connect("localhost:3307", "root", "", "voting") or die("connection failed!");

    /*
    if($connect){
        echo "Connected!";
    }else{
        echo "Not Connected!";
    }
    */

?>