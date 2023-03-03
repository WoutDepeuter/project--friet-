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
echo "<h1>";
echo "u bestelling";
echo "<center>";
echo "Naam: " . $naam . "<br>";
echo "Achternaam: " . $achternaam . "<br>";
echo "Straat: " . $straat . "<br>";
echo "Huisnummer: " . $huisnummer . "<br>";
echo "Postcode: " . $postcode . "<br>";
echo "Kleine friet: " . $kleinefriet . "<br>";
echo "Grote friet: " . $grotefriet . "<br>";
echo "Curryworst: " . $curryworst . "<br>";
echo "Viandel: " . $viandel . "<br>";
echo "Kipnuggets: " . $kipnuggets . "<br>";
echo "Loempia: " . $loempia . "<br>";
echo "Stoofvlees: " . $stoofvlees . "<br>";
echo "Kaaskroket: " . $kaaskrokket . "<br>";
echo "Cervella: " . $cervella . "<br>";
echo "Berenpoot: " . $berenpoot . "<br>";
echo "Mayonaise: " . $mayonaise . "<br>";
echo "Ketchup: " . $ketchup . "<br>";
echo "</center>";
echo "<\h1>"
?>
