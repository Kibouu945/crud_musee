$(function () {

    $.get(
        {
            url: 'php/treatment.php',
            async: false,
            data: 'get_referencer=true',
            dataType: 'json',
            success: function (result, status) {
                $(result).each(function () {
                    let $referencer = '<tr class="R' + this.id + '">\n' +
                        '      <th scope="row">' + this.id + '</th>\n' +
                        '      <td>' + this.nomSite + '</td>\n' +
                        '      <td>' + this.numeroPage + '</td>\n' +
                        '      <td>' + this.isbn + '</td>\n' +
                        '      <td><button class="update_referencer btn btn-warning ml-2 mr-2" id="' + this.id +
                        '">Modifier</button>' +
                        '<button class="btn btn-danger delete_referencer" id="' + this.id +
                        '">Supprimer</button></td>     </tr>'
                    $(".list-referencer").append($referencer)
                })
            }
        }
    )

    $.get(
        {
            url: 'php/treatment.php',
            async: false,
            data: 'get_site=true',
            dataType: 'json',
            success: function (result, status) {
                $(result).each(function (i) {
                    let $site = '<option value="' + this.nomSite + '">' + this.nomSite + '</option>'
                    $("#listSite").append($site)
                    $("#update_listSite").append($site)
                })
            }
        }
    )

    $.get(
        {
            url: 'php/treatment.php',
            async: false,
            data: 'get_ouvrage=true',
            dataType: 'json',
            success: function (result, status) {
                $(result).each(function (i) {
                    let $ouvrage = '<option value="' + this.isbn + '">' + this.titre + '</option>'
                    $("#listOuvrage").append($ouvrage)
                    $("#update_listOuvrage").append($ouvrage)
                })
            }
        }
    )

    let $formRefenrencer = $('.referencer-form')
    $formRefenrencer.css('display', 'none')
    $('.referencer-update-form').css('display', 'none')

    $('.referencer-toggle').click(function () {
        $formRefenrencer.slideToggle()
    })

    $formRefenrencer.submit(function (e) {
        e.preventDefault()
        let nomSite = $('#listSite').val()
        let numPage = $('.numPage').val()
        let isbn = $('#listOuvrage').val()
        $.post('php/treatment.php', {
            add_referencer: true,
            nomSite: nomSite,
            numPage: numPage,
            isbn: isbn
        }).done(function (data) {
            let $referencer = '<tr>\n' +
                '      <th scope="row"></th>\n' +
                '      <td>' + nomSite + '</td>\n' +
                '      <td>' + numPage + '</td>\n' +
                '      <td>' + isbn + '</td>\n' +
                '      <td><button disabled class="update_referencer btn btn-warning ml-2 mr-2">Modifier</button>' +
                '<button disabled class="btn btn-danger delete_referencer">Supprimer</button></td>     </tr>'
            $(".list-referencer").append($referencer)
            $('.numPage').val("")
            $formRefenrencer.slideToggle()
        })
    })

    $('.update_referencer').click(function (e) {
        $('.update_id').val(this.id)
        $('.referencer-update-form').slideDown()
        let $row = $('.R' + this.id)
        $('.update_numPage').val($row.children('td:eq(1)').text())
    })
    $('.update-submit').click(function (e) {
        e.preventDefault()
        let id = $('.update_id').val()
        let nomSite = $('#update_listSite').val()
        let numPage = $('.update_numPage').val()
        let isbn = $('#update_listOuvrage').val()
        $.post('php/treatment.php', {
            update_referencer: true,
            id_referencer: id,
            nomSite: nomSite,
            numPage: numPage,
            isbn: isbn
        }).done(function (data) {
            let $row = $('.R' + id)
            $row.children('td:eq(0)').text(nomSite)
            $row.children('td:eq(1)').text(numPage)
            $row.children('td:eq(2)').text(isbn)
        })
    })

    $('.delete_referencer').click(function (e) {
        e.preventDefault()
        let id_referencer = this.id
        $.post('php/treatment.php', {
            delete_referencer: true,
            id_referencer: id_referencer
        }).done(function () {
            let $row = ".R" + id_referencer
            $($row).remove()
        })
    })
})
