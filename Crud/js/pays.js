$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			data: 'get_pays=all',
			async: false,
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function (i) {
					let $pays = '<tr class="P' + this.codePays + '">\n' +
						'      <th scope="row">' + i + '</th>\n' +
						'      <td>' + this.codePays + '</td>\n' +
						'      <td>' + this.Nbhabitants + '</td>\n' +
						'      <td><button class="update_pays btn btn-warning ml-2 mr-2" id="' + this.codePays + '">Modifier</button><button' +
						' class="btn' +
						' btn-danger delete_pays" id="' + this.codePays + '">Supprimer</button></td>     </tr>'
					$(".list-pays").append($pays)
				})
			}
		}
	)

	let $formPays = $('.pays-form');
	$formPays.css('display', 'none')
	$('.pays-update-form').css('display', 'none')

	$('.pays-toggle').click(function () {
		$formPays.slideToggle()
	})

	$formPays.submit(function (e) {
        e.preventDefault()
        let codePays = $('.codePays').val()
        let nbHabitants = $('.nbHabitants').val()
        $.post('php/treatment.php', {
            add_pays: true,
            codePays: codePays,
            nb_habitants: nbHabitants
        }).done(function (data) {
            let $pays = $('<tr class="P' + codePays + '">\n' +
				'      <th scope="row"></th>\n' +
				'      <td>' + codePays + '</td>\n' +
				'      <td>' + nbHabitants + '</td>\n' +
				'      <td><button disabled class="update_pays btn btn-warning ml-2 mr-2" id="' + codePays + '">Modifier</button><button' +
				' class="btn' +
				' btn-danger delete_pays" id="' + codePays + '">Supprimer</button></td>     </tr>' +
				'    </tr>')
            $(".list-pays").append($pays)
            $('.codePays').val("")
            $('.nbHabitants').val("")
            $formPays.slideToggle()
        })
    })

    $('.update_pays').click(function (e) {
		$('.update_codePays').val(this.id)
		$('.pays-update-form').slideDown()
		let $row = $(".P" + this.id)
		$('.update_nbHabitants').val($row.children('td:eq(1)').text())
	})
    $('.update-submit').click(function (e) {
        e.preventDefault()
        let codePays = $('.update_codePays').val()
        let nbHabitants = $('.update_nbHabitants').val()
        $.post('php/treatment.php', {
            update_pays: true,
            codePays: codePays,
            nb_habitants: nbHabitants
        }).done(function (data) {
            let $row = $(".P" + codePays)
            $row.children('td:eq(1)').text(nbHabitants)
        })
    })

    $('.delete_pays').click(function (e) {
        e.preventDefault()
        let codePays = this.id
        $.post('php/treatment.php', {
            delete_pays: true,
            codePays: codePays
        }).done(function (data) {
            let $row = ".P" + codePays
            $($row).remove()
        })
    })
});
