$(function () {

	$.get(
		{
			url: 'php/treatment.php',
			async: false,
			data: 'get_site=true',
			dataType: 'json',
			success: function (result, status) {
				$(result).each(function () {
					let $site = '<tr class="S' + this.nomSite + '">\n' +
						'      <td>' + this.nomSite + '</td>\n' +
						'      <td>' + this.codePays + '</td>\n' +
						'      <td>' + this.anneedecouv + '</td>\n' +
						'      <td><button class="update_site btn btn-warning ml-2 mr-2" id="' + this.nomSite +
						'">Modifier</button>' +
						'<button class="btn btn-danger delete_site" id="' + this.nomSite +
						'">Supprimer</button></td>     </tr>'
					$(".list-site").append($site)
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

	let $formSite = $('.site-form')
	$formSite.css('display', 'none')
	$('.site-update-form').css('display', 'none')

	$('.site-toggle').click(function () {
		$formSite.slideToggle()
	})

	$formSite.submit(function (e) {
        e.preventDefault()
		let nomSite = $('.nomSite').val()
		let codePays = $('#listPays').val()
		let anneedecouv = $('.anneedecouv').val()
        $.post('php/treatment.php', {
            add_site: true,
            nomSite: nomSite,
            codePays: codePays,
            anneedecouv: anneedecouv
        }).done(function (data) {
            let $site = '<tr class="S' + nomSite + '">\n' +
				'      <td>' + nomSite + '</td>\n' +
				'      <td>' + codePays + '</td>\n' +
				'      <td>' + anneedecouv + '</td>\n' +
				'      <td><button disabled class="update_site btn btn-warning ml-2 mr-2" id="' + nomSite +
				'">Modifier</button>' +
				'<button disabled class="btn btn-danger delete_site" id="' + nomSite +
				'">Supprimer</button></td>     </tr>'
            $(".list-site").append($site)
            $('.nomSite').val("")
            $('.anneedecouv').val("")
            $formSite.slideToggle()
        })
    })

    $('.update_site').click(function (e) {
		$('.site-update-form').slideDown()
		$('.hiddenNomSite').val(this.id)
		let $row = $('.S' + this.id)
		$('.update_anneedecouv').val($row.children('td:eq(2)').text())
		$('.update_nomSite').val($row.children('td:eq(0)').text())
	})
    $('.update-submit').click(function (e) {
        e.preventDefault()
        let oldNomSite = $('.hiddenNomSite').val()
		let newNomSite = $('.update_nomSite').val()
		let codePays = $('#update_listPays').val()
		let anneedecouv = $('.update_anneedecouv').val()
        $.post('php/treatment.php', {
            update_site: true,
            newNomSite: newNomSite,
            oldNomSite: oldNomSite,
            codePays: codePays,
            anneedecouv: anneedecouv
        }).done(function (data) {
            let $row = $('.S' + oldNomSite)
            $row.children('td:eq(0)').text(newNomSite)
            $row.children('td:eq(1)').text(codePays)
            $row.children('td:eq(2)').text(anneedecouv)
        })
    })

    $('.delete_site').click(function (e) {
        e.preventDefault()
        let nomSite = this.id
        $.post('php/treatment.php', {
            delete_site: true,
            nomSite: nomSite
        }).done(function () {
            let $row = ".S" + nomSite
            $($row).remove()
        })
    })
})
