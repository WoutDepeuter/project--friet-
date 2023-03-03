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

<!--declaratie variablen -->
<?php
$naam = $_POST['naam'];
  $achternaam = $_POST['achternaam'];
  $straat = $_POST['straat'];
  $huisnummer = $_POST['huisnummer'];
  $postcode = $_POST['postcode'];
  $kleinefriet = $_POST['hoeveel1'];
  $grotefriet = $_POST['hoeveel2'];
  $curryworst = $_POST['hoeveel3'];
  $viandel = $_POST['hoeveel4'];
  $kipnuggets = $_POST['hoeveel5'];
  $loempia = $_POST['hoeveel6'];
  $stoofvlees = $_POST['hoeveel7'];
  $kaaskrokket = $_POST['hoeveel8'];
  $cervella = $_POST['hoeveel9'];
  $berenpoot = $_POST['hoeveel10'];
  $mayonaise = $_POST['hoeveel11'];
  $ketchup = $_POST['hoeveel12'];
  $potjesaus = $_POST['hoeveel13'];
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'project_friet1'
  ?>
  <!-- einde declaratie -->
<? echo $naam , $achternaam ,$straat, $huisnummer, $postcode , $kleinefriet, $grotefriet, $curryworst, $viandel, $kipnuggets, $loempia,$stoofvlees;
?>

<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Verbinding mislukt: " . mysqli_connect_error());
}

// SQL INSERT statement
$sql = "INSERT INTO bestelling (naam, achternaam, straat, huisnummer, postcode, kleinefriet, grotefriet, curryworst, viandel, kipnuggets, loempia, stoofvlees, kaaskrokket, cervella, berenpoot, mayonaise, ketchup, prijs)
        SELECT '$naam', '$achternaam', '$straat', '$huisnummer', '$postcode', '$kleinefriet', '$grotefriet', '$curryworst', '$viandel', '$kipnuggets', '$loempia', '$stoofvlees', '$kaaskrokket', '$cervella', '$berenpoot', '$mayonaise', '$ketchup',
               SUM(CASE 
                 WHEN Soort = 'kleinefriet' THEN prijs * $kleinefriet
                 WHEN Soort = 'grotefriet' THEN prijs * $grotefriet
                 WHEN Soort = 'curryworst' THEN prijs * $curryworst
                 when soort = 'viandel' THEN prijs * $viandel
                 when soort = 'kipnuggets' then prijs * $kipnuggets
                 when soort = 'loempia' then prijs * $loempia
                 when soort = 'stoofvlees' then prijs * $stoofvlees
                 when soort = 'kaaskrokket' then prijs * $kaaskrokket
                 when soort = 'cervella' then prijs * $cervella
                 when soort = 'berenpoot' then prijs * $berenpoot
                 when soort = 'mayonaise' then prijs * $mayonaise
                 when soort = 'ketchup' then prijs * $ketchup
                 ELSE 0 -- Handle other cases if needed
               END)
        FROM stock";
if (mysqli_query($conn, $sql)) {
  echo "Nieuwe record succesvol toegevoegd";
} else {
  echo "Fout bij het toevoegen van record: " . mysqli_error($conn);
}
echo "<p>";

echo "<center>" ;
echo '<h1>' . "uw bestelling".'</h1>'.'<br>';
echo "Naam: " . $naam . "<br>";
echo "Achternaam: " . $achternaam . 'stuk'. "<br>";
echo "Straat: " . $straat . "<br>";
echo "Huisnummer: " . $huisnummer . "<br>";
echo "Postcode: " . $postcode . "<br>";
echo "Kleine friet: " . $kleinefriet .' stuk'. "<br>";
echo "Grote friet: " . $grotefriet .' stuk'. "<br>";
echo "Curryworst: " . $curryworst . ' stuk'."<br>";
echo "Viandel: " . $viandel . ' stuk'."<br>";
echo "Kipnuggets: " . $kipnuggets . ' stuk'."<br>";
echo "Loempia: " . $loempia .'stuk'. "<br>";
echo "Stoofvlees: " . $stoofvlees .' stuk'. "<br>";
echo "Kaaskroket: " . $kaaskrokket . ' stuk'."<br>";
echo "Cervella: " . $cervella .' stuk'. "<br>";
echo "Berenpoot: " . $berenpoot .' stuk'. "<br>";
echo "Mayonaise: " . $mayonaise . ' stuk'."<br>";
echo "Ketchup: " . $ketchup . ' stuk'."<br>";
echo "</center>";
echo "<\h1>"
?>

