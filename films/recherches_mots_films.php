<?php

include('include.php');

function search_words()
{
$donnees = [];

if(isset($_POST['motclee']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM film WHERE titre LIKE :motclee');

	$req->bindValue(':motclee', "%".$_POST['motclee']."%");
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
if(!isset($_POST['motclee']))
	{
		$donnees = [];
		return $donnees;
	}
}