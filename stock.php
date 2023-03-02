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
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>alluah snackbar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="" /></div>
    </div>
    <!-- end loader -->
    <div class="sidebar">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>
            <ul class="list-unstyled components">
            <li class="active">
                <a href="index.php">Thuis</a>
                </li>
                <li>
                    <a href="about.php">over ons</a>
                </li>
                <li>
                    <a href="recipe.php">Recept</a>
                </li>
                <li>
                    <a href="bestel.php">Bestel</a>
                </li>
                <li>
                    <a href="blog.php">Blog</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                <li >
                        <a href="bestel.php">bestel</a>
                    </li>
            </ul>
        </nav>
    </div>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" href="index.php"><img src="images/logo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>
                                <li class="dinone">Contact Us : <img style="margin-right: 15px;margin-left: 15px;" src="images/phone_icon.png" alt="#"><a href="#">987-654-3210</a></li>
                                <li class="dinone"><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#"><a href="#">demo@gmail.com</a></li>
                                <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="images/location_icon.png" alt="#"><a href="#">104 New york , USA</a></li>
                                <li class="button_user">
                                    <?php
                                    if (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true) { ?>
                                        <form action="login.php" method="post">
                                            <button class="button active" name="optieInlog" type="submit" value="1">Login</button>
                                            <button class="buttonLook" name="optieInlog" type="submit" value="2">Registreer</button>
                                        </form>
                                    <?php } else { ?>
                                        <form method="post">
                                            <button class="button active" name="logout" type="submit" value="1" formtarget="_self" onclick="UnsetLogin()">Logout</button>
                                        </form>
                                    <?php } ?>
                                </li>
                                <li><img style="margin-right: 15px;" src="images/search_icon.png" alt="#"></li>
                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <img src="images/menu_icon.png" alt="#">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    
</body>
</html>
