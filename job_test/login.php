<?php 
session_start();

require_once 'conn.php';

$p="";
$u="";
if(isset($_GET['p'])){
    $p=htmlspecialchars($_GET["p"]);
}

if(isset($_GET['u'])){
    $u=htmlspecialchars($_GET["u"]);
}


if($u != "" || $p != ""){
    //$sql = "SELECT * FROM users WHERE username=\"".$u."\" AND passw=\"".$p."\"";
    $sql = "SELECT * FROM users WHERE username=? AND passw=?";
    $query = $conn->prepare($sql);
    $query->execute(array($u,$p));
    //$query->execute();
    $row = $query->rowCount();
    $fetch = $query->fetch();
    if($row == 1) {
        $_SESSION["logged"]=1;
        echo("1");
    } else{
        $_SESSION["logged"]=0;
        echo("0");
}
    
}

//echo("Login successfully");
?>
