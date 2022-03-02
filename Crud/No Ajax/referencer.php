<html lang="fr">
<head>
	<title>Formulaire Référencer</title>
</head>
<body>
<p>Enregistrer un nouveau référencement</p>
<form action="treatment.php" method="post">
	<label>
		Numero de page :
		<input type="number" name="numPage">
	</label>
	<label>
		Entrer le nom du Site :
		<input type="text" name="nomSite">
	</label>
	<label>
		ISBN :
		<input type="number" name="isbn">
	</label>
	<input type="submit" name="add_referencer" value="Enregistrer">
</form>
<p>Modifier un référencement</p>
<form action="treatment.php" method="post">
	<label>
		Entrer l'id :
		<input type="number" name="id_referencer">
	</label>
	<label>
		Numero de page :
		<input type="number" name="numPage">
	</label>
	<label>
		Entrer le nom du Site :
		<input type="text" name="nomSite">
	</label>
	<label>
		ISBN :
		<input type="number" name="isbn">
	</label>
	<input type="submit" name="update_referencer" value="Modifier">
</form>
<p>Supprimer un référencement</p>
<form action="treatment.php" method="post">
	<label>
		Entrer l'id du référencement :
		<input type="number" name="id_referencer">
	</label>
	<input type="submit" name="delete_referencer" value="Supprimer">
</form>
</body>
</html>
