<?php
// //Database connection.
// $con = MySQLi_connect(
//    "localhost", //Server host name.
//    "root", //Database username.
//    "", //Database password.
//    "bakery" //Database name or anything you would like to call it.
// );
// //Check connection
// if (MySQLi_connect_errno()) {
//    echo "Failed to connect to MySQL: " . MySQLi_connect_error();
// } else {
//     echo "Connected ";
// }

//db constants

 $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "butikkvare";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        echo('Database connection error : ' .mysql_error());
    }



?>