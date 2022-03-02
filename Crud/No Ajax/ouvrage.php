<html lang="fr">
<head>
	<title>Formulaire Ouvrage</title>
</head>
<body>
<p>Enregistrer un nouveau ouvrage</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'ISBN :
		<input type="number" name="isbn">
	</label>
	<label>
		Nombre de pages :
		<input type="number" name="nbpages">
	</label>
	<label>
		Titre de l'ouvrage :
		<input type="text" name="titreouvrage">
	</label>
	<label>
		Code du Pays auquel appartient l'ouvrage :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="add_ouvrage" value="Enregistrer">
</form>
<p>Modifier un ouvrage</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'ISBN :
		<input type="number" name="isbn">
	</label>
	<label>
		Nombre de pages :
		<input type="number" name="nbpages">
	</label>
	<label>
		Titre de l'ouvrage :
		<input type="text" name="titreouvrage">
	</label>
	<label>
		Code du Pays auquel appartient l'ouvrage :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="update_ouvrage" value="Modifier">
</form>
<p>Supprimer un ouvrage</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'ISBN :
		<input type="number" name="isbn">
	</label>
	<input type="submit" name="delete_ouvrage" value="Supprimer">
</form>
</body>
</html>
