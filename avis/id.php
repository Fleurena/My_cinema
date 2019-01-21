<?php
include('./include.php');

$donnees = [];
function id()
{
	global $bdd;
	global $donnees;

if(isset($_POST['id']) AND isset($_POST['film']) AND isset($_POST['avis']))
{

	$req = $bdd->prepare('SELECT * FROM membre AS m LEFT JOIN fiche_personne AS f ON m.id_fiche_perso = f.id_perso LEFT JOIN historique_membre AS h ON m.id_membre = h.id_membre LEFT JOIN film AS film ON h.id_film = film.id_film WHERE m.id_membre = :id ORDER BY h.date DESC LIMIT 10');

	$req->bindValue(':id', $_POST['id']);

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}

if(isset($_POST['id_confirm']) AND $_POST['id_confirm'] == $_POST['id'])
{
	header('Location: avis.php');
}

if(!isset($_POST['id']) AND !isset($_POST['film']) AND !isset($_POST['avis']))
	{
		$donnees = [];
		return $donnees;
	}
}