<?php
function get_name_distribs(){

include('include.php');

global $bdd;

$req = $bdd->prepare('SELECT nom FROM distrib ORDER BY nom ASC');

$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}