<?php

require '../../DB.php';
require '../../voznja/Voznja.php';
$db = new DB('domaci');

$id = $_POST['id'];

$query = "select * from voznja where id=" . $id;
$data = $db->connection->query($query);

while ($row = $data->fetch_object()) {
    $voznja = new Voznja();
    $voznja->id = $row->id;
    $voznja->naziv = $row->naziv;
    $voznja->pocetna = $row->pocetna;
    $voznja->krajnja = $row->krajnja;
    $voznja->vreme = $row->vreme;
}

echo json_encode($voznja);
