<?php
include('./include.php');

$donnees = [];
function last_com()
{
	global $bdd;
	global $donnees;

if(!isset($_POST['id']) AND !isset($_POST['film']) AND !isset($_POST['avis']))
{

	$req = $bdd->prepare('SELECT * FROM membre AS m LEFT JOIN fiche_personne AS f ON m.id_fiche_perso = f.id_perso LEFT JOIN historique_membre AS h ON m.id_membre = h.id_membre LEFT JOIN film AS film ON h.id_film = film.id_film ORDER BY h.date DESC LIMIT 10');

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
}