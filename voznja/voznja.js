$(document).ready(function () {
    prikaziVoznje();
    dodajVoznju();
    obrisiVoznju();
    azurirajVoznju();

});

function prikaziVoznje() {

    $.ajax(
        {
            url: 'crud/prikaz.php',
            success: function (data) {
                {
                    $('#tabelaVoznja').html(data);
                }
            }
        }
    )
}

function dodajVoznju() {

    $(document).on('click', '#btn_save', function () {

        var naziv = $('#addnaziv').val();
        var pocetna = $('#addpocetna').val();
        var krajnja = $('#addkrajnja').val();
        var vreme = $('#addvreme').val();


        if (naziv == '' || pocetna == '' || krajnja == '' || vreme == '') {
            $('#praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {
            $.ajax(
                {
                    url: 'crud/save.php',
                    method: 'post',
                    data: { naziv: naziv, pocetna: pocetna, krajnja: krajnja,vreme: vreme },

                    success: function (data) {
                        $('#praznaPolja').hide();
                        $('#uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');

                        prikaziVoznje();

                        $('#addnaziv').val('');
                        $('#addpocetna').val('');
                        $('#addkrajnja').val('');
                        $('#addvreme').val('');


                    }
                });
        }
    })

}

function obrisiVoznju() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#uspesnoObrisan').fadeIn().html(data).delay(1800).fadeOut('slow');
                prikaziVoznje();
            }
        })
    })
}

function azurirajVoznju() {

    $(document).on('click', '#btn_update', function () {

        var id = $('#voznja_id').val();
        var naziv = $('#upd_naziv').val();
        var pocetna = $('#upd_pocetna').val();
        var krajnja = $('#upd_krajnja').val();
        var vreme = $('#upd_vreme').val();


        if (id == '' || naziv == '' || pocetna == '' || krajnja == '' || vreme == '') {
            $('#upd_praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {

            $.ajax({
                url: 'crud/update.php',
                method: 'post',
                data: {
                    id: id,
                    naziv: naziv,
                    pocetna: pocetna,
                    krajnja: krajnja,
                    vreme: vreme,
                },

                success: function (data) {
                    $('#upd_uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');
                    prikaziVoznje();
                }
            })
        }
    });
}