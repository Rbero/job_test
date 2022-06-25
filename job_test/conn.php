<?php
    $conn = new PDO('mysql:host=localhost; dbname=jobtestdb', 'root', '123123');
 
    if(!$conn){
        die("Error: Failed to connect to database!");
    }
?>
