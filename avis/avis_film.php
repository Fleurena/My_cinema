<?php

include('include.php');

function movie()
{
$donnees = [];

if(isset($_POST['film']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM film WHERE titre LIKE :film');

	$req->bindValue(':film', $_POST['film']);
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
if(!isset($_POST['film']))
	{
		$donnees = [];
		return $donnees;
	}
}