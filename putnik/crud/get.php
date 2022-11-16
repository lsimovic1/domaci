<?php

require '../../DB.php';
require '../Putnik.php';
$db = new DB('domaci');

$id = $_POST['id'];

$query = "select * from putnik where id=" . $id;
$data = $db->connection->query($query);

while ($row = $data->fetch_object()) {
    $putnik = new Putnik();
    $putnik->id = $row->id;
    $putnik->ime = $row->ime;
    $putnik->prezime = $row->prezime;
    $putnik->voznja_id = $row->voznja_id;
}

echo json_encode($putnik);
