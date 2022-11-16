<?php
require '../../DB.php';

$db = new DB('domaci');

$naziv = $_POST['naziv'];
$pocetna = $_POST['pocetna'];
$krajnja = $_POST['krajnja'];
$vreme = $_POST['vreme'];

$query = "insert into voznja (naziv, pocetna, krajnja, vreme)
values ('$naziv', '$pocetna', '$krajnja', '$vreme')";

if ($db->connection->query($query)) {
    echo "Kompanija je uspešno sačuvana!";
} else {
    echo "Došlo je do greške! Kompanija nije sačuvana!";
}
?>