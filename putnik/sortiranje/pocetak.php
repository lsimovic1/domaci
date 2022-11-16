<?php

require "../../DB.php";
$db = new DB('domaci');
?>

<table class="table table-bordered mt-2">
    <thead>
        <tr class="text-center">
            <th id="id" name="asc">ID</th>
            <th id="ime" name="asc">Ime</th>
            <th id="prezime" name="asc">Prezime</th>
            <th id="naziv" name="asc">Voznja</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select p.id, p.ime, p.prezime, v.naziv from putnik p join voznja v on p.voznja_id=v.id 
                        order by p.id asc";
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