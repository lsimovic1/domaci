<?php

require('../../DB.php');
require('../../putnik/Putnik.php');
$db = new DB('domaci');

$putnik = new Putnik();
$putnik->id = $_POST['id'];
$putnik->ime = $_POST['ime'];
$putnik->prezime = $_POST['prezime'];
$putnik->voznja_id = $_POST['voznja'];

$query = "update putnik set ime='$putnik->ime', prezime='$putnik->prezime',  
                voznja_id='$putnik->voznja_id' where id='$putnik->id'";
$db->connection->query($query);

if ($db) {
    echo 'Putnik je uspešno izmenjen!';
} else {
    echo 'Došlo je do greške! Putnik nije izmenjen!';
}
