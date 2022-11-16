<?php

require('../../DB.php');
require('../../voznja/Voznja.php');
$db = new DB('domaci');

$voznja = new Voznja();
$voznja->id = $_POST['id'];
$voznja->naziv = $_POST['naziv'];
$voznja->pocetna = $_POST['pocetna'];
$voznja->krajnja = $_POST['krajnja'];
$voznja->vreme = $_POST['vreme'];


$query = "update voznja set naziv='$voznja->naziv', pocetna='$voznja->pocetna', krajnja='$voznja->krajnja'
                            , vreme='$voznja->vreme' where id=$voznja->id";
$db->connection->query($query);

if ($db) {
    echo 'Voznja je uspešno izmenjena!';
} else {
    echo 'Došlo je do greške! Voznja nije izmenjena!';
}
