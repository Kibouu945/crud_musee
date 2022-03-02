<html lang="fr">
<head>
	<title>Formulaire Site</title>
</head>
<body>
<p>Enregistrer un nouveau site</p>
<form action="treatment.php" method="post">
	<label>
		Entrer le nom du site :
		<input type="text" name="nomSite">
	</label>
	<label>
		Annee de couverture :
		<input type="number" min="2000" name="anneedecouv">
	</label>
	<label>
		Code du Pays auquel appartient le site :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="add_site" value="Enregistrer">
</form>
<p>Modifier un site</p>
<form action="treatment.php" method="post">
	<label>
		Entrer l'ancien nom du site :
		<input type="text" name="oldNomSite">
	</label>
	<label>
		Entrer le nouveau nom du site :
		<input type="text" name="newNomSite">
	</label>
	<label>
		Annee de couverture :
		<input type="number" min="2000" name="anneedecouv">
	</label>
	<label>
		Code du Pays auquel appartient le site :
		<input type="text" name="codePays">
	</label>
	<input type="submit" name="update_site" value="Modifier">
</form>
<p>Supprimer un site</p>
<form action="treatment.php" method="post">
	<label>
		Entrer le nom du site :
		<input type="text" name="nomSite">
	</label>
	<input type="submit" name="delete_site" value="Supprimer">
</form>
</body>
</html>

