<?php
session_start();
$_SESSION["lastpage"] = $_SERVER["REQUEST_URI"];
function UnsetLogin()
{
   unset($_SESSION["loggedIn"]); 
}
if (empty($_POST["logout"]) != true) {
   UnsetLogin();
   $_POST["logout"] = "";
}

if (empty($_POST["seriousShit"]) == false) {
    $bitch = true;
    $_POST["seriousShit"] == "";
}
$_SESSION["lastpage"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "hi<br>";
    ?>
    <form method="post">
        <input type="text" name="seriousShit" placeholder="Write something" required><br>
        <button name="button" type="submit" value="1" formtarget="_self">Send it</button><br>
    </form>
    
    <?php
    if ($bitch == true) {
        echo "well well well";
    }
    ?>
</body>
</html>