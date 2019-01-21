<?php
include('./include.php');

$donnees = [];
function catch_abos()
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM abonnement');

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}