<?php 

include('include.php');

function get_id()
{ 
	global $bdd;

	$req = $bdd->prepare('SELECT * FROM membre LEFT JOIN fiche_personne AS f ON membre.id_fiche_perso = f.id_perso WHERE f.email = :email');

	$req->bindvalue(':email', $_POST['email']);
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
