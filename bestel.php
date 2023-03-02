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

    <!-- besteldeel dingske ---->
  <!--formulier---->
<br>
  <br>
  <br>
  <section>

<br>
  <center>
    <br>
    <h1> Bestel hier onze frietjes en onze lekker frituursnack</h1>
    <table>
      <form action="besteling.php" method="post">
      <tr>
    <td><h1>contact gegevens</h1></td>
</tr>
        <tr>
          <td><label for="naam"></label></td>
          <td><input type="text" id="naam" name="naam" placeholder="naam" required /></td>
        </tr>
        </tr>
        <tr>
          <td> <label for="achternaam"></label>
          <td><input type="text" id="achternaam" name="achternaam" placeholder="achternaam" required /></td>
        </tr>
        <tr>
          <td><label for="straat"></label></td>
          <td> <input type="text" id="straat" name="straat" placeholder="straat" required /></td>
        </tr>
        <tr>
          <td><label for="huisnummer"></label></td>
          <td><input type="number" id="huisnummer" name="huisnummer" placeholder="huisnummer" min 0 required /> </td>
        </tr>
        <tr>
          <td><label for="postcode"></label></td>
          <td><input type="number" id="postcode" name="postcode" placeholder="postcode" required /></td>
        </tr>


<tr>
    <td><h1>frietjes</h1></td>
</tr>


        <tr>
          <td><label for="hoeveel">grote friet</label></td>
          <td> <input type="number" id="hoeveel1" name="hoeveel1" placeholder="hoeveel" min=0  required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">kleine friet</label></td>
          <td> <input type="number" id="hoeveel2" name="hoeveel2" placeholder="hoeveel" min=0  required/> </td>
         
        </tr>

        <tr>
    <td><h1>vleesjes</h1></td>
</tr>
  
        <tr>
          <td><label for="hoeveel">curryworst</label></td>
          <td> <input type="number" id="hoeveel3" name="hoeveel3" placeholder="hoeveel" min=0 required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">viandel </label></td>
          <td> <input type="number" id="hoeveel4" name="hoeveel4" placeholder="hoeveel" min=0  required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">kipnuggets</label></td>
          <td> <input type="number" id="hoeveel5" name="hoeveel5" placeholder="hoeveel" min=0 required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">loempia</label></td>
          <td> <input type="number" id="hoeveel6" name="hoeveel6" placeholder="hoeveel" min=0 required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">stoofvlees</label></td>
          <td> <input type="number" id="hoeveel7" name="hoeveel7" placeholder="hoeveel" min=0 required /> </td>
        </tr>

          <td><label for="hoeveel">kaaskrokket </label></td>
          <td> <input type="number" id="hoeveel8" name="hoeveel8" placeholder="hoeveel" min=0 required /> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">cervella </label></td>
          <td> <input type="number" id="hoeveel9" name="hoeveel9" placeholder="hoeveel" min=0 required /> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">berenpoot </label></td>
          <td> <input type="number" id="hoeveel10" name="hoeveel10" placeholder="hoeveel" min=0 required /> </td>
        </tr>
        <tr>
    <td><h1>sausjes</h1></td>
</tr>
        <tr>
          <td><label for="hoeveel">mayonaise</label></td>
          <td> <input type="number" id="hoeveel11" name="hoeveel11" placeholder="hoeveel" min=0  required/> </td>
        <tr>
          <td><label for="hoeveel">ketchup</label></td>
          <td> <input type="number" id="hoeveel12" name="hoeveel12" placeholder="hoeveel" min=0  required/> </td>
        </tr>
        <tr>
          <td><label for="hoeveel">potje speciaal saus </label></td>
          <td> <input type="number" id="hoeveel13" name="hoeveel13" placeholder="hoeveel" min=0  required/> </td>
        </tr>
        <tr>
        </tr>
    

    </table>
    <br>
    <div class="btn_box">
      <button>
        <h2>bestel</h2>
            </button>
      </table>
  </center>  </form>
</section>

 
                
                 
        <!-- end veg section -->

    
    
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