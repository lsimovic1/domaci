<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voznje</title>
</head>
<body>
    
        <?php
        include('../DB.php');
        $db = new DB('domaci');
        ?>

    <div class="container">
        <div class="grupa">
            <button id="dodajVoznju" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#novaVoznja" style="width:250px; margin-left:450px;">Nova voznja</button>

            <div class="alert alert-success collapse text-center" role="alert" id="uspesnoObrisan">

            </div>

            <div id="tabelaVoznja">
            </div>
        </div>

 


        <!-- Nova kompanija -->
        <div class="modal fade" id="novaVoznja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 180px;">Voznja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger collapse text-center" role="alert" id="praznaPolja">
                            Sva polja moraju biti popunjena!
                        </div>

                        <div class="alert alert-success collapse text-center" role="alert" id="uspesnoSacuvan">
                        </div>

                        <div class="mb-2">
                            <label for="addnaziv" class="form-label">Naziv kompanije: </label>
                            <input type="text" class="form-control" id="addnaziv">
                        </div>
                        <div class="mb-2">
                            <label for="addpocetna" class="form-label">Pocetna lokacija: </label>
                            <input type="text" class="form-control" id="addpocetna">
                        </div>
                        <div class="mb-2">
                            <label for="addkrajnja" class="form-label">Krajnja lokacija: </label>
                            <input type="text" class="form-control" id="addkrajnja">
                        </div>
                        <div class="mb-2">
                            <label for="addvreme" class="form-label">Vreme: </label>
                            <input type="date" class="form-control" id="addvreme">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn_save" class="btn btn-primary" style="margin-right:170px;">Sacuvaj</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" tabindex="-1" id="izmenaVoznje">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="margin-left: 145px;">Voznja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger collapse text-center" role="alert" id="upd_praznaPolja">
                            Sva polja moraju biti popunjena!
                        </div>

                        <div class="alert alert-success collapse text-center" role="alert" id="upd_uspesnoSacuvan">
                        </div>

                        <input type="hidden" id="voznja_id">

                        <div class="mb-2">
                            <label for="upd_naziv" class="form-label">Naziv: </label>
                            <input type="text" class="form-control" id="upd_naziv">
                        </div>
                        <div class="mb-2">
                            <label for="upd_pocetna" class="form-label">Pocetna destinacija: </label>
                            <input type="text" class="form-control" id="upd_pocetna">
                        </div>
                        <div class="mb-2">
                            <label for="upd_krjanja" class="form-label">Krajnja destinacija: </label>
                            <input type="text" class="form-control" id="upd_krajnja">
                        </div>
                        <div class="mb-2">
                            <label for="upd_vreme" class="form-label">Vreme: </label>
                            <input type="date" class="form-control" id="upd_vreme">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_update">Sacuvaj izmene</button>
                    </div>
                </div>
            </div>
        </div>






    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="voznja.js"></script>

</body>
</html>