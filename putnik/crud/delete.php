<?php

require '../../DB.php';
$db = new DB('domaci');

$id = $_POST['id'];

$query = "delete from putnik where id=" . $id;

if ($db->connection->query($query)) {
    echo 'Putnik je uspešno obrisan!';
} else {
    echo 'Došlo je do greške! Putnik nije obrisan!';
}
