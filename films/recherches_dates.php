<?php 

include('include.php');
$donnees = [];

function get_date_movies()
{ 
	global $bdd;
	global $donnees;
	$req = $bdd->prepare('SELECT DISTINCT annee_prod FROM film WHERE NOT annee_prod = 0 ORDER BY annee_prod DESC');
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}