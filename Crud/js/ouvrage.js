$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			data: 'get_ouvrage=true',
			dataType: 'json',
			async: false,
			success: function (result, status) {
				$(result).each(function () {
					let $ouvrage = '<tr class="O' + this.isbn + '">\n' +
						'      <th scope="row">' + this.isbn + '</th>\n' +
						'      <td>' + this.nbPage + '</td>\n' +
						'      <td>' + this.titre + '</td>\n' +
						'      <td>' + this.codePays + '</td>\n' +
						'      <td><button class="update_ouvrage btn btn-warning ml-2 mr-2" id="' + this.isbn +
						'">Modifier</button>' +
						'<button class="btn btn-danger delete_ouvrage" id="' + this.isbn +
						'">Supprimer</button></td>     </tr>'
					$(".list-ouvrage").append($ouvrage)
				})
			},
			error: function (xhr, status, error) {
				console.log("Une erreur de type " + status + " s'est produite. \n " + error)
			}
		}
	)

	$.get(
		{
			url: 'php/treatment.php',
			async: false,
			data: 'get_pays=true',
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function (i) {
					let $pays = '<option value="' + this.codePays + '">' + this.codePays + '</option>'
					$("#listPays").append($pays)
					$("#update_listPays").append($pays)
				})
			}
		}
	)

	let $formOuvrage = $('.ouvrage-form')
	$formOuvrage.css('display', 'none')
	$('.ouvrage-update-form').css('display', 'none')

	$('.ouvrage-toggle').click(function () {
		$formOuvrage.slideToggle()
	})

	$formOuvrage.submit(function (e) {
        e.preventDefault()
        let isbn = $('.isbn').val()
        let titreouvrage = $('.titreouvrage').val()
		let nbPages = $('.nbpages').val()
		let codePays = $('#listPays').val()
        $.post('php/treatment.php', {
            add_ouvrage: true,
            isbn: isbn,
            titreouvrage: titreouvrage,
            nbpages: nbPages,
            codePays: codePays
        }).done(function (data) {
            let $ouvrage = '<tr class="O' + isbn + '">\n' +
				'      <th scope="row">' + isbn + '</th>\n' +
				'      <td>' + nbPages + '</td>\n' +
				'      <td>' + titreouvrage + '</td>\n' +
				'      <td>' + codePays + '</td>\n' +
				'      <td><button class="update_ouvrage btn btn-warning ml-2 mr-2" id="' + isbn +
				'">Modifier</button>' +
				'<button class="btn btn-danger delete_ouvrage" id="' + isbn +
				'">Supprimer</button></td>     </tr>'
            $(".list-ouvrage").append($ouvrage)
            $('.isbn').val("")
            $('.titreouvrage').val("")
            $('.nbpages').val("")
            $formOuvrage.slideToggle()
        })
    })

    $('.update_ouvrage').click(function (e) {
		$('.update_isbn').val(this.id)
		let $row = $('.O' + this.id)
		$('.update_nbpages').val($row.children('td:eq(0)').text())
		$('.update_titreouvrage').val($row.children('td:eq(1)').text())
		$('.ouvrage-update-form').slideDown()
	})
    $('.update-submit').click(function (e) {
        e.preventDefault()
        let isbn = $('.update_isbn').val()
        let titreouvrage = $('.update_titreouvrage').val()
		let nbPages = $('.update_nbpages').val()
		let codePays = $('#update_listPays').val()
        $.post('php/treatment.php', {
            update_ouvrage: true,
            isbn: isbn,
            titreouvrage: titreouvrage,
            nbpages: nbPages,
            codePays: codePays
        }).done(function () {
            let $row = $('.O' + isbn)
            $row.children('td:eq(0)').text(nbPages)
            $row.children('td:eq(1)').text(titreouvrage)
            $row.children('td:eq(2)').text(codePays)
        })
    })

    $('.delete_ouvrage').click(function (e) {
        e.preventDefault()
        let isbn = this.id
        $.post('php/treatment.php', {
            delete_ouvrage: true,
            isbn: isbn
        }).done(function () {
            let $row = ".O" + isbn
            $($row).remove()
        })
    })
})
