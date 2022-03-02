<html lang="fr">
<head>
	<title>Formulaire Pays</title></head>
<body>
<p>Enregistrer un nouveau pays</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer le code du pays :
		<input type="text" name="codePays">
	</label>
	<label>
		Nombre d'habitants :
		<input type="number" name="nb_habitants">
	</label>
	<input type="submit" name="add_pays" value="Enregistrer">
</form>
<p>Modifier un Pays</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer le code du pays :
		<input type="text" name="codePays">
	</label>
	<label>
		Entrer le nombre d'habitants :
		<input type="text" name="nb_habitants">
	</label>
	<input type="submit" name="update_pays" value="Modifier">
</form>
<p>Supprimer un Pays</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer le code du pays :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="delete_pays" value="Supprimer">
</form>
</body>
</html>
