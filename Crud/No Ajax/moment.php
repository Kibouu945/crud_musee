<html lang="fr">
<head>
	<title>Formulaire Moment</title></head>
<body>
<p>Enregistrer un nouveau moment</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer la date :
		<input type="date" name="date">
	</label>
	<input type="submit" name="add_jour" value="Enregistrer">
</form>
<p>Modifier un moment</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer l'ancienne date :
		<input type="date" name="old_date">
	</label>
	<label>
		Entrer la nouvelle date :
		<input type="date" name="new_date">
	</label>
	<input type="submit" name="update_jour" value="Modifier">
</form>
<p>Supprimer un moment</p>
<form action="../php/treatment.php" method="post">
	<label>
		Entrer la date :
		<input type="date" name="date">
	</label>
	<input type="submit" name="delete_jour" value="Supprimer">
</form>
</body>
</html>
