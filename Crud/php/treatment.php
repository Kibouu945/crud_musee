<?php
$conn = new PDO("mysql:host=localhost;dbname=musee", 'root', '');
/**
 * CRUD table moment
 * See memento.html
 * @author Spider <massoudfataou@gmail.com>
 */
//GET
if (isset($_GET['get_moment'])) {
	foreach ($conn->query("SELECT jour FROM moment ORDER BY jour ASC") as $row) {
		$result[] = array(
			'jour' => $row['jour']
		);
	}
	echo json_encode($result);
}
//POST
if (isset($_POST['add_jour'])) {
	$req = "INSERT INTO moment(jour) VALUES (" . $conn->quote($_POST['date']) . ")";
	echo $conn->exec($req);
}
//UPDATE
if (isset($_POST['update_jour'])) {
	$req = "UPDATE moment SET jour = " . $conn->quote($_POST['new_date']) . " WHERE jour = " . $conn->quote($_POST['old_date']);
	echo $conn->exec($req);
}
//DELETE
if (isset($_POST['delete_jour'])) {
	$req = "DELETE FROM moment WHERE jour = " . $conn->quote($_POST['date']);
	echo $conn->exec($req);
}


/**
 * CRUD table pays
 * See memento.html
 * @author Spider <massoudfataou@gmail.com>
 */
//GET
if (isset($_GET['get_pays'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM pays") as $row) {
		$result[] = array(
			"codePays" => $row['codePays'],
			"Nbhabitants" => intval($row['nbhabitants'])
		);
	}
	echo json_encode($result);
}
//POST
if (isset($_POST['add_pays'])) {
	$req = "INSERT INTO pays(codePays, nbhabitants) VALUES (" . $conn->quote($_POST['codePays']) . ", " . $_POST['nb_habitants'] . ")";
	echo $conn->exec($req);
}
//UPDATE
if (isset($_POST['update_pays'])) {
	$req = "UPDATE pays SET nbhabitants = " . intval($_POST['nb_habitants']) . " WHERE codePays = " . $conn->quote
		($_POST['codePays']);
	echo $conn->exec($req);
}
//DELETE
if (isset($_POST['delete_pays'])) {
	$req = "DELETE FROM pays WHERE codePays = " . $conn->quote($_POST['codePays']);
	echo $conn->exec($req);
}

/**
 * CRUD Table musee
 * See memento.html
 * @author Spider <massoudfataou@gmail.com>
 */
//GET
if (isset($_GET['get_musee'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM musee") as $row) {
		$result[] = array(
			"numMus" => intval($row['numMus']),
			"nomMus" => $row['nomMus'],
			"nbLivres" => $row['nblivres'],
			"codePays" => $row['codePays']
		);
	}
	echo json_encode($result);
}
//POST
if (isset($_POST['add_musee'])) {
	$req = "INSERT INTO musee VALUES (NULL, " . $conn->quote($_POST['nomMusee']) . ", " . intval($_POST['nblivres'])
		. "," . $conn->quote($_POST['codePays']) . ")";
	echo $conn->exec($req);
}

//UPDATE
if (isset($_POST['update_musee'])) {
	$req = "UPDATE musee SET nomMus = " . $conn->quote($_POST['nomMusee']) . ", nblivres = " . intval($_POST['nblivres']) . ", codePays = " . $conn->quote($_POST['codePays']) . " WHERE numMus = " . intval($_POST['numMus']);
	echo $conn->exec($req);
}
//DELETE
if (isset($_POST['delete_musee'])) {
	$req = "DELETE FROM musee WHERE numMus = " . intval($_POST['numMus']);
	echo $conn->exec($req);
}

/**
 * CRUD Table ouvrage
 * @author Spider<massoudfataou@gmail.com>
 * See memento.html
 */
//GET
if (isset($_GET['get_ouvrage'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM ouvrage") as $row) {
		$result[] = array(
			'isbn' => intval($row['ISBN']),
			'nbPage' => intval($row['nbPage']),
			'titre' => $row['titre'],
			'codePays' => $row['codePays']
		);
	}
	echo json_encode($result);
}
// POST
if (isset($_POST['add_ouvrage'])) {
	$req = "INSERT INTO ouvrage VALUES (" . intval($_POST['isbn']) . ", " . intval($_POST['nbpages']) . ", " .
		$conn->quote($_POST['titreouvrage']) .
		", " . $conn->quote($_POST['codePays']) . ")";
	echo $conn->exec($req);
}
//UPDATE
if (isset($_POST['update_ouvrage'])) {
	$req = "UPDATE ouvrage SET nbPage = " . intval($_POST['nbpages']) . ", titre = " . $conn->quote($_POST['titreouvrage']) . ", codePays = " . $conn->quote($_POST['codePays']) . " WHERE isbn = " . intval($_POST['isbn']);
	echo $conn->exec($req);
}
//DELETE
if (isset($_POST['delete_ouvrage'])) {
	$req = "DELETE FROM ouvrage WHERE isbn = " . intval($_POST['isbn']);
	$conn->exec($req);
}

/**
 * CRUD Table site
 * @author Spider <massoudfataou@gmail.com>
 * See memento.html
 */
//GET
if (isset($_GET['get_site'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM site") as $row) {
		$result[] = array(
			'nomSite' => $row['nomSite'],
			'codePays' => $row['codePays'],
			'anneedecouv' => intval($row['anneedecouv'])
		);
	}
	echo json_encode($result);
}
// POST
if (isset($_POST['add_site'])) {
	$req = "INSERT INTO site VALUES (" . $conn->quote($_POST['nomSite']) . ", " . $conn->quote($_POST['codePays']) . ", " . $_POST['anneedecouv']
		. ")";
	echo $conn->exec($req);
}
// UPDATE
if (isset($_POST['update_site'])) {
	$req = "UPDATE site SET nomSite = " . $conn->quote($_POST['newNomSite']) . ", codePays = " . $conn->quote
		($_POST['codePays']) . ", anneedecouv = " . intval($_POST['anneedecouv']) . " WHERE nomSite = " .
		$conn->quote($_POST['oldNomSite']);
	echo $conn->exec($req);
}
// DELETE
if (isset($_POST['delete_site'])) {
	$req = "DELETE FROM site WHERE nomSite = " . $conn->quote($_POST['nomSite']);
	echo $conn->exec($req);
}

/**
 * CRUD Table bibliotheque
 * @author Spider <massoudfataou@gmail.com>
 * See memento.html
 */
//GET
if (isset($_GET['get_bibliotheque'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM bibliotheque") as $row) {
		$result[] = array(
			'id' => intval($row['id']),
			'numMus' => intval($row['numMus']),
			'isbn' => intval($row['ISBN']),
			'date_achat' => $row['date_Achat']
		);
	}
	echo json_encode($result);
}
// POST
if (isset($_POST['add_bibliotheque'])) {
	$req = "INSERT INTO bibliotheque VALUES (NULL, " . intval($_POST['numMus']) . ", " . intval($_POST['isbn']) .
		", " . $conn->quote($_POST['date_achat'])
		. ")";
	echo $conn->exec($req);
}
// UPDATE
if (isset($_POST['update_bibliotheque'])) {
	$req = "UPDATE bibliotheque SET numMus = " . intval($_POST['numMus']) . ", ISBN = " . intval($_POST['isbn']) . ", date_achat = " . $conn->quote($_POST['date_achat']) . " WHERE id = " .
		intval($_POST['id_bibliotheque']);
	echo $conn->exec($req);
}
// DELETE
if (isset($_POST['delete_bibliotheque'])) {
	$req = "DELETE FROM bibliotheque WHERE id = " . intval($_POST['id_bibliotheque']);
	echo $conn->exec($req);
}

/**
 * CRUD Table referencer
 * @author Spider <massoudfataou@gmail.com>
 * See memento.html
 */
//GET
if (isset($_GET['get_referencer'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM referencer") as $row) {
		$result[] = array(
			'id' => intval($row['id']),
			'nomSite' => $row['nomSite'],
			'numeroPage' => intval($row['numeropage']),
			'isbn' => intval($row['ISBN'])
		);
	}
	echo json_encode($result);
}
// POST
if (isset($_POST['add_referencer'])) {
	$req = "INSERT INTO referencer VALUES (NULL, " . $conn->quote($_POST['nomSite']) . ", " . intval
		($_POST['numPage']) . ", " . intval($_POST['isbn']) . ")";
	echo $conn->exec($req);
}
// UPDATE
if (isset($_POST['update_referencer'])) {
	$req = "UPDATE referencer SET nomSite = " . $conn->quote($_POST['nomSite']) . ", ISBN = " . intval($_POST['isbn'])
		. ", numeropage = " . intval($_POST['numPage']) . " WHERE id = " .
		intval($_POST['id_referencer']);
	echo $conn->exec($req);
}
// DELETE
if (isset($_POST['delete_referencer'])) {
	$req = "DELETE FROM referencer WHERE id = " . intval($_POST['id_referencer']);
	echo $conn->exec($req);
}

/**
 * CRUD Table visiter
 * @author Spider <massoudfataou@gmail.com>
 * See memento.html
 */
//GET
if (isset($_GET['get_visiter'])) {
	$result = array();
	foreach ($conn->query("SELECT * FROM visiter") as $row) {
		$result[] = array(
			'id' => intval($row['id']),
			'numMus' => intval($row['numMus']),
			'jour' => $row['jour'],
			'nbVisiteur' => intval($row['nbVisiteurs'])
		);
	}
	echo json_encode($result);
}
// POST
if (isset($_POST['add_visiter'])) {
	$req = "INSERT INTO moment(jour) VALUES (" . $conn->quote($_POST['jour']) . ")";
	echo $conn->exec($req);
	$req = "INSERT INTO visiter VALUES (NULL, " . intval($_POST['numMus']) . ", " . $conn->quote($_POST['jour']) .
		", " . intval($_POST['nbVisiteur']) . ")";
	echo $conn->exec($req);
}
// UPDATE
if (isset($_POST['update_visiter'])) {
	$req = "UPDATE visiter SET numMus = " . $conn->quote($_POST['numMus']) . ", jour = " . $conn->quote($_POST['jour'])
		. ", nbVisiteurs = " . intval($_POST['nbVisiteur']) . " WHERE id = " .
		intval($_POST['id_visiter']);
	echo $req;
	echo $conn->exec($req);
}
// DELETE
if (isset($_POST['delete_visiter'])) {
	$req = "DELETE FROM visiter WHERE id = " . intval($_POST['id_visiter']);
	echo $conn->exec($req);
}