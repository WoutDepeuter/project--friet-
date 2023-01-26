<?php
session_start();
if
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