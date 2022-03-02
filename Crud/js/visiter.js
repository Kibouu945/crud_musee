$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			async: false,
			data: 'get_visiter=true',
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function () {
					let $visiter = '<tr class="V' + this.id + '">\n' +
						'      <th scope="row">' + this.id + '</th>\n' +
						'      <td>' + this.numMus + '</td>\n' +
						'      <td>' + this.jour + '</td>\n' +
						'      <td>' + this.nbVisiteur + '</td>\n' +
						'      <td><button class="update_visiter btn btn-warning ml-2 mr-2" id="' + this.id +
						'">Modifier</button>' +
						'<button class="btn btn-danger delete_visiter" id="' + this.id +
						'">Supprimer</button></td>     </tr>'
					$(".list-visiter").append($visiter)
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

	let $formVisiter = $('.visiter-form')
	$formVisiter.css('display', 'none')
	$('.visiter-update-form').css('display', 'none')

	$('.visiter-toggle').click(function () {
		$formVisiter.slideToggle()
	})

	$formVisiter.submit(function (e) {
        e.preventDefault()
		let numMusee = $('#listMusee').val()
		let jour = $('.jour').val()
        let nbVisiteur = $('.nbVisiteur').val()
        $.post('php/treatment.php', {
            add_visiter: true,
            numMus: numMusee,
            jour: jour,
            nbVisiteur: nbVisiteur
        }).done(function (data) {
            let $visiter = '<tr>\n' +
				'      <th scope="row"></th>\n' +
				'      <td>' + numMusee + '</td>\n' +
				'      <td>' + jour + '</td>\n' +
				'      <td>' + nbVisiteur + '</td>\n' +
				'      <td><button disabled class="update_visiter btn btn-warning ml-2 mr-2">Modifier</button>' +
				'<button disabled class="btn btn-danger delete_visiter">Supprimer</button></td>     </tr>'
            $(".list-visiter").append($visiter)
            $('.jour').val("")
            $('.nbVisiteur').val("")
            $formVisiter.slideToggle()
        })
    })

    $('.update_visiter').click(function (e) {
		$('.update_id').val(this.id)
		$('.visiter-update-form').slideDown()
		let $row = $('.V' + this.id)
		$('.update_jour').val($row.children('td:eq(1)').text())
		$('.update_nbVisiteur').val($row.children('td:eq(2)').text())
	})
    $('.update-submit').click(function (e) {
        e.preventDefault()
		let id = $('.update_id').val()
		let numMus = $('#update_listMusee').val()
		let jour = $('.update_jour').val()
        let nbVisiteur = $('.update_nbVisiteur').val()
        $.post('php/treatment.php', {
            update_visiter: true,
            id_visiter: id,
            numMus: numMus,
            jour: jour,
            nbVisiteur: nbVisiteur
        }).done(function (data) {
            let $row = $('.V' + id)
            $row.children('td:eq(0)').text(numMus)
            $row.children('td:eq(1)').text(jour)
            $row.children('td:eq(2)').text(nbVisiteur)
        })
    })

    $('.delete_visiter').click(function (e) {
        e.preventDefault()
        let id = this.id
        $.post('php/treatment.php', {
            delete_visiter: true,
            id_visiter: id
        }).done(function () {
            let $row = ".V" + id
            $($row).remove()
        })
    })
})
