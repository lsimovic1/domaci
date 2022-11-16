<?php

require '../../DB.php';
$db = new DB('domaci');

$id = $_POST['id'];

$query = "delete from voznja where id=" . $id;

if ($db->connection->query($query)) {
    echo 'Voznja je uspešno obrisana!';
} else {
    echo 'Došlo je do greške! Voznja nije obrisana!';
}
?>