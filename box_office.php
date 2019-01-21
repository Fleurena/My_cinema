<?php
include('include.php');
$donnees = [];

function box_office()
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM grille_programme AS g LEFT JOIN film AS f ON g.id_film = f.id_film LEFT JOIN salle AS s ON g.id_salle = s.id_salle WHERE g.debut_sceance = CURDATE() OR g.fin_sceance = CURDATE() ORDER BY g.id_film');

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}