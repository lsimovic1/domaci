<?php

require "../../DB.php";
$db = new DB('domaci');

$kolona = $_POST['kolona'];
$sort = $_POST['sort'];
?>


<table class="table table-bordered mt-2" table style="background-color:white">
    <thead>
        <tr class="text-center">
            <th id="id" name="<?php if ($kolona == 'id' && $sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">ID</th>
            <th id="ime" name="<?php if ($kolona == 'ime' && $sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">Ime</th>
            <th id="prezime" name="<?php if ($kolona == 'prezime' && $sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">Prezime</th>
            <th id="naziv" name="<?php if ($kolona == 'naziv' && $sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        } ?>">Voznja</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select p.id, p.ime, p.prezime,  v.naziv from putnik p join voznja v on p.voznja_id=v.id
         order by " . $kolona . " " . $sort . "";

        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class=" text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->ime;  ?></td>
                <td><?php echo $row->prezime;  ?></td>
                <td><?php echo $row->naziv; ?></td>

            </tr>
        <?php endwhile; ?>

    </tbody>


</table>