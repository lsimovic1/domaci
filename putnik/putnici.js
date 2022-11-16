$(document).ready(function () {
    prikaziPutnike();
    dodajPutnika();
    obrisiPutnika();
    vratiPutnika();
    azurirajPutnika();
    pretraga();
    napuniSortTabelu();
    sortiranje();
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

                        prikaziPutnike();

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

function vratiPutnika() {

    $(document).on('click', '#btn_edit', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/get.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',

            success: function (data) {
                $('#izmenaPutnika').modal('show');
                $('#putnik_id').val(data.id);
                $('#upd_ime').val(data.ime);
                $('#upd_prezime').val(data.prezime);
                $('#upd_voznja').val(data.voznja_id);
            }
        });
    })

}


function azurirajPutnika() {

    $(document).on('click', '#btn_update', function () {


        var id = $('#voznja_id').val();
        var ime = $('#upd_ime').val();
        var prezime = $('#upd_prezime').val();
        var voznja = $('#upd_voznja').val();

        if (id == '' || ime == '' || prezime == '' || voznja == '') {
            $('#upd_praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {

            $.ajax({
                url: 'crud/update.php',
                method: 'post',
                data: {
                    id: id,
                    ime: ime,
                    prezime: prezime,
                    voznja: voznja,
                },

                success: function (data) {
                    $('#upd_uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');
                    prikaziPutnike();
                }
            })
        }
    });
}

function pretraga() {

    $(document).on('keyup', '#bar', function () {

        var key = this.value;

        $.ajax(
            {
                url: 'search.php',
                method: 'post',
                data: { key: key },
                success: function (data) {
                    {
                        $('#searchtabela').html(data);
                    }
                }
            }
        )

    })
}

function napuniSortTabelu() {
    $.ajax(
        {
            url: 'pocetak.php',
            success: function (data) {
                {
                    $('#tabelasort').html(data);
                }
            }
        }
    )
}


function sortiranje() {

    $(document).on('click', 'th', function () {

        let kolona = $(this).attr('id');
        let sort = $(this).attr('name');

        $.ajax(
            {
                url: 'sort.php',
                method: 'post',
                data: { kolona: kolona, sort: sort },
                success: function (data) {
                    {
                        $('#tabelasort').html(data);
                    }
                }
            }
        )

    })

}