<?php 

include('include.php');

function get_historique()
{ 
	global $bdd;

	$req = $bdd->prepare('SELECT * FROM membre LEFT JOIN fiche_personne AS f ON membre.id_fiche_perso = f.id_perso LEFT JOIN historique_membre AS h ON membre.id_membre = h.id_membre LEFT JOIN film ON h.id_film = film.id_film WHERE f.email = :email LIMIT 15');

	$req->bindvalue(':email', $_POST['email']);
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
