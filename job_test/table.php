<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION["logged"])){
header('Location: index.php');
}
if ($_SESSION["logged"]!=1) {
    header('Location: index.php');
}

$data = $conn->query("SELECT * FROM people where deleted = 0")->fetchAll();
echo "<table border=dotted>";
foreach ($data as $row) {
    echo "<tr>";
    echo "<td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['email']."</td>";
    echo "<td><button id=\"button".$row['id']."\" type=\"button\" onclick=\"deleterec(".$row['id'].")\">delete</button></td>";
    echo "</tr>";
}
echo "</table>";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="./looks2.css" type="text/css" rel="stylesheet"/>
</head>
<script>
    function deleterec(del_id){
        var urlstr="delete.php?id="+del_id;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            document.getElementById('button'+del_id).setAttribute('disabled', 'disabled');
        };
        xhttp.open("GET", urlstr, true);
        xhttp.send();
    }
</script>
</html>
