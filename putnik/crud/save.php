<?php

require '../../DB.php';
require '../Putnik.php';
$db = new DB('domaci');

$putnik = new Putnik();
$putnik->ime = $_POST['ime'];
$putnik->prezime = $_POST['prezime'];
$putnik->voznja_id = $_POST['voznja'];

$query = "insert into putnik (ime, prezime, voznja_id) 
    values ('$putnik->ime', '$putnik->prezime',  '$putnik->voznja_id')";

if ($db->connection->query($query)) {
    echo "Putnik je uspešno sačuvan!";
} else {
    echo "Došlo je do greške! Putnik nije sačuvan!";
}
