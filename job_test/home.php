<?php 
session_start();
if (!isset($_SESSION["logged"])){
header('Location: index.php');
}
if ($_SESSION["logged"]!=1) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="./looks.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <button type="button" name="logout" onclick="logout()">log out</button>
    <button type="button" name="delete" onclick="table()">table and delete</button>
    <br>
    <br>
    <br>
    <br>
    <div class="panel-body">
        <div class="form-group">
            <label>first name</label>
            <input id="text1" type="text" name="first name" class="form-control" required="required"/>
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input id="text2" type="text" name="last name" class="form-control" required="required"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input id="text3" type="text" name="email" class="form-control" required="required"/>
        </div>
        <button type="button" name="insert" onclick="insert()">add people</button>
    </div>
</body>
<script>
        function logout(){
            var urlstr="logoff.php";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.responseText == "0"){
                    window.location.replace("./index.php")
                }
            };
            xhttp.open("GET", urlstr, true);
            xhttp.send();
        }
        
        function table(){
            location.href = "./table.php";
        }
        
        function insert(){
            var t1=document.getElementById("text1").value;
            var t2=document.getElementById("text2").value;
            var t3=document.getElementById("text3").value;
            var urlstr="insert.php?f="+t1+"&"+"l="+t2+"&"+"e="+t3;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
               if (this.responseText == "1"){
                    document.getElementById("text1").value="";
                    document.getElementById("text2").value="";
                    document.getElementById("text3").value="";
                    }
                };
            xhttp.open("GET", urlstr, true);
            xhttp.send();
            }
</script>
</html>
