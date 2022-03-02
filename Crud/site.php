<!DOCTYPE html>
<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TP PHP CRUD Site</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
			integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
			integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
			crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
			integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>

<div class="d-flex" id="wrapper">

	<?php
	$active = 'Site';
	include "navbar.php";
	?>

	<!-- Page Content -->
	<div id="page-content-wrapper">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<button class="btn btn-warning" id="menu-toggle">
				&xlArr;
			</button>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				&xrArr;
			</button>

		</nav>
		<h3 class="m-4">Liste des Sites</h3>
		<table class="mt-4 ml-auto mr-auto w-75 table table-striped table-dark">
			<thead>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Code du Pays</th>
				<th scope="col">Année de couverture</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody class="list-site">

			</tbody>
		</table>
		<button class="btn btn-warning site-toggle">Créer un nouveau Site</button>
		<form class="mt-4 ml-auto mr-auto w-75 site-form">
			<div class="form-row">
				<div class="col">
					<label>
						<input type="text" class="form-control nomSite" placeholder="Nom du Site">
					</label>
				</div>
				<div class="col">
					<label for="listPays">Pays</label><select class="form-control" name="codePays" id="listPays">
					</select>
				</div>
				<div class="col">
					<label>
						<input type="number" class="form-control anneedecouv" placeholder="Année de couverture">
					</label>
				</div>
				<div class="col">
					<input type="submit" class="btn btn-warning value=" Enregistrer">
				</div>
			</div>
		</form>

		<form class="mt-4 ml-auto mr-auto w-75 site-update-form">
			<p>Entrer vos modifications</p>
			<div class="form-row">
				<div class="col">
					<label>
						<input type="text" class="form-control update_nomSite" placeholder="Nom du Site">
					</label>
				</div>
				<div class="col">
					<label for="update_listPays">Pays</label><select class="form-control" name="codePays"
																	 id="update_listPays">
					</select>
				</div>
				<div class="col">
					<label>
						<input type="number" class="form-control update_anneedecouv" placeholder="Année de couverture">
					</label>
				</div>
				<input type="hidden" class="hiddenNomSite" value="">
				<div class="col">
					<h3 class="m-4"><input type="submit" class="btn btn-warning update-submit" value="Appliquer">
				</div>
			</div>
		</form>
	</div>

</div>

<!-- Menu Toggle Script -->
<script src="js/site.js"></script>
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
