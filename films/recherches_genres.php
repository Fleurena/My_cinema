<?php 

include('include.php');

function get_name_genre()
{ 
	global $bdd;

	$req = $bdd->prepare('SELECT nom FROM genre ORDER BY nom ASC');
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}