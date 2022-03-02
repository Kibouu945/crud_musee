<html lang="fr">
<head>
	<title>Formulaire visiter</title>
</head>
<body>
<p>Enregistrer une nouvelle visite</p>
<form action="../php/treatment.php" method="post">
	<label>
		Nombre de visiteurs :
		<input type="number" name="nbVisiteur">
	</label>
	<label>
		Numero du musee :
		<input type="number" name="numMus">
	</label>
	<label>
		Entrer le moment :
		<input type="date" name="jour">
	</label>
	<input type="submit" name="add_visiter" value="Enregistrer">
</form>
<p>Modifier une visite</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'id :
		<input type="number" name="id_visiter">
	</label>
	<label>
		Nombre de visiteurs :
		<input type="number" name="nbVisiteur">
	</label>
	<label>
		Numero du musee :
		<input type="number" name="numMus">
	</label>
	<label>
		Entrer le moment :
		<input type="date" name="jour">
	</label>
	<input type="submit" name="update_visiter" value="Modifier">
</form>
<p>Supprimer une visite</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'id du référencement :
		<input type="number" name="id_visiter">
	</label>
	<input type="submit" name="delete_visiter" value="Supprimer">
</form>
</body>
</html>
