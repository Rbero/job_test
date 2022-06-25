<?php 
session_start();
require_once 'conn.php';

if (!isset($_SESSION["logged"])){
header('Location: index.php');
}
if ($_SESSION["logged"]!=1) {
    header('Location: index.php');
}
$id="";

if(isset($_GET['id'])){
    $id=htmlspecialchars($_GET["id"]);
}
if($id!=""){
    
    $sql = "update people set deleted = 1 where id=".$id;
    if ($conn->query($sql) === TRUE) {
      echo "record deleted successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    


?>
