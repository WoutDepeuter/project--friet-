<?php
ob_start();
session_start();
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
    echo "hi";
    ?>
    <form method="post"></form>
    <input type="text" name="seriousShit" title="Write something" required><br>
    <?php
    if ($bitch == true) {
        echo "well well well";
    }
    ?>
</body>
</html>