<?php
session_start();
if (isset($_SESSION["logged"])){
    if ($_SESSION["logged"]==1) {
        header('Location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="./looks.css" type="text/css" rel="stylesheet" />
    </head>
<body>
    <div class="col-md-6 well">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p>Login</p>
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input id="text1" type="text" name="username" class="form-control" required="required"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="text2" type="password" name="password" class="form-control" required="required"/>
                        </div>
                        <button class="btn btn-primary" type="button" name="login" onclick="login()"> Login</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
        function login(){
            var t1=document.getElementById("text1").value;
            var t2=document.getElementById("text2").value;
            var urlstr="login.php?u="+t1+"&p="+t2;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.responseText == "1"){
                    window.location.replace("./home.php")
                }
            };
            xhttp.open("GET", urlstr, true);
            xhttp.send();
        }
</script>
</html>
