<html lang="fr">
<head>
	<title>Formulaire Musee</title>
</head>
<body>
<p>Enregistrer un nouveau Musee</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer le nom du Musee :
		<input type="text" name="nomMusee">
	</label>
	<label>
		Nombre de livres :
		<input type="number" name="nblivres">
	</label>
	<label>
		Code du Pays auquel appartient le musee :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="add_musee" value="Enregistrer">
</form>
<p>Modifier un Pays</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'id :
		<input type="number" name="numMus">
	</label>
	<label>
		Entrer le nouveau nom du musee :
		<input type="text" name="nomMusee">
	</label>
	<label>
		Changer le code du pays :
		<input type="text" name="codePays">
	</label>
	<label>
		Entrer le nombre de livres :
		<input type="number" name="nb_livres">
	</label>
	<input type="submit" name="update_musee" value="Modifier">
</form>
<p>Supprimer un musee</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer le numéro du musee :
		<input type="number" name="numMus">
	</label>
	<input type="submit" name="delete_musee" value="Supprimer">
</form>
</body>
</html>
