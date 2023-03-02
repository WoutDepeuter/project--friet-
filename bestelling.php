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
  $potjesaus = $_POST['hoeveel13']
  ?>
  <!-- einde declaratie -->
<? echo $naam , $achternaam ,$straat, $huisnummer, $postcode , $kleinefriet, $grotefriet, $curryworst, $viandel, $kipnuggets, $loempia,$stoofvlees;
?>

<?php

// SQL INSERT statement
$sql = "INSERT INTO bestellingen (naam, achternaam, straat, huisnummer, postcode, kleinefriet, grotefriet, curryworst, viandel, kipnuggets, loempia, stoofvlees, kaaskrokket, cervella, berenpoot, mayonaise, ketchup,potjespeciaal) 
        VALUES ('$naam', '$achternaam', '$straat', '$huisnummer', '$postcode', '$kleinefriet', '$grotefriet', '$curryworst', '$viandel', '$kipnuggets', '$loempia', '$stoofvlees', '$kaaskrokket', '$cervella', '$berenpoot', '$mayonaise', '$ketchup','$potjesaus')";

// Execute the INSERT statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
