<?php

require "../../DB.php";
$db = new DB('domaci');
?>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Voznja</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $kljuc = $_POST['key'];

        $query = "select p.id, p.ime, p.prezime, v.naziv from putnik p join voznja v on p.voznja_id=v.id where
         p.id like '%" . $kljuc . "%' or p.ime like '%" . $kljuc . "%' or p.prezime like '%" . 
                 $kljuc . "%' or v.naziv like '%" . $kljuc . "%'";
        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class="text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->ime;  ?></td>
                <td><?php echo $row->prezime;  ?></td>
                <td><?php echo $row->naziv; ?></td>
            </tr>
        <?php endwhile; ?>

    </tbody>


</table>