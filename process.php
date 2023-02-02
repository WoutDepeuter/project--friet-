<?php
ob_start();
session_start();
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
    <div class="yellow_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>About</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <?php
    // Hulp van : https://stackoverflow.com/questions/36240145/how-to-use-serverhttp-referer-correctly-in-php
    // Als de laatste pagina /contact.php is :
    if($_SESSION['lastpage'] != "/project--friet-/login.php")
    {
        echo $_REQUEST["Name"], "<br><br>";
        echo $_REQUEST["Phone"], "<br><br>";
        echo $_REQUEST["Email"], "<br><br>";
        echo $_REQUEST["Message"], "<br><br>";
    } // Als de laatste pagina /login_page.php is; als er nog niet ingelogd is; als er aangeduid werd dat er word geregistreerd :
    else if (($_SESSION['lastpage'] == "/project--friet-/login.php") && (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true)) {
        // Hulp van : https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
        // En : https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/
        
        // Gebruikersnaam word gedeclareerd voor verder gebruik
        if (isset($_REQUEST["eName"]) === true) {
            $_SESSION["gbr"] = trim($_REQUEST["eName"]);
        } else {
           echo "Volgens ons is er geen gebruikersnaam ingegeven.<br>
           U zal worden herleidt naar de registratie pagina.<br>";
           header("Refresh: 4; url=/project--friet-/login.php", true, 0);
           exit();
        }
        
        // Paswoord word gedeclareerd voor verder gebruik
        if (isset($_REQUEST["pass"]) === true) {
            $_SESSION["pwd"] = trim($_REQUEST["pass"]);
        } else {
            echo "Volgens ons is er geen paswoord ingegeven.<br>
            U zal worden herleidt naar de registratie pagina.<br>";
            header("Refresh: 4; url=/project--friet-/login.php", true, 0);
            exit();
        }
        // Connectie creëeren
        $conn = new mysqli("localhost", "root", "", "project-friet"); 
        // Connectie checken
        if ($conn->connect_errno) {
            die("Connectie mislukt: " . $conn->connect_error);
        }
        // Als de gebruiker heeft aangeduid dat die wilt registreren (default optie)
        if ($_REQUEST["registreren"] == "1") {
            // Een insert statement declareren
            $sql = "SELECT 'user-id' FROM users WHERE 'user-name' = ?";
            // Een insert statement voorbereiden
            if ($stmt = $conn->prepare($sql)) {
                // Variabelen binden aan de voorbereidde insert als parameters
                $stmt->bind_param("s", $param_username);
                // Parameters bepalen
                $param_username = trim($_SESSION["gbr"]);
                // Proberen de voorbereidde statement uit te voeren
                if ($stmt->execute()) {
                    // Resultaat bewaren
                    $stmt->store_result();
                    // Als het resultaat al één of meerdere keren voorkomt
                    if ($stmt->num_rows >= 1) {
                        echo "Deze gebruikersnaam is al in gebruik.111<br>
                        U zal worden herleidt naar de registratie pagina.<br>";
                        header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                        exit();
                    }
                } else {
                    echo "Oops! Iets ging mis met het controleren van de gebruikersnaam, u word terug gestuurd.";
                    header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                    exit();
                } 
                // Statement sluiten
                $stmt->close();
            }
            // Zien als het paswoord leeg is of niet
            if (empty($_SESSION["pwd"])) {
                echo "U heeft geen passwoord ingegeven.<br>
                U zal worden herleidt naar de registratie pagina.<br>";
                header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                exit();
            }
            // Zien als er input errors zijn voordat we iets in de database steken
            if (!(empty($_SESSION["pwd"]) && empty($_SESSION["gbr"]))) {   
                // Een insert statement declareren
                $sql = "INSERT INTO users (`user-name`, `user-pass`) VALUES (?, ?)";
                // Een insert statement voorbereiden
                if ($stmt = $conn->prepare($sql)) {
                    // Variabelen binden aan de voorbereidde insert als parameters
                    $stmt->bind_param("ss", $param_username, $param_password);
                    // Parameters declareren
                    $param_username = $_SESSION["gbr"];
                    $param_password = password_hash($_SESSION["pwd"], PASSWORD_DEFAULT); // Creëert een paswoord hash
                    
                    // Proberen de voorbereidde statement uit te voeren
                    if ($stmt->execute()) {
                        echo "Bedankt om te registreren.<br>
                        U zal worden herleidt naar de registratie pagina.<br>";
                        header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                        exit();
                    } else {
                        echo "Oops! Iets ging fout bij het registreren.<br>
                        U zal worden herleidt naar de registratie pagina.<br>";
                        header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                        exit();
                    }  
                    // Statement sluiten
                    $stmt->close();
                }
            } else {
                echo "Oops! Ofwel is er geen paswoord, ofwel geen gebruikersnaam ingegeven.<br>
                U zal worden herleidt naar de registratie pagina.<br>";
                header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                exit();
            }  
            // Connectie beëindigen
            $conn->close();
        } // Als de gebruiker heeft aangeduid dat die niet wilt registreren
        else if ($_REQUEST["registreren"] == "0") {
            // Een insert statement declareren
            $sql = "SELECT `user-pass` FROM users WHERE `user-name` = ?";
            // Een insert statement voorbereiden
            if ($stmt = $conn->prepare($sql)) {
                // Variabelen binden aan de voorbereidde insert als 'parameters'
                $stmt->bind_param("s", $param_username);
                // Parameters bepalen
                $param_username = trim($_REQUEST["eName"]);
                // Proberen de voorbereidde statement uit te voeren
                if ($stmt->execute()) {
                    // Resultaat bewaren
                    $stmt->store_result();
                    // Resultaat binden (voor tijdelijke 'opslag')
                    $stmt->bind_result($result);
                    // Als de 'fetch' lukt, bepalen we de te vergelijken met hash
                    if ($stmt->fetch()){
                       $hash = $result;
                    }
                    // Resultaat vrij laten
                    $stmt->free_result();
                } else {
                    echo "Oops! Iets ging mis met het controleren van het passwoord, u word terug gestuurd.";
                    header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                    exit();
                } 
                // Statement sluiten
                $stmt->close();
            }
            // De $_REQUEST["pass"] vergelijken we nu met onze hash
            if (password_verify($_REQUEST["pass"], $hash) == true) {
                echo "Bedankt om in te loggen.<br>";
                echo 'Last page: '.$_SESSION['lastpage'];
                // De gebruiker zijn session word aangeduid als ingelogged
                $_SESSION["loggedIn"] = true;
            } else {
                echo "Sorry, maar iets ging fout bij de paswoord verificatie.<br>
                U zal worden herleidt naar de registratie pagina.<br>";
                echo $_REQUEST["pass"];
                echo $hash;
                header("Refresh: 4; url=/project--friet-/login.php", true, 0);
                exit();
            }
            // Connectie beëindigen
            $conn->close();
        }
    }
    else {
        // From https://stackoverflow.com/questions/768431/how-do-i-make-a-redirect-in-php?page=1&tab=scoredesc#tab-top
        // User Hammad Khan
        // Learn output buffering dammit: https://stackoverflow.com/questions/2832010/what-is-output-buffering
        // http://web.archive.org/web/20101216035343/http://dev-tips.com/featured/output-buffering-for-web-developers-a-beginners-guide
        echo "Sorry, maar dit mag niet.<br>";
        header("Refresh: 4; url=/project--friet-/login.php", true, 0);
        exit();
    }
    ?>
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
                        <form class="main_form">
                            <div class="row">
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
<?php ob_end_flush(); ?>