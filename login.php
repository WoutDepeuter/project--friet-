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
<!DOCTYPE html>
<html lang="en">
<!-- head -->
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
<!-- end head -->
<!-- body -->
<body class="main-layout about_page">
    <!-- loader  -->
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
                <li >
                    <a href="index.php">thuis</a>
                </li>
                <li class="active">
                    <a href="about.php">over ons</a>
                </li>
                <li>
                    <a href="recipe.php">recept</a>
                </li>
                <li>
                    <a href="blog.php">Blog</a>
                </li>
                <li>
                    <a href="contact.php">contacteer ons</a>
                </li>
                <li >
                        <a href="bestel.php">bestel</a>
                    </li>
            </ul>
        </nav>
    </div>
    <!-- header -->
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
                                <li class="dinone">Contacteer ons : <img style="margin-right: 15px;margin-left: 15px;" src="images/phone_icon.png" alt="#"><a href="#">987-654-3210</a></li>
                                <li class="dinone"><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#"><a href="#">demo@gmail.com</a></li>
                                <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="images/location_icon.png" alt="#"><a href="#">104 New york , USA</a></li>
                                <li class="button_user">
                                    <?php
                                    if (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true) { ?>
                                        <form method="post">
                                            <button class="button active" name="optieInlog" type="submit" value="1" formtarget="_self">Login</button>
                                            <button class="buttonLook" name="optieInlog" type="submit" value="2" formtarget="_self">Registreer</button>
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
    <div class="yellow_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <?php
                        if ((empty($_POST["optieInlog"]) == true) || ($_POST["optieInlog"] == "2")) { ?>
                           <h2>Registratie</h2>
                           <?php
                        } else { ?>
                           <h2>Login</h2>
                           <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
                    <?php
                    if ((empty($_POST["optieInlog"]) == true) || ($_POST["optieInlog"] == "2")) {
                        ?>
                        <form action="process.php" method="post">
                            <div class="container">
                                Welkom tot de registratie pagina, hier kunt u zich een account registreren.<br><br>
                                Gebruikersnaam :<br>
                                <input type="text" name="eName" pattern="[A-z0-9À-ž\s]{2,}" title="Drie of meer characters" required><br>
                            </div>
                            <div class="container">
                                Paswoord :<br>
                                <input type="password" name="pass" pattern=".{8,}" title="Acht of meer characters" required><br><br>
                            </div>
                            <div>
                                <button name="registreren" type="submit" value="1">Registreren</button><br><br>
                            </div>
                        </form>
                    <?php } else if ($_POST["optieInlog"] == "1") {
                        //$_SESSION["optieInlog"] = "1";
                        ?>
                        <form action="process.php" method="post">
                            <div class="container">
                                Welkom tot de inlog pagina, hier kunt u zich inloggen.<br><br>
                                Gebruikersnaam :<br>
                                <input type="text" name="eName" pattern="[A-z0-9À-ž\s]{2,}" title="Drie of meer characters" required><br>
                            </div>
                            <div class="container">
                                Paswoord :<br>
                                <input type="password" name="pass" pattern=".{8,}" title="Acht of meer characters" required><br><br>
                            </div>
                            <div>
                                <button name="registreren" type="submit" value="0">Inloggen</button><br><br>
                            </div>
                        </form>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- footer -->
    <footer>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <h2>Request  A<strong class="white"> Call  Back</strong></h2>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <form class="main_form" method="post">
                            <div >
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Name" type="text" name="Name">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Email" type="text" name="Email">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Phone" type="text" name="Phone">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <button class="send">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="img-box">
                            <figure><img src="images/img.jpg" alt="img"></figure>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer_logo">
                            <a href="index.php"><img src="images/logo1.jpg" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="lik">
                            <li><a href="index.php">thuis</a></li>
                            <li><a href="about.php">over ons</a></li>
                            <li><a href="recipe.php">Recept</a></li>
                            <li><a href="blog.php">blog</a></li>
                            <li><a href="contact.php">Contacteer ons</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="new">
                            <h3>nieuwsbrief</h3>
                            <form class="newtetter">
                                <input class="tetter" placeholder="Your email" type="text" name="Your email">
                                <button class="submit">abboneer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>