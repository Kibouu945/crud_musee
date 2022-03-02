<html lang="fr">
<head>
	<title>Formulaire bibliotheque</title>
</head>
<body>
<p>Enregistrer une nouvelle bibliothèque</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer la date d'achat :
		<input type="date" name="date_achat">
	</label>
	<label>
		ISBN :
		<input type="number" name="isbn">
	</label>
	<label>
		Numero du musee :
		<input type="number" name="numMus">
	</label>
	<input type="submit" name="add_bibliotheque" value="Enregistrer">
</form>
<p>Modifier une bibliotheque</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'id :
		<input type="number" name="id_bibliotheque">
	</label>
	<label>
		Entrer la date d'achat :
		<input type="date" name="date_achat">
	</label>
	<label>
		ISBN :
		<input type="number" name="isbn">
	</label>
	<label>
		Numero du musee :
		<input type="number" name="numMus">
	</label>
	<input type="submit" name="update_bibliotheque" value="Modifier">
</form>
<p>Supprimer une bibliothèque</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'id de la bibliothèque :
		<input type="number" name="id_bibliotheque">
	</label>
	<input type="submit" name="delete_bibliotheque" value="Supprimer">
</form>
</body>
</html>
