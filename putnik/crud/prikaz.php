<?php

require "../../DB.php";
$db = new DB('domaci');
?>

<table class="table table-bordered mt-2" table style="background-color:white">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Voznja</th>
            <th>Operacije</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select p.id, p.ime, p.prezime, v.naziv from putnik p join voznja v on p.voznja_id=v.id order by p.id asc";
        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class="text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->ime;  ?></td>
                <td><?php echo $row->prezime;  ?></td>
                <td><?php echo $row->naziv; ?></td>
                <td>
                    <button class="btn btn-primary" id="btn_edit" value="<?php echo $row->id; ?>">Izmeni</button>
                    <button class="btn btn-danger" id="btn_delete" value="<?php echo $row->id; ?>">Obriši</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>


</table>
