$(document).ready(function () {
    prikaziPutnike();
    dodajPutnika();
    obrisiPutnika();
});


function prikaziPutnike() {

    $.ajax(
        {
            url: 'crud/prikaz.php',
            success: function (data) {
                {
                    $('#tabelaPutnici').html(data);
                }
            }
        }
    )
}

function dodajPutnika() {

    $(document).on('click', '#btn_save', function () {

        var ime = $('#addime').val();
        var prezime = $('#addprezime').val();
        var voznja = $('#addvoznja').val();


        if (ime == '' || prezime == '' || voznja == '') {
            $('#praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {
            $.ajax(
                {
                    url: 'crud/save.php',
                    method: 'post',
                    data: { ime: ime, prezime: prezime,  voznja: voznja },

                    success: function (data) {
                        $('#praznaPolja').hide();
                        $('#uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');

                        prikaziZaposlene();

                        $('#addime').val('');
                        $('#addprezime').val('');
                        $('#addvoznja').val(1);

                    }
                });
        }
    })
}

function obrisiPutnika() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#uspesnoObrisan').fadeIn().html(data).delay(1800).fadeOut('slow');
                prikaziPutnike();
            }
        })
    })
}