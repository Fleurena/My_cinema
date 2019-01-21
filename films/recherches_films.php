<?php 

include('include.php');
$donnees = [];
function getfilm()
{ 
	global $bdd;
	global $donnees;
	$req = $bdd->prepare('SELECT nom FROM genre ORDER BY nom ASC');
	$req->execute();

	$donnees = $req->fetchAll();
	    return $donnees;
}