<?php
include('./include.php');

function add()
{
	global $bdd;

	$req = $bdd->prepare('INSERT INTO abonnement ('nom') VALUES(:add)');

	$req->bindValue(':add', $_POST['ajouter']);

	$req->execute();
}