$(document).ready(function () {
    prikaziVoznje();
    dodajVoznju();
    obrisiVoznju();

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