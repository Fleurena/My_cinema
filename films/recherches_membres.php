<?php 

include('include.php');

function getmember()
{ 
	$donnees = [];

if(isset($_POST['motclee']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM fiche_personne WHERE (nom = :motclee) OR (prenom = :motclee) ORDER BY nom');

	$req->bindValue(':motclee', $_POST['motclee']);
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