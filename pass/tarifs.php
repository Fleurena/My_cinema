<?php
include('include.php');

$donnees = [];
function tarifs()
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM abonnement');

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
	var_dump($donnees);
}