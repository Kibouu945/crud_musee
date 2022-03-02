$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			data: 'get_musee=all',
			dataType: 'json',
			async: false,
			success: function (result, status) {
				$(result).each(function () {
					let $musee = '<tr class="M' + this.numMus + '">\n' +
						'      <th scope="row">' + this.numMus + '</th>\n' +
						'      <td>' + this.nomMus + '</td>\n' +
						'      <td>' + this.nbLivres + '</td>\n' +
						'      <td>' + this.codePays + '</td>\n' +
						'      <td><button class="update_musee btn btn-warning ml-2 mr-2" id="' + this.numMus +
						'">Modifier</button>' +
						'<button class="btn btn-danger delete_musee" id="' + this.numMus +
						'">Supprimer</button></td>     </tr>'
					$(".list-musee").append($musee)
				})
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

	let $formMusee = $('.musee-form')
	$formMusee.css('display', 'none')
	$('.musee-update-form').css('display', 'none')

	$('.musee-toggle').click(function () {
		$formMusee.slideToggle()
	})

	$formMusee.submit(function (e) {
        e.preventDefault()
        let nomMusee = $('.nomMus').val()
		let nbLivres = $('.nbLivres').val()
		let codePays = $('#listPays').val()
        $.post('php/treatment.php', {
            add_musee: true,
            nomMusee: nomMusee,
            nblivres: nbLivres,
            codePays: codePays
        }).done(function (data) {
            let $musee = '<tr>\n' +
				'      <th scope="row"></th>\n' +
				'      <td>' + nomMusee + '</td>\n' +
				'      <td>' + nbLivres + '</td>\n' +
				'      <td>' + codePays + '</td>\n' +
				'      <td><button disabled class="update_musee btn btn-warning ml-2 mr-2">Modifier</button>' +
				'<button disabled class="btn btn-danger delete_musee">Supprimer</button></td>     </tr>'
            $(".list-musee").append($musee)
            $('.nomMus').val("")
            $('.nbLivres').val("")
            $formMusee.slideToggle()
        })
    })

    $('.update_musee').click(function (e) {
		$('.update_NumMusee').val(this.id)
		let $row = $('.M' + this.id)
		$('.update_nomMusee').val($row.children('td:eq(0)').text())
		$('.update_nbLivres').val($row.children('td:eq(1)').text())
		$('.musee-update-form').slideDown()
	})
    $('.update-submit').click(function (e) {
        e.preventDefault()
        let numMus = $('.update_NumMusee').val()
        let nomMusee = $('.update_nomMusee').val()
		let nbLivres = $('.update_nbLivres').val()
		let codePays = $('#update_listPays').val()
        $.post('php/treatment.php', {
            update_musee: true,
            numMus: numMus,
            nomMusee: nomMusee,
            nblivres: nbLivres,
            codePays: codePays
        }).done(function (data) {
            let $row = $('.M' + numMus)
            $row.children('td:eq(0)').text(nomMusee)
            $row.children('td:eq(1)').text(nbLivres)
            $row.children('td:eq(2)').text(codePays)
        })
    })

    $('.delete_musee').click(function (e) {
        e.preventDefault()
        let numMusee = this.id
        $.post('php/treatment.php', {
            delete_musee: true,
            numMus: numMusee
        }).done(function () {
            let $row = ".M" + numMusee
            $($row).remove()
        })
    })
})
