<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    <title>Putnici</title>
</head>

<body>

    <?php
    include('../DB.php');
    $db = new DB('domaci');
    ?>

    <div class="container">
        <div class="grupa">
            <button id="dodajPutnika" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#noviPutnik" style="width:250px; ">Novi putnik</button>

            <div class="alert alert-success collapse text-center" role="alert" id="uspesnoObrisan">

            </div>

            <div id="tabelaPutnici">
                <!-- Tabela iz prikaz.php -->
            </div>
        </div>


        <!-- Modal novi zaposleni -->
        <div class="modal fade" id="noviPutnik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 180px;">Putnici</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger collapse text-center" role="alert" id="praznaPolja">
                            Sva polja moraju biti popunjena!
                        </div>

                        <div class="alert alert-success collapse text-center" role="alert" id="uspesnoSacuvan">
                        </div>

                        <div class="mb-2">
                            <label for="addime" class="form-label">Ime: </label>
                            <input type="text" class="form-control" id="addime">
                        </div>
                        <div class="mb-2">
                            <label for="addprezime" class="form-label">Prezime: </label>
                            <input type="text" class="form-control" id="addprezime">
                        </div>
                        <div class="mb-2">
                            <label for="addvoznja" class="form-label">Voznja: </label>
                            <select name="addvoznja" id="addvoznja" class="form-select">
                                <?php
                                $query = "select * from voznja";
                                $data = $db->connection->query($query);

                                while ($row = $data->fetch_object()) :
                                ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->naziv; ?>
                                    <?php echo ": "; ?><?php echo $row->pocetna; ?><?php echo "-"; ?><?php echo $row->krajnja; ?>
                                    <?php echo ": "; ?><?php echo $row->vreme; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="button" id="btn_save" class="btn btn-primary" style="margin-left: 200px; margin-top: 15px;">Sacuvaj</button>

                    </div>
                </div>
            </div>
        </div>



        <!-- Modal izmena zaposlenog -->
        <div class="modal fade" id="izmenaPutnika" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 180px;">Putnik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-body">
                            <div class="alert alert-danger collapse text-center" role="alert" id="upd_praznaPolja">
                                Sva polja moraju biti popunjena!
                            </div>

                            <div class="alert alert-success collapse text-center" role="alert" id="upd_uspesnoSacuvan">
                            </div>

                            <input type="hidden" id="putnik_id">

                            <div class="mb-2">
                                <label for="upd_ime" class="form-label">Ime: </label>
                                <input type="text" class="form-control" id="upd_ime">
                            </div>
                            <div class="mb-2">
                                <label for="upd_prezime" class="form-label">Prezime: </label>
                                <input type="text" class="form-control" id="upd_prezime">
                            </div>
                            <div class="mb-2">
                                <label for="upd_voznja" class="form-label">Voznja: </label>
                                <select name="voznja" id="upd_voznja" class="form-select">
                                    <?php
                                    $query = "select * from voznja";
                                    $data = $db->connection->query($query);

                                    while ($row = $data->fetch_object()) :
                                    ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->naziv; ?>
                                    <?php echo ": "; ?><?php echo $row->pocetna; ?><?php echo "-"; ?><?php echo $row->krajnja; ?>
                                    <?php echo ": "; ?><?php echo $row->vreme; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn_update" class="btn btn-primary">Sacuvaj izmene</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="putnici.js"></script>

</body>

</html>