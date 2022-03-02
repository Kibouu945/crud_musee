$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			async: false,
			data: 'get_bibliotheque=true',
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function () {
					let $bibliotheque = '<tr class="B' + this.id + '">\n' +
						'      <th scope="row">' + this.id + '</th>\n' +
						'      <td>' + this.numMus + '</td>\n' +
						'      <td>' + this.isbn + '</td>\n' +
						'      <td>' + this.date_achat + '</td>\n' +
						'      <td><button class="update_bibliotheque btn btn-warning ml-2 mr-2" id="' + this.id +
						'">Modifier</button>' +
						'<button class="btn btn-danger delete_bibliotheque" id="' + this.id +
						'">Supprimer</button></td>     </tr>'
					$(".list-bibliotheque").append($bibliotheque)
				})
			}
		}
	)

	$.get(
		{
			url: 'php/treatment.php',
			async: false,
			data: 'get_musee=true',
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function (i) {
					let $musee = '<option value="' + this.numMus + '">' + this.nomMus + '</option>'
					$("#listMusee").append($musee)
					$("#update_listMusee").append($musee)
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

	let $formBibliotheque = $('.bibliotheque-form')
	$formBibliotheque.css('display', 'none')
	$('.bibliotheque-update-form').css('display', 'none')

	$('.bibliotheque-toggle').click(function () {
		$formBibliotheque.slideToggle()
	})

	$formBibliotheque.submit(function (e) {
		e.preventDefault()
		let numMusee = $('#listMusee').val()
		let isbn = $('#listOuvrage').val()
		let date_achat = $('.date_achat').val()
		$.post('php/treatment.php', {
			add_bibliotheque: true,
			numMus: numMusee,
			isbn: isbn,
			date_achat: date_achat
		}).done(function (data) {
			let $bibliotheque = '<tr>\n' +
				'      <th scope="row"></th>\n' +
				'      <td>' + numMusee + '</td>\n' +
				'      <td>' + isbn + '</td>\n' +
				'      <td>' + date_achat + '</td>\n' +
				'      <td><button disabled class="update_bibliotheque btn btn-warning ml-2 mr-2">Modifier</button>' +
				'<button disabled class="btn btn-danger delete_bibliotheque">Supprimer</button></td>     </tr>'
            $(".list-bibliotheque").append($bibliotheque)
            $('.date_achat').val("")
            $formBibliotheque.slideToggle()
        })
    })

    $('.update_bibliotheque').click(function (e) {
		$('.update_id').val(this.id)
		let $row = $('.B' + this.id)
		$('.update_date_achat').val($row.children('td:eq(2)').text())
		$('.bibliotheque-update-form').slideDown()
	})
    $('.update-submit').click(function (e) {
		e.preventDefault()
		let id = $('.update_id').val()
		let numMus = $('#update_listMusee').val()
		let isbn = $('#update_listOuvrage').val()
		let date_achat = $('.update_date_achat').val()
		$.post('php/treatment.php', {
			update_bibliotheque: true,
			id_bibliotheque: id,
			numMus: numMus,
			isbn: isbn,
			date_achat: date_achat
		}).done(function (data) {
			let $row = $('.B' + id)
			$row.children('td:eq(0)').text(numMus)
            $row.children('td:eq(1)').text(isbn)
            $row.children('td:eq(2)').text(date_achat)
        })
    })

    $('.delete_bibliotheque').click(function (e) {
        e.preventDefault()
        let id = this.id
        $.post('php/treatment.php', {
            delete_bibliotheque: true,
            id_bibliotheque: id
        }).done(function () {
            let $row = ".B" + id
            $($row).remove()
        })
    })
})
