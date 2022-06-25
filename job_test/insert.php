<?php 
session_start();
require_once 'conn.php';

if (!isset($_SESSION["logged"])){
header('Location: index.php');
}
if ($_SESSION["logged"]!=1) {
    header('Location: index.php');
}



$f="";
$l="";
$e="";
if(isset($_GET['f'])){
    $f=htmlspecialchars($_GET["f"]);
}

if(isset($_GET['l'])){
    $l=htmlspecialchars($_GET["l"]);
}
if(isset($_GET['e'])){
    $e=htmlspecialchars($_GET["e"]);
}

if($f != "" || $l != "" || $e != ""){
    $sql = "insert into people (fname,lname,email,deleted) values (?, ?, ?,?);";
    $query = $conn->prepare($sql)->execute(array($f,$l,$e,"0"));
    echo(1);  
}

?>
